<?php

class Model
{
    protected static $_connection = null;

    public function __construct()
    {
        if (self::$_connection == null) {
            $host = 'localhost';
            $dbname = 'bon_app_application';
            $user = 'root';
            $password = '';

            self::$_connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        }
    }
}

?>