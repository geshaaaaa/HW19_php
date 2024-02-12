<?php

class Connector
{
    private static ?PDO $instance = null;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): PDO
    {

        if (!isset(self::$instances)) {
            $dsn = 'mysql:host=mysql;port=3306;dbname=music';
            self::$instance = new PDO($dsn, 'root', 'root');
        }

        return self::$instance;
    }


}