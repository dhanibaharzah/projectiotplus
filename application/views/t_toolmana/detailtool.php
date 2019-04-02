<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-list"></i> Detail Tool
      </h1>
    </section>
    <section class="content">
        <div class="row">
			<div class="col-lg-5 col-xs-5">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-8 col-xs-8">
								<h3>Tool Detail</h3>
							</div>
							<div class="col-lg-4 col-xs-4">
								<a href="<?php echo base_url().'edittool/'.$detailtool->id; ?>" class="btn btn-info btn-block"><i class="fa fa-pencil"></i> Edit</a>
							</div>
						</div>
					</div>
					<div class="box-body">
						<strong>ID: </strong><?php echo $detailtool->id ?><br>
						<strong>Name: </strong><?php echo $detailtool->name ?><br>
						<strong>Brand: </strong><?php echo $detailtool->brand ?><br>
						<strong>Size/Type: </strong><?php echo $detailtool->size ?><br>
						<strong>Position: </strong><?php echo $detailtool->pos ?><br>
						<strong>Current Status: </strong>
						<?php 
							if($detailtool->sts == 'available'){echo '<span class="label label-success">'.$detailtool->sts.'</span>';} 
							if($detailtool->sts == 'lost'){echo '<span class="label label-danger">'.$detailtool->sts.'</span>';} 
							if($detailtool->sts == 'broken'){echo '<span class="label label-default">'.$detailtool->sts.'</span>';} 
							if($detailtool->sts == 'data miss'){echo '<span class="label label-default">'.$detailtool->sts.'</span>';} 
							
						?>
						<br><br>
						<?php if($detailtool->sts != 'booked' OR $detailtool->sts != 'inorder'){ ?>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<a href="<?php echo base_url().'setdatamiss/'.$detailtool->id; ?>" class="btn btn-default btn-block"> Set "Data Miss"</a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<?php if($detailtool->sts == 'data miss' OR $detailtool->sts == 'booked'){ ?>
								<a href="<?php echo base_url().'setavailable/'.$detailtool->id; ?>" class="btn btn-success btn-block"> Set "Available"</a>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
            <div class="col-lg-7 col-xs-7">
              <div class="box">
                <div class="box-header">
				<div class="row">
				<div class="col-lg-12 col-xs-12">
				<h3>Tool's History</h3>
				</div>
				</div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover table-striped table-bordered">
                    <tr>
                      
                      <th>No</th>
					  <th>Last Update</th>
					  <th>Invoice</th>
                      <th>Status</th>
					  <th>User</th>
					  <th>Position</th>
					  
                    </tr>
                    <?php
                    if(!empty($toolhisList))
                    {
						$a=1;
                        foreach($toolhisList as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?></td>
					<td> <?php echo $record->timestamp ?></td>
					<td> <?php echo $record->ordersid ?></td>
					<td> <?php echo $record->sts ?></td>
					<td> <?php echo $record->user ?></td>
					<td> <?php echo $record->pos ?></td>
					
                    </tr>
                    <?php
						$a++;
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
		
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
