<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Close Job</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>Close Project Job (PIC)</b><br>SLCI</a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<form action="<?php echo base_url(); ?>closepic_session" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="username" name="username" required />
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password" required />
				</div>
				<div class="row">
					<div class="col-xs-12">
						<input type="hidden" name="id" value="<?php echo $id?>" />
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