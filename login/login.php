<?php

    //Start a session


    //If the user is already logged in


        //Redirect to page 1





    //If the login form has been submitted


        //Include creds.php (eventually, passwords should be moved to a secure location
        //or stored in a database)


        //Get the username and password from the POST array


        //If the username and password are correct


            //Store login name in a session variable


            //Redirect to page 1



        //Login credentials are incorrect



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
</head>
<body>
    <form method="post" action="#">
        <label>Username:
            <input type="text" name="username">
        </label><br>

        <label>Password:
            <input type="password" name="password">
        </label><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>