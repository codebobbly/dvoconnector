<?php

namespace RGU\Dvoconnector\Hooks;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * AutoConfiguration-Hook for RealURL
 *
 */
class TyposcriptUserFuncs {

  /** @var ObjectManager $templateLayoutsUtility */
  protected $objectManager;

  /**
   * associationRepository
   * @var RGU\Dvoconnector\Domain\Repository\AssociationRepository
   * @inject
  */
  protected $associationRepository;

  /**
   * announcementRepository
   * @var RGU\Dvoconnector\Domain\Repository\AnnouncementRepository
   * @inject
  */
  protected $announcementRepository;

  /**
   * eventRepository
   * @var RGU\Dvoconnector\Domain\Repository\EventRepository
   * @inject
  */
  protected $eventRepository;

  /**
   * functionaryRepository
   * @var RGU\Dvoconnector\Domain\Repository\FunctionaryRepository
   * @inject
  */
  protected $functionaryRepository;

  public function __construct() {

    $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
    $this->associationRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\AssociationRepository::class);
    $this->announcementRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\AnnouncementRepository::class);
    $this->eventRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\EventRepository::class);
    $this->functionaryRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\FunctionaryRepository::class);

  }

  /**
   * Returns the text for the breadcrumb
   *
   * @param string Empty string (no content to process)
   * @param array TypoScript configuration
   * @return string text
   */
  public function getBreadcrumbFunctionary(string $content, array $conf): string {

    $tx_Dvoconnector = GeneralUtility::_GP('tx_Dvoconnector_pi1');
    $functionary = $this->functionaryRepository->findByID($tx_Dvoconnector['fID']);

    return $functionary->getLastName() . ' ' . $functionary->getFirstName();

  }

  /**
   * Returns the text for the breadcrumb
   *
   * @param string Empty string (no content to process)
   * @param array TypoScript configuration
   * @return string text
   */
  public function getBreadcrumbAnnouncement(string $content, array $conf): string {

    $tx_Dvoconnector = GeneralUtility::_GP('tx_Dvoconnector_pi1');
    $announcement = $this->announcementRepository->findByID($tx_Dvoconnector['anID']);

    return $announcement->getTitle();

  }

  /**
   * Returns the text for the breadcrumb
   *
   * @param string Empty string (no content to process)
   * @param array TypoScript configuration
   * @return string text
   */
  public function getBreadcrumbEvent(string $content, array $conf): string {

    $tx_Dvoconnector = GeneralUtility::_GP('tx_Dvoconnector_pi1');
    $event = $this->eventRepository->findByID($tx_Dvoconnector['eID']);

    return $event->getTitle();

  }

  /**
   * Returns the text for the breadcrumb
   *
   * @param string Empty string (no content to process)
   * @param array TypoScript configuration
   * @return string text
   */
  public function getBreadcrumbAssociation(string $content, array $conf): string {

    $tx_Dvoconnector = GeneralUtility::_GP('tx_Dvoconnector_pi1');
    $association = $this->associationRepository->findByID($tx_Dvoconnector['aID']);

    return $association->getName();

  }

}
