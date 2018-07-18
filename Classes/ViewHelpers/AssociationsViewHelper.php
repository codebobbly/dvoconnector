<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RGU\Dvoconnector\Domain\Filter\AssociationFilter;
use RGU\Dvoconnector\Domain\Filter\AssociationsFilter;
=======
namespace RG\Rgdvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RG\Rgdvoconnector\Domain\Filter\AssociationFilter;
use RG\Rgdvoconnector\Domain\Filter\AssociationsFilter;
>>>>>>> parent of 8432775... Change Namespace

use TYPO3\CMS\Extbase\Property\PropertyMapper;

class AssociationsViewHelper extends AbstractDvoContextApiViewHelper {

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
  const ARGUMENT_FILTER_OFFSET = 'offset';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_LIMIT = 'limit';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_TYPES = 'types';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_NAME = 'name';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_CATEGORYID = 'categoryid';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_REPERTOIREID = 'repertoireid';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_LOCATION = 'location';

  /**
   * @var string
   */
  const ARGUMENT_DEFAULT_AS = 'associations';

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association', false);
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the associations variable', false, self::ARGUMENT_DEFAULT_AS);
      $this->registerArgument(self::ARGUMENT_FILTER_OFFSET, 'integer', 'The offset of the associations', false);
      $this->registerArgument(self::ARGUMENT_FILTER_LIMIT, 'integer', 'The limit of the associations', false);
      $this->registerArgument(self::ARGUMENT_FILTER_TYPES, 'mixed', 'Types of the associations', false);
      $this->registerArgument(self::ARGUMENT_FILTER_NAME, 'string', 'Part of the name for a associations', false);
      $this->registerArgument(self::ARGUMENT_FILTER_CATEGORYID, 'integer', 'ID of the association category', false);
      $this->registerArgument(self::ARGUMENT_FILTER_REPERTOIREID, 'integer', 'ID of the association repertoire', false);
      $this->registerArgument(self::ARGUMENT_FILTER_LOCATION, 'string', 'Location of the association', false);

  }

  /**
   * Get the filter values as array
   *
   * @return array
   */
  protected function getFilterArray() {

    return array_merge(parent::getFilterArray(), array(
      self::ARGUMENT_FILTER_OFFSET => $this->arguments[self::ARGUMENT_FILTER_OFFSET],
      self::ARGUMENT_FILTER_LIMIT => $this->arguments[self::ARGUMENT_FILTER_LIMIT],
      self::ARGUMENT_FILTER_TYPES => $this->arguments[self::ARGUMENT_FILTER_TYPES],
      self::ARGUMENT_FILTER_NAME => $this->arguments[self::ARGUMENT_FILTER_NAME],
      self::ARGUMENT_FILTER_CATEGORYID => $this->arguments[self::ARGUMENT_FILTER_CATEGORYID],
      self::ARGUMENT_FILTER_REPERTOIREID => $this->arguments[self::ARGUMENT_FILTER_REPERTOIREID],
      self::ARGUMENT_FILTER_LOCATION => $this->arguments[self::ARGUMENT_FILTER_LOCATION]
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
    $associationsFilter = $this->objectManager->get(PropertyMapper::class)->convert($filterArray, AssociationsFilter::class);

    if(empty($associationID)) {

      $associations = $this->associationRepository->findAssociationsByRootAssociations($associationsFilter);

    } else {

      $association = $this->associationRepository->findByID($associationID, $associationFilter);

      $associations = $this->associationRepository->findAssociationsByAssociation($association, $associationsFilter);

    }

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $associations);
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
