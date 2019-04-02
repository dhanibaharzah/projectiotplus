<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-users"></i> User Setting
			<small>Approval Level</small>
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
								<form action="<?php echo base_url() ?>user_set" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover">
								<tr>
									<th>User Name</th>
									<th>Status</th>
									<th>LINE</th>
									<th>Role ID</th>
									<th>PIC ID</th>
									<th>Action</th>
								</tr>
						<?php
							if(!empty($user_set)){
								foreach($user_set as $record){
						?>
								<tr>
									<td><?php echo $record->uName ?></td>
									<td>
										<?php if($record->uFlag == '1'): ?>
										<span class="label label-success"> active </span>
										<?php endif; ?>
										<?php if($record->uFlag <> '1'): ?>
										<span class="label label-danger"> inactive </span>
										<?php endif; ?>
									</td>
									<td>
										<?php if($record->lineid != ''): ?>
										<span class="label label-success"> active </span>
										<?php endif; ?>
										<?php if($record->lineid == ''): ?>
										<span class="label label-danger"> inactive </span>
										<?php endif; ?>
									</td>
									<td><?php echo $record->hse_role; ?></td>
									<td><?php echo $record->hse_picar; ?></td>
									<td>
										<a class="btn btn-warning btn-sm" href="<?php echo base_url().'edituser_set/'.$record->id; ?>" title="Edit Item">Edit <i class="fa fa-pencil"></i></a>
									</td>
								</tr>
						<?php
								}
							}
						?>
							</table>
						</div>
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
            jQuery("#searchList").attr("action", baseURL + "user_set/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
</script>
