<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $seq1->seq_title; ?></title>
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
								<td width="100px" class="text-center" colspan="2" style="border: 1px solid black; padding: 5px;">
									<img src="/var/www/html/mechdata/assets/dtdoc/opr/<?php echo $mainlogo;?>" width="100px">
								</td>
								<td width="370px" class="text-center" colspan="2" style="border: 1px solid black; padding: 5px;">
									<font size="4"><?php echo $seq1->seq_title; ?></font><br><b><?php echo 'REV.'.$seq1->rev;?></b><br>
								</td>
								<td width="200px" class="text-center" style="border: 1px solid black; padding: 5px;">
									<font size="1"><b>Created by.</b><?php echo $seq1->addedby; ?><?php if(!empty($seq1->savedate) and $seq1->saved == 1){echo '/'.date('d-m-Y',$seq1->savedate);}?></font><br>
									<font size="1"><b>Checked by.</b><?php echo $seq1->appuser1; ?><?php if(!empty($seq1->appdate1) and $seq1->app1 == 1){echo '/'.date('d-m-Y',$seq1->appdate1);}?></font><br>
									<font size="1"><b>Approved by.</b><?php echo $seq1->appuser2; ?><?php if(!empty($seq1->appdate2) and $seq1->app2 == 1){echo '/'.date('d-m-Y',$seq1->appdate2);}?></font>
								</td>
							</tr>
							<tr>
								<td class="text-center" colspan="5" style="border: 1px solid black; padding: 5px;">
								<font size="2">State Diagram / Flowchart</font><br>
								<?php if(!empty($seq1->seq_link)){?>
									<img src="/var/www/html/mechdata/assets/dtdoc/seq/<?php echo $seq1->seq_link; ?>" height="300px">
								<?php } ?>
								</td>
							</tr>
							<tr>
								<th width=" 5%" class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1">No</font></th>
								<th width="40%" colspan="2" class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1">State</font></th>
								<th width="55%" colspan="2" class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1">Note</font></th>
							</tr>
						<?php
							if(!empty($seqA)){
								$a = 1;
								foreach($seqA as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1"><?php echo $a; ?></font></td>
								<td colspan="2" style="border: 1px solid black; padding: 5px;"><font size="1"><?php echo nl2br($record->dex_name); ?></font></td>
								<td colspan="2" style="border: 1px solid black; padding: 5px;"><font size="1"><?php echo nl2br($record->dex_note); ?></font></td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
							<tr>
								<td class="text-center" colspan="5" style="border: 1px solid black; padding: 5px;">
								<font size="2">Sensor/Machine Layout</font><br>
								<?php if(!empty($seq2->seq_link)){?>
									<img src="/var/www/html/mechdata/assets/dtdoc/seq/<?php echo $seq2->seq_link; ?>" height="300px">
								<?php } ?>
								</td>
							</tr>
							<tr>
								<th width=" 5%" class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1">No</font></th>
								<th width="40%" colspan="2" class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1">State</font></th>
								<th width="55%" colspan="2" class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1">Note</font></th>
							</tr>
						<?php
							if(!empty($seqB)){
								$a = 1;
								foreach($seqB as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black; padding: 5px;"><font size="1"><?php echo $a; ?></font></td>
								<td colspan="2" style="border: 1px solid black; padding: 5px;"><font size="1"><?php echo nl2br($record->dex_name); ?></font></td>
								<td colspan="2" style="border: 1px solid black; padding: 5px;"><font size="1"><?php echo nl2br($record->dex_note); ?></font></td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
						</table>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</body>
</html>