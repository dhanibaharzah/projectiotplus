<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="<?php echo base_url().$redirect; ?>" class="btn btn-sm btn-primary">BACK</a>
			<i class="fa fa-gears"></i> Setting Linked PM Sheet 
			<small><?php echo $tool->id; ?></small>
		</h1>
    </section>
    <section class="content">
		<div class="row">
			<div class="col-md-5">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Tool ID:<?php echo $tool->id; ?></h3>
					</div>
					<form role="form" action="<?php echo base_url() ?>edittooldoc" method="post" id="edittooldoc" role="form">
					<div class="box-body">
						<b>Name: </b><?php echo $tool->name; ?><br>
						<b>Brand: </b><?php echo $tool->brand; ?><br>
						<b>Size: </b><?php echo $tool->size; ?>
						<select id="pmform" name="pmform" class="form-control" required>
							<option value=""></option>
							<?php if(!empty($pmform)){ 
								foreach($pmform as $record)
								{
							?>
							<option value="<?php echo $record->title; ?>" <?php if($tool->doctitle == $record->title){echo 'selected';}?>><?php echo $record->title; ?></option>
							<?php } }?>
						</select>
					</div>
					<div class="box-footer">
						<input type="hidden" name="id" value="<?php echo $tool->id; ?>" />
						<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
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
		$("#pmform").select2({
			placeholder: "Select Title"
		});
	});
</script>