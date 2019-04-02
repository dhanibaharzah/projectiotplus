<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-refresh"></i> Downtime Log, <small>Marked cycletime log</small> 
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
									<div class="col-md-2 form-group">
										<a class="btn btn-sm btn-success btn-block" href="<?php echo base_url(); ?>createdt"><i class="fa fa-file"></i> Create</a>
									</div>
									<form action="<?php echo base_url() ?>dtlog" method="POST" id="searchList">
									<div class="col-md-9 form-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
									</div>
									<div class="col-md-1 form-group">
										<button class="btn btn-sm btn-primary btn-block searchList"><i class="fa fa-search"></i></button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center" style="border: 1px solid black;">No</th>
								<th class="text-center" style="border: 1px solid black;">Details</th>
								<th class="text-center" style="border: 1px solid black;">Symptom</th>
							</tr>
						<?php
							if(!empty($dtlog)){
								$a = 1 + $page;
								foreach($dtlog as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;" rowspan="2"><?php echo $a; ?></td>
								<td style="border: 1px solid black;">
									<b>Area: </b><?php echo $record->area; ?><br>
									<b>Machine: </b><?php echo $record->eq_name; ?><br>
									<b>Position: </b><?php echo $record->posisi; ?><br>
									<b>Device: </b><?php echo $record->device; ?>
								</td>
								<td style="border: 1px solid black;">
									<b>Foreman's Report: </b><?php echo nl2br($record->forereport); ?><br>
									<b>PIC's Report: </b><?php echo nl2br($record->sym); ?><br>
									<?php if((($record->picuser == $name) or ($record->addedby == $name)) and $record->saved == 0){ ?>
										<a href="<?php echo base_url().'detaildt/'.$record->id;?>" class="btn btn-sm btn-primary pull-right"><i class="fa fa-history"></i> Details</a>
									<?php }else{ ?>
										<a href="<?php echo base_url().'viewdt/'.$record->id;?>" class="btn btn-sm btn-info pull-right"><i class="fa fa-search"></i> View</a>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td style="border: 1px solid black;" colspan="2">
									<div class="col-md-4">
										<b>Occur on: </b><?php echo $record->timestamp; ?><br>
										<b>Update: </b><?php echo $record->addedon; ?><br>
										<b>Duration: </b><?php echo number_format(($record->dur/60), 2, '.', ''); ?> mins
									</div>
									<div class="col-md-4">
										<b>PIC: </b><?php echo $record->picuser; ?><br>
										<b>Arranged by: </b><?php echo $record->addedby; ?><br>
										<b>Foreman: </b><?php echo $record->foreman; ?>
									</div>
									<div class="col-md-4">
										<b>App1: </b><?php echo $record->appuser1; ?><?php if(!empty($record->appdate1)){echo '/'.date('Y-m-d H:i:s', $record->appdate1);}else{ echo '';}?><br>
										<b>App2: </b><?php echo $record->appuser2; ?><?php if(!empty($record->appdate2)){echo '/'.date('Y-m-d H:i:s', $record->appdate2);}else{ echo '';}?>
									</div>
								</td>
							</tr>
						<?php
									$a++;
								}
							}
						?>
						</table>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e){
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "ctlog/" + value);
			jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
	});
</script>
