<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-copy"></i> Materials</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">				
					<div class="box-header">
						<div class="col-md-10 form-group">
							<h3 class="box-title">Record Data</h3>
						</div>
						<div class="col-md-2 form-group">
							<input id="datepick" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body table-responsive no-padding" id="iot_js_mat">
						
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
<script type="text/javascript">
	$('#iot_js_mat').load('<?php echo base_url(); ?>iot_js_mat/<?php echo date('U'); ?>');
	$(function() {
		$('#datepick').daterangepicker({
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
	$('#datepick').on('apply.daterangepicker', function(ev, picker) {
		$('#iot_js_mat').load('<?php echo base_url(); ?>iot_js_mat/' + picker.startDate.format('X'));
	});
</script>
