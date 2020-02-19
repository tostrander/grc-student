<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

$db = new Database();
$controller = new StudentController($f3);

//Define a default route
$f3->route('GET /', function($f3) {

    $GLOBALS['controller']->home();
});

//Define a route that displays student detail
$f3->route('GET /detail/@sid', function($f3, $params){

    $GLOBALS['controller']->detail($params['sid']);
});

//Define a route that displays student detail
$f3->route('GET|POST /add', function($f3, $params){

    $GLOBALS['controller']->add();
});

//Run fat free
$f3->run();
