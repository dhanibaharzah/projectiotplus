<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="<?php echo base_url().'alldev';?>" class="btn btn-sm btn-primary">Back to All Device</a> | <a href="<?php echo base_url().'workshopdev';?>" class="btn btn-sm btn-default">Back to Workshop</a>
			<i class="fa fa-gears"></i> Edit device 
			<small><?php echo $param->code; ?></small>
		</h1>
    </section>
    
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Enter Details of Code.[<?php echo $param->code; ?>]</h3>
					</div>
					<form role="form" action="<?php echo base_url() ?>editdevicein" method="post" id="editdevicein" role="form">
					<?php echo $form; ?>
					<?php if(!empty($form)){?>
						<div class="form-group form-group-sm col-md-12">
							<label>Identification Class:</label>
							<select id="idenlist" name="iden_id" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($idenlist)){ 
									foreach($idenlist as $record){
								?>
								<option value="<?php echo $record->id; ?>" <?php if($param->iden_id == $record->id){echo 'selected';}?>><?php echo $record->iden_name; ?></option>
								<?php } }?>
							</select>
						</div>
						<?php } ?>
					<div class="box-footer">
						<input type="submit" class="btn btn-primary" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
					</form>
				</div>
			</div>
		</div> 
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#idenlist").select2({
			placeholder: "Select Identification"
		});
	});
</script>