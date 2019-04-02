<?php
$servername = "192.168.1.11";
$username = "nodejs";
$password = "nodejs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM cias.elec_form group by code";
$result = $conn->query($sql);


?>
<html>
<head>



</head>
<body>
<table class="table-bordered">
<?php
$a=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	if (($a % 6) == 0){ echo '<tr align="center">'; }
	?>
	<td bgcolor="white" align="center" style="border: 2px solid black;padding: 1px;">
		<img src="http://codesys.slci.co.id/qrinput/qrpm.php?code=<?php echo $row["code"];?>" style="height:125px" align="center"/>
		<br>
		<font size="1" align="center" color="black"><strong>SLCI</strong> [<?php echo $row["code"];?>]</font>
		<br>
	</td>
<?php
$a++;
	} 

		

    }
else {
    echo "0 results";
}
$conn->close();
?>
</table>


</body>
</html>