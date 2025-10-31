<?php

session_start();

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST["registerBtn"])) {
    // $connection = new mysqli("localhost", "root", "", "se_project", 3306);

    // $query = "SELECT * FROM users WHERE email = '$_POST[email]'";
    $query = "SELECT * FROM users WHERE email = ?";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();

    // $result = mysqli_query($connection, $query);
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("location:Register_Form.php?error=Email already exists. Please try another email");
    } else {
        $_SESSION["firstname"] = $_POST["fname"];
        $_SESSION["lastname"] = $_POST["lname"];
        $_SESSION["email"] = $_POST["email"];

        $otp = random_int(100000, 999999);
        $_SESSION["otp"] = $otp;

        // $query_otp = "INSERT INTO users(otp) values('$otp')";
        $query_otp = "INSERT INTO users(otp) values(?)";
        $stmt_otp = $connection->prepare($query_otp);
        $stmt_otp->bind_param("i", $otp);
        $stmt_otp->execute();
        $stmt_otp->close();
        // $result_otp = mysqli_query($connection, $query_otp);

        // $body = "Your OTP for Registration is: $otp";
        $body = "Hey there,<br><br>To continue securely with your registration, please use the One-Time Password(OTP) provided below:<br><br>👉 Your OTP: $otp<br><br>Please do not share this OTP with anyone to ensure your account's security.<br><br>If you did not attempt to register, please ignore this email or contact us immediately.<br><br>For any help, feel free to reach out to us at:<br>📧 info.spendwise@gmail.com<br><br>Stay secure,<br>-Team SpendWise";

        $mail = new PHPMailer(true);

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
            $mail->addAddress($_SESSION["email"], $_SESSION["firstname"]);

            //Content
            $mail->isHTML(true);
            
            $mail->Subject = 'Your SpendWise OTP for Secure Registration';
            $mail->Body    = $body;
            $mail->send();

            header("location:OTP_Form.php");
            exit;
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        $stmt->close();
        $connection->close();
    }
} else {
    header("location:Register_Form.php");
    exit;
}


?>
