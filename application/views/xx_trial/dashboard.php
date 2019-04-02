<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-exchange"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Pinjaman Belum Lunas</span>
						<span class="info-box-number" id="pinjaman_blm_lunas"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-retweet"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Kasbon Belum Lunas</span>
						<span class="info-box-number" id="kasbon_blm_lunas"></span>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div id="container"></div>
			</div>
		</div>
    </section>
</div>
<script>
request_dashboard();
function request_dashboard(){
	$.ajax({
		url: '<?php echo base_url(); ?>x_ajax_dash',
		success: function(point){
			$('#pinjaman_blm_lunas').html(point['pinjaman_blm_lunas']);
			$('#kasbon_blm_lunas').html(point['kasbon_blm_lunas']);
		},
		cache: false
	});
}
$('#container').load('<?php echo base_url(); ?>cash_flow/<?php echo date('Y-m-d'); ?>');
</script>