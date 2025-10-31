<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - SpendWise</title>
  <link rel="stylesheet" href="About_Us_Style.php" />
  <link rel="icon" href="3-removebg-preview.png">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

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
          <img src="3-removebg-preview.png" id="logo" style="cursor: pointer" alt="logo" />
          <h1 class="headings">SpendWise</h1>

          <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
          </div>
        </div>

        <div class="navContainer" id="navContainer">
          <div class="options">HOME</div>
          <div class="options" id="highlight">ABOUT US</div>
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
    <div class="about-main">

      <p id="about-us-heading">ABOUT US</p>
      <!-- Our Story -->
      <section class="about-section">
        <h2 class="about-us-titles">Our Story</h2>
        <p id="our-story">
          At SpendWise, we believe that managing your money shouldn't be
          complicated. Our journey began with a simple idea: to create a
          powerful yet intuitive tool that empowers individuals to take
          control of their financial future. Frustrated with overly complex
          financial apps, we set out to build a platform that focuses on
          clarity, simplicity, and actionable insights. SpendWise is the
          result of that vision, designed to make personal finance accessible
          and stress-free for everyone. <br /><br />
          We wanted to create an app that wasn't just about tracking numbers,
          but about telling a story—your financial story. By focusing on a
          clean interface and powerful visualization tools, we aim to
          transform the way people interact with their expenses and savings.
          Our goal is to make budgeting and financial analysis a seamless and
          even enjoyable part of your daily routine.
        </p>
      </section>

      <!-- Features -->
      <section class="about-section features">
        <h2 class="about-us-titles">Key Features</h2>
        <div class="feature-grid">
          <div class="feature-card">
            <i class="fa-solid fa-wallet fa-2x"></i>
            <p>
              <span id="greenish-text">Add Money:</span> Record your monthly
              income quickly.
            </p>
          </div>
          <div class="feature-card">
            <i class="fa-solid fa-receipt fa-2x"></i>
            <p>
              <span id="greenish-text">Add Expense:</span> Log expenses by
              date, amount, category, and payment method.
            </p>
          </div>
          <div class="feature-card">
            <i class="fa-solid fa-list fa-2x"></i>
            <p>
              <span id="greenish-text">View Expense:</span> See all your
              expenses with an option to remove entries.
            </p>
          </div>
          <div class="feature-card">
            <i class="fa-solid fa-chart-line fa-2x"></i>
            <p>
              <span id="greenish-text">Dashboard:</span> Get an overview of
              income, expenses, savings & recent activity.
            </p>
          </div>
          <div class="feature-card">
            <i class="fa-solid fa-chart-pie fa-2x"></i>
            <p>
              <span id="greenish-text">Cost Analysis:</span> Track spending
              patterns with monthly charts and graphs.
            </p>
          </div>
        </div>
      </section>

      <!-- How it Works -->
      <section class="about-section">
        <h2 class="about-us-titles">How It Works</h2>
        <p id="how-it-works">
        <ul>
          <li>Secure Onboarding: Your journey begins with a simple email sign-up and a secure one-time password (OTP) verification.</li>
          <li>Easy Tracking: Effortlessly log your income using the Add Money feature and record expenses by providing the amount, payment method, and category.</li>
          <li>Personalized Dashboard: Access your personalized dashboard for a clear summary of your monthly income, expenses, and savings, along with dynamic bar and pie charts for instant insights.</li>
          <li>Detailed Analysis: Review all your financial entries on the View Expense page and get a deeper understanding of your spending patterns with monthly analysis from the Cost Analysis feature.</li>
        </ul>
        </p>
      </section>

      <!-- Developers -->
      <section class="about-section developers">
        <h2 class="about-us-titles">Meet the Developers</h2>
        <div class="dev-grid">
          <div class="dev-card">
            <i class="fa-solid fa-user-circle fa-3x"></i>
            <h3>Ayush Deveshkumar Kansara</h3>
            <p>Frontend Developer</p>
            <p>(HTML, CSS, JavaScript)</p>
            <div class="social-row personal-socials">
              <a href="https://www.instagram.com/ayush1212__?igsh=NHJ4MHJiOHQ3cDFn" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
              <a href="http://www.linkedin.com/in/ayush-kansara-377086285" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
              <a href="https://github.com/ayush-kansara" class="social-icon"><i class="fa-brands fa-github"></i></a>
            </div>
            <div>
            </div>
          </div>
          <div class="dev-card">
            <i class="fa-solid fa-user-circle fa-3x"></i>
            <h3>Harsh Rakeshkumar Champaneri</h3>
            <p>Backend Developer</p>
            <p>(JavaScript, PHP, MySQL)</p>
            <div class="social-row personal-socials">
              <a href="https://www.instagram.com/harsh.champ2005?igsh=MWpvYnZjcGZidDhlcw==" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://www.linkedin.com/in/harsh-rakeshkumar-champaneri-a04523315?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
              <a href="https://github.com/Harsh-3108" class="social-icon"><i class="fa-brands fa-github"></i></a>
            </div>
          </div>
        </div>
      </section>
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