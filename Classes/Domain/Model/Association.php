<?php
namespace RGU\Dvoconnector\Domain\Model;
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Association extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * ID
	 * @var string
	 */
	protected $id;

	/**
	 * Name
	 * @var string
	 */
	protected $name;

	/**
	 * Type
	 * @var string
	 */
	protected $type;

	/**
	 * Description
	 * @var string
	 */
	protected $description;

	/**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
     */
    protected $parents;

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
	 * Email
	 * @var string
	 */
	protected $email;

	/**
	 * Website
	 * @var string
	 */
	protected $website;

	/**
     * @var \RGU\Dvoconnector\Domain\Model\Address
     */
    protected $address;

	/**
     * @var \RGU\Dvoconnector\Domain\Model\Meta\Association\Category
     */
    protected $category;

	/**
     * @var \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel
     */
    protected $performancelevel;

	/**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire>
     */
	protected $repertoires;

	/**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Functionary>
     */
	protected $functionaries;

	/**
	 * Repertoire extra
	 * @var string
	 */
	protected $repertoire_extra;

	/**
     * @var \RGU\Dvoconnector\Domain\Model\ContactPerson
     */
	protected $contactperson;

	/**
	 * Membership number
	 * @var string
	 */
	protected $membershipnumber;

	/**
	 * Membership count
	 * @var string
	 */
	protected $membershipcount;

	/**
	 * URL emblem
	 * @var string
	 */
	protected $urlemblem;

	/**
	 * URL Photo
	 * @var string
	 */
	protected $urlphoto;

	public function __construct() {
        $this->parents = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->repertoires = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->functionaries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }


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
	 * sets the name attribute
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * returns the name attribute
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * sets the type attribute
	 *
	 * @param string $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * returns the type attribute
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

  /**
   * Adds a parent to this association.
   *
   * @param Association $parent
   * @return void
   */
  public function addParent(Association $parent)
  {
      $this->getParents()->attach($parent);
  }

   /**
   * Removes a parents to this association.
   *
   * @param Association $parent
   * @return void
   */
  public function removeParent(Association $parent)
  {
      $this->getParents()->detach($parent);
  }

	/**
	 * returns the parents attribute
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
	 */
	public function getParents() {
		return $this->parents;
	}

	/**
	 * sets the description attribute
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * returns the description attribute
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
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
	 * sets the website attribute
	 *
	 * @param string $website
	 * @return void
	 */
	public function setWebsite($website) {
		$this->website = $website;
	}

	/**
	 * returns the website attribute
	 *
	 * @return string
	 */
	public function getWebsite() {
		return $this->website;
	}

	/**
	 * sets the address attribute
	 *
	 * @param \RGU\Dvoconnector\Domain\Model\Address $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * returns the address attribute
	 *
	 * @return \RGU\Dvoconnector\Domain\Model\Address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * sets the category attribute
	 *
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Category $category
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * returns the category attribute
	 *
	 * @return \RGU\Dvoconnector\Domain\Model\Meta\Association\Category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * sets the performancelevel attribute
	 *
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel $performancelevel
	 * @return void
	 */
	public function setPerformancelevel($performancelevel) {
		$this->performancelevel = $performancelevel;
	}

	/**
	 * returns the performancelevel attribute
	 *
	 * @return \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel
	 */
	public function getPerformancelevel() {
		return $this->performancelevel;
	}

    /**
     * Adds a repertoire to this association.
     *
     * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
     * @return void
     */
    public function addRepertoire($repertoire)
    {
        $this->getRepertoires()->attach($repertoire);
    }

     /**
     * Removes a repertoire from this association.
     *
     * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
     * @return void
     */
    public function removeRepertoire($repertoire)
    {
        $this->getRepertoires()->detach($repertoire);
    }

	/**
	 * returns the repertoires attribute
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Repertoire>
	 */
	public function getRepertoires() {
		return $this->repertoires;
	}

	/**
	 * sets the repertoire_extra attribute
	 *
	 * @param string $repertoire_extra
	 * @return void
	 */
	public function setRepertoireExtra($repertoire_extra) {
		$this->repertoire_extra = $repertoire_extra;
	}

	/**
	 * returns the repertoire_extra attribute
	 *
	 * @return string
	 */
	public function getRepertoireExtra() {
		return $this->repertoire_extra;
	}

	/**
	 * sets the contactperson attribute
	 *
	 * @param \RGU\Dvoconnector\Domain\Model\ContactPerson $contactperson
	 * @return void
	 */
	public function setContactPerson($contactperson) {
		$this->contactperson = $contactperson;
	}

	/**
	 * returns the contactperson attribute
	 *
	 * @return \RGU\Dvoconnector\Domain\Model\ContactPerson
	 */
	public function getContactPerson() {
		return $this->contactperson;
	}

	/**
	 * sets the membershipnumber attribute
	 *
	 * @param string $membershipnumber
	 * @return void
	 */
	public function setMembershipNumber($membershipnumber) {
		$this->membershipnumber = $membershipnumber;
	}

	/**
	 * returns the membershipcount attribute
	 *
	 * @return string
	 */
	public function getMembershipNumber() {
		return $this->membershipnumber;
	}

	/**
	 * sets the membershipcount attribute
	 *
	 * @param string $membershipcount
	 * @return void
	 */
	public function setMembershipCount($membershipcount) {
		$this->membershipcount = $membershipcount;
	}

	/**
	 * returns the membershipcount attribute
	 *
	 * @return string
	 */
	public function getMembershipCount() {
		return $this->membershipcount;
	}

	/**
   * Adds a functionary to this association.
   *
   * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Functionary $functionary
   * @return void
   */
  public function addFunctionary($functionary)
  {
      $this->getFunctionaries()->attach($functionary);
  }

   /**
   * Removes a functionary from this association.
   *
   * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Functionary $functionary
   * @return void
   */
  public function removeFunctionary($functionary)
  {
      $this->getFunctionaries()->detach($functionary);
  }

	/**
	 * returns the functionaries attribute
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Functionary>
	 */
	public function getFunctionaries() {
		return $this->functionaries;
	}

	/**
	 * sets the urlemblem attribute
	 *
	 * @param string $urlemblem
	 * @return void
	 */
	public function setUrlEmblem($urlemblem) {
		$this->urlemblem = $urlemblem;
	}

	/**
	 * returns the urlemblem attribute
	 *
	 * @return string
	 */
	public function getUrlEmblem() {
		return $this->urlemblem;
	}

	/**
	 * sets the urlphoto attribute
	 *
	 * @param string $urlphoto
	 * @return void
	 */
	public function setUrlPhoto($urlphoto) {
		$this->urlphoto = $urlphoto;
	}

	/**
	 * returns the urlphoto attribute
	 *
	 * @return string
	 */
	public function getUrlPhoto() {
		return $this->urlphoto;
	}

	/**
	 * returns the urlphoto as File
	 *
	 * @return \TYPO3\CMS\Core\Resource\File
	 */
	public function getUrlPhotoFile() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
		return $objectManager->get(\RGU\Dvoconnector\Service\ImageService::class)->getCachedFile($this->getUrlPhoto());
	}

	/**
	 * returns the urlemblem as File
	 *
	 * @return \TYPO3\CMS\Core\Resource\File
	 */
	public function getUrlEmblemFile() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
		return $objectManager->get(\RGU\Dvoconnector\Service\ImageService::class)->getCachedFile($this->getUrlEmblem());
	}

}
