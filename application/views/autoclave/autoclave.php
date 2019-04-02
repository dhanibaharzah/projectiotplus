<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Autoclaves
			<small> realtime monitor</small>
		</h1>
	</section>
    
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 1</h3>
					</div>
					<div class="box-body">
						<div id="ac1_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 2</h3>
					</div>
					<div class="box-body">
						<div id="ac2_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 3</h3>
					</div>
					<div class="box-body">
						<div id="ac3_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 4</h3>
					</div>
					<div class="box-body">
						<div id="ac4_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 5</h3>
					</div>
					<div class="box-body">
						<div id="ac5_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 6</h3>
					</div>
					<div class="box-body">
						<div id="ac6_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 7</h3>
					</div>
					<div class="box-body">
						<div id="ac7_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Autoclave 8</h3>
					</div>
					<div class="box-body">
						<div id="ac8_chart" style="height: 300px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		
	</section>
</div>


<script>

//ac1 live chart
var chartac1 = Highcharts.chart('ac1_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac1x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac1y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});

	

//ac2 live chart
var chartac2 = Highcharts.chart('ac2_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac2x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac2y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	

//ac3 live chart
var chartac3 = Highcharts.chart('ac3_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac3x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac3y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	
	
//ac4 live chart
var chartac4 = Highcharts.chart('ac4_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac4x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac4y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	
//ac5 live chart
var chartac5 = Highcharts.chart('ac5_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac5x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac5y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	

//ac6 live chart
var chartac6 = Highcharts.chart('ac6_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac6x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac6y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});
	
//ac7 live chart
var chartac7 = Highcharts.chart('ac7_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac7x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac8y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});

//ac8 live chart
var chartac8 = Highcharts.chart('ac8_chart', {
	chart: {
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {text: null},
	xAxis: { type: 'datetime', tickPixelInterval: 100},
	credits: { enabled: false},
	yAxis: [{ 
        title: { text: 'barG', style: {
			color: Highcharts.getOptions().colors[0]}},
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[0]}}
		},{
        labels: { format: '{value}', style: {
			color: Highcharts.getOptions().colors[1]}},
        title: {text: '°C', style: {
			color: Highcharts.getOptions().colors[1]}}
		}],
	tooltip: { shared: true },
	legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pressure', type: 'spline', yAxis: 0,
		data: [<?php echo $ac8x ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'spline', yAxis: 1,
		data: [<?php echo $ac8y ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});


	
var socket = io('http://180.250.75.146:4000');
	socket.on('mqtt', function(data){
		var keep, yo;
		if(data.topic == 'ac1_pres'){
			payload_1	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac1_pres').text(val);
		}
		if(data.topic == 'ac1_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac1_temp').text(yo);
			var series1 = chartac1.series[1];
			var series0 = chartac1.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_1)], true, true);
		}
		if(data.topic == 'ac2_pres'){
			payload_2	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac2_pres').text(val);
		}
		if(data.topic == 'ac2_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac2_temp').text(yo);
			var series1 = chartac2.series[1];
			var series0 = chartac2.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_2)], true, true);
		}
		if(data.topic == 'ac3_pres'){
			payload_3	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac3_pres').text(val);
		}
		if(data.topic == 'ac3_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac3_temp').text(yo);
			var series1 = chartac3.series[1];
			var series0 = chartac3.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_3)], true, true);
		}
		if(data.topic == 'ac4_pres'){
			payload_4	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac4_pres').text(val);
		}
		if(data.topic == 'ac4_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac4_temp').text(yo);
			var series1 = chartac4.series[1];
			var series0 = chartac4.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_4)], true, true);
		}
		if(data.topic == 'ac5_pres'){
			payload_5	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac5_pres').text(val);
		}
		if(data.topic == 'ac5_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac5_temp').text(yo);
			var series1 = chartac5.series[1];
			var series0 = chartac5.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_5)], true, true);
		}
		if(data.topic == 'ac6_pres'){
			payload_6	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac6_pres').text(val);
		}
		if(data.topic == 'ac6_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac6_temp').text(yo);
			var series1 = chartac6.series[1];
			var series0 = chartac6.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_6)], true, true);
		}
		if(data.topic == 'ac7_pres'){
			payload_7	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac7_pres').text(val);
		}
		if(data.topic == 'ac7_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac7_temp').text(yo);
			var series1 = chartac7.series[1];
			var series0 = chartac7.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_7)], true, true);
		}
		if(data.topic == 'ac8_pres'){
			payload_8	= parseFloat(data.payload).toFixed(2);
			var val = parseFloat(data.payload).toFixed(2);
			$('#ac8_pres').text(val);
		}
		if(data.topic == 'ac8_temp'){
			time = (new Date()).getTime();
			yo = parseFloat(data.payload).toFixed(1);
			$('#ac8_temp').text(yo);
			var series1 = chartac8.series[1];
			var series0 = chartac8.series[0];
			y = parseFloat(yo);
			series1.addPoint([time, y], true, true);
			series0.addPoint([time, parseFloat(payload_8)], true, true);
		}
});
</script>