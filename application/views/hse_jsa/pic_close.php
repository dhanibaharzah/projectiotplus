<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Job Monitor</title>
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
			<div class="box-body">
				<h4 class="box-title"><b>A. Deskripsi Pekerjaan</b></h4><br>
				<table class="table table-hover table-striped table-bordered ">
					<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: <?php echo $jsa->job_name; ?></td></tr>
					<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: <?php echo $jsa->area; ?></td></tr>
					<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: <?php echo $jsa->start_date.' s/d '.$jsa->end_date; ?> , <b>Jam : </b> <?php echo $jsa->start_hour.':00 - '.$jsa->end_hour.':00'; ?></td></tr>
					<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: <?php echo $jsa->supervisor.' <b>HP: </b>+62'.$jsa->supervisor_hp ?></td></tr>
					<tr><td width="20%"><b>Pelaksana</b></td><td width="80%">: <?php echo $jsa->user ?></td></tr>
					<tr><td width="20%"><b>Pengawas</b></td><td width="80%">: <?php echo $jsa->check ?></td></tr>
					<tr><td width="20%"><b>Description</b></td><td width="80%">: <?php echo $jsa->description ?></td></tr>
				</table>
				<br>
				<h4 class="box-title"><b>B. Identifikasi Bahaya</b></h4><br>
			</div>
			<div class="box-body table-responsive">
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
					</tr>
					<?php
					if(!empty($workerlist)){
						$a=1;
						foreach($workerlist as $recordx){?>
							<tr>
								<td width="5%" align="center"><?php echo $a; ?></td>
								<td width="45%"><?php echo $recordx->name;?></td>
								<td width="50%"><?php echo $recordx->func;?></td>
							</tr>
							<?php 
							$a++;
						}
					}
					?>
				</table>
				
				
				<table class="table table-hover table-striped table-bordered ">
					
				
				<tr><td colspan="4"><h4 class="box-title"><b>D. Pelepasan Perangkat Safety</b></h4><br>
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
				<tr><td colspan="4" width="50%"><h4 class="box-title"><b>E. Alat Pelindung Diri yang Digunakan</b></h4><br>
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
				</tr>
				<tr>
				<td colspan="4" width="50%"><h4 class="box-title"><b>F. Titik Lockout Tagout (LOTO)</b></h4><br>
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
				<tr><td colspan="4" width="50%"><h4 class="box-title"><b>G. Peralatan yang Digunakan</b></h4><br>
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
				</tr>
				<tr>
				<td colspan="4" width="50%"><h4 class="box-title"><b>H. SUMBER ENERGY YANG DIGUNAKAN</b></h4><br>
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
		</div>
		
		<?php if(!empty($permit_1)){?>
		<div class="box box-danger">
			<div class="box-header text-center">
				<h3><b>IJIN PEKERJAAN PANAS</b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered ">
					<tr><td colspan="4"><b>CHECKLIST IJIN PEKERJAAN PANAS </b><br>
					<?php
					if(!empty($cek0)){
						$a=1;
						foreach($cek0 as $listdata){
							if($a == 1){$value = $permit_1->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 2){$value = $permit_1->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 3){$value = $permit_1->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 4){$value = $permit_1->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 5){$value = $permit_1->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 6){$value = $permit_1->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 7){$value = $permit_1->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 8){$value = $permit_1->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 9){$value = $permit_1->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 10){$value = $permit_1->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 11){$value = $permit_1->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 12){$value = $permit_1->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 13){$value = $permit_1->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 14){$value = $permit_1->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 15){$value = $permit_1->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo  $a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$a++;
						}
					}
					if(!empty($cek1)){
						$b=$a;
						$x=1;
						foreach($cek2 as $listdata){
							if($x == 1){$value = $permit_1->cek1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 2){$value = $permit_1->cek2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 3){$value = $permit_1->cek3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 4){$value = $permit_1->cek4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 5){$value = $permit_1->cek5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 6){$value = $permit_1->cek6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 7){$value = $permit_1->cek7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 8){$value = $permit_1->cek8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 9){$value = $permit_1->cek9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 10){$value = $permit_1->cek10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo $b.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$b++;
						}
					}
					?>
				</td></tr>
				</table>
			</div>
			
		</div>
		<?php } ?>
		<?php if(!empty($permit_2)){?>
		<div class="box box-danger">
			<div class="box-header text-center">
				<h3><b>IJIN PEKERJAAN DI KETINGGIAN</b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered ">
					<tr><td colspan="4"><b>CHECKLIST IJIN PEKERJAAN DI KETINGGIAN </b><br>
					<?php
					if(!empty($cek0)){
						$a=1;
						foreach($cek0 as $listdata){
							if($a == 1){$value = $permit_2->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 2){$value = $permit_2->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 3){$value = $permit_2->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 4){$value = $permit_2->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 5){$value = $permit_2->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 6){$value = $permit_2->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 7){$value = $permit_2->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 8){$value = $permit_2->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 9){$value = $permit_2->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 10){$value = $permit_2->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 11){$value = $permit_2->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 12){$value = $permit_2->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 13){$value = $permit_2->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 14){$value = $permit_2->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 15){$value = $permit_2->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo  $a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$a++;
						}
					}
					if(!empty($cek2)){
						$b=$a;
						$x=1;
						foreach($cek2 as $listdata){
							if($x == 1){$value = $permit_2->cek1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 2){$value = $permit_2->cek2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 3){$value = $permit_2->cek3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 4){$value = $permit_2->cek4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 5){$value = $permit_2->cek5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 6){$value = $permit_2->cek6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 7){$value = $permit_2->cek7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 8){$value = $permit_2->cek8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 9){$value = $permit_2->cek9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 10){$value = $permit_2->cek10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo $b.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$b++;
						}
					}
					?>
				</td></tr>
				</table>
			</div>
			
		</div>
		<?php } ?>
		<?php if(!empty($permit_3)){?>
		<div class="box box-danger">
			<div class="box-header text-center">
				<h3><b>IJIN PEKERJAAN DI RUANG TERBATAS</b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered ">
					<tr><td colspan="4"><b>CHECKLIST IJIN PEKERJAAN DI RUANG TERBATAS </b><br>
					<?php
					if(!empty($cek0)){
						$a=1;
						foreach($cek0 as $listdata){
							if($a == 1){$value = $permit_3->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 2){$value = $permit_3->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 3){$value = $permit_3->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 4){$value = $permit_3->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 5){$value = $permit_3->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 6){$value = $permit_3->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 7){$value = $permit_3->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 8){$value = $permit_3->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 9){$value = $permit_3->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 10){$value = $permit_3->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 11){$value = $permit_3->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 12){$value = $permit_3->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 13){$value = $permit_3->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 14){$value = $permit_3->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 15){$value = $permit_3->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo  $a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$a++;
						}
					}
					if(!empty($cek3)){
						$b=$a;
						$x=1;
						foreach($cek3 as $listdata){
							if($x == 1){$value = $permit_3->cek1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 2){$value = $permit_3->cek2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 3){$value = $permit_3->cek3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 4){$value = $permit_3->cek4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 5){$value = $permit_3->cek5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 6){$value = $permit_3->cek6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 7){$value = $permit_3->cek7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 8){$value = $permit_3->cek8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 9){$value = $permit_3->cek9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 10){$value = $permit_3->cek10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo $b.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$b++;
						}
					}
					?>
				</td></tr>
				</table>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($permit_4)){?>
		<div class="box box-danger">
			<div class="box-header text-center">
				<h3><b>IJIN PEKERJAAN PENGGALIAN</b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered ">
					<tr><td colspan="4"><b>CHECKLIST IJIN PEKERJAAN PENGGALIAN </b><br>
					<?php
					if(!empty($cek0)){
						$a=1;
						foreach($cek0 as $listdata){
							if($a == 1){$value = $permit_4->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 2){$value = $permit_4->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 3){$value = $permit_4->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 4){$value = $permit_4->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 5){$value = $permit_4->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 6){$value = $permit_4->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 7){$value = $permit_4->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 8){$value = $permit_4->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 9){$value = $permit_4->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 10){$value = $permit_4->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 11){$value = $permit_4->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 12){$value = $permit_4->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 13){$value = $permit_4->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 14){$value = $permit_4->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 15){$value = $permit_4->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo  $a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$a++;
						}
					}
					if(!empty($cek4)){
						$b=$a;
						$x=1;
						foreach($cek4 as $listdata){
							if($x == 1){$value = $permit_4->cek1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 2){$value = $permit_4->cek2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 3){$value = $permit_4->cek3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 4){$value = $permit_4->cek4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 5){$value = $permit_4->cek5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 6){$value = $permit_4->cek6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 7){$value = $permit_4->cek7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 8){$value = $permit_4->cek8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 9){$value = $permit_4->cek9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 10){$value = $permit_4->cek10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo $b.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$b++;
						}
					}
					?>
				</td></tr>
				</table>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($permit_5)){?>
		<div class="box box-danger">
			<div class="box-header text-center">
				<h3><b>IJIN PEKERJAAN LISTRIK</b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered ">
					<tr><td colspan="4"><b>CHECKLIST IJIN PEKERJAAN LISTRIK </b><br>
					<?php
					if(!empty($cek0)){
						$a=1;
						foreach($cek0 as $listdata){
							if($a == 1){$value = $permit_5->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 2){$value = $permit_5->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 3){$value = $permit_5->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 4){$value = $permit_5->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 5){$value = $permit_5->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 6){$value = $permit_5->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 7){$value = $permit_5->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 8){$value = $permit_5->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 9){$value = $permit_5->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 10){$value = $permit_5->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 11){$value = $permit_5->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 12){$value = $permit_5->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 13){$value = $permit_5->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 14){$value = $permit_5->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 15){$value = $permit_5->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo  $a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$a++;
						}
					}
					if(!empty($cek5)){
						$b=$a;
						$x=1;
						foreach($cek5 as $listdata){
							if($x == 1){$value = $permit_5->cek1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 2){$value = $permit_5->cek2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 3){$value = $permit_5->cek3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 4){$value = $permit_5->cek4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 5){$value = $permit_5->cek5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 6){$value = $permit_5->cek6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 7){$value = $permit_5->cek7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 8){$value = $permit_5->cek8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 9){$value = $permit_5->cek9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($x == 10){$value = $permit_5->cek10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo $b.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$b++;
						}
					}
					?>
				</td></tr>
				</table>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($permit_6)){?>
		<div class="box box-danger">
			<div class="box-header text-center">
				<h3><b>IJIN PEKERJAAN UMUM</b></h3>
			</div><!-- /.login-logo -->
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered ">
					<tr><td colspan="4"><b>CHECKLIST IJIN PEKERJAAN UMUM </b><br>
					<?php
					if(!empty($cek0)){
						$a=1;
						foreach($cek0 as $listdata){
							if($a == 1){$value = $permit_5->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 2){$value = $permit_5->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 3){$value = $permit_5->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 4){$value = $permit_5->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 5){$value = $permit_5->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 6){$value = $permit_5->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 7){$value = $permit_5->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 8){$value = $permit_5->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 9){$value = $permit_5->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 10){$value = $permit_5->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 11){$value = $permit_5->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 12){$value = $permit_5->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 13){$value = $permit_5->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 14){$value = $permit_5->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							if($a == 15){$value = $permit_5->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
							echo  $a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
							$a++;
						}
					}
					?>
				</td></tr>
				</table>
			</div>
		</div>
		<?php } ?>
		<div class="box box-danger">
			<div class="box-footer table-responsive">
				<div class="row">
					<div class="col-xs-12">
						<h4 class="box-title"><b>Report</b></h4><br>
							<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th>Waktu</th>
								<th>Nama</th>
								<th>Report</th>
								<th>Correction</th>
							</tr>
							<?php
							if(!empty($report)){
								$a=1;
								foreach($report as $recordx){?>
									<tr>
										<td width="5%" align="center"><?php echo $a; ?></td>
										<td ><?php echo $recordx->timestamp;?></td>
										<td ><?php echo $recordx->user;?></td>
										<td ><?php echo $recordx->report;?></td>
										<td ><?php echo $recordx->correction;?></td>
									</tr>
									<?php 
									$a++;
								}
							}
							?>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<a href="<?php echo base_url()?>closepic_hse/<?php echo $jsa->id?>" class="btn btn-block btn-success">Close Job</a>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>