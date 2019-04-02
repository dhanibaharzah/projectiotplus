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
					<th>Process</th>
					<th>Pressure(barG)</th>
					<th>Temperature(&deg C)</th>
					<th>Valve(%)</th>
					<th>Info</th>
				</tr>
				<?php
					if(!empty($actable))
					{
						foreach($actable as $record)
						{
				?>
				<tr>
					<td><?php echo $record->timestamp ?></td>
					<td>
					<?php 
						if($record->proces == 0){echo '<span class="label label-default">IDLE</span>';}
						if($record->proces == 1){echo '<span class="label label-success">Vacuum</span>';}
						if($record->proces == 2){echo '<span class="label label-success">Finish Vacuum</span>';}
						if($record->proces == 3){echo '<span class="label label-primary">Transfer In</span>';}
						if($record->proces == 4){echo '<span class="label label-primary">Finish Transfer In</span>';}
						if($record->proces == 5){echo '<span class="label label-danger">Rising</span>';}
						if($record->proces == 6){echo '<span class="label label-danger">Finish Rising</span>';}
						if($record->proces == 7){echo '<span class="label label-warning">Keeping</span>';}
						if($record->proces == 8){echo '<span class="label label-warning">Finish Keeping</span>';}
						if($record->proces == 9){echo '<span class="label label-info">Transfer Out</span>';}
						if($record->proces == 10){echo '<span class="label label-info">Finish Transfer Out</span>';}
						if($record->proces == 11){echo '<span class="label label-default">Blow Off</span>';}
					?>
					</td>
					<td><?php echo number_format($record->pressure, 2, '.', '') ?></td>
					<td><?php echo number_format($record->temperature, 1, '.', '') ?></td>
					<td><?php echo number_format($record->valve, 1, '.', '') ?></td>
					<td><?php echo $record->info ?></td>
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
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[5]
            }
        },
        title: {
            text: 'Temperature(°C)',
            style: {
                color: Highcharts.getOptions().colors[5]
            }
        },
        opposite: true

    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: 'Pressure(barG)',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        labels: {
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            },
		max: 14
        }

    }],
    tooltip: {
		formatter: function () {
            var s = '<b>' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '</b>';

            $.each(this.points, function () {
                s += '<br/>' + this.series.name + ': ' +
                    this.y;
            });

            return s;
        },
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 55,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    series: [{
        name: 'Pressure(barG)',
        type: 'spline',
        yAxis: 1,
        data: [<?php echo $pressaxis; ?>],
		color: 'black'

    }, {
        name: 'Temperature(°C)',
        type: 'spline',
        data: [<?php echo $tempaxis; ?>],
		color: 'red'
    }]
});
</script>
</html>