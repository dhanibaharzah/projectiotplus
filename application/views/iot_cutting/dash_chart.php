<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>chart</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	<div class="row">
		<div class="col-md-8">
			<div class="box-body no-padding" style="height: 400px; overflow-y: scroll;">
				<div id="moldct"></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box-body table-responsive no-padding" style="height: 400px; overflow-y: scroll;">
				<div class="col-lg-12 col-xs-12">
					<table class="table table-hover table-striped table-bordered ">
						<tr>
							<th>Time</th>
							<th>CT</th>
							<th>Foreman Report</th>
						</tr>
						<?php
							if(!empty($problem)){
								foreach($problem as $record){
						?>
						<tr>
							<td width="15%"><?php echo date('H:i', strtotime($record->timestamp)); ?></td>
							<td width="15%"><?php echo number_format($record->mixing_ct_tilting/60, 2,'.','');?></td>
							<td width="50%">
							<?php
								$ctc = $record->mixing_ct_tilting/60;
								if($ctc > $slowspeed && $ctc < $downtime){echo '<span class="label label-warning">Slowspeed</span> ';}
								if($ctc >= $downtime){echo '<span class="label label-danger">Downtime</span> ';}
							?>
							<?php echo $record->keterangan ?></td>
						</tr>
						<?php
								}
							}else{echo '<td colspan="3"> No data/Planned Stop 24H</td>';}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
<script>
var chart; // global
/**
 * Request data from the server, add it to the graph and set a timeout 
 * to request again
 */
 Highcharts.setOptions({
	global: {
		useUTC: false
	}
});
//function requestData() {
//    $.ajax({
//        url: '<?php echo base_url(); ?>tet',
//        success: function(point) {
//            var series = chart.series[0],
//                shift = series.data.length > 240; // shift if the series is 
                                                 // longer than 20

            // add the point
//            chart.series[0].addPoint(point, true, shift);
            
//        },
//        cache: false
//    });
//}
var chart = Highcharts.chart('moldct', {
	chart: {
		type: 'spline',
		alignTicks: false,
		zoomType: 'xy'
		},
	title: {text: null},
	xAxis: { type: 'datetime'},
	credits: { enabled: false},
	yAxis: [{
		min: 4,
		max: 12,
        labels: { format: '{value}'},
        title: {text: 'min'},
		tickInterval:2,
		plotBands:[{
				color: 'rgba(191, 239, 189, 0.5)',
				id:0,
				label:{
					text: 'Bagut'
				},
				from: 4,
				to: <?php echo $slowspeed; ?>
			},{
				color: 'rgba(255, 252, 178, 0.5)',
				id:1,
				label:{
					text: 'Slowspeed'
				},
				from: <?php echo $slowspeed; ?>,
				to: <?php echo $downtime; ?>
			},{
				color: 'rgba(226, 120, 120, 0.5)',
				id:2,
				label:{
					text: 'Tidak Bagut'
				},
				from: <?php echo $downtime; ?>,
				to: 60
			}]
		}],
	exporting: {
		enabled: true
	},
	tooltip: {
	formatter: function () {
		return '<b>' + this.series.name + '</b><br/>' +
		Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
		Highcharts.numberFormat(this.y, 2);
		}
	},
	series: [{
		name: 'Cycletime', type: 'line', yAxis: 0,
		data: [<?php echo $chartmold ?>],
		tooltip: { valueSuffix: ' min'},
		color:'#E53D3D'}
		]
	});
</script>

</html>