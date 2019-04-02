<div class="content-wrapper">
	<section class="content-header">
		<h1><a href="<?php echo base_url().'hisdevice/'.$id;?>" class="btn btn-sm btn-primary">BACK</a> <i class="fa fa-history"></i> Test Log of [<?php echo $xcode; ?>]</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Specification of [<?php echo $xcode; ?>]
						</div>
					</div>
					<?php echo $form; ?>
				</div>
			</div>
		</div>
		<?php
			$a4 = 1;
		?>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">
							Performance Test Log
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>histes/<?php echo $xcode; ?>" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search" />
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Timestamp</th>
								<th class="text-center">Title</th>
								<th class="text-center">PIC</th>
								<th class="text-center">Act</th>
							</tr>
						<?php
							if(!empty($lasttest)){
								foreach($lasttest as $tes){
						?>
							<tr id="<?php echo $tes->id; ?>">
								<td class="text-center"><?php echo $a4; ?></td>
								<td class="text-center"><?php echo $tes->timestamp; ?></td>
								<td class="text-center"><?php echo $tes->test_title; ?></td>
								<td class="text-center"><?php echo $tes->pic; ?></td>
								<td class="text-center">
									<input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $tes->id; ?>"/>
								</td>
							</tr>
						<?php
									$a4++;
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
		<div class="row">
			<div id="testbox"></div>
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
            jQuery("#searchList").attr("action", baseURL + "histes/<?php echo $xcode; ?>/" + value);
            jQuery("#searchList").submit();
        });
	});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#testbox').load('<?php echo base_url();?>viewtestresult/' + trid);
	});
</script>
