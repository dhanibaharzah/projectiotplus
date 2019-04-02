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
				<a href="#"><b>Select Frequency</b><br>SLCI</a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg"><?php echo $code; ?></p>
				<?php if(!empty($week)){?>
				<a class="btn btn-warning btn-block" href="<?php echo base_url();?>pmsheet/<?php echo $code; ?>/1/<?php echo $tag; ?>">Weekly</a>
				<?php } ?>
				<br>
				<?php if(!empty($mont)){?>
				<a class="btn btn-primary btn-block" href="<?php echo base_url();?>pmsheet/<?php echo $code; ?>/2/<?php echo $tag; ?>">Monthly</a>
				<?php } ?>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>