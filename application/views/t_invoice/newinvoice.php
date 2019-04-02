<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-circle"></i> New Invoice
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
                        <form action="<?php echo base_url() ?>newinvoice" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search "/>
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
					  <th>InvoiceID</th>
                      <th>Created on</th>
					  <th>Status</th>
					  <th>User</th>
					  <th class="text-center">Action</th>
					  
                    </tr>
                    <?php
                    if(!empty($newList))
                    {
						$a=1+$page;
                        foreach($newList as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?>	</td>
					<td> <?php echo $record->id ?>	</td>
					<td> <?php echo $record->datecreation ?>	</td>
					<td> <?php echo $record->name ?>	</td>
					<td> <?php echo $record->username ?>	</td>
					  <td class="text-center">
                          <a class="btn btn-info btn-block" href="<?php echo base_url().'procesinvoice/'.$record->id; ?>" title="Process Invoice">Process <i class="fa fa-pencil"></i></a>
                         
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
            jQuery("#searchList").attr("action", baseURL + "newinvoice/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
</script>
