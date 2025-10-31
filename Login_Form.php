<?php

if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
  $uname = $_COOKIE["username"];
  $password = $_COOKIE["password"];
} else {
  $uname = "";
  $password = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - SpendWise</title>
  <link rel="stylesheet" type="text/css" href="Form_Style.php" />
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

        <div class="navContainer" id="navContainer">
          <div class="options">HOME</div>
          <div class="options">ABOUT US</div>
          <div class="options">CONTACT US</div>
        </div>

        <div class="login-signup-container">
          <button id="signup-btn">Sign Up</button>
        </div>
      </div>
    </nav>
  </header>

  <main>

    <div class="login-form-container">

      <p id="login-heading">SIGN IN </p>
      <p id="sub-heading">Welcome back! Please enter your details</p>
      <?php
      if (isset($_GET["error"])) { ?>
        <p style="color: red; text-align:center;"><?php echo $_GET["error"]; ?></p>
      <?php
      } ?>
      <form action="Login.php" method="post" autocomplete="off">
        <div class="form-element-container">
          <div id="fields">
            <label for="uname" style="margin-left: 5px;"><b>Username </b></label>
            <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $uname; ?>" required>
          </div>

          <div id="fields">
            <label for="psw" style="margin-left: 5px;"><b>Password </b></label>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" required>
          </div>

          <button type="submit" id="login-page-btn" name="login">Login</button>

          <div class="remeber-forget-block">
            <label>
              <input type="checkbox" name="remember_me" id="remeber-checkbox"> Remember me
            </label>
            <span id="forget-pass"><a href="Forgot_Password_Form.php">Forgot password</a></span>
          </div>

          <div class="container">
            <p id="register-text">Dont have an account? <a href="Register_Form.php">Sign Up</a></p>
          </div>

        </div>
      </form>
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
      <p id="contact-us">Contact us <br> info.spendwise@gmail.com</p>
      <p id="copyright">© 2025 SpendWise. All Rights Reserved.</p>
    </div>
  </footer>
  <script src="app.js"></script>
  <script>
    // Navbar Logo Toggle
    let navbarLogoText = document.querySelector(".headings");
    navbarLogoText.addEventListener("click", () => {
      window.location = "index.php";
    });

    // Home Toggle
    let navbarHome = document.querySelectorAll(".options")[0];
    navbarHome.addEventListener("click", () => {
      window.location = "index.php";
    });

    // About Us Toggle
    let navbarAboutUs = document.querySelectorAll(".options")[1];
    navbarAboutUs.addEventListener("click", () => {
      window.location = "About_Us.php";
    });

    // Contact Us Toggle
    let navbarContactUs = document.querySelectorAll(".options")[2];
    navbarContactUs.addEventListener("click", () => {
      window.location = "ContactUs_Form.php";
    });

    // Sign Up Toggle
    let navbarSignUpBtn = document.querySelector("#signup-btn");
    navbarSignUpBtn.addEventListener("click", () => {
      window.location = "Register_Form.php";
    });

    // Footer Logo Text Toggle
    let footerLogoText = document.querySelector("#foot-heading");
    footerLogoText.addEventListener("click", () => {
      window.location = "index.php";
    });
  </script>
</body>

</html>