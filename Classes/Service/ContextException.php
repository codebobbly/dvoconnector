<?php

namespace RGU\Rgdvoconnector\Service;

class ContextException extends \Exception
{

  public function __construct($code = 0, Exception $previous = null) {
      parent::__construct('No valid Context', $code, $previous);
  }

}
