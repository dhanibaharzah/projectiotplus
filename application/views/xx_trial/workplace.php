<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-bank"></i> Perusahaan
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-10 col-xs-8">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>workplacelist" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
									</form>
									<small>Found <?php echo $total; ?> data(s)</small>
								</div>
							</div>
							<div class="col-lg-2 col-xs-4 text-right">
								<div class="form-group">
									<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add New</button>
									<div class="modal modal-default fade" id="add_new">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>addworkplace" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Nama Perusahaan:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="wp_name" rows="2" class="form-control" required></textarea>
													<br>
													<label class="pull-left">Phone Num:</label>
													<input type="number" name="wp_phone" class="form-control" required>
													<br>
													<label class="pull-left">Address:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="wp_address" rows="4" class="form-control" required></textarea>
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
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama Perusahaan</th>
								<th class="text-center">Alamat</th>
								<th class="text-center">Telephone</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($workplacelist)){
								$a = 1 + $page;
								foreach($workplacelist as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $a; ?></td>
								<td><?php echo $record->wp_name; ?></td>
								<td><?php echo nl2br($record->wp_address); ?></td>
								<td><?php echo $record->wp_phone; ?></td>
								<td class="text-center">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-primary fade" id="edit<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Edit</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editworkplace" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Nama Perusahaan:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="wp_name" rows="2" class="form-control" required><?php echo $record->wp_name; ?></textarea>
													<br>
													<label class="pull-left">Phone Num:</label>
													<input type="number" name="wp_phone" class="form-control" value="<?php echo $record->wp_phone; ?>" required>
													<br>
													<label class="pull-left">Address:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="wp_address" rows="4" class="form-control" required><?php echo $record->wp_address; ?></textarea>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="submit" class="btn btn-outline" value="EDIT">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Delete</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delworkplace" method="post" role="form">
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
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "workplacelist/" + value);
			jQuery("#searchList").submit();
        });
	});
</script>
