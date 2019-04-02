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
		<?php
			if(!empty($chart)){ 
		?>
			<table class="table table-hover table-striped table-bordered ">
				<tr>
					<th>Time</th>
					<th>R</th>
					<th>S</th>
					<th>T</th>
				</tr>
				<?php
					foreach($chart as $record){
				?>
				<tr>
					<td><?php echo $record->timestamp ?></td>
					<td><?php echo number_format($record->amp1, 1, '.', ''); ?></td>
					<td><?php echo number_format($record->amp2, 1, '.', ''); ?></td>
					<td><?php echo number_format($record->amp3, 1, '.', ''); ?></td>
				</tr>
				<?php
					}
				?>
			</table>
		<?php
			}
		?>
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
        zoomType: 'x'
    },
    title: {
        text: ''
    },
	xAxis: { type: 'datetime'},
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        title: {
            text: '<?php echo $seri1; ?>',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true

    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: '<?php echo $seri2; ?>',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        labels: {
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            },
        }

    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: '<?php echo $seri3; ?>',
            style: {
                color: Highcharts.getOptions().colors[2]
            }
        },
        labels: {
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[2]
            },
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
    series: [{
        name: '<?php echo $seri1; ?>',
        type: 'line',
        data: [<?php echo $amp1; ?>]

    },{
        name: '<?php echo $seri2; ?>',
        type: 'line',
        yAxis: 1,
        data: [<?php echo $amp2; ?>]
    },{
        name: '<?php echo $seri3; ?>',
        type: 'line',
        yAxis: 2,
        data: [<?php echo $amp3; ?>]
    }]
});
</script>
</html>