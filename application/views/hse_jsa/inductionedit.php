<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Edit Vendor Contractor
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="col-md-12 col-xs-12">
                    <div class="box box-primary">
                        <form role="form" id="edit_convendor" action="<?php echo base_url() ?>edit_convendor" method="post" role="form">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <table class="table table-hover table-striped table-bordered">
                                                <tr>
                                                    <td width="5%"><b>Perusahaan</b></td>
                                                    <td width="70%"><?php echo $convendor_data->vendor_id;?></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><b>No. Registrasi</b></td>
                                                    <td width="70%"><?php echo $convendor_data->regnum;?></td>
                                                </tr>
                                            </table>
                                        </div>	
                                        <div class="col-md-12 col-xs-12">                                
                                            <div class="form-group">
                                                <label for="vendor_name">Nama</label>
                                                <input type="text" class="form-control required" id="vendor_name" name="vendor_name" maxlength="255" placeholder="Nama Karyawan" value="<?php echo $convendor_data->vendor_name;?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">                                
                                            <div class="form-group">
                                                <label for="no_ktp">No. KTP</label>
                                                <input type="number" class="form-control required" id="no_ktp" name="no_ktp" maxlength="255" placeholder="No. KTP" value="<?php echo $convendor_data->no_ktp;?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">                  
                                                <label for="start_date">Tanggal Berlaku</label>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <input for="start_date" autocomplete="off" type="text" name="start_date" class="form-control" id="datepicker1" placeholder="Tanggal Mulai" value="<?php echo $convendor_data->start_date;?>" required/>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <input for="end_date" autocomplete="off" type="text" name="end_date" class="form-control" id="datepicker2" placeholder="Tanggal Selesai" value="<?php echo $convendor_data->end_date;?>" required/>
                                        </div>
                                        <div class="col-md-12 col-xs-12">         
                                            <div class="form-group">
                                                    <label>Keterangan</label><br>
                                                    <input type="text" name="notes" class="form-control required" value="<?php echo $convendor_data->notes;?>" required>
                                            </div>
                                        </div>	
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" name="id" value="<?php echo $convendor_data->id;?>" />
                                    <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                                    <a class="btn btn-success" href="<?php echo base_url()?>vendorinduction">BACK</a>
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>   
                        </form>
                    </div>
                </div> 
            </div>       
		</div>
    </section>
</div>   
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<!-- <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script> -->
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
		startDate : "<?php echo date('Y-m-d'); ?>",
		todayHighlight : true
	});
	jQuery('#datepicker2').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd"
	});
</script>



