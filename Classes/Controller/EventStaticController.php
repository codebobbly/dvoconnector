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
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FILTER => $this->getEventsFilter()
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
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_EVENT_ID => $this->settings[self::SETTINGS_EVENT_ID]
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
