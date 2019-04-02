<div class="content-wrapper">
	<section class="content-header">
		<a href="<?php echo base_url();?>memberlist" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a> 
		<i class="fa fa-plus"></i> Edit Member
	</section>
	<section class="content">
		<div class="row">
			<form action="<?php echo base_url() ?>editmember" method="POST">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<label>Nama: </label>
						<input type="text" name="member_name" class="form-control input-sm"  placeholder="Nama sesuai KTP" value="<?php echo $asli->member_name; ?>" required />
						<label>Perusahaan: </label>
						<select id="comp" name="comp" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($comp)){ 
								foreach($comp as $record)
								{
							?>
							<option value="<?php echo $record->id; ?>" <?php if($record->id == $asli->wp_id){echo 'selected';} ?>><?php echo $record->wp_name; ?>, <?php echo $record->wp_address; ?></option>
							<?php } }?>
						</select>
						<label>Jabatan: </label>
						<select id="func" name="func" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($func)){ 
								foreach($func as $record)
								{
							?>
							<option value="<?php echo $record->jabatan; ?>" <?php if($record->jabatan == $asli->jabatan){echo 'selected';} ?>><?php echo $record->jabatan; ?></option>
							<?php } }?>
						</select>
						<label>Telephone: </label>
						<input type="number" name="member_phone" class="form-control input-sm"  placeholder="Nomor Telephone" value="<?php echo $asli->member_phone; ?>" required />
						<label>Alamat: </label>
						<textarea onkeyup="lettersOnly(this)" type="text" name="member_address" rows="4" class="form-control" required><?php echo $asli->member_address; ?></textarea>
					</div>
					<div class="box-footer">
						<input type="hidden" name="id" value="<?php echo $asli->id; ?>">
						<input type="submit" class="btn btn-primary btn-sm pull-right" name="Submit">
					</div>
				</div>
			</div>
			</form>
			<div class="col-lg-4 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<?php if(!empty($asli->img_url)){?>
						<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>assets/report/<?php echo $asli->img_url; ?>" width="100%" alt="user image">
						<?php } ?>
						<?php echo form_open_multipart('xtrial/x_image_session');?>
						<div class="form-group has-feedback">
							<label>Max.2MB format jpg/png only (kalo perlu)</label>
							<input type="file" name="berkas" class="form-control"/>
						</div>
						<input type="hidden" name="img_type" value="member_img" />
						<input type="hidden" name="id" value="<?php echo $asli->id; ?>" />
						<input type="submit" class="btn btn-primary btn-block btn-flat" value="Submit" />
						</form>
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