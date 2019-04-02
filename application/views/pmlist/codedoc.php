<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-code"></i> Document Coding</h1>
	</section>
	<section class="content">
		<small>Found <?php echo $total; ?> data(s)</small>
		<div class="row">
		<?php if(!empty($alarm)){?>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Alert!</h4><?php echo $alarm;?>
		</div>
		<?php } ?>
			<div class="col-lg-8 col-xs-12">
				<div class="col-lg-12 col-xs-12">
					<div class="box box-primary">
						<div class="box-header">
							<div class="row">
								<div class="col-lg-10 col-xs-8">
									<div class="box-tools">
										<form action="<?php echo base_url() ?>codedoc" method="POST" id="searchList">
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
									<div class="form-group">
										<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add New</button>
										<div class="modal modal-default fade" id="add_new">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>
													<form role="form" id="edit_act" action="<?php echo base_url() ?>adddevcode" method="post" role="form">
													<div class="modal-body">
														<label class="pull-left">Code:</label>
														<textarea onkeyup="lettersOnly(this)" maxlength="4" type="text" name="code" rows="2" class="form-control" required></textarea>
														<label class="pull-left">Description:</label>
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
								</div>
							</div>
						</div>
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover table-striped taable-bordered">
								<tr>
									<th class="text-center">Code</th>
									<th class="text-center">Note</th>
									<th class="text-center" width="15%">Action</th>
								</tr>
							<?php
								if(!empty($codedoc)){
									$a = 1;
									foreach($codedoc as $record){
							?>
								<tr>
									<td class="text-center"><b><?php echo $record->code;?></b></td>
									<td><?php echo $record->note;?></td>
									<td class="text-center">
										<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> EDIT</button>
										<div class="modal modal-primary fade" id="del<?php echo $record->id; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<h4>Edit</h4>
													</div>
													<form role="form" id="edit_act" action="<?php echo base_url() ?>editdevcode" method="post" role="form">
													<div class="modal-body">
														<label class="pull-left">Description:</label>
														<textarea onkeyup="lettersOnly(this)" type="text" name="note" rows="4" class="form-control" required><?php echo $record->note;?></textarea>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
														<input type="hidden" name="id" value="<?php echo $record->id;?>">
														<input type="submit" class="btn btn-outline" value="Edit">
													</div>
													</form>
												</div>
											</div>
										</div>
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
			<div class="col-lg-4 col-xs-12">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Code</th>
								<th class="text-center">Area</th>
							</tr>
						<?php
							if(!empty($codearea)){
								$a = 1;
								foreach($codearea as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $a; ?></td>
								<td class="text-center"><?php echo $record->code; ?></td>
								<td class="text-center"><?php echo $record->note; ?></td>
							</tr>
						<?php		$a++;
								}
							}
						?>
						</table>
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
			jQuery("#searchList").attr("action", baseURL + "codedoc/" + value);
			jQuery("#searchList").submit();
        });
	});
	
</script>
