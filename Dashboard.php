<?php

session_start();

include "connection.php";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
  header("location: Login_Form.php");
  exit;
} else {
  $query = "SELECT * FROM users WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
  $result = mysqli_query($connection, $query);
  $dbrow = mysqli_fetch_assoc($result);
  $fullname = $dbrow["firstname"] . " " . $dbrow["lastname"];

  $array_amount_bar_chart = [];
  $array_category_bar_chart = [];

  $array_category_pie_chart = [];
  $array_amount_pie_chart = [];

  $email = $_SESSION["email"];

  // For five entries of current month
  date_default_timezone_set('Asia/Kolkata');

  $current_date = date("Y-m-d");
  $current_date_components = explode("-", $current_date);
  $current_month = $current_date_components[1]; // 09
  $current_year = $current_date_components[0]; // 2025

  switch ($current_month) {
    case "01":
      $new_month = "January";
      break;

    case "02":
      $new_month = "Febuary";
      break;

    case "03":
      $new_month = "March";
      break;

    case "04":
      $new_month = "April";
      break;

    case "05":
      $new_month = "May";
      break;

    case "06":
      $new_month = "June";
      break;

    case "07":
      $new_month = "July";
      break;

    case "08":
      $new_month = "August";
      break;

    case "09":
      $new_month = "September";
      break;

    case "10":
      $new_month = "October";
      break;

    case "11":
      $new_month = "November";
      break;

    case "12":
      $new_month = "December";
      break;
  }
  $current_table_name = $email . "_" . strtolower($new_month) . "_" . $current_year;

  $query_check_table = "SHOW TABLES LIKE '$current_table_name'"; // Checks for current month table
  $result_check_table = mysqli_query($connection, $query_check_table);

  // For chart.js Pie Chart data
  if ($result_check_table->num_rows > 0) {
    $query3 = "SELECT category, SUM(amount) AS amt FROM `$current_table_name` GROUP BY category";
    $result3 = mysqli_query($connection, $query3);

    $x = 0;

    if ($result3->num_rows > 0) {
      while ($dbrow = mysqli_fetch_assoc($result3)) {
        $array_category_pie_chart[$x] = $dbrow["category"];
        $array_amount_pie_chart[$x] = $dbrow["amt"];
        $x++;
      }
    }
  }

  // For chart.js Bar Chart data
  if ($result_check_table->num_rows > 0) {
    $query4 = "SELECT SUM(amount) AS amt, payment_method FROM `$current_table_name` GROUP BY payment_method";
    $result4 = mysqli_query($connection, $query4);

    $y = 0;

    if ($result4->num_rows > 0) {
      while ($dbrow = mysqli_fetch_assoc($result4)) {
        $array_amount_bar_chart[$y] = $dbrow["amt"];
        $array_category_bar_chart[$y] = $dbrow["payment_method"];
        $y++;
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <link rel="icon" href="3-removebg-preview.png">
  </link>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="Dashboard_Style.php" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="homeStyle.css"> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <style>
    /* Main Dashboard Section */
    .dashboard {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      padding: 2rem;
    }

    canvas {
      width: 100% !important;
      height: auto !important;
    }

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
  <!-- Site Header -->
  <header>
    <nav>
      <div class="mainNav">
        <div class="logo-heading-container">
          <img src="3-removebg-preview.png" style="cursor: pointer;" id="logo" alt="logo" />
          <h1 class="headings">SpendWise</h1>

          <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
          </div>
        </div>

        <div class="navContainer" id="navContainer">
          <div class="options" id="highlight">DASHBOARD</div>
          <div class="options">ADD EXPENSE</div>
          <div class="options">ADD MONEY</div>
          <div class="options">VIEW EXPENSE</div>
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

  <!-- Dashboard Content -->
  <main>
    <div class="dashboard-container">
      <div class="dboard-content">
        <p id="login-heading">EXPENSE DASHBOARD</p>

        <div class="total-fields-container">

          <!-- Current Year -->
          <div id="total-income" class="field-cards">
            <p id="card-heading">Current Month</p>
            <p id="display-figures"><?php echo $new_month . " " . $current_year; ?></p>
          </div>

          <!-- Total Money -->
          <div id="total-expense" class="field-cards">
            <p id="card-heading">Total Money</p>
            <p id="display-figures">
              <?php
              if ($result_check_table->num_rows > 0) {  // Check for current month table
                $query_total_money = "SELECT SUM(amount) AS amt FROM user_amount WHERE email = '$email' AND month = '$new_month' AND year = '$current_year'";
                $result_total_money = mysqli_query($connection, $query_total_money);

                if ($result_total_money->num_rows > 0) {
                  $dbrow = mysqli_fetch_assoc($result_total_money);
                  $total_money = $dbrow["amt"];
                  if ($total_money != null) {
                    echo "₹" . $total_money;
                  } else {
                    echo "-";
                  }
                }
              } else {
                echo "-";
              }
              ?>
            </p>
          </div>

          <!-- Total Expense -->
          <div id="total-saving" class="field-cards">
            <p id="card-heading">Total Expense</p>
            <p id="display-figures">
              <?php
              $query_check_table = "SHOW TABLES LIKE '$current_table_name'";
              $result_check_table = mysqli_query($connection, $query_check_table);

              if ($result_check_table->num_rows > 0) {
                $query_total_expense = "SELECT SUM(amount) AS amt FROM `$current_table_name`";
                $result_total_expense = mysqli_query($connection, $query_total_expense);

                if ($result_total_expense->num_rows > 0) {
                  $dbrow = mysqli_fetch_assoc($result_total_expense);
                  $total_expense = $dbrow["amt"];
                  echo "₹" . $total_expense;
                }
              } else {
                echo "-";
              }
              ?>
            </p>
          </div>

          <!-- Total Saving -->
          <div id="total-saving" class="field-cards">
            <p id="card-heading">Total Saving</p>
            <p id="display-figures"></p>
            <?php

            if (!empty($total_expense) && !empty($total_money)) {
              $total_saving = $total_money - $total_expense;
              // echo "₹" . $total_saving;
              if ($total_saving < 0) {
                echo "<p id='display-figures' style='color: red;'>₹$total_saving</p>";
              } else {
                echo "<p id='display-figures'>₹$total_saving</p>";
              }
            } else {
              echo "<p id='display-figures'>-</p>";
            }

            ?>
          </div>

        </div>

        <!-- Bar Chart -->
        <div class="chart-container">
          <div class="bar-chart-div">
            <p id="chart-heading">Expense by Payment Method</p>
            <canvas id="myChart"></canvas>
          </div>

          <!-- Pie Chart -->
          <div class="pie-chart-div">
            <p id="chart-heading">Category-wise Spending</p>
            <canvas id="pieChart"></canvas>
          </div>
        </div>

        <!-- Recent five transactions -->
        <div class="table-container">
          <div class="table-header">
            <p id="table-heading">Recent Transactions</p>
          </div>

          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Payment method</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Default current system month data
              if ($result_check_table->num_rows) {
                $query2 = "SELECT * FROM `$current_table_name` ORDER BY created_time DESC LIMIT 5";
                $result2 = mysqli_query($connection, $query2);
                if ($result2->num_rows > 0) {
                  while ($dbrow = mysqli_fetch_assoc($result2)) {
                    $description = $dbrow['description'];
                    if ($description == "" || $description === null) {
                      $description = "-";
                    }
                    echo "<tr>
                        <td>$dbrow[date]</td>
                        <td>$dbrow[category]</td>
                        <td>$dbrow[amount]</td>
                        <td>$dbrow[payment_method]</td>
                        <td>{$description}</td>
                    </tr>";
                  }
                }
              } else {
                echo "<tr>
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
        </div>
      </div>
    </div>
  </main>

  <!-- Site Footer -->
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
    Chart.defaults.color = "white";

    bgcolor = ["rgb(52, 152, 219)",
      "rgb(255, 99, 132)",
      "rgb(72, 201, 176)",
      "rgb(255, 159, 64)",
      "rgb(155, 89, 182)",
      "rgb(255, 205, 86)",
      "rgb(46, 204, 113)",
      "rgb(231, 76, 60)",
      "rgb(52, 73, 94)",
      "rgb(241, 196, 15)",
      "rgb(26, 188, 156)",
      "rgb(142, 68, 173)",
      "rgb(243, 156, 18)",
      "rgb(52, 232, 158)",
      "rgb(210, 77, 87)"
    ]

    // Bar Chart
    let amount_bar_chart = <?php echo json_encode($array_amount_bar_chart); ?>;
    let category_bar_chart = <?php echo json_encode($array_category_bar_chart); ?>;
    console.log(amount_bar_chart);
    console.log(category_bar_chart);
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: category_bar_chart,
        datasets: [{
          label: 'Amount',
          backgroundColor: [
            'rgb(52, 152, 219)',
          ],
          borderColor: '#fff',
          borderWidth: 2,
          data: amount_bar_chart,
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false,
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: "Expense",
            }
          },
          x: {
            ticks: {
              autoSkip: false,
              maxRotation: 0,
              minRotation: 38,
              font: {
                size: 10,
              },
            },
            title: {
              display: true,
              text: "Payment Method",
            }
          }
        },
      }
    });

    // Pie Chart
    let category = <?php echo json_encode($array_category_pie_chart); ?>;
    let amount = <?php echo json_encode($array_amount_pie_chart); ?>;

    new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      data: {
        labels: category,
        datasets: [{
          label: 'Amount',
          data: amount,
          backgroundColor: bgcolor,
          borderColor: '#fff',
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
      }
    });
  </script>

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

  </script>
</body>

</html>