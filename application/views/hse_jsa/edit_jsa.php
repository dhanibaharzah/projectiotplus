<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Edit Permit
        <small><?php echo $company_name; ?></small>
      </h1>
    </section>
    
    <section class="content">
		<?php if(!empty($jsa)){ ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><b>Job Overview</b></h3>
						
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
                    <form role="form" id="edited_jsa" action="<?php echo base_url() ?>edited_jsa" method="post" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="job_name">Nama Pekerjaan</label>
									<?php if($company_name == 'PT SLCI'){ ?>
									<input type="text" class="form-control required" id="job_name" value="<?php echo $jsa->job_name; ?>"name="job_name" maxlength="255" placeholder="Tulis Nama Pekerjaan" required>
									<?php } ?>
									<?php if($company_name != 'PT SLCI'){ ?>
									<script>
										$(document).ready(function () {
											$("#job_name").select2({
												placeholder: "Please Select"
											});
										});
									</script>
									<select id="job_name" name="job_name" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($jobList)){ 
											foreach($jobList as $record)
											{
										?>
										<option value="<?php echo $record->id; ?>"<?php if($record->job_name == $jsa->job_name){echo 'selected';}?>>PO: <?php echo $record->po_num; ?>, <?php echo $record->job_name; ?></option>
										<?php } }?>
									</select>
									<?php } ?>
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="area">Lokasi Pekerjaan</label>
									<select id="area" name="area" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($area)){ 
											foreach($area as $record)
											{
										?>
										<option value="<?php echo $record->id; ?>" <?php if($record->toolname == $jsa->area){ echo 'selected'; }?>><?php echo $record->toolname; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="dept">Section</label>
									<select id="dept" name="dept" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($dept)){ 
											foreach($dept as $ccc)
											{
										?>
										<option value="<?php echo $ccc->id_dept; ?>" <?php if($ccc->id_dept == $jsa->dept){echo "selected";}?>><?php echo $ccc->role; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="start_date">Periode Pekerjaan</label>
								</div>
							</div>
							<div class="col-md-3 form-group">
								<input for="start_date" autocomplete="off" type="text" name="start_date" value="<?php echo $jsa->start_date; ?>" class="form-control" id="datepicker1" placeholder="Tanggal Mulai" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12"> 
								<div class="form-group">
									<label for="start_hour">Waktu Pekerjaan</label>
								</div>
							</div>
							<div class="col-md-3 form-group">
								<select id="start_hour" name="start_hour" class="form-control" required>
									<option value="08:00:00" <?php if($jsa->start_hour == '08:00:00'){echo 'selected';}?>>08:00</option>
									<option value="09:00:00" <?php if($jsa->start_hour == '09:00:00'){echo 'selected';}?>>09:00</option>
									<option value="10:00:00" <?php if($jsa->start_hour == '10:00:00'){echo 'selected';}?>>10:00</option>
									<option value="11:00:00" <?php if($jsa->start_hour == '11:00:00'){echo 'selected';}?>>11:00</option>
									<option value="12:00:00" <?php if($jsa->start_hour == '12:00:00'){echo 'selected';}?>>12:00</option>
									<option value="13:00:00" <?php if($jsa->start_hour == '13:00:00'){echo 'selected';}?>>13:00</option>
									<option value="14:00:00" <?php if($jsa->start_hour == '14:00:00'){echo 'selected';}?>>14:00</option>
									<option value="15:00:00" <?php if($jsa->start_hour == '15:00:00'){echo 'selected';}?>>15:00</option>
									<option value="16:00:00" <?php if($jsa->start_hour == '16:00:00'){echo 'selected';}?>>16:00</option>
									<option value="17:00:00" <?php if($jsa->start_hour == '17:00:00'){echo 'selected';}?>>17:00</option>
									<option value="18:00:00" <?php if($jsa->start_hour == '18:00:00'){echo 'selected';}?>>18:00</option>
									<option value="19:00:00" <?php if($jsa->start_hour == '19:00:00'){echo 'selected';}?>>19:00</option>
									<option value="20:00:00" <?php if($jsa->start_hour == '20:00:00'){echo 'selected';}?>>20:00</option>
									<option value="21:00:00" <?php if($jsa->start_hour == '21:00:00'){echo 'selected';}?>>21:00</option>
									<option value="22:00:00" <?php if($jsa->start_hour == '22:00:00'){echo 'selected';}?>>22:00</option>
									<option value="23:00:00" <?php if($jsa->start_hour == '23:00:00'){echo 'selected';}?>>23:00</option>
									<option value="00:00:00" <?php if($jsa->start_hour == '00:00:00'){echo 'selected';}?>>00:00</option>
									<option value="01:00:00" <?php if($jsa->start_hour == '01:00:00'){echo 'selected';}?>>01:00</option>
									<option value="02:00:00" <?php if($jsa->start_hour == '02:00:00'){echo 'selected';}?>>02:00</option>
									<option value="03:00:00" <?php if($jsa->start_hour == '03:00:00'){echo 'selected';}?>>03:00</option>
									<option value="04:00:00" <?php if($jsa->start_hour == '04:00:00'){echo 'selected';}?>>04:00</option>
									<option value="05:00:00" <?php if($jsa->start_hour == '05:00:00'){echo 'selected';}?>>05:00</option>
									<option value="06:00:00" <?php if($jsa->start_hour == '06:00:00'){echo 'selected';}?>>06:00</option>
									<option value="07:00:00" <?php if($jsa->start_hour == '07:00:00'){echo 'selected';}?>>07:00</option>
								</select>
							</div>
							<div class="col-md-3 form-group">
								<select id="end_hour" name="end_hour" class="form-control" required>
									<option value="16:00:00" <?php if($jsa->start_hour == '16:00:00'){echo 'selected';}?>>16:00</option>
									<option value="17:00:00" <?php if($jsa->start_hour == '17:00:00'){echo 'selected';}?>>17:00</option>
									<option value="18:00:00" <?php if($jsa->start_hour == '18:00:00'){echo 'selected';}?>>18:00</option>
									<option value="19:00:00" <?php if($jsa->start_hour == '19:00:00'){echo 'selected';}?>>19:00</option>
									<option value="20:00:00" <?php if($jsa->start_hour == '20:00:00'){echo 'selected';}?>>20:00</option>
									<option value="21:00:00" <?php if($jsa->start_hour == '21:00:00'){echo 'selected';}?>>21:00</option>
									<option value="22:00:00" <?php if($jsa->start_hour == '22:00:00'){echo 'selected';}?>>22:00</option>
									<option value="23:00:00" <?php if($jsa->start_hour == '23:00:00'){echo 'selected';}?>>23:00</option>
									<option value="00:00:00" <?php if($jsa->start_hour == '00:00:00'){echo 'selected';}?>>00:00</option>
									<option value="01:00:00" <?php if($jsa->start_hour == '01:00:00'){echo 'selected';}?>>01:00</option>
									<option value="02:00:00" <?php if($jsa->start_hour == '02:00:00'){echo 'selected';}?>>02:00</option>
									<option value="03:00:00" <?php if($jsa->start_hour == '03:00:00'){echo 'selected';}?>>03:00</option>
									<option value="04:00:00" <?php if($jsa->start_hour == '04:00:00'){echo 'selected';}?>>04:00</option>
									<option value="05:00:00" <?php if($jsa->start_hour == '05:00:00'){echo 'selected';}?>>05:00</option>
									<option value="06:00:00" <?php if($jsa->start_hour == '06:00:00'){echo 'selected';}?>>06:00</option>
									<option value="07:00:00" <?php if($jsa->start_hour == '07:00:00'){echo 'selected';}?>>07:00</option>
									<option value="08:00:00" <?php if($jsa->start_hour == '08:00:00'){echo 'selected';}?>>08:00</option>
									<option value="09:00:00" <?php if($jsa->start_hour == '09:00:00'){echo 'selected';}?>>09:00</option>
									<option value="10:00:00" <?php if($jsa->start_hour == '10:00:00'){echo 'selected';}?>>10:00</option>
									<option value="11:00:00" <?php if($jsa->start_hour == '11:00:00'){echo 'selected';}?>>11:00</option>
									<option value="12:00:00" <?php if($jsa->start_hour == '12:00:00'){echo 'selected';}?>>12:00</option>
									<option value="13:00:00" <?php if($jsa->start_hour == '13:00:00'){echo 'selected';}?>>13:00</option>
									<option value="14:00:00" <?php if($jsa->start_hour == '14:00:00'){echo 'selected';}?>>14:00</option>
									<option value="15:00:00" <?php if($jsa->start_hour == '15:00:00'){echo 'selected';}?>>15:00</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label>Pimpinan Pekerjaan</label>
									<div class="row">
									<div class="col-md-6 col-xs-6">
										<?php if($company_name != 'PT SLCI'){ ?>
										<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
										<script>
											$(document).ready(function () {
												$("#superr").select2({
													placeholder: "Please Select"
												});
								 
											});
										</script>
										<select class="form-control required" id="superr" name="supervisor" maxlength="255" placeholder="Pimpinan Pekerjaan" required>
											<option value=""></option>
											<?php if(!empty($listnamecon)){ 
												foreach($listnamecon as $rec)
												{
											?>
											<option value="<?php echo $rec->vendor_name; ?>" <?php if($rec->vendor_name == $jsa->supervisor){ echo 'selected';}?>><?php echo $rec->vendor_name; ?></option>
											<?php } }?>
										</select>
										<?php } ?>

										<?php if($company_name == 'PT SLCI'){ ?>
										<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
										<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
										<script>
											$(document).ready(function () {
												$("#supervisorx").select2({
													placeholder: "Please Select"
												});
								 
											});
										</script>
										<select id="supervisorx" name="supervisor" class="form-control" required>
											<option value=""></option>
											<?php if(!empty($userList)){ 
												foreach($userList as $user)
												{
											?>
											<option value="<?php echo $user->uName; ?>" <?php if($user->uName == $jsa->supervisor){ echo 'selected';}?>><?php echo $user->uName; ?></option>
											<?php } }?>
										</select>
										<?php } ?>
									</div>
									<div class="col-md-6 col-xs-6">
										<div class="input-group input-group-sm">
											<span class="input-group-btn">
												<a class="btn btn-default btn-flat" href="#">+62</a>
											</span>
										<input type="number" class="form-control required" value="<?php echo $jsa->supervisor_hp; ?>" id="supervisor_hp" name="supervisor_hp" maxlength="255" placeholder="No HP" required>
									</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">         
								<div class="form-group">
										<label>Uraian Pekerjaan</label><br>
										<textarea type="text" name="description" rows="4" class="form-control required" required><?php echo $jsa->description; ?></textarea>
								</div>
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<input type="hidden" value="<?php echo $company_name;?>" name="company_name">
						<input type="hidden" value="<?php echo $jsa->id;?>" name="id">
						<input type="submit" class="btn btn-success pull-right" value="NEXT (2/5)" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
                    </form>
                </div>
            </div>
			
            
        </div>
		<?php } ?>
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$("#area").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#dept").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#start_hour").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#end_hour").select2({
			placeholder: "Please Select"
		});
	});
	jQuery('#datepicker1').datepicker({
			autoclose: true,
			format : "yyyy-mm-dd",
			startDate : "<?php echo date('Y-m-d'); ?>",
			todayHighlight : true
	});
		
</script>
