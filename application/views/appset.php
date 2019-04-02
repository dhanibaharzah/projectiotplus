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
									<form action="<?php echo base_url() ?>appset" method="POST" id="searchList">
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
								<th width="10%" class="text-center" rowspan="2">Setting</th>
								<th width="45%" class="text-center" rowspan="2">Username</th>
								<th width="45%" class="text-center" colspan="2">Project</th>
							</tr>
							<tr>
								<th class="text-center">Submitter</th>
								<th class="text-center">Approver</th>
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
												<form role="form" id="edit_act" action="<?php echo base_url() ?>userset" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">User Name: <?php echo $record->uName; ?></label>
												</div>
												<div class="modal-body">
													<label class="pull-left">Project Approve:</label>
													<label class="radio-inline"><input type="radio" name="appstock" value="1" <?php if($record->appstock == 1){echo 'checked';}?>>Enable</label>
													<label class="radio-inline"><input type="radio" name="appstock" value="0" <?php if($record->appstock == 0){echo 'checked';}?>>Disable</label>
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
								<td class="text-center"><?php if($record->appsub == 1){echo '<span class="label label-success"><i class="fa fa-check"></span>';}?></td>
								<td class="text-center"><?php if($record->appstock == 1){echo '<span class="label label-success"><i class="fa fa-check"></span>';}?></td>
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
			jQuery("#searchList").attr("action", baseURL + "appset/" + value);
			jQuery("#searchList").submit();
        });
	});
</script>
