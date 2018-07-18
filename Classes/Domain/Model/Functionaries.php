<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model;
=======
namespace RG\Rgdvoconnector\Domain\Model;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Functionaries extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Functionary>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Functionary>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $functionaries;

	public function __construct() {
		$this->functionaries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Functionary
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Functionary $functionary
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Functionary $functionary
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function addFunctionary($functionary)
	{
			$this->getfunctionaries()->attach($functionary);
	}

	 /**
	 * Removes a Functionary
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Domain\Model\Functionary $functionary
=======
	 * @param \RG\Rgdvoconnector\Domain\Domain\Model\Functionary $functionary
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function removeFunctionary($functionary)
	{
			$this->getfunctionaries()->detach($functionary);
	}

	/**
	 * returns the functionaries
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Functionary>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Functionary>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getfunctionaries() {
		return $this->functionaries;
	}

}
