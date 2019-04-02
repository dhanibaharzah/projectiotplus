<!DOCTYPE html>
<div class="col-md-<?php echo 12/$ena; ?> col-xs-6 text-center">
    <canvas id="gauge1<?php echo $ajax_link; ?>"></canvas>
    <p>Feedwater <br> <b><span id="col<?php echo $mc_name_1; ?>"></span></b> <?php echo $unit_1; ?></p>
</div>
<?php if($ena > 1){ ?>
<div class="col-md-<?php echo 12/$ena; ?> col-xs-6 text-center">
    <canvas id="gauge2<?php echo $ajax_link; ?>"></canvas>
    <p>Boiler <br> <b><span id="col<?php echo $mc_name_2; ?>"></span></b> <?php echo $unit_2; ?></p>
</div>
<?php }if($ena > 2){ ?>
<div class="col-md-<?php echo 12/$ena; ?> col-xs-6 text-center">
    <canvas id="gauge3<?php echo $ajax_link; ?>"></canvas>
    <p>Blowdown <br> <b><span id="col<?php echo $mc_name_3; ?>"></span></b> <?php echo $unit_3; ?></p>
</div>
<?php }if($ena > 3){ ?>
<div class="col-md-<?php echo 12/$ena; ?> col-xs-6 text-center">
    <canvas id="gauge4<?php echo $ajax_link; ?>"></canvas>
    <p><?php echo $mc_name_4; ?> <br> <b><span id="col<?php echo $mc_name_4; ?>"></span></b> <?php echo $unit_4; ?></p>
</div>
<?php } ?>
<script>
    var span1<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_1; ?>");
    var lim1_1<?php echo $ajax_link; ?> = <?php echo $limit1_1; ?>;
	var lim1_2<?php echo $ajax_link; ?> = <?php echo $limit1_2; ?>;
    var lim1_3<?php echo $ajax_link; ?> = <?php echo $limit1_3; ?>;
    var gauge1<?php echo $ajax_link; ?> = new RadialGauge({
		renderTo: 'gauge1<?php echo $ajax_link; ?>',
		units: "<?php echo $unit_1; ?>",
        width: 150,
		height: 150,
        minValue: 0,
		maxValue: 200,
		valueBox: true,
		majorTicks: <?php echo $majortick1; ?>,
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
            {
					"from": <?php if(!empty($lower_tick1)){echo $lower_tick1; }else{echo '0';}?>, "to": lim3_1<?php echo $ajax_link; ?>,
					"color": "#ffffff" //RED
				},{
					"from": lim1_1<?php echo $ajax_link; ?>, "to": lim1_2<?php echo $ajax_link; ?>,
					"color": "<?php if(!empty($color_mid1)){ echo $color_mid1;} else{echo "rgb(255, 255, 255)";} ?>" //YELLOW
				},{
					"from": lim1_2<?php echo $ajax_link; ?>, "to": lim1_3<?php echo $ajax_link; ?>,
					"color": "#ffffff"//"rgb(86, 244, 65)" //GREEN
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
		animationDuration: 1000,
		animationRule: "linear"
    }).draw();
<?php if($ena > 1){ ?>
    var span2<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_2; ?>");
    var lim2_1<?php echo $ajax_link; ?> = <?php echo $limit2_1; ?>;
	var lim2_2<?php echo $ajax_link; ?> = <?php echo $limit2_2; ?>;
    var lim2_3<?php echo $ajax_link; ?> = <?php echo $limit2_3; ?>;
    var gauge2<?php echo $ajax_link; ?> = new RadialGauge({
		renderTo: 'gauge2<?php echo $ajax_link; ?>',
        units: "<?php echo $unit_2; ?>",
        width: 150,
		height: 150,
		minValue: 0,
		maxValue: 200,
		valueBox: true,
		majorTicks: <?php echo $majortick2; ?>,
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
            {
					"from": 0, "to": 50,
					"color": "rgb(0, 255, 0)" //green
				},{
					"from": 50, "to": 200,
					"color": "rgb(255, 0, 0)" //red
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
		animationDuration: 1000,
		animationRule: "linear"
    }).draw();
<?php }if($ena > 2){ ?>
    var span3<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_3; ?>");
    var lim3_1<?php echo $ajax_link; ?> = <?php echo $limit3_1; ?>;
	var lim3_2<?php echo $ajax_link; ?> = <?php echo $limit3_2; ?>;
    var lim3_3<?php echo $ajax_link; ?> = <?php echo $limit3_3; ?>;
    var gauge3<?php echo $ajax_link; ?> = new RadialGauge({
		renderTo: 'gauge3<?php echo $ajax_link; ?>',
        units: "<?php echo $unit_3; ?>",
        width: 150,
		height: 150,
		minValue: 0,
		maxValue: 200,
		valueBox: true,
		majorTicks: <?php echo $majortick3; ?>,
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
            {
					"from": 0, "to": 100,
					"color": "rgb(0, 255,0)" //green
				},{
					"from": 100, "to": 200,
					"color": "rgb(255, 0,0)" //red
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
		animationDuration: 1000,
		animationRule: "linear"
    }).draw();
<?php }if($ena > 3){ ?>
    var span4<?php echo $ajax_link; ?> = document.getElementById("col<?php echo $mc_name_4; ?>");
    var lim4_1<?php echo $ajax_link; ?> = <?php echo $limit4_1; ?>;
	var lim4_2<?php echo $ajax_link; ?> = <?php echo $limit4_2; ?>;
    var lim4_3<?php echo $ajax_link; ?> = <?php echo $limit4_3; ?>;
    var gauge4<?php echo $ajax_link; ?> = new RadialGauge({
		renderTo: 'gauge4<?php echo $ajax_link; ?>',
        units: "<?php echo $unit_4; ?>",
        width: 150,
		height: 150,
		minValue: 0,
		maxValue: lim4_3<?php echo $ajax_link; ?>,
		valueBox: true,
		majorTicks: <?php echo $majortick4; ?>,
		minorTicks: 2,
		strokeTicks: true,
		highlights: [
				{
					"from": <?php if(!empty($lower_tick4)){echo $lower_tick4; }else{echo '0';}?>, "to": lim4_1<?php echo $ajax_link; ?>,
					"color": "<?php echo $color_start4; ?>"//"#ff6363" //RED
				},{
					"from": lim4_1<?php echo $ajax_link; ?>, "to": lim4_2<?php echo $ajax_link; ?>,
					"color": "<?php if(!empty($color_mid4)){ echo $color_mid4;} else{echo "rgb(244, 229, 66)";} ?>" //YELLOW
				},{
					"from": lim4_2<?php echo $ajax_link; ?>, "to": lim4_3<?php echo $ajax_link; ?>,
					"color": "<?php echo $color_end4; ?>"//"rgb(86, 244, 65)" //GREEN
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
		animationDuration: 1000,
		animationRule: "linear"
    }).draw();
<?php } ?>

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
            <?php if($ena > 1){ ?>
                $('#col<?php echo $mc_name_2; ?>').html(point['gauge2<?php echo $ajax_link; ?>']);
                gauge2<?php echo $ajax_link; ?>.value = point['gauge2<?php echo $ajax_link; ?>'];
            <?php }if($ena > 2){ ?>
                $('#col<?php echo $mc_name_3; ?>').html(point['gauge3<?php echo $ajax_link; ?>']);
                gauge3<?php echo $ajax_link; ?>.value = point['gauge3<?php echo $ajax_link; ?>'];
            <?php }if($ena > 3){ ?>
                $('#col<?php echo $mc_name_4; ?>').html(point['gauge4<?php echo $ajax_link; ?>']);
                gauge4<?php echo $ajax_link; ?>.value = point['gauge4<?php echo $ajax_link; ?>'];
            <?php } ?>
            },
            cache: false
		});
	}    


</script>

