<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Code Revival
			<small>Generate Deleted/Uncomplete PM Tag or Frequency</small>
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
									<form action="<?php echo base_url() ?>pmrevival" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
									</form>
									<br>
									<small>Found <?php echo $total?> data(s)</small>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Code</th>
								<th class="text-center">Machine Name</th>
								<th class="text-center">Revival</th>
							</tr>
						<?php
							if(!empty($pmrevival)){
								$a = 1 + $page;
								foreach($pmrevival as $record){
						?>
							<tr id="<?php echo $record->id; ?>">
								<td class="text-center" width="5%"><?php echo $a; ?></td>
								<td class="text-center"><?php echo $record->code; ?>
								</td>
								<td class="text-center"><?php echo $record->eq_name; ?></td>
								<td class="text-center">
									<div id="revival<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#revival<?php echo $a;?>').load('<?php echo base_url();?>pm_js_revival/<?php echo $record->code; ?>');
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "pmrevival/" + value);
			jQuery("#searchList").submit();
        });
	});
</script>
