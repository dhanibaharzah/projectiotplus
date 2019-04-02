<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>gauges</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	
	<div class="row">
		<div class="col-md-12">
			<div id="container"></div>
		</div>
	</div>
<script>
//mixing 
var opts = {
		  lines: 12,
		  angle: 0.01,
		  lineWidth: 0.44,
		  pointer: {
			length: 0.9,
			strokeWidth: 0.035,
			color: '#000000'
		  },
		  staticLabels: {
		  font: "10px sans-serif",  // Specifies font
		  labels: [<?php echo $minmixred;?>,
				   <?php echo $gaugemaxred;?>,
				   <?php echo $gaugemaxyellow;?>,
				   <?php echo $gaugemaxgreen;?>],  // Print labels at these values
		  color: "#000000",  // Optional: Label text color
		  fractionDigits: 0  // Optional: Numerical precision. 0=round off.
		},
		staticZones: [
		   {strokeStyle: "#F03E3E", min: <?php echo $minmixred;?>, max: <?php echo $gaugemaxred;?>}, // Red from 
		   {strokeStyle: "#FFDD00", min: <?php echo $minmixyellow;?>, max: <?php echo $gaugemaxyellow;?>}, // Yellow
		   {strokeStyle: "#30B32D", min: <?php echo $minmixgreen;?>, max: <?php echo $gaugemaxgreen;?>} // Green
		],
		  limitMax: 'false', 
		  percentColors: [[0.0, "#a9d70b" ], [0.50, "#f9c802"], [1.0, "#ff0000"]], // !!!!
		  strokeColor: '#E0E0E0',
		  generateGradient: true
		};
	var target = document.getElementById('mixed');
	var gauge = new Gauge(target).setOptions(opts);
		gauge.maxValue = <?php echo $gaugemaxgreen;?>;
		gauge.animationSpeed = 32;
		//gauge.set();
		
	function refreshGauge1(){
	   val = parseInt($("#mixing").text())
	   if(isNaN(val)) return

	   gauge.set(val)
	}

	$('#mixing').load('<?php echo base_url(); ?>mixing', refreshGauge1)

	refreshGauge1();
</script>
</html>
