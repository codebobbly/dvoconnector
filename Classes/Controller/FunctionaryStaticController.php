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
            'associationID' => $this->settings['associationID'],
            'filter' => $this->getFunctionariesFilter()
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
            'associationID' => $this->settings['associationID'],
            'functionaryID' => $this->settings['functionaryID']
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
