<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-dashboard"></i> Dashboard
			<small>Control Panel</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div id="mortar_stock"></div>
		</div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="box box-solid">
					<div class="box-body">
						<h3 class="text-center">
							Acidity
							<small>Water Quality</small>
						</h3>
						<div id="prod_js_boilerph">
							<div class="text-center inner"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="box box-solid">
					<div class="box-body">
						<h3 class="text-center">
							Electric Conductivity
							<small>Water Quality</small>
						</h3>
						<div id="prod_js_boilercd">
							<div class="text-center inner"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="box box-solid">
					<div class="box-body">
						<h3 class="text-center">
							Turbidity
							<small>Water Quality</small>
						</h3>
						<div id="prod_js_boilertb">
							<div class="text-center inner"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript"> 
$('#prod_js_boilerph').load('<?php echo base_url(); ?>prod_js_boilerph');
$('#prod_js_boilercd').load('<?php echo base_url(); ?>prod_js_boilercd');
$('#prod_js_boilertb').load('<?php echo base_url(); ?>prod_js_boilertb');
$('#mortar_stock').load('<?php echo base_url(); ?>get_mortar_group');
</script>

