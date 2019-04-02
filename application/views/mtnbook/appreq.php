<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-check"></i> Approval Request <small>List of all requested document</small> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Program
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Title</th>
								<th class="text-center" style="border: 1px solid black;">Rev</th>
								<th class="text-center" style="border: 1px solid black;">Type</th>
								<th class="text-center" style="border: 1px solid black;">Link</th>
							</tr>
						<?php
							if(!empty($prg)){
								$a = 1;
								foreach($prg as $record){
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
								<?php if(($record->app1 == 0 and $userdata->applog1 == 1) or ($record->app2 == 0 and $userdata->applog2 == 1)){?>
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#app_prg<?php echo $record->id; ?>"><i class="fa fa-check"></i></button>
									<div class="modal modal-default fade" id="app_prg<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>app_mtnlog" method="post" role="form">
												<div class="modal-body">
													You will approve <?php echo $record->prg_name; ?>, are you sure?
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="act" value="1">
													<input type="hidden" name="tipe" value="1">
													<input type="hidden" name="appnum" value="<?php if($record->app1 == 0 and $record->app2 == 0){echo '1'; }elseif($record->app1 == 1){echo '2';}?>">
													<input type="hidden" name="addedby" value="<?php echo $record->addedby; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Approve">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rej_prg<?php echo $record->id; ?>"><i class="fa fa-close"></i></button>
									<div class="modal modal-danger fade" id="rej_prg<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>app_mtnlog" method="post" role="form">
												<div class="modal-body">
													You will reject <?php echo $record->prg_name; ?>, are you sure? Please write a note
													<textarea class="form-control" name="note" required></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="act" value="2">
													<input type="hidden" name="tipe" value="1">
													<input type="hidden" name="appnum" value="<?php if($record->app1 == 0 and $record->app2 == 0){echo '1'; }elseif($record->app1 == 1){echo '2';}?>">
													<input type="hidden" name="addedby" value="<?php echo $record->addedby; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-danger btn-outline" value="Reject">
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
										<b>Uploaded by.</b> <?php echo $record->addedby; ?>
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
							}else{
								echo '<td colspan="5" style="border: 1px solid black;">No data</td>';
							}
						?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Drawing
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Title</th>
								<th class="text-center" style="border: 1px solid black;">Rev</th>
								<th class="text-center" style="border: 1px solid black;">Type</th>
								<th class="text-center" style="border: 1px solid black;">Link</th>
							</tr>
						<?php
							if(!empty($dwg)){
								$a = 1;
								foreach($dwg as $record){
						?>
							<tr>
								<td class="text-center" rowspan="2" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->dwg_name; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->rev; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->dwg_type; ?></td>
								<td class="text-center" style="border: 1px solid black;">
								<?php if($_SERVER['REMOTE_ADDR'] == '192.168.1.1'){?>
									<a class="btn btn-sm btn-success" href="<?php echo base_url().'filedownload/dwg/'.$record->id; ?>" target="_blank"><?php echo $record->dwg_link; ?></a>
								<?php }else{?>
									<button class="btn btn-sm btn-success" disabled><i class="fa fa-lock"></i> LOCAL ONLY</button>
								<?php }?>
								<?php if(($record->app1 == 0 and $userdata->applog1 == 1) or ($record->app2 == 0 and $userdata->applog2 == 1)){?>
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#app_prg<?php echo $record->id; ?>"><i class="fa fa-check"></i></button>
									<div class="modal modal-default fade" id="app_prg<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>app_mtnlog" method="post" role="form">
												<div class="modal-body">
													You will approve <?php echo $record->dwg_name; ?>, are you sure?
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="act" value="1">
													<input type="hidden" name="tipe" value="2">
													<input type="hidden" name="appnum" value="<?php if($record->app1 == 0 and $record->app2 == 0){echo '1'; }elseif($record->app1 == 1){echo '2';}?>">
													<input type="hidden" name="addedby" value="<?php echo $record->addedby; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Approve">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rej_prg<?php echo $record->id; ?>"><i class="fa fa-close"></i></button>
									<div class="modal modal-danger fade" id="rej_prg<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>app_mtnlog" method="post" role="form">
												<div class="modal-body">
													You will reject <?php echo $record->dwg_name; ?>, are you sure? Please write a note
													<textarea class="form-control" name="note" required></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" value="<?php echo $record->id; ?>">
													<input type="hidden" name="act" value="2">
													<input type="hidden" name="tipe" value="2">
													<input type="hidden" name="appnum" value="<?php if($record->app1 == 0 and $record->app2 == 0){echo '1'; }elseif($record->app1 == 1){echo '2';}?>">
													<input type="hidden" name="addedby" value="<?php echo $record->addedby; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-danger btn-outline" value="Reject">
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
										<b>Uploaded by.</b> <?php echo $record->addedby; ?>
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
							}else{
								echo '<td colspan="5" style="border: 1px solid black;">No data</td>';
							}
						?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Operation guide
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Title</th>
								<th class="text-center" style="border: 1px solid black;">Rev</th>
								<th class="text-center" style="border: 1px solid black;">Link</th>
							</tr>
						<?php
							if(!empty($opr)){
								$a = 1;
								foreach($opr as $record){
						?>
							<tr>
								<td class="text-center" rowspan="2" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->opr_title; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->rev; ?></td>
								<td class="text-center" style="border: 1px solid black;">
									<a class="btn btn-sm btn-warning" href="<?php echo base_url().'oprviewapp/'.$record->id; ?>" title="View"><i class="fa fa-search"></i></a>
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
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Machine Sequence
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Title</th>
								<th class="text-center" style="border: 1px solid black;">Rev</th>
								<th class="text-center" style="border: 1px solid black;">Link</th>
							</tr>
						<?php
							if(!empty($seq)){
								$a = 1;
								foreach($seq as $record){
						?>
							<tr>
								<td class="text-center" rowspan="2" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->seq_title; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->rev; ?></td>
								<td class="text-center" style="border: 1px solid black;">
									<a class="btn btn-sm btn-warning" href="<?php echo base_url().'seqviewapp/'.$record->id; ?>" title="View"><i class="fa fa-search"></i></a>
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
				</div>
			</div>
		</div>
	</section>
</div>