<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>projectplan" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-wrench"></i> Setting Project Schedule for <b><?php echo $start_date; ?></b>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<b>Select Project:</b><br>
						<form action="<?php echo base_url() ?>schjob" method="POST">
						<div class="input-group input-group-sm">
							<select id="job" name="job" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($job)){ 
									foreach($job as $record)
									{
								?>
								<option value="<?php echo $record->id; ?>"><?php echo $record->job_title; ?> [<?php echo $record->addedby; ?>]</option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="hidden" name="start_date" value="<?php echo $start_date; ?>" />
								<input type="submit" class="btn btn-success  btn-flat" value="ADD" />
							</span>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
			if(!empty($joblist)){
				$a = 1;
				foreach($joblist as $jobrecord){
		?>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<label>Execution:</label> <?php echo gmdate('H:i d/m/Y', $jobrecord->start).' to '.gmdate('H:i d/m/Y', $jobrecord->end); ?>
					</div>
					<div class="box-body">
						<div class="col-lg-8 col-xs-12">
							<div class="row">
								<b><?php echo $jobrecord->job_title; ?></b><br>
								<?php echo nl2br($jobrecord->job_desc); ?>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<label>Spare Part</label><br>
									<span id="sparepart<?php echo $a;?>"></span>
								</div>
								<div class="col-lg-6 col-xs-6">
									<label>Tools</label><br>
									<span id="tool<?php echo $a;?>"></span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="text-center">
								<b>PIC</b>
							</div>
							<div class="box-body">
								<form action="<?php echo base_url() ?>schpic" method="POST">
								<div class="form-group-sm">
									<select id="user<?php echo $a; ?>" name="user" class="form-control">
										<option value=""></option>
										<?php if(!empty($user)){ 
											foreach($user as $record)
											{
										?>
										<option value="<?php echo $record->uName; ?>"><?php echo $record->uName; ?></option>
										<?php } }?>
									</select>
								</div>
								<div class="input-group input-group-sm">
									<input type="text" name="user2" class="form-control" placeholder="3rd Party"/>
									<span class="input-group-btn">
										<input type="hidden" name="start_date2" value="<?php echo $start_date; ?>" />
										<input type="hidden" name="project_id" value="<?php echo $jobrecord->id; ?>" />
										<input type="submit" class="btn btn-success btn-flat" value="Add PIC" />
									</span>
								</div>
								</form>
								<span id="pic<?php echo $a;?>"></span>
								<script type="text/javascript">
									$(window).on('load', function() {
										$('#sparepart<?php echo $a;?>').load('<?php echo base_url();?>schpart/<?php echo $jobrecord->project_id; ?>');
										$('#tool<?php echo $a;?>').load('<?php echo base_url();?>schtool/<?php echo $jobrecord->project_id; ?>');
										$('#pic<?php echo $a;?>').load('<?php echo base_url();?>schuser/<?php echo $jobrecord->id; ?>');
										$('#user<?php echo $a; ?>').select2({
											placeholder: "Select User/PIC"
										});
									});
								</script>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-md-4">
							<form action="<?php echo base_url() ?>schstart" method="POST">
							<div class="input-group input-group-sm">
								<select id="start_hour" name="start_hour" class="form-control" required>
									<option value="0">00:00</option>
									<option value="1">01:00</option>
									<option value="2">02:00</option>
									<option value="3">03:00</option>
									<option value="4">04:00</option>
									<option value="5">05:00</option>
									<option value="6">06:00</option>
									<option value="7">07:00</option>
									<option value="8">08:00</option>
									<option value="9">09:00</option>
									<option value="10">10:00</option>
									<option value="11">11:00</option>
									<option value="12">12:00</option>
									<option value="13">13:00</option>
									<option value="14">14:00</option>
									<option value="15">15:00</option>
									<option value="16">16:00</option>
									<option value="17">17:00</option>
									<option value="18">18:00</option>
									<option value="19">19:00</option>
									<option value="20">20:00</option>
									<option value="21">21:00</option>
									<option value="22">22:00</option>
									<option value="23">23:00</option>
								</select>
								<span class="input-group-btn">
									<input type="hidden" name="start_date3" value="<?php echo $start_date; ?>" />
									<input type="hidden" name="ticket_id" value="<?php echo $jobrecord->id; ?>" />
									<input type="hidden" name="project_idx" value="<?php echo $jobrecord->project_id; ?>" />
									<input type="submit" class="btn btn-success btn-flat" value="SET" />
								</span>
							</div>
							</form>
						</div>
						<div class="col-md-8">
							<a href="<?php echo base_url(); ?>delticket/<?php echo $jobrecord->id.'/'.$start_date; ?>" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i> Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
				$a++;
				}
		?>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-success">
					<div class="box-body">
						<div class="text-center">
							<a href="<?php echo base_url(); ?>schsubmit/<?php echo $start_date; ?>" class="btn btn-success">Submit Approval</a>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#job").select2({
			placeholder: "Select Job"
		});
	});
	$(document).ready(function () {
		$("#start_hour").select2({
			placeholder: "Select Start Time"
		});
	});
	jQuery(document).ready(function(){
        
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
	
</script>
