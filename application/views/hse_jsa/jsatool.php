<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-wrench"></i> Override, Tools and Equipment
      </h1>
    </section>
    
    <section class="content">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<b>Pekerjaan: </b><?php echo $jsa->job_name;?>, <b>Area: </b><?php echo $jsa->area;?><br>
						Masukkan perangkat safety yang akan dilepas atau dinonaktifkan (Jika ada). Masukkan nama peralatan dan perlengkapan yang akan digunakan.
					</div>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
					<form role="form" id="add_tool" action="<?php echo base_url() ?>add_tool" method="post" role="form">
					<input type="hidden" name="jsa_id" value="<?php echo $jsa->id; ?>">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<label for="override">Pelepasan Perangkat Safety</label>
								<div class="input-group input-group-sm">
									<select id="override" name="override" class="form-control" >
										<option value=""></option>
										<?php if(!empty($override)){ 
											foreach($override as $record)
											{
										?>
										<option value="<?php echo $record->toolname; ?>"><?php echo $record->toolname; ?></option>
										<?php } }?>
									</select>
									<span class="input-group-btn">
										<input type="submit" class="btn btn-warning  btn-flat" value="+" />
									</span>
								</div>
								<table class="table table-hover table-striped table-bordered ">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th class="pull-right">Del</th>
									</tr>
									<?php
										if(!empty($overrideList)){ $no1 = 1;
											foreach($overrideList as $record){
									?>
									<tr>
										<td width="5%" class="text-center"><?php echo $no1 ?></td>
										<td width="50%"><?php echo $record->toolname ?></td>
										<td width="45%"><a href="<?php echo base_url(); ?>del_override/<?php echo $record->id; ?>/<?php echo $jsa->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
									</tr>
									<?php
										$no1++;
										}
									}else{
										echo '<td colspan="3">Belum Ditambahkan</td>';
									}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<label for="apd">Alat Pelindung Diri yang Digunakan</label>
						<div class="input-group input-group-sm">
							<select id="apd" name="apd" class="form-control">
								<option value=""></option>
								<?php if(!empty($apd)){ 
									foreach($apd as $record)
									{
								?>
								<option value="<?php echo $record->toolname; ?>"><?php echo $record->toolname; ?></option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="submit" class="btn btn-warning  btn-flat" value="+"/>
							</span>
						</div>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($apdList)){ $no1 = 1;
									foreach($apdList as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no1 ?></td>
								<td width="50%"><?php echo $record->toolname ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>del_apd/<?php echo $record->id; ?>/<?php echo $jsa->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$no1++;
								}
							}else{
								echo '<td colspan="3">Belum Ditambahkan</td>';
							}
							?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<label for="loto">Titik Lockout Tagout (LOTO)</label>
						<div class="input-group input-group-sm">
							<select id="loto" name="loto" class="form-control" >
								<option value=""></option>
								<?php if(!empty($loto)){ 
									foreach($loto as $record)
									{
								?>
								<option value="<?php echo $record->toolname; ?>"><?php echo $record->toolname; ?></option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="submit" class="btn btn-warning  btn-flat" value="+" />
							</span>
						</div>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($lotoList)){ $no1 = 1;
									foreach($lotoList as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no1 ?></td>
								<td width="50%"><?php echo $record->toolname ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>del_loto/<?php echo $record->id; ?>/<?php echo $jsa->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$no1++;
								}
							}else{
								echo '<td colspan="3">Belum Ditambahkan</td>';
							}
							?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">     
						<label for="tool">Peralatan yang Digunakan</label>
						<div class="input-group input-group-sm">
							<select id="tool" name="tool" class="form-control" >
								<option value=""></option>
								<?php if(!empty($tool)){ 
									foreach($tool as $record)
									{
								?>
								<option value="<?php echo $record->toolname; ?>"><?php echo $record->toolname; ?></option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="submit" class="btn btn-warning  btn-flat" value="+" />
							</span>
						</div>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($toolList)){ $no1 = 1;
									foreach($toolList as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no1 ?></td>
								<td width="50%"><?php echo $record->toolname ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>del_tool/<?php echo $record->id; ?>/<?php echo $jsa->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$no1++;
								}
							}else{
								echo '<td colspan="3">Belum Ditambahkan</td>';
							}
							?>
						</table>		
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<label for="energy">Sumber Energi yang Digunakan</label>
						<div class="input-group input-group-sm">
							<select id="energy" name="energy" class="form-control" >
								<option value=""></option>
								<?php if(!empty($energy)){ 
									foreach($energy as $record)
									{
								?>
								<option value="<?php echo $record->toolname; ?>"><?php echo $record->toolname; ?></option>
								<?php } }?>
							</select>
							<span class="input-group-btn">
								<input type="submit" class="btn btn-warning  btn-flat" value="+" />
							</span>
						</div>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th class="pull-right">Del</th>
							</tr>
							<?php
								if(!empty($energyList)){ $no1 = 1;
									foreach($energyList as $record){
							?>
							<tr>
								<td width="5%" class="text-center"><?php echo $no1 ?></td>
								<td width="50%"><?php echo $record->toolname ?></td>
								<td width="45%"><a href="<?php echo base_url(); ?>del_energy/<?php echo $record->id; ?>/<?php echo $jsa->id; ?>" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
								$no1++;
								}
							}else{
								echo '<td colspan="3">Belum Ditambahkan</td>';
							}
							?>
						</table>	
					</div>
				</div>
			</div>
					</form>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>worker/<?php echo $jsa->id;?>" class="btn btn-primary pull-left">BACK</a>
						<?php if((!empty($overrideList)) OR (!empty($apdList)) OR (!empty($lotoList)) OR (!empty($toolList)) OR (!empty($energyList))){?>
						<a href="<?php echo base_url();?>permit_1/<?php echo $jsa->id; ?>" class="btn btn-success pull-right">NEXT (5/5)</a>
						<?php } ?>
					</div>
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
                $("#override").select2({
                    placeholder: "Please Select"
                });
 
            });
			$(document).ready(function () {
                $("#apd").select2({
                    placeholder: "Please Select"
                });
 
            });
			$(document).ready(function () {
                $("#loto").select2({
                    placeholder: "Please Select"
                });
 
            });
			$(document).ready(function () {
                $("#tool").select2({
                    placeholder: "Please Select"
                });
 
            });
			$(document).ready(function () {
                $("#energy").select2({
                    placeholder: "Please Select"
                });
 
            });
			
	jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "yyyy-mm-dd"
        });
</script>