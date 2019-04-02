<div class="content-wrapper">
	<section class="content-header">
		<div class="col-lg-12 text-center">
			<div class="btn-group text-center" align="center">
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/1">AC 1</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/2">AC 2</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/3">AC 3</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/4">AC 4</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/5">AC 5</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/6">AC 6</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/7">AC 7</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/8">AC 8</a>
			</div>
		</div>
		<h1>
			Autoclaves <?php echo $no ?> 
			<small> offline record</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="col-md-10 form-group">
							<h3 class="box-title">Autoclave <?php echo $no ?></h3>
						</div>
						<div class="col-md-2 form-group">
							<input id="datepick" autocomplete="off" type="text" name="toDate" value="" class="form-control" placeholder="End Date"/>
						</div>
					</div>
					<div class="box-body">
						<div id="ac_chart"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	$('#ac_chart').load('<?php echo base_url(); ?>iot_chart_ac/<?php echo $no; ?>/<?php echo date('U'); ?>');
	$('#datepick').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		timePicker: true,
		timePicker12Hour: false,
		timePickerIncrement: 5,
		autoApply: true,
		locale: {
			format: "YYYY-MM-DD HH:mm:ss"
		},
		alwaysShowCalendars: true,
		opens: "left"
	});
	$('#datepick').on('apply.daterangepicker', function(ev, picker) {
		$('#ac_chart').load('<?php echo base_url(); ?>iot_chart_ac/<?php echo $no; ?>/' + picker.startDate.format('X'));
	});
</script>