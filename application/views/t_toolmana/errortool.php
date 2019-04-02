<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-exclamation-circle"></i> Broken Tools
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
                        <form action="<?php echo base_url() ?>errortool" method="POST" id="searchList">
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
                      
                      <th>ID</th>
                      <th>Last Update</th>
					  <th>InvoiceID</th>
					  <th>Name</th>
					  <th>Brand/Type</th>
					  <th>Status</th>
					  <th>Pos</th>
					  <th>User</th>
					  <th class="text-center">Action</th>
					  
                    </tr>
                    <?php
                    if(!empty($errorList))
                    {
						$a=1+$page;
                        foreach($errorList as $record)
                        {
                    ?>
                    <tr>
                      
                    <td> <?php echo $record->id ?></td>
					<td> <?php echo $record->timestamp ?></td>
					<td> <?php echo $record->invoice ?></td>
					<td> <?php echo $record->name ?></td>
					<td> <?php echo $record->brand ?><br><?php echo $record->size ?></td>
					<td class="text-center"> 
					<?php 
						if($record->sts == 'broken'){ echo '<span class="label label-default">'.$record->sts.'</span>';}
						if($record->sts == 'lost'){ echo '<span class="label label-danger">'.$record->sts.'</span>';}
						if($record->sts == 'late'){ echo '<span class="label label-primary">'.$record->sts.'</span>';}
						if($record->sts == 'data miss'){ echo '<span class="label label-warning">'.$record->sts.'</span>';}
					?>
					</td>
					<td> <?php echo $record->pos ?></td>
					<td> <?php echo $record->user ?></td>
					  <td class="text-center">
						<?php if($role == ROLE_MANAGER){?>
						<?php if(($record->sts == 'broken' OR $record->sts == 'lost' OR $record->sts == 'data miss') AND $record->rsts == 0){ ?>
						<a class="btn btn-default btn-block btn-sm" href="<?php echo base_url().'report/'.$record->id; ?>" title="Submit a Report">Submit Report <i class="fa fa-pencil"></i></a>
                        <?php } } ?>
						<?php if($role == ROLE_MANAGER){?>
						<?php if(($record->sts == 'broken' OR $record->sts == 'lost' OR $record->sts == 'data miss') AND $record->rsts == 1){ ?>
						<p><span class="label label-success">Report Submitted <i class="fa fa-check"></i></span></p>
                        <?php } } ?>
						<?php if($role == ROLE_MANAGER){?>
						<?php if($record->sts == 'late'){ ?>
						<a class="btn btn-primary btn-block btn-sm" href="<?php echo base_url().'setlate/'.$record->id; ?>" title="Tool has been Returned">Returned but Late <i class="fa fa-pencil"></i></a>
                        <?php } } ?>
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
            jQuery("#searchList").attr("action", baseURL + "errortool/" + value);
            jQuery("#searchList").submit();
        });
		
		
	});
</script>
