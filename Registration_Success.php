<?php

session_start();

if (isset($_SESSION["firstname"]) || isset($_SESSION["lastname"]) || isset($_SESSION["email"])) {
    unset($_SESSION["firstname"]);
    unset($_SESSION["lastname"]);
    unset($_SESSION["email"]);

    session_destroy();
} else {
    session_destroy();
    header("location:Register_Form.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Successful - SpendWise</title>
    <link rel="stylesheet" href="Form_Style.php" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link rel="icon" href="3-removebg-preview.png">
</head>

<body>
    <header>
        <nav>
            <div class="mainNav">
                <div class="logo-heading-container">
                    <img src="3-removebg-preview.png" alt="logo" />
                    <h1 class="headings">SpendWise</h1>

                    <div class="hamburger" id="hamburger">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="login-form-container" id="regsuccess-container">
            <p id="login-heading">REGISTRATION SUCCESSFUL</p>
            <p id="sub-heading">Thank you for registering with SpendWise!<br><br>Your login credentials have been sent to your registered email.</p>
            <div class="container">
                <p id="register-text"><br>
                    <a href="Login_Form.php" class="sign-text">Click Here To Sign In</a>
                </p>
            </div>
        </div>
    </main>

    <footer>
        <div class="footerContainer">
            <p id="foot-heading">SpendWise.com</p>
            <p id="connect-us">Connect with us on:</p>
            <div class="footElements" id="socials">
                <div class="social-row">
                    <div class="socialIcon">
                        <a href="#"><i class="fa-brands fa-instagram fa-xl"></i></a>
                    </div>

                    <div class="socialIcon">
                        <a href="#"><i class="fa-brands fa-facebook fa-xl"></i></a>
                    </div>

                    <div class="socialIcon">
                        <a href="#"><i class="fa-brands fa-linkedin fa-xl"></i></a>
                    </div>

                    <div class="socialIcon">
                        <a href="#"><i class="fa-brands fa-github fa-xl"></i></a>
                    </div>
                </div>
            </div>
            <p id="contact-us">
                Contact us <br />
                info.spendwise@gmail.com
            </p>
            <p id="copyright">© 2025 SpendWise. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        let otpField = document.getElementById("otp");

        window.onload = function() {
            setTimeout(function() {
                alert("Registration Successful!");
            }, 500);
        };
    </script>
    <script src="app.js"></script>
</body>

</html>