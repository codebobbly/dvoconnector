<?php
namespace RGU\Dvoconnector\Controller;

class AssociationController extends AbstractController
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
     * filter action
     * @param array $filter Filter
   */
    public function filterAssociationsAction(array $filter)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $arguments = $this->request->getArguments();

        $filtertext = $this->arrayToFiltertext($filter);

        $arguments[self::ARGUMENT_FILTER] = $filtertext;

        $this->redirect('listAssociations', null, null, $arguments);
    }

    /**
     * filter action
     * @param array $filter Filter
   */
    public function filterAnnouncementsAction(array $filter)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $arguments = $this->request->getArguments();

        $filtertext = $this->arrayToFiltertext($filter);

        $arguments[self::ARGUMENT_FILTER] = $filtertext;

        $this->redirect('listAnnouncements', null, null, $arguments);
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
     * index action.
     *
     * @return string
     */
    public function indexAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $arguments = $this->request->getArguments();
        return $this->forward('listAssociations', null, null, $arguments);
    }

    /**
     * list sub associations action.
     *
     * @param string $aID parent associations ID
     * @param string $filter Filter
     *
     * @return string
     */
    public function listSubAssociationsAction(string $aID = null, string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID,
            self::VIEW_VARIABLE_FILTER => $this->getAssociationsFilter($filter),
            self::VIEW_VARIABLE_USER_FILTER => $this->getUserAssociationsFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * list associations action.
     *
     * @param string $filter Filter
     *
     * @return string
     */
    public function listAssociationsAction(string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FILTER => $this->getAssociationsFilter($filter),
            self::VIEW_VARIABLE_USER_FILTER => $this->getUserAssociationsFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * detail association action.
     *
     * @param string $aID association ID
     *
     * @return string
     */
    public function detailAssociationAction(string $aID)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * detail event action.
     *
     * @param string $aID association ID
     * @param string $eID event ID
     *
     * @return string
     */
    public function detailEventAction(string $aID, string $eID)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID,
            self::VIEW_VARIABLE_EVENT_ID => $eID
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * list events action.
     *
     * @param string $aID association ID
     * @param string $filter Filter
     *
     * @return string
     */
    public function listEventsAction(string $aID, string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID,
            self::VIEW_VARIABLE_FILTER => $this->getEventsFilter($filter),
            self::VIEW_VARIABLE_USER_FILTER => $this->getUserEventsFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * detail announcement action.
     *
     * @param string $aID association ID
     * @param string $anID announcement ID
     *
     * @return string
     */
    public function detailAnnouncementAction(string $aID, string $anID)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID,
            self::VIEW_VARIABLE_ANNOUNCEMENT_ID => $anID
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * list announcements action.
     *
     * @param string $aID association ID
     * @param string $filter Filter
     *
     * @return string
     */
    public function listAnnouncementsAction(string $aID, string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID,
            self::VIEW_VARIABLE_FILTER => $this->getAnnouncementsFilter($filter),
            self::VIEW_VARIABLE_USER_FILTER => $this->getUserAnnouncementsFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * detail functionary action.
     *
     * @param string $aID association ID
     * @param string $fID functionary ID
     *
     * @return string
     */
    public function detailFunctionaryAction(string $aID, string $fID)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID,
            self::VIEW_VARIABLE_FUNCTIONARY_ID => $fID
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * list functionaries action.
     *
     * @param string $aID association ID
     * @param string $filter Filter
     *
     * @return string
     */
    public function listFunctionariesAction(string $aID, string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $aID,
            self::VIEW_VARIABLE_FILTER => $this->getFunctionariesFilter($filter),
            self::VIEW_VARIABLE_USER_FILTER => $this->getUserFunctionariesFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
