<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-bolt"></i> Daily Calculation
		</h1>
	</section>
	<section class="content">
	<?php
		$timecat = ':00';
		$category = '';
		for($x = 0; $x <= 23; $x++){
			$category .= "'".$x." ".$timecat."',";
		}
		$cat = substr($category, 0, -1);
	?>
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-heading">
						<div class="col-md-9 box-title">
							<h3>Daily estimator, Selected Date: <?php echo $start_date; ?>, Price: <?php echo $basic_val; ?> IDR/kWh</h3>
						</div>
						<div class="col-md-2">
						<form action="<?php echo base_url(); ?>iot_electrical_daily" method="POST">
							<input class="form-control datepicker" autocomplete="off" name="start_date" value="<?php echo $start_date; ?>">
						</div>	
						<div class="col-md-1">
							<button class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Search</button>
						</div>
						</form>
					</div>
					<div class="box-body no-padding">
						<div class="col-md-12">
							<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-4 col-xs-4">
								<div class="description-block border-right">
									<span class="description-percentage text-aqua"><i class="fa fa-caret-up"></i> 100%</span>
									<h5 class="description-header"><?php echo $idrTOT;?> IDR</h5>
									<span class="description-text">TOTAL</span>
								</div>
							</div>
							<div class="col-sm-4 col-xs-4">
								<div class="description-block border-right">
									<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo $persenPV;?>%</span>
									<h5 class="description-header"><?php echo $idrPV;?> IDR</h5>
									<span class="description-text">PV SAVING</span>
								</div>
							</div>
							<div class="col-sm-4 col-xs-4">
								<div class="description-block border-right">
									<span class="description-percentage text-yellow"><i class="fa fa-caret-up"></i> <?php echo $persenPLN;?>%</span>
									<h5 class="description-header"><?php echo $idrPLN;?> IDR</h5>
									<span class="description-text">PAY TO PLN</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Electrical Consumption'
    },
    xAxis: {
        categories: [<?php echo $cat;?>]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'kWh consumption'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        //pointFormat: '{series.name}: {point.y} MWh<br/>Total: {point.stackTotal} MWh'
		pointFormatter: function() { 
          return this.series.name + ': <b>' + this.y + ' </b>kWh<br/>'
				+ 'Total: <b>' + this.stackTotal + '</b> kWh'; 
        }
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    series: [{
        name: 'PLN',
        data: [<?php echo $PLN; ?>]
    }, {
        name: 'PV',
        data: [<?php echo $PV; ?>]
    }]
});
jQuery('.datepicker').datepicker({
			autoclose: true,
			format : "yyyy-mm-dd",
			startDate : "2019-01-01",
			endDate : "<?php echo date('Y-m-d'); ?>",
			todayHighlight : true
		});
</script>