<?php

namespace RG\Rgdvoconnector\Service\Url;

use RG\Rgdvoconnector\Domain\Filter\FunctionariesFilter;

/**
 * RealUrl.
 */
class RealUrlFunctionary extends AbstractRealUrl {

  /**
   * $functionaryRepository
   * @var RG\Rgdvoconnector\Domain\Repository\FunctionaryRepository
   * @inject
  */
  protected $functionaryRepository;

  public function __construct() {

    parent::__construct();
    $this->functionaryRepository = $this->objectManager->get(\RG\Rgdvoconnector\Domain\Repository\FunctionaryRepository::class);

  }

  /**
   * Handle the ID to alias convert.
   *
   * @param $value
   *
   * @return string
   */
  protected function id2alias($value) {

    $functionary = $this->functionaryRepository->findByID($value);

    $alias = $functionary->getLastName() . self::SEPARATOR_OFFSET . $functionary->getFirstName() . self::SEPARATOR_OFFSET . dechex(intval($functionary->getID()));

    return $this->cleanUrl($alias);

  }

}
