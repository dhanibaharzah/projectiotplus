<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-check"></i> Close Invoice
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
			<form role="form" method="POST" action="<?php echo base_url() ?>closeinvoice_exe">
              <div class="box">
                <div class="box-header">
				<div class="row">
				<div class="col-lg-12 col-xs-12">
				<h3>Invoices by.<?php echo $username; ?></h3>
				</div>
				</div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover table-striped table-bordered">
                    <tr>
                      
                      <th>No</th>
					  <th class="text-center">Lost/Broken</th>
					  <th>Invoice ID</th>
					  <th>Tool ID</th>
                      <th>Name</th>
					  <th>Brand</th>
					  <th>Size</th>
					  <th>Status</th>
					  <th>Position</th>
					  
					  <th class="text-center">Action</th>
					  
                    </tr>
                    <?php
                    if(!empty($closeinvoice))
                    {
						$a=1;
                        foreach($closeinvoice as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?></td>
					<td class="text-center">
			<?php
			if($role == ROLE_MANAGER)
            {
            ?>
						<a href="<?php echo base_url() ?>losttool/<?php echo $record->num; ?>/<?php echo $record->id; ?>/<?php echo $username; ?>" class="btn btn-sm btn-default"><i class="fa fa-ban"></i> Lost</a> | 
						<a href="<?php echo base_url() ?>brokentool/<?php echo $record->num; ?>/<?php echo $record->id; ?>/<?php echo $username; ?>" class="btn btn-sm btn-danger"><i class="fa fa-exclamation-triangle"></i> Broken</a>
			<?php } ?>
					</td>
					<td> <?php echo $record->ordersid ?></td>
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
						  <input name="order_num[]" type="checkbox" value="<?php echo $record->num; ?>"> Close
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
							
                              <input type="hidden" name="username" value="<?php echo $username; ?>"/>
                            <div class="row">  
                                <button class="btn btn-success btn-block"> Close Tools</button>
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
