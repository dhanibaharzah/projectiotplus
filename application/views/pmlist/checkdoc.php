<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Document
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<form action="<?php echo base_url() ?>checkdoc" method="POST">
						<?php if(empty($tag)){?>
						<div class="form-group form-group-sm col-md-4">
							<select id="tag" name="tag" class="form-control" required>
								<option value="1" <?php if(!empty($tag)){if($tag == 1){echo 'selected';}}?>>Electrical</option>
								<option value="2" <?php if(!empty($tag)){if($tag == 2){echo 'selected';}}?>>Mechanical</option>
							</select>
						</div>
						<?php } ?>
						<?php if(!empty($tag)){?>
						<div class="form-group form-group-sm col-md-4">
							<b><?php if(!empty($tag)){if($tag == 1){echo 'Electrical';}}?></b>
							<b><?php if(!empty($tag)){if($tag == 2){echo 'Mechanical';}}?></b>
							<input type="hidden" name="tag" value="<?php echo $tag; ?>"/>
						</div>
						<?php } ?>
						<?php if(!empty($tag) and empty($frec)){?>
						<div class="form-group form-group-sm col-md-4">
							<select id="frec" name="frec" class="form-control" required>
								<option value="1" <?php if(!empty($frec)){if($frec == 1){echo 'selected';}}?>>Weekly</option>
								<option value="2" <?php if(!empty($frec)){if($frec == 2){echo 'selected';}}?>>Monthly</option>
							</select>
						</div>
						<?php }?>
						<?php if(!empty($frec)){?>
						<div class="form-group form-group-sm col-md-4">
							<b><?php if(!empty($frec)){if($frec == 1){echo 'Weekly';}}?></b>
							<b><?php if(!empty($frec)){if($frec == 2){echo 'Monthly';}}?></b>
							<input type="hidden" name="frec" value="<?php echo $frec; ?>"/>
						</div>
						<?php } ?>
						<?php if(!empty($frec)){?>
						<div class="form-group form-group-sm col-md-8">
							<select id="code" name="code" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($doclist)){ 
									foreach($doclist as $record)
									{
								?>
								<option value="<?php echo $record->code; ?>" <?php if($code == $record->code){ echo 'selected';} ?>><?php echo $record->code; ?> [<?php echo $record->eq_name; ?>]</option>
								<?php } }?>
							</select>
						</div>
						<?php }?>
						<div class="form-group form-group-sm  col-md-1">
							<input type="submit" class="btn btn-success btn-sm btn-block" value="Check">
						</div>
						<div class="form-group form-group-sm  col-md-1">
							<a href="<?php echo base_url()?>checkdoc" class="btn btn-sm btn-danger btn-block">Reset</a>
						</div>
						</form>
					</div>
					<div class="box-body table-responsive no-padding">
						<form action="<?php echo base_url() ?>test_array" method="POST">
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
								$xxx = 1;
								foreach($doc as $record){
									$kop = '<table class="table" style="border: 1px solid black;">
										<tr>
											<td class="text-center" style="border: 1px solid black;"><b>EQUIPMENT NAME</b></td>
											<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
											<td style="border: 1px solid black;"><b>DOC NUM</b></td>
											<td class="text-center" style="border: 1px solid black;" rowspan="3"><img src="'.base_url().'qrcode/'.$record->code.'" style="height:90px"/></td>
										</tr>
										<tr>
											<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->eq_name.'</b></td>
											<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->code.'</b></td>
											<td style="border: 1px solid black;"><b>RELEASE DATE</b></td>
										</tr>
										<tr>
											<td style="border: 1px solid black;"><b>REVISION</b></td>
										</tr>
										<tr>
											<td class="text-center" colspan="4" style="border: 1px solid black;">
												<b>Picture:</b>
												<br>
												<img src="'.base_url().'assets/picture/'.$record->code.'.jpg" style="vertical-align: bottom;width:800px;height:200px;"  align="center" width="100%"></img>';
						$kop .= '<table class="table table-hover table-striped table-bordered">
												<tr>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
													<td class="text-center" width="10%" style="padding: 0;"></td>
												</tr>';
							if(!empty($usedlogo)){
								$noa=0;
								foreach($usedlogo as $rec){
									$nob = $noa %10;
									if($nob == 0){$kop .= '<tr>';}else{$kop .= '';}
									$kop .=	'<td class="text-center" style="padding: 5;">
											<img src="'.base_url().'assets/dtdoc/opr/'.$rec->logo_link.'" width="100%">
											</br>
											<font size="1"><b>'.$rec->logo_name.'</b></font>
										</td>';
									if($nob == 9){$kop .= '</tr>';}else{$kop .= '';}
									$noa++;
								}
							}
						$kop .= '</table>';
									$kop .= '</td>
										</tr>
										</table>';
									
									if($kop != $kop2){echo $kop;}
									$head = '<table class="table table-hover table-striped table-bordered" >
										<tr>
											<th class="text-center" style="border: 1px solid black;">No</th>
											<th class="text-center" style="border: 1px solid black;">Condition</th>
											<th class="text-center" style="border: 1px solid black;">Standard</th>
											<th class="text-center" style="border: 1px solid black;">Answer Type</th>
											<th class="text-center" style="border: 1px solid black;">Linked Dev</th>
										</tr>';
									if($head != $head2){echo $head;}
									$titlex = '<td colspan="5" style="border: 1px solid black;"><b>'.$xxx.'. '.$record->title.'</b></td>';
									$title = $record->title;
									if($title != $title2){echo $titlex; $a=1;$xxx++;}
									if($record->type == 1){$input = '<input type="number" step="0.01" class="form-control input-sm" name="inputan['.$x.']"/>';}
									if($record->type == 2){$input = '
									<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1">YES</label>
									<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2">NO</label>';}
									if($record->type != 2 and $record->type != 1){$input = $record->type;}
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->cond; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->stand; ?>
									<?php if($record->type == 1){?>	
										<span class="pull-right">
										<b>Min:</b> <?php echo $record->min_val; ?> 
										<b>Max:</b> <?php echo $record->max_val;?> 
										<b>Unit:</b> <?php echo $record->unit_val;?>
										</span>
									<?php } ?>	
								</td>
								<td style="border: 1px solid black;"><?php echo $input; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->dcode.'/'.$record->penum; ?></td>
								<input type="hidden" class="form-control input-sm" name="id[]" value="<?php echo $record->id; ?>"/>
							</tr>
						<?php
								$head2 = $head;
								$kop2 = $kop;
								$title2 = $title;
								$a++;$x++;
								}
						?>
							<tr>
								<td colspan="3" class="text-center">
									<a class="btn btn-info" href="<?php echo base_url().'editdoc/'.$code.'/'.$frec.'/'.$tag; ?>"><i class="fa fa-pencil"></i> Edit [<?php echo $code.'/'.$frec.'/'.$tag; ?>]</a> | 
									<a class="btn btn-warning" href="<?php echo base_url().'linkdoc/'.$code.'/'.$frec.'/'.$tag; ?>"><i class="fa fa-link"></i> Link [<?php echo $code.'/'.$frec.'/'.$tag; ?>]</a> | 
									<a class="btn btn-danger" href="<?php echo base_url().'logodoc/'.$code.'/'.$frec.'/'.$tag; ?>"><i class="fa fa-file-image-o"></i> Logo [<?php echo $code.'/'.$frec.'/'.$tag; ?>]</a> | 
									<a class="btn btn-primary" href="<?php echo base_url().'copydoc/'.$code.'/'.$frec.'/'.$tag; ?>"><i class="fa fa-copy"></i> Generate Prod Tag [<?php echo $code.'/'.$frec.'/'.$tag; ?>]</a>
								</td>
								<input type="hidden" name="code" value="<?php echo $record->code; ?>"/>
								<input type="hidden" name="freq" value="<?php echo $record->frec; ?>"/>
								<input type="hidden" name="tag" value="<?php echo $tag; ?>"/>
								<td><input type="submit" class="btn btn-success btn-block"value="TEST ARRAY"/></td>
							</tr>
						<?php
							}
						?>
							
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#code").select2({
			placeholder: "Select Code"
		});
	});
</script>
