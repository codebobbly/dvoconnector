<?php
namespace RG\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RG\Rgdvoconnector\Domain\Model\Association;
use \RG\Rgdvoconnector\Domain\Model\Functionary;
use \RG\Rgdvoconnector\Domain\Model\Functionaries;
use \RG\Rgdvoconnector\Service\AssociationsApiService;

class FunctionaryRepository extends \RG\Rgdvoconnector\Domain\Repository\GenericRepository {

	/**
	 * $associationsApiService
	 * @var \RG\Rgdvoconnector\Service\AssociationsApiService
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

		$mapper = new \RG\Rgdvoconnector\Mapper\Functionary($xmlQuery);
		$mapper->mapToAbstractEntity($functionary);

		return $this->completeEntity($functionary);

	}

	/**
	 * return a functionary
	 *
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param string functionary id $eid
	 * @param \RG\Rgdvoconnector\Domain\Filter\FunctionaryFilter $functionaryFilter
	 *
	 * @return Functionary
 	*/
	public function findByAssociationAndID($association, $fid, $functionaryFilter = null) {

		$xmlQuery = $this->associationsApiService->getFunctionaryFromAssociation($association->getID(), $fid, $functionaryFilter);

		$functionary = new Functionary();

		$mapper = new \RG\Rgdvoconnector\Mapper\Functionary($xmlQuery);
		$mapper->mapToAbstractEntity($functionary);

		return $this->completeEntity($functionary);

	}

	/**
	 * return all functionarys
	 *
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RG\Rgdvoconnector\Domain\Filter\FunctionariesFilter $functionariesFilter
	 *
	 * @return Functionaries
 	*/
	public function findFunctionariesByAssociation($association, $functionariesFilter = null) {

		$xmlQuery = $this->associationsApiService->getFunctionariesFromAssociation($association->getID(), $functionariesFilter);

		$functionaries = new Functionaries();

		$mapper = new \RG\Rgdvoconnector\Mapper\Functionaries($xmlQuery);
		$mapper->mapToAbstractEntity($functionaries);

		return $this->completeEntity($functionaries);

	}

	/**
	 * return all functionarys
	 *
	 * @param \RG\Rgdvoconnector\Domain\Filter\FunctionariesFilter $functionariesFilter
	 *
	 * @return Functionaries
 	*/
	public function findFunctionariesByRootAssociations($functionariesFilter = null) {

		$arrayWithFunctionaries = $this->associationsApiService->getEventsFromRootAssociations($functionariesFilter);

		$functionaries = new Functionaries();

		foreach ($arrayWithFunctionaries as $xmlQuery) {

				$mapper = new \RG\Rgdvoconnector\Mapper\Functionaries($xmlQuery);
				$mapper->mapToAbstractEntity($functionaries);

		}

		return $this->completeEntity($functionaries);

	}

}
