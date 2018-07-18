<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model;
=======
namespace RG\Rgdvoconnector\Domain\Model;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Announcement extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * id
	 * @var string
	 */
	protected $id;

	/**
	 * Association
<<<<<<< HEAD
	 * @var \RGU\Dvoconnector\Domain\Domain\Model\Association
=======
	 * @var \RG\Rgdvoconnector\Domain\Domain\Model\Association
>>>>>>> parent of 8432775... Change Namespace
	 */
	protected $association;

	/**
	 * Titel
	 * @var string
	 */
	protected $title;

	/**
	 * Text
	 * @var string
	 */
	protected $text;

	/**
	 * created Date
	 * @var \DateTime
	 */
	protected $createdDate;

	/**
	 * URL
	 * @var string
	 */
	protected $url;

	/**
	 * Image source
	 * @var string
	 */
	protected $imageSource;

	/**
	 * Image title
	 * @var string
	 */
	protected $imageTitle;

	public function __construct() {}

	/**
	 * sets the id attribute
	 *
	 * @param string $id
	 * @return void
	 */
	public function setID($id) {
		$this->id = $id;
	}

	/**
	 * returns the id attribute
	 *
	 * @return string
	 */
	public function getID() {
		return $this->id;
	}

	/**
	 * sets the association attribute
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Association $association
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Association $association
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function setAssociation($association) {
		$this->association = $association;
	}

	/**
	 * returns the association attribute
	 *
<<<<<<< HEAD
	 * @return \RGU\Dvoconnector\Domain\Domain\Model\Association
=======
	 * @return \RG\Rgdvoconnector\Domain\Domain\Model\Association
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getAssociation() {
		return $this->association;
	}

	/**
	 * sets the title attribute
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * returns the title attribute
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * sets the text attribute
	 *
	 * @param string $text
	 * @return void
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * returns the text attribute
	 *
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * sets the createdDate attribute
	 *
	 * @param \DateTime $createdDate
	 * @return void
	 */
	public function setCreatedDate($createdDate) {
		$this->createdDate = $createdDate;
	}

	/**
	 * returns the createdDate attribute
	 *
	 * @return \DateTime
	 */
	public function getCreatedDate() {
		return $this->createdDate;
	}

	/**
	 * sets the url attribute
	 *
	 * @param string $url
	 * @return void
	 */
	public function setURL($url) {
		$this->url = $url;
	}

	/**
	 * returns the url attribute
	 *
	 * @return string
	 */
	public function getURL() {
		return $this->url;
	}

	/**
	 * sets the imageSource attribute
	 *
	 * @param string $imageSource
	 * @return void
	 */
	public function setImageSource($imageSource) {
		$this->imageSource = $imageSource;
	}

	/**
	 * returns the imageSource attribute
	 *
	 * @return string
	 */
	public function getImageSource() {
		return $this->imageSource;
	}

	/**
	 * sets the image title attribute
	 *
	 * @param string $imageTitle
	 * @return void
	 */
	public function setImageTitle($imageTitle) {
		$this->imageTitle = $imageTitle;
	}

	/**
	 * returns the image title attribute
	 *
	 * @return string
	 */
	public function getImageTitle() {
		return $this->imageTitle;
	}

	/**
	 * returns the imageSource as File
	 *
	 * @return \TYPO3\CMS\Core\Resource\File
	 */
	public function getImageSourceFile() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
<<<<<<< HEAD
		return $objectManager->get(\RGU\Dvoconnector\Service\ImageService::class)->getCachedFile($this->getImageSource());
=======
		return $objectManager->get(\RG\Rgdvoconnector\Service\ImageService::class)->getCachedFile($this->getImageSource());
>>>>>>> parent of 8432775... Change Namespace
	}

}
