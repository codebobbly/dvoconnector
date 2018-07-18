<?php

namespace RGU\Rgdvoconnector\Service;

interface ApiServiceFilter {

  /**
   * Builds a query string from an array and takes care of proper url-encoding
   *
   * @return string Query string including the '?'
   */
  public function getURLQuery();

  /**
	 * returns the array of parameters
	 *
	 * @return array
	 */
	public function getParametersArray();

}
