<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><i class="fa fa-calendar"></i> <?php if(!empty($time)){ $at = date('D d M Y', $time);echo 'Permit: '.$at;}else{echo 'Ongoing Permit';} ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>today_jsa" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText ; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList">Search <i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped table-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">QR</th>
									<th class="text-center">Detail</th>
									<th class="text-center">Pekerja</th>
									<th class="text-center">Permit</th>
									<th class="text-center">Approval</th>
									<?php if(!empty($time)){ ?>
									<th class="text-center">Action</th>
									<?php } ?>
								</tr>
								<?php
									if(!empty($today_jsa))
									{	$a=1;
										$box = 1;
										$box1 = 0; $box2 = 0; $box3 = 0; $box4 = 0; $box5 = 0; $box6 = 0; $box7 = 0; $box8 = 0; $box9 = 0; $box10 = 0;			
										foreach($today_jsa as $record)
										{
								?>
								<tr>
									<td class="text-center"><?php echo $a ?></td>
									<td class="text-center"><img src="<?php echo base_url()?>qrcode_hse/<?php echo $record->id; ?>" style="height:100px"/></td>
									<td>
										<b>Disetujui : </b><?php echo $record->timestamp; ?><br>
										<b>Tanggal : </b><?php echo $record->start_date; ?><br>
										<b>Jam : </b><?php echo $record->start_hour.':00 s/d '.$record->end_hour.':00'; ?><br>
										<b>Nama Pekerjaan : </b><?php echo $record->job_name ?><br>
										<b>Area : </b><?php echo $record->area ?>
									</td>
									<td>
										<b>Supervisor : </b><?php echo $record->supervisor ?><br>
										<b>Supervisor HP : </b><?php echo $record->supervisor_hp ?><br>
										<b>Perusahaan : </b><?php echo $record->company_name ?><br>
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
										$box++;
										?>">
									Calculating ... </span>
									</td>
									<td class="text-center">
										<?php if($record->panas == 7){echo '<span class="label label-danger">Hot Work</span>';}?><br>
										<?php if($record->tinggi == 7){echo '<span class="label bg-purple">At High</span>';}?><br>
										<?php if($record->terbatas == 7){echo '<span class="label label-success">Confined Space</span>';}?><br>
										<?php if($record->penggalian == 7){echo '<span class="label label-info">Digging</span>';}?><br>
										<?php if($record->listrik == 7){echo '<span class="label label-warning">Electrical</span>';}?><br>
										<?php if($record->general == 7){echo '<span class="label label-primary">General</span>';}?>
									</td>
									<td class="text-center">
										<b>User : </b><?php echo $record->user; ?><br>
										<b>Checker : </b><?php echo $record->check; ?><br>
										<b>PIC Area : </b><?php echo $record->pic; ?><br>
										<b>Safety Officer : </b><?php echo $record->sd; ?><br>
										<b>Manager : </b><?php echo $record->manager; ?>
									</td>
									<?php if(empty($time)){ ?>
									<td class="text-center">
										<a href="<?php echo base_url(); ?>monitor/<?php echo $record->id;?>" class="btn btn-primary btn-sm btn-block" target="_blank">Monitor/Close <i class="fa fa-check"></i></a>
										<br>
										<?php if($record->terbatas == 7 AND ($record->pic == $name OR $record->sd == $name)){ ?>
											<a href="<?php echo base_url(); ?>gas_s/<?php echo $record->id;?>" class="btn btn-warning btn-sm btn-block" target="_blank">Cek Gas <i class="fa fa-check"></i></a>
											<br>
										<?php } ?>
										<?php if(($record->terbatas == 7 OR $record->tinggi == 7) AND ($record->user == $name OR $record->check == $name OR $record->pic == $name OR $record->sd == $name)){ ?>
											<a href="<?php echo base_url(); ?>blood/<?php echo $record->id;?>" class="btn btn-danger btn-sm" target="_blank">Cek Tensi <i class="fa fa-check"></i></a>
											<br>
										<?php } ?>
											<br>
										<a href="<?php echo base_url(); ?>report_list/<?php echo $record->id;?>" class="btn btn-success btn-sm btn-block">Report List <i class="fa fa-list"></i></a>
									
									</td>
									<?php } ?>
								</tr>
								<?php
									$a++;
									}
								}
								?>
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div><!-- /.box -->
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
            jQuery("#searchList").attr("action", baseURL + "today_jsa/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
	$(window).on('load', function() {
	<?php if($box1 != 0){?>
		$('#wbox1').load('<?php echo base_url(); ?>workerbox/<?php echo $box1; ?>')
	<?php } ?>
    <?php if($box2 != 0){?>
		$('#wbox2').load('<?php echo base_url(); ?>workerbox/<?php echo $box2; ?>')
	<?php } ?>
    <?php if($box3 != 0){?>
		$('#wbox3').load('<?php echo base_url(); ?>workerbox/<?php echo $box3; ?>')
	<?php } ?>
    <?php if($box4 != 0){?>
		$('#wbox4').load('<?php echo base_url(); ?>workerbox/<?php echo $box4; ?>')
	<?php } ?>
    <?php if($box5 != 0){?>
		$('#wbox5').load('<?php echo base_url(); ?>workerbox/<?php echo $box5; ?>')
	<?php } ?>
    <?php if($box6 != 0){?>
		$('#wbox6').load('<?php echo base_url(); ?>workerbox/<?php echo $box6; ?>')
	<?php } ?>
    <?php if($box7 != 0){?>
		$('#wbox7').load('<?php echo base_url(); ?>workerbox/<?php echo $box7; ?>')
	<?php } ?>
    <?php if($box8 != 0){?>
		$('#wbox8').load('<?php echo base_url(); ?>workerbox/<?php echo $box8; ?>')
	<?php } ?>
    <?php if($box9 != 0){?>
		$('#wbox9').load('<?php echo base_url(); ?>workerbox/<?php echo $box9; ?>')
	<?php } ?>
    <?php if($box10 != 0){?>
		$('#wbox10').load('<?php echo base_url(); ?>workerbox/<?php echo $box10; ?>')
	<?php } ?>
	});
</script>
