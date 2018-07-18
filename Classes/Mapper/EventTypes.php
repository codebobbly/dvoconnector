<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Mapper;

use \RGU\Dvoconnector\Mapper\Generic;
=======
namespace RG\Rgdvoconnector\Mapper;

use \RG\Rgdvoconnector\Mapper\Generic;
>>>>>>> parent of 8432775... Change Namespace

class EventTypes extends Generic {

  /**
	 * map TagName to property
	 *
	 * @param \SimpleXMLElement xmlElement
	 * @param string tagName
	 *
	 * @return string
 	*/
	protected function mapTagNameToProperty($xmlEntry, $tagName, $stackEntity) {

    switch ($tagName) {
      case 'eventtypes';
        return 'types';
        break;
			default:
				return $tagName;
				break;
		}

	}

}
