<?php

namespace RGU\Dvoconnector\Service\Url;

use DmitryDulepov\Realurl\Configuration\ConfigurationReader;
use DmitryDulepov\Realurl\Utility;

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * RealUrl.
 */
class AbstractRealUrl implements SingletonInterface
{

  /**
   * @var string
   */
    const SEPARATOR_OFFSET = '-';

    /** @var ObjectManager $templateLayoutsUtility */
    protected $objectManager;

    /**
     * associationRepository
     * @var RGU\Dvoconnector\Domain\Repository\AssociationRepository
     * @inject
    */
    protected $associationRepository;

    public function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->associationRepository = $this->objectManager->get(\RGU\Dvoconnector\Domain\Repository\AssociationRepository::class);
    }

    /**
     * Convert the given information.
     *
     * @param $param1
     * @param $param2
     *
     * @return string
     */
    public function convert($param1, $param2)
    {
        return $this->main($param1, $param2);
    }

    /**
     * Build the realurl alias.
     *
     * @param $params
     * @param $ref
     *
     * @return string
     */
    public function main($params, $ref)
    {
        $value = $params['value'];
        if (empty($value)) {
            return null;
        }

        if ($params['decodeAlias']) {
            return $this->alias2id($value);
        }

        return $this->id2alias($value);
    }

    /**
     * Handle the alias to ID convert.
     *
     * @param $value
     */
    protected function alias2id($value)
    {
    }

    /**
     * Handle the ID to alias convert.
     *
     * @param $value
     *
     * @return string
     */
    protected function id2alias($value)
    {
    }

    /**
     * Generate the realurl part.
     *
     * @param string $alias
     *
     * @return string
     */
    protected function cleanUrl($alias)
    {
        if ($this->isOldRealUrlVersion()) {

          /** @var \tx_realurl_advanced $realUrl */
            $realUrl = GeneralUtility::makeInstance('tx_realurl_advanced');
            $configuration = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT']['pagePath'];
            if (\is_array($configuration)) {
                ObjectAccess::setProperty($realUrl, 'conf', $configuration, true);
            }
            $processedTitle = $realUrl->encodeTitle($alias);
        } else {
            $configuration = GeneralUtility::makeInstance(ConfigurationReader::class, ConfigurationReader::MODE_ENCODE);
            // Init the internal utility by ObjectAccess because the property is
            // set by a protected method only. :( Perhaps this could be part of the construct (in realurl)
            $utility = GeneralUtility::makeInstance(Utility::class, $configuration);
            $processedTitle = $utility->convertToSafeString($alias);
        }

        return $processedTitle;
    }

    /**
     * Check if this is a old version of realurl < 2.0.0.
     *
     * @return bool
     */
    protected function isOldRealUrlVersion()
    {
        $extVersion = ExtensionManagementUtility::getExtensionVersion('realurl');
        return VersionNumberUtility::convertVersionNumberToInteger($extVersion) < 2000000;
    }
}
