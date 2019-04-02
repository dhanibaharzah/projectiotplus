<!DOCTYPE html>
<div class="col-md-4 col-xs-6">
	<canvas id="gauge1<?php echo $ajax_link; ?>"></canvas>
	<p><?php echo $mc_name_1; ?> <b><span id="col<?php echo $mc_name_1; ?>"></span></b> <?php echo $unit_1; ?></p>
</div>
<div class="col-md-8 col-xs-6">
	<div class="text-center">
		<canvas id="gauge2<?php echo $ajax_link; ?>"></canvas>
	</div>
	<p class="text-center"><?php echo $mc_name_2; ?> <b><span id="col<?php echo $mc_name_2; ?>"></span></b> <?php echo $unit_2; ?></p>
</div>

<script>
	var span1<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_1; ?>");
	var span2<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_2; ?>");
	
	var gauge1<?php echo $ajax_link; ?> = new LinearGauge({
		renderTo: 'gauge1<?php echo $ajax_link; ?>',
		width: 80,
		height: 120,
		units: "°C",
		minValue: 0,
		startAngle: 90,
		ticksAngle: 180,
		valueBox: false,
		maxValue: 100,
		majorTicks: ["0", "20", "40", "60", "80", "100"],
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
			{
				"from": 60,
				"to": 100,
				"color": "rgba(200, 50, 50, .75)"
			}
		],
		colorPlate: "#fff",
		borderShadowWidth: 0,
		borders: false,
		needleType: "arrow",
		needleWidth: 2,
		needleCircleSize: 7,
		needleCircleOuter: true,
		needleCircleInner: false,
		animationDuration: 500,
		animationRule: "linear",
		barWidth: 10,
		value: 0
	}).draw();
	var gauge2<?php echo $ajax_link; ?> = new RadialGauge({
		renderTo: 'gauge2<?php echo $ajax_link; ?>',
		units: "°",
		width: 120,
		height: 120,
		minValue: 0,
		startAngle: 90,
		ticksAngle: 180,
		valueBox: false,
		maxValue: 180,
		majorTicks: ["0","45","90", "135", "180"],
		minorTicks: 2,
		strokeTicks: true,
		colorPlate: "#fff",
		borderShadowWidth: 0,
		borders: false,
		needleType: "arrow",
		needleWidth: 2,
		needleCircleSize: 7,
		needleCircleOuter: true,
		needleCircleInner: false,
		animationDuration: 500,
		animationRule: "linear",
		animationTarget: "plate"
	}).draw();
	
	request_ajax<?php echo $ajax_link; ?>();
	setInterval(function(){
		request_ajax<?php echo $ajax_link; ?>();
	}, <?php echo $ajax_delay; ?>)
	
	function request_ajax<?php echo $ajax_link; ?>() {
		$.ajax({
			url: '<?php echo base_url(); ?><?php echo $ajax_link; ?>',
			success: function(point){
				$('#col<?php echo $mc_name_1; ?>').html(point['gauge1<?php echo $ajax_link; ?>']);
				gauge1<?php echo $ajax_link; ?>.value = point['gauge1<?php echo $ajax_link; ?>'];
				$('#col<?php echo $mc_name_2; ?>').html(point['gauge2<?php echo $ajax_link; ?>']);
				gauge2<?php echo $ajax_link; ?>.value = point['gauge2<?php echo $ajax_link; ?>'];
			},
			cache: false
		});
	}
</script>
