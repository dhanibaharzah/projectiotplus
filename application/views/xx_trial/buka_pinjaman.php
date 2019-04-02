<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-folder-open"></i> Buka Pinjaman
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-4 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title"> Data Anggota</h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> ID </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input class="form-control input-sm" value="<?php echo $asli->id; ?>" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Nama </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input class="form-control input-sm" value="<?php echo $asli->member_name; ?>" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Alamat </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<textarea class="form-control" rows="2" disabled><?php echo $asli->member_address; ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> No Telp </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input class="form-control input-sm" value="<?php echo $asli->member_phone; ?>" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Pekerjaan </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input class="form-control input-sm" value="<?php echo $comp; ?>" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Jabatan </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input class="form-control input-sm" value="<?php echo $asli->jabatan; ?>" disabled>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a class="btn btn-sm btn-info pull-left" href="<?php echo base_url()?>transaksi_crm" ><i class="fa fa-arrow-left"></i> Back</a>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title"> Pinjaman Baru </h4>
					</div>
					<form action="<?php echo base_url() ?>add_new_x_issue" method="POST">
					<input type="hidden" name="member_id" value="<?php echo $asli->id; ?>">
					<div class="box-body">
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Pinjaman </label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<input type="currency" class="form-control input-sm" id="pinj" />
								<input type="hidden" name="pinj" id="x_pinj">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Jangka Waktu </label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<div class="input-group">
									<input type="number" class="form-control input-sm" id="jangka" name="jangka" />
									<div class="input-group-addon">
										<small>Bulan</small>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Angsuran </label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>Rp</small>
									</div>
									<input id="x_ang" type="text" class="form-control input-sm" disabled />
									<input type="hidden" name="x_ang" id="xx_ang">
								</div>
							</div>
							<div class="col-lg-3 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>P</small>
									</div>
									<input id="x_pokok" type="text" class="form-control input-sm" disabled />
									<input type="hidden" name="x_pokok" id="xx_pokok">
								</div>
							</div>
							<div class="col-lg-3 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>(<?php echo $ang->x_value; ?>%)</small>
									</div>
									<input id="x_flower" type="text" class="form-control input-sm" disabled />
									<input type="hidden" name="x_flower" id="xx_flower">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Survey </label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<select id="nama_survey" name="nama_survey" class="form-control" required>
									<option value=""></option>
									<?php if(!empty($survey)){ 
										foreach($survey as $record)
										{
									?>
									<option value="<?php echo $record->nama_survey; ?>"><?php echo $record->nama_survey; ?></option>
									<?php } }?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Admin <span>(<?php echo $adm->x_value; ?>%)</span></label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>Rp</small>
									</div>
									<input id="adm_fee" type="text" class="form-control input-sm" disabled />
									<input type="hidden" name="adm_fee" id="xadm_fee">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Jaminan </label>
							</div>
							<div class="col-lg-10 col-xs-6">
								<textarea name="jaminan" id="jaminan" class="form-control" rows="2" onkeyup="this.value = this.value.toUpperCase();" required ></textarea>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" name="bunga_per" value="<?php echo $ang->x_value; ?>">
						<input type="hidden" name="adm_per" value="<?php echo $adm->x_value; ?>">
						<a class="btn btn-primary btn-sm pull-right" href="#"><i class="fa fa-print"></i> Print</a>
						<button class="btn btn-success btn-sm"><i class="fa fa-doc"></i> Buat Pinjaman</button>
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
	$(document).ready(function () {
		$("#nama_survey").select2({
			placeholder: "Pilih Survey"
		});
	});
	var adm = <?php echo $adm->x_value; ?>;
	var ang = <?php echo $ang->x_value; ?>;
	$("#pinj").keyup(function(){
		auto_calc();
	});
	$("#jangka").keyup(function(){
		auto_calc();
	});
	function auto_calc(){
		var linker1 = document.getElementById('pinj').value;
		var linker2 = document.getElementById('jangka').value;
		var linkerx = localStringToNumber(linker1);
		if(linker1 != null && linker2 != null && linker2 != 0){
			var adm_fee = (linkerx*adm/100).toFixed(0);
			var x_flower = (linkerx*ang/100).toFixed(0);
			var x_pokok = (linkerx/linker2).toFixed(0);
			var xx = parseInt(x_pokok);
			var yy = parseInt(x_flower);
			var x_ang =  xx + yy;
			$('#adm_fee').val(formatNumber(adm_fee));
			$('#xadm_fee').val(adm_fee);
			$('#x_flower').val(formatNumber(x_flower));
			$('#xx_flower').val(x_flower);
			$('#x_pokok').val(formatNumber(x_pokok));
			$('#xx_pokok').val(x_pokok);
			$('#x_ang').val(formatNumber(x_ang));
			$('#xx_ang').val(x_ang);
			$('#x_pinj').val(linkerx);
		}
	}
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}
	function formatNumber(num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	}
	
	
	var currencyInput = document.querySelector('input[type="currency"]');
	var currency = 'IDR'; // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

	currencyInput.addEventListener('focus', onFocus);
	currencyInput.addEventListener('blur', onBlur);

	function localStringToNumber( s ){
		return Number(String(s).replace(/[^0-9.-]+/g,""));
	}
	
	function onFocus(e){
		var value = e.target.value;
		e.target.value = value ? localStringToNumber(value) : '';
	}
	
	function onBlur(e){
		var value = e.target.value;
		const options = {
			maximumFractionDigits : 2,
			currency              : currency,
			style                 : "currency",
			currencyDisplay       : "symbol"
		}
		e.target.value = value ? localStringToNumber(value).toLocaleString(undefined, options) : ''
	}
	</script>