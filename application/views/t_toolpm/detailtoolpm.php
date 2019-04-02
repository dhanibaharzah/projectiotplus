<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-list"></i> Detail Tool PM
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-10 col-xs-8">
								<h3>Tool Detail</h3>
							</div>
							<div class="col-lg-2 col-xs-4">
								<a href="<?php echo base_url().'edittool/'.$detailtool->id; ?>" class="btn btn-info btn-block"><i class="fa fa-pencil"></i> Edit</a>
							</div>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<strong>ID: </strong><?php echo $detailtool->id ?><br>
								<strong>Name: </strong><?php echo $detailtool->name ?><br>
								<strong>Brand: </strong><?php echo $detailtool->brand ?><br>
							</div>
							<div class="col-lg-6 col-xs-6">
								<strong>Size/Type: </strong><?php echo $detailtool->size ?><br>
								<strong>Position: </strong><?php echo $detailtool->pos ?><br>
								<strong>Last User: </strong><?php echo $detailtool->user ?><br>
							</div>
						</div>
					</div>
				</div>
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<h3>Tool's PM History</h3>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th>Execution</th>
								<th>TicketID</th>
								<th>View</th>
							</tr>
					<?php
						if(!empty($detailtoolpm)){
							foreach($detailtoolpm as $record){
					?>
							<tr id="<?php echo $record->id; ?>">
								<td><?php echo gmdate("l, j F Y", $record->unixtime) ?></td>
								<td><?php echo $record->ticket_id ?></td>
								<td><input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/></td>
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
			<div class="col-lg-6 col-xs-12">
				<div id="testbox"></div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#testbox').load('<?php echo base_url();?>viewtestresult/' + trid);
	});
</script>