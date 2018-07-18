<?php

namespace RGU\Dvoconnector\Domain\Filter;

class GenericFilter implements \RGU\Dvoconnector\Service\ApiServiceFilter  {

	/**
	 * returns the array of parameters
	 *
	 * @return array
	 */
	public function getParametersArray() {

		$result = array();
		$result['inside_association_id'] = $this->getInsideAssociationID();

		return $result;

	}

	/**
   * Builds a query string from an array and takes care of proper url-encoding
   *
   * @return string Query string including the '?'
   */
	public function getURLQuery() {
      $qstr = '?';

			$params = $this->getParametersArray();

      $paramCount = count($params);
      $i = 0;
      foreach ($params as $key => $value) {
          if ($value === null) {
              continue;
          }

          $qstr .= $key.'='.rawurlencode($value);

          if ($i < $paramCount - 1) {
              $qstr .= '&';
          }

          $i++;
      }

      return $qstr;
  }

}
