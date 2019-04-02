<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Raw Material (Sand)
			<small> offline record</small>
		</h1>
	</section>
	
	<section class="content">
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<form action="<?php echo base_url() ?>rawsand" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search by No. Truck or Supplier"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
                              </div>
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
										<th class="text-center">Test Date</th>
										<th class="text-center">No. Truck</th>
										<th class="text-center">Supplier</th>
										<th class="text-center">% FM</th>
										<th class="text-center">% Silt</th>
										<th class="text-center">% Organic</th>
										<th class="text-center">Status</th>
									</tr>
									</center>
									<tbody>
										 <?php foreach ($rawmatsand as $result){ 
										 ?>
											<tr>	   
											  <td class="text-center"><?php echo $result->test_date ?></td>
											  <td class="text-center"><?php echo $result->no_truck ?></td>
											  <td class="text-center"><?php echo $result->supplier_name ?></td>
											  <td class="text-center"><?php echo $result->fm ?></td>
											  <td class="text-center"><?php echo $result->silt ?></td>
											  <td class="text-center"><?php echo $result->organic ?></td>
											  <td class="text-center">
												<?php 
													if($result->status == 1){echo '<span class="label label-warning">checked</span>';}
													if($result->status == 2){echo '<span class="label label-success">approve</span>';}
                                                    if($result->status == 0){echo '<span class="label label-default">requested</span>';}
                                                    if($result->status == -1){echo '<span class="label label-danger">rejected</span>';}
												?>
												</td>
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
</div>								
<!--<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "rawsand/" + value);
            jQuery("#searchList").submit();
        });
	});		
</script>									
