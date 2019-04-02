<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-book"></i> Machine Sequence <small> State or Flow Diagram</small> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="15%" class="text-center" colspan="2" style="border: 1px solid black;">
									<img src="<?php echo base_url(); ?>assets/dtdoc/opr/<?php echo $mainlogo;?>" width="100px">
								</td>
								<td width="55%" class="text-center" colspan="2" style="border: 1px solid black;">
									<h3><?php echo $seq1->seq_title; ?></h3><b><?php echo 'REV.'.$seq1->rev;?></b><br>
									<button type="button" class="btn btn-primary btn-sm pull-right" title="Edit title" data-toggle="modal" data-target="#edit_title"><i class="fa fa-pencil"></i></button><br>
									<div class="modal modal-default fade" id="edit_title">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editseqtitle" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Title:</label>
													<textarea type="text" name="seq_title" rows="5" class="form-control" required><?php echo $seq1->seq_title; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $seq1->id; ?>">
													<input type="hidden" name="rev" value="<?php echo $seq1->rev; ?>">
													<input type="hidden" name="seq_titlex" value="<?php echo $seq1->seq_title; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td width="30%" class="text-center" style="border: 1px solid black;">
									<b>Created by.</b><?php echo $seq1->addedby; ?><?php if(!empty($seq1->savedate) and $seq1->saved == 1){echo '/'.date('d-m-Y',$seq1->savedate);}?></br>
									<b>Checked by.</b><?php echo $seq1->appuser1; ?><?php if(!empty($seq1->appdate1) and $seq1->app1 == 1){echo '/'.date('d-m-Y',$seq1->appdate1);}?></br>
									<b>Approved by.</b><?php echo $seq1->appuser2; ?><?php if(!empty($seq1->appdate2) and $seq1->app2 == 1){echo '/'.date('d-m-Y',$seq1->appdate2);}?>
								</td>
							</tr>
							<tr>
								<td class="text-center" colspan="5" style="border: 1px solid black;">
								<h4>State Diagram / Flowchart</h4>
								<?php echo form_open_multipart('mtnbook/seqaddlink/'.$seq1->id);?>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>seqaddlink/<?php echo $seq1->id; ?>" method="post" role="form">
									<div class="form-control input-group">
										<input type="hidden" name="id" value="<?php echo $seq1->id; ?>">
										<input type="file" name="seq_link" class="form-control input-sm">
										<div class="input-group-btn">
											<button class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload</button>
										</div>
									</div>
									</form>
								<?php if(!empty($seq1->seq_link)){?>
									<img src="<?php echo base_url(); ?>assets/dtdoc/seq/<?php echo $seq1->seq_link; ?>" height="400px">
								<?php } ?>
								</td>
							</tr>
							<tr>
								<th width=" 5%" class="text-center" style="border: 1px solid black;">No</th>
								<th width="40%" colspan="2" class="text-center" style="border: 1px solid black;">State</th>
								<th width="55%" colspan="2" class="text-center" style="border: 1px solid black;">Note</th>
							</tr>
						<?php
							if(!empty($seqA)){
								$a = 1;
								foreach($seqA as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;">
									<?php echo $a; ?><br><br>
									<button type="button" class="btn btn-primary" title="Edit this row" data-toggle="modal" data-target="#edit_row<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button><br>
									<div class="modal modal-default fade" id="edit_row<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editseqrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">State:</label>
													<textarea type="text" name="dex_name" rows="5" class="form-control" required><?php echo $record->dex_name; ?></textarea>
													<label class="pull-left">Note:</label>
													<textarea type="text" name="dex_note" rows="5" class="form-control" required><?php echo $record->dex_note; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="backid" value="<?php echo $seq1->id; ?>">
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
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delseqrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">State:</label>
													<textarea type="text" name="dex_name" rows="5" class="form-control" disabled><?php echo $record->dex_name; ?></textarea>
													<label class="pull-left">Note:</label>
													<textarea type="text" name="dex_note" rows="5" class="form-control" disabled><?php echo $record->dex_note; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="backid" value="<?php echo $seq1->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-danger btn-outline" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td colspan="2" style="border: 1px solid black;">
									<?php echo nl2br($record->dex_name); ?>
								</td>
								<td colspan="2" style="border: 1px solid black;">
									<?php echo nl2br($record->dex_note); ?>
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
												<form role="form" id="edit_act" action="<?php echo base_url() ?>addseqrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">State:</label>
													<textarea type="text" name="dex_name" rows="2" class="form-control" required></textarea>
													<label class="pull-left">Note:</label>
													<textarea type="text" name="dex_note" rows="2" class="form-control" required></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $seq1->id; ?>">
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
								<h4>Sensor/Machine Layout</h4>
								<?php echo form_open_multipart('mtnbook/seqaddlink/'.$seq2->id);?>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>seqaddlink/<?php echo $seq2->id; ?>" method="post" role="form">
									<div class="form-control input-group">
										<input type="hidden" name="id" value="<?php echo $seq2->id; ?>">
										<input type="file" name="seq_link" class="form-control input-sm">
										<div class="input-group-btn">
											<button class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload</button>
										</div>
									</div>
									</form>
								<?php if(!empty($seq2->seq_link)){?>
									<img src="<?php echo base_url(); ?>assets/dtdoc/seq/<?php echo $seq2->seq_link; ?>" height="400px">
								<?php } ?>
								</td>
							</tr>
							<tr>
								<th width=" 5%" class="text-center" style="border: 1px solid black;">No</th>
								<th width="40%" colspan="2" class="text-center" style="border: 1px solid black;">State</th>
								<th width="55%" colspan="2" class="text-center" style="border: 1px solid black;">Note</th>
							</tr>
						<?php
							if(!empty($seqB)){
								$a = 1;
								foreach($seqB as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;">
									<?php echo $a; ?><br><br>
									<button type="button" class="btn btn-primary" title="Edit this row" data-toggle="modal" data-target="#edit_row<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button><br>
									<div class="modal modal-default fade" id="edit_row<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editseqrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">State:</label>
													<textarea type="text" name="dex_name" rows="5" class="form-control" required><?php echo $record->dex_name; ?></textarea>
													<label class="pull-left">Note:</label>
													<textarea type="text" name="dex_note" rows="5" class="form-control" required><?php echo $record->dex_note; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="backid" value="<?php echo $seq1->id; ?>">
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
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delseqrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">State:</label>
													<textarea type="text" name="dex_name" rows="5" class="form-control" disabled><?php echo $record->dex_name; ?></textarea>
													<label class="pull-left">Note:</label>
													<textarea type="text" name="dex_note" rows="5" class="form-control" disabled><?php echo $record->dex_note; ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="backid" value="<?php echo $seq1->id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-danger btn-outline" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td colspan="2" style="border: 1px solid black;">
									<?php echo nl2br($record->dex_name); ?>
								</td>
								<td colspan="2" style="border: 1px solid black;">
									<?php echo nl2br($record->dex_note); ?>
								</td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
							<tr>
								<td class="text-center" colspan="5" style="border: 1px solid black;">
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_row2"><i class="fa fa-plus"></i> Add row</button>
									<div class="modal modal-default fade" id="add_row2">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>addseqrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">State:</label>
													<textarea type="text" name="dex_name" rows="2" class="form-control" required></textarea>
													<label class="pull-left">Note:</label>
													<textarea type="text" name="dex_note" rows="2" class="form-control" required></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $seq2->id; ?>">
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
					<div class="box-footer clearfix">
						<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>seq_dt"><i class="fa fa-arrow-left"></i> BACK</a>
						<form role="form" id="edit_act" action="<?php echo base_url() ?>seqaskapp" method="post" role="form">
							<input type="hidden" name="id" value="<?php echo $seq1->id; ?>">
							<input type="hidden" name="id2" value="<?php echo $seq2->id; ?>">
							<button class="btn btn-primary pull-right"><i class="fa fa-check"></i> Ask Approval</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>