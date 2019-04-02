<style>
table, th, td {
   border: 1px solid black;
   border-collapse: collapse;
   padding:3px;
}
</style>
<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

$page	= isset($_REQUEST['page']) ? $_REQUEST['page'] : '';


if($page == '')
{
	$query		= $db->getAllData('supply_demould');
	echo '<h3> Suplay Demould </h3>';
	echo '<table width="80%">';
	echo '<tr><td>Timestamp Server</td><td>CTU</td><td>timeleft</td></tr>';
	if(mysql_num_rows($query) > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo '<tr><td>'.$row['timestamp'].'</td><td>'.$row['CTU'].'</td><td>'.$row['timeleft'].'</td></tr>';
		}
	}
	echo '</table>';



	$query		= $db->getAllData('supply_grate');
	echo '<h3> Suplay Grate </h3>';
	echo '<table width="80%">';
	echo '<tr><td>Timestamp Server</td><td>CTU</td><td>timeleft</td></tr>';
	if(mysql_num_rows($query) > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo '<tr><td>'.$row['timestamp'].'</td><td>'.$row['CTU'].'</td><td>'.$row['timeleft'].'</td></tr>';
		}
	}
	echo '</table>';

	/*
	$query		= $db->getAllData('CT_Sparating');
	echo '<h3> CT Sparating </h3>';
	echo '<table width="80%">';
	echo '<tr><td>Timestamp Server</td><td>TL Sp Tilt2</td><td>CTU Sp Tilt2</td><td>TL Trans</td><td>CTU Trans</td><td>TL Spar</td><td>CTU Spar</td></tr>';
	if(mysql_num_rows($query) > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo '<tr><td>'.$row['timestamp'].'</td><td>'.$row['TL_Sp_Tilt2'].'</td><td>'.$row['CTU_Sp_Tilt2'].'</td><td>'.$row['TL_Trans'].'</td><td>'.$row['CTU_Trans'].'</td><td>'.$row['TL_Spar'].'</td><td>'.$row['CTU_Spar'].'</td></tr>';
		}
	}
	echo '</table>';
	*/

	$query		= $db->getAllData('sparating');
	echo '<h3> sparating </h3>';
	echo '<table width="80%">';
	echo '<tr><td>Timestamp Server</td><td>CTU</td><td>timeleft</td></tr>';
	if(mysql_num_rows($query) > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo '<tr><td>'.$row['timestamp'].'</td><td>'.$row['CTU'].'</td><td>'.$row['timeleft'].'</td></tr>';
		}
	}
	echo '</table>';


	$query		= $db->getAllData('transport');
	echo '<h3> transport </h3>';
	echo '<table width="80%">';
	echo '<tr><td>Timestamp Server</td><td>CTU</td><td>timeleft</td></tr>';
	if(mysql_num_rows($query) > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo '<tr><td>'.$row['timestamp'].'</td><td>'.$row['CTU'].'</td><td>'.$row['timeleft'].'</td></tr>';
		}
	}
	echo '</table>';

	$query		= $db->getAllData('supply_tilt2');
	echo '<h3> supply_tilt2 </h3>';
	echo '<table width="80%">';
	echo '<tr><td>Timestamp Server</td><td>CTU</td><td>timeleft</td></tr>';
	if(mysql_num_rows($query) > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo '<tr><td>'.$row['timestamp'].'</td><td>'.$row['CTU'].'</td><td>'.$row['timeleft'].'</td></tr>';
		}
	}
	echo '</table>';
	
}else if($page == 'mixing'){
	
	$query		= $db->getAllData('mixing');
	echo '<h3> Mixing </h3>';
	echo '<table width="80%">';
	echo '<tr><td>Timestamp Server</td>
			<td>Water Start</td>
			<td>Water Stop</td>
			<td>RS Start</td>
			<td>RS Stop</td>
			<td>SS Start</td>
			<td>SS Stop</td>
			<td>Cnl1 Start</td>
			<td>Cnl1 Stop</td>
			<td>Cnl2 Start</td>
			<td>Cnl2 Stop</td>
			<td>Cnl3 Start</td>
			<td>Cnl3 Stop</td>
			<td>Alu Start</td>
			<td>Alu Stop</td>
			<td>Mix Start</td>
			<td>Mix Stop</td>
			<td>Last Data</td>
			</tr>';
	if(mysql_num_rows($query) > 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo '<tr><td>'.$row['timestamp'].'</td>
					<td>'.$row['water_start'].'</td>
					<td>'.$row['water_stop'].'</td>
					<td>'.$row['rs_start'].'</td>
					<td>'.$row['rs_stop'].'</td>
					<td>'.$row['ss_start'].'</td>
					<td>'.$row['ss_stop'].'</td>
					<td>'.$row['cnl1_start'].'</td>
					<td>'.$row['cnl1_stop'].'</td>
					<td>'.$row['cnl2_start'].'</td>
					<td>'.$row['cnl2_stop'].'</td>
					<td>'.$row['cnl3_start'].'</td>
					<td>'.$row['cnl3_stop'].'</td>
					<td>'.$row['alu_start'].'</td>
					<td>'.$row['alu_stop'].'</td>
					<td>'.$row['mix_start'].'</td>
					<td>'.$row['mix_stop'].'</td>
					<td>'.$row['last_data'].'</td>
					</tr>';
		}
	}
	echo '</table>';
}

