<?php

namespace RGU\Dvoconnector\Domain\Model;

/**
 * Extension Manager configuration
 */
class EmConfiguration {

  /**
   * Fill the properties properly
   *
   * @param array $configuration em configuration
   */
  public function __construct(array $configuration)
  {
      foreach ($configuration as $key => $value) {
          if (property_exists(__CLASS__, $key)) {
              $this->$key = $value;
          }
      }
  }

  /**
   * @var int
   */
  protected $cachetime = 600;

  /**
   * @var int
   */
  protected $rootAssociationIDs = 1;

  /**
   * @var string
   */
  protected $httpUserAgent = 1;

  /**
   * @var string
   */
  protected $apiUrl = '';

  /**
   * @return int
   */
  public function getRootAssociationID(): int {
    return array_shift($this->getRootAssociationIDs());
  }

  /**
   * @return array
   */
  public function getRootAssociationIDs(): array {
    return explode(",", preg_replace('/([ ]*)([0-9]+)([ ]*)/', '$2', $this->rootAssociationIDs));
  }

  /**
   * @return int
   */
  public function getCachetime(): int {
    return (int)$this->cachetime;
  }

  /**
   * @return string
   */
  public function getApiUrl() {
    return $this->apiUrl;
  }

  /**
   * @return string
   */
  public function getHttpUserAgent() {
    return $this->httpUserAgent;
  }

}
