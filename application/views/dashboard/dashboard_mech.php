<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-dashboard"></i> Dashboard
			<small>Control Panel</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-gear"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">RAM/CPU</span>
						<span class="info-box-number">
						<?php
							$free = shell_exec('free');
							$free = (string)trim($free);
							$free_arr = explode("\n", $free);
							$mem = explode(" ", $free_arr[1]);
							$mem = array_filter($mem);
							$mem = array_merge($mem);
							$memory_usage = $mem[2]/$mem[1]*100;
							echo number_format($memory_usage, 2, '.', ''); ?><small>%</small>/<?php $load = sys_getloadavg();
							echo $load[0];?><small>%</small></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">My Project Job</span>
						<span class="info-box-number"><a href="<?php echo base_url().'myproject'; ?>"><span class="notif6">-</span> <small>item(s)</small></a></span>
						<p>LINE Get: <b>myprj</b> & <b>myprj2</b></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-retweet"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">PM Job</span>
						<span class="info-box-number"><a href="<?php echo base_url().'mypm'; ?>"><span class="notif7">-</span> <small>item(s)</small></a></span>
						<p>LINE Get: <b>mypm</b> & <b>mypm2</b></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><?php echo number_format((($abc*100)/$ab), 0, '.', '').'<small> %</small>'; ?></span>
					<div class="info-box-content">
						<span class="info-box-text">Abnormality Report</span>
						<span class="info-box-number"><a href="<?php echo base_url().'abnormallity'; ?>"><?php echo $abc; ?>/<?php echo $ab; ?> <small>item(s)</small></a></span>
					</div>
				</div>
			</div>
		</div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------->	  
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="col-md-8">
							<b class="text-center">Maintenance/Project Schedule, <?php echo date('D d-m-Y');?>, </b>LINE Get: <b>mtnjob</b> & <b>mtnjob2</b>
							<div class="box-body no-padding"  style="height: 250px; overflow-y: scroll;">
								<span id="project_box"></span>
							</div>
						</div>
						<div class="col-md-4">
							<i class="fa fa-spinner fa-spin"></i><b> Approval and Server Logs</b>
							<div class="box-body direct-chat direct-chat-primary" id="out" >
								<div class="direct-chat-messages" id="server_box" style="display: flex; flex-direction: column-reverse;height: 250px; overflow-y: scroll;">
								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-black"><i class="fa fa-bolt"></i></span>
									<h5 class="description-header">Electrical</h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-black"><i class="fa fa-wrench"></i></span>
									<h5 class="description-header">Mechanical</h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-green"><i class="fa fa-comment"></i> Green</span>
									<h5 class="description-header">60 mins</h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<span class="description-percentage text-aqua"><i class="fa fa-comment"></i> Blue</span>
									<h5 class="description-header">120 mins</h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-yellow"><i class="fa fa-comment"></i> Yellow</span>
									<h5 class="description-header">180 mins</h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<span class="description-percentage text-red"><i class="fa fa-comment"></i> Red</span>
									<h5 class="description-header">240 mins</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-body">
						<div class="row">
						<div class="col-md-4">
							<i class="fa fa-refresh fa-spin"></i> <b>Live Report</b>
							<div class="box-body direct-chat direct-chat-primary" id="out" >
								<div class="direct-chat-messages" id="chat_box" style="display: flex; flex-direction: column-reverse;height: 300px; overflow-y: scroll;">
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<b class="text-center">PM Schedule, <?php echo date('D d-m-Y');?></b> LINE Get: <b>pmjob</b> & <b>pmjob2</b>
							<div class="box-body no-padding"  style="height: 300px; overflow-y: scroll;">
								<span id="pmtable"></span>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-green"><i class="fa fa-comment"></i> Green</span>
									<h5 class="description-header">Electrical<br><small>Weekly</small></h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<span class="description-percentage text-aqua"><i class="fa fa-comment"></i> Blue</span>
									<h5 class="description-header">Mechanical<br><small>Weekly</small></h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block border-right">
									<span class="description-percentage text-yellow"><i class="fa fa-comment"></i> Yellow</span>
									<h5 class="description-header">Electrical<br><small>Monthly</small></h5>
								</div>
							</div>
							<div class="col-sm-2 col-xs-6">
								<div class="description-block">
									<span class="description-percentage text-red"><i class="fa fa-comment"></i> Red</span>
									<h5 class="description-header">Mechanical<br><small>Monthly</small></h5>
								</div>
							</div>
							<span id="progress"></span>
						</div>
					</div>
				</div>
			</div>
<!-------------------------------------------------------------------------------------------------------------------------------------->	
			
<!---------------------------------------------------------------------------------------------------------------------------------->	
		
		</div>
	</section>
		
</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    //setInterval(function(){
		$('#chat_box').load('<?php echo base_url(); ?>chat_box');
		$('#server_box').load('<?php echo base_url(); ?>server_box');
	//}, 1000)
	$(document).ready(function(){
		$('#pmtable').load('<?php echo base_url();?>pmnowtable');
		$('#project_box').load('<?php echo base_url();?>project_box');
		$('#progress').load('<?php echo base_url();?>pmprogcountx');
	});
	setInterval(function(){
		$('#pmtable').load('<?php echo base_url();?>pmnowtable');
		$('#progress').load('<?php echo base_url();?>pmprogcountx');
	}, 60000)
</script>

