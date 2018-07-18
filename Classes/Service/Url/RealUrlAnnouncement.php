<?php

namespace RG\Rgdvoconnector\Service\Url;

use RG\Rgdvoconnector\Domain\Filter\AnnouncementsFilter;

/**
 * RealUrl.
 */
class RealUrlAnnouncement extends AbstractRealUrl {

  /**
   * $announcementRepository
   * @var RG\Rgdvoconnector\Domain\Repository\AnnouncementRepository
   * @inject
  */
  protected $announcementRepository;

  public function __construct() {

    parent::__construct();
    $this->announcementRepository = $this->objectManager->get(\RG\Rgdvoconnector\Domain\Repository\AnnouncementRepository::class);

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
