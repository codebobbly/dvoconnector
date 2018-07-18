<?php

namespace RGU\Dvoconnector\Mapper;

use \RGU\Dvoconnector\Mapper\Generic;
use \RGU\Dvoconnector\Domain\Model\Association;
use \RGU\Dvoconnector\Domain\Model\Address;

class Associations extends Generic {

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
      case 'zip';
        return 'zipcode';
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
      case 'zip';
      case 'location';

        $address = $entity->getAddress();

        if(!$address) {
          $address = new Address();
          $entity->setAddress($address);
        }

        return $address;
        break;
			default:
				return $entity;
				break;
		}

	}

}
