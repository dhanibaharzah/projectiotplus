<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> All PM Job, LINE Get: <b>pmjob</b> & <b>pmjob2</b><small>Show all PM</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-7 col-xs-12">
				<div class="box box-primary">
					<div class="box-body no-padding">
						<div id="calendar"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-xs-12">
				<div class="box box-primary">
					<div class="box-body no-padding"  style="height: 600px; overflow-y: scroll;">
						<span id="tabel"></span>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
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
                 url: '<?php echo base_url() ?>getpmall',
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
	 dayClick: function(date, jsEvent, view) {
        date_last_clicked = $(this);
		$('#start_date').val(date.format('YYYY-MM-DD'));
        //$(this).css('background-color', '#bed7f3');
		$('#tabel').load('<?php echo base_url();?>getpmtabelall/'+ date.format('X'));
		//$('#header_button').load('<?php echo base_url();?>getheaderall/'+ date.format('X'));
	 },
	 displayEventTime: false
 });
</script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>