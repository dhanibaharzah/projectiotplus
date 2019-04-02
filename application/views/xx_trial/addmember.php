<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>memberlist" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-plus"></i> Add Member
	</section>
	<section class="content">
		<div class="row">
			<form action="<?php echo base_url() ?>addmember" method="POST">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<label>Nama: </label>
						<input type="text" name="member_name" class="form-control input-sm"  placeholder="Nama sesuai KTP" required />
						<label>Perusahaan: </label>
						<select id="comp" name="comp" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($comp)){ 
								foreach($comp as $record)
								{
							?>
							<option value="<?php echo $record->id; ?>"><?php echo $record->wp_name; ?>, <?php echo $record->wp_address; ?></option>
							<?php } }?>
						</select>
						<label>Jabatan: </label>
						<select id="func" name="func" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($func)){ 
								foreach($func as $record)
								{
							?>
							<option value="<?php echo $record->jabatan; ?>"><?php echo $record->jabatan; ?></option>
							<?php } }?>
						</select>
						<label>Telephone: </label>
						<input type="number" name="member_phone" class="form-control input-sm"  placeholder="Nomor Telephone" required />
						<label>Alamat: </label>
						<textarea onkeyup="lettersOnly(this)" type="text" name="member_address" rows="4" class="form-control" required></textarea>
					</div>
					<div class="box-footer">
						<input type="submit" class="btn btn-primary btn-sm pull-right" name="Submit">
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#comp").select2({
			placeholder: "Pilih Perusahaan"
		});
	});
	$(document).ready(function () {
		$("#func").select2({
			placeholder: "Pilih Jabatan"
		});
	});
</script>