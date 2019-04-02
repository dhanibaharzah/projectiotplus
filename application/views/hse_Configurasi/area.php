<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-gear"></i> Area
			<small>Area</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>Area" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
										<span class="input-group-btn">
											<a class="btn btn-primary" href="<?php echo base_url(); ?>addNew_Area"><i class="fa fa-plus"></i> Add New</a>
										</span>	
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover">
								<tr>
									<th>Id</th>
									<th>Area Name</th>
									<th>Group</th>
									<th>Code</th>
									<th>Action</th>
								</tr>
						<?php
							if(!empty($Area)){
								foreach($Area as $record){
						?>
								<tr>
									<td><?php echo $record->id ?></td>
									<td><?php echo $record->toolname ?></td>
									<td><?php echo $record->group ?></td>
									<td><?php echo $record->picarea ?></td>
									<td>
										<a class="btn btn-warning btn-sm" href="<?php echo base_url().'editArea/'.$record->id; ?>" title="Edit Item">Edit <i class="fa fa-pencil"></i></a>
									</td>
								</tr>
						<?php
								}
							}
						?>
							</table>
						</div>
					</div>
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xs-12">
				<div class="box">
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover">
								<tr>
									<th>Code</th>
									<th>PIC</th>
								</tr>
							<?php
								if(!empty($picar)){
									foreach($picar as $record){
							?>
								<tr>
									<td><?php echo $record->hse_picar ?></td>
									<td><?php echo $record->uName ?></td>
								</tr>
							<?php
									}
								}
							?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-8 col-xs-12">
								<h1 class="box-title">Approval Code</h1>
							</div>
							<div class="col-lg-4 col-xs-12">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_code"><i class="fa fa-plus"></i> Add New</button>
								<div class="modal modal-default fade" id="add_code">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>hse_addcode_area" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Area Name:</label>
												<textarea onkeyup="lettersOnly(this)" type="text" name="notes" rows="2" class="form-control" required></textarea>
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
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover">
								<tr>
									<th>Code</th>
									<th>Area Name</th>
									<th>Action</th>
								</tr>
							<?php
								if(!empty($picar_list)){
									foreach($picar_list as $record){
							?>
								<tr>
									<td><?php echo $record->code; ?></td>
									<td><?php echo $record->notes; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_code<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> Edit</button>
										<div class="modal modal-default fade" id="edit_code<?php echo $record->id; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>
													<form role="form" id="edit_act" action="<?php echo base_url() ?>hse_editcode_area" method="post" role="form">
													<div class="modal-body">
														<label class="pull-left">Area Name:</label>
														<textarea onkeyup="lettersOnly(this)" type="text" name="notes" rows="2" class="form-control" required><?php echo $record->notes; ?></textarea>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="id" value="<?php echo $record->id; ?>">
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
									}
								}
							?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-8 col-xs-12">
								<h1 class="box-title">Group Code</h1>
							</div>
							<div class="col-lg-4 col-xs-12">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_group"><i class="fa fa-plus"></i> Add New</button>
								<div class="modal modal-default fade" id="add_group">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>hse_addgroup_area" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Area Name:</label>
												<textarea onkeyup="lettersOnly(this)" type="text" name="notes" rows="2" class="form-control" required></textarea>
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
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover">
								<tr>
									<th>Code</th>
									<th>Area Name</th>
									<th>Action</th>
								</tr>
							<?php
								if(!empty($area_group)){
									foreach($area_group as $record){
							?>
								<tr>
									<td><?php echo $record->code; ?></td>
									<td><?php echo $record->notes; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_group<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> Edit</button>
										<div class="modal modal-default fade" id="edit_group<?php echo $record->id; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>
													<form role="form" id="edit_act" action="<?php echo base_url() ?>hse_editgroup_area" method="post" role="form">
													<div class="modal-body">
														<label class="pull-left">Area Name:</label>
														<textarea onkeyup="lettersOnly(this)" type="text" name="notes" rows="2" class="form-control" required><?php echo $record->notes; ?></textarea>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="id" value="<?php echo $record->id; ?>">
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
									}
								}
							?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "Area/" + value);
            jQuery("#searchList").submit();
		});
	});
</script>
