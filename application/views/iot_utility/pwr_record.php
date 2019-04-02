<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Power Meter 0.4kV
			<small> offline record</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="col-md-10 form-group">
							Power Consumption
						</div>
                        <div class="col-md-2 form-group">
							<input id="datepick" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="pwr_chart" style="height: 350px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	$('#pwr_chart').load('<?php echo base_url(); ?>iot_main_pwr_table/<?php echo date('U'); ?>');
	$('#datepick').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		timePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 5,
		autoApply: true,
		locale: {
			format: "YYYY-MM-DD HH:mm:ss"
		},
		alwaysShowCalendars: true,
		opens: "left"
	});
	$('#datepick').on('apply.daterangepicker', function(ev, pickerx){
		$('#pwr_chart').load('<?php echo base_url(); ?>iot_main_pwr_table/' + pickerx.startDate.format('X'));
	});
</script>
