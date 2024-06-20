<?php
session_start();
require_once "./classes/DBC.php";

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = DBC::getUser($username);

    if($user && password_verify($password, $user["password"])) {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
