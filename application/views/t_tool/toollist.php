<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><i class="fa fa-shopping-cart"></i> Rental Tool</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="box-tools">
								<form action="<?php echo base_url() ?>rentaltool" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" onkeyup="lettersOnly(this)" name="searchText" value="<?php echo $searchText ; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-12 col-xs-12">
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Brand/Size</th>
									<th class="text-center">Action</th>
									<th class="text-center">Last User</th>
								</tr>
								<?php
									if(!empty($toolList))
									{
										$searchTextxx = str_replace(' ','_',$searchText);
										$a=1+$page;
										foreach($toolList as $record)
										{
								?>
								<tr>
									<td class="text-center"><?php echo $a ?></td>
									<td><?php echo $record->name ?></td>
									<td><?php echo $record->brand ?><br><?php echo $record->size ?></td>
									<td class="text-center">
										<a class="btn 
										<?php 
											if($record->sts == "available"){ echo "btn-success"; }
											if($record->sts == "booked"){ echo "btn-info btn-xs"; }
											if($record->sts == "inorder"){ echo "btn-warning btn-xs"; }
											if($record->sts == "lost" OR $record->sts == "broken"){ echo "btn-danger btn-xs"; }
										?>" 
										href="
										<?php 
											if($record->sts == "available")
											{
												if($page=='' AND $searchText==''){echo base_url().'tocart/'.$record->id;}
												if(!($page=='') AND $searchText==''){echo base_url().'tocart/'.$record->id.'/'.$page;}
												if($page=='' AND !($searchText=='')){echo base_url().'tocart/'.$record->id.'/0/'.$searchTextxx;}
												if(!($page=='') AND !($searchText=='')){echo base_url().'tocart/'.$record->id.'/'.$page.'/'.$searchTextxx;}
											}
											else
											{echo "#";}
										?>"
										<?php
											if($record->sts == "available"){ echo 'title="Add to Cart"'; }
										?>>
										<?php
											if($record->sts == "available"){ echo '<i class="fa fa-shopping-cart"></i>'; }
										?>
										<?php
											if($record->sts == "available"){ echo " ";}else{echo $record->sts;}
										?></a>
									</td>
									<td class="text-center"><small><?php echo $record->user ?></small></td>
								</tr>
								<?php
									$a++;
									}
								}
								?>
							</table>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer clearfix">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div><!-- /.box -->
			</div>
			<div class="col-lg-4 col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<h4><i class="fa fa-shopping-cart"></i> Your Cart <small>reset every 10mins!</small></h4>
							</div>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body no-padding">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<?php
									if(!empty($cartList)){
								?>
									<table class="table table-hover table-striped taable-bordered ">
										<tr>
											<th>Name</th>
											<th>Brand/Size</th>
											<th class="text-center">Action</th>
										</tr>
								<?php
									foreach($cartList as $cart){
								?>
										<tr>
											<td><?php echo $cart->name ?></td>
											<td><?php echo $cart->brand ?><br><?php echo $cart->size ?></td>
											<td class="text-center">
												<a href="
													<?php
														if($page=='' AND $searchText==''){echo base_url().'delcart/'.$cart->id;}
														if(!($page=='') AND $searchText==''){echo base_url().'delcart/'.$cart->id.'/'.$page;}
														if($page=='' AND !($searchText=='')){echo base_url().'delcart/'.$cart->id.'/0/'.$searchTextxx;}
														if(!($page=='') AND !($searchText=='')){echo base_url().'delcart/'.$cart->id.'/'.$page.'/'.$searchTextxx;}
													?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
								<?php
									}
								?>
									</table>
								<?php
									}
									else{
										echo '<h3>Cart is Empty</h3>';
									}
								?>
							</div>
						</div>
					<?php
						if(!empty($cartList)){
					?>
						<form role="form" action="<?php echo base_url() ?>checkout" method="post" id="editUser" role="form">
					<?php
						if($role == ROLE_MANAGER){
					?>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<div class="form-group">
									<label>User</label>
									<select id="user" name="user" class="form-control">
										<option value=""></option>
										<?php if(!empty($userlist)){ 
											foreach($userlist as $users)
											{
										?>
										<option value="<?php echo $users->uName; ?>"><?php echo $users->uName; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>
						</div>
					<?php } ?>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<button class="btn btn-success pull-right"><i class="fa fa-check-square"></i> Checkout!</a>
							</div>
						</div>
						</form>
					<?php
						}
					?>
						
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		</div>
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/autocomplete/jquery-3.3.1.js"></script>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>
            $(document).ready(function () {
                $("#user").select2({
                    placeholder: "Please Select"
                });
 
            });
        </script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "rentaltool/" + value);
            jQuery("#searchList").submit();
        });	
	});
	
	function lettersOnly(input) {
		var regex = /[^a-z0-9~!@#$%^&*_`+;:?.,\s]/gi;
		input.value = input.value.replace(regex, "");
	}
</script>
