<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>adduser"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="row">
							<div class="col-lg-12 col-xs-12">
							<div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i></button>
                              </div>
							</div>
							</div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th class="text-center">NIK</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">SLCI Email</th>
                      <th class="text-center">Gmail/others</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $record->NIK ?></td>
                      <td class="text-center"><?php echo $record->uName ?></td>
                      <td class="text-center"><?php if($record->uFlag == 1){echo '<span class="label label-success">Active</span>';}else{echo '<span class="label label-danger">Inactive</span>';} ?></td>
                      <td class="text-center"><?php echo $record->slcimail ?></td>
                      <td class="text-center"><?php echo $record->gmail ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url().'edituser/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
						  <?php if($record->uFlag == 0){?>
						  <a class="btn btn-sm btn-success" href="<?php echo base_url().'reactive/'.$record->id; ?>" title="Re-active"><i class="fa fa-pencil"></i></a>
						  <?php } ?>
                          <a class="btn btn-sm btn-danger" href="<?php echo base_url().'deleteuser/'.$record->id; ?>" title="Deactive"><i class="fa fa-trash"></i></a>
                      </td>
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
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
