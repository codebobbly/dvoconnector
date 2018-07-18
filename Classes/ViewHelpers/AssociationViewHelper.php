<?php

namespace RGU\Dvoconnector\ViewHelpers;

class AssociationViewHelper extends AbstractDvoContextApiViewHelper
{

  /**
   * @var string
   */
    const ARGUMENT_ASSOCIATIONID = 'associationID';

    /**
     * @var string
     */
    const ARGUMENT_AS = 'as';

    /**
     * @var string
     */
    const ARGUMENT_DEFAULT_AS = 'association';

    /**
     * @return void
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association of the event', false);
        $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the event variable', false, self::ARGUMENT_DEFAULT_AS);
    }

    /**
     * Renders the view
     *
     * @return string The rendered view
     */
    public function render()
    {
        $associationID = $this->arguments[self::ARGUMENT_ASSOCIATIONID];

        $associationFilter = $this->getDefaultAssociationFilter();

        if (empty($associationID)) {
            $association = $this->associationRepository->getFirstRootAssociation($associationFilter);
        } else {
            $association = $this->associationRepository->findByID($associationID, $associationFilter);
        }

        $this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $association);
        $output = $this->renderChildren();
        $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

        return $output;
    }
}
