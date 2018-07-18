<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Dvoconnector\Domain\Model\Meta\Association\Categories;
use \RGU\Dvoconnector\Domain\Model\Meta\Association\Category;
use \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevel;
use \RGU\Dvoconnector\Domain\Model\Meta\Association\Performancelevels;
use \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoire;
use \RGU\Dvoconnector\Domain\Model\Meta\Association\Repertoires;
use \RGU\Dvoconnector\Domain\Model\Meta\Event\Type;
use \RGU\Dvoconnector\Domain\Model\Meta\Event\Types;
use \RGU\Dvoconnector\Service\metaApiService;
=======
namespace RG\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RG\Rgdvoconnector\Domain\Model\Meta\Association\Categories;
use \RG\Rgdvoconnector\Domain\Model\Meta\Association\Category;
use \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel;
use \RG\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevels;
use \RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire;
use \RG\Rgdvoconnector\Domain\Model\Meta\Association\Repertoires;
use \RG\Rgdvoconnector\Domain\Model\Meta\Event\Type;
use \RG\Rgdvoconnector\Domain\Model\Meta\Event\Types;
use \RG\Rgdvoconnector\Service\metaApiService;
>>>>>>> parent of 8432775... Change Namespace

class MetaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * $metaApiService
<<<<<<< HEAD
	 * @var \RGU\Dvoconnector\Service\MetaApiService
=======
	 * @var \RG\Rgdvoconnector\Service\MetaApiService
>>>>>>> parent of 8432775... Change Namespace
	 * @inject
 	*/
	protected $metaApiService;

	/**
	 * return a association category
	 *
	 * @param string category id
	 *
	 * @return Category
 	*/
	public function findAssociationCategoryByID($id) {

		$categories = $this->findAssociationCategories()->getCategories();

		$categories->rewind();

		while($categories->valid()) {

		    $category = $categories->current();
				if($category->getID() == $id) {
					return $category;
				}

		    $categories->next();

		}

	}

	/**
	 * return all association categories
	 *
	 *
	 * @return Categories
 	*/
	public function findAssociationCategories() {

		$xmlQuery = $this->metaApiService->getAssociationCategories();

		$categories = new Categories();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\AssociationCategories($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\AssociationCategories($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($categories);

		return $categories;

	}

	/**
	 * return a association repertoire
	 *
	 * @param string repertoire id
	 *
	 * @return Repertoire
 	*/
	public function findAssociationRepertoireByID($id) {

		$repertoires = $this->findAssociationRepertoires()->getRepertoires();

		$repertoires->rewind();

		while($repertoires->valid()) {

		    $repertoire = $repertoires->current();
				if($repertoire->getID() == $id) {
					return $repertoire;
				}

		    $repertoires->next();

		}

	}

	/**
	 * return all association repertoires
	 *
	 *
	 * @return Repertoires
 	*/
	public function findAssociationRepertoires() {

		$xmlQuery = $this->metaApiService->getAssociationRepertoires();

		$repertoires = new Repertoires();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\AssociationRepertoires($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\AssociationRepertoires($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($repertoires);

		return $repertoires;

	}

	/**
	 * return a association performancelevel
	 *
	 * @param string performancelevel id
	 *
	 * @return Performancelevel
 	*/
	public function findAssociationPerformancelevelByID($id) {

		$performancelevels = $this->findAssociationPerformancelevels()->getPerformancelevels();

		$performancelevels->rewind();

		while($performancelevels->valid()) {

		    $performancelevel = $performancelevels->current();
				if($performancelevel->getID() == $id) {
					return $performancelevel;
				}

		    $performancelevels->next();

		}

	}

	/**
	 * return all association performancelevels
	 *
	 *
	 * @return Performancelevels
 	*/
	public function findAssociationPerformancelevels() {

		$xmlQuery = $this->metaApiService->getAssociationPerformancelevels();

		$performancelevels = new Performancelevels();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\AssociationPerformancelevels($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\AssociationPerformancelevels($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($performancelevels);

		return $performancelevels;

	}

	/**
	 * return a event type
	 *
	 * @param string event type id
	 *
	 * @return Event
 	*/
	public function findEventTypeByID($id) {

		$eventTypes = $this->findEventTypes()->getTypes();

		$eventTypes->rewind();

		while($eventTypes->valid()) {

		    $eventType = $eventTypes->current();
				if($eventType->getID() == $id) {
					return $eventType;
				}

		    $eventTypes->next();

		}

	}

	/**
	 * return all event types
	 *
	 *
	 * @return Events
 	*/
	public function findEventTypes() {

		$xmlQuery = $this->metaApiService->getEventTypes();

		$types = new Types();

<<<<<<< HEAD
		$mapper = new \RGU\Dvoconnector\Mapper\EventTypes($xmlQuery);
=======
		$mapper = new \RG\Rgdvoconnector\Mapper\EventTypes($xmlQuery);
>>>>>>> parent of 8432775... Change Namespace
		$mapper->mapToAbstractEntity($types);

		return $types;

	}

}
