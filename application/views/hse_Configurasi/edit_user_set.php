<?php

$id = '';
$name = '';
$uFlag = '';

if(!empty($user_set))
{
    foreach ($user_set as $uf)
    {
        $id = $uf->id;
        $name = $uf->uName;
        $uFlag = $uf->uFlag;
		$hse_role = $uf->hse_role;
		$hse_picar = $uf->hse_picar;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-wrench"></i> User Role
        <small>Add / Edit Item</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Item Detail</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>edit_user_set" method="post" id="editPM" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label><?php echo $name; ?></label>
                                        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="uFlag">Validation</label>
										<select class="form-control" id="uFlag" name="uFlag">
											<option value="1">Active</option>
											<option value="0">Inactive</option>
                                        </select>
									</div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="roles">Group Area</label>
                                        <select class="form-control required" id="roles" name="hse_role">
											<option value=""></option>
										<?php
											if(!empty($dd_hse_roles)){
												foreach($dd_hse_roles as $roles){
										?>
                                            <option value="<?php echo $roles->code; ?>" <?php if($hse_role == $roles->code){ echo 'selected';} ?>><?php echo $roles->code.' - '.$roles->notes; ?></option>
										<?php } }?>
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="picar">PIC Area</label>
                                        <select class="form-control required" id="picar" name="hse_picar">
                                            <option value=""></option>
										<?php
											if(!empty($dd_hse_picar)){
												foreach($dd_hse_picar as $picar){
										?>
                                            <option value="<?php echo $picar->code; ?>" <?php if($hse_picar == $picar->code){ echo 'selected';} ?>><?php echo $picar->code.' - '.$picar->notes; ?></option>
										<?php } }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
							<a class="btn btn-default" href="<?php echo base_url(); ?>user_set">BACK</a>
                            <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$("#roles").select2({
			placeholder: "Please Select"
		});
		$("#picar").select2({
			placeholder: "Please Select"
		});
	});
</script>