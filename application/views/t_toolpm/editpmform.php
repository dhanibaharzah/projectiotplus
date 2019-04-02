<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="<?php echo base_url().'pmform'; ?>" class="btn btn-sm btn-primary">BACK</a>
			<i class="fa fa-pencil"></i> Tool PM Sheet
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
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
										<td class="text-center" style="border: 1px solid black;"><b>TOOL PM SHEET</b></td>
									</tr>
									<tr>
										<td class="text-center" style="border: 1px solid black;"><b>'.$record->title.'</b></td>
									</tr>
									</table>';
								if($kop != $kop2){echo $kop;}
								$head = '<table class="table table-hover table-striped table-bordered" >
									<tr>
										<th class="text-center" style="border: 1px solid black;">No</th>
										<th class="text-center" style="border: 1px solid black;">Condition</th>
										<th class="text-center" style="border: 1px solid black;">Standard</th>
										<th class="text-center" style="border: 1px solid black;">Answer Type</th>
										<th class="text-center" style="border: 1px solid black;">Action</th>
									</tr>';
								if($head != $head2){echo $head;}
								$titlex = '';
								$title = '';
								if($title != $title2){$formx .= $titlex; $a=1;$xxx++;}
								if($record->answer_type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm"/>';}
								if($record->answer_type == 2){$input = '
								<label class="radio-inline"><input type="radio" value="1">YES</label>
								<label class="radio-inline"><input type="radio" value="2">NO</label>';}
								if($record->answer_type != 2 and $record->answer_type != 1){$input = $record->answer_type;}
					?>
						<tr>
							<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
							<td style="border: 1px solid black;"><?php echo $record->cond; ?></td>
							<td style="border: 1px solid black;"><?php echo $record->stan; ?></td>
							<td style="border: 1px solid black;"><?php echo $input; ?></td>
							<td style="border: 1px solid black;" class="text-center">
								<button title="Edit this row" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
								<div class="modal modal-primary fade" id="edit<?php echo $record->id; ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
												<h4>DB id: <?php echo $record->id;?></h4>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>edittestparam_2tool" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Condition:</label>
												<textarea type="text" name="cond" rows="2" class="form-control" required><?php echo $record->cond; ?></textarea>
												<label class="pull-left">Standard:</label>
												<textarea type="text" name="stan" rows="2" class="form-control" required><?php echo $record->stan; ?></textarea>
												<label class="radio-inline"><input type="radio" name="answer_type" value="1" <?php if($record->answer_type == 1){echo 'checked';} ?>>Number Input Field</label>
												<label class="radio-inline"><input type="radio" name="answer_type" value="2" <?php if($record->answer_type == 2){echo 'checked';} ?>>YES/NO Radio button</label><br>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="hidden" name="id" value="<?php echo $record->id;?>">
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
												<h4>DB id: <?php echo $record->id;?></h4>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>deltestrow_2tool" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Condition:</label>
												<textarea type="text" name="cond" rows="2" class="form-control" disabled><?php echo $record->cond; ?></textarea>
												<label class="pull-left">Standard:</label>
												<textarea type="text" name="stan" rows="2" class="form-control" disabled><?php echo $record->stan; ?></textarea>
												<label class="radio-inline"><input type="radio" name="answer_type" value="1" <?php if($record->answer_type == 1){echo 'checked';} ?> disabled>Number Input Field</label>
												<label class="radio-inline"><input type="radio" name="answer_type" value="2" <?php if($record->answer_type == 2){echo 'checked';} ?> disabled>YES/NO Radio button</label><br>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="hidden" name="id" value="<?php echo $record->id;?>">
												<input type="submit" class="btn btn-outline" value="DELETE">
											</div>
											</form>
										</div>
									</div>
								</div>
								<?php
									//store last row
									$test_title_x = $record->title;
									$id_x = $record->id;
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
								<button title="Add new part" type="button" class="btn btn-success" data-toggle="modal" data-target="#addrow"><i class="fa fa-plus"></i> Add new part</button>
								<div class="modal modal-success fade" id="addrow">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
												<h4>Add New Part</h4>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>addtestpart_2tool" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Condition:</label>
												<textarea type="text" name="cond" rows="2" class="form-control" required></textarea>
												<label class="pull-left">Standard:</label>
												<textarea type="text" name="stan" rows="2" class="form-control" required></textarea>
												<label class="radio-inline"><input type="radio" name="answer_type" value="1" required>Number Input Field</label>
												<label class="radio-inline"><input type="radio" name="answer_type" value="2" >YES/NO Radio button</label><br>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="hidden" name="title" value="<?php echo $test_title_x;?>">
												<input type="hidden" name="id" value="<?php echo $id_x;?>">
												<input type="submit" class="btn btn-outline" value="ADD">
											</div>
											</form>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php
						}
					?>
						
					</table>
				</div>
			</div>
		</div>
	</section>
</div>