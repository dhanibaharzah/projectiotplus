<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bolt"></i> Process Invoice
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
			<form role="form" method="POST" action="<?php echo base_url() ?>procesinvoice_exe">
              <div class="box">
                <div class="box-header">
				<div class="row">
				<div class="col-lg-12 col-xs-12">
				<h3>Invoice ID.<?php echo $id; ?> by.<?php echo $invoiceuser; ?></h3>
				</div>
				</div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover table-striped table-bordered">
                    <tr>
                      
                      <th>No</th>
					  <th class="text-center">Cancel/Error</th>
					  <th>Tool ID</th>
                      <th>Name</th>
					  <th>Brand</th>
					  <th>Size</th>
					  <th>Status</th>
					  <th>Position</th>
					  
					  <th class="text-center">Action</th>
					  
                    </tr>
                    <?php
                    if(!empty($procesinvoice))
                    {
						$a=1;
                        foreach($procesinvoice as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?></td>
					<td class="text-center">
					<?php
            
            if($role == ROLE_MANAGER)
            {
            ?>
						<a href="<?php echo base_url() ?>canceltool/<?php echo $record->num; ?>/<?php echo $record->id; ?>/<?php echo $id; ?>" class="btn btn-sm btn-default"><i class="fa fa-ban"></i> Cancel</a> | 
						<a href="<?php echo base_url() ?>misstool/<?php echo $record->num; ?>/<?php echo $record->id; ?>/<?php echo $id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-exclamation-triangle"></i> Set Error</a>
				<?php } ?>	</td>
					<td> <?php echo $record->id ?></td>
					<td> <?php echo $record->name ?></td>
					<td> <?php echo $record->brand ?></td>
					<td> <?php echo $record->size ?></td>
					<td> <?php echo $record->sts ?></td>
					<td> <?php echo $record->pos ?></td>
					  <td class="text-center">
					  <?php
            
            if($role == ROLE_MANAGER)
            {
            ?>
                          <div class="checkbox">
						  <label>
						  <input name="order_num[]" type="checkbox" value="<?php echo $record->num; ?>"> Process
						  </label>
						  </div>
			<?php } ?>
                      </td>
					
                    </tr>
                    <?php
						$a++;
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
				<?php
            
            if($role == ROLE_MANAGER)
            {
            ?>
				<div class="box-footer clearfix">
                    <div class="row">
						<div class="col-lg-8 col-xs-12">
						</div>
						<div class="col-lg-3 col-xs-12">
							
                              <input type="hidden" name="orderid" value="<?php echo $id; ?>"/>
                            <div class="row">  
                                <button class="btn btn-success btn-block"> Process Tools</button>
                            </div>
							
                            
						</div>
						<div class="col-lg-1 col-xs-12">
						</div>
					</div>
                </div>
                <?php } ?>
              </div><!-- /.box -->
			  </form>
            </div>
        
		
           
        </div>
		
    </section>
</div>
