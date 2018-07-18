<?php

namespace RG\Rgdvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RG\Rgdvoconnector\Domain\Filter\AssociationFilter;
use RG\Rgdvoconnector\Domain\Filter\FunctionariesFilter;

use TYPO3\CMS\Extbase\Property\PropertyMapper;

class FunctionariesViewHelper extends AbstractDvoContextApiViewHelper {

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
  const ARGUMENT_FILTER_ROLE = 'fRole';

  /**
   * @var string
   */
  const ARGUMENT_DEFAULT_AS = 'events';

  /**
   * @var string
   */
  const PROPERTY_FILTER_ROLE = 'role';

  /**
   * functionaryRepository
   * @var \RG\Rgdvoconnector\Domain\Repository\FunctionaryRepository
   * @inject
   */
  protected $functionaryRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association', false);
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the functionaries variable', false, self::ARGUMENT_DEFAULT_AS);
      $this->registerArgument(self::ARGUMENT_FILTER_ROLE, 'string', 'Role of the functionaries', false);

  }

  /**
   * Get the filter values as array
   *
   * @return array
   */
  protected function getFilterArray() {

    return array_merge(parent::getFilterArray(), array(
      self::PROPERTY_FILTER_ROLE => $this->arguments[self::ARGUMENT_FILTER_ROLE]
    ));

  }

  /**
   * Renders the view
   *
   * @return string The rendered view
   */
  public function render() {

    $associationID = $this->arguments[self::ARGUMENT_ASSOCIATIONID];
    $insideAssociationID = $this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID];

    $filterArray = $this->getFilterArray();
    $filterArray = $this->removeNullValuesFromArray($filterArray);

    $associationFilter = $this->getDefaultAssociationFilter();
    $functionariesFilter = $this->objectManager->get(PropertyMapper::class)->convert($filterArray, FunctionariesFilter::class);

    if(empty($associationID)) {

      $functionaries = $this->functionaryRepository->findFunctionariesByRootAssociations($functionariesFilter);

    } else {

      $association = $this->associationRepository->findByID($associationID, $associationFilter);

      $functionaries = $this->functionaryRepository->findFunctionariesByAssociation($association, $functionariesFilter);

    }

    foreach ($functionaries->getFunctionaries() as $functionary) {
      $functionary->setAssociation($this->associationRepository->findByID($functionary->getAssociation()->getID(), $associationFilter));
    }

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $functionaries);
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
