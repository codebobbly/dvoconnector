<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model\Meta\Event;
=======
namespace RG\Rgdvoconnector\Domain\Model\Meta\Event;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Type extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * id
	 * @var string
	 */
	protected $id;

	/**
	 * Name
	 * @var string
	 */
	protected $name;

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

}
