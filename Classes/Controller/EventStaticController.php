<?php
namespace RGU\Dvoconnector\Controller;

class EventStaticController extends AbstractController
{

    /**
     * list events action.
     *
     * @return string
     */
    public function listEventsAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            'associationID' => $this->settings['associationID'],
            'filter' => $this->getEventsFilter()
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * single event action.
     *
     * @return string
     */
    public function singleEventAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            'associationID' => $this->settings['associationID'],
            'event' => $this->settings['eventID']
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
