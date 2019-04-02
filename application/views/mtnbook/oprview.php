<div class="content-wrapper">
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
								<td width="53%" class="text-center" rowspan="3" colspan="2" style="border: 1px solid black;"><h3><?php echo $opr->opr_title; ?></h3></td>
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
								<th width="32%" colspan="2" class="text-center" style="border: 1px solid black;">Image</th>
								<th width="32%" class="text-center" style="border: 1px solid black;">Step of Work</th>
								<th width="32%" class="text-center" style="border: 1px solid black;">Parameter/Advice</th>
							</tr>
						<?php
							if(!empty($doc)){
								$a = 1;
								foreach($doc as $record){
						?>
							<tr>
								<td width=" 4%" class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td width="32%" colspan="2" class="text-center" style="border: 1px solid black;">
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
									<label>Safety Instruction</label></br>
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
					</div>
				</div>
			</div>
		</div>
	</section>
</div>