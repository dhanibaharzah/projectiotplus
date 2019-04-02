<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-clock-o" aria-hidden="true"></i> Current CT: <span id="iot_curct">-</span> 
			<small>Session <?php echo $ses; ?></small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="row">
				<div class="col-lg-2 col-xs-6">
					<div class="text-center inner">
						<canvas id="gauge_rate"></canvas>
						<h4><b><span id="rate"></span></b> Mold/h<br><small>Rate for <b><span id="duran"></span></b> hours</small></h4>
					</div>	
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="text-center inner">
						<canvas id="gauge_mix"></canvas>
						<h4><b><span id="mixing"></span></b> Mold<br><small>Mixing</small></h4>
					</div>	
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="text-center inner">
						<canvas id="gauge_cut"></canvas>
						<h4><b><span id="moldtoday"></span></b> Mold<br><small>Cutting</small></h4>
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="text-center inner">
						<canvas id="gauge_dt"></canvas>
						<h4><b><span id="dtime"></span></b> Mins<br><small>Downtime</small></h4>
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-orange">
						<div class="inner">
							<h3><span id="slowspeed"></span></h3>
							<p>Slow Speed</p>
						</div>
						<div class="icon">
							<i class="fa fa-minus"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-green">
						<div class="inner">
							<h3><span id="planstop"></span></h3>
							<p>Planed Stop</p>
						</div>
						<div class="icon">
							<i class="fa fa-check"></i>
						</div>
					</div>
					<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-warning"></i> Alarm Log (<span id="error_log"></span>)</button>
					<div class="modal modal-default fade" id="add_new">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Error Log (PLC Data)</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body" id="error_list">
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="row">
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<h5 class="description-header"><span id="rate_mov_buf"></span> Mold/h</h5>
									<span class="description-text">MTD Rate</span>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<h5 class="description-header"><span id="mold_mov_buf"></span> Mold</h5>
									<span class="description-text">MTD Mold</span>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<h5 class="description-header"><span id="downtime_mov_buf"></span> Mins</h5>
									<span class="description-text">MTD Downtime</span>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<h5 class="description-header"><span id="slowspeed_mov_buf"></span> Mins</h5>
									<span class="description-text">MTD Slowspeed</span>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<h5 class="description-header"><span id="durasi_tot"></span> Hours</h5>
									<span class="description-text">Total Runs</span>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<h5 class="description-header"><a href="<?php echo base_url(); ?>cycdaily" class="btn btn-xs btn-block btn-success"> Daily Record</a></h5>
									<h5 class="description-header"><a href="<?php echo base_url(); ?>cycmonthly" class="btn btn-xs btn-block btn-primary"> Monthly Record</a></h5>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body" id="dtchart"></div>
					
				</div>
			</div>
			
		</div>
	</section>
