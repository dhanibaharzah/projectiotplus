<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-list"></i> Detail Invoice
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
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
					  <th>Tool ID</th>
                      <th>Name</th>
					  <th>Brand</th>
					  <th>Size</th>
					  <th>Status</th>
					  <th>Position</th>
					  
                    </tr>
                    <?php
                    if(!empty($detailinvoice))
                    {
						$a=1;
                        foreach($detailinvoice as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?></td>
					<td> <?php echo $record->id ?></td>
					<td> <?php echo $record->name ?></td>
					<td> <?php echo $record->brand ?></td>
					<td> <?php echo $record->size ?></td>
					<td class="text-center"> 
					<?php 
						if($record->sts == 'booked'){echo '<span class="label label-info">'.$record->sts.'</span>';}
						if($record->sts == 'inorder'){echo '<span class="label label-warning">'.$record->sts.'</span>';}
						if($record->sts == 'returned'){echo '<span class="label label-success">'.$record->sts.'</span>';}
						if($record->sts == 'broken'){echo '<span class="label label-default">'.$record->sts.'</span>';}
						if($record->sts == 'lost'){echo '<span class="label label-danger">'.$record->sts.'</span>';}
						if($record->sts == 'late'){echo '<span class="label label-danger">'.$record->sts.'</span>';}
					?>
					</td>
					<td> <?php echo $record->pos ?></td>
                    </tr>
                    <?php
						$a++;
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
				
				
                
              </div><!-- /.box -->
			  </form>
            </div>
        
		
           
        </div>
		
    </section>
</div>
