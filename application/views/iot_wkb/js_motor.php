<!DOCTYPE html>
<div class="col-md-6 col-xs-6 text-center">
    <canvas id="gauge1<?php echo $ajax_link; ?>"></canvas>
    <p><?php echo $mc_name_1; ?> <b><span id="col<?php echo $mc_name_1; ?>"></span></b> <?php echo $unit_1; ?></p>
</div>
<div class="col-md-6 col-xs-6 text-center">
    <canvas id="gauge2<?php echo $ajax_link; ?>"></canvas>
    <p><?php echo $mc_name_2; ?> <b><span id="col<?php echo $mc_name_2; ?>"></span></b> <?php echo $unit_2; ?></p>
</div>
<script>
	var span1<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_1; ?>");
	var lim1_1<?php echo $ajax_link; ?> = <?php echo $limit1_1; ?>;
	var lim1_2<?php echo $ajax_link; ?> = <?php echo $limit1_2; ?>;
	var lim1_3<?php echo $ajax_link; ?> = <?php echo $limit1_3; ?>;
	var lim1_4<?php echo $ajax_link; ?> = <?php echo $limit1_4; ?>;
	var lim1_5<?php echo $ajax_link; ?> = <?php echo $limit1_5; ?>;
	var lim1_6<?php echo $ajax_link; ?> = <?php echo $limit1_6; ?>;
	var gauge1<?php echo $ajax_link; ?> = new RadialGauge({
		renderTo: 'gauge1<?php echo $ajax_link; ?>',
		units: "<?php echo $unit_1; ?>",
		width: <?php echo $size; ?>,
		height: <?php echo $size; ?>,
		minValue: lim1_1<?php echo $ajax_link; ?>,
		maxValue: lim1_6<?php echo $ajax_link; ?>,
		valueBox: false,
		majorTicks: <?php echo $majortick1; ?>,
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
				{
					"from": lim1_1<?php echo $ajax_link; ?>, "to": lim1_2<?php echo $ajax_link; ?>,
					"color": "#ff6363" //RED
				},{
					"from": lim1_2<?php echo $ajax_link; ?>, "to": lim1_3<?php echo $ajax_link; ?>,
					"color": "rgb(244, 229, 66)"//YELLOW
				},{
					"from": lim1_3<?php echo $ajax_link; ?>, "to": 0,
					"color": "rgb(86, 244, 65)" //GREEN
				},{
					"from": 0, "to": lim1_4<?php echo $ajax_link; ?>,
					"color": "rgb(86, 244, 65)" //GREEN
				},{
					"from": lim1_4<?php echo $ajax_link; ?>, "to": lim1_5<?php echo $ajax_link; ?>,
					"color": "rgb(244, 229, 66)"//YELLOW
				},{
					"from": lim1_5<?php echo $ajax_link; ?>, "to": lim1_6<?php echo $ajax_link; ?>,
					"color": "#ff6363" //RED
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
		animationRule: "linear"
	}).draw();
	
	var span2<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_2; ?>");
	var lim2_1<?php echo $ajax_link; ?> = <?php echo $limit2_1; ?>;
	var lim2_2<?php echo $ajax_link; ?> = <?php echo $limit2_2; ?>;
	var lim2_3<?php echo $ajax_link; ?> = <?php echo $limit2_3; ?>;
	var gauge2<?php echo $ajax_link; ?> = new RadialGauge({
		renderTo: 'gauge2<?php echo $ajax_link; ?>',
		units: "<?php echo $unit_2; ?>",
		width: <?php echo $size; ?>,
		height: <?php echo $size; ?>,
		minValue: 0,
		maxValue: lim2_3<?php echo $ajax_link; ?>,
		valueBox: false,
		majorTicks: <?php echo $majortick2; ?>,
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
		<?php if($unit_2 == 'A'){ ?>
				{
					"from": 0, "to": lim2_1<?php echo $ajax_link; ?>,
					"color": "rgb(86, 244, 65)" //GREEN
				},{
					"from": lim2_1<?php echo $ajax_link; ?>, "to": lim2_2<?php echo $ajax_link; ?>,
					"color": "rgb(244, 229, 66)"//YELLOW
				},{
					"from": lim2_2<?php echo $ajax_link; ?>, "to": lim2_3<?php echo $ajax_link; ?>,
					"color": "#ff6363" //RED
				}
		<?php }else{ ?>
				{
					"from": 0, "to": lim2_1<?php echo $ajax_link; ?>,
					"color": "#84b3ff" //BLUE1
				},{
					"from": lim2_1<?php echo $ajax_link; ?>, "to": lim2_2<?php echo $ajax_link; ?>,
					"color": "#598ee5"//BLUE2
				},{
					"from": lim2_2<?php echo $ajax_link; ?>, "to": lim2_3<?php echo $ajax_link; ?>,
					"color": "#2d77ef" //BLUE3
				}
		<?php } ?>
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
		animationRule: "linear"
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

