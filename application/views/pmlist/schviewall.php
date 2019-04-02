<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PM Job</title>
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
					<td class="text-center"><font size="2" ><b>PM Schedule<br>PT. SCG Lightweight Concrete Indonesia</b></font></td>
					<td><div class="pull-right"><font size="1" ><?php echo date('d-M-Y', $start); ?></font></div></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive no-padding">
				<table class="table" style="border: 1px solid black;">
				<?php
					if(!empty($joblist)){
						$a=1;
						$tag = '';
						$tip = '';
						$tag2 = '';
						$tip2 = '';
						foreach($joblist as $record){
							if($record->repeater < 10){$tip = '<tr><td class="text-center" colspan="5" style="border: 1px solid black; padding:1px;"><p style="line-height: 1.1"><font size="1"><b>Weekly</b></font></p></td></tr>';}
							if($record->repeater >= 10 and $record->repeater < 40){$tip = '<tr><td class="text-center" colspan="5" style="border: 1px solid black; padding:1px;"><p style="line-height: 1.1"><font size="1"><b>Monthly</b></font></p></td></tr>';}
							if($record->repeater >= 40){$tip = '<tr><td class="text-center" colspan="5" style="border: 1px solid black; padding:1px;"><p style="line-height: 1.1"><font size="1"><b>Long Interval</b></font></p></td></tr>';}
							if($record->tag == 1){$tag = '<tr><td class="text-center" colspan="5" style="border: 1px solid black; padding:1px;"><p style="line-height: 1.1"><font size="1"><b>Electrical</b></font></p></td></tr>';}
							if($record->tag == 2){$tag = '<tr><td class="text-center" colspan="5" style="border: 1px solid black; padding:1px;"><p style="line-height: 1.1"><font size="1">Mechanical</font></p></td></tr>';}
							$tip .= '
								<tr style="border: 1px solid black">
									<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">No</font></th>
									<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">Activity</font></th>
									<th class="text-center" style="border: 1px solid black; padding:2px;"><font size="1">Document</font></th>
								</tr>';
							if($tag != $tag2){echo $tag;}
							if($tip != $tip2){echo $tip;}
				?>
					<tr style="border: 1px solid black">
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><?php echo $a; ?></font></p></td>
						<td style="border: 1px solid black; padding:2px;">
							<p style="line-height: 1.1"><font size="1"><?php echo '<b>'.$record->job_title.'</b><br>'.nl2br($record->job_desc); ?></font></p>
							<p style="line-height: 1.1"><font size="1"><span id="sparepart<?php echo $a; ?>"></span></font></p>
							<p style="line-height: 1.1"><font size="1"><span id="tool<?php echo $a; ?>"></span></font></p>
						</td>
						<td class="text-center" style="border: 1px solid black; padding:2px;"><p style="line-height: 1.1"><font size="1"><span id="form<?php echo $a; ?>"></span></font></p></td>
						<script type="text/javascript">
							$(window).on('load', function(){
								$('#sparepart<?php echo $a;?>').load('<?php echo base_url();?>schviewpart/<?php echo $record->id; ?>');
								$('#tool<?php echo $a;?>').load('<?php echo base_url();?>schviewtool/<?php echo $record->id; ?>');
								$('#pic<?php echo $a;?>').load('<?php echo base_url();?>schviewuser/<?php echo $record->id; ?>');
								$('#form<?php echo $a;?>').load('<?php echo base_url();?>schviewform/<?php echo $record->id; ?>');
							});
						</script>
					</tr>
				<?php
							$a++;
							$tag2 = $tag;
							$tip2 = $tip;
						}
					}
				?>
				</table>
			</div>
		</div>
	</div>
</html>