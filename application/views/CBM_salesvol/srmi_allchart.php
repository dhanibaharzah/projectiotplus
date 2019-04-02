<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-dashboard"></i> SRMI All Chart
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-xs-12">
				<input for="rec_date" autocomplete="off" type="text" name="rec_date" class="form-control input-sm" id="datepicker1" placeholder="Date" value="<?php echo date('Y-m-d');?>" required/>
			</div>
		</div>
		<div class="row">
	<?php 
		if(!empty($list)){ 
			foreach($list as $record){
	?>
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div id="getdate<?php echo $record->bu_srmi; ?>"></div>
				<script type="text/javascript">
					$('#getdate<?php echo $record->bu_srmi; ?>').load('<?php echo base_url(); ?>srmi_view_chart/' + '<?php echo date('U'); ?>' + '000/' + '<?php echo $record->bu_srmi; ?>' );
				</script>
			</div>
	<?php 
			} 
		}
	?>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="get_summary"></div>
						<script type="text/javascript">
							$('#get_summary').load('<?php echo base_url(); ?>get_srmi_mtd/' + '<?php echo date('U'); ?>' + '000/' );
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>
		
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript">
	jQuery('#datepicker1').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true,
		startDate : "2019-01-01",
		endDate : "<?php echo date('Y-m-d')?>"
	});
	$('#datepicker1').on('changeDate', function (selected) {
		var date = $("#datepicker1").datepicker('getDate');
	<?php 
		if(!empty($list)){ 
			foreach($list as $record){
	?>
		if(!isNaN(date.getTime())){
			$('#getdate<?php echo $record->bu_srmi; ?>').load('<?php echo base_url(); ?>srmi_view_chart/' + date.getTime() + '/'+ '<?php echo $record->bu_srmi; ?>');
			$('#get_summary').load('<?php echo base_url(); ?>get_srmi_mtd/' + date.getTime() );
		}
	<?php 
			} 
		}
	?>
		$(this).datepicker('hide');
	});
</script>