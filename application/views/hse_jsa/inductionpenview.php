<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
	 <h1> <i class="fa fa-warning"></i> View penalty
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<table class="table table-hover table-striped table-bordered">
                                    <tr>
										<td width="5%"><b>Perusahaan</b></td>
										<td width="70%">
                                            <?php 
                                            if(!empty($penalty_name)){
                                                echo $penalty_name->vendor_id;
                                            }else{
                                                echo ' ';
                                            }
                                            ?>
                                        </td>
									</tr>
									<tr>
										<td width="5%"><b>Nama</b></td>
										<td width="70%">
                                            <?php 
                                            if(!empty($penalty_name)){
                                                echo $penalty_name->man_vendor_id;
                                            }else{
                                                echo ' ';
                                            }
                                            ?>
										</td>
									</tr>
									<tr>
										<td width="5%"><b>No. Registrasi</b></td>
										<td width="70%">
                                            <?php 
                                            if(!empty($penalty_name)){
                                                echo $penalty_name->regnums;
                                            }else{
                                                echo ' ';
                                            }
                                            ?>
                                        </td>
									</tr>
								</table>
							</div>	
							<div class="col-md-12 col-xs-12">
                                <table class="table table-hover table-striped taable-bordered ">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Bentuk Pelanggaran</th>
                                            <th>Report By</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
								            if(!empty($list_penalty))
                                            {$number=1;
                                                foreach($list_penalty as $record)
                                            {
							            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $number ?>
                                                </td>
                                                <td>
                                                    <?php echo $record->notes; ?>
                                                </td>
                                                <td>
                                                    <?php echo $record->addedby; ?>
                                                </td>
                                                <td>
                                                    [X]
                                                </td>
                                            </tr>
                                        <?php
                                            $number++;
                                            }
                                            }else{echo '<center>Data kosong, karena tidak ada pelanggaran</center><br>';
                                        }
                                        ?>    
                                    </tbody>
                                 </table>
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
					     <a class="btn btn-success" href="<?php echo base_url()?>vendorinduction"><i class="fa fa-check"></i> DONE</a>
					</div>
                </div>
            </div>
        </div>
		
    </section>
    
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" />
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script>

</script>



