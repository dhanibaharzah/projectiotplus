<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>dtlog" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-wrench"></i> Detailed Downtime Log
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title"><b>A. <?php echo $detail->foreman?>'s Report</b></div>
						<?php if($name == $detail->addedby){ ?>
							<a href="<?php echo base_url(); ?>editdetaildt/<?php echo $detail->id; ?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-pencil"></i> Edit</a>
						<?php } ?>
					</div>
					<div class="box-body">
						<b><?php echo $detail->timestamp; ?></b><br>
						<?php echo nl2br($detail->forereport); ?><br>
						<b>Duration : </b><?php echo number_format($detail->dur/60, 2, '.', ''); ?><br>
						<b>Area : </b><?php echo $detail->area; ?><br>
						<b>Machine Name : </b><?php echo $detail->eq_name; ?><br>
						<b>Position : </b><?php echo $detail->posisi; ?><br>
						<b>Device : </b><?php echo $detail->device; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title"><b>B. Troubleshooting</b></div>
					</div>
					<form action="<?php echo base_url() ?>addsym" method="POST">
					<div class="box-body">
						<div class="text-center"><b>1. Symptom</b></div>
						<textarea name="sym" class="form-control" rows="6"></textarea>
					</div>
					</form>
					<div class="box-body table-responsive no-padding">
						<div class="text-center"><b>2. Cause and Solution</b></div>
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;" width="1%">No</th>
								<th class="text-center" style="border: 1px solid black;">Cause</th>
								<th class="text-center" style="border: 1px solid black;">Solution</th>
								<th class="text-center" style="border: 1px solid black;">Action</th>
							</tr>
						<?php
							if(!empty($dt_cs)){
								$a = 1;
								foreach($dt_cs as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td style="border: 1px solid black;"><?php echo nl2br($record->cause); ?></td>
								<td style="border: 1px solid black;"><?php echo nl2br($record->solution); ?></td>
								<td class="text-center" style="border: 1px solid black;">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editcause<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-default fade" id="editcause<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="add" action="<?php echo base_url() ?>editcause" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Cause:</label>
													<textarea name="cause" class="form-control" rows="5"><?php echo $record->cause; ?></textarea>
													<label class="pull-left">Solution:</label>
													<textarea name="solution" class="form-control" rows="5"><?php echo $record->solution; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="parent" value="<?php echo $detail->id; ?>">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delcause<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-default fade" id="delcause<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="add" action="<?php echo base_url() ?>delcause" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Cause:</label>
													<textarea name="cause" class="form-control" rows="5" disabled><?php echo $record->cause; ?></textarea>
													<label class="pull-left">Solution:</label>
													<textarea name="solution" class="form-control" rows="5" disabled><?php echo $record->solution; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="parent" value="<?php echo $detail->id; ?>">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
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
							<tr>
								<td class="text-center" style="border: 1px solid black;" colspan="5">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newcause"><i class="fa fa-plus"></i> Add Cause</button>
									<div class="modal modal-default fade" id="newcause">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="add" action="<?php echo base_url() ?>newcause" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Cause:</label>
													<textarea name="cause" class="form-control" rows="5"></textarea>
													<label class="pull-left">Solution:</label>
													<textarea name="solution" class="form-control" rows="5"></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="parent" value="<?php echo $detail->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title"><b>C. Reference</b></div>
					</div>
					<div class="box-body">
						<div class="col-md-8">
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<th class="text-center" style="border: 1px solid black;">No</th>
									<th class="text-center" style="border: 1px solid black;">Type</th>
									<th class="text-center" style="border: 1px solid black;">Title</th>
									<th class="text-center" style="border: 1px solid black;">Link</th>
								</tr>
						<?php
							if(!empty($dt_doc)){
								$a = 1;
								foreach($dt_doc as $docrec){
						?>
								<tr>
									<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
									<td class="text-center" style="border: 1px solid black;"><?php echo $docrec->doctype; ?></td>
									<td class="text-center" style="border: 1px solid black;"><?php echo $docrec->doctitle.' Rev'.$docrec->docrev; ?></td>
									<td class="text-center" style="border: 1px solid black;">
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#save_row<?php echo $docrec->id; ?>" title="Delete"><i class="fa fa-trash"></i></button>
										<div class="modal modal-danger fade" id="save_row<?php echo $docrec->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>unlinkrefdoc" method="post" role="form">
												<div class="modal-body">
													Unlink <?php echo $docrec->doctitle; ?>, are you sure?
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $docrec->id; ?>">
													<input type="hidden" name="backid" value="<?php echo $detail->id?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-danger btn-outline" value="UNLINK">
												</div>
												</form>
											</div>
										</div>
									</div>
										<?php if($docrec->doctype == 'PRG'){?>
											<?php if($_SERVER['REMOTE_ADDR'] == '192.168.1.1'){?>
												<a class="btn btn-sm btn-success" href="<?php echo base_url().'filedownload/prg/'.$docrec->docid; ?>" target="_blank">Download PRG</a>
											<?php }else{?>
												<button class="btn btn-sm btn-success" disabled><i class="fa fa-lock"></i> LOCAL ONLY</button>
											<?php }?>
										<?php }?>
										<?php if($docrec->doctype == 'DWG'){?>
											<?php if($_SERVER['REMOTE_ADDR'] == '192.168.1.1'){?>
												<a class="btn btn-sm btn-success" href="<?php echo base_url().'filedownload/dwg/'.$docrec->docid; ?>" target="_blank">Download DWG</a>
											<?php }else{?>
												<button class="btn btn-sm btn-success" disabled><i class="fa fa-lock"></i> LOCAL ONLY</button>
											<?php }?>
										<?php }?>
										<?php if($docrec->doctype == 'OPR'){?>
											<a class="btn btn-sm btn-success" href="<?php echo base_url().'oprprint/'.$docrec->docid; ?>" title="Print" target="_blank"><i class="fa fa-print"></i></a>
										<?php }?>
										<?php if($docrec->doctype == 'SEQ'){?>
											<a class="btn btn-sm btn-success" href="<?php echo base_url().'seqprint/'.$docrec->docid; ?>" title="Print" target="_blank"><i class="fa fa-print"></i></a>
										<?php }?>
									</td>
								</tr>
						<?php 
									$a++;
								} 
							}
						?>
							</table>
						</div>
						<div class="col-md-4">
							<label>Program:</label>
							<form action="<?php echo base_url() ?>addrefprg" method="POST">
							<div class="input-group">
								<select id="prglist" name="prglist" class="form-control" required>
									<option value=""></option>
									<?php if(!empty($prglist)){ 
										foreach($prglist as $record){
									?>
									<option value="<?php echo $record->id; ?>"><?php echo $record->prg_name.' Rev.'.$record->rev; ?> [<?php echo $record->prg_type; ?>]</option>
									<?php } }?>
								</select>
								<div class="input-group-btn">
									<input type="hidden" name="id" value="<?php echo $detail->id?>">
									<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
								</div>
							</div>
							</form>
							
							<label>Drawing and Standard:</label>
							<form action="<?php echo base_url() ?>addrefdwg" method="POST">
							<div class="input-group">
								<select id="dwglist" name="dwglist" class="form-control" required>
									<option value=""></option>
									<?php if(!empty($dwglist)){ 
										foreach($dwglist as $record){
									?>
									<option value="<?php echo $record->id; ?>"><?php echo $record->dwg_name.' Rev.'.$record->rev; ?> [<?php echo $record->dwg_type; ?>]</option>
									<?php } }?>
								</select>
								<div class="input-group-btn">
									<input type="hidden" name="id" value="<?php echo $detail->id?>">
									<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
								</div>
							</div>
							</form>
							
							<label>Operation Guidance:</label>
							<form action="<?php echo base_url() ?>addrefopr" method="POST">
							<div class="input-group">
								<select id="oprlist" name="oprlist" class="form-control" required>
									<option value=""></option>
									<?php if(!empty($oprlist)){ 
										foreach($oprlist as $record){
									?>
									<option value="<?php echo $record->id; ?>"><?php echo $record->opr_title.' Rev.'.$record->rev; ?></option>
									<?php } }?>
								</select>
								<div class="input-group-btn">
									<input type="hidden" name="id" value="<?php echo $detail->id?>">
									<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
								</div>
							</div>
							</form>
							
							<label>Machine Sequence:</label>
							<form action="<?php echo base_url() ?>addrefseq" method="POST">
							<div class="input-group">
								<select id="seqlist" name="seqlist" class="form-control" required>
									<option value=""></option>
									<?php if(!empty($seqlist)){ 
										foreach($seqlist as $record){
									?>
									<option value="<?php echo $record->id; ?>"><?php echo $record->seq_title.' Rev.'.$record->rev; ?></option>
									<?php } }?>
								</select>
								<div class="input-group-btn">
									<input type="hidden" name="id" value="<?php echo $detail->id?>">
									<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
								</div>
							</div>
							</form>
							
						</div>
					</div>
					<div class="box-footer">
						
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#prglist").select2({
			placeholder: "Select Program"
		});
	});
	$(document).ready(function(){
		$("#dwglist").select2({
			placeholder: "Select Design"
		});
	});
	$(document).ready(function(){
		$("#oprlist").select2({
			placeholder: "Select Operation"
		});
	});
	$(document).ready(function(){
		$("#seqlist").select2({
			placeholder: "Select Operation"
		});
	});
</script>