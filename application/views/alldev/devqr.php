<div class="content-wrapper">
	<section class="content">
		<div class="box-header">
			<div class="row">
				<div class="box-header">
					<div class="row">
							<div class="col-lg-5 col-xs-8">
								<form action="<?php echo base_url() ?>devqr2" method="POST" id="searchList">
								<select id="selclass" name="selclass" class="form-control" placeholder="Select Device Class">
									<?php if(!empty($class)){ 
										foreach($class as $rec){
									?>
									<option value="<?php echo $rec->dev_code; ?>" <?php if($selclass == $rec->dev_code){echo 'selected';}?>><?php echo $rec->dev_class; ?></option>
									<?php } }?>
								</select>
							</div>
							<div class="col-lg-5 col-xs-8">
									<div class="input-group">
											<button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
										</div>
									</div>
								</form>
						</div>
					</div>				
					<div class="box-header">
						<div class="row">
							<div class="box">
								<div class="box-body table-responsive no-padding">
									<?php echo $tabel;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script>
	 jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "devqr2");
            jQuery("#searchList").submit();
        });
	});
	$(document).ready(function () {
		$("#selclass").select2({
			placeholder: "Select Device Class"
		});
	});
</script>
