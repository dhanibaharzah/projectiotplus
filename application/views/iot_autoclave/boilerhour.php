<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<div class="box-tools">
			<form action="<?php echo base_url() ?>boilerhour" method="POST" id="searchList">
				<div class="col-md-4 form-group">
					<h3>Boiler <small>Hourly Data</small></h3>
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
						<p> Steam Usage(Ton) & Water usage(cu.m)</p>
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
						<p> Drum Pressure(barG)</p>
					</div>
					<div class="box-body">
						<div id="drum"></div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<p> Motor Freq(Hz)</p>
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
									<th class="text-center">Water<br>(cu.m)</th>
									<th class="text-center">Steam<br>(ton)</th>
									<th class="text-center">Drum<br>(barG)</th>
									<th class="text-center">Bed1<br>(°C)</th>
									<th class="text-center">Bed2<br>(°C)</th>
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
									<td class="text-center"><?php echo $record->timestamp ?></td>
									<td class="text-center"><?php echo $record->water ?></td>
									<td class="text-center"><?php echo $record->steam_out ?></td>
									<td class="text-center"><?php echo $record->boiler_steam_press ?></td>
									<td class="text-center"><?php echo $record->bed_temp1 ?></td>
									<td class="text-center"><?php echo $record->bed_temp2 ?></td>
									<td class="text-center"><?php echo $record->flue_gas_temp ?></td>
									<td class="text-center"><?php echo $record->id_fan ?></td>
									<td class="text-center"><?php echo $record->fd_fan ?></td>
									<td class="text-center"><?php echo $record->screw_feed_1 ?></td>
									<td class="text-center"><?php echo $record->screw_feed_2 ?></td>
								</tr>
								<?php
										}
									}
								?>
							</table>
						</div>
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th class="text-center">Time</th>
									<th class="text-center">NIK<br>(user)</th>
									<th class="text-center">Dea<br>(mbarG)</th>
									<th class="text-center">FWpump<br>(no)</th>
									<th class="text-center">Spider<br>(Hz)</th>
									<th class="text-center">Blow<br>down</th>
									<th class="text-center">Recir<br>(Hz)</th>
									<th class="text-center">2nd<br>Dumper</th>
									<th class="text-center">ACS<br>1F</th>
									<th class="text-center">ACS<br>2F</th>
									<th class="text-center">ACS<br>1B</th>
									<th class="text-center">ACS<br>2B</th>
									<th class="text-center">ACS<br>3B</th>
									<th class="text-center">ACS<br>4B</th>
								</tr>
								<?php
									if(!empty($hour))
									{
										foreach($hour as $record)
										{
								?>
								<tr>
									<td class="text-center"><?php echo $record->timestamp ?></td>
									<td class="text-center"><?php echo $record->user ?></td>
									<td class="text-center"><?php echo $record->water_lvl_boiler ?></td>
									<td class="text-center"><?php echo $record->deaerator ?></td>
									<td class="text-center"><?php echo $record->feed_water_pump ?></td>
									<td class="text-center"><?php echo $record->spider_fan ?></td>
									<td class="text-center"><?php echo $record->blowdown ?></td>
									<td class="text-center"><?php echo $record->recir_fan ?></td>
									<td class="text-center"><?php echo $record->secondary_dumper ?></td>
									<td class="text-center"><?php echo $record->acs_out1b ?></td>
									<td class="text-center"><?php echo $record->acs_out2b ?></td>
									<td class="text-center"><?php echo $record->acs_out1 ?></td>
									<td class="text-center"><?php echo $record->acs_out2 ?></td>
									<td class="text-center"><?php echo $record->acs_out3 ?></td>
									<td class="text-center"><?php echo $record->acs_out4 ?></td>
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
        title: { text: 'cu.m'},
        labels: { format: '{value}'},
		gridLineWidth:0,
		visible:false
		},{
		min: 0,
        labels: { format: '{value}'},
        title: {text: 'ton'},
		visible:true
		}],
	tooltip: { 
		shared: true,
		xDateFormat: '%A, %B/%d/%Y, %H:%M:%S'
	},
	
	exporting: {
		enabled: true
	},
	series: [{
		name: 'Water', type: 'line', yAxis: 0,
		data: [<?php echo $water ?>],
		tooltip: { valueSuffix: ' cu.m'}
		},{
		name: 'Steam', type: 'line', yAxis: 1,
		data: [<?php echo $steam ?>],
		tooltip: { valueSuffix: ' ton'}
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
		data: [<?php echo $bed1 ?>],
		tooltip: { valueSuffix: ' °C'}, color: 'red'
		},{
		name: 'Bed2', type: 'line',
		data: [<?php echo $bed2 ?>],
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
        title: {text: ' barG'},
		visible:true
		}],
	tooltip: { shared: true, xDateFormat: '%A, %B/%d/%Y, %H:%M:%S' },
	exporting: {
		enabled: true
	},
	series: [{
		name: 'Drum Pressure', type: 'line',
		data: [<?php echo $press ?>],
		tooltip: { valueSuffix: ' barG'}
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
		data: [<?php echo $palm1 ?>],
		tooltip: { valueSuffix: ' Hz'}
		},{
		name: 'Palm 2', type: 'line',
		data: [<?php echo $palm2 ?>],
		tooltip: { valueSuffix: ' Hz'}
		},{
		name: 'ID Fan', type: 'line',
		data: [<?php echo $idfan ?>],
		tooltip: { valueSuffix: ' Hz'}
		},{
		name: 'FD Fan', type: 'line',
		data: [<?php echo $fdfan ?>],
		tooltip: { valueSuffix: ' Hz'}
		}]
	});
</script>
