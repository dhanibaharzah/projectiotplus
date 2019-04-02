<div class="content-wrapper">
	<section class="content-header">
		<h1><a href="<?php echo base_url().'alldev'; ?>" class="btn btn-sm btn-primary">BACK</a><i class="fa fa-gears"></i>Devices <small>Add</small></h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
					<form role="form" id="adddevice" action="<?php echo base_url() ?>adddevice" method="post" role="form">
						<?php if(empty($class_code)){ ?>
						<div class="form-group form-group-sm col-md-8">
							<select id="class_code" name="class_code" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($dev_class)){ 
									foreach($dev_class as $record)
									{
								?>
								<option value="<?php echo $record->dev_code; ?>"><?php echo $record->dev_class; ?> [<?php echo $record->dev_code; ?>]</option>
								<?php } }?>
							</select>
						</div>
						<div class="form-group form-group-sm col-md-1">
							<input type="submit" class="btn btn-success btn-sm btn-block" value="Check">
						</div>
						<?php } ?>
						<?php if(!empty($class_code) and empty($fix_code)){ ?>
						<div class="col-md-12">
							<label>Selected Class : <?php echo $class_code->dev_class.'['.$class_code->dev_code.']'; ?></label>
						</div>
						<input type="hidden" name="class_code" value="<?php echo $class_code->dev_code; ?>">
						<div class="form-group form-group-sm col-md-8">
							<select id="subclass_code" name="subclass_code" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($dev_subclass)){ 
									foreach($dev_subclass as $record)
									{
								?>
								<option value="<?php echo $record->dev_code.' '.$record->code; ?>"><?php echo $record->size; ?> [<?php echo $record->dev_code.' '.$record->code.' XXX'; ?>]</option>
								<?php } }?>
							</select>
						</div>
						<div class="form-group form-group-sm col-md-1">
							<input type="submit" class="btn btn-success btn-sm btn-block" value="Check">
						</div>
						<div class="form-group form-group-sm col-md-1">
							<a class="btn btn-warning btn-sm btn-block" href="<?php echo base_url().'adddevice';?>">Reset</a>
						</div>
						<?php } ?>
						<?php if(!empty($fix_code)){ ?>
						<div class="col-md-11">
							<label>Selected Class : <?php echo $class_code->dev_class.'['.$class_code->dev_code.']'; ?></label><br>
							<label>Code : <?php echo $fix_code; ?></label>
						</div>
						<div class="form-group form-group-sm col-md-1">
							<a class="btn btn-warning btn-sm btn-block" href="<?php echo base_url().'adddevice';?>">Reset</a>
						</div>
						<?php } ?>
					</form>
					</div>
					<?php $this->load->helper("form"); ?>
					<form role="form" id="savedevice" action="<?php echo base_url() ?>savedevice" method="post" role="form">
						<?php echo $form; ?>
						<?php if(!empty($form)){?>
						<div class="form-group form-group-sm col-md-12">
							<label>Identification Class:</label>
							<select id="idenlist" name="iden_id" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($idenlist)){ 
									foreach($idenlist as $record){
								?>
								<option value="<?php echo $record->id; ?>"><?php echo $record->iden_name; ?></option>
								<?php } }?>
							</select>
						</div>
						<?php } ?>
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
					if($error)
					{
				?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php } ?>
				<?php
					$success = $this->session->flashdata('success');
					if($success)
					{
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#class_code").select2({
			placeholder: "Select Class"
		});
		$("#subclass_code").select2({
			placeholder: "Select Subclass"
		});
		$("#idenlist").select2({
			placeholder: "Select Identification"
		});
	});
</script>