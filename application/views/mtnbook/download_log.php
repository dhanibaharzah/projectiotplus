<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-download"></i> Download Log
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>download_log" method="POST" id="searchList">
									<div class="col-md-11 form-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
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
								<th class="text-center">No</th>
								<th class="text-center">Time</th>
								<th class="text-center">Username</th>
								<th class="text-center">File Group</th>
								<th class="text-center">File name/type</th>
								<th class="text-center">Title</th>
								<th class="text-center">Access</th>
							</tr>
						<?php
							if(!empty($download_log)){
								$a = 1 + $page;
								foreach($download_log as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $a?></td>
								<td class="text-center"><?php echo $record->timestamp; ?></td>
								<td class="text-center"><?php echo $record->uName; ?></td>
								<td class="text-center"><?php echo $record->file_type; ?></td>
								<td class="text-center"><?php echo $record->file_name; ?></td>
								<td class="text-center"><?php echo $record->file_title; ?></td>
								<td class="text-center"><?php if($record->access_point == '192.168.1.1'){echo 'LOCAL ACCESS'; }else{ echo 'GLOBAL ACCESS'; } ?></td>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "download_log/" + value);
			jQuery("#searchList").submit();
        });
	});
</script>
