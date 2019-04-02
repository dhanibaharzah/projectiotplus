<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-warning"></i> Skipped PM
		</h1>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-12">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>pmskipped" method="POST" id="searchList">
									<div class="col-md-2 form-group">
										<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control input-sm datepicker" placeholder="From Date"/>
									</div>
									<div class="col-md-2 form-group">
										<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control input-sm datepicker" placeholder="To Date"/>
									</div>
									<div class="col-md-8 form-group">
										<div class="input-group">
											<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" placeholder="Search"/>
											<div class="input-group-btn">
												<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
											</div>
										</div>
									</div>
								</form>
								<small>Found <?php echo $total; ?> data(s)</small>
								</div>
							</div>
						</div>	
					</div>
				
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th class="text-center">Time</th>
								<th class="text-center">tag</th>
								<th class="text-center">type</th>
								<th class="text-center">code</th>
								<th class="text-center">EQ name</th>
								<th class="text-center">PIC</th>
							</tr>
						<?php
							if(!empty($pmskipped)){
								foreach($pmskipped as $record){
						?>
							<tr>
								<td class="text-center"><?php echo date('d-m-Y', $record->unixtime) ?></td>
								<td class="text-center">
									<?php if($record->tag == 1){echo '<span class="label label-warning">EL</span>';} ?>
									<?php if($record->tag == 2){echo '<span class="label label-primary">ME</span>';} ?>
									<?php if($record->tag == 3){echo '<span class="label label-success">PD</span>';} ?>
								</td>
								<td class="text-center">
									<?php if($record->type == 1){echo '<span class="label label-success">W</span>';} ?>
									<?php if($record->type == 2){echo '<span class="label label-danger">M</span>';} ?>
								</td>
								<td class="text-center"><?php echo $record->code ?></td>
								<td class="text-center"><?php echo $record->eq_name ?></td>
								<td class="text-center"><?php echo $record->pic ?></td>
							</tr>
						<?php
								}
							}
						?>
						</table>
					</div>
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-10"><div id="testbox"></div></div>
					<div class="col-md-1"></div>					
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
			jQuery("#searchList").attr("action", baseURL + "pmskipped/" + value);
			jQuery("#searchList").submit();
		});
	});
	jQuery('.datepicker').datepicker({
		autoclose: true,
		format : "dd-mm-yyyy"
	});
</script>
