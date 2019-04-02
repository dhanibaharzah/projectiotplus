<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Boiler and Autoclave
			<small> realtime monitor</small>
		</h1>
	</section>
    
	<section class="content">
		<a href="<?php echo base_url(); ?>/boilerplc" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record Check</a>
		<div class="row">
			<div class="col-md-1 col-xs-12 text-center">
				<canvas id="boiler_water_level"></canvas>
				<small>Boiler Lvl <b><span id="collvl1"></span></b> %</small>
			</div>
			<div class="col-md-10 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="iot_js_boiler_gauge"></div>
				</div>
				<div class="row">
					<div class="col-md-3 col-xs-12" id="iot_js_bed"></div>
					<div class="col-md-3 col-xs-12" id="iot_js_feed"></div>
					<div class="col-md-3 col-xs-12" id="iot_js_fan"></div>
					<div class="col-md-3 col-xs-12" id="iot_js_dea"></div>
				</div>
			</div>
			<div class="col-md-1 col-xs-12 text-center">
				<canvas id="feed_water_level"></canvas>
				<small>Feed Lvl <b><span id="collvl2"></span></b> %</small>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_1" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/1" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_2" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/2" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_3" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/3" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_4" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/4" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_5" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/5" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div><div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_6" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/6" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_7" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/7" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="iot_js_ac_8" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>/ac/8" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Record</a>
					</div>
				</div>
			</div>
		</div>
		
	</section>
</div>



<script>
	var boiler_water_level = new LinearGauge({
	renderTo: 'boiler_water_level',
	width: 100,
	height: 300,
	units: "%",
	valueBox: false,
	minValue: 0,
	maxValue: 100,
	majorTicks: ["0","20","40","60","80","100"],
	minorTicks: 2,
	strokeTicks: true,
	highlights: [
		{
			"from": 0,
			"to": 60,
			"color": "#e21d1d"
		},{
			"from": 60,
			"to": 90,
			"color": "#fffb2d"
		},{
			"from": 90,
			"to": 100,
			"color": "#25dd35"
		}
	],
	colorPlate: "#fff",
	borderShadowWidth: 0,
	borders: false,
	needleType: "arrow",
	needleWidth: 2,
	animationDuration: 500,
	animationRule: "linear",
	tickSide: "left",
	numberSide: "left",
	needleSide: "left",
	barStrokeWidth: 3,
	barBeginCircle: false,
	colorBarProgress: "#248add",
	value: 75
}).draw();
var feed_water_level = new LinearGauge({
	renderTo: 'feed_water_level',
	width: 100,
	height: 300,
	units: "%",
	valueBox: false,
	minValue: 0,
	maxValue: 100,
	majorTicks: ["0","20","40","60","80","100"],
	minorTicks: 2,
	strokeTicks: true,
	highlights: [
		{
			"from": 0,
			"to": 60,
			"color": "#e21d1d"
		},{
			"from": 60,
			"to": 90,
			"color": "#fffb2d"
		},{
			"from": 90,
			"to": 100,
			"color": "#25dd35"
		}
	],
	colorPlate: "#fff",
	borderShadowWidth: 0,
	borders: false,
	needleType: "arrow",
	needleWidth: 2,
	animationDuration: 500,
	animationRule: "linear",
	tickSide: "left",
	numberSide: "left",
	needleSide: "left",
	barStrokeWidth: 3,
	barBeginCircle: false,
	colorBarProgress: "#248add",
	value: 75
}).draw();

	$('#iot_js_ac_1').load('<?php echo base_url(); ?>iot_js_ac/1');
	$('#iot_js_ac_2').load('<?php echo base_url(); ?>iot_js_ac/2');
	$('#iot_js_ac_3').load('<?php echo base_url(); ?>iot_js_ac/3');
	$('#iot_js_ac_4').load('<?php echo base_url(); ?>iot_js_ac/4');
	$('#iot_js_ac_5').load('<?php echo base_url(); ?>iot_js_ac/5');
	$('#iot_js_ac_6').load('<?php echo base_url(); ?>iot_js_ac/6');
	$('#iot_js_ac_7').load('<?php echo base_url(); ?>iot_js_ac/7');
	$('#iot_js_ac_8').load('<?php echo base_url(); ?>iot_js_ac/8');
	$('#iot_js_boiler_gauge').load('<?php echo base_url(); ?>iot_js_boiler_gauge');
	$('#iot_js_bed').load('<?php echo base_url(); ?>iot_js_bed');
	$('#iot_js_feed').load('<?php echo base_url(); ?>iot_js_feed');
	$('#iot_js_fan').load('<?php echo base_url(); ?>iot_js_fan');
	$('#iot_js_dea').load('<?php echo base_url(); ?>iot_js_dea');
	
	request_ajax_bolier_rt();
	setInterval(function(){
		request_ajax_bolier_rt();
    }, 30000)

    function request_ajax_bolier_rt() {
		$.ajax({
			url: '<?php echo base_url(); ?>iot_ajax_bolier_rt',
			success: function(point){
                $('#collvl1').html(point['lvl1']);
                boiler_water_level.value = point['lvl1'];
                $('#collvl2').html(point['lvl2']);
                feed_water_level.value = point['lvl2'];
            },
            cache: false
		});
	}  
</script>