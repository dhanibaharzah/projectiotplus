<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Project Job
		</h1>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-10 col-xs-8">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>projectjob" method="POST" id="searchList">
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
												<form role="form" id="edit_act" action="<?php echo base_url() ?>addprojectjob" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Job Title:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="title" rows="2" class="form-control" required></textarea>
													<label class="pull-left">Work Permit:</label>
													<br>
													<div>
													1. Hot Work, 
													<label class="radio-inline"><input type="radio" name="p1" value="1">YES</label>
													<label class="radio-inline"><input type="radio" name="p1" value="2" required>NO</label><br>
													2. Work at High, 
													<label class="radio-inline"><input type="radio" name="p2" value="1">YES</label>
													<label class="radio-inline"><input type="radio" name="p2" value="2" required>NO</label><br>
													3. Confined Space, 
													<label class="radio-inline"><input type="radio" name="p3" value="1">YES</label>
													<label class="radio-inline"><input type="radio" name="p3" value="2" required>NO</label><br>
													4. Digging, 
													<label class="radio-inline"><input type="radio" name="p4" value="1">YES</label>
													<label class="radio-inline"><input type="radio" name="p4" value="2" required>NO</label><br>
													5. Electrical, 
													<label class="radio-inline"><input type="radio" name="p5" value="1">YES</label>
													<label class="radio-inline"><input type="radio" name="p5" value="2" required>NO</label><br>
													</div>
													<br>
													<label class="pull-left">Description:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="desc" rows="4" class="form-control" required></textarea>
													<input type="hidden" name="type" value="4"/>
													<label>Added by, <?php echo $userdata->uName; ?>, role: <?php echo $userdata->cdprj; ?></label><br>
													<?php
														if($userdata->cdprj == 1){echo '<input type="hidden" name="tag" value="91">';}
														if($userdata->cdprj == 2){echo '<input type="hidden" name="tag" value="92">';}
														if($userdata->cdprj == 0 or $userdata->cdprj >= 10){echo '<label class="radio-inline"><input type="radio" name="tag" value="91">Electrical</label><label class="radio-inline"><input type="radio" name="tag" value="92">Mechanical</label>';}
													?>
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
								<th class="text-center">Job Details</th>
								<th class="text-center">Info</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($projectjob)){
								$a = 1;
								foreach($projectjob as $record){
						?>
							<tr>
								<td width="60%">
									<?php
										if($record->tag == 1 or $record->tag == 2){
											echo '<span class="label label-success">Approved</span>';
										}else{
											echo '<span class="label label-warning">Approval Progress</span>';
										}
									?>
									<b><?php echo $record->job_title.' </b>/ '.$record->dur.'mins'; ?><br>
									<?php echo nl2br($record->job_desc); ?><br>
								</td>
								<td class="text-center">
									<?php if($record->tag == 91 or $record->tag == 92){?>
									<a href="<?php echo base_url();?>askprojectapp/<?php echo $record->id.'/'.$record->tag; ?>" class="btn btn-sm btn-success">Ask Approval</a>
									<?php } ?>
									<?php if($record->tag == 101 or $record->tag == 102){?>
									<span class="label label-warning">Approval Progress</span>
									<?php } ?>
									<br>
									<?php if(!empty($record->form)){?>
									<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-copy"></i> <?php echo $record->form;?></a>
									<?php }else{?>
									No Document linked
									<?php } ?>
									<div id="part<?php echo $a;?>"></div>
									<div id="tool<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#part<?php echo $a;?>').load('<?php echo base_url();?>partlist/<?php echo $record->id; ?>');
											$('#tool<?php echo $a;?>').load('<?php echo base_url();?>toollist/<?php echo $record->id; ?>');
										});
									</script>
									<?php echo $record->note1; ?>
								</td>
								<td class="text-center"  width="10%">
									
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> Edit</button><br>
									<div class="modal modal-primary fade" id="edit<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Edit</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editprojectjob" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Job Title:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="title" rows="2" class="form-control" required><?php echo $record->job_title; ?></textarea>
													<label class="pull-left">Description:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="desc" rows="4" class="form-control" required><?php echo $record->job_desc; ?></textarea>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="hidden" name="tag" value="<?php echo $record->tag;?>">
													<input type="submit" class="btn btn-outline" value="EDIT">
												</div>
												</form>
											</div>
										</div>
									</div>
									
									<a href="<?php echo base_url();?>setprojectjob/<?php echo $record->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-wrench"></i> Set</a><br>
									
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i> Del</button>
									<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Delete</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delprojectjob" method="post" role="form">
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
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "projectjob/" + value);
			jQuery("#searchList").submit();
        });
	});
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
</script>
