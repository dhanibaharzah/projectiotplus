<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Raw Material Overview
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-8 col-xs-12" id="iot_js_material"></div>
			<div class="col-md-4 col-xs-12">
				<div class="box box-solid">
					<div class="box-body">
						<div class="col-md-12 col-xs-12">
							<div id="iot_js_silo"></div>
						</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>iot_mat_table" class="btn btn-sm btn-primary pull-right"><i class="fa fa-history"></i> Material</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-body">
						<div class="col-md-6">
							<div id="iot_js_ampbm2"></div>
						</div>
						<div class="col-md-6">
							<div id="iot_js_ampbm3"></div>
						</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>iot_sepam_record/3" class="btn btn-sm btn-primary pull-right"><i class="fa fa-history"></i> Ballmil 3</a>
						<a href="<?php echo base_url(); ?>iot_sepam_record/2" class="btn btn-sm btn-primary pull-left"><i class="fa fa-history"></i> Ballmil 2</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12" id="iot_js_bm_flow"></div>
			<div class="col-md-12 col-xs-12">
				<div class="box box-solid">
					<div class="box-body">
						<div id="iot_bm_flow"></div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>ballrec/3" class="btn btn-sm btn-primary pull-right"><i class="fa fa-history"></i> Ballmil 3</a>
						<a href="<?php echo base_url(); ?>ballrec/2" class="btn btn-sm btn-primary pull-right"><i class="fa fa-history"></i> Ballmil 2</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
$('#iot_js_material').load('<?php echo base_url(); ?>iot_js_material');
$('#iot_js_silo').load('<?php echo base_url(); ?>iot_js_silo');
$('#iot_js_bm_flow').load('<?php echo base_url(); ?>iot_js_bm_flow');
$('#iot_js_ampbm2').load('<?php echo base_url(); ?>iot_js_ampbm2');
$('#iot_js_ampbm3').load('<?php echo base_url(); ?>iot_js_ampbm3');
$('#iot_bm_flow').load('<?php echo base_url(); ?>iot_bm_flow');

</script>