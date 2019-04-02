<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Add Vendor Contractor
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <?php echo form_open_multipart('hse_jsa/upload_file');?>
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
					<form role="form" id="add_vendorinduction" action="<?php echo base_url() ?>upload_file" method="post" role="form">
						<div class="box-body">
							<div class="row">
								<div class="col-md-12 col-xs-12">                                
									<div class="form-group">
										<label for="vendor_id">Perusahaan</label><br>
									<select id="vendor_id" name="vendor_id" class="form-control" placeholder="Select Vendor">
										<?php if(!empty($vendor)){ 
											foreach($vendor as $rec){
										?>
										<option value="<?php echo $rec->NIK; ?>"><?php echo $rec->uName; ?></option>
										<?php } }?>
									</select>	
									</div>	
								</div>
								<div class="col-md-12 col-xs-12">                                
									<div class="form-group">
										<label for="vendor_name">Nama</label>
										<input type="text" class="form-control required" id="vendor_name" name="vendor_name" maxlength="255" placeholder="Tuliskan nama" required>
									</div>
								</div>
								<div class="col-md-12 col-xs-12">                                
									<div class="form-group">
										<label for="pass">No. Registrasi</label>
										<input type="number" class="form-control required" id="regnum" name="regnum" maxlength="255" placeholder="Registration No." value="<?php echo $regnum;?>" readonly="readonly" required>
									</div>
								</div>
								<div class="col-md-12 col-xs-12">                                
									<div class="form-group">
										<label for="no_ktp">No. KTP</label>
										<input type="number" class="form-control required" id="no_ktp" name="no_ktp" maxlength="255" placeholder="No. KTP" required>
									</div>
								</div>
									<div class="col-md-12 col-xs-12">                  
											<label for="start_date">Tanggal Berlaku</label>
									</div>
									<div class="col-md-3 form-group">
										<input for="start_date" autocomplete="off" type="text" name="start_date" class="form-control" id="datepicker1" placeholder="Tanggal Mulai" value="<?php echo date('Y-m-d'); ?>" required/>
									</div>
									<div class="col-md-3 form-group">
										<input for="end_date" autocomplete="off" type="text" name="end_date" class="form-control" placeholder="Tanggal Selesai" id="datepicker2" value="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" required/>
									</div>
									<div class="col-md-12 col-xs-12">       
										<div class="form-group">
											<label>Upload Pass Foto</label>
											<input type="file" name="img" class="form-control"/>
										</div>
									</div>
									<div class="col-md-12 col-xs-12">         
										<div class="form-group">
												<label>Keterangan</label><br>
												<textarea type="text" name="notes" rows="4" class="form-control required"></textarea>
										</div>
									</div>	
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button class="btn btn-primary pull-right">Submit</button>
								<a class="btn btn-default" href="<?php echo base_url()?>vendorinduction">BACK</a>
							</div>
						</div>
					</form>
				</div>	
			</div>
    </section> 
	
		</div>	 
    
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$("#vendor_id").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#vendor_name").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#regnum").select2({
			placeholder: "Please Select",
		});
	});
	$(document).ready(function () {
		$("#no_ktp").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#start_date").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#end_date").select2({
			placeholder: "Please Select"
		});
	});
	jQuery('#datepicker1').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd",
		todayHighlight : true
	});
	jQuery('#datepicker2').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd"
	});
</script>



