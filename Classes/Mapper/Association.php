<?php

namespace RGU\Dvoconnector\Mapper;

class Association extends Generic
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
      case 'emblem':

                switch ($attributName) {
                    case 'src':
                        return 'urlemblem';
                break;
                    default:
                        return $attributName;
                        break;
                }

        break;
            case 'photo':

                switch ($attributName) {
                    case 'src':
                        return 'urlphoto';
                break;
                    default:
                        return $attributName;
                        break;
                }

        break;
            case 'membership':

                switch ($attributName) {
                    case 'number':
                        return 'membershipnumber';
                break;
                    case 'count':
                        return 'membershipcount';
                break;
                    default:
                        return $attributName;
                        break;
                }

        break;
            default:
                return $attributName;
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
      case 'contact_person':
        return 'contactperson';
        break;
            case 'performance_level':
        return 'performancelevel';
        break;
            default:
                return $tagName;
                break;
        }
    }

    /**
     * get Entity for TagName
     *
     * @param AbstractEntity entity
     * @param \SimpleXMLElement xmlElement
     * @param string TagName
     * @param \SplStack stackEntity
     *
     * @return AbstractEntity
    */
    protected function getEntityForTagName($entity, $xmlEntry, $tagName, $stackEntity)
    {
        switch ($tagName) {
      case 'repertoire_extra':

        $association = $stackEntity->offsetGet($stackEntity->count() - 1);

        return $association;
        break;
            default:
                return $entity;
                break;
        }
    }
}
