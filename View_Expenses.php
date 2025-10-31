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
  $email = $_SESSION["email"];

  if (isset($_POST["viewExpense"])) {
    $date = $_POST["selectMonth"];
    $date_components = explode(" ", $date);

    $month = $date_components[0];
    $year = $date_components[1];
    $table_name = $email . "_" . strtolower($month) . "_" . $year;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Expenses - SpendWise</title>
  <link rel="stylesheet" href="View_Expenses_Style.php" />
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
          <div class="options" id="highlight">VIEW EXPENSE</div>
          <div class="options">COST ANALYSIS</div>
        </div>

        <div class="post-login-icons">
          <i
            class="fa-solid fa-arrow-right-from-bracket fa-xl"
            id="logout"></i>
          <a href="#" id="highlight-icon"><i class="fa-solid fa-user fa-2xl" id="user"></i></a>
        </div>
      </div>
    </nav>
  </header>

  <main>

    <body>

      <div class="content">

        <div class="table-container">
          <p id="login-heading">VIEW EXPENSES</p>
          <form action="View_Expenses.php" method="post">
            <select name="selectMonth" required>
              <option value="">---Select Month---</option>
              <?php

              $query = "SELECT * FROM users_expense WHERE email = '$email'";
              $result = mysqli_query($connection, $query);

              $selectedValue = '';

              // Case 1: coming back from Remove.php
              if (isset($_GET['month']) && isset($_GET['year'])) {
                $selectedValue = $_GET['month'] . " " . $_GET['year'];
              }

              // Case 2: submitting the form (View Expense button clicked)
              if (isset($_POST['selectMonth'])) {
                $selectedValue = $_POST['selectMonth'];
              }

              while ($dbrow = mysqli_fetch_assoc($result)) {
                $value = $dbrow['month'] . " " . $dbrow['year'];
                $selected = "";

                if ($value === $selectedValue) {
                  $selected = "selected";
                }

                echo "<option value='$value' $selected>$value</option>";
              }

              ?>
            </select>
            <button id="login-btn" name="viewExpense">View Expense</button>
          </form>

          <table>
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_GET["table_name"])) {
                $table_name = $_GET["table_name"];
                $month = $_GET["month"];
                $year = $_GET["year"];

                $query_check_table = "SHOW TABLES LIKE '$table_name'";
                $result_check_table = mysqli_query($connection, $query_check_table);

                if ($result_check_table->num_rows > 0) {
                  $query1 = "SELECT * FROM `$table_name`";
                  $result1 = mysqli_query($connection, $query1);

                  if ($result1->num_rows > 0) {
                    $x = 1;
                    while ($dbrow = mysqli_fetch_assoc($result1)) {
                      $description = $dbrow['description'];
                      if ($description == "" || $description === null) {
                        $description = "-";
                      }

                      echo "<tr>
                          <td>$x</td>
                          <td>$dbrow[date]</td>
                          <td>$dbrow[category]</td>
                          <td>$dbrow[amount]</td>
                          <td>$dbrow[payment_method]</td>
                          <td>$description</td>
                          <td><a href='Remove.php?sr_no=$dbrow[sr_no]&table_name=$table_name&month=$month&year=$year'><button class='remove-btn' name='removeBtn' id='removeBtn'>Remove</button></a></td>
                      </tr>";
                      $x++;
                    }
                  }
                } else {
                  echo "<tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
                }
              }

              if (isset($_POST["viewExpense"])) {

                $query_check_table = "SHOW TABLES LIKE '$table_name'";
                $result_check_table = mysqli_query($connection, $query_check_table);

                if ($result_check_table->num_rows) {
                  $query1 = "SELECT * FROM `$table_name`";
                  $result1 = mysqli_query($connection, $query1);

                  if ($result1->num_rows > 0) {
                    $x = 1;
                    while ($dbrow = mysqli_fetch_assoc($result1)) {
                      $description = $dbrow['description'];
                      if ($description == "" || $description === null) {
                        $description = "-";
                      }
                      $sr_no = $dbrow["sr_no"];
                      echo "<tr>
                          <td>$x</td>
                          <td>$dbrow[date]</td>
                          <td>$dbrow[category]</td>
                          <td>$dbrow[amount]</td>
                          <td>$dbrow[payment_method]</td>
                          <td>$description</td>
                          <td><a href='Remove.php?sr_no=$dbrow[sr_no]&table_name=$table_name&month=$month&year=$year'><button class='remove-btn' name='removeBtn' id='removeBtn'>Remove</button></a></td>
                      </tr>";

                      $x++;
                    }
                  }
                } else {
                  echo "<tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
                }
              }

              if (!isset($_POST["viewExpense"]) && !isset($_GET["table_name"])) {
                echo "<tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
          <?php
          if (isset($_POST["viewExpense"])) {
            echo "<form action='PDF_Data.php' method='post'>
                    <input type='hidden' name='table_name' value='$table_name'>
                    <input type='hidden' name='month' value='$month'>
                    <input type='hidden' name='year' value='$year'>
                    <button id='login-btn' name='pdfBtn' class='pdfBtn'>Download PDF</button>
          </form>";
          }
          ?>
        </div>
      </div>
  </main>
</body>


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
  window.onpageshow = function(event) {
    if (event.persisted) {
      window.location.reload();
    }
  };

  // User Logout
  let logout = document.querySelector("#logout");
  logout.addEventListener("click", function() {
    let x = confirm("Are you sure you want to Log out?");

    if (x) {
      window.location = "Logout.php";
    }
  });

  // Dashboard Toggle
  let navbarDashboard = document.querySelectorAll(".options")[0];
  navbarDashboard.addEventListener("click", function() {
    console.log("Working");
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
    console.log("Working");
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

  // Data Removed Alert
  window.addEventListener("load", function() {
    <?php
    if (isset($_GET["flag"]) && $_GET["flag"] == 1) {
      echo "alert('Data Removed Successfully');";
      echo "window.history.replaceState(null, '', window.location.pathname);";
    }
    ?>
  });
</script>
</body>

</html>