<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-area-chart"></i> Show Tren of <?php echo $titlex->eq_name; ?> - <?php echo $titlex->cond; ?> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h4><?php echo $title->code; ?>/<?php if($title->tag == 1){echo 'Electrical';}elseif($title->tag == 2){echo 'Mechanical';} ?>/<?php if($title->freq == 1){echo 'Weekly';}elseif($title->freq == 2){echo 'Monthly';} ?></h4>
					</div>
					<div class="box-body">
						<div id="trenbox"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
var chart = Highcharts.chart('trenbox', {
	chart: {
		type: 'spline',
		alignTicks: false,
		zoomType: 'xy'
		},
	title: {text: null},
	xAxis: { type: 'datetime'},
	credits: { enabled: false},
	yAxis: [{
        labels: { format: '{value}'},
	title: {text: 'x'}}],
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
		name: '<?php echo $titlex->eq_name; ?> - <?php echo $titlex->cond; ?>', type: 'line', yAxis: 0,
		data: [<?php echo $value ?>],
		tooltip: { valueSuffix: ' x'},
		color:'#E53D3D'}
		]
	});
</script>
