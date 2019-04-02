<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
	 <h1> 
	 	<i class="fa fa-warning"></i> Vendor Penalty
		 <a href="<?php echo base_url(); ?>penalty_list/<?php echo $penalty_data->regnum;?>" class="btn btn-sm btn-success"><span class="fa fa-eye"></a>
	</h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<form role="form" action="<?php echo base_url() ?>penaltyvendor" method="post" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<table class="table table-hover table-striped table-bordered">
									<tr>
										<td width="5%"><b>Perusahaan</b></td>
										<td width="70%">
											<input type="text" class="form-control required" id="vendor_id" name="vendor_id" maxlength="255" placeholder="Registration No." value="<?php echo $penalty_data->vendor_id;?>" readonly="readonly" required>
										</td>
									</tr>
									<tr>
										<td width="5%"><b>Nama</b></td>
										<td width="70%">
											<input type="text" class="form-control required" id="man_vendor_id" name="man_vendor_id" maxlength="255" placeholder="Registration No." value="<?php echo $penalty_data->vendor_name;?>" readonly="readonly" required>
										</td>
									</tr>
									<tr>
										<td width="5%"><b>No. Registrasi</b></td>
										<td width="70%">
											<input type="number" class="form-control required" id="regnums" name="regnums" maxlength="255" placeholder="Registration No." value="<?php echo $penalty_data->regnum;?>" readonly="readonly" required>
										</td>
									</tr>
								</table>
							</div>	
							<div class="col-md-12 col-xs-12">         
								<div class="form-group">
										<label>Deskripsi Pelanggaran</label><br>
										<textarea type="text" name="notes" rows="4" class="form-control required" required></textarea>
								</div>
							</div>
						</div>
						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<input type="hidden" name="id" value="<?php echo $penalty_data->id;?>" />
						<input type="submit" class="btn btn-primary pull-right" value="Submit" />
					 <a class="btn btn-success" href="<?php echo base_url()?>vendorinduction"><i class="fa fa-arrow-left"></i> BACK</a>
					</div>
                    </form>
                </div>
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
		$("#man_vendor_id").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#regnums").select2({
			placeholder: "Please Select"
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
		format : "yyyy-mm-dd"
	});
	jQuery('#datepicker2').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd"
	});
</script>



