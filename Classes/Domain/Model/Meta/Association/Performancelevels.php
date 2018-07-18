<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model\Meta\Association;
=======
namespace RG\Rgdvoconnector\Domain\Model\Meta\Association;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Performancelevels extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $performancelevels;

	public function __construct() {
		$this->performancelevels = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Performancelevel
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel $Performancelevel
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel $Performancelevel
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function addPerformancelevel($Performancelevel)
	{
			$this->getPerformancelevels()->attach($Performancelevel);
	}

	 /**
	 * Removes a Performancelevel
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel $Performancelevel
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel $Performancelevel
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function removePerformancelevel($Performancelevel)
	{
			$this->getPerformancelevels()->detach($Performancelevel);
	}

	/**
	 * returns the Performancelevels
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getPerformancelevels() {
		return $this->performancelevels;
	}

}
