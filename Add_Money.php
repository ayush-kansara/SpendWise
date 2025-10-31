<?php

session_start();

include "connection.php";

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    header("location:Login_Form.php");
}

if (isset($_POST["addMoneyBtn"])) {
    $date_components = explode(" ", $_POST["month"]);

    $email = $_SESSION["email"];
    $month = $date_components[0];
    $year = $date_components[1];
    $amount = $_POST["amount"];
    $payment_method = $_POST["paymentMethod"];

    $query = "SELECT * FROM user_amount WHERE email = '$email' AND month ='$month' AND year = '$year' AND payment_method = '$payment_method'";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows > 0) {
        $query_update = "UPDATE user_amount SET amount = amount + $amount WHERE email = '$email' AND month = '$month' AND year = '$year' AND payment_method = '$payment_method'";
        $result_update = mysqli_query($connection, $query_update);
    } else {
        $query_insert = "INSERT INTO user_amount(email,month,year,amount,payment_method) VALUES('$email','$month','$year','$amount','$payment_method')";
        $result_insert = mysqli_query($connection, $query_insert);
    }
    header("location:Add_Money_Form.php?error=Money added successfully!");
}

?>
