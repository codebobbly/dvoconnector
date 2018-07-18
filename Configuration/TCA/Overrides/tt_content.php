<?php
defined('TYPO3_MODE') or die();

/***************
 * Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Rgdvoconnector',
    'Pi1',
    'LLL:EXT:rgdvoconnector/Resources/Private/Language/locallang_be.xlf:pi1_title'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['rgdvoconnector_pi1'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['rgdvoconnector_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('rgdvoconnector_pi1', 'FILE:EXT:rgdvoconnector/Configuration/FlexForm/flexform_rgdvoconnector.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('rgdvoconnector', 'Configuration/TypoScript', 'rgdvoconnector');
