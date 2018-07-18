<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Service\Url;

use RGU\Dvoconnector\Domain\Filter\FunctionariesFilter;
=======
namespace RG\Rgdvoconnector\Service\Url;

use RG\Rgdvoconnector\Domain\Filter\FunctionariesFilter;
>>>>>>> parent of 8432775... Change Namespace

/**
 * RealUrl.
 */
class RealUrlFunctionary extends AbstractRealUrl {

  /**
   * $functionaryRepository
<<<<<<< HEAD
   * @var RGU\Dvoconnector\Domain\Repository\FunctionaryRepository
=======
   * @var RG\Rgdvoconnector\Domain\Repository\FunctionaryRepository
>>>>>>> parent of 8432775... Change Namespace
   * @inject
  */
  protected $functionaryRepository;

  public function __construct() {

    parent::__construct();
<<<<<<< HEAD
    $this->functionaryRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\FunctionaryRepository::class);
=======
    $this->functionaryRepository = $this->objectManager->get(\RG\Rgdvoconnector\Domain\Repository\FunctionaryRepository::class);
>>>>>>> parent of 8432775... Change Namespace

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
