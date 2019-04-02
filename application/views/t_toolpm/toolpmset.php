<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-database"></i> Tools PM Setting
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
									<form action="<?php echo base_url() ?>toolpmset" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th>No</th>
								<th>id</th>
								<th>Name</th>
								<th>Brand-Size/Type</th>
								<th>Position</th>
								<th class="text-center">Enable</th>
								<th>PM Freq</th>
								<th>Notif every</th>
								<th class="text-center">Action</th>
							</tr>
						<?php
						if(!empty($toolpmset)){
							$a=1+$page;
							foreach($toolpmset as $record){
						?>
							<tr>
								<td> <?php echo $a ?></td>
								<td> <?php if($record->pmsts==0){echo '<span class="label label-danger">'.$record->id.' OFF</span>';}else{echo '<span class="label label-success">'.$record->id.' ON</span>';} ?></td>
								<td> <?php echo $record->name ?></td>
								<td> <?php echo $record->brand ?> - <?php echo $record->size ?></td>
								<td> <?php echo $record->pos ?></td>
								<td class="text-center">
									<a class="btn <?php if($record->pmsts == 0){ echo "btn-success btn-xs"; }if($record->pmsts == 1){ echo "btn-danger btn-xs"; }?>" 
										href="<?php 
										if($record->pmsts == 0){
											if($page=='' AND $searchText==''){
												echo base_url().'turn_on/'.$record->id;
											}
											if(!($page=='') AND $searchText==''){
												echo base_url().'turn_on/'.$record->id.'/'.$page;
											}
											if($page=='' AND !($searchText=='')){
												echo base_url().'turn_on/'.$record->id.'/0/'.$searchText;
											}
											if(!($page=='') AND !($searchText=='')){
												echo base_url().'turn_on/'.$record->id.'/'.$page.'/'.$searchText;
											}
										}
										if($record->pmsts == 1){
											if($page=='' AND $searchText==''){
												echo base_url().'turn_off/'.$record->id;
											}
											if(!($page=='') AND $searchText==''){
												echo base_url().'turn_off/'.$record->id.'/'.$page;
											}
											if($page=='' AND !($searchText=='')){
												echo base_url().'turn_off/'.$record->id.'/0/'.$searchText;
											}
											if(!($page=='') AND !($searchText=='')){
												echo base_url().'turn_off/'.$record->id.'/'.$page.'/'.$searchText;
											}
										}
										?>"
										<?php if($record->pmsts == 0){ echo 'title="Turn On PM"'; }else{echo 'title="Turn Off PM"';}?>>
										<i class="fa fa-power-off"></i></a>
										<?php
											if($record->pmsts == 1){
												if($record->doctitle == ''){echo '<br>No linked PM';}else{echo '<br>'.$record->doctitle;}
												if($page=='' AND $searchText==''){$linktopm = base_url().'linktopm/'.$record->id;}
												if(!($page=='') AND $searchText==''){$linktopm = base_url().'linktopm/'.$record->id.'/'.$page;}
												if($page=='' AND !($searchText=='')){$linktopm = base_url().'linktopm/'.$record->id.'/0/'.$searchText;}
												if(!($page=='') AND !($searchText=='')){$linktopm = base_url().'linktopm/'.$record->id.'/'.$page.'/'.$searchText;}
												echo '<br><a class="btn btn-primary btn-xs" href="'.$linktopm.'">Add/Edit PM Sheet</a>';
											}
										?>
								</td>
								<td>
								<?php if($record->pmsts == 1){ ?>
									<form role="form" action="<?php echo base_url() ?>setpmfreq" method="post" id="editTool" role="form">
									<div class="form-group form-inline">
										<select id="pmfreq" name="pmfreq" class="form-control input-xs">
											<option value="7"  <?php if($record->pmfreq==7 ){echo 'selected';} ?>>Every Week</option>
											<option value="28" <?php if($record->pmfreq==28){echo 'selected';} ?>>Every Month</option>
											<option value="84" <?php if($record->pmfreq==84){echo 'selected';} ?>>Every 3 Month</option>
											<option value="168" <?php if($record->pmfreq==168){echo 'selected';} ?>>Every 6 Month</option>
											<option value="336" <?php if($record->pmfreq==336){echo 'selected';} ?>>Every Year</option>
										</select>
										<input type="hidden" name="searchxx" id="searchxx" value="<?php echo $searchText ?>"/>
										<input type="hidden" name="segment" id="segment" value="<?php echo $page ?>"/>
										<input type="hidden" name="id" id="id" value="<?php echo $record->id ?>"/>
										<button class="btn btn-xs btn-success" title="Set PM Frequency"><i class="fa fa-check"></i></button>
									</div>
									</form>
								<?php } ?>
								</td>
								<td>
									<?php if($record->pmsts == 1){ ?>
									<form action="<?php echo base_url() ?>setpmtool/<?php echo $record->id; ?>" method="POST">
										<div class="input-group input-group-sm">
											<input for="exe" autocomplete="off" type="text" name="pmstart" value="<?php echo date('d-m-Y', $record->pmstart); ?>" class="form-control datepicker input-sm" placeholder="Exe Date"/>
											<span class="input-group-btn">
												<input type="submit" class="btn btn-success btn-flat" value="SET" />
											</span>
										</div>
										<?php
											if($page=='' AND $searchText==''){$redirect = 'toolpmset'; }
											if(!($page=='') AND $searchText==''){$redirect = 'toolpmset/'.$page;}
											if($page=='' AND !($searchText=='')){$redirect = 'toolpmset/0/'.$searchText;}
											if(!($page=='') AND !($searchText=='')){$redirect = 'toolpmset/'.$page.'/'.$searchText;}
										?>
										<input type="hidden" name="id" value="<?php echo $record->id; ?>"/>
										<input type="hidden" name="redirect" value="<?php echo $redirect;?>">
									</form>
									<?php } ?>
								</td>
								<td class="text-center">
									<a class="btn btn-sm btn-success" href="<?php echo base_url().'detailtoolpm/'.$record->id; ?>" title="Detail of Tool">Detail <i class="fa fa-history"></i></a>
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
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "toolpmset/" + value);
            jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
</script>
