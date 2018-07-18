<?php

namespace RG\Rgdvoconnector\Service;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use RG\Rgdvoconnector\Service\GenericApiService;
use RG\Rgdvoconnector\Service\GenericFilterContext;
use RG\Rgdvoconnector\Service\ContextException;

class AssociationsApiService extends GenericApiService {

	protected const CO_XML_ATTRIBUT_VALID_CONTEXT = 'valid-context';
	protected const CO_XML_ATTRIBUT_VALID_CONTEXT_TRUE = 'yes';
	protected const CO_XML_ATTRIBUT_VALID_CONTEXT_FALSE = 'no';

	/**
	* return the root association IDs
	*
	* @return array root association IDs
	*/
	public function getRootAssociationIDs() {

    return \RG\Rgdvoconnector\Utility\EmConfiguration::getSettings()->getRootAssociationIDs();

	}

	/**
	* return a association
	*
	* @param string association id
	* @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	*
	* @return \SimpleXMLElement XML data
	*/
	public function getAssociation($aid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->query[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

    return $xml->query->children()[0];

	}

	/**
	 * return the root associations
	 *
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
	 * @return array XML data
 	*/
	public function getRootAssociations($apiServiceFilterContext = null) {

		$result = [];

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {

				$result[] = $this->getAssociation($rootAssociationID, $apiServiceFilterContext);

			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

    return $result;

	}

	/**
	 * return a list of child associations from the root association
	 *
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
	 * @return array XML data
 	*/
	public function findAssociationsByRootAssociations($apiServiceFilterContext = null) {

		$result = [];

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {

				$result[] = $this->getChildAssociationsFromAssociation($rootAssociationID, $apiServiceFilterContext);

			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

    return $result;

	}

	/**
   * return a list of child associations from a association
   *
	 * @param string association id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getChildAssociationsFromAssociation($aid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."/associations";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->list[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

    return $xml->list;

	}

	/**
   * return a list of events from a association
   *
	 * @param string association id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getEventsFromAssociation($aid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."/events";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->list[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

    return $xml->list;

	}

	/**
   * return a list of events from the root associations
   *
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getEventsFromRootAssociations($apiServiceFilterContext = null) {

		$result = [];

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {

				$result[] = $this->getChildAssociationsFromAssociation($rootAssociationID, $apiServiceFilterContext);

			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

    return $result;

	}

	/**
   * return a event
   *
	 * @param string event id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getEventFromID($eid, $apiServiceFilterContext = null) {

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {

				$result = $this->getEventFromAssociation($rootAssociationID, $eid, $apiServiceFilterContext);
				if(isset($result)) {
					return $result;
				}

			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

		return null;

	}

	/**
   * return a event from a association
   *
	 * @param string association id
	 * @param string event id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getEventFromAssociation($aid, $eid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."/events/".$eid."";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->query[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

    return $xml->query->children()[0];

	}

	/**
   * return a list of announcements from the root associations
   *
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return array XML data
   */
	public function getAnnouncementsFromRootAssociations($apiServiceFilterContext = null) {

		$result = [];

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {

				$result[] = $this->getAnnouncementsFromAssociation($rootAssociationID, $apiServiceFilterContext);

			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

    return $result;

	}

	/**
   * return a list of announcements from a association
   *
	 * @param string association id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getAnnouncementsFromAssociation($aid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."/announcements";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->list[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

    return $xml->list;

	}

	/**
   * return a announcement from a association
   *
	 * @param string association id
	 * @param string announcement id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getAnnouncementFromAssociation($aid, $mid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."/announcements/".$mid."";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->query[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

    return $xml->query->children()[0];

	}

	/**
   * return a announcement
   *
	 * @param string announcement id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getAnnouncementFromID($mid, $apiServiceFilterContext = null) {

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {

				$result = $this->getAnnouncementFromAssociation($rootAssociationID, $mid, $apiServiceFilterContext);
				if(isset($result)) {
					return $result;
				}

			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

		return null;

	}

	/**
   * return a list of functionaries from a association
   *
	 * @param string association id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getFunctionariesFromAssociation($aid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."/functionaries";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->list[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

		$filterParamters = $apiServiceFilterContext->getParametersArray();

		for ($i = 0; $i < count($xml->list->functionaries->functionary); $i++) {

			$functionaryChildEntry = $xml->list->functionaries->functionary[$i];

			if(isset($filterParamters['f_role']) && preg_match('/('.$filterParamters['f_role'].')/', $functionaryChildEntry['role']) == 0) {
				unset($xml->list->functionaries->functionary[$i]);
				$i--;
			} else {
				$functionaryChildEntry->addAttribute('associationid', $aid);
			}

		}

    return $xml->list;

	}

	/**
   * return a list of functionaries from the root associations
   *
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getFunctionariesFromRootAssociations($apiServiceFilterContext = null) {

		$result = [];

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {
				$result[] = $this->getFunctionariesFromAssociation($rootAssociationID, $apiServiceFilterContext);
			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

    return $result;

	}

	/**
   * return a functionary from a association
   *
	 * @param string association id
	 * @param string functionary id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getFunctionaryFromAssociation($aid, $fid, $apiServiceFilterContext = null) {

		$apiServiceFilterContext = $this->checkApiServiceFilterContext($apiServiceFilterContext, $aid);

		$url = $this->getBaseApiUrl()."/associations/".$aid."/functionaries/".$fid."";

		$params = null;

    $xml = $this->queryXml($url, $apiServiceFilterContext);

		$this->checkValidContext($xml->query[AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT]);

    return $xml->query->children()[0];

	}

	/**
   * return a functionary
   *
	 * @param string functionary id
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 *
   * @return \SimpleXMLElement XML data
   */
	public function getFunctionaryFromID($fid, $apiServiceFilterContext = null) {

		foreach ($this->getRootAssociationIDs() as $key => $rootAssociationID) {

			try {

				$result = $this->getFunctionaryFromAssociation($rootAssociationID, $fid, $apiServiceFilterContext);
				if(isset($result)) {
					return $result;
				}

			} catch (ContextException $e) {

				if($key === count($this->getRootAssociationIDs()) - 1) {
					throw $e;
				}

			}

		}

		return null;

	}

	/**
   * check that the filter has a inside association value
   *
	 * @param \RG\Rgdvoconnector\Service\ApiServiceFilterContext $apiServiceFilterContext
	 * @param string $aID association ID
	 *
	 * @return \RG\Rgdvoconnector\Service\ApiServiceFilterContext
   */
	protected function checkApiServiceFilterContext($apiServiceFilterContext = null, $aID = null) {

		if(is_null($apiServiceFilterContext)) {
			$resultApiServiceFilterContext = new \RG\Rgdvoconnector\Domain\Filter\GenericFilterContext();
		} else {
			$resultApiServiceFilterContext = clone $apiServiceFilterContext;
		}

		if(is_null($resultApiServiceFilterContext->getInsideAssociationID()) && isset($aID)) {
			$resultApiServiceFilterContext->setInsideAssociationID($aID);
		}

		return $resultApiServiceFilterContext;

	}

	/**
   * check that valid context is true or not relevant
   *
	 * @param string valid context
   */
	protected function checkValidContext($validContext) {

		if(!empty($validContext) && $validContext == AssociationsApiService::CO_XML_ATTRIBUT_VALID_CONTEXT_FALSE) {
			throw new ContextException();
		}

	}

}
