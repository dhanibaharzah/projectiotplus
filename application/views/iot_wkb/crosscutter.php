<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Cross Cutter
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div id="iot_js_crosscutter_1" class="col-md-4 col-xs-12"></div>
			<div id="iot_js_crosscutter_2" class="col-md-4 col-xs-12"></div>
			<div id="iot_js_crosscutter_3" class="col-md-4 col-xs-12"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="col-md-9">
							<h4>Cutter Drive <small>Show last 150 data before selected time</small></h4>
						</div>
						<div class="col-md-3 form-group">
							<input id="daterange1" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Observe by Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="crosscut1"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="col-md-9">
							<h4>Lifting Unit <small>Show last 150 data before selected time</small></h4>
						</div>
						<div class="col-md-3 form-group">
							<input id="daterange2" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Observe by Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="crosscut2"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="col-md-9">
							<h4>Vacuum <small>Show last 150 data before selected time</small></h4>
						</div>
						<div class="col-md-3 form-group">
							<input id="daterange3" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Observe by Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="crosscut3"></div>
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
	$('#daterange1').on('apply.daterangepicker', function(ev, picker) {
		$('#crosscut1').load('<?php echo base_url(); ?>iot_crosscutter_t/' + picker.startDate.format('X'));
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
	$('#daterange2').on('apply.daterangepicker', function(ev, picker) {
		$('#crosscut2').load('<?php echo base_url(); ?>iot_crosscutter_u/' + picker.startDate.format('X'));
	});
	$('#daterange3').daterangepicker({
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
	$('#daterange3').on('apply.daterangepicker', function(ev, picker) {
		$('#crosscut3').load('<?php echo base_url(); ?>iot_crosscutter_v/' + picker.startDate.format('X'));
	});
	$('#iot_js_crosscutter_1').load('<?php echo base_url(); ?>iot_js_crosscutter_1');
	$('#iot_js_crosscutter_2').load('<?php echo base_url(); ?>iot_js_crosscutter_2');
	$('#iot_js_crosscutter_3').load('<?php echo base_url(); ?>iot_js_crosscutter_3');
</script>