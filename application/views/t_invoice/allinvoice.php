<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> All Invoice
      </h1>
    </section>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="box">
                <div class="box-header">
				<div class="row">
				<div class="col-lg-12 col-xs-12">
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>allinvoice" method="POST" id="searchList">
							<div class="col-md-3 form-group">
							</div>
						   <div class="col-md-2 form-group">
								<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date"/>
							</div>
							<div class="col-md-2 form-group">
								<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date"/>
							</div>
							<div class="col-md-4 form-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right"  placeholder="Search"/>
                              </div>
							  <div class="col-md-1 form-group">
                                <button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
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
                    if(!empty($allList))
                    {
						$a=1+$page;
                        foreach($allList as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?>	</td>
					<td> <?php echo $record->id ?>	</td>
					<td> <?php echo $record->datecreation ?>	</td>
					<td> <?php echo $record->name ?>	</td>
					<td> <?php echo $record->username ?>	</td>
					  <td class="text-center">
                          <a class="btn 
						  <?php if($record->name == 'New Order'){echo 'btn-warning';} ?>
						  <?php if($record->name == 'Ongoing Invoice'){echo 'btn-primary';} ?>
						  <?php if($record->name == 'Closed Invoice'){echo 'btn-success';} ?>
						  
						  btn-block" href="<?php echo base_url().'detailinvoice/'.$record->id; ?>" title="Check Invoice">Detail <i class="fa fa-history"></i></a>
                          </td>
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
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "allinvoice/" + value);
            jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
</script>
