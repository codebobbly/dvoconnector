<?php

namespace RGU\Dvoconnector\ViewHelpers;

class FunctionaryViewHelper extends AbstractDvoContextApiViewHelper
{

  /**
   * @var string
   */
    const ARGUMENT_ASSOCIATIONID = 'associationID';

    /**
     * @var string
     */
    const ARGUMENT_EVENTID = 'functionaryID';

    /**
     * @var string
     */
    const ARGUMENT_AS = 'as';

    /**
     * @var string
     */
    const ARGUMENT_DEFAULT_AS = 'functionary';

    /**
     * functionaryRepository
     * @var \RGU\Dvoconnector\Domain\Repository\FunctionaryRepository
     * @inject
     */
    protected $functionaryRepository;

    /**
     * @return void
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association of the functionary', false);
        $this->registerArgument(self::ARGUMENT_EVENTID, 'string', 'The id of the functionary', true);
        $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the functionary variable', false, self::ARGUMENT_DEFAULT_AS);
    }

    /**
     * Renders the view
     *
     * @return string The rendered view
     */
    public function render()
    {
        $associationID = $this->arguments[self::ARGUMENT_ASSOCIATIONID];
        $functionaryID = $this->arguments[self::ARGUMENT_EVENTID];

        $associationFilter = $this->getDefaultAssociationFilter();
        $functionaryFilter = $this->getDefaultFunctionaryFilter();

        if (empty($associationID)) {
            $functionary = $this->functionaryRepository->findByID($association, $functionaryID, $functionaryFilter);
        } else {
            $association = $this->associationRepository->findByID($associationID, $associationFilter);

            $functionary = $this->functionaryRepository->findByAssociationAndID($association, $functionaryID, $functionaryFilter);
        }

        $functionary->setAssociation($this->associationRepository->findByID($functionary->getAssociation()->getID(), $associationFilter));

        $this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $functionary);
        $output = $this->renderChildren();
        $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

        return $output;
    }
}
