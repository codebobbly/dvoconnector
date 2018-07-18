<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Mapper;

use \RGU\Dvoconnector\Mapper\Generic;
use \RGU\Dvoconnector\Domain\Model\Association;
use \RGU\Dvoconnector\Domain\Model\Address;
=======
namespace RG\Rgdvoconnector\Mapper;

use \RG\Rgdvoconnector\Mapper\Generic;
use \RG\Rgdvoconnector\Domain\Model\Association;
use \RG\Rgdvoconnector\Domain\Model\Address;
>>>>>>> parent of 8432775... Change Namespace

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
