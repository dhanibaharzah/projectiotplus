<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body no-padding">
						<div class="col-lg-7 col-xs-12">
							<div id="calendar"></div>
						</div>
						<div class="col-lg-5 col-xs-12 direct-chat direct-chat-primary">
							<h3 class="fa fa-wechat">Approval Status</h3>
							<div class="direct-chat-messages" id="app_prog" style="display: flex; flex-direction: column-reverse;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<span id="header_button"></span>
					</div>
					<div class="box-body no-padding">
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
$('#edit_button').hide();
var date_last_clicked = null;
$('#calendar').fullCalendar({
     eventSources: [
         {
             events: function(start, end, timezone, callback) {
                 $.ajax({
                 url: '<?php echo base_url() ?>getprojectplan',
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
		$('#tabel').load('<?php echo base_url();?>gettabel/'+ date.format('X'));
		$('#header_button').load('<?php echo base_url();?>getheader/'+ date.format('X'));
	 },
	 displayEventTime: false
 });
</script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#job").select2({
			placeholder: "Select Job"
		});
	});
	
	jQuery(document).ready(function(){
        
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
	setInterval(function(){$('#app_prog').load('<?php echo base_url(); ?>apptable');}, 2000)
</script>