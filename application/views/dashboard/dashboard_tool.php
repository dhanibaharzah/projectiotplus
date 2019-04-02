<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><i class="fa fa-shopping-cart"></i> Rent</h3>
						<p>Click Link below</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="<?php echo base_url(); ?>rentaltool" class="small-box-footer">Rental Tool <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		<?php if($role == ROLE_MANAGER){ ?>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><i class="fa fa-tasks"></i> <span id="todaypm"></span></h3>
						<p> Today's Tool PM</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="<?php echo base_url(); ?>todayschedule" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		<?php }else{ ?>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><i class="fa fa-tasks"></i> <span class="myorder"></span></h3>
						<p> My Ordered Tool</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="<?php echo base_url(); ?>mytool" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		<?php } ?>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><i class="fa fa-arrow-circle-right"></i> <span class="jqongoinvoice"></span></h3>
						<p>Ongoing Invoice</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?php echo base_url(); ?>ongoinvoice" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
						<h3><i class="fa fa-exclamation-circle"></i> <span class="jqbrokinvoice"></span></h3>
						<p>Broken Tools</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="<?php echo base_url(); ?>errortool" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="box box-danger  direct-chat direct-chat-primary ">
					<div class="box-header with-border">
						<h3 class="fa fa-wechat"> Order Logs </h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body" id="out" >
						<div class="direct-chat-messages" id="order_box" style="display: flex; flex-direction: column-reverse;"></div>
					</div>
				</div>
			</div>
			<div class="col-md-5">		
				<div class="box box-danger  direct-chat direct-chat-primary ">
					<div class="box-header with-border">
						<h3 class="fa fa-wechat"> Tool Logs </h3>	
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body" id="out" >
						<div class="direct-chat-messages" id="tool_box" style="display: flex; flex-direction: column-reverse;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div id="toolproblematic"></div>
			</div>
		</div>
    </section>
</div>
<script type="text/javascript">
	$('#toolproblematic').load('<?php echo base_url(); ?>toolproblematic');
    setInterval(function(){
		$('#order_box').load('<?php echo base_url(); ?>order_box');
		$('#tool_box').load('<?php echo base_url(); ?>tool_box');
		$('#todaypm').load('<?php echo base_url(); ?>todaytoolpm');
	}, 1000)
	 setInterval(function(){
		$('#toolproblematic').load('<?php echo base_url(); ?>toolproblematic');
	}, 10000)
</script>