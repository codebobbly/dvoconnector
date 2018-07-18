<?php
namespace RG\Rgdvoconnector\Domain\Model;
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Functionary extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * id
	 * @var string
	 */
	protected $id;

	/**
	 * Association
	 * @var \RG\Rgdvoconnector\Domain\Domain\Model\Association
	 */
	protected $association;

	/**
	 * Role
	 * @var string
	 */
	protected $role;

	/**
	 * First Name
	 * @var string
	 */
	protected $firstName;

	/**
	 * Last Name
	 * @var string
	 */
	protected $lastName;

	/**
     * @var \RG\Rgdvoconnector\Domain\Domain\Model\Address
     */
    protected $address;

	/**
	 * Telephone
	 * @var string
	 */
	protected $telephone;

	/**
	 * Telefax
	 * @var string
	 */
	protected $telefax;

	/**
	 * Telephonemobile
	 * @var string
	 */
	protected $telephonemobile;

	/**
	 * Email
	 * @var string
	 */
	protected $email;

	/**
	 * URL
	 * @var string
	 */
	protected $url;

	/**
	 * Portrait
	 * @var string
	 */
	protected $portrait;

	/**
	 * Photo Source
	 * @var string
	 */
	protected $photoSource;

	/**
	 * Sortkey
	 * @var string
	 */
	protected $sortkey;

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
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Association $association
	 * @return void
	 */
	public function setAssociation($association) {
		$this->association = $association;
	}

	/**
	 * returns the association attribute
	 *
	 * @return \RG\Rgdvoconnector\Domain\Domain\Model\Association
	 */
	public function getAssociation() {
		return $this->association;
	}

	/**
	 * sets the role attribute
	 *
	 * @param string $role
	 * @return void
	 */
	public function setRole($role) {
		$this->role = $role;
	}

	/**
	 * returns the role attribute
	 *
	 * @return string
	 */
	public function getRole() {
		return $this->role;
	}

	/**
	 * sets the firstName attribute
	 *
	 * @param string $firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * returns the firstName attribute
	 *
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * sets the lastName attribute
	 *
	 * @param string $lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * returns the lastName attribute
	 *
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * sets the address attribute
	 *
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Address $lastName
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * returns the address attribute
	 *
	 * @return \RG\Rgdvoconnector\Domain\Domain\Model\Address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * sets the telephone attribute
	 *
	 * @param string $telephone
	 * @return void
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * returns the telephone attribute
	 *
	 * @return string
	 */
	public function getTelephone() {
		return $this->telephone;
	}

	/**
	 * sets the telefax attribute
	 *
	 * @param string $telefax
	 * @return void
	 */
	public function setTelefax($telefax) {
		$this->telefax = $telefax;
	}

	/**
	 * returns the telefax attribute
	 *
	 * @return string
	 */
	public function getTelefax() {
		return $this->telefax;
	}

	/**
	 * sets the telephonemobile attribute
	 *
	 * @param string $telephonemobile
	 * @return void
	 */
	public function setTelephonemobile($telephonemobile) {
		$this->telephonemobile = $telephonemobile;
	}

	/**
	 * returns the telephonemobile attribute
	 *
	 * @return string
	 */
	public function getTelephonemobile() {
		return $this->telephonemobile;
	}

	/**
	 * sets the email attribute
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * returns the email attribute
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
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
	 * sets the portrait attribute
	 *
	 * @param string $portrait
	 * @return void
	 */
	public function setPortrait($portrait) {
		$this->portrait = $portrait;
	}

	/**
	 * returns the portrait attribute
	 *
	 * @return string
	 */
	public function getPortrait() {
		return $this->portrait;
	}

	/**
	 * sets the photo source attribute
	 *
	 * @param string $photoSource
	 * @return void
	 */
	public function setPhotoSource($photoSource) {
		$this->photoSource = $photoSource;
	}

	/**
	 * returns the photoSource attribute
	 *
	 * @return string
	 */
	public function getPhotoSource() {
		return $this->photoSource;
	}

	/**
	 * sets the sortkey attribute
	 *
	 * @param string $sortkey
	 * @return void
	 */
	public function setSortkey($sortkey) {
		$this->sortkey = $sortkey;
	}

	/**
	 * returns the sortkey attribute
	 *
	 * @return string
	 */
	public function getSortkey() {
		return $this->sortkey;
	}

	/**
	 * returns the photoSource as File
	 *
	 * @return \TYPO3\CMS\Core\Resource\File
	 */
	public function getPhotoSourceFile() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
		return $objectManager->get(\RG\Rgdvoconnector\Service\ImageService::class)->getCachedFile($this->getPhotoSource());
	}

}
