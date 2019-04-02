<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Result
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-8">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>pmresult" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search by username or machine name or machine code"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
									</form>
									<small>Found <?php echo $total; ?> data(s)</small>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">Code</th>
								<th class="text-center">Last Record</th>
								<th class="text-center">Last User</th>
								<th class="text-center">Machine name</th>
								<th class="text-center">Status</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($pmresult)){
								foreach($pmresult as $record){
						?>
							<tr>
								<td class="text-center">
									<?php if($record->tag == 1){echo '<span class="label label-warning">Electrical</span>';}?>
									<?php if($record->tag == 2){echo '<span class="label label-primary">Mechanical</span>';}?>
									<?php if($record->freq == 1){echo '<span class="label label-info">Weekly</span>';}?>
									<?php if($record->freq == 2){echo '<span class="label label-danger">Monthly</span>';}?>
									<?php echo '<b>'.$record->code.'</b>';?>
								</td>
								<td class="text-center"><?php echo $record->timestamp;?></td>
								<td class="text-center"><?php echo $record->user;?></td>
								<td class="text-center"><?php echo $record->eq_name;?></td>
								<td class="text-center">
									<?php
										if($record->app == 0){echo '<span class="label label-warning">Waiting Approval</span>';}
										if($record->app == 2){echo '<span class="label label-danger">Rejected</span>';}
										if($record->app == 1){echo '<span class="label label-success">Approved</span>';}
										if($record->app == 3){echo '<span class="label label-danger">Abnormality</span>';}
									?>
								</td>
								<td class="text-center"><a href="<?php echo base_url().'showresult/0/'.$record->code.'/'.$record->tag.'/'.$record->freq; ?>" class="btn btn-sm btn-primary"><i class="fa fa-history"></i> History</a></td>
							</tr>
						<?php }}?>
						</table>
					</div>
					<div class="box-footer clearfix">
							<?php echo $this->pagination->create_links(); ?>
						</div>
				</div>
			</div>
		</div>
	</section>
</div><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "pmresult/" + value);
			jQuery("#searchList").submit();
        });
	});
</script>
