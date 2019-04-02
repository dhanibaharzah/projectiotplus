<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Mortar (Batch)
			<small> offline result</small>
		</h1>
	</section>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
		<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<form action="<?php echo base_url() ?>batch" method="POST" id="searchList">
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
		<section class="content">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="box box-primary">
						<div class="box-body table-responsive no-padding">
							<div class="col-lg-12 col-xs-12">
								<table class="table table-hover table-striped table-bordered ">
									<center>
									<tr>
										<th>ID</th>
										<th>Timestamp</th>
										<th>Product Number</th>
										<th>Formula Name</th>
										<th>Formula Cement (kg)</th>
										<th>Formula Lime (kg)</th>
										<th>Formula Sand (kg)</th>
										<th>Start Cement (kg)</th>
										<th>End Cement (kg)</th>
										<th>Weight Cement (sec.)</th>
										<th>Start Lime (kg)</th>
										<th>End Lime (kg)</th>
										<th>Weight Lime (sec.)</th>
										<th>Start Cement Dosing (kg)</th>
										<th>End Cement Dosing (kg)</th>
										<th>Cement Dosing (sec.)</th>
									</tr>
									</center>
									<?php
								
								?>
									<tbody>
										 <?php 
									if(!empty($mortarbatch))
									{
										 foreach ($mortarbatch as $result){ 
										 ?>
											<tr>	   
											  <td><?php echo $result->id?></td>
											  <td><?php echo $result->timestamp?></td>
											  <td><?php echo $result->prod_no?></td>
											  <td><?php echo $result->formula_name?></td>
											  <td><?php echo number_format($result->formula_cement, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->formula_lime, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->formula_sand, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->start_cement, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->end_cement, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->cement_weighting, 0, '.', '') ?></td>
											  <td><?php echo number_format($result->start_lime, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->end_lime, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->lime_weighting, 0, '.', '') ?></td>
											  <td><?php echo number_format($result->start_cement_dosing, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->end_cement_dosing, 1, '.', '') ?></td>
											  <td><?php echo number_format($result->cement_dosing, 0, '.', '') ?></td>
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
									
