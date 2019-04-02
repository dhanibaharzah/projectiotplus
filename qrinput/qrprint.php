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
$tipe = $_GET['tipe'];
if ($tipe == '10'){ $tabel = 'tbl_gearbox'; }
if ($tipe == '20'){ $tabel = 'tbl_elmotor'; }
if ($tipe == '30'){ $tabel = 'tbl_valve'; }
if ($tipe == '40'){ $tabel = 'tbl_blower'; }
if ($tipe == '50'){ $tabel = 'tbl_valvehyd'; }
if ($tipe == '60'){ $tabel = 'tbl_valvepne'; }
if ($tipe == '70'){ $tabel = 'tbl_acthyd'; }
if ($tipe == '80'){ $tabel = 'tbl_actpne'; }
if ($tipe == '90'){ $tabel = 'tbl_pump'; }
if ($tipe == '99'){ $tabel = 'tbl_stool'; }

$sql = "SELECT * FROM cias.".$tabel."";
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
	<td bgcolor="black" align="center">
		<img src="http://codesys.slci.co.id/qrinput/qrtools.php?&tipe=<?php echo $tipe;?>&code=<?php echo $row["code"];?>&id=<?php echo $row["id"];?>" style="height:100px" align="center"/>
		<br>
		<font size="1" align="center" color="white"><strong>SLCI</strong> [<?php echo $row["code"];?>]</font>
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