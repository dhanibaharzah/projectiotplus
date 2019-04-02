<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-wrench"></i> Area Setting
			<small>Add / Edit Item</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Item Detail</h3>
					</div>
					<form role="form" action="<?php echo base_url() ?>edit_Area" method="post" id="editPM" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">                                
								<div class="form-group">
									<label for="freq">Name Area</label>
									<input type="text" class="form-control" id="freq" placeholder="Name Area" name="toolname" value="<?php echo $Area->toolname; ?>" maxlength="128">
									<input type="hidden" value="<?php echo $Area->id; ?>" name="id" id="id" />    
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="isvalid">Validation</label>
									<select class="form-control" id="isvalid" name="isvalid">
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="group">Approval Code</label>
									<select class="form-control required" id="appcode" name="appcode">
										<option value=""></option>
									<?php
										if(!empty($picar_list)){
											foreach($picar_list as $rec){
									?>
										<option value="<?php echo $rec->code; ?>" <?php if($rec->code == $Area->picarea){echo 'selected';}?>><?php echo $rec->code.' - '.$rec->notes; ?></option>
									<?php
											}
										}
									?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="group">Group Area</label>
									<select class="form-control required" id="group" name="group">
										<option value=""></option>
									<?php
										if(!empty($area_group)){
											foreach($area_group as $rec){
									?>
										<option value="<?php echo $rec->code; ?>" <?php if($rec->code == $Area->group){echo 'selected';}?>><?php echo $rec->code.' - '.$rec->notes; ?></option>
									<?php
											}
										}
									?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="submit" class="btn btn-primary" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<?php
					$this->load->helper('form');
					$error = $this->session->flashdata('error');
					if($error){
				?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php } ?>
				<?php
					$success = $this->session->flashdata('success');
					if($success){
				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php } ?>
				<div class="row">
					<div class="col-md-12">
						<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$("#group").select2({
			placeholder: "Please Select"
		});
		$("#appcode").select2({
			placeholder: "Please Select"
		});

	});
</script>