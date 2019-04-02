<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Project Job</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</head>
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<td><img src="<?php echo base_url()?>assets/images/scg-logo.png" style="height:30px"/></td>
					<td class="text-center"><font size="2" ><b>Maintenace Schedule<br>PT. SCG Lightweight Concrete Indonesia</b></font></td>
					<td><div class="pull-right"><font size="1" ><?php echo date('d-M-Y', strtotime($project_doc->docno)); ?></font></div></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive no-padding">
				<table class="table" style="border: 1px solid black;">
					<tr style="border: 1px solid black">
						<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">No</font></th>
						<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">Activity</font></th>
						<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">Time</font></th>
						<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">PIC</font></th>
						<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">Spare Part</font></th>
						<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">Tools</font></th>
						<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">Document</font></th>
					</tr>
				<?php
					if(!empty($joblist)){
						$a=1;
						foreach($joblist as $record){
				?>
					<tr style="border: 1px solid black">
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><?php echo $a; ?></font></p></td>
						<td style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><?php echo '<b>Added by: '.$record->addedby.'</b><br><b>'.$record->job_title.'</b><br>'.nl2br($record->job_desc); ?></font></p></td>
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><?php echo gmdate('H:i', $record->start).'<br>to<br>'.gmdate('H:i', $record->end); ?></font></p></td>
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><span id="pic<?php echo $a; ?>"></span></font></p></td>
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><span id="sparepart<?php echo $a; ?>"></span></font></p></td>
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><span id="tool<?php echo $a; ?>"></span></font></p></td>
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"></font></p></td>
						<script type="text/javascript">
							$(window).on('load', function(){
								$('#sparepart<?php echo $a;?>').load('<?php echo base_url();?>schviewpart/<?php echo $record->project_id; ?>');
								$('#tool<?php echo $a;?>').load('<?php echo base_url();?>schviewtool/<?php echo $record->project_id; ?>');
								$('#pic<?php echo $a;?>').load('<?php echo base_url();?>schviewuser/<?php echo $record->id; ?>');
							});
						</script>
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
	<div class="row">
		<div class="col-xs-6">
			<a href="<?php echo base_url()?>schaction/<?php echo $project_doc->id?>/1" class="btn btn-success btn-block btn-sm">Approve</a>
		</div>
		<div class="col-xs-6">
			<a href="<?php echo base_url()?>schaction/<?php echo $project_doc->id?>/2" class="btn btn-danger btn-block btn-sm">Reject</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4">
		</div>
		<div class="col-lg-8 col-md-8 col-xs-12">
			<table class="table" style="border: 2px solid black;">
				<tr>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><font size="1">
						<b>Issued by,</b>
					</font></td>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><font size="1">
						<b>PIC Area,</b>
					</font></td>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><font size="1">
						<b>Checked by,</b>
					</font></td>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><font size="1">
						<b>Acknowledge by,</b>
					</font></td>
				</tr>
				<tr>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><p style="line-height: 1.1"><font size="1">
						<b><?php echo $project_doc->owner; ?></b><br>
						<?php if(!empty($project_doc->unix0)){echo date('H:i:s d/m/Y', $project_doc->unix0);} ?>
					</font></p></td>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><p style="line-height: 1.1"><font size="1">
						<b><?php echo $project_doc->app1; ?></b><br>
						<?php if(!empty($project_doc->unix1)){echo date('H:i:s d/m/Y', $project_doc->unix1);} ?>
					</font></p></td>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><p style="line-height: 1.1"><font size="1">
						<b><?php echo $project_doc->app2; ?></b><br>
						<?php if(!empty($project_doc->unix2)){echo date('H:i:s d/m/Y', $project_doc->unix2);} ?>
					</font></p></td>
					<td class="text-center" style="border: 1px solid black; padding:2px;" width="25%"><p style="line-height: 1.1"><font size="1">
						<b><?php echo $project_doc->app3; ?></b><br>
						<?php if(!empty($project_doc->unix3)){echo date('H:i:s d/m/Y', $project_doc->unix3);} ?>
					</font></p></td>
				</tr>
			</table>
		</div>
	</div>
	
</html>