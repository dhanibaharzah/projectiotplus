<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-exchange"></i> Transaksi
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
								<input id="member_id" class="form-control input-sm" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Nama </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<select id="mem_id" name="mem_id" class="form-control" required>
									<option value=""></option>
								<?php
									if(!empty($user)){ 
										foreach($user as $rec){
								?>
									<option value="<?php echo $rec->id; ?>" <?php if(!empty($mem_id)){if($mem_id == $rec->id){ echo 'selected';}}?>><?php echo $rec->member_name; ?></option>
								<?php
										}
									}
								?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Alamat </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<textarea id="member_address" class="form-control" rows="2" disabled></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> No Telp </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input id="mem_phone" class="form-control input-sm" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Pekerjaan </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input id="member_job" class="form-control input-sm" disabled>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<label> Jabatan </label>
							</div>
							<div class="col-lg-9 col-xs-6">
								<input id="jabatan" class="form-control input-sm" disabled>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a class="btn btn-sm btn-info pull-left" href="#" id="edit_btn"><i class="fa fa-pencil"></i> Edit</a>
						<a class="btn btn-sm btn-primary pull-right" href="#" id="his_btn"><i class="fa fa-history"></i> History</a>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title"> Pinjaman Terakhir : <span id="pinjaman"></span></h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Pinjaman </label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>Rp</small>
									</div>
									<input type="text" class="form-control input-sm" id="tot_val" disabled />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Jangka Waktu </label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<div class="input-group">
									<input type="number" class="form-control input-sm" id="jangka" disabled />
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
									<input type="text" class="form-control input-sm" id="ang" disabled />
								</div>
							</div>
							<div class="col-lg-3 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>P</small>
									</div>
									<input type="text" class="form-control input-sm" id="pokok" disabled />
								</div>
							</div>
							<div class="col-lg-3 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>(<span id="bunga_per"></span>%)</small>
									</div>
									<input type="text" class="form-control input-sm" id="bunga" disabled />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Survey </label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<input id="survey" type="text" class="form-control input-sm" disabled />
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Admin (<span id="adm_per">0</span>%)</label>
							</div>
							<div class="col-lg-4 col-xs-6">
								<div class="input-group">
									<div class="input-group-addon">
										<small>Rp</small>
									</div>
									<input id="adm_fee" type="text" class="form-control input-sm" disabled />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-6">
								<label> Jaminan </label>
							</div>
							<div class="col-lg-10 col-xs-6">
								<textarea id="jaminan" class="form-control" rows="2" disabled ></textarea>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a id="open_btn" class="btn btn-success btn-sm pull-left" href="#"><i class="fa fa-folder-open"></i> Buka Pinjaman</a>
						<button id="bayar_btn" class="btn btn-success btn-sm" onclick="boxfunction()"><i class="fa fa-dollar"></i> Bayar Angsuran</button>
						<button id="print_btn" class="btn btn-primary btn-sm pull-right"><i class="fa fa-print"></i> Print</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="rowbayar">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<form action="<?php echo base_url() ?>bayar_x_issue" method="POST">
					<div class="box-body">
						<table class="table">
							<tr>
								<th width="10%">Tanggal</th>
								<th width="20%">Keterangan</th>
								<th width="10%">Jasa</th>
								<th width="11%">Pokok</th>
								<th width="15%">Angsuran</th>
								<th width="10%">Denda</th>
								<th width="12%">Total</th>
								<th width="12%">Sisa Pokok</th>
							</tr>
							<tr>
								<td><?php echo date('Y-m-d'); ?></td>
								<td>
									<textarea id="keterangan" name="keterangan" class="form-control" rows="2" required></textarea>
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="jasa" disabled />
									<input type="hidden" name="jasa" id="x_jasa">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="bayar_pokok" disabled />
									<input type="hidden" name="bayar_pokok" id="bayar_x_pokok">
								</td>
								<td>
									<input type="currency" class="form-control input-sm" id="angsuran" required />
									<input type="hidden" name="angsuran" id="x_angsuran">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="denda" disabled />
									<input type="hidden" name="denda" id="x_denda">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="total_ang" disabled />
									<input type="hidden" name="total_ang" id="x_total_ang">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="sisa_pokok" disabled />
									<input type="hidden" name="sisa_pokok" id="sisa_x_pokok">
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<input type="hidden" name="mem_id" id="hid_mem_id" >
						<input type="hidden" name="pinj_id" id="hid_pinj_id">
						<button class="btn btn-sm btn-success pull-right" id="bayar_utang"><i class="fa fa-dollar"></i> Bayar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body" id="histrans"></div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript">
	$("#open_btn").hide();
	$("#bayar_btn").hide();
	$("#print_btn").hide();
	$("#edit_btn").hide();
	$("#his_btn").hide();
	$("#rowbayar").hide();
	$("#bayar_utang").hide();
	var bayaran = 0;
	var denda = 0;
	var jasa = 0;
	var pokok = 0;
	var sisa_pokok = 0;
	var min_ang = 0;
	var max_ang = 0;
	$("#mem_id").select2({
		placeholder: "Please Select"
	});
	$('#mem_id').on('change', function(){
		linker = $('#mem_id').val();
		$('#hid_mem_id').val(linker);
		request_x_user();
		$('#histrans').load('<?php echo base_url(); ?>x_histrans/' + linker);
	});
	<?php if(!empty($mem_id)){?>
		$('#hid_mem_id').val(<?php echo $mem_id; ?>);
		linkx = <?php echo $mem_id; ?>;
		request_xx_user();
		$('#histrans').load('<?php echo base_url(); ?>x_histrans/' + linkx);
		function request_xx_user(){
		$.ajax({
			url: '<?php echo base_url(); ?>x_ajax_user/' + linkx,
			success: function(point){
				$('#member_id').val(point['mem_id']);
				$('#member_address').val(point['mem_address']);
				$('#mem_phone').val(point['mem_phone']);
				$('#member_job').val(point['mem_job']);
				$('#jabatan').val(point['jabatan']);
				$('#tot_val').val(point['tot_val']);
				$('#jangka').val(point['jangka']);
				$('#ang').val(point['ang']);
				$('#pokok').val(point['pokok']);
				$('#bunga_per').html(point['bunga_per']);
				$('#adm_per').html(point['adm_per']);
				$('#pinjaman').html(point['status']);
				$('#bunga').val(point['bunga']);
				$('#hid_pinj_id').val(point['id_pinj']);
				bayaran = point['id_pinj'];
				$('#adm_fee').val(point['adm_fee']);
				$('#survey').val(point['survey']);
				$('#jaminan').val(point['jaminan']);
				$('#edit_btn').attr("href", "<?php echo base_url(); ?>editmember_page/" + linkx);
				$('#his_btn').attr("href", "<?php echo base_url(); ?>hismember_page/" + linkx);
				if(point['status_pinj'] == 2){
					$('#open_btn').attr("href", "<?php echo base_url(); ?>open_new_x_issue/" + linkx);
					$("#open_btn").show();
					$("#bayar_btn").hide();
				}else if(point['status_pinj'] == 0){
					$("#open_btn").hide();
					$("#bayar_btn").show();
					$("#print_btn").show();
				}else if(point['status_pinj'] == 1){
					$("#print_btn").show();
					$("#bayar_btn").hide();
					$('#open_btn').attr("href", "<?php echo base_url(); ?>open_new_x_issue/" + linkx);
					$("#open_btn").show();
				}
				$("#edit_btn").show();
				$("#his_btn").show();
				$("#rowbayar").hide();
			},
			cache: false
		});
	}
	<?php } ?>
	function request_x_user(){
		$.ajax({
			url: '<?php echo base_url(); ?>x_ajax_user/' + linker,
			success: function(point){
				$('#member_id').val(point['mem_id']);
				$('#member_address').val(point['mem_address']);
				$('#mem_phone').val(point['mem_phone']);
				$('#member_job').val(point['mem_job']);
				$('#jabatan').val(point['jabatan']);
				$('#tot_val').val(point['tot_val']);
				$('#jangka').val(point['jangka']);
				$('#ang').val(point['ang']);
				$('#pokok').val(point['pokok']);
				$('#bunga_per').html(point['bunga_per']);
				$('#adm_per').html(point['adm_per']);
				$('#pinjaman').html(point['status']);
				$('#hid_pinj_id').val(point['id_pinj']);
				bayaran = point['id_pinj'];
				$('#bunga').val(point['bunga']);
				$('#adm_fee').val(point['adm_fee']);
				$('#survey').val(point['survey']);
				$('#jaminan').val(point['jaminan']);
				$('#edit_btn').attr("href", "<?php echo base_url(); ?>editmember_page/" + linker);
				$('#his_btn').attr("href", "<?php echo base_url(); ?>hismember_page/" + linker);
				if(point['status_pinj'] == 2){
					$('#open_btn').attr("href", "<?php echo base_url(); ?>open_new_x_issue/" + linker);
					$("#open_btn").show();
					$("#bayar_btn").hide();
				}else if(point['status_pinj'] == 0){
					$("#open_btn").hide();
					$("#bayar_btn").show();
					$("#print_btn").show();
				}else if(point['status_pinj'] == 1){
					$("#print_btn").show();
					$("#bayar_btn").hide();
					$('#open_btn').attr("href", "<?php echo base_url(); ?>open_new_x_issue/" + linker);
					$("#open_btn").show();
				}
				$("#edit_btn").show();
				$("#his_btn").show();
				$("#rowbayar").hide();
			},
			cache: false
		});
	}
	
	function boxfunction(){
		$("#rowbayar").show();
		$.ajax({
			url: '<?php echo base_url(); ?>boxbayar/' + bayaran,
			success: function(point){
				denda = point['denda'];
				$('#denda').html(point['denda_dis']);
				jasa = point['jasa'];
				$('#x_jasa').val(point['jasa']);
				$('#jasa').val(point['jasa_dis']);
				pokok = point['pokok'];
				$('#bayar_x_pokok').val(point['pokok']);
				$('#bayar_pokok').val(point['pokok_dis']);
				$('#keterangan').val(point['keterangan']);
				$('#angsuran').val(point['min_ang_dis']);
				$('#x_angsuran').val(point['min_ang']);
				$('#sisa_pokok').val(point['sisa_pokok_dis']);
				$('#sisa_x_pokok').val(point['sisa_pokok']);
				sisa_pokok = point['sisa_pokok'];
				min_ang = point['min_ang'];
				max_ang = parseInt(min_ang) + parseInt(sisa_pokok);
				$('#x_denda').val(point['denda']);
				$('#denda').val(point['denda_dis']);
				$('#x_total_ang').val(point['total_ang']);
				$('#total_ang').val(point['total_ang_dis']);
				$("#bayar_utang").show();
			},
			cache: false
		});
	}
	
	$("#angsuran").keyup(function(){
		var xcx = document.getElementById('angsuran').value;
		$('#x_angsuran').val(xcx);
		auto_calc();
	});
	function auto_calc(){
		var linker1 = document.getElementById('x_angsuran').value;
		var minimum = parseInt(min_ang);
		var maximum = parseInt(max_ang);
		var valued = parseInt(linker1);
		if(valued > minimum && valued < maximum){
			$("#bayar_utang").show();
			pokok = valued - jasa - denda;
			$('#bayar_x_pokok').val(pokok);
			var total_ang = valued + denda;
			$('#x_total_ang').val(total_ang);
			var sispok = sisa_pokok - pokok;
			$('#sisa_x_pokok').val(sispok);
			$.ajax({
				url: '<?php echo base_url(); ?>convertidr/' + pokok,
				success: function(point){
					$('#bayar_pokok').val(point['besaran']);
				},
				cache: false
			});
			$.ajax({
				url: '<?php echo base_url(); ?>convertidr/' + total_ang,
				success: function(point){
					$('#total_ang').val(point['besaran']);
				},
				cache: false
			});
			$.ajax({
				url: '<?php echo base_url(); ?>convertidr/' + sispok,
				success: function(point){
					$('#sisa_pokok').val(point['besaran']);
				},
				cache: false
			});
		}else{
			$("#bayar_utang").hide();
		}
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