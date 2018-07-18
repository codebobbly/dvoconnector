<?php

namespace RG\Rgdvoconnector\Domain\Filter;

class FunctionariesFilter extends GenericFilterContext   {

  /**
	 * Rolle des Funktionaers
	 * @var string
	 */
	protected $role;

  /**
	 * sets the role attribute
	 *
	 * @param string $role
	 * @return void
	 */
	public function setRole($role) {
		$this->role = $role;
	}

	/**
	 * returns the role attribute
	 *
	 * @return string
	 */
	public function getRole() {
		return $this->role;
	}

  /**
	 * returns the array of parameters
	 *
	 * @return array
	 */
	public function getParametersArray() {

    $result = parent::getParametersArray();

		if(!empty($this->getRole())) {
			$result['f_role'] = $this->getRole();
		}

    return $result;

	}

}
