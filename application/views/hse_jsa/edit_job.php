<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Edit Job
      </h1>
    </section>
    
    <section class="content">
		<?php //if($add_job == 2){?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
					<form role="form" id="add_jsa" action="<?php echo base_url() ?>editjob" method="post" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="job_name">No PO</label>
									<input type="number" class="form-control required" id="po_num" value="<?php echo $jobdata->po_num; ?>" name="po_num" maxlength="255" placeholder="Tulis Nomor PO" required>
								</div>
							</div>
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="job_name">Nama Pekerjaan</label>
									<input type="text" class="form-control required" id="job_name" value="<?php echo $jobdata->job_name; ?>" name="job_name" maxlength="255" placeholder="Tulis Nama Pekerjaan" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<label for="vendor">Vendor</label>
								</div>
								<div class="col-md-12 col-xs-12">
									<select id="vendor" name="vendor" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($vendorList)){ 
											foreach($vendorList as $record)
											{
										?>
										<option value="<?php echo $record->NIK; ?>" <?php if($record->NIK == $jobdata->pt_name){echo "selected";}?>><?php echo $record->uName; ?></option>
										<?php } }?>
									</select>
								</div>
							
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="user">User</label>
									<select id="user" name="user" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($userList)){ 
											foreach($userList as $record)
											{
										?>
										<option value="<?php echo $record->uName; ?>" <?php if($record->uName == $jobdata->user){echo "selected";}?>><?php echo $record->uName; ?></option>
										<?php } }?>
									</select>
								</div>
								
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<input type="hidden" name="id" value="<?php echo $jobdata->id; ?>" />
						<input type="submit" class="btn btn-success pull-right" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
                    </form>
                </div>
            </div>
        </div>
		<?php //} ?>
    </section>
	
    
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
            $(document).ready(function () {
                $("#vendor").select2({
                    placeholder: "Please Select"
                });
 
            });
			
			 $(document).ready(function () {
                $("#user").select2({
                    placeholder: "Please Select"
                });
 
            });
			
			
</script>



