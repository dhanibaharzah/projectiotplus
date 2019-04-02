<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-gears"></i> Tool PM Sheet</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-10 col-xs-8">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>pmform" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
							<div class="col-lg-2 col-xs-4 text-right">
								<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-plus"></i> Add New</button>
								<div class="modal modal-default fade" id="add_new">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>addpmform" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">New PM Sheet Title:</label>
												<textarea type="text" name="title" rows="2" class="form-control" required></textarea>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="submit" class="btn btn-primary" value="Submit">
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">Title</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($testform)){
								foreach($testform as $record){
						?>
							<tr id="<?php echo $record->id; ?>">
								<td align="center"><?php echo $record->title; ?></td>
								<td align="center">
									<input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/>
									<a href="<?php echo base_url().'editpmform/'.$record->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit</a>
									<a href="<?php echo base_url().'testsheet_img/'.$record->id; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-upload"></i> Image Upload</a>
								</td>
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
					<div id="view"></div>
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
            jQuery("#searchList").attr("action", baseURL + "pmform/" + value);
            jQuery("#searchList").submit();
        });
	});
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#view').load('<?php echo base_url();?>viewpmform/' + trid);
	});
</script>
