<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-gears"></i> Main Class Setting</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-10 col-xs-8">
							</div>
							<div class="col-lg-2 col-xs-4 text-right">
								<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add New</button>
								<div class="modal modal-default fade" id="add_new">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>adddevmainclass" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Class Name:</label>
												<textarea onkeyup="lettersOnly(this)" type="text" name="dev_class" rows="2" class="form-control" required></textarea>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="submit" class="btn btn-primary" value="Submit">
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center" width="5%">Code</th>
								<th class="text-center" width="19%">Class Name</th>
								<th width="19%">Parameter G1</th>
								<th width="19%">Parameter G2</th>
								<th width="19%">Parameter G3</th>
								<th width="19%">Parts</th>
							</tr>
						<?php
							if(!empty($mainclass)){
								foreach($mainclass as $record){
						?>
							<tr>
								<td class="text-center"><b><?php echo $record->dev_code; ?></b></td>
								<td class="text-center"><h4><b><?php echo $record->dev_class; ?></b></h4>
									<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#edit0<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> Class Name</button>
									<div class="modal modal-default fade" id="edit0<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editdevmainclass" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Class Name:</label>
													<input onkeyup="lettersOnly(this)" type="text" name="dev_class" class="form-control" value="<?php echo $record->dev_class; ?>" required>
													<input onkeyup="lettersOnly(this)" type="hidden" name="note1" class="form-control" value="<?php echo $record->note1; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note2" class="form-control" value="<?php echo $record->note2; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note3" class="form-control" value="<?php echo $record->note3; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note4" class="form-control" value="<?php echo $record->note4; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note5" class="form-control" value="<?php echo $record->note5; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note6" class="form-control" value="<?php echo $record->note6; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note7" class="form-control" value="<?php echo $record->note7; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note8" class="form-control" value="<?php echo $record->note8; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note9" class="form-control" value="<?php echo $record->note9; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note10" class="form-control" value="<?php echo $record->note10; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note11" class="form-control" value="<?php echo $record->note11; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note12" class="form-control" value="<?php echo $record->note12; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note13" class="form-control" value="<?php echo $record->note13; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note14" class="form-control" value="<?php echo $record->note14; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note15" class="form-control" value="<?php echo $record->note15; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note16" class="form-control" value="<?php echo $record->note16; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note17" class="form-control" value="<?php echo $record->note17; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note18" class="form-control" value="<?php echo $record->note18; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note19" class="form-control" value="<?php echo $record->note19; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="note20" class="form-control" value="<?php echo $record->note20; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="rep1" class="form-control" value="<?php echo $record->rep1; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="rep2" class="form-control" value="<?php echo $record->rep2; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="rep3" class="form-control" value="<?php echo $record->rep3; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="rep4" class="form-control" value="<?php echo $record->rep4; ?>">
													<input onkeyup="lettersOnly(this)" type="hidden" name="rep5" class="form-control" value="<?php echo $record->rep5; ?>">
													<input onkeyup="lettersOnly(this)" class="hidden" name="id" value="<?php echo $record->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td>
									1. <?php if($record->note1 != ''){echo $record->note1;}else{echo 'not use';} ?><br>
									2. <?php if($record->note2 != ''){echo $record->note2;}else{echo 'not use';} ?><br>
									3. <?php if($record->note3 != ''){echo $record->note3;}else{echo 'not use';} ?><br>
									4. <?php if($record->note4 != ''){echo $record->note4;}else{echo 'not use';} ?><br>
									5. <?php if($record->note5 != ''){echo $record->note5;}else{echo 'not use';} ?><br>
									<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#edit1<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> G1</button>
									<div class="modal modal-default fade" id="edit1<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editdevmainclass" method="post" role="form">
												<div class="modal-body">
													<input type="hidden" name="dev_class" class="form-control" value="<?php echo $record->dev_class; ?>">
													<label class="pull-left">Parameter G1 - 1:</label>
													<input type="text" name="note1" class="form-control" value="<?php echo $record->note1; ?>">
													<label class="pull-left">Parameter G1 - 2:</label>
													<input type="text" name="note2" class="form-control" value="<?php echo $record->note2; ?>">
													<label class="pull-left">Parameter G1 - 3:</label>
													<input type="text" name="note3" class="form-control" value="<?php echo $record->note3; ?>">
													<label class="pull-left">Parameter G1 - 4:</label>
													<input type="text" name="note4" class="form-control" value="<?php echo $record->note4; ?>">
													<label class="pull-left">Parameter G1 - 5:</label>
													<input type="text" name="note5" class="form-control" value="<?php echo $record->note5; ?>">
													<input type="hidden" name="note6" class="form-control" value="<?php echo $record->note6; ?>">
													<input type="hidden" name="note7" class="form-control" value="<?php echo $record->note7; ?>">
													<input type="hidden" name="note8" class="form-control" value="<?php echo $record->note8; ?>">
													<input type="hidden" name="note9" class="form-control" value="<?php echo $record->note9; ?>">
													<input type="hidden" name="note10" class="form-control" value="<?php echo $record->note10; ?>">
													<input type="hidden" name="note11" class="form-control" value="<?php echo $record->note11; ?>">
													<input type="hidden" name="note12" class="form-control" value="<?php echo $record->note12; ?>">
													<input type="hidden" name="note13" class="form-control" value="<?php echo $record->note13; ?>">
													<input type="hidden" name="note14" class="form-control" value="<?php echo $record->note14; ?>">
													<input type="hidden" name="note15" class="form-control" value="<?php echo $record->note15; ?>">
													<input type="hidden" name="note16" class="form-control" value="<?php echo $record->note16; ?>">
													<input type="hidden" name="note17" class="form-control" value="<?php echo $record->note17; ?>">
													<input type="hidden" name="note18" class="form-control" value="<?php echo $record->note18; ?>">
													<input type="hidden" name="note19" class="form-control" value="<?php echo $record->note19; ?>">
													<input type="hidden" name="note20" class="form-control" value="<?php echo $record->note20; ?>">
													<input type="hidden" name="rep1" class="form-control" value="<?php echo $record->rep1; ?>">
													<input type="hidden" name="rep2" class="form-control" value="<?php echo $record->rep2; ?>">
													<input type="hidden" name="rep3" class="form-control" value="<?php echo $record->rep3; ?>">
													<input type="hidden" name="rep4" class="form-control" value="<?php echo $record->rep4; ?>">
													<input type="hidden" name="rep5" class="form-control" value="<?php echo $record->rep5; ?>">
													<input class="hidden" name="id" value="<?php echo $record->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td>
									6. <?php if($record->note6 != ''){echo $record->note6;}else{echo 'not use';} ?><br>
									7. <?php if($record->note7 != ''){echo $record->note7;}else{echo 'not use';} ?><br>
									8. <?php if($record->note8 != ''){echo $record->note8;}else{echo 'not use';} ?><br>
									9. <?php if($record->note9 != ''){echo $record->note9;}else{echo 'not use';} ?><br>
									10. <?php if($record->note10 != ''){echo $record->note10;}else{echo 'not use';} ?><br>
									<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#edit2<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> G2</button>
									<div class="modal modal-default fade" id="edit2<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editdevmainclass" method="post" role="form">
												<div class="modal-body">
													<input type="hidden" name="dev_class" class="form-control" value="<?php echo $record->dev_class; ?>">
													<input type="hidden" name="note1" class="form-control" value="<?php echo $record->note1; ?>">
													<input type="hidden" name="note2" class="form-control" value="<?php echo $record->note2; ?>">
													<input type="hidden" name="note3" class="form-control" value="<?php echo $record->note3; ?>">
													<input type="hidden" name="note4" class="form-control" value="<?php echo $record->note4; ?>">
													<input type="hidden" name="note5" class="form-control" value="<?php echo $record->note5; ?>">
													<label class="pull-left">Parameter G2 - 1:</label>
													<input type="text" name="note6" class="form-control" value="<?php echo $record->note6; ?>">
													<label class="pull-left">Parameter G2 - 2:</label>
													<input type="text" name="note7" class="form-control" value="<?php echo $record->note7; ?>">
													<label class="pull-left">Parameter G2 - 3:</label>
													<input type="text" name="note8" class="form-control" value="<?php echo $record->note8; ?>">
													<label class="pull-left">Parameter G2 - 4:</label>
													<input type="text" name="note9" class="form-control" value="<?php echo $record->note9; ?>">
													<label class="pull-left">Parameter G2 - 5:</label>
													<input type="text" name="note10" class="form-control" value="<?php echo $record->note10; ?>">
													<input type="hidden" name="note11" class="form-control" value="<?php echo $record->note11; ?>">
													<input type="hidden" name="note12" class="form-control" value="<?php echo $record->note12; ?>">
													<input type="hidden" name="note13" class="form-control" value="<?php echo $record->note13; ?>">
													<input type="hidden" name="note14" class="form-control" value="<?php echo $record->note14; ?>">
													<input type="hidden" name="note15" class="form-control" value="<?php echo $record->note15; ?>">
													<input type="hidden" name="note16" class="form-control" value="<?php echo $record->note16; ?>">
													<input type="hidden" name="note17" class="form-control" value="<?php echo $record->note17; ?>">
													<input type="hidden" name="note18" class="form-control" value="<?php echo $record->note18; ?>">
													<input type="hidden" name="note19" class="form-control" value="<?php echo $record->note19; ?>">
													<input type="hidden" name="note20" class="form-control" value="<?php echo $record->note20; ?>">
													<input type="hidden" name="rep1" class="form-control" value="<?php echo $record->rep1; ?>">
													<input type="hidden" name="rep2" class="form-control" value="<?php echo $record->rep2; ?>">
													<input type="hidden" name="rep3" class="form-control" value="<?php echo $record->rep3; ?>">
													<input type="hidden" name="rep4" class="form-control" value="<?php echo $record->rep4; ?>">
													<input type="hidden" name="rep5" class="form-control" value="<?php echo $record->rep5; ?>">
													<input class="hidden" name="id" value="<?php echo $record->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td>
									11. <?php if($record->note11 != ''){echo $record->note11;}else{echo 'not use';} ?><br>
									12. <?php if($record->note12 != ''){echo $record->note12;}else{echo 'not use';} ?><br>
									13. <?php if($record->note13 != ''){echo $record->note13;}else{echo 'not use';} ?><br>
									14. <?php if($record->note14 != ''){echo $record->note14;}else{echo 'not use';} ?><br>
									15. <?php if($record->note15 != ''){echo $record->note15;}else{echo 'not use';} ?><br>
									<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#edit3<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> G3</button>
									<div class="modal modal-default fade" id="edit3<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editdevmainclass" method="post" role="form">
												<div class="modal-body">
													<input type="hidden" name="dev_class" class="form-control" value="<?php echo $record->dev_class; ?>">
													<input type="hidden" name="note1" class="form-control" value="<?php echo $record->note1; ?>">
													<input type="hidden" name="note2" class="form-control" value="<?php echo $record->note2; ?>">
													<input type="hidden" name="note3" class="form-control" value="<?php echo $record->note3; ?>">
													<input type="hidden" name="note4" class="form-control" value="<?php echo $record->note4; ?>">
													<input type="hidden" name="note5" class="form-control" value="<?php echo $record->note5; ?>">
													<input type="hidden" name="note6" class="form-control" value="<?php echo $record->note6; ?>">
													<input type="hidden" name="note7" class="form-control" value="<?php echo $record->note7; ?>">
													<input type="hidden" name="note8" class="form-control" value="<?php echo $record->note8; ?>">
													<input type="hidden" name="note9" class="form-control" value="<?php echo $record->note9; ?>">
													<input type="hidden" name="note10" class="form-control" value="<?php echo $record->note10; ?>">
													<label class="pull-left">Parameter G3 - 1:</label>
													<input type="text" name="note11" class="form-control" value="<?php echo $record->note11; ?>">
													<label class="pull-left">Parameter G3 - 2:</label>
													<input type="text" name="note12" class="form-control" value="<?php echo $record->note12; ?>">
													<label class="pull-left">Parameter G3 - 3:</label>
													<input type="text" name="note13" class="form-control" value="<?php echo $record->note13; ?>">
													<label class="pull-left">Parameter G3 - 4:</label>
													<input type="text" name="note14" class="form-control" value="<?php echo $record->note14; ?>">
													<label class="pull-left">Parameter G3 - 5:</label>
													<input type="text" name="note15" class="form-control" value="<?php echo $record->note15; ?>">
													<input type="hidden" name="note16" class="form-control" value="<?php echo $record->note16; ?>">
													<input type="hidden" name="note17" class="form-control" value="<?php echo $record->note17; ?>">
													<input type="hidden" name="note18" class="form-control" value="<?php echo $record->note18; ?>">
													<input type="hidden" name="note19" class="form-control" value="<?php echo $record->note19; ?>">
													<input type="hidden" name="note20" class="form-control" value="<?php echo $record->note20; ?>">
													<input type="hidden" name="rep1" class="form-control" value="<?php echo $record->rep1; ?>">
													<input type="hidden" name="rep2" class="form-control" value="<?php echo $record->rep2; ?>">
													<input type="hidden" name="rep3" class="form-control" value="<?php echo $record->rep3; ?>">
													<input type="hidden" name="rep4" class="form-control" value="<?php echo $record->rep4; ?>">
													<input type="hidden" name="rep5" class="form-control" value="<?php echo $record->rep5; ?>">
													<input class="hidden" name="id" value="<?php echo $record->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
								<td>
									1. <?php if($record->note16 != ''){echo $record->note16.' / '.$record->rep1.' days';}else{echo 'not use';} ?><br>
									2. <?php if($record->note17 != ''){echo $record->note17.' / '.$record->rep2.' days';}else{echo 'not use';} ?><br>
									3. <?php if($record->note18 != ''){echo $record->note18.' / '.$record->rep3.' days';}else{echo 'not use';} ?><br>
									4. <?php if($record->note19 != ''){echo $record->note19.' / '.$record->rep4.' days';}else{echo 'not use';} ?><br>
									5. <?php if($record->note20 != ''){echo $record->note20.' / '.$record->rep5.' days';}else{echo 'not use';} ?><br>
									<button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#edit4<?php echo $record->id; ?>"><i class="fa fa-pencil"></i> Parts</button>
									<div class="modal modal-default fade" id="edit4<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>editdevmainclass" method="post" role="form">
												<div class="modal-body">
													<input type="hidden" name="dev_class" class="form-control" value="<?php echo $record->dev_class; ?>">
													<input type="hidden" name="note1" class="form-control" value="<?php echo $record->note1; ?>">
													<input type="hidden" name="note2" class="form-control" value="<?php echo $record->note2; ?>">
													<input type="hidden" name="note3" class="form-control" value="<?php echo $record->note3; ?>">
													<input type="hidden" name="note4" class="form-control" value="<?php echo $record->note4; ?>">
													<input type="hidden" name="note5" class="form-control" value="<?php echo $record->note5; ?>">
													<input type="hidden" name="note6" class="form-control" value="<?php echo $record->note6; ?>">
													<input type="hidden" name="note7" class="form-control" value="<?php echo $record->note7; ?>">
													<input type="hidden" name="note8" class="form-control" value="<?php echo $record->note8; ?>">
													<input type="hidden" name="note9" class="form-control" value="<?php echo $record->note9; ?>">
													<input type="hidden" name="note10" class="form-control" value="<?php echo $record->note10; ?>">
													<input type="hidden" name="note11" class="form-control" value="<?php echo $record->note11; ?>">
													<input type="hidden" name="note12" class="form-control" value="<?php echo $record->note12; ?>">
													<input type="hidden" name="note13" class="form-control" value="<?php echo $record->note13; ?>">
													<input type="hidden" name="note14" class="form-control" value="<?php echo $record->note14; ?>">
													<input type="hidden" name="note15" class="form-control" value="<?php echo $record->note15; ?>">
													<div class="col-md-12">
													<label class="pull-left">Part - 1 (Name - Freq):</label>
													</div>
													<div class="col-md-6">
														<input type="text" name="note16" class="form-control" value="<?php echo $record->note16; ?>">
													</div>
													<div class="col-md-6">
														<input type="number" name="rep1" class="form-control" value="<?php echo $record->rep1; ?>" maxlength="3">
													</div>
													<div class="col-md-12">
													<label class="pull-left">Part - 2 (Name - Freq):</label>
													</div>
													<div class="col-md-6">
														<input type="text" name="note17" class="form-control" value="<?php echo $record->note17; ?>">
													</div>
													<div class="col-md-6">
														<input type="number" name="rep2" class="form-control" value="<?php echo $record->rep2; ?>" maxlength="3">
													</div>
													<div class="col-md-12">
													<label class="pull-left">Part - 3 (Name - Freq):</label>
													</div>
													<div class="col-md-6">
														<input type="text" name="note18" class="form-control" value="<?php echo $record->note18; ?>">
													</div>
													<div class="col-md-6">
														<input type="number" name="rep3" class="form-control" value="<?php echo $record->rep3; ?>" maxlength="3">
													</div>
													<div class="col-md-12">
													<label class="pull-left">Part - 4 (Name - Freq):</label>
													</div>
													<div class="col-md-6">
														<input type="text" name="note19" class="form-control" value="<?php echo $record->note19; ?>">
													</div>
													<div class="col-md-6">
														<input type="number" name="rep4" class="form-control" value="<?php echo $record->rep4; ?>" maxlength="3">
													</div>
													<div class="col-md-12">
													<label class="pull-left">Part - 5 (Name - Freq):</label>
													</div>
													<div class="col-md-6">
														<input type="text" name="note20" class="form-control" value="<?php echo $record->note20; ?>">
													</div>
													<div class="col-md-6">
														<input type="number" name="rep5" class="form-control" value="<?php echo $record->rep5; ?>" maxlength="3">
													</div>
													
													<input class="hidden" name="id" value="<?php echo $record->id; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php
								}
							}
						?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
