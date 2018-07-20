<?php
namespace RGU\Dvoconnector\Controller;

class EventController extends AbstractController
{

    /**
     * filter action
     * @param array $filter Filter
   */
    public function filterEventsAction(array $filter)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $arguments = $this->request->getArguments();

        $filtertext = $this->arrayToFiltertext($filter);

        $arguments[self::ARGUMENT_FILTER] = $filtertext;

        $this->redirect('listEvents', null, null, $arguments);
    }

    /**
     * list events action.
     * @param string $filter Filter
     *
     * @return string
     */
    public function listEventsAction(string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FILTER => $this->getEventsFilter($filter),
            self::VIEW_VARIABLE_USER_FILTER => $this->getUserEventsFilter($filter)
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
    public function detailEventAction(string $eID)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_EVENT_ID => $eID
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
