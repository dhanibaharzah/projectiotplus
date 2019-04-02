<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-level-up"></i> Server Update Log(s)
			<small>Record any change/update</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
		
						<div class="row">
							<div class="col-lg-2 col-xs-12">
								<button title="Add Update Log" type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#edit"><i class="fa fa-gear"></i> Add Log</button>
								<div class="modal modal-success fade" id="edit">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
												<h4>New Update</h4>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>server_update_exe" method="post" role="form">
											<div class="modal-body">
												<label>Route Name: </label>
												<input type="text" name="linker" class="form-control" required>
												<label>Title: </label>
												<textarea name="title_note" class="form-control" rows="2" required></textarea>
												<label>Description: </label>
												<textarea name="desc" class="form-control" rows="4" required></textarea>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="submit" class="btn btn-outline" value="ADD">
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						<form action="<?php echo base_url() ?>server_update_tbl" method="POST" id="searchList">
							<div class="col-lg-10 col-xs-12">
								<div class="input-group">
									<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
									<div class="input-group-btn">
										<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
						</div>
						</form>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<?php echo 'Found '.$total.' data(s)'; ?>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th class="text-center">Time</th>
								<th class="text-center">Link</th>
								<th class="text-center">Title</th>
								<th class="text-center">Notes</th>
							</tr>
						<?php
							if(!empty($server_update_tbl)){
								foreach($server_update_tbl as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $record->timestamp ?></td>
								<td class="text-center"><a href="<?php echo base_url().$record->linker ?>" class="btn btn-success btn-sm"><?php echo base_url().$record->linker ?></a></td>
								<td class="text-center"><?php echo $record->title_note ?></td>
								<td class="text-center"><?php echo $record->desc ?></td>
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
			jQuery("#searchList").attr("action", baseURL + "server_update_tbl/" + value);
			jQuery("#searchList").submit();
		});
	});
</script>
