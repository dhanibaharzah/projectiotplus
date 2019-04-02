<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HSE Pengukuran Gas</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="login-page">
		<div class="box">
			<div class="box-body">
			<p class="login-box-msg"><b>Pengukuran Gas</b></p>
			<form action="<?php echo base_url(); ?>gas_session" method="post">
				<div class="form-group has-feedback">
					<label>H2S (<10ppm):</label>
					<input type="number" class="form-control" placeholder="H2S" name="h2s" required />
					<label>LEL  (<10%):</label>
					<input type="number" class="form-control" placeholder="LEL" name="lel" required />
					<label>CO (<35ppm):</label>
					<input type="number" class="form-control" placeholder="CO" name="co" required />
					<label>O2 (19,5% - 23,5%):</label>
					<input type="number" class="form-control" placeholder="O2" name="o2" step="0.1" required />
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
						<input type="hidden" name="id" value="<?php echo $id?>" />
						<input type="hidden" name="jsa_id" value="<?php echo $jsa_id?>" />
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
