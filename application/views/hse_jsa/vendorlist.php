<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><i class="fa fa-list"></i> Vendor List</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>vendorlist" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText ; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList">Search <i class="fa fa-search"></i></button>
										</div>
										<span class="input-group-btn">
											<a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>add_vendor"><i class="fa fa-plus"></i> Add Vendor</a>
										</span>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th>No</th>
									<th>User ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Telp</th>
									<th class="text-center">Password</th>
									<th class="text-center">Action</th>
								</tr>
								<?php
									if(!empty($vendorlist))
									{$a=1;
										foreach($vendorlist as $record)
										{
								?>
								<tr>
									<td class="text-center"><?php echo $a ?></td>
									<td><?php echo $record->NIK ?></td>
									<td><?php echo $record->uName ?></td>
									<td><?php echo $record->email ?></td>
									<td>+62<?php echo $record->telp ?></td>
									<td><?php if($add_job ==2 ){echo $record->pass_user;}else{ echo'Purchasing Only';} ?></td>
									<td class="text-center">
										<?php if($add_job ==2 ){ ?>
											<a href="<?php echo base_url(); ?>edit_vendor/<?php echo $record->id;?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
										<?php } ?>
									</td>
								</tr>
								<?php
									$a++;
									}
								}
								?>
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div><!-- /.box -->
			</div>
		</div>
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "vendorlist/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
</script>
