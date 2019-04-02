<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-check-square"></i> PM Ticket Result
			<small>track all tool PM Result</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<form action="<?php echo base_url() ?>toolresult" method="POST" id="searchList">
				<div class="col-md-2 col-md-offset-4 form-group">
					<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date"/>
				</div>
				<div class="col-md-2 form-group">
					<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date"/>
				</div>
				<div class="col-md-3 form-group">
					<input id="searchText" type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control" placeholder="Search Text"/>
				</div>
				<div class="col-md-1 form-group">
					<button type="submit" class="btn btn-md btn-default btn-block searchList pull-right"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th>Ticketid</th>
								<th>PM Doc</th>
								<th>Tool Detail</th>
								<th class="text-center">History</th>
							</tr>
					<?php
						if(!empty($toolresult)){
							foreach($toolresult as $record){
					?>
							<tr id="<?php echo $record->id; ?>">
								<td><font size="3"><span class="label label-primary"><?php echo $record->ticket_id; ?></span></font></td>
								<td>
									Schedule: <?php echo date("l, j F Y", $record->exedate); ?><br>
									Execution: <?php echo date("l, j F Y", $record->unixtime); ?><br>
									Doc: <?php echo $record->doctitle; ?>
								</td>
								<td>
									ID.<?php echo $record->toolid; ?><br>
									Name: <?php echo $record->name; ?><br>
									Brand: <?php echo $record->brand; ?><br>
									Size/Type: <?php echo $record->size; ?>
								</td>
								<td class="text-center">
									<input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/><br>
									<a class="btn btn-sm btn-success" href="<?php echo base_url().'detailtoolpm/'.$record->toolid; ?>" title="Detail of Tool">Detail <i class="fa fa-history"></i></a>
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
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary "href="<?php echo base_url(); ?>toolpmset" > Setting PM Schedule </a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="testbox"></div>
			</div>
		</div>
</section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;
            jQuery("#searchList").attr("action", link);
            jQuery("#searchList").submit();
        });

        jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
    });
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#testbox').load('<?php echo base_url();?>viewtestresult/' + trid);
	});
</script>
