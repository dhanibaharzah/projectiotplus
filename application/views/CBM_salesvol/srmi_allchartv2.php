<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-dashboard"></i> SRMI All Chart v2
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-xs-12">
				<input for="rec_date" autocomplete="off" type="text" name="rec_date" class="form-control input-sm" id="datepicker1" placeholder="Date" value="<?php echo date('Y-m-d');?>" required/>
			</div>
			<div class="col-lg-4 col-md-4 col-xs-12">
				<input for="to_date" autocomplete="off" type="text" name="to_date" class="form-control input-sm" id="datepicker2" placeholder="Date" value="<?php echo date('Y-m-d');?>" required/>
			</div>
			<div class="col-lg-4 col-md-4 col-xs-12">
				<button id="cekchart" class="btn btn-success btn-sm" onclick="load_chartx()"><i class="fa fa-check"></i> Submit</button>
			</div>
			<div id="warn_box" class="col-lg-12 col-md-12 col-xs-12">
				<div class="callout callout-danger">
					<h4>Dont Leave Date Selection with empty value!</h4>
				</div>
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
					$('#getdate<?php echo $record->bu_srmi; ?>').load('<?php echo base_url(); ?>srmi_view_chartv2/' + '<?php echo date('Y-m-d'); ?>' + '/' + '<?php echo date('Y-m-d'); ?>' + '/' + '<?php echo $record->bu_srmi; ?>' );
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
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="get_map"></div>
						<script type="text/javascript">
							$('#get_map').load('<?php echo base_url(); ?>line_srmi_map/' + '<?php echo date('Y-m-d'); ?>' + '/' + '<?php echo date('Y-m-d'); ?>');
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
	$('#warn_box').hide();
	jQuery('#datepicker1').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true,
		startDate : "2019-01-01",
		endDate : "<?php echo date('Y-m-d')?>"
	});
	jQuery('#datepicker2').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true,
		startDate : "2019-01-01",
		endDate : "<?php echo date('Y-m-d')?>"
	});
	
	function load_chartx(){
		$('#warn_box').hide();
		var date1 = $('#datepicker1').val();
		var date2 = $('#datepicker2').val();
		<?php 
			if(!empty($list)){ 
				foreach($list as $record){
		?>
			if(date1 != '' && date2 != ''){
				$('#getdate<?php echo $record->bu_srmi; ?>').load('<?php echo base_url(); ?>srmi_view_chartv2/' + date1 + '/'+ date2 + '/'+ '<?php echo $record->bu_srmi; ?>');
				$('#get_summary').load('<?php echo base_url(); ?>get_srmi_mtdv2/' + date2 );
				$('#get_map').load('<?php echo base_url(); ?>line_srmi_map/' + date1 + '/' + date2);
			}
		<?php 
				} 
			}
		?>
		if(date1 == '' || date2 == ''){
			$('#warn_box').show();
		}
	}
</script>