

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Laoding Unloading Rail
			<small> realtime monitor</small>
		</h1>
	</section>
    
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<div id="unloading" style="height: 200px; margin: 0 auto"></div>
						<div id="pusher_out" style="height: 200px; margin: 0 auto"></div>
						<div id="loading" style="height: 200px; margin: 0 auto"></div>
						<div id="pusher_in" style="height: 200px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
Highcharts.setOptions({
	global: {
		useUTC: false
	}
});

var unloading = Highcharts.chart('unloading', {
	chart: {
		type: 'spline',
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {
		text: 'Unloading Pusher'
		},
	xAxis: {
		type: 'datetime',
		tickPixelInterval: 150
		},
	credits: {
		enabled: false
		},
	yAxis: [{
		min: 0,
		max: 10,
        labels: { format: '{value}'},
        title: {text: 'Amp'},
		tickInterval:5
		}],
	tooltip: {
		formatter: function () {
			return '<b>' + this.series.name + '</b><br/>' +
			Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
			Highcharts.numberFormat(this.y, 2);
			}
		},
	legend: {
		enabled: false
		},
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Unloading Pusher (A)',
		data: [<?php echo $unloading?>]
		}]
	});
var pusher_out = Highcharts.chart('pusher_out', {
	chart: {
		type: 'spline',
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {
		text: 'Pusher TFAC-Out'
		},
	xAxis: {
		type: 'datetime',
		tickPixelInterval: 150
		},
	credits: {
		enabled: false
		},
	yAxis: [{
		min: 0,
		max: 10,
        labels: { format: '{value}'},
        title: {text: 'Amp'},
		tickInterval:5
		}],
	tooltip: {
		formatter: function () {
			return '<b>' + this.series.name + '</b><br/>' +
			Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
			Highcharts.numberFormat(this.y, 2);
			}
		},
	legend: {
		enabled: false
		},
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pusher TFAC-Out (A)',
		data: [<?php echo $pusher_out?>]
		}]
	});
var loading = Highcharts.chart('loading', {
	chart: {
		type: 'spline',
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {
		text: 'Loading Pusher'
		},
	xAxis: {
		type: 'datetime',
		tickPixelInterval: 150
		},
	credits: {
		enabled: false
		},
	yAxis: [{
		min: 0,
		max: 10,
        labels: { format: '{value}'},
        title: {text: 'Amp'},
		tickInterval:5
		}],
	tooltip: {
		formatter: function () {
			return '<b>' + this.series.name + '</b><br/>' +
			Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
			Highcharts.numberFormat(this.y, 2);
			}
		},
	legend: {
		enabled: false
		},
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Loading Pusher (A)',
		data: [<?php echo $loading?>]
		}]
	});
var pusher_in = Highcharts.chart('pusher_in', {
	chart: {
		type: 'spline',
		animation: Highcharts.svg, // don't animate in old IE
		marginRight: 10
		},
	title: {
		text: 'Pusher TFAC-In'
		},
	xAxis: {
		type: 'datetime',
		tickPixelInterval: 150
		},
	credits: {
		enabled: false
		},
	yAxis: [{
		min: 0,
		max: 10,
        labels: { format: '{value}'},
        title: {text: 'Amp'},
		tickInterval:5
		}],
	tooltip: {
		formatter: function () {
			return '<b>' + this.series.name + '</b><br/>' +
			Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
			Highcharts.numberFormat(this.y, 2);
			}
		},
	legend: {
		enabled: false
		},
	exporting: {
		enabled: false
	},
	series: [{
		name: 'Pusher TFAC-In (A)',
		data: [<?php echo $pusher_in?>]
		}]
	});
var socket = io('http://180.250.75.146:4000');
	socket.on('mqtt', function(data){
	if(data.topic == 'unloading'){
			var series = unloading.series[0];
			var x = (new Date()).getTime(), // current time
			y = parseFloat(data.payload);
			series.addPoint([x, y], true, true);
		}
	if(data.topic == 'pusher_in'){
			var series = pusher_in.series[0];
			var x = (new Date()).getTime(), // current time
			y = parseFloat(data.payload);
			series.addPoint([x, y], true, true);
		}
	if(data.topic == 'pusher_out'){
			var series = pusher_out.series[0];
			var x = (new Date()).getTime(), // current time
			y = parseFloat(data.payload);
			series.addPoint([x, y], true, true);
		}
	if(data.topic == 'loading'){
			var series = loading.series[0];
			var x = (new Date()).getTime(), // current time
			y = parseFloat(data.payload);
			series.addPoint([x, y], true, true);
		}
});
</script>