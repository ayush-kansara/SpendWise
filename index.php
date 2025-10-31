<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - SpendWise</title>
  <link rel="stylesheet" type="text/css" href="Home_Style.php" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="icon" href="3-removebg-preview.png">

  <style>
    /* Fullscreen overlay */
    #logoFullscreen {
      display: none;
      position: fixed;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.9);
      justify-content: center;
      align-items: center;
      animation: fadeInBg 0.4s ease forwards;
    }

    /* Logo animation inside fullscreen */
    #logoFullscreen img {
      max-width: 80%;
      max-height: 80%;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(0, 255, 0, 0.6);
      animation: zoomIn 0.4s ease forwards;
    }

    /* Fade-in background animation */
    @keyframes fadeInBg {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    /* Zoom-in animation for logo */
    @keyframes zoomIn {
      from {
        transform: scale(0.5);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* Zoom-out when closing */
    @keyframes zoomOut {
      from {
        transform: scale(1);
        opacity: 1;
      }

      to {
        transform: scale(0.5);
        opacity: 0;
      }
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <div class="mainNav">
        <div class="logo-heading-container">
          <img src="3-removebg-preview.png" id="logo" style="cursor: pointer;" alt="logo" />
          <h1 class="headings">SpendWise</h1>

          <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
          </div>
        </div>

        <div class="navContainer" id="navContainer">
          <div class="options" id="highlight">HOME</div>
          <div class="options">ABOUT US</div>
          <div class="options">CONTACT US</div>
        </div>

        <div class="login-signup-container">
          <button id="login-btn">Sign In</button>
          <button id="signup-btn">Sign Up</button>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="mainContent">
      <p class="feature">Features</p>
      <div class="card-container">
        <div class="card">
          <div class="title-icon-container">
            <img src="./icons/Emergency Funds 1.png" alt="Add" style="height: 70px; width: 70px;">
            <h2 id="feature-title">Add Expense</h2>
          </div>
          <p id="feature-subtitle">
            Add your spending details including amount, category, date, and payment method for accurate tracking.
          </p>
          <a href="Login_Form.php" style="text-decoration: none" id="learn-more">Learn More</a>
        </div>
        <div class="card">
          <div class="title-icon-container">
            <img src="./icons/Home Finances (1).png" alt="Add" style="height: 70px; width: 70px;">
            <h2 id="feature-title">View Expenses</h2>
          </div>
          <p id="feature-subtitle">
            Check your past and recent expenses with full details including amount, category, payment method, and date.

          </p>
          <a href="Login_Form.php" style="text-decoration: none" id="learn-more">Learn More</a>
        </div>
        <div class="card">
          <div class="title-icon-container">
            <img src="./icons/Financial Data.png" alt="Add" style="height: 70px; width: 70px;">
            <h2 id="feature-title">Dashboard</h2>
          </div>
          <p id="feature-subtitle">
            Access your expenses with charts and summaries to track spending patterns.
          </p>
          <a href="Login_Form.php" style="text-decoration: none" id="learn-more">Learn More</a>
        </div>
        <div class="card">
          <div class="title-icon-container">
            <img src="./icons/Investing 6.png" alt="Add" style="height: 70px; width: 70px;">
            <h2 id="feature-title">Cost Analysis</h2>
          </div>
          <p id="feature-subtitle">
            Get a detailed view of your expenses to identify high-cost areas and manage your budget effectively.
          </p>
          <a href="Login_Form.php" style="text-decoration: none" id="learn-more">Learn More</a>
        </div>
        <div class="card">
          <div class="title-icon-container">
            <img src="./icons/Money.png" alt="Add" style="height: 70px; width: 70px;">
            <h2 id="feature-title">Add Money</h2>
          </div>
          <p id="feature-subtitle">
            Add your earnings to manage expenses and saving effectively.
          </p>
          <a href="Login_Form.php" style="text-decoration: none" id="learn-more">Learn More</a>
        </div>
        <div class="card">
          <div class="title-icon-container">
            <img src="./icons/Taxes 1.png" alt="Add" style="height: 70px; width: 70px;">
            <h2 id="feature-title">Monthly Report</h2>
          </div>
          <p id="feature-subtitle">
            Quickly export your expense records for the month as a PDF from the View Expense page.
          </p>
          <a href="Login_Form.php" style="text-decoration: none" id="learn-more">Learn More</a>
        </div>
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

    // Sign In Toggle
    let navbarSignInBtn = document.querySelector("#login-btn");
    navbarSignInBtn.addEventListener("click", () => {
      window.location = "Login_Form.php";
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


    // Logo Enlargr
    const logo = document.getElementById("logo");

    logo.addEventListener("click", function() {
      const overlay = document.createElement("div");
      overlay.id = "logoFullscreen";
      overlay.innerHTML = `<img src="${this.src}" alt="Logo">`;
      document.body.appendChild(overlay);

      overlay.style.display = "flex";

      // When user clicks anywhere, play zoom-out then remove
      overlay.addEventListener("click", function() {
        const img = overlay.querySelector("img");
        img.style.animation = "zoomOut 0.3s ease forwards";
        overlay.style.animation = "fadeInBg 0.3s reverse ease forwards";

        setTimeout(() => {
          document.body.removeChild(overlay);
        }, 300);
      });
    });
  </script>
</body>

</html>