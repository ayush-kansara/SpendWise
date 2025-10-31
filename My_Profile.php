<?php

session_start();

include "connection.php";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
  header("location:Login_Form.php");
  exit;
} else {
  $query = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
  $result = mysqli_query($connection, $query);
  $dbrow = mysqli_fetch_assoc($result);

  $firstname = $dbrow["firstname"];
  $lastname = $dbrow["lastname"];
  $email = $dbrow["email"];
  $password = $dbrow["password"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MyProfile - SpendWise</title>
  <link rel="stylesheet" type="text/css" href="Post_Form_Style.php" />
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
          <div class="options">DASHBOARD</div>
          <div class="options">ADD EXPENSE</div>
          <div class="options">ADD MONEY</div>
          <div class="options">VIEW EXPENSE</div>
          <div class="options">COST ANALYSIS</div>
        </div>

        <div class="post-login-icons">

          <i class="fa-solid fa-arrow-right-from-bracket fa-xl" id="logout"></i>
          <a href="#"><i class="fa-solid fa-user fa-2xl" id="user"></i></a>
        </div>
      </div>
    </nav>
  </header>

  <main>

    <div class="profile-form-container">

      <p id="login-heading">MY PROFILE</p>
      <form method="post" id="myForm" action="Update_Details.php" autocomplete="off">

        <div class="profile-icon-container">
          <i class="fa-solid fa-user fa-2xl" id="profile-pic"></i>
        </div>

        <div class="form-element-container">

          <div id="fields">
            <label for="uname" style="margin-left: 5px;"><b>First Name</b></label>
            <input type="text" placeholder="My Firstname" name="fname" value="<?php echo $firstname; ?>" disabled class="pfactive">
          </div>

          <div id="fields">
            <label for="uname" style="margin-left: 5px;"><b>Last Name</b></label>
            <input type="text" placeholder="My Lastname" name="lname" value="<?php echo $lastname; ?>" disabled class="pfactive">
          </div>

          <div id="fields">
            <label for="email" style="margin-left: 5px;"><b>Email</b></label>
            <input type="text" placeholder="My email" name="email" value="<?php echo $email; ?>" disabled readonly class="pfactive">
          </div>

          <div id="fields">
            <label for="pass" style="margin-left: 5px;"><b>Password</b></label>
            <input type="text" placeholder="My Password" name="password" value="<?php echo $password; ?>" disabled class="pfactive">
          </div>

          <button type="submit" id="edit-update-btn">Enable Editing</button>
          <button type="submit" id="updateBtn" style="display: none;" name="updateDetails">Update Details</button>
          <button type="submit" class="remove-btn" id="deleteBtn" name="deleteAccount">Delete Account</button>
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
    window.onpageshow = function(event) {
      if (event.persisted) {
        window.location.reload();
      }
    };

    let editDetailsBtn = document.querySelector("#edit-update-btn");
    editDetailsBtn.addEventListener("click", (event) => {
      event.preventDefault();

      let inputFields = document.querySelectorAll("input[type='text']");
      inputFields.forEach(x => {
        x.disabled = false;
      });

      editDetailsBtn.style.display = "none";
      updateBtn.style.display = "block";
    });

    // User Logout
    let logout = document.querySelector("#logout");
    logout.addEventListener("click", function() {
      let x = confirm("Are you sure you want to Log out?");

      if (x) {
        window.location = "Logout.php";
      }
    });

    // Delete Account
    let deleteAccountBtn = document.querySelector("#deleteBtn");
    deleteAccountBtn.addEventListener("click", (event) => {
      event.preventDefault();
      let y = confirm("Are you sure you want to Delete Account?");

      if (y) {
        let form = document.getElementById("myForm");
        form.action = "Delete_Account.php";
        form.submit();
      }
    });

    // Dashboard Toggle
    let navbarDashboard = document.querySelectorAll(".options")[0];
    navbarDashboard.addEventListener("click", function() {
      window.location = "Dashboard.php";
    });

    // Add Expense Toggle
    let navbarAddExpense = document.querySelectorAll(".options")[1];
    navbarAddExpense.addEventListener("click", function() {
      window.location = "Add_Expense_Form.php";
    });

    // Add Money Toggle
    let navbarAddMoney = document.querySelectorAll(".options")[2];
    navbarAddMoney.addEventListener("click", function() {
      window.location = "Add_Money_Form.php";
    });

    // View Expense Toggle
    let navbarViewExpense = document.querySelectorAll(".options")[3];
    navbarViewExpense.addEventListener("click", function() {
      window.location = "View_Expenses.php";
    });

    // Cost Analysis Toggle
    let navbarCostAnalysis = document.querySelectorAll(".options")[4];
    navbarCostAnalysis.addEventListener("click", function() {
      window.location = "Cost_Analysis.php";
    });

    // My Profile Toggle
    let navbarMyProfile = document.querySelector("#user");
    navbarMyProfile.addEventListener("click", function() {
      window.location = "My_Profile.php";
    });
  </script>
</body>

</html>