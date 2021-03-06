<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-ticket"></i> PM Ticket List
			<small>track all tool PM Schedule</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<form action="<?php echo base_url() ?>toolschedule" method="POST" id="searchList">
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
								<th>Execute On</th>
								<th>Tool ID</th>
								<th>Name</th>
								<th>Brand</th>
								<th>Size</th>
								<th>History</th>
							</tr>
					<?php
						if(!empty($toolschedule)){
							foreach($toolschedule as $record){
					?>
							<tr>
								<td><font size="3"><span class="label label-primary"><?php echo $record->id ?></span></font></td>
								<td><?php echo gmdate("l, j F Y", $record->exedate) ?></td>
								<td><?php echo $record->toolid ?></td>
								<td><?php echo $record->name ?></td>
								<td><?php echo $record->brand ?></td>
								<td><?php echo $record->size ?></td>
								<td class="text-center">
									<a class="btn btn-sm btn-success" href="<?php echo base_url().'detailtoolpm/'.$record->toolid; ?>" title="Detail of Tool">Detail <i class="fa fa-history"></i></a>
									<a class="btn btn-sm btn-primary" href="<?php echo base_url().'toolinputform/'.$record->id; ?>" title="Go to Form" target="_blank">Go to Form <i class="fa fa-pencil"></i></a>
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
</script>
