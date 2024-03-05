<?php

$hostName = "localhost";
$user = "root";
$dbPassword = "";
$dbName = "login_register";

$conn = mysqli_connect($hostName, $user, $dbPassword, $dbName);
class DBC
{
    public const SERVER_IP = "localhost";
    public const USER = "root";
    public const PASSWORD = "root";
    public const DATABASE = "login_register";
    private static $connection = null;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$connection) {
            self::$connection = new DBC();
        }

        return self::$connection;
    }
    public static function getConnection()
    {
        if (!self::$connection) {
            self::$connection = mysqli_connect(
                self::SERVER_IP,
                self::USER,
                self::PASSWORD,
                self::DATABASE
            );
            if (!self::$connection) {
                die('Could not connect to DB');
            }
        }
        return self::$connection;
    }
    public static function closeConnection()
    {
        if (self::$connection) {
            mysqli_close(self::$connection);
            self::$connection = null;
        }
    }
}
