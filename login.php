<?php
require_once "./classes/User.php";
require_once "./classes/DBC.php";
echo "<pre>";

if (empty($_POST["username"]) || empty($_POST["password"])) {
    echo "Fill out both the username and password.";
    exit();
}

// $user = new User(1, $_POST["username"], $_POST["password"]);
// echo $user;


$connection = DBC::getInstance();
var_dump($connection);
