<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Trolley
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div id="iot_js_trolley_1" class="col-md-6 col-xs-12"></div>
			<div id="iot_js_trolley_2" class="col-md-6 col-xs-12"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="col-md-9">
							<h4>Trolley 1 <small>Show last 150 data before selected time</small></h4>
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
							<h4>Trolley 2 <small>Show last 150 data before selected time</small></h4>
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
	$('#daterange1').on('apply.daterangepicker', function(ev, picker) {
		$('#data1').load('<?php echo base_url(); ?>iot_trolley_1/' + picker.startDate.format('X'));
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
		$('#data2').load('<?php echo base_url(); ?>iot_trolley_2/' + picker.startDate.format('X'));
	});
	$('#iot_js_trolley_1').load('<?php echo base_url(); ?>iot_js_trolley_1');
	$('#iot_js_trolley_2').load('<?php echo base_url(); ?>iot_js_trolley_2');
</script>