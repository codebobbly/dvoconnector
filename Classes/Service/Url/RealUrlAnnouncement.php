<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Service\Url;

use RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter;
=======
namespace RG\Rgdvoconnector\Service\Url;

use RG\Rgdvoconnector\Domain\Filter\AnnouncementsFilter;
>>>>>>> parent of 8432775... Change Namespace

/**
 * RealUrl.
 */
class RealUrlAnnouncement extends AbstractRealUrl {

  /**
   * $announcementRepository
<<<<<<< HEAD
   * @var RGU\Dvoconnector\Domain\Repository\AnnouncementRepository
=======
   * @var RG\Rgdvoconnector\Domain\Repository\AnnouncementRepository
>>>>>>> parent of 8432775... Change Namespace
   * @inject
  */
  protected $announcementRepository;

  public function __construct() {

    parent::__construct();
<<<<<<< HEAD
    $this->announcementRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\AnnouncementRepository::class);
=======
    $this->announcementRepository = $this->objectManager->get(\RG\Rgdvoconnector\Domain\Repository\AnnouncementRepository::class);
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

    $announcement = $this->announcementRepository->findByID($value);

    $alias = $announcement->getTitle() . self::SEPARATOR_OFFSET . dechex(intval($announcement->getID()));

    return $this->cleanUrl($alias);

  }

}
