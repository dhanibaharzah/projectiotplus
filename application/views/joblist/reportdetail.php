<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Project Report
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Report</th>
								<th class="text-center">Image</th>
							</tr>
						<?php
							if(!empty($reportdetail)){
								$a = 1;
								foreach($reportdetail as $record){
						?>
							<tr>
								<td><?php echo $a; ?></td>
								<td width="48%">
									<?php echo $record->report; ?><br>
									<?php echo $record->user; ?>
								</td>
								<td width="48%">
									<img src="<?php echo base_url(); ?>assets/report/<?php echo $record->img_url; ?>" width="100%">
									</td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>