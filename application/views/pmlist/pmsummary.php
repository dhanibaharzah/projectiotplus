<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Document Overview
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div id="docdetail"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>pmsummary" method="POST" id="searchList">
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
								<th class="text-center">View</th>
								<th class="text-center">Count</th>
								<th class="text-center">Result</th>
							</tr>
						<?php
							if(!empty($pmsummary)){
								$a = 1 + $page;
								foreach($pmsummary as $record){
						?>
							<tr id="<?php echo $record->id; ?>">
								<td class="text-center" width="5%"><?php echo $a; ?></td>
								<td class="text-center">
									<?php if($record->tag == 1 and $record->frec == 1){ echo '<span class="label label-success">Electrical(W)</span>';}?>
									<?php if($record->tag == 1 and $record->frec == 2){ echo '<span class="label label-warning">Electrical(M)</span>';}?>
									<?php if($record->tag == 2 and $record->frec == 1){ echo '<span class="label label-primary">Mechanical(W)</span>';}?>
									<?php if($record->tag == 2 and $record->frec == 2){ echo '<span class="label label-danger">Mechanical(M)</span>';}?>
									<?php if($record->tag == 3 and $record->frec == 1){ echo '<span class="label label-info">Production(W)</span>';}?>
									<?php if($record->tag == 3 and $record->frec == 2){ echo '<span class="label bg-purple">Production(M)</span>';}?>
									[<?php echo $record->code; ?>]
								</td>
								<td class="text-center"><?php echo $record->eq_name; ?></td>
								<td class="text-center"><input type="button" value="Detail" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/></td>
								<td class="text-center">
									<div id="chart<?php echo $a;?>"></div>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#chart<?php echo $a;?>').load('<?php echo base_url();?>chartlist/<?php echo $record->code.'/'.$record->tag.'/'.$record->frec; ?>');
										});
									</script>
								</td>
								<td class="text-center">
									<a href="<?php echo base_url();?>showresult/0/<?php echo $record->code.'/'.$record->tag.'/'.$record->frec; ?>" class="btn btn-primary btn-sm btn-block"><i class="fa fa-history"></i> Result</a>
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
			jQuery("#searchList").attr("action", baseURL + "pmsummary/" + value);
			jQuery("#searchList").submit();
        });
	});
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#docdetail').load('<?php echo base_url();?>pmdetailbox/' + trid);
	});
</script>
