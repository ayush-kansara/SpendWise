<?php

session_start();

include "connection.php";

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    header("location:Login_Form.php");
}

if (isset($_POST["addExpenseBtn"])) {

    $email = $_SESSION["email"];

    $date = $_POST["date"];
    $category = $_POST["category"];
    $amount = $_POST["amount"];
    $paymentMethod = $_POST["paymentMethod"];
    $description = $_POST["description"];

    $date_components = explode("-", $date);
    print_r($date_components);

    $year = $date_components[0];

    switch ($date_components[1]) {
        case "01":
            $month = "January";
            break;

        case "02":
            $month = "Febuary";
            break;

        case "03":
            $month = "March";
            break;

        case "04":
            $month = "April";
            break;

        case "05":
            $month = "May";
            break;

        case "06":
            $month = "June";
            break;

        case "07":
            $month = "July";
            break;

        case "08":
            $month = "August";
            break;

        case "09":
            $month = "September";
            break;

        case "10":
            $month = "October";
            break;

        case "11":
            $month = "November";
            break;

        case "12":
            $month = "December";
            break;
    }

    $table_name = $_SESSION["email"] . "_" . strtolower($month) . "_" . $year;
    echo $table_name;

    $query = "CREATE TABLE IF NOT EXISTS `$table_name`(
        sr_no INT(11) NOT NULL AUTO_INCREMENT, 
        email VARCHAR(50) NOT NULL,
        date DATE NOT NULL,
        category VARCHAR(100) NOT NULL,
        amount INT(10) NOT NULL,
        payment_method VARCHAR(20) NOT NULL,
        description VARCHAR(50) NOT NULL,
        created_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY(sr_no)
    )";
    $result = mysqli_query($connection, $query);

    $query1 = "INSERT INTO users_expense(email,month,`year`) SELECT '$email', '$month', '$year' WHERE NOT EXISTS (SELECT 1 FROM users_expense WHERE month = '$month' AND `year` = '$year' AND email = '$email')";
    $result1 = mysqli_query($connection, $query1);

    $query2 = "INSERT INTO `$table_name`(email,date,category,amount,payment_method,description) values('$email','$date','$category','$amount','$paymentMethod','$description')";
    $result2 = mysqli_query($connection, $query2);

    header("location:Add_Expense_Form.php?error=Expense added successfully!");
}

?>