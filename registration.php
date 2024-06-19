<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .header {
            background-color: #f1f1f1;
            text-align: center;
            padding: 20px;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container form input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        .login-container form button {
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<?php
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
            $_SESSION["message"] = "Registration successful. You can now log in.";
            header("Location: index.php"); 
            exit();
        } else {
            $_SESSION["message"] = "Registration unsuccessful. Try again.";
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
    <div class="login-container">
        <h2>Registration Form</h2>
        <form action="registration.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <br>
        <a href="index.php">Login?</a>
    </div>
</body>

</html>