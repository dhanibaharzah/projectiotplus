<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>chart</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	</head>
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con2"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $gauge_cut_2; ?></h5>
								<span class="description-text">Target</span>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $mold_avg; ?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header">
									<?php 
										$mold_persen = number_format(($mold_avg/$gauge_cut_2)*100, 1, '.', '');
										if($mold_persen >= 100){
											echo '<span class="text-green"><i class="fa fa-caret-up"></i> '.$mold_persen.' %</span>';
										}elseif($mold_persen >= 90){
											echo '<span class="text-yellow"><i class="fa fa-caret-down "></i> '.$mold_persen.' %</span>';
										}elseif($mold_persen < 90){
											echo '<span class="text-red"><i class="fa fa-caret-down"></i> '.$mold_persen.' %</span>';
										}
									?>
								</h5>
								<span class="description-text">Result</span>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $mold_tot; ?></h5>
								<span class="description-text">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con3"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-4 col-xs-4">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $gauge_dt_2; ?></h5>
								<span class="description-text">Target</span>
							</div>
						</div>
						<div class="col-sm-4 col-xs-4">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $downtime_avg.' Mins'; ?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-4 col-xs-4">
							<div class="description-block border-right">
								<h5 class="description-header">
									<?php 
										$dt_persen = number_format(($downtime_avg/$gauge_dt_2)*100, 1, '.', '');
										if($dt_persen >= 100){
											echo '<span class="text-red"><i class="fa fa-close"></i> '.$dt_persen.' %</span>';
										}elseif($dt_persen >= 90){
											echo '<span class="text-yellow"><i class="fa fa-check "></i> '.$dt_persen.' %</span>';
										}elseif($dt_persen < 90){
											echo '<span class="text-green"><i class="fa fa-check"></i> '.$dt_persen.' %</span>';
										}
									?>
								</h5>
								<span class="description-text">Result</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con1"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-4 col-xs-4">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $gauge_rate_2; ?></h5>
								<span class="description-text">Target</span>
							</div>
						</div>
						<div class="col-sm-4 col-xs-4">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $rate_avg; ?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-4 col-xs-4">
							<div class="description-block border-right">
								<h5 class="description-header">
									<?php 
										$rate_persen = number_format(($rate_avg/$gauge_rate_2)*100, 1, '.', '');
										if($rate_persen >= 100){
											echo '<span class="text-green"><i class="fa fa-caret-up"></i> '.$rate_persen.' %</span>';
										}elseif($rate_persen >= 90){
											echo '<span class="text-yellow"><i class="fa fa-caret-down "></i> '.$rate_persen.' %</span>';
										}elseif($rate_persen < 90){
											echo '<span class="text-red"><i class="fa fa-caret-down"></i> '.$rate_persen.' %</span>';
										}
									?>
								</h5>
								<span class="description-text">Result</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con4"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $slowspeed_avg.' Mins'; ?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con5"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo number_format($plannedstop_tot1/60, 2, '.', '').' Hours'; ?></h5>
								<span class="description-text">Total Exclude 24h</span>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo number_format($plannedstop_tot2/60, 2, '.', '').' Hours'; ?></h5>
								<span class="description-text">Total Include 24h</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h1 class="box-title"> Summary table</h1>
				</div>
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover table-striped taable-bordered ">
						<tr>
							<th class="text-center">Date</th>
							<th class="text-center">Rate(mold/h)</th>
							<th class="text-center">Durasi(h)</th>
							<th class="text-center">Cutting(mold)</th>
							<th class="text-center">Downtime(min)</th>
							<th class="text-center">Slowspeed(min)</th>
							<th class="text-center">Planned Stop(min)</th>
							<th class="text-center">Info</th>
						</tr>
					<?php
						if(!empty($oee_data)){
							foreach($oee_data as $record){
					?>
						<tr>
							<td class="text-center"><?php echo $record->prod_date; ?></td>
							<td class="text-center"><?php echo $record->prod_rate; ?></td>
							<td class="text-center"><?php echo $record->prod_durasi; ?></td>
							<td class="text-center"><?php echo $record->prod_cut; ?></td>
							<td class="text-center"><?php echo $record->prod_dt; ?></td>
							<td class="text-center"><?php echo $record->prod_ss; ?></td>
							<td class="text-center"><?php echo $record->prod_ps; ?></td>
							<td class="text-center"><?php echo $record->notes; ?></td>
						</tr>
					<?php
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
<script>
	Highcharts.chart('con1', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: 'Rate'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[0]}},
			title: {text: 'Rate', style: { color: Highcharts.getOptions().colors[0]}},
			plotLines: [{
				color: '#36e52d',
				width: 2,
				value: <?php echo $gauge_rate_2; ?>
			}]
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: 'Rate',
			type: 'column',
			data: [<?php echo $rate; ?>]
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $rate_mov; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[0],
				fillColor: 'white'
			}
		}]
	});
	Highcharts.chart('con2', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: 'Mold'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[0]}},
			title: {text: 'Mold', style: { color: Highcharts.getOptions().colors[0]}},
			plotLines: [{
				color: '#36e52d',
				width: 2,
				value: <?php echo $gauge_cut_2; ?>
			}]
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: 'Mold',
			type: 'column',
			data: [<?php echo $mold; ?>]
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $mold_mov; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[0],
				fillColor: 'white'
			}
		}]
	});
	Highcharts.chart('con3', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: 'Downtime'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[1]}},
			title: {text: 'Downtime', style: { color: Highcharts.getOptions().colors[1]}},
			plotLines: [{
				color: '#FF0000',
				width: 2,
				value: <?php echo $gauge_dt_2; ?>
			}]
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: 'Downtime',
			type: 'column',
			data: [<?php echo $downtime; ?>],
			color: "#ef514f" 
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $downtime_mov; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[1],
				fillColor: 'white'
			}
		}]
	});
	Highcharts.chart('con4', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: 'Slowspeed'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			title: {text: 'Slowspeed', style: { color: Highcharts.getOptions().colors[1]}},
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[1]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: 'Slowspeed',
			type: 'column',
			data: [<?php echo $slowspeed; ?>],
			color: "#fcd735" 
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $slowspeed_mov; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[1],
				fillColor: 'white'
			}
		}]
	});
	Highcharts.chart('con5', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: 'Planned Stop'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			title: {text: 'Planned Stop', style: { color: Highcharts.getOptions().colors[1]}},
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[1]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: 'Planned Stop',
			type: 'column',
			data: [<?php echo $plannedstop; ?>],
			color: "#70fc35" 
		}]
	});
</script>
</html>