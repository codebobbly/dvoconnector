<?php
namespace RGU\Dvoconnector\Controller;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Extbase\Mvc\Controller\Arguments;

class AssociationStaticController extends AbstractController {

	/**
	 * list associations action.
	 *
	 *
	 * @return string
	 */
	public function listAssociationsAction() {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'associationID' => $this->settings['associationID'],
			'filter' => $this->getAssociationsFilter()
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

	/**
	 * single association action.
	 *
	 * @return string
	 */
	public function singleAssociationAction() {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'associationID' => $this->settings['associationID']
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

}
