<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="get-page.php?source=page1">Go to Get</a>
    <br>
    <?php
        echo date('m-j-Y', strtotime('2005-05-05'))."<br>";
        echo date('l M d, Y', strtotime('May 10, 2007'))."<br>";
        echo date('m-d-Y', strtotime('01/01/2001'))."<br>";
        echo date('l m-d-Y', strtotime('Nov 18, 2019'))."<br>";
        echo date('l m-d-Y', strtotime('5/5/87'))."<br>";

        $userEntered = '05-05-2010';
        $sqlDate = date('Y-m-d', strtotime($userEntered));
        echo $sqlDate;

    ?>

</body>
</html>