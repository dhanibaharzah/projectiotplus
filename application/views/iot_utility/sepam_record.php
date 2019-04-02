<div class="content-wrapper">
	<section class="content-header">
		<div class="col-lg-12 text-center">
			<div class="btn-group text-center" align="center">
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>iot_sepam_record/2">QMC 2</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>iot_sepam_record/3">QMC 3</a>
			</div>
		</div>
		<h1>
			SEPAM 6kV QMC-<?php echo $no ?> 
			<small> offline record</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="col-md-10 form-group">
							<h3 class="box-title">SEPAM 6kV QMC-<?php echo $no ?></h3>
						</div>
                        <div class="col-md-2 form-group">
							<input id="datepick" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="abc_chart" style="height: 350px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	$('#abc_chart').load('<?php echo base_url(); ?>iot_sepam_table/<?php echo $no; ?>/<?php echo date('U'); ?>');
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
	$('#datepick').on('apply.daterangepicker', function(ev, picker){
		$('#abc_chart').load('<?php echo base_url(); ?>iot_sepam_table/<?php echo $no; ?>/' + picker.startDate.format('X'));
	});
</script>
