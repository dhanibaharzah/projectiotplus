<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-gears"></i> Device Data</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-5 col-xs-8">
								<form action="<?php echo base_url() ?>alldev" method="POST" id="searchList">
								<select id="selclass" name="selclass" class="form-control">
									<option value=""></option>
									<?php if(!empty($class)){ 
										foreach($class as $rec){
									?>
									<option value="<?php echo $rec->dev_code; ?>" <?php if($selclass == $rec->dev_code){echo 'selected';}?>><?php echo $rec->dev_class; ?> [<?php echo $rec->dev_code; ?>]</option>
									<?php } }?>
								</select>
							</div>
							<div class="col-lg-5 col-xs-8">
								<div class="box-tools">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
										</div>
									</div>
								</form>
								</div>
							</div>
							<div class="col-lg-2 col-xs-4 text-right">
								<div class="form-group">
									<a class="btn btn-success btn-block btn-sm" href="<?php echo base_url(); ?>adddevice"><i class="fa fa-plus"></i> Add New</a>
								</div>
							</div>
							<div class="col-lg-12">
								Found <?php echo $total; ?> data(s)
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped taable-bordered">
							<tr>
								<th style="border: 1px solid black;">Code</th>
								<th style="border: 1px solid black;">Status</th>
								<th style="border: 1px solid black;" colspan="2" class="text-center">Parameter</th>
							</tr>
						<?php
							if(!empty($deviceList)){
								$a = 1;
								foreach($deviceList as $record){
									$code = str_replace(" ","-",$record->code);
						?>
							<tr>
								<td style="border: 1px solid black;" align="center" width="10%">
									<div id="tag<?php echo $a?>"></div>
									<script type="text/javascript">
										$('#tag<?php echo $a?>').load('<?php echo base_url(); ?>tagging/<?php echo $code; ?>')
									</script>
									<font size="4"><span class="label label-primary"><?php echo $record->code ?></span></font><br>
									<a class="btn btn-primary btn-sm btn-block" href="<?php echo base_url().'hisdevice/'.$record->id; ?>" title="Check device history"><i class="fa fa-history"></i> History</a>
									<a class="btn btn-info btn-sm btn-block" href="<?php echo base_url().'editdevice/'.$record->id; ?>" title="Edit device Data"><i class="fa fa-pencil"></i> Edit</a>
								</td>
								<td style="border: 1px solid black;" width="29%">
									<strong>PIC:</strong> <?php echo $record->pic ?><br>
									<strong>Pos/Use:</strong> <?php echo $record->pos.'/'.$record->usage ?>
									<div id="td4<?php echo $a; ?>"></div>
								</td>
								<td style="border: 1px solid black;" width="28%">
									<div id="td1<?php echo $a; ?>"></div>
									<script type="text/javascript">
										$('#td1<?php echo $a?>').load('<?php echo base_url(); ?>parameter1/<?php echo $record->id; ?>')
									</script>
								</td>
								<td style="border: 1px solid black;" width="28%">
									<div id="td3<?php echo $a; ?>"></div>
									<script type="text/javascript">
										$('#td3<?php echo $a?>').load('<?php echo base_url(); ?>parameter3/<?php echo $record->id; ?>')
										$('#td4<?php echo $a?>').load('<?php echo base_url(); ?>parameter4/<?php echo $record->id; ?>')
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "alldev/" + value);
            jQuery("#searchList").submit();
        });
	});
	$(document).ready(function () {
		$("#selclass").select2({
			placeholder: "Select Device Class"
		});
	});
</script>
