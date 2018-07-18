<?php

namespace RG\Rgdvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RG\Rgdvoconnector\Domain\Filter\AssociationFilter;
use RG\Rgdvoconnector\Domain\Filter\AnnouncementFilter;

class AnnouncementViewHelper extends AbstractDvoContextApiViewHelper {

  /**
   * @var string
   */
  const ARGUMENT_ASSOCIATIONID = 'associationID';

  /**
   * @var string
   */
  const ARGUMENT_EVENTID = 'announcementID';

  /**
   * @var string
   */
  const ARGUMENT_AS = 'as';

  /**
   * @var string
   */
  const ARGUMENT_DEFAULT_AS = 'announcement';

  /**
   * announcementRepository
   * @var \RG\Rgdvoconnector\Domain\Repository\AnnouncementRepository
   * @inject
   */
  protected $announcementRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association of the announcement', false);
      $this->registerArgument(self::ARGUMENT_EVENTID, 'string', 'The id of the announcement', true);
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the announcement variable', false, self::ARGUMENT_DEFAULT_AS);

  }


  /**
   * Renders the view
   *
   * @return string The rendered view
   */
  public function render() {

    $associationID = $this->arguments[self::ARGUMENT_ASSOCIATIONID];
    $announcementID = $this->arguments[self::ARGUMENT_EVENTID];
    $insideAssociationID = $this->arguments[self::ARGUMENT_INSIDEASSOCIATIONID];

    $associationFilter = $this->getDefaultAssociationFilter();
    $announcementFilter = $this->getDefaultAnnouncementFilter();

    if(empty($associationID)) {

      $announcement = $this->announcementRepository->findByID($announcementID, $announcementFilter);

    } else {

      $association = $this->associationRepository->findByID($associationID, $associationFilter);
      $announcement = $this->announcementRepository->findByAssociationAndID($association, $announcementID, $announcementFilter);

    }

    $announcement->setAssociation($this->associationRepository->findByID($announcement->getAssociation()->getID(), $associationFilter));

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $announcement);
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
