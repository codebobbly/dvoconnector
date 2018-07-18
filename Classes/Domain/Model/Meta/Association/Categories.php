<?php
namespace RGU\Dvoconnector\Domain\Model\Meta\Association;

/** copyright notice **/
class Categories extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Category>
   */
    protected $categories;

    public function __construct()
    {
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Category
     *
     * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Category $category
     * @return void
     */
    public function addCategory($category)
    {
        $this->getCategories()->attach($category);
    }

    /**
    * Removes a Category
    *
    * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Category $category
    * @return void
    */
    public function removeCategory($category)
    {
        $this->getCategories()->detach($category);
    }

    /**
     * returns the Categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Category>
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
