<div class="content-wrapper">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> PM Form Progress
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">There are <?php echo $total; ?> form, Overall progress: <span id="prog"></span>/<?php echo $total; ?></h3>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Code</th>
								<th class="text-center">Machine Name</th>
								<th class="text-center">PIC</th>
								<th class="text-center">Check</th>
							</tr>
						<?php
							if(!empty($pmtoday)){
								$a = 1 + $page;
								foreach($pmtoday as $record){
						?>
							<tr>
								<td class="text-center"  width="5%"><?php echo $a; ?></td>
								<td class="text-center"  width="15%">
									<?php if($record->tag == 1 and $record->type == 1){ echo '<span class="label label-success">Electrical(W)</span>';}?>
									<?php if($record->tag == 1 and $record->type == 2){ echo '<span class="label label-warning">Electrical(M)</span>';}?>
									<?php if($record->tag == 2 and $record->type == 1){ echo '<span class="label label-primary">Mechanical(W)</span>';}?>
									<?php if($record->tag == 2 and $record->type == 2){ echo '<span class="label label-danger">Mechanical(M)</span>';}?>
									[<?php echo $record->code; ?>]
								</td>
								<td class="text-center" width="30%"><?php echo $record->eq_name; ?></td>
								<td class="text-center" width="40%">
									<div id="picarea<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#picarea<?php echo $a;?>').load('<?php echo base_url();?>picarea/<?php echo $record->area.'/'.$record->tag.'/'.$record->id; ?>');
										});
									</script>
								</td>
								<td class="text-center" width="10%">
									<div id="resultof<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#resultof<?php echo $a;?>').load('<?php echo base_url();?>resultof/<?php echo $record->code.'/'.$record->tag.'/'.$record->type; ?>');
										});
									</script>
								</td>
							</tr>
						<?php		$a++;
								}
							}
						?>
						</table>
					</div>
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	$(window).on('load', function(){
		$('#prog').load('<?php echo base_url();?>pmprogcount');
	});
	
</script>
