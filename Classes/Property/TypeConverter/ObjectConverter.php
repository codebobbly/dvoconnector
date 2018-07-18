<?php
namespace RGU\Dvoconnector\Property\TypeConverter;

class ObjectConverter extends \TYPO3\CMS\Extbase\Property\TypeConverter\ObjectConverter {

  /**
   * @var int
   */
  const CONFIGURATION_OBJECT = 3;

  /**
   * @var object
   */
  protected $rgobject;

  /**
   * Convert an object from $source to an object.
   *
   * @param mixed $source
   * @param string $targetType
   * @param array $convertedChildProperties
   * @param \TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationInterface $configuration
   * @return object the target type
   * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidTargetException
   * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidDataTypeException
   * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidPropertyMappingConfigurationException
   */
  public function convertFrom($source, $targetType, array $convertedChildProperties = [], \TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationInterface $configuration = null) {

    // Get Object from Configuration
    $this->rgobject = $configuration->getConfigurationValue(\RGU\Dvoconnector\Property\TypeConverter\ObjectConverter::class, self::CONFIGURATION_OBJECT);

    $result = parent::convertFrom($source, $targetType, $convertedChildProperties, $configuration);

    $this->rgobject = null;

    return $result;

  }

  /**
   * Builds a new instance of $objectType with the given $possibleConstructorArgumentValues. If
   * constructor argument values are missing from the given array the method
   * looks for a default value in the constructor signature. Furthermore, the constructor arguments are removed from $possibleConstructorArgumentValues
   *
   * @param array &$possibleConstructorArgumentValues
   * @param string $objectType
   * @return object The created instance
   * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidTargetException if a required constructor argument is missing
   */
  protected function buildObject(array &$possibleConstructorArgumentValues, $objectType) {

    if(isset($this->rgobject)) {
      return $this->rgobject;
    }

    return parent::buildObject($possibleConstructorArgumentValues, $objectType);

  }

}
