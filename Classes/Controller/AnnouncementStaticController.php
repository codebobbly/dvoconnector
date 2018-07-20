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
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FILTER => $this->getAnnouncementsFilter(),
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
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_ANNOUNCEMENT_ID => $this->settings[self::SETTINGS_ANNOUNCEMENT_ID]
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
