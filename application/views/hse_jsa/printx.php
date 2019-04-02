<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HSE Permit Print</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="box box-danger">
			<div class="box-header text-center">
				<div class="row">
					<div class="col-xs-3">
						<h3 color="red"><b>PT SLCI</b></h3>
					</div>
					<div class="col-xs-6">
						<h3><b>IJIN KERJA</b></h3>
					</div>
					<div class="col-xs-3">
					</div>
				</div>
			</div><!-- /.login-logo -->
			<div class="box-body">
				<h4 class="box-title"><b>A. Deskripsi Pekerjaan</b></h4><br>
				<table class="table table-hover table-striped table-bordered ">
					<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="50%">: <?php echo $jsa->job_name; ?></td><td width="30%" rowspan="6"><img src="<?php echo base_url()?>qrcode_hse/<?php echo $jsa->id; ?>" style="height:200px"/></td></tr>
					<tr><td width="20%"><b>Lokasi</b></td><td width="50%">: <?php echo $jsa->area; ?></td></tr>
					<tr><td width="20%"><b>Tanggal</b></td><td width="50%">: <?php echo $jsa->start_date.' s/d '.$jsa->end_date; ?> , <b>Jam : </b> <?php echo $jsa->start_hour.':00 - '.$jsa->end_hour.':00'; ?></td></tr>
					<tr><td width="20%"><b>Supervisor</b></td><td width="50%">: <?php echo $jsa->supervisor.' <b>HP: </b>+62'.$jsa->supervisor_hp ?></td></tr>
					<tr><td width="20%"><b>Pelaksana</b></td><td width="50%">: <?php echo $jsa->user; ?></td></tr>
					<tr><td width="20%"><b>Pengawas</b></td><td width="50%">: <?php echo $jsa->check; ?></td></tr>
					<tr><td width="20%"><b>Description</b></td><td width="50%" colspan="2">: <?php echo $jsa->description ?></td></tr>
				</table>
				<br>
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
								<td width="45%"><?php echo $recordx->name;?></td>
								<td width="50%"><?php echo $recordx->func;?></td>
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
						<td class="text-center" width="20%"><?php if($jsa->panas == 7){ echo '<i class="fa fa-check fa-3x"></i>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->tinggi == 7){ echo '<i class="fa fa-check fa-3x"></i>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->terbatas == 7){ echo '<i class="fa fa-check fa-3x"></i>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->penggalian == 7){ echo '<i class="fa fa-check fa-3x"></i>';}?></td>
						<td class="text-center" width="20%"><?php if($jsa->listrik == 7){ echo '<i class="fa fa-check fa-3x"></i>';}?></td>
					</tr>
					<tr>
						<td class="text-center" width="100%" colspan="5"><b>Disetujui: </b><?php echo $jsa->timestamp; ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>
