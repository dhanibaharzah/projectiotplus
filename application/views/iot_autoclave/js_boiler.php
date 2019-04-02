<!DOCTYPE html>
<div class="row">
	<div class="col-md-2 col-xs-12 text-center">
		<canvas id="boiler_water_lvl"></canvas>
		<p>Boiler Water <b><span id="col_boiler_water"></span></b> %</p>
	</div>
	<div class="col-md-8 col-xs-12 text-center">
		<div class="row">
			<div class="col-md-3 col-xs-6">
				<canvas id="boiler_pressure"></canvas>
			</div>
			<div class="col-md-3 col-xs-6">
				<canvas id="steam_flow"></canvas>
			</div>
			<div class="col-md-3 col-xs-6">
				<canvas id="oxygen"></canvas>
			</div>
			<div class="col-md-3 col-xs-6">
				<canvas id="flue_gas"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-xs-6">
				<h5><b>Bed 1</b><span class="label label-danger pull-right"></span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$bed1_p.'" aria-valuemin="0" aria-valuemax="900" style="width: '.$bed1_p.'%"></div>
				</div>
				<h5><b>Bed 2</b><span class="label label-danger pull-right"></span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$bed2_p.'" aria-valuemin="0" aria-valuemax="250" style="width: '.$bed2_p.'%"></div>
				</div>
			</div>
			<div class="col-md-3 col-xs-6">
				
			</div>
			<div class="col-md-3 col-xs-6">
				
			</div>
			<div class="col-md-3 col-xs-6">
				
			</div>
		</div>
	</div>
	<div class="col-md-2 col-xs-12 text-center">
		<canvas id="feed_water_lvl"></canvas>
		<p><?php echo $mc_name_4; ?> <b><span id="col<?php echo $mc_name_4; ?>"></span></b> <?php echo $unit_4; ?></p>
	</div>
</div>
<script>
	
</script>

