<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-list"></i> Action Plan
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<?php echo '<h4 class="box-title"><b>'.$actplan_main->ac_title.'</b></h4><br>'; echo nl2br($actplan_main->ac_obj); ?>
								<?php echo '<br><b>PIC: </b>'.$actplan_main->pic.'<br>'; ?>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Task</th>
								<th class="text-center">Start</th>
								<th class="text-center">End</th>
								<th class="text-center">Progress</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($actplan_step)){
								$a = 1;
								$b = 1;
								foreach($actplan_step as $record){
						?>
							<tr>
								<td class="text-center">
								<?php 
									if($record->phase_id == 1){
										echo '<small>'.$a.'</small>';
										$a++;
									}elseif($record->phase_id == 2){
										//echo '<b>'.$b.'</b>';
										$b++;
									}
								?>
								</td>
								<td>
								<?php 
									if($record->phase_id == 1){
										echo $record->ac_task;
									}elseif($record->phase_id == 2){
										echo '<b>'.$record->ac_task.'</b>';
									}
								?>
								</td>
								<td class="text-center">
								<?php 
									if($record->phase_id == 1){
										echo date('d-m-Y', $record->start_date);
									}elseif($record->phase_id == 2){
								?>
									<span id="start_d<?php echo $record->id; ?>"></span>
								<?php
									}
								?>
								</td>
								<td class="text-center">
								<?php 
									if($record->phase_id == 1){
										echo date('d-m-Y', $record->end_date);
									}elseif($record->phase_id == 2){
								?>
									<span id="end_d<?php echo $record->id; ?>"></span>
								<?php
									}
								?>
								</td>
								<td>									
									<?php
										if($record->phase_id == 1){
											if($record->ac_progress < 50){$col = 'red';}
											if($record->ac_progress >= 50){$col = 'yellow';}
											if($record->ac_progress > 80){$col = 'green';}
									?>
										<span class="pull-right label label-primary"><?php echo $record->ac_progress; ?> %</span><br>
										<div class="progress progress-sm bg-gray">
											<div class="progress-bar progress-bar-<?php echo $col; ?>" role="progressbar" aria-valuenow="<?php echo $record->ac_progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $record->ac_progress; ?>%"></div>
										</div>
									<?php }elseif($record->phase_id == 2){ ?>
										<div id="progbar<?php echo $record->id; ?>"></div>
										<script>
											$('#start_d<?php echo $record->id; ?>').load('<?php echo base_url(); ?>mtn_actplan_getstart/<?php echo $record->ac_id.'/'.$record->phase; ?>');
											$('#end_d<?php echo $record->id; ?>').load('<?php echo base_url(); ?>mtn_actplan_getend/<?php echo $record->ac_id.'/'.$record->phase; ?>');
											$('#progbar<?php echo $record->id; ?>').load('<?php echo base_url(); ?>mtn_actplan_getprog/<?php echo $record->ac_id.'/'.$record->phase; ?>');
										</script>
									<?php } ?>
								</td>
								<td class="text-center"  width="10%">
								<?php if($record->phase_id == 2){ ?>
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addtask<?php echo $record->id; ?>"><i class="fa fa-plus"></i></button>
									<div class="modal modal-default fade" id="addtask<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_add_actplan_task" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Task under <?php echo $record->ac_task;?> Phase:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_task" rows="2" class="form-control" required></textarea>
													<br>
													<input for="start_date" autocomplete="off" type="text" name="start_date" class="form-control datepicker1" placeholder="Start Date" required/>
													<input for="end_date" autocomplete="off" type="text" name="end_date" class="form-control datepicker2" placeholder="End Date" required/>
													<input type="hidden" name="phase" value="<?php echo $record->phase; ?>">
													<input type="hidden" name="ac_id" value="<?php echo $actplan_main->id; ?>">
													<input type="hidden" name="phase_id" value="1">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edittask<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-default fade" id="edittask<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_edit_actplan_phase" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Edit Task:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_task" rows="2" class="form-control" required><?php echo $record->ac_task;?></textarea>
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="ac_id" value="<?php echo $actplan_main->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deltask<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="deltask<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_del_actplan_phase" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Delete Phase and all task below:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_task" rows="2" class="form-control" disabled><?php echo $record->ac_task;?></textarea>
													<input type="hidden" name="phase" value="<?php echo $record->phase; ?>">
													<input type="hidden" name="ac_id" value="<?php echo $actplan_main->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-outline" value="DELETE">
												</div>
												</form>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php if($record->phase_id == 1){ ?>
									<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#updaterow<?php echo $record->id; ?>"><i class="fa fa-upload"></i></button>
									<div class="modal modal-default fade" id="updaterow<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_edit_actplan_task" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Update task:</label>
													<input type="hidden" name="ac_task" value="<?php echo $record->ac_task;?>"/>
													<input type="number" min="0" max="100" name="ac_progress" value="<?php echo $record->ac_progress; ?>" class="form-control">
													<input type="hidden" name="start_date" value="<?php echo date('d-m-Y', $record->start_date);?>"/>
													<input type="hidden" name="end_date" value="<?php echo date('d-m-Y', $record->end_date);?>"/>
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="ac_id" value="<?php echo $actplan_main->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="EDIT">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editrow<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-default fade" id="editrow<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_edit_actplan_task" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Edit task:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_task" rows="2" class="form-control" required><?php echo $record->ac_task;?></textarea>
													<input for="start_date" autocomplete="off" type="text" name="start_date" class="form-control datepicker1" value="<?php echo date('d-m-Y', $record->start_date);?>" required/>
													<input for="end_date" autocomplete="off" type="text" name="end_date" class="form-control datepicker2" value="<?php echo date('d-m-Y', $record->end_date);?>" required/>
													<input type="hidden" name="ac_progress" value="<?php echo $record->ac_progress; ?>">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="ac_id" value="<?php echo $actplan_main->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="EDIT">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delrow<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="delrow<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_del_actplan_task" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Delete task:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_task" rows="2" class="form-control" disabled><?php echo $record->ac_task;?></textarea>
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="ac_id" value="<?php echo $actplan_main->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-outline" value="DELETE">
												</div>
												</form>
											</div>
										</div>
									</div>
								<?php } ?>
								</td>
							</tr>
						<?php
								}
							}
						?>
						</table>
					</div>
					<div class="box-footer text-center">
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#phaseadd"><i class="fa fa-plus"></i> Add New Phase</button>
						<div class="modal modal-default fade" id="phaseadd">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
									</div>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_add_actplan_phase" method="post" role="form">
									<div class="modal-body">
										<label class="pull-left">Phase name:</label>
										<textarea onkeyup="lettersOnly(this)" type="text" name="ac_task" rows="2" class="form-control" required></textarea>
										<input type="hidden" name="last_phase" value="<?php echo $last_phase; ?>">
										<input type="hidden" name="ac_id" value="<?php echo $actplan_main->id; ?>">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>
									</form>
								</div>
							</div>
						</div>
						<a href="#" class="btn btn-sm btn-primary">[X]View in Gantt Chart</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
	jQuery('.datepicker1').datepicker({
			autoclose: true,
			format : "dd-mm-yyyy",
			todayHighlight : true
	});
	jQuery('.datepicker2').datepicker({
		autoclose: true,
		format : "dd-mm-yyyy"
	});
	$('.datepicker1').on('changeDate', function (selected) {
		$('.datepicker2').datepicker('setStartDate', selected.date);
		$('.datepicker2').datepicker('setDate', selected.date);
		$(this).datepicker('hide');
	});
</script>