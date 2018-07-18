<?php
namespace RG\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RG\Rgdvoconnector\Domain\Model\Association;
use \RG\Rgdvoconnector\Domain\Model\Associations;
use \RG\Rgdvoconnector\Service\AssociationsApiService;

class AssociationRepository extends \RG\Rgdvoconnector\Domain\Repository\GenericRepository {

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
	 * return the first root association
	 *
	 * @return Associations
 	*/
	public function getFirstRootAssociation($associationsFilter = null) {

		return $this->getRootAssociations($associationsFilter)->getAssociations()->rewind()->current();

	}

	/**
	 * return the root associations
	 *
	 * @return Associations
 	*/
	public function getRootAssociations($associationsFilter = null) {

		$arrayWithChilds = $this->associationsApiService->getRootAssociations($associationsFilter);

		$associations = new Associations();

		foreach($arrayWithChilds as $xmlQuery) {

			$association = new Association();

			$mapper = new \RG\Rgdvoconnector\Mapper\Association($xmlQuery);
			$mapper->mapToAbstractEntity($association);

			$associations->addAssociation($this->completeEntity($association));

		}

		return $this->completeEntity($associations);

	}

	/**
	 * return a association
	 *
	 * @param string association id
	 *
	 * @return Association
 	*/
	public function findByID($aid, $associationsFilter = null) {

		$xmlQuery = $this->associationsApiService->getAssociation($aid, $associationsFilter);

		$association = new Association();

		$mapper = new \RG\Rgdvoconnector\Mapper\Association($xmlQuery);
		$mapper->mapToAbstractEntity($association);

		return $this->completeEntity($association);

	}

	/**
	 * return all associations
	 *
	 * @param \RG\Rgdvoconnector\Domain\Filter\AssociationsFilter $associationsFilter
	 *
	 * @return Associations
 	*/
	public function findAssociationsByRootAssociations($associationsFilter = null) {

		$arrayWithChilds = $this->associationsApiService->findAssociationsByRootAssociations($associationsFilter);

		$associations = new Associations();

		foreach($arrayWithChilds as $xmlQuery) {

				$mapper = new \RG\Rgdvoconnector\Mapper\Associations($xmlQuery);
				$mapper->mapToAbstractEntity($associations);

		}

		return $this->completeEntity($associations);

	}

	/**
	 * return all associations
	 *
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RG\Rgdvoconnector\Domain\Filter\AssociationsFilter $associationsFilter
	 *
	 * @return Associations
 	*/
	public function findAssociationsByAssociation($association, $associationsFilter = null) {

		$xmlQuery = $this->associationsApiService->getChildAssociationsFromAssociation($association->getID(), $associationsFilter);

		$associations = new Associations();

		$mapper = new \RG\Rgdvoconnector\Mapper\Associations($xmlQuery);
		$mapper->mapToAbstractEntity($associations);

		return $this->completeEntity($associations);

	}

}
