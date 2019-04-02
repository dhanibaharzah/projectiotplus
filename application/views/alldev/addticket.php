<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-gears"></i> Repair Ticket ID.<?php echo $ticket->id; ?> Device[<?php echo $ticket->code; ?>]</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box">
					<div class="box-header">
					<form role="form" id="edit_act" action="<?php echo base_url() ?>addupdateticket" method="post" role="form">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<b>PIC.<?php echo $ticket->pic; ?></b>
							</div>
							<div class="col-lg-12 col-xs-12">
								<label>Activity: </label>
								<select id="actrepair" name="act" class="form-control" required>
									<option value=""></option>
									<?php if(!empty($actrepair)){ 
										foreach($actrepair as $rec){
									?>
									<option value="<?php echo $rec->act; ?>"><?php echo $rec->act; ?></option>
									<?php } }?>
									<option value="Others">Others</option>
								</select>
							</div>
							<div class="col-lg-12 col-xs-12">
								<label>Note: </label>
								<textarea onkeyup="lettersOnly(this)" type="text" name="note" rows="2" class="form-control" required></textarea>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" name="ticket_id" value="<?php echo $ticket->id; ?>">
						<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>workshopdev"> BACK</a>
						<input type="submit" class="btn btn-primary" value="Submit">
					</div>
					</form>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">Time</th>
								<th class="text-center">PIC</th>
								<th class="text-center">Activity</th>
								<th class="text-center">Note</th>
							</tr>
						<?php
							if(!empty($ticketact)){
								foreach($ticketact as $record){
						?>
							<tr>
								<td align="center"><?php echo $record->timestamp; ?></td>
								<td align="center"><?php echo $record->pic; ?></td>
								<td align="center"><?php echo $record->act; ?></td>
								<td align="center"><?php echo $record->note; ?></td>
							</tr>
						<?php
								}
							}else{
						?>
							<tr>
								<td colspan="4">No data..</td>
							</tr>
						<?php
							}
						?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#actrepair").select2({
			placeholder: "Select Activity"
		});
	});
</script>
