<?php

$server_name = "localhost";
$user_name = "root";
$password = "";         // Add your password
$database_name = "se_project";
$port = 3306;

$connection = new mysqli($server_name, $user_name, $password, $database_name, $port);

$connection->set_charset("utf8mb4");

?>