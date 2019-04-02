<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Summary<small>Water Quality Boiler</small>
      </h1>
    </section>
    <section class="content-header">
		<div class="box-tools">
			<form action="<?php echo base_url() ?>waterquality" method="POST" id="searchList">
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
					<p> Acidity </p>
				</div>
				<div class="box-body">
					<div id="ph"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<p> Conductivity </p>
				</div>
				<div class="box-body">
					<div id="cond"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<p> Turbidity </p>
				</div>
				<div class="box-body">
					<div id="tbd"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body table-responsive no-padding">
					<div class="col-lg-12 col-xs-12">
						<table class="table table-hover table-striped table-bordered ">
							<center>
							<tr>
								<th></th>
								<th class="text-center">Parameter</th>
								<th class="text-center">Surya Cipta</th>
								<th class="text-center">Sand Filter</th>
								<th class="text-center">Cartridge</th>
								<th class="text-center">Cation Exch</th>
								<th class="text-center">Anion Exch</th>
								<th class="text-center">Blue Tank</th>
								<th class="text-center">Boiler FW</th>
								<th class="text-center">Boiler</th>
								<th class="text-center">Blowdown</th>
							</tr>
							</center>
							<tbody>
								 <?php 
									if(!empty($waterqty))
									{
										foreach ($waterqty as $result){ 
								 ?>                                                                       
									<tr>	   
									  <td><b>Time: </b> <?php echo $result->timestamp ?></td>
									  <td class="text-center"><?php echo '<i>Hardness (ppm)</i>' ?></td>
									  <td class="text-center"><?php echo number_format ($result->sc_1, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->sf_1, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo '' ?></td>
									  <td class="text-center"><?php echo number_format ($result->ce_1, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->ae_1, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bt_1, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bf_1, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bl_1, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bd_1, 1, '.', '') ?></td>  
									 </tr>
									 <tr>	   
									  <td><b>User: </b> <?php echo $result->user ?></td>
									  <td class="text-center"><?php echo '<i>pH</i>' ?></td>
									  <td class="text-center"><?php echo number_format ($result->sc_2, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->sf_2, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo '' ?></td>
									  <td class="text-center"><?php echo number_format ($result->ce_2, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->ae_2, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bt_2, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bf_2, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bl_2, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bd_2, 2, '.', '') ?></td>  
									 </tr>
									 <tr>	   
									  <td><b>Line: </b> <?php echo $result->line_run ?></td>
									  <td class="text-center"><?php echo '<i>Conductivity (uS/cm)</i>' ?></td>
									  <td class="text-center"><?php echo number_format ($result->sc_3, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->sf_3, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo '' ?></td>
									  <td class="text-center"><?php echo number_format ($result->ce_3, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->ae_3, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bt_3, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bf_3, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bl_3, 1, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bd_3, 1, '.', '') ?></td>  
									 </tr>
									 <tr>	   
									  <td><b>Flowrate: </b> <?php echo number_format ($result->flow_rate,  1, '.', '') ?></td>
									  <td class="text-center"><?php echo '<i>Turbidity (NTU)</i>' ?></td>
									  <td class="text-center"><?php echo number_format ($result->sc_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->sf_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->ca_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->ce_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->ae_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bt_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bf_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bl_4, 2, '.', '') ?></td>
									  <td class="text-center"><?php echo number_format ($result->bd_4, 2, '.', '') ?></td>  
									 </tr>
									 <tr><td colspan="11" bgcolor="#4682B4"></td></tr>
									<?php 
										}
									}
								 ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer clearfix">
				<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
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
var chartac = Highcharts.chart('ph', {
		chart: {
			height: 250,
			type: 'line',
			alignTicks: false
			},
		title: {text: null},
		xAxis: { type: 'datetime'},
		credits: { enabled: false},
		yAxis: [{ 
			min: 0,
			title: { text: ''},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
			min: 0,
			labels: { format: '{value}'},
			title: {text: ''},
			visible:true,
			tickInterval: 1
			},{
			min: 0,
			labels: { format: '{value}'},
			title: {text: ''},
			visible:false
			}],
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'pH Blowdown', type: 'line', yAxis: 0,
			data: [<?php echo $ph1 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			},{
			name: 'pH Boiler', type: 'line', yAxis: 1,
			data: [<?php echo $ph2 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			},{
			name: 'pH Feed Water', type: 'line', yAxis: 2,
			data: [<?php echo $ph3 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			}]
		});	
var chartac = Highcharts.chart('cond', {
		chart: {
			height: 250,
			type: 'line',
			alignTicks: false
			},
		title: {text: null},
		xAxis: { type: 'datetime'},
		credits: { enabled: false},
		yAxis: [{ 
			min: 0,
			title: { text: ' uS/cm'},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
			min: 0,
			labels: { format: '{value}'},
			title: {text: ' uS/cm'},
			visible:true,
			tickInterval: 300
			},{
			min: 0,
			labels: { format: '{value}'},
			title: {text: ' uS/cm'},
			visible:false
			}],
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'EC Blowdown', type: 'line', yAxis: 0,
			data: [<?php echo $ec1 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			},{
			name: 'EC Boiler', type: 'line', yAxis: 1,
			data: [<?php echo $ec2 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			},{
			name: 'EC Feed Water', type: 'line', yAxis: 2,
			data: [<?php echo $ec3 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			}]
		});
var chartac = Highcharts.chart('tbd', {
		chart: {
			height: 250,
			type: 'line',
			alignTicks: false
			},
		title: {text: null},
		xAxis: { type: 'datetime'},
		credits: { enabled: false},
		yAxis: [{ 
			min: 0,
			title: { text: ' uS/cm'},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
			min: 0,
			labels: { format: '{value}'},
			title: {text: ' uS/cm'},
			visible:true,
			tickInterval: 300
			},{
			min: 0,
			labels: { format: '{value}'},
			title: {text: ' uS/cm'},
			visible:false
			}],
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'Turbidity Blowdown', type: 'line', yAxis: 0,
			data: [<?php echo $tb1 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			},{
			name: 'Turbidity Boiler', type: 'line', yAxis: 1,
			data: [<?php echo $tb2 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			},{
			name: 'Turbidity Feed Water', type: 'line', yAxis: 2,
			data: [<?php echo $tb3 ?>],
			tooltip: { valueSuffix: ' uS/cm'}
			}]
		});											
</script>
