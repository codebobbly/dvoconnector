<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Dvoconnector\Domain\Model\Association;
use \RGU\Dvoconnector\Domain\Model\Event;
use \RGU\Dvoconnector\Domain\Model\Events;
use \RGU\Dvoconnector\Service\AssociationsApiService;

class EventRepository extends \RGU\Dvoconnector\Domain\Repository\GenericRepository {

	/**
	 * associationRepository
	 * @var RGU\Dvoconnector\Domain\Repository\AssociationRepository
=======
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
>>>>>>> parent of 8432775... Change Namespace
	 * @inject
     */
	protected $associationRepository;

	/**
	 * $associationsApiService
<<<<<<< HEAD
	 * @var \RGU\Dvoconnector\Service\AssociationsApiService
=======
	 * @var \RG\Rgdvoconnector\Service\AssociationsApiService
>>>>>>> parent of 8432775... Change Namespace
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

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Event($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Event($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($event);

		return $this->completeEntity($event);

	}

	/**
	 * return a event
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Association $association
	 * @param string event id $eid
	 * @param \RGU\Dvoconnector\Domain\Filter\EventFilter $eventFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param string event id $eid
	 * @param \RG\Rgdvoconnector\Domain\Filter\EventFilter $eventFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Event
 	*/
	public function findByAssociationAndID($association, $eid, $eventFilter = null) {

		$xmlQuery = $this->associationsApiService->getEventFromAssociation($association->getID(), $eid, $eventFilter);

		$event = new Event();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Event($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Event($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($event);

		return $this->completeEntity($event);

	}

	/**
	 * return all events
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Association $association
	 * @param \RGU\Dvoconnector\Domain\Filter\EventsFilter $eventsFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RG\Rgdvoconnector\Domain\Filter\EventsFilter $eventsFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Events
 	*/
	public function findEventsByAssociation($association, $eventsFilter = null) {

		$xmlQuery = $this->associationsApiService->getEventsFromAssociation($association->getID(), $eventsFilter);

		$events = new Events();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Events($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Events($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($events);

		return $this->completeEntity($events);

	}

	/**
	 * return all events
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Filter\EventsFilter $eventsFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Filter\EventsFilter $eventsFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Events
 	*/
	public function findEventsByRootAssociations($eventsFilter = null) {

		$arrayWithEvents = $this->associationsApiService->getEventsFromRootAssociations($eventsFilter);

		$events = new Events();

		foreach ($arrayWithEvents as $xmlQuery) {

<<<<<<< HEAD
				$mapper = new \RGU\Dvoconnector\Mapper\Events($xmlQuery);
=======
				$mapper = new \RG\Rgdvoconnector\Mapper\Events($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
				$mapper->mapToAbstractEntity($events);

		}

		return $this->completeEntity($events);

	}

}
