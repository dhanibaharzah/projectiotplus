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
					</div>
					<form action="<?php echo base_url(); ?>srmivol" method="POST">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="area">Area</label>
									<select id="area" name="area" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($dailyrec)){ 
											foreach($dailyrec as $record){
										?>
										<option value="<?php echo $record->id; ?>"><?php echo $record->plant_srmi; ?> </option>
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
								<input for="record_date" autocomplete="off" type="text" name="record_date" class="form-control" id="datepicker1" placeholder="Date" value="<?php echo $seldate;?>" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="vol">Breakeven</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input autocomplete="off" type="number" name="breakeven" class="form-control" placeholder="Volume" step="0.01" required/>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="vol">Order</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input autocomplete="off" type="number" name="order" class="form-control" placeholder="Volume" step="0.01" required/>
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="vol">Actual</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input autocomplete="off" type="number" name="actual" class="form-control" placeholder="Volume" step="0.01" required/>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
                        <input type="hidden" value="<?php echo $id;?>" name="id">                           
                        <button class="btn btn-sm btn-primary pull-right">Submit</button>
					</div>
					</form>
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
	
	$(document).ready(function () {
		$("#area").select2({
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