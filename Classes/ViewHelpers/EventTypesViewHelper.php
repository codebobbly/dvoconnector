<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\ViewHelpers;
=======
namespace RG\Rgdvoconnector\ViewHelpers;
>>>>>>> parent of 8432775... Change Namespace

class EventTypesViewHelper extends AbstractDvoApiViewHelper {

  /**
   * @var string
   */
  const ARGUMENT_AS = 'as';

  /**
   * metaRepository
<<<<<<< HEAD
   * @var RGU\Dvoconnector\Domain\Repository\MetaRepository
=======
   * @var RG\Rgdvoconnector\Domain\Repository\MetaRepository
>>>>>>> parent of 8432775... Change Namespace
   * @inject
  */
  protected $metaRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the types variable', true);

  }


  /**
   * Renders the view
   *
   * @return string The rendered view
   */
  public function render() {

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $this->metaRepository->findEventTypes()->getTypes());
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
