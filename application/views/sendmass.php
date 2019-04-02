<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-send"></i> Mass Message
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-4">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-12">
								<form action="<?php echo base_url() ?>sendmass" method="POST" id="searchList">
								<textarea rows="10" name="mess" class="form-control input-sm pull-right" ></textarea>
								<input type="hidden" name="user" value="<?php echo $user; ?>">
								<br>
								<button class="btn btn-sm btn-success btn-block"><i class="fa fa-send"></i> SEND !!!!</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>