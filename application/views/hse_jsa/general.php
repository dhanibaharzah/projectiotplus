<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        <i class="fa fa-gears"></i> General Question
        <small><?php echo $company_name; ?></small>
      </h1>
    </section>
    
    <section class="content">
		<div class="row">
			<div class="col-md-8 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<form role="form" id="save_permit" action="<?php echo base_url() ?>save_permit" method="post" role="form">
								<?php if(!empty($general)){ 
									$no = 1;
									foreach($general as $record)
									{
										if($record->regpermit == '1'){$kolom = 'panas'; $value = $jsa->panas;}
										if($record->regpermit == '2'){$kolom = 'tinggi'; $value = $jsa->tinggi;}
										if($record->regpermit == '3'){$kolom = 'terbatas'; $value = $jsa->terbatas;}
										if($record->regpermit == '4'){$kolom = 'penggalian'; $value = $jsa->penggalian;}
										if($record->regpermit == '5'){$kolom = 'listrik'; $value = $jsa->listrik;}
								?>
									<div class="col-md-12">                                
										<div class="form-group">
											<h4><?php echo $no; ?>. <?php echo $record->question; ?></h4>
											<?php if($record->answer_type){ ?>
												<label class="radio-inline"><input type="radio" name="<?php echo $kolom ?>" value="1" required <?php if($value == 1){echo 'checked';}?>>YA</label>
												<label class="radio-inline"><input type="radio" name="<?php echo $kolom ?>" value="2"<?php if($value == 2){echo 'checked';}?>>TIDAK</label>
											<?php } ?>
										</div>                                   
									</div>
									
								<?php $no++;} }?>
								
					</div>
					<div class="box-footer">
						<input type="hidden" name="id" value="<?php echo $jsa->id; ?>">
						<a href="<?php echo base_url(); ?>tool_hse/<?php echo $jsa->id;?>" class="btn btn-primary pull-left">BACK</a>
						<input type="submit" name="submit" value="Submit" class="btn btn-success pull-right">
					</div>
					</form>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
					
					</div>
					<div class="box-body">
					
					</div>
					<div class="box-footer">
					
					</div>
					
				</div>
			</div>
		</div>
        
    </section>
    
</div>
