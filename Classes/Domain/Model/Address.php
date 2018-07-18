<?php

namespace RGU\Dvoconnector\Domain\Model;

class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Street
     * @var string
     */
    protected $street;

    /**
     * Zipcode
     * @var string
     */
    protected $zipcode;

    /**
     * Location
     * @var string
     */
    protected $location;

    /**
     * Country
     * @var string
     */
    protected $country;

    public function __construct()
    {
    }

    /**
     * sets the street attribute
     *
     * @param string $street
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * returns the street attribute
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * sets the zipcode attribute
     *
     * @param string $zipcode
     * @return void
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * returns the zipcode attribute
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * sets the location attribute
     *
     * @param string $location
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * returns the location attribute
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * sets the country attribute
     *
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * returns the country attribute
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
}
