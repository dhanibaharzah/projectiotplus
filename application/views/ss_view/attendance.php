<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-users"></i> Attendance List
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box-tools">
				<form action="<?php echo base_url() ?>ss_attendance" method="POST" id="searchList">
					<div class="row">
						<div class="col-lg-12 col-xs-12">
							<div class="input-group">
								<select id="nik" name="nik" class="form-control" required>
									<option value=""></option>
									<?php if(!empty($userlist)){ 
										foreach($userlist as $record)
										{
									?>
									<option value="<?php echo $record->NIK; ?>" <?php if($record->NIK == $nik){echo 'selected';} ?>><?php echo $record->uName; ?></option>
									<?php } }?>
								</select>
								<div class="input-group-btn">
									<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
				<div class="box">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th class="text-center">Recorded Time</th>
								<th class="text-center">FP/PASS</th>
								<th class="text-center">Status</th>
							</tr>
				<?php
					if(!empty($attlist)){
						foreach($attlist as $record){
				?>
							<tr>
								<td class="text-center"><?php echo date('Y-m-d H:i', $record->tgl); ?></td>
								<td class="text-center"><?php echo $record->tipe; ?></td>
								<td class="text-center"><?php if($record->inout == 0){echo '<span class="label label-success">IN</span>';}else{echo '<span class="label label-danger">OUT</span>';} ?></td>
							</tr>
				<?php
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
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "ss_attendance/" + value);
			jQuery("#searchList").submit();
		});
	});
	$(document).ready(function () {
		$("#nik").select2({
			placeholder: "Pilih Perusahaan"
		});
	});
</script>
