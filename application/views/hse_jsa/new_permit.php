<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-plus"></i>
        <small><?php echo $company_name; ?></small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><b>
							<?php
								if($type == 1){echo 'Ijin Pekerjaan Panas';}
								if($type == 2){echo 'Ijin Bekerja di Ketinggian';}
								if($type == 3){echo 'Ijin Pekerjaan Ruang Terbatas';}
								if($type == 4){echo 'Ijin Penggalian';}
								if($type == 5){echo 'Ijin Pekerjaan Listrik';}
								if($type == 6){echo 'Ijin Pekerjaan Umum';}
								$lock = 0;
								if($jsa->panas == 3 OR $jsa->tinggi == 3 OR $jsa->terbatas == 3 OR $jsa->penggalian == 3 OR $jsa->listrik == 3){$lock = 1;}
							?>
						</b></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
					<form role="form" id="cek_permit" action="<?php echo base_url() ?>cek_permit" method="post" role="form">
					<input type="hidden" name="type" value="<?php echo $type; ?>" />
					<input type="hidden" name="jsa_id" value="<?php echo $jsa->id; ?>" />
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">   
								<b>Nama Pekerjaan: </b><?php echo $jsa->job_name; ?><br>
								<b>Area: </b><?php echo $jsa->area; ?><br>
								<b>Tanggal: </b><?php echo $jsa->start_date; ?>, <b>Jam: </b> <?php echo $jsa->start_hour.':00 s/d'.$jsa->end_hour.':00'; ?><br>
							</div>	
						</div>
						<br>
						<br>
						<div class="row">
							<div class="col-md-12 col-xs-12">   
								<h4><b>Checklist Ijin Kerja</b></h4><br>
								<div class="col-lg-12 col-xs-12">
									<table class="table table-hover table-striped taable-bordered ">
										<?php
											if(!empty($checklist))
											{
												$a=1;
												$z=0;
												$p=0;
												$s=0;
												$r=0;
												foreach($checklist as $record)
												{
													if(!empty($permit)){
														if($a == 1){$value = $permit->param1;}
														if($a == 2){$value = $permit->param2;}
														if($a == 3){$value = $permit->param3;}
														if($a == 4){$value = $permit->param4;}
														if($a == 5){$value = $permit->param5;}
														if($a == 6){$value = $permit->param6;}
														if($a == 7){$value = $permit->param7;}
														if($a == 8){$value = $permit->param8;}
														if($a == 9){$value = $permit->param9;}
														if($a == 10){$value = $permit->param10;}
														if($a == 11){$value = $permit->param11;}
														if($a == 12){$value = $permit->param12;}
														if($a == 13){$value = $permit->param13;}
														if($a == 14){$value = $permit->param14;}
														if($a == 15){$value = $permit->param15;}
													}
										?>
										<tr>
											<td width="5%" class="text-center"><?php echo $a ?></td>
											<td width="50%"><?php echo $record->question ?></td>
											<td width="45%">
												<?php if($record->answer_type == 1){ $p++; ?>
												<label class="radio-inline"><input type="radio" name="param<?php echo $a ?>" value="1" required <?php if(!empty($value)){if($value == 1){echo 'checked';}else{if($permit->app1 ==1){echo 'disabled';}}}?>>YA</label>
												<label class="radio-inline"><input type="radio" name="param<?php echo $a ?>" value="2"<?php if(!empty($value)){if($value == 2){echo 'checked';}else{if($permit->app1 ==1){echo 'disabled';}}}?>>TIDAK</label>
												<label class="radio-inline"><input type="radio" name="param<?php echo $a ?>" value="3"<?php if(!empty($value)){$z++;if($value == 3){echo 'checked';}else{if($permit->app1 ==1){echo 'disabled';}}}?>>TIDAK PERLU</label>
												<?php } ?>
												<?php if($record->answer_type == 2){ ?>
												<input type="text" class="form-control required" id="param<?php echo $a ?>" name="param<?php echo $a ?>" maxlength="255" required<?php if($lock == 1){echo 'readonly="readonly"';} ?>>
												<?php } ?>
											</td>
										</tr>
										<?php
											$a++;
											}
										}
										?>
										<?php
											$r=$p;
											if(!empty($checklist2))
											{
												$b=$a;
												$x=1;
												$s=0;
												
												foreach($checklist2 as $record)
												{
													if(!empty($permit)){
														if($x == 1){$value = $permit->cek1;}
														if($x == 2){$value = $permit->cek2;}
														if($x == 3){$value = $permit->cek3;}
														if($x == 4){$value = $permit->cek4;}
														if($x == 5){$value = $permit->cek5;}
														if($x == 6){$value = $permit->cek6;}
														if($x == 7){$value = $permit->cek7;}
														if($x == 8){$value = $permit->cek8;}
														if($x == 9){$value = $permit->cek9;}
														if($x == 10){$value = $permit->cek10;}
													}
										?>
										<tr>
											<td width="5%" class="text-center"><?php echo $b ?></td>
											<td width="50%"><?php echo $record->question ?></td>
											<td width="45%">
												<?php if($record->answer_type == 1){ $r++;?>
												<label class="radio-inline"><input type="radio" name="cek<?php echo $x ?>" value="1" required <?php if(!empty($value)){if($value == 1){echo 'checked';}else{if($permit->app1 ==1){echo 'disabled';}}}?>>YA</label>
												<label class="radio-inline"><input type="radio" name="cek<?php echo $x ?>" value="2"<?php if(!empty($value)){if($value == 2){echo 'checked';}else{if($permit->app1 ==1){echo 'disabled';}}}?>>TIDAK</label>
												<label class="radio-inline"><input type="radio" name="cek<?php echo $x ?>" value="3"<?php if(!empty($value)){$s++;if($value == 3){echo 'checked';}else{if($permit->app1 ==1){echo 'disabled';}}}?>>TIDAK PERLU</label>
												<?php } ?>
												<?php if($record->answer_type == 2){ ?>
												<input type="number" class="form-control required" id="param<?php echo $a ?>" name="param<?php echo $a ?>" maxlength="255" placeholder="Diisi oleh pihak SLCI" disabled>
												<?php } ?>
											</td>
										</tr>
										<?php
											$b++;
											$x++;
											}
										}
										?>
									</table>
									<table class="table table-hover table-striped table-bordered ">
										<tr>
											<td colspan="4" class="text-center"><b>Revision Note</b></td>
										</tr>
										<tr>
											<td><b>Checker :</b><?php echo $permit->note_app2; ?></td>
											<td><b>PIC Area :</b><?php echo $permit->note_app3; ?></td>
											<td><b>Safety Office :</b><?php echo $permit->note_app4; ?></td>
											<td><b>Manager :</b><?php echo $permit->note_app5; ?></td>
										</tr>
									</table>
								</div>
							</div>	
						</div>
						
					</div><!-- /.box-body -->
					<div class="box-footer">
					
						<a href="<?php echo base_url(); ?>myjsa" class="btn btn-default pull-left"><i class="fa fa-arrow-left "></i> Back</a>
						<?php if($permit->app1 == 0){?>
						<input type="submit" class="btn btn-primary btn-flat pull-right" value="Submit Form" />
						<?php } ?>
						<?php if($permit->app1 == 1){?>
						<button class="btn btn-success pull-right" disabled>Submitted</button>
						<?php } ?>
					</div>
                    </form>
                </div>
            </div>
			
            
        </div>    
    </section>
    
</div>
