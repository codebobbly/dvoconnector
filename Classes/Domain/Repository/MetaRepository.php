<?php
namespace RGU\Rgdvoconnector\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Categories;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Category;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevel;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Performancelevels;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Repertoire;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Association\Repertoires;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Event\Type;
use \RGU\Rgdvoconnector\Domain\Model\Meta\Event\Types;
use \RGU\Rgdvoconnector\Service\metaApiService;

class MetaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * $metaApiService
	 * @var \RGU\Rgdvoconnector\Service\MetaApiService
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

		$mapper = new \RGU\Rgdvoconnector\Mapper\AssociationCategories($xmlQuery);
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

		$mapper = new \RGU\Rgdvoconnector\Mapper\AssociationRepertoires($xmlQuery);
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

		$mapper = new \RGU\Rgdvoconnector\Mapper\AssociationPerformancelevels($xmlQuery);
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

		$mapper = new \RGU\Rgdvoconnector\Mapper\EventTypes($xmlQuery);
		$mapper->mapToAbstractEntity($types);

		return $types;

	}

}