</div>
<script>
	$( document ).ready(function(){
		request_mtd();
		request_mix();
		request_mold();
		$('#dtchart').load('<?php echo base_url(); ?>iot_js_dash');
	});
	
	function request_mold() {
		$.ajax({
			url: '<?php echo base_url(); ?>re_ajax_totalup',
				success: function(point){
					gauge_cut.value = point['mold'];
					gauge_rate.value = point['rate'];
					gauge_dt.value = point['dt'];
					$('#moldtoday').html(point['mold']);
					$('#rate').html(point['rate']);
					$('#slowspeed').html(point['ss']);
					$('#dtime').html(point['dt']);
					$('#duran').html(point['durasi']);
					$('#planstop').html(point['ps']);
					},
					cache: false
		});
	}
	function request_mix() {
		$.ajax({
			url: '<?php echo base_url(); ?>ajax_mixing',
				success: function(point){
					gauge_mix.value = point;
					$('#mixing').html(point); 
					},
					cache: false
		});
	}
	function request_mtd() {
		$.ajax({
			url: '<?php echo base_url(); ?>iot_js_cycmtd',
				success: function(point){
					$('#rate_mov_buf').html(point['rate_mov_buf']);
					$('#mold_mov_buf').html(point['mold_mov_buf']);
					$('#downtime_mov_buf').html(point['downtime_mov_buf']);
					$('#slowspeed_mov_buf').html(point['slowspeed_mov_buf']);
					$('#plannedstop_tot1').html(point['plannedstop_tot1']);
					$('#plannedstop_tot2').html(point['plannedstop_tot2']); 
					$('#durasi_tot').html(point['durasi_tot']); 
					$('#mold_tot').html(point['mold_tot']); 
					},
					cache: false
		});
	}


	var gauge_rate = new RadialGauge({
		renderTo: 'gauge_rate',
		width: 150,
		height: 150,
		units: "mold/h",
		minValue: 0,
		maxValue: <?php echo $gauge_rate_3; ?>,
		valueBox: false,
		majorTicks: ["0","1","2","3","4","5","6","7","8","9","10","11","12","13"],
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
				{
					"from": 0, "to": <?php echo $gauge_rate_1; ?>,
					"color": "#ff6363" //RED
				},{
					"from": <?php echo $gauge_rate_1; ?>, "to": <?php echo $gauge_rate_2; ?>,
					"color": "rgb(244, 229, 66)" //YELLOW
				},{
					"from": <?php echo $gauge_rate_2; ?>, "to": <?php echo $gauge_rate_3; ?>,
					"color": "rgb(86, 244, 65)" //GREEN
				}
			],
		colorPlate: "#fff",
		borderShadowWidth: 0,
		borders: false,
		needleType: "arrow",
		needleWidth: 2,
		needleCircleSize: 7,
		needleCircleOuter: true,
		needleCircleInner: false,
		animationDuration: 1000,
		animationRule: "linear"
	}).draw();
	var gauge_mix = new RadialGauge({
		renderTo: 'gauge_mix',
		width: 150,
		height: 150,
		units: "mold",
		minValue: 0,
		maxValue: <?php echo $gauge_mix_3; ?>,
		valueBox: false,
		majorTicks: ["0","50","100","150","200","250"],
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
				{
					"from": 0, "to": <?php echo $gauge_mix_1; ?>,
					"color": "#ff6363" //RED
				},{
					"from": <?php echo $gauge_mix_1; ?>, "to": <?php echo $gauge_mix_2; ?>,
					"color": "rgb(244, 229, 66)" //YELLOW
				},{
					"from": <?php echo $gauge_mix_2; ?>, "to": <?php echo $gauge_mix_3; ?>,
					"color": "rgb(86, 244, 65)" //GREEN
				}
			],
		colorPlate: "#fff",
		borderShadowWidth: 0,
		borders: false,
		needleType: "arrow",
		needleWidth: 2,
		needleCircleSize: 7,
		needleCircleOuter: true,
		needleCircleInner: false,
		animationDuration: 1000,
		animationRule: "linear"
	}).draw();
	var gauge_cut = new RadialGauge({
		renderTo: 'gauge_cut',
		width: 150,
		height: 150,
		units: "mold",
		minValue: 0,
		maxValue: <?php echo $gauge_cut_3; ?>,
		valueBox: false,
		majorTicks: ["0","50","100","150","200","250"],
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
				{
					"from": 0, "to": <?php echo $gauge_cut_1; ?>,
					"color": "#ff6363" //RED
				},{
					"from": <?php echo $gauge_cut_1; ?>, "to": <?php echo $gauge_cut_2; ?>,
					"color": "rgb(244, 229, 66)" //YELLOW
				},{
					"from": <?php echo $gauge_cut_2; ?>, "to": <?php echo $gauge_cut_3; ?>,
					"color": "rgb(86, 244, 65)" //GREEN
				}
			],
		colorPlate: "#fff",
		borderShadowWidth: 0,
		borders: false,
		needleType: "arrow",
		needleWidth: 2,
		needleCircleSize: 7,
		needleCircleOuter: true,
		needleCircleInner: false,
		animationDuration: 1000,
		animationRule: "linear"
	}).draw();
	var gauge_dt = new RadialGauge({
		renderTo: 'gauge_dt',
		width: 150,
		height: 150,
		units: "Mins",
		minValue: 0,
		maxValue: <?php echo $gauge_dt_3; ?>,
		valueBox: false,
		majorTicks: ["0","30","60","90","120","150","180"],
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
				{
					"from": 0, "to": <?php echo $gauge_dt_1; ?>,
					"color": "rgb(86, 244, 65)" //GREEN
				},{
					"from": <?php echo $gauge_dt_1; ?>, "to": <?php echo $gauge_dt_2; ?>,
					"color": "rgb(244, 229, 66)" //YELLOW
				},{
					"from": <?php echo $gauge_dt_2; ?>, "to": <?php echo $gauge_dt_3; ?>,
					"color": "#ff6363" //RED
				}
			],
		colorPlate: "#fff",
		borderShadowWidth: 0,
		borders: false,
		needleType: "arrow",
		needleWidth: 2,
		needleCircleSize: 7,
		needleCircleOuter: true,
		needleCircleInner: false,
		animationDuration: 1000,
		animationRule: "linear"
	}).draw();
	
	setInterval(function(){
		request_mix();
		request_mold();
	}, 5000);
	setInterval(function(){
		$('#iot_curct').load('<?php echo base_url(); ?>iot_curct').fadeIn("slow");
	}, 3000)
	$('#error_log').load('<?php echo base_url(); ?>get_error_count');
	$('#error_list').load('<?php echo base_url(); ?>iot_ct_cutting_error_log');
	setInterval(function(){
		$('#error_log').load('<?php echo base_url(); ?>get_error_count');
		$('#error_list').load('<?php echo base_url(); ?>iot_ct_cutting_error_log');
	}, 60000)
</script>
