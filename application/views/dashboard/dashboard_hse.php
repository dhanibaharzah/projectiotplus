<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
	<section class="content">
		<?php if($vendorId >90000){ ?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-danger">
					<div class="box-header no-padding">
						<div class="pull-right">
							<button class="btn btn-xs btn-warning" data-widget="collapse"><i class="fa fa-minus"></i> Filter Box</button>
						</div>
					</div>
					<div class="box-body">
					<form action="<?php echo base_url() ?>dashboard" method="POST" id="searchList">
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
									<div class="input-group form-block">
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
									<label><input type="checkbox" class="minimal" name="type1" <?php if($type1 == 'on'){ echo 'checked';}?>> Hot Work </label>
									<label><input type="checkbox" class="minimal" name="type2" <?php if($type2 == 'on'){ echo 'checked';}?>> At High  </label>
									<label><input type="checkbox" class="minimal" name="type3" <?php if($type3 == 'on'){ echo 'checked';}?>> Confined Space  </label>
									<label><input type="checkbox" class="minimal" name="type4" <?php if($type4 == 'on'){ echo 'checked';}?>> Digging  </label>
									<label><input type="checkbox" class="minimal" name="type5" <?php if($type5 == 'on'){ echo 'checked';}?>> Electrical  </label>
									<label><input type="checkbox" class="minimal" name="type6" <?php if($type6 == 'on'){ echo 'checked';}?>> General  </label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 form-group">
									<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
								</div>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="col-lg-2 col-xs-6">
					<div class="small-box bg-red">
						<div class="inner text-center">
							<h4><?php echo $hot_work; ?></h4>
							<p><b>Hot Work <?php $today_unix =  date('U');$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$end_day = $today_unix + 86400 - 25200;// echo $today_unix.' '.$end_day;?></b></p>
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
		<?php if(!empty($job_result)){ ?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-danger">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">Tanggal</th>
								<th class="text-center">Nama Pekerjaan</th>
								<th class="text-center">Area</th>
								<th class="text-center">Ijin Kerja</th>
								<th class="text-center">User/Pengawas</th>
								<th class="text-center">Action</th>
							</tr>
							<?php
								if(!empty($job_result)){
									$x=date('U');
									$x=$x-($x%86400)-25200;
									foreach($job_result as $record){
							?>
							<tr>
								<td class="text-center">
									<b>Mulai: </b><?php echo $record->start_date; ?><br>
									<b>Disetujui: </b><?php echo $record->timestamp; ?>
								</td>
								<td class="text-center"><?php echo $record->job_name; ?></td>
								<td class="text-center"><?php echo $record->area; ?></td>
								<td class="text-center">
									<?php if($record->panas == 7){echo '<span class="label bg-red">Hot Work</span><br>'; } ?>
									<?php if($record->tinggi == 7){echo '<span class="label bg-purple">At High</span><br>'; } ?>
									<?php if($record->terbatas == 7){echo '<span class="label bg-green">Confined Space</span><br>'; } ?>
									<?php if($record->penggalian == 7){echo '<span class="label bg-aqua">Digging</span><br>'; } ?>
									<?php if($record->listrik == 7){echo '<span class="label bg-yellow">Electrical</span><br>'; } ?>
									<?php if($record->general == 7){echo '<span class="label label-primary">General</span>'; } ?>
								</td>
								<td class="text-center">
									<?php echo $record->user; ?><br>
									<b>Jumlah Pekerja: </b><span id="wbox<?php echo $record->id; ?>"></span>
									<script type="text/javascript">
										$('#wbox<?php echo $record->id; ?>').load('<?php echo base_url(); ?>workerbox/<?php echo $record->id; ?>')
									</script>
								</td>
								<td class="text-center">
									<a class="btn btn-sm btn-info" href="<?php echo base_url(); ?>view/<?php echo $record->id;?>">View</a>
									<?php if($x >= $record->start_unix AND $x <= $record->end_unix){?>
										<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>monitor/<?php echo $record->id;?>">Monitor</a>
									<?php } ?>
								</td>
							</tr>
							<?php
									}
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-danger">
					<div class="box-body table-responsive no-padding">
						Hasil tidak ditemukan
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php } ?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="box box-danger">
					<div class="box-header no-padding">
						<div class="pull-right">
							<button class="btn btn-xs btn-primary" data-widget="collapse"><i class="fa fa-minus"></i> Calendar</button>
						</div>
					</div>
					<div class="box-body">
						<div class="col-lg-3 col-md-3 col-xs-12">
							<div class="small-box bg-gray">
								<div class="inner">
									<h4><b>Create</b></h4>
									<p>New Permit</p>
								</div>
								<div class="icon">
									<i class="fa fa-plus"></i>
								</div>
								<a href="<?php echo base_url(); ?>create_jsa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
							<div class="small-box bg-gray">
								<div class="inner">
									<h4><b>My Pemit</b></h4>
									<p>Ongoing</p>
								</div>
								<div class="icon">
									<i class="fa fa-copy"></i>
								</div>
								<a href="<?php echo base_url(); ?>myjsa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
							<div class="small-box bg-gray">
								<div class="inner">
									<h4><b>Waiting Pemit</b></h4>
									<p>Approval</p>
								</div>
								<div class="icon">
									<i class="fa fa-check"></i>
								</div>
								<a href="<?php echo base_url(); ?>appjsa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
							<div class="small-box bg-gray">
								<div class="inner">
									<h4><b>Pemit History</b></h4>
									<p>Documentation</p>
								</div>
								<div class="icon">
									<i class="fa fa-database"></i>
								</div>
								<a href="<?php echo base_url(); ?>closedjsa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						
						<div class="col-lg-9 col-md-9 col-xs-12">
							<div id="calendar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="col-lg-2 col-xs-4">
					<div class="small-box bg-red">
						<div class="inner text-center">
							<p><b>IoT System</b></p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="http://iot.slci.co.id" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-2 col-xs-4">
					<div class="small-box bg-purple">
						<div class="inner text-center">
							<p><b>Toolkeeping</b></p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="http://codesys.slci.co.id/rentaltool" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-2 col-xs-4">
					<div class="small-box bg-green">
						<div class="inner text-center">
							<p><b>Machine Data</b></p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="http://codesys.slci.co.id/mechdata" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-2 col-xs-4">
					<div class="small-box bg-aqua">
						<div class="inner text-center">
							<p><b>Report System</b></p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="http://app.slci.co.id" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-2 col-xs-4">
					<div class="small-box bg-yellow">
						<div class="inner text-center">
							<p><b>HSE</b></p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="http://hse.slci.co.id" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		-->
	</section>
<div class="modal fade modal-primary" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> Redirect confirmation </h4>
			</div>
			<div class="modal-body">
			<form role="form" action="<?php echo base_url() ?>selected_date" method="post" role="form">
				<div class="form-group text-center">
					<!--<input type="text" name="start_date" id="start_date" disabled>-->
					<input type="hidden" name="start_date" id="start_date" value="">
					<button class="btn btn-success btn-lg" href="#">Check Detail Schedule</button>
				</div>
			</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>
</div>
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar2/fullcalendar.min.css" />
<script src="<?php echo base_url() ?>assets/plugins/fullcalendar2/lib/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/fullcalendar2/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/fullcalendar2/gcal.js"></script>
<script type="text/javascript">
var date_last_clicked = null;
$('#calendar').fullCalendar({
     eventSources: [
         {
             events: function(start, end, timezone, callback) {
                 $.ajax({
                 url: '<?php echo base_url() ?>get_events',
                 dataType: 'json',
                 data: {
                 // our hypothetical feed requires UNIX timestamps
                 start: start.unix(),
                 end: end.unix()
                 },
                 success: function(msg) {
                     var events = msg.events;
                     callback(events);
                 }
                 });
             }
         },
		
     ],
	// dayClick: function(date, jsEvent, view) {
    //    date_last_clicked = $(this);
	//	$('#start_date').val(date.format('X'));
    //    $(this).css('background-color', '#bed7f3');
    //    $('#addModal').modal();
	// },
	 displayEventTime: false 
 });
 $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
</script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
	$(document).ready(function () {
		$("#area").select2({
			placeholder: "Please Select"
		});
	});
	
</script>
