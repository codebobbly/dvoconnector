<?php
namespace RGU\Dvoconnector\Controller;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class EventController extends AbstractController {

	/**
	 * filter action
	 * @param array $filter Filter
   */
	public function filterEventsAction(array $filter) {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$arguments = $this->request->getArguments();

		$filtertext = $this->arrayToFiltertext($filter);

		$arguments['filter'] = $filtertext;

		$this->redirect('listEvents', null, null, $arguments);

	}

	/**
	 * list events action.
	 * @param string $filter Filter
	 *
	 * @return string
	 */
	public function listEventsAction(string $filter = null) {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'associationID' => $this->settings['associationID'],
			'filter' => $this->getEventsFilter($filter),
			'userFilter' => $this->getUserEventsFilter($filter)
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

	/**
	 * detail event action.
	 *
	 * @param string $eID event ID
	 *
	 * @return string
	 */
	public function detailEventAction(string $eID) {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'associationID' => $this->settings['associationID'],
			'eventID' => $eID
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

}
