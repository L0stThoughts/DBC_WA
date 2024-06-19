<?php
session_start();
require_once "./classes/User.php";
require_once "./classes/DBC.php";

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = DBC::getUser($username);

    if($user && password_verify($password,$user["password"])) {
        $_SESSION["username"] = $username;
        $_SESSION["message"] = "Login successful.";
        header("Location: home.php"); 
        exit();
    } else {
        $_SESSION["message"] = "Unknown login credentials or password.";
        header("Location: index.php"); 
        exit();
    }
}

if (isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
    echo "<script>alert('$message');</script>";
    unset($_SESSION["message"]);
}
?>