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
				<a href="<?php echo base_url().'devcode/'.$code;?>"><b>[<?php echo $code; ?>]</b><br><small>Replacement</small></a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<label>Posisi:</label> <?php if(!empty($devicedetail)){echo $devicedetail->posisi; }?><br>
				<label>Usage:</label> <?php if(!empty($devicedetail)){echo $devicedetail->usage; }?>
				<div class="form-group">
				<form role="form" id="adddevice" action="<?php echo base_url() ?>fdevreplace" method="post" role="form">
					<label>Replace with: </label>
					<select name="newdev" id="newdev" class="form-control" required>
						<option value=""></option>
						<?php
							if(!empty($newdev)){
								foreach($newdev as $dev){
						?>
							<option value="<?php echo $dev->code; ?>" ><?php echo $dev->code; ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
				<div class="form-group">
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
							<input type="hidden" name="posisi" id="posisi" value="<?php if(!empty($devicedetail)){echo $devicedetail->posisi; }?>">
							<input type="hidden" name="usage" id="usage" value="<?php if(!empty($devicedetail)){echo $devicedetail->usage; }?>">
							<input type="submit" class="btn btn-success btn-block btn-flat" value="Submit" />
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
		<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#newdev").select2({
					placeholder: "Select Device"
				});
			});
		</script>
	</body>
</html>