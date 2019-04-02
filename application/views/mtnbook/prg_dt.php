<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-code"></i> Program <small>PLC and othres Program file</small> 
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
									<form action="<?php echo base_url() ?>prg_dt" method="POST" id="searchList">
									<div class="col-md-2 form-group">
										<a class="btn btn-sm btn-success btn-block" href="<?php echo base_url()?>upload_prg"><i class="fa fa-upload"></i> Upload</a>
									</div>
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
								<th class="text-center" style="border: 1px solid black;">Type</th>
								<th class="text-center" style="border: 1px solid black;">Link</th>
							</tr>
						<?php
							if(!empty($prg_dt)){
								$a = 1 + $page;
								foreach($prg_dt as $record){
						?>
							<tr>
								<td class="text-center" rowspan="2" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->prg_name; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->rev; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->prg_type; ?></td>
								<td class="text-center" style="border: 1px solid black;">
								<?php if($_SERVER['REMOTE_ADDR'] == '192.168.1.1'){?>
									<a class="btn btn-sm btn-success" href="<?php echo base_url().'filedownload/prg/'.$record->id; ?>" target="_blank"><?php echo $record->prg_link; ?></a>
								<?php }else{?>
									<button class="btn btn-sm btn-success" disabled><i class="fa fa-lock"></i> LOCAL ONLY</button>
								<?php }?>
								<?php if($record->ena_rev == 1 and $record->saved== 0){?>
									<a class="btn btn-sm btn-primary" href="<?php echo base_url().'prgrev/'.$record->id; ?>"><i class="fa fa-plus"></i> Rev</a>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#save_row<?php echo $record->id; ?>" title="Ask Approval"><i class="fa fa-save"></i></button>
									<div class="modal modal-default fade" id="save_row<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>askappprg" method="post" role="form">
												<div class="modal-body">
													Ask approval for <?php echo $record->prg_name; ?>, are you sure?
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
								<?php } ?>
								<?php if($record->ena_rev == 1 and $name == $record->addedby and $record->saved == 0){?>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_row<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del_row<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delprg" method="post" role="form">
												<div class="modal-body">
													You will delete <?php echo $record->prg_name; ?>, are you sure?
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-danger btn-outline" value="Delete">
												</div>
												</form>
											</div>
										</div>
									</div>
								<?php } ?>
								</td>
							</tr>
							<tr>
								<td colspan="4" style="border: 1px solid black;">
									<div class="col-md-4 text-center">
										<b>Uploaded by.</b> <?php echo $record->addedby; ?><?php if(!empty($record->savedate)){ echo '/'.date('Y-m-d H:i:s', $record->savedate);}else{ echo ''; }?>
									</div>
									<div class="col-md-4 text-center">
										<b>Checked by.</b> <?php echo $record->appuser1; ?><?php if(!empty($record->appdate1)){ echo '/'.date('Y-m-d H:i:s', $record->appdate1);}else{ echo ''; }?>
									</div>
									<div class="col-md-4 text-center">
										<b>Approved by.</b> <?php echo $record->appuser2; ?><?php if(!empty($record->appdate2)){ echo '/'.date('Y-m-d H:i:s', $record->appdate2);}else{ echo ''; }?>
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
			jQuery("#searchList").attr("action", baseURL + "prg_dt/" + value);
			jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
	});
</script>
