<?php

session_start();
 
include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST["otpBtn"])) {
    if ($_POST["otpField"] == $_SESSION["otp"]) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = "";
        for ($i = 0; $i < 8; $i++) {
            $password = $password . $characters[rand(0, strlen($characters) - 1)];
        }

        $query_insert_user_data = "UPDATE users SET firstname = ?, lastname = ?, email = ?, password = ? WHERE otp = ?";
        $stmt = $connection->prepare($query_insert_user_data);
        $stmt->bind_param("ssssi",$_SESSION["firstname"],$_SESSION["lastname"],$_SESSION["email"],$password,$_POST["otpField"]);
        $stmt->execute();

        $query = "SELECT * FROM users WHERE firstname = '$_SESSION[firstname]'";
        $result = mysqli_query($connection, $query);
        $dbrow = mysqli_fetch_assoc($result);

        $email = $dbrow["email"];
        $firstname = $dbrow["firstname"];
        $lastname = $dbrow["lastname"];

        $query2 = "UPDATE users set otp = 'NULL' WHERE firstname = '$firstname'";
        mysqli_query($connection, $query2);

        $mail = new PHPMailer(true);

        $body = "Hey there,<br><br>Thank you for registering with SpendWise - your smart partner in tracking and managing your expenses!<br><br>Your login details are as follows:<br><br>Username: $email<br>Password: $password<br><br>Start exploring powerful tools and insights to take control of your finances and build better money habits.<br><br>We hope SpendWise helps you stay on top of ypur expenses and reach your financial goals - one smart decision at a time!<br><br>If you have any queries or need assistance, feel free to write to us at:<br>📧 info.spendwise@gmail.com<br><br>Let the saving begin!<br>-Team SpendWise";

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            
            $mail->Username   = 'info.spendwise@gmail.com';

            $mail->Password   = 'Your gmail app password here';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom("info.spendwise@gmail.com", "SpendWise Team");
            $mail->addAddress($email, $firstname);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to SpendWise - Start your smart expense journey';
            $mail->Body    = $body;
            $mail->send();

            header("location:Registration_Success.php");
            exit;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        header("location:OTP_Form.php?error=Invalid OTP.");
        exit;
    }
    $stmt->close();
} else {
    header("location:Register_Form.php");
    exit;
}


?>
