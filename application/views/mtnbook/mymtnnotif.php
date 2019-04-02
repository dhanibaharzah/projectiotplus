<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-refresh"></i> Notification Log
		</h1>
	</section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>ctlog" method="POST" id="searchList">
									<div class="col-md-7 form-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
									</div>
									<div class="col-md-2 form-group">
										<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control input-sm datepicker" placeholder="From Date"/>
									</div>
									<div class="col-md-2 form-group">
										<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control input-sm datepicker" placeholder="To Date"/>
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
								<th class="text-center" style="border: 1px solid black;">Timestamp</th>
								<th class="text-center" style="border: 1px solid black;">Notif</th>
								<th class="text-center" style="border: 1px solid black;">Note</th>
								<th class="text-center" style="border: 1px solid black;">Doc Type</th>
								<th class="text-center" style="border: 1px solid black;">Link</th>
							</tr>
						<?php
							if(!empty($mymtnnotif)){
								$a = 1 + $page;
								foreach($mymtnnotif as $record){
						?>
							<tr>
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->timestamp; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->act; ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo nl2br($record->note); ?></td>
								<td class="text-center" style="border: 1px solid black;"><?php echo $record->doc_type; ?></td>
								<td class="text-center" style="border: 1px solid black;">
									<?php if($record->doc_type == 'PRG'){?>
										<?php if($_SERVER['REMOTE_ADDR'] == '192.168.1.1'){?>
											<a class="btn btn-sm btn-success" href="<?php echo base_url().'filedownload/prg/'.$record->doc_id; ?>" target="_blank">Download PRG</a>
										<?php }else{?>
											<button class="btn btn-sm btn-success" disabled><i class="fa fa-lock"></i> LOCAL ONLY</button>
										<?php }?>
									<?php }?>
									<?php if($record->doc_type == 'DWG'){?>
										<?php if($_SERVER['REMOTE_ADDR'] == '192.168.1.1'){?>
											<a class="btn btn-sm btn-success" href="<?php echo base_url().'filedownload/dwg/'.$record->doc_id; ?>" target="_blank">Download DWG</a>
										<?php }else{?>
											<button class="btn btn-sm btn-success" disabled><i class="fa fa-lock"></i> LOCAL ONLY</button>
										<?php }?>
									<?php }?>
									<?php if($record->doc_type == 'OPR'){?>
										<a class="btn btn-sm btn-success" href="<?php echo base_url().'oprprint/'.$record->doc_id; ?>" title="Print" target="_blank"><i class="fa fa-print"></i></a>
									<?php }?>
									<?php if($record->doc_type == 'SEQ'){?>
										<a class="btn btn-sm btn-success" href="<?php echo base_url().'seqprint/'.$record->doc_id; ?>" title="Print" target="_blank"><i class="fa fa-print"></i></a>
									<?php }?>
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
			jQuery("#searchList").attr("action", baseURL + "mymtnnotif/" + value);
			jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
	});
</script>
