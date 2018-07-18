<?php
namespace RGU\Dvoconnector\Controller;

class AnnouncementController extends AbstractController
{

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
     * list announcements action.
     * @param string $filter Filter
     *
     * @return string
     */
    public function listAnnouncementsAction(string $filter = null)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            'associationID' => $this->settings['associationID'],
            'filter' => $this->getAnnouncementsFilter($filter),
            'userFilter' => $this->getUserAnnouncementsFilter($filter)
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * detail announcement action.
     *
     * @param string $anID announcement ID
     *
     * @return string
     */
    public function detailAnnouncementAction(string $anID)
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            'associationID' => $this->settings['associationID'],
            'announcementID' => $anID
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
