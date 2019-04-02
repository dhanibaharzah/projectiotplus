<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-file-image-o"></i> Logo PM Form
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-body table-responsive">
						<label>Safety Instruction</label></br>
						<form role="form" id="edit_act" action="<?php echo base_url() ?>pmaddlogo" method="post" role="form">
						<div class="form-control input-group">
							<select id="ppe_id" name="ppe_id" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($logolist)){ 
									foreach($logolist as $record)
									{
								?>
								<option value="<?php echo $record->id; ?>"><?php echo $record->logo_name; ?></option>
								<?php } }?>
							</select>
							<div class="input-group-btn">
								<input type="hidden" name="xcodex" value="<?php echo $xcodex; ?>">
								<input type="hidden" name="xfreqx" value="<?php echo $xfreqx; ?>">
								<input type="hidden" name="xtagx" value="<?php echo $xtagx; ?>">
								<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						</form>
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
												<div id="setparam"></div>
											</td>
										</tr>
										</table>';
									$kop .= '<table class="table table-hover table-striped table-bordered">
												<tr>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
													<td class="text-center" width="10%"></td>
												</tr>';
							if(!empty($usedlogo)){
								$noa=0;
								foreach($usedlogo as $rec){
									$nob = $noa %10;
									if($nob == 0){$kop .= '<tr>';}else{$kop .= '';}
									$kop .=	'<td class="text-center">
											<img src="'.base_url().'assets/dtdoc/opr/'.$rec->logo_link.'" width="100%">
											</br>
											<font size="1"><b>'.$rec->logo_name.'</b></font>
											</br>
											<form role="form" id="edit_act" action="'.base_url().'pmdellogo/'.$rec->id.'" method="post" role="form">
												<input type="hidden" name="xcodex" value="'.$xcodex.'">
												<input type="hidden" name="xfreqx" value="'.$xfreqx.'">
												<input type="hidden" name="xtagx" value="'.$xtagx.'">
												<button class="btn btn-xs btn-danger btn-block"><i class="fa fa-trash"></i></button>
											</form>
										</td>';
									if($nob == 9){$kop .= '</tr>';}else{$kop .= '';}
									$noa++;
								}
							}
						$kop .= '</table>';
									if($kop != $kop2){echo $kop;}
						
									$head = '<table class="table table-hover table-striped table-bordered" >
										<tr>
											<th class="text-center" style="border: 1px solid black;">No</th>
											<th class="text-center" style="border: 1px solid black;">Condition</th>
											<th class="text-center" style="border: 1px solid black;">Standard</th>
											<th class="text-center" style="border: 1px solid black;">Answer Type</th>
										</tr>';
									if($head != $head2){echo $head;}
									$titlex = '
										<td colspan="6" style="border: 1px solid black;">
											<b>'.$xxx.'. '.$record->title.'</b>
										</td>';
									$title = $record->title;
									if($title != $title2){echo $titlex; $a=1;$xxx++;}
									if($record->type == 1){$input = 'Number Input';}
									if($record->type == 2){$input = 'YES/NO Selection';}
									if($record->type != 2 and $record->type != 1){$input = $record->type;}
						?>
							<tr id="<?php echo $record->id; ?>">
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->cond; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->stand; ?></td>
								<td style="border: 1px solid black;"><?php echo $input; ?></td>
									<?php
										//store last row
										$eq_name_x = $record->eq_name;
										$code_x = $record->code;
										$frec_x = $record->frec;
										$tag_x = $record->tag;
										$pic_x = $record->pic;
									?>
							</tr>
						<?php
								$head2 = $head;
								$kop2 = $kop;
								$title2 = $title;
								$a++;$x++;
								}
							}
						?>
						</table>
					</div>
					<div class="box-footer text-center">
						<a href="<?php echo base_url().'checkdoc'; ?>" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> Back to Check Doc</a> | 
						<a href="<?php echo base_url().'editdoc/'.$code_x.'/'.$frec_x.'/'.$tag_x; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit this document</a> | 
						<a class="btn btn-warning btn-sm" href="<?php echo base_url().'linkdoc/'.$code_x.'/'.$frec_x.'/'.$tag_x; ?>"><i class="fa fa-file-image-o"></i> Set linked device</a>
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
	$(document).ready(function(){
			$("#ppe_id").select2({
			placeholder: "Select Safety Instruction"
			});
        });
</script>