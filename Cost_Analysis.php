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
    $array_expense_bar_chart = [];
    $array_payment_method_bar_chart = [];

    $array_category_pie_chart = [];
    $array_expense_pie_chart = [];

    $total_money = 0;
    $total_expense = 0;
    $total_saving = 0;

    $array_month = [];
    $array_month_expense = [];

    $array_category_pie_chart_yearly = [];
    $array_expense_pie_chart_yearly = [];

    $current_year = 0;

    $current_month_exist = false;
    $query_default_month = "SELECT * FROM users_expense WHERE email = '$email' LIMIT 1";
    $result_default_month = mysqli_query($connection, $query_default_month);
    $default_data = mysqli_fetch_assoc($result_default_month);
    $default_year = $default_data["year"];
    $default_month = $default_data["month"];
    $default_table_name = $email . "_" . strtolower($default_month) . "_" . $default_year;

    if (isset($_POST["showAnalytics"])) {
        $date = $_POST["month"];
        $date_components = explode(" ", $date);

        $selected_month = $date_components[0];
        $selected_year = $date_components[1];
        $selected_table_name = $email . "_" . strtolower($selected_month) . "_" . $selected_year;

        $query_check_table = "SHOW TABLES LIKE '$selected_table_name'";
        $result_check_table = mysqli_query($connection, $query_check_table);

        // Bar Chart Expenses vs Payment Method Data
        if ($result_check_table->num_rows > 0) {
            $query_amount_payment_bar = "SELECT SUM(amount) AS amt, payment_method FROM `$selected_table_name` GROUP BY payment_method";
            $result_amount_payment_bar = mysqli_query($connection, $query_amount_payment_bar);

            $y = 0;

            if ($result_amount_payment_bar->num_rows > 0) {
                while ($dbrow = mysqli_fetch_assoc($result_amount_payment_bar)) {
                    $array_expense_bar_chart[$y] = $dbrow["amt"];
                    $array_payment_method_bar_chart[$y] = $dbrow["payment_method"];
                    $y++;
                }
            }
        }

        // Pie Chart Category vs Expense Data
        if ($result_check_table->num_rows > 0) {
            $query_category_expense_pie_chart = "SELECT category, SUM(amount) AS amt FROM `$selected_table_name` GROUP BY category";
            $result_category_expense_pie_chart = mysqli_query($connection, $query_category_expense_pie_chart);

            $x = 0;

            if ($result_category_expense_pie_chart->num_rows > 0) {
                while ($dbrow = mysqli_fetch_assoc($result_category_expense_pie_chart)) {
                    $array_category_pie_chart[$x] = $dbrow["category"];
                    $array_expense_pie_chart[$x] = $dbrow["amt"];
                    $x++;
                }
            }
        }
    } else {
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
        $current_month_table_name = $email . "_" . strtolower($new_month) . "_" . $current_year;

        $query_check_table = "SHOW TABLES LIKE '$current_month_table_name'";
        $result_check_table = mysqli_query($connection, $query_check_table);

        // Bar Chart Expenses vs Payment Method Data
        if ($result_check_table->num_rows > 0) {
            $query_expense_payment_bar = "SELECT SUM(amount) AS amt, payment_method FROM `$current_month_table_name` GROUP BY payment_method";
            $result_expense_payment_bar = mysqli_query($connection, $query_expense_payment_bar);

            $array_expense_bar_chart = [];
            $array_payment_method_bar_chart = [];
            $y = 0;

            if ($result_expense_payment_bar->num_rows > 0) {
                while ($dbrow = mysqli_fetch_assoc($result_expense_payment_bar)) {
                    $array_expense_bar_chart[$y] = $dbrow["amt"];
                    $array_payment_method_bar_chart[$y] = $dbrow["payment_method"];
                    $y++;
                }
            }
        } else {
            $query_expense_payment_bar = "SELECT SUM(amount) AS amt, payment_method FROM `$default_table_name` GROUP BY payment_method";
            $result_expense_payment_bar = mysqli_query($connection, $query_expense_payment_bar);

            $array_expense_bar_chart = [];
            $array_payment_method_bar_chart = [];
            $y = 0;

            if ($result_expense_payment_bar->num_rows > 0) {
                while ($dbrow = mysqli_fetch_assoc($result_expense_payment_bar)) {
                    $array_expense_bar_chart[$y] = $dbrow["amt"];
                    $array_payment_method_bar_chart[$y] = $dbrow["payment_method"];
                    $y++;
                }
            }
        }

        // Pie Chart Category vs Expense Data
        if ($result_check_table->num_rows > 0) {
            $query_category_expense_pie_chart = "SELECT category, SUM(amount) AS amt FROM `$current_month_table_name` GROUP BY category";
            $result_category_expense_pie_chart = mysqli_query($connection, $query_category_expense_pie_chart);

            $array_category_pie_chart = [];
            $array_expense_pie_chart = [];
            $x = 0;

            if ($result_category_expense_pie_chart->num_rows > 0) {
                while ($dbrow = mysqli_fetch_assoc($result_category_expense_pie_chart)) {
                    $array_category_pie_chart[$x] = $dbrow["category"];
                    $array_expense_pie_chart[$x] = $dbrow["amt"];
                    $x++;
                }
            }
        } else {
            $query_category_expense_pie_chart = "SELECT category, SUM(amount) AS amt FROM `$default_table_name` GROUP BY category";
            $result_category_expense_pie_chart = mysqli_query($connection, $query_category_expense_pie_chart);

            $array_category_pie_chart = [];
            $array_expense_pie_chart = [];
            $x = 0;

            if ($result_category_expense_pie_chart->num_rows > 0) {
                while ($dbrow = mysqli_fetch_assoc($result_category_expense_pie_chart)) {
                    $array_category_pie_chart[$x] = $dbrow["category"];
                    $array_expense_pie_chart[$x] = $dbrow["amt"];
                    $x++;
                }
            }
        }
    }
}

