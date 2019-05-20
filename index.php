<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

$db = new Database();

//Define a default route
$f3->route('GET /', function($f3) {

    global $db;
    $students = $db->getStudents();

    $f3->set('students', $students);
    $template = new Template();
    echo $template->render('views/all-students.html');

});

//Define a route that displays student detail
$f3->route('GET /detail/@sid', function($f3, $params){
    echo $params['sid'];
});

//Run fat free
$f3->run();
