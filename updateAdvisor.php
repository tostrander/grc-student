<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 11/29/2019
 * Time: 7:39 AM
 */

    var_dump($_POST);

    //Turn on error reporting -- this is critical!
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

  	//Connect to db
    require ('/home/tostrand/connect.php');

    //Get Advisor ID and SID from the POST array
    $aid = $_POST['aid'];
    $sid = $_POST['sid'];

    //If they are valid and advisorID is numeric
    if (!empty($aid) && !empty($sid) && is_numeric($aid)) {

        //Escape the values
        $aid = mysqli_real_escape_string($cnxn, $aid);
        $sid = mysqli_real_escape_string($cnxn, $sid);

        //Define and execute the query
        $sql = "UPDATE student
                SET advisor = '$aid'
                WHERE sid = '$sid'";
        echo $sql;
        $result = mysqli_query($cnxn, $sql);
    }