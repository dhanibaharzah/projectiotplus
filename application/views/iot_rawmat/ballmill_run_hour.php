<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Ballmill's Running Hour
			<small> offline record</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-10 col-xs-4 form-group">
				<h4><span class="pull-right">Select date:</span></h4>
			</div>
			<div class="col-md-2 col-xs-4 form-group">
				<input id="datepick" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="Date"/>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div id="run_chart"></div>
			</div>
		</div>
	</section>
</div>


<script>
	$('#run_chart').load('<?php echo base_url(); ?>iot_js_hour_balmill/<?php echo date('U'); ?>');
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
		$('#run_chart').load('<?php echo base_url(); ?>iot_js_hour_balmill/' + pickerx.startDate.format('X'));
	});
</script>