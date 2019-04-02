<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-cut" aria-hidden="true"></i> Cutting Machine Overview
			<small></small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid">
			<div class="box-header">
				<h4 class="box-title">Tilting 1</h4>
			</div>
			<div class="box-body">
				<div class="row">
					<div id="iot_js_tilting1_1" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting1_2" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting1_6" class="col-md-3 col-xs-12"></div>
				</div>
			</div>
		</div>
		<div class="box box-solid">
			<div class="box-header">
				<h4 class="box-title">Tilting 2</h4>
			</div>
			<div class="box-body">
				<div class="row">
					<div id="iot_js_tilting2_1" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_2" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_6" class="col-md-3 col-xs-12"></div>
					<div id="iot_js_tilting2_8" class="col-md-3 col-xs-12"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="box box-solid">
					<div class="box-header">
						<h4 class="box-title">Trolley</h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div id="iot_js_trolley_1" class="col-md-6 col-xs-12"></div>
							<div id="iot_js_trolley_2" class="col-md-6 col-xs-12"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="box box-solid">
					<div class="box-header">
						<h4 class="box-title">Cross Cutting</h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div id="iot_js_crosscutter_1" class="col-md-4 col-xs-12"></div>
							<div id="iot_js_crosscutter_2" class="col-md-4 col-xs-12"></div>
							<div id="iot_js_crosscutter_3" class="col-md-4 col-xs-12"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="box box-solid">
					<div class="box-header">
						<h4 class="box-title">Cutting Board Refeeding</h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div id="iot_js_refeeding_1" class="col-md-6 col-xs-12"></div>
							<div id="iot_js_refeeding_2" class="col-md-6 col-xs-12"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</section>
</div>
<script>
	$('#iot_js_tilting1_1').load('<?php echo base_url(); ?>iot_js_tilting1_1');
	$('#iot_js_tilting1_2').load('<?php echo base_url(); ?>iot_js_tilting1_2');
	$('#iot_js_tilting1_6').load('<?php echo base_url(); ?>iot_js_tilting1_6');
	
	$('#iot_js_tilting2_1').load('<?php echo base_url(); ?>iot_js_tilting2_1');
	$('#iot_js_tilting2_2').load('<?php echo base_url(); ?>iot_js_tilting2_2');
	$('#iot_js_tilting2_6').load('<?php echo base_url(); ?>iot_js_tilting2_6');
	$('#iot_js_tilting2_8').load('<?php echo base_url(); ?>iot_js_tilting2_8');
	
	$('#iot_js_trolley_1').load('<?php echo base_url(); ?>iot_js_trolley_1');
	$('#iot_js_trolley_2').load('<?php echo base_url(); ?>iot_js_trolley_2');
	
	$('#iot_js_refeeding_1').load('<?php echo base_url(); ?>iot_js_refeeding_1');
	$('#iot_js_refeeding_2').load('<?php echo base_url(); ?>iot_js_refeeding_2');
	
	$('#iot_js_crosscutter_1').load('<?php echo base_url(); ?>iot_js_crosscutter_1');
	$('#iot_js_crosscutter_2').load('<?php echo base_url(); ?>iot_js_crosscutter_2');
	$('#iot_js_crosscutter_3').load('<?php echo base_url(); ?>iot_js_crosscutter_3');
</script>