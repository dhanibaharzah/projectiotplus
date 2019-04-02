<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HSE Pengukuran Tekanan Darah</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<br><form action="<?php echo base_url(); ?>blood_pressure" method="post">
		<div class="box">
				<h4 class="box-title"><b>Data Anggota Tim</b></h4><br>
				<table class="table table-hover table-striped table-bordered ">
					<tr>
						<th class="text-center">No</th>
						<th>Nama</th>
						<th>Fungsi</th>
						<th>Sistole</th>
						<th>Diastole</th>
					</tr>
					<?php
					if(!empty($workerlist)){
						$team=1;
						foreach($workerlist as $recordx){?>
							<tr>
								<td width="5%" align="center"><?php echo $team; ?></td>
								<td width="30%"><?php echo $recordx->name;?></td>
								<td width="25%"><?php echo $recordx->func;?></td>
								<td width="20%">
									<input type="number" class="form-control" placeholder="Sistole (mmHg)" name="sistol[]"  required />
								</td>
								<td width="20%">
								    <input type="number" class="form-control" placeholder="diastole (mmHg)" name="diastol[]" required />
								</td>
								<input type="hidden" name="id[]" value="<?php echo $recordx->id;?>" />    	
							</tr>
							<?php 
							$team++;
						}
					}
					?>
				</table>
		</div>
		<div class="box">
			<div class="box-body">
			<p class="login-box-msg"><b>Pengukuran Tekanan Darah</b></p>
			
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="username" name="username" required />
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password" required />
				</div>
				<div class="row">
					<div class="col-xs-12">
						
						<input type="submit" class="btn btn-danger btn-block btn-flat" value="Submit" />
					</div>
				</div>
				</form>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>
