<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<div class="box-tools">
			<form action="<?php echo base_url() ?>boilerday" method="POST" id="searchList">
				<div class="col-md-4 form-group">
					<h3>Boiler <small>Daily Data</small></h3>
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
						<p> Usage Data </p>
					</div>
					<div class="box-body">
						<div id="usage"></div>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<div class="col-md-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th>Timestamp</th>
									<th>User</th>
									<th>Water(cu.m)</th>
									<th>Steam(ton)</th>
									<th>Power(kWh)</th>
								</tr>
								<?php
									if(!empty($day))
									{
										foreach($day as $record)
										{
								?>
								<tr>
									<td width="20%"><?php echo $record->timestamp ?></td>
									<td width="20%"><?php echo $record->user ?></td>
									<td width="20%"><?php echo $record->water ?></td>
									<td width="20%"><?php echo $record->steam ?></td>
									<td width="20%"><?php echo $record->kwh ?></td>
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
var chartac = Highcharts.chart('usage', {
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
		},{
		min: 0,
        labels: { format: '{value}'},
        title: {text: 'kWh'},
		visible:false
		}],
	tooltip: { shared: true },
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
		},{
		name: 'Power', type: 'line', yAxis: 2,
		data: [<?php echo $kwh ?>],
		tooltip: { valueSuffix: ' kWh'}
		}]
	});
</script>
