<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Service;
=======
namespace RG\Rgdvoconnector\Service;
>>>>>>> parent of 8432775... Change Namespace

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Cache\CacheManager;

/**
 * GoogleFontService
 */
class ImageService implements SingletonInterface
{

    const UPLOAD_DIRECTORY = 'Dvoconnector';
    const IMAGES_DIRECTORY = 'images';
    const TYPO3TEMP_DIRECTORY = 'typo3temp/assets';

    /**
  	* CacheManager
  	* @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface
  	*/
  	protected $cacheManager;

    /**
     * ResourceFactory
     *
     * @var ResourceFactory
     */
    protected $resourceFactory = null;

    public function __construct() {

      $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
      $this->resourceFactory = $this->objectManager->get(ResourceFactory::class);

      $this->cacheManager = GeneralUtility::makeInstance(CacheManager::class)->getCache('cache_Dvoconnector_images');

    }

    /**
     * @param string $file
     * @return \TYPO3\CMS\Core\Resource\File
     * @throws \Exception
     */
    public function getCachedFile($fileString)
    {

        if($this->supports($fileString)) {

          $cacheFile = $this->getImageFileCacheName($fileString);

          if($this->cacheManager->has(md5($cacheFile))) {

            $storage = $this->resourceFactory->getStorageObject(0);

            if(!$storage->hasFile($cacheFile)) {
              return $this->loadCacheFile($fileString);
            }

            return $storage->getFile($cacheFile);

          } else {

            return $this->loadCacheFile($fileString);

          }

        }

        return null;

    }

    /**
     * @param string $file
     * @param \TYPO3\CMS\Core\Resource\File $currentFile
     * @return \TYPO3\CMS\Core\Resource\File
     */
    protected function loadCacheFile($fileString)
    {
        $imageContent = GeneralUtility::getUrl(
            $fileString,
            0,
            ['User-Agent: Dvoconnector/1.0']
        );

        if (!$imageContent) {
            return null;
        }

        $cacheFile = $this->getImageFileCacheName($fileString);

        $storage = $this->resourceFactory->getStorageObject(0);

        if($storage->hasFile($cacheFile)) {

          $currentFile = $storage->getFile($cacheFile);
          if($currentFile->getSha1() == sha1($imageContent)) {

<<<<<<< HEAD
            $this->cacheManager->set(md5($cacheFile), $currentFile->getSha1(), [], \RGU\Dvoconnector\Utility\EmConfiguration::getSettings()->getCachetime());
=======
            $this->cacheManager->set(md5($cacheFile), $currentFile->getSha1(), [], \RG\Rgdvoconnector\Utility\EmConfiguration::getSettings()->getCachetime());
>>>>>>> parent of 8432775... Change Namespace
            return $currentFile;

          }

        }

        $tempFolder = $storage->getFolder(self::TYPO3TEMP_DIRECTORY);

        if (!$tempFolder->hasFolder(self::IMAGES_DIRECTORY)) {
          $tempFolder->createFolder(self::IMAGES_DIRECTORY);
        }

        $uploadFolder = $tempFolder->getSubfolder(self::UPLOAD_DIRECTORY);

        if (!$uploadFolder->hasFolder(self::IMAGES_DIRECTORY)) {
          $uploadFolder->createFolder(self::IMAGES_DIRECTORY);
        }

        $imagesFolder = $uploadFolder->getSubfolder(self::IMAGES_DIRECTORY);

        $localTempFile = realpath('.' . $this->getCacheDirectory($fileString)). '/' . $this->getCacheIdentifier($fileString);
        file_put_contents($localTempFile, $imageContent);
        GeneralUtility::fixPermissions($localTempFile);

        $file = $imagesFolder->addFile($localTempFile, $this->getCacheIdentifier($fileString), \TYPO3\CMS\Core\Resource\DuplicationBehavior::REPLACE);

        return $file;
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function supports($file)
    {
<<<<<<< HEAD
        return parse_url($file, PHP_URL_HOST) == parse_url(\RGU\Dvoconnector\Utility\EmConfiguration::getSettings()->getApiUrl(), PHP_URL_HOST) ? true : false;
=======
        return parse_url($file, PHP_URL_HOST) == parse_url(\RG\Rgdvoconnector\Utility\EmConfiguration::getSettings()->getApiUrl(), PHP_URL_HOST) ? true : false;
>>>>>>> parent of 8432775... Change Namespace
    }

    /**
     * @param string $file
     * @return string
     */
    protected function getImageFileCacheName($file)
    {
        return $this->getCacheDirectory($file) . '/' . $this->getCacheIdentifier($file);
    }

    /**
     * @param string $file
     * @return string
     */
    protected function getCacheDirectory($file)
    {
        return '/' . self::TYPO3TEMP_DIRECTORY . '/' . self::UPLOAD_DIRECTORY . '/' . self::IMAGES_DIRECTORY . '';
    }

    /**
     * @param string $file
     * @return string
     */
    protected function getCacheIdentifier($file)
    {
        return hash('sha256', $file) . '.jpg';
    }
}
