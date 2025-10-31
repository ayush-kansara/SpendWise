<?php

include "connection.php";

if (isset($_POST["forgotBtn"])) {
    if ($_POST["newPassword"] == $_POST["confirmPassword"]) {

        $query = "SELECT * FROM users WHERE email = '$_POST[forgotEmail]'";

        $result = mysqli_query($connection, $query);

        if ($result->num_rows > 0) {
            $query1 = "UPDATE users SET password = '$_POST[newPassword]' WHERE email = '$_POST[forgotEmail]'";
            $result1 = mysqli_query($connection, $query1);
            header("location:Forgot_Password_Form.php?success=Password changed successfully.");
        } else {
            header("location:Forgot_Password_Form.php?error=Email does not exist.");
        }
    } else {
        header("location:Forgot_Password_Form.php?error=New Password and Confirm Password are not same.");
    }
} else {
    header("location:Login_Form.php");
}

?>
