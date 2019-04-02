<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>chart</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	
	<div class="row">
		<div class="col-md-12">
			<div id="container<?php echo $divid; ?>"></div>
		</div>
	</div>
<script>
	Highcharts.setOptions({
		global: {
			useUTC: false
		}
	});
	Highcharts.chart('container<?php echo $divid; ?>', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: ''
    },
	xAxis: { type: 'datetime'},
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value} A',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: '<?php echo $ampaxis_t; ?>',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        opposite: true

    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: '<?php echo $hzaxis_t; ?>',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} Hz',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        }

    }],
    tooltip: {
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
        name: '<?php echo $hzaxis_t; ?>',
        type: 'spline',
        yAxis: 1,
        data: [<?php echo $hzaxis; ?>].reverse(),
        tooltip: {
            valueSuffix: ' Hz'
        }

    }, {
        name: '<?php echo $ampaxis_t; ?>',
        type: 'spline',
        data: [<?php echo $ampaxis; ?>].reverse(),
        tooltip: {
            valueSuffix: ' A'
        }
    }]
});
</script>
</html>