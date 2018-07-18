<?php

namespace RGU\Dvoconnector\Mapper;

use \RGU\Dvoconnector\Mapper\Generic;

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