// Bar Chart Expense vs Month Yearly Data
$array_month = [];
$array_month_expense = [];
$y = 0;

$query_users_expensse = "SELECT * FROM users_expense WHERE email = '$email' AND year = '2025'";
$result_users_expense = mysqli_query($connection, $query_users_expensse);

if ($result_users_expense->num_rows > 0) {
    while ($dbrow = mysqli_fetch_assoc($result_users_expense)) {
        $array_month[$y] = $dbrow["month"];
        $month_table_name = $email . "_" . strtolower($dbrow["month"]) . "_" . $dbrow["year"];

        $query_check_table = "SHOW TABLES LIKE '$month_table_name'";
        $result_check_table = mysqli_query($connection, $query_check_table);

        if ($result_check_table->num_rows > 0) {
            $query5 = "SELECT SUM(amount) AS amt FROM `$month_table_name`";
            $result5 = mysqli_query($connection, $query5);
            if ($result5->num_rows > 0) {
                $dbrow1 = mysqli_fetch_assoc($result5);
                $array_month_expense[$y] = $dbrow1["amt"];
            }
        }
        $y++;
    }
}

// // Dougnut Chart Expense vs Category Yearly Data
$query_users_expense_pie = "SELECT * FROM users_expense WHERE email = '$email' AND year = '2025'";
$result_users_expense_pie = mysqli_query($connection, $query_users_expense_pie);

