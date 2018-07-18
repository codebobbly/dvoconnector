<?php

namespace RGU\Dvoconnector\Service\Url;

use RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter;

/**
 * RealUrl.
 */
class RealUrlAnnouncement extends AbstractRealUrl {

  /**
   * $announcementRepository
   * @var RGU\Dvoconnector\Domain\Repository\AnnouncementRepository
   * @inject
  */
  protected $announcementRepository;

  public function __construct() {

    parent::__construct();
    $this->announcementRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\AnnouncementRepository::class);

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
