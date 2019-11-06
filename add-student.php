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
        /* var_dump($_POST);
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

        if (isset($_POST['sid']) && strlen($_POST['sid']) == 11) {
            $sid = mysqli_real_escape_string($cnxn, $_POST['sid']);
        }
        else {
            echo "<p>SID is required and must be 11 characters</p>";
            $isValid = false;
        }

        if (isset($_POST['firstName'])) {
            $firstName = mysqli_real_escape_string($cnxn, $_POST['firstName']);
        } else {
            echo "<p>First name is required</p>";
            $isValid = false;
        }
        $lastName = mysqli_real_escape_string($cnxn, $_POST['lastName']);
        $birthdate = mysqli_real_escape_string($cnxn, $_POST['birthdate']);
        $gpa = mysqli_real_escape_string($cnxn, $_POST['gpa']);

        /*
        if (isset($_POST['gpa'])
            && $_POST['gpa'] > 0.0
            && $_POST['gpa'] < 4.0) {
            $gpa = $_POST['gpa'];
        } else {
            echo "<p>GPA is required and must be 0-4</p>";
            $isValid = false;
        }
        */
        $advisor = mysqli_real_escape_string($cnxn, $_POST['advisor']);

        //Insert row if data is valid
        if ($isValid) {

            $sql = "INSERT INTO student
                    VALUES ('$sid', '$firstName', 
                    '$lastName', '$birthdate',
                    '$gpa', '$advisor')";
            echo $sql; //copy/paste into phpMyAdmin to test

            $result = mysqli_query($cnxn, $sql);

            //If successful, print summary
            if ($result) {
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

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
