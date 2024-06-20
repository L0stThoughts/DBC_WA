<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required id="username">
            <input type="password" name="password" placeholder="Password" required id="password">
            <button type="submit">Login</button>
        </form>
        <br>
        <a href="registration.php">Register?</a>
    </div>

</body>

</html>