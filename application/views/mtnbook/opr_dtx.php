<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-book"></i> Manual Guide <small> Instructions</small> 
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
										<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-file"></i> Create</button>
										<div class="modal modal-default fade" id="add_new">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
													</div>
													<form role="form" id="edit_act" action="<?php echo base_url() ?>createopr" method="post" role="form">
													<div class="modal-body">
														<label class="pull-left">Guide Title:</label>
														<textarea type="text" name="opr_title" rows="2" class="form-control" required></textarea>
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
									<form action="<?php echo base_url() ?>opr_dt" method="POST" id="searchList">
									<div class="col-md-9 form-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
									</div>
									<div class="col-md-1 form-group">
										<button class="btn btn-sm btn-primary btn-block searchList"><i class="fa fa-search"></i></button>
									</div>
									</form>
									<div class="col-md-12">
										<div class="callout bg-danger">Your new title has been used, please use other title</div>
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
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Title</th>
								<th class="text-center" style="border: 1px solid black;">Rev</th>
								<th class="text-center" style="border: 1px solid black;">Link</th>
							</tr>
						<?php
							if(!empty($opr_dt)){
								$a = 1 + $page;
								foreach($opr_dt as $record){
						?>
							<tr>
								<td class="text-center" rowspan="2" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->opr_title; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->rev; ?></td>
								<td class="text-center" style="border: 1px solid black;">
								<?php if($record->addedby == $name and $record->saved == 0 and $record->ena_rev == 1){?>
									<a class="btn btn-sm btn-info" href="<?php echo base_url().'opredit/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
								<?php } ?>
									<a class="btn btn-sm btn-warning" href="<?php echo base_url().'oprview/'.$record->id; ?>" title="View"><i class="fa fa-search"></i></a>
									<a class="btn btn-sm btn-success" href="<?php echo base_url().'oprprint/'.$record->id; ?>" title="Print" target="_blank"><i class="fa fa-print"></i></a>
									<a class="btn btn-sm btn-danger" href="<?php echo base_url().'oprpdf/'.$record->id; ?>" title="Pdf" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
								<?php if($record->ena_rev == 1){?>	
									<a class="btn btn-sm btn-primary" href="<?php echo base_url().'oprrev/'.$record->id; ?>"><i class="fa fa-plus"></i> Revisi</a>
								<?php } ?>
								</td>
							</tr>
							<tr>
								<td colspan="4" style="border: 1px solid black;">
									<div class="col-md-4 text-center">
										<b>Created by.</b> <?php echo $record->addedby; ?><?php if(!empty($record->savedate) and $record->saved == 1){ echo '/'.date('Y-m-d H:i:s', $record->savedate);}else{ echo ''; }?>
									</div>
									<div class="col-md-4 text-center">
										<b>Checked by.</b> <?php echo $record->appuser1; ?><?php if(!empty($record->appdate1) and $record->app1 == 1){ echo '/'.date('Y-m-d H:i:s', $record->appdate1);}else{ echo ''; }?>
									</div>
									<div class="col-md-4 text-center">
										<b>Approved by.</b> <?php echo $record->appuser2; ?><?php if(!empty($record->appdate2) and $record->app2 == 1){ echo '/'.date('Y-m-d H:i:s', $record->appdate2);}else{ echo ''; }?>
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
			jQuery("#searchList").attr("action", baseURL + "opr_dt/" + value);
			jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
	});
</script>
