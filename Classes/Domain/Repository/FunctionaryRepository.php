<?php
namespace RGU\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Rgdvoconnector\Domain\Model\Association;
use \RGU\Rgdvoconnector\Domain\Model\Functionary;
use \RGU\Rgdvoconnector\Domain\Model\Functionaries;
use \RGU\Rgdvoconnector\Service\AssociationsApiService;

class FunctionaryRepository extends \RGU\Rgdvoconnector\Domain\Repository\GenericRepository {

	/**
	 * $associationsApiService
	 * @var \RGU\Rgdvoconnector\Service\AssociationsApiService
	 * @inject
 	*/
	protected $associationsApiService;

	/**
	 * Finds an object matching the given identifier.
	 *
	 * @param int $uid The identifier of the object to find
	 *
	 * @throws \RuntimeException
	 * @throws \InvalidArgumentException
	 * @return object The matching object
	 * @api
	 */
	public function findByUid($uid) {
		return $this->findByID($uid);
	}

	/**
	 * return a functionary
	 *
	 * @param string functionary id $eid
	 *
	 * @return Functionary
 	*/
	public function findByID($fid, $functionaryFilter = null) {

		$xmlQuery = $this->associationsApiService->getFunctionaryFromID($fid, $functionaryFilter);

		$functionary = new Functionary();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Functionary($xmlQuery);
		$mapper->mapToAbstractEntity($functionary);

		return $this->completeEntity($functionary);

	}

	/**
	 * return a functionary
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Association $association
	 * @param string functionary id $eid
	 * @param \RGU\Rgdvoconnector\Domain\Filter\FunctionaryFilter $functionaryFilter
	 *
	 * @return Functionary
 	*/
	public function findByAssociationAndID($association, $fid, $functionaryFilter = null) {

		$xmlQuery = $this->associationsApiService->getFunctionaryFromAssociation($association->getID(), $fid, $functionaryFilter);

		$functionary = new Functionary();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Functionary($xmlQuery);
		$mapper->mapToAbstractEntity($functionary);

		return $this->completeEntity($functionary);

	}

	/**
	 * return all functionarys
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RGU\Rgdvoconnector\Domain\Filter\FunctionariesFilter $functionariesFilter
	 *
	 * @return Functionaries
 	*/
	public function findFunctionariesByAssociation($association, $functionariesFilter = null) {

		$xmlQuery = $this->associationsApiService->getFunctionariesFromAssociation($association->getID(), $functionariesFilter);

		$functionaries = new Functionaries();

		$mapper = new \RGU\Rgdvoconnector\Mapper\Functionaries($xmlQuery);
		$mapper->mapToAbstractEntity($functionaries);

		return $this->completeEntity($functionaries);

	}

	/**
	 * return all functionarys
	 *
	 * @param \RGU\Rgdvoconnector\Domain\Filter\FunctionariesFilter $functionariesFilter
	 *
	 * @return Functionaries
 	*/
	public function findFunctionariesByRootAssociations($functionariesFilter = null) {

		$arrayWithFunctionaries = $this->associationsApiService->getEventsFromRootAssociations($functionariesFilter);

		$functionaries = new Functionaries();

		foreach ($arrayWithFunctionaries as $xmlQuery) {

				$mapper = new \RGU\Rgdvoconnector\Mapper\Functionaries($xmlQuery);
				$mapper->mapToAbstractEntity($functionaries);

		}

		return $this->completeEntity($functionaries);

	}

}
