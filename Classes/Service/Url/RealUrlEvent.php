<?php

namespace RGU\Dvoconnector\Service\Url;

/**
 * RealUrl.
 */
class RealUrlEvent extends AbstractRealUrl
{

  /**
   * eventRepository
   * @var RGU\Dvoconnector\Domain\Repository\EventRepository
   * @inject
  */
    protected $eventRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\EventRepository::class);
    }

    /**
     * Handle the ID to alias convert.
     *
     * @param $value
     *
     * @return string
     */
    protected function id2alias($value)
    {
        $event = $this->eventRepository->findByID($value);

        $alias = $event->getTitle() . self::SEPARATOR_OFFSET . dechex(intval($event->getID()));

        return $this->cleanUrl($alias);
    }
}
