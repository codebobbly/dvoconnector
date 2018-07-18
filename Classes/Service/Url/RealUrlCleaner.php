<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Service\Url;

use RGU\Dvoconnector\Domain\Filter\EventsFilter;
=======
namespace RG\Rgdvoconnector\Service\Url;

use RG\Rgdvoconnector\Domain\Filter\EventsFilter;
>>>>>>> parent of 8432775... Change Namespace

/**
 * RealUrl.
 */
class RealUrlCleaner extends AbstractRealUrl {

  /**
   * Build the realurl alias.
   *
   * @param $params
   * @param $ref
   *
   * @return string
   */
  public function main($params, $ref) {

    $params['pathParts'] = array_filter($params['pathParts'], function($v, $k) {
        return !empty($v);
    }, ARRAY_FILTER_USE_BOTH);

    return null;

  }

}
