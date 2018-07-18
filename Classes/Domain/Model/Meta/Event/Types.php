<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model\Meta\Event;
=======
namespace RG\Rgdvoconnector\Domain\Model\Meta\Event;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Types extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Event\Type>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Event\Type>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $types;

	public function __construct() {
		$this->types = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Type
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Event\Type $type
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type $type
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function addType($type)
	{
			$this->getTypes()->attach($type);
	}

	 /**
	 * Removes a Type
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Event\Type $type
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type $type
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function removeType($type)
	{
			$this->getTypes()->detach($type);
	}

	/**
	 * returns the Types
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Event\Type>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Event\Type>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getTypes() {
		return $this->types;
	}

}
