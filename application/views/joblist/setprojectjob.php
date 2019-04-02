<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>projectjob" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-wrench"></i> Setting Project Job
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<b>Job Detail</b>
					</div>
					<div class="box-body">
						<b><?php echo $job->job_title.' </b>'; ?><br>
						<?php echo nl2br($job->job_desc); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<b>Time Setting</b>
					</div>
					<div class="box-body">
						<?php if($job->type == 4){?>
						Project type, no repeater
						<?php }?>
						<?php if($job->type == 3){?>
						<b>Repeat every: </b><?php if($job->repeater != 0){ echo $job->repeater.' day(s)';}else{echo 'no setting';}?>
						<br>
						<form action="<?php echo base_url() ?>setrepeater" method="POST">
						<div class="input-group">
							<input type="number" name="repeater" class="form-control input-sm pull-right"  placeholder="Repeater (in day)" value="<?php echo $job->repeater;?>"/>
							<input type="hidden" name="id" value="<?php echo $job->id; ?>"/>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-success searchList"><i class="fa fa-gear"></i></button>
							</div>
						</div>
						</form>
						<?php } ?>
						<?php if($job->type == 2 OR $job->type == 1){?>
						<b>Repeat every: </b><?php echo $job->repeater;?>
						<?php } ?>
						
						<br>
						
						<?php if($job->type == 4){?>
						Project type, submit execution date at <a href="<?php echo base_url();?>planjob" class="btn btn-sm btn-default">Plan Calendar</a>
						<?php }?>
						<?php if($job->type != 4){?>
						<label>Execution date : </label> <?php echo date('d/m/Y', $job->next); ?>
						<form action="<?php echo base_url() ?>setdate" method="POST">
						<div class="input-group">
							<input for="fromDate" autocomplete="off" type="text" name="exedate" value="<?php echo date('d/m/Y', $job->next); ?>" class="form-control datepicker input-sm" placeholder="Exe Date"/>
							<input type="hidden" name="id" value="<?php echo $job->id; ?>"/>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-success searchList"><i class="fa fa-gear"></i></button>
							</div>
						</div>
						</form>
						<?php }?>
						
						<br>
						
						<b>Duration: </b><?php if($job->dur != 0){ echo $job->dur.' min(s)';}else{echo 'no setting';}?>
						<br>
						<form action="<?php echo base_url() ?>setdur" method="POST">
						<div class="input-group">
							<input type="number" name="dur" class="form-control input-sm pull-right"  placeholder="Duration (in mins)" value="<?php echo $job->dur;?>"/>
							<input type="hidden" name="id" value="<?php echo $job->id; ?>"/>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-success searchList"><i class="fa fa-gear"></i></button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<b>Spare Part</b>
					</div>
					<div class="box-body">
						<form action="<?php echo base_url() ?>setpart" method="POST">
						<div class="form-group-sm">
							<input type="text" class="form-control" id="title" placeholder="Spare Part" name="part" required/>
						</div>
						<div class="input-group input-group-sm">
							<input type="number" name="quan" class="form-control" placeholder="Quantity" required/>
							<span class="input-group-btn">
								<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
								<input type="submit" class="btn btn-success  btn-flat" value="Add Part" />
							</span>
						</div>
						</form>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Q</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($partlist)){ $no1 = 1;
									foreach($partlist as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no1 ?></td>
								<td width="50%"><?php echo $record->tool; ?></td>
								<td width="50%"><?php echo $record->quan; ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>delpartprojectjob/<?php echo $record->id; ?>/<?php echo $job->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$no1++;
								}
							}else{
								echo '<td colspan="3">No data</td>';
							}
							?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<b>Tools</b>
					</div>
					<div class="box-body">
						<form action="<?php echo base_url() ?>settool" method="POST">
						<div class="form-group-sm">
							<select id="tool" name="tool" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($tool)){ 
									foreach($tool as $record)
									{
								?>
								<option value="<?php echo $record->name; ?>xx0xx<?php echo $record->size; ?>"><?php echo $record->name; ?> [<?php echo $record->size; ?>]</option>
								<?php } }?>
							</select>
						</div>
						<div class="input-group input-group-sm">
							<input type="number" name="quan" class="form-control" placeholder="Quantity" required/>
							<span class="input-group-btn">
								<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
								<input type="submit" class="btn btn-success  btn-flat" value="Add Tool" />
							</span>
						</div>
						</form>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Q</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($toollist)){ $no1 = 1;
									foreach($toollist as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no1 ?></td>
								<td width="50%"><?php echo $record->tool; ?> [<?php echo $record->size; ?>]</td>
								<td width="50%"><?php echo $record->quan; ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>deltoolprojectjob/<?php echo $record->id; ?>/<?php echo $job->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$no1++;
								}
							}else{
								echo '<td colspan="3">No data</td>';
							}
							?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<b>Ready to use Device</b>
					</div>
					<div class="box-body">
						<form action="<?php echo base_url() ?>setready" method="POST">
						<div class="input-group input-group-sm">
							<select id="ready" name="ready" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($ready)){ 
									foreach($ready as $record)
									{
								?>
								<option value="<?php echo $record->id; ?>"><?php echo $record->iden_name; ?></option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
								<input type="submit" class="btn btn-success  btn-flat" value="Add Device" />
							</span>
						</div>
						</form>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Name</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($readlist)){ $no5 = 1;
									foreach($readlist as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no5 ?></td>
								<td width="50%"><?php echo $record->iden_name; ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>delreadyprojectjob/<?php echo $record->id; ?>/<?php echo $job->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$no5++;
								}
							}else{
								echo '<td colspan="3">No data</td>';
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<b>Attach Documents</b>
					</div>
					<div class="box-body">
						<label>Document/Form: </label> <?php echo $job->form; ?>/<?php echo $job->type; ?> 
						<?php if(!empty($job->form)){?>
						<a href="<?php echo base_url();?>delformprojectjob/<?php echo $job->id;?>" class="btn btn-xs btn-danger"><i class="fa fa-unlink"></i> unlink</a>
						<?php } ?>
						<form action="<?php echo base_url() ?>setform" method="POST">
						<div class="input-group input-group-sm">
							<select id="formdoc" name="formdoc" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($doclist)){ 
									foreach($doclist as $record)
									{
								?>
								<option value="<?php echo $record->code; ?>"><?php echo $record->code; ?> [<?php echo $record->eq_name; ?>]</option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
								<input type="submit" class="btn btn-success  btn-flat" value="Add Ducument" />
							</span>
						</div>
						</form>
						
						<br>
						
						<label>JSA: </label> 
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
            $( "#title" ).autocomplete({
              source: "<?php echo site_url('getpartdropdown/?');?>"
            });
        });
	$(document).ready(function () {
		$("#tool").select2({
			placeholder: "Select Tool"
		});
	});
	$(document).ready(function () {
		$("#formdoc").select2({
			placeholder: "Select Document"
		});
	});
	$(document).ready(function () {
		$("#ready").select2({
			placeholder: "Select Device"
		});
	});
	jQuery(document).ready(function(){
        
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
	
</script>