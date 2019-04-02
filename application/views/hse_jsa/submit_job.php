<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Submit Job
      </h1>
    </section>
    
    <section class="content">
		<?php if($add_job == 2){?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
					<form role="form" id="add_jsa" action="<?php echo base_url() ?>submit_job" method="post" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="job_name">No PO</label>
									<input type="number" class="form-control required" id="po_num" name="po_num" maxlength="255" placeholder="Tulis Nomor PO" required>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">                                
								<div class="form-group">
									<label for="job_name">Nama Pekerjaan</label>
									<input type="text" class="form-control required" id="job_name" name="job_name" maxlength="255" placeholder="Tulis Nama Pekerjaan" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<label for="vendor">Vendor</label>
								<div class="input-group input-group-sm">
									<select id="vendor" name="vendor" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($vendorList)){ 
											foreach($vendorList as $record)
											{
										?>
										<option value="<?php echo $record->NIK; ?>"><?php echo $record->uName; ?></option>
										<?php } }?>
									</select>
									<span class="input-group-btn">
										<a class="btn btn-primary btn-flat" href="<?php echo base_url() ?>add_vendor"><i class="fa fa-plus"></i> Add Vendor</a>
									</span>
								</div>
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
										<option value="<?php echo $record->uName; ?>"><?php echo $record->uName; ?></option>
										<?php } }?>
									</select>
								</div>
								
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<input type="submit" class="btn btn-success pull-right" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
                    </form>
                </div>
            </div>
        </div>
		<?php } ?>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><b>Data Pekerjaan yang masih aktif</b></h3>
                    </div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Last Update</th>
									<th class="text-center">PO</th>
									<th class="text-center">Job</th>
									<th class="text-center">Vendor</th>
									<th class="text-center">User</th>
									<th class="text-center">Action</th>
								</tr>
								<?php
									if(!empty($joblist))
									{
										$a=1;
										foreach($joblist as $record)
										{
								?>
								<tr>
									<td ><?php echo $a ?></td>
									<td ><?php echo $record->timestamp ?></td>
									<td ><?php echo $record->po_num ?></td>
									<td ><?php echo $record->job_name ?></td>
									<td ><?php echo $record->pt_name ?></td>
									<td ><?php echo $record->user ?></td>
									<td>
									<?php if($add_job == 2){?>
									<a href="<?php echo base_url(); ?>edit_job/<?php echo $record->id;?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $record->id;?>"><i class="fa fa-trash"></i></button>
									<?php } ?>
									</td>

<div class="modal modal-danger fade" id="delete<?php echo $record->id;?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" id="delete_job" action="<?php echo base_url() ?>delete_job" method="post" role="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete Job</h4>
			</div>
			<div class="modal-body">
				<p>Anda Yakin&hellip; ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
				<input type="hidden" name="id" value="<?php echo $record->id; ?>">
				<input type="submit" class="btn btn-outline" value="YA">
			</div>
			</form>
		</div>
	</div>
</div>
								</tr>
								<?php
									$a++;
									}
								}
								?>
							</table>
						</div>
					</div><!-- /.box-body -->
                </div>
			</div>
		</div> 
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



