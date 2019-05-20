<?php
/**
 * Database class
 * User: laptop
 * Date: 5/20/2019
 * Time: 1:45 PM
 */

class Database
{
    private $_dbh;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {

            define("DB_DSN", "mysql:dbname=tostrand_it328");
            define("DB_USERNAME", "tostrand_students");
            define("DB_PASSWORD", "grc_user!");

            //Instantiate a db object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "Connected!";
            return $this->_dbh;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}