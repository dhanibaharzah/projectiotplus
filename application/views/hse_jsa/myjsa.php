<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> My Permit
        <small>Created by, <?php echo $user; ?></small>
      </h1>
    </section>
    
    <section class="content">
		<div class="col-lg-12 col-xs-12">
			<div class="row">
				<div class="box box-danger">
					<div class="box-tools">
						<form action="<?php echo base_url() ?>myjsa" method="POST" id="searchList">
							<div class="input-group">
								<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
								<div class="input-group-btn">
									<button class="btn btn-sm btn-success searchList">Search <i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
			if(!empty($JSAlist)){
				$box = 1;
				$box1 = 0; $box2 = 0; $box3 = 0; $box4 = 0; $box5 = 0; $box6 = 0; $box7 = 0; $box8 = 0; $box9 = 0; $box10 = 0;
				foreach($JSAlist as $record){
		?>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
					<div class="row">
						<div class="col-md-9 col-xs-9">
							<h4><strong><?php if($record->rejected == 1){echo '<span class="label label-danger">Rejected!</span>';}?><?php echo $record->job_name; ?></strong></h4><br>
						</div>
						<div class="col-md-3 col-xs-3 pull-right ">
						<?php if($record->saved == 0){?>
							<button type="button" class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target="#delete<?php echo $record->id;?>"><i class="fa fa-trash"></i></button>
						<?php } ?>
							<div class="modal modal-danger fade" id="delete<?php echo $record->id;?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<form role="form" id="delete_jsa" action="<?php echo base_url() ?>delete_jsa" method="post" role="form">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Hapus Ijin Kerja</h4>
										</div>
										<div class="modal-body">
											<p>Seluruh Ijin kerja pada JSA ini akan dihapus. Anda Yakin&hellip; ?</p>
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
							<a href="<?php echo base_url(); ?>view/<?php echo $record->id;?>" class="btn btn-info pull-right btn-sm">View <i class="fa fa-search"></i></a>
							<?php if($record->saved == 0){ ?>
							<a href="<?php echo base_url(); ?>edit/<?php echo $record->id;?>" class="btn btn-primary pull-right btn-sm">Edit <i class="fa fa-pencil"></i></a>
							<?php }?>
							<?php $req_gen = 0; $ok =0; if($record->panas == 2 AND $record->tinggi == 2 AND $record->terbatas == 2 AND $record->penggalian == 2 AND $record->listrik == 2){$req_gen = 1;}?>
							<?php if((($record->panas == 2 OR $record->panas == 7) AND ($record->tinggi == 2 OR $record->tinggi == 7) AND ($record->terbatas == 2 OR $record->terbatas == 7) AND ($record->penggalian == 2 OR $record->penggalian == 7) AND ($record->listrik == 2 OR $record->listrik == 7)) AND $req_gen == 0 OR ($req_gen == 1 AND $record->general == 7)){ $ok=1;?>
							<a href="<?php echo base_url(); ?>printx/<?php echo $record->id;?>" class="btn btn-primary pull-right btn-sm" target="_blank">Print <i class="fa fa-print"></i></a>
							<?php } ?>
							<?php if($ok != 1 AND $record->saved == 1){ ?>
							<button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#cancel<?php echo $record->id;?>">Cancel <i class="fa fa-mail-reply"></i></button>

								<div class="modal modal-warning fade" id="cancel<?php echo $record->id;?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<form role="form" id="delete_job" action="<?php echo base_url() ?>cancel_jsa" method="post" role="form">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">Batalkan Ijin Kerja</h4>
											</div>
											<div class="modal-body">
												<p>Seluruh Ijin kerja pada JSA ini akan dikembalikan ke mode 'Editing', anda harus mengulangi proses approval dari awal kembali. Anda Yakin&hellip; ?</p>
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
							<?php } ?>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 col-xs-12">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<b>Date: </b><?php echo $record->start_date; ?><br>
									<b>Time: </b><?php echo $record->start_hour.':00 s/d '.$record->end_hour.':00'; ?><br>
									<b>Nama Perusahaan: </b><?php echo $record->company_name; ?>
								</div>
								<div class="col-md-6 col-xs-12">
									<b>Supervisor/Pengawas: </b><?php echo $record->supervisor; ?><br>
									<b>Supervisor HP: </b><?php echo $record->supervisor_hp; ?><br>
									<b>Area: </b><?php echo $record->area ?><br>
									<b>Jumlah Pekerja: </b><span id="wbox<?php echo $box;
										if($box == 1){$box1 = $record->id;}
										if($box == 2){$box2 = $record->id;}
										if($box == 3){$box3 = $record->id;}
										if($box == 4){$box4 = $record->id;}
										if($box == 5){$box5 = $record->id;}
										if($box == 6){$box6 = $record->id;}
										if($box == 7){$box7 = $record->id;}
										if($box == 8){$box8 = $record->id;}
										if($box == 9){$box9 = $record->id;}
										if($box == 10){$box10 = $record->id;}
										?>">
									Calculating ... </span>
								</div>
								<div class="col-md-12 col-xs-12">
									<b>Description: </b><?php echo $record->description; ?><br>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<?php if($record->panas == 2 and $record->tinggi == 2 and $record->terbatas == 2 and $record->penggalian == 2 and $record->listrik == 2 and $record->general == 2){ ?>
							<div class="row">
								<div class="col-md-12 col-xs-12">
									<div class="alert alert-danger alert-dismissible">JSA ini masih dalam proses 'Editing', Lanjutkan dengan menekan tombol 'Edit' diatas dan pastikan Anda mengikuti setiap langkah hingga menekan tombol 'Submit' pada langkah 5/5</div>
								</div>
							</div>
							<?php } ?>
						<h5 class="text-center"><b>Document Check:</b></h5>
							<div class="row">
								<div class="col-md-12 col-xs-12">
								<?php if($record->panas != 2 and (!empty($record->panas))){ ?>
									<a href="<?php echo base_url()?>permit/1/<?php echo $record->id?>" class="btn-sm btn btn-block btn-danger">Hot Work <span class="label label-default"><?php 
										if($record->panas == 1){ echo '(Rejected)';}
										if($record->panas == 3){ echo '(Submited)';}
										if($record->panas == 4){ echo '(Checked)';}
										if($record->panas == 5){ echo '(Approved by PIC)';}
										if($record->panas == 6){ echo '(Approved by SD)';}
										if($record->panas == 7){ echo '(Approved!)';}
										}?>
									</span></a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-xs-12">
								<?php if($record->tinggi != 2 and (!empty($record->tinggi))){ ?>
									<a href="<?php echo base_url()?>permit/2/<?php echo $record->id?>" class="btn-sm btn btn-block btn-info">At High <span class="label label-default"><?php 
										if($record->tinggi == 1){ echo '(Rejected)';}
										if($record->tinggi == 3){ echo '(Submited)';}
										if($record->tinggi == 4){ echo '(Checked)';}
										if($record->tinggi == 5){ echo '(Approved by PIC)';}
										if($record->tinggi == 6){ echo '(Approved by SD)';}
										if($record->tinggi == 7){ echo '(Approved!)';}
										}?>
									</span></a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-xs-12">
								<?php if($record->terbatas != 2 and (!empty($record->terbatas))){ ?>
									<a href="<?php echo base_url()?>permit/3/<?php echo $record->id?>" class="btn-sm btn btn-block btn-success">Confined Space  <span <?php if($record->terbatas != 1){echo 'class="label label-default"';}else{echo 'class="label label-danger"';} ?> > <?php 
										if($record->terbatas == 1){ echo '(Rejected)';}
										if($record->terbatas == 3){ echo '(Submited)';}
										if($record->terbatas == 4){ echo '(Checked)';}
										if($record->terbatas == 5){ echo '(Approved by PIC)';}
										if($record->terbatas == 6){ echo '(Approved by SD)';}
										if($record->terbatas == 7){ echo '(Approved!)';}
										}?>
									</span></a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-xs-12">
								<?php if($record->penggalian != 2 and (!empty($record->penggalian))){ ?>
									<a href="<?php echo base_url()?>permit/4/<?php echo $record->id?>" class="btn-sm btn btn-block btn-primary">Digging <span class="label label-default"><?php 
										if($record->penggalian == 1){ echo '(Rejected)';}
										if($record->penggalian == 3){ echo '(Submited)';}
										if($record->penggalian == 4){ echo '(Checked)';}
										if($record->penggalian == 5){ echo '(Approved by PIC)';}
										if($record->penggalian == 6){ echo '(Approved by SD)';}
										if($record->penggalian == 7){ echo '(Approved!)';}
										}?>
									</span></a> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-xs-12">
								<?php if($record->listrik != 2 and (!empty($record->listrik))){ ?>
									<a href="<?php echo base_url()?>permit/5/<?php echo $record->id?>" class="btn-sm btn btn-block btn-warning">Electric <span class="label label-default"><?php 
										if($record->listrik == 1){ echo '(Rejected)';}
										if($record->listrik == 3){ echo '(Submited)';}
										if($record->listrik == 4){ echo '(Checked)';}
										if($record->listrik == 5){ echo '(Approved by PIC)';}
										if($record->listrik == 6){ echo '(Approved by SD)';}
										if($record->listrik == 7){ echo '(Approved!)';}
										}?>
									</span></a> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-xs-12">
								<?php if($record->general != 2 and (!empty($record->general))){ ?>
									<a href="<?php echo base_url()?>permit/6/<?php echo $record->id?>" class="btn-sm btn btn-block btn-info">General <span class="label label-default"><?php 
										if($record->general == 1){ echo '(Rejected)';}
										if($record->general == 3){ echo '(Submited)';}
										if($record->general == 4){ echo '(Checked)';}
										if($record->general == 5){ echo '(Approved by PIC)';}
										if($record->general == 6){ echo '(Approved by SD)';}
										if($record->general == 7){ echo '(Approved!)';}
										}?>
									</span></a> 
								</div>
							</div>
						</div>
						
					</div>
					</div>
					<div class="box-footer table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<div id="note<?php echo $box; $box++;?>"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php } }?>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
    
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "myjsa/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
	
	<?php if($box1 != 0){?>
		$('#box1').load('<?php echo base_url(); ?>box/<?php echo $box1; ?>');
		setInterval(function(){$('#box1').load('<?php echo base_url(); ?>box/<?php echo $box1; ?>');}, 2000)
	<?php } ?>
    <?php if($box2 != 0){?>
		$('#box2').load('<?php echo base_url(); ?>box/<?php echo $box2; ?>');
		setInterval(function(){$('#box2').load('<?php echo base_url(); ?>box/<?php echo $box2; ?>');}, 2000)
	<?php } ?>
    <?php if($box3 != 0){?>
		$('#box3').load('<?php echo base_url(); ?>box/<?php echo $box3; ?>');
		setInterval(function(){$('#box3').load('<?php echo base_url(); ?>box/<?php echo $box3; ?>');}, 2000)
	<?php } ?>
    <?php if($box4 != 0){?>
		$('#box4').load('<?php echo base_url(); ?>box/<?php echo $box4; ?>');
		setInterval(function(){$('#box4').load('<?php echo base_url(); ?>box/<?php echo $box4; ?>');}, 2000)
	<?php } ?>
    <?php if($box5 != 0){?>
		$('#box5').load('<?php echo base_url(); ?>box/<?php echo $box5; ?>');
		setInterval(function(){$('#box5').load('<?php echo base_url(); ?>box/<?php echo $box5; ?>');}, 2000)
	<?php } ?>
    <?php if($box6 != 0){?>
		$('#box6').load('<?php echo base_url(); ?>box/<?php echo $box6; ?>');
		setInterval(function(){$('#box6').load('<?php echo base_url(); ?>box/<?php echo $box6; ?>');}, 2000)
	<?php } ?>
    <?php if($box7 != 0){?>
		$('#box7').load('<?php echo base_url(); ?>box/<?php echo $box7; ?>');
		setInterval(function(){$('#box7').load('<?php echo base_url(); ?>box/<?php echo $box7; ?>');}, 2000)
	<?php } ?>
    <?php if($box8 != 0){?>
		$('#box8').load('<?php echo base_url(); ?>box/<?php echo $box8; ?>');
		setInterval(function(){$('#box8').load('<?php echo base_url(); ?>box/<?php echo $box8; ?>');}, 2000)
	<?php } ?>
    <?php if($box9 != 0){?>
		$('#box9').load('<?php echo base_url(); ?>box/<?php echo $box9; ?>');
		setInterval(function(){$('#box9').load('<?php echo base_url(); ?>box/<?php echo $box9; ?>');}, 2000)
	<?php } ?>
    <?php if($box10 != 0){?>
		$('#box10').load('<?php echo base_url(); ?>box/<?php echo $box10; ?>');
		setInterval(function(){$('#box10').load('<?php echo base_url(); ?>box/<?php echo $box10; ?>');}, 2000)
	<?php } ?>
	
	$(window).on('load', function() {
	<?php if($box1 != 0){?>
		$('#wbox1').load('<?php echo base_url(); ?>workerbox/<?php echo $box1; ?>')
		$('#note1').load('<?php echo base_url(); ?>notebox/<?php echo $box1; ?>')
	<?php } ?>
    <?php if($box2 != 0){?>
		$('#wbox2').load('<?php echo base_url(); ?>workerbox/<?php echo $box2; ?>')
		$('#note2').load('<?php echo base_url(); ?>notebox/<?php echo $box2; ?>')
	<?php } ?>
    <?php if($box3 != 0){?>
		$('#wbox3').load('<?php echo base_url(); ?>workerbox/<?php echo $box3; ?>')
		$('#note3').load('<?php echo base_url(); ?>notebox/<?php echo $box3; ?>')
	<?php } ?>
    <?php if($box4 != 0){?>
		$('#wbox4').load('<?php echo base_url(); ?>workerbox/<?php echo $box4; ?>')
		$('#note4').load('<?php echo base_url(); ?>notebox/<?php echo $box4; ?>')
	<?php } ?>
    <?php if($box5 != 0){?>
		$('#wbox5').load('<?php echo base_url(); ?>workerbox/<?php echo $box5; ?>')
		$('#note5').load('<?php echo base_url(); ?>notebox/<?php echo $box5; ?>')
	<?php } ?>
    <?php if($box6 != 0){?>
		$('#wbox6').load('<?php echo base_url(); ?>workerbox/<?php echo $box6; ?>')
		$('#note6').load('<?php echo base_url(); ?>notebox/<?php echo $box6; ?>')
	<?php } ?>
    <?php if($box7 != 0){?>
		$('#wbox7').load('<?php echo base_url(); ?>workerbox/<?php echo $box7; ?>')
		$('#note7').load('<?php echo base_url(); ?>notebox/<?php echo $box7; ?>')
	<?php } ?>
    <?php if($box8 != 0){?>
		$('#wbox8').load('<?php echo base_url(); ?>workerbox/<?php echo $box8; ?>')
		$('#note8').load('<?php echo base_url(); ?>notebox/<?php echo $box8; ?>')
	<?php } ?>
    <?php if($box9 != 0){?>
		$('#wbox9').load('<?php echo base_url(); ?>workerbox/<?php echo $box9; ?>')
		$('#note9').load('<?php echo base_url(); ?>notebox/<?php echo $box9; ?>')
	<?php } ?>
    <?php if($box10 != 0){?>
		$('#wbox10').load('<?php echo base_url(); ?>workerbox/<?php echo $box10; ?>')
		$('#note10').load('<?php echo base_url(); ?>notebox/<?php echo $box10; ?>')
	<?php } ?>
	});
</script>
