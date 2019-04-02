<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HSE Permit Print</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="box box-danger">
			<div class="box-header text-center">
				<div class="row">
					<div class="col-xs-2 text-center">
						<img src="/var/www/html/uploads/scg-logo.png" style="height:70px"/>
					</div>
					<div class="col-xs-6">
						<h3><b>IJIN KERJA</b></h3>
					</div>
					<div class="col-xs-3 text-center">
						
					</div>
				</div>
			</div>
		</div>
		<div class="box box-danger">
			<div class="box-body">
				<h4 class="box-title"><b>A. Deskripsi Pekerjaan</b></h4><br>
				<table class="table">
					<tr><td width="20%"><font size="2"><b>Nama Pekerjaan</b></font></td><td width="50%"><font size="2">: <?php echo $jsa->job_name; ?></font></td><td width="30%" rowspan="6"><img src="/var/www/html/uploads/qr<?php echo $jsa->id; ?>.png" style="height:150px"/><br></td></tr>
					<tr><td width="20%"><font size="2"><b>Lokasi</b></font></td><td width="50%"><font size="2">: <?php echo $jsa->area; ?></font></td></tr>
					<tr><td width="20%"><font size="2"><b>Tanggal</b></font></td><td width="50%"><font size="2">: <?php echo $jsa->start_date; ?> , <b>Jam : </b> <?php echo $jsa->start_hour.':00 - '.$jsa->end_hour.':00'; ?></font></td></tr>
					<tr><td width="20%"><font size="2"><b>Supervisor</b></font></td><td width="50%"><font size="2">: <?php echo $jsa->supervisor.' <b>HP: </b>+62'.$jsa->supervisor_hp ?></font></td></tr>
					<tr><td width="20%"><font size="2"><b>Pelaksana</b></font></td><td width="50%"><font size="2">: <?php echo $jsa->user; ?></font></td></tr>
					<tr><td width="20%"><font size="2"><b>Pengawas</b></font></td><td width="50%"><font size="2">: <?php echo $jsa->check; ?></font></td></tr>
					<tr><td width="20%"><font size="2"><b>Description</b></font></td><td width="50%" colspan="2"><font size="2">: <?php echo $jsa->description ?></font></td></tr>
				</table>
				<br>
			</div>
		</div>
		<div class="box box-danger">
			<div class="box-body">
				<h4 class="box-title"><b>B. Data Anggota Tim</b></h4><br>
				<table class="table table-hover table-striped table-bordered ">
					<tr>
						<th class="text-center">No</th>
						<th>Nama</th>
						<th>Fungsi</th>
						<th>Tekanan Darah</th>
					</tr>
					<?php
					if(!empty($workerlist)){
						$a=1;
						foreach($workerlist as $recordx){?>
							<tr>
								<td width="5%" align="center"><?php echo $a; ?></td>
								<td width="35%"><?php echo $recordx->name;?></td>
								<td width="30%"><?php echo $recordx->func;?></td>
								<td width="30%">
									<?php 
									if($recordx->sistol == 0){ echo '-';}
									else{echo $recordx->sistol;}	
									?>
									<?php echo '/';?>
									<?php 
									if($recordx->diastol == 0){ echo '-';}
									else{echo $recordx->diastol;}	
									?>	
								</td>
							</tr>
							<?php 
							$a++;
						}
					}
					?>
				</table>
				
			</div>
		</div>
		<div class="box box-danger">
			<div class="box-footer">
				<table class="table table-hover table-striped table-bordered ">
					<?php if($jsa->general == 7){?>
					<tr>
						<th class="text-center" width="100%">General Job Only</th>
					</tr>
					<?php } ?>
					<?php if($jsa->general == 2){?>
					<tr>
						<th class="text-center" width="20%">Panas</th>
						<th class="text-center" width="20%">Ketinggian</th>
						<th class="text-center" width="20%">Ruang Terbatas</th>
						<th class="text-center" width="20%">Penggalian</th>
						<th class="text-center" width="20%">Listrik</th>
					</tr>
					<tr>
						<td class="text-center" width="20%"><?php if($jsa->panas == 7){ echo '<img src="/var/www/html/uploads/checked.jpg" style="height:100px"/>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->tinggi == 7){ echo '<img src="/var/www/html/uploads/checked.jpg" style="height:100px"/>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->terbatas == 7){ echo '<img src="/var/www/html/uploads/checked.jpg" style="height:100px"/>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->penggalian == 7){ echo '<img src="/var/www/html/uploads/checked.jpg" style="height:100px"/>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->listrik == 7){ echo '<img src="/var/www/html/uploads/checked.jpg" style="height:100px"/>';}?></td>
					</tr>
					<tr>
						<td class="text-center" width="100%" colspan="5"><b>Disetujui: </b><?php echo $jsa->timestamp; ?></td>
					</tr>
					<tr>
						<td class="text-center" width="20%"><b>Submited by,</b><br><?php echo $jsa->user; ?></td>
						<td class="text-center" width="20%"><b>Checked by,</b><br><?php echo $jsa->check; ?></td>
						<td class="text-center" width="20%"><b>PIC Area</b><br><?php echo $jsa->pic; ?></td>
						<td class="text-center" width="20%"><b>Safety</b><br><?php echo $jsa->sd; ?></td>
						<td class="text-center" width="20%"><b>Manager</b><br><?php echo $jsa->manager; ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>