if ($result_users_expense_pie->num_rows > 0) {
    $data = [
        "Food & Dining" => 0,
        "Housing & Rent" => 0,
        "Utilities & Bills" => 0,
        "Transport & Fuel" => 0,
        "Technology & Gadgets" => 0,
        "Entertainment" => 0,
        "Shopping" => 0,
        "Education & Learning" => 0,
        "Finance & Investments" => 0,
        "Insurance" => 0,
        "Miscellaneous/Other" => 0,
    ];

    while ($dbrow2 = mysqli_fetch_assoc($result_users_expense_pie)) {
        $month_table_name1 = $email . "_" . strtolower($dbrow2["month"]) . "_" . $dbrow2["year"];

        $query_check_table = "SHOW TABLES LIKE '$month_table_name1'";
        $result_check_table = mysqli_query($connection, $query_check_table);

        if ($result_check_table->num_rows > 0) {
            $query7 = "SELECT category, SUM(amount) AS amt FROM `$month_table_name1` GROUP BY category";
            $result7 = mysqli_query($connection, $query7);

            while ($dbrow3 = mysqli_fetch_assoc($result7)) {
                // $category = $dbrow3["category"];
                $category = trim($dbrow3["category"]);
                $amount = $dbrow3["amt"];
                foreach ($data as $key => $value) {
                    if ($category == $key) {
                        $value = $value + $amount;
                        $data[$key] = $value;
                    }
                }
            }
        }
    }

    foreach ($data as $key => $value) {
        if ($value > 0) {
            array_push($array_category_pie_chart_yearly, $key);
            array_push($array_expense_pie_chart_yearly, $value);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cost Analysis - Spendwise</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="Cost_Analysis_Style.php" rel="stylesheet" />
    <link rel="icon" href="3-removebg-preview.png">
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

        /* Footer */
    </style>
</head>

<body>
    <!-- Site Header -->
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
                    <div class="options" id="highlight">COST ANALYSIS</div>
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
                <p id="login-heading">COST ANALYSIS</p>

                <form action="Cost_Analysis.php" method="post">
                    <select name="month" required>
                        <option value="">---Select Month---</option>
                        <?php
                        $query_month = "SELECT * FROM users_expense WHERE email = '$email'";
                        $result_month = mysqli_query($connection, $query_month);
                        $selectedValue = "";

                        while ($row = mysqli_fetch_assoc($result_month)) {
                            $value = $row['month'];
                            if ($value == $new_month) {
                                $current_month_exist = true;
                            }
                        }

                        if (isset($_POST["showAnalytics"])) {
                            $selectedValue = $_POST["month"];
                        } else {
                            if ($current_month_exist) {
                                $selectedValue = $dbrow["month"] . " " . $dbrow["year"];
                            } else {
                                $selectedValue = $default_month . " " . $default_year;
                            }
                        }

                        $result_month = mysqli_query($connection, $query_month);
                        while ($dbrow = mysqli_fetch_assoc($result_month)) {
                            $value = $dbrow['month'] . " " . $dbrow['year'];
                            $selected = "";
                            if ($value === $selectedValue) {
                                $selected = "selected";
                            }
                            echo "<option value='$value' $selected>$value</option>";
                        }

                        ?>
                    </select>
                    <button id="login-btn" name="showAnalytics">Show Analytics</button>
                </form>

                <div class="total-fields-container">
                    <div id="total-income" class="field-cards">
                        <p id="card-heading">Selected Month</p>
                        <p id="display-figures">
                            <?php
                            if (isset($_POST["showAnalytics"])) {
                                echo $selected_month . " " . $selected_year;
                            } else {
                                if ($current_month_exist) {
                                    echo $new_month . " " . $current_year;
                                } else {
                                    echo $default_month . " " . $default_year;
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div id="total-expense" class="field-cards">
                        <p id="card-heading">Total Money</p>
                        <p id="display-figures">
                            <?php
                            if (isset($_POST["showAnalytics"])) {
                                $query_check_table = "SHOW TABLES LIKE '$selected_table_name'";
                                $result_check_table = mysqli_query($connection, $query_check_table);

                                if ($result_check_table->num_rows > 0) {
                                    $query_total_money = "SELECT SUM(amount) AS amt FROM user_amount WHERE email = '$email' AND month = '$selected_month' AND year = '$selected_year'";
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
                                }
                            } else {
                                if ($current_month_exist) {
                                    $query_check_table = "SHOW TABLES LIKE '$current_month_table_name'";
                                    $result_check_table = mysqli_query($connection, $query_check_table);

                                    if ($result_check_table->num_rows > 0) {
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
                                } else {
                                    $query_check_table = "SHOW TABLES LIKE '$default_table_name'";
                                    $result_check_table = mysqli_query($connection, $query_check_table);

                                    if ($result_check_table->num_rows > 0) {
                                        $query_total_money = "SELECT SUM(amount) AS amt FROM user_amount WHERE email = '$email' AND month = '$default_month' AND year = '$default_year'";
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
                                }
                            }

                            ?>
                        </p>
                    </div>
                    <div id="total-saving" class="field-cards">
                        <p id="card-heading">Total Expense</p>
                        <p id="display-figures">
                            <?php

                            if (isset($_POST["showAnalytics"])) {
                                $query_check_table = "SHOW TABLES LIKE '$selected_table_name'";
                                $result_check_table = mysqli_query($connection, $query_check_table);

                                if ($result_check_table->num_rows > 0) {
                                    $query_total_expense = "SELECT SUM(amount) AS amt FROM `$selected_table_name`";
                                    $result_total_expense = mysqli_query($connection, $query_total_expense);

                                    if ($result_total_expense->num_rows > 0) {
                                        $dbrow = mysqli_fetch_assoc($result_total_expense);
                                        $total_expense = $dbrow["amt"];
                                        echo "₹" . $total_expense;
                                    } else {
                                        echo "-";
                                    }
                                }
                            } else {
                                if ($current_month_exist) {
                                    $query_check_table = "SHOW TABLES LIKE '$current_month_table_name'";
                                    $result_check_table = mysqli_query($connection, $query_check_table);

                                    if ($result_check_table->num_rows > 0) {
                                        if ($result_check_table->num_rows > 0) {
                                            $query_total_expense = "SELECT SUM(amount) AS amt FROM `$current_month_table_name`";
                                            $result_total_expense = mysqli_query($connection, $query_total_expense);

                                            if ($result_total_expense->num_rows > 0) {
                                                $dbrow = mysqli_fetch_assoc($result_total_expense);
                                                $total_expense = $dbrow["amt"];
                                                echo "₹" . $total_expense;
                                            } else {
                                                echo "-";
                                            }
                                        }
                                    } else {
                                        echo "-";
                                    }
                                } else {
                                    $query_check_table = "SHOW TABLES LIKE '$default_table_name'";
                                    $result_check_table = mysqli_query($connection, $query_check_table);

                                    if ($result_check_table->num_rows > 0) {
                                        if ($result_check_table->num_rows > 0) {
                                            $query_total_expense = "SELECT SUM(amount) AS amt FROM `$default_table_name`";
                                            $result_total_expense = mysqli_query($connection, $query_total_expense);

                                            if ($result_total_expense->num_rows > 0) {
                                                $dbrow = mysqli_fetch_assoc($result_total_expense);
                                                $total_expense = $dbrow["amt"];
                                                echo "₹" . $total_expense;
                                            } else {
                                                echo "-";
                                            }
                                        }
                                    } else {
                                        echo "-";
                                    }
                                }
                            }

                            ?>
                        </p>
                    </div>
                    <div id="total-saving" class="field-cards">
                        <p id="card-heading">Total Savings</p>

                        <?php
                        if (!empty($total_expense) && !empty($total_money)) {
                            $total_saving = $total_money - $total_expense;
                            if ($total_saving < 0) {
                                echo "<p id='display-figures' style='color:red;'>₹$total_saving</p>";
                            } else {
                                echo "<p id='display-figures'>₹$total_saving</p>";
                            }
                        } else {
                            echo "<p id='display-figures'>-</p>";
                        }
                        ?>

                    </div>
                </div>
                <div class="chart-container">
                    <div class="bar-chart-div">
                        <p id="chart-heading">Expense by Payment Method</p>
                        <canvas id="exp-paymet-chart"></canvas>
                    </div>

                    <div class="pie-chart-div">
                        <p id="chart-heading">Category-wise Spending</p>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>

                <div class="graph-table-Container">
                    <div class="bar-chart-div">
                        <p id="inc-vs-exp-chart-heading">Income vs Expense vs Savings</p>
                        <canvas id="exp-vs-inc-Chart"></canvas>
                    </div>
                    <div class="actual-table">
                        <p id="table-heading">Top Spending Categories</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Spending in %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["showAnalytics"])) {
                                    if ($result_check_table->num_rows > 0) {
                                        $query_top_spending_category = "SELECT date,category,SUM(amount) AS amt FROM `$selected_table_name` GROUP BY category ORDER BY amt DESC LIMIT 3";
                                        $result_top_spending_category = mysqli_query($connection, $query_top_spending_category);
                                        $x = 0;

                                        while ($dbrow = mysqli_fetch_assoc($result_top_spending_category)) {
                                            $temp = round(($dbrow['amt'] / $total_expense) * 100, 2);
                                            $value = $temp . "%";
                                            echo "<tr>
                                                <td>$dbrow[date]</td>
                                                <td>$dbrow[category]</td>
                                                <td>$dbrow[amt]</td>
                                                <td>$value</td>
                                            </tr>";
                                            $x++;
                                        }

                                        if ($x == 2) {

                                            echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                        }

                                        if ($x == 1) {
                                            $i = 0;
                                            while ($i != 2) {
                                                echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                $i++;
                                            }
                                        }

                                        if ($x == 0) {
                                            $i = 0;
                                            while ($i != 2) {
                                                echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                $i++;
                                            }
                                        }
                                    } else {
                                        $i = 0;
                                        while ($i != 3) {
                                            echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                            $i++;
                                        }
                                    }
                                } else {
                                    if ($current_month_exist) {
                                        if ($result_check_table->num_rows > 0) {
                                            $query_top_spending_category = "SELECT date,category,SUM(amount) AS amt FROM `$current_month_table_name` GROUP BY category ORDER BY amt DESC LIMIT 3";
                                            $result_top_spending_category = mysqli_query($connection, $query_top_spending_category);
                                            $x = 0;

                                            while ($dbrow = mysqli_fetch_assoc($result_top_spending_category)) {
                                                $temp = round(($dbrow['amt'] / $total_expense) * 100, 2);
                                                $value = $temp . "%";
                                                echo "<tr>
                                                <td>$dbrow[date]</td>
                                                <td>$dbrow[category]</td>
                                                <td>$dbrow[amt]</td>
                                                <td>$value</td>
                                            </tr>";
                                                $x++;
                                            }
                                            if ($x == 2) {

                                                echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                            }

                                            if ($x == 1) {
                                                $i = 0;
                                                while ($i != 2) {
                                                    echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                    $i++;
                                                }
                                            }

                                            if ($x == 0) {
                                                $i = 0;
                                                while ($i != 2) {
                                                    echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                    $i++;
                                                }
                                            }
                                        } else {
                                            $i = 0;
                                            while ($i != 3) {
                                                echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                $i++;
                                            }
                                        }
                                    } else {
                                        if ($result_check_table->num_rows > 0) {
                                            $query_top_spending_category = "SELECT date,category,SUM(amount) AS amt FROM `$default_table_name` GROUP BY category ORDER BY amt DESC LIMIT 3";
                                            $result_top_spending_category = mysqli_query($connection, $query_top_spending_category);
                                            $x = 0;

                                            while ($dbrow = mysqli_fetch_assoc($result_top_spending_category)) {
                                                $temp = round(($dbrow['amt'] / $total_expense) * 100, 2);
                                                $value = $temp . "%";
                                                echo "<tr>
                                                <td>$dbrow[date]</td>
                                                <td>$dbrow[category]</td>
                                                <td>$dbrow[amt]</td>
                                                <td>$value</td>
                                            </tr>";
                                                $x++;
                                            }
                                            if ($x == 2) {

                                                echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                            }

                                            if ($x == 1) {
                                                $i = 0;
                                                while ($i != 2) {
                                                    echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                    $i++;
                                                }
                                            }

                                            if ($x == 0) {
                                                $i = 0;
                                                while ($i != 2) {
                                                    echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                    $i++;
                                                }
                                            }
                                        } else {
                                            $i = 0;
                                            while ($i != 3) {
                                                echo "<tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>";
                                                $i++;
                                            }
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-container yearly-expense">
            <div class="dboard-content yearly-expense-content">
                <p id="yearly-expense-heading">YEARLY EXPENSE INSIGHTS</p>

                <div class="chart-container">
                    <div class="bar-chart-div">
                        <p id="chart-heading">Monthly Spending</p>
                        <canvas id="monthly-spending-Chart"></canvas>
                    </div>

                    <div class="pie-chart-div">
                        <p id="chart-heading">Category-wise Spending</p>
                        <canvas id="yearly-categories-chart"></canvas>
                    </div>
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

        // Monthly
        // Bar Chart Expense vs Payment Method
        const exp_paymet_chart = document.getElementById("exp-paymet-chart");
        let expense_bar_chart = <?php echo json_encode($array_expense_bar_chart); ?>;
        let payment_method_bar_chart = <?php echo json_encode($array_payment_method_bar_chart); ?>;

        new Chart(exp_paymet_chart, {
            type: 'bar',
            data: {
                labels: payment_method_bar_chart,
                datasets: [{
                    label: 'Amount',
                    backgroundColor: [
                        'rgb(52, 152, 219)',
                    ],
                    borderColor: '#fff',
                    borderWidth: 2,
                    data: expense_bar_chart,
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

        // Pie Chart Category vs Expense
        const category_expense = document.getElementById("pieChart");
        let expense_pie_chart = <?php echo json_encode($array_expense_pie_chart); ?>;
        let category_pie_chart = <?php echo json_encode($array_category_pie_chart); ?>;

        new Chart(category_expense, {
            type: "pie",
            data: {
                labels: category_pie_chart,
                datasets: [{
                    label: "Amount",
                    data: expense_pie_chart,
                    backgroundColor: bgcolor,
                    borderColor: "#fff",
                    borderWidth: 2,
                }, ],
            },
            options: {
                responsive: true,
            },
        });

        // Income vs Expense vs Saving
        const exp_inc_sav = document.getElementById("exp-vs-inc-Chart");
        let income = <?php
                        if (isset($total_money)) {
                            echo $total_money;
                        } else {
                            echo 0;
                        }
                        ?>;
        let expense = <?php echo $total_expense; ?>;
        let saving = <?php
                        if (isset($total_saving)) {
                            echo $total_saving;
                        } else {
                            echo 0;
                        }
                        ?>;

        let data = [];
        let label = [];
        if (income !== 0) {
            data.push(income);
            label.push("Income");
        }

        if (expense != 0) {
            data.push(expense);
            label.push("Expense");
        }

        if (saving !== 0) {
            data.push(saving);
            label.push("Saving");
        }

        new Chart(exp_inc_sav, {
            type: "bar",
            data: {
                labels: label,
                datasets: [{
                    backgroundColor: [
                        "rgba(52, 73, 94, 0.7)",
                        "rgba(241, 196, 15, 0.7)",
                        "rgba(26, 188, 156, 0.7)",
                    ],
                    borderColor: '#fff',
                    borderWidth: 2,
                    data: data,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });

        // Yearly
        // Bar Chart Expense vs Month Yearly Data
        const month_spending = document.getElementById("monthly-spending-Chart");
        let month_bar_chart = <?php echo json_encode($array_month); ?>;
        let month_expense_bar_chart = <?php echo json_encode($array_month_expense); ?>;

        console.log(month_bar_chart);
        console.log(month_expense_bar_chart);
        new Chart(month_spending, {
            type: 'bar',
            data: {
                labels: month_bar_chart,
                datasets: [{
                    backgroundColor: [
                        'rgb(52, 152, 219)',
                    ],
                    borderColor: '#fff',
                    borderWidth: 2,
                    data: month_expense_bar_chart,
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
                            text: "Month",
                        }
                    }
                },
            }
        });

        // Dounght Chart Expense vs Category Yearly Data
        const category_spending_yearly = document.getElementById("yearly-categories-chart");
        let array_category_pie_chart_yearly = <?php echo json_encode($array_category_pie_chart_yearly); ?>;
        let array_expense_pie_chart_yearly = <?php echo json_encode($array_expense_pie_chart_yearly); ?>;

        console.log(array_category_pie_chart_yearly);
        console.log(array_expense_pie_chart_yearly);

        new Chart(document.getElementById("yearly-categories-chart"), {
            type: "doughnut",
            data: {
                labels: array_category_pie_chart_yearly,
                datasets: [{
                    label: "Amount",
                    data: array_expense_pie_chart_yearly,
                    backgroundColor: bgcolor,
                    borderColor: "#fff",
                    borderWidth: 2,
                }, ],
            },
            options: {
                responsive: true,
            },
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