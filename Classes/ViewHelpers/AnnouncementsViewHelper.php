<?php

namespace RGU\Dvoconnector\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use RGU\Dvoconnector\Domain\Filter\AssociationFilter;
use RGU\Dvoconnector\Domain\Filter\AnnouncementsFilter;

use TYPO3\CMS\Extbase\Property\PropertyMapper;

class AnnouncementsViewHelper extends AbstractDvoContextApiViewHelper {

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
  const ARGUMENT_FILTER_CHILDS = 'childs';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_TEXT = 'text';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_DATESTART = 'startDate';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_DATEEND = 'endDate';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_ZIPSTART = 'zipStart';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_ZIPEND = 'zipEnd';

  /**
   * @var string
   */
  const ARGUMENT_FILTER_LOCATION = 'location';

  /**
   * @var string
   */
  const ARGUMENT_DEFAULT_AS = 'announcements';

  /**
   * announcementRepository
   * @var \RGU\Dvoconnector\Domain\Repository\AnnouncementRepository
   * @inject
   */
  protected $announcementRepository;

  /**
   * @return void
   */
  public function initializeArguments() {

      parent::initializeArguments();
      $this->registerArgument(self::ARGUMENT_ASSOCIATIONID, 'string', 'The id of the association', false);
      $this->registerArgument(self::ARGUMENT_AS, 'string', 'The name of the announcements variable', false, self::ARGUMENT_DEFAULT_AS);
      $this->registerArgument(self::ARGUMENT_FILTER_OFFSET, 'integer', 'The offset of the announcements', false);
      $this->registerArgument(self::ARGUMENT_FILTER_LIMIT, 'integer', 'The limit of the announcements', false);
      $this->registerArgument(self::ARGUMENT_FILTER_CHILDS, 'integer', 'Search for childs or not or both', false);
      $this->registerArgument(self::ARGUMENT_FILTER_TEXT, 'string', 'Text of the announcement title or text', false);
      $this->registerArgument(self::ARGUMENT_FILTER_DATESTART, 'mixed', 'Earliest date of the announcement', false);
      $this->registerArgument(self::ARGUMENT_FILTER_DATEEND, 'mixed', 'Latest date of the announcement', false);
      $this->registerArgument(self::ARGUMENT_FILTER_ZIPSTART, 'integer', 'Least zip of the announcement', false);
      $this->registerArgument(self::ARGUMENT_FILTER_ZIPEND, 'integer', 'Greatest zip of the announcement', false);
      $this->registerArgument(self::ARGUMENT_FILTER_LOCATION, 'string', 'Location of the announcement', false);

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
      self::ARGUMENT_FILTER_CHILDS => $this->arguments[self::ARGUMENT_FILTER_CHILDS],
      self::ARGUMENT_FILTER_TEXT => $this->arguments[self::ARGUMENT_FILTER_TEXT],
      self::ARGUMENT_FILTER_DATESTART => $this->checkDateTime($this->arguments[self::ARGUMENT_FILTER_DATESTART]),
      self::ARGUMENT_FILTER_DATEEND => $this->checkDateTime($this->arguments[self::ARGUMENT_FILTER_DATEEND]),
      self::ARGUMENT_FILTER_ZIPSTART => $this->arguments[self::ARGUMENT_FILTER_ZIPSTART],
      self::ARGUMENT_FILTER_ZIPEND => $this->arguments[self::ARGUMENT_FILTER_ZIPEND],
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

    $filterArray = $this->getFilterArray();
    $filterArray = $this->removeNullValuesFromArray($filterArray);

    $associationFilter = $this->getDefaultAssociationFilter();
    $announcementsFilter = $this->objectManager->get(PropertyMapper::class)->convert($filterArray, AnnouncementsFilter::class);

    if(empty($associationID)) {

      $announcements = $this->announcementRepository->findAnnouncementsByRootAssociations($association, $announcementsFilter);

    } else {

      $association = $this->associationRepository->findByID($associationID, $associationFilter);

      $announcements = $this->announcementRepository->findAnnouncementsByAssociation($association, $announcementsFilter);

    }

    foreach ($announcements->getAnnouncements() as $announcement) {
      $announcement->setAssociation($this->associationRepository->findByID($announcement->getAssociation()->getID(), $associationFilter));
    }

  	$this->templateVariableContainer->add($this->arguments[self::ARGUMENT_AS], $announcements);
    $output = $this->renderChildren();
    $this->templateVariableContainer->remove($this->arguments[self::ARGUMENT_AS]);

    return $output;

  }

}
