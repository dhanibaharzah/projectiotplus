<?php 

    //autoload
    //include('autoloadfunctions.php');
	$tipe = $_GET['tipe'];
	$code = $_GET['code'];
	$xcode = str_replace(' ', '-', $code);
	$id = $_GET['id'];
	header("Location: ../mechdata/devcode/".$xcode); /* Redirect browser */
	exit();
?>
