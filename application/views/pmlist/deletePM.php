<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Delete <?php echo $code; ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>Delete</b><br>PM Form</a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">
					<?php echo $code; ?>
					<br>
					<?php
						if($tag == 1){echo 'Electrical';}
						if($tag == 2){echo 'Mechanical';}
						if($tag == 3){echo 'Production';}
					?>
					<br>
					<?php
						if($freq == 1){echo 'Weekly';}
						if($freq == 2){echo 'Monthly';}
					?>
				</p>
				<a class="btn btn-danger btn-block" href="<?php echo base_url();?>deldoc_exe/<?php echo $code.'/'.$freq.'/'.$tag; ?>">Delete!</a>
				<a class="btn btn-primary btn-block" href="<?php echo base_url();?>checkdoc">BACK</a>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>