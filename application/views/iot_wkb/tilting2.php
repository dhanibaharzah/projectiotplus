<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Tilting 2
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div id="iot_js_tilting2_1" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_2" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_3" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_4" class="col-md-3 col-xs-12"></div>
				</div>
				<div class="row">
					<div id="iot_js_tilting2_5" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_6" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_7" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_8" class="col-md-3 col-xs-12"></div>
				</div>
			</div>
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
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="col-md-9">
							<h4>Transport Loader <small>Show last 150 data before selected time</small></h4>
						</div>
						<div class="col-md-3 form-group">
							<input id="daterange2" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Observe by Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="data2"></div>
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
		$('#data1').load('<?php echo base_url(); ?>iot_tilting2_fcw/' + picker.startDate.format('X'));
	});
	$('#daterange2').daterangepicker({
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
	$('#daterange2').on('apply.daterangepicker', function(ev, picker){
		$('#data2').load('<?php echo base_url(); ?>iot_tilting2_tl/' + picker.startDate.format('X'));
	});
	$('#iot_js_tilting2_1').load('<?php echo base_url(); ?>iot_js_tilting2_1');
	$('#iot_js_tilting2_2').load('<?php echo base_url(); ?>iot_js_tilting2_2');
	$('#iot_js_tilting2_3').load('<?php echo base_url(); ?>iot_js_tilting2_3');
	$('#iot_js_tilting2_4').load('<?php echo base_url(); ?>iot_js_tilting2_4');
	$('#iot_js_tilting2_5').load('<?php echo base_url(); ?>iot_js_tilting2_5');
	$('#iot_js_tilting2_6').load('<?php echo base_url(); ?>iot_js_tilting2_6');
	$('#iot_js_tilting2_7').load('<?php echo base_url(); ?>iot_js_tilting2_7');
	$('#iot_js_tilting2_8').load('<?php echo base_url(); ?>iot_js_tilting2_8');
</script>