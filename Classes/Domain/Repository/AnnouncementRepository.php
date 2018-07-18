<?php
namespace RG\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RG\Rgdvoconnector\Domain\Model\Association;
use \RG\Rgdvoconnector\Domain\Model\Announcement;
use \RG\Rgdvoconnector\Domain\Model\Announcements;
use \RG\Rgdvoconnector\Service\AssociationsApiService;

class AnnouncementRepository extends \RG\Rgdvoconnector\Domain\Repository\GenericRepository {

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
	 * return a announcement
	 *
	 * @param string announcement id $anid
	 *
	 * @return Announcement
 	*/
	public function findByID($anid, $announcementFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementFromID($anid, $announcementFilter);

		$announcement = new Announcement();

		$mapper = new \RG\Rgdvoconnector\Mapper\Announcement($xmlQuery);
		$mapper->mapToAbstractEntity($announcement);

		return $this->completeEntity($announcement);

	}

	/**
	 * return a announcement
	 *
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param string announcement id $anid
	 * @param \RG\Rgdvoconnector\Domain\Filter\AnnouncementFilter $announcementFilter
	 *
	 * @return Announcement
 	*/
	public function findByAssociationAndID($association, $anid, $announcementFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementFromAssociation($association->getID(), $anid, $announcementFilter);

		$announcement = new Announcement();

		$mapper = new \RG\Rgdvoconnector\Mapper\Announcement($xmlQuery);
		$mapper->mapToAbstractEntity($announcement);

		return $this->completeEntity($announcement);

	}

	/**
	 * return all announcements
	 *
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RG\Rgdvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
	 *
	 * @return Announcements
 	*/
	public function findAnnouncementsByAssociation($association, $announcementsFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementsFromAssociation($association->getID(), $announcementsFilter);

		$announcements = new Announcements();

		$mapper = new \RG\Rgdvoconnector\Mapper\Announcements($xmlQuery);
		$mapper->mapToAbstractEntity($announcements);

		return $this->completeEntity($announcements);

	}

	/**
	 * return all announcements
	 *
	 * @param \RG\Rgdvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
	 *
	 * @return Announcements
 	*/
	public function findAnnouncementsByRootAssociations($announcementsFilter = null) {

		$arrayWithAnnouncements = $this->associationsApiService->getAnnouncementsFromRootAssociations($announcementsFilter);

		$announcements = new Announcements();

		foreach ($arrayWithAnnouncements as $xmlQuery) {

				$mapper = new \RG\Rgdvoconnector\Mapper\Announcements($xmlQuery);
				$mapper->mapToAbstractEntity($announcements);

		}

		return $this->completeEntity($announcements);

	}

}
