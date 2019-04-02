<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Daily Summary
        <small></small>
      </h1>
    </section>
    
    <section class="content">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-danger">
					<div class="box-header">
						<form action="<?php echo base_url() ?>hse_daily_summary" method="POST" id="searchList">
							<div class="col-md-3 form-group">
								<input autocomplete="off" type="text" name="start" value="" class="form-control" id="datepicker1" placeholder="From Date" required/>
							</div>
							<div class="col-md-3 form-group">
								<input autocomplete="off" type="text" name="end" value="" class="form-control" id="datepicker2" placeholder="To Date" required/>
							</div>
							<div class="col-md-2 form-group">
								<button class="btn btn-sm btn-danger searchList"><i class="fa fa-search"></i> Search</button>
							</div>
						</form>
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<th rowspan="2" class="text-center">Date</th>
									<th rowspan="2" class="text-center">JSA</th>
									<th colspan="6" class="text-center">Permit</th>
								</tr>
								<tr>
									<th>Hot Work</th>
									<th>At High</th>
									<th>Confined Space</th>
									<th>Digging</th>
									<th>Electrical</th>
									<th>General</th>
								</tr>
						<?php
							if(!empty($JSAlist)){
								foreach($JSAlist as $record){
						?>
								<tr>
									<td class="text-center"><?php echo $record->start_date; ?></td>
									<td class="text-center"><?php echo $record->tot; ?></td>
									<td class="text-center"><span id="hot<?php echo $record->start_date; ?>"></span></td>
									<td class="text-center"><span id="high<?php echo $record->start_date; ?>"></span></td>
									<td class="text-center"><span id="conf<?php echo $record->start_date; ?>"></span></td>
									<td class="text-center"><span id="dig<?php echo $record->start_date; ?>"></span></td>
									<td class="text-center"><span id="elec<?php echo $record->start_date; ?>"></span></td>
									<td class="text-center"><span id="gen<?php echo $record->start_date; ?>"></span></td>
								</tr>
								<script>
									$('#hot<?php echo $record->start_date; ?>').load('<?php echo base_url(); ?>hse_hot/<?php echo $record->start_date; ?>');
									$('#high<?php echo $record->start_date; ?>').load('<?php echo base_url(); ?>hse_high/<?php echo $record->start_date; ?>');
									$('#conf<?php echo $record->start_date; ?>').load('<?php echo base_url(); ?>hse_conf/<?php echo $record->start_date; ?>');
									$('#dig<?php echo $record->start_date; ?>').load('<?php echo base_url(); ?>hse_dig/<?php echo $record->start_date; ?>');
									$('#elec<?php echo $record->start_date; ?>').load('<?php echo base_url(); ?>hse_elec/<?php echo $record->start_date; ?>');
									$('#gen<?php echo $record->start_date; ?>').load('<?php echo base_url(); ?>hse_gen/<?php echo $record->start_date; ?>');
								</script>
						<?php } }?>
							</table>
						</div>
					</div>
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
    
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "hse_daily_summary/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
	jQuery(document).ready(function(){
		jQuery('#datepicker1').datepicker({
          autoclose: true,
          format : "yyyy-mm-dd"
        });
		jQuery('#datepicker2').datepicker({
          autoclose: true,
          format : "yyyy-mm-dd"
        });
	});
	$('#datepicker1').on('changeDate', function (selected) {
		$('#datepicker2').datepicker('setStartDate', selected.date);
		$('#datepicker2').datepicker('setDate', selected.date);
		$(this).datepicker('hide');
	});
</script>
