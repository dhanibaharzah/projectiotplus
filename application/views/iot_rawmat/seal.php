<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-copy"></i> Water Sealing</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">				
					<div class="box-header">
						<div class="col-md-6 form-group">
							<h3 class="box-title">Weighting Pump</h3>
						</div>
						<div class="col-md-6 form-group">
							<input id="datepick1" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body table-responsive no-padding" id="iot_js_seal_weight">
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">				
					<div class="box-header">
						<div class="col-md-6 form-group">
							<h3 class="box-title">Slush Pump</h3>
						</div>
						<div class="col-md-6 form-group">
							<input id="datepick2" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body table-responsive no-padding" id="iot_js_seal_slush">
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">				
					<div class="box-header">
						<div class="col-md-6 form-group">
							<h3 class="box-title">Return Slurry Transfer</h3>
						</div>
						<div class="col-md-6 form-group">
							<input id="datepick3" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body table-responsive no-padding" id="iot_js_seal_retslu">
						
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
<script type="text/javascript">
	$('#iot_js_seal_weight').load('<?php echo base_url(); ?>iot_js_seal_weight/<?php echo date('U'); ?>');
	$('#iot_js_seal_slush').load('<?php echo base_url(); ?>iot_js_seal_slush/<?php echo date('U'); ?>');
	$('#iot_js_seal_retslu').load('<?php echo base_url(); ?>iot_js_seal_retslu/<?php echo date('U'); ?>');
	$(function() {
		$('#datepick1').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			showWeekNumbers: false,
			timePicker: true,
			timePickerIncrement: 15,
			timePicker24Hour: true,
			alwaysShowCalendars: false,
			locale:{
				format: 'YYYY-MM-DD HH:mm:ss'
			},
			opens: 'left'
		});
	});
	$('#datepick1').on('apply.daterangepicker', function(ev, picker) {
		$('#iot_js_seal_weight').load('<?php echo base_url(); ?>iot_js_seal_weight/' + picker.startDate.format('X'));
	});
	$(function() {
		$('#datepick2').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			showWeekNumbers: false,
			timePicker: true,
			timePickerIncrement: 15,
			timePicker24Hour: true,
			alwaysShowCalendars: false,
			locale:{
				format: 'YYYY-MM-DD HH:mm:ss'
			},
			opens: 'left'
		});
	});
	$('#datepick2').on('apply.daterangepicker', function(ev, picker) {
		$('#iot_js_seal_slush').load('<?php echo base_url(); ?>iot_js_seal_slush/' + picker.startDate.format('X'));
	});
	$(function() {
		$('#datepick3').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			showWeekNumbers: false,
			timePicker: true,
			timePickerIncrement: 15,
			timePicker24Hour: true,
			alwaysShowCalendars: false,
			locale:{
				format: 'YYYY-MM-DD HH:mm:ss'
			},
			opens: 'left'
		});
	});
	$('#datepick3').on('apply.daterangepicker', function(ev, picker) {
		$('#iot_js_seal_retslu').load('<?php echo base_url(); ?>iot_js_seal_retslu/' + picker.startDate.format('X'));
	});
</script>
