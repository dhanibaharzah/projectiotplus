<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-bug"></i> Bug Reports/Improvement Request
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-2">
								<button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-bug"></i> Report Bug</button>
								<div class="modal modal-default fade" id="add_new">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>addbug" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Describe it:</label>
												<textarea onkeyup="lettersOnly(this)" type="text" name="note" rows="4" class="form-control" required></textarea>
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
								<div class="box-tools">
								<form action="<?php echo base_url() ?>bugreport" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" placeholder="Search"/>
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
						<table class="table table-hover">
							<tr>
								<th>Timestamp</th>
								<th>App</th>
								<th>User</th>
								<th>Bug</th>
							</tr>
						<?php
							if(!empty($bugreport)){
								foreach($bugreport as $record){
						?>
							<tr>
								<td><?php echo $record->timestamp ?></td>
								<td><?php echo $record->app ?></td>
								<td><?php echo $record->user ?></td>
								<td><?php if($record->isdone == 1){echo '<i class="fa fa-check text-green"></i> ';}?><?php echo $record->note ?></td>
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
		jQuery('ul.pagination li a').click(function (e){
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "bugreport/" + value);
			jQuery("#searchList").submit();
		});
	});
</script>
