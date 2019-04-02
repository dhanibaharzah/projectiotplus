<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LIME <small>Chart</small>
      </h1>
    </section>
    <section class="content-header">
		<div class="box-tools">
			<form action="<?php echo base_url() ?>rawlimechart" method="POST" id="searchList">
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
					<p> CaO </p>
				</div>
				<div class="box-body">
					<div id="cao"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<p> T 60 </p>
				</div>
				<div class="box-body">
					<div id="t60"></div>
				</div>
			</div>
		</div>
        <div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<p> Temp. Max </p>
				</div>
				<div class="box-body">
					<div id="tmax"></div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<p> Shieve </p>
				</div>
				<div class="box-body">
					<div id="sieve"></div>
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
//cao=================================================================	

$(function() {
  var data = [<?php echo $cao; ?>];

  data.forEach(function(element, index) {
    if (element == 0) {
      data[index] = null;
    }
  });

var chartac = Highcharts.chart('cao', {
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
			title: { text: 'CaO',},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
            min: 70,
            max: 100,
            labels: { format: '{value}'},
			title: {text: ''},
			visible:true,
      plotBands:[{
					color: 'rgba(255, 252, 178, 0.5)',
					label:{
						text: 'Warning'
					},
					from: 70, 
					to: 80
				},{
					color: 'rgba(191, 239, 189, 0.5)',
					label:{
						text: 'Normal'
					},
					from: 80,
					to: 100
				}]
			}],	
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'cao', type: 'spline', yAxis: 1,
			data: data,
			tooltip: { valueSuffix: ''}
			}]
		});
});								
//t60=============================================================

//tmax=================================================================	

$(function() {
  var data = [<?php echo $tmax; ?>];

  data.forEach(function(element, index) {
    if (element == 0) {
      data[index] = null;
    }
  });

var chartac = Highcharts.chart('tmax', {
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
			title: { text: 'Temp Max',},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
            min: 50,
            max: 100,
            labels: { format: '{value}'},
			title: {text: ''},
			visible:true,
      plotBands:[{
					color: 'rgba(191, 239, 189, 0.5)',
					label:{
						text: 'Normal'
					},
					from: 60,
					to: 100
				},{
					color: 'rgba(222, 57, 60, 0.5)',
					label:{
						text: 'Danger'
					},
					from: 50,
					to: 60
				}]
			}],	
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'Temp Max', type: 'spline', yAxis: 1,
			data: data,
			tooltip: { valueSuffix: ''}
			}]
		});
});								
//sieve=============================================================
$(function() {
  var data = [<?php echo $sieve; ?>];

  data.forEach(function(element, index) {
    if (element == 0) {
      data[index] = null;
    }
  });

var chartac = Highcharts.chart('sieve', {
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
			title: { text: 'Sieve',},
			labels: { format: '{value}'},
			gridLineWidth:0,
			visible:false
			},{
            min: 50,
            max: 100,
            labels: { format: '{value}'},
			title: {text: ''},
			visible:true,
			}],	
		tooltip: { shared: true },
		exporting: {
			enabled: true
		},
		series: [{
			name: 'Sieve', type: 'spline', yAxis: 1,
			data: data,
			tooltip: { valueSuffix: ''}
			}]
		});
});						
</script>