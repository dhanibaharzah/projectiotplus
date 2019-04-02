<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-pencil"></i> Edit PM Form
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-body table-responsive">
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
												<br><a href="'.base_url().'pmimg_upload/'.$record->code.'" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload</a><br>
												<img src="'.base_url().'assets/picture/'.$record->code.'.jpg" style="vertical-align: bottom;width:800px;height:200px;"  align="center" width="100%"></img>
											</td>
										</tr>
										</table>';
									if($kop != $kop2){echo $kop;}
									$head = '<table class="table table-hover table-striped table-bordered" >
										<tr>
											<th class="text-center" style="border: 1px solid black;">No</th>
											<th class="text-center" style="border: 1px solid black;">Condition</th>   
											<th class="text-center" style="border: 1px solid black;">Standard</th>
											<th class="text-center" style="border: 1px solid black;">Answer Type</th>
											<th class="text-center" style="border: 1px solid black;">ACT</th>
										</tr>';
									if($head != $head2){echo $head;}
									$titlex = '
										<td colspan="5" style="border: 1px solid black;">
											<b>'.$xxx.'. '.$record->title.'</b>
											<button title="Edit device name" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edittitle'.$record->id.'"><i class="fa fa-pencil"></i></button>
											<div class="modal modal-primary fade" id="edittitle'.$record->id.'">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
															<h4>Device: '.$record->title.'</h4>
														</div>
														<form role="form" id="edit_act" action="'.base_url().'editform2" method="post" role="form">
														<div class="modal-body">
															<label class="pull-left">Change Device Name: </label>
															<textarea type="text" name="title" rows="2" class="form-control" required>'.$record->title.'</textarea>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
															<input type="hidden" name="otitle" value="'.$record->title.'">
															<input type="hidden" name="code" value="'.$record->code.'">
															<input type="hidden" name="frec" value="'.$record->frec.'">
															<input type="hidden" name="tag" value="'.$record->tag.'">
															<input type="submit" class="btn btn-outline" value="UPDATE">
														</div>
														</form>
													</div>
												</div>
											</div>
											<button title="Add device parameter" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addcond'.$record->id.'"><i class="fa fa-plus"></i></button>
											<div class="modal modal-success fade" id="addcond'.$record->id.'">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
															<h4>Add New Device Parameter</h4>
														</div>
														<form role="form" id="edit_act" action="'.base_url().'addform1" method="post" role="form">
														<div class="modal-body">
															<label class="pull-left">Condition:</label>
															<textarea type="text" name="cond" rows="2" class="form-control" required></textarea>
															<label class="pull-left">Standard:</label>
															<textarea type="text" name="stand" rows="2" class="form-control" required></textarea>
															<label class="radio-inline"><input type="radio" name="type" value="1" required>Number Input Field</label>
															<label class="radio-inline"><input type="radio" name="type" value="2">YES/NO Radio button</label><br>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
															<input type="hidden" name="title" value="'.$record->title.'">
															<input type="hidden" name="code" value="'.$record->code.'">
															<input type="hidden" name="frec" value="'.$record->frec.'">
															<input type="hidden" name="tag" value="'.$record->tag.'">
															<input type="hidden" name="eq_name" value="'.$record->eq_name.'">
															<input type="hidden" name="pic" value="'.$record->pic.'">
															<input type="submit" class="btn btn-outline" value="ADD">
														</div>
														</form>
													</div>
												</div>
											</div>
										</td>';
									$title = $record->title;
									if($title != $title2){echo $titlex; $a=1;$xxx++;}
									if($record->type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm" name="inputan['.$x.']"/>';}
									if($record->type == 2){$input = '
									<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1">YES</label>
									<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2">NO</label>';}
									if($record->type != 2 and $record->type != 1){$input = $record->type;}
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->cond; ?>
									<?php if($record->type == 1){?>	
										<span class="pull-right">
										<b>Min:</b> <?php echo $record->min_val; ?> 
										<b>Max:</b> <?php echo $record->max_val;?> 
										<b>Unit:</b> <?php echo $record->unit_val;?>
										</span>
									<?php } ?>
								</td>
								<td style="border: 1px solid black;"><?php echo $record->stand; ?></td>
								<td style="border: 1px solid black;"><?php echo $input; ?></td>
								<td style="border: 1px solid black;" class="text-center">
									<button title="Edit this row" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-primary fade" id="edit<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Device: <?php echo $record->title; ?>/DB id: <?php echo $record->id;?></h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editform1" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Condition:</label>
													<textarea type="text" name="cond" rows="2" class="form-control" required><?php echo $record->cond; ?></textarea>
													<label class="pull-left">Standard:</label>
													<textarea type="text" name="stand" rows="2" class="form-control" required><?php echo $record->stand; ?></textarea>
													
													<?php if($record->type == 1){?>
														<label class="pull-left">Minimum value:</label>
														<input step="0.01" type="number" width="10px" class="form-control" value="<?php echo $record->min_val; ?>" name="min_val">
														<label class="pull-left">Maximum value:</label>
														<input step="0.01" type="number" width="10px" class="form-control" value="<?php echo $record->max_val; ?>" name="max_val">
														<label class="pull-left">Unit value:</label>
														<select  name="unit_val" class="form-control" required>
														<?php if(!empty($unitlist)){ 
																foreach($unitlist as $rec)
																{
															?>
															<option value="<?php echo $rec->unit_name; ?>" <?php if($record->unit_val == $rec->unit_name){ echo 'selected';}?>><?php echo $rec->unit_name; ?></option>
															<?php } }?>
														</select>
													<?php }?>	
													
													<label class="radio-inline"><input type="radio" name="type" value="1" <?php if($record->type == 1){echo 'checked';} ?>>Number Input Field</label>
													<label class="radio-inline"><input type="radio" name="type" value="2" <?php if($record->type == 2){echo 'checked';} ?>>YES/NO Radio button</label><br>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="hidden" name="code" value="<?php echo $record->code;?>">
													<input type="hidden" name="frec" value="<?php echo $record->frec;?>">
													<input type="hidden" name="tag" value="<?php echo $record->tag;?>">
													<input type="submit" class="btn btn-outline" value="EDIT">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button title="Delete this row" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Device: <?php echo $record->title; ?>/DB id: <?php echo $record->id;?></h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>delform1" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Condition:</label>
													<textarea type="text" name="cond" rows="2" class="form-control" disabled><?php echo $record->cond; ?></textarea>
													<label class="pull-left">Standard:</label>
													<textarea type="text" name="stand" rows="2" class="form-control" disabled><?php echo $record->stand; ?></textarea>
													<label class="radio-inline"><input type="radio" name="type" value="1" <?php if($record->type == 1){echo 'checked';} ?> disabled>Number Input Field</label>
													<label class="radio-inline"><input type="radio" name="type" value="2" <?php if($record->type == 2){echo 'checked';} ?> disabled>YES/NO Radio button</label><br>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="hidden" name="code" value="<?php echo $record->code;?>">
													<input type="hidden" name="frec" value="<?php echo $record->frec;?>">
													<input type="hidden" name="tag" value="<?php echo $record->tag;?>">
													<input type="submit" class="btn btn-outline" value="DELETE">
												</div>
												</form>
											</div>
										</div>
									</div>
									<?php
										//store last row
										$eq_name_x = $record->eq_name;
										$code_x = $record->code;
										$frec_x = $record->frec;
										$tag_x = $record->tag;
										$pic_x = $record->pic;
									?>
								</td>
							</tr>
						<?php
								$head2 = $head;
								$kop2 = $kop;
								$title2 = $title;
								$a++;$x++;
								}
						?>
							<tr>
								<td style="border: 1px solid black;" class="text-center" colspan="5">
									<button title="Add new device" type="button" class="btn btn-success" data-toggle="modal" data-target="#addrow"><i class="fa fa-plus"></i> Add new device</button>
									<div class="modal modal-success fade" id="addrow">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Add New Device</h4>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>addrow" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Device Name:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="title" rows="2" class="form-control" required></textarea>
													<label class="pull-left">Condition:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="cond" rows="2" class="form-control" required></textarea>
													<label class="pull-left">Standard:</label>
													<textarea onkeyup="lettersOnly(this)" type="text" name="stand" rows="2" class="form-control" required></textarea>
													<label class="radio-inline"><input type="radio" name="type" value="1" required>Number Input Field</label>
													<label class="radio-inline"><input type="radio" name="type" value="2" >YES/NO Radio button</label><br>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="eq_name" value="<?php echo $eq_name_x;?>">
													<input type="hidden" name="code" value="<?php echo $code_x;?>">
													<input type="hidden" name="frec" value="<?php echo $frec_x;?>">
													<input type="hidden" name="tag" value="<?php echo $tag_x;?>">
													<input type="hidden" name="pic" value="<?php echo $pic_x;?>">
													<input type="submit" class="btn btn-outline" value="ADD">
												</div>
												</form>
											</div>
										</div>
									</div>
									| <a href="<?php echo base_url().'importdoc/'.$code_x.'/'.$frec_x.'/'.$tag_x; ?>" class="btn btn-primary"><i class="fa fa-file"></i> Import Other Doc</a> 
								</td>
							</tr>
						<?php
							}
						?>
							
						</table>
					</div>
					<div class="box-footer text-center">
						<a href="<?php echo base_url().'checkdoc'; ?>" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> Back to Check Doc</a> | 
						<a href="<?php echo base_url().'linkdoc/'.$code_x.'/'.$frec_x.'/'.$tag_x; ?>" class="btn btn-sm btn-warning"><i class="fa fa-link"></i> Set Linked Device</a> | 
						<a class="btn btn-danger btn-sm" href="<?php echo base_url().'logodoc/'.$code_x.'/'.$frec_x.'/'.$tag_x; ?>"><i class="fa fa-file-image-o"></i> Set Logo</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
