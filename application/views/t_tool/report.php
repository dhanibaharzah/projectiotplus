<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cog"></i> Report Form
        <small> Tool Replacement</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <form role="form" action="<?php echo base_url() ?>submit_report" method="post" role="form">
                        <div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<h4>Tool Information:</h4>
									<strong>Name: </strong><span><?php echo $toolinfo->name?></span><br>
									<strong>Brand: </strong><span><?php echo $toolinfo->brand?></span><br>
									<strong>Size/type: </strong><span><?php echo $toolinfo->size?></span><br>
								</div>
								<div class="col-md-6">
									<h4>Order Information:</h4>
									<strong>Invoice ID: </strong><span><?php echo $toolinfo->invoice?></span><br>
									<strong>User: </strong><span><?php echo $toolinfo->user?></span><br>
									<strong>Running ID: </strong><span><?php echo $num?></span><br>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12" align="text-center">
									<h4><strong>Last Status: </strong><span><?php echo $sts?></span></h4><br>
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
								<textarea type="text" name="reason" rows="4" class="form-control required"></textarea>
							</div>
                        </div>
						<div class="box-footer">
							<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $toolinfo->id; ?>">
							<input type="hidden" class="form-control" id="num" name="num" value="<?php echo $num; ?>">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
		
    </section>
    
</div>