<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-refresh"></i> Cycletime Log, <small>Slowspeed: <?php echo $sl; ?>, Downtime: <?php echo $dt; ?></small> 
		</h1>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>ctlog" method="POST" id="searchList">
									<div class="col-md-5 form-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
									</div>
									<div class="col-md-1 form-group">
										<input for="mindata" autocomplete="off" type="number" name="mindata" value="<?php echo $mindata; ?>" class="form-control input-sm" placeholder="Min"/>
									</div>
									<div class="col-md-1 form-group">
										<input for="maxdata" autocomplete="off" type="number" name="maxdata" value="<?php echo $maxdata; ?>" class="form-control input-sm" placeholder="Max"/>
									</div>
									<div class="col-md-2 form-group">
										<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control input-sm datepicker" placeholder="From Date"/>
									</div>
									<div class="col-md-2 form-group">
										<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control input-sm datepicker" placeholder="To Date"/>
									</div>
									<div class="col-md-1 form-group">
										<button class="btn btn-sm btn-primary btn-block searchList"><i class="fa fa-search"></i></button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Timestamp</th>
								<th class="text-center" style="border: 1px solid black;">Duration</th>
								<th class="text-center" style="border: 1px solid black;">Note
									<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#set"><i class="fa fa-wrench"></i></button>
									<div class="modal modal-default fade" id="set">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>setctnote" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Slowspeed(second):</label>
													<input type="number" name="slowspeed" value="<?php echo $sl; ?>" class="form-control input-sm"  placeholder="Slowspeed"/>
													<label class="pull-left">Downtime(second):</label>
													<input type="number" name="downtime" value="<?php echo $dt; ?>" class="form-control input-sm"  placeholder="Downtime"/>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</th>
								<th class="text-center" style="border: 1px solid black;">Foreman Report</th>
							</tr>
						<?php
							if(!empty($ctlog)){
								$a = 1 + $page;
								foreach($ctlog as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->timestamp; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo number_format(($record->mixing_ct_tilting/60), 2, '.', ''); ?></td>
								<td class="text-center" style="border: 1px solid black;">
								<?php
									if($record->plan_stop == 0){
										if($record->mixing_ct_tilting < $sl){ echo '<span class="label label-success">Bagut</span>';}
										if($record->mixing_ct_tilting > $sl and $record->mixing_ct_tilting < $dt){ echo '<span class="label label-warning">Slowspeed</span>';}
										if($record->mixing_ct_tilting > $dt){ echo '<span class="label label-danger">Tidak bagut</span>';}
									}else{
										echo '<span class="label label-success">Planned Stop</span>';
									}
								?>
								</td>
								<td class="text-center" style="border: 1px solid black;">
									<?php echo $record->keterangan; ?>
									<div id="notes<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#notes<?php echo $a;?>').load('<?php echo base_url();?>getdetailed/<?php echo date('U', strtotime($record->timestamp)).'/'.$record->interrupt; ?>');
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
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e){
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "ctlog/" + value);
			jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
	});
</script>
