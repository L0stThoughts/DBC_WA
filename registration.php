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

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $errors = array();

        if (empty($username) || empty($password)) {
            array_push($errors, "All fields are required");
        }

        if (strlen($password) < 3) {
            array_push($errors, "Username can't be less than 3 letters");
        }

        if (strlen($password) < 8) {
            array_push($errors, "Username can't be less than 8 letters");
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            require_once("./classes/DBC.php");
            $sql = "INSERT INTO users(username, password) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "ss", $username, $password_hash);
                mysqli_stmt_execute($stmt);
                echo "You registered successfully";
            } else {
                die("Something went wrong");
            }
        }
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