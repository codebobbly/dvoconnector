<?php

namespace RGU\Rgdvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;

use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Property\PropertyMapper;


use RGU\Rgdvoconnector\Domain\Filter\AssociationFilter;
use RGU\Rgdvoconnector\Domain\Filter\EventFilter;
use RGU\Rgdvoconnector\Domain\Filter\AnnouncementFilter;
use RGU\Rgdvoconnector\Domain\Filter\FunctionaryFilter;

use RGU\Rgdvoconnector\Domain\Filter\AssociationsFilter;
use RGU\Rgdvoconnector\Domain\Filter\EventsFilter;
use RGU\Rgdvoconnector\Domain\Filter\AnnouncementsFilter;
use RGU\Rgdvoconnector\Domain\Filter\FunctionariesFilter;

class AbstractDvoContextApiViewHelper extends AbstractDvoApiViewHelper {

  /**
   * @var string
   */
  const ARGUMENT_INSIDEASSOCIATIONID = 'insideAssociationID';

  /**
   * associationRepository
   * @var RGU\Rgdvoconnector\Domain\Repository\AssociationRepository
   * @inject
  */
  protected $associationRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

    parent::initializeArguments();
    $this->registerArgument(self::ARGUMENT_INSIDEASSOCIATIONID, 'string', 'The id of an parent association', false);

  }

  /**
   * Get the filter values as array
   *
   * @return array
   */
  protected function getFilterArray() {

    return array(
      self::ARGUMENT_INSIDEASSOCIATIONID => $this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]
    );

  }

  /**
   * Get the default associations filter.
   *
   * @return AssociationsFilter
   */
  protected function getDefaultAssociationsFilter() {

    $filter = new AssociationsFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * Get the default association filter.
   *
   * @return AssociationFilter
   */
  protected function getDefaultAssociationFilter() {

    $filter = new AssociationFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * Get the default event filter.
   *
   * @return EventFilter
   */
  protected function getDefaultEventFilter() {

    $filter = new EventFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * Get the default events filter.
   *
   * @return EventsFilter
   */
  protected function getDefaultEventsFilter() {

    $filter = new EventsFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * Get the default announcement filter.
   *
   * @return AnnouncementFilter
   */
  protected function getDefaultAnnouncementFilter() {

    $filter = new AnnouncementFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * Get the default announcements filter.
   *
   * @return AnnouncementsFilter
   */
  protected function getDefaultAnnouncementsFilter() {

    $filter = new AnnouncementsFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * Get the default functionary filter.
   *
   * @return FunctionaryFilter
   */
  protected function getDefaultFunctionaryFilter() {

    $filter = new FunctionaryFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * Get the default functionaries filter.
   *
   * @return FunctionariesFilter
   */
  protected function getDefaultFunctionariesFilter() {

    $filter = new FunctionariesFilter();
    $filter->setInsideAssociationID($this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID]);

    return $filter;

  }

  /**
   * remove all null values from the array
   *
   * @param array $array
   * @return array
   */
  protected function removeNullValuesFromArray($array) {

    $result = array();

    foreach ($array as $key => $value) {

      if (isset($value)) {

        if(($value instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage && count($value) > 0) || !($value instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage)) {
          $result[$key] = $value;
        }

      }

    }

    return $result;

  }

  /**
   * check a array value
   *
   * @param mixed $value
   * @return \DateTimeInterface
   * @throws Exception
   */
  protected function checkArray($value) {

    if(is_null($value)) {
      return $value;
    }

    if (!is_array($value)) {
      return array($value);
    } else {
      return $value;
    }

  }

  /**
   * check a dateTime value
   *
   * @param mixed $value
   * @param mixed $base
   * @return \DateTimeInterface
   * @throws Exception
   */
  protected function checkDateTime($value, $base = null) {

    if(is_null($value)) {
      return $value;
    }

    if (!$value instanceof \DateTimeInterface) {
      return $this->buildDateTimebyString($value, $base);
    } else {
      return $value;
    }

  }

  /**
   * Build a DateTime of a String
   *
   * @param string $stringDate
   * @param mixed $base
   * @return \DateTimeInterface
   * @throws Exception
   */
  protected function buildDateTimebyString($stringDate, $base = null) {

    if(is_null($base)) {
      $base = time();
    }

    try {
      $base = $base instanceof \DateTimeInterface ? $base->format('U') : strtotime((MathUtility::canBeInterpretedAsInteger($base) ? '@' : '') . $base);
      $dateTimestamp = strtotime((MathUtility::canBeInterpretedAsInteger($date) ? '@' : '') . $date, $base);
      $date = new \DateTime('@' . $dateTimestamp);
      $date->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    } catch (\Exception $exception) {
      throw new Exception('"' . $date . '" could not be parsed by \DateTime constructor: ' . $exception->getMessage(), 1241722579);
    }

  }

}
