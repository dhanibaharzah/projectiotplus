<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Identifikasi Bahaya
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
                        <h3 class="box-title"><b>Identifikasi Bahaya</b></h3><br>
						<p>Tuliskan detail aktivitas/langkah kerja yang akan anda kerjakan secara terperinci, potensi bahaya yang mungkin terjadi dari kegiatan tersebut, serta pengendalian untuk mencegah/mengurangi bahaya tersebut</p>
                    </div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th>Aktifitas/Langkah Kerja</th>
									<th>Potensi Bahaya</th>
									<th>Kontrol Bahaya</th>
									<th class="text-center">Action</th>
								</tr>
								
								
								<?php
									$no =0;
									if(!empty($activitylist))
									{
										$a=1;
										$all=1;
										$act='';
										foreach($activitylist as $record)
										{
								?>
								<?php 
										if($act != $record->activity AND $a != 1)
											{
												
								?>
								<tr>
								<form role="form" id="add_iden_jsa" action="<?php echo base_url() ?>add_iden_jsa" method="post" role="form">
									<td></td>
									<td>
										
									</td>
									<td>
										<table class="table table-hover">
											<tr>
												<td width="5%"><?php echo $a; ?></td>
												<td width="95%"><textarea type="text" cols="35" name="risk" rows="3"></textarea></td>
											</tr>
										</table>
									</td>
									<td>
										<table class="table table-hover">
											<tr>
												<td width="5%"><?php echo $a; ?></td>
												<td width="95%"><textarea type="text" cols="35" name="control" rows="3"></textarea></td>
											</tr>
										</table>
									</td>
									<td class="text-center">
										<input type="hidden" name="jsa_id" value="<?php echo $no;?>">
										<input type="hidden" class="no" value="<?php echo $record->jsa_id?>">
										<input type="submit" class="btn btn-success btn-sm" value="Add">
									</td>
								</form>
								</tr>
								<?php $a = 1; } ?>
								
								
								
								<tr>
									<td width="5%" class="text-center">
										<?php if($act != $record->activity){$no++; echo $no; } ?>
									</td>
									<td width="30%">
										<?php
											if($act != $record->activity){
												echo $record->activity;
											}
										?>
									</td>
									<td width="30%">
										<table class="table table-hover">
											<tr>
												<td width="5%"><?php echo $a; ?></td>
												<td width="95%"><?php echo $record->risk ?></td>
											</tr>
										</table>
									</td>
									<td width="30%">
										<table class="table table-hover">
											<tr>
												<td width="5%"><?php echo $a; ?></td>
												<td width="95%"><?php echo $record->control ?></td>
											</tr>
										</table>
									</td>
									<td width="5%" class="text-center">
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $record->id;?>"><i class="fa fa-pencil"></i></button>
<div class="modal modal-default fade" id="edit<?php echo $record->id;?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Ubah Identifikasi Bahaya</h4>
			</div>
			<div class="modal-body">
				<form role="form" id="edit_act" action="<?php echo base_url() ?>edit_act" method="post" role="form">
					<label class="pull-left">Aktifitas:</label>
					<textarea type="text" name="activity" rows="4" class="form-control" required><?php echo $record->activity; ?></textarea>
					<label class="pull-left">Bahaya:</label>
					<textarea type="text" name="risk" rows="4" class="form-control" required><?php echo $record->risk; ?></textarea>
					<label class="pull-left">Pengendalian:</label>
					<textarea type="text" name="control" rows="4" class="form-control" required><?php echo $record->control; ?></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
				<input type="hidden" name="id" value="<?php echo $record->id; ?>">
				<input type="hidden" name="jsa_id" value="<?php echo $record->jsa_id; ?>">
				<input type="submit" class="btn btn-primary" value="UBAH">
				</form>
			</div>
		</div>
	</div>
</div>
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $record->id;?>"><i class="fa fa-trash"></i></button>
<div class="modal modal-danger fade" id="delete<?php echo $record->id;?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus Identifikasi Bahaya</h4>
			</div>
			<div class="modal-body">
				<p>Data akan dihapus&hellip; ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
				<a href="<?php echo base_url()?>del_act/<?php  echo $record->id ?>/<?php  echo $record->jsa_id ?>" class="btn btn-outline " title="Delete">HAPUS <i class="fa fa-trash"></i></a>
			</div>
		</div>
	</div>
</div>
									</td>
								</tr>
								
								
								<?php
									$act = $record->activity;
									if(!empty($activitynum)){
										if($activitynum == $all){
											$a++;
								?>
								<tr>
								<form role="form" id="add_act_jsa" action="<?php echo base_url() ?>add_act_jsa" method="post" role="form">
									<td></td>
									<td>
										
									</td>
									<td>
										<table class="table table-hover">
											<tr>
												<td width="5%"><?php echo $a; ?></td>
												<td width="95%"><textarea type="text" cols="35" name="risk" rows="3"></textarea></td>
											</tr>
										</table>
									</td>
									<td>
										<table class="table table-hover">
											<tr>
												<td width="5%"><?php echo $a; ?></td>
												<td width="95%"><textarea type="text" cols="35" name="control" rows="3"></textarea></td>
											</tr>
										</table>
									</td>
									<td class="text-center">
										<input type="hidden" name="no" value="<?php echo $no; ?>">
										<input type="hidden" name="activity" value="<?php echo $record->activity ?>">
										<input type="hidden" name="jsa_id" value="<?php echo $record->jsa_id ?>">
										<input type="submit" class="btn btn-success btn-sm" value="Add">
									</td>
								</form>
								</tr>
								
									<?php
										}
									}
									$a++;
									$all++;
									}
								}
								?>
								<tr>
								<form role="form" id="add_act_jsa2" action="<?php echo base_url() ?>add_act_jsa" method="post" role="form">
									<td>
										
									</td>
									<td width="100">
										<textarea type="text" name="activity" rows="4" cols="35" required></textarea>
									</td>
									<td width="100">
										<textarea type="text" cols="35" name="risk" rows="4" required></textarea>
									</td>
									<td width="100">
										<textarea type="text" cols="35" name="control" rows="4" required></textarea>
									</td>
									<td class="text-center">
										<input type="hidden" name="no" value="<?php $no++; echo $no; ?>">
										<input type="hidden" name="jsa_id" value="<?php echo $jsa->id ?>">
										<input type="submit" class="btn btn-success btn-sm" value="Tambah Aktifitas">
									</td>
								</tr>
								</form>
								
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>edit/<?php echo $jsa->id;?>" class="btn btn-primary pull-left">BACK</a>
						<?php if(!empty($activitylist)){?>
						<a href="<?php echo base_url(); ?>worker/<?php echo $jsa->id?>" class="btn btn-success pull-right">NEXT (3/5)</a>
						<?php } ?>
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
                $("#func").select2({
                    placeholder: "Please Select"
                });
 
            });
			
</script>
