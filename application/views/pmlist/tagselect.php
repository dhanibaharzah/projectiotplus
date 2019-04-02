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
				<a href="#"><b>Select TAG</b><br>SLCI</a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">TAG <?php echo $code; ?></p>
				<?php if(!empty($elec)){?>
				<a class="btn btn-warning btn-block" href="<?php echo base_url();?>pmtag/<?php echo $code; ?>/1">Electrical</a>
				<?php } ?>
				<br>
				<?php if(!empty($mech)){?>
				<a class="btn btn-primary btn-block" href="<?php echo base_url();?>pmtag/<?php echo $code; ?>/2">Mechanical</a>
				<?php } ?>
				<br>
				<?php if(!empty($prod)){?>
				<a class="btn btn-success btn-block" href="<?php echo base_url();?>pmtag/<?php echo $code; ?>/3">Production</a>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-danger btn-block" href="<?php echo base_url();?>addabn/<?php echo $code; ?>/1">Abnormallity Report</a>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>