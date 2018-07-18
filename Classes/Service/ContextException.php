<?php

<<<<<<< HEAD
namespace RGU\Dvoconnector\Service;
=======
namespace RG\Rgdvoconnector\Service;
>>>>>>> parent of 8432775... Change Namespace

class ContextException extends \Exception
{

  public function __construct($code = 0, Exception $previous = null) {
      parent::__construct('No valid Context', $code, $previous);
  }

}
