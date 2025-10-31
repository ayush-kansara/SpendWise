<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password - SpendWise</title>
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
    <div class="login-form-container" id="otp-container">
      <p id="login-heading">FORGOT PASSWORD</p>
      <?php
      if (isset($_GET["error"])) { ?>
        <p style="color: red; text-align:center;"><?php echo $_GET["error"]; ?></p>
      <?php
      }
      if (isset($_GET["success"])) { ?>
        <p style="color: #1bd460; text-align:center;"><?php echo $_GET["success"]; ?></p>
      <?php
      } ?>
      <form method="post" id="form" action="Forgot_Password.php" autocomplete="off">
        <div class="form-element-container">
          <div id="fields">
            <label for="email" style="margin-left: 5px"><b>Email</b></label>
            <input
              type="email"
              placeholder="Email"
              name="forgotEmail"
              id="forgotPassword"
              required />
          </div>

          <div id="fields">
            <label for="uname" style="margin-left: 5px"><b>New Password</b></label>
            <input
              type="password"
              placeholder="New password"
              name="newPassword"
              id=""
              required />
          </div>

          <div id="fields">
            <label for="uname" style="margin-left: 5px"><b>Confirm Password</b></label>
            <input
              type="password"
              placeholder="Confirm Password"
              name="confirmPassword"
              id=""
              required />
          </div>

          <button type="submit" id="register-btn" name="forgotBtn">Submit</button>

          <div class="container">
            <p id="register-text"><a href="Login_Form.php">Click Here To Sign In</a></p>
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
</body>

</html>