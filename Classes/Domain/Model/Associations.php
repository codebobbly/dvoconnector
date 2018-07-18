<?php
namespace RGU\Dvoconnector\Domain\Model;

/** copyright notice **/
class Associations extends ListEntity
{

    /**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
   */
    protected $associations;

    public function __construct()
    {
        $this->associations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Association
     *
     * @param \RGU\Dvoconnector\Domain\Domain\Model\Association $association
     * @return void
     */
    public function addAssociation($association)
    {
        $this->getAssociations()->attach($association);
    }

    /**
    * Removes a Association
    *
    * @param \RGU\Dvoconnector\Domain\Domain\Model\Association $association
    * @return void
    */
    public function removeAssociation($association)
    {
        $this->getAssociations()->detach($association);
    }

    /**
     * returns the Associations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Association>
     */
    public function getAssociations()
    {
        return $this->associations;
    }
}
