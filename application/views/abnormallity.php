<style>
img.sticky {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    width: 200px;
}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-warning"></i> Abnormallity Reports
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-2">
								<button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#add_new"><i class="fa fa-warning"></i> Report</button>
								<div class="modal modal-default fade" id="add_new">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>addab" method="post" role="form">
											<div class="modal-body">
												<label class="pull-left">Describe it:</label>
												<textarea type="text" name="note" rows="4" class="form-control" required></textarea>
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
							<div class="col-md-10">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>abnormallity" method="POST" id="searchList">
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
						
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th>Timestamp</th>
								<th>Source</th>
								<th>User</th>
								<th>Report</th>
								<th>Image</th>
								<th>Close</th>
							</tr>
						<?php
							if(!empty($abnormallity)){
								foreach($abnormallity as $record){
						?>
							<tr id="<?php echo $record->id; ?>">
								<td>
									<?php echo $record->timestamp ?>
								</td>
								<td><?php echo $record->acsource ?></td>
								<td>
									<?php echo $record->user ?>
									<?php
										if($record->isopen == 1){echo '<br><span class="label label-warning">Open</span>';}
										if($record->isopen == 0){echo '<br><span class="label label-success">Closed</span><br>by '.$record->closeby;}
									?>
								</td>
								<td><?php echo $record->note ?>
									<span id="ticket<?php echo $record->id;?>"></span>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#ticket<?php echo $record->id;?>').load('<?php echo base_url();?>ab_ticket/<?php echo $record->id; ?>');
										});
									</script>
								</td>
								<td><?php if(!empty($record->imglink)){?><input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/><?php } ?></td>
								<td>
									<?php if($record->isopen == 1){ ?>
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#close<?php echo $record->id; ?>"><i class="fa fa-close"></i> Close</button>
									<div class="modal modal-default fade" id="close<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4>Close [ReportID: <?php echo $record->id; ?>]</h4>
												</div>
												<form role="form" id="close_ab" action="<?php echo base_url() ?>close_ab" method="post" role="form">
												<div class="modal-body">
													Report: <?php echo $record->note ?>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="hidden" name="id" value="<?php echo $record->id;?>">
													<input type="submit" class="btn btn-primary" value="Close">
												</div>
												</form>
											</div>
										</div>
									</div>
									<?php } ?>	
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
					<div class="col-md-1"></div>
					<div class="col-md-10"><div id="testbox"></div></div>
					<div class="col-md-1"></div>					
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
			jQuery("#searchList").attr("action", baseURL + "abnormallity/" + value);
			jQuery("#searchList").submit();
		});
	});
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#testbox').load('<?php echo base_url();?>viewabimage/' + trid);
	});
</script>
