<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model;
/** copyright notice **/
use RGU\Dvoconnector\Domain\Model\ListEntity;
=======
namespace RG\Rgdvoconnector\Domain\Model;
/** copyright notice **/
use RG\Rgdvoconnector\Domain\Model\ListEntity;
>>>>>>> parent of 8432775... Change Namespace

class Events extends ListEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Event>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Event>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $events;

	public function __construct() {
		$this->events = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Event
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Event $Event
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Event $Event
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function addEvent($event)
	{
			$this->getEvents()->attach($event);
	}

	 /**
	 * Removes a Events
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Event $Event
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Event $Event
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function removeEvent($event)
	{
			$this->getEvents()->detach($event);
	}

	/**
	 * returns the Events
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Event>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Event>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getEvents() {
		return $this->events;
	}

}
