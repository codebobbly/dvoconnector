<?php
namespace RGU\Dvoconnector\Domain\Model\Meta\Association;
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Repertoires extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire>
   */
  protected $repertoires;

	public function __construct() {
		$this->repertoires = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Repertoire
	 *
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
	 * @return void
	 */
	public function addRepertoire($repertoire)
	{
			$this->getRepertoires()->attach($repertoire);
	}

	 /**
	 * Removes a Repertoire
	 *
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire $repertoire
	 * @return void
	 */
	public function removeRepertoire($repertoire)
	{
			$this->getRepertoires()->detach($repertoire);
	}

	/**
	 * returns the Repertoires
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire>
	 */
	public function getRepertoires() {
		return $this->repertoires;
	}

}
