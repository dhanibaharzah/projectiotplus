<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-dashboard"></i> Dashboard
			<small>Control Panel</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-xs-12">
				<div class="form-group">
					<select id="cbm_id" name="cbm_id" class="form-control" required>
						<option value=""></option>
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-xs-12">
				<div class="form-group">
					<select id="prod_id" name="prod_id" class="form-control" required>
						<option value=""></option>
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-xs-12">
				<input for="rec_date" autocomplete="off" type="text" name="rec_date" class="form-control input-sm" id="datepicker1" placeholder="Date" value="<?php echo date('Y-m-d');?>" required/>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div id="getdate"></div>
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
	var linker = 0;
	var linker2 = 0;
	$('#datepicker1').hide();
	<?php if($vendorId > 30001 and $vendorId < 40000){?>
		$('#getdate').load('<?php echo base_url(); ?>cbm_view_chart/' + '<?php echo date('U'); ?>' + '000/' + '<?php echo $prodid->cbm_id; ?>/' + '<?php echo $prodid->id; ?>' );
		$('#prod_id').load('<?php echo base_url(); ?>cbm_prod_sel/<?php echo $vendorId; ?>');
	<?php }else{ ?>
		$('#getdate').load('<?php echo base_url(); ?>cbm_view_chart/' + '<?php echo date('U'); ?>' + '000/' + '30009/' + '11' );
	<?php } ?>
	$('#cbm_id').load('<?php echo base_url(); ?>cbm_factory_sel');
	$("#cbm_id").select2({
		placeholder: "Please Select"
	});
	$("#prod_id").select2({
		placeholder: "Please Select"
	});
	$('#cbm_id').on('change', function(){
		linker = $('#cbm_id').val();
		$('#prod_id').load('<?php echo base_url(); ?>cbm_prod_sel/' + linker );
	});
	$('#prod_id').on('change', function(){
		linker2 = $('#prod_id').val();
		if(linker == ''){
		<?php if($vendorId > 30001 and $vendorId < 40000){?>
			var linker1 = <?php echo $prodid->cbm_id; ?>;
		<?php }else{ ?>
			var linker1 = '30009';
		<?php } ?>
		}else{
			var linker1 = linker;
		}
		$('#getdate').load('<?php echo base_url(); ?>cbm_view_chart/' + '<?php echo date('U'); ?>' + '000/' + linker1 + '/' + linker2 );
		$('#datepicker1').show();
	});
	jQuery('#datepicker1').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true,
		startDate : "2019-01-01",
		endDate : "<?php echo date('Y-m-d')?>"
	});
	$('#datepicker1').on('changeDate', function (selected) {
		var date = $("#datepicker1").datepicker('getDate');
		if(linker == ''){
		<?php if($vendorId > 30001 and $vendorId < 40000){?>
			var linker1 = <?php echo $prodid->cbm_id; ?>;
		<?php }else{ ?>
			var linker1 = '30009';
		<?php } ?>
		}else{
			var linker1 = linker;
		}
		if(!isNaN(date.getTime())){
			$('#getdate').load('<?php echo base_url(); ?>cbm_view_chart/' + date.getTime() + '/'+ linker1 + '/' + linker2);
		}
		$(this).datepicker('hide');
	});
</script>

