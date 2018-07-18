<?php
namespace RGU\Dvoconnector\Controller;

class AnnouncementStaticController extends AbstractController
{

    /**
     * list announcements action.
     *
     * @return string
     */
    public function listAnnouncementsAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            'associationID' => $this->settings['associationID'],
            'filter' => $this->getAnnouncementsFilter(),
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * single announcement action.
     *
     * @return string
     */
    public function singleAnnouncementAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            'association' => $this->settings['associationID'],
            'announcementID' => $this->settings['announcementID']
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
