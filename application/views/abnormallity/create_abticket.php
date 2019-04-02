<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-plus"></i> Create Abnormallity Job Ticket</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<form action="<?php echo base_url(); ?>add_abticket" method="POST">
					<div class="box-body">
						<label>PIC 1: </label>
						<select id="pic" name="pic" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($username)){ 
								foreach($username as $record)
								{
							?>
							<option value="<?php echo $record->uName; ?>"><?php echo $record->uName; ?></option>
							<?php } }?>
						</select>
						<label>PIC 2: </label>
						<select id="pic1" name="pic1" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($username)){ 
								foreach($username as $record)
								{
							?>
							<option value="<?php echo $record->uName; ?>"><?php echo $record->uName; ?></option>
							<?php } }?>
						</select>
						<label>PIC 3: </label>
						<select id="pic2" name="pic2" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($username)){ 
								foreach($username as $record)
								{
							?>
							<option value="<?php echo $record->uName; ?>"><?php echo $record->uName; ?></option>
							<?php } }?>
						</select>
						<br>
						<br>
						<label>Abnormallity:</label><br>
						<b>Submitted by: </b><?php echo $abdata->user.', '.$abdata->timestamp; ?> <br>
						<b>Report: </b><?php echo $abdata->note; ?>
						<br>
						<label>Suggestion:</label>
						<textarea rows="5" class="form-control" name="sug"></textarea>
					</div>
					<div class="box-footer">
						<a class="btn btn-default btn-sm" href="<?php echo base_url().'abnormallity' ?>"><i class="fa fa-arrow-left"></i> BACK</a>
						<input type="hidden" name="id" value="<?php echo $abdata->id; ?>" />
						<input type="submit" class="btn btn-success btn-sm pull-right" value="Submit Ticket" />
					</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4 col-xs-12">
				<img src="<?php echo base_url().'assets/report/'.$abdata->imglink; ?>.jpg" style="width:100%"/>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$("#pic").select2({
			placeholder: "Select PIC"
			});
        });
    $(document).ready(function(){
			$("#pic1").select2({
			placeholder: "Select PIC"
			});
        });
    $(document).ready(function(){
			$("#pic2").select2({
			placeholder: "Select PIC"
			});
        });        
</script>
