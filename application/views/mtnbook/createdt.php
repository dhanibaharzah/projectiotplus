<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>dtlog" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-wrench"></i> Create Troubleshooting
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<b>Please specify before continue to troubleshooting log</b>
					</div>
					<form action="<?php echo base_url() ?>generatedt" method="POST">
					<div class="box-body">
						<div class="col-md-6">
							<label>Area: </label>
							<select id="arealist" name="arealist" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($arealist)){ 
									foreach($arealist as $record){
								?>
								<option value="<?php echo $record->note; ?>"><?php echo $record->note; ?> [<?php echo $record->code; ?>]</option>
								<?php } }?>
							</select>
							<br>
							<br>
							<label>Machine Name: </label>
							<select id="mechlist" name="mechlist" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($mechlist)){ 
									foreach($mechlist as $record){
								?>
								<option value="<?php echo $record->note; ?>"><?php echo $record->note; ?> [<?php echo $record->code; ?>]</option>
								<?php } }?>
							</select>
						</div>
						<div class="col-md-6">
							<label>Position: </label>
							<select id="posilist" name="posilist" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($posilist)){ 
									foreach($posilist as $record){
								?>
								<option value="<?php echo $record->posisi; ?>"><?php echo $record->posisi; ?></option>
								<?php } }?>
							</select>
							<br>
							<br>
							<label>Device: </label>
							<select id="devilist" name="devilist" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($devilist)){ 
									foreach($devilist as $record){
								?>
								<option value="<?php echo $record->device; ?>"><?php echo $record->device; ?></option>
								<?php } }?>
							</select>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" name="userlist" value="<?php echo $name; ?>">
						<input type="hidden" name="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>">
						<input type="hidden" name="foreman" value="<?php echo 'web input'; ?>">
						<input type="hidden" name="forereport" value="<?php echo 'web input'; ?>">
						<input type="hidden" name="dur" value="<?php echo '0'; ?>">
						<button class="btn btn-primary">Submit</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#arealist").select2({
			placeholder: "Select Area"
		});
	});
	$(document).ready(function(){
		$("#mechlist").select2({
			placeholder: "Select Machine Name"
		});
	});
	$(document).ready(function(){
		$("#posilist").select2({
			placeholder: "Select Position"
		});
	});
	$(document).ready(function(){
		$("#devilist").select2({
			placeholder: "Select Device"
		});
	});
	$(document).ready(function(){
		$("#userlist").select2({
			placeholder: "Select PIC"
		});
	});
</script>