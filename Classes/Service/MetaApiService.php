<?php

namespace RGU\Dvoconnector\Service;

class MetaApiService extends GenericApiService
{

  /**
     * return a list of association categories
   *
     * @return SimpleXMLElement XML data
     */
    public function getAssociationCategories()
    {
        $url = $this->getBaseApiUrl() . '/meta/association/categories';

        $xml = $this->queryXml($url);
        return $xml->metalist;
    }

    /**
       * return a list of association repertoires
     *
       * @return SimpleXMLElement XML data
       */
    public function getAssociationRepertoires()
    {
        $url = $this->getBaseApiUrl() . '/meta/association/repertoires';

        $xml = $this->queryXml($url);
        return $xml->metalist;
    }

    /**
       * return a list of association performancelevels
     *
       * @return SimpleXMLElement XML data
       */
    public function getAssociationPerformancelevels()
    {
        $url = $this->getBaseApiUrl() . '/meta/association/performancelevels';

        $xml = $this->queryXml($url);
        return $xml->metalist;
    }

    /**
       * return a list of event types
     *
       * @return SimpleXMLElement XML data
       */
    public function getEventTypes()
    {
        $url = $this->getBaseApiUrl() . '/meta/event/types';

        $xml = $this->queryXml($url);
        return $xml->metalist;
    }
}
