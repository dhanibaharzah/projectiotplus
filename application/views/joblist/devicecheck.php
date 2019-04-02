<div class="content-wrapper">
	<section class="content">
		<div class="callout bg-red">
			<h3>Incomplete part, please check detail below</h3>
			<p><b><?php echo $job->job_title.' </b>'; ?></p>
			<p><?php echo nl2br($job->job_desc); ?></p>
			<a href="<?php echo base_url(); ?>setprojectsch/<?php echo $start_date?>" class="btn btn-outline"><i class="fa fa-arrow-left"></i> BACK</a>
			<a href="<?php echo base_url(); ?>workshopdev?>" class="btn btn-primary pull-right"><i class="fa fa-wrench"></i> Go to Workshop</a>
		</div>
		<div class="col-md-6">
			<?php echo $tabel; ?>
		</div>
	</section>
</div>