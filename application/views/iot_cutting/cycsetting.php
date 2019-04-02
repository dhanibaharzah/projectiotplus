<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-gear" aria-hidden="true"></i> Cycletime Setting Parameter
			<small> Edit and set cycletime calculator</small>
		</h1>
	</section>
    
	<section class="content">
		<div class="row">
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-body">
					<form role="form" id="addtool" action="<?php echo base_url() ?>iot_cycsetting_exe" method="post" role="form">
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $mtdcyc->name; ?></b> <small><?php echo $mtdcyc->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $mtdcyc->tag; ?>" required type="number" value="<?php echo $mtdcyc->value; ?>">
									<span class="input-group-addon"><?php echo $mtdcyc->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $downtime->name; ?></b> <small><?php echo $downtime->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $downtime->tag; ?>" required type="number" value="<?php echo $downtime->value; ?>">
									<span class="input-group-addon"><?php echo $downtime->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $slowspeed->name; ?></b> <small><?php echo $slowspeed->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $slowspeed->tag; ?>" required type="number" value="<?php echo $slowspeed->value; ?>">
									<span class="input-group-addon"><?php echo $slowspeed->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_rate_1->name; ?></b> <small><?php echo $gauge_rate_1->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_rate_1->tag; ?>" required type="number" value="<?php echo $gauge_rate_1->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_rate_1->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_rate_2->name; ?></b> <small><?php echo $gauge_rate_2->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_rate_2->tag; ?>" required type="number" value="<?php echo $gauge_rate_2->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_rate_2->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_rate_3->name; ?></b> <small><?php echo $gauge_rate_3->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_rate_3->tag; ?>" required type="number" value="<?php echo $gauge_rate_3->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_rate_3->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_cut_1->name; ?></b> <small><?php echo $gauge_cut_1->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_cut_1->tag; ?>" required type="number" value="<?php echo $gauge_cut_1->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_cut_1->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_cut_2->name; ?></b> <small><?php echo $gauge_cut_2->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_cut_2->tag; ?>" required type="number" value="<?php echo $gauge_cut_2->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_cut_2->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_cut_3->name; ?></b> <small><?php echo $gauge_cut_3->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_cut_3->tag; ?>" required type="number" value="<?php echo $gauge_cut_3->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_cut_3->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_dt_1->name; ?></b> <small><?php echo $gauge_dt_1->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_dt_1->tag; ?>" required type="number" value="<?php echo $gauge_dt_1->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_dt_1->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_dt_2->name; ?></b> <small><?php echo $gauge_dt_2->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_dt_2->tag; ?>" required type="number" value="<?php echo $gauge_dt_2->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_dt_2->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_dt_3->name; ?></b> <small><?php echo $gauge_dt_3->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_dt_3->tag; ?>" required type="number" value="<?php echo $gauge_dt_3->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_dt_3->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_mix_1->name; ?></b> <small><?php echo $gauge_mix_1->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_mix_1->tag; ?>" required type="number" value="<?php echo $gauge_mix_1->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_mix_1->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_mix_2->name; ?></b> <small><?php echo $gauge_mix_2->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_mix_2->tag; ?>" required type="number" value="<?php echo $gauge_mix_2->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_mix_2->unit; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<h5><b><?php echo $gauge_mix_3->name; ?></b> <small><?php echo $gauge_mix_3->desc; ?></small></h5>
							</div>
							<div class="col-md-5">
								<div class="form-group input-group">
									<input class="form-control input-sm" name="<?php echo $gauge_mix_3->tag; ?>" required type="number" value="<?php echo $gauge_mix_3->value; ?>">
									<span class="input-group-addon"><?php echo $gauge_mix_3->unit; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body">
						Please contact Server Developer to change those setting
						<button class="pull-right btn btn-primary"> Submit</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>