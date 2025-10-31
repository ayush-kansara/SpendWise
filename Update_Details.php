<?php

session_start();

include "connection.php";

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    header("location:Login_Form.php");
} else {
    if (isset($_POST["updateDetails"])) {
        $query = "UPDATE users SET firstname = '$_POST[fname]', lastname = '$_POST[lname]', email = '$_POST[email]', password = '$_POST[password]' WHERE email = '$_SESSION[email]'";
        $result = mysqli_query($connection, $query);
        $_SESSION["password"] = $_POST["password"];
        header("location:My_Profile.php");
    }
}

?>