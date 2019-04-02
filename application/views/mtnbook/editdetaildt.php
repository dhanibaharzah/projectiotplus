<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>detaildt/<?php echo $detail->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-wrench"></i> Edit Downtime Log
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title"><b>A. <?php echo $detail->foreman?>'s Report</b></div>
					</div>
					<div class="box-body">
						<b><?php echo $detail->timestamp; ?></b><br>
						<?php echo nl2br($detail->forereport); ?><br>
						<b>Duration : </b><?php echo number_format($detail->dur/60, 2, '.', ''); ?><br>
						<b>Area : </b><?php echo $detail->area; ?><br>
						<b>Machine Name : </b><?php echo $detail->eq_name; ?><br>
						<b>Position : </b><?php echo $detail->posisi; ?><br>
						<b>Device : </b><?php echo $detail->device; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title"><b>Edit</b></div>
					</div>
					<form action="<?php echo base_url() ?>editdt" method="POST">
					<div class="box-body">
						<div class="col-md-6">
							<label>Area: </label>
							<select id="arealist" name="arealist" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($arealist)){ 
									foreach($arealist as $record){
								?>
								<option value="<?php echo $record->note; ?>" <?php if($record->note == $detail->area){ echo 'selected';}?>><?php echo $record->note; ?> [<?php echo $record->code; ?>]</option>
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
								<option value="<?php echo $record->note; ?>" <?php if($record->note == $detail->eq_name){ echo 'selected';}?>><?php echo $record->note; ?> [<?php echo $record->code; ?>]</option>
								<?php } }?>
							</select>
							<br>
							<br>
							<label>PIC: </label>
							<select id="userlist" name="userlist" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($userlist)){ 
									foreach($userlist as $record){
								?>
								<option value="<?php echo $record->uName; ?>" <?php if($record->uName == $detail->picuser){ echo 'selected';}?>><?php echo $record->uName; ?></option>
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
								<option value="<?php echo $record->posisi; ?>" <?php if($record->posisi == $detail->posisi){ echo 'selected';}?>><?php echo $record->posisi; ?></option>
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
								<option value="<?php echo $record->device; ?>" <?php if($record->device == $detail->device){ echo 'selected';}?>><?php echo $record->device; ?></option>
								<?php } }?>
							</select>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" name="id" value="<?php echo $detail->id; ?>">
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