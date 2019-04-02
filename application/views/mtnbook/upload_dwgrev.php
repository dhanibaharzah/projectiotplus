<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-code"></i> Upload Rev Design <small>Drawing and othres Design file</small> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
		<?php echo form_open_multipart('mtnbook/upload_dwgrev2');?>
			<div class="col-lg-12 col-xs-12">
			<form action="<?php echo base_url() ?>upload_dwgrev2" method="POST">
				<div class="box box-primary">
					<div class="box-body">
					<h4>Rev.<?php echo $rev + 1; ?></h4>
					<label>Design Title</label>
					<input type="text" class="form-control" placeholder="Write down Title" name="dwg_namex" value="<?php echo $dwg->dwg_name; ?>" disabled>
					<label>Design Type</label>
					<input type="text" class="form-control" placeholder="Write down Type" name="dwg_typex" value="<?php echo $dwg->dwg_type; ?>" disabled>
					<label>Select File (max 20MB, all file format are allowed) :</label>
					<input type="file" name="berkas" class="form-control"/>
					</div>
					<div class="box-footer">
						<input type="hidden" name="dwg_name" value="<?php echo $dwg->dwg_name; ?>">
						<input type="hidden" name="dwg_type" value="<?php echo $dwg->dwg_type; ?>">
						<input type="hidden" name="rev" value="<?php echo $rev + 1; ?>">
						<input type="hidden" name="oldid" value="<?php echo $oldid; ?>">
						<button class="btn btn-primary">Submit</button>
						<a class="btn btn-default" href="<?php echo base_url()?>dwg_dt">BACK</a>
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
</div>