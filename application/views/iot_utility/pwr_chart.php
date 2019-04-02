<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>chart</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	
	<div class="row">
		<div class="col-md-12">
			<div id="container1"></div>
			<div id="container2"></div>
			<div id="container3"></div>
		<?php
			if(!empty($chart)){ 
		?>
			<table class="table table-hover table-striped table-bordered ">
				<tr>
					<th>Time</th>
					<th>R(V)</th>
					<th>S(V)</th>
					<th>T(V)</th>
					<th>R(A)</th>
					<th>S(A)</th>
					<th>T(A)</th>
					<th>kW</th>
					<th>kVAR</th>
					<th>kVA</th>
					<th>Hz</th>
					<th>pf</th>
				</tr>
				<?php
					foreach($chart as $record){
				?>
				<tr>
					<td><?php echo $record->timestamp ?></td>
					<td><?php echo number_format($record->vab, 0, '.', ''); ?></td>
					<td><?php echo number_format($record->vbc, 0, '.', ''); ?></td>
					<td><?php echo number_format($record->vca, 0, '.', ''); ?></td>
					<td><?php echo number_format($record->ia, 0, '.', ''); ?></td>
					<td><?php echo number_format($record->ib, 0, '.', ''); ?></td>
					<td><?php echo number_format($record->ic, 0, '.', ''); ?></td>
					<td><?php if($record->actpwr > 32678){ $actp = $record->actpwr - 65535;}else{$actp = $record->actpwr; }echo number_format($actp, 0, '.', ''); ?></td>
					<td><?php if($record->recpwr > 32678){ $actp = $record->recpwr - 65535;}else{$recp = $record->recpwr; }echo number_format($recp, 0, '.', ''); ?></td>
					<td><?php if($record->apppwr > 32678){ $actp = $record->apppwr - 65535;}else{$appp = $record->apppwr; }echo number_format($appp, 0, '.', ''); ?></td>
					<td><?php echo number_format($record->frec, 1, '.', ''); ?></td>
					<td><?php echo number_format($record->pf, 2, '.', ''); ?></td>
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
	Highcharts.chart('container1', {
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
            text: 'k',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true

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
        name: 'kW',
        type: 'line',
        data: [<?php echo $act; ?>]

    },{
        name: 'kVAR',
        type: 'line',
        data: [<?php echo $rec; ?>]
    },{
        name: 'kVA',
        type: 'line',
        data: [<?php echo $app; ?>]
    }]
});


Highcharts.chart('container2', {
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
            text: 'A',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true

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
        name: 'R(A)',
        type: 'line',
        data: [<?php echo $amp1; ?>]

    },{
        name: 'S(A)',
        type: 'line',
        data: [<?php echo $amp2; ?>]
    },{
        name: 'T(A)',
        type: 'line',
        data: [<?php echo $amp3; ?>]
    }]
});

Highcharts.chart('container3', {
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
            text: 'V',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true

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
        name: 'R(V)',
        type: 'line',
        data: [<?php echo $volt1; ?>]

    },{
        name: 'S(V)',
        type: 'line',
        data: [<?php echo $volt2; ?>]
    },{
        name: 'T(V)',
        type: 'line',
        data: [<?php echo $volt3; ?>]
    }]
});
</script>
</html>