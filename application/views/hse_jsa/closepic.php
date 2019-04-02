<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HSE Closing Job</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>Penutupan Ijin Kerja</b><br>  
					<h4><?php echo $jsa->job_name; ?></h4>
				</a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<form action="<?php echo base_url(); ?>closepic_session_hse" method="post">
				<div class="form-group has-feedback">
					<table class="table table-hover table-striped taable-bordered ">
						<?php
							$a=1;
							if(!empty($cek0))
							{
								foreach($cek0 as $record)
								{
						?>
						<tr>
							
							<td width="50%"><?php echo $record->question ?></td>
							<td width="45%">
								<?php if($record->answer_type == 1){ ?>
								<label class="radio-inline"><input type="radio" name="param<?php echo $a ?>" value="1" required >YA</label>
								<label class="radio-inline"><input type="radio" name="param<?php echo $a ?>" value="2">TIDAK</label>
								<label class="radio-inline"><input type="radio" name="param<?php echo $a ?>" value="3">TIDAK PERLU</label>
								<?php } ?>
								<?php if($record->answer_type == 2){ ?>
								<input type="text" class="form-control required" id="param<?php echo $a ?>" name="param<?php echo $a ?>" maxlength="255" required>
								<?php } ?>
							</td>
						</tr>
						<?php
							$a++;
							}
						}
						?>
						<?php
							$b=$a;
							$p=1;
							if(!empty($cek1))
							{
								foreach($cek1 as $record)
								{
						?>
						<tr>
							
							<td width="50%"><?php echo $record->question ?></td>
							<td width="45%">
								<?php if($record->answer_type == 1){ ?>
								<label class="radio-inline"><input type="radio" name="panas<?php echo $p ?>" value="1" required >YA</label>
								<label class="radio-inline"><input type="radio" name="panas<?php echo $p ?>" value="2">TIDAK</label>
								<label class="radio-inline"><input type="radio" name="panas<?php echo $p ?>" value="3">TIDAK PERLU</label>
								<?php } ?>
								<?php if($record->answer_type == 2){ ?>
								<input type="text" class="form-control required" id="panas<?php echo $p ?>" name="panas<?php echo $p ?>" maxlength="255" required>
								<?php } ?>
							</td>
						</tr>
						<?php
							$b++;
							$p++;
							}
						}
						?>
						<?php
							$c=$b;
							$q=1;
							if(!empty($cek2))
							{
								foreach($cek2 as $record)
								{
						?>
						<tr>
							
							<td width="50%"><?php echo $record->question ?></td>
							<td width="45%">
								<?php if($record->answer_type == 1){ ?>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $q ?>" value="1" required >YA</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $q ?>" value="2">TIDAK</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $q ?>" value="3">TIDAK PERLU</label>
								<?php } ?>
								<?php if($record->answer_type == 2){ ?>
								<input type="text" class="form-control required" id="tinggi<?php echo $q ?>" name="tinggi<?php echo $q ?>" maxlength="255" required>
								<?php } ?>
							</td>
						</tr>
						<?php
							$c++;
							$q++;
							}
						}
						?>
						<?php
							$d=$c;
							$r=1;
							if(!empty($cek3))
							{
								foreach($cek3 as $record)
								{
						?>
						<tr>
							
							<td width="50%"><?php echo $record->question ?></td>
							<td width="45%">
								<?php if($record->answer_type == 1){ ?>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $r ?>" value="1" required >YA</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $r ?>" value="2">TIDAK</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $r ?>" value="3">TIDAK PERLU</label>
								<?php } ?>
								<?php if($record->answer_type == 2){ ?>
								<input type="text" class="form-control required" id="tinggi<?php echo $r ?>" name="tinggi<?php echo $r ?>" maxlength="255" required>
								<?php } ?>
							</td>
						</tr>
						<?php
							$d++;
							$r++;
							}
						}
						?>
						<?php
							$e=$d;
							$s=1;
							if(!empty($cek4))
							{
								foreach($cek4 as $record)
								{
						?>
						<tr>
							
							<td width="50%"><?php echo $record->question ?></td>
							<td width="45%">
								<?php if($record->answer_type == 1){ ?>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $s ?>" value="1" required >YA</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $s ?>" value="2">TIDAK</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $s ?>" value="3">TIDAK PERLU</label>
								<?php } ?>
								<?php if($record->answer_type == 2){ ?>
								<input type="text" class="form-control required" id="tinggi<?php echo $s ?>" name="tinggi<?php echo $s ?>" maxlength="255" required>
								<?php } ?>
							</td>
						</tr>
						<?php
							$e++;
							$s++;
							}
						}
						?>
						<?php
							$f=$e;
							$t=1;
							if(!empty($cek5))
							{
								foreach($cek5 as $record)
								{
						?>
						<tr>
							
							<td width="50%"><?php echo $record->question ?></td>
							<td width="45%">
								<?php if($record->answer_type == 1){ ?>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $t ?>" value="1" required >YA</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $t ?>" value="2">TIDAK</label>
								<label class="radio-inline"><input type="radio" name="tinggi<?php echo $t ?>" value="3">TIDAK PERLU</label>
								<?php } ?>
								<?php if($record->answer_type == 2){ ?>
								<input type="text" class="form-control required" id="tinggi<?php echo $t ?>" name="tinggi<?php echo $t ?>" maxlength="255" required>
								<?php } ?>
							</td>
						</tr>
						<?php
							$f++;
							$t++;
							}
						}
						?>
					</table>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="username" name="username" required />
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password" required />
				</div>
				<div class="row">
					<div class="col-xs-12">
						<input type="hidden" name="id" value="<?php echo $jsa->id?>" />
						<input type="submit" class="btn btn-success btn-block btn-flat" value="Close" />
					</div>
				</div>
				</form>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>