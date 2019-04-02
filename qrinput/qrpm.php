<?php

	header('Content-Type: image/png');
	
	include('phpqrcode/qrlib.php');
	
	if(isset($_GET['code'])){
		$linker = 'http://codesys.slci.co.id/mechdata/pmcode/';
		$linker .= $_GET['code'];
		QRcode::png($linker);
	}
	
	
?>