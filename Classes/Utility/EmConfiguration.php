<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Utility;
=======
namespace RG\Rgdvoconnector\Utility;
>>>>>>> parent of 8432775... Change Namespace

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
<<<<<<< HEAD
     * @return \RGU\Dvoconnector\Domain\Model\EmConfiguration
=======
     * @return \RG\Rgdvoconnector\Domain\Model\EmConfiguration
>>>>>>> parent of 8432775... Change Namespace
     * @throws \Exception If the configuration is invalid.
     */
    public static function getSettings()
    {
        $configuration = self::parseSettings();
<<<<<<< HEAD
        require_once(ExtensionManagementUtility::extPath('Dvoconnector') . 'Classes/Domain/Model/EmConfiguration.php');
        $settings = new \RGU\Dvoconnector\Domain\Model\EmConfiguration($configuration);
=======
        require_once(ExtensionManagementUtility::extPath('rgdvoconnector') . 'Classes/Domain/Model/EmConfiguration.php');
        $settings = new \RG\Rgdvoconnector\Domain\Model\EmConfiguration($configuration);
>>>>>>> parent of 8432775... Change Namespace
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
