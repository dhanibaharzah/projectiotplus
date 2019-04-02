<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cog"></i> Edit Report
        <small> Tool Replacement</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <form role="form" action="<?php echo base_url() ?>update_report" method="post" role="form">
                        <div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<h4>Tool Information:</h4>
									<strong>Name: </strong><span><?php echo $report->name?></span><br>
									<strong>Brand: </strong><span><?php echo $report->brand?></span><br>
									<strong>Size/type: </strong><span><?php echo $report->size?></span><br>
								</div>
								<div class="col-md-6">
									<h4>Order Information:</h4>
									<strong>Invoice ID: </strong><span><?php echo $report->invoice?></span><br>
									<strong>User: </strong><span><?php echo $report->user?></span><br>
									<strong>Running ID: </strong><span><?php echo $report->num?></span><br>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12" align="text-center">
									<h4><strong>Last Status: </strong><span><?php echo $report->sts?></span></h4><br>
								</div>
							</div>
							<div class="form-group">
								<label>New Status</label><br>
								<select name="status" class="form-control required" >
									<option value="lost">Lost</option>
									<option value="broken">Broken</option>
								</select>
							</div>
							<div class="form-group">
								<label>Reason</label><br>
								<textarea type="text" name="reason" rows="4" class="form-control required"><?php echo $report->reason ?></textarea>
							</div>
                        </div>
						<div class="box-footer">
							<input type="hidden" class="form-control" id="repoid" name="repoid" value="<?php echo $report->repoid; ?>">
                            <input type="submit" class="btn btn-primary" value="Update" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
		
    </section>
    
</div>