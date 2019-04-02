<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-gears"></i> Repair activity selection</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-10 col-xs-8">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>devrepair" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
							<div class="col-lg-2 col-xs-4 text-right">
								<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add New</button>
								<div class="modal modal-default fade" id="add_new">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>adddevrepair" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">New Activity Selection:</label>
												<textarea type="text" name="act" rows="2" class="form-control" required></textarea>
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
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">isvalid</th>
								<th class="text-center">Activity</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($idenlist)){
								foreach($idenlist as $record){
						?>
							<tr>
								<td align="center">
									<?php if($record->isvalid == 1){echo '<span class="label label-success">Active</span>';}?>
									<?php if($record->isvalid == 0){echo '<span class="label label-danger">Deactived</span>';}?>
								</td>
								<td align="center"><?php echo $record->act; ?></td>
								<td align="center">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editposisi<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-default fade" id="editposisi<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" action="<?php echo base_url() ?>editdevrepair" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Edit to:</label>
													<input type="text" name="act" class="form-control" value="<?php echo $record->act; ?>" required>
													<label class="radio-inline"><input type="radio" name="isvalid" value="1" <?php if($record->isvalid == 1){echo 'checked';}?>>ON</label>
													<label class="radio-inline"><input type="radio" name="isvalid" value="0" <?php if($record->isvalid == 0){echo 'checked';}?>>OFF</label>
													<input class="hidden" name="id" value="<?php echo $record->id; ?>">
												</div>
												<div class="modal-footer">
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
            jQuery("#searchList").attr("action", baseURL + "devrepair/" + value);
            jQuery("#searchList").submit();
        });
	});
</script>
