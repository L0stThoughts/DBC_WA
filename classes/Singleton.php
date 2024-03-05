<?php

class  Singleton 
{

    private static $connection = null;

    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$connection == null) {
            self::$connection = new Singleton();
        }
        return self::$connection;
    }
}
