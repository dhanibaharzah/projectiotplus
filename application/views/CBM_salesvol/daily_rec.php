<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Daily Report
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="box box-danger">
					<div class="box-header">
						<h4 class="box-title"><?php echo $cbm_name; ?></h4>
					</div>
					<form action="<?php echo base_url(); ?>cbm_daily_record" method="POST">
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
										<option value="<?php echo $record->id; ?>" <?php if($prod_1->id == $record->id){ echo 'selected';}?>>
											<?php echo $record->prod_name.'('.$record->unit.')'; ?> 
											<?php if(!empty($record->group) and $record->group != 'Default'){echo ' Data Group: '.$record->group;}?>
											<?php if(!empty($record->subclass) and $record->subclass != 'Default'){echo ' Subclass: '.$record->subclass;}?>
										</option>
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
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="vol">Sales Volume</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input autocomplete="off" type="number" name="vol" class="form-control" placeholder="Volume" step="0.01" required/>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" name="cbm_id" value="<?php echo $cbm_id; ?>">
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
	
	$(document).ready(function () {
		$("#prod").select2({
			placeholder: "Please Select"
		});
	});
	
	jQuery('#datepicker1').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true,
		startDate : "2019-01-01",
		endDate : "<?php echo date('Y-m-d')?>"
	});
	
</script>