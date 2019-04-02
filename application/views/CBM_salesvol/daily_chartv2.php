<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CBM Sales Report</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	</head>
	<div class="row">
	<?php
		if(!empty($list)){ 
			foreach($list as $record){
	?>
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div id="getdate<?php echo $record->id; ?>"></div>
		</div>
	<?php 
			} 
		}
	?>
	</div>
<script src="<?php echo base_url(); ?>assets/highchart/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highchart/highcharts-more.js"></script>
<script src="<?php echo base_url(); ?>assets/highchart/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highchart/offline-exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highchart/export-data.js"></script>
<script src="<?php echo base_url(); ?>assets/highchart/bullet.js"></script>
<script src="<?php echo base_url(); ?>assets/highchart/solid-gauge.js"></script>
<script src="<?php echo base_url(); ?>assets/highchart/series-label.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
<?php 
	if(!empty($list)){ 
		foreach($list as $record){
?>
			$('#getdate<?php echo $record->id; ?>').load('<?php echo base_url(); ?>cbm_view_chart_linev2/' + '<?php echo date('U'); ?>' + '000/' + '<?php echo $record->cbm_id; ?>/' + '<?php echo $record->prod_name; ?>' );	
<?php 
		} 
	}
?>
</script>
</html>