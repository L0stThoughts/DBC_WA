<?php
session_start();
require_once "./classes/DBC.php";

if(isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(DBC::getUser($username)) {
        $_SESSION["message"] = "User already exists.";
        header("Location: registration.php"); 
        exit();
    } else {
        if(DBC::insertUser($username, $password)) {
            $_SESSION["message"] = "Registration successful. Please log in.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION["message"] = "Registration failed.";
            header("Location: registration.php");
            exit();
        }
    }
}

if (isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
    echo "<script>alert('$message');</script>";
    unset($_SESSION["message"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/registration.css">
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form method="POST" action="registration.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
