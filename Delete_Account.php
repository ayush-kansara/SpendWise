<?php

session_start();

include "connection.php";

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    header("location:Login_Form.php");
} else {
    $query_table_check = "SHOW TABLES LIKE '$_SESSION[email]%'";
    $result_table_check = mysqli_query($connection, $query_table_check);

    while ($dbrow = mysqli_fetch_assoc($result_table_check)) {
        $table_name = reset($dbrow);
        echo $table_name;
        $query_drop_table = "DROP TABLE IF EXISTS `$table_name`";
        $result_drop_table = mysqli_query($connection, $query_drop_table);
    }

    $query_remove_data = "UPDATE users SET email = 'NULL', password = 'NULL' WHERE email = '$_SESSION[email]' and password = '$_SESSION[password]'";
    $result_remove_data = mysqli_query($connection, $query_remove_data);

    $query_remove_users_expense = "DELETE FROM users_expense WHERE email = '$_SESSION[email]'";
    $result_remove_users_expense = mysqli_query($connection, $query_remove_users_expense);

    $query_remove_user_amount = "DELETE FROM user_amount WHERE email = '$_SESSION[email]'";
    $result_remove_user_amount = mysqli_query($connection, $query_remove_user_amount);

    header("location:Register_Form.php?msg=Account Deleted Successfully!");
}

?>