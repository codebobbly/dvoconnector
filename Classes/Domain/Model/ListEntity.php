<?php
namespace RGU\Dvoconnector\Domain\Model;

/** copyright notice **/
class ListEntity extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

  /**
     * rows
     * @var int
     */
    protected $rows;

    /**
       * offset
       * @var int
       */
    protected $offset;

    /**
     * limit
     * @var int
     */
    protected $limit;

    /**
       * sets the rows attribute
       *
       * @param int $rows
       * @return void
       */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    /**
     * returns the rows attribute
     *
     * @return int
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
       * sets the offset attribute
       *
       * @param int $offset
       * @return void
       */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * returns the offset attribute
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
       * sets the limit attribute
       *
       * @param int $limit
       * @return void
       */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * returns the limit attribute
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }
}
