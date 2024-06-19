<?php
session_start();

if(isset($_SESSION["username"])) {
$logged = true;
}
if(!isset($_SESSION["username"])) {
$logged = false;
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
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <title>Deluxe Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
body {
    text-align:center;
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
        color: rgb(0, 0, 0);
    }
h1 {
    color: #0f0f0f;
    font-size: 60px;
    text-align: center;
    font-weight: normal;
    text-transform: uppercase;
    font-family: lekton, monospace;
    -ms-flex-item-align: center;
}
footer {
    color: #838383;
    font-size: 15px;
    text-align: center;
    font-family: lekton, monospace;
}
    </style>
    </head>
    <body>
        <br>
        <div>
        <h1>Hello <?php 
        if($logged) {echo "".$_SESSION["username"];}else{ echo "Guest";}?>!</h1>
        </div>
        <br>
        <footer>L0stThoughts 2024 ©</footer>
    <script>
    </script>
    </body>
    </html>