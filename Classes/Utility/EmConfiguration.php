<?php

namespace RGU\Dvoconnector\Utility;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Utility class to get the settings from Extension Manager
 *
 */
class EmConfiguration
{

    /**
     * Parses the extension settings.
     *
     * @return \RGU\Dvoconnector\Domain\Model\EmConfiguration
     * @throws \Exception If the configuration is invalid.
     */
    public static function getSettings()
    {
        $configuration = self::parseSettings();
        require_once(ExtensionManagementUtility::extPath('Dvoconnector') . 'Classes/Domain/Model/EmConfiguration.php');
        $settings = new \RGU\Dvoconnector\Domain\Model\EmConfiguration($configuration);
        return $settings;
    }

    /**
     * Parse settings and return it as array
     *
     * @return array unserialized extconf settings
     */
    public static function parseSettings()
    {
        $settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['Dvoconnector']);

        if (!is_array($settings)) {
            $settings = [];
        }
        return $settings;
    }
}
