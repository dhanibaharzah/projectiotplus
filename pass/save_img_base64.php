<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

$base_name		= explode('/',$_REQUEST['filename']);
$filename		= end($base_name);

$target_path  	= "../files/";
$target_path 	= $target_path . $filename;

$base			= $_REQUEST['image'];
$binary			= base64_decode($base);

$info		= $_REQUEST['info'];
$time		= $_REQUEST['time'];
$step		= $_REQUEST['step'];
$order		= $_REQUEST['order_id'];

/*
nameValuePairs.add(new BasicNameValuePair("info",info));
        nameValuePairs.add(new BasicNameValuePair("time",time));
        nameValuePairs.add(new BasicNameValuePair("step",step));
        nameValuePairs.add(new BasicNameValuePair("order_id",order_id));
*/
header('Content-Type: bitmap; charset=utf-8');

if (!$file = fopen($target_path, 'wb')) {
	echo "Cannot open file ($filename)";
	exit;
}

if (fwrite($file, $binary) === FALSE) {
	echo "Cannot write to file ($filename)";
    exit;
}
$db->insertStepReport($order, $step, $filename, $info, $time);
echo "Success";

fclose($file);