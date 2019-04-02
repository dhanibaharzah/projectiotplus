<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-link"></i> Link PM Form
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="box">
					<div class="box-body table-responsive">
						<?php
							if(!empty($doc)){
								$head = '';
								$head2 = '';
								$title = '';
								$title2 = '';
								$a=1;
								$input='';
								$kop = '';
								$kop2 = '';
								$x = 0;
								$xxx = 1;
								foreach($doc as $record){
									$kop = '<table class="table" style="border: 1px solid black;">
										<tr>
											<td class="text-center" style="border: 1px solid black;"><b>EQUIPMENT NAME</b></td>
											<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
											<td style="border: 1px solid black;"><b>DOC NUM</b></td>
											<td class="text-center" style="border: 1px solid black;" rowspan="3"><img src="'.base_url().'qrcode/'.$record->code.'" style="height:90px"/></td>
										</tr>
										<tr>
											<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->eq_name.'</b></td>
											<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->code.'</b></td>
											<td style="border: 1px solid black;"><b>RELEASE DATE</b></td>
										</tr>
										<tr>
											<td style="border: 1px solid black;"><b>REVISION</b></td>
										</tr>
										<tr>
											<td class="text-center" colspan="4" style="border: 1px solid black;">
												<div id="setparam"></div>
											</td>
										</tr>
										</table>';
									if($kop != $kop2){echo $kop;}
									$head = '<table class="table table-hover table-striped table-bordered" >
										<tr>
											<th class="text-center" style="border: 1px solid black;">No</th>
											<th class="text-center" style="border: 1px solid black;">Condition</th>
											<th class="text-center" style="border: 1px solid black;">Standard</th>
											<th class="text-center" style="border: 1px solid black;">Answer Type</th>
											<th class="text-center" style="border: 1px solid black;">Device</th>
											<th class="text-center" style="border: 1px solid black;">Parameter</th>
										</tr>';
									if($head != $head2){echo $head;}
									$titlex = '
										<td colspan="6" style="border: 1px solid black;">
											<b>'.$xxx.'. '.$record->title.'</b>
										</td>';
									$title = $record->title;
									if($title != $title2){echo $titlex; $a=1;$xxx++;}
									if($record->type == 1){$input = 'Number Input';}
									if($record->type == 2){$input = 'YES/NO Selection';}
									if($record->type != 2 and $record->type != 1){$input = $record->type;}
						?>
							<tr id="<?php echo $record->id; ?>">
								<td class="text-center" style="border: 1px solid black;"><?php echo $a; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->cond; ?></td>
								<td style="border: 1px solid black;"><?php echo $record->stand; ?></td>
								<td style="border: 1px solid black;"><?php echo $input; ?></td>
								<td style="border: 1px solid black;" class="text-center">
									<?php echo $record->dcode; ?><br>
									<input type="submit" value="Set Dev" class="btn btn-sm btn-primary" id="sub<?php echo $record->id; ?>"/>
									
								</td>
								<td style="border: 1px solid black;" class="text-center">
								<?php if(!empty($record->dcode)){ ?>	
									<?php echo $record->penum; ?><br>
									<input type="button" value="Set Param" class="btn btn-sm btn-primary" id="btn<?php echo $record->id; ?>"/>
								<?php } ?>
									<?php
										//store last row
										$eq_name_x = $record->eq_name;
										$code_x = $record->code;
										$frec_x = $record->frec;
										$tag_x = $record->tag;
										$pic_x = $record->pic;
									?>
								</td>
							</tr>
						<?php
								$head2 = $head;
								$kop2 = $kop;
								$title2 = $title;
								$a++;$x++;
								}
							}
						?>
						</table>
					</div>
					<div class="box-footer text-center">
						<a href="<?php echo base_url().'checkdoc'; ?>" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> Back to Check Doc</a> | 
						<a href="<?php echo base_url().'editdoc/'.$code_x.'/'.$frec_x.'/'.$tag_x; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit this document</a> | 
						<a class="btn btn-danger btn-sm" href="<?php echo base_url().'logodoc/'.$code_x.'/'.$frec_x.'/'.$tag_x; ?>"><i class="fa fa-file-image-o"></i> Set Logo</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<link href="<?php echo base_url(); ?>assets/autocomplete/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/autocomplete/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
	$('input[type=submit]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#setparam').load('<?php echo base_url();?>getpmparam/' + trid);
	});
	$('input[type=button]' ).click(function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		$('#setparam').load('<?php echo base_url();?>getpmparam2/' + trid);
	});
</script>