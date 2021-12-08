<?php

    namespace Models;

    class Connection
    {
         const HOSTNAME = 'localhost';
         const DBNAME = 'bd_persons';
         const USERNAME = 'root';
         const PASSWORD = '';

         protected static $conn;

         public function __construct()
         {
            self::$conn = new \PDO("mysql:
            dbname=".Connection::DBNAME.";
            host=".Connection::HOSTNAME,
            Connection::USERNAME,
            Connection::PASSWORD);
         }
    }

?>