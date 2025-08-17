<!DOCTYPE html>
<html>
<head>
    <title>Expenses</title>
    <style>
        body {
             /* background-image: url(imageedit_1_3160200654.png); */
            background-size: cover;
            background-color: #006400;
        }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          background-color: #dbfaa6;
        }
        th, td {
          padding: 10px;
        }
        th {
          text-align: left;
        }
        h1{
            color:#dbfaa6
        }
        #button1{
    background-color:#dbfaa6;
    padding: 12px 30px;
    color: #dbfaa6;
    font-size: medium;
    border-radius: 10px;
    /* margin-bottom: -100px; */
    margin-left: 1150px;
    margin-top: -180px;
    
}
#button1 a{
  color: #006400;
  text-transform: uppercase;
}

    </style>
</head>

<body>
    
<?php

session_start(); // add this line at the beginning

if(!isset($_SESSION['Email'])){
    header("location:loginpage.html");
}
if (!isset($_SESSION['acc_id'])) {
    echo "Account ID not found in session";
    exit();
}
$acc_id = $_SESSION['acc_id']; // modify the variable name

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database123";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM expense where acc_id= '$acc_id'";
$result = mysqli_query($conn, $sql);

$sqljoin = "SELECT expense.exp_no, expense.exp_amt, expense.exp_date, expense.exp_category, account.curr_bal 
        FROM expense 
        JOIN account 
        ON expense.acc_id = account.acc_id 
        WHERE expense.acc_id= '$acc_id'";
        $resultjoin=mysqli_query($conn, $sqljoin);

    echo"<h1>YOUR EXPENSES AND CURRENT BALANCE AT A GLANCE</h1>";
        if (mysqli_num_rows($resultjoin) > 0) {
    echo "<table><tr><th>Expense No</th><th>Amount</th><th>Date</th><th>Category</th><th>Current Balance</th></tr>";
    
    while ($row = mysqli_fetch_assoc($resultjoin)) {
        echo "<tr><td>" . $row["exp_no"] . "</td><td>" . $row["exp_amt"] . "</td><td>" . $row["exp_date"] . "</td><td>" . $row["exp_category"] . "</td><td>" . $row["curr_bal"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$sql_income = "SELECT * FROM income WHERE acc_id= '$acc_id'";
$result_income = mysqli_query($conn, $sql_income);
$income_total = 0; // initialize the total income variable
if (mysqli_num_rows($result_income) > 0) {
  while($row = mysqli_fetch_assoc($result_income)) {
    $income_total += $row["inc_amt"]; // accumulate the income amounts
  }
}

$sql_acc = "SELECT * FROM account WHERE acc_id = '$acc_id'";
$result_acc = mysqli_query($conn, $sql_acc);
$row_acc = mysqli_fetch_assoc($result_acc);
?>
<?php
// Assume $conn is the database connection object
$sql_budget = "SELECT * FROM budget WHERE acc_id='$acc_id'";
$result_budget = mysqli_query($conn, $sql_budget);
$row_budget = mysqli_fetch_assoc($result_budget);
?>

<div>

  <h1>Total Annual Income:</h1>
  <p><span style="border: 1px solid #000; padding: 5px; background-color:#dbfaa6"><?php echo $income_total; ?></span></p>
  
</div> 
<h1>Account details for account <?php echo $acc_id; ?></h1>

<table>
    <thead>
    <tr>
        <th>Account number</th>
        <th>Account type</th>
        <th>Current balance</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($row_acc) {
        echo "<tr><td>" . $row_acc["acc_no"] . "</td><td>" . $row_acc["acc_type"] . "</td><td>" . $row_acc["curr_bal"] . "</td></tr>";
    } else {
        echo "<tr><td colspan='3'>No account details found</td></tr>";
    }
    ?>
    
    </tbody>
</table>



    <h1>Expense details for account <?php echo $acc_id; ?></h1>

    <table>
        <thead>
        <tr>
            <th>Expense number</th>
            <th>Expense amount</th>
            <th>Expense date</th>
            <th>Expense category</th>
        </tr>
</thead>
</tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["exp_no"]."</td><td>".$row["exp_amt"]."</td><td>".$row["exp_date"]."</td><td>".$row["exp_category"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No results found</td></tr>";
        }
        
        mysqli_close($conn);
        ?>
        </tbody>
    </table>
    
 <!-- <div style="background-color: #f0f0f0; border: 1px solid #ccc; padding: 10px;"> -->
    


<h1>Budget details</h1>

<table>
    <thead>
        <tr>
            <th>Budget item</th>
            <th>Budget amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Monthly budget</td>
            <td><?php echo $row_budget['monthly_budget']; ?></td>
        </tr>
        <tr>
            <td>Yearly budget</td>
            <td><?php echo $row_budget['yearly_budget']; ?></td>
        </tr>
        <tr>
            <td>Vacation budget</td>
            <td><?php echo $row_budget['vacation_budget']; ?></td>
        </tr>
    </tbody>
</table>
<button id="button1" ><a href="homepage.html">HOME</a>

</body>
</html>
