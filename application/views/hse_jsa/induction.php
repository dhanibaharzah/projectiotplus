<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><i class="fa fa-list"></i> Contractor List</h1>
    </section>
    <section class="content">
        <div class="row">
			<div class="box">
				<div class="box-header">
					<div class="row">
						<div class="col-lg-12 col-xs-12">
							<div class="box-tools">
							<form action="<?php echo base_url() ?>vendorinduction" method="POST" id="searchList">
								<div class="input-group">
									<input type="text" name="searchText" value="<?php echo $searchText ; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
									<div class="input-group-btn">
										<button class="btn btn-sm btn-default searchList">Search <i class="fa fa-search"></i></button>
									</div>
									<span class="input-group-btn">
										<a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>add_vendorinduction"><i class="fa fa-plus"></i> Add Contractor</a>
									</span>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<div class="col-lg-12 col-xs-12">
						Found <?php echo $total; ?> data(s)
						<table class="table table-hover table-striped taable-bordered ">
							<tr class="text-center">
								<th class="text-center">No.</th>
								<th class="text-center">No. Registrasi</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Perusahaan</th>
								<th class="text-center">No. KTP/SIM</th>
								<th class="text-center">Tanggal Terdaftar</th>
								<th class="text-center">Tanggal Kadaluarsa</th>
								<th class="text-center">Keterangan</th>
								<th class="text-center">Foto</th>
								<th class="text-center">Penalty Report</th>
								<?php if ($vendorId >= 90000 and $vendorId <= 99999){
										if ($venrole->hse_role == 9 or $venrole->hse_role == 10){
								?>
									<th class="text-center">Action</th>
								<?php
									}
								}
							?>
							</tr>
							<?php
								if(!empty($list))
								{$number=$page + 1;
									foreach($list as $record)
									{
							?>
							<tr>
								<td class="text-center"><?php echo $number ?></td>
								<td><?php echo $record->regnum; ?></td>
								<td><?php echo $record->vendor_name; ?></td>
								<td><?php echo $record->vendor_id; ?></td>
								<td><?php echo $record->no_ktp; ?></td>
								<td><?php echo $record->start_date; ?></td>
								<td><?php echo $record->end_date; ?></td>	
								<td><?php echo $record->notes; ?></td>
								<td>
									<img src="<?php echo base_url(); ?>assets/contractor/<?php echo $record->img; ?>" style="vertical-align: bottom; width:130px; height:160px;"  align="center"></img>
								</td>
								<td class="text-center">
									<a href="<?php echo base_url(); ?>penalty_vendor/<?php echo $record->id;?>" class="btn btn-sm btn-warning">
										<b><span id="a<?php echo $record->regnum; ?>">counting...</span></b>
										<i class="fa fa-warning"></i>
									</a>
									<script>
										$('#a<?php echo $record->regnum; ?>').load('<?php echo base_url(); ?>penaltycount/<?php echo $record->regnum; ?>');
									</script>
								</td>
								<?php if ($vendorId >= 90000 and $vendorId <= 99999){
										if ($venrole->hse_role == 9 or $venrole->hse_role == 10){
								?>
										<td>
											<a href="<?php echo base_url(); ?>edited_convendor/<?php echo $record->id;?>" class="btn btn-sm btn-success">
												<i class="fa fa-pencil"></i>
											</a>
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
												<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span></button>
																<h4>Delete</h4>
															</div>
															<form role="form" id="edit_act" action="<?php echo base_url() ?>delete_convendor" method="post" role="form">
															<input type="hidden" name="id" value="<?php echo $record->id;?>">
															<div class="modal-body">
																Are you sure ?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
																<input type="hidden" name="redir" value="vendorinduction">
																<input type="submit" class="btn btn-outline" value="Delete">
															</div>
															</form>
														</div>
													</div>
												</div>
										</td>
								<?php
									}
								}
							?>		
							</tr>
							<?php
								$number++;
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
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "vendorinduction/" + value);
            jQuery("#searchList").submit();
        });
	});
	
</script>
