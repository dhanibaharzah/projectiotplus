<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-file-image-o"></i> LOGO <small>Setting shown logo for document</small> 
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
									<div class="col-md-2 form-group">
										<button type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#add_new"><i class="fa fa-file-image-o"></i> ADD LOGO</button>
										<div class="modal modal-default fade" id="add_new">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>
													<form role="form" id="edit_act" action="<?php echo base_url() ?>logoadd" method="post" role="form">
													<div class="modal-body">
														<label class="pull-left">Logo Name:</label>
														<textarea onkeyup="lettersOnly(this)" type="text" name="logo_name" rows="2" class="form-control" required></textarea>
														<label class="pull-left">Logo Type:</label>
														<select class="form-control" name="logo_type" required>
															<option value="3"> Hazard Type</option>
															<option value="2"> PPE Type</option>
															<option value="1"> Header Type</option>
														</select>
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
									<form action="<?php echo base_url() ?>logosetting" method="POST" id="searchList">
									<div class="col-md-9 form-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
									</div>
									<div class="col-md-1 form-group">
										<button class="btn btn-sm btn-primary btn-block searchList"><i class="fa fa-search"></i></button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								Found <?php echo $total; ?> data(s), Upload Max 500kB, jpg/png, recomended size: 100x100 px, lighter is better
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Type</th>
								<th class="text-center" style="border: 1px solid black;">Name</th>
								<th class="text-center" style="border: 1px solid black;">Logo</th>
								<th class="text-center" style="border: 1px solid black;">Action</th>
							</tr>
						<?php
							if(!empty($logosetting)){
								$a = 1 + $page;
								foreach($logosetting as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;" width="5%"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;" width="15%">
								<?php 
									if($record->logo_type == 1){echo 'Header';}
									elseif($record->logo_type == 2){echo 'PPE';}
									elseif($record->logo_type == 3){echo 'Hazard';}
								?>
								</td>
								<td class="text-center" style="border: 1px solid black;" width="40%"><?php echo $record->logo_name; ?></td>
								<td class="text-center" style="border: 1px solid black;" width="35%">
								<?php echo form_open_multipart('mtnbook/logoaddlink/'.$record->id);?>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>logoaddlink/<?php echo $record->id; ?>" method="post" role="form">
									<div class="form-control input-group">
										<input type="file" name="logo_link" class="form-control input-sm">
										<div class="input-group-btn">
											<button class="btn btn-sm btn-success"><i class="fa fa-upload"></i></button>
										</div>
									</div>
									</form>
								<?php if(!empty($record->logo_link)){?>
									<img src="<?php echo base_url().'assets/dtdoc/opr/'.$record->logo_link; ?>" width="100px">
								<?php } ?>
								</td>
								<td class="text-center" style="border: 1px solid black;" width="15%">
									<button type="button" class="btn btn-primary" title="Edit this row" data-toggle="modal" data-target="#edit_logorow<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button><br>
									<div class="modal modal-default fade" id="edit_logorow<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editlogorow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Logo Name:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="logo_name" rows="2" class="form-control" required><?php echo $record->logo_name; ?></textarea>
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
									<button type="button" class="btn btn-danger" title="Delete this row" data-toggle="modal" data-target="#del_logorow<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del_logorow<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>dellogorow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Step of Work:</label>
													<textarea  onkeyup="lettersOnly(this)" type="text" name="logo_name" rows="2" class="form-control" disabled><?php echo $record->logo_name; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-danger btn-outline" value="Submit">
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
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e){
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "logosetting/" + value);
			jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
	});
</script>
