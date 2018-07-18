<?php
defined('TYPO3_MODE') or die();

/***************
 * Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Dvoconnector',
    'Pi1',
    'LLL:EXT:dvoconnector/Resources/Private/Language/locallang_be.xlf:pi1_title'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['dvoconnector_pi1'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['dvoconnector_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('dvoconnector_pi1', 'FILE:EXT:dvoconnector/Configuration/FlexForm/flexform_dvoconnector.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('dvoconnector', 'Configuration/TypoScript', 'dvoconnector');
