<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Autoclaves
			<small> realtime monitor</small>
		</h1>
	</section>
    
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="col-lg-3 col-xs-12">
							<strong>TFAC Outlet</strong><br>
							Main Drive: 
							<span id="tfacout_md_1" class="label label-success">Enabled <i class="fa fa-check"></i></span>
							<span id="tfacout_md_2" class="label label-primary">Forward <i class="fa fa-check"></i></span>
							<span id="tfacout_md_3" class="label label-primary">Reverse <i class="fa fa-check"></i></span>
							
							<span id="tfacout_md_6" class="label label-danger">Fault <i class="fa fa-ban"></i></span>
							<span id="tfacout_md_5" class="label label-success">INVT Call <i class="fa fa-check"></i></span>
							<br>Bridge: 
							<span id="tfacout_br_1" class="label label-success">Enabled <i class="fa fa-check"></i></span>
							<span id="tfacout_br_2" class="label label-success">INVT Call <i class="fa fa-check"></i></span>
							<span id="tfacout_br_3" class="label label-danger">Fault <i class="fa fa-ban"></i></span>
							<br>Sling pusher: 
							<span id="tfacout_sp_1" class="label label-success">Enabled <i class="fa fa-check"></i></span>
							<span id="tfacout_sp_2" class="label label-success">INVT Call <i class="fa fa-check"></i></span>
							<span id="tfacout_sp_3" class="label label-danger">Fault <i class="fa fa-ban"></i></span>
						</div>
						<div class="col-lg-3 col-xs-12">
							<h4>Palm Kernel Level: <span id="palm">Checking!</span> %</h4>
							<h4>Deaerator Level: <span id="dea">Checking!</span> %</h4>
						</div>
						<div class="col-lg-3 col-xs-12">
							<h4>Before Economizer: <span id="before">Checking!</span> &deg C</h4>
							<h4>After Economizer: <span id="after">Checking!</span> &deg C</h4>
						</div>
						<div class="col-lg-3 col-xs-12">
							<strong>TFAC Inlet</strong><br>
							Main Drive: 
							<span id="tfacin_md_1" class="label label-success">Enabled <i class="fa fa-check"></i></span>
							<span id="tfacin_md_2" class="label label-primary">Forward <i class="fa fa-check"></i></span>
							<span id="tfacin_md_3" class="label label-primary">Reverse <i class="fa fa-check"></i></span>
							
							<span id="tfacin_md_6" class="label label-danger">Fault <i class="fa fa-ban"></i></span>
							<span id="tfacin_md_5" class="label label-success">INVT Call <i class="fa fa-check"></i></span>
							<br>Bridge: 
							<span id="tfacin_br_1" class="label label-success">Enabled <i class="fa fa-check"></i></span>
							<span id="tfacin_br_2" class="label label-success">INVT Call <i class="fa fa-check"></i></span>
							<span id="tfacin_br_3" class="label label-danger">Fault <i class="fa fa-ban"></i></span>
							<br>Sling pusher: 
							<span id="tfacin_sp_1" class="label label-success">Enabled <i class="fa fa-check"></i></span>
							<span id="tfacin_sp_2" class="label label-success">INVT Call <i class="fa fa-check"></i></span>
							<span id="tfacin_sp_3" class="label label-danger">Fault <i class="fa fa-ban"></i></span>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout8">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout81">x</span>
							<span class="label label-info"    id="tfacout82">x</span>
							<span class="label label-danger"  id="tfacout83">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 8
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 8 
							<span id="ac8_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac8_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac8_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac8_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac8_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac8_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac8_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac8_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac8_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac8_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac8_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac8_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac8_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise8"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum8"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac8_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac8_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac8_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac8_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_8on" class="label label-success">Opened</span><span id="drain_8off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_8on" class="label label-success">Touched</span><span id="probe_8off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_8on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_8off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_8on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_8off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin8">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin81">x</span>
							<span class="label label-info"    id="tfacin82">x</span>
							<span class="label label-danger"  id="tfacin83">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 8
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout7">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout71">x</span>
							<span class="label label-info"    id="tfacout72">x</span>
							<span class="label label-danger"  id="tfacout73">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 7
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 7 
							<span id="ac7_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac7_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac7_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac7_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac7_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac7_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac7_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac7_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac7_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac7_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac7_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac7_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac7_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise7"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum7"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac7_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac7_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac7_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac7_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_7on" class="label label-success">Opened</span><span id="drain_7off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_7on" class="label label-success">Touched</span><span id="probe_7off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_7on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_7off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_7on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_7off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin7">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin71">x</span>
							<span class="label label-info"    id="tfacin72">x</span>
							<span class="label label-danger"  id="tfacin73">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 7
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout6">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout61">x</span>
							<span class="label label-info"    id="tfacout62">x</span>
							<span class="label label-danger"  id="tfacout63">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 6
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 6 
							<span id="ac6_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac6_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac6_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac6_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac6_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac6_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac6_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac6_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac6_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac6_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac6_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac6_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac6_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise6"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum6"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac6_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac6_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac6_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac6_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_6on" class="label label-success">Opened</span><span id="drain_6off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_6on" class="label label-success">Touched</span><span id="probe_6off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_6on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_6off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_6on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_6off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin6">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin61">x</span>
							<span class="label label-info"    id="tfacin62">x</span>
							<span class="label label-danger"  id="tfacin63">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 6
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout5">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout51">x</span>
							<span class="label label-info"    id="tfacout52">x</span>
							<span class="label label-danger"  id="tfacout53">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 5
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 5 
							<span id="ac5_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac5_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac5_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac5_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac5_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac5_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac5_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac5_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac5_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac5_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac5_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac5_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac5_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise5"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum5"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac5_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac5_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac5_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac5_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_5on" class="label label-success">Opened</span><span id="drain_5off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_5on" class="label label-success">Touched</span><span id="probe_5off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_5on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_5off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_5on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_5off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin5">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin51">x</span>
							<span class="label label-info"    id="tfacin52">x</span>
							<span class="label label-danger"  id="tfacin53">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 5
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout4">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout41">x</span>
							<span class="label label-info"    id="tfacout42">x</span>
							<span class="label label-danger"  id="tfacout43">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 4
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 4 
							<span id="ac4_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac4_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac4_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac4_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac4_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac4_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac4_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac4_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac4_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac4_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac4_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac4_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac4_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise4"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum4"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac4_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac4_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac4_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac4_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_4on" class="label label-success">Opened</span><span id="drain_4off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_4on" class="label label-success">Touched</span><span id="probe_4off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_4on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_4off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_4on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_4off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin4">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin41">x</span>
							<span class="label label-info"    id="tfacin42">x</span>
							<span class="label label-danger"  id="tfacin43">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 4
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout3">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout31">x</span>
							<span class="label label-info"    id="tfacout32">x</span>
							<span class="label label-danger"  id="tfacout33">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 3
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 3 
							<span id="ac3_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac3_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac3_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac3_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac3_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac3_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac3_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac3_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac3_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac3_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac3_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac3_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac3_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise3"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum3"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac3_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac3_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac3_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac3_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_3on" class="label label-success">Opened</span><span id="drain_3off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_3on" class="label label-success">Touched</span><span id="probe_3off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_3on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_3off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_3on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_3off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin3">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin31">x</span>
							<span class="label label-info"    id="tfacin32">x</span>
							<span class="label label-danger"  id="tfacin33">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 3
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout2">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout21">x</span>
							<span class="label label-info"    id="tfacout22">x</span>
							<span class="label label-danger"  id="tfacout23">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 2
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 2 
							<span id="ac2_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac2_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac2_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac2_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac2_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac2_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac2_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac2_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac2_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac2_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac2_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac2_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac2_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise2"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum2"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac2_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac2_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac2_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac2_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_2on" class="label label-success">Opened</span><span id="drain_2off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_2on" class="label label-success">Touched</span><span id="probe_2off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_2on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_2off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_2on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_2off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin2">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin21">x</span>
							<span class="label label-info"    id="tfacin22">x</span>
							<span class="label label-danger"  id="tfacin23">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 2
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacout1">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacout11">x</span>
							<span class="label label-info"    id="tfacout12">x</span>
							<span class="label label-danger"  id="tfacout13">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail 1
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 1 
							<span id="ac1_0" class="label label-default">New Session</span> <!--'blm terdeteksi'-->
							<span id="ac1_1" class="label label-default">Idle</span><!--'abis blowoff'-->
							<span id="ac1_2" class="label label-success">Vacuming</span> <!--'lagi vakum'-->
							<span id="ac1_3" class="label label-success">Vacum Finish</span> <!--'udah vakum'-->
							<span id="ac1_4" class="label label-primary">Transfering OUT</span> <!--'transfering OUT'-->
							<span id="ac1_5" class="label label-primary">Transfer out Finished</span> <!--'udah ditransfer'-->
							<span id="ac1_6" class="label label-primary">Getting Transfer</span> <!--'ditransferi steam'-->
							<span id="ac1_7" class="label label-primary">Transfer in Finished</span> <!--'wis ditransferi'-->
							<span id="ac1_8" class="label label-danger">Raising</span> <!--'lagi rising'-->
							<span id="ac1_9" class="label label-danger">Raised</span> <!--'udah rising'-->
							<span id="ac1_10" class="label label-warning">Keeping</span> <!--'lagi keeping'-->
							<span id="ac1_11" class="label label-warning">Keeping Time Reached</span> <!--'udah keeping'-->
							<span id="ac1_12" class="label label-default">Blowing off</span> <!--'lagi blowoff'-->
						</h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<strong>Main Raising Valve: </strong><span id="rise1"></span> %<br>
							<strong>Main Vacuum Pressure: </strong><span id="vacum1"></span> barG<br>
							<strong>Keeping Valve: </strong><span id="ac1_keep"></span> %
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Duration: </strong><span id="ac1_dur"></span> mins<br>
							<strong>Temperature: </strong><span id="ac1_temp"></span> &deg C<br>
							<strong>Pressure: </strong><span id="ac1_pres"></span> barG
						</div>
						<div class="col-lg-4 col-xs-12">
							<strong>Drain Valve: </strong><span id="drain_1on" class="label label-success">Opened</span><span id="drain_1off" class="label label-danger">Closed</span><br>
							<strong>Prove Level: </strong><span id="probe_1on" class="label label-success">Touched</span><span id="probe_1off" class="label label-danger">Not Touch</span>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-lg-6 col-xs-12">
							<h4><span id="outdoor_1on" class="label label-warning pull-left">Outlet Door Opened</span></h4><h4><span id="outdoor_1off" class="label label-primary pull-left">Outlet Door Closed</span></h4>
						</div>
						<div class="col-lg-6 col-xs-12">
							<h4><span id="indoor_1on" class="label label-warning pull-right">Inlet Door Opened</span></h4><h4><span id="indoor_1off" class="label label-primary pull-right">Inlet Door Closed</span></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacin1">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacin11">x</span>
							<span class="label label-info"    id="tfacin12">x</span>
							<span class="label label-danger"  id="tfacin13">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail 1
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacouth">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacouth1">x</span>
							<span class="label label-info"    id="tfacouth2">x</span>
							<span class="label label-danger"  id="tfacouth3">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Outlet - Rail Home
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						
					</div>
					<div class="box-body">
						Buffer Rail
					</div>
					<div class="box-footer">
						
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacinb">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacinb1">x</span>
							<span class="label label-info"    id="tfacinb2">x</span>
							<span class="label label-danger"  id="tfacinb3">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail Buffer
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						
					</div>
					<div class="box-body">
						Loader Rail
					</div>
					<div class="box-footer">
						
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-xs-12">
				<div class="box box-primary" id="tfacinh">
					<div class="box-header">
						<h3 class="box-title"><strong>HG: </strong><span class="label label-default">Coming soon</span></h3>
					</div>
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<span class="label label-primary" id="tfacinh1">x</span>
							<span class="label label-info"    id="tfacinh2">x</span>
							<span class="label label-danger"  id="tfacinh3">x</span>
						</div>
						<div class="col-lg-8 col-xs-12">
							<strong>G1: </strong><span class="label label-default">xxx</span><br>
							<strong>G2: </strong><span class="label label-default">xxx</span><br>
							<strong>G3: </strong><span class="label label-default">xxx</span><br>
						</div>
					</div>
					<div class="box-footer">
						TFAC Inlet - Rail Home
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
var socket = io('http://180.250.75.146:4000');
	socket.on('mqtt', function(data){
		var keep, yo;
		if(data.topic == 'ac1_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac1_pres').text(yo);
		}
		if(data.topic == 'ac1_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac1_temp').text(yo);
		}
		
		if(data.topic == 'ac1_sts'){
			var ac1_sts = data.payload;
			if(ac1_sts == 'blm terdeteksi'){
				$('#ac1_0').show();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'abis blowoff'){
				$('#ac1_0').hide();$('#ac1_1').show();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'lagi vakum'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').show();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'udah vakum'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').show();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'transfering OUT'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').show();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'udah ditransfer'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').show();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'ditransferi steam'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').show();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'wis ditransferi'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').show();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'lagi rising'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').show();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'udah rising'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').show();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'lagi keeping'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').show();$('#ac1_11').hide();$('#ac1_12').hide();
			}
			if(ac1_sts == 'udah keeping'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').show();$('#ac1_12').hide();
			}
			if(ac1_sts == 'lagi blowoff'){
				$('#ac1_0').hide();$('#ac1_1').hide();$('#ac1_2').hide();$('#ac1_3').hide();$('#ac1_4').hide();$('#ac1_5').hide();$('#ac1_6').hide();$('#ac1_7').hide();
				$('#ac1_8').hide();$('#ac1_9').hide();$('#ac1_10').hide();$('#ac1_11').hide();$('#ac1_12').show();
			}
		}
		if(data.topic == 'ac1_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac1_dur').text(yo);
		}
		
		if(data.topic == 'ac2_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac2_pres').text(yo);
		}
		if(data.topic == 'ac2_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac2_temp').text(yo);
		}
		if(data.topic == 'ac2_sts'){
			var ac2_sts = data.payload;
			if(ac2_sts == 'blm terdeteksi'){
				$('#ac2_0').show();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'abis blowoff'){
				$('#ac2_0').hide();$('#ac2_1').show();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'lagi vakum'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').show();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'udah vakum'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').show();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'transfering OUT'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').show();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'udah ditransfer'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').show();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'ditransferi steam'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').show();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'wis ditransferi'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').show();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'lagi rising'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').show();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'udah rising'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').show();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'lagi keeping'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').show();$('#ac2_11').hide();$('#ac2_12').hide();
			}
			if(ac2_sts == 'udah keeping'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').show();$('#ac2_12').hide();
			}
			if(ac2_sts == 'lagi blowoff'){
				$('#ac2_0').hide();$('#ac2_1').hide();$('#ac2_2').hide();$('#ac2_3').hide();$('#ac2_4').hide();$('#ac2_5').hide();$('#ac2_6').hide();$('#ac2_7').hide();
				$('#ac2_8').hide();$('#ac2_9').hide();$('#ac2_10').hide();$('#ac2_11').hide();$('#ac2_12').show();
			}
		}
		if(data.topic == 'ac2_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac2_dur').text(yo);
		}
		
		if(data.topic == 'ac3_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac3_pres').text(yo);
		}
		if(data.topic == 'ac3_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac3_temp').text(yo);
		}
		if(data.topic == 'ac3_sts'){
			var ac3_sts = data.payload;
			if(ac3_sts == 'blm terdeteksi'){
				$('#ac3_0').show();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'abis blowoff'){
				$('#ac3_0').hide();$('#ac3_1').show();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'lagi vakum'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').show();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'udah vakum'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').show();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'transfering OUT'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').show();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'udah ditransfer'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').show();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'ditransferi steam'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').show();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'wis ditransferi'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').show();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'lagi rising'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').show();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'udah rising'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').show();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'lagi keeping'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').show();$('#ac3_11').hide();$('#ac3_12').hide();
			}
			if(ac3_sts == 'udah keeping'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').show();$('#ac3_12').hide();
			}
			if(ac3_sts == 'lagi blowoff'){
				$('#ac3_0').hide();$('#ac3_1').hide();$('#ac3_2').hide();$('#ac3_3').hide();$('#ac3_4').hide();$('#ac3_5').hide();$('#ac3_6').hide();$('#ac3_7').hide();
				$('#ac3_8').hide();$('#ac3_9').hide();$('#ac3_10').hide();$('#ac3_11').hide();$('#ac3_12').show();
			}
		}
		if(data.topic == 'ac3_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac3_dur').text(yo);
		}
		
		if(data.topic == 'ac4_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac4_pres').text(yo);
		}
		if(data.topic == 'ac4_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac4_temp').text(yo);
		}
		if(data.topic == 'ac4_sts'){
			var ac4_sts = data.payload;
			if(ac4_sts == 'blm terdeteksi'){
				$('#ac4_0').show();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'abis blowoff'){
				$('#ac4_0').hide();$('#ac4_1').show();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'lagi vakum'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').show();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'udah vakum'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').show();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'transfering OUT'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').show();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'udah ditransfer'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').show();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'ditransferi steam'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').show();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'wis ditransferi'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').show();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'lagi rising'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').show();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'udah rising'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').show();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'lagi keeping'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').show();$('#ac4_11').hide();$('#ac4_12').hide();
			}
			if(ac4_sts == 'udah keeping'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').show();$('#ac4_12').hide();
			}
			if(ac4_sts == 'lagi blowoff'){
				$('#ac4_0').hide();$('#ac4_1').hide();$('#ac4_2').hide();$('#ac4_3').hide();$('#ac4_4').hide();$('#ac4_5').hide();$('#ac4_6').hide();$('#ac4_7').hide();
				$('#ac4_8').hide();$('#ac4_9').hide();$('#ac4_10').hide();$('#ac4_11').hide();$('#ac4_12').show();
			}
		}
		if(data.topic == 'ac4_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac4_dur').text(yo);
		}
		
		if(data.topic == 'ac5_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac5_pres').text(yo);
		}
		if(data.topic == 'ac5_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac5_temp').text(yo);
		}
		if(data.topic == 'ac5_sts'){
			var ac5_sts = data.payload;
			if(ac5_sts == 'blm terdeteksi'){
				$('#ac5_0').show();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'abis blowoff'){
				$('#ac5_0').hide();$('#ac5_1').show();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'lagi vakum'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').show();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'udah vakum'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').show();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'transfering OUT'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').show();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'udah ditransfer'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').show();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'ditransferi steam'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').show();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'wis ditransferi'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').show();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'lagi rising'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').show();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'udah rising'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').show();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'lagi keeping'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').show();$('#ac5_11').hide();$('#ac5_12').hide();
			}
			if(ac5_sts == 'udah keeping'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').show();$('#ac5_12').hide();
			}
			if(ac5_sts == 'lagi blowoff'){
				$('#ac5_0').hide();$('#ac5_1').hide();$('#ac5_2').hide();$('#ac5_3').hide();$('#ac5_4').hide();$('#ac5_5').hide();$('#ac5_6').hide();$('#ac5_7').hide();
				$('#ac5_8').hide();$('#ac5_9').hide();$('#ac5_10').hide();$('#ac5_11').hide();$('#ac5_12').show();
			}
		}
		if(data.topic == 'ac5_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac5_dur').text(yo);
		}
		
		if(data.topic == 'ac6_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac6_pres').text(yo);
		}
		if(data.topic == 'ac6_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac6_temp').text(yo);
		}
		if(data.topic == 'ac6_sts'){
			var ac6_sts = data.payload;
			if(ac6_sts == 'blm terdeteksi'){
				$('#ac6_0').show();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'abis blowoff'){
				$('#ac6_0').hide();$('#ac6_1').show();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'lagi vakum'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').show();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'udah vakum'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').show();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'transfering OUT'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').show();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'udah ditransfer'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').show();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'ditransferi steam'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').show();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'wis ditransferi'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').show();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'lagi rising'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').show();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'udah rising'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').show();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'lagi keeping'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').show();$('#ac6_11').hide();$('#ac6_12').hide();
			}
			if(ac6_sts == 'udah keeping'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').show();$('#ac6_12').hide();
			}
			if(ac6_sts == 'lagi blowoff'){
				$('#ac6_0').hide();$('#ac6_1').hide();$('#ac6_2').hide();$('#ac6_3').hide();$('#ac6_4').hide();$('#ac6_5').hide();$('#ac6_6').hide();$('#ac6_7').hide();
				$('#ac6_8').hide();$('#ac6_9').hide();$('#ac6_10').hide();$('#ac6_11').hide();$('#ac6_12').show();
			}
		}
		if(data.topic == 'ac6_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac6_dur').text(yo);
		}
		
		if(data.topic == 'ac7_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac7_pres').text(yo);
		}
		if(data.topic == 'ac7_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac7_temp').text(yo);
		}
		if(data.topic == 'ac7_sts'){
			var ac7_sts = data.payload;
			if(ac7_sts == 'blm terdeteksi'){
				$('#ac7_0').show();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'abis blowoff'){
				$('#ac7_0').hide();$('#ac7_1').show();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'lagi vakum'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').show();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'udah vakum'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').show();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'transfering OUT'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').show();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'udah ditransfer'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').show();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'ditransferi steam'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').show();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'wis ditransferi'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').show();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'lagi rising'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').show();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'udah rising'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').show();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'lagi keeping'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').show();$('#ac7_11').hide();$('#ac7_12').hide();
			}
			if(ac7_sts == 'udah keeping'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').show();$('#ac7_12').hide();
			}
			if(ac7_sts == 'lagi blowoff'){
				$('#ac7_0').hide();$('#ac7_1').hide();$('#ac7_2').hide();$('#ac7_3').hide();$('#ac7_4').hide();$('#ac7_5').hide();$('#ac7_6').hide();$('#ac7_7').hide();
				$('#ac7_8').hide();$('#ac7_9').hide();$('#ac7_10').hide();$('#ac7_11').hide();$('#ac7_12').show();
			}
		}
		if(data.topic == 'ac7_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac7_dur').text(yo);
		}
		
		if(data.topic == 'ac8_pres'){
			yo = parseFloat(data.payload).toFixed(2);
			$('#ac8_pres').text(yo);
		}
		if(data.topic == 'ac8_temp'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac8_temp').text(yo);
		}
		if(data.topic == 'ac8_sts'){
			var ac8_sts = data.payload;
			if(ac8_sts == 'blm terdeteksi'){
				$('#ac8_0').show();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'abis blowoff'){
				$('#ac8_0').hide();$('#ac8_1').show();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'lagi vakum'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').show();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'udah vakum'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').show();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'transfering OUT'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').show();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'udah ditransfer'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').show();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'ditransferi steam'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').show();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'wis ditransferi'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').show();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'lagi rising'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').show();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'udah rising'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').show();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'lagi keeping'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').show();$('#ac8_11').hide();$('#ac8_12').hide();
			}
			if(ac8_sts == 'udah keeping'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').show();$('#ac8_12').hide();
			}
			if(ac8_sts == 'lagi blowoff'){
				$('#ac8_0').hide();$('#ac8_1').hide();$('#ac8_2').hide();$('#ac8_3').hide();$('#ac8_4').hide();$('#ac8_5').hide();$('#ac8_6').hide();$('#ac8_7').hide();
				$('#ac8_8').hide();$('#ac8_9').hide();$('#ac8_10').hide();$('#ac8_11').hide();$('#ac8_12').show();
			}
		}
		if(data.topic == 'ac8_dur'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac8_dur').text(yo);
		}
		
		if(data.topic == 'ac_drain'){
			var drainall = parseInt(data.payload),
			drain_1 = drainall & 128,
			drain_2 = drainall & 64,
			drain_3 = drainall & 32,
			drain_4 = drainall & 16,
			drain_5 = drainall & 8,
			drain_6 = drainall & 4,
			drain_7 = drainall & 2,
			drain_8 = drainall & 1;
			if(drain_1 == 128){
				$('#drain_1on').show();
				$('#drain_1off').hide();
			}
			if(drain_1 == 0){
				$('#drain_1on').hide();
				$('#drain_1off').show();
			}
			if(drain_2 == 64){
				$('#drain_2on').show();
				$('#drain_2off').hide();
			}
			if(drain_2 == 0){
				$('#drain_2on').hide();
				$('#drain_2off').show();
			}
			if(drain_3 == 32){
				$('#drain_3on').show();
				$('#drain_3off').hide();
			}
			if(drain_3 == 0){
				$('#drain_3on').hide();
				$('#drain_3off').show();
			}
			if(drain_4 == 16){
				$('#drain_4on').show();
				$('#drain_4off').hide();
			}
			if(drain_4 == 0){
				$('#drain_4on').hide();
				$('#drain_4off').show();
			}
			if(drain_5 == 8){
				$('#drain_5on').show();
				$('#drain_5off').hide();
			}
			if(drain_5 == 0){
				$('#drain_5on').hide();
				$('#drain_5off').show();
			}
			if(drain_6 == 4){
				$('#drain_6on').show();
				$('#drain_6off').hide();
			}
			if(drain_6 == 0){
				$('#drain_6on').hide();
				$('#drain_6off').show();
			}
			if(drain_7 == 2){
				$('#drain_7on').show();
				$('#drain_7off').hide();
			}
			if(drain_7 == 0){
				$('#drain_7on').hide();
				$('#drain_7off').show();
			}
			if(drain_8 == 1){
				$('#drain_8on').show();
				$('#drain_8off').hide();
			}
			if(drain_8 == 0){
				$('#drain_8on').hide();
				$('#drain_8off').show();
			}
		}
		
		if(data.topic == 'ac_drainlvl'){
			var dainall = parseInt(data.payload),
			dain_1 = dainall & 128,
			dain_2 = dainall & 64,
			dain_3 = dainall & 32,
			dain_4 = dainall & 16,
			dain_5 = dainall & 8,
			dain_6 = dainall & 4,
			dain_7 = dainall & 2,
			dain_8 = dainall & 1;
			if(dain_1 == 128){
				$('#probe_1on').show();
				$('#probe_1off').hide();
			}
			if(dain_1 == 0){
				$('#probe_1on').hide();
				$('#probe_1off').show();
			}
			if(dain_2 == 64){
				$('#probe_2on').show();
				$('#probe_2off').hide();
			}
			if(dain_2 == 0){
				$('#probe_2on').hide();
				$('#probe_2off').show();
			}
			if(dain_3 == 32){
				$('#probe_3on').show();
				$('#probe_3off').hide();
			}
			if(dain_3 == 0){
				$('#probe_3on').hide();
				$('#probe_3off').show();
			}
			if(dain_4 == 16){
				$('#probe_4on').show();
				$('#probe_4off').hide();
			}
			if(dain_4 == 0){
				$('#probe_4on').hide();
				$('#probe_4off').show();
			}
			if(dain_5 == 8){
				$('#probe_5on').show();
				$('#probe_5off').hide();
			}
			if(dain_5 == 0){
				$('#probe_5on').hide();
				$('#probe_5off').show();
			}
			if(dain_6 == 4){
				$('#probe_6on').show();
				$('#probe_6off').hide();
			}
			if(dain_6 == 0){
				$('#probe_6on').hide();
				$('#probe_6off').show();
			}
			if(dain_7 == 2){
				$('#probe_7on').show();
				$('#probe_7off').hide();
			}
			if(dain_7 == 0){
				$('#probe_7on').hide();
				$('#probe_7off').show();
			}
			if(dain_8 == 1){
				$('#probe_8on').show();
				$('#probe_8off').hide();
			}
			if(dain_8 == 0){
				$('#probe_8on').hide();
				$('#probe_8off').show();
			}
		}
		
		if(data.topic == 'ac_pintuin'){
			var dainall = parseInt(data.payload),
			dain_1 = dainall & 128,
			dain_2 = dainall & 64,
			dain_3 = dainall & 32,
			dain_4 = dainall & 16,
			dain_5 = dainall & 8,
			dain_6 = dainall & 4,
			dain_7 = dainall & 2,
			dain_8 = dainall & 1;
			if(dain_1 == 0){
				$('#indoor_1on').show();
				$('#indoor_1off').hide();
			}
			if(dain_1 == 128){
				$('#indoor_1on').hide();
				$('#indoor_1off').show();
			}
			if(dain_2 == 0){
				$('#indoor_2on').show();
				$('#indoor_2off').hide();
			}
			if(dain_2 == 64){
				$('#indoor_2on').hide();
				$('#indoor_2off').show();
			}
			if(dain_3 == 0){
				$('#indoor_3on').show();
				$('#indoor_3off').hide();
			}
			if(dain_3 == 32){
				$('#indoor_3on').hide();
				$('#indoor_3off').show();
			}
			if(dain_4 == 0){
				$('#indoor_4on').show();
				$('#indoor_4off').hide();
			}
			if(dain_4 == 16){
				$('#indoor_4on').hide();
				$('#indoor_4off').show();
			}
			if(dain_5 == 0){
				$('#indoor_5on').show();
				$('#indoor_5off').hide();
			}
			if(dain_5 == 8){
				$('#indoor_5on').hide();
				$('#indoor_5off').show();
			}
			if(dain_6 == 0){
				$('#indoor_6on').show();
				$('#indoor_6off').hide();
			}
			if(dain_6 == 4){
				$('#indoor_6on').hide();
				$('#indoor_6off').show();
			}
			if(dain_7 == 0){
				$('#indoor_7on').show();
				$('#indoor_7off').hide();
			}
			if(dain_7 == 2){
				$('#indoor_7on').hide();
				$('#indoor_7off').show();
			}
			if(dain_8 == 0){
				$('#indoor_8on').show();
				$('#indoor_8off').hide();
			}
			if(dain_8 == 1){
				$('#indoor_8on').hide();
				$('#indoor_8off').show();
			}
		}
		
		if(data.topic == 'ac_pintuout'){
			var dainall = parseInt(data.payload),
			dain_1 = dainall & 128,
			dain_2 = dainall & 64,
			dain_3 = dainall & 32,
			dain_4 = dainall & 16,
			dain_5 = dainall & 8,
			dain_6 = dainall & 4,
			dain_7 = dainall & 2,
			dain_8 = dainall & 1;
			if(dain_1 == 0){
				$('#outdoor_1on').show();
				$('#outdoor_1off').hide();
			}
			if(dain_1 == 128){
				$('#outdoor_1on').hide();
				$('#outdoor_1off').show();
			}
			if(dain_2 == 0){
				$('#outdoor_2on').show();
				$('#outdoor_2off').hide();
			}
			if(dain_2 == 64){
				$('#outdoor_2on').hide();
				$('#outdoor_2off').show();
			}
			if(dain_3 == 0){
				$('#outdoor_3on').show();
				$('#outdoor_3off').hide();
			}
			if(dain_3 == 32){
				$('#outdoor_3on').hide();
				$('#outdoor_3off').show();
			}
			if(dain_4 == 0){
				$('#outdoor_4on').show();
				$('#outdoor_4off').hide();
			}
			if(dain_4 == 16){
				$('#outdoor_4on').hide();
				$('#outdoor_4off').show();
			}
			if(dain_5 == 0){
				$('#outdoor_5on').show();
				$('#outdoor_5off').hide();
			}
			if(dain_5 == 8){
				$('#outdoor_5on').hide();
				$('#outdoor_5off').show();
			}
			if(dain_6 == 0){
				$('#outdoor_6on').show();
				$('#outdoor_6off').hide();
			}
			if(dain_6 == 4){
				$('#outdoor_6on').hide();
				$('#outdoor_6off').show();
			}
			if(dain_7 == 0){
				$('#outdoor_7on').show();
				$('#outdoor_7off').hide();
			}
			if(dain_7 == 2){
				$('#outdoor_7on').hide();
				$('#outdoor_7off').show();
			}
			if(dain_8 == 0){
				$('#outdoor_8on').show();
				$('#outdoor_8off').hide();
			}
			if(dain_8 == 1){
				$('#outdoor_8on').hide();
				$('#outdoor_8off').show();
			}
		}
		if(data.topic == 'ac1_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac1_keep').text(yo);
		}
		if(data.topic == 'ac2_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac2_keep').text(yo);
		}
		if(data.topic == 'ac3_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac3_keep').text(yo);
		}
		if(data.topic == 'ac4_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac4_keep').text(yo);
		}
		if(data.topic == 'ac5_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac5_keep').text(yo);
		}
		if(data.topic == 'ac6_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac6_keep').text(yo);
		}
		if(data.topic == 'ac7_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac7_keep').text(yo);
		}
		if(data.topic == 'ac8_keep'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#ac8_keep').text(yo);
		}
		if(data.topic == 'rise'){
			yo = parseFloat(data.payload/327.67).toFixed(1);
			$('#rise1').text(yo);
			$('#rise2').text(yo);
			$('#rise3').text(yo);
			$('#rise4').text(yo);
			$('#rise5').text(yo);
			$('#rise6').text(yo);
			$('#rise7').text(yo);
			$('#rise8').text(yo);
		}
		if(data.topic == 'vacuum'){
			yo = parseFloat(data.payload).toFixed(3);
			$('#vacum1').text(yo);
			$('#vacum2').text(yo);
			$('#vacum3').text(yo);
			$('#vacum4').text(yo);
			$('#vacum5').text(yo);
			$('#vacum6').text(yo);
			$('#vacum7').text(yo);
			$('#vacum8').text(yo);
		}
		if(data.topic == 'tfacout_md'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;//slow2 tfc2
			var pos3 = yy & 8;//stop tfc2
			//var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacout_md_1').show();}
			if(pos1 == 0 ){$('#tfacout_md_1').hide();}
			if(pos2 == 16){$('#tfacout_md_2').show();}
			if(pos2 == 0 ){$('#tfacout_md_2').hide();}
			if(pos3 == 8 ){$('#tfacout_md_3').show();}
			if(pos3 == 0 ){$('#tfacout_md_3').hide();}
			
			
			if(pos5 == 2 ){$('#tfacout_md_5').show();}
			if(pos5 == 0 ){$('#tfacout_md_5').hide();}
			if(pos6 == 1 ){$('#tfacout_md_6').show();}
			if(pos6 == 0 ){$('#tfacout_md_6').hide();}
			
		}
		if(data.topic == 'tfacout_bridge'){
			yy = parseInt(data.payload);
			var pos1 = yy & 4;
			var pos2 = yy & 2;
			var pos3 = yy & 1;
			if(pos1 == 4){$('#tfacout_br_1').show();}
			if(pos1 == 0 ){$('#tfacout_br_1').hide();}
			if(pos2 == 2){$('#tfacout_br_2').show();}
			if(pos2 == 0 ){$('#tfacout_br_2').hide();}
			if(pos3 == 1 ){$('#tfacout_br_3').show();}
			if(pos3 == 0 ){$('#tfacout_br_3').hide();}
		}
		if(data.topic == 'tfacout_sp'){
			yy = parseInt(data.payload);
			var pos1 = yy & 4;
			var pos2 = yy & 2;
			var pos3 = yy & 1;
			if(pos1 == 4){$('#tfacout_sp_1').show();}
			if(pos1 == 0 ){$('#tfacout_sp_1').hide();}
			if(pos2 == 2){$('#tfacout_sp_2').show();}
			if(pos2 == 0 ){$('#tfacout_sp_2').hide();}
			if(pos3 == 1 ){$('#tfacout_sp_3').show();}
			if(pos3 == 0 ){$('#tfacout_sp_3').hide();}
		}
		if(data.topic == 'tfacin_md'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;//slow2 tfc2
			var pos3 = yy & 8;//stop tfc2
			//var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin_md_1').show();}
			if(pos1 == 0 ){$('#tfacin_md_1').hide();}
			if(pos2 == 16){$('#tfacin_md_2').show();}
			if(pos2 == 0 ){$('#tfacin_md_2').hide();}
			if(pos3 == 8 ){$('#tfacin_md_3').show();}
			if(pos3 == 0 ){$('#tfacin_md_3').hide();}
			
			
			if(pos5 == 2 ){$('#tfacin_md_5').show();}
			if(pos5 == 0 ){$('#tfacin_md_5').hide();}
			if(pos6 == 1 ){$('#tfacin_md_6').show();}
			if(pos6 == 0 ){$('#tfacin_md_6').hide();}
			
		}
		if(data.topic == 'tfacin_bridge'){
			yy = parseInt(data.payload);
			var pos1 = yy & 4;
			var pos2 = yy & 2;
			var pos3 = yy & 1;
			if(pos1 == 4){$('#tfacin_br_1').show();}
			if(pos1 == 0 ){$('#tfacin_br_1').hide();}
			if(pos2 == 2){$('#tfacin_br_2').show();}
			if(pos2 == 0 ){$('#tfacin_br_2').hide();}
			if(pos3 == 1 ){$('#tfacin_br_3').show();}
			if(pos3 == 0 ){$('#tfacin_br_3').hide();}
		}
		if(data.topic == 'tfacin_sp'){
			yy = parseInt(data.payload);
			var pos1 = yy & 4;
			var pos2 = yy & 2;
			var pos3 = yy & 1;
			if(pos1 == 4){$('#tfacin_sp_1').show();}
			if(pos1 == 0 ){$('#tfacin_sp_1').hide();}
			if(pos2 == 2){$('#tfacin_sp_2').show();}
			if(pos2 == 0 ){$('#tfacin_sp_2').hide();}
			if(pos3 == 1 ){$('#tfacin_sp_3').show();}
			if(pos3 == 0 ){$('#tfacin_sp_3').hide();}
		}
		if(data.topic == 'lvl_dea'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#dea').text(yo);
		}
		if(data.topic == 'lvl_cang'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#palm').text(yo);
		}
		if(data.topic == 'before_eco'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#before').text(yo);
		}
		if(data.topic == 'after_eco'){
			yo = parseFloat(data.payload).toFixed(1);
			$('#after').text(yo);
		}
		if(data.topic == 'tfac_1'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin11' ).show();$('#tfacin1' ).show();}
			if(pos1 == 0 ){$('#tfacin11' ).hide();}
			if(pos2 == 16){$('#tfacin12' ).show();$('#tfacin1' ).show();}
			if(pos2 == 0 ){$('#tfacin12' ).hide();}
			if(pos3 == 8 ){$('#tfacin13' ).show();$('#tfacin1' ).show();}
			if(pos3 == 0 ){$('#tfacin13' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin1' ).hide();}
			if(pos4 == 4 ){$('#tfacout11').show();$('#tfacout1').show();}
			if(pos4 == 0 ){$('#tfacout11').hide();}
			if(pos5 == 2 ){$('#tfacout12').show();$('#tfacout1').show();}
			if(pos5 == 0 ){$('#tfacout12').hide();}
			if(pos6 == 1 ){$('#tfacout13').show();$('#tfacout1').show();}
			if(pos6 == 0 ){$('#tfacout13').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout1' ).hide();}
		}
		if(data.topic == 'tfac_2'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin21' ).show();$('#tfacin2' ).show();}
			if(pos1 == 0 ){$('#tfacin21' ).hide();}
			if(pos2 == 16){$('#tfacin22' ).show();$('#tfacin2' ).show();}
			if(pos2 == 0 ){$('#tfacin22' ).hide();}
			if(pos3 == 8 ){$('#tfacin23' ).show();$('#tfacin2' ).show();}
			if(pos3 == 0 ){$('#tfacin23' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin2' ).hide();}
			if(pos4 == 4 ){$('#tfacout21').show();$('#tfacout2').show();}
			if(pos4 == 0 ){$('#tfacout21').hide();}
			if(pos5 == 2 ){$('#tfacout22').show();$('#tfacout2').show();}
			if(pos5 == 0 ){$('#tfacout22').hide();}
			if(pos6 == 1 ){$('#tfacout23').show();$('#tfacout2').show();}
			if(pos6 == 0 ){$('#tfacout23').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout2' ).hide();}
		}
		if(data.topic == 'tfac_3'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin31' ).show();$('#tfacin3' ).show();}
			if(pos1 == 0 ){$('#tfacin31' ).hide();}
			if(pos2 == 16){$('#tfacin32' ).show();$('#tfacin3' ).show();}
			if(pos2 == 0 ){$('#tfacin32' ).hide();}
			if(pos3 == 8 ){$('#tfacin33' ).show();$('#tfacin3' ).show();}
			if(pos3 == 0 ){$('#tfacin33' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin3' ).hide();}
			if(pos4 == 4 ){$('#tfacout31').show();$('#tfacout3').show();}
			if(pos4 == 0 ){$('#tfacout31').hide();}
			if(pos5 == 2 ){$('#tfacout32').show();$('#tfacout3').show();}
			if(pos5 == 0 ){$('#tfacout32').hide();}
			if(pos6 == 1 ){$('#tfacout33').show();$('#tfacout3').show();}
			if(pos6 == 0 ){$('#tfacout33').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout3' ).hide();}
		}
		if(data.topic == 'tfac_4'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin41' ).show();$('#tfacin4' ).show();}
			if(pos1 == 0 ){$('#tfacin41' ).hide();}
			if(pos2 == 16){$('#tfacin42' ).show();$('#tfacin4' ).show();}
			if(pos2 == 0 ){$('#tfacin42' ).hide();}
			if(pos3 == 8 ){$('#tfacin43' ).show();$('#tfacin4' ).show();}
			if(pos3 == 0 ){$('#tfacin43' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin4' ).hide();}
			if(pos4 == 4 ){$('#tfacout41').show();$('#tfacout4').show();}
			if(pos4 == 0 ){$('#tfacout41').hide();}
			if(pos5 == 2 ){$('#tfacout42').show();$('#tfacout4').show();}
			if(pos5 == 0 ){$('#tfacout42').hide();}
			if(pos6 == 1 ){$('#tfacout43').show();$('#tfacout4').show();}
			if(pos6 == 0 ){$('#tfacout43').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout4' ).hide();}
		}
		if(data.topic == 'tfac_5'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin51' ).show();$('#tfacin5' ).show();}
			if(pos1 == 0 ){$('#tfacin51' ).hide();}
			if(pos2 == 16){$('#tfacin52' ).show();$('#tfacin5' ).show();}
			if(pos2 == 0 ){$('#tfacin52' ).hide();}
			if(pos3 == 8 ){$('#tfacin53' ).show();$('#tfacin5' ).show();}
			if(pos3 == 0 ){$('#tfacin53' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin5' ).hide();}
			if(pos4 == 4 ){$('#tfacout51').show();$('#tfacout5').show();}
			if(pos4 == 0 ){$('#tfacout51').hide();}
			if(pos5 == 2 ){$('#tfacout52').show();$('#tfacout5').show();}
			if(pos5 == 0 ){$('#tfacout52').hide();}
			if(pos6 == 1 ){$('#tfacout53').show();$('#tfacout5').show();}
			if(pos6 == 0 ){$('#tfacout53').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout5' ).hide();}
		}
		if(data.topic == 'tfac_6'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin61' ).show();$('#tfacin6' ).show();}
			if(pos1 == 0 ){$('#tfacin61' ).hide();}
			if(pos2 == 16){$('#tfacin62' ).show();$('#tfacin6' ).show();}
			if(pos2 == 0 ){$('#tfacin62' ).hide();}
			if(pos3 == 8 ){$('#tfacin63' ).show();$('#tfacin6' ).show();}
			if(pos3 == 0 ){$('#tfacin63' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin6' ).hide();}
			if(pos4 == 4 ){$('#tfacout61').show();$('#tfacout6').show();}
			if(pos4 == 0 ){$('#tfacout61').hide();}
			if(pos5 == 2 ){$('#tfacout62').show();$('#tfacout6').show();}
			if(pos5 == 0 ){$('#tfacout62').hide();}
			if(pos6 == 1 ){$('#tfacout63').show();$('#tfacout6').show();}
			if(pos6 == 0 ){$('#tfacout63').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout6' ).hide();}
		}
		
		if(data.topic == 'tfac_7'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin71' ).show();$('#tfacin7' ).show();}
			if(pos1 == 0 ){$('#tfacin71' ).hide();}
			if(pos2 == 16){$('#tfacin72' ).show();$('#tfacin7' ).show();}
			if(pos2 == 0 ){$('#tfacin72' ).hide();}
			if(pos3 == 8 ){$('#tfacin73' ).show();$('#tfacin7' ).show();}
			if(pos3 == 0 ){$('#tfacin73' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin7' ).hide();}
			if(pos4 == 4 ){$('#tfacout71').show();$('#tfacout7').show();}
			if(pos4 == 0 ){$('#tfacout71').hide();}
			if(pos5 == 2 ){$('#tfacout72').show();$('#tfacout7').show();}
			if(pos5 == 0 ){$('#tfacout72').hide();}
			if(pos6 == 1 ){$('#tfacout73').show();$('#tfacout7').show();}
			if(pos6 == 0 ){$('#tfacout73').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout7' ).hide();}
		}
		
		if(data.topic == 'tfac_8'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacin81' ).show();$('#tfacin8' ).show();}
			if(pos1 == 0 ){$('#tfacin81' ).hide();}
			if(pos2 == 16){$('#tfacin82' ).show();$('#tfacin8' ).show();}
			if(pos2 == 0 ){$('#tfacin82' ).hide();}
			if(pos3 == 8 ){$('#tfacin83' ).show();$('#tfacin8' ).show();}
			if(pos3 == 0 ){$('#tfacin83' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacin8' ).hide();}
			if(pos4 == 4 ){$('#tfacout81').show();$('#tfacout8').show();}
			if(pos4 == 0 ){$('#tfacout81').hide();}
			if(pos5 == 2 ){$('#tfacout82').show();$('#tfacout8').show();}
			if(pos5 == 0 ){$('#tfacout82').hide();}
			if(pos6 == 1 ){$('#tfacout83').show();$('#tfacout8').show();}
			if(pos6 == 0 ){$('#tfacout83').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacout8' ).hide();}
		}
		if(data.topic == 'tfac_h'){
			yy = parseInt(data.payload);
			var pos1 = yy & 32;
			var pos2 = yy & 16;
			var pos3 = yy & 8;
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos1 == 32){$('#tfacinh1' ).show();$('#tfacinh' ).show();}
			if(pos1 == 0 ){$('#tfacinh1' ).hide();}
			if(pos2 == 16){$('#tfacinh2' ).show();$('#tfacinh' ).show();}
			if(pos2 == 0 ){$('#tfacinh2' ).hide();}
			if(pos3 == 8 ){$('#tfacinh3' ).show();$('#tfacinh' ).show();}
			if(pos3 == 0 ){$('#tfacinh3' ).hide();}
			if(pos1 == 0 && pos2 == 0 && pos3 == 0){$('#tfacinh' ).hide();}
			if(pos4 == 4 ){$('#tfacouth1').show();$('#tfacouth').show();}
			if(pos4 == 0 ){$('#tfacouth1').hide();}
			if(pos5 == 2 ){$('#tfacouth2').show();$('#tfacouth').show();}
			if(pos5 == 0 ){$('#tfacouth2').hide();}
			if(pos6 == 1 ){$('#tfacouth3').show();$('#tfacouth').show();}
			if(pos6 == 0 ){$('#tfacouth3').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacouth' ).hide();}
		}
		if(data.topic == 'tfac_b'){
			yy = parseInt(data.payload);
			var pos4 = yy & 4;
			var pos5 = yy & 2;
			var pos6 = yy & 1;
			if(pos4 == 4 ){$('#tfacinb1').show();$('#tfacinb').show();}
			if(pos4 == 0 ){$('#tfacinb1').hide();}
			if(pos5 == 2 ){$('#tfacinb2').show();$('#tfacinb').show();}
			if(pos5 == 0 ){$('#tfacinb2').hide();}
			if(pos6 == 1 ){$('#tfacinb3').show();$('#tfacinb').show();}
			if(pos6 == 0 ){$('#tfacinb3').hide();}
			if(pos4 == 0 && pos5 == 0 && pos6 == 0){$('#tfacinb' ).hide();}
		}
});
</script>