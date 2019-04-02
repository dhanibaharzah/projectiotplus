<?php

$id = '';
$name = '';
$brand = '';
$size = '';
$pos = '';

if(!empty($toolInfo))
{
    foreach ($toolInfo as $uf)
    {
        $id = $uf->id;
        $name = $uf->name;
        $brand = $uf->brand;
        $size = $uf->size;
        $pos = $uf->pos;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-wrench"></i> Tool Management
        <small>Add / Edit Tool</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Details of Tool ID.[<?php echo $id; ?></h3>]
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>edittoolexe" method="post" id="editTool" role="form">
                        <div class="box-body">
                            <div class="row">
							 <div class="col-md-6">
								<h5>Tool Data</h5>
								</div>
							</div>
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Tool Name</label>
                                        <input onkeyup="lettersOnly(this)" type="text" class="form-control" id="name" placeholder="Tool Name" name="name" value="<?php echo $name; ?>" maxlength="255">
										<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="brand">Tool Brand</label>
                                        <input onkeyup="lettersOnly(this)" type="text" class="form-control" id="brand" placeholder="Tool Brand" name="brand" value="<?php echo $brand; ?>" maxlength="255">
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="size">Tool Size/Type</label>
                                        <input onkeyup="lettersOnly(this)" type="text" class="form-control" id="size" placeholder="Tool Size/Type" name="size" value="<?php echo $size; ?>" maxlength="255">
                                    </div>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pos">Position</label>
                                        <input onkeyup="lettersOnly(this)" type="text" class="form-control" id="pos" placeholder="Function" name="pos" value="<?php echo $pos; ?>" maxlength="255">
                                    </div>
                                </div>
							</div>
							
							
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
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

<script src="<?php echo base_url(); ?>assets/js/editTool.js" type="text/javascript"></script>
