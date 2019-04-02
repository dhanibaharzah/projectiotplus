<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-file-text-o"></i> Approval Documents</h1>
	</section>
	<section class="content">
		<small>Found <?php echo $total; ?> data(s)</small>
	<div class="row">
		<div class="box box-primary">
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover table-striped taable-bordered">
					<tr>
						<th class="text-center" width="5%">ID</th>
						<th class="text-center" >Document Details </th>
					</tr>
			
					 <?php 
						if(!empty($docapproval)){
							foreach ($docapproval as $result)
						{ 
							?>
								<tr>
									<td class="text-center" width="5%"><?php echo $result->id; ?></td>
									<td>
										<b>Document Number:</b> <?php echo $result->docno; ?>
										<b>Owner:</b> <?php echo $result->owner; ?>
										<b>Last Update:</b> <?php echo $result->timestamp; ?>
										<?php if(($authuser->cd_role1 and empty($result->app1)) or ($authuser->cd_role2 and empty($result->app2)) or ($authuser->cd_role3 and empty($result->app3))){ ?>
										<a class="btn btn-primary btn-sm pull-right" target="_blank" href="<?php echo base_url().'schapp/'.$result->id; ?>"><i class="fa fa-retweet"></i> Process</a>
										<?php } ?>
									</td>
								</tr>
								<tr>
								<td class="text-center" colspan="2">
								<span id="process<?php echo $result->id;?>"> </span>
								</td>
								</tr>
								<script type="text/javascript">
									setInterval(function(){
										$('#process<?php echo $result->id;?>').load('<?php echo base_url(); ?>process/<?php echo $result->id;?>'); //supaya terupdate tiap detik
									}, 1000) 
								</script>
							<?php		
								} //catatan! line 26 sebagai pembatas otorisasi user bisa melihat atau tidak yang bisa lihat hanya cd_role1 - 3. bila cd_role1 s/d 3 sudah approve maka tombol proses hilang
							}	  // bila dalam keadaan darirat hapus saja line 26 dan 28
						?>
				</table>
			</div>
			<div class="box-footer clearfix">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
		</div>
	</section>
</div>

