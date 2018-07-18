<?php

namespace RGU\Rgdvoconnector\Service\Url;

use RGU\Rgdvoconnector\Domain\Filter\EventsFilter;

/**
 * RealUrl.
 */
class RealUrlEvent extends AbstractRealUrl {

  /**
   * eventRepository
   * @var RGU\Rgdvoconnector\Domain\Repository\EventRepository
   * @inject
  */
  protected $eventRepository;

  public function __construct() {

    parent::__construct();
    $this->eventRepository = $this->objectManager->get(\RGU\Rgdvoconnector\Domain\Repository\EventRepository::class);

  }

  /**
   * Handle the ID to alias convert.
   *
   * @param $value
   *
   * @return string
   */
  protected function id2alias($value) {

    $event = $this->eventRepository->findByID($value);

    $alias = $event->getTitle(). self::SEPARATOR_OFFSET . dechex(intval($event->getID()));

    return $this->cleanUrl($alias);

  }

}
