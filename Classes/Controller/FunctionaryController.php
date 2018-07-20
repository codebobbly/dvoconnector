<?php
namespace RGU\Dvoconnector\Controller;

class FunctionaryController extends AbstractController
{

    /**
     * list functionaries action.
     * @param string $filter Filter
     *
     * @return string
     */
    public function listFunctionariesAction(string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FILTER => $this->getFunctionariesFilter($filter),
            self::VIEW_VARIABLE_USER_FILTER => $this->getUserFunctionariesFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * filter action
     * @param array $filter Filter
   */
    public function filterFunctionariesAction(array $filter)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $arguments = $this->request->getArguments();

        $filtertext = $this->arrayToFiltertext($filter);

        $arguments[self::ARGUMENT_FILTER] = $filtertext;

        $this->redirect('listFunctionaries', null, null, $arguments);
    }

    /**
     * detail functionary action.
     *
     * @param string $fID functionary ID
     *
     * @return string
     */
    public function detailFunctionaryAction(string $fID)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FUNCTIONARY_ID => $fID
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
