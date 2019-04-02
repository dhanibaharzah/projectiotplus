<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> Closed Permit
      </h1>
    </section>
    
    <section class="content">
		<div class="col-lg-12 col-xs-12">
			<div class="row">
				<div class="box box-danger">
					<div class="box-header no-padding">
						<div class="pull-right">
							<button class="btn btn-xs btn-warning" data-widget="collapse"><i class="fa fa-minus"></i> Filter Box</button>
						</div>
					</div>
					<div class="box-body">
					<form action="<?php echo base_url() ?>closedjsa" method="POST" id="searchList">
						<div class="box-tools">
							<div class="row">
								<div class="col-md-4 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											From
										</div>
										<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker input-sm" placeholder="From Date"/>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											To
										</div>
										<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker input-sm" placeholder="To Date"/>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											Area
										</div>
										<select id="area" name="lokasi" class="form-control">
											<option value=""></option>
											<?php if(!empty($area)){ 
												foreach($area as $record)
												{
											?>
											<option value="<?php echo $record->toolname; ?>" <?php if($lokasi == $record->toolname){echo 'selected';}?>><?php echo $record->toolname; ?></option>
											<?php } }?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 form-group">
									<label><input type="checkbox" class="minimal" name="type1" <?php if($type1 == 'on'){ echo 'checked';}?>> Hot Work <?php echo $type1;?></label>
									<label><input type="checkbox" class="minimal" name="type2" <?php if($type2 == 'on'){ echo 'checked';}?>> At High  </label>
									<label><input type="checkbox" class="minimal" name="type3" <?php if($type3 == 'on'){ echo 'checked';}?>> Confined Space  </label>
									<label><input type="checkbox" class="minimal" name="type4" <?php if($type4 == 'on'){ echo 'checked';}?>> Digging  </label>
									<label><input type="checkbox" class="minimal" name="type5" <?php if($type5 == 'on'){ echo 'checked';}?>> Electrical  </label>
									<label><input type="checkbox" class="minimal" name="type6" <?php if($type6 == 'on'){ echo 'checked';}?>> General  </label>
								</div>
							</div>
							
						</div>
					</div>
					<div class="box-tools">
						
							<div class="input-group">
								<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
								<div class="input-group-btn">
									<button class="btn btn-sm btn-success searchList">Search <i class="fa fa-search"></i></button>
								</div>
							</div>
					</form>
					</div>
					
				</div>
			</div>
		</div>
		<?php if($vendor == 2){?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-red">
						<div class="inner text-center">
							<h4><?php echo $hot_work; ?></h4>
							<p><b>Hot Work</b></p>
						</div>
						<div class="icon">
							<i class="fa fa-fire-extinguisher"></i>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-purple">
						<div class="inner text-center">
							<h4><?php echo $at_high; ?></h4>
							<p><b>At High</b></p>
						</div>
						<div class="icon">
							<i class="fa fa-angle-double-up"></i>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-green">
						<div class="inner text-center">
							<h4><?php echo $confined; ?></h4>
							<p><b>Confined Space</b></p>
						</div>
						<div class="icon">
							<i class="fa fa-crop"></i>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-aqua">
						<div class="inner text-center">
							<h4><?php echo $digging; ?></h4>
							<p><b>Digging</b></p>
						</div>
						<div class="icon">
							<i class="fa fa-level-down"></i>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-yellow">
						<div class="inner text-center">
							<h4><?php echo $listrik; ?></h4>
							<p><b>Electrical</b></p>
						</div>
						<div class="icon">
							<i class="fa fa-bolt"></i>
						</div>
						
					</div>
				</div>
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-primary">
						<div class="inner text-center">
							<h4><?php echo $general; ?></h4>
							<p><b>General</b></p>
						</div>
						<div class="icon">
							<i class="fa fa-life-ring"></i>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php
			if(!empty($JSAlist)){
				$box = 1;
				$bbox = 1;
				$box1 = 0; $box2 = 0; $box3 = 0; $box4 = 0; $box5 = 0; $box6 = 0; $box7 = 0; $box8 = 0; $box9 = 0; $box10 = 0;
				$bbox1 = 0; $bbox2 = 0; $bbox3 = 0; $bbox4 = 0; $bbox5 = 0; $bbox6 = 0; $bbox7 = 0; $bbox8 = 0; $bbox9 = 0; $bbox10 = 0;
				foreach($JSAlist as $record){
		?>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="col-md-12 col-xs-12">
							<h4><strong><?php echo $record->job_name; ?></strong></h4>
						</div>
					</div>
					<div class="box-body">
						<div class="col-md-9 col-xs-12">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<b>Date: </b><?php echo $record->start_date; ?><br>
									<b>Time: </b><?php echo $record->start_hour.':00 s/d '.$record->end_hour.':00'; ?><br>
									<b>Nama Perusahaan: </b><?php echo $record->company_name; ?>
								</div>
								<div class="col-md-6 col-xs-12">
									<b>Supervisor/Pengawas: </b><?php echo $record->supervisor; ?><br>
									<b>Supervisor HP: </b><?php echo $record->supervisor_hp; ?><br>
									<b>Area: </b><?php echo $record->area ?><br>
									<b>Jumlah Pekerja: </b><span id="wbox<?php echo $box;
										if($box == 1){$box1 = $record->id;}
										if($box == 2){$box2 = $record->id;}
										if($box == 3){$box3 = $record->id;}
										if($box == 4){$box4 = $record->id;}
										if($box == 5){$box5 = $record->id;}
										if($box == 6){$box6 = $record->id;}
										if($box == 7){$box7 = $record->id;}
										if($box == 8){$box8 = $record->id;}
										if($box == 9){$box9 = $record->id;}
										if($box == 10){$box10 = $record->id;}
										$box++;?>">
									Calculating ... </span>
								</div>
								<div class="col-md-12 col-xs-12">
									<b>Description: </b><?php echo $record->description; ?><br>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div id="bbox<?php echo $bbox;
								if($bbox == 1){$bbox1 = $record->id;}
								if($bbox == 2){$bbox2 = $record->id;}
								if($bbox == 3){$bbox3 = $record->id;}
								if($bbox == 4){$bbox4 = $record->id;}
								if($bbox == 5){$bbox5 = $record->id;}
								if($bbox == 6){$bbox6 = $record->id;}
								if($bbox == 7){$bbox7 = $record->id;}
								if($bbox == 8){$bbox8 = $record->id;}
								if($bbox == 9){$bbox9 = $record->id;}
								if($bbox == 10){$bbox10 = $record->id;}
								$bbox++;
								?>">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url(); ?>re_create/<?php echo $record->id;?>" class="btn btn-success btn-sm">Re-Create <i class="fa fa-copy"></i></a>|
						<a href="<?php echo base_url(); ?>report_list/<?php echo $record->id;?>" class="btn btn-danger btn-sm">Report List <i class="fa fa-list"></i></a>|
						<a href="<?php echo base_url(); ?>printx/<?php echo $record->id;?>" class="btn btn-primary btn-sm" target="_blank">Print <i class="fa fa-print"></i></a>|
						<a href="<?php echo base_url(); ?>view/<?php echo $record->id;?>" class="btn btn-info btn-sm">View <i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
		</div>
			<?php } }?>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
    
</div>

<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "closedjsa/" + value);
            jQuery("#searchList").submit();
        });
		
	});
	$(document).ready(function () {
		$("#area").select2({
			placeholder: "Please Select"
		});
	});
	
	jQuery(document).ready(function(){
        
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
	
	$(window).on('load', function() {
	<?php if($box1 != 0){?>
		$('#wbox1').load('<?php echo base_url(); ?>workerbox/<?php echo $box1; ?>')
	<?php } ?>
    <?php if($box2 != 0){?>
		$('#wbox2').load('<?php echo base_url(); ?>workerbox/<?php echo $box2; ?>')
	<?php } ?>
    <?php if($box3 != 0){?>
		$('#wbox3').load('<?php echo base_url(); ?>workerbox/<?php echo $box3; ?>')
	<?php } ?>
    <?php if($box4 != 0){?>
		$('#wbox4').load('<?php echo base_url(); ?>workerbox/<?php echo $box4; ?>')
	<?php } ?>
    <?php if($box5 != 0){?>
		$('#wbox5').load('<?php echo base_url(); ?>workerbox/<?php echo $box5; ?>')
	<?php } ?>
    <?php if($box6 != 0){?>
		$('#wbox6').load('<?php echo base_url(); ?>workerbox/<?php echo $box6; ?>')
	<?php } ?>
    <?php if($box7 != 0){?>
		$('#wbox7').load('<?php echo base_url(); ?>workerbox/<?php echo $box7; ?>')
	<?php } ?>
    <?php if($box8 != 0){?>
		$('#wbox8').load('<?php echo base_url(); ?>workerbox/<?php echo $box8; ?>')
	<?php } ?>
    <?php if($box9 != 0){?>
		$('#wbox9').load('<?php echo base_url(); ?>workerbox/<?php echo $box9; ?>')
	<?php } ?>
    <?php if($box10 != 0){?>
		$('#wbox10').load('<?php echo base_url(); ?>workerbox/<?php echo $box10; ?>')
	<?php } ?>
	
	<?php if($bbox1 != 0){?>
		$('#bbox1').load('<?php echo base_url(); ?>box/<?php echo $bbox1; ?>');
	<?php } ?>
    <?php if($bbox2 != 0){?>
		$('#bbox2').load('<?php echo base_url(); ?>box/<?php echo $bbox2; ?>');
	<?php } ?>
    <?php if($bbox3 != 0){?>
		$('#bbox3').load('<?php echo base_url(); ?>box/<?php echo $bbox3; ?>');
	<?php } ?>
    <?php if($bbox4 != 0){?>
		$('#bbox4').load('<?php echo base_url(); ?>box/<?php echo $bbox4; ?>');
	<?php } ?>
    <?php if($bbox5 != 0){?>
		$('#bbox5').load('<?php echo base_url(); ?>box/<?php echo $bbox5; ?>');
	<?php } ?>
    <?php if($bbox6 != 0){?>
		$('#bbox6').load('<?php echo base_url(); ?>box/<?php echo $bbox6; ?>');
	<?php } ?>
    <?php if($bbox7 != 0){?>
		$('#bbox7').load('<?php echo base_url(); ?>box/<?php echo $bbox7; ?>');
	<?php } ?>
    <?php if($bbox8 != 0){?>
		$('#bbox8').load('<?php echo base_url(); ?>box/<?php echo $bbox8; ?>');
	<?php } ?>
    <?php if($bbox9 != 0){?>
		$('#bbox9').load('<?php echo base_url(); ?>box/<?php echo $bbox9; ?>');
	<?php } ?>
    <?php if($bbox10 != 0){?>
		$('#bbox10').load('<?php echo base_url(); ?>box/<?php echo $bbox10; ?>');
	<?php } ?>
	});
</script>