<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="<?php echo base_url().'alldev';?>" class="btn btn-sm btn-primary">Back to All Device</a> | <a href="<?php echo base_url().'workshopdev';?>" class="btn btn-sm btn-default">Back to Workshop</a>
			<i class="fa fa-history"></i> History Log of [<?php echo $code; ?>]
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Specification of [<?php echo $code; ?>]
						</div>
					</div>
					<?php echo $form; ?>
				</div>
			</div>
		</div>
		<?php
			$a1 = 1;
			$a2 = 1;
			$a3 = 1;
			$a4 = 1;
			$xcode = str_replace(' ', '-', $code);
		?>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Posisition Log
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Timestamp</th>
								<th class="text-center">Pos/Usage</th>
								<th class="text-center">Note</th>
								<th class="text-center">PIC</th>
							</tr>
						<?php
							if(!empty($lastloc)){
								foreach($lastloc as $loc){
						?>
							<tr>
								<td class="text-center"><?php echo $a1; ?></td>
								<td class="text-center"><?php echo $loc->timestamp; ?></td>
								<td class="text-center"><?php echo $loc->posisi; ?> / <?php echo $loc->usage; ?></td>
								<td class="text-center"><?php echo $loc->note; ?></td>
								<td class="text-center"><?php echo $loc->pic; ?></td>
							</tr>
						<?php
									$a1++;
								}
							}
						?>
						</table>
					</div>
					<?php if($a1 >= 9){?>
					<div class="box-footer">
						<a href="<?php echo base_url().'hispos/'.$xcode; ?>" class="btn btn-sm btn-success pull-right"> Check more data</a>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							PM Log
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Timestamp</th>
								<th class="text-center">Parameter</th>
								<th class="text-center">Value</th>
								<th class="text-center">PIC</th>
							</tr>
						<?php
							if(!empty($lastparam)){
								foreach($lastparam as $par){
						?>
							<tr>
								<td class="text-center"><?php echo $a2; ?></td>
								<td class="text-center"><?php echo $par->timestamp; ?></td>
								<td class="text-center"><?php echo $par->param; ?></td>
								<td class="text-center"><?php echo $par->in_value; ?></td>
								<td class="text-center"><?php echo $par->pic; ?></td>
							</tr>
						<?php
									$a2++;
								}
							}
						?>
						</table>
					</div>
					<?php if($a2 >= 9){?>
					<div class="box-footer">
						<a href="<?php echo base_url().'hispar/'.$xcode; ?>" class="btn btn-sm btn-success pull-right"> Check more data</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Maintenance Log
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Timestamp</th>
								<th class="text-center">Activity</th>
								<th class="text-center">Note</th>
								<th class="text-center">PIC</th>
							</tr>
						<?php
							if(!empty($lastmainten)){
								foreach($lastmainten as $man){
						?>
							<tr>
								<td class="text-center"><?php echo $a3; ?></td>
								<td class="text-center"><?php echo $man->timestamp; ?></td>
								<td class="text-center"><?php echo $man->partname; ?></td>
								<td class="text-center"><?php echo $man->note; ?></td>
								<td class="text-center"><?php echo $man->pic; ?></td>
							</tr>
						<?php
									$a3++;
								}
							}
						?>
						</table>
					</div>
					<?php if($a3 >= 9){?>
					<div class="box-footer">
						<a href="<?php echo base_url().'hisman/'.$xcode; ?>" class="btn btn-sm btn-success pull-right"> Check more data</a>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Performance Test Log
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Timestamp</th>
								<th class="text-center">Title</th>
								<th class="text-center">PIC</th>
								<th class="text-center">Act</th>
							</tr>
						<?php
							if(!empty($lasttest)){
								foreach($lasttest as $tes){
						?>
							<tr id="<?php echo $tes->id; ?>">
								<td class="text-center"><?php echo $a4; ?></td>
								<td class="text-center"><?php echo $tes->timestamp; ?></td>
								<td class="text-center"><?php echo $tes->test_title; ?></td>
								<td class="text-center"><?php echo $tes->pic; ?></td>
								<td class="text-center">
									<input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $tes->id; ?>"/>
								</td>
							</tr>
						<?php
									$a4++;
								}
							}
						?>
						</table>
					</div>
					<?php if($a4 >= 9){?>
					<div class="box-footer">
						<a href="<?php echo base_url().'histes/'.$xcode; ?>" class="btn btn-sm btn-success pull-right"> Check more data</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div id="testbox"></div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#testbox').load('<?php echo base_url();?>viewtestresult/' + trid);
	});
</script>
