<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-gears"></i> Sub Class Setting</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
					<form role="form" id="adddevice" action="<?php echo base_url() ?>devsubclass" method="post" role="form">
						<div class="form-group form-group-sm col-md-10">
							<select id="class_code" name="class_code" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($dev_class)){ 
									foreach($dev_class as $record)
									{
								?>
								<option value="<?php echo $record->dev_code; ?>" <?php if($record->dev_code == $class_code){echo 'selected';}?>><?php echo $record->dev_class; ?> [<?php echo $record->dev_code; ?>]</option>
								<?php } }?>
							</select>
						</div>
						<div class="form-group form-group-sm col-md-2">
							<input type="submit" class="btn btn-success btn-sm btn-block" value="Check">
						</div>
					</form>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th class="text-center">Sub Class Code</th>
								<th class="text-center">Description</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($mainclass)){
								foreach($mainclass as $record){
						?>
							<tr>
								<td class="text-center">
									<?php if($record->isvalid == 1){echo '<span class="label label-success">ON</span>';}?>
									<?php if($record->isvalid == 0){echo '<span class="label label-danger">OFF</span>';}?>
									<b><?php echo $record->code; ?></b>
								</td>
								<td class="text-center"><?php echo $record->size; ?></td>
								<td class="text-center">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editsubclass<?php echo $record->id; ?>"><i class="fa fa-pencil"></i></button>
									<div class="modal modal-default fade" id="editsubclass<?php echo $record->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" action="<?php echo base_url() ?>devsubclass" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Description:</label>
													<input type="text" name="size" class="form-control" value="<?php echo $record->size; ?>" required>
													<label class="radio-inline"><input type="radio" name="isvalid" value="1" <?php if($record->isvalid == 1){echo 'checked';}?>>ON</label>
													<label class="radio-inline"><input type="radio" name="isvalid" value="0" <?php if($record->isvalid == 0){echo 'checked';}?>>OFF</label>
													<input class="hidden" name="id" value="<?php echo $record->id; ?>">
													<input class="hidden" name="class_code" value="<?php echo $class_code; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php
								}
							}
						?>
							<tr>
								<td colspan="2"></td>
								<td class="text-center">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addsubclass"><i class="fa fa-plus"></i></button>
									<div class="modal modal-default fade" id="addsubclass">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
												</div>
												<form role="form" action="<?php echo base_url() ?>devsubclass" method="post" role="form">
												<div class="modal-body">
													<label class="pull-left">Code:</label>
													<input type="text" name="code" class="form-control" required>
													<label class="pull-left">Description:</label>
													<input type="text" name="size" class="form-control" required>
													<input class="hidden" name="class_code" value="<?php echo $class_code; ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value="Submit">
												</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<?php if(!empty($cekcode)){ ?>
				<div class="callout callout-danger">
					<p>Looks like you just submit used code, please choose other code</p>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#class_code").select2({
			placeholder: "Select Class"
		});
	});
</script>