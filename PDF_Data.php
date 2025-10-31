<?php

session_start();

require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

include "connection.php";

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    header("location:Login_Form.php");
} else {
    $query = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
    $result = mysqli_query($connection, $query);

    $dbrow2 = mysqli_fetch_assoc($result);
    $fname = $dbrow2["firstname"];
    $lname = $dbrow2["lastname"];
    $fullname = $fname . " " . $lname;
    $email = $_SESSION["email"];

    $table_name = $_POST["table_name"];
    $month = $_POST["month"];
    $year = $_POST["year"];

    $heading = $month . " " . $year;

    $query1 = "SELECT * FROM `$table_name`";
    $result1 = mysqli_query($connection, $query1);

    $x = 1;

    $data = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>

    <style>
        body {
            font-family: "Merriweather", "Poppins", sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }

        table, th, td{
            border: 2px solid black;
        }

        th {
            padding: 12px;
            text-align: left;
            text-align: center;
        }

        td {
            padding: 12px;
        }

        thead {
    display: table-header-group;
}
    
        h2 {
            text-align: center;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <h2><b>SpendWise<b></h2>
    <h3>Name - ' . $fullname . '</h3>
    <h3>Email - ' . $email . '</h3>
    <h3>Title - SpendWise Monthly Expense Report</h3>
    <table border="2">
        <thead>
            <tr>
                <th colspan="6">' . $heading . '</th>
            </tr>
            <tr>
                <th>Sr. No.</th>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>';
    while ($dbrow = mysqli_fetch_assoc($result1)) {
        $description = $dbrow['description'];
        if ($description == "" || $description === null) {
            $description = "-";
        }
        $data .= "<tr>
                <td>$x</td>
                <td>$dbrow[date]</td>
                <td>$dbrow[category]</td>
                <td>$dbrow[amount]</td>
                <td>$dbrow[payment_method]</td>
                <td>$description</td>
            </tr>";
        $x++;
    }

    $data .= '</tbody></table></body></html>';

    $dompdf = new Dompdf();
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->loadHtml($data);
    $dompdf->render();
    $dompdf->stream("SpendWise_{$month}_{$year}.pdf");
}

?>