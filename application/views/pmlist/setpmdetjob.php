<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>pmjob" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-wrench"></i> Setting PM Job
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<b>Job Detail</b>
					</div>
					<div class="box-body">
						<b><?php echo $job->job_title.' </b>'; ?><br>
						<?php echo nl2br($job->job_desc); ?>
					</div>
					<div class="box-footer">
						<b>Form Type: </b><?php if($job->type == 1){ echo '[Weekly]';}else{echo '[Monthly]';}?><br>
						<b>Job Tag: </b><?php if($job->tag == 1){ echo '<span class="label label-warning">[Electrical]</span>';}else{echo '<span class="label label-primary">[Mechanical]</span>';}?><br>
						<b>AREA: </b><?php echo $job->area;?> / PIC of this area will receive notification
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<b>Time Setting</b>
					</div>
					<div class="box-body">
						<?php if($job->type == 2 OR $job->type == 1){?>
						<b>Repeat every: </b><?php if($job->repeater != 0){ echo $job->repeater.' day(s)';}else{echo 'no setting';}?>
						<br>
						<form action="<?php echo base_url() ?>setrepeaterpm" method="POST">
						<div class="input-group">
							<input type="number" name="repeater" class="form-control input-sm pull-right"  placeholder="Repeater (in day)" value="<?php echo $job->repeater;?>"/>
							<input type="hidden" name="id" value="<?php echo $job->id; ?>"/>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-success searchList"><i class="fa fa-gear"></i></button>
							</div>
						</div>
						</form>
						<?php } ?>
						<br>
						<b>Duration: </b><?php if($job->dur != 0){ echo $job->dur.' min(s)';}else{echo 'no setting';}?>
						<br>
						<form action="<?php echo base_url() ?>setdurpm" method="POST">
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
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<b>PIC</b>
					</div>
					<div class="box-body">
						<form action="<?php echo base_url() ?>setpicpm" method="POST">
						<div class="input-group input-group-sm">
							<select id="formpic" name="pic" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($allpiclist)){ 
									foreach($allpiclist as $record)
									{
								?>
								<option value="<?php echo $record->uName; ?>"><?php echo $record->uName; ?></option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
								<input type="hidden" name="tag" value="<?php echo $job->tag; ?>" />
								<input type="hidden" name="type" value="<?php echo $job->type; ?>" />
								<input type="submit" class="btn btn-success  btn-flat" value="Add PIC" />
							</span>
						</div>
						</form>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>PIC</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($piclist)){ $yy = 1;
									foreach($piclist as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $yy; ?></td>
								<td width="50%"><?php echo $record->pic; ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>delpicpm/<?php echo $record->id; ?>/<?php echo $job->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$yy++;
								}
							}else{
								echo '<td colspan="3">No data</td>';
							}
							?>
						</table>
					</div>
					<div class="box-footer">
						*Its possible to add more than 1 PIC.<br>
						**Disable <a href="<?php echo base_url();?>picsetting">PIC Setting</a> by click TURN OFF button, see status on title
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
						<form action="<?php echo base_url() ?>setpartpm" method="POST">
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
								<td width="45%"><a href="<?php echo base_url(); ?>delpartpmjob/<?php echo $record->id; ?>/<?php echo $job->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
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
						<form action="<?php echo base_url() ?>settoolpm" method="POST">
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
								<td width="45%"><a href="<?php echo base_url(); ?>deltoolpmjob/<?php echo $record->id; ?>/<?php echo $job->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
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
						<b>PM Documents</b>
					</div>
					<div class="box-body">
						<label>Document/Form: </label>
						<form action="<?php echo base_url() ?>setformpm" method="POST">
						<div class="input-group input-group-sm">
							<select id="formdoc" name="formdoc" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($doclist)){ 
									foreach($doclist as $record)
									{
								?>
								<option value="<?php echo $record->code.'xeqnamex'.$record->eq_name; ?>"><?php echo $record->code; ?> [<?php echo $record->eq_name; ?>]</option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
								<input type="hidden" name="tag" value="<?php echo $job->tag; ?>" />
								<input type="hidden" name="type" value="<?php echo $job->type; ?>" />
								<input type="submit" class="btn btn-success  btn-flat" value="Add Ducument" />
							</span>
						</div>
						</form>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Code/EQ</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($formlist)){ $no1 = 1;
									foreach($formlist as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no1 ?></td>
								<td width="50%"><?php echo $record->code; ?> [<?php echo $record->eq_name; ?>]</td>
								<td width="45%"><a href="<?php echo base_url(); ?>delformpmjob/<?php echo $record->id; ?>/<?php echo $job->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
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
            $( "#title" ).autocomplete({
              source: "<?php echo site_url('getpartdropdown/?');?>"
            });
			$("#tool").select2({
			placeholder: "Select Tool"
			});
			$("#formdoc").select2({
			placeholder: "Select Document"
			});
			$("#formpic").select2({
			placeholder: "Select PIC"
			});
        });
</script>