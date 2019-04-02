<link href="http://maxcdn.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css" rel="stylesheet" type="text/css">
<style>

td.water{ background-color:#FF0000;}
td.rs{ background-color:#FF5599;}
td.ss{ background-color:#778899;}
td.alu{ background-color:#110000;}
td.mix{ background-color:#99FF11;}
td.cnl{background-color:#DD8899;}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

	$timestamp		= $_REQUEST['timestamp'];
	
	$total_colums	= $db->getTotalColumn('mixing');
	$max	= 0;
	$row	= array();
	$query	= $db->getMaxSecondMixing($timestamp);
	if(mysql_num_rows($query) > 0)
	{
		$row	= mysql_fetch_array($query);
		
		for($i = 1; $i<$total_colums; $i++)
		{
			$max	= ($row[$i] > $max) ? $row[$i] : $max;
		}
		
		
	}
	$water_time	= $row[2] - $row[1];
	
	$sisa_water	= $max - $water_time;
	?>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<tr>
			<td>Process</td>
			<?php
			for($x=1; $x<=$max; $x++)
			{
				echo '<td>'.$x.'</td>';
			}
			?>
		</tr>
		
		<tr>
			<td>Param 1</td>
			<?php
			for($x=1; $x<=$max; $x++)
			{
				$bgcolor = ( ($x >= $row[1] && $x <= $row[2]) ) ? "water" : '';
				echo '<td class="'.$bgcolor.'"></td>';
			}
			?>
			<td colspan="<?php echo $water_time;?>"></td>
		</tr>
		
		<tr>
			<td>Param 2</td>
			<?php
			for($x=1; $x<=$max; $x++)
			{
				$bgcolor = ($x >= $row[3] && $x <= $row[4]) ? "rs" : '';
				echo '<td class="'.$bgcolor.'"></td>';
			}
			?>
			<td colspan="<?php echo $water_time;?>"></td>
		</tr>
		<tr>
			<td>Param 3</td>
			<?php
			for($x=1; $x<=$max; $x++)
			{
				$bgcolor = ($x >= $row[5] && $x <= $row[6]) ? "ss" : '';
				echo '<td class="'.$bgcolor.'"></td>';
			}
			?>
			<td colspan="<?php echo $water_time;?>"></td>
		</tr>
		<tr>
			<td>Param 4</td>
			<?php
			for($x=1; $x<=$max; $x++)
			{
				$bgcolor = ( ($x >= $row[7] && $x <= $row[8]) || ($x >= $row[9] && $x <= $row[10]) || ($x >= $row[11] && $x <= $row[12])) ? "cnl" : '';
				echo '<td class="'.$bgcolor.'"></td>';
			}
			?>
			<td colspan="<?php echo $water_time;?>"></td>
		</tr>
		<tr>
			<td>Param 5</td>
			<?php
			for($x=1; $x<=$max; $x++)
			{
				$bgcolor = ($x >= $row[13] && $x <= $row[14]) ? "alu" : '';
				echo '<td class="'.$bgcolor.'"></td>';
			}
			?>
			<td colspan="<?php echo $water_time;?>"></td>
		</tr>
		
		<tr>
			<td>Param 6</td>
			<?php
			for($x=1; $x<=$max; $x++)
			{
				$bgcolor = ($x >= $row[15] && $x <= $row[16]) ? "mix" : '';
				echo '<td class="'.$bgcolor.'"></td>';
			}
			?>
			<td colspan="<?php echo $water_time;?>"></td>
		</tr>
	</table>
</div>