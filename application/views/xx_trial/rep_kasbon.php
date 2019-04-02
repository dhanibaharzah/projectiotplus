<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-copy"></i> Record Kasbon
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
                        <form action="<?php echo base_url() ?>rep_kasbon" method="POST" id="searchList">
						   <div class="col-md-2 form-group">
								<input for="fromDate" autocomplete="off" type="text" name="fromDate" value="<?php echo $fromDate; ?>" class="form-control datepicker" placeholder="From Date"/>
							</div>
							<div class="col-md-2 form-group">
								<input id="toDate" autocomplete="off" type="text" name="toDate" value="<?php echo $toDate; ?>" class="form-control datepicker" placeholder="To Date"/>
							</div>
							<div class="col-md-2 form-group">
                                <button class="btn btn-sm btn-primary searchList"><i class="fa fa-search"></i> Search</button>
                              </div>
                            
                        </form>
                    </div>
					
				</div>
				<div class="col-lg-12 col-xs-12">
				Found <?php echo $total?> data(s)
				</div>
				</div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover table-striped table-bordered">
                    <tr>
                      
                      <th>No</th>
					  <th>Tanggal Ambil</th>
                      <th>Tanggal Bayar</th>
					  <th>Anggota</th>
					  <th>Kasbon</th>
					  <th>Bayar</th>
					  <th>Status</th>
					  
                    </tr>
                    <?php
                    if(!empty($rep_kasbon))
                    {
						$a=1+$page;
						$status = '';
                        foreach($rep_kasbon as $record){
							if($record->status_kas == 1){$status = 'LUNAS'; }else{$status = 'BELUM LUNAS'; }
                    ?>
                    <tr>
                      
                    <td> <?php echo $a ?>	</td>
					<td> <?php echo $record->createdat ?>	</td>
					<td> <?php echo $record->closedat ?>	</td>
					<td> <?php echo $record->member_name ?>	</td>
					<td> <?php echo number_format($record->kasbon, 0, ',', '.'); ?>	</td>
					<td> <?php echo number_format($record->kasbon_bayar, 0, ',', '.'); ?>	</td>
					<td> <?php echo $status; ?>	</td>
					
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
				<div class="box-footer">
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4 col-xs-4">
						  <div class="description-block border-right">
							<h5 class="description-header">Rp <?php echo number_format($cash_in, 0, ',', '.'); ?>,-</h5>
							<span class="description-text">TOTAL CASH IN</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 col-xs-4">
						  <div class="description-block border-right">
							<h5 class="description-header">Rp <?php echo number_format($cash_out, 0, ',', '.'); ?>,-</h5>
							<span class="description-text">TOTAL CASH OUT</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 col-xs-4">
						  <div class="description-block border-right">
							<span class="description-percentage text-green"><?php echo number_format($profit_persen, 1, '.', ''); ?>%</span>
							<h5 class="description-header">Rp <?php echo number_format($profit, 0, ',', '.'); ?>,-</h5>
							<span class="description-text">TOTAL PROFIT</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						
					  </div>
					  <!-- /.row -->
					</div>
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
            jQuery("#searchList").attr("action", baseURL + "rep_kasbon/" + value);
            jQuery("#searchList").submit();
        });
		jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
		
	});
</script>
