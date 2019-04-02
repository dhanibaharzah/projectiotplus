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
				<a href="#"><b>[<?php echo $code; ?>]</b><br><small><?php echo $devdet->size; ?></small></a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">
					<b>Last Inspection: </b> <?php if(!empty($lastmainten)){echo date('d-m-Y', $lastmainten->unixtime);}else{echo 'no data';}?><br>
					<b>Installed since: </b> <?php if(!empty($lastinstall)){echo date('d-m-Y', $lastinstall->unixtime);}else{echo 'no data';}?><br>
					<b>Last Test: </b> </b> <?php if(!empty($lasttest)){echo $lasttest->timestamp;}else{echo 'no data';}?><br>
					<b>Pos: </b> <?php echo $devicedetail->pos.'/'.$devicedetail->usage; ?> 
				</p>
				<a class="btn btn-success btn-block" href="<?php echo base_url();?>devmainten/<?php echo $code; ?>"><i class="fa fa-wrench"></i> Maintenance</a>
				<a class="btn btn-info btn-block" href="<?php echo base_url();?>devlockset/<?php echo $code; ?>"><i class="fa fa-arrows"></i> Position Setting</a>
				<a class="btn btn-danger btn-block" href="<?php echo base_url();?>devreplace/<?php echo $code; ?>"><i class="fa fa-random"></i> Replace</a>
				<?php if(!empty($test_code)){?>
				<a class="btn btn-primary btn-block" href="<?php echo base_url();?>devpertest/<?php echo $code; ?>"><i class="fa fa-list"></i> Performance Test</a>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-danger btn-block" href="<?php echo base_url();?>addabn/<?php echo $code; ?>/2">Abnormallity Report</a>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>