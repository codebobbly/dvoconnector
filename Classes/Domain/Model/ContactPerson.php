<?php

namespace RGU\Dvoconnector\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class ContactPerson extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Name
	 * @var string
	 */
	protected $name;

	/**
	 * Address
	 * @var string
	 */
	protected $address;
	
	public function __construct() {}

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
	 * sets the address attribute
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * returns the address attribute
	 *
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}
	
}