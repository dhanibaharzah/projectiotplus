<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Function
        <small>Function</small>
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
								<form action="<?php echo base_url() ?>Funct" method="POST" id="searchList">
									<div class="input-group">
										<input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
										</div>
										<span class="input-group-btn">
											<a class="btn btn-primary" href="<?php echo base_url(); ?>addNew_Funct"><i class="fa fa-plus"></i> Add New</a>
										</span>	
									</div>
								</form>
								</div>
							</div>
						</div>
					</div><!-- /.box-header -->	
                <div class="box-body table-responsive no-padding">
					<div class="col-lg-12 col-xs-12">
				    <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Funct Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <?php
                    if(!empty($Funct))
                    {
                        foreach($Funct as $record)
                        {
                    ?>
                    
					<tr>
                      <td><?php echo $record->id ?></td>
                      <td><?php echo $record->func ?></td>
					  <td><?php echo $record->isvalid ?></td>
					  <td>
						<?php if($record->isvalid == '1'): ?>
							<span class="label label-success"> active </span>
						<?php endif; ?>
						<?php if($record->isvalid <> '1'): ?>
							<span class="label label-danger"> inactive </span>
						<?php endif; ?>
					  </td>
					  <td>
						<a class="btn btn-warning btn-sm" href="<?php echo base_url().'editFunct/'.$record->id; ?>" title="Edit Item">Edit <i class="fa fa-pencil"></i></a>
                          
						</td>
					 </tr>
					
                    <?php
                        }
                    }
                    ?>
                  </table>
                  </div>
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
            jQuery("#searchList").attr("action", baseURL + "Funct/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
</script>
