<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-code"></i> Upload Rev Program <small>PLC and othres Program file</small> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
		<?php echo form_open_multipart('mtnbook/upload_prgrev2');?>
			<div class="col-lg-12 col-xs-12">
			<form action="<?php echo base_url() ?>upload_prgrev2" method="POST">
				<div class="box box-primary">
					<div class="box-body">
					<h4>Rev.<?php echo $rev + 1; ?></h4>
					<label>Program Title</label>
					<input type="text" class="form-control" placeholder="Write down Title" name="prg_namex" value="<?php echo $prg->prg_name; ?>" disabled>
					<label>Program Type</label>
					<input type="text" class="form-control" placeholder="Write down Type" name="prg_typex" value="<?php echo $prg->prg_type; ?>" disabled>
					<label>Select File (max 20MB, file format (.zip or .project)) :</label>
					<input type="file" name="berkas" class="form-control"/>
					</div>
					<div class="box-footer">
						<input type="hidden" name="prg_name" value="<?php echo $prg->prg_name; ?>">
						<input type="hidden" name="prg_type" value="<?php echo $prg->prg_type; ?>">
						<input type="hidden" name="rev" value="<?php echo $rev + 1; ?>">
						<input type="hidden" name="oldid" value="<?php echo $oldid; ?>">
						<button class="btn btn-primary">Submit</button>
						<a class="btn btn-default" href="<?php echo base_url()?>prg_dt">BACK</a>
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
</div>