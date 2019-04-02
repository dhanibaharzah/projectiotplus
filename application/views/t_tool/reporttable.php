<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> All Report
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
								<form action="<?php echo base_url() ?>reporttable" method="POST" id="searchList">
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
					  <th>ReportID</th>
                      <th>Last Update</th>
					  <th>Tool</th>
					  <th>Invoice</th>
					  <th>Status</th>
					  <th class="text-center">Progress</th>
					  
                    </tr>
                    <?php
                    if(!empty($reporttable))
                    {
                        foreach($reporttable as $record)
                        {
                    ?>
                    <tr>
					<td> <?php echo $record->repoid ?>	</td>
					<td> <?php echo $record->timestamp ?>	</td>
					<td> <span class="label label-primary"><?php echo $record->id ?></span><br>
						<?php echo $record->name ?><br>
						<?php echo $record->brand ?> - <?php echo $record->size ?>
					</td>
					<td> 
						Invoice: <?php echo $record->invoice ?><br>
						Running Order: <?php echo $record->num ?><br>
						User: <?php echo $record->user ?>
					</td>
					<td> 
						<strong>Status: <?php echo $record->sts ?></strong><br>
						<?php echo $record->reason ?>
					</td>
					<td class="text-center">
                        <?php if($record->rsts == 0){ ?>
							<span class="label label-info">Submitted to PIC</span>
						<?php } ?>
						<?php if($record->rsts == 1){ ?>
							<span class="label label-primary">Submitted to Manager</span>
						<?php } ?>
						<?php if($record->rsts == 2){ ?>
							<span class="label label-warning">Rejected by PIC</span><br>
							<?php if($role == ROLE_MANAGER){?>
							<a class="btn btn-success btn-sm" href="<?php echo base_url().'revreport/'.$record->repoid; ?>" title="Edit Report">Edit Report <i class="fa fa-pencil"></i></a>
							<?php  } ?>
						<?php } ?>
						<?php if($record->rsts == 3){ ?>
							<span class="label label-danger">Rejected by Manager</span><br>
							<?php if($role == ROLE_MANAGER){?>
							<a class="btn btn-success btn-sm" href="<?php echo base_url().'revreport/'.$record->repoid; ?>" title="Edit Report">Edit Report <i class="fa fa-pencil"></i></a>
							<?php  } ?>
						<?php } ?>
						<?php if($record->rsts == 11){ ?>
							<span class="label label-success">Approved</span><br>
							<?php if($role == ROLE_MANAGER AND ($record->rsts != 12)){?>
							<br>
							<a class="btn btn-success btn-sm" href="<?php echo base_url().'closereport/'.$record->repoid.'/'.$record->id; ?>" title="Close Report">Close Report <i class="fa fa-pencil"></i></a>
							<br><br>
							<a class="btn btn-danger btn-sm" href="<?php echo base_url().'demolish/'.$record->repoid.'/'.$record->id; ?>" title="Demolish">Demolish<i class="fa fa-trash"></i></a>
							<?php  } ?>
						<?php } ?>
						<?php if($record->rsts == 12){ ?>
							<span class="label label-primary">CLOSED</span>
						<?php } ?>
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
            jQuery("#searchList").attr("action", baseURL + "reporttable/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
</script>
