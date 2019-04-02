<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-user"></i> Device PIC Setting  <small>its possible to have more than 1 PIC for each device class</small></h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							PIC Table
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">Code</th>
								<th class="text-center">User</th>
								<th class="text-center">Added by</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($device_app)){
								$a = 1;
								foreach($device_app as $record){
						?>
							<tr>
								<td class="text-center"><?php echo$record->code;?></td>
								<td class="text-center"><?php echo$record->uName;?></td>
								<td class="text-center"><?php echo$record->addedby;?></td>
								<td class="text-center">
									<button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Delete</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>deldevpicsetting" method="post" role="form">
												<div class="modal-body">
													Are you sure ?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="submit" class="btn btn-outline" value="Delete">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php		$a++;
								}
							}
						?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Add PIC
						</div>
					</div>
					<div class="box-body">
						<form role="form" id="edit_act" action="<?php echo base_url() ?>adddevpicsetting" method="post" role="form">
						<label class="pull-left">User:</label>
						<select id="users" name="users" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($users)){ 
								foreach($users as $record)
								{
							?>
							<option value="<?php echo $record->uName; ?>"><?php echo $record->uName; ?></option>
							<?php } }?>
						</select>
						<label class="pull-left">Device Class:</label>
						<select id="devclass" name="devclass" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($devclass)){ 
								foreach($devclass as $record)
								{
							?>
							<option value="<?php echo $record->dev_code; ?>"><?php echo $record->dev_code; ?> - <?php echo $record->dev_class; ?></option>
							<?php } }?>
						</select>
					</div>
					<div class="box-footer">
						<button type="button" class="btn btn-default pull-left">Close</button>
						<input type="submit" class="btn btn-primary" value="Submit">
						</form>
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
	$(document).ready(function(){
			$("#users").select2({
			placeholder: "Select User"
			});
			$("#devclass").select2({
			placeholder: "Select Device Class"
			});
        });
</script>