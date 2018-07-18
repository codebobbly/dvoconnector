<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Controller;
=======
namespace RG\Rgdvoconnector\Controller;
>>>>>>> parent of 8432775... Change Namespace

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class AnnouncementStaticController extends AbstractController {

	/**
	 * list announcements action.
	 *
	 * @return string
	 */
	public function listAnnouncementsAction() {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'associationID' => $this->settings['associationID'],
			'filter' => $this->getAnnouncementsFilter(),
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

	/**
	 * single announcement action.
	 *
	 * @return string
	 */
	public function singleAnnouncementAction() {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'association' => $this->settings['associationID'],
			'announcementID' => $this->settings['announcementID']
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

}
