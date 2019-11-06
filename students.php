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
    <title>GRC Student Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <div class="container">
    <h3>Student Summary</h3>

    <?php
    //Connect to db --> ADD YOUR OWN CREDENTIALS!
    $username = 'USERNAME_grcuser';
    $password = 'PASSWORD';
    $hostname = 'localhost';
    $database = 'USERNAME_grc';

    $cnxn = mysqli_connect($hostname, $username, $password, $database);

    //Test connection
    if ($cnxn) {
        echo "<p>Connected!</p>";
    } else {
        echo mysqli_connect_error();
    }

    //Define the query
    $sql = 'SELECT s.sid, s.first AS student_first, s.last AS student_last, s.advisor, a.advisor_id, 
            a.advisor_first, a.advisor_last 
            FROM student s, advisor a 
            WHERE a.advisor_id = s.advisor
            ORDER BY student_last, student_first';

    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);

    //Print the results
    while ($row = mysqli_fetch_assoc($result)) {
        $sid = $row['sid'];
        $sFirst = $row['student_first'];
        $sLast = $row['student_last'];
        $aFirst = $row['advisor_first'];
        $aLast = $row['advisor_last'];

        echo "$sid - $sFirst $sLast, $aFirst $aLast<br>";
    }

?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
