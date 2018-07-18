<?php
namespace RGU\Dvoconnector\Domain\Repository;

use RGU\Dvoconnector\Domain\Model\Announcement;
use RGU\Dvoconnector\Domain\Model\Announcements;

class AnnouncementRepository extends \RGU\Dvoconnector\Domain\Repository\GenericRepository
{

    /**
     * associationRepository
     * @var RGU\Dvoconnector\Domain\Repository\AssociationRepository
     * @inject
     */
    protected $associationRepository;

    /**
     * $associationsApiService
     * @var \RGU\Dvoconnector\Service\AssociationsApiService
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
    public function findByUid($uid)
    {
        return $this->findByID($uid);
    }

    /**
     * return a announcement
     *
     * @param string announcement id $anid
     *
     * @return Announcement
    */
    public function findByID($anid, $announcementFilter = null)
    {
        $xmlQuery = $this->associationsApiService->getAnnouncementFromID($anid, $announcementFilter);

        $announcement = new Announcement();

        $mapper = new \RGU\Dvoconnector\Mapper\Announcement($xmlQuery);
        $mapper->mapToAbstractEntity($announcement);

        return $this->completeEntity($announcement);
    }

    /**
     * return a announcement
     *
     * @param \RGU\Dvoconnector\Domain\Model\Association $association
     * @param string announcement id $anid
     * @param \RGU\Dvoconnector\Domain\Filter\AnnouncementFilter $announcementFilter
     *
     * @return Announcement
    */
    public function findByAssociationAndID($association, $anid, $announcementFilter = null)
    {
        $xmlQuery = $this->associationsApiService->getAnnouncementFromAssociation($association->getID(), $anid, $announcementFilter);

        $announcement = new Announcement();

        $mapper = new \RGU\Dvoconnector\Mapper\Announcement($xmlQuery);
        $mapper->mapToAbstractEntity($announcement);

        return $this->completeEntity($announcement);
    }

    /**
     * return all announcements
     *
     * @param \RGU\Dvoconnector\Domain\Model\Association $association
     * @param \RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
     *
     * @return Announcements
    */
    public function findAnnouncementsByAssociation($association, $announcementsFilter = null)
    {
        $xmlQuery = $this->associationsApiService->getAnnouncementsFromAssociation($association->getID(), $announcementsFilter);

        $announcements = new Announcements();

        $mapper = new \RGU\Dvoconnector\Mapper\Announcements($xmlQuery);
        $mapper->mapToAbstractEntity($announcements);

        return $this->completeEntity($announcements);
    }

    /**
     * return all announcements
     *
     * @param \RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter $announcementsFilter
     *
     * @return Announcements
    */
    public function findAnnouncementsByRootAssociations($announcementsFilter = null)
    {
        $arrayWithAnnouncements = $this->associationsApiService->getAnnouncementsFromRootAssociations($announcementsFilter);

        $announcements = new Announcements();

        foreach ($arrayWithAnnouncements as $xmlQuery) {
            $mapper = new \RGU\Dvoconnector\Mapper\Announcements($xmlQuery);
            $mapper->mapToAbstractEntity($announcements);
        }

        return $this->completeEntity($announcements);
    }
}
