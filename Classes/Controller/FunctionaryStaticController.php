<?php
namespace RGU\Dvoconnector\Controller;

class FunctionaryStaticController extends AbstractController
{

    /**
     * list functionaries action.
     *
     * @return string
     */
    public function listFunctionariesAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FILTER => $this->getFunctionariesFilter()
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * single functionary action.
     *
     * @return string
     */
    public function singleFunctionaryAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FUNCTIONARY_ID => $this->settings[self::SETTINGS_FUNCTIONARY_ID]
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
