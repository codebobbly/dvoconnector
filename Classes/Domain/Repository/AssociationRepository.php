<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Dvoconnector\Domain\Model\Association;
use \RGU\Dvoconnector\Domain\Model\Associations;
use \RGU\Dvoconnector\Service\AssociationsApiService;

class AssociationRepository extends \RGU\Dvoconnector\Domain\Repository\GenericRepository {

	/**
	 * $associationsApiService
	 * @var \RGU\Dvoconnector\Service\AssociationsApiService
=======
namespace RG\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RG\Rgdvoconnector\Domain\Model\Association;
use \RG\Rgdvoconnector\Domain\Model\Associations;
use \RG\Rgdvoconnector\Service\AssociationsApiService;

class AssociationRepository extends \RG\Rgdvoconnector\Domain\Repository\GenericRepository {

	/**
	 * $associationsApiService
	 * @var \RG\Rgdvoconnector\Service\AssociationsApiService
>>>>>>> parent of 8432775... Change Namespace
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

<<<<<<< HEAD
			$mapper = new \RGU\Dvoconnector\Mapper\Association($xmlQuery);
=======
			$mapper = new \RG\Rgdvoconnector\Mapper\Association($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
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

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Association($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Association($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($association);

		return $this->completeEntity($association);

	}

	/**
	 * return all associations
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Filter\AssociationsFilter $associationsFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Filter\AssociationsFilter $associationsFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Associations
 	*/
	public function findAssociationsByRootAssociations($associationsFilter = null) {

		$arrayWithChilds = $this->associationsApiService->findAssociationsByRootAssociations($associationsFilter);

		$associations = new Associations();

		foreach($arrayWithChilds as $xmlQuery) {

<<<<<<< HEAD
				$mapper = new \RGU\Dvoconnector\Mapper\Associations($xmlQuery);
=======
				$mapper = new \RG\Rgdvoconnector\Mapper\Associations($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
				$mapper->mapToAbstractEntity($associations);

		}

		return $this->completeEntity($associations);

	}

	/**
	 * return all associations
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Association $association
	 * @param \RGU\Dvoconnector\Domain\Filter\AssociationsFilter $associationsFilter
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Association $association
	 * @param \RG\Rgdvoconnector\Domain\Filter\AssociationsFilter $associationsFilter
>>>>>>> parent of 8432775... Change Namespace
	 *
	 * @return Associations
 	*/
	public function findAssociationsByAssociation($association, $associationsFilter = null) {

		$xmlQuery = $this->associationsApiService->getChildAssociationsFromAssociation($association->getID(), $associationsFilter);

		$associations = new Associations();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\Associations($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\Associations($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($associations);

		return $this->completeEntity($associations);

	}

}
