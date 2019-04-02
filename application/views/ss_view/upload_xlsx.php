<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-upload"></i> Import Attendance Data</h1>
	</section>
	<section class="content">
		<div class="box box-primary">
			<div class="box-header">
				<h3>Manual Instruction.</h3>
				<ul>
				<li>Go to <a href="192.168.150.5" class="btn btn-success btn-sm" value="Get" target="_blank"><i class="fa fa-link"></i> Fingerprint Machine</a> *Accessible for local connection only</li>
				<li>Login</li>
				<li>Download 'Today' and 'Yesterday' data</li>
				<li>You will receive attlog.dat, open it with spreadsheet/excel software</li>
				<li>Save as .xlsx format</li>
				<li>Then go to file input below, choose the 'yesterday' data first</li>
				<li>Press preview then scroll down till you see import button</li>
				<li>Do the same for 'today' data</li>
				<li>Import them everyday, better in same hour</li>
				</ul>
			</div>
			<div class="box-body">
			<form method="post" action="<?php echo base_url(); ?>ss_upload_xlsx" enctype="multipart/form-data">
				<div class="input-group">
					<input type="file" name="file" class="form-control">
					<span class="input-group-btn">	
						<button type="submit" name="preview" class="btn btn-success" value="Preview"><i class="fa fa-eye"></i> Preview</button>
					</span>
				</div>		
			</form>
			</div>
		</div>
	<?php
	if(isset($_POST['preview'])){
		if(isset($upload_error)){ 
			echo "<div style='color: red;'>".$upload_error."</div>";
			die;
		}
echo "<form method='post' action='".base_url()."ss_import_attlog'>";
echo "
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
								<th>NIK</th>
								<th>Att</th>
								<th>Type</th>
								<th>In/Out</th>
							</tr>";
		
		$numrow = 1;
		$kosong = 0;
		foreach($sheet as $row){ 
			$nik = $row['A'];
			$att = $row['C'];
			$type = $row['D']; 
			$inout = $row['E'];

			if(empty($nik) && empty($att) && empty($type) && empty($inout))
				continue; 
			if($numrow > 0){
				echo "<tr>";
				echo "<td>".$nik."</td>";
				echo "<td>".$att."</td>";
				echo "<td>".$type."</td>";
				echo "<td>".$inout."</td>";
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
			echo " &nbsp;&nbsp;";
			echo "<button type='submit' name='import' class='btn btn-sm btn-primary'><i class='fa fa-upload'></i> Import</button>";	
		echo "</form>";
	}
	?>
	</section>
</div>