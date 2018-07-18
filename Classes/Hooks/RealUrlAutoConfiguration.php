<?php

namespace RG\Rgdvoconnector\Hooks;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * AutoConfiguration-Hook for RealURL
 *
 */
class RealUrlAutoConfiguration {

    /**
     * Generates additional RealURL configuration and merges it with provided configuration
     *
     * @param       array $params Default configuration
     * @return      array Updated configuration
     * @hook TYPO3_CONF_VARS|SC_OPTIONS|ext/realurl/class.tx_realurl_autoconfgen.php|extensionConfiguration
     */
    public function addDVOConnectorConfig($params) {

        return array_merge_recursive($params['config'], [
          'postVarSets' => [
            '_DEFAULT' => [
              'Rgdvoconnector' => [
                [
                    'GETvar' => 'tx_rgdvoconnector_pi1[controller]',
                    'noMatch' => 'bypass',
                ],
                [
                    'GETvar' => 'tx_rgdvoconnector_pi1[aID]',
                    'userFunc' => RG\Rgdvoconnector\Service\Url\RealUrlAssociation::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_rgdvoconnector_pi1[action]',
                    'valueMap' => array(
                      'veranstaltungen' => 'listEvents',
                      'meldungen' => 'listAnnouncements',
                      'funktionaere' => 'listFunctionaries',
                      'vereinigungen' => 'listAssociations',
                      'veranstaltungen-suche' => 'filterEvents',
                      'meldungen-suche' => 'filterAnnouncements',
                      'funktionaere-suche' => 'filterFunctionaries',
                      'vereinigungen-suche' => 'filterAssociations',
                      'funktionaer' => 'detailFunctionary',
                      'meldung' => 'detailAnnouncement',
                      'veranstaltung' => 'detailEvent',
                    ),
                    'noMatch' => 'bypass',
                ],
                [
      						'GETvar' => 'tx_rgdvoconnector_pi1[@widget_0][currentPage]',
      						'noMatch' => 'bypass',
      					],	
                [
                    'GETvar' => 'tx_rgdvoconnector_pi1[eID]',
                    'userFunc' => RG\Rgdvoconnector\Service\Url\RealUrlEvent::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_rgdvoconnector_pi1[anID]',
                    'userFunc' => RG\Rgdvoconnector\Service\Url\RealUrlAnnouncement::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_rgdvoconnector_pi1[fID]',
                    'userFunc' => RG\Rgdvoconnector\Service\Url\RealUrlFunctionary::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_rgdvoconnector_pi1[filter]',
                    'userFunc' => RG\Rgdvoconnector\Service\Url\RealUrlFilter::class . '->convert',
                ],
              ]
            ]
          ]
        ]);

    }
}
