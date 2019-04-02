<div class="content-wrapper">
	<section class="content-header">
		<div class="col-lg-12 text-center">
			<div class="btn-group text-center" align="center">
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/1">AC 1</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/2">AC 2</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/3">AC 3</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/4">AC 4</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/5">AC 5</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/6">AC 6</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/7">AC 7</a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>ac/8">AC 8</a>
			</div>
		</div>
		<h1>
			Autoclaves <?php echo $no ?> 
			<small> offline record</small>
		</h1>
	</section>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/daterangepicker/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/daterangepicker/package.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" />
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="col-md-9 form-group">
							<h3 class="box-title">Autoclave <?php echo $no ?></h3>
						</div>
                        <form action="<?php echo base_url() ?>ac/<?php echo $no?>" method="POST" id="searchList">
						<div class="col-md-2 form-group">
							<input id="datepicked" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate?>" class="form-control" placeholder="End Date"/>
						</div>
						<div class="col-md-1 form-group">
							<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
						</div>
                        </form>
					</div>
					<div class="box-body">
						<div id="ac_chart" style="height: 350px; margin: 0 auto"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th>Timestamp</th>
									<th>Process</th>
									<th>Pressure(barG)</th>
									<th>Temperature(&deg C)</th>
									<th>Valve(%)</th>
									<th>Info</th>
								</tr>
								<?php
									if(!empty($actable))
									{
										foreach($actable as $record)
										{
								?>
								<tr>
									<td><?php echo $record->timestamp ?></td>
									<td>
									<?php 
										if($record->proces == 0){echo 'IDLE';}
										if($record->proces == 1){echo 'Vacuum';}
										if($record->proces == 2){echo 'Finish Vacuum';}
										if($record->proces == 3){echo 'Transfer In';}
										if($record->proces == 4){echo 'Finish Transfer In';}
										if($record->proces == 5){echo 'Rising';}
										if($record->proces == 6){echo 'Finish Rising';}
										if($record->proces == 7){echo 'Keeping';}
										if($record->proces == 8){echo 'Finish Keeping';}
										if($record->proces == 9){echo 'Transfer Out';}
										if($record->proces == 10){echo 'Finish Transfer Out';}
										if($record->proces == 11){echo 'Blow Off';}
									?>
									</td>
									<td><?php echo number_format($record->pressure, 2, '.', '') ?></td>
									<td><?php echo number_format($record->temperature, 1, '.', '') ?></td>
									<td><?php echo number_format($record->valve, 1, '.', '') ?></td>
									<td><?php echo $record->info ?></td>
								</tr>
								<?php
										}
									}
								?>
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div><!-- /.box -->
			</div>
		</div>
	</section>
</div>


<script>
	$('#datepicked').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		timePicker: true,
		timePicker24Hour: true,
		timePickerIncrement: 10,
		autoApply: true,
		locale: {
			format: "YYYY-MM-DD HH:mm:ss"
		},
		alwaysShowCalendars: true,
		opens: "left"
	});

Highcharts.setOptions({
	global: {
		useUTC: false
	}
});
var chartac = Highcharts.chart('ac_chart', {
	chart: {
		type: 'line',
		alignTicks: false
		},
	title: {text: null},
	xAxis: { type: 'datetime'},
	credits: { enabled: false},
	yAxis: [{ 
		min: -1,
		max: 14,
        title: { text: 'barG'},
        labels: { format: '{value}'},
		tickInterval:2,
		gridLineWidth:0
		},{
		min: 30,
		max: 220,
        labels: { format: '{value}'},
        title: {text: '°C'},
		tickInterval:40
		}],
	tooltip: { shared: true },
	exporting: {
		enabled: true
	},
	series: [{
		name: 'Pressure', type: 'line', yAxis: 0,
		data: [<?php echo $acx ?>],
		tooltip: { valueSuffix: ' barG'}
		},{
		name: 'Temperature', type: 'line', yAxis: 1,
		data: [<?php echo $acy ?>],
		tooltip: { valueSuffix: ' °C'},
		color:'#E53D3D'}
		]
	});

</script>
