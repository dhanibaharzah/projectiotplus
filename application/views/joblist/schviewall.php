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
					<td><div class="pull-right"><font size="1" ><?php echo date('d-M-Y', $start); ?></font></div></td>
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
						<td style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><?php echo '<b>Added by:</b>'.$record->addedby.' <b>Arranged by:</b>'.$record->owner.'<br><b>'.$record->job_title.'</b><br>'.nl2br($record->job_desc); ?></font></p></td>
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
</html>