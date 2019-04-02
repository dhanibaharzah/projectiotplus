<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Create Permit
        <small><?php echo $company_name; ?></small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><b>Job Overview</b></h3><br>
						<p>Tuliskan identifikasi lengkap pekerjaan yang akan Anda lakukan.</p>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
                    <form role="form" id="add_jsa" action="<?php echo base_url() ?>add_jsa" method="post" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="job_name">Nama Pekerjaan</label>
									<?php if($company_name == 'PT SLCI'){ ?>
									<input type="text" class="form-control required" id="job_name" name="job_name" maxlength="255" placeholder="Tulis Nama Pekerjaan" required>
									<?php } ?>
									<?php if($company_name != 'PT SLCI'){ ?>
									<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
									<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
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
										<option value="<?php echo $record->id; ?>">PO: <?php echo $record->po_num; ?>, <?php echo $record->job_name; ?></option>
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
										<option value="<?php echo $record->id; ?>"><?php echo $record->toolname; ?></option>
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
											foreach($dept as $record)
											{
										?>
										<option value="<?php echo $record->id_dept; ?>"><?php echo $record->role; ?></option>
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
								<input for="start_date" autocomplete="off" type="text" name="start_date" class="form-control" id="datepicker1" placeholder="Tanggal Mulai" required/>
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
									<option value=""></option>
									<option value="08:00:00">08:00</option>
									<option value="09:00:00">09:00</option>
									<option value="10:00:00">10:00</option>
									<option value="11:00:00">11:00</option>
									<option value="12:00:00">12:00</option>
									<option value="13:00:00">13:00</option>
									<option value="14:00:00">14:00</option>
									<option value="15:00:00">15:00</option>
									<option value="16:00:00">16:00</option>
									<option value="17:00:00">17:00</option>
									<option value="18:00:00">18:00</option>
									<option value="19:00:00">19:00</option>
									<option value="20:00:00">20:00</option>
									<option value="21:00:00">21:00</option>
									<option value="22:00:00">22:00</option>
									<option value="23:00:00">23:00</option>
									<option value="00:00:00">00:00</option>
									<option value="01:00:00">01:00</option>
									<option value="02:00:00">02:00</option>
									<option value="03:00:00">03:00</option>
									<option value="04:00:00">04:00</option>
									<option value="05:00:00">05:00</option>
									<option value="06:00:00">06:00</option>
									<option value="07:00:00">07:00</option>
								</select>
							</div>
							<div class="col-md-3 form-group">
								<select id="end_hour" name="end_hour" class="form-control" required>
									<option value=""></option>
									<option value="08:00:00">08:00</option>
									<option value="09:00:00">09:00</option>
									<option value="10:00:00">10:00</option>
									<option value="11:00:00">11:00</option>
									<option value="12:00:00">12:00</option>
									<option value="13:00:00">13:00</option>
									<option value="14:00:00">14:00</option>
									<option value="15:00:00">15:00</option>
									<option value="16:00:00">16:00</option>
									<option value="17:00:00">17:00</option>
									<option value="18:00:00">18:00</option>
									<option value="19:00:00">19:00</option>
									<option value="20:00:00">20:00</option>
									<option value="21:00:00">21:00</option>
									<option value="22:00:00">22:00</option>
									<option value="23:00:00">23:00</option>
									<option value="00:00:00">00:00</option>
									<option value="01:00:00">01:00</option>
									<option value="02:00:00">02:00</option>
									<option value="03:00:00">03:00</option>
									<option value="04:00:00">04:00</option>
									<option value="05:00:00">05:00</option>
									<option value="06:00:00">06:00</option>
									<option value="07:00:00">07:00</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label>Pimpinan Pekerjaan</label>
									<div class="row">
									<div class="col-md-6 col-xs-6">
										<?php if($company_name != 'PT SLCI'){ ?><link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
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
											<option value="<?php echo $rec->vendor_name; ?>"><?php echo $rec->vendor_name; ?></option>
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
											<option value="<?php echo $user->hse_role <= 20; ?>"><?php echo $user->uName; ?></option>
											<?php } }?>
										</select>
										<?php } ?>
										
									</div>
									<div class="col-md-6 col-xs-6">
										<div class="input-group input-group-sm">
										<?php if(!empty($userList)){ 
												foreach($userList as $user)
												{
											?>
											<input type="hidden" class="form-control required" id="supervisor_hp" name="supervisor_hp" maxlength="255" placeholder="No HP" value="<?php echo $user->phone?>" required>
											<?php } }?>
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
										<textarea type="text" name="description" rows="4" class="form-control required" required></textarea>
								</div>
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<input type="hidden" value="<?php echo $company_name;?>" name="company_name">
						<input type="submit" class="btn btn-success pull-right" value="NEXT (2/5)" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
                    </form>
                </div>
            </div>
			
            
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
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
		//singleDatePicker: true,
		autoclose: true,
		format : "yyyy-mm-dd",
		startDate : "<?php echo date('Y-m-d'); ?>",
		todayHighlight : true,
		//timePicker: true
	});
		
	jQuery('#datepicker2').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd"
	});
		
	$('#datepicker1').on('changeDate', function (selected) {
		$('#datepicker2').datepicker('setStartDate', selected.date);
		$('#datepicker2').datepicker('setDate', selected.date);
		$(this).datepicker('hide');
	});
</script>



