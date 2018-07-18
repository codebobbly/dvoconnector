<?php

namespace RGU\Dvoconnector\Service\Url;

use RGU\Dvoconnector\Domain\Filter\EventsFilter;

/**
 * RealUrl.
 */
class RealUrlFilter extends AbstractRealUrl {

  /**
   * Handle the alias to ID convert.
   *
   * @param $value
   */
  protected function alias2id($value) {
    return $value;
  }

  /**
   * Handle the ID to alias convert.
   *
   * @param $value
   *
   * @return string
   */
  protected function id2alias($value) {
    return $value;
  }

}
