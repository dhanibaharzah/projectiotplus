<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Tilting 1
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div id="iot_js_tilting1_1" class="col-md-3 col-xs-12"></div>
			<div id="iot_js_tilting1_2" class="col-md-3 col-xs-12"></div>
			<div id="iot_js_tilting1_3" class="col-md-3 col-xs-12"></div>
			<div id="iot_js_tilting1_4" class="col-md-3 col-xs-12"></div>
		</div>
		<div class="row">
			<div id="iot_js_tilting1_5" class="col-md-3 col-xs-12"></div>
			<div id="iot_js_tilting1_6" class="col-md-3 col-xs-12"></div>
			<div id="iot_js_tilting1_7" class="col-md-3 col-xs-12"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="col-md-9">
							<h4>Friction Wheel <small>Show last 150 data before selected time</small></h4>
						</div>
						<div class="col-md-3 form-group">
							<input id="daterange1" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Observe by Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="data1"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	$('#daterange1').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		timePicker: true,
		timePicker12Hour: false,
		timePickerIncrement: 5,
		autoApply: true,
		locale: {
			format: "YYYY-MM-DD"
		},
		alwaysShowCalendars: true,
		opens: "left"
	});
	$('#daterange1').on('apply.daterangepicker', function(ev, picker){
		$('#data1').load('<?php echo base_url(); ?>iot_tilting1_fcw/' + picker.startDate.format('X'));
	});
	$('#iot_js_tilting1_1').load('<?php echo base_url(); ?>iot_js_tilting1_1');
	$('#iot_js_tilting1_2').load('<?php echo base_url(); ?>iot_js_tilting1_2');
	$('#iot_js_tilting1_3').load('<?php echo base_url(); ?>iot_js_tilting1_3');
	$('#iot_js_tilting1_4').load('<?php echo base_url(); ?>iot_js_tilting1_4');
	$('#iot_js_tilting1_5').load('<?php echo base_url(); ?>iot_js_tilting1_5');
	$('#iot_js_tilting1_6').load('<?php echo base_url(); ?>iot_js_tilting1_6');
	$('#iot_js_tilting1_7').load('<?php echo base_url(); ?>iot_js_tilting1_7');
	
</script>