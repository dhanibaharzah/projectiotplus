<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> Requested Permit Approval 
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
					<form action="<?php echo base_url() ?>appjsa" method="POST" id="searchList">
						<div class="box-tools">
							<div class="row">
								<div class="col-md-3 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											From
										</div>
										<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker input-sm" placeholder="From Date"/>
									</div>
								</div>
								<div class="col-md-3 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											To
										</div>
										<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker input-sm" placeholder="To Date"/>
									</div>
								</div>
								<div class="col-md-3 form-group">
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
								<div class="col-md-3 form-group">
									<div class="input-group">
										<div class="input-group-addon">
											Status
										</div>
										<select id="status" name="status" class="form-control">
											<option value=""></option>
											<option value="1" <?php if($status == 1){echo 'selected';}?>>Show Approval Request</option>
											<option value="2" <?php if($status == 2){echo 'selected';}?>>Show Approved Permit</option>
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
		<?php
			if(!empty($JSAlist)){
				$box = 1;
				$box1 = 0; $box2 = 0; $box3 = 0; $box4 = 0; $box5 = 0; $box6 = 0; $box7 = 0; $box8 = 0; $box9 = 0; $box10 = 0;
				foreach($JSAlist as $record){
		?>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-<?php if($record->company_name != 'PT SLCI'){ echo 'warning'; }else{echo 'primary';} ?>">
					<div class="box-body">
					<div class="row">
						<div class="col-md-9 col-xs-9">
							<h4><strong><?php 
							$a1=0;$a2=0;$a3=0;$a4=0;
							if($record->check == $user OR $record->check_id == $role){echo '<span class="label label-primary">Checker</span>';$a1 = 1;}
							if($record->pic == $user or $record->pic_id == $picar){echo '<span class="label label-warning">PIC Area</span>';$a2 = 1;}
							if($record->sd == $user OR $record->sd_id == $role){echo '<span class="label label-danger">Safety Officer</span>';$a3 = 1;}
							if($record->manager == $user OR $record->manager_id == $role){echo '<span class="label label-success">Manager</span>';$a4 = 1;}
							?><?php echo $record->job_name; ?></strong></h4>
						</div>
						<div class="col-md-3 col-xs-3 pull-right ">
						<?php if($role == 10){?>
							<button title="Delete this JSA" type="button" class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target="#del<?php echo $record->id; ?>"><i class="fa fa-trash"></i></button>
							<div class="modal modal-danger fade" id="del<?php echo $record->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
											<h4>Delete JSA ID.<?php echo $record->id;?></h4>
										</div>
										<form role="form" id="delete_jsa" action="<?php echo base_url() ?>delete_jsa" method="post" role="form">
										<div class="modal-body">
											Are you sure ?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
											<input type="hidden" name="id" value="<?php echo $record->id;?>">
											<input type="hidden" name="acc" value="appjsa">
											<input type="submit" class="btn btn-outline" value="DELETE">
										</div>
										</form>
									</div>
								</div>
							</div>
						<?php } ?>
							<a href="<?php echo base_url(); ?>view/<?php echo $record->id;?>" class="btn btn-info pull-right btn-sm">View <i class="fa fa-search"></i></a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 col-xs-12">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<b>Date: </b><?php echo $record->start_date; ?><br>
									<b>Time: </b><?php echo $record->start_hour.':00 s/d '.$record->end_hour.':00'; ?><br>
									<b>Nama Perusahaan: </b><?php echo $record->company_name; ?>
								</div>
								<div class="col-md-6 col-xs-12">
									<b>Pemohon: </b><?php echo $record->user; ?><br>
									<b>Supervisor/HP: </b><?php echo $record->supervisor; ?> / <?php echo $record->supervisor_hp; ?><br>
									<b>Area: </b><?php echo $record->area ?><br>
									<b>Jumlah Pekerja: </b><span id="wbox<?php echo $box;?>">Calculating ... </span>
								</div>
								<div class="col-md-12 col-xs-12">
									<b>Description: </b><?php echo $record->description; ?><br>
								</div>
								<div class="col-md-12 col-xs-12">
									<a href="<?php echo base_url(); ?>monitor/<?php echo $record->id;?>" class="btn btn-primary btn-sm" target="_blank">Monitor/Close <i class="fa fa-check"></i></a>
								<?php if($record->terbatas == 7 AND ($record->user == $name OR $record->check == $name OR $record->pic == $name OR $record->sd == $name)){ ?>
									<a href="<?php echo base_url(); ?>gas_s/<?php echo $record->id;?>" class="btn btn-warning btn-sm" target="_blank">Cek Gas <i class="fa fa-check"></i></a>
								<?php } ?>
								<?php if(($record->terbatas == 7 OR $record->tinggi == 7) AND ($record->user == $name OR $record->check == $name OR $record->pic == $name OR $record->sd == $name)){ ?>
									<a href="<?php echo base_url(); ?>blood/<?php echo $record->id;?>" class="btn btn-danger btn-sm" target="_blank">Cek Tensi <i class="fa fa-check"></i></a>
								<?php } ?>
									<a href="<?php echo base_url(); ?>report_list/<?php echo $record->id;?>" class="btn btn-success btn-sm">Report List <i class="fa fa-list"></i></a>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div id="box<?php echo $box;
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
								?>">
							</div>
						</div>
					</div>
					</div>
					<div class="box-footer table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<div id="note<?php echo $box; $box++;?>"></div>
						</div>
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
            jQuery("#searchList").attr("action", baseURL + "appjsa/" + value);
            jQuery("#searchList").submit();
        });
		
	});
	$(document).ready(function () {
		$("#area").select2({
			placeholder: "Please Select"
		});
	});
	$(document).ready(function () {
		$("#status").select2({
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
	<?php if($box1 != 0){?>
		$('#box1').load('<?php echo base_url(); ?>box/<?php echo $box1; ?>');
		setInterval(function(){$('#box1').load('<?php echo base_url(); ?>box/<?php echo $box1; ?>');}, 2000)
	<?php } ?>
    <?php if($box2 != 0){?>
		$('#box2').load('<?php echo base_url(); ?>box/<?php echo $box2; ?>');
		setInterval(function(){$('#box2').load('<?php echo base_url(); ?>box/<?php echo $box2; ?>');}, 2000)
	<?php } ?>
    <?php if($box3 != 0){?>
		$('#box3').load('<?php echo base_url(); ?>box/<?php echo $box3; ?>');
		setInterval(function(){$('#box3').load('<?php echo base_url(); ?>box/<?php echo $box3; ?>');}, 2000)
	<?php } ?>
    <?php if($box4 != 0){?>
		$('#box4').load('<?php echo base_url(); ?>box/<?php echo $box4; ?>');
		setInterval(function(){$('#box4').load('<?php echo base_url(); ?>box/<?php echo $box4; ?>');}, 2000)
	<?php } ?>
    <?php if($box5 != 0){?>
		$('#box5').load('<?php echo base_url(); ?>box/<?php echo $box5; ?>');
		setInterval(function(){$('#box5').load('<?php echo base_url(); ?>box/<?php echo $box5; ?>');}, 2000)
	<?php } ?>
    <?php if($box6 != 0){?>
		$('#box6').load('<?php echo base_url(); ?>box/<?php echo $box6; ?>');
		setInterval(function(){$('#box6').load('<?php echo base_url(); ?>box/<?php echo $box6; ?>');}, 2000)
	<?php } ?>
    <?php if($box7 != 0){?>
		$('#box7').load('<?php echo base_url(); ?>box/<?php echo $box7; ?>');
		setInterval(function(){$('#box7').load('<?php echo base_url(); ?>box/<?php echo $box7; ?>');}, 2000)
	<?php } ?>
    <?php if($box8 != 0){?>
		$('#box8').load('<?php echo base_url(); ?>box/<?php echo $box8; ?>');
		setInterval(function(){$('#box8').load('<?php echo base_url(); ?>box/<?php echo $box8; ?>');}, 2000)
	<?php } ?>
    <?php if($box9 != 0){?>
		$('#box9').load('<?php echo base_url(); ?>box/<?php echo $box9; ?>');
		setInterval(function(){$('#box9').load('<?php echo base_url(); ?>box/<?php echo $box9; ?>');}, 2000)
	<?php } ?>
    <?php if($box10 != 0){?>
		$('#box10').load('<?php echo base_url(); ?>box/<?php echo $box10; ?>');
		setInterval(function(){$('#box10').load('<?php echo base_url(); ?>box/<?php echo $box10; ?>');}, 2000)
	<?php } ?>
	
	$(window).on('load', function() {
	<?php if($box1 != 0){?>
		$('#wbox1').load('<?php echo base_url(); ?>workerbox/<?php echo $box1; ?>')
		$('#note1').load('<?php echo base_url(); ?>notebox/<?php echo $box1; ?>')
	<?php } ?>
    <?php if($box2 != 0){?>
		$('#wbox2').load('<?php echo base_url(); ?>workerbox/<?php echo $box2; ?>')
		$('#note2').load('<?php echo base_url(); ?>notebox/<?php echo $box2; ?>')
	<?php } ?>
    <?php if($box3 != 0){?>
		$('#wbox3').load('<?php echo base_url(); ?>workerbox/<?php echo $box3; ?>')
		$('#note3').load('<?php echo base_url(); ?>notebox/<?php echo $box3; ?>')
	<?php } ?>
    <?php if($box4 != 0){?>
		$('#wbox4').load('<?php echo base_url(); ?>workerbox/<?php echo $box4; ?>')
		$('#note4').load('<?php echo base_url(); ?>notebox/<?php echo $box4; ?>')
	<?php } ?>
    <?php if($box5 != 0){?>
		$('#wbox5').load('<?php echo base_url(); ?>workerbox/<?php echo $box5; ?>')
		$('#note5').load('<?php echo base_url(); ?>notebox/<?php echo $box5; ?>')
	<?php } ?>
    <?php if($box6 != 0){?>
		$('#wbox6').load('<?php echo base_url(); ?>workerbox/<?php echo $box6; ?>')
		$('#note6').load('<?php echo base_url(); ?>notebox/<?php echo $box6; ?>')
	<?php } ?>
    <?php if($box7 != 0){?>
		$('#wbox7').load('<?php echo base_url(); ?>workerbox/<?php echo $box7; ?>')
		$('#note7').load('<?php echo base_url(); ?>notebox/<?php echo $box7; ?>')
	<?php } ?>
    <?php if($box8 != 0){?>
		$('#wbox8').load('<?php echo base_url(); ?>workerbox/<?php echo $box8; ?>')
		$('#note8').load('<?php echo base_url(); ?>notebox/<?php echo $box8; ?>')
	<?php } ?>
    <?php if($box9 != 0){?>
		$('#wbox9').load('<?php echo base_url(); ?>workerbox/<?php echo $box9; ?>')
		$('#note9').load('<?php echo base_url(); ?>notebox/<?php echo $box9; ?>')
	<?php } ?>
    <?php if($box10 != 0){?>
		$('#wbox10').load('<?php echo base_url(); ?>workerbox/<?php echo $box10; ?>')
		$('#note10').load('<?php echo base_url(); ?>notebox/<?php echo $box10; ?>')
	<?php } ?>
	});
</script>
