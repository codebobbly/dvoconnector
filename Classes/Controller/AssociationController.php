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

        $arguments['filter'] = $filtertext;

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

        $arguments['filter'] = $filtertext;

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

        $arguments['filter'] = $filtertext;

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

        $arguments['filter'] = $filtertext;

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
            'associationID' => $aID,
            'filter' => $this->getAssociationsFilter($filter),
            'userFilter' => $this->getUserAssociationsFilter($filter)
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
            'associationID' => $this->settings['associationID'],
            'filter' => $this->getAssociationsFilter($filter),
            'userFilter' => $this->getUserAssociationsFilter($filter)
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
            'associationID' => $aID
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
            'associationID' => $aID,
            'eventID' => $eID
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
            'associationID' => $aID,
            'filter' => $this->getEventsFilter($filter),
            'userFilter' => $this->getUserEventsFilter($filter)
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
            'associationID' => $aID,
            'announcementID' => $anID
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
            'associationID' => $aID,
            'filter' => $this->getAnnouncementsFilter($filter),
            'userFilter' => $this->getUserAnnouncementsFilter($filter)
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
            'associationID' => $aID,
            'functionaryID' => $fID
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
            'associationID' => $aID,
            'filter' => $this->getFunctionariesFilter($filter),
            'userFilter' => $this->getUserFunctionariesFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
