<?php

namespace RGU\Dvoconnector\Mapper;

use \RGU\Dvoconnector\Mapper\Generic;
use \RGU\Dvoconnector\Domain\Model\Association;

class Events extends Generic {

  /**
	 * map attributName to property
	 *
	 * @param SimpleXMLElement xmlElement
	 * @param string attributName
	 *
	 * @return string
 	*/
	protected function mapAttributToProperty($xmlEntry, $attributName, $stackEntity) {

		switch ($attributName) {
			case 'dateend';
        return 'endDate';
        break;
      case 'datestart';
        return 'startDate';
        break;
			case 'associationname';
        return 'name';
        break;
      case 'associationid';
        return 'id';
        break;
			default:
				return $attributName;
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
	protected function getEntityForAttribut($entity, $xmlEntry, $attributName, $stackEntity) {

    switch ($attributName) {
      case 'associationname';
      case 'associationid';

        $association = $entity->getAssociation();

        if(!$association) {
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
