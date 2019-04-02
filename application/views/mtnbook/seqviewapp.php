<div class="content-wrapper">
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
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td colspan="2" style="border: 1px solid black;"><?php echo nl2br($record->dex_name); ?></td>
								<td colspan="2" style="border: 1px solid black;"><?php echo nl2br($record->dex_note); ?></td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
							<tr>
								<td class="text-center" colspan="5" style="border: 1px solid black;">
								<h4>Sensor/Machine Layout</h4>
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
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td colspan="2" style="border: 1px solid black;"><?php echo nl2br($record->dex_name); ?></td>
								<td colspan="2" style="border: 1px solid black;"><?php echo nl2br($record->dex_note); ?></td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
						</table>
					</div>
					<div class="box-footer clearfix">
						<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>seq_dt"><i class="fa fa-arrow-left"></i> BACK</a>
					<?php if(($seq1->app1 == 0 and $userdata->applog1 == 1) or ($seq1->app2 == 0 and $userdata->applog2 == 1)){?>
						<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#rej_opr<?php echo $seq1->id; ?>"><i class="fa fa-close"></i> Reject</button>
						<div class="modal modal-danger fade" id="rej_opr<?php echo $seq1->id; ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
									</div>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>app_seq" method="post" role="form">
									<div class="modal-body">
										You will reject <?php echo $seq1->seq_title; ?>, are you sure? Please write a note
										<textarea class="form-control" name="note" rows="4" required></textarea>
									</div>
									<div class="modal-footer">
										<input type="hidden" name="id" value="<?php echo $seq1->id; ?>">
										<input type="hidden" name="act" value="2">
										<input type="hidden" name="appnum" value="<?php if($seq1->app1 == 0 and $seq1->app2 == 0){echo '1'; }elseif($seq1->app1 == 1){echo '2';}?>">
										<input type="hidden" name="addedby" value="<?php echo $seq1->addedby; ?>">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
										<input type="submit" class="btn btn-danger btn-outline" value="Reject">
									</div>
									</form>
								</div>
							</div>
						</div>
						<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#app_opr<?php echo $seq1->id; ?>"><i class="fa fa-check"></i> Approve</button>
						<div class="modal modal-default fade" id="app_opr<?php echo $seq1->id; ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
									</div>
									<form role="form" id="edit_act" action="<?php echo base_url() ?>app_seq" method="post" role="form">
									<div class="modal-body">
										You will approve <?php echo $seq1->seq_title; ?>, are you sure?
									</div>
									<div class="modal-footer">
										<input type="hidden" name="id" value="<?php echo $seq1->id; ?>">
										<input type="hidden" name="act" value="1">
										<input type="hidden" name="appnum" value="<?php if($seq1->app1 == 0 and $seq1->app2 == 0){echo '1'; }elseif($seq1->app1 == 1){echo '2';}?>">
										<input type="hidden" name="addedby" value="<?php echo $seq1->addedby; ?>">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
										<input type="submit" class="btn btn-primary" value="Approve">
									</div>
									</form>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>