<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			<i class="fa fa-cog"></i> Used Product
			<small>Add, Edit, Delete</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12 text-right">
				<div class="form-group">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="box">
					<div class="box-header">
						
						<form action="<?php echo base_url() ?>cbm_used_product" method="POST" id="searchList">
							<div class="row">
								<div class="col-lg-12 col-xs-12">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</div>
							</div>
						</form>
						
						<div class="row">
							<div class="col-md-12">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Prod ID</th>
								<th class="text-center">Registered Name</th>
								<th class="text-center">Data Group</th>
								<th class="text-center">Subclass</th>
								<th class="text-center">Forecast Mode</th>
								<th class="text-center">Status</th>
								<th class="text-center">SUM Target</th>
								<th class="text-center">SUM to</th>
								<th class="text-center">Action</th>
							</tr>
					<?php
						if(!empty($prod_data)){
							$a = $page + 1;
							foreach($prod_data as $record){
					?>
							<tr>
								<td class="text-center"><?php echo $a ?></td>
								<td class="text-center"><?php echo $record->prod_id ?></td>
								<td class="text-center"><?php echo $record->prod_name ?></td>
								<td class="text-center"><?php echo $record->group ?></td>
								<td class="text-center"><?php echo $record->subclass ?></td>
								<td class="text-center"><?php if($record->forecast_mode == 1){echo '<span class="label label-primary">Mixed</span>';}else{echo '<span class="label label-warning">Sparated</span>';} ?></td>
								<td class="text-center">
									<?php 
										if($record->isvalid == 1){echo '<span class="label label-success">Active</span>';}
										else{echo '<span class="label label-danger">Inactive</span>';} 
									?>
								</td>
								<td class="text-center">
									<?php 
										if($record->isum == 1){echo '<span class="label label-success">Sum Data</span>';}
										else{echo '<span class="label label-danger">Normal</span>';} 
									?>
								</td>
								<td class="text-center"><?php echo $record->sum_to; ?></td>
								<td class="text-center">
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $record->main_id; ?>"><i class="fa fa-trash"></i></button>
									<div class="modal modal-danger fade" id="del<?php echo $record->main_id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>cbm_del_used_prod" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Product Name:</label>
													<textarea type="text" name="cbm_prod" rows="2" class="form-control" disabled><?php echo $record->prod_name ?></textarea>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="main_id" value="<?php echo $record->main_id; ?>">
													<input type="hidden" name="act" value="1">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-outline" value="DELETE">
												</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#set<?php echo $record->main_id; ?>"><i class="fa fa-cog"></i></button>
									<div class="modal modal-primary fade" id="set<?php echo $record->main_id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" id="edit_act" action="<?php echo base_url() ?>cbm_del_used_prod" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Product Name:</label>
													<textarea type="text" name="cbm_prod" rows="2" class="form-control" disabled><?php echo $record->prod_name ?></textarea>
													<label class="pull-left">Data Group:</label>
													<br>
													<select id="grup" name="group" class="form-control grup" >
														<option value="Default"></option>
														<?php if(!empty($grup)){ 
															foreach($grup as $yy){
														?>
														<option value="<?php echo $yy->group; ?>" <?php if($record->group == $yy->group){echo 'selected';}?>><?php echo $yy->group; ?></option>
														<?php } }?>
													</select>
													<br>
													<label class="pull-left">Sub Class:</label>
													<br>
													<select id="subclass" name="subclass" class="form-control subclass" >
														<option value="Default"></option>
														<?php if(!empty($clas)){ 
															foreach($clas as $xx){
														?>
														<option value="<?php echo $xx->group; ?>" <?php if($record->subclass == $xx->group){echo 'selected';}?>><?php echo $xx->group; ?></option>
														<?php } }?>
													</select>
													<label class="pull-left">Forecast Mode:</label>
													<br>
													<select id="forecast_mode" name="forecast_mode" class="form-control" >
														<option value="1" <?php if($record->forecast_mode == 1){echo 'selected';} ?>>Mixed</option>
														<option value="2" <?php if($record->forecast_mode == 2){echo 'selected';} ?>>Sparated</option>
													</select>
													<label class="pull-left">Sum Data:</label>
													<br>
													<select id="isum" name="isum" class="form-control" >
														<option value="0" <?php if($record->isum == 0){echo 'selected';} ?>>Normal</option>
														<option value="1" <?php if($record->isum == 1){echo 'selected';} ?>>Sum Data</option>
													</select>
													<label class="pull-left">Sum Target:</label>
													<br>
													<select id="sum_to" name="sum_to" class="form-control sum_to" >
														<option value="0"></option>
														<?php if(!empty($sum_data)){ 
															foreach($sum_data as $sumto){
														?>
														<option value="<?php echo $sumto->main_id; ?>" <?php if($record->sum_to == $sumto->main_id){echo 'selected';}?>><?php echo $sumto->cbm_id.' Prod: '.$sumto->prod_name.' Class: '.$sumto->subclass; ?></option>
														<?php } }?>
													</select>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="prod_id" value="<?php echo $record->prod_id ?>">
													<input type="hidden" name="act" value="2">
													<input type="hidden" name="main_id" value="<?php echo $record->main_id; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-outline" value="EDIT">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
					<?php
								$a++;
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
			<div class="col-md-4">
				<div class="box">
					<div class="box-header">
						<h4 class="box-title"> Add New Product</h4>
					</div>
					<form action="<?php echo base_url(); ?>cbm_add_new_used" method="POST">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">                                
								<div class="form-group">
									<label for="prod">Product</label>
									<select id="prod" name="prod_id" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($prod)){ 
											foreach($prod as $record){
										?>
										<option value="<?php echo $record->id; ?>"><?php echo $record->prod_name; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button class="btn btn-sm btn-primary pull-right">Submit</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e){
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "cbm_product_setting/" + value);
			jQuery("#searchList").submit();
		});
	});
	$("#prod").select2({
		placeholder: "Please Select"
	});
	$(".grup").select2({
		width: '100%',
		placeholder: "Please Select"
	});
	$(".subclass").select2({
		width: '100%',
		placeholder: "Please Select"
	});
	$(".sum_to").select2({
		width: '100%',
		placeholder: "Please Select"
	});
	
</script>
