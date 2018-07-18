<?php

namespace RGU\Rgdvoconnector\Domain\Filter;

class AssociationsFilter extends GenericFilterContext   {

  /**
	 * offset
	 * @var integer
	 */
	protected $offset;

	/**
	 * limit
	 * @var integer
	 */
	protected $limit;

  /**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<string>
   */
  protected $type;

  /**
	 * Filter: Teil des Vereinigungsnamens.
	 * @var string
	 */
	protected $name;

  /**
	 * Filter: ID der Kategorie (siehe Metadaten)
	 * @var string
	 */
	protected $categoryid;

  /**
	 * Filter: ID des Repertoire (siehe Metadaten)
	 * @var string
	 */
	protected $repertoireid;

  /**
	 * Teil des Vereinigungsorts oder der Postleitzahl
	 * @var string
	 */
	protected $location;

	public function __construct() {
		$this->type = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

  /**
	 * sets the offset attribute
	 *
	 * @param integer $offset
	 * @return void
	 */
	public function setOffset($offset) {
		$this->offset = $offset;
	}

	/**
	 * returns the offset attribute
	 *
	 * @return integer
	 */
	public function getOffset() {
		return $this->offset;
	}

  /**
	 * sets the limit attribute
	 *
	 * @param integer $limit
	 * @return void
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * returns the limit attribute
	 *
	 * @return integer
	 */
	public function getLimit() {
		return $this->limit;
	}

  /**
   * Adds a type of association
   *
   * @param string $type
   * @return void
   */
  public function addType($type)
  {
      $this->getTypes()->attach($type);
  }

   /**
   * Removes a type of association
   *
   * @param $type
   * @return void
   */
  public function removeType($type)
  {
      $this->getTypes()->detach($type);
  }

	/**
	 * returns the types attribute
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<string>
	 */
	public function getTypes() {
	  return $this->type;
	}

  /**
	 * sets the name attribute
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * returns the name attribute
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

  /**
	 * sets the categoryid attribute
	 *
	 * @param string $categoryid
	 * @return void
	 */
	public function setCategoryID($categoryid) {
		$this->categoryid = $categoryid;
	}

	/**
	 * returns the categoryid attribute
	 *
	 * @return string
	 */
	public function getCategoryID() {
		return $this->categoryid;
	}

  /**
	 * sets the repertoireid attribute
	 *
	 * @param string $repertoireid
	 * @return void
	 */
	public function setRepertoireID($repertoireid) {
		$this->repertoireid = $repertoireid;
	}

	/**
	 * returns the repertoireid attribute
	 *
	 * @return string
	 */
	public function getRepertoireID() {
		return $this->repertoireid;
	}

  /**
	 * sets the location attribute
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * returns the location attribute
	 *
	 * @return string
	 */
	public function getLocation() {
		return $this->location;
	}

  /**
	 * returns the array of parameters
	 *
	 * @return array
	 */
	public function getParametersArray() {

    $result = parent::getParametersArray();

		if(!empty($this->getOffset())) {
			$result['offset'] = $this->getOffset();
		}

		if(!empty($this->getLimit())) {
			$result['limit'] = $this->getLimit();
		}

		if($this->getTypes()->count() > 0) {
			$result['type'] = implode('|', $this->getTypes()->toArray());
		}

		if(!empty($this->getName())) {
			$result['f_name'] = $this->getName();
		}

		if(!empty($this->getCategoryID())) {
			$result['f_category'] = $this->getCategoryID();
		}

		if(!empty($this->getRepertoireID())) {
			$result['f_repertoire'] = $this->getRepertoireID();
		}

		if(!empty($this->getLocation())) {
			$result['f_location'] = $this->getLocation();
		}

    return $result;

	}

}
