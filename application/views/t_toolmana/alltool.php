<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-database"></i> All Tool
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="box">
                <div class="box-header">
				<div class="row">
				<div class="col-lg-12 col-xs-12">
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>alltool" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
                              </div>
                            </div>
                        </form>
                    </div>
				</div>
				
				</div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover table-striped table-bordered">
                    <tr>
                      
                      <th>No</th>
					  <th>id</th>
                      <th>Last Update</th>
					  <th>Invoice</th>
					  <th>Name</th>
					  <th>Brand</th>
					  <th>Size/Type</th>
					  <th>Position</th>
					  <th>Status</th>
					  <th>User</th>
					  <th class="text-center">Action</th>
					  
                    </tr>
                    <?php
                    if(!empty($alltoolList))
                    {
						$a=1+$page;
                        foreach($alltoolList as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?></td>
					<td> <?php echo $record->id ?></td>
					<td> <?php echo $record->timestamp ?></td>
					<td> <?php echo $record->invoice ?></td>
					<td> <?php echo $record->name ?></td>
					<td> <?php echo $record->brand ?></td>
					<td> <?php echo $record->size ?></td>
					<td> <?php echo $record->pos ?></td>
					<td class="text-center"> 
					<?php
						if ($record->sts == 'available'){
							echo '<span class="label label-success"> Available</span>';
						} 
						elseif ($record->sts == 'booked'){
							echo '<span class="label label-info"> Booked</span>';
						} 
						elseif ($record->sts == 'inorder'){
							echo '<span class="label label-primary"> Inorder</span>';
						} 
						else{
							echo '<span class="label label-danger">'.$record->sts.'</span>';
						}
					?>
					</td>
					<td> <?php echo $record->user ?></td>
					
					  <td class="text-center">
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url().'detailtool/'.$record->id; ?>" title="Detail of Tool">Detail <i class="fa fa-history"></i></a>
                         <a class="btn btn-sm btn-info" href="<?php echo base_url().'edittool/'.$record->id; ?>" title="Edit Tool">Edit <i class="fa fa-pencil"></i></a>
                         
                      </td>
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
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "alltool/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
</script>
