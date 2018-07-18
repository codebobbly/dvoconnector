<?php
defined('TYPO3_MODE') or die();

/***************
 * Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Dvoconnector',
    'Pi1',
    'LLL:EXT:Dvoconnector/Resources/Private/Language/locallang_be.xlf:pi1_title'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['Dvoconnector_pi1'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['Dvoconnector_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('Dvoconnector_pi1', 'FILE:EXT:Dvoconnector/Configuration/FlexForm/flexform_Dvoconnector.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('Dvoconnector', 'Configuration/TypoScript', 'Dvoconnector');
