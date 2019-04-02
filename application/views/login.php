<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>AutomatedRAWR | SLCI System Log in</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<h1><b>SLCI</b><br><small>Automated<b>RAWR</b> Login</small></h1>
			</div>
			<div class="login-box-body">
				<p class="login-box-msg">Sign In</p>
				<?php $this->load->helper('form'); ?>
				<div class="row">
					<div class="col-md-12">
						<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
					</div>
				</div>
			<?php
				$this->load->helper('form');
				$error = $this->session->flashdata('error');
				if($error){
			?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<?php echo $error; ?>
				</div>
			<?php }
				$success = $this->session->flashdata('success');
				if($success){
			?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $success; ?>
				</div>
			<?php } ?>
				<form action="<?php echo base_url(); ?>loginMe" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="username" name="username" required />
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password" required />
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<div class="col-xs-4">
						<input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
					</div>
				</div>
				</form>
			</div>
		</div>
		
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>