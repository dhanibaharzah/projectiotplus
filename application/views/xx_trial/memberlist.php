<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-users"></i> Anggota
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-10 col-xs-8">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>memberlist" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
									</form>
									<small>Found <?php echo $total; ?> data(s)</small>
								</div>
							</div>
							<div class="col-lg-2 col-xs-4 text-right">
								<div class="form-group">
									<a class="btn btn-success btn-block" href="<?php echo base_url(); ?>addmember_page"><i class="fa fa-plus"></i> Add New</a>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Nama Anggota</th>
								<th class="text-center">Perusahaan</th>
								<th class="text-center">Jabatan</th>
								<th class="text-center">Alamat</th>
								<th class="text-center">Telephone</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($memberlist)){
								$a = 1 + $page;
								foreach($memberlist as $record){
						?>
							<tr>
								<td class="text-center"><?php echo $record->id; ?></td>
								<td class="text-center"><?php echo $record->member_name; ?></td>
								<td class="text-center"><?php echo $record->wp_name; ?></td>
								<td class="text-center"><?php echo $record->jabatan; ?></td>
								<td class="text-center"><?php echo nl2br($record->member_address); ?></td>
								<td class="text-center"><?php echo $record->member_phone; ?></td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>editmember_page/<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></a>
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
			jQuery("#searchList").attr("action", baseURL + "memberlist/" + value);
			jQuery("#searchList").submit();
        });
	});
</script>
