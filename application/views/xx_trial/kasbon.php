<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-dollar"></i> Kasbon
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title"> Data Anggota</h4>
					</div>
					<div class="box-body">
						<div class="col-lg-6 col-xs-12">
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
						<div class="col-lg-6 col-xs-12">
							<div id="user_img" class="text-center"></div>
						</div>
					</div>
					<div class="box-footer">
						<button class="btn btn-sm btn-success pull-left" onclick="kasbonfunction()" id="buat_btn"><i class="fa fa-plus"></i> Buat Kasbon</button>
						<a class="btn btn-sm btn-info pull-left" href="#" id="edit_btn"><i class="fa fa-pencil"></i> Edit</a>
						<a class="btn btn-sm btn-primary pull-right" href="#" id="his_btn"><i class="fa fa-history"></i> History</a>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12" id="warn_box">
				<div class="callout callout-danger">
					<h4>Pilih Anggota terlebih dahulu!</h4>
				</div>
			</div>
		</div>
		<div class="row" id="kasbon_box">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<form action="<?php echo base_url() ?>buat_kasbon" method="POST">
					<div class="box-body">
						<table class="table">
							<tr>
								<th width="15%">Tanggal</th>
								<th width="25%">Kasbon</th>
								<th width="25%">Jasa</th>
								<th width="35%">Total</th>
							</tr>
							<tr>
								<td><?php echo date('Y-m-d'); ?></td>
								<td>
									<input type="currency" class="form-control input-sm" id="kasbon" required />
									<input type="hidden" name="kasbon" id="x_kasbon">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="jasa" disabled />
									<input type="hidden" name="jasa" id="x_jasa">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="total_bayar" disabled />
									<input type="hidden" name="total_bayar" id="x_total_bayar">
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<input type="hidden" name="mem_id" id="hid_mem_id" >
						<button class="btn btn-sm btn-success pull-right" id="buat_kasbon"><i class="fa fa-dollar"></i> Buat Kasbon</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body" id="hiskasbon"></div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript">
	$("#warn_box").hide();
	$("#kasbon_box").hide();
	function kasbonfunction(){
		var memberid = document.getElementById('hid_mem_id').value;
		if(memberid == ''){
			$("#warn_box").show();
		}else{
			$("#kasbon_box").show();
		}
	}
	$("#edit_btn").hide();
	$("#his_btn").hide();
	$("#mem_id").select2({
		placeholder: "Please Select"
	});
	$('#mem_id').on('change', function(){
		$("#warn_box").hide();
		linker = $('#mem_id').val();
		$("#user_img").load('<?php echo base_url(); ?>user_img/' + linker);
		$('#hid_mem_id').val(linker);
		request_x_user();
		$('#hiskasbon').load('<?php echo base_url(); ?>x_hiskasbon/' + linker);
	});
	<?php if(!empty($mem_id)){?>
		$('#hid_mem_id').val(<?php echo $mem_id; ?>);
		linkx = <?php echo $mem_id; ?>;
		request_xx_user();
		$('#hiskasbon').load('<?php echo base_url(); ?>x_hiskasbon/' + linkx);
		function request_xx_user(){
		$.ajax({
			url: '<?php echo base_url(); ?>x_ajax_user/' + linkx,
			success: function(point){
				$('#member_id').val(point['mem_id']);
				$('#member_address').val(point['mem_address']);
				$('#mem_phone').val(point['mem_phone']);
				$('#member_job').val(point['mem_job']);
				$('#jabatan').val(point['jabatan']);
				$('#edit_btn').attr("href", "<?php echo base_url(); ?>editmember_page/" + linkx);
				$('#his_btn').attr("href", "<?php echo base_url(); ?>hismember_page/" + linkx);
				$("#edit_btn").show();
				$("#his_btn").show();
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
				$('#edit_btn').attr("href", "<?php echo base_url(); ?>editmember_page/" + linker);
				$('#his_btn').attr("href", "<?php echo base_url(); ?>hismember_page/" + linker);
				$("#edit_btn").show();
				$("#his_btn").show();
			},
			cache: false
		});
	}
	$("#kasbon").keyup(function(){
		var xcx = document.getElementById('kasbon').value;
		$('#x_kasbon').val(xcx);
		auto_calc();
	});
	var jasa_kasbon = <?php echo $kas->x_value; ?>;
	function auto_calc(){
		var linker1 = document.getElementById('x_kasbon').value;
		var bunga = linker1*jasa_kasbon/100;
		$('#x_jasa').val(bunga);
		var total_bayar = parseInt(linker1) + parseInt(bunga);
		$('#x_total_bayar').val(total_bayar);
		$.ajax({
			url: '<?php echo base_url(); ?>convertidr/' + bunga,
			success: function(point){
				$('#jasa').val(point['besaran']);
			},
			cache: false
		});
		$.ajax({
			url: '<?php echo base_url(); ?>convertidr/' + total_bayar,
			success: function(point){
				$('#total_bayar').val(point['besaran']);
			},
			cache: false
		});
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