<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Electricity
			<small> quality and quantity monitor</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title">PV Meter</h4>
					</div>
					<div class="box-body">
						<div id="iot_js_solar_main" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url();?>iot_pv_record" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Detail</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title">400V Main Power Meter</h4>
					</div>
					<div class="box-body">
						<div id="iot_js_pwr2_main" class="col-lg-12 col-xs-12"></div>
					</div>
					<div class="box-footer">
						<small>*Shown PF is invalid during negatif Active power (P)</small>
						<a href="<?php echo base_url();?>iot_pwr_record" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Detail</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title">400V Main Power Meter</h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-3 col-xs-12 text-center">
								<h4><i class="fa fa-bolt text-green"></i> <b>Main Meter LV 400V</b><br>LV Power meter</h4>
								<p>Device: <b>PM8000 Schneider</b><br>Load: <b>All LV Machine</b><br>Location: <b>MDB Room</b></p>
							</div>
							<div id="iot_js_400volt" class="col-lg-6 col-xs-12"></div>
							<div id="iot_js_voltunbalance" class="col-lg-3 col-xs-12"></div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-12 text-center">
								<h4><i class="fa fa-bolt text-yellow"></i> <b>Main Meter LV 400V</b><br>LV Power meter</h4>
								<p>Device: <b>PM8000 Schneider</b><br>Load: <b>All LV Machine</b><br>Location: <b>MDB Room</b></p>
							</div>
							<div id="iot_js_400amp" class="col-lg-6 col-xs-12"></div>
							<div id="iot_js_ampunbalance" class="col-lg-3 col-xs-12"></div>
						</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url();?>iot_pwr_record" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Detail</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4 class="box-title">6000V Current Meter</h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-3 col-xs-12 text-center">
								<h4><i class="fa fa-bolt text-aqua"></i> <b>QMC-2</b><br>Ballmill 2 Current meter</h4>
								<p>Device: <b>SEPAM M20 Schneider</b><br>Load: <b>570kW Motor</b><br>Location: <b>MDB Room</b></p>
							</div>
							<div id="iot_js_qmc2" class="col-lg-6 col-xs-12"></div>
							<div id="iot_js_qmc2unbalance" class="col-lg-3 col-xs-12"></div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-xs-12 text-center">
								<h4><i class="fa fa-bolt text-red"></i> <b>QMC-3</b><br>Ballmill 3 Current meter</h4>
								<p>Device: <b>SEPAM M20 Schneider</b><br>Load: <b>570kW Motor</b><br>Location: <b>MDB Room</b></p>
							</div>
							<div id="iot_js_qmc3" class="col-lg-6 col-xs-12"></div>
							<div id="iot_js_qmc3unbalance" class="col-lg-3 col-xs-12"></div>
						</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url();?>iot_sepam_record/2" class="btn btn-xs btn-primary pull-right"><i class="fa fa-history"></i> Detail</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4><i class="fa fa-bolt"></i> Realtime Calculation from <?php echo date('Y-m-d');?> 00:00:00 GMT+7</h4>
			</div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_amp"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_power"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_sepam"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_solar"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_electotal"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_elecprice"></div>
		</div>
	</section>
</div>
<script>
	$('#iot_js_solar_main').load('<?php echo base_url(); ?>iot_js_solar_main');
	$('#iot_js_pwr2_main').load('<?php echo base_url(); ?>iot_js_pwr2_main');
	$('#iot_js_400volt').load('<?php echo base_url(); ?>iot_js_400volt');
	$('#iot_js_voltunbalance').load('<?php echo base_url(); ?>iot_js_voltunbalance');
	$('#iot_js_400amp').load('<?php echo base_url(); ?>iot_js_400amp');
	$('#iot_js_ampunbalance').load('<?php echo base_url(); ?>iot_js_ampunbalance');
	$('#iot_js_qmc2').load('<?php echo base_url(); ?>iot_js_qmc2');
	$('#iot_js_qmc2unbalance').load('<?php echo base_url(); ?>iot_js_qmc2unbalance');
	$('#iot_js_qmc3').load('<?php echo base_url(); ?>iot_js_qmc3');
	$('#iot_js_qmc3unbalance').load('<?php echo base_url(); ?>iot_js_qmc3unbalance');
	
	$('.iot_amp').load('<?php echo base_url(); ?>iot_amp');
	$('.iot_power').load('<?php echo base_url(); ?>iot_power');
	$('.iot_sepam').load('<?php echo base_url(); ?>iot_sepam');
	$('.iot_solar').load('<?php echo base_url(); ?>iot_solar');
	$('.iot_electotal').load('<?php echo base_url(); ?>iot_electotal');
	$('.iot_elecprice').load('<?php echo base_url(); ?>iot_elecprice');
	
</script>