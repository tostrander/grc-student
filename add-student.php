<?php
    /** 305/students.php reads students from a database
     *  into a data table
     *  Nov 4, 2019
     */

    //Turn on error reporting -- this is critical!
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRC Student Confirmation</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>

    <div class="container">

    <h3>Student Confirmation</h3>

    <?php

        //Print $_POST array, for testing purposes only
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        /*
        ["sid"]=>"8787878"
        ["firstName"]=>"Tina"
        ["lastName"]=>"Ostrander"
        ["birthdate"]=>"1995-05-05"
        ["gpa"]=>"1.0"
        ["advisor"]=>"1"
        */

        //Connect to db
        require ('/home/tostrand/connect.php');

        //Validate the data
        $isValid = true;

        //SID is required and must be 11 characters
        if (!empty($_POST['sid']) && strlen($_POST['sid']) == 11) {
            $sid = mysqli_real_escape_string($cnxn, $_POST['sid']);
        }
        else {
            echo "<p>SID is required and must be 11 characters</p>";
            $isValid = false;
        }

        //First name is required
        if (!empty($_POST['firstName'])) {
            $firstName = mysqli_real_escape_string($cnxn, $_POST['firstName']);
        } else {
            echo "<p>First name is required</p>";
            $isValid = false;
        }

        //Last name is required
        if (!empty($_POST['lastName'])) {
            $lastName = mysqli_real_escape_string($cnxn, $_POST['lastName']);
        } else {
            echo "<p>Last name is required</p>";
            $isValid = false;
        }

        //Birthdate is optional
        if (!empty($_POST['birthdate'])) {
            $birthdate = mysqli_real_escape_string($cnxn, $_POST['birthdate']);
        } else {
            $birthdate = "";
        }

        //GPA is not required, but if provided must be between 0.0 and 4.0
        if (!empty($_POST['gpa'])) {

            if ($_POST['gpa'] >= 0.0 && $_POST['gpa'] <= 4.0) {
                $gpa = mysqli_real_escape_string($cnxn, $_POST['gpa']);
            } else {
                echo "<p>GPA must be between 0.0 and 4.0</p>";
                $isValid = false;
            }

        } else {
            $gpa = "";
        }

        //Advisor is optional
        if ($_POST['advisor'] != "none") {
            $advisor = mysqli_real_escape_string($cnxn, $_POST['advisor']);
        } else {
            $advisor = "";
        }

        //Insert row if data is valid
        if ($isValid) {

            $sql = "INSERT INTO student
                    VALUES ('$sid', '$firstName', 
                    '$lastName', '$birthdate',
                    '$gpa', '$advisor')";

            //Print SQL statement, for testing purposes only
            //copy/paste into phpMyAdmin to test
            echo $sql;

            //Send the query to the database
            $result = mysqli_query($cnxn, $sql);

            //If successful, print summary
            if ($result) {
                echo "<h3>Student Summary</h3>";
                echo "<p>SID: $sid</p>";
                echo "<p>Student name: $firstName $lastName</p>";
                echo "<p>Birthdate: $birthdate</p>";
                echo "<p>GPA: $gpa</p>";
                echo "<p>Advisor: $advisor</p>";
            }
        }
    ?>

    <a href="students.php">View student summary</a>

    </div>

</body>
</html>
