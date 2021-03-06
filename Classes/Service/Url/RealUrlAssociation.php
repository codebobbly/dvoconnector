<?php

namespace RGU\Dvoconnector\Service\Url;

use RGU\Dvoconnector\Domain\Association;
use RGU\Dvoconnector\Domain\Filter\AssociationsFilter;

/**
 * RealUrl.
 */
class RealUrlAssociation extends AbstractRealUrl
{

  /**
   * Handle the ID to alias convert.
   *
   * @param $value
   *
   * @return string
   */
    protected function id2alias($value)
    {
        $association = $this->associationRepository->findByID($value);

        $alias = $association->getName();

        if (!$this->isNameUnique($association)) {
            $alias = $alias . self::SEPARATOR_OFFSET . dechex(intval($association->getID()));
        }

        return $this->cleanUrl($alias);
    }

    /**
     * determine if the association is unique by the name
     *
     * @param Association $association
     *
     * @return bool
     * @throws \Exception
     */
    protected function isNameUnique($association)
    {
        $associations = $this->determineAssociationsByName($association->getName());
        return $associations->getAssociations()->count() == 1;
    }

    /**
     * determine offset for association
     *
     * @param string $name
     *
     * @return string
     */
    protected function determineAssociationsByName($name)
    {
        $associationsFilter = new AssociationsFilter();
        $associationsFilter->setName($name);

        $associations = $this->associationRepository->findAssociationsByRootAssociations($associationsFilter);

        return $associations;
    }
}
