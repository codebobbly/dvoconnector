<?php

namespace RGU\Dvoconnector\Mapper;

use RGU\Dvoconnector\Domain\Model\Association;

class Functionary extends Generic
{

    /**
     * map attributName to property
     *
     * @param SimpleXMLElement xmlElement
     * @param string attributName
     *
     * @return string
    */
    protected function mapAttributToProperty($xmlEntry, $attributName, $stackEntity)
    {
        switch ($xmlEntry->getName()) {
      case 'photo':

                switch ($attributName) {
                    case 'src':
                        return 'photoSource';
                break;
                    default:
                        return $attributName;
                        break;
                }

        break;

            default:

                switch ($attributName) {
                    case 'associationid':
                        return 'id';
                        break;
                    default:
                        return $attributName;
                        break;
                }

                break;

        }
    }

    /**
       * map TagName to property
       *
       * @param \SimpleXMLElement xmlElement
       * @param string tagName
       *
       * @return string
      */
    protected function mapTagNameToProperty($xmlEntry, $tagName, $stackEntity)
    {
        switch ($tagName) {
            case 'firstname':
        return 'firstName';
        break;
      case 'lastname':
        return 'lastName';
        break;
            default:
                return $tagName;
                break;
        }
    }

    /**
     * get Entity for attribut
     *
     * @param AbstractEntity entity
     * @param SimpleXMLElement xmlElement
     * @param string attributName
     *
     * @return AbstractEntity
    */
    protected function getEntityForAttribut($entity, $xmlEntry, $attributName, $stackEntity)
    {
        switch ($attributName) {
      case 'associationid':

        $association = $entity->getAssociation();

        if (!$association) {
            $association = new Association();
            $entity->setAssociation($association);
        }

        return $association;
        break;
            default:
                return $entity;
                break;
        }
    }
}
