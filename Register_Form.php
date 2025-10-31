<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - SpendWise</title>
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
          <button id="login-btn" class="reg-login">Sign In</button>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="login-form-container">
      <p id="login-heading">SIGN UP</p>
      <p id="sub-heading" class="signup-heading-text">Let’s get started! Fill in your details to begin</p>
      <?php
      if (isset($_GET["error"])) { ?>
        <p style="color: red; text-align:center;"><?php echo $_GET["error"]; ?></p>
      <?php
      } ?>
      <form method="post" id="form" action="Register.php" autocomplete="off">
        <div class="form-element-container">
          <div id="fields">
            <label for="uname" style="margin-left: 5px"><b>First Name</b></label>
            <input
              type="text"
              placeholder="Enter Firstname"
              name="fname"
              id="fname"
              required />
          </div>

          <div id="fields">
            <label for="uname" style="margin-left: 5px"><b>Last Name</b></label>
            <input
              type="text"
              placeholder="Enter Lastname"
              name="lname"
              id="lname"
              required />
          </div>

          <div id="fields">
            <label for="email" style="margin-left: 5px"><b>Email</b></label>
            <input
              type="email"
              placeholder="Enter email"
              name="email"
              id="email"
              required />
          </div>

          <button type="submit" name="registerBtn" id="register-btn">Send OTP</button>

          <div class="container">
            <p id="register-text">
              Already have an account? <a href="Login_Form.php">Sign In</a>
            </p>
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
      <p id="contact-us">
        Contact us <br />
        info.spendwise@gmail.com
      </p>
      <p id="copyright">© 2025 SpendWise. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="app.js"></script>
  <script>
    window.onload = function() {
      <?php
      if (isset($_GET["msg"])) {
        echo "alert('$_GET[msg]');";
        echo "window.history.replaceState(null, '', window.location.pathname);";
      }
      ?>
    };


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

    // Sign In Toggle
    let navbarSignInBtn = document.querySelector("#login-btn");
    navbarSignInBtn.addEventListener("click", () => {
      window.location = "Login_Form.php";
    });

    // Footer Logo Text Toggle
    let footerLogoText = document.querySelector("#foot-heading");
    footerLogoText.addEventListener("click", () => {
      window.location = "index.php";
    });
  </script>
</body>

</html>