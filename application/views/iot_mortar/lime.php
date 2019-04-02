<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Mortar (Lime)
			<small> offline record</small>
		</h1>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content">
	<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<form action="<?php echo base_url() ?>lime" method="POST" id="searchList">
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
								<table class="table table-hover table-striped table-bordered ">
									<center>
									<tr>
										<th>Timestamp</th>
										<th>Value (kg)</th>
										<th>Formula (kg)</th>
										<th>Actual (kg)</th>
									</tr>
									</center>
									<tbody>
										 <?php foreach ($mortarlime as $result){ 
										 ?>
											<tr>	   
											  <td><?php echo $result->timestamp ?></td>
											  <td><?php echo number_format ($result->val, 1, '.', '')?></td>
											  <td><?php echo number_format ($result->frm, 1, '.', '')?></td>
											  <td><?php echo number_format ($result->act, 1, '.', '')?></td>
											</tr>
											<?php 
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
</script>	
									
