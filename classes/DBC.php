<?php
class DBC {
    public const SERVER_IP = "localhost";
    public const USER = "root";
    public const PASSWORD = "root";
    public const DATABASE = "loginRegister";
    private static $connection = null;

    protected function __construct() {}

    public static function getInstance() {
        if (!self::$connection) {
            echo("<script>console.log('PHP: " . "');</script>");
            self::$connection = new DBC();
        }
        return self::$connection;
    }

    public static function getConnection() {
        if (!self::$connection) {
            self::$connection = mysqli_connect(
                self::SERVER_IP,
                self::USER,
                self::PASSWORD,
                self::DATABASE
            );
            if (!self::$connection) {
                die('Could not connect to DB: ' . mysqli_connect_error());
            }
        }
        return self::$connection;
    }

    public static function closeConnection() {
        if (self::$connection) {
            mysqli_close(self::$connection);
            self::$connection = null;
        }
    }

    public static function insertUser($username, $password) {
        $connection = self::getConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES ('$username','$hashedPassword')";
        return mysqli_query($connection, $query);
    }

    public static function getUser($username) {
        $connection = self::getConnection();
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($connection, $query);
        return mysqli_fetch_assoc($result);
    }
}
?>
