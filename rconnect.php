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
$email = $_POST['email'];
$acc_no=$_POST['acc_no'];
$acc_type = $_POST['acc_type'];
$curr_bal = $_POST['curr_bal'];
$inc_amt = $_POST['inc_amt'];

// Retrieve the acc_id from the sign_up table based on the provided email
$sql = "SELECT acc_id FROM signup WHERE Email = '$email'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $acc_id = $row["acc_id"];
    $_SESSION['acc_id'] = $acc_id; // Store the acc_id in a session variable
} else {
    echo "Error: No record found for the provided email.";
    exit();
}

// Insert data into the account table
$sql = "INSERT INTO account (acc_no, acc_type, curr_bal, acc_id) VALUES ('$acc_no', '$acc_type', '$curr_bal', '$acc_id')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
   // echo "Data inserted into the account table successfully. Account number is: " . $last_id . "<br>";
   header("Location: rpsample.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Insert data into the income table
$sql = "INSERT INTO income (acc_id, inc_amt) VALUES ('$acc_id', '$inc_amt')";

if (mysqli_query($conn, $sql)) {
   // echo "Data inserted into the income table successfully.";
   header("Location: rpsample.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
