<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-wrench"></i> MY Order information
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="box">
				<?php if($myorder == 0){?>
                <div class="box-header">
				<div class="row">
				<div class="col-lg-12 col-xs-12">
					<h3>You have no order currently..</h3>
				</div>
				</div>
                </div><!-- /.box-header -->
				<?php } else{?>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover table-striped table-bordered">
                    <tr>
                      <th>No</th>
					  <th>Tool ID</th>
					  <th>Invoice No</th>
                      <th>Name</th>
					  <th>Brand</th>
					  <th>Size</th>
					  <th>Status</th>
					  <th>Position</th>
					  <th>Deathline</th>
                    </tr>
                    <?php
                    if(!empty($mytool))
                    {
						$a=1;
                        foreach($mytool as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?></td>
					<td> <?php echo $record->id ?></td>
					<td> <?php echo $record->ordersid ?></td>
					<td> <?php echo $record->name ?></td>
					<td> <?php echo $record->brand ?></td>
					<td> <?php echo $record->size ?></td>
					<td> <?php echo $record->sts ?></td>
					<td> <?php echo $record->pos ?></td>
					<td> <?php if($record->sts == 'inorder'){ $ded = date('U', strtotime($record->timestamp)); $newded = $ded+259200; echo date("l, j F Y", ($newded)); }?></td>
					
                    </tr>
                    <?php
						$a++;
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
			  
				<?php } ?>
              </div><!-- /.box -->
			  </form>
            </div>
        
		
           
        </div>
		
    </section>
</div>
