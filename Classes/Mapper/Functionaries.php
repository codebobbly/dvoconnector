<?php

namespace RGU\Rgdvoconnector\Mapper;

use \RGU\Rgdvoconnector\Mapper\Generic;
use \RGU\Rgdvoconnector\Domain\Model\Association;
use \RGU\Rgdvoconnector\Domain\Model\Address;

class Functionaries extends Generic {

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
			case 'firstname';
        return 'firstName';
        break;
      case 'lastname';
        return 'lastName';
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
