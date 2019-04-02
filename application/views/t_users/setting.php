<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><i class="fa fa-wrench"></i> Setting</h1>
    </section>
    <section class="content">
        <div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<h4><i class="fa fa-check"></i> Approval Setting <small>always check user's email!</small></h4>
							</div>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<label>Current PIC: </label><span> <?php echo $pic->uName ?> / email: <?php echo $pic->slcimail ?></span>
							</div>
							<div class="col-lg-12 col-xs-12">
								<label>Current Manager: </label><span> <?php echo $man->uName ?> / email: <?php echo $man->slcimail ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
				
								<form role="form" action="<?php echo base_url() ?>applysetting" method="post" role="form">
					<?php
						if($role == ROLE_MANAGER){
					?>
						<div class="row">
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label>Change PIC: </label>
									<select id="pic" name="pic" class="form-control">
										<option value=""></option>
										<?php if(!empty($userlist)){ 
											foreach($userlist as $users)
											{
										?>
										<option value="<?php echo $users->id; ?>"><?php echo $users->uName; ?> email: <?php echo $users->slcimail; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-xs-12">
								<div class="form-group">
									<label>Change Manager: </label>
									<select id="man" name="man" class="form-control">
										<option value=""></option>
										<?php if(!empty($userlist)){ 
											foreach($userlist as $users)
											{
										?>
										<option value="<?php echo $users->id; ?>"><?php echo $users->uName; ?> email: <?php echo $users->slcimail; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<strong>NOTICE!</strong><br>
								<p>Dropdown selector will only show user with SLCI email. Ask user to add their SLCI email on their own Toolkeeping account to make them visible in those dropdown selector.
								Selected PIC has responsibility to check toolkeeper's PM report and tool lost/damage report. While Manager has responsibility to re-check/approve the report that has been checked by PIC.</p>
							</div>
						</div>
					<?php } ?>
						
								
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box box-footer">
						<input type="hidden" value="<?php echo $pic->id; ?>" name="expic" />
						<input type="hidden" value="<?php echo $man->id; ?>" name="exman" />
						<input type="submit" class="btn btn-primary" value="Submit" />
						</form>
					</div>
				</div><!-- /.box -->
			</div>
		</div>
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/autocomplete/jquery-3.3.1.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
            $(document).ready(function () {
                $("#pic").select2({
                    placeholder: "Please Select"
                });
				$("#man").select2({
                    placeholder: "Please Select"
                });
 
            });
</script>


