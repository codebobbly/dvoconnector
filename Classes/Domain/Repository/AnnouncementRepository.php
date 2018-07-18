<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Dvoconnector\Domain\Model\Association;
use \RGU\Dvoconnector\Domain\Model\Announcement;
use \RGU\Dvoconnector\Domain\Model\Announcements;
use \RGU\Dvoconnector\Service\AssociationsApiService;

class AnnouncementRepository extends \RGU\Dvoconnector\Domain\Repository\GenericRepository {

	/**
	 * associationRepository
	 * @var RGU\Dvoconnector\Domain\Repository\AssociationRepository
=======
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
	 * return a announcement
	 *
	 * @param string announcement id $anid
	 *
	 * @return Announcement
 	*/
	public function findByID($anid, $announcementFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementFromID($anid, $announcementFilter);

		$announcement = new Announcement();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Announcement($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Announcement($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($announcement);

		return $this->completeEntity($announcement);

	}

	/**
	 * return a announcement
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Association $association
	 * @param string announcement id $anid
	 * @param \RGU\Dvoconnector\Domain\Filter\AnnouncementFilter $announcementFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param string announcement id $anid
	 * @param \RG\Rgdvoconnector\Domain\Filter\AnnouncementFilter $announcementFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Announcement
 	*/
	public function findByAssociationAndID($association, $anid, $announcementFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementFromAssociation($association->getID(), $anid, $announcementFilter);

		$announcement = new Announcement();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Announcement($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Announcement($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($announcement);

		return $this->completeEntity($announcement);

	}

	/**
	 * return all announcements
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Association $association
	 * @param \RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RG\Rgdvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Announcements
 	*/
	public function findAnnouncementsByAssociation($association, $announcementsFilter = null) {

		$xmlQuery = $this->associationsApiService->getAnnouncementsFromAssociation($association->getID(), $announcementsFilter);

		$announcements = new Announcements();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Announcements($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Announcements($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($announcements);

		return $this->completeEntity($announcements);

	}

	/**
	 * return all announcements
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Announcements
 	*/
	public function findAnnouncementsByRootAssociations($announcementsFilter = null) {

		$arrayWithAnnouncements = $this->associationsApiService->getAnnouncementsFromRootAssociations($announcementsFilter);

		$announcements = new Announcements();

		foreach ($arrayWithAnnouncements as $xmlQuery) {

<<<<<<< HEAD
				$mapper = new \RGU\Dvoconnector\Mapper\Announcements($xmlQuery);
=======
				$mapper = new \RG\Rgdvoconnector\Mapper\Announcements($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
				$mapper->mapToAbstractEntity($announcements);

		}

		return $this->completeEntity($announcements);

	}

}
