<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><i class="fa fa-warning"></i> Report List <small><?php echo $jsa->job_name; ?></small></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
						<?php if($jsa->terbatas == 7 ){ ?>
							<table class="table table-hover table-striped table-bordered">
								<tr>
								  <th class="text-center"><b>No</b></th>
									<th><b>Waktu Pengecekan Gas</b></th>
									<th><b>Hasil Pengecekan gas</b></th>
									</tr>
								<?php
									if(!empty($report_list))
									{$x=1;
										foreach($report_list as $rec)
										{
								?>	
									<tr>
										<?php if($rec->gas1 == !NULL or $rec->gas1 == !NULL or $rec->gas2 == !NULL or $rec->gas3 == !NULL or $rec->gas4 == !NULL){?>
										<td width="5%" class="text-center"><?php echo $x; ?></td>
										<td><?php echo $rec->timestamp; ?></td>
										<td>
												Gas CO:	<b><?php echo $rec->gas1; ?> ppm</b><br>
												Gas O2: <b><?php echo $rec->gas2; ?> %</b><br>
												Gas LEL: <b><?php echo $rec->gas3; ?> ppm</b><br>
												Gas H2S: <b><?php echo $rec->gas4; ?> %</b><br>
										</td>
										<?php }else{echo ' ';} ?>
								</tr>
						<?php
									$x++;
									}
								}else{ ?>
									<tr><td class="text-center" colspan="4"> Belum ada laporan </td></tr>
								<?php }
							} ?>
							</table>	
							<table class="table table-hover table-striped table-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Laporan</th>
									<th class="text-center">Gambar</th>
								</tr>
								<?php
									if(!empty($report_list))
									{$a=1;
										foreach($report_list as $record)
										{
								?>
								<tr>
								<?php if($record->report == !NULL or $record->correction == !NULL){?>
									<td width="5%" class="text-center"><?php echo $a ?></td>
									<td width="45%" >
										<b>Tgl : </b><?php echo $record->timestamp; ?><br>
										<b>User : </b><?php echo $record->user; ?><br>
										<b>Laporan : </b><?php echo $record->report; ?><br>
										<b>Koreksi : </b><?php echo $record->correction; ?><br>
									</td>
									<td width="50%" class="text-center">
										<?php if(empty($record->img_url)){ echo 'Tidak ada Gambar';}else{?>
										<img src="<?php echo base_url()?>assets/permit/<?php echo $record->img_url; ?>" width="100%"/>
										<?php }?>
									</td>
									<?php }else{echo ' ';} ?>	
								</tr>
								<?php
									$a++;
									}
								}else{ ?>
									<tr><td class="text-center" colspan="4"> Belum ada laporan </td></tr>
								<?php } ?>
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer clearfix">
						<a href="<?php echo base_url(); ?>today_jsa" class="btn btn-default btn-sm pull-left">Today Permit<i class="fa fa-arrow-left"></i></a>
						<a href="<?php echo base_url(); ?>closedjsa" class="btn btn-default btn-sm pull-left">Closed Permit<i class="fa fa-arrow-left"></i></a>
					</div>
					
				</div><!-- /.box -->
			</div>
		</div>
    </section>
</div>