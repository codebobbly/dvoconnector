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

class Announcements extends ListEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Announcement>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Announcement>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $announcements;

	public function __construct() {
		$this->announcements = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Announcement
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Announcement $announcement
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Announcement $announcement
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function addAnnouncement($announcement)
	{
			$this->getAnnouncements()->attach($announcement);
	}

	 /**
	 * Removes a Announcement
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Announcement $announcement
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Announcement $announcement
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function removeAnnouncement($announcement)
	{
			$this->getAnnouncements()->detach($announcement);
	}

	/**
	 * returns the Announcements
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Announcement>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Announcement>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getAnnouncements() {
		return $this->announcements;
	}

}
