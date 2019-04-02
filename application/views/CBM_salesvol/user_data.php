<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			<i class="fa fa-users"></i> CBM User Management
			<small>Add, Edit, Delete</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-2">
								<button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add New</button>
								<div class="modal modal-default fade" id="add_new">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>cbm_add_new_user" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">User Name:</label>
												<textarea onkeyup="lettersOnly(this)" type="text" name="cbm_user" rows="2" class="form-control" required></textarea>
												<label class="pull-left">Default Pass: 123456</label>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="submit" class="btn btn-primary" value="Submit">
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
							<form action="<?php echo base_url() ?>cbm_user_data" method="POST" id="searchList">
								<div class="row">
									<div class="col-lg-12 col-xs-12">
										<div class="input-group">
											<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
											<div class="input-group-btn">
												<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</div>
								</div>
							</form>
							</div>
							<div class="col-md-12">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">User ID</th>
								<th class="text-center">Registered Name</th>
								<th class="text-center">Status</th>
								<th class="text-center">SCG Email</th>
								<th class="text-center">Gmail/others</th>
								<th class="text-center">LINE</th>
								<th class="text-center">Actions</th>
							</tr>
					<?php
						if(!empty($user_data)){
							$a = $page + 1;
							foreach($user_data as $record){
					?>
							<tr>
								<td class="text-center"><?php echo $a ?></td>
								<td class="text-center"><?php echo $record->NIK ?></td>
								<td class="text-center"><?php echo $record->uName ?></td>
								<td class="text-center">
									<?php 
										if($record->uFlag == 1){echo '<span class="label label-success">Active</span>';}
										else{echo '<span class="label label-danger">Inactive</span>';} 
									?>
								</td>
								<td class="text-center"></td>
								<td class="text-center"></td>
								<td class="text-center"></td>
								<td class="text-center">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $record->id ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-primary fade" id="edit<?php echo $record->id ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" action="<?php echo base_url() ?>cbm_edit_user" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Name:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="cbm_user" rows="2" class="form-control" required><?php echo $record->uName ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="act" value="1">
													<input type="hidden" name="id" value="<?php echo $record->id ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $record->id ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-primary fade" id="del<?php echo $record->id ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" action="<?php echo base_url() ?>cbm_edit_user" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Name:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="cbm_user" rows="2" class="form-control" disabled><?php echo $record->uName ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="act" value="2">
													<input type="hidden" name="id" value="<?php echo $record->id ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
					<?php
								$a++;
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e){
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "cbm_user_data/" + value);
			jQuery("#searchList").submit();
		});
	});
</script>
