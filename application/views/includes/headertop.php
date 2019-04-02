<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pageTitle; ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Bootstrap 3.3.4 -->
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- FontAwesome 4.3.0 -->
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/jvector.min.css" rel="stylesheet" type="text/css" />
		<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
		<style>
			.error{
				color:red;
				font-weight: normal;
			}
		</style>
		<!-- jQuery 2.1.4 -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
			var baseURL = "<?php echo base_url(); ?>";
		</script>
		
		<script src="<?php echo base_url(); ?>assets/highchart/highcharts.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/gantt_modules/gantt.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/highcharts-more.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/exporting.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/export-data.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/offline-exporting.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/bullet.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/solid-gauge.js"></script>
		<script src="<?php echo base_url(); ?>assets/highchart/series-label.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/daterangepicker/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/gauge2/gauge.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  <header class="main-header">
	<nav class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo base_url(); ?>" class="navbar-brand"><b>Automated</b>RAWR</a>
			</div>
		</div>
	</nav>
  </header>