<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $code; ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="<?php echo base_url().'devcode/'.$code;?>"><b>[<?php echo $code; ?>]</b><br><small>Maintenance</small></a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<?php 
					$nowtime = date('U'); 
					$nowtime = ($nowtime - ($nowtime % 86400)) / 86400;
				?>
				<?php if(!empty($parameter->note16)){?>
					<b>1. <?php echo $parameter->note16.',</b> '.$parameter->rep1.' days'; ?><br>
						Last: <?php 
						if(!empty($p1)){
							echo date('d-m-Y', $p1->unixtime);
							$rem1 = ((($p1->unixtime - ($p1->unixtime % 86400)) / 86400) + $parameter->rep1) - $nowtime;
							echo ',<b> '.$rem1.'</b> days remain';
						}else{echo 'no data, please update';}?><br>
				<?php } ?>
				<?php if(!empty($parameter->note17)){?>
					<b>2. <?php echo $parameter->note17.',</b> '.$parameter->rep2.' days'; ?><br>
						Last: <?php 
						if(!empty($p2)){
							echo date('d-m-Y', $p2->unixtime);
							$rem2 = ((($p2->unixtime - ($p2->unixtime % 86400)) / 86400) + $parameter->rep2) - $nowtime;
							echo ',<b> '.$rem2.'</b> days remain';
						}else{echo 'no data, please update';}?><br>
				<?php } ?>
				<?php if(!empty($parameter->note18)){?>
					<b>3. <?php echo $parameter->note18.',</b> '.$parameter->rep3.' days'; ?><br>
						Last: <?php 
						if(!empty($p3)){
							echo date('d-m-Y', $p3->unixtime);
							$rem3 = ((($p3->unixtime - ($p3->unixtime % 86400)) / 86400) + $parameter->rep3) - $nowtime;
							echo ',<b> '.$rem3.'</b> days remain';
						}else{echo 'no data, please update';}?><br>
				<?php } ?>
				<?php if(!empty($parameter->note19)){?>
					<b>4. <?php echo $parameter->note19.',</b> '.$parameter->rep4.' days'; ?><br>
						Last: <?php 
						if(!empty($p4)){
							echo date('d-m-Y', $p4->unixtime);
							$rem4 = ((($p4->unixtime - ($p4->unixtime % 86400)) / 86400) + $parameter->rep4) - $nowtime;
							echo ',<b> '.$rem4.'</b> days remain';
						}else{echo 'no data, please update';}?><br>
				<?php } ?>
				<?php if(!empty($parameter->note20)){?>
					<b>5. <?php echo $parameter->note20.',</b> '.$parameter->rep5.' days'; ?>
						Last: <?php 
						if(!empty($p5)){
							echo date('d-m-Y', $p5->unixtime);
							$rem5 = ((($p5->unixtime - ($p5->unixtime % 86400)) / 86400) + $parameter->rep5) - $nowtime;
							echo ',<b> '.$rem5.'</b> days remain';
						}else{echo 'no data, please update';}?><br>
				<?php } ?>
				<br>
				<label>Activity: </label>
				<div class="form-group">
				<form role="form" id="adddevice" action="<?php echo base_url() ?>fdevmainten" method="post" role="form">
					<select name="activity" id="activity" class="form-control" required>
						<?php if(!empty($parameter->note16)){?>
						<option value="1"><?php echo $parameter->note16; ?></option>
						<?php } ?>
						<?php if(!empty($parameter->note17)){?>
						<option value="2"><?php echo $parameter->note17; ?></option>
						<?php } ?>
						<?php if(!empty($parameter->note18)){?>
						<option value="3"><?php echo $parameter->note18; ?></option>
						<?php } ?>
						<?php if(!empty($parameter->note19)){?>
						<option value="4"><?php echo $parameter->note19; ?></option>
						<?php } ?>
						<?php if(!empty($parameter->note20)){?>
						<option value="5"><?php echo $parameter->note20; ?></option>
						<?php } ?>
					</select>
					<label>Additional Note: </label>
					<textarea name="note" class="form-control" cols="4"></textarea>
					<label>PIC sign: </label>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="username" name="username" required />
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Password" name="password" required />
					</div>
					<div class="row">
						<div class="col-xs-12">
							<input type="hidden" name="code" id="code" value="<?php echo $code; ?>">
							<input type="hidden" name="part1" id="part1" value="<?php echo $parameter->note16; ?>">
							<input type="hidden" name="part2" id="part2" value="<?php echo $parameter->note17; ?>">
							<input type="hidden" name="part3" id="part3" value="<?php echo $parameter->note18; ?>">
							<input type="hidden" name="part4" id="part4" value="<?php echo $parameter->note19; ?>">
							<input type="hidden" name="part5" id="part5" value="<?php echo $parameter->note20; ?>">
							<input type="submit" class="btn btn-success btn-block btn-flat" value="Submit" />
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>