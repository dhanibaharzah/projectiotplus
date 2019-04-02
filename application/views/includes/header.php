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
	<body class="skin-<?php if($appmode == 0 or $appmode == 4 or $appmode == 6 or $appmode == 9000){echo 'blue';}else{echo 'red';} ?> sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
			<!-- Logo -->
				<a href="<?php echo base_url(); ?>" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>
					<?php if($appmode == 5){ echo 'SCG';}elseif($appmode == 9000){echo 'R';}else{?>SL<?php } ?></b>
					<?php if($appmode == 5){ echo '';}elseif($appmode == 9000){echo 'CM';}else{?>CI<?php } ?></span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>
					<?php if($appmode == 0){ echo 'MTN';}?>
					<?php if($appmode == 1){ echo 'Prod';}?>
					<?php if($appmode == 2){ echo 'Tool';}?>
					<?php if($appmode == 3){ echo 'HSE';}?>
					<?php if($appmode == 4){ echo 'IoT';}?>
					<?php if($appmode == 5){ echo 'SCG';}?>
					<?php if($appmode == 6){ echo 'SS';}?>
					<?php if($appmode == 7){ echo 'Store';}?>
					<?php if($appmode == 9000){ echo 'Rajawali';}?>
					</b>
					<?php if($appmode == 5){ echo 'CBM';}
					elseif($appmode == 9000){ echo 'Citra Mandiri';}else{?>
					SLCI
					<?php } ?>
					</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<?php if($appmode == 0){ ?>
							<li class="dropdown notifications-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-flag-o"></i><span class="label label-danger notifa">-</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header"> You have <span class="notifa">-</span> Approval Request</li>
									<li>
										<ul class="menu">
											<li>
												<a href="<?php echo base_url(); ?>closeproject"><i class="fa fa-calendar text-aqua"></i> Project Closing : <span class="notif1">-</span> project(s)</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>docapproval"><i class="fa fa-calendar text-aqua"></i> Project Approval : <span class="notif2">-</span> project(s)</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>pmsheet_app"><i class="fa fa-refresh text-green"></i> Abnormality PM : <span class="notif3">-</span> sheet(s)</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>testsheet_app"><i class="fa fa-tags text-yellow"></i> Device Approval : <span class="notif4">-</span> sheet(s)</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>mtnappreq"><i class="fa fa-book text-red"></i> Log Book Approval: <span class="notif5">-</span> topic(s)</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="dropdown notifications-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-tasks"></i><span class="label label-danger notifb">-</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header"> You have <span class="notifb">-</span> Tasks</li>
									<li>
										<ul class="menu">
											<li>
												<a href="<?php echo base_url(); ?>myproject"><i class="fa fa-calendar text-aqua"></i> My Project List : <span class="notif6">-</span> project(s)</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>mypm"><i class="fa fa-refresh text-green"></i> My PM : <span class="notif7">-</span> sheet(s)</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>workshopdev"><i class="fa fa-tags text-yellow"></i> Device Repair : <span class="notif8">-</span> unit(s)</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>mytaskabnormallity"><i class="fa fa-warning text-red"></i> My Abnormality Job: <span class="notif9">-</span> job(s)</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<?php } ?>
							<?php if($vendorId < 100000){?>
							<li>
								<a href="#" data-toggle="control-sidebar"><i class="fa fa-exchange"></i></a>
							</li>
							<?php } ?>
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo base_url(); ?>assets/dist/img/user3.png" class="user-image" alt="User Image"/>
									<span class="hidden-xs"><?php echo $name; ?></span>
								</a>
								<ul class="dropdown-menu">
								<!-- User image -->
									<li class="user-header">
										<img src="<?php echo base_url(); ?>assets/dist/img/user3.png" class="img-circle" alt="User Image" />
										<p>
											<?php echo $name; ?>
											<small><?php 
											if($vendorId > 90000){echo 'SLCI Employee';}
											elseif($vendorId >= 40000 and $vendorId < 50000){echo 'Vendor Session';}
											elseif($vendorId >= 30000 and $vendorId < 40000){echo 'CBM Session';}
											else{echo 'Special Usage ID';} ?></small>
										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
										</div>
										<div class="pull-right">
											<a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
				<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu" data-widget="tree">
						<li class="treeview">
							<a href="<?php echo base_url(); ?>dashboard">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
					<?php if($appmode == 0){ ?> <!--START OF MAINTENANCE-->
						<li class="treeview">
							<a href="<?php echo base_url()?>mtn_actplan">
								<i class="fa fa-bookmark-o"></i>
								<span>Action Plan </span>
							</a>
						</li>
						<li class="treeview">
							<a href="#" >
								<i class="fa fa-warning "></i>
								<span>Abnormality Report <span class="label label-warning notif9">-</span><span class="label label-danger notif11">-</span></span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>abnormallity">
										<span>All Report <span class="label label-danger notif11">-</span></span>
									</a>
								</li><li class="treeview">
									<a href="<?php echo base_url(); ?>myabnormallity">
										<span>My Report</span>
									</a>
								</li><li class="treeview">
									<a href="<?php echo base_url(); ?>mytaskabnormallity">
										<span>My Task(s) <span class="label label-warning notif9">-</span></span>
									</a>
								</li>
							</ul>
						</li>
					<?php } ?> <!--END OF MAINTENANCE-->
						
						<?php if($appmode == 0){ ?> <!-- START OF MAINTENANCE SYSTEM MENU ========================================================================================================================== -->
						<li class="header">Project/Costum Job</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>myproject">
								<i class="fa fa-tags"></i>
								<span>My Project <span class="label label-success notif6">-</span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-calendar-o"></i>
								<span>Project Schedule </span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>projectjob">
										<span>Costum Job</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>projectalljob">
										<span>All Job</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>projectplan">
										<span>Plan Calender</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>projectapp">
										<span>Approved Calender</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>projectall">
										<span>All Calender</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<i class="fa fa-gears"></i>
							<span>Approval and Result <span class="label label-primary notif_h1">-</span></span>
						  </a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>docapproval">
										<span>Approval Documents <span class="label label-danger notif2">-</span></span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>closeproject">
										<span>Project Closing <span class="label label-danger notif1">-</span></span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>projectresult">
										<span>All Project Result</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>prjresultbypic">
										<span>Project Result by PIC</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>projectmanual">
										<span>User's Guide</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">PM Job</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>mypm">
								<i class="fa fa-tags"></i>
								<span>My PM <span class="label label-success notif7">-</span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
							<i class="fa fa-retweet"></i>
							<span>PM Schedule</span>
						  </a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmjob">
										<span>PM List</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmcall">
										<span>All Calender</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmtoday">
										<span>Today's Progress</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmqr">
										<span>QR code</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<i class="fa fa-gears"></i>
							<span>Approval and Result <span class="label label-primary notif3">-</span></span>
						  </a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>codedoc">
										<span>Document Coding</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>newdoc">
										<span>Create Document</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>checkdoc">
										<span>Document Check</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmrevival">
										<span>PM Code Revival</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmsheet_app">
										<span>Abnormality PM <span class="label label-danger notif3">-</span></span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmskipped">
										<span>Skipped PM</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmresult">
										<span>PM Result</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">Devices</li>
						<li class="treeview">
							<a href="#">
							<i class="fa fa-wrench"></i>
							<span>Devices <span class="label label-success notif10">-</span><span class="label label-danger notif8">-</span></span>
						  </a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>workshopdev" >
										<i class="fa fa-wrench"></i>
										<span>Workshop <span class="label label-success notif10">-</span><span class="label label-danger notif8">-</span></span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>alldev" >
										<i class="fa fa-list"></i>
										<span>All Devices</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<i class="fa fa-list"></i>
							<span>Approval and Result <span class="label label-primary notif4">-</span></span>
						  </a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>testsheet_app" >
										<span>Testsheet Approval <span class="label label-danger notif4">-</span></span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>alltestsheet_app" >
										<span>Testsheet History</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devtest" >
										<span>Performance Testsheet</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devqr2" >
										<span>QR Code</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<i class="fa fa-gear"></i>
								<span>Device Setting</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devmainclass" >
										<span>Main Class List</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devsubclass" >
										<span>Sub Class Sizing</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devparam" >
										<span>Device Parameter</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devposisi" >
										<span>Position List</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devusage" >
										<span>Usage List</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>deviden" >
										<span>Identification</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devrepair" >
										<span>Repair Default Selection</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>devpicsetting" >
										<span>Device Approval</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">Maintenance Log</li>
						<li class="treeview">
							<a href="#" >
								<i class="fa fa-refresh"></i>
								<span>Cycletime Log</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>ctlog" >
										<span>Cycletime Log</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>dtlog" >
										<span>Troubleshooting Log</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-book"></i>
								<span>Maintenance Guidance</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>prg_dt" >
										<span>Program</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>dwg_dt" >
										<span>Drawing and Standard</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>opr_dt" >
										<span>Operation Guidance</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>seq_dt" >
										<span>Machine Sequence</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>download_log" >
										<span>Download Log</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-wrench"></i>
								<span>Approval and Result <span class="label label-primary notif5">-</span></span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url();?>mtnappreq">
										<span>Approval Request <span class="label label-danger notif5">-</span></span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url();?>mymtnnotif">
										<span>My Notification</span>
									</a>
								</li>
							</ul>
						</li>
						<?php } ?> <!-- END OF MAINTENANCE SYSTEM MENU ============================================================================================================================================= -->
						
						
						<?php if($appmode == 1){ ?> <!-- START OF QC SYSTEM MENU =================================================================================================================================== -->
						<li class="header">Menu Header</li>
						<li class="treeview">
							<a href="#" >
								<i class="fa fa-refresh"></i>
								<span>Raw Material</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>rawcement" >
										<span>Incoming Cement</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>rawcementchart">
										<span>Cement Chart</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>rawlime">
										<span>Incoming Lime</span>
									</a>
								</li>
								<li class="treeview">
								<a href="<?php echo base_url(); ?>rawlimechart">
										<span>Lime Chart</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>rawsand">
										<span>Incoming Sand</span>
									</a>
								</li>
								<li class="treeview">
									<a href="#">
										<span>Send Chart</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#" >
								<i class="fa fa-refresh"></i>
								<span>Process Quality</span>
							</a>
							<ul class="treeview-menu">
								<li>	
									<a href="<?php echo base_url(); ?>viscosity" >
										<i class="fa fa-flask"></i>
										<span> Viscosity Return Slurry</span>
									</a>
								</li>
								<li class="treeview">
									<a href="#">
										<span>Submenu 2</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#" >
								<i class="fa fa-refresh"></i>
								<span>Product Quality</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="#">
										<span>Submenu 1</span>
									</a>
								</li>
								<li class="treeview">
									<a href="#">
										<span>Submenu 2</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">Boiler</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>boilerinput" >
								<i class="fa fa-list-alt"></i>
								<span>Boiler Input</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>boilerday" >
								<i class="fa fa-line-chart "></i>
								<span>Boiler Daily Data</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#" >
								<i class="fa fa-tint"></i>
								<span>Water Quality</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>wqacidity" >
										<span> Acidity</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>wqconductivity" >
										<span> Conductivity</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>wqturbidity" >
										<span> Turbidity</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>waterquality" >
										<span> Summary</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">Stock Control</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>stockmortar" >
								<i class="fa fa-sign-in"></i>
								<span> Stock In</span>
							</a>
						</li>
						<li>	
							<a href="<?php echo base_url(); ?>stockout" >
								<i class="fa fa-sign-out"></i>
								<span> Stock Out</span>
							</a>
						</li>
		
						<?php } ?> <!-- END OF QC SYSTEM MENU ====================================================================================================================================================== -->
						
						
						<?php if($appmode == 2){ ?> <!-- START OF TOOL SYSTEM MENU -->
						<li class="treeview">
							<a href="<?php echo base_url(); ?>rentaltool">
								<i class="fa fa-shopping-cart"></i>
								<span> Rental Tool</span>
							</a>
						</li>
						<li class="header">Invoices</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>newinvoice">
								<i class="fa fa-plus-circle"></i>
								<span> New Invoice </span><span class="label label-success jqnewinvoice"></span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>ongoinvoice">
								<i class="fa fa-arrow-circle-right"></i>
								<span> Ongoing Invoice </span><span class="label label-warning jqongoinvoice"></span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>errortool">
								<i class="fa fa-exclamation-circle"></i>
								<span> Broken Tools </span><span class="label label-danger jqbrokinvoice"></span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>allinvoice">
								<i class="fa fa-copy"></i>
								<span> All Invoice</span>
							</a>
						</li>
						<li class="header">Management</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-external-link-square"></i>
								<span> Tools Management </span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>alltool">
										<i class="fa fa-database"></i>
										<span> All Tools</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>pmform">
										<i class="fa fa-file"></i>
										<span> PM Form</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>toolpmset">
										<i class="fa fa-list"></i>
										<span> PM Setting</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>toolschedule">
										<i class="fa fa-calendar"></i>
										<span> PM Schedule</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>todayschedule">
										<i class="fa fa-tasks"></i>
										<span> Today's PM</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>toolresult">
										<i class="fa fa-check-square"></i>
										<span> PM Result</span>
									</a>
								</li>
							<?php if($role == ROLE_MANAGER){ ?>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>addtool">
										<i class="fa fa-plus-square"></i>
										<span> Add Tool</span>
									</a>
								</li>
							<?php } ?>
							</ul>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>reporttable">
								<i class="fa fa-bug"></i>
								<span> Report Table</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>alltrouble">
								<i class="fa fa-ban"></i>
								<span> Trouble History</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>trashtable">
								<i class="fa fa-trash"></i>
								<span> Trash</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>mainins">
								<i class="fa fa-question-circle"></i>
								<span>Manual Instruction</span>
							</a>
						</li>
						<?php } ?> <!-- END OF TOOL SYSTEM MENU -->
						
						<?php if($appmode == 3){ ?> <!--START OF HSE-->
						<li class="header">Work Permit</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>today_jsa">
								<i class="fa fa-calendar"></i>
								<span>Ongoing Permit <span class="badge bg-green notiftodayjsa">-</span> </span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>create_jsa">
								<i class="fa fa-plus-square"></i>
								<span>Create Permit </span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>myjsa">
								<i class="fa fa-adjust"></i>
								<span>My Permit <span class="badge bg-red notifmyjsa">-</span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>appjsa">
								<i class="fa fa-check-square-o"></i>
								<span>Requested Permit <span class="badge bg-blue notifappjsa">-</span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>closedjsa">
								<i class="fa fa-history"></i>
								<span>Permit History</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>hse_daily_summary">
								<i class="fa fa-book"></i>
								<span>Daily Summary</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>qrjsatoday">
								<i class="fa fa-search"></i>
								<span>Scan QR Permit</span>
							</a>
						</li>
						<li class="header">Vendor Access</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>vendorinduction">
								<i class="fa fa-users"></i>
								<span>Contractor List</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>submit_job">
								<i class="fa fa-sign-in"></i>
								<span>Submit Job</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>vendorlist">
								<i class="fa fa-list"></i>
								<span>Vendor List</span>
							</a>
						</li>
						<?php } ?> <!-- END OF HSE MENU -->
						
						
						<?php if($appmode == 4){ ?> <!--START OF IoT-->
						<li class="header">ALC Machine</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-cog"></i><span>Raw Material</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_ballmillov" >
										<span>Overview</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>ballrec/2" >
										<span>Ballmill Record</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_mat_table" >
										<span>Material Record</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_seal">
										<span>Water Sealing Record</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-cog"></i><span>[X]Mixing Plant</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver" >
										<span>[X]Overview</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver" >
										<span>[X]Alumunium Plant</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-cut"></i><span>Cutting Machine</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_cuttingwkb" >
										<span>Overview</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_refeeding" >
										<span>CB Refeeding</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_tilting1" >
										<span>Tilting 1</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_trolley" >
										<span>Trolley 1 & 2</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_crosscutter" >
										<span>Cross Cutter</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_tilting2" >
										<span>Tilting 2</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-cog"></i><span>[X]GSM</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver" >
										<span>[X]Overview</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver" >
										<span>[X]GSM</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-cubes"></i><span>[X]Packing & Unloading </span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>[X]Overview</span>
									</a>
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>[X]Pallet Chain Conveyors</span>
									</a>
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>[X]Grate Chain Conveyors</span>
									</a>
									<li class="treeview">
									<a href="<?php echo base_url(); ?>unload" >
										<span>Unloader Rail</span>
									</a>
								</li>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-fire"></i><span>Boiler & Autoclave </span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>boiler_rt">
										<span>Overview</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>boilerday" >
										<span>Boiler Daily Data</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>waterquality" >
										<span>Water Quality</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>boilerplc">
										<span>Boiler PLC Data</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>ac/1">
										<span>Autoclave History</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">Other Machine</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-gears"></i><span>Mortar</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>cement">
										<span>Cement</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>lime">
										<span>Lime</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>batch">
										<span>Batch</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">Result and Metering</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-history"></i><span>Running Meter</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_hour_boiler">
										<span>Boiler</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_hour_ballmill">
										<span>Ballmill</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-history"></i><span>Material Meter</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_hour_balmill_mat">
										<span>Ballmill</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-bolt"></i><span>Electricity</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_elec_ov">
										<span>Overview</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_solar_per">
										<span>Monthly Record</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_electrical_daily">
										<span>Daily Record</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_pv_record">
										<span>PV Record</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_pwr_record">
										<span>0.4kV Record</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>iot_sepam_record/2">
										<span>6kV Record</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-clock-o"></i><span>Cycletime</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>cycdaily">
										<span>Daily Data</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>cycmonthly">
										<span>Monthly Data</span>
									</a>
								</li>
							</ul>
						</li>
						<?php } ?> <!-- END OF IoT MENU -->
						
						<?php if($appmode == 5){ ?> <!--START OF CBM-->
						<li class="treeview">
							<a href="<?php echo base_url(); ?>cbm_allchart">
								<i class="fa fa-bar-chart-o"></i><span> All Chart</span>
							</a>
						</li>
						<li class="header">Volume Report</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>cbm_daily_rec">
								<i class="fa fa-calendar"></i><span> Daily Report</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>cbm_forecast">
								<i class="fa fa-check"></i><span> Forecast/Target</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>cbm_past_sales">
								<i class="fa fa-caret-square-o-left"></i><span> Last Year</span>
							</a>
						</li>
						<li class="header">SRMI Menu</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>srmi_input_data">
								<i class="fa fa-calendar"></i><span> Daily Report</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>excel_srmi">
								<i class="fa fa-upload"></i><span> Import Excel</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>srmi_all_chart">
								<i class="fa fa-line-chart"></i><span> Result Chart</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>srmi_all_chartv2">
								<i class="fa fa-line-chart"></i><span> Result Chart v2</span>
							</a>
						</li>
						<li class="header">Others</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>cbm_used_product">
								<i class="fa fa-gears"></i><span> Used Product</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>cbm_product_setting">
								<i class="fa fa-gears"></i><span> Product Setting</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>cbm_user_data">
								<i class="fa fa-users"></i><span> Users Setting</span>
							</a>
						</li>
						<?php } ?> <!-- END OF CBM MENU -->
						
						<?php if($appmode == 6){ ?> <!--START OF SS-->
						<li class="header">Personal Menu</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>ss_attendance">
								<i class="fa fa-calendar"></i><span> My Attendance</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-list"></i><span> My Schedule</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-folder-o"></i><span> My Request <span class="label label-primary">0</span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-send"></i><span> Request</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Overtime</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Permit</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Leave</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Shift exchange</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Travel</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Personal Equipment</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="header">Approval and Result</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-folder-o"></i><span> Approval Request <span class="label label-primary">0</span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-table"></i><span> Scheduling</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Schedule Mode 1</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Schedule Mode 2</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Schedule Mode 3</span>
									</a>
								</li>
								
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-calendar"></i><span> Attendance Detail</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Attendance List</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Attendance Problem</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-history"></i><span> Request History</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-warning"></i><span> Warning Letter <span class="label label-warning">0</span></span>
							</a>
						</li>
						<li class="header">Others</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-code-fork"></i><span> Staff Hierarchy</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-book"></i><span> Company Profile</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-users"></i><span> User Setting</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Active Users</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Deleted Users</span>
									</a>
								</li>
							</ul>
						</li>
						<?php } ?> <!-- END OF SS MENU -->
						
						<?php if($appmode == 7){ ?> <!--START OF STORE-->
						<li class="header">Request</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>sr_view">
								<i class="fa fa-shopping-cart"></i><span> Request Item</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-folder-o"></i><span> Request Approval <span class="label label-primary">4</span></span>
							</a>
						</li>
						<li class="header">Store Management</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-history"></i><span> Store History</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-file"></i><span> Cost Report</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Daily Report</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Monthly Report</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>demo_ver">
								<i class="fa fa-folder-o"></i><span> Re-stock Request <span class="label label-warning">3</span></span>
							</a>
						</li>
						<li class="header">Configuration</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-table"></i><span> Stock Setting</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>All Stock</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Add Stock</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-calendar"></i><span> Data Setting</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Item Classes</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Cost Classes</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>demo_ver">
										<span>Approval Route</span>
									</a>
								</li>
							</ul>
						</li>
						<?php } ?> <!-- END OF STORE MENU -->
						
						<?php if($appmode == 9000){ ?> <!--START OF RCM-->
						<li class="treeview">
							<a href="<?php echo base_url(); ?>memberlist">
								<i class="fa fa-users"></i><span> Anggota</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>x_workplacelist">
								<i class="fa fa-bank"></i><span> Perusahaan</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>transaksi_rcm">
								<i class="fa fa-exchange"></i><span> Transaksi</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>kasbon">
								<i class="fa fa-dollar"></i><span> Kasbon</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-folder-o"></i><span> Laporan</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="<?php echo base_url(); ?>rep_pinjaman">
										<span> Pinjaman</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>rep_kasbon">
										<span> Kasbon</span>
									</a>
								</li>
								<li class="treeview">
									<a href="<?php echo base_url(); ?>rep_cash_flow">
										<span> Cash Flow</span>
									</a>
								</li>
							</ul>
						</li>
						<?php } ?> <!-- END OF RCM MENU -->
						
						<?php if($appmode == 2){ ?> <!--START OF TOOL-->
						<?php if($usertype == 20){ ?>
						<li class="header">Others</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>userListing">
								<i class="fa fa-users"></i>
								<span>Users</span>
							</a>
						</li>
						<li class="treeview">
							<a href="<?php echo base_url(); ?>setting">
								<i class="fa fa-wrench"></i>
								<span>Setting</span>
							</a>
						</li>
						<?php } ?>
						<?php } ?> <!--END OF TOOL-->
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<aside class="control-sidebar control-sidebar-dark">
				<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
					<li>
						<a href="#control-sidebar-theme-demo-options-tab" data-toggle="tab">
							<i class="fa fa-level-up"></i>
						</a>
					</li>
					
					<li class="active">
						<a href="#control-sidebar-home-tab" data-toggle="tab">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li>
						<a href="#control-sidebar-settings-tab" data-toggle="tab">
							<i class="fa fa-gears"></i>
						</a>
					</li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="control-sidebar-home-tab">
						<ul class="control-sidebar-menu">
					<?php if($vendorId < 50000){?>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-lock bg-blue"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Maintenance System</h4>
										<p>SLCI employee only</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-lock bg-yellow"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Rental Tool</h4>
										<p>SLCI employee only</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-lock bg-red"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">HSE</h4>
										<p>SLCI employee only</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-lock bg-green"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">IoT</h4>
										<p>SLCI employee only</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-lock bg-red"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Production</h4>
										<p>SLCI employee only</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-coffee bg-blue"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Self Services</h4>
										<p>SLCI employee only</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon bg-gray text-red">SCG</i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">CBM Indonesia</h4>
										<p>Volume Report</p>
									</div>
								</a>
							</li>
					<?php }elseif($usertype != 20 and $vendorId > 90000 and $vendorId != 91000){?>
							<li>
								<a href="<?php echo base_url().'appmode/0';?>">
									<i class="menu-icon fa fa-calendar bg-blue"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Maintenance System</h4>
										<p>Project + PM scheduler and Machine's data</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/2';?>">
									<i class="menu-icon fa fa-wrench bg-yellow"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Rental Tool</h4>
										<p>Rent and tool management</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/3';?>">
									<i class="menu-icon fa fa-fire-extinguisher bg-red"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">HSE</h4>
										<p>JSA and Work permit</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/4';?>">
									<i class="menu-icon fa fa-signal bg-green"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">IoT</h4>
										<p>Show processed PLC's data and things</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/1';?>">
									<i class="menu-icon fa fa-support bg-red"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Production</h4>
										<p>Basically, only manual form</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/6';?>">
									<i class="menu-icon fa fa-coffee bg-blue"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Self Services(X)</h4>
										<p>Employee self service</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>rawr_guide_book">
									<h4 class="control-sidebar-subheading">Application Reference<br>
										<small>Detailed features and operational guide</small>
									</h4>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/5';?>">
									<i class="menu-icon bg-gray text-red">SCG</i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">CBM Indonesia</h4>
										<p>Volume Report</p>
									</div>
								</a>
							</li>
					<?php }elseif($usertype != 20 and $vendorId > 90000 and $vendorId == 91000){?>
							<li>
								<a href="<?php echo base_url().'appmode/4';?>">
									<i class="menu-icon bg-green">IoT</i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">IoT</h4>
										<p>Show processed PLC's data and things</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/0';?>">
									<i class="menu-icon fa fa-calendar bg-blue"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Maintenance System</h4>
										<p>Project + PM scheduler and Machine's data</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/2';?>">
									<i class="menu-icon fa fa-wrench bg-yellow"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Rental Tool</h4>
										<p>Rent and tool management</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/7';?>">
									<i class="menu-icon fa fa-cubes bg-red"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Store</h4>
										<p>Items Request and Stock control</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/3';?>">
									<i class="menu-icon bg-green">HSE</i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">HSE</h4>
										<p>JSA and Work permit</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/1';?>">
									<i class="menu-icon fa fa-support bg-red"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Production</h4>
										<p>Basically, only manual form</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/6';?>">
									<i class="menu-icon fa fa-coffee bg-blue"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Self Services</h4>
										<p>Employee self service</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon bg-gray text-red">File</i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">File Hosting</h4>
										<p>upload/download and interlock</p>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>rawr_guide_book">
									<h4 class="control-sidebar-subheading">Application Reference<br>
										<small>Detailed features and operational guide</small>
									</h4>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url().'appmode/5';?>">
									<i class="menu-icon bg-gray text-red">SCG</i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">CBM Indonesia</h4>
										<p>Volume Report</p>
									</div>
								</a>
							</li>
					<?php } ?>
					
						</ul>
					</div>
					<div id="control-sidebar-theme-demo-options-tab" class="tab-pane">
					<?php if($vendorId < 50000){?>
						<ul class="control-sidebar-menu">
							<li>
								<a href="#">
									<h4 class="control-sidebar-subheading">CBM Sales Volume<br>
										<small>V1.0 BETA</small>
									</h4>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-lock bg-success"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Update Log</h4>
										<p>Server Update Log</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon fa fa-lock bg-primary"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">User Log</h4>
										<p>User logging data</p>
									</div>
								</a>
							</li>
						</ul>
					<?php }elseif($usertype != 20 and $vendorId > 90000){?>
						<ul class="control-sidebar-menu" id="server_update"></ul>
						<ul class="control-sidebar-menu">
							<li>
								<a href="<?php echo base_url().'userlog';?>">
									<i class="menu-icon fa fa-users bg-primary"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">User Log</h4>
										<p>User logging data</p>
									</div>
								</a>
							</li>
							<li class="getbugpersen">
								
							</li>
						</ul>
					<?php } ?>
					</div>
					<div class="tab-pane" id="control-sidebar-settings-tab">
						<ul class="control-sidebar-menu">
					<?php if($vendorId >= 40000 and $vendorId < 50000){?>
							<li>
								<a href="#">
									<h4 class="control-sidebar-subheading"><i class="fa fa-lock"></i> LINE Notification<br>
										<small>Enable/Disable LINE chat bot</small>
									</h4>
								</a>
							</li>
							<li>
								<a href="#" >
									<h4 class="control-sidebar-subheading"><i class="fa fa-lock"></i> Logo Setting<br>
										<small>Logo shown on PM doc</small></h4>
								</a>
							</li>
					<?php }elseif($usertype != 20 and ($vendorId > 90000 or ($vendorId >= 30000 and $vendorId < 40000))){?>
							
							<li>
								<a href="<?php echo base_url(); ?>rawr">
									<h4 class="control-sidebar-subheading">LINE Notification<br>
										<small>Enable/Disable LINE chat bot</small>
									</h4>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>logosetting" >
									<h4 class="control-sidebar-subheading">Logo Setting<br>
										<small>Logo shown on PM doc</small></h4>
								</a>
							</li>
							
						<?php if($appmode == 0){ ?> <!--START OF MAINTENANCE-->
							<li>
								<a href="<?php echo base_url(); ?>projectapproval">
									<h4 class="control-sidebar-subheading">Approval Setting<br>
										<small>Maintenance App Approval</small></h4>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>picsetting">
									<h4 class="control-sidebar-subheading">PM PIC Setting<br>
										<small>PM PIC mode</small></h4>
								</a>
							</li>
						<?php } ?> <!--END OF MAINTENANCE-->
						<?php if($appmode == 3){ ?> <!--START OF HSE-->
							<li>
								<a href="<?php echo base_url(); ?>user_set">
									<h4 class="control-sidebar-subheading">User's Role Setting<br>
										<small>Define user's role as approval route</small></h4>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>Area">
									<h4 class="control-sidebar-subheading">PIC Area Setting<br>
										<small>Define PIC of every Area, define 3rd approval route</small></h4>
								</a>
							</li>
						<?php } ?> <!--END OF HSE-->
						<?php if($appmode == 1){?> <!--PROD Setting-->
							<li>
								<a href="<?php echo base_url();?>appset" >
									<h4 class="control-sidebar-subheading">Approval Setting<br>
										<small>Production App Approval</small>
									</h4>
								</a>	
							</li>
						<?php } ?> <!--END OF PROD-->
						<?php if($appmode == 4){?> <!--IoT Setting-->
							<li>
								<a href="<?php echo base_url();?>iot_cycsetting" >
									<h4 class="control-sidebar-subheading">Cycletime Setting<br>
										<small>Setting parameter of auto calculator</small>
									</h4>
								</a>	
							</li>
						<?php } ?> <!--END OF IoT-->
						<?php if($appmode == 6){ ?> <!--START OF SELF SERVICE-->
							<li>
								<a href="<?php echo base_url();?>ss_upload_xlsx" >
									<h4 class="control-sidebar-subheading">Upload Data<br>
										<small>Upload attendance data</small>
									</h4>
								</a>	
							</li>
						<?php } ?> <!--END OF SELF SERVICE-->
					<?php } ?>
						</ul>
					<?php if($appmode == 3){ ?> <!--START OF HSE-->
						<div>
							<h4 class="control-sidebar-heading">Data Config</h4>
							<ul class="list-unstyled clearfix">
								<li style="float:left; width: 33.33333%; padding: 5px;">
									<a href="<?php echo base_url(); ?>APD" class="clearfix full-opacity-hover text-center">
										<div class="text-gray">
											<i class="fa fa-user-md fa-2x text-gray"></i><br>APD
										</div>
									</a>
								</li>
								<li style="float:left; width: 33.33333%; padding: 5px;">
									<a href="<?php echo base_url(); ?>Energy" class="clearfix full-opacity-hover text-center">
										<div class="text-gray">
											<i class="fa fa-bolt fa-2x text-gray"></i><br>Energy
										</div>
									</a>
								</li>
								<li style="float:left; width: 33.33333%; padding: 5px;">
									<a href="<?php echo base_url(); ?>Funct" class="clearfix full-opacity-hover text-center">
										<div class="text-gray">
											<i class="fa fa-list-alt fa-2x text-gray"></i><br>Function
										</div>
									</a>
								</li>
								<li style="float:left; width: 33.33333%; padding: 5px;">
									<a href="<?php echo base_url(); ?>Loto" class="clearfix full-opacity-hover text-center">
										<div class="text-gray">
											<i class="fa fa-lock fa-2x text-gray"></i><br>LOTO
										</div>
									</a>
								</li>
								<li style="float:left; width: 33.33333%; padding: 5px;">
									<a href="<?php echo base_url(); ?>Override" class="clearfix full-opacity-hover text-center">
										<div class="text-gray">
											<i class="fa fa-unlink fa-2x text-gray"></i><br>Override
										</div>
									</a>
								</li>
								<li style="float:left; width: 33.33333%; padding: 5px;">
									<a href="<?php echo base_url(); ?>Tool" class="clearfix full-opacity-hover text-center">
										<div class="text-gray">
											<i class="fa fa-wrench fa-2x text-gray"></i><br>Tool
										</div>
									</a>
								</li>
								
							</ul>
						</div>
					<?php } ?> <!--END OF HSE-->
					</div>
				</div>
			</aside>
			
