<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model;
=======
namespace RG\Rgdvoconnector\Domain\Model;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * id
	 * @var string
	 */
	protected $id;

	/**
	 * Association
<<<<<<< HEAD
	 * @var \RGU\Dvoconnector\Domain\Model\Association
=======
	 * @var \RG\Rgdvoconnector\Domain\Model\Association
>>>>>>> parent of 8432775... Change Namespace
	 */
	protected $association;

	/**
	 * Private
	 * @var string
	 */
	protected $private;

	/**
	 * editor edited
	 * @var string
	 */
	protected $editoredited;

	/**
	 * Type
<<<<<<< HEAD
	 * @var \RGU\Dvoconnector\Domain\Model\Meta\Event\Type
=======
	 * @var \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type
>>>>>>> parent of 8432775... Change Namespace
	 */
	protected $type;

	/**
	 * eventlocation
	 * @var string
	 */
	protected $eventlocation;

	/**
	 * Title
	 * @var string
	 */
	protected $title;

	/**
<<<<<<< HEAD
     * @var \RGU\Dvoconnector\Domain\Model\Address
=======
     * @var \RG\Rgdvoconnector\Domain\Model\Address
>>>>>>> parent of 8432775... Change Namespace
     */
    protected $address;

	/**
	 * Start Date
	 * @var \DateTime
	 */
	protected $startDate;

	/**
	 * End Date
	 * @var \DateTime
	 */
	protected $endDate;

	/**
	 * Bookingoffice
	 * @var string
	 */
	protected $bookingoffice;

	/**
	 * Entrancefee
	 * @var string
	 */
	protected $entrancefee;

	/**
	 * Description
	 * @var string
	 */
	protected $description;

	/**
	 * URL
	 * @var string
	 */
	protected $url;

	/**
	 * Email
	 * @var string
	 */
	protected $email;

	public function __construct() {
<<<<<<< HEAD
		$this->$address = new \RGU\Dvoconnector\Domain\Model\Address();
=======
		$this->$address = new \RG\Rgdvoconnector\Domain\Model\Address();
>>>>>>> parent of 8432775... Change Namespace
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
	 * sets the association attribute
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Association $association
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
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
	 * @return \RGU\Dvoconnector\Domain\Model\Association
=======
	 * @return \RG\Rgdvoconnector\Domain\Model\Association
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getAssociation() {
		return $this->association;
	}

	/**
	 * sets the private attribute
	 *
	 * @param string $private
	 * @return void
	 */
	public function setPrivate($private) {
		$this->private = $private;
	}

	/**
	 * returns the private attribute
	 *
	 * @return string
	 */
	public function getPrivate() {
		return $this->private;
	}

	/**
	 * sets the editoredited attribute
	 *
	 * @param string $editoredited
	 * @return void
	 */
	public function setEditoredited($editoredited) {
		$this->editoredited = $editoredited;
	}

	/**
	 * returns the editoredited attribute
	 *
	 * @return string
	 */
	public function getEditoredited() {
		return $this->editoredited;
	}

	/**
	 * sets the type attribute
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Event\Type $type
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type $type
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * returns the type attribute
	 *
<<<<<<< HEAD
	 * @return \RGU\Dvoconnector\Domain\Model\Meta\Event\Type
=======
	 * @return \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * sets the eventlocation attribute
	 *
	 * @param string $eventlocation
	 * @return void
	 */
	public function setEventlocation($eventlocation) {
		$this->eventlocation = $eventlocation;
	}

	/**
	 * returns the eventlocation attribute
	 *
	 * @return string
	 */
	public function getEventlocation() {
		return $this->eventlocation;
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
	 * sets the Start Date attribute
	 *
	 * @param \DateTime $startDate
	 * @return void
	 */
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}

	/**
	 * returns the Start Date attribute
	 *
	 * @return \DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * sets the End Date attribute
	 *
	 * @param \DateTime $endDate
	 * @return void
	 */
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
	}

	/**
	 * returns the endDate attribute
	 *
	 * @return \DateTime
	 */
	public function getEndDate() {
		return $this->endDate;
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
	 * sets the bookingoffice attribute
	 *
	 * @param string $bookingoffice
	 * @return void
	 */
	public function setBookingoffice($bookingoffice) {
		$this->bookingoffice = $bookingoffice;
	}

	/**
	 * returns the bookingoffice attribute
	 *
	 * @return string
	 */
	public function getBookingoffice() {
		return $this->bookingoffice;
	}

	/**
	 * sets the entrancefee attribute
	 *
	 * @param string $entrancefee
	 * @return void
	 */
	public function setEntrancefee($entrancefee) {
		$this->entrancefee = $entrancefee;
	}

	/**
	 * returns the entrancefee attribute
	 *
	 * @return string
	 */
	public function getEntrancefee() {
		return $this->entrancefee;
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

}
