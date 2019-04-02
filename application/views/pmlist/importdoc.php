<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Import Document
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h4> Import to 
						<?php echo $code; ?>/<?php if($tag == 1){echo 'Electrical';}elseif($tag == 2){echo 'Mechanical';} ?>/<?php if($frec == 1){echo 'Weekly';}elseif($frec == 2){echo 'Monthly';} ?></h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div id="pmsheet" class="col-md-12"></div>
						</div>
					</div>
					<div class="box-body">
						<label>PM Document</label></br>
						<form role="form" id="edit_act" action="<?php echo base_url() ?>importdoc/<?php echo $code.'/'.$frec.'/'.$tag; ?>" method="post" role="form">
						<div class="form-control input-group">
							<select id="allpm" name="importcode" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($allpm)){ 
									foreach($allpm as $record)
									{
								?>
								<option value="<?php echo $record->code; ?> <?php if($importcode == $record->code){echo 'selected';}?>">[<?php echo $record->code; ?>] <?php echo $record->eq_name; ?></option>
								<?php } }?>
							</select>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Check</button>
							</div>
						</div>
						</form>
					<?php
						if(!empty($import)){
					?>
						<table class="table table-hover table-striped table-bordered" >
							<tr>
								<th>TAG</th>
								<th>Freq</th>
								<th>Code</th>
								<th>Machine Name</th>
								<th>View</th>
							</tr>
					<?php
							foreach($import as $record){
					?>
							<tr id="<?php echo $record->id; ?>">
								<td>
									<?php if($record->tag == 1){echo '<span class="label label-warning">Electrical</span>';}?>
									<?php if($record->tag == 2){echo '<span class="label label-primary">Mechanical</span>';}?>
									<?php if($record->tag == 3){echo '<span class="label label-success">Production</span>';}?>
								</td>
								<td>
									<?php if($record->frec == 1){echo '<span class="label label-success">Weekly</span>';}?>
									<?php if($record->frec == 2){echo '<span class="label label-danger">Monthly</span>';}?>
								</td>
								<td><?php echo $record->code;?></td>
								<td><?php echo $record->eq_name;?></td>
								<td><input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/></td>
							</tr>
					<?php
							}
					?>
						</table>
					<?php
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$("#allpm").select2({
			placeholder: "Select PM Code"
			});
        });
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#pmsheet').load('<?php echo base_url();?>pmimport/' + trid + '/<?php echo $code; ?>' + '/<?php echo $frec; ?>' + '/<?php echo $tag; ?>');
	});
</script>
