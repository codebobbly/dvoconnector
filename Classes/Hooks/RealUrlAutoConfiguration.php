<?php

namespace RGU\Dvoconnector\Hooks;

/**
 * AutoConfiguration-Hook for RealURL
 *
 */
class RealUrlAutoConfiguration
{

    /**
     * Generates additional RealURL configuration and merges it with provided configuration
     *
     * @param       array $params Default configuration
     * @return      array Updated configuration
     * @hook TYPO3_CONF_VARS|SC_OPTIONS|ext/realurl/class.tx_realurl_autoconfgen.php|extensionConfiguration
     */
    public function addDVOConnectorConfig($params)
    {
        return array_merge_recursive($params['config'], [
          'postVarSets' => [
            '_DEFAULT' => [
              'dvoconnector' => [
                [
                    'GETvar' => 'tx_dvoconnector_pi1[controller]',
                    'noMatch' => 'bypass',
                ],
                [
                    'GETvar' => 'tx_dvoconnector_pi1[aID]',
                    'userFunc' => RGU\Dvoconnector\Service\Url\RealUrlAssociation::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_dvoconnector_pi1[action]',
                    'valueMap' => [
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
                    ],
                    'noMatch' => 'bypass',
                ],
                [
                              'GETvar' => 'tx_dvoconnector_pi1[@widget_0][currentPage]',
                              'noMatch' => 'bypass',
                          ],
                [
                    'GETvar' => 'tx_dvoconnector_pi1[eID]',
                    'userFunc' => RGU\Dvoconnector\Service\Url\RealUrlEvent::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_dvoconnector_pi1[anID]',
                    'userFunc' => RGU\Dvoconnector\Service\Url\RealUrlAnnouncement::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_dvoconnector_pi1[fID]',
                    'userFunc' => RGU\Dvoconnector\Service\Url\RealUrlFunctionary::class . '->convert',
                ],
                [
                    'GETvar' => 'tx_dvoconnector_pi1[filter]',
                    'userFunc' => RGU\Dvoconnector\Service\Url\RealUrlFilter::class . '->convert',
                ],
              ]
            ]
          ]
        ]);
    }
}
