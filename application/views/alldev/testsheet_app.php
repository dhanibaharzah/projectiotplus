<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-check"></i> Testsheet Approval
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
									<form action="<?php echo base_url() ?>testsheet_app" method="POST" id="searchList">
									<select class="form-control" name="show">
										<option value="1" <?php if($show == 1){echo 'selected';}?>>Show All</option>
										<option value="" <?php if($show == ''){echo 'selected';}?>>Show Mine Only</option>
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
								<th class="text-center">No</th>
								<th class="text-center">Code</th>
								<th class="text-center">Last Record</th>
								<th class="text-center">Last User</th>
								<th class="text-center">Test Title</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($testsheet_app)){
								$a = 1+$page;
								foreach($testsheet_app as $record){
						?>
							<tr id="<?php echo $record->id; ?>">
								<td class="text-center"><?php echo $a;?></td>
								<td class="text-center"><?php echo $record->code;?></td>
								<td class="text-center"><?php echo $record->timestamp;?></td>
								<td class="text-center"><?php echo $record->pic;?></td>
								<td class="text-center"><?php echo $record->test_title;?></td>
								<td class="text-center">
									<input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/>
								</td>
							</tr>
						<?php $a++;}}?>
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
			jQuery("#searchList").attr("action", baseURL + "testsheet_app/" + value);
			jQuery("#searchList").submit();
        });
	});
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#appbox').load('<?php echo base_url();?>testappbox/' + trid);
	});
</script>
