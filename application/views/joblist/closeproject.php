<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-check"></i> Close Project Job <small>Show requested project from PIC</small>
		</h1>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
					<small>Found <?php echo $total; ?> data(s)</small>
				<div class="box">
					<div class="box-header">
						<div class="box-title">
							Logged user: <?php echo $name; ?>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Time</th>
								<th class="text-center">Job Detail(s)</th>
								<th class="text-center">Tool(s) & Part(s)</th>
								<th class="text-center">PIC(s)</th>
							</tr>
						<?php
							if(!empty($closeproject)){
								$a = 1;
								foreach($closeproject as $record){
						?>
							<tr>
								<td class="text-center" rowspan="2"><?php echo $a; ?></td>
								<td class="text-center"><?php echo date('H:i', ($record->start-25200)).' - '.date('H:i', ($record->end-25200)); ?></td>
								<td>
									<?php if($record->closed == 1){ echo '<span class="label label-success">CLOSED</span>';}?>
									<?php if($record->closed == 0){ echo '<span class="label label-danger">Inprogress</span>';}?>
									<?php if($record->closed == 2){ echo '<span class="label label-warning">Waiting Owner..</span>';}?>
									<?php echo '<b>'.$record->job_title.' </b>'; ?><br>
									<?php echo nl2br($record->job_desc); ?><br>
								</td>
								<td><div id="tool<?php echo $a;?>"></div><div id="part<?php echo $a;?>"></div></td>
								<td class="text-center"><div id="pic<?php echo $a;?>"></div></td>
							</tr>
							<tr>
								<td class="text-center" colspan="4">
									<a href="<?php echo base_url(); ?>reportinfo/<?php echo $record->id; ?>" class="btn btn-success"><i class="fa fa-search"></i> View <span id="rep<?php echo $a; ?>"></span> Report(s)</a>
									<a href="<?php echo base_url(); ?>report/<?php echo $record->id; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-sign-in"></i> Submit Report</a>
									<?php if($record->closed == 2){?>
									<a href="<?php echo base_url(); ?>close/<?php echo $record->id; ?>" class="btn btn-warning" target="_blank"><i class="fa fa-check"></i> Close Job</a>
									<?php } ?>
									<script type="text/javascript">
									$(window).on('load', function(){
										$('#part<?php echo $a;?>').load('<?php echo base_url();?>partlist/<?php echo $record->project_id; ?>');
										$('#tool<?php echo $a;?>').load('<?php echo base_url();?>toollist/<?php echo $record->project_id; ?>');
										$('#pic<?php echo $a;?>').load('<?php echo base_url();?>piclist/<?php echo $record->id; ?>');
										$('#rep<?php echo $a;?>').load('<?php echo base_url();?>replist/<?php echo $record->id; ?>');
									});
								</script>
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
