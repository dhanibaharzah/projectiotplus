<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>chart</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	
	<div class="row">
		<div class="col-md-12">
			<div id="con"></div>
		</div>
	</div>
<script>
	Highcharts.setOptions({
		global: {
			useUTC: false
		}
	});
	Highcharts.chart('con', {
    chart: {
		height: 300,
        type: 'column'
    },
	credits: { enabled: false},
    title: {
        text: '<?php echo $year; ?>'
    },
     xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'IDR'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key} </span><table style="font-size:10px">',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} MIDR</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            groupPadding: 0,
            borderWidth: 0,
			stacking: 'normal'
        }
    },
   series: [{
        name: 'Pinjaman In',
        data: [<?php echo $cash_in_pinj; ?>],
        stack: 'Cash In'
    }, {
        name: 'Pinjaman Out',
        data: [<?php echo $cash_out_pinj; ?>],
        stack: 'Cash In'
    }, {
        name: 'Kasbon In',
        data: [<?php echo $cash_in_kas; ?>],
        stack: 'Cash Out'
    }, {
        name: 'Kasbon Out',
        data: [<?php echo $cash_out_kas; ?>],
        stack: 'Cash Out'
    }]
});

</script>
</html>