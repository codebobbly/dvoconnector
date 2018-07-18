<?php
namespace RG\Rgdvoconnector\Domain\Model;
/** copyright notice **/
use RG\Rgdvoconnector\Domain\Model\ListEntity;

class Events extends ListEntity {

	/**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Event>
   */
  protected $events;

	public function __construct() {
		$this->events = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Event
	 *
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Event $Event
	 * @return void
	 */
	public function addEvent($event)
	{
			$this->getEvents()->attach($event);
	}

	 /**
	 * Removes a Events
	 *
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Event $Event
	 * @return void
	 */
	public function removeEvent($event)
	{
			$this->getEvents()->detach($event);
	}

	/**
	 * returns the Events
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Event>
	 */
	public function getEvents() {
		return $this->events;
	}

}
