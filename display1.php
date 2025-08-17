<?php

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "database123");

// Query to retrieve data
$sql = "SELECT * FROM account";

// Execute query
$result = mysqli_query($conn, $sql);

// Output HTML table
echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["acc_no"] . "</td>";
    echo "<td>" . $row["curr_bal"] . "</td>";
    echo "<td>" . $row["acc_id"] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close database connection
mysqli_close($conn);

?>