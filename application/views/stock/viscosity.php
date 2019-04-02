<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Viscosity
        <small><?php echo $name; ?></small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">
					<form id="addvisco" action="<?php echo base_url() ?>addvisco" method="post">
						<div class="box-body">
							<div class="box-body table-responsive no-padding">
								<div class="col-lg-12 col-xs-12">
									<table class="table table-hover table-striped table-bordered">
										<center>
										<tr>
											<th colspan="2">Viscosity Value</th>
										</tr>
										</center>
										<tbody>
											<tr>
												<td width="22%">
													<input type="number" class="form-control" name="viscosity" placeholder="Input Viscosity" required>
												</td>
												<td width="12%">
													<button type="submit" class="btn btn-success centre">Submit</button>
												</td>
											</tr>
										</tbody>
									 </table>  
								</div><!-- /.box-body -->
							</div>
						</div>
					</form>	
				</div>	
			    
					<div>
						<?php echo '<i>Found '.$total.' data(s)</i>'; ?>
					</div>	
					<div class="col-lg-12 col-xs-12">
					<div class="box box-primary">
						<div class="box-header">
							<form id="searchList" action="<?php echo base_url() ?>viscosity" method="post">
								<div class="col-md-2 form-group">
									<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="from Date"/>
								</div>
								<div class="col-md-2 form-group">
									<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="to Date"/>
								</div>
								  <div class="col-md-1 form-group">
									<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
								</div>
							</form>
						</div>
						<div class="box-body">	
							<div class="box-body table-responsive no-padding">
								<div class="col-lg-12 col-xs-12">
									<table class="table table-hover table-striped table-bordered">
										<center>
										<tr>
											<th>No.</th>
											<th>Timestamp</th>
											<th>Viscosity Value</th>
										</tr>
										</center>
										<tbody>
									 <?php 
									if(!empty($viscosity))
										{
										foreach ($viscosity as $record){ 
									 ?>
												<tr>	   
												  <td><?php echo $record->id?></td>
												  <td><?php echo $record->timestamp?></td>
												  <td><?php echo $record->viscosity?></td>
												<?php 
											 }
									}
											 ?>
										</tbody>
									</table>
								</div>
							</div>
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
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$("#viscosity").select2({
			placeholder: "Input Viscosity"
		});
	});
	jQuery('.datepicker').datepicker({
		autoclose: true,
		format : "yyyy-mm-dd"
	});
</script>



