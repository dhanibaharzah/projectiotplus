<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $ticket->name; ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</head>
	
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<div class="box">
				<form action="<?php echo base_url() ?>submit_toolpm" method="POST">
				<?php
					if(!empty($doc)){
						$head = '';
						$head2 = '';
						$title = '';
						$title2 = '';
						$a=1;
						$input='';
						$kop = '';
						$kop2 = '';
						$x = 0;
						if(!empty($img)){$image = '<td class="text-center" style="border: 1px solid black;" colspan="2"><img src="'.base_url().'assets/report/'.$img->imglink.'.jpg" align="center" width="100%"/></td>';}else{$image='';}
						foreach($doc as $record){
							$kop = '<div class="box-body no-padding"><table class="table" style="border: 1px solid black;">
								<tr>
									<td class="text-center" style="border: 1px solid black;"><b>TOOL PM SHEET TITLE</b></td>
								</tr>
								<tr>
									<td class="text-center" style="border: 1px solid black;">'.$record->title.'</td>
								</tr>
								<tr>
									'.$image.'
								</tr>
								</table></div>';
							if($kop != $kop2){echo $kop;}
							$head = '<div class="box-body no-padding"><table class="table table-hover table-striped table-bordered" >
								<tr>
									<th class="text-center" style="border: 1px solid black;">Condition</th>
									<th class="text-center" style="border: 1px solid black;">Stand</th>
									<th class="text-center" style="border: 1px solid black;">Answer_Type</th>
								</tr>';
							if($head != $head2){echo $head;}
							$title = '';
							if($title != $title2){echo $title; $a=1;}
							if($record->answer_type == 1){$input = '<input type="number" class="form-control input-sm" step="0.0001" name="inputan['.$x.']" required/>';}
							if($record->answer_type == 2){
								$input = '
								<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1">YES</label>
								<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2">NO</label>';}
							if($record->answer_type != 2 and $record->answer_type != 1){$input = $record->answer_type;}
				?>
					<tr>
						<td style="border: 1px solid black;"><?php echo $record->cond; ?></td>
						<td style="border: 1px solid black;"><?php echo $record->stan; ?></td>
						<td style="border: 1px solid black;"><?php echo $input; ?></td>
						<input type="hidden" class="form-control input-sm" name="id[]" value="<?php echo $record->id; ?>"/>
					</tr>
				<?php
						$head2 = $head;
						$kop2 = $kop;
						$title2 = $title;
						$a++;$x++;
						}
				?>
					</table>
				</div>
				
				<div class="box-footer">
					<input type="hidden" name="toolid" value="<?php echo $ticket->toolid; ?>"/>
					<input type="hidden" name="ticket_id" value="<?php echo $ticket->id; ?>"/>
					<input type="submit" class="btn btn-success btn-block"value="Submit"/>	
				<?php
					}
				?>
				</form>
				</div>
			</div>
		</div>
	</div>
</html>