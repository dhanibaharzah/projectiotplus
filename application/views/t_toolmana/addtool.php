<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Tool Management
        <small>Add / Edit Tool</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Tool Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addtool" action="<?php echo base_url() ?>addtoolexe" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('name'); ?>" id="name" name="name" maxlength="128">
                                    </div>                                   
                                </div>
							</div>
							<div class="row">
								<div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('brand'); ?>" id="brand" name="brand" maxlength="128">
                                    </div>
                                    
                                </div>
                            </div>
							<div class="row">
								<div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="size">Size/Type</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('size'); ?>" id="size" name="size" maxlength="128">
                                    </div>
                                    
                                </div>
                            </div>
							<div class="row">
								<div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="pos">Kisaran Harga</label>
                                        <input type="number" class="form-control required" value="<?php echo set_value('pos'); ?>" id="pos" name="pos" maxlength="128">
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
<script src="<?php echo base_url(); ?>assets/js/addTool.js" type="text/javascript"></script>