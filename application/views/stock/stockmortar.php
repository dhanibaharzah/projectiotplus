<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Stock Control In
        <small><?php echo $name; ?></small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="box box-primary">			
					<form id="addstock" action="<?php echo base_url() ?>addstock" method="post">
						<div class="box-body">
							<div class="box-body table-responsive no-padding">
								<div class="col-lg-12 col-xs-12">
									<table class="table table-hover table-striped table-bordered">
										<center>
										<tr>
											<th>Mortar Type</th>
											<th>Total Bag</th>
											<th>Brand</th>
											<th>Weight</th>
											<th>Action</th>
										</tr>
										</center>
										<tbody>
											<tr>
												<td width="22%">
													<select id="mor" class="form-control" name="type_mortar" required>
															<?php if(!empty($mortar)){ 
																foreach($mortar as $record)
																{
															?>
															<option value="<?php echo $record->note; ?>"><?php echo $record->note; ?></option>
															<?php } }?>
													</select>
												</td>
												<td width="22%">
													<input type="number" class="form-control" name="bag" placeholder="Input Total Bag" required>
												</td>
												<td width="22%">
													<select id="brand" name="brand" class="form-control" required>
														<?php if(!empty($brand)){ 
																foreach($brand as $record)
																{
															?>
															<option value="<?php echo $record->note; ?>"><?php echo $record->note; ?></option>
															<?php } }?>
													</select>
												</td>
												<td width="22%">
													<select id="bag" class="form-control" name="bag_weight" required>
															<?php if(!empty($bag)){ 
																foreach($bag as $record)
																{
															?>
															<option value="<?php echo $record->note; ?>"><?php echo $record->note; ?></option>
															<?php } }?>
													</select>
												</td>
												<td width="12%">
													<button type="submit" class="btn btn-success centre" onclick="">Submit</button>
												</td>
											</tr>
										</tbody>
									 </table>  
								</div><!-- /.box-body -->
							</div>
						</div>
					</form>	
				</div>	
				<div class="row">
			<div id="mortar_stock"></div>
		</div>
            <div class="row">
				
				<div class="col-lg-12 col-xs-12">
					<div class="box box-primary">
						<div class="box-header">
							<form id="searchList" action="<?php echo base_url() ?>stockmortar" method="post">
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
						<div class="box-body table-responsive no-padding">
							<div class="col-lg-12 col-xs-12">
								<table class="table table-hover table-striped table-bordered">
									<center>
									<tr>
										<th>No.</th>
										<th>Timestamp</th>
										<th>Mortar Type</th>
										<th>Total Bag</th>
										<th>Brand</th>
										<th>Weight</th>
										<th>Added by</th>
										<th>Approved by</th>
										<th width="15%" class="text-center">Status</th>
									</tr>
                                    </center>
									<tbody>
                                 <?php 
                                if(!empty($stockmortar))
									{
                                    foreach ($stockmortar as $record){ 
                                 ?>
											<tr>	   
											  <td><?php echo $record->id?></td>
											  <td><?php echo $record->timestamp?></td>
											  <td><?php echo $record->type_mortar?></td>
											  <td><?php echo $record->bag?></td>
											  <td><?php echo $record->brand?></td>
											  <td><?php echo $record->bag_weight?></td>
											  <td><?php echo $record->addedby?></td>
											  <td><?php echo $record->approvedby?></td>
											  <td class="text-center">
												  <?php if($record->status_app == 0){
												  ?>
												  <a class="btn btn-success btn-sm" href="<?php echo base_url();?>mortar_app/<?php echo $record->id?>/1"><i class="fa fa-check"></i></a>  
												  <a class="btn btn-danger btn-sm" href="<?php echo base_url();?>mortar_app/<?php echo $record->id?>/2"><i class="fa fa-close"></i></a>
											 
												  <?php } elseif($record->status_app == 1){ ?>
															<a class="btn btn-success btn-sm" ><i class="fa fa-check"></i> Approved</a>
												  <?php } elseif($record->status_app == 2){ ?>
															<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>	
															<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span></button>
																			<h4>Delete</h4>
																		</div>
																		<form role="form" id="edit_act" action="<?php echo base_url() ?>deletestock" method="post" role="form">
																		<input type="hidden" name="id" value="<?php echo $record->id;?>">
																		<div class="modal-body">
																			Are you sure ?
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
																			<input type="hidden" name="redir" value="stockmortar">
																			<input type="submit" class="btn btn-outline" value="Delete">
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
									</tbody>
								</table>
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
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
	jQuery(document).ready(function(){
		jQuery('.datepicker').datepicker({
		   autoclose: true,
		   format : "yyyy-mm-dd"
		});
	});		
$('#mortar_stock').load('<?php echo base_url(); ?>get_mortar_group');	
</script>



