<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> Materials
      </h1>
    </section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
    <section class="content">
        <div class="row">
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Sand Tank Level</h3>
					</div>
					<div class="box-body">
						<div id="container-ss1" style="height: 200px; float: center"></div>
						<div id="container-ss2" style="height: 200px; float: center"></div>
					</div>
					<div class="box-footer">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Return Tank Level</h3>
					</div>
					<div class="box-body">
						<div id="container-rs1" style="height: 200px; float: center"></div>
						<div id="container-rs2" style="height: 200px; float: center"></div>
					</div>
					<div class="box-footer">
					</div>
				</div>
			</div>
            
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Lime</h3>
					</div>
					<div class="box-body">
						<div id="lime_dis" ></div>
					</div>
					<div class="box-footer">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Cement</h3>
					</div>
					<div class="box-body">
						<div id="cement_dis" ></div>
					</div>
					<div class="box-footer">
					</div>
				</div>
			</div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				
					<div class="box-header">
						<form action="<?php echo base_url() ?>material" method="POST" id="searchList">
						<div class="col-md-9 form-group">
							<h3 class="box-title">Record Data</h3>
						</div>
						<div class="col-md-2 form-group">
							<input id="datepick" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate?>" class="form-control" placeholder="End Date"/>
						</div>
						<div class="col-md-1 form-group">
							<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
						</div>
                        </form>
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th>Timestamp</th>
									<th>SS1(%)</th>
									<th>SS2(%)</th>
									<th>RS1(%)</th>
									<th>RS2(%)</th>
									<th>Lime Dis(m)</th>
									<th>Cement Dis (m)</th>
								</tr>
								<?php
									if(!empty($tanktable))
									{
										foreach($tanktable as $record)
										{
								?>
								<tr>
									<td><?php echo $record->timestamp ?></td>
									<td><?php echo number_format($record->SS_1, 1, '.', '') ?></td>
									<td><?php echo number_format($record->SS_2, 1, '.', '') ?></td>
									<td><?php echo number_format($record->RS_1,1, '.', '') ?></td>
									<td><?php echo number_format($record->RS_2, 1, '.', '') ?></td>
									<td><?php echo number_format($record->LIME, 2, '.', '') ?></td>
									<td><?php echo number_format($record->CEM, 2, '.', '') ?></td>
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
<script type="text/javascript">
$(function() {
		$('#datepick').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			showWeekNumbers: false,
			timePicker: true,
			timePickerIncrement: 15,
			timePicker24Hour: true,
			alwaysShowCalendars: false,
			locale:{
				format: 'YYYY-MM-DD HH:mm:ss'
			},
			opens: 'left'
		});
	});


var lime_dis = Highcharts.chart('lime_dis', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Lime Distance'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 1500,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: 'cm'
        },
        plotBands: [{
            from: 0,
            to: 500,
            color: '#55BF3B' // green 55BF3B
        }, {
            from: 500,
            to: 1000,
            color: '#DDDF0D' // yellow DDDF0D
        }, {
            from: 1000,
            to: 1500,
            color: '#DF5353' // red DF5353
        }]
    },

    series: [{
        name: 'Lime Distance',
        data: [0],
        tooltip: {
            valueSuffix: ' cm'
        }
    }]

},
// Add some life
);

var cement_dis = Highcharts.chart('cement_dis', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
	credits: {
		enabled: false
	},
    title: {
        text: 'Cement Distance'
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 1500,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: 'cm'
        },
        plotBands: [{
            from: 0,
            to: 500,
            color: '#55BF3B' // green 55BF3B
        }, {
            from: 500,
            to: 1000,
            color: '#DDDF0D' // yellow DDDF0D
        }, {
            from: 1000,
            to: 1500,
            color: '#DF5353' // red DF5353
        }]
    },

    series: [{
        name: 'Cement Distance',
        data: [0],
        tooltip: {
            valueSuffix: ' cm'
        }
    }]

},
// Add some life
);

var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
            [0.1, '#DF5353'], // red
            [0.5, '#DDDF0D'], // yellow
            [0.9, '#55BF3B'] // green
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickAmount: 2,
        title: {
            y: -70
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};

// The ss1 gauge
var chartss1 = Highcharts.chart('container-ss1', Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'Sand Tank 1'
        }
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'SS1',
        data: [1],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
                   '<span style="font-size:25px;color:silver">%</span></div>'
        },
        tooltip: {
            valueSuffix: ' %'
        }
    }]

}));

// The ss2 gauge
var chartss2 = Highcharts.chart('container-ss2', Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'Sand Tank 2'
        }
    },
	credits: {
        enabled: false
    },
    series: [{
        name: 'SS2',
        data: [1],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
                   '<span style="font-size:25px;color:silver">%</span></div>'
        },
        tooltip: {
            valueSuffix: ' %'
        }
    }]

}));

// The rs1 gauge
var chartrs1 = Highcharts.chart('container-rs1', Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'Return Tank 1'
        }
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'RS1',
        data: [1],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
                   '<span style="font-size:25px;color:silver">%</span></div>'
        },
        tooltip: {
            valueSuffix: ' %'
        }
    }]

}));

// The rs2 gauge
var chartrs2 = Highcharts.chart('container-rs2', Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'Return Tank 2'
        }
    },
	credits: {
        enabled: false
    },
    series: [{
        name: 'RS2',
        data: [1],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
                   '<span style="font-size:25px;color:silver">%</span></div>'
        },
        tooltip: {
            valueSuffix: ' %'
        }
    }]

}));

    var socket = io('http://180.250.75.146:4000');
	socket.on('mqtt', function(data){
		var point,
			newVal,
			ss1, ss2, rs1, rs2;
				
		if (data.topic == 'ss1_lvl') {
			ss1 = parseFloat(data.payload);
			point = chartss1.series[0].points[0];
			newVal = ss1;				point.update(newVal);
		}
			
		if (data.topic == 'ss2_lvl') {
			ss2 = parseFloat(data.payload);
			point = chartss2.series[0].points[0];
			newVal = ss2;
			point.update(newVal);
		}
			
		if (data.topic == 'rs1_lvl') {
			rs1 = parseFloat(data.payload);
			point = chartrs1.series[0].points[0];
			newVal = rs1;
			point.update(newVal);
		}
		
		if (data.topic == 'rs2_lvl') {
			rs2 = parseFloat(data.payload);
			point = chartrs2.series[0].points[0];
			newVal = rs2;
			point.update(newVal);
		}
		if (data.topic == 'lime_dis') {
			var xx = (parseFloat(data.payload)*100).toFixed(1);
			point = lime_dis.series[0].points[0];
			newVal = parseFloat(xx);
			point.update(newVal);
		}
		if (data.topic == 'cement_dis') {
			var xx = (parseFloat(data.payload)*100).toFixed(1);
			point = cement_dis.series[0].points[0];
			newVal = parseFloat(xx);
			point.update(newVal);
		}
		
	});
	jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "material/" + value);
            jQuery("#searchList").submit();
        });
</script>
