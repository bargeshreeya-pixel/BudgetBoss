<?php
session_start();


// Define database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "database123"; // Change to your database name

// Connect to database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if login form was submitted
if (isset($_POST['Login'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Query the signup table to check if email and password match
    $sql = "SELECT * FROM signup WHERE Email='$email' AND Password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful and if there is only one row returned
    if ($result && mysqli_num_rows($result) == 1) {
        // Login successful, redirect user to dashboard or home page
        $row = mysqli_fetch_assoc($result);
        // Login successful, set session variables and redirect user to dashboard or home page
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['acc_id'] = $row['acc_id'];
       // $email= $_SESSION['Email'];
        header("Location: homepage.html");
        exit();
    } else {
        // Login failed, show error message
        echo "Invalid email or password";
    }
}

// Close database connection
mysqli_close($conn);
?>




 