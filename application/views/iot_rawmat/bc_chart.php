<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>chart</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	
	<div class="row">
		<div class="col-md-12">
			<div id="container"></div>
			<table class="table table-hover table-striped table-bordered ">
				<tr>
					<th>Timestamp</th>
					<th>Water Flow(l/min)</th>
					<th>Sand Flow(kg/m)</th>
					<th>Belt Speed(mm/s)</th>
					<th>BM Flow(ton/h)</th>
					<th>Total(ton)</th>
				</tr>
				<?php
					if(!empty($bctable)){
						foreach($bctable as $record){
				?>
				<tr>
					<td><?php echo $record->timestamp ?></td>
					<td><?php echo number_format($record->cuwd, 0, '.', '') ?></td>
					<td><?php echo number_format($record->totalflow/10, 1, '.', '') ?></td>
					<td><?php echo number_format($record->avgflow, 1, '.', '') ?></td>
					<td><?php echo number_format($record->freq/10, 1, '.', '') ?></td>
					<td><?php echo $record->cspeed ?></td>
				</tr>
				<?php
						}
					}
				?>
			</table>
		</div>
	</div>
<script>
	Highcharts.setOptions({
		global: {
			useUTC: false
		}
	});
	Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: ''
    },
	xAxis: { type: 'datetime'},
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value} ton/h',
            style: {color: Highcharts.getOptions().colors[0]}
        },
        title: {
            text: 'BM Flow',
            style: {color: Highcharts.getOptions().colors[0]}
        },
        opposite: true
    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: 'Water Flow',
            style: {color: Highcharts.getOptions().colors[1]}
        },
        labels: {
            format: '{value} l/min',
            style: {color: Highcharts.getOptions().colors[1]}
        }

    }, { // 3rd yAxis
        gridLineWidth: 0,
        title: {
            text: 'Sand Flow',
            style: {color: Highcharts.getOptions().colors[2]}
        },
        labels: {
            format: '{value} kg/m',
            style: {color: Highcharts.getOptions().colors[2]}
        }

    }, { // 4th yAxis
        gridLineWidth: 0,
        title: {
            text: 'Belt Speed',
            style: {color: Highcharts.getOptions().colors[3]}
        },
        labels: {
            format: '{value} mm/s',
            style: {color: Highcharts.getOptions().colors[3]}
        }

    }],
    tooltip: {
        shared: true
    },
    
    series: [{
        name: 'Water Flow(l/min)',
        type: 'spline',
        yAxis: 1,
        data: [<?php echo $wateraxis; ?>]

    },{
        name: 'Sand Flow(kg/m)',
        type: 'spline',
        yAxis: 2,
        data: [<?php echo $sandaxis; ?>]

    },{
        name: 'Belt Speed(mm/s)',
        type: 'spline',
        yAxis: 3,
        data: [<?php echo $speedaxis; ?>]

    },{
        name: 'BM Flow(ton/h)',
        type: 'spline',
        data: [<?php echo $bmaxis; ?>]
    }]
});
</script>
</html>