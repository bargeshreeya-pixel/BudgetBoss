<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Check if user is logged in or acc_id is set in session
if (!isset($_SESSION['acc_id'])) {
    // Redirect to login page or set appropriate error message
    header("Location: signup.html");
    exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database123";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input
$exp_amt = $_POST['exp_amt'];
$exp_date = $_POST['exp_date'];
$exp_category = $_POST['exp_category'];

// Retrieve the acc_id from the account table based on the stored session variable
$acc_id = $_SESSION['acc_id'];

// Insert data into the expense table
$sql = "INSERT INTO expense (exp_amt, exp_date, exp_category, acc_id) VALUES ('$exp_amt', '$exp_date', '$exp_category', '$acc_id')";

if (mysqli_query($conn, $sql)) {
    header("Location: homepage.html");
  //  echo "Data inserted into the expense table successfully.";

    // Retrieve the current balance for the account
    $sql = "SELECT curr_bal FROM account WHERE acc_id = '$acc_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $curr_bal = $row["curr_bal"];

    // Subtract the expense amount from the current balance
    $curr_bal -= $exp_amt;

    // Update the current balance in the account table
    $sql = "UPDATE account SET curr_bal = '$curr_bal' WHERE acc_id = '$acc_id'";
    mysqli_query($conn, $sql);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

