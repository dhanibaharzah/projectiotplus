<html>
	<head>
		<meta charset="UTF-8">
		<title>UPDATE TICKET</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	</head>
	
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<div class="box box-primary">
				<form action="<?php echo base_url(); ?>line_upabticket" method="POST">
				<div class="box-body">
					<h3>Abnormallity</h3>
					<b>Submitted by: </b><?php echo $abdata->user.', '.$abdata->timestamp; ?> <br>
					<b>Report: </b><?php echo $abdata->note; ?>
					<br>
					<label>Suggestion:</label>
					<p><?php echo $ticket->sug; ?></p>
					<label>Last Update:</label><?php echo $ticket->timestamp; ?><br>
					<label>Update Log:</label><br>
					<p><?php echo nl2br($ticket->upd); ?></p>
					<label>New Update:</label><br>
					<textarea rows="5" class="form-control" name="upd" required></textarea>
				</div>
				<div class="box-footer">
					<a class="btn btn-default btn-sm" href="<?php echo base_url().'abnormallity' ?>"><i class="fa fa-arrow-left"></i> BACK</a>
					<input type="hidden" name="id" value="<?php echo $tic_id; ?>" />
					<input type="submit" class="btn btn-success btn-sm pull-right" value="Submit Ticket" />
					</form>
				</div>
				
			</div>
		</div>
		<div class="col-lg-12 col-xs-12">
			<div class="testbox"></div>
		</div>
	</div>
</html>