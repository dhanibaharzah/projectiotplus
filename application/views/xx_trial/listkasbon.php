<?php if(!empty($listkasbon)){ ?>
		<table class="table">
			<tr>
				<th>Tanggal Kasbon</th>
				<th>Tanggal Bayar</th>
				<th>Jumlah Kasbon</th>
				<th>Jumlah Terbayar</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
<?php foreach($listkasbon as $record){
			$status = 'BELUM LUNAS';
			if($record->status_kas == 1){$status = 'LUNAS';}
?>
			<tr>
				<td><?php echo $record->createdat; ?></td>
				<td><?php echo $record->closedat; ?></td>
				<td><?php echo 'Rp '.number_format($record->kasbon, 0, ',', '.').',-'; ?></td>
				<td><?php echo 'Rp '.number_format($record->kasbon_bayar, 0, ',', '.').',-'; ?></td>
				<td><?php echo $status; ?></td>
				<td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#bayaxr<?php echo $record->id; ?>"><i class="fa fa-dollar"></i> Bayar</button></td>
			</tr>
<?php		} ?>
		</table>
<?php	}else{
		echo 'ANGGOTA BELUM ADA TRANSAKSI KASBON';
	}
?>
<?php if(!empty($listkasbon)){ ?>
<?php foreach($listkasbon as $record){ ?>
<div class="modal modal-default fade" id="bayaxr<?php echo $record->id; ?>">
<form role="form" id="bayaxxxr<?php echo $record->id; ?>" action="<?php echo base_url(); ?>bayar_kasbon_id" method="POST" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<label class="pull-left">Tanggal Dibuka:</label>
				<input type="text" value="<?php echo $record->createdat; ?>" class="form-control" disabled>
				<label class="pull-left">Kasbon:</label>
				<input type="text" value="<?php echo 'Rp '.number_format($record->kasbon, 0, ',', '.').',-'; ?>" class="form-control" disabled>
				<label class="pull-left">Bayar Kasbon:</label>
				<input type="text" value="<?php echo 'Rp '.number_format($record->kasbon_bayar, 0, ',', '.').',-'; ?>" class="form-control" disabled>
				<input type="hidden" name="id_kasbon" value="<?php echo $record->id; ?>"/>
				<input type="hidden" name="mem_id" value="<?php echo $record->member_id; ?>"/>
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" value="Bayar">
				
			</div>
		</div>
	</div>
</form>
</div>
<?php		} } ?>