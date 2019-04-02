<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-copy"></i> Result
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h4><?php echo $code; ?>/<?php if($tag == 1){echo 'Electrical';}elseif($tag == 2){echo 'Mechanical';} ?>/<?php if($frec == 1){echo 'Weekly';}elseif($frec == 2){echo 'Monthly';} ?></h4>
						<div class="form-group form-group-sm  col-md-1">
							<a href="<?php echo base_url()?>pmresult" class="btn btn-sm btn-danger btn-block">Reset</a>
						</div>
						<form action="<?php echo base_url() ?>showresult" method="POST" id="searchList">
							<input type="hidden" name="code" value="<?php echo $code; ?>">
							<input type="hidden" name="tag" value="<?php echo $tag; ?>">
							<input type="hidden" name="frec" value="<?php echo $frec; ?>">
						</form>
					</div>
					<div class="box-body table-responsive no-padding">
						<div id="appbox"></div>
						<table class="table table-hover table-striped table-bordered" >
							<tr>
								<th>Timestamp</th>
								<th>User</th>
								<th>Action</th>
							</tr>
					<?php
						if(!empty($alltime)){
							foreach($alltime as $record){
					?>
							<tr id="<?php echo $record->id; ?>">
								<td><?php echo date('D d-m-Y', $record->rec_unix);?></td>
								<td><?php echo $record->user;?></td>
								<td><input type="button" value="View" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/></td>
							</tr>
					<?php
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$('#appbox').load('<?php echo base_url();?>pmresultbox/<?php echo $first; ?>');
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "showresult/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#appbox').load('<?php echo base_url();?>pmresultbox/' + trid);
	});
</script>
