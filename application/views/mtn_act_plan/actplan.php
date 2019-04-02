<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Action Plan
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
									<form action="<?php echo base_url() ?>mtn_actplan" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchtext" value="<?php echo $searchtext; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
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
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_add_actplan" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Title:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_title" rows="2" class="form-control" required></textarea>
													<label class="pull-left">Objective:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_obj" rows="4" class="form-control" required></textarea>
													<label>Added by, <?php echo $name; ?></label><br>
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
								<th class="text-center">Title/Objective</th>
								<th class="text-center">PIC/Last Update</th>
								<th class="text-center">Overall Progress</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($actplan)){
								$a = $page + 1;
								foreach($actplan as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $a; ?></td>
								<td><?php echo '<b>'.$record->ac_title.'</b><br>'; echo nl2br($record->ac_obj); ?></td>
								<td class="text-center"><?php echo '<b>PIC: </b>'.$record->pic.'<br>'; ?></td>
								<td>
									<div id="progbar<?php echo $record->id; ?>"></div>
									<script>
										$('#progbar<?php echo $record->id; ?>').load('<?php echo base_url(); ?>mtn_actplan_getallprog/<?php echo $record->id; ?>');
									</script>
								</td>
								<td class="text-center"  width="10%">
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-default fade" id="edit<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>mtn_edit_actplan" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Title:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_title" rows="2" class="form-control" required><?php echo $record->ac_title;?></textarea>
													<label class="pull-left">Objective:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="ac_obj" rows="4" class="form-control" required><?php echo $record->ac_obj;?></textarea>
													<label>Added by, <?php echo $record->pic; ?></label><br>
													<input type="hidden" name="pic" value="<?php echo $record->pic; ?>">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
									<a href="<?php echo base_url();?>mtn_actplan_detail/<?php echo $record->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-list"></i></a>									
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
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "mtn_actplan/" + value);
			jQuery("#searchList").submit();
        });
	});
	$('#gantt').load('<?php echo base_url(); ?>mtn_gantt');
</script>
