<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>chart</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	
	<div class="row">
		<div class="col-md-9 col-xs-12">
			<div id="con<?php echo $boxid1; ?>"></div>
		</div>
		<div class="col-md-3 col-xs-12">
			<div id="con<?php echo $boxid2; ?>"></div>
		</div>
	</div>
<script>
	Highcharts.setOptions({
		global: {
			useUTC: false
		}
	});
	Highcharts.chart('con<?php echo $boxid1; ?>', {
    chart: {
		height: 300,
        type: 'column'
    },
	credits: { enabled: false},
    title: {
        text: '<?php echo $sesdate; ?>'
    },
    xAxis: {
        categories: [
           <?php echo $cat; ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '<?php echo $CBM_unit; ?>'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key} <?php echo $sesdate; ?></span><table style="font-size:10px">',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} <?php echo $CBM_unit; ?></b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            groupPadding: 0,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Break Even',
        data: [<?php echo $breakeven; ?>]

    },{
        name: 'Orders',
        data: [<?php echo $order; ?>]

    },{
        name: 'Actual',
        data: [<?php echo $actual; ?>]

    }]
});
Highcharts.chart('con<?php echo $boxid2; ?>', {
    chart: {
		height: 250,
        type: 'column'
    },
	credits: { enabled: false},
    title: {
        text: ''
    },
    xAxis: {
        categories: [
           'Summary'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '<?php echo $CBM_unit; ?>'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table style="font-size:10px">',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} <?php echo $CBM_unit; ?></b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Break Even',
        data: [<?php echo $sum_breakeven; ?>]

    }, {
        name: 'Orders',
        data: [<?php echo $sum_order; ?>]

    }, {
		name: 'Actual',
		data: [<?php echo $sum_actual; ?>]
	}]
});
</script>
</html>