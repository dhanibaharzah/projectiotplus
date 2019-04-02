<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-check"></i> Abnormality PM
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
									<form action="<?php echo base_url() ?>pmsheet_app" method="POST" id="searchList">
									<select class="form-control" name="tagging">
										<option value=""> Show All</option>
										<option value="1" <?php if($tagging == 1){ echo 'selected';}?>> Electrical</option>
										<option value="2" <?php if($tagging == 2){ echo 'selected';}?>> Mechanical</option>
										<option value="3" <?php if($tagging == 3){ echo 'selected';}?>> Production</option>
									</select>
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
									</form>
								</div>
							</div>
							<div class="col-lg-12 col-xs-8">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<div id="appbox"></div>
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">Code</th>
								<th class="text-center">Last Record</th>
								<th class="text-center">Last User</th>
								<th class="text-center">Machine name</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($pmsheet_app)){
								foreach($pmsheet_app as $record){
						?>
							<tr id="<?php echo $record->id; ?>">
								<td class="text-center">
									<?php if($record->tag == 1){echo '<span class="label label-warning">Electrical</span>';}?>
									<?php if($record->tag == 2){echo '<span class="label label-primary">Mechanical</span>';}?>
									<?php if($record->tag == 3){echo '<span class="label label-success">Production</span>';}?>
									<?php if($record->freq == 1){echo '<span class="label label-info">Weekly</span>';}?>
									<?php if($record->freq == 2){echo '<span class="label label-danger">Monthly</span>';}?>
									<?php echo '<b>'.$record->code.'</b>';?>
								</td>
								<td class="text-center"><?php echo $record->timestamp;?></td>
								<td class="text-center"><?php echo $record->user;?></td>
								<td class="text-center"><?php echo $record->eq_name;?></td>
								<td class="text-center">
									<input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/>
								</td>
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
			jQuery("#searchList").attr("action", baseURL + "pmsheet_app/" + value);
			jQuery("#searchList").submit();
        });
	});
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#appbox').load('<?php echo base_url();?>pmappbox/' + trid);
	});
</script>
