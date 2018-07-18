<?php

namespace RGU\Dvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RGU\Dvoconnector\Domain\Filter\AssociationFilter;
use RGU\Dvoconnector\Domain\Filter\EventFilter;

class EventViewHelper extends AbstractDvoContextApiViewHelper {

  /**
   * @var string
   */
  const ARGUMENT_ASSOCIATIONID = 'associationID';

  /**
   * @var string
   */
  const ARGUMENT_EVENTID = 'eventID';

  /**
   * @var string
   */
  const ARGUMENT_AS = 'as';

  /**
   * @var string
   */
  const ARGUMENT_DEFAULT_AS = 'event';

  /**
   * eventRepository
   * @var \RGU\Dvoconnector\Domain\Repository\EventRepository
   * @inject
   */
  protected $eventRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association of the event', false);
      $this->registerArgument(self::ARGUMENT_EVENTID, 'string', 'The id of the event', true);
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the event variable', false, self::ARGUMENT_DEFAULT_AS);

  }


  /**
   * Renders the view
   *
   * @return string The rendered view
   */
  public function render() {

    $associationID = $this->arguments[self::ARGUMENT_ASSOCIATIONID];
    $eventID = $this->arguments[self::ARGUMENT_EVENTID];

    $associationFilter = $this->getDefaultAssociationFilter();
    $eventFilter = $this->getDefaultEventFilter();

    if(empty($associationID)) {

      $event = $this->associationRepository->findByID($eventID);

    } else {

      $association = $this->associationRepository->findByID($associationID, $associationFilter);

      $event = $this->eventRepository->findByAssociationAndID($association, $eventID, $eventFilter);

    }

    $event->setAssociation($this->associationRepository->findByID($event->getAssociation()->getID(), $associationFilter));

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $event);
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
