<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Autoclaves
			<small> realtime monitor</small>
		</h1>
	</section>
    
	<section class="content">
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<div id="rise_g" style="height: 200px; margin: 0 auto"></div>
						</div>
						<div class="col-lg-4 col-xs-12">
							<div id="palm_lvl" style="height: 200px; float: center"></div>
						</div>
						<div class="col-lg-4 col-xs-12">
							<div id="vacum_pres" style="height: 200px; margin: 0 auto"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="col-lg-4 col-xs-12">
							<div id="dea_lvl" style="height: 200px; float: center"></div>
						</div>
						<div class="col-lg-4 col-xs-12">
							<div id="before_eco" style="height: 200px; margin: 0 auto"></div>
						</div>
						<div class="col-lg-4 col-xs-12">
							<div id="after_eco" style="height: 200px; margin: 0 auto"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 1, 
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
						<div id="ac1_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac1_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac1_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac1_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac1_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_1on" class="label label-success">Opened</span><span id="drain_1off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_1on" class="label label-success">Touched</span><span id="probe_1off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_1on" class="label label-success">Opened</span><span id="indoor_1off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_1on" class="label label-success">Opened</span><span id="outdoor_1off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 2, 
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
						<div id="ac2_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac2_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac2_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac2_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac2_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_2on" class="label label-success">Opened</span><span id="drain_2off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_2on" class="label label-success">Touched</span><span id="probe_2off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_2on" class="label label-success">Opened</span><span id="indoor_2off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_2on" class="label label-success">Opened</span><span id="outdoor_2off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 3, 
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
						<div id="ac3_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac3_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac3_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac3_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac3_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_3on" class="label label-success">Opened</span><span id="drain_3off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_3on" class="label label-success">Touched</span><span id="probe_3off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_3on" class="label label-success">Opened</span><span id="indoor_3off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_3on" class="label label-success">Opened</span><span id="outdoor_3off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 4, 
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
						<div id="ac4_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac4_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac4_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac4_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac4_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_4on" class="label label-success">Opened</span><span id="drain_4off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_4on" class="label label-success">Touched</span><span id="probe_4off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_4on" class="label label-success">Opened</span><span id="indoor_4off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_4on" class="label label-success">Opened</span><span id="outdoor_4off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 5, 
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
						<div id="ac5_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac5_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac5_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac5_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac5_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_5on" class="label label-success">Opened</span><span id="drain_5off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_5on" class="label label-success">Touched</span><span id="probe_5off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_5on" class="label label-success">Opened</span><span id="indoor_5off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_5on" class="label label-success">Opened</span><span id="outdoor_5off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 6, 
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
						<div id="ac6_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac6_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac6_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac6_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac6_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_6on" class="label label-success">Opened</span><span id="drain_6off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_6on" class="label label-success">Touched</span><span id="probe_6off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_6on" class="label label-success">Opened</span><span id="indoor_6off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_6on" class="label label-success">Opened</span><span id="outdoor_6off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 7, 
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
						<div id="ac7_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac7_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac7_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac7_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac7_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_7on" class="label label-success">Opened</span><span id="drain_7off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_7on" class="label label-success">Touched</span><span id="probe_7off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_7on" class="label label-success">Opened</span><span id="indoor_7off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_7on" class="label label-success">Opened</span><span id="outdoor_7off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 8, 
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
						<div id="ac8_chart" style="height: 300px; margin: 0 auto"></div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Duration: </strong><span id="ac8_dur"></span> mins</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Temperature: </strong><span id="ac8_temp"></span> &deg C</h4>
						</div>
						<div class="col-lg-4 col-xs-12">
							<h4><strong>Pressure: </strong><span id="ac8_pres"></span> barG</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="ac8_keep_g" style="height: 300px; margin: 0 auto"></div>
						<br>
						<strong>Drain Valve: </strong><span id="drain_8on" class="label label-success">Opened</span><span id="drain_8off" class="label label-danger">Closed</span><br>
						<strong>Prove Level: </strong><span id="probe_8on" class="label label-success">Touched</span><span id="probe_8off" class="label label-danger">Not Touch</span><br>
						<strong>Inlet Door: </strong><span id="indoor_8on" class="label label-success">Opened</span><span id="indoor_8off" class="label label-danger">Closed</span><br>
						<strong>Outlet Door: </strong><span id="outdoor_8on" class="label label-success">Opened</span><span id="outdoor_8off" class="label label-danger">Closed</span><br>
					</div>
				</div>
			</div>
		</div>
		
	</section>
</div>


<script>

Highcharts.setOptions({
	global: {
		useUTC: false
	}
});

