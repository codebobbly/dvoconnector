<?php

namespace RGU\Dvoconnector\Service;

interface ApiServiceFilterContext extends ApiServiceFilter {

  /**
   * Builds a query string from an array and takes care of proper url-encoding
   *
   * @return string Query string including the '?'
   */
  public function getURLQuery();

  /**
	 * sets the insideAssociationID attribute
	 *
	 * @param string $insideAssociationID
	 * @return void
	 */
	public function setInsideAssociationID($insideAssociationID);

	/**
	 * returns the insideAssociationID attribute
	 *
	 * @return string
	 */
	public function getInsideAssociationID();

  /**
	 * returns the array of parameters
	 *
	 * @return array
	 */
	public function getParametersArray();

}
