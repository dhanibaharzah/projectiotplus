<?php

$zid = '';
$zcode = '';
$zgx_brand = '';
$zgx_sn = '';
$zgx_model = '';
$zgx_ratio = '';
$zgx_outrpm = '';
$zgx_outshaft = '';
$zdm_brand = '';
$zdm_kw = '';
$zdm_rpm = '';
$zbr_brand = '';
$zbr_type = '';
$zbr_torque = '';
$zpm_lub = '';
$zpm_oil = '';
$zpm_seal = '';
$zpm_over = '';

if(!empty($gxDetail))
{
    foreach ($gxDetail as $uf)
    {
        $zid = $uf->id;
        $zcode = $uf->code;
        $zgx_brand = $uf->gx_brand;
        $zgx_sn = $uf->gx_sn;
        $zgx_model = $uf->gx_model;
		$zgx_ratio = $uf->gx_ratio;
		$zgx_outrpm = $uf->gx_outrpm;
		$zgx_outshaft = $uf->gx_outshaft;
		$zdm_brand = $uf->dm_brand;
		$zdm_kw = $uf->dm_kw;
		$zdm_rpm = $uf->dm_rpm;
		$zbr_brand = $uf->br_brand;
		$zbr_type = $uf->br_type;
		$zbr_torque = $uf->br_torque;
		$zpm_lub = $uf->pm_lub;
		$zpm_oil = $uf->pm_oil;
		$zpm_seal = $uf->pm_seal;
		$zpm_over = $uf->pm_over;
    }
}


?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> Summary Data of [<?php echo $zcode; ?>] 
        <small>track all history</small>
      </h1>
	  <div class="row">
		<div class="col-lg-3 col-xs-6">
			<h5><strong>Brand : </strong><?php echo $zgx_brand; ?></h5>
			<h5><strong>S/N : </strong><?php echo $zgx_sn; ?></h5>
			<h5><strong>Model : </strong><?php echo $zgx_model; ?></h5>
		</div>
		<div class="col-lg-3 col-xs-6">
			<h5><strong>Gear Ratio : </strong><?php echo $zgx_ratio; ?></h5>
			<h5><strong>Output RPM : </strong><?php echo $zgx_outrpm; ?> rpm</h5>
			<h5><strong>Output Shaft Diameter : </strong><?php echo $zgx_outshaft; ?> mm</h5>
		</div>
		<div class="col-lg-3 col-xs-6">
			<h5><strong>Drive Motor Brand : </strong><?php echo $zdm_brand; ?></h5>
			<h5><strong>Drive Motor Power: </strong><?php echo $zdm_kw; ?> kW</h5>
			<h5><strong>Drive Motor RPM : </strong><?php echo $zdm_rpm; ?> rpm</h5>
		</div>
		<div class="col-lg-3 col-xs-6">
			<h5><strong>Oil Type : </strong><?php echo $zpm_lub; ?></h5>
			<h5><strong>Oil Replacement: </strong><?php echo $zpm_oil; ?> </h5>
			<h5><strong>Seal Replacement : </strong><?php echo $zpm_seal; ?></h5>
			<h5><strong>Overhaul : </strong><?php echo $zpm_over; ?></h5>
		</div>
	  </div>
    </section>
    <section class="content">
        <div class="row">
          <form action="<?php echo base_url() ?>gearmotor-history" method="POST" id="searchList">
            <div class="col-md-2 col-md-offset-4 form-group">
              <input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date"/>
            </div>
            <div class="col-md-2 form-group">
              <input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date"/>
            </div>
            <div class="col-md-3 form-group">
              <input id="searchText" type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control" placeholder="Search Text"/>
            </div>
            <div class="col-md-1 form-group">
				<input id="zid" type="hidden" name="zid" value="<?php echo $zid; ?>" />
              <button type="submit" class="btn btn-md btn-default btn-block searchList pull-right"><i class="fa fa-search"></i></button> 
			</div>
          </form>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Code</th>
                      <th>Update On</th>
                      <th>PM</th>
                      <th>Activity</th>
                      <th>PIC</th>
                      <th>Posisi</th>
                      <th>Usage</th>
                    </tr>
                    <?php
                    if(!empty($gxRecords))
                    {
                        foreach($gxRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><font size="3"><span class="label label-info"><?php echo $record->codex ?></span></font></td>
                      <td><?php echo $record->updateon ?></td>
                      <td><?php echo $record->pm ?></td>
                      <td><?php echo $record->activity ?></td>
					  <td><?php echo $record->pic ?></td>
                      <td><?php echo $record->posisi ?></td>
                      <td><?php echo $record->usagex ?></td>
					 
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary "href="<?php echo base_url(); ?>mech_gearmotor" > Back to Gearmotor Data </a>
			</div>
		</div>
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;
            jQuery("#searchList").attr("action", link);
            jQuery("#searchList").submit();
        });

        jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
    });
</script>
