<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cement<small>Chart</small>
      </h1>
    </section>
    <section class="content-header">
		<div class="box-tools">
			<form action="<?php echo base_url() ?>rawcementchart" method="POST" id="searchList">
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
					<p> Hardness </p>
				</div>
				<div class="box-body">
					<div id="hard"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<p> Initial Settling Time </p>
				</div>
				<div class="box-body">
					<div id="time"></div>
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
//hardness=================================================================	

var chartac = Highcharts.chart('hard', {
		chart: {
			height: 400,
			type: 'spline',
			alignTicks: false,
			zoomType: ['y','x']
			},
		title: {text: null},
		xAxis: { type: 'datetime'},
		plotOptions: {
				series: {
					color: 'rgba(22, 149, 223, 1)'
					}
				},
		credits: { enabled: false},
		yAxis: [{ 
			min: 0,
			title: { text: 'Hardness(Psi)'},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
			min: 0,
			labels: { format: '{value}'},
			title: {text: ''},
			visible:true,
			tickInterval: 100,
			plotBands:[{
					color: 'rgba(255, 252, 178, 0.5)',
					label:{
						text: 'Warning'
					},
					from: 0,
					to: 100
				},{
					color: 'rgba(191, 239, 189, 0.5)',
					label:{
						text: 'Good'
					},
					from: 100,
                    to: 300
                    }]
			    }],	
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'Hardness (Psi)', type: 'spline', yAxis: 1,
			data: [<?php echo $hard ?>],
			tooltip: { valueSuffix: ''}
			}]
		});
//settling time=============================================================
$(function() {
  var data = [<?php echo $time; ?>];

  data.forEach(function(element, index) {
    if (element == 0) {
      data[index] = null;
    }
  });

var chartac = Highcharts.chart('time', {
		chart: {
			height: 400,
			type: 'spline',
			alignTicks: false,
			zoomType: ['y','x']
			},
		title: {text: null},
		xAxis: { type: 'datetime'
		},
		plotOptions: {
      series: {
        dataLabels: {
					enabled: false,
          formatter: function() {
            if (this.y > 0) {
              return this.y;
            }
          }
        }
      }
    },
		credits: { enabled: false},
		yAxis: [{ 
			min: 0,
			title: { text: 'Settling Time',},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
            min: 90,
            max: 130,
            labels: { format: '{value}'},
			title: {text: ''},
			visible:true,
      plotBands:[{
					color: 'rgba(255, 252, 178, 0.5)',
					label:{
						text: 'Warning'
					},
					from: 90, 
					to: 100
				},{
					color: 'rgba(191, 239, 189, 0.5)',
					label:{
						text: 'Normal'
					},
					from: 100,
					to: 120
				},{
					color: 'rgba(222, 57, 60, 0.5)',
					label:{
						text: 'Danger'
					},
					from: 120,
					to: 140
				}]
			}],	
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'Settling Time', type: 'spline', yAxis: 1,
			data: data,
			tooltip: { valueSuffix: ''}
			}]
		});
});										
</script>