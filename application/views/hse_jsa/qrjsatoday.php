<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1><i class="fa fa-search"></i> <?php if(!empty($time)){ $at = date('D d M Y', $time);echo 'Permit: '.$at;}else{echo 'Scan Permit Today';} ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-body table-responsive no-padding">
                        <table class="table" style="border: 1px solid black;">
                            <?php
                                if(!empty($today_jsa)){
                                    $a = 0;				
                                    foreach($today_jsa as $record){
                                    if($a % 5 == 0){echo '<tr>';}
                            ?>  
                                        <td class="text-center" style="border: 1px solid black;" width="20%">
                                            <img src="<?php echo base_url()?>qrcode_hse/<?php echo $record->id; ?>" style="height:90px"/><br>
                                            <b><br> </b><?php echo $record->supervisor ?><br>
                                            <b>Area : </b><?php echo $record->area ?><br>
                                            <b>Jam : </b><?php echo $record->start_hour ?>:00 s/d <?php echo $record->end_hour ?>:00		
                                        </td>	   
                            <?php 
                                 if($a % 5 == 4){echo '</tr>';}
                                   $a++; 
                                }
                             }
                            ?>
                        </table>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
