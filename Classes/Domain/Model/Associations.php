<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model;
/** copyright notice **/
use RGU\Dvoconnector\Domain\Model\ListEntity;
=======
namespace RG\Rgdvoconnector\Domain\Model;
/** copyright notice **/
use RG\Rgdvoconnector\Domain\Model\ListEntity;
>>>>>>> parent of 8432775... Change Namespace

class Associations extends ListEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Association>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $associations;

	public function __construct() {
		$this->associations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Association
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Association $association
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Association $association
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function addAssociation($association)
	{
			$this->getAssociations()->attach($association);
	}

	 /**
	 * Removes a Association
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Association $association
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Association $association
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function removeAssociation($association)
	{
			$this->getAssociations()->detach($association);
	}

	/**
	 * returns the Associations
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Association>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getAssociations() {
		return $this->associations;
	}

}