var rise_g = Highcharts.chart('rise_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Raising'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Raising Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);

var vacum_pres = Highcharts.chart('vacum_pres', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Vacuum'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: -1,
        max: 0.5,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: -1,
            to: 0,
            color: '#55BF3B' // green 55BF3B
        },{
            from: 0,
            to: 0.5,
            color: '#FF8022' // green 55BF3B
        }]
    },

    series: [{
        name: 'Vacuum Pressure',
        data: [80],
        tooltip: {
            valueSuffix: ' barG'
        }
    }]

},
// Add some life
);



var before_eco = Highcharts.chart('before_eco', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Before Eco'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 30,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 70,
            color: '#FF0022' // green 55BF3B
        },{
            from: 60,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Before Economizer',
        data: [80],
        tooltip: {
            valueSuffix: ' &deg C'
        }
    }]

},
// Add some life
);


var after_eco = Highcharts.chart('after_eco', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'After Eco'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 60,
        max: 140,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 60,
            to: 90,
            color: '#FF0022' // green 55BF3B
        },{
            from: 90,
            to: 140,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'After Economizer',
        data: [80],
        tooltip: {
            valueSuffix: ' &deg C'
        }
    }]

},
// Add some life
);



var gaugeOptions = {
	chart: {
		type: 'solidgauge'
		},
	title: null,
	pane: {
		center: ['50%', '85%'],
		size: '100%',
		startAngle: -90,
		endAngle: 90,
		background: {
			backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
			innerRadius: '60%',
			outerRadius: '100%',
			shape: 'arc'
			}
		},
	tooltip: {
		enabled: false
		},
	yAxis: {
		stops: [
			[0.1, '#DF5353'], // red
			[0.5, '#DDDF0D'], // yellow
			[0.9, '#55BF3B'] // green
		],
		lineWidth: 0,
		minorTickInterval: null,
		tickAmount: 2,
		title: {
			y: -70
			},
		labels: {
			y: 16
			}
		},
	plotOptions: {
		solidgauge: {
			dataLabels: {
				y: 5,
				borderWidth: 0,
				useHTML: true
				}
			}
		}
	};


