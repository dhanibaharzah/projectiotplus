<?php
$servername = "192.168.1.11";
$username = "nodejs";
$password = "nodejs";
$dbname = "db_codesys";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT col1 FROM your_table_name order by timestamp desc limit 1 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "pass: " . $row["col1"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>