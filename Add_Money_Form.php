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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Money - SpendWise</title>
    <link rel="stylesheet" href="Post_Form_Style.php" />
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
                    <div class="options" id="highlight">ADD MONEY</div>
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
        <div class="contact-form-container">
            <p id="login-heading">ADD MONEY</p>
            <p id="sub-heading">
                Add your earnings to manage expenses and saving effectively.
            </p>

            <?php
            if (isset($_GET["error"])) { ?>
                <p style="color: #1bd460; text-align:center;"><?php echo $_GET["error"]; ?></p>
            <?php
            } ?>

            <form action="Add_Money.php" method="post">
                <div class="form-element-container">
                    <div id="fields">
                        <label for="name">Email</label>
                        <input
                            type="email"
                            id=""
                            name="email"
                            value="<?php echo $email; ?>"
                            disabled />
                    </div>

                    <div id="fields">
                        <label for="name">Add Money</label>
                        <input
                            type="number"
                            id=""
                            name="amount"
                            placeholder="Enter Amount"
                            required />
                    </div>

                    <div id="fields">
                        <label for="">Month</label>
                        <select name="month" id="" required>
                            <option value="">---Select Month---</option>
                            <?php
                            $query = "SELECT * FROM users_expense WHERE email = '$email'";
                            $result = mysqli_query($connection, $query);

                            if ($result->num_rows > 0) {
                                while ($dbrow = mysqli_fetch_assoc($result)) {
                                    $value = $dbrow["month"] . " " . $dbrow["year"];
                                    echo "<option value='$value'>$value</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div id="fields">
                        <label for="">Received through</label>
                        <select name="paymentMethod" id="" required>
                            <option value="">---Select Payment Mode---</option>
                            <option value="Cash">Cash</option>
                            <option value="UPI Transfer">UPI Transfer</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>

                    <button type="submit" id="seng-msg-btn" name="addMoneyBtn">Add Money</button>
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