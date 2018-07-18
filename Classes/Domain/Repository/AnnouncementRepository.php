<?php
namespace RGU\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Rgdvoconnector\Domain\Model\Association;
use \RGU\Rgdvoconnector\Domain\Model\Announcement;
use \RGU\Rgdvoconnector\Domain\Model\Announcements;
use \RGU\Rgdvoconnector\Service\AssociationsApiService;

class AnnouncementRepository extends \RGU\Rgdvoconnector\Domain\Repository\GenericRepository {

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
	 * return a announcement
	 *
	 * @param string announcement id $anid
	 *
	 * @return Announcement
 	*/
	public function findByID($anid, $announcementFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementFromID($anid, $announcementFilter);

		$announcement = new Announcement();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Announcement($xmlQuery);
		$mapper->mapToAbstractEntity($announcement);

		return $this->completeEntity($announcement);

	}

	/**
	 * return a announcement
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Association $association
	 * @param string announcement id $anid
	 * @param \RGU\Rgdvoconnector\Domain\Filter\AnnouncementFilter $announcementFilter
	 *
	 * @return Announcement
 	*/
	public function findByAssociationAndID($association, $anid, $announcementFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementFromAssociation($association->getID(), $anid, $announcementFilter);

		$announcement = new Announcement();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Announcement($xmlQuery);
		$mapper->mapToAbstractEntity($announcement);

		return $this->completeEntity($announcement);

	}

	/**
	 * return all announcements
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RGU\Rgdvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
	 *
	 * @return Announcements
 	*/
	public function findAnnouncementsByAssociation($association, $announcementsFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementsFromAssociation($association->getID(), $announcementsFilter);

		$announcements = new Announcements();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Announcements($xmlQuery);
		$mapper->mapToAbstractEntity($announcements);

		return $this->completeEntity($announcements);

	}

	/**
	 * return all announcements
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
	 *
	 * @return Announcements
 	*/
	public function findAnnouncementsByRootAssociations($announcementsFilter = null) {

		$arrayWithAnnouncements = $this->associationsApiService->getAnnouncementsFromRootAssociations($announcementsFilter);

		$announcements = new Announcements();

		foreach ($arrayWithAnnouncements as $xmlQuery) {

				$mapper = new \RGU\Rgdvoconnector\Mapper\Announcements($xmlQuery);
				$mapper->mapToAbstractEntity($announcements);

		}

		return $this->completeEntity($announcements);

	}

}
