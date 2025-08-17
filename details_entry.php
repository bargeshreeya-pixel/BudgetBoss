<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 $fullname = $_POST['fullname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];

$conn = mysqli_connect('localhost', 'root', '', 'database123');
//now check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO entry_details(fullname, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $fullname, $email, $phone, $subject, $message);
    if ($stmt->execute()) {
       // echo "Message sent..";
       header("Location: homepage.html");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
