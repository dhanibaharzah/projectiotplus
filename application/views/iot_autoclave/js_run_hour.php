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
					<div id="con1"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $avg1; ?> <?php if(!empty($unit1)){echo $unit1; }else{echo 'hours';}?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $tot1; ?> <?php if(!empty($unit1)){echo $unit1; }else{echo 'hours';}?></h5>
								<span class="description-text">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php if($use > 1){ ?>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con2"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $avg2; ?> <?php if(!empty($unit2)){echo $unit2; }else{echo 'hours';}?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $tot2; ?> <?php if(!empty($unit2)){echo $unit2; }else{echo 'hours';}?></h5>
								<span class="description-text">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if($use > 2){ ?>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con3"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $avg3; ?> <?php if(!empty($unit3)){echo $unit3; }else{echo 'hours';}?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $tot3; ?> <?php if(!empty($unit3)){echo $unit3; }else{echo 'hours';}?></h5>
								<span class="description-text">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if($use > 3){ ?>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con4"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $avg4; ?> <?php if(!empty($unit4)){echo $unit4; }else{echo 'hours';}?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $tot4; ?> <?php if(!empty($unit4)){echo $unit4; }else{echo 'hours';}?></h5>
								<span class="description-text">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if($use > 4){ ?>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con5"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $avg5; ?> <?php if(!empty($unit5)){echo $unit5; }else{echo 'hours';}?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $tot5; ?> <?php if(!empty($unit5)){echo $unit5; }else{echo 'hours';}?></h5>
								<span class="description-text">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if($use > 5){ ?>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<div id="con6"></div>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $avg6; ?> <?php if(!empty($unit6)){echo $unit6; }else{echo 'hours';}?></h5>
								<span class="description-text">Average</span>
							</div>
						</div>
						<div class="col-sm-6 col-xs-6">
							<div class="description-block border-right">
								<h5 class="description-header"><?php echo $tot6; ?> <?php if(!empty($unit6)){echo $unit6; }else{echo 'hours';}?></h5>
								<span class="description-text">Total</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
<script>
	Highcharts.chart('con1', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: '<?php echo $mc_name1; ?>'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[0]}},
			title: {text: '<?php echo $mc_name1; ?>', style: { color: Highcharts.getOptions().colors[0]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: '<?php echo $mc_name1; ?>',
			type: 'column',
			data: [<?php echo $data1; ?>]
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $data1_avg; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[0],
				fillColor: 'white'
			}
		}]
	});
<?php if($use > 1){ ?>
	Highcharts.chart('con2', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: '<?php echo $mc_name2; ?>'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[0]}},
			title: {text: '<?php echo $mc_name2; ?>', style: { color: Highcharts.getOptions().colors[0]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: '<?php echo $mc_name2; ?>',
			type: 'column',
			data: [<?php echo $data2; ?>],
			color: "#254ce8" 
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $data2_avg; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[0],
				fillColor: 'white'
			}
		}]
	});
<?php } ?>
<?php if($use > 2){ ?>
	Highcharts.chart('con3', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: '<?php echo $mc_name3; ?>'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[1]}},
			title: {text: '<?php echo $mc_name3; ?>', style: { color: Highcharts.getOptions().colors[1]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: '<?php echo $mc_name3; ?>',
			type: 'column',
			data: [<?php echo $data3; ?>],
			color: "#ef514f" 
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $data3_avg; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[1],
				fillColor: 'white'
			}
		}]
	});
<?php } ?>
<?php if($use > 3){ ?>
	Highcharts.chart('con4', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: '<?php echo $mc_name4; ?>'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			title: {text: '<?php echo $mc_name4; ?>', style: { color: Highcharts.getOptions().colors[1]}},
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[1]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: '<?php echo $mc_name4; ?>',
			type: 'column',
			data: [<?php echo $data4; ?>],
			color: "#fcd735" 
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $data4_avg; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[1],
				fillColor: 'white'
			}
		}]
	});
<?php } ?>
<?php if($use > 4){ ?>
	Highcharts.chart('con5', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: '<?php echo $mc_name5; ?>'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			title: {text: '<?php echo $mc_name5; ?>', style: { color: Highcharts.getOptions().colors[1]}},
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[1]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: '<?php echo $mc_name5; ?>',
			type: 'column',
			data: [<?php echo $data5; ?>],
			color: "#70fc35" 
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $data5_avg; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[1],
				fillColor: 'white'
			}
		}]
	});
<?php } ?>
<?php if($use > 5){ ?>
	Highcharts.chart('con6', {
		chart: {zoomType: 'x', height: 300},
		credits: {enabled: false},
		title: {text: '<?php echo $mc_name6; ?>'},
		xAxis: { categories: [<?php echo $category; ?>]},
		yAxis: [{
			title: {text: '<?php echo $mc_name6; ?>', style: { color: Highcharts.getOptions().colors[1]}},
			labels: {format: '{value}', style: { color: Highcharts.getOptions().colors[1]}}
		}],
		tooltip: {
			shared: true
		},
		series: [{
			name: '<?php echo $mc_name6; ?>',
			type: 'column',
			data: [<?php echo $data6; ?>],
			color: "#f23030" 
		},{
			name: 'Average',
			type: 'line',
			data: [<?php echo $data6_avg; ?>],
			marker: {
				lineWidth: 2,
				lineColor: Highcharts.getOptions().colors[1],
				fillColor: 'white'
			}
		}]
	});
<?php } ?>
</script>
</html>