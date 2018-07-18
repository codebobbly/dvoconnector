<?php

namespace RG\Rgdvoconnector\Mapper;

use \RG\Rgdvoconnector\Mapper\Generic;
use \RG\Rgdvoconnector\Domain\Model\Association;

class Event extends Generic {

  /**
	 * map attributName to property
	 *
	 * @param SimpleXMLElement xmlElement
	 * @param string attributName
	 *
	 * @return string
 	*/
	protected function mapAttributToProperty($xmlEntry, $attributName, $stackEntity) {

		switch ($xmlEntry->getName()) {
      case 'date';

				switch ($attributName) {
					case 'start';
						return 'startDate';
		        break;
					case 'end';
						return 'endDate';
		        break;
					default:
						return $attributName;
						break;
				}

        break;
			default:

				switch ($attributName) {
					case 'associationid';
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
