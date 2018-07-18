<?php
namespace RGU\Rgdvoconnector\Domain\Model;
/** copyright notice **/
use RGU\Rgdvoconnector\Domain\Model\ListEntity;

class Events extends ListEntity {

	/**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Rgdvoconnector\Domain\Model\Event>
   */
  protected $events;

	public function __construct() {
		$this->events = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Event
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Domain\Model\Event $Event
	 * @return void
	 */
	public function addEvent($event)
	{
			$this->getEvents()->attach($event);
	}

	 /**
	 * Removes a Events
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Domain\Model\Event $Event
	 * @return void
	 */
	public function removeEvent($event)
	{
			$this->getEvents()->detach($event);
	}

	/**
	 * returns the Events
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Rgdvoconnector\Domain\Model\Event>
	 */
	public function getEvents() {
		return $this->events;
	}

}