var palm_lvl = Highcharts.chart('palm_lvl', Highcharts.merge(gaugeOptions, {
	yAxis: {
		min: 0,
		max: 100,
		title: {
			text: 'Palm Shell'
		}
	},
	
	credits: {
		enabled: false
	},
	
	series: [{
		name: 'SS1',
		data: [1],
		dataLabels: {
			format: '<div style="text-align:center"><span style="font-size:25px;color:' +
				((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
				'<span style="font-size:25px;color:silver">%</span></div>'
			},
		tooltip: {
			valueSuffix: ' %'
			}
		}]
	}));
	
var dea_lvl = Highcharts.chart('dea_lvl', Highcharts.merge(gaugeOptions, {
	yAxis: {
		min: 0,
		max: 100,
		title: {
			text: 'Deaerator'
		}
	},
	
	credits: {
		enabled: false
	},
	
	series: [{
		name: 'SS1',
		data: [1],
		dataLabels: {
			format: '<div style="text-align:center"><span style="font-size:25px;color:' +
				((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
				'<span style="font-size:25px;color:silver">%</span></div>'
			},
		tooltip: {
			valueSuffix: ' %'
			}
		}]
	}));	


var ac1_keep_g = Highcharts.chart('ac1_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac1 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);


var ac2_keep_g = Highcharts.chart('ac2_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac2 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);

var ac3_keep_g = Highcharts.chart('ac3_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac3 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);


var ac4_keep_g = Highcharts.chart('ac4_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac4 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);


var ac5_keep_g = Highcharts.chart('ac5_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac5 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);

var ac6_keep_g = Highcharts.chart('ac6_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac6 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);


var ac7_keep_g = Highcharts.chart('ac7_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac7 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);

var ac8_keep_g = Highcharts.chart('ac8_keep_g', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Ac8 Keeping Valve'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: '%'
        },
        plotBands: [{
            from: 0,
            to: 100,
            color: '#55BF3B' // green 55BF3B
        }]
    },

    series: [{
        name: 'Keeping Valve',
        data: [80],
        tooltip: {
            valueSuffix: ' %'
        }
    }]

},
// Add some life
);

//ac1 live chart
var chartac1 = Highcharts.chart('ac1_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac1x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});

	

//ac2 live chart
var chartac2 = Highcharts.chart('ac2_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	

//ac3 live chart
var chartac3 = Highcharts.chart('ac3_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	
	
//ac4 live chart
var chartac4 = Highcharts.chart('ac4_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	
//ac5 live chart
var chartac5 = Highcharts.chart('ac5_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	

//ac6 live chart
var chartac6 = Highcharts.chart('ac6_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	
//ac7 live chart
var chartac7 = Highcharts.chart('ac7_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});

//ac8 live chart
var chartac8 = Highcharts.chart('ac8_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: (function () {var data = [],time = (new Date()).getTime(),i;
			for (i = -599; i <= 0; i += 1) {
				data.push({x: time + i * 1000,y: 0});}
				return data;}()),
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});


	
var socket = io('http://180.250.75.146:4000');
	socket.on('mqtt', function(data){
		var keep, yo;
		if(data.topic == 'ac1_pres'){
			payload_1	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac1_pres').text(val);
		}
		if(data.topic == 'ac1_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac1_temp').text(yo);
			var series1 = chartac1.series[1];
			var series0 = chartac1.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_1)], true, true);
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
		if(data.topic == 'ac1_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac1_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
		}
		if(data.topic == 'ac2_pres'){
			payload_2	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac2_pres').text(val);
		}
		if(data.topic == 'ac2_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac2_temp').text(yo);
			var series1 = chartac2.series[1];
			var series0 = chartac2.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_2)], true, true);
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
		if(data.topic == 'ac2_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac2_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
		}
		if(data.topic == 'ac3_pres'){
			payload_3	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac3_pres').text(val);
		}
		if(data.topic == 'ac3_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac3_temp').text(yo);
			var series1 = chartac3.series[1];
			var series0 = chartac3.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_3)], true, true);
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
		if(data.topic == 'ac3_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac3_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
		}
		if(data.topic == 'ac4_pres'){
			payload_4	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac4_pres').text(val);
		}
		if(data.topic == 'ac4_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac4_temp').text(yo);
			var series1 = chartac4.series[1];
			var series0 = chartac4.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_4)], true, true);
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
		if(data.topic == 'ac4_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac4_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
		}
		if(data.topic == 'ac5_pres'){
			payload_5	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac5_pres').text(val);
		}
		if(data.topic == 'ac5_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac5_temp').text(yo);
			var series1 = chartac5.series[1];
			var series0 = chartac5.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_5)], true, true);
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
		if(data.topic == 'ac5_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac5_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
		}
		if(data.topic == 'ac6_pres'){
			payload_6	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac6_pres').text(val);
		}
		if(data.topic == 'ac6_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac6_temp').text(yo);
			var series1 = chartac6.series[1];
			var series0 = chartac6.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_6)], true, true);
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
		if(data.topic == 'ac6_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac6_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
		}
		if(data.topic == 'ac7_pres'){
			payload_7	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac7_pres').text(val);
		}
		if(data.topic == 'ac7_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac7_temp').text(yo);
			var series1 = chartac7.series[1];
			var series0 = chartac7.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_7)], true, true);
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
		if(data.topic == 'ac7_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac7_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
		}
		if(data.topic == 'ac8_pres'){
			payload_8	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac8_pres').text(val);
		}
		if(data.topic == 'ac8_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac8_temp').text(yo);
			var series1 = chartac8.series[1];
			var series0 = chartac8.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_8)], true, true);
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
		if(data.topic == 'ac8_keep'){
			keep = parseFloat(data.payload/327.67).toFixed(1);
			point = ac8_keep_g.series[0].points[0];
			newVal = parseFloat(keep);
			point.update(newVal);
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
		
		if(data.topic == 'rise'){
			var rise = parseFloat(data.payload/327.67).toFixed();
			point = rise_g.series[0].points[0];
			newVal = parseFloat(rise);
			point.update(newVal);
		}
		
		if(data.topic == 'lvl_cang'){
			var rise = parseFloat(data.payload);
			point = palm_lvl.series[0].points[0];
			newVal = rise;
			point.update(newVal);
		}
		
		if(data.topic == 'vacuum'){
			var rise = parseFloat(data.payload).toFixed(3);
			point = vacum_pres.series[0].points[0];
			newVal = parseFloat(rise);
			point.update(newVal);
		}
		
		if(data.topic == 'lvl_dea'){
			var rise = parseFloat(data.payload);
			point = dea_lvl.series[0].points[0];
			newVal = rise;
			point.update(newVal);
		}
		
		if(data.topic == 'before_eco'){
			var rise = parseFloat(data.payload);
			point = before_eco.series[0].points[0];
			newVal = rise;
			point.update(newVal);
		}
		
		if(data.topic == 'after_eco'){
			var rise = parseFloat(data.payload);
			point = after_eco.series[0].points[0];
			newVal = rise;
			point.update(newVal);
		}
		
});
</script>