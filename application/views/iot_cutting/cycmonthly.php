<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Monthly Cycletime
			<small> offline record</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 form-group">
				<h5 class="text-center">Select Date Here:</h5>
				<input id="datepick" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Date"/>
				<h5 class="text-center">Selected Session:</h5>
				<h4 class="text-center" id="data_date"></h4>
				<p>*(all chart)Average value is not calculated during 24h planned stop</p>
			</div>
			<div class="col-lg-2 col-xs-6">
				<div class="text-center inner">
					<canvas id="gauge_rate"></canvas>
					<h4><b><span id="rate_mov_buf"></span></b> Mold/h</h4>
					<p>Rate</p>
				</div>	
			</div>
			<div class="col-lg-2 col-xs-6">
				<div class="text-center inner">
					<canvas id="gauge_cut"></canvas>
					<h4><b><span id="mold_mov_buf"></span></b> Mold</h4>
					<p>Cutting</p>
				</div>
			</div>
			<div class="col-lg-2 col-xs-6">
				<div class="text-center inner">
					<canvas id="gauge_dt"></canvas>
					<h4><b><span id="downtime_mov_buf"></span></b> Mins</h4>
					<p>Downtime</p>
				</div>
			</div>
			<div class="col-md-3 form-group">
				<h4>Calculator Setting</h4>
				<p id="notes"></p>
				<small>*Indicate calculator parameter to identify downtime and start hour each day. Change it via setting tab on right sidebar</small>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div id="oee_chart" style="height: 350px; margin: 0 auto"></div>
			</div>
		</div>
	</section>
</div>


<script>
	$('#oee_chart').load('<?php echo base_url(); ?>iot_js_cyc_data/<?php echo date('U'); ?>');
	request_mtd();
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
		$('#oee_chart').load('<?php echo base_url(); ?>iot_js_cyc_data/' + pickerx.startDate.format('X'));
		$.ajax({
			url: '<?php echo base_url(); ?>iot_js_cycmtd/' + pickerx.startDate.format('X'),
				success: function(point){
					gauge_rate.value = point['rate_mov_buf'];
					gauge_cut.value = point['mold_mov_buf'];
					gauge_dt.value = point['downtime_mov_buf'];
					$('#rate_mov_buf').html(point['rate_mov_buf']);
					$('#mold_mov_buf').html(point['mold_mov_buf']);
					$('#downtime_mov_buf').html(point['downtime_mov_buf']);
					$('#data_date').html(point['data_date']);
					$('#notes').html(point['notes']);
					},
					cache: false
		});
	});
	function request_mtd(){
		$.ajax({
			url: '<?php echo base_url(); ?>iot_js_cycmtd',
				success: function(point){
					gauge_rate.value = point['rate_mov_buf'];
					gauge_cut.value = point['mold_mov_buf'];
					gauge_dt.value = point['downtime_mov_buf'];
					$('#rate_mov_buf').html(point['rate_mov_buf']);
					$('#mold_mov_buf').html(point['mold_mov_buf']);
					$('#downtime_mov_buf').html(point['downtime_mov_buf']);
					$('#data_date').html(point['data_date']);
					$('#notes').html(point['notes']);
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