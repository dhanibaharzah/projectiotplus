<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Forecast
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="box box-danger">
					<div class="box-header">
						<h4 class="box-title"><?php echo $cbm_name; ?></h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="prod">Product</label>
									<select id="prod" name="prod_id" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($prod)){ 
											foreach($prod as $record){
										?>
										<option value="<?php echo $record->id; ?>"><?php echo $record->prod_name; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="rec_date">Selected Date</label>
								</div>
							</div>
							<div class="col-md-6 form-group">
								<input for="rec_date" autocomplete="off" type="text" name="rec_date" class="form-control" id="datepicker1" placeholder="Date" value="<?php echo $seldate;?>" required/>
							</div>
						</div>
						<div class="row">
							<div id="getdate"></div>
						</div>
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
<script>
	$('#datepicker1').hide();
	var linker = 0;
	$("#prod").select2({
		placeholder: "Please Select"
	});
	$('#prod').on('change', function(){
		linker = $('#prod').val();
		$('#datepicker1').show();
	});
	jQuery('#datepicker1').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true
	});
	$('#datepicker1').on('changeDate', function (selected) {
		var date = $("#datepicker1").datepicker('getDate');
		$('#getdate').load('<?php echo base_url(); ?>cbm_js_date_forecast/' + date.getTime() + '/'+ linker);
		$(this).datepicker('hide');
	});
	
</script>