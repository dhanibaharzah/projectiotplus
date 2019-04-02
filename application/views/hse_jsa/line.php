<div class="content-wrapper">
	<section class="content-header">
		<h1>
			LINE Guide
			<small> LINE -> PT. SLCI</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header text-center">
						<h3>Add this line account to enable your LINE notification</h3>
					</div>
					<div class="box box-body">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<img src="<?php echo base_url(); ?>assets/images/line.jpg" width="100%" alt="Line Image"/>
						</div>
						<div class="col-md-2">
						</div>
					</div>
					<div class="box box-footer">
					<form role="form" action="<?php echo base_url().'pingline'; ?>" method="post">
						<?php if(!empty($lineid)){?>
						<input type="hidden" name="userid" value="<?php echo $lineid ?>">
						<button class="btn btn-primary btn-block btn-sm">PING ME!</button>
						<?php } ?>
					</form>
					<br><b>Get your Channel!</b>
					<p>1. Send "reg" to RAWR! dummy bot<br>
					2. You will receive a guide server<br>
					3. Just follow the step...</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box box-body">
						<div class="col-md-12">
							<img src="<?php echo base_url(); ?>assets/images/unnamed.jpg" width="100%" alt="Line Image"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>