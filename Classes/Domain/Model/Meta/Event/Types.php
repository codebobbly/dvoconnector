<?php
namespace RGU\Dvoconnector\Domain\Model\Meta\Event;

/** copyright notice **/
class Types extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Event\Type>
   */
    protected $types;

    public function __construct()
    {
        $this->types = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Type
     *
     * @param \RGU\Dvoconnector\Domain\Model\Meta\Event\Type $type
     * @return void
     */
    public function addType($type)
    {
        $this->getTypes()->attach($type);
    }

    /**
    * Removes a Type
    *
    * @param \RGU\Dvoconnector\Domain\Model\Meta\Event\Type $type
    * @return void
    */
    public function removeType($type)
    {
        $this->getTypes()->detach($type);
    }

    /**
     * returns the Types
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Event\Type>
     */
    public function getTypes()
    {
        return $this->types;
    }
}
