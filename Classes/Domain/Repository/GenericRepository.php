<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Repository;
=======
namespace RG\Rgdvoconnector\Domain\Repository;
>>>>>>> parent of 8432775... Change Namespace

use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use \TYPO3\CMS\Extbase\Reflection\ClassSchema;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class GenericRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @var \TYPO3\CMS\Extbase\Reflection\ReflectionService
	 */
	protected $reflectionService;

	/**
	 * metaRepository
<<<<<<< HEAD
	 * @var RGU\Dvoconnector\Domain\Repository\MetaRepository
=======
	 * @var RG\Rgdvoconnector\Domain\Repository\MetaRepository
>>>>>>> parent of 8432775... Change Namespace
	 * @inject
     */
	protected $metaRepository;

	public function initializeObject() {

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
	protected function completeEntity($entity) {

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
	private function recursivCompleteEntity($entity) {

		switch (true) {
<<<<<<< HEAD
			case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire::class):
=======
			case is_a($entity, \RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire::class):
>>>>>>> parent of 8432775... Change Namespace

				return $this->metaRepository->findAssociationRepertoireByID($entity->getID());

				break;
<<<<<<< HEAD
			case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Association\Category::class):
=======
			case is_a($entity, \RG\Rgdvoconnector\Domain\Model\Meta\Association\Category::class):
>>>>>>> parent of 8432775... Change Namespace

				return $this->metaRepository->findAssociationCategoryByID($entity->getID());

				break;
<<<<<<< HEAD
			case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel::class):
=======
			case is_a($entity, \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel::class):
>>>>>>> parent of 8432775... Change Namespace

				return $this->metaRepository->findAssociationPerformancelevelByID($entity->getID());

				break;
<<<<<<< HEAD
			case is_a($entity, \RGU\Dvoconnector\Domain\Model\Meta\Event\Type::class):
=======
			case is_a($entity, \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type::class):
>>>>>>> parent of 8432775... Change Namespace

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

							while($objectStorage->valid()) {

							    $subEntity = $objectStorage->current();

									$newSubEntity = $this->recursivCompleteEntity($subEntity);
									if($newSubEntity) {
										$newObjectStorage->attach($newSubEntity);
									} else {
										$newObjectStorage->attach($subEntity);
									}

							    $objectStorage->next();

							}

							$entity->_setProperty($propertyName, $newObjectStorage);

							break;
						case is_a($propertyDefinition['type'], \TYPO3\CMS\Extbase\DomainObject\AbstractEntity::class, true):

							$subEntity = $entity->_getProperty($propertyName);
							$newSubEntity = $this->recursivCompleteEntity($subEntity);
							$entity->_setProperty($propertyName, $newSubEntity);

							break;
					}

				}

				return $entity;

				break;
		}

	}

}
