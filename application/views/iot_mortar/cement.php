<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Mortar (Cement)
			<small> offline record</small>
		</h1>
	</section>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<form action="<?php echo base_url() ?>cement" method="POST" id="searchList">
							<div class="col-md-2 form-group">
								<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="from Date"/>
							</div>
							<div class="col-md-2 form-group">
								<input id="toDate "autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="to Date"/>
							</div>
						  <div class="col-md-1 form-group">
							<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="box box-primary">
						<div class="box-body table-responsive no-padding">
							<div class="col-lg-12 col-xs-12">
								<table class="table table-hover table-striped table-bordered">
									<center>
									<tr>
										<th>Timestamp</th>
										<th>Value (kg)</th>
										<th>Formula (kg)</th>
									</tr>
                                    </center>
									<tbody>
                                 <?php 
                                if(!empty($mortarcement))
									{
                                    foreach ($mortarcement as $result){ 
                                 ?>
											<tr>	   
											  <td><?php echo $result->timestamp?></td>
											  <td><?php echo number_format ($result->val, 1, '.', '')?></td>
											  <td><?php echo number_format ($result->frm, 1, '.', '')?></td>
											</tr>
											<?php 
										 }
                                }
										 ?>
									</tbody>
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
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.datepicker').datepicker({
		   autoclose: true,
		   format : "yyyy-mm-dd"
		});
	});
		
		/*jQuery('#datepicker1').datepicker({
			autoclose: true,
			format : "yyyy-mm-dd",
			//startDate : "<?php echo date('Y-m-d'); ?>",
			todayHighlight : true
		});
		
		jQuery('#datepicker2').datepicker({
			autoclose: true,
			format : "yyyy-mm-dd"
		});
		
		$('#datepicker1').datepicker();
		
		$('#datepicker1').on('changeDate', function (selected) {
			$('#datepicker2').datepicker('setStartDate', selected.date);
			$('#datepicker2').datepicker('setDate', selected.date);
			$(this).datepicker('hide');
		});
        
	});
	
	flatpickr("#myID1", {
		enableTime: true,
		noCalendar: true,
		dateFormat: "H:i",
		time_24hr: true,
		minuteIncrement: 60,
		enableSeconds: false,
		disableMobile: "true"
		});	
		
	flatpickr("#myID2", {
		enableTime: true,
		noCalendar: true,
		dateFormat: "H:i",
		time_24hr: true,
		minuteIncrement: 60,
		enableSeconds: false,
		disableMobile: "true", 
		});	*/
	
</script>

	
