<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-plus"></i> Add PM Document</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
					<?php if(empty($newcode)){?>
					<form action="<?php echo base_url() ?>newdoc" method="POST">
						<div class="col-md-4">
							<select id="area" name="area" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($codearea)){ 
									foreach($codearea as $record)
									{
								?>
								<option value="<?php echo $record->code; ?>"><?php echo $record->code; ?> - <?php echo $record->note; ?></option>
								<?php } }?>
							</select>
						</div>
						<div class="col-md-4">
							<select id="dev" name="dev" class="form-control" required>
								<option value=""></option>
								<?php if(!empty($codedev)){ 
									foreach($codedev as $record)
									{
								?>
								<option value="<?php echo $record->code; ?>"><?php echo $record->code; ?> - <?php echo $record->note; ?></option>
								<?php } }?>
							</select>
						</div>
						<div class="col-md-4">
							<input type="submit" class="btn btn-success btn-sm" value="Generate Code" />
						</div>
					</form>
					<?php }else{ ?>
					<h4><?php echo $newcode; ?> <span> <a href="<?php echo base_url();?>newdoc" class="btn btn-sm btn-danger"><i class="fa fa-refresh"></i> Reset</a> </span></h4>
					<?php } ?>
					<?php if(!empty($prefix)){if($prefix != 0){?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>Cannot add this code due to missmatch between number of document and document number,
							this problem occur due to manually database input, please contact database admin to fix this trouble!
						</div>
					<?php } } ?>
					</div>
					<?php if(empty($prefix) AND !empty($newcode)){?>
					<div class="box-body">
					<form action="<?php echo base_url() ?>createdoc" method="POST">
						<label class="pull-left">Equipment/Machine Name:</label>
						<textarea onkeyup="lettersOnly(this)" type="text" name="eq_name" rows="2" class="form-control" required></textarea>
						This code will appear both electrical and mechanical, also both weekly and monthly. After press "CREATE DOCUMENT" button, you will go to weekly electrical document automatically. If you want to edit other tag/frequency format of this new code, please use "Document Check" function menu.
						<input type="hidden" name="newcode" value="<?php echo $newcode;?>" />
					</div>
					<div class="box-footer">
						<input type="submit" class="btn btn-success btn-sm" value="CREATE DOCUMENT" />
					</form>
					</div>
					<?php } ?>
					
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
			$("#area").select2({
			placeholder: "Select Area"
			});
			$("#dev").select2({
			placeholder: "Select Device"
			});
        });
</script>
