<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
$monthly_budget = $_POST['monthly_budget'];
$yearly_budget = $_POST['yearly_budget'];
$vacation_budget = $_POST['vacation_budget'];

// Retrieve the acc_id from the account table based on the session variable
$acc_id = $_SESSION['acc_id'];

// Insert data into the budget table
$sql = "INSERT INTO budget (monthly_budget, yearly_budget, vacation_budget, acc_id) VALUES ('$monthly_budget', '$yearly_budget', '$vacation_budget', '$acc_id')";

if (mysqli_query($conn, $sql)) {
  //  echo "Data inserted into the budget table successfully.";
  header("Location: homepage.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
