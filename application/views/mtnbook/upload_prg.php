<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-code"></i> Upload Program <small>PLC and othres Program file</small> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
		<?php echo form_open_multipart('mtnbook/upload_prg2');?>
			<div class="col-lg-12 col-xs-12">
			<form action="<?php echo base_url() ?>upload_prg2" method="POST">
				<div class="box box-primary">
					<div class="box-body">
					<label>Program Title</label>
					<input onkeyup="lettersOnly(this)" type="text" class="form-control" placeholder="Write down Title" name="prg_name">
					<label>Program Type</label>
					<input onkeyup="lettersOnly(this)" type="text" class="form-control" placeholder="Write down Type" name="prg_type">
					<label>Select File (max 20MB, all file format are allowed) :</label>
					<input type="file" name="berkas" class="form-control"/>
					</div>
					<div class="box-footer">
						<button class="btn btn-primary">Submit</button>
						<a class="btn btn-default" href="<?php echo base_url()?>prg_dt">BACK</a>
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
</div>
