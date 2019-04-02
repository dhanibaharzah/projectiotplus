<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Daily Report SRMI
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="box box-danger">
					<form action="<?php echo base_url(); ?>srmi_daily_record" method="POST">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="id_area">Business Unit</label>
									<select id="id_area" name="id_area" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($srmi_bu_member)){ 
											foreach($srmi_bu_member as $record){
										?>
										<option value="<?php echo $record->id; ?>"><?php echo '['.$record->bu_srmi.'] '.$record->plant_srmi; ?></option>
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
								<input for="record_date" autocomplete="off" type="text" name="record_date" id="record_date" class="form-control" placeholder="Date" value="<?php echo $seldate; ?>" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="vol">Break Even Volume (M3)</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input autocomplete="off" type="number" name="breakeven" id="breakeven" class="form-control" placeholder="Break Even" step="0.01" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="vol">Orders Volume (M3)</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input autocomplete="off" type="number" name="order" id="order" class="form-control" placeholder="Order" step="0.01" required/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="vol">Actual Volume (M3)</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input autocomplete="off" type="number" name="actual" id="actual" class="form-control" placeholder="Actual" step="0.01" required/>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" id="up_or_edit" name="up_or_edit">
						<button class="btn btn-sm btn-primary pull-right">Submit</button>
					</div>
					</form>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
			<?php if(!empty($callout)){?>
				<div class="alert alert-<?php echo $color; ?> alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-<?php echo $icon; ?>"></i> <?php echo $title; ?></h4>
					<?php echo $rep_vol.'<br>'; ?>
					<?php echo $text; ?>
				</div>
			<?php } ?>
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
	var datex = $('#record_date').val();
	var linker = '0';
	$(document).ready(function () {
		$("#id_area").select2({
			placeholder: "Please Select"
		});
	});
	$('#id_area').on('change', function(){
		linker = $('#id_area').val();
		request_x_srmi();
	});
	function request_x_srmi(){
		if(linker != '0' && datex != '0'){
			$.ajax({
				url: '<?php echo base_url(); ?>cbm_ajax_srmi/' + linker + '/' + datex,
				success: function(point){
					$('#breakeven').val(point['breakeven']);
					$('#order').val(point['order']);
					$('#actual').val(point['actual']);
					$('#up_or_edit').val(point['up_or_edit']);
				},
				cache: false
			});
		}
	}
	jQuery('#record_date').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true,
		startDate : "2019-01-01",
		endDate : "<?php echo date('Y-m-d')?>"
	});
	$('#record_date').on('changeDate', function (selected) {
		datex = $("#record_date").data('datepicker').getFormattedDate('yyyy-mm-dd');
		request_x_srmi();
		$(this).datepicker('hide');
	});
</script>