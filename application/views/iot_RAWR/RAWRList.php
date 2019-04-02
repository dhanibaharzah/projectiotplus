<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Alarm List
      </h1>
    </section>
    <section class="content">
		<div class="row">
			<?php if($vendorId >= 90000 and $vendorId < 100000){?>
			<div class="text-center col-lg-2 col-md-2 col-xs-4">
				<img src="<?php echo base_url();?>assets/images/slciapproval.png" alt="slciapproval" width="100%" >
				<h4><b>SLCI Approval</b></h4>
			</div>
			<div class="text-center col-lg-2 col-md-2 col-xs-4">
				<img src="<?php echo base_url();?>assets/images/slciot.png" alt="slciot" width="100%">
				<h4><b>SLCI IoT</b></h4>
			</div>
			<?php } ?>
			<div class="text-center col-lg-2 col-md-2 col-xs-4">
			<?php if(($vendorId >= 30000 and $vendorId < 40000) or $adminapp == 1){?>
				<img src="<?php echo base_url();?>assets/images/slcicbm.png" alt="slcicbm" width="100%" >
				<h4><b>CBM Sales Report</b></h4>
			<?php } ?>
			</div>
			<br>
			<div class=" col-lg-6 col-md-6 col-xs-12">
				<?php if($vendorId >= 90000 and $vendorId < 100000){?>
				Register to <b>SLCI Approval</b> to access Permit and Schedule approval via LINE<br>
				And <b>SLCI IoT</b> to get Followed Notification, check table list below <br>
				<br>
				<?php } ?>
				Scan QR Code of LINE Channel that you want to join with your <b>LINE Application</b>.<br>
				Open your <b>LINE Application</b>, press <b>More</b> button on top right corner of your phone.<br>
				Choose <b>Add Friend</b> Menu, then choose <b>QR Code</b>. <br>
				Once it redirect you to </b>Add Friend</b> Window, press </b>Add</b> button.<br>
				It will tell you how to register your <b>LINE ID</b> to <b>AutomatedRAWR Server</b> on greeting message.
			</div>
		</div>
		
        <div class="row">
			<?php if(($vendorId >= 90000 and $vendorId < 100000) or ($vendorId >= 30000 and $vendorId < 40000)){?>
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-heading">
						<div class="row">
							<div class="col-lg-12 col-xs-12 text-center">
								<h4>SLCI IoT Notification List</h4>
							</div>
						</div>						
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="col-lg-6 col-xs-12">
							<h3>Available Notification</h3>
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th>No</th>
									<th>Valid</th>
									<th>Title</th>
									<th>Action</th>
								</tr>
							<?php
								if(!empty($alarm_table))
								{
									$a=1;
									foreach($alarm_table as $record)
									{
							?>
							<tr>
								<td><?php echo $a ?></td>
								<td>
								<?php 
									if($record->isvalid == 0){echo '<span class="label label-danger">OFF</span>';}
									if($record->isvalid == 1){echo '<span class="label label-success">Active</span>';}
								?>
								</td>
								<td><?php echo $record->title ?></td>
								<td>
									<?php //if($record->isvalid == 1){ ?>
									<!-- <a href="<?php // echo base_url().'followtopic/'.$record->id; ?>" class="btn btn-success btn-xs"><i class="fa fa-link"></i> Follow (Email)</a>
									--><?php //} ?>
									<?php if($record->isvalid == 1 && $lineid != ''){ ?>
									<a href="<?php echo base_url().'followtopicline/'.$record->id; ?>" class="btn btn-success btn-sm"><i class="fa fa-mobile"></i> Follow</a>
									<?php }elseif($lineid == ''){ ?>
										Please Register your LINE
									<?php }?>
								</td>
							</tr>
							<?php
								$a++;	}
								}
							?>
							</table>
							
							
						</div>
						
						<div class="col-lg-6 col-xs-12">
							<h3>Followed Notification</h3>
							<table class="table table-hover table-striped taable-bordered ">
								<tr>
									<th>No</th>
									<th>Title</th>
									<th>to</th>
									<th>Action</th>
								</tr>
							<?php
								if(!empty($followed))
								{
									$a=1;
									foreach($followed as $record)
									{
							?>
							<tr>
								<td><?php echo $a ?></td>
								<td><?php echo $record->title ?></td>
								<td><?php echo $record->email.''.$record->line ?></td>
								<td><a href="<?php echo base_url().'unfollowtopic/'.$record->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-link"></i> Unfollow</a></td>
							</tr>
							<?php
								$a++;	}
								}
							?>
							</table>
							
							
						</div>
						
					</div>
				</div>
			</div>
			<?php } ?>
        </div>
		
    </section>
</div>
