<?php
<<<<<<< HEAD
namespace RGU\Dvoconnector\Domain\Model\Meta\Association;
=======
namespace RG\Rgdvoconnector\Domain\Model\Meta\Association;
>>>>>>> parent of 8432775... Change Namespace
/** copyright notice **/
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Categories extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
<<<<<<< HEAD
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Category>
=======
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Association\Category>
>>>>>>> parent of 8432775... Change Namespace
   */
  protected $categories;

	public function __construct() {
		$this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Category
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Category $category
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Category $category
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function addCategory($category)
	{
			$this->getCategories()->attach($category);
	}

	 /**
	 * Removes a Category
	 *
<<<<<<< HEAD
	 * @param \RGU\Dvoconnector\Domain\Model\Meta\Association\Category $category
=======
	 * @param \RG\Rgdvoconnector\Domain\Model\Meta\Association\Category $category
>>>>>>> parent of 8432775... Change Namespace
	 * @return void
	 */
	public function removeCategory($category)
	{
			$this->getCategories()->detach($category);
	}

	/**
	 * returns the Categories
	 *
<<<<<<< HEAD
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RGU\Dvoconnector\Domain\Model\Meta\Association\Category>
=======
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RG\Rgdvoconnector\Domain\Model\Meta\Association\Category>
>>>>>>> parent of 8432775... Change Namespace
	 */
	public function getCategories() {
		return $this->categories;
	}

}
