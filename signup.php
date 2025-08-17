
<?php
	$Fullname = $_POST['Fullname'];
	$Phonenumber = $_POST['Phonenumber'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','database123');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(Fullname, Phonenumber, Email, Password) values(?, ?, ?, ?)");
		$stmt->bind_param("siss",$Fullname, $Phonenumber, $Email, $Password);
		$execval = $stmt->execute();

		$acc_id = $conn->insert_id;
		$stmt = $conn->prepare("UPDATE signup SET acc_id = ? WHERE Email = ?");
    $stmt->bind_param("is", $acc_id, $Email);
    $execval = $stmt->execute();



		echo $execval;
		header("Location: loginpage.html");
		//echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>