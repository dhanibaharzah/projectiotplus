<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> My PM Job, LINE Get: <b>mypm</b> & <b>mypm2</b><small>Show PM today, with logged user as PIC</small>
		</h1>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="box-title">
							<b>Logged user: <?php echo $user; ?></b>
							<br>
							<br>
							<small>Found <?php echo $total; ?> data(s)</small>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Time</th>
								<th class="text-center">Job Detail(s)</th>
								<th class="text-center">Tool(s) & Part(s)</th>
								<th class="text-center">Doc(s)</th>
							</tr>
						<?php
							if(!empty($mypm)){
								$a = 1;
								foreach($mypm as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $a; ?></td>
								<td class="text-center"><?php echo date('d-m-Y', ($record->next)); ?></td>
								<td>
									<?php echo '<b>'.$record->job_title.' </b>'; ?><br>
									<?php echo nl2br($record->job_desc); ?><br>
								</td>
								<td><div id="tool<?php echo $a;?>"></div><div id="part<?php echo $a;?>"></div></td>
								<td class="text-center"><div id="doc<?php echo $a;?>"></div></td>
								<script type="text/javascript">
									$(window).on('load', function(){
										$('#part<?php echo $a;?>').load('<?php echo base_url();?>partlist/<?php echo $record->id; ?>');
										$('#tool<?php echo $a;?>').load('<?php echo base_url();?>toollist/<?php echo $record->id; ?>');
										$('#doc<?php echo $a;?>').load('<?php echo base_url();?>pmformlist/<?php echo $record->id; ?>');
									});
								</script>
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
