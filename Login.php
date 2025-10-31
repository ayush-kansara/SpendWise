<?php

session_start();

include "connection.php";

if (isset($_POST["login"])) {
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $_POST["uname"], $_POST["password"]);
    $stmt->execute();

    $result = $stmt->get_result();

    if (isset($_POST["remember_me"])) {
        setcookie("username", $_POST["uname"], time() + (60 * 60));
        setcookie("password", $_POST["password"], time() + (60 * 60));
    } else {
        setcookie("username", "", time() - (60 * 60));
        setcookie("password", "", time() - (60 * 60));
    }

    if ($result->num_rows > 0) {
        $dbrow = $result->fetch_assoc();
        $_SESSION["email"] = $dbrow["email"];
        $_SESSION["password"] = $dbrow["password"];
        header("location:Add_Expense_Form.php");
        exit;
    } else {
        header("location:Login_Form.php?error=Invalid Password or Email");
        exit;
    }

    $stmt->close();
    $connection->close();
} else {
    header("location:Register_Form.php");
    exit;
}
