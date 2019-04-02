<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $opr->opr_title; ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<table>
					<tr>
						<td width="110px" class="text-center" style="border: 1px solid black; padding: 5px;">
							<img src="/var/www/html/mechdata/assets/dtdoc/opr/<?php echo $mainlogo;?>" width="100px">
						</td>
						<td width="360px" class="text-center" style="border: 1px solid black; padding: 5px;">
							<font size="4"><b><?php echo $opr->opr_title; ?></b></font>
							<br>
							<b><?php echo 'REV.'.$opr->rev;?></b>
						</td>
						<td width="200px" class="text-center" style="border: 1px solid black; padding: 5px;">
							<font size="1"><b>Created by.</b><?php echo $opr->addedby; ?><?php if(!empty($opr->savedate) and $opr->saved == 1){echo '/'.date('d-m-Y',$opr->savedate);}?></font><br>
							<font size="1"><b>Checked by.</b><?php echo $opr->appuser1; ?><?php if(!empty($opr->appdate1) and $opr->app1 == 1){echo '/'.date('d-m-Y',$opr->appdate1);}?></font><br>
							<font size="1"><b>Approved by.</b><?php echo $opr->appuser2; ?><?php if(!empty($opr->appdate2) and $opr->app2 == 1){echo '/'.date('d-m-Y',$opr->appdate2);}?></font>
						</td>
					</tr>
				</table>
				<table  class="table">
					<tr>
						<th width="20px" class="text-center" style="border: 1px solid black; padding: 1px;"><font size="1">No</font></th>
						<th width="200px" class="text-center" style="border: 1px solid black; padding: 1px;"><font size="1">Image</font></th>
						<th width="200px" class="text-center" style="border: 1px solid black; padding: 1px;"><font size="1">Step of Work</font></th>
						<th width="200px" class="text-center" style="border: 1px solid black; padding: 1px;"><font size="1">Parameter/Advice</font></th>
					</tr>
				<?php
					if(!empty($doc)){
						$a = 1;
						foreach($doc as $record){
				?>
					<tr>
						<td width="20px" class="text-center" style="border: 1px solid black; padding:5px;"><font size="1"><?php echo $a; ?></font></td>
						<td width="200px" class="text-center" style="border: 1px solid black;padding:5px;">
						<?php if(!empty($record->opr_link)){?>
							<img src="/var/www/html/mechdata/assets/dtdoc/opr/<?php echo $record->opr_link; ?>" width="200px">
						<?php } ?>
						</td>
						<td width="200px" style="border: 1px solid black;padding:5px;">
							<font size="1"><?php echo nl2br($record->opr_con); ?></font>
						</td>
						<td width="200px" style="border: 1px solid black;padding:5px;">
							<font size="1"><?php echo nl2br($record->opr_sta); ?></font>
						</td>
					</tr>
				<?php
							$a++;
						}
					}
				?>
					<tr>
						<td class="text-center" colspan="4" style="border: 1px solid black;">
							<font size="2"><b>Safety Instruction</b></font></br>
							<table class="table">
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
								<td class="text-center" style="padding: 3px;">
									<img src="/var/www/html/mechdata/assets/dtdoc/opr/<?php echo $rec->logo_link; ?>" width="60px">
									</br>
									<font size="1"><b><?php echo $rec->logo_name?></b></font>
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
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>