<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-bolt"></i> Realtime Calculation from <?php echo date('Y-m-d');?> 00:00:00 GMT+7
		</h1>
	</section>
	<section class="content">
	<?php
		$timecat = $ddt;
		$category = '';
		for($x = 1; $x <= 31; $x++){
			$category .= "'".$x." ".$timecat."',";
		}
		$cat = substr($category, 0, -1);
	?>
		<div class="row">
			<div class="col-lg-2 col-md-4 col-xs-12 iot_amp"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_power"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_sepam"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_solar"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_electotal"></div>
			<div class="col-lg-2 col-md-4 col-xs-12 iot_elecprice"></div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-heading">
						<div class="col-md-9 box-title">
							<h3>Monthly estimator, Session: <?php echo $ddt; ?>, Price: <?php echo $basic_val; ?> IDR/kWh
								<button title="Update basic price" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit"><i class="fa fa-gear"></i> Update Price</button>
								<div class="modal modal-primary fade" id="edit">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
												<h4>New Price IDR</h4>
											</div>
											<form role="form" id="edit_act" action="<?php echo base_url() ?>update_iot_config" method="post" role="form">
											<div class="modal-body">
												<input type="number" name="val" rows="2" class="form-control" value="<?php echo $basic_val; ?>" required>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<input type="hidden" name="id" value="<?php echo $basic_id; ?>">
												<input type="hidden" name="redir" value="iot_solar_per">
												<input type="submit" class="btn btn-outline" value="EDIT">
											</div>
											</form>
										</div>
									</div>
								</div>
							</h3>
						</div>
						<div class="col-md-2">
						<form action="<?php echo base_url(); ?>iot_solar_per" method="POST">
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
				<!--		<div class="row">
							<div class="col-sm-12 col-xs-12 text-center">
								<h4 style="color:red;"><i class="fa fa-warning"></i> Calculation Error! Failed to read SEPAM 6kV Data! Please import it manually!</h4>
							</div> 
						</div>-->
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
            text: 'MWh consumption'
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
          return this.series.name + ': <b>' + this.y + ' </b>MWh<br/>'
                + 'Price : <b>'+ (this.y * <?php echo $basic_val/1000; ?>).toFixed(2) + '</b> mil IDR<br/>'
				+ 'Total: <b>' + this.stackTotal + '</b> MWh'; 
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
	$('.iot_amp').load('<?php echo base_url(); ?>iot_amp');
	$('.iot_power').load('<?php echo base_url(); ?>iot_power');
	$('.iot_sepam').load('<?php echo base_url(); ?>iot_sepam');
	$('.iot_solar').load('<?php echo base_url(); ?>iot_solar');
	$('.iot_electotal').load('<?php echo base_url(); ?>iot_electotal');
	$('.iot_elecprice').load('<?php echo base_url(); ?>iot_elecprice');
	setInterval(function(){
		$('.iot_amp').load('<?php echo base_url(); ?>iot_amp');
		$('.iot_power').load('<?php echo base_url(); ?>iot_power');
		$('.iot_sepam').load('<?php echo base_url(); ?>iot_sepam');
		$('.iot_solar').load('<?php echo base_url(); ?>iot_solar');
		$('.iot_electotal').load('<?php echo base_url(); ?>iot_electotal');
		$('.iot_elecprice').load('<?php echo base_url(); ?>iot_elecprice');
	}, 60000)
jQuery('.datepicker').datepicker({
			autoclose: true,
			format : "yyyy-mm-dd",
			startDate : "2019-01-01",
			todayHighlight : true
		});

</script>