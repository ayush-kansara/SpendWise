<?php

session_start();

include "connection.php";

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    header("location:Login_Form.php");
}

$sr_no = $_GET["sr_no"];
$table_name = $_GET["table_name"];

$month = $_GET["month"];
$year = $_GET["year"];
$email = $_SESSION["email"];

$query = "DELETE FROM `$table_name` WHERE sr_no = '$sr_no'";
$result = mysqli_query($connection, $query);

$query1 = "SELECT * FROM `$table_name`";
$result1 = mysqli_query($connection, $query1);

$flag = 1;

if (mysqli_num_rows($result1) == 0) {
    $query_delete_table = "DROP TABLE `$table_name`";
    $result_delete_table = mysqli_query($connection, $query_delete_table);

    $query_delete_data = "DELETE FROM users_expense WHERE month = '$month' AND year = '$year'";
    $result_delete_data = mysqli_query($connection, $query_delete_data);
}
header("location:View_Expenses.php?table_name=$table_name&month=$month&year=$year&flag=$flag"); 

?>