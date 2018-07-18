<?php
namespace RGU\Rgdvoconnector\Service;

use RGU\Rgdvoconnector\Utility\TemplateLayout;
use RGU\Rgdvoconnector\Domain\Repository\AssociationRepository;
use RGU\Rgdvoconnector\Domain\Repository\EventRepository;
use RGU\Rgdvoconnector\Domain\Repository\AnnouncementRepository;
use RGU\Rgdvoconnector\Domain\Repository\FunctionaryRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class PluginConfigurationService {

  /** @var TemplateLayout $templateLayoutsUtility */
  protected $templateLayoutsUtility;

  /** @var ObjectManager $templateLayoutsUtility */
  protected $objectManager;

  public function __construct() {

    $this->templateLayoutsUtility = GeneralUtility::makeInstance(TemplateLayout::class);
    $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);

  }

  /**
   * Manipulating the input array, $params, adding new selectorbox items.
   *
   * @param	array	$params array of select field options (reference)
   * @param	object	$pObj parent object (reference)
   * @return	void
   */
  public function addConfigAssociation(&$params, &$pObj) {

    $associationRepository = $this->objectManager->get(\RGU\Rgdvoconnector\Domain\Repository\AssociationRepository::class);

    $rootAssociations = $associationRepository->getRootAssociations();
    foreach($rootAssociations->getAssociations() as $rootAssociation) {

      $params['items'][] = array(
        $rootAssociation->getName(),
        $rootAssociation->getID()
      );

      $associations = $associationRepository->findAssociationsByAssociation($rootAssociation);

      foreach($associations->getAssociations() as $association) {
        $params['items'][] = array(
          $association->getName(),
          $association->getID()
        );
      }

    }

  }

  /**
   * Manipulating the input array, $params, adding new selectorbox items.
   *
   * @param	array	$params array of select field options (reference)
   * @param	object	$pObj parent object (reference)
   * @return	void
   */
  public function addConfigEvent(&$params, &$pObj) {

    $aID = $params['flexParentDatabaseRow']['pi_flexform']['data']['General']['lDEF']['settings.associationID']['vDEF'];

    if(!empty($aID)) {

      $associationRepository = $this->objectManager->get(AssociationRepository::class);
      $eventRepository = $this->objectManager->get(EventRepository::class);

      $association = $associationRepository->findByID($aID);

      $events = $eventRepository->findEventsByAssociation($association);

      foreach($events->getEvents() as $event) {
        $params['items'][] = array(
          implode(' - ', array($event->getStartDate()->format('d.m.Y H:i:s'), $event->getTitle())),
          $event->getID()
        );
      }

    }

  }

  /**
   * Manipulating the input array, $params, adding new selectorbox items.
   *
   * @param	array	$params array of select field options (reference)
   * @param	object	$pObj parent object (reference)
   * @return	void
   */
  public function addConfigAnnouncement(&$params, &$pObj) {

    $aID = $params['flexParentDatabaseRow']['pi_flexform']['data']['General']['lDEF']['settings.associationID']['vDEF'];

    if(!empty($aID)) {

      $associationRepository = $this->objectManager->get(AssociationRepository::class);
      $announcementRepository = $this->objectManager->get(AnnouncementRepository::class);

      $association = $associationRepository->findByID($aID);

      $announcements = $announcementRepository->findAnnouncementsByAssociation($association);

      foreach($announcements->getAnnouncements() as $announcement) {
        $params['items'][] = array(
          implode(' - ', array($announcement->getCreatedDate()->format('d.m.Y H:i:s'), $announcement->getTitle())),
          $announcement->getID()
        );
      }

    }

  }

  /**
   * Manipulating the input array, $params, adding new selectorbox items.
   *
   * @param	array	$params array of select field options (reference)
   * @param	object	$pObj parent object (reference)
   * @return	void
   */
  public function addConfigFunctionary(&$params, &$pObj) {

    $aID = $params['flexParentDatabaseRow']['pi_flexform']['data']['General']['lDEF']['settings.associationID']['vDEF'];

    if(!empty($aID)) {

      $associationRepository = $this->objectManager->get(AssociationRepository::class);
      $functionaryRepository = $this->objectManager->get(FunctionaryRepository::class);

      $association = $associationRepository->findByID($params['flexParentDatabaseRow']['pi_flexform']['data']['General']['lDEF']['settings.associationID']['vDEF']);

      $functionaries = $functionaryRepository->findFunctionariesByAssociation($association);

      foreach($functionaries->getfunctionaries() as $functionary) {
        $params['items'][] = array(
          implode(' | ', array(implode(' ', array($functionary->getLastName(), $functionary->getFirstName())), $functionary->getRole())),
          $functionary->getID()
        );
      }

    }

  }

  /**
   * Itemsproc function to extend the selection of templateLayouts in the plugin
   *
   * @param array &$config configuration array
   */
  public function user_templateLayout(array &$config) {

    $pageId = 0;
    $currentColPos = $config['flexParentDatabaseRow']['colPos'];
    $pageId = $this->getPageId($config['flexParentDatabaseRow']['pid']);
    if ($pageId > 0) {
      $templateLayouts = $this->templateLayoutsUtility->getAvailableTemplateLayouts($pageId);
      $templateLayouts = $this->reduceTemplateLayouts($templateLayouts, $currentColPos);
      foreach ($templateLayouts as $layout) {
        $additionalLayout = [
          htmlspecialchars($this->getLanguageService()->sL($layout[0])),
          $layout[1]
        ];
        array_push($config['items'], $additionalLayout);
      }
    }

  }

  /**
   * Reduce the template layouts by the ones that are not allowed in given colPos
   *
   * @param array $templateLayouts
   * @param int $currentColPos
   * @return array
   */
  protected function reduceTemplateLayouts($templateLayouts, $currentColPos) {

    $currentColPos = (int)$currentColPos;
    $restrictions = [];
    $allLayouts = [];
    foreach ($templateLayouts as $key => $layout) {
      if (is_array($layout[0])) {
        if (isset($layout[0]['allowedColPos']) && StringUtility::endsWith($layout[1], '.')) {
          $layoutKey = substr($layout[1], 0, -1);
          $restrictions[$layoutKey] = GeneralUtility::intExplode(',', $layout[0]['allowedColPos'], true);
        }
      } else {
        $allLayouts[$key] = $layout;
      }
    }
    if (!empty($restrictions)) {
      foreach ($restrictions as $restrictedIdentifier => $restrictedColPosList) {
        if (!in_array($currentColPos, $restrictedColPosList, true)) {
          unset($allLayouts[$restrictedIdentifier]);
        }
      }
    }
    return $allLayouts;

  }

  /**
   * Get page id, if negative, then it is a "after record"
   *
   * @param int $pid
   * @return int
   */
  protected function getPageId($pid) {
    $pid = (int)$pid;
    if ($pid > 0) {
      return $pid;
    }
    $row = BackendUtilityCore::getRecord('tt_content', abs($pid), 'uid,pid');
    return $row['pid'];
  }

  /**
   * Returns LanguageService
   *
   * @return \TYPO3\CMS\Lang\LanguageService
   */
  protected function getLanguageService() {
      return $GLOBALS['LANG'];
  }

}
