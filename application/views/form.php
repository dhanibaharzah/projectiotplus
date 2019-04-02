<div class="content-wrapper">
	<section class="content-header">
	<h1><i class="fa fa-upload"></i> Import SRMI Daily Data Report</h1>
	</section>	
<div class="box-body">	
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		$("#kosong").hide();
	});
	</script>
	<br>
	<form method="post" action="<?php echo base_url("CBM_salesvol/form_srmi"); ?>" enctype="multipart/form-data">
	<div class="input-group">
		<input type="file" name="file" class="form-control">
		<span class="input-group-btn">	
			<button type="submit" name="preview" class="btn btn-success" value="Preview"><i class="fa fa-eye"></i> Preview</button>
		</span>
	</div>		
	</form>
	<br>
	<?php
	if(isset($_POST['preview'])){
		if(isset($upload_error)){ 
			echo "<div style='color: red;'>".$upload_error."</div>";
			die;
		}
echo "<form method='post' action='".base_url("CBM_salesvol/import_srmi")."'>";
echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>
		<section class='content'>
		<div class='row'>
			<div class='col-lg-12 col-xs-12'>
				<div class='box box-primary'>
					<div class='box-body table-responsive no-padding'>
						<div class='col-lg-12 col-xs-12'>";
					echo	"<table class='table table-hover table-striped table-bordered'>
							<tr>
								<th colspan='5' class='text-center'>Preview Data</th>
							</tr>
							<tr>
								<th>Business Unit</th>
								<th>Area</th>
								<th>Plant</th>
								<th>Breakeven</th>
								<th>Order</th>
								<th>Actual</th>
							</tr>";
		
		$numrow = 1;
		$kosong = 0;
		foreach($sheet as $row){ 
			$bu_srmi = $row['A'];
			$id_area = $row['B'];
			$plant = $row['C'];
			$breakeven = $row['D']; 
			$order_srmi = $row['E']; 
			$actual = $row['F'];

			if(empty($bu_srmi) && empty($id_area) && empty($breakeven) && empty($order_srmi) && empty($actual))
				continue; 
			if($numrow > 1){
				$bu_td = ( ! empty($bu_srmi))? "" : " style='background: #E07171;'";
				$id_td = ( ! empty($id_area))? "" : " style='background: #E07171;'";
				$plant_td = ( ! empty($plant))? "" : " style='background: #E07171;'";
				$bvn_td = ( ! empty($breakeven))? "" : " style='background: #E07171;'";
				$order_td = ( ! empty($order_srmi))? "" : " style='background: #E07171;'";
				$actual_td = ( ! empty($actual))? "" : " style='background: #E07171;'";
				if(empty($bu_srmi) or empty($id_area) or empty($breakeven) or empty($order_srmi) or empty($actual)){
					$kosong++;
				}
				echo "<tr>";
				echo "<td".$bu_td.">".$bu_srmi."</td>";
				echo "<td".$id_td.">".$id_area."</td>";
				echo "<td".$plant_td.">".$plant."</td>";
				echo "<td".$bvn_td.">".$breakeven."</td>";
				echo "<td".$order_td.">".$order_srmi."</td>";
				echo "<td".$actual_td.">".$actual."</td>";
				echo "</tr>";
			}
			$numrow++;
		}
					echo "</table>";
				echo	"</div>";
			echo	"</div>";
		echo	"</div>";
	echo	"</div>";
echo	"</div>";
		
		
			echo "<br>";
			echo "<input type='text' for='record_date' autocomplete='off' name='record_date' id='record_date' placeholder='Pick Date' required>";
			echo " &nbsp;&nbsp;";
			echo "<button type='submit' name='import' class='btn btn-sm btn-primary'><i class='fa fa-upload'></i> Import</button>";	
	
echo "</section>";
		
		echo "</form>";
	}
	?>
</div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
jQuery('#record_date').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true,
		startDate : "2019-01-01"
	});
</script>	
