<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model;
=======
namespace RG\Rgdvoconnector\Domain\Model;
>>>>>>> parent of 8432775... Change Namespace
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
<<<<<<< HEAD
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
=======
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Association>
>>>>>>> parent of 8432775... Change Namespace
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
<<<<<<< HEAD
     * @var \RGU\Dvoconnector\Domain\Model\Address
=======
     * @var \RG\Rgdvoconnector\Domain\Model\Address
>>>>>>> parent of 8432775... Change Namespace
     */
    protected $address;

	/**
<<<<<<< HEAD
     * @var \RGU\Dvoconnector\Domain\Model\Meta\Association\Category
=======
     * @var \RG\Rgdvoconnector\Domain\Model\Meta\Association\Category
>>>>>>> parent of 8432775... Change Namespace
     */
    protected $category;

	/**
<<<<<<< HEAD
     * @var \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel
=======
     * @var \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel
>>>>>>> parent of 8432775... Change Namespace
     */
    protected $performancelevel;

	/**
<<<<<<< HEAD
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire>
=======
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire>
>>>>>>> parent of 8432775... Change Namespace
     */
	protected $repertoires;

	/**
<<<<<<< HEAD
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Functionary>
=======
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Functionary>
>>>>>>> parent of 8432775... Change Namespace
     */
	protected $functionaries;

	/**
	 * Repertoire extra
	 * @var string
	 */
	protected $repertoire_extra;

	/**
<<<<<<< HEAD
     * @var \RGU\Dvoconnector\Domain\Model\ContactPerson
=======
     * @var \RG\Rgdvoconnector\Domain\Model\ContactPerson
>>>>>>> parent of 8432775... Change Namespace
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
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Association>
>>>>>>> parent of 8432775... Change Namespace
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
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Address $address
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Address $address
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * returns the address attribute
	 *
<<<<<<< HEAD
	 * @return \RGU\Dvoconnector\Domain\Model\Address
=======
	 * @return \RG\Rgdvoconnector\Domain\Model\Address
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * sets the category attribute
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Category $category
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Category $category
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * returns the category attribute
	 *
<<<<<<< HEAD
	 * @return \RGU\Dvoconnector\Domain\Model\Meta\Association\Category
=======
	 * @return \RG\Rgdvoconnector\Domain\Model\Meta\Association\Category
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * sets the performancelevel attribute
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel $performancelevel
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel $performancelevel
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function setPerformancelevel($performancelevel) {
		$this->performancelevel = $performancelevel;
	}

	/**
	 * returns the performancelevel attribute
	 *
<<<<<<< HEAD
	 * @return \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel
=======
	 * @return \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getPerformancelevel() {
		return $this->performancelevel;
	}

    /**
     * Adds a repertoire to this association.
     *
<<<<<<< HEAD
     * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
=======
     * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
>>>>>>> parent of 8432775... Change Namespace
     * @return void
     */
    public function addRepertoire($repertoire)
    {
        $this->getRepertoires()->attach($repertoire);
    }

     /**
     * Removes a repertoire from this association.
     *
<<<<<<< HEAD
     * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
=======
     * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
>>>>>>> parent of 8432775... Change Namespace
     * @return void
     */
    public function removeRepertoire($repertoire)
    {
        $this->getRepertoires()->detach($repertoire);
    }

	/**
	 * returns the repertoires attribute
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Repertoire>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Repertoire>
>>>>>>> parent of 8432775... Change Namespace
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
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\ContactPerson $contactperson
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\ContactPerson $contactperson
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function setContactPerson($contactperson) {
		$this->contactperson = $contactperson;
	}

	/**
	 * returns the contactperson attribute
	 *
<<<<<<< HEAD
	 * @return \RGU\Dvoconnector\Domain\Model\ContactPerson
=======
	 * @return \RG\Rgdvoconnector\Domain\Model\ContactPerson
>>>>>>> parent of 8432775... Change Namespace
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
<<<<<<< HEAD
   * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Functionary $functionary
=======
   * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Functionary $functionary
>>>>>>> parent of 8432775... Change Namespace
   * @return void
   */
  public function addFunctionary($functionary)
  {
      $this->getFunctionaries()->attach($functionary);
  }

   /**
   * Removes a functionary from this association.
   *
<<<<<<< HEAD
   * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Functionary $functionary
=======
   * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Functionary $functionary
>>>>>>> parent of 8432775... Change Namespace
   * @return void
   */
  public function removeFunctionary($functionary)
  {
      $this->getFunctionaries()->detach($functionary);
  }

	/**
	 * returns the functionaries attribute
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Functionary>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Functionary>
>>>>>>> parent of 8432775... Change Namespace
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
<<<<<<< HEAD
		return $objectManager->get(\RGU\Dvoconnector\Service\ImageService::class)->getCachedFile($this->getUrlPhoto());
=======
		return $objectManager->get(\RG\Rgdvoconnector\Service\ImageService::class)->getCachedFile($this->getUrlPhoto());
>>>>>>> parent of 8432775... Change Namespace
	}

	/**
	 * returns the urlemblem as File
	 *
	 * @return \TYPO3\CMS\Core\Resource\File
	 */
	public function getUrlEmblemFile() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
<<<<<<< HEAD
		return $objectManager->get(\RGU\Dvoconnector\Service\ImageService::class)->getCachedFile($this->getUrlEmblem());
=======
		return $objectManager->get(\RG\Rgdvoconnector\Service\ImageService::class)->getCachedFile($this->getUrlEmblem());
>>>>>>> parent of 8432775... Change Namespace
	}

}
