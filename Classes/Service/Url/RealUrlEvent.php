<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Service\Url;

use RGU\Dvoconnector\Domain\Filter\EventsFilter;
=======
namespace RG\Rgdvoconnector\Service\Url;

use RG\Rgdvoconnector\Domain\Filter\EventsFilter;
>>>>>>> parent of 8432775... Change Namespace

/**
 * RealUrl.
 */
class RealUrlEvent extends AbstractRealUrl {

  /**
   * eventRepository
<<<<<<< HEAD
   * @var RGU\Dvoconnector\Domain\Repository\EventRepository
=======
   * @var RG\Rgdvoconnector\Domain\Repository\EventRepository
>>>>>>> parent of 8432775... Change Namespace
   * @inject
  */
  protected $eventRepository;

  public function __construct() {

    parent::__construct();
<<<<<<< HEAD
    $this->eventRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\EventRepository::class);
=======
    $this->eventRepository = $this->objectManager->get(\RG\Rgdvoconnector\Domain\Repository\EventRepository::class);
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

    $event = $this->eventRepository->findByID($value);

    $alias = $event->getTitle(). self::SEPARATOR_OFFSET . dechex(intval($event->getID()));

    return $this->cleanUrl($alias);

  }

}
