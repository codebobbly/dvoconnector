<?php

namespace RG\Rgdvoconnector\Service;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class GenericApiService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	* CacheManager
	* @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface
	*/
	protected $cacheManager;

	/**
	* useCache
	* @var boolean
	*/
	protected static $useCache = true;

	public static function enableCache() {
			self::$useCache = true;
	}

	public static function disableCache() {
			self::$useCache = false;
	}

  public function __construct() {

		$this->cacheManager = GeneralUtility::makeInstance(CacheManager::class)->getCache('cache_rgdvoconnector_api');

	}

	/**
	* Return the basis API Url
	*
	* @return string
	*/
  public function getBaseApiUrl() {
		return \RG\Rgdvoconnector\Utility\EmConfiguration::getSettings()->getApiUrl();
	}

	/**
	* Queries XML data from server or cache
	*
	* @param string API URL
	* @param \RG\Rgdvoconnector\Service\ApiServiceFilter $apiServiceFilter
	*
	* @return object \SimpleXMLElement
	*/
  protected function queryXml($apiUrl, $apiServiceFilter = null) {

		$useCache = self::$useCache;

		if($apiServiceFilter) {
			$url = $apiUrl.$apiServiceFilter->getURLQuery();
		} else {
			$url = $apiUrl;
		}

    // no cache, so query from server
    if (!$useCache || $this->cacheManager->has(md5($url)) == false) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      // additional headers
      $headers = array(
          'User-Agent: ' . \RG\Rgdvoconnector\Utility\EmConfiguration::getSettings()->getHttpUserAgent(),
      );
      if (!$useCache) {
          $headers[] = 'Cache-Control: no-cache';
      }
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $response = curl_exec($ch);

      // separate response into header and body
      list($header, $body) = explode("\r\n\r\n", $response, 2);

      // check for response-code 200
      $headers = explode("\r\n", $header);
      $responseCode = preg_replace('/HTTP\/.* ([0-9]+) .*/', '${1}', $headers[0]);
      if ($responseCode{0} != '2' ) {
          throw new \Exception('Unexpected HTTP response code: '.$responseCode.'|'.$url);
      }

      // caching
      if (!preg_match('/.*Cache-Control: .*no-cache.*/sm', $header)) {
        // check for Cache-Control max-age param
        $maxAge = preg_replace('/.*Cache-Control: .*max-age=(\d+).*/sm', '${1}', $header);

        // cache response
        $this->writeCache(md5($url), $body, ($maxAge == '') ? \RG\Rgdvoconnector\Utility\EmConfiguration::getSettings()->getCachetime() : (int)$maxAge);

      }
		}	elseif($useCache && $this->cacheManager->has(md5($url)) == true) {
			$body = $this->readCache(md5($url));
    }

    try {
        $xml = new \SimpleXMLElement($body);
    } catch (\Exception $e) {
        throw $e;
    }

    return $xml;

  }


	/**
	* Caches the HTTP response body into database
	*
	* @param string $key A unique key for storing the data, e.g. request URI
	* @param string $data The data itself, e.g. XML data
	* @param int $lifetime How long the entry should be valid
	*/
  protected function writeCache($key, &$data, $lifetime) {

		$this->cacheManager->set($key, $data, [], $lifetime);

  }

	/**
	* Read the cache for a given key
	*
	* @param string $key Previously stored key-data
	*
	* @return string Raw data as previously stored
	*/
  protected function readCache($key) {

    return $this->cacheManager->get($key);
  }

}
