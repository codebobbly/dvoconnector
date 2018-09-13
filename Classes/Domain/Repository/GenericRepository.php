<?php
namespace RGU\Dvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class GenericRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var \TYPO3\CMS\Extbase\Reflection\ReflectionService
     */
    protected $reflectionService;

    /**
     * metaRepository
     * @var RGU\Dvoconnector\Domain\Repository\MetaRepository
     * @inject
     */
    protected $metaRepository;

    public function initializeObject()
    {
        $this->reflectionService = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Reflection\ReflectionService::class);
    }

    /**
     * complete a entity
     *
     * @param AbstractEntity entity
     *
     * @return AbstractEntity
     *
    */
    protected function completeEntity($entity)
    {	
		if(is_null($entity)) {
			return $entity;
		}
        return $this->recursivCompleteEntity($entity);
    }

    /**
     * complete a entity
     *
     * @param AbstractEntity entity
     *
     * @return AbstractEntity
     *
    */
    private function recursivCompleteEntity($entity)
    {
        switch (true) {
            case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire::class):

                return $this->metaRepository->findAssociationRepertoireByID($entity->getID());

                break;
            case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Association\Category::class):

                return $this->metaRepository->findAssociationCategoryByID($entity->getID());

                break;
            case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel::class):

                return $this->metaRepository->findAssociationPerformancelevelByID($entity->getID());

                break;
            case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Event\Type::class):

                return $this->metaRepository->findEventTypeByID($entity->getID());

                break;
            default:

                $classSchema = $this->reflectionService->getClassSchema(get_class($entity));

                foreach ($classSchema->getProperties() as $propertyName => $propertyDefinition) {
                    switch (true) {
                        case is_a($propertyDefinition['type'], \TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, true):

                            $objectStorage = $entity->_getProperty($propertyName);
                            $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();

                            $objectStorage->rewind();

                            while ($objectStorage->valid()) {
                                $subEntity = $objectStorage->current();
								
								if(!is_null($subEntity)) {
									
									$newSubEntity = $this->recursivCompleteEntity($subEntity);
									if ($newSubEntity) {
										$newObjectStorage->attach($newSubEntity);
									} else {
										$newObjectStorage->attach($subEntity);
									}
								
								}

                                $objectStorage->next();
                            }

                            $entity->_setProperty($propertyName, $newObjectStorage);

                            break;
                        case is_a($propertyDefinition['type'], \TYPO3\CMS\Extbase\DomainObject\AbstractEntity::class, true):

                            $subEntity = $entity->_getProperty($propertyName);
							
							if(!is_null($subEntity)) {
								$newSubEntity = $this->recursivCompleteEntity($subEntity);
								$entity->_setProperty($propertyName, $newSubEntity);
							}

                            break;
                    }
                }

                return $entity;

                break;
        }
    }
}
