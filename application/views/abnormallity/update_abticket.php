<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-plus"></i> Update Abnormallity Job Ticket</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<form action="<?php echo base_url(); ?>up_abticket" method="POST">
					<div class="box-body">
						<label>Abnormallity:</label><br>
						<b>Submitted by: </b><?php echo $abdata->user.', '.$abdata->timestamp; ?> <br>
						<b>Report: </b><?php echo $abdata->note; ?>
						<br>
						<label>Suggestion:</label>
						<p><?php echo $ticket->sug; ?></p>
						<label>Last Update:</label><?php echo $ticket->timestamp; ?><br>
						<label>Update Log:</label><br>
						<p><?php echo nl2br($ticket->upd); ?></p>
						<label>New Update:</label><br>
						<textarea rows="5" class="form-control" name="upd"></textarea>
					</div>
					<div class="box-footer">
						<a class="btn btn-default btn-sm" href="<?php echo base_url().'abnormallity' ?>"><i class="fa fa-arrow-left"></i> BACK</a>
						<input type="hidden" name="id" value="<?php echo $tic_id; ?>" />
						<input type="submit" class="btn btn-success btn-sm pull-right" value="Submit Ticket" />
					</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4 col-xs-12">
				<img src="<?php echo base_url().'assets/report/'.$abdata->imglink; ?>.jpg" style="width:100%"/>
			</div>
		</div>
	</section>
</div>
