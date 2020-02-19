<?php

class StudentController
{
    private $_f3;
    private $_val;

    public function __construct($f3) {
        $this->_f3 = $f3;
    }

    public function home() {
        $students = $GLOBALS['db']->getStudents();

        $this->_f3->set('students', $students);
        $template = new Template();
        echo $template->render('views/all-students.html');
    }

    public function detail($sid) {

        $student = $GLOBALS['db']->getDetails($sid);

        //Make the date pretty
        $timestamp = strtotime($student['birthdate']);
        $prettyDate = date('F j, Y', $timestamp);
        $student['birthdate'] = $prettyDate;

        //Add the student object to the hive, and display the view
        $this->_f3->set('student', $student);
        $template = new Template();
        echo $template->render('views/student-detail.html');
    }

    public function add() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //var_dump($_POST);

            //Instantiate a validator
            $this->_val = new Validator();

            if ($this->_val->validForm()) {

                //Get the form values
                $sid = $_POST['sid'];
                $first = $_POST['first'];
                $last = $_POST['last'];
                $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
                $gpa = $_POST['gpa'];
                $advisor = $_POST['advisor'];

                //Instantiate a student object
                $student = new Student($sid, $first, $last, $birthdate, $gpa, $advisor);

                //Write student to the database
                $GLOBALS['db']->writeStudent($student);

                //Reroute to home page
                $this->_f3->reroute("/");

            } else {

                //Data was not valid
                //Get errors from Validator and add to f3 hive
                $this->_f3->set('errors', $this->_val->getErrors());
                //var_dump($this->_f3->get('errors'));

                //Add POST array data to f3 hive for "sticky" form
                $this->_f3->set('student', $_POST);
            }
        }

        $advisors = $GLOBALS['db']->getAdvisors();
        $this->_f3->set('advisors', $advisors);

        $template = new Template();
        echo $template->render('views/new-student.html');
    }
}