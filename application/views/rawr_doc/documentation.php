<div class="content-wrapper">
	<section class="content-header">
		<h1>Application Reference<small> AutomatedRAWR </small></h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12 col-xs-12 text-center">
				This documentation is under construction and will be updated every Saturday
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-xs-12">
				<div id="doc_content"></div>
				<table class="table">
					<tr><td bgcolor="black"></td></tr>
				</table>
			</div>
			<div class="col-md-4 col-xs-12">
				<h4>Contents <small>List without [x] is available</small></h4>
				<ul>
					<li class="treeview"><a id="btn_intro" class="text-blue">Introduction</a></li>
					<li class="treeview"><a class="text-blue">LINE Features</a>
						<ul>
							<li class="treeview"><a id="linereg" class="text-blue">LINE Registration</a></li>
							<li class="treeview"><a id="linetopic" class="text-blue">LINE Follow Topic</a></li>
						</ul>
					</li>
					<li class="treeview"><a id="btn_applist" class="text-blue">Application List</a>
						<ul>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]IoT</a>
								<ul class="treeview-menu">
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Dashboard</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Machine Monitor</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Cycletime Calculator</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Electricity Calculator</a></li>
								</ul>
							</li>
							<li class="treeview"><a class="text-blue">HSE App</a>
								<ul>
									<li class="treeview"><a id="jsatopic" class="text-blue">Create JSA</a></li>
								</ul>
							</li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]Maintenance System</a>
								<ul class="treeview-menu">
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Dashboard</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Action Plan</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Project Job</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Approval Route</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Preventive Maintenance</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Workshop</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Abnormallity Report</a></li>
								</ul>
							</li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]Rental/Library System</a>
								<ul class="treeview-menu">
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Dashboard</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Rent/Borrow</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Approval Route</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Preventive Maintenance</a></li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]Abnormal</a></li>
								</ul>
							</li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]Store/Stock System</a></li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]Production System</a></li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]Online Shop</a></li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]Self Service</a></li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]GPS Tracker</a></li>
							<li class="treeview"><a id="xxxx" class="text-blue">[x]File Hosting</a></li>
							<li class="treeview">Additional Application
								<ul class="treeview-menu">
									<li class="treeview"><a id="xxxx" class="text-blue">[x]HSE</a>
										<ul class="treeview-menu">
											<li class="treeview"><a id="xxxx" class="text-blue">[x]Dashboard</a></li>
											<li class="treeview"><a id="xxxx" class="text-blue">[x]Create Work Permit</a></li>
											<li class="treeview"><a id="xxxx" class="text-blue">[x]Approval Route</a></li>
										</ul>
									</li>
									<li class="treeview"><a id="xxxx" class="text-blue">[x]CBM Indonesia</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="treeview"><a id="btn_resources" class="text-blue">Resources</a></li>
					<li class="treeview"><a id="xxxx" class="text-blue">[x]Installation</a></li>
					<li class="treeview"><a id="btn_others" class="text-blue">Others</a></li>
				</ul>
			</div>
		</div>
	</section>
</div>
<script>
	$("#doc_content").load('<?php echo base_url(); ?>doc_js_intro');
	$(function(){$("#btn_intro").on("click",function(e) {
		$("#doc_content").load('<?php echo base_url(); ?>doc_js_intro');
		$("html, body").animate({scrollTop: 0}, 500);
		});
	});
	
	$(function(){$("#btn_applist").on("click",function(e) {
		$("#doc_content").load('<?php echo base_url(); ?>doc_js_applist');
		$("html, body").animate({scrollTop: 0}, 500);
		});
	});
	
	$(function(){$("#btn_resources").on("click",function(e) {
		$("#doc_content").load('<?php echo base_url(); ?>doc_js_resources');
		$("html, body").animate({scrollTop: 0}, 500);
		});
	});
	$(function(){$("#btn_others").on("click",function(e) {
		$("#doc_content").load('<?php echo base_url(); ?>doc_js_others');
		$("html, body").animate({scrollTop: 0}, 500);
		});
	});
	
	$(function(){$("#linereg").on("click",function(e) {
		$("#doc_content").load('<?php echo base_url(); ?>linetutorial');
		$("html, body").animate({scrollTop: 0}, 500);
		});
	});
	$(function(){$("#linetopic").on("click",function(e) {
		$("#doc_content").load('<?php echo base_url(); ?>linetopic');
		$("html, body").animate({scrollTop: 0}, 500);
		});
	});
	$(function(){$("#jsatopic").on("click",function(e) {
		$("#doc_content").load('<?php echo base_url(); ?>jsatopz');
		$("html, body").animate({scrollTop: 0}, 500);
		});
	});
</script>
