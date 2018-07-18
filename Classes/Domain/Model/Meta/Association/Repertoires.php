<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model\Meta\Association;
=======
namespace RG\Rgdvoconnector\Domain\Model\Meta\Association;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Repertoires extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $repertoires;

	public function __construct() {
		$this->repertoires = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Repertoire
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
	 * Removes a Repertoire
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
	 * returns the Repertoires
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getRepertoires() {
		return $this->repertoires;
	}

}
