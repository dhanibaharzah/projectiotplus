<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-user"></i> Approval Route
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>projectapproval" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-striped">
							<tr>
								<th class="text-center" rowspan="2">Setting</th>
								<th class="text-center" rowspan="2">Username</th>
								<th class="text-center" rowspan="2">LINE</th>
								<th class="text-center" rowspan="2">Role</th>
								<th class="text-center" colspan="3">Project</th>
								<th class="text-center" colspan="2">Mtn Log</th>
							</tr>
							<tr>
								<th class="text-center">Checker I</th>
								<th class="text-center">Checker II</th>
								<th class="text-center">Checker III</th>
								<th class="text-center">Checker I</th>
								<th class="text-center">Checker II</th>
							</tr>
						<?php
							if(!empty($approval)){
								foreach($approval as $record){
						?>
							<tr>
								<td class="text-center">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#userset<?php echo $record->id; ?>"><i class="fa fa-gear"></i></button>
									<?php if($userdata->cdprj == 11 or $userdata->cdprj == 12){?>
									<div class="modal modal-primary fade" id="userset<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>User Setting</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>projectuserset" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">User Name: <?php echo $record->uName; ?></label>
												</div>
												<div class="modal-body">
													<label class="pull-left">Role:</label>
													<select class="form-control" name="role">
														<option value="0" <?php if($record->cdprj == 0){echo 'selected';}?>>Undefined</option>
														<option value="1" <?php if($record->cdprj == 1){echo 'selected';}?>>Electric Tech</option>
														<option value="2" <?php if($record->cdprj == 2){echo 'selected';}?>>Mechanic Tech</option>
														<option value="11" <?php if($record->cdprj == 11){echo 'selected';}?>>Electric Approval</option>
														<option value="12" <?php if($record->cdprj == 12){echo 'selected';}?>>Mechanic Approval</option>
														<option value="13" <?php if($record->cdprj == 13){echo 'selected';}?>>CRUD User</option>
													</select>
												</div>
												<div class="modal-body">
													<label class="pull-left">Project Checker I:</label>
													<label class="radio-inline"><input type="radio" name="cd_role1" value="1" <?php if($record->cd_role1 == 1){echo 'checked';}?>>Enable</label>
													<label class="radio-inline"><input type="radio" name="cd_role1" value="0" <?php if($record->cd_role1 == 0){echo 'checked';}?>>Disable</label>
												</div>
												<div class="modal-body">
													<label class="pull-left">Project Checker II:</label>
													<label class="radio-inline"><input type="radio" name="cd_role2" value="1" <?php if($record->cd_role2 == 1){echo 'checked';}?>>Enable</label>
													<label class="radio-inline"><input type="radio" name="cd_role2" value="0" <?php if($record->cd_role2 == 0){echo 'checked';}?>>Disable</label>
												</div>
												<div class="modal-body">
													<label class="pull-left">Project Checker III:</label>
													<label class="radio-inline"><input type="radio" name="cd_role3" value="1" <?php if($record->cd_role3 == 1){echo 'checked';}?>>Enable</label>
													<label class="radio-inline"><input type="radio" name="cd_role3" value="0" <?php if($record->cd_role3 == 0){echo 'checked';}?>>Disable</label>
												</div>
												<div class="modal-body">
													<label class="pull-left">Mtn Log Checker I:</label>
													<label class="radio-inline"><input type="radio" name="applog1" value="1" <?php if($record->applog1 == 1){echo 'checked';}?>>Enable</label>
													<label class="radio-inline"><input type="radio" name="applog1" value="0" <?php if($record->applog1 == 0){echo 'checked';}?>>Disable</label>
												</div>
												<div class="modal-body">
													<label class="pull-left">Mtn Log Checker II:</label>
													<label class="radio-inline"><input type="radio" name="applog2" value="1" <?php if($record->applog2 == 1){echo 'checked';}?>>Enable</label>
													<label class="radio-inline"><input type="radio" name="applog2" value="0" <?php if($record->applog2 == 0){echo 'checked';}?>>Disable</label>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="submit" class="btn btn-outline" value="SAVE">
												</div>
												</form>
											</div>
										</div>
									</div>
									<?php } ?>
								</td>
								<td><?php echo $record->uName; ?></td>
								<td class="text-center"><?php if(!empty($record->lineid)){echo '<span class="label label-success label-lg"><i class="fa fa-check"></i></span>';}?></td>
								<td class="text-center">
									<?php
										if($record->cdprj == 1){echo '<span class="label label-warning">Electric Tech.</span>';}
										elseif($record->cdprj == 2){echo '<span class="label label-primary">Mechanic Tech.</span>';}
										elseif($record->cdprj == 11){echo '<span class="label label-success">Electric Approval</span>';}
										elseif($record->cdprj == 12){echo '<span class="label label-success">Mechanic Approval</span>';}
										elseif($record->cdprj == 13){echo '<span class="label label-info">CRUD User</span>';}
										else{echo '<span class="label label-default">Undefined</span>';}
									?>
								</td>
								<td class="text-center"><?php if($record->cd_role1 == 1){echo '<span class="label label-success">Checker I</span>';}?></td>
								<td class="text-center"><?php if($record->cd_role2 == 1){echo '<span class="label label-success">Checker II</span>';}?></td>
								<td class="text-center"><?php if($record->cd_role3 == 1){echo '<span class="label label-success">Checker III</span>';}?></td>
								<td class="text-center"><?php if($record->applog1 == 1){echo '<span class="label label-primary">Checker I</span>';}?></td>
								<td class="text-center"><?php if($record->applog2 == 1){echo '<span class="label label-primary">Checker II</span>';}?></td>
							</tr>
						<?php
								}
							}
						?>
						</table>
					</div>
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<b>Route</b>
					</div>
					<div class="box-body">
						<ul class="treeview-menu">
							<li class="treeview">
								All user has right to add Costum/Project Job on <a href="<?php echo base_url(); ?>projectjob">Costum Job Menu</a>. 
								All project need approval from user with <span class="label label-success">Electric Approval</span> tag or <span class="label label-success">Mechanic Approval</span> tag.
								Project will never appear on schedule arranger if it has no <span class="label label-success">Approved</span> tag.
							</li>
							<li class="treeview">
								There are only 2 job class, Electric/Mechanic. User with <span class="label label-warning">Electric Tech.</span> automaticly create electric job that's need  <span class="label label-success">Electric Approval</span> user to confirm it. 
								The same route with <span class="label label-primary">Mechanic Tech.</span> user.
								While user with role tag <span class="label label-default">Undefined</span> will get additional selection to classify the job. 
							</li>
							<li class="treeview">
								User need to click <a class="btn btn-xs btn-success" href="#">Ask Approval</a> button to forward the project job to <span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> based on the explanation before.
							</li>
							<li class="treeview">
								<span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> will receive approval request on <a href="<?php echo base_url(); ?>projectalljob"> All Job Menu</a>
							</li>
							<li class="treeview">
								<span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> select <a class="btn btn-sm btn-success" href="#">Approve</a> or <a class="btn btn-sm btn-danger" href="#">Reject</a> to process it.
							</li>
							<li class="treeview">
								Rejected project job will return to the job's owner, while approved job will get <span class="label label-success">Approved</span> tag.
							</li>
							<li class="treeview">
								<span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> will set the schedule and supporting team on Plan Calendar Menu. The schedule will need approval from Checker I, Checker II and Checker III
							</li>
							<li class="treeview">
								All user with registered LINE account has access to check the Approved Schedule by send "mtnjob" command to check today's job and "mtnjob2" to check tomorrow's job. 
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "projectapproval/" + value);
			jQuery("#searchList").submit();
        });
	});
</script>
