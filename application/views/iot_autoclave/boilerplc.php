<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<div class="box-tools">
			<form action="<?php echo base_url() ?>boilerplc" method="POST" id="searchList">
				<div class="col-md-4 form-group">
					<h3>Boiler <small>PLC Data</small></h3>
				</div>
				<div class="col-md-3 form-group">
					<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date" required/>
				</div>
				<div class="col-md-3 form-group">
					<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date" required/>
				</div>
				<div class="col-md-2 form-group">
					<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
				</div>
			</form>
		</div>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<p> Boiler Drum </p>
					</div>
					<div class="box-body">
						<div id="swusage"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header">
						<p> Bed Temperature</p>
					</div>
					<div class="box-body">
						<div id="bed"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header">
						<p> Deaerator</p>
					</div>
					<div class="box-body">
						<div id="drum"></div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<p> Burning</p>
					</div>
					<div class="box-body">
						<div id="freq"></div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">Time</th>
									<th class="text-center">Drum<br>(barG)</th>
									<th class="text-center">Drum<br>(%)</th>
									<th class="text-center">Drum<br>(ton/h)</th>
									<th class="text-center">Bed1<br>(°C)</th>
									<th class="text-center">Bed2<br>(°C)</th>
									<th class="text-center">Oxy<br>(%)</th>
									<th class="text-center">Dea<br>(%)</th>
									<th class="text-center">Dea<br>(in)</th>
									<th class="text-center">Dea<br>(out)</th>
									<th class="text-center">Flue<br>(°C)</th>
									<th class="text-center">ID<br>(Hz)</th>
									<th class="text-center">FD<br>(Hz)</th>
									<th class="text-center">Screw1<br>(Hz)</th>
									<th class="text-center">Screw2<br>(Hz)</th>
								</tr>
								<?php
									if(!empty($hour))
									{
										foreach($hour as $record)
										{
								?>
								<tr>
									<td class="text-center"><?php echo $record->timestamp; ?></td>
									<td class="text-center"><?php echo number_format($record->bp, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->bwl, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->sfm, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->bt1, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->bt2, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->st/40, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->fwt, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->din, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->dout, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->fgt, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->id, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->fd, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->sf1, 1, '.', ''); ?></td>
									<td class="text-center"><?php echo number_format($record->sf2, 1, '.', ''); ?></td>
								</tr>
								<?php
										}
									}
								?>
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer clearfix">
						<?php //echo $this->pagination->create_links(); ?>
					</div>
				</div><!-- /.box -->
			</div>
		</div>
		
	</section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script>
jQuery(document).ready(function(){
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "yyyy-mm-dd"
        });
		
	});
Highcharts.setOptions({
	global: {
		useUTC: false
	}
});
var chartac = Highcharts.chart('swusage', {
	chart: {
		type: 'line',
		alignTicks: false
		},
	title: {text: null},
	xAxis: { type: 'datetime'},
	credits: { enabled: false},
	yAxis: [{ 
		min: 0,
        title: { text: 'barG'},
        labels: { format: '{value}'},
		gridLineWidth:0,
		visible:true
		},{
		min: 0,
        labels: { format: '{value}'},
        title: {text: '%'},
		visible:false
		},{
		min: 0,
        labels: { format: '{value}'},
        title: {text: 'ton/h'},
		visible:false
		}],
	tooltip: { 
		shared: true,
		xDateFormat: '%A, %B/%d/%Y, %H:%M:%S'
	},
	
	exporting: {
		enabled: true
	},
	series: [{
		name: 'Pressure', type: 'line', yAxis: 0,
		data: [<?php echo $bp ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Level', type: 'line', yAxis: 1,
		data: [<?php echo $bwl ?>],
		tooltip: { valueSuffix: ' %'}
		},{
		name: 'Output Flow', type: 'line', yAxis: 2,
		data: [<?php echo $sfm ?>],
		tooltip: { valueSuffix: ' ton/h'}
		}]
	});
var chartbed = Highcharts.chart('bed', {
	chart: {
		type: 'line',
		alignTicks: false
		},
	title: {text: null},
	xAxis: { type: 'datetime'},
	credits: { enabled: false},
	yAxis: [{
        labels: { format: '{value}'},
        title: {text: ' °C'},
		visible:true
		}],
	tooltip: { shared: true, xDateFormat: '%A, %B/%d/%Y, %H:%M:%S' },
	exporting: {
		enabled: true
	},
	series: [{
		name: 'Bed1', type: 'line',
		data: [<?php echo $bt1 ?>],
		tooltip: { valueSuffix: ' °C'}, color: 'red'
		},{
		name: 'Bed2', type: 'line',
		data: [<?php echo $bt2 ?>],
		tooltip: { valueSuffix: ' °C'}, color: 'blue'
		}]
	});
var chartpress = Highcharts.chart('drum', {
	chart: {
		type: 'line',
		alignTicks: false
		},
	title: {text: null},
	xAxis: { type: 'datetime'},
	credits: { enabled: false},
	yAxis: [{
        labels: { format: '{value}'},
        title: {text: ' mbarG'},
		visible:true
		},{
        labels: { format: '{value}'},
        title: {text: ' %'},
		visible:false
		},{
        labels: { format: '{value}'},
        title: {text: ' °C'},
		visible:false
		},{
        labels: { format: '{value}'},
        title: {text: ' °C'},
		visible:false
		}],
	tooltip: { shared: true, xDateFormat: '%A, %B/%d/%Y, %H:%M:%S' },
	exporting: {
		enabled: true
	},
	series: [{
		name: 'Pressure', type: 'line',
		data: [<?php echo $dp ?>],
		tooltip: { valueSuffix: ' mbarG'}
		},{
		name: 'Level', type: 'line',
		data: [<?php echo $fwt ?>],
		tooltip: { valueSuffix: ' %'}
		},{
		name: 'In Eco', type: 'line',
		data: [<?php echo $din ?>],
		tooltip: { valueSuffix: ' °C'}
		},{
		name: 'Out Eco', type: 'line',
		data: [<?php echo $dout ?>],
		tooltip: { valueSuffix: ' °C'}
		}]
	});
var charthz = Highcharts.chart('freq', {
	chart: {
		type: 'line',
		alignTicks: false
		},
	title: {text: null},
	xAxis: { type: 'datetime'},
	credits: { enabled: false},
	yAxis: [{
        labels: { format: '{value}'},
        title: {text: ' Hz'},
		visible:true
		}],
	tooltip: { shared: true, xDateFormat: '%A, %B/%d/%Y, %H:%M:%S' },
	exporting: {
		enabled: true
	},
	series: [{
		name: 'Palm 1', type: 'line',
		data: [<?php echo $sf1 ?>],
		tooltip: { valueSuffix: ' Hz'}
		},{
		name: 'Palm 2', type: 'line',
		data: [<?php echo $sf2 ?>],
		tooltip: { valueSuffix: ' Hz'}
		},{
		name: 'ID Fan', type: 'line',
		data: [<?php echo $id ?>],
		tooltip: { valueSuffix: ' Hz'}
		},{
		name: 'FD Fan', type: 'line',
		data: [<?php echo $fd ?>],
		tooltip: { valueSuffix: ' Hz'}
		},{
		name: 'Flue', type: 'line',
		data: [<?php echo $fgt ?>],
		tooltip: { valueSuffix: ' °C'}
		},{
		name: 'Recirculation', type: 'line',
		data: [<?php echo $rs ?>],
		tooltip: { valueSuffix: ' Hz'}
		}]
	});
</script>
