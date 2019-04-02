<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Edit Vendor
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
					<form role="form" action="<?php echo base_url() ?>editvendor" method="post" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="job_name">Nama Perusahaan</label>
									<input type="text" class="form-control required" id="uName" name="uName" maxlength="255" value="<?php echo $vendordata->uName;?>" placeholder="Nama Perusahaan" required>
								</div>
							</div>
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="pass">Password</label>
									<input type="password" class="form-control required" id="pass" name="pass" maxlength="255" value="<?php echo $vendordata->uPassword;?>" placeholder="Password" required>
								</div>
							</div>
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" class="form-control required" id="email" name="email" maxlength="255" value="<?php echo $vendordata->email;?>" placeholder="Email" required>
								</div>
							</div>
							<div class="col-md-12 col-xs-12">
								<label for="telp">Nomor Telepon</label>
								<div class="input-group input-group-sm">
									<span class="input-group-btn">
										<a class="btn btn-default btn-flat" href="#">+62</a>
									</span>
									<input type="number" class="form-control required" id="telp" name="telp" maxlength="255" value="<?php echo $vendordata->telp;?>" placeholder="No Telepon" required>
								</div>
							</div>
						</div>
						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<input type="hidden" name="id" value="<?php echo $vendordata->id;?>" />
						<input type="submit" class="btn btn-success pull-right" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
                    </form>
                </div>
            </div>
        </div>
		
    </section>
    
</div>



