<?php

	header('Content-Type: image/png');
	
	include('phpqrcode/qrlib.php');
	
	if(isset($_GET['code'])){
		$linker = 'http://codesys.slci.co.id/qrinput/index.php?tipe=';
		$linker .= $_GET['tipe'];
		$linker .= '&code=';
		$linker .= str_replace(" ","%20",$_GET['code']);
		$linker .= '&id=';
		$linker .= $_GET['id'];
		QRcode::png($linker);
	}
	
	
?>