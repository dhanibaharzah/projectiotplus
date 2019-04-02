<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-dashboard"></i> All Chart
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
				<div id="getdate<?php echo $record->id; ?>"></div>
				<script type="text/javascript">
					$('#getdate<?php echo $record->id; ?>').load('<?php echo base_url(); ?>cbm_view_chart/' + '<?php echo date('U'); ?>' + '000/' + '<?php echo $record->cbm_id; ?>/' + '<?php echo $record->id; ?>' );
				</script>
			</div>
	<?php 
			} 
		}
	?>
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
			$('#getdate<?php echo $record->id; ?>').load('<?php echo base_url(); ?>cbm_view_chart/' + date.getTime() + '/'+ '<?php echo $record->cbm_id; ?>' + '/' + '<?php echo $record->id; ?>');
		}
	<?php 
			} 
		}
	?>
		$(this).datepicker('hide');
	});
</script>