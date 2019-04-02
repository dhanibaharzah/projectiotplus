<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HSE Permit Check</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="box box-danger">
			<div class="box-header text-center">
				<h3><b>JOB SAFETY AND ENVIRONTMENT<br>ANALYSIS</b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body table-responsive">
				<h4 class="box-title"><b>A. Deskripsi Pekerjaan</b></h4><br>
				<table class="table table-hover table-striped taable-bordered ">
					<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: <?php echo $jsa->job_name; ?></td></tr>
					<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: <?php echo $jsa->area; ?></td></tr>
					<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: <?php echo $jsa->start_date.' s/d '.$jsa->end_date; ?> , <b>Jam : </b> <?php echo $jsa->start_hour.':00 - '.$jsa->end_hour.':00'; ?></td></tr>
					<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: <?php echo $jsa->supervisor.' <b>HP: </b>+62'.$jsa->supervisor_hp ?></td></tr>
					<tr><td width="20%"><b>Description</b></td><td width="80%">: <?php echo $jsa->description ?></td></tr>
				</table>
				<br>
				<h4 class="box-title"><b>B. Identifikasi Bahaya</b></h4><br>
				<table class="table table-hover table-striped table-bordered ">
					<tr>
						<th class="text-center">No</th>
						<th>Aktifitas/Langkah Kerja</th>
						<th>Potensi Bahaya</th>
						<th>Kontrol Bahaya</th>
					</tr>
					<?php
					$no =0;
					if(!empty($activitylist)){
						$a=1;
						$all=1;
						$act='';
						foreach($activitylist as $recordx){?>
							<tr>
								<td width="5%" align="center">
								<?php if($act != $recordx->activity){$no++; echo $no; } ?>
								</td>
								<td width="30%">
								<?php if($act != $recordx->activity){
									$a = 1;
									echo $recordx->activity;
								}?>
								</td>
								<td width="30%">
									<table class="table table-hover">
										<tr>
											<td width="5%"><?php echo $a; ?></td>
											<td width="95%"><?php echo $recordx->risk ?></td>
										</tr>
									</table>
								</td>
								<td width="30%">
									<table class="table table-hover">
										<tr>
											<td width="5%"><?php echo $a; ?></td>
											<td width="95%"><?php echo $recordx->control; ?></td>
										</tr>
									</table>
								</td>
							</tr>
							<?php $act = $recordx->activity;
							$a++;
							$all++;
						}
					}
				?>
				</table>
				<br>
				<h4 class="box-title"><b>C. Data Anggota Tim</b></h4><br>
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
			<div class="box-header text-center">
				<h3><b><?php echo $iki; ?></b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body table-responsive">
				<table class="table table-hover table-striped table-bordered ">
					<tr><td colspan="2" width="50%"><b>Tanggal Permohonan: </b><?php echo $permit->created_on; ?></td><td colspan="2" width="50%"><b>Pelaksana: </b><?php echo $jsa->user; ?></td></tr>
					<tr><td colspan="4"><b>A. PERMOHONAN</b><br>
						Nama Pekerjaan: <?php echo $jsa->job_name; ?><br>
						Lokasi: <?php echo $jsa->area; ?><br>
						Tanggal: <?php echo $jsa->start_date.' s/d '.$jsa->end_date.', Jam: '.$jsa->start_hour.':00 - '.$jsa->end_hour.':00'; ?><br></td></tr>
					<tr><td colspan="4"><b>B. CHECKLIST <?php echo $iki; ?> </b><br>
				<?php
				if(!empty($cek1)){
					$a=1;
					foreach($cek1 as $listdata){
						if($a == 1){$value = $permit->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 2){$value = $permit->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 3){$value = $permit->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 4){$value = $permit->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 5){$value = $permit->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 6){$value = $permit->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 7){$value = $permit->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 8){$value = $permit->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 9){$value = $permit->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 10){$value = $permit->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 11){$value = $permit->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 12){$value = $permit->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 13){$value = $permit->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 14){$value = $permit->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 15){$value = $permit->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						echo  $a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
						$a++;
					}
				}
				if(!empty($cek2)){
					$b=$a;
					$x=1;
					foreach($cek2 as $listdata){
						if($x == 1){$value = $permit->cek1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 2){$value = $permit->cek2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 3){$value = $permit->cek3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 4){$value = $permit->cek4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 5){$value = $permit->cek5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 6){$value = $permit->cek6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 7){$value = $permit->cek7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 8){$value = $permit->cek8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 9){$value = $permit->cek9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 10){$value = $permit->cek10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						echo $b.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
						$b++;
						$x++;
					}
				}
				?>
				</td></tr>
				<tr><td colspan="4"><b>C. PELEPASAN PERANGKAT SAFETY</b><br>
				<?php
				if(!empty($override)){
					$n=1;
					foreach($override as $items){
						echo $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					echo 'Tidak terdapat pelepasan perangkat safety <br>';
				}
				?>
				</td></tr>
				<tr><td colspan="2" width="50%"><b>D. ALAT PELINDUNG DIRI YANG DIGUNAKAN</b><br>
				<?php
				if(!empty($apd)){
					$n=1;
					foreach($apd as $items){
						echo $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					echo 'Tidak diperlukan APD <br>';
				}
				?>
				</td>
				<td colspan="2" width="50%"><b>E. TITIK LOCKOUT TAGOUT (LOTO)</b><br>
				<?php
				if(!empty($loto)){
					$n=1;
					foreach($loto as $items){
						echo $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					echo 'Tidak diperlukan LOTO <br>';
				}
				?>
				</td></tr>
				<tr><td colspan="2" width="50%"><b>F. PERALATAN YANG DIGUNAKAN</b><br>
				<?php
				if(!empty($tool)){
					$n=1;
					foreach($tool as $items){
						echo $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					echo 'Tidak diperlukan alat kerja <br>';
				}
				?>
				</td>
				<td colspan="2" width="50%"><b>G. SUMBER ENERGY YANG DIGUNAKAN</b><br>
				<?php
				if(!empty($energy)){
					$n=1;
					foreach($energy as $items){
						echo $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					echo 'Tidak diperlukan energy <br>';
				}
				?>
				</td></tr></table>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-hover table-striped table-bordered ">
					<tr>
						<td width="20%" align="center"><b>Dibuat Oleh:</b><br><?php echo $user ?><br><?php if(!empty($subdate)){ echo $subdate;}?></td>
						
						<td width="20%" align="center"
					<?php if($app2 == 1){echo 'style="background-color: #3cea3c;"';} ?>
					><b>Pemilik Pekerjaan:</b><br><?php echo $check; ?><br><?php if(!empty($appdate1)){ echo $appdate1;}?></td>
						<td width="20%" align="center"
					<?php if($app3 == 1){echo 'style="background-color: #3cea3c;"';} ?>		
					><b>Pemilik Area Kerja:</b><br>		
					<?php echo $pic; ?><br><?php if(!empty($appdate2)){ echo $appdate2;}?></td>
						<td width="20%" align="center"
					<?php if($app4 == 1){echo 'style="background-color: #3cea3c;"';} ?>
					><b>Safety Officer:</b><br><?php echo $sd; ?><br><?php if(!empty($appdate3)){ echo $appdate3;}?></td>
						<td width="20%" align="center"
					<?php if($app5 == 1){echo 'style="background-color: #3cea3c;"';}	?>
					><b>Manager:</b><br><?php echo $manager; ?><br><?php if(!empty($appdate4)){ echo $appdate4;}?></td>
					</tr>
					<tr>
						<td width="20%" align="center"><b>Note:</b></td>
						<td width="20%" align="center"><?php echo $permit->note_app2; ?></td>
						<td width="20%" align="center"><?php echo $permit->note_app3; ?></td>
						<td width="20%" align="center"><?php echo $permit->note_app4; ?></td>
						<td width="20%" align="center"><?php echo $permit->note_app5; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>
