<?php

namespace RGU\Dvoconnector\Domain\Filter;

class AnnouncementsFilter extends GenericFilterContext
{

  /**
     * offset
     * @var int
     */
    protected $offset;

    /**
     * limit
     * @var int
     */
    protected $limit;

    /**
       * childs
       * @var int
       */
    protected $childs;

    /**
       * Teil des Meldungstitels oder -textes
       * @var string
       */
    protected $text;

    /**
       * Start Erstellungsdatum
       * @var \DateTime
       */
    protected $datestart;

    /**
       * Ende Erstellungsdatum
       * @var \DateTime
       */
    protected $dateend;

    /**
       * Startbegrenzung der PLZ
       * @var string
       */
    protected $zipstart;

    /**
       * Endbegrenzung der PLZ
       * @var string
       */
    protected $zipend;

    /**
       * Teil des Meldungsorts oder der Postleitzahl
       * @var string
       */
    protected $location;

    public function __construct()
    {

        // Set default value
        $this->setChilds(2);
    }

    /**
       * sets the offset attribute
       *
       * @param int $offset
       * @return void
       */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * returns the offset attribute
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * sets the childs attribute
     *
     * @param int $childs
     * @return void
     */
    public function setChilds($childs)
    {
        $this->childs = $childs;
    }

    /**
     * returns the childs attribute
     *
     * @return int
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
       * sets the limit attribute
       *
       * @param int $limit
       * @return void
       */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * returns the limit attribute
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
       * sets the text attribute
       *
       * @param string $text
       * @return void
       */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * returns the text attribute
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
       * sets the datestart attribute
       *
       * @param \DateTime $datestart
       * @return void
       */
    public function setStartDate($datestart)
    {
        $this->datestart = $datestart;
    }

    /**
     * returns the datestart attribute
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->datestart;
    }

    /**
       * sets the dateend attribute
       *
       * @param \DateTime $dateend
       * @return void
       */
    public function setEndDate($dateend)
    {
        $this->dateend = $dateend;
    }

    /**
     * returns the dateend attribute
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->dateend;
    }

    /**
       * sets the zipstart attribute
       *
       * @param string $zipstart
       * @return void
       */
    public function setZipStart($zipstart)
    {
        $this->zipstart = $zipstart;
    }

    /**
     * returns the zipstart attribute
     *
     * @return string
     */
    public function getZipStart()
    {
        return $this->zipstart;
    }

    /**
       * sets the zipend attribute
       *
       * @param string $zipend
       * @return void
       */
    public function setZipEnd($zipend)
    {
        $this->zipend = $zipend;
    }

    /**
     * returns the zipend attribute
     *
     * @return string
     */
    public function getZipEnd()
    {
        return $this->zipend;
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
       * returns the array of parameters
       *
       * @return array
       */
    public function getParametersArray()
    {
        $result = parent::getParametersArray();
        $result['offset'] = $this->getOffset();
        $result['limit'] = $this->getLimit();
        $result['childs'] = $this->getChilds();
        $result['f_text'] = $this->getText();

        $startDate = $this->getStartDate();
        if ($startDate) {
            $result['f_datestart'] = $startDate->format('Y-m-d H:i:s');
        }

        $endDate = $this->getEndDate();
        if ($endDate) {
            $result['f_dateend'] = $endDate->format('Y-m-d H:i:s');
        }

        $result['f_zipstart'] = $this->getZipStart();
        $result['f_zipend'] = $this->getZipEnd();
        $result['f_location'] = $this->getLocation();

        return $result;
    }
}
