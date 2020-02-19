<?php

/**
 * Class Validator
 */
class Validator
{
    /**
     * @var array
     */
    private $_errors;

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        $this->_errors = array();
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /**
     * @return bool
     */
    public function validForm()
    {
       $this->validSid($_POST['sid']);
       $this->validFirst($_POST['first']);
       $this->validLast($_POST['last']);
       $this->validBirthdate($_POST['birthdate']);
       $this->validGpa($_POST['gpa']);
       $this->validAdvisor($_POST['advisor']);

       //If the $errors array is empty, then we have valid data
       return empty($this->_errors);
    }

    /**
     * @param $sid
     */
    private function validSid($sid)
    {
        //SID is required and must be 11 characters
        if (empty($sid) || strlen($sid) != 11) {
            $this->_errors['sid'] = "SID is required and must be 11 characters";
        }
    }

    /**
     * @param $first
     */
    private function validFirst($first)
    {
        //First name is required
        if (empty($first)) {
            $this->_errors['first'] = "First name is required";
        }
    }

    /**
     * @param $last
     */
    private function validLast($last)
    {
        //Last name is required
        if (empty($last)) {
            $this->_errors['last'] = "Last name is required";
        }
    }

    /**
     * @param $birthdate
     */
    private function validBirthdate($birthdate)
    {
        //Birthdate is required
        if (empty($birthdate)) {
            $this->_errors['birthdate'] = "Birthdate is required";
        }
    }

    /**
     * @param $gpa
     */
    private function validGpa($gpa)
    {
        //GPA is optional, but must be 0.0-4.0
        if (!empty($gpa)) {

            if ($gpa < 0.0 || $gpa > 4.0) {
                $this->_errors['gpa'] = "GPA must be 0.0-4.0";
            }
        }
    }

    /**
     * @param $advisorId
     */
    private function validAdvisor($advisorId)
    {
        //Advisor is optional, but must be a number
        if (!empty($advisor) && $advisor != "none") {

            if (!ctype_digit($advisor)) {
                $this->_errors['advisor'] = "Advisor ID must be numeric. I've been spoofed!";
            }
        }
    }
}