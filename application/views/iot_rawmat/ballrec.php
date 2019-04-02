<div class="content-wrapper">
	<section class="content-header">
		<div class="col-lg-12 text-center">
			<div class="btn-group text-center" align="center">
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ballrec/2">Ballmill 2</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ballrec/3">Ballmill 3</a>
			</div>
		</div>
		<h1>
			Ballmill <?php echo $no; ?>
			<small> offline record</small>
		</h1>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="col-md-10 form-group">
							<h3 class="box-title">Ballmill</h3>
						</div>
						<div class="col-md-2 form-group">
							<input id="datepickbm" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="bc_chart" style="height: 350px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	$('#bc_chart').load('<?php echo base_url(); ?>iot_ballrec_chart/<?php echo $no; ?>/<?php echo date('U'); ?>');
	$('#datepickbm').daterangepicker({
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
	$('#datepickbm').on('apply.daterangepicker', function(ev, picker) {
		$('#bc_chart').load('<?php echo base_url(); ?>iot_ballrec_chart/<?php echo $no; ?>/' + picker.startDate.format('X'));
	});
</script>