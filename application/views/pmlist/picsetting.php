<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-user"></i> PM PIC Setting  <small><?php if($picmode->area==1){echo 'Actived';}else{echo 'Deactived';}?></small></h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header text-center">
						<form role="form" id="edit_act" action="<?php echo base_url() ?>changepicmode" method="post" role="form">
						<?php if($picmode->area == 1){?>
						<input type="hidden" name="area" value="0">
						<button class="btn btn-sm btn-danger"><i class="fa fa-power"></i> TURN OFF</button>
						<?php }else{ ?>
						<input type="hidden" name="area" value="1">
						<button class="btn btn-sm btn-success"><i class="fa fa-power"></i> TURN ON</button>
						<?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>
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
								<th class="text-center">Area</th>
								<th class="text-center">Tag</th>
								<th class="text-center">User</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($piclist)){
								$a = 1;
								foreach($piclist as $record){
						?>
							<tr>
								<td class="text-center"><?php echo$record->code;?></td>
								<td class="text-center"><?php echo$record->area;?></td>
								<td class="text-center">
									<?php 
										if($record->tag == 1){echo '<span class="label label-warning">Electrical</span>';}
										if($record->tag == 2){echo '<span class="label label-primary">Mechanical</span>';}
									?>
								</td>
								
								<td class="text-center"><?php echo$record->uName;?></td>
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
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delpicsetting" method="post" role="form">
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
						<form role="form" id="edit_act" action="<?php echo base_url() ?>addpicsetting" method="post" role="form">
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
						<label class="pull-left">Area:</label>
						<select id="area" name="area" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($area)){ 
								foreach($area as $record)
								{
							?>
							<option value="<?php echo $record->code.'bb00bb'.$record->note; ?>"><?php echo $record->code; ?> - <?php echo $record->note; ?></option>
							<?php } }?>
						</select>
						<label class="radio-inline"><input type="radio" name="tag" value="1">Electrical</label>
						<label class="radio-inline"><input type="radio" name="tag" value="2" required>Mechanical</label>
						<input class="hidden" name="next" value="1514808000">
						<input class="hidden" name="prev" value="9">
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
			$("#area").select2({
			placeholder: "Select Area"
			});
        });
</script>