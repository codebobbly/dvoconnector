<?php
namespace RGU\Rgdvoconnector\Domain\Model\Meta\Association;
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Performancelevels extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel>
   */
  protected $performancelevels;

	public function __construct() {
		$this->performancelevels = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Performancelevel
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel $Performancelevel
	 * @return void
	 */
	public function addPerformancelevel($Performancelevel)
	{
			$this->getPerformancelevels()->attach($Performancelevel);
	}

	 /**
	 * Removes a Performancelevel
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel $Performancelevel
	 * @return void
	 */
	public function removePerformancelevel($Performancelevel)
	{
			$this->getPerformancelevels()->detach($Performancelevel);
	}

	/**
	 * returns the Performancelevels
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel>
	 */
	public function getPerformancelevels() {
		return $this->performancelevels;
	}

}
