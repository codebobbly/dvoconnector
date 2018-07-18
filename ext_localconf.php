<?php
defined('TYPO3_MODE') or die();

$boot = function () {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'RG.rgdvoconnector',
		'Pi1',
		array(
			'Association' => 'index,detailEvent,detailAnnouncement,detailFunctionary,detailAssociation,filterEvents,listEvents,filterAnnouncements,listAnnouncements,filterFunctionaries,listFunctionaries,filterAssociations,listAssociations,listSubAssociations',
			'AssociationStatic' => 'singleAssociation,listAssociations',
			'Announcement' => 'detailAnnouncement,filterAnnouncements,listAnnouncements',
			'AnnouncementStatic' => 'listAnnouncements,singleAnnouncement',
			'Event' => 'detailEvent,filterEvents,listEvents',
			'EventStatic' => 'listEvents,singleEvent',
			'Functionary' => 'detailFunctionary,filterFunctionaries,listFunctionaries',
			'FunctionaryStatic' => 'listFunctionaries,singleFunctionary',
		),
		array()
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:rgdvoconnector/Configuration/TSconfig/ContentElementWizard.txt">');

    if (TYPO3_MODE === 'BE') {
        /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'ext-rgdvoconnector-wizard-icon',
            \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
            ['source' => 'EXT:rgdvoconnector/Resources/Public/Icons/ce_wiz.gif']
        );
    }

    /* ===========================================================================
        Custom cache, done with the caching framework
    =========================================================================== */
    if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_api'])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_api'] = [];
    }
    // Define string frontend as default frontend, this must be set with TYPO3 4.5 and below
    // and overrides the default variable frontend of 4.6
    if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_api']['frontend'])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_api']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\StringFrontend::class;
    }

    if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_images'])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_images'] = [];
    }
    // Define string frontend as default frontend, this must be set with TYPO3 4.5 and below
    // and overrides the default variable frontend of 4.6
    if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_images']['frontend'])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rgdvoconnector_images']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\StringFrontend::class;
    }

};

$boot();
unset($boot);

?>
