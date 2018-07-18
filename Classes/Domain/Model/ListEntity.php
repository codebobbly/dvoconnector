<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model;
=======
namespace RG\Rgdvoconnector\Domain\Model;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class ListEntity extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

  /**
	 * rows
	 * @var integer
	 */
	protected $rows;

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
	 * sets the rows attribute
	 *
	 * @param integer $rows
	 * @return void
	 */
	public function setRows($rows) {
		$this->rows = $rows;
	}

	/**
	 * returns the rows attribute
	 *
	 * @return integer
	 */
	public function getRows() {
		return $this->rows;
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

}
