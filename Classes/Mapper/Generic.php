<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Mapper;
=======
namespace RG\Rgdvoconnector\Mapper;
>>>>>>> parent of 8432775... Change Namespace

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use \TYPO3\CMS\Extbase\Reflection\ClassSchema;

class Generic {

	/**
	 * @var \TYPO3\CMS\Extbase\Reflection\ReflectionService
	 */
	protected $reflectionService;

	/**
	 * XML data
	 * @var \SimpleXMLElement
	 */
	protected $xml;

	/**
	 * Generic Mapper
	 *
	 * @param  \SimpleXMLElement   $xml
	 * @return Generic
	 */
  public function __construct($xml) {
		$this->reflectionService = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Reflection\ReflectionService::class);
		$this->xml = $xml;
	}

  /**
   * Map XML to AbstractEntity
   *
   * @param AbstractEntity $entity Abstract Entity
   *
   * @return void
   */
  public function mapToAbstractEntity($entity) {

		$entityStack = new \SplStack();

		$this->mapXMLElementToEntity($this->xml, $entity, $entityStack);

  }

	/**
	 * map attributName to property
	 *
	 * @param \SimpleXMLElement xmlElement
	 * @param string attributName
	 * @param \SplStack stackEntity
	 *
	 * @return string
 	*/
	protected function mapAttributToProperty($xmlEntry, $attributName, $stackEntity) {

		switch ($attributName) {
			default:
				return $attributName;
				break;
		}

	}

	/**
	 * map attribut value
	 *
	 * @param \SimpleXMLElement xmlElement
	 * @param string attributName
	 * @param string value
	 * @param \SplStack stackEntity
	 *
	 * @return string
 	*/
	protected function mapAttributValue($xmlEntry, $attributName, $value, $stackEntity) {
		return $value;
	}

	/**
	 * map TagName to property
	 *
	 * @param \SimpleXMLElement xmlElement
	 * @param string tagName
	 * @param \SplStack stackEntity
	 *
	 * @return string
 	*/
	protected function mapTagNameToProperty($xmlEntry, $tagName, $stackEntity) {

		switch ($tagName) {
			default:
				return $tagName;
				break;
		}

	}

	/**
	 * map tagvalue
	 *
	 * @param \SimpleXMLElement xmlElement
	 * @param string tagName
	 * @param string value
	 * @param \SplStack stackEntity
	 *
	 * @return string
 	*/
	protected function mapTagValue($xmlEntry, $tagName, $value, $stackEntity) {
		return $value;
	}

	/**
	 * get Entity for attribut
	 *
	 * @param AbstractEntity entity
	 * @param \SimpleXMLElement xmlElement
	 * @param string attributName
	 * @param \SplStack stackEntity
	 *
	 * @return AbstractEntity
 	*/
	protected function getEntityForAttribut($entity, $xmlEntry, $attributName, $stackEntity) {
		return $entity;
	}

	/**
	 * get Entity for TagName
	 *
	 * @param AbstractEntity entity
	 * @param \SimpleXMLElement xmlElement
	 * @param string TagName
	 * @param \SplStack stackEntity
	 *
	 * @return AbstractEntity
 	*/
	protected function getEntityForTagName($entity, $xmlEntry, $tagName, $stackEntity) {
		return $entity;
	}

	/**
	 * map attribut the value to the property
	 *
	 * @param string property
	 * @param string value
	 * @param \SimpleXMLElement xmlElement
	 * @param AbstractEntity Entity
	 * @param \SplStack stackEntity
	 *
 	*/
	protected function mapToPropertyAttribut($property, $value, $xmlEntry, $entity, $stackEntity) {

		$this->mapToProperty($property, $value, $xmlEntry, $entity, $stackEntity);

	}

	/**
	 * map tag the value to the property
	 *
	 * @param string property
	 * @param string value
	 * @param \SimpleXMLElement xmlElement
	 * @param AbstractEntity Entity
	 * @param \SplStack stackEntity
	 *
	*/
	protected function mapToPropertyTagname($property, $value, $xmlEntry, $entity, $stackEntity) {

		if($this->mapToProperty($property, $value, $xmlEntry, $entity, $stackEntity) === false) {
			$this->mapXMLElementToEntity($xmlEntry, $entity, $stackEntity);
		}

	}

	/**
	 * map the value to the property
	 *
	 * @param string property
	 * @param string value
	 * @param \SimpleXMLElement xmlElement
	 * @param AbstractEntity Entity
	 * @param \SplStack stackEntity
	 * @return bool
	 *
 	*/
	protected function mapToProperty($property, $value, $xmlEntry, $entity, $stackEntity) {

		$classSchema = $this->reflectionService->getClassSchema(get_class($entity));

		if($classSchema->hasProperty($property)) {

			$propertyDefinition = $classSchema->getProperty($property);

			switch (true) {
					case is_a($propertyDefinition['type'], \TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, true):

						foreach ($xmlEntry->children() as $xmlChildEntry) {

							$name = $xmlChildEntry->getName();
							$childEntity = new $propertyDefinition['elementType']();
							$entityForTagName = $this->getEntityForTagName($childEntity, $xmlEntry, $name, $stackEntity);

							if(is_a($entityForTagName, $propertyDefinition['elementType'], true)) {
								$entity->_getProperty($property)->attach($childEntity);
							}

							$this->mapXMLElementToEntity($xmlChildEntry, $entityForTagName, $stackEntity);

						}

						break;
					case is_a($propertyDefinition['type'], \TYPO3\CMS\Extbase\DomainObject\AbstractEntity::class, true):

						$subEntity = $entity->_getProperty($property);
						if(!$subEntity) {
							$subEntity = new $propertyDefinition['type']();
							$entity->_setProperty($property, $subEntity);
						}

						$this->mapXMLElementToEntity($xmlEntry, $subEntity, $stackEntity);
						break;
					case is_a($propertyDefinition['type'], \DateTime::class, true):

						if(!empty($value)) {
							$dateTime = new \DateTime($value);
							$entity->_setProperty($property, $dateTime);
						}

						break;

					default:
						$entity->_setProperty($property, $value);
			}

			return true;

		} else {

			return false;

		}

	}

	/**
	 * map XML Element to Entity
	 *
	 * @param \SimpleXMLElement xmlElement
	 * @param AbstractEntity Entity
	 * @param \SplStack stackEntity
 	*/
	protected function mapXMLElementToEntity($xmlEntry, $entity, $stackEntity) {

		$stackEntity->push($entity);

		foreach($xmlEntry->attributes() as $name => $attribut) {

			$value = $this->mapAttributValue($xmlEntry, $name, $attribut->__toString(), $stackEntity);

			$entityForAttribut = $this->getEntityForAttribut($entity, $xmlEntry, $name, $stackEntity);
			$property = $this->mapAttributToProperty($xmlEntry, $name, $stackEntity);
			$this->mapToPropertyAttribut($property, $value, $xmlEntry, $entityForAttribut, $stackEntity);

		}

		foreach ($xmlEntry->children() as $xmlChildEntry) {

			$name = $xmlChildEntry->getName();

			$value = $this->mapTagValue($xmlEntry, $name, $xmlChildEntry->__toString(), $stackEntity);

			$entityForTagName = $this->getEntityForTagName($entity, $xmlEntry, $name, $stackEntity);
			$property = $this->mapTagNameToProperty($xmlEntry, $name, $stackEntity);
			$this->mapToPropertyTagname($property, $value, $xmlChildEntry, $entityForTagName, $stackEntity);

		}

		$stackEntity->pop();

	}

}
