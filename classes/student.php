<?php

/**
 * Class Student
 */
class Student
{
    private $_sid;
    private $_first;
    private $_last;
    private $_birthdate;
    private $_gpa;
    private $_advisor;

    /**
     * Student constructor.
     * @param $sid
     * @param $first
     * @param $last
     * @param null $birthdate
     * @param null $gpa
     * @param null $advisor
     */
    public function __construct($sid, $first, $last, $birthdate=NULL, $gpa=NULL, $advisor=NULL)
    {
        $this->_sid = $sid;
        $this->_first = $first;
        $this->_last = $last;
        $this->_birthdate = $birthdate;
        $this->_gpa = $gpa;
        $this->_advisor = $advisor;
    }

    /**
     * @return mixed
     */
    public function getSid()
    {
        return $this->_sid;
    }

    /**
     * @param mixed $sid
     */
    public function setSid($sid)
    {
        $this->_sid = $sid;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->_first;
    }

    /**
     * @param mixed $first
     */
    public function setFirst($first)
    {
        $this->_first = $first;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last)
    {
        $this->_last = $last;
    }

    /**
     * @return null
     */
    public function getBirthdate()
    {
        return $this->_birthdate;
    }

    /**
     * @param null $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->_birthdate = $birthdate;
    }

    /**
     * @return null
     */
    public function getGpa()
    {
        return $this->_gpa;
    }

    /**
     * @param null $gpa
     */
    public function setGpa($gpa)
    {
        $this->_gpa = $gpa;
    }

    /**
     * @return null
     */
    public function getAdvisor()
    {
        return $this->_advisor;
    }

    /**
     * @param null $advisor
     */
    public function setAdvisor($advisor)
    {
        $this->_advisor = $advisor;
    }
}