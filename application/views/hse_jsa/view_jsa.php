<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> JSA
      </h1>
    </section>
    
    <section class="content">
		<div class="row">
			<div class="col-lg-12 col-md-12 col xs-12">
				<div class="box box-danger">
					<div class="box-header text-center">
						<h4><strong><?php echo $JSAmain->job_name; ?></strong></h4>
					</div>
					<div class="box-body">
						<h4><strong>A. Detail Pekerjaan</strong></h4><br>
						<strong>Lokasi Pekerjaan : </strong><?php echo $JSAmain->area; ?><br>
						<strong>Periode Pekerjaan : </strong><?php echo $JSAmain->start_date; ?> <br>
						<strong>Waktu Pekerjaan : </strong><?php echo $JSAmain->start_hour; ?>:00 s/d <?php echo $JSAmain->end_hour; ?>:00 <br>
						<strong>Pemohon : </strong><?php echo $JSAmain->user; ?><br>
						<strong>Pimpinan : </strong><?php echo $JSAmain->supervisor; ?>, HP: <?php echo $JSAmain->supervisor_hp; ?> <br>
						<strong>Deskripsi Pekerjaan : </strong><?php echo $JSAmain->description; ?><br>
					</div>
					<div class="box-body table-responsive">
						<h4><strong>B. Identifikasi Bahaya</strong></h4><br>
						<table class="table table-hover table-striped taable-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th>Aktifitas/Langkah Kerja</th>
								<th>Potensi Bahaya</th>
								<th>Kontrol Bahaya</th>
							</tr>
							<?php
								$no =1;$a='';
								if(!empty($JSAiden)){
									foreach($JSAiden as $record){
							?>
							<tr>
								<td><?php if($a == $record->activity){ echo '';}else{ echo $no;} ?></td>
								<td><?php if($a == $record->activity){ echo '';}else{ echo $record->activity;$no++;} ?></td>
								<td><?php echo $record->risk; ?></td>
								<td><?php echo $record->control; ?></td>
							</tr>
							<?php  $a=$record->activity;} }?>
						</table>
					</div>
					<div class="box-body table-responsive">
						<h4><strong>C. Data Anggota Tim</strong></h4><br>
						<table class="table table-hover table-striped taable-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th>Nama</th>
								<th>Fungsi</th>
								<th>Tekanan Darah</th>
							</tr>
							<?php
								$no =1;
								if(!empty($JSAwork)){
									foreach($JSAwork as $record){
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $record->name; ?></td>
								<td><?php echo $record->func; ?></td>
								<td>
									<?php 
									if($record->sistol == 0){ echo '-';}
									else{echo $record->sistol;}	
									?>
									<?php echo '/';?>
									<?php 
									if($record->diastol == 0){ echo '-';}
									else{echo $record->diastol;}	
									?>
								</td>
							</tr>
							<?php $no++; } }?>
						</table>
					</div>
					<div class="box-body table-responsive">
						<div class="col-lg-6 col-md-6 col-xs-12">
							<h4><strong>D. Override</strong></h4><br>
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th>Nama</th>
								</tr>
								<?php
									$no =1;
									if(!empty($JSAoverride)){
										foreach($JSAoverride as $record){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $record->toolname; ?></td>
								</tr>
								<?php $no++; } }?>
							</table>
						</div>
						<div class="col-lg-6 col-md-6 col-xs-12">
							<h4><strong>E. Titik LOTO</strong></h4><br>
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th>Nama</th>
								</tr>
								<?php
									$no =1;
									if(!empty($JSAloto)){
										foreach($JSAloto as $record){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $record->toolname; ?></td>
								</tr>
								<?php $no++; } }?>
							</table>
						</div>
					</div>
					<div class="box-body table-responsive">
						<div class="col-lg-4 col-md-4 col-xs-12">
							<h4><strong>F. Alat Pelindung Diri</strong></h4><br>
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th>Nama</th>
								</tr>
								<?php
									$no =1;
									if(!empty($JSAapd)){
										foreach($JSAapd as $record){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $record->toolname; ?></td>
								</tr>
								<?php $no++; } }?>
							</table>
						</div>
						<div class="col-lg-4 col-md-4 col-xs-12">
							<h4><strong>G. Alat Kerja</strong></h4><br>
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th>Nama</th>
								</tr>
								<?php
									$no =1;
									if(!empty($JSAtool)){
										foreach($JSAtool as $record){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $record->toolname; ?></td>
								</tr>
								<?php $no++; } }?>
							</table>
						</div>
						<div class="col-lg-4 col-md-4 col-xs-12">
							<h4><strong>H. Sumber Energi</strong></h4><br>
							<table class="table table-hover table-striped table-bordered ">
								<tr>
									<th class="text-center">No</th>
									<th>Nama</th>
								</tr>
								<?php
									$no =1;
									if(!empty($JSAenergy)){
										foreach($JSAenergy as $record){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $record->toolname; ?></td>
								</tr>
								<?php $no++; } }?>
							</table>
						</div>
					</div>
					<?php if(!empty($report)){ ?>
					<div class="box-body table-responsive">
						<h4><strong>I. Report Monitor</strong></h4><br>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Waktu</th>
								<th class="text-center">Report</th>
								<th class="text-center">Correction</th>
							</tr>
						<?php
							if(!empty($report)){
								$a=1;
								foreach($report as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $a; ?></td>
								<td class="text-center"><?php echo $record->user; ?></td>
								<td class="text-center"><?php echo $record->timestamp; ?></td>
								<td class="text-center"><?php echo $record->report; ?></td>
								<td class="text-center"><?php echo $record->correction; ?></td>
							</tr>
							<?php $a++; }}?>
						</table>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
    
</div>
