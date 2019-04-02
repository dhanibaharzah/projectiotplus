<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Daily Cycletime
			<small> offline record</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-7 col-xs-4 form-group">
				<h4 class="text-center" id="data_date"></h4>
			</div>
			<div class="col-md-3 col-xs-4 form-group">
				<h4><span class="pull-right">Select date:</span></h4>
			</div>
			<div class="col-md-2 col-xs-4 form-group">
				<input id="datepick" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Date"/>
			</div>
		</div>
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
				</div>
		</div>
		<div class="row">
			<div class="box box-primary">
				<div class="col-lg-12 col-xs-12">
					<div class="box-body" id="ct_chart"></div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	$('#ct_chart').load('<?php echo base_url(); ?>iot_js_dash_daily/<?php echo date('U'); ?>');
	request_mold();
	request_mix();
	$('#datepick').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		timePicker: false,
		timePicker24Hour: true,
		timePickerIncrement: 5,
		autoApply: true,
		locale: {
			format: "YYYY-MM-DD"
		},
		alwaysShowCalendars: true,
		opens: "left"
	});
	$('#datepick').on('apply.daterangepicker', function(ev, pickerx){
		$('#ct_chart').load('<?php echo base_url(); ?>iot_js_dash_daily/' + pickerx.startDate.format('X'));
		$.ajax({
			url: '<?php echo base_url(); ?>re_ajax_totalup_daily/' + pickerx.startDate.format('X'),
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
		$.ajax({
			url: '<?php echo base_url(); ?>ajax_mixing_daily/' + pickerx.startDate.format('X'),
				success: function(point){
					gauge_mix.value = point;
					$('#mixing').html(point); 
					},
					cache: false
		});
	});
	function request_mix(){
		$.ajax({
			url: '<?php echo base_url(); ?>ajax_mixing_daily/<?php echo date('U'); ?>',
				success: function(point){
					gauge_mix.value = point;
					$('#mixing').html(point); 
					},
					cache: false
		});
	}
	function request_mold() {
		$.ajax({
			url: '<?php echo base_url(); ?>re_ajax_totalup_daily/<?php echo date('U'); ?>',
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
</script>