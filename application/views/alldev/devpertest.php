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
				<a href="#"><b>[<?php echo $code; ?>]</b><br><small>Test Sheet Selection</small></a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
			<?php
				if(!empty($test_list)){
					foreach($test_list as $list){
			?>
						<a class="btn btn-primary btn-block" href="<?php echo base_url();?>devpertestin/<?php echo $list->id.'/'.$code; ?>"><?php echo $list->test_title; ?></a>
			<?php
					}
				}
			?>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>