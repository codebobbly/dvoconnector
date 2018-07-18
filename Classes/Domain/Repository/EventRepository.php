<?php
namespace RGU\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Rgdvoconnector\Domain\Model\Association;
use \RGU\Rgdvoconnector\Domain\Model\Event;
use \RGU\Rgdvoconnector\Domain\Model\Events;
use \RGU\Rgdvoconnector\Service\AssociationsApiService;

class EventRepository extends \RGU\Rgdvoconnector\Domain\Repository\GenericRepository {

	/**
	 * associationRepository
	 * @var RGU\Rgdvoconnector\Domain\Repository\AssociationRepository
	 * @inject
     */
	protected $associationRepository;

	/**
	 * $associationsApiService
	 * @var \RGU\Rgdvoconnector\Service\AssociationsApiService
	 * @inject
 	*/
	protected $associationsApiService;

	/**
	 * Finds an object matching the given identifier.
	 *
	 * @param int $uid The identifier of the object to find
	 *
	 * @throws \RuntimeException
	 * @throws \InvalidArgumentException
	 * @return object The matching object
	 * @api
	 */
	public function findByUid($uid) {
		return $this->findByID($uid);
	}

	/**
	 * return a event
	 *
	 * @param string event id $eid
	 *
	 * @return Event
 	*/
	public function findByID($eid, $eventFilter = null) {

		$xmlQuery = $this->associationsApiService->getEventFromID($eid, $eventFilter);

		$event = new Event();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Event($xmlQuery);
		$mapper->mapToAbstractEntity($event);

		return $this->completeEntity($event);

	}

	/**
	 * return a event
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Association $association
	 * @param string event id $eid
	 * @param \RGU\Rgdvoconnector\Domain\Filter\EventFilter $eventFilter
	 *
	 * @return Event
 	*/
	public function findByAssociationAndID($association, $eid, $eventFilter = null) {

		$xmlQuery = $this->associationsApiService->getEventFromAssociation($association->getID(), $eid, $eventFilter);

		$event = new Event();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Event($xmlQuery);
		$mapper->mapToAbstractEntity($event);

		return $this->completeEntity($event);

	}

	/**
	 * return all events
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RGU\Rgdvoconnector\Domain\Filter\EventsFilter $eventsFilter
	 *
	 * @return Events
 	*/
	public function findEventsByAssociation($association, $eventsFilter = null) {

		$xmlQuery = $this->associationsApiService->getEventsFromAssociation($association->getID(), $eventsFilter);

		$events = new Events();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Events($xmlQuery);
		$mapper->mapToAbstractEntity($events);

		return $this->completeEntity($events);

	}

	/**
	 * return all events
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Filter\EventsFilter $eventsFilter
	 *
	 * @return Events
 	*/
	public function findEventsByRootAssociations($eventsFilter = null) {

		$arrayWithEvents = $this->associationsApiService->getEventsFromRootAssociations($eventsFilter);

		$events = new Events();

		foreach ($arrayWithEvents as $xmlQuery) {

				$mapper = new \RGU\Rgdvoconnector\Mapper\Events($xmlQuery);
				$mapper->mapToAbstractEntity($events);

		}

		return $this->completeEntity($events);

	}

}
