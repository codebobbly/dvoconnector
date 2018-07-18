<?php

namespace RGU\Dvoconnector\ViewHelpers;

class AssociationRepertoiresViewHelper extends AbstractDvoApiViewHelper {

  /**
   * @var string
   */
  const ARGUMENT_AS = 'as';

  /**
   * metaRepository
   * @var RGU\Dvoconnector\Domain\Repository\MetaRepository
   * @inject
  */
  protected $metaRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the repertoires variable', true);

  }


  /**
   * Renders the view
   *
   * @return string The rendered view
   */
  public function render() {

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $this->metaRepository->findAssociationRepertoires()->getRepertoires());
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
