<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Project Result
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-8">
								<div class="box-tools">
									<form action="<?php echo base_url() ?>prjresultbypic" method="POST" id="searchList">
									<select id="user" name="user" class="form-control" required>
										<option value=""></option>
										<?php if(!empty($userlist)){ 
											foreach($userlist as $userdata)
											{
										?>
										<option value="<?php echo $userdata->uName; ?>" <?php if($userdata->uName == $user){echo 'selected';}?>><?php echo $userdata->uName; ?></option>
										<?php } }?>
									</select>
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search, or leave this empty"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-success searchList"><i class="fa fa-search"></i> Search</button>
										</div>
									</div>
									</form>
								</div>
							</div>
							<div class="col-lg-12 col-xs-8">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Execution</th>
								<th class="text-center">Job Details</th>
								<th class="text-center">Info</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
							if(!empty($prjresultbypic)){
								$a = 1 + $page;
								foreach($prjresultbypic as $record){
									$dur = ($record->end - $record->start)/60;
						?>
							<tr>
								<td  width="5%"><?php echo $a; ?></td>
								<td  width="15%" class="text-center">
									<?php echo gmdate('d-m-Y H:i', $record->start); ?> <br>to<br> <?php echo gmdate('d-m-Y H:i', $record->end); ?>
								</td>
								<td width="40%">
									<?php if($record->closed == 1){ echo '<span class="label label-success">CLOSED</span>';}else{echo '<span class="label label-danger">Inprogress</span>';} ?>
									<b><?php echo $record->job_title.' </b>/ '.$dur.'mins'; ?><br>
									<?php echo nl2br($record->job_desc); ?><br>
								</td>
								<td  width="25%" class="text-center">
									<div id="part<?php echo $a;?>"></div>
									<div id="tool<?php echo $a;?>"></div>
									<b>PIC(s):</b>
									<div id="pic<?php echo $a;?>"></div>
								</td>
								<td class="text-center"  width="10%">
									<a href="<?php echo base_url(); ?>reportinfo/<?php echo $record->id; ?>" class="btn btn-success" target="_blank"><span id="rep<?php echo $a; ?>"></span> Report(s)</a>
									<script type="text/javascript">
										$(window).on('load', function(){
											$('#part<?php echo $a;?>').load('<?php echo base_url();?>partlist/<?php echo $record->project_id; ?>');
											$('#tool<?php echo $a;?>').load('<?php echo base_url();?>toollist/<?php echo $record->project_id; ?>');
											$('#rep<?php echo $a;?>').load('<?php echo base_url();?>replist/<?php echo $record->id; ?>');
											$('#pic<?php echo $a;?>').load('<?php echo base_url();?>piclist/<?php echo $record->id; ?>');
										});
									</script>
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
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('ul.pagination li a').click(function (e) {
			e.preventDefault();
			var link = jQuery(this).get(0).href;
			var value = link.substring(link.lastIndexOf('/') + 1);
			jQuery("#searchList").attr("action", baseURL + "prjresultbypic/" + value);
			jQuery("#searchList").submit();
        });
	});
	$(document).ready(function () {
		$("#user").select2({
			placeholder: "Select User"
		});
	});
</script>
