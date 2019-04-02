<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> PM Job
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
									<form action="<?php echo base_url() ?>pmjob" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" onkeyup="lettersOnly(this)" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
									<label><span class="label label-default"><input type="checkbox" class="minimal" name="type1" <?php if($type1 == 'on'){ echo 'checked';}?>> Weekly </span></label> 
									<label><span class="label label-default"><input type="checkbox" class="minimal" name="type2" <?php if($type2 == 'on'){ echo 'checked';}?>> Monthly </span></label> 
									<label><span class="label label-default"><input type="checkbox" class="minimal" name="type3" <?php if($type3 == 'on'){ echo 'checked';}?>> More than 1 Month </span></label> 
									</form>
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
													<label class="pull-left">Description:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="desc" rows="4" class="form-control" required></textarea>
													<label class="pull-left">Area:</label>
													<select class="form-control" name="area" required>
														<option value=""></option>
														<?php if(!empty($area)){ 
															foreach($area as $record)
															{
														?>
														<option value="<?php echo $record->code; ?>"><?php echo $record->code; ?> - <?php echo $record->note; ?></option>
														<?php } }?>
													</select>
													<label class="radio-inline"><input type="radio" name="type" value="1" checked>Weekly</label>
													<label class="radio-inline"><input type="radio" name="type" value="2" required>Monthly</label><br>
													<label class="radio-inline"><input type="radio" name="tag" value="1">Electrical</label>
													<label class="radio-inline"><input type="radio" name="tag" value="2">Mechanical</label>
													<label class="radio-inline"><input type="radio" name="tag" value="3" required>Production</label>
													<input class="hidden" name="next" value="1514808000">
													<input class="hidden" name="prev" value="9">
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
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">Job Name</th>
								<th class="text-center">Info</th>
								<th class="text-center">Area/Execution</th>
								<th class="text-center" colspan="3" width="15%">Action/Schedule</th>
							</tr>
						<?php
							if(!empty($pmjob)){
								$a = 1;
								foreach($pmjob as $record){
						?>
							<tr>
								<td rowspan="2">
									<?php if($record->tag == 1){ echo '<span class="label label-warning">Electrical</span>';}?>
									<?php if($record->tag == 2){ echo '<span class="label label-primary">Mechanical</span>';}?>
									<?php if($record->tag == 3){ echo '<span class="label label-success">Production</span>';}?>
									<b><?php echo $record->job_title.' </b>/ '.$record->dur.'mins'; ?><br>
									<?php echo nl2br($record->job_desc); ?>
									<div id="form<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#form<?php echo $a;?>').load('<?php echo base_url();?>formlist/<?php echo $record->id; ?>');
										});
									</script>
								</td>
								<td rowspan="2" class="text-center">
									<div id="pic<?php echo $a;?>"></div>
									<div id="part<?php echo $a;?>"></div>
									<div id="tool<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#pic<?php echo $a;?>').load('<?php echo base_url();?>pmpiclist/<?php echo $record->id; ?>');
											$('#part<?php echo $a;?>').load('<?php echo base_url();?>partlist/<?php echo $record->id; ?>');
											$('#tool<?php echo $a;?>').load('<?php echo base_url();?>toollist/<?php echo $record->id; ?>');
										});
									</script>
								</td>
								<td rowspan="2" class="text-center">
									<?php echo$record->area;?><br>
									<?php if($record->type ==4){?>
									Set on <a href="<?php echo base_url();?>planjob" class="btn btn-sm btn-default">Plan Calendar</a>
									<?php }else{ ?>
									<?php echo date('D d-m-Y', $record->next);?><br>
									<b>Repeater: </b> <?php echo $record->repeater;?> days
									<?php } ?>
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#edit<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-primary fade" id="edit<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Edit ID/TAG <?php echo $record->id;?>/<?php echo $record->tag;?></h4>
												</div>
												<form role="form" action="<?php echo base_url() ?>editpmjobx" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Job Title:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="title" rows="2" class="form-control" required><?php echo $record->job_title; ?></textarea>
													<label class="pull-left">Description:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="desc" rows="4" class="form-control" required><?php echo $record->job_desc; ?></textarea>
													<label class="pull-left">Area:</label>
													<select class="form-control" name="area" required>
														<option value=""></option>
														<?php if(!empty($area)){ 
															foreach($area as $aa)
															{
														?>
														<option value="<?php echo $aa->code; ?>" <?php if($record->area == $aa->code){echo 'selected';} ?>><?php echo $aa->code; ?> - <?php echo $aa->note; ?></option>
														<?php } }?>
													</select>
													<label class="radio-inline"><input type="radio" name="type" value="1" <?php if($record->type == 1){echo 'checked';} ?>>Weekly</label>
													<label class="radio-inline"><input type="radio" name="type" value="2" <?php if($record->type == 2){echo 'checked';} ?>>Monthly</label><br>
													<label class="radio-inline"><input type="radio" name="tag" value="1" <?php if($record->tag == 1){echo 'checked';} ?>>Electrical</label>
													<label class="radio-inline"><input type="radio" name="tag" value="2" <?php if($record->tag == 2){echo 'checked';} ?>>Mechanical</label>
													<label class="radio-inline"><input type="radio" name="tag" value="3" <?php if($record->tag == 3){echo 'checked';} ?>>Production</label>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="hidden" name="tag" value="<?php echo $record->tag;?>">
													
													<input type="hidden" name="page" value="<?php echo $page; ?>"/>
													<input type="hidden" name="type1" value="<?php echo $type1;?>">
													<input type="hidden" name="type2" value="<?php echo $type2;?>">
													<input type="hidden" name="type3" value="<?php echo $type3;?>">
													<input type="hidden" name="keyword" value="<?php echo $keyword;?>">
													
													<input type="submit" class="btn btn-outline" value="EDIT">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td class="text-center">
									<a href="<?php echo base_url();?>setpmdetjob/<?php echo $record->id; ?>" class="btn btn-warning btn-sm btn-block"><i class="fa fa-wrench"></i></a>
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Delete</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delpmjob" method="post" role="form">
												<div class="modal-body">
													Are you sure ?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													
													<input type="hidden" name="page" value="<?php echo $page; ?>"/>
													<input type="hidden" name="type1" value="<?php echo $type1;?>">
													<input type="hidden" name="type2" value="<?php echo $type2;?>">
													<input type="hidden" name="type3" value="<?php echo $type3;?>">
													<input type="hidden" name="keyword" value="<?php echo $keyword;?>">
													
													<input type="submit" class="btn btn-outline" value="Delete">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="text-center" colspan="3">
									<form action="<?php echo base_url() ?>setpmjob/<?php echo $record->id; ?>" method="POST">
										<div class="input-group input-group-sm">
											<input for="exe" autocomplete="off" type="text" name="exe" value="<?php echo date('d-m-Y', $record->next); ?>" class="form-control datepicker input-sm" placeholder="Exe Date"/>
											<span class="input-group-btn">
												<input type="submit" class="btn btn-success btn-flat" value="SET" />
											</span>
										</div>
										<input type="hidden" name="page" value="<?php echo $page; ?>"/>
										<input type="hidden" name="type1" value="<?php echo $type1;?>">
										<input type="hidden" name="type2" value="<?php echo $type2;?>">
										<input type="hidden" name="type3" value="<?php echo $type3;?>">
										<input type="hidden" name="keyword" value="<?php echo $keyword;?>">
									</form>
								</td>
							</tr>
						<?php		$a++;
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
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "pmjob/" + value);
			jQuery("#searchList").submit();
        });
	});
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
	jQuery(document).ready(function(){
        
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
	function lettersOnly(input) {
		var regex = /[^a-z0-9~!@#$%^&*_`+;:?\s]/gi;
		input.value = input.value.replace(regex, "");
	}
</script>
