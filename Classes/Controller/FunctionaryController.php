<?php
namespace RGU\Dvoconnector\Controller;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class FunctionaryController extends AbstractController {

	/**
	 * list functionaries action.
	 * @param string $filter Filter
	 *
	 * @return string
	 */
	public function listFunctionariesAction(string $filter = null) {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'associationID' => $this->settings['associationID'],
			'filter' => $this->getFunctionariesFilter($filter),
			'userFilter' => $this->getUserFunctionariesFilter($filter)
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

	/**
	 * filter action
	 * @param array $filter Filter
   */
	public function filterFunctionariesAction(array $filter) {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$arguments = $this->request->getArguments();

		$filtertext = $this->arrayToFiltertext($filter);

		$arguments['filter'] = $filtertext;

		$this->redirect('listFunctionaries', null, null, $arguments);

	}

	/**
	 * detail functionary action.
	 *
	 * @param string $fID functionary ID
	 *
	 * @return string
	 */
	public function detailFunctionaryAction(string $fID) {

		$this->checkStaticTemplateIsIncluded();
		$this->checkSettings();

		$this->slotExtendedAssignMultiple([
			'associationID' => $this->settings['associationID'],
			'functionaryID' => $fID
		], __CLASS__, __FUNCTION__);

		return $this->view->render();

	}

}
