<?php
namespace RGU\Dvoconnector\Controller;

class AssociationStaticController extends AbstractController
{

    /**
     * list associations action.
     *
     *
     * @return string
     */
    public function listAssociationsAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID],
            self::VIEW_VARIABLE_FILTER => $this->getAssociationsFilter()
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }

    /**
     * single association action.
     *
     * @return string
     */
    public function singleAssociationAction()
    {
        $this->checkStaticTemplateIsIncluded();
        $this->checkSettings();

        $this->slotExtendedAssignMultiple([
            self::VIEW_VARIABLE_ASSOCIATION_ID => $this->settings[self::SETTINGS_ASSOCIATION_ID]
        ], __CLASS__, __FUNCTION__);

        return $this->view->render();
    }
}
