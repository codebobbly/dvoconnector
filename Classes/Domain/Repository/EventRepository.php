<?php
namespace RG\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RG\Rgdvoconnector\Domain\Model\Association;
use \RG\Rgdvoconnector\Domain\Model\Event;
use \RG\Rgdvoconnector\Domain\Model\Events;
use \RG\Rgdvoconnector\Service\AssociationsApiService;

class EventRepository extends \RG\Rgdvoconnector\Domain\Repository\GenericRepository {

	/**
	 * associationRepository
	 * @var RG\Rgdvoconnector\Domain\Repository\AssociationRepository
	 * @inject
     */
	protected $associationRepository;

	/**
	 * $associationsApiService
	 * @var \RG\Rgdvoconnector\Service\AssociationsApiService
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

		$mapper = new \RG\Rgdvoconnector\Mapper\Event($xmlQuery);
		$mapper->mapToAbstractEntity($event);

		return $this->completeEntity($event);

	}

	/**
	 * return a event
	 *
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param string event id $eid
	 * @param \RG\Rgdvoconnector\Domain\Filter\EventFilter $eventFilter
	 *
	 * @return Event
 	*/
	public function findByAssociationAndID($association, $eid, $eventFilter = null) {

		$xmlQuery = $this->associationsApiService->getEventFromAssociation($association->getID(), $eid, $eventFilter);

		$event = new Event();

		$mapper = new \RG\Rgdvoconnector\Mapper\Event($xmlQuery);
		$mapper->mapToAbstractEntity($event);

		return $this->completeEntity($event);

	}

	/**
	 * return all events
	 *
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RG\Rgdvoconnector\Domain\Filter\EventsFilter $eventsFilter
	 *
	 * @return Events
 	*/
	public function findEventsByAssociation($association, $eventsFilter = null) {

		$xmlQuery = $this->associationsApiService->getEventsFromAssociation($association->getID(), $eventsFilter);

		$events = new Events();

		$mapper = new \RG\Rgdvoconnector\Mapper\Events($xmlQuery);
		$mapper->mapToAbstractEntity($events);

		return $this->completeEntity($events);

	}

	/**
	 * return all events
	 *
	 * @param \RG\Rgdvoconnector\Domain\Filter\EventsFilter $eventsFilter
	 *
	 * @return Events
 	*/
	public function findEventsByRootAssociations($eventsFilter = null) {

		$arrayWithEvents = $this->associationsApiService->getEventsFromRootAssociations($eventsFilter);

		$events = new Events();

		foreach ($arrayWithEvents as $xmlQuery) {

				$mapper = new \RG\Rgdvoconnector\Mapper\Events($xmlQuery);
				$mapper->mapToAbstractEntity($events);

		}

		return $this->completeEntity($events);

	}

}
