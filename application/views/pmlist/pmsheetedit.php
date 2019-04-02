<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $xcode; ?></title>
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
				
					<form action="<?php echo base_url() ?>submit_pm" method="POST">
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
							foreach($doc as $record){
								$kop = '<div class="box-body no-padding"><table class="table" style="border: 1px solid black;">
									<tr>
										<td class="text-center" style="border: 1px solid black;"><font size="2"><b>EQUIPMENT NAME</b></font></td>
										<td class="text-center" style="border: 1px solid black;"><font size="2"><b>CODE</b></font></td>
									</tr>
									<tr>
										<td class="text-center" style="border: 1px solid black;">'.$record->eq_name.'</td>
										<td class="text-center" style="border: 1px solid black;">'.$record->code.'</td>
									</tr>
									<tr>
										<td class="text-center" colspan="2" style="border: 1px solid black;">
											<img src="'.base_url().'assets/picture/'.$record->code.'.jpg" style="vertical-align: bottom;"  align="center" width="100%"></img>';
											
							$kop .= '<table class="table table-hover table-striped table-bordered">
												<tr>
													<td class="text-center" width="16%" style="padding: 0;"></td>
													<td class="text-center" width="17%" style="padding: 0;"></td>
													<td class="text-center" width="17%" style="padding: 0;"></td>
													<td class="text-center" width="16%" style="padding: 0;"></td>
													<td class="text-center" width="17%" style="padding: 0;"></td>
													<td class="text-center" width="17%" style="padding: 0;"></td>
												</tr>';
							if(!empty($usedlogo)){
								$noa=0;
								foreach($usedlogo as $rec){
									$nob = $noa %6;
									if($nob == 0){$kop .= '<tr>';}else{$kop .= '';}
									$kop .=	'<td class="text-center" style="padding: 2;">
											<img src="'.base_url().'assets/dtdoc/opr/'.$rec->logo_link.'" width="100%">
											</br>
											<font size="1"><b>'.$rec->logo_name.'</b></font>
										</td>';
									if($nob == 5){$kop .= '</tr>';}else{$kop .= '';}
									$noa++;
								}
							}
						$kop .= '</table>';
								$kop .= '</td>
									</tr>
									</table></div>';
								if($kop != $kop2){echo $kop;}
								$head = '<div class="box-body no-padding"><table class="table table-hover table-striped table-bordered" >
									<tr>
										<th class="text-center" style="border: 1px solid black;"><font size="2">No</font></th>
										<th class="text-center" style="border: 1px solid black;"><font size="2">Condition</font></th>
										<th class="text-center" style="border: 1px solid black;"><font size="2">Standard</font></th>
										<th class="text-center" style="border: 1px solid black;"><font size="2">Answer_Type</font></th>
									</tr>';
								if($head != $head2){echo $head;}
								$title = '<td colspan="4" style="border: 1px solid black;"><font size="2"><b>'.$record->title.'</b></font></td>';
								if($title != $title2){echo $title; $a=1;}
								if($record->type == 1){$input = '<input type="number" class="form-control input-sm" step="0.01" name="inputan['.$x.']" value="'.$record->input.'"/>';}
								if($record->type == 2){
									$radio1 = ''; $radio2 = '';
									if($record->input == 1){$radio1 = 'checked';}
									if($record->input == 2){$radio2 = 'checked';}
									$input = '
									<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1" '.$radio1.'>YES</label>
									<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2" '.$radio2.'>NO</label>';}
								if($record->type != 2 and $record->type != 1){$input = $record->type;}
					?>
						<tr>
							<td class="text-center" style="border: 1px solid black;"><font size="2"><?php echo $a; ?></font></td>
							<td style="border: 1px solid black;"><font size="2"><?php echo $record->cond; ?></font></td>
							<td style="border: 1px solid black;"><font size="2"><?php echo $record->stand; ?></font>
							<?php if($record->type == 1){?>	
								<font size="2"><span class="pull-right">
								<b>Min:</b> <?php echo $record->min_val; ?> 
								<b>Max:</b> <?php echo $record->max_val;?> 
								<b>Unit:</b> <?php echo $record->unit_val;?>
								</span></font>
							<?php } ?>
							</td>
							<td style="border: 1px solid black;"><font size="2"><?php echo $input; ?></font></td>
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
						<div class="box-body table-responsive no-padding">
								<div class="form-group has-feedback">
									<input type="text" class="form-control" placeholder="username" name="username" required />
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								</div>
							
								<div class="form-group has-feedback">
									<input type="password" class="form-control" placeholder="Password" name="password" required />
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								</div>
							
								<input type="hidden" name="code" value="<?php echo $record->code; ?>"/>
								<input type="hidden" name="freq" value="<?php echo $record->frec; ?>"/>
								<input type="hidden" name="tag" value="<?php echo $tag; ?>"/>
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