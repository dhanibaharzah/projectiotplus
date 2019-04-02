<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-book"></i> Edit Guidance Document <small> </small> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="15%" class="text-center" rowspan="2" colspan="2" style="border: 1px solid black;">
									<img src="<?php echo base_url(); ?>assets/dtdoc/opr/<?php echo $mainlogo;?>" width="100px">
								</td>
								<td width="53%" class="text-center" rowspan="3" colspan="2" style="border: 1px solid black;">
									<h3><?php echo $opr->opr_title; ?></h3>
									<button type="button" class="btn btn-primary btn-sm pull-right" title="Edit title" data-toggle="modal" data-target="#edit_title"><i class="fa fa-pencil"></i></button><br>
									<div class="modal modal-default fade" id="edit_title">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editoprtitle" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Title:</label>
													<textarea type="text" name="opr_title" rows="5" class="form-control" required><?php echo $opr->opr_title; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $opr->id; ?>">
											<input type="hidden" name="rev" value="<?php echo $opr->rev; ?>">
													<input type="hidden" name="opr_titlex" value="<?php echo $opr->opr_title; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td width="32%" class="text-center" style="border: 1px solid black;"><b>Created by.</b><?php echo $opr->addedby; ?><?php if(!empty($opr->savedate) and $opr->saved == 1){echo '/'.date('d-m-Y',$opr->savedate);}?></td>
							</tr>
							<tr>
								<td width="32%" class="text-center" style="border: 1px solid black;"><b>Checked by.</b><?php echo $opr->appuser1; ?><?php if(!empty($opr->appdate1) and $opr->app1 == 1){echo '/'.date('d-m-Y',$opr->appdate1);}?></td>
							</tr>
							<tr>
								<td width="25%" class="text-center" colspan="2" style="border: 1px solid black;"><b><?php echo 'REV.'.$opr->rev;?></b></td>
								<td width="32%" class="text-center" style="border: 1px solid black;"><b>Approved by.</b><?php echo $opr->appuser2; ?><?php if(!empty($opr->appdate2) and $opr->app2 == 1){echo '/'.date('d-m-Y',$opr->appdate2);}?></td>
							</tr>
							<tr>
								<th width=" 4%" class="text-center" style="border: 1px solid black;">No</th>
								<th width="32%" colspan="2" class="text-center" style="border: 1px solid black;">Image(Max 2MB, jpg or png only)</th>
								<th width="32%" class="text-center" style="border: 1px solid black;">Step of Work</th>
								<th width="32%" class="text-center" style="border: 1px solid black;">Parameter/Advice</th>
							</tr>
						<?php
							if(!empty($doc)){
								$a = 1;
								foreach($doc as $record){
						?>
							<tr>
								<td width=" 4%" class="text-center" style="border: 1px solid black;">
									<?php echo $a; ?><br><br>
									<button type="button" class="btn btn-primary" title="Edit this row" data-toggle="modal" data-target="#edit_row<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button><br>
									<div class="modal modal-default fade" id="edit_row<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editoprrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Step of Work:</label>
													<textarea type="text" name="opr_con" rows="5" class="form-control" required><?php echo $record->opr_con; ?></textarea>
													<label class="pull-left">Parameter/Advice:</label>
													<textarea type="text" name="opr_sta" rows="5" class="form-control" required><?php echo $record->opr_sta; ?></textarea>
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
									<button type="button" class="btn btn-danger" title="Delete this row" data-toggle="modal" data-target="#del_row<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del_row<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>deloprrow" method="post" role="form">
												<div class="modal-body">
													<div>Warning! Delete the last row will delete whole document</div>
													<label class="pull-left">Step of Work:</label>
													<textarea type="text" name="opr_con" rows="5" class="form-control" disabled><?php echo $record->opr_con; ?></textarea>
													<label class="pull-left">Parameter/Advice:</label>
													<textarea type="text" name="opr_sta" rows="5" class="form-control" disabled><?php echo $record->opr_sta; ?></textarea>
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
								<td width="32%" colspan="2" class="text-center" style="border: 1px solid black;">
									<?php echo form_open_multipart('mtnbook/opraddlink/'.$record->id);?>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>opraddlink/<?php echo $record->id; ?>" method="post" role="form">
									<div class="form-control input-group">
										<input type="hidden" name="rev" value="<?php echo $record->rev; ?>">
										<input type="file" name="opr_link" class="form-control input-sm">
										<div class="input-group-btn">
											<button class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload</button>
										</div>
									</div>
									</form>
								<?php if(!empty($record->opr_link)){?>
									<img src="<?php echo base_url(); ?>assets/dtdoc/opr/<?php echo $record->opr_link; ?>" width="100%">
								<?php } ?>
								</td>
								<td width="32%" style="border: 1px solid black;">
									<?php echo nl2br($record->opr_con); ?>
								</td>
								<td width="32%" style="border: 1px solid black;">
									<?php echo nl2br($record->opr_sta); ?>
								</td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
							<tr>
								<td class="text-center" colspan="5" style="border: 1px solid black;">
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_row"><i class="fa fa-plus"></i> Add row</button>
									<div class="modal modal-default fade" id="add_row">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>addoprrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Step of Work:</label>
													<textarea type="text" name="opr_con" rows="5" class="form-control" required></textarea>
													<label class="pull-left">Parameter/Advice:</label>
													<textarea type="text" name="opr_sta" rows="5" class="form-control" required></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $opr->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="text-center" colspan="5" style="border: 1px solid black;">
									<label>Safety Instruction</label></br>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>opraddlogo" method="post" role="form">
									<div class="form-control input-group">
										<select id="ppe_id" name="ppe_id" class="form-control" required>
											<option value=""></option>
											<?php if(!empty($logolist)){ 
												foreach($logolist as $record)
												{
											?>
											<option value="<?php echo $record->id; ?>"><?php echo $record->logo_name; ?></option>
											<?php } }?>
										</select>
										<div class="input-group-btn">
											<input type="hidden" name="opr_title" value="<?php echo $opr->opr_title; ?>">
											<input type="hidden" name="id" value="<?php echo $opr->id; ?>">
											<input type="hidden" name="rev" value="<?php echo $opr->rev; ?>">
											<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
										</div>
									</div>
									</form>
									<table class="table table-hover table-striped table-bordered">
										<tr>
											<td class="text-center" width="12.5%"></td>
											<td class="text-center" width="12.5%"></td>
											<td class="text-center" width="12.5%"></td>
											<td class="text-center" width="12.5%"></td>
											<td class="text-center" width="12.5%"></td>
											<td class="text-center" width="12.5%"></td>
											<td class="text-center" width="12.5%"></td>
											<td class="text-center" width="12.5%"></td>
										</tr>
								<?php
									if(!empty($usedlogo)){
										$a=0;
										foreach($usedlogo as $rec){
											$b = $a %8;
											if($b == 0){echo '<tr>';}else{echo '';}
								?>
										<td class="text-center">
											<img src="<?php echo base_url(); ?>assets/dtdoc/opr/<?php echo $rec->logo_link; ?>" width="100px">
											</br>
											<b><?php echo $rec->logo_name?></b>
											</br>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>oprdellogo/<?php echo $rec->id; ?>" method="post" role="form">
												<input type="hidden" name="ppe_id" value="<?php echo $opr->id; ?>">
												<button class="btn btn-xs btn-danger btn-block"><i class="fa fa-trash"></i></button>
											</form>
										</td>
								<?php
											if($b == 7){echo '</tr>';}else{echo '';}
											$a++;
										}
									}
								?>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer clearfix">
						<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>opr_dt"><i class="fa fa-arrow-left"></i> BACK</a>
						<form role="form" id="edit_act" action="<?php echo base_url() ?>opraskapp" method="post" role="form">
							<input type="hidden" name="id" value="<?php echo $opr->id; ?>">
							<input type="hidden" name="rev" value="<?php echo $opr->rev; ?>">
							<button class="btn btn-primary pull-right"><i class="fa fa-check"></i> Ask Approval</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$("#ppe_id").select2({
			placeholder: "Select Safety Instruction"
			});
        });
</script>