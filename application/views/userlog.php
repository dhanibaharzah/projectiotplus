<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-users"></i> Users Log
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-12">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>userlog" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								Today total access: <?php echo $total; ?> 
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th>time</th>
								<th>appname</th>
								<th>session</th>
								<th>otherdata</th>
							</tr>
						<?php
							if(!empty($userlog)){
								foreach($userlog as $record){
						?>
							<tr>
								<td><?php echo $record->createdDtm ?></td>
								<td><?php echo $record->appname ?></td>
								<td><?php echo $record->sessionData ?></td>
								<td><?php echo $record->machineIp ?> - <?php echo $record->userAgent ?> - <?php echo $record->platform ?> - <?php echo $record->agentString ?></td>
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
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e){
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "userlog/" + value);
			jQuery("#searchList").submit();
		});
	});
</script>
