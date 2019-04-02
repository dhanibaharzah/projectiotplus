<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Anggota Kerja
      </h1>
    </section>
    
    <section class="content">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<b>Pekerjaan: </b><?php echo $jsa->job_name;?>, <b>Area: </b><?php echo $jsa->area;?>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><b>Data Anggota Tim</b></h3><br>
						<p>Tuliskan nama pekerja beserta fungsinya dalam pekerjaan ini termasuk nama supervisor/pengawas/mandor.</p>
                    </div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped table-bordered ">
								<tr>
									<th class="text-center" width="5%">No</th>
									<th>Nama_Karyawan/Pekerja</th>
									<th>Jabatan/Fungsi</th>
									<th class="text-center">Action</th>
								</tr>
								<?php
									if(!empty($memberlist))
									{
										$a=1;
										foreach($memberlist as $record)
										{
								?>
								<tr>
									<td class="text-center"><?php echo $a ?></td>
									<td><?php echo $record->name ?></td>
									<td><?php echo $record->func ?></td>
									<td class="text-center">
										<a href="<?php echo base_url()?>del_worker/<?php echo $record->id ?>/<?php echo $record->jsa_id ?>" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php
									$a++;
									}
								}
								?>
								<tr>
								<form role="form" id="add_worker" action="<?php echo base_url() ?>add_worker" method="post" role="form">
									<td></td>
									<td>
										<?php if($company_name != 'PT SLCI'){ ?>
										<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
										<script>
											$(document).ready(function () {
												$("#superr").select2({
													placeholder: "Please Select"
												});
								 
											});
										</script>
										<select class="form-control required" id="superr" name="name" maxlength="255" placeholder="Nama" required>
											<option value=""></option>
											<?php if(!empty($listnamecon)){ 
												foreach($listnamecon as $rec)
												{
											?>
											<option value="<?php echo $rec->vendor_name; ?>"><?php echo $rec->vendor_name; ?></option>
											<?php } }?>
										</select>
										<?php } ?>
										
										<?php if($company_name == 'PT SLCI'){ ?>
										<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
										<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
										<script>
											$(document).ready(function () {
												$("#name").select2({
													placeholder: "PT SLCI"
												});
								 
											});
										</script>
										<select id="name" name="name" class="form-control" >
											<option value=""></option>
											<?php if(!empty($userList)){ 
												foreach($userList as $user)
												{
											?>
											<option value="<?php echo $user->uName; ?>"><?php echo $user->uName; ?></option>
											<?php } }?>
										</select>
										<?php } ?>
										<input type="text" name="name2" placeholder="Lainnya" class="form-control input-sm" minlength="4"/>
									</td>
									<td>
										<select id="func" name="func" class="form-control" required>
											<option value=""></option>
											<?php if(!empty($function)){ 
												foreach($function as $record)
												{
											?>
											<option value="<?php echo $record->func; ?>"><?php echo $record->func; ?></option>
											<?php } }?>
										</select>
									</td>
									<td class="text-center">
										<input type="hidden" name="jsa_id" value="<?php echo $jsa->id ?>">
										<input type="submit" class="btn btn-success btn-sm" value="Tambah Pekerja">
									</td>
								</tr>
								</form>
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>hazard/<?php echo $jsa->id;?>" class="btn btn-primary pull-left">BACK</a>
						<?php if(!empty($memberlist)){?>
						<a href="<?php echo base_url();?>tool_hse/<?php echo $jsa->id; ?>" class="btn btn-success pull-right">NEXT (4/5)</a>
						<?php } ?>
					</div>
                    </form>
                </div>
            </div>
			
            
        </div>
    </section>
    
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
            $(document).ready(function () {
                $("#func").select2({
                    placeholder: "Please Select"
                });
 
            });
			
</script>
