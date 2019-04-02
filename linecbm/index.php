<?php
//db
$servername = "192.168.1.11";
$username = "nodejs";
$password = "nodejs";
$dbname = "cias";

// Create connection
$conn = new mysqli($servername, $username, $password);//, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//
require_once('./line/line_class.php');
require_once('./config.php');

$client = new LINEBot($channelAccessToken, $channelSecret);
$groupId		= $client->parseEvents()[0]['source']['groupId'];
$userId         = $client->parseEvents()[0]['source']['userId'];
$replyToken     = $client->parseEvents()[0]['replyToken'];
$timestamp      = $client->parseEvents()[0]['timestamp'];
$message        = $client->parseEvents()[0]['message'];
$messageid      = $client->parseEvents()[0]['message']['id'];
$profil         = $client->profil($userId);

$msg_receive   = $message['text'];
if($message['type']=='text'){
	$msg_xpl = explode(" ", $msg_receive);
	$keyword = strtolower($msg_xpl[0]);
	if($keyword == 'reset'){
		$balas = array(
			'replyToken' => $replyToken,                                                        
			'messages' => array(
				array(
					'type' => 'text',                   
					'text' => 'All session reseted!'
				)
				
			)
		);
		$sqlx = "INSERT INTO db_codesys.line_session (main, sub, status, lineid, data_buffer) VALUES (0, 0, 0, '".$userId."', '".$msg_receive."')";
		$conn->query($sqlx);
		$conn->close();
		$client->replyMessage($balas);
		exit();
	}
}
//main 1 = work permit
//check line seesion
if(empty($groupId)){
	$cek = "SELECT * FROM db_codesys.line_session WHERE lineid = '".$userId."' ORDER BY id DESC LIMIT 1";
}elseif(!empty($groupId)){
	$cek = "SELECT * FROM db_codesys.line_session WHERE lineid = '".$groupId."' ORDER BY id DESC LIMIT 1";
}
$result = $conn->query($cek);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
		$main_session = $row["main"];
		$sub_session = $row["sub"];
		$active_session = $row["status"];
		$almost_close = $row["almost"];
		$data_buffer = $row["data_buffer"];
	}
}
if($active_session == 1){
	if($main_session == 9){
		if($sub_session == 1){
			$sqlx = "SELECT * FROM db_cbm.users where NIK = '".$msg_receive."'";
			$result = $conn->query($sqlx);
			if($result->num_rows > 0){
				$balas = array(
				'replyToken' => $replyToken,                                                        
				'messages' => array(
					array(
						'type' => 'text',                   
						'text' => 'Password ?'
					)
				)
				);
				$sqlx = "INSERT INTO db_codesys.line_session (main, sub, lineid, data_buffer) VALUES (9, 2, '".$userId."', '".$msg_receive."')";
				$conn->query($sqlx);
				$conn->close();
				$client->replyMessage($balas);
			}
			else{
				$balas = array(
				'replyToken' => $replyToken,                                                        
				'messages' => array(
					array(
						'type' => 'text',                   
						'text' => 'Username not found, registration session has been closed!'
					)
				)
				);
				$sqlx = "INSERT INTO db_codesys.line_session (status, main, sub, lineid) VALUES (0, 9, 2, '".$userId."')";
				$conn->query($sqlx);
				$conn->close();
				$client->replyMessage($balas);
			}
		}
		if($sub_session == 2){
			$pass = md5($msg_receive);
			$sqlx = "SELECT * FROM db_cbm.users where NIK = '".$data_buffer."' AND uPassword = '".$pass."'";
			$result = $conn->query($sqlx);
			if($result->num_rows > 0){
				$balas = array(
				'replyToken' => $replyToken,                                                        
				'messages' => array(
					array(
						'type' => 'text',                   
						'text' => 'Success!'
					)
				)
				);
				$sqlx = "INSERT INTO db_codesys.line_session (status, main, sub, lineid, data_buffer) VALUES (0, 9, 2, '".$userId."', '".$msg_receive."')";
				$conn->query($sqlx);
				$sqlx = "UPDATE db_cbm.users SET lineid= '".$userId."' WHERE NIK ='".$data_buffer."' AND uPassword = '".$pass."'";
				$conn->query($sqlx);
				$conn->close();
				$client->replyMessage($balas);
			}
			else{
				$balas = array(
				'replyToken' => $replyToken,                                                        
				'messages' => array(
					array(
						'type' => 'text',                   
						'text' => 'Invalid password, registration session has been closed!'
					)
				)
				);
				$sqlx = "INSERT INTO db_codesys.line_session (status, main, sub, lineid) VALUES (0, 9, 2, '".$userId."')";
				$conn->query($sqlx);
				$conn->close();
				$client->replyMessage($balas);
			}
		}
	}
	elseif($main_session == 3){
		if($sub_session == 1 and $keyword == 'y'){
			$balas = array(
			'replyToken' => $replyToken,                                                        
			'messages' => array(
				array(
					'type' => 'text',                   
					'text' => 'This Group has been registered'
				)
			)
			);
			$sqlx = "INSERT INTO db_codesys.line_session (main, sub, status, lineid, data_buffer) VALUES (0, 0, 0, '".$groupId."', '".$msg_receive."')";
			$conn->query($sqlx);
			$sqly = "INSERT INTO db_cbm.line_group (groupid, groupapp) VALUES ('".$groupId."', 'CBM')";
			$conn->query($sqly);
			$conn->close();
			$client->replyMessage($balas);
		}
		elseif($sub_session == 1 and $keyword != 'y'){
			$balas = array(
			'replyToken' => $replyToken,                                                        
			'messages' => array(
				array(
					'type' => 'text',                   
					'text' => 'Registration sesion has been closed'
				)
			)
			);
			$sqlx = "INSERT INTO db_codesys.line_session (main, sub, status, lineid, data_buffer) VALUES (0, 0, 0, '".$groupId."', '".$msg_receive."')";
			$conn->query($sqlx);
			$conn->close();
			$client->replyMessage($balas);
		}
	}
}else{
	if($message['type']=='text'){
		$msg_xpl = explode(" ", $msg_receive);
		$keyword = strtolower($msg_xpl[0]);
		if($keyword == 'reg' and empty($groupId)){
$mess .= "Reply with your Username on SLCI iot server, exp: '30000'";
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
				$sqlx = "INSERT INTO db_codesys.line_session (main, sub, lineid) VALUES (9, 1, '".$userId."')";
				$conn->query($sqlx);
				$conn->close();

				$client->replyMessage($balas);

			
		}
		elseif($keyword == 'reg' and !empty($groupId)){
			$sqlx = "SELECT * FROM db_cbm.line_group where groupId = '".$groupId."' and groupapp = 'CBM'";
			$result = $conn->query($sqlx);
			if($result->num_rows > 0){
				$mess .= "This group has been registered to CBM application on iot.slci.co.id";
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
				$client->replyMessage($balas);
			}else{
				$mess .= "LINE Chat Group Registration, Do you want to register this group to CBM application on iot.slci.co.id (Y/N) ?";
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
				$sqlx = "INSERT INTO db_codesys.line_session (main, sub, lineid) VALUES (3, 1, '".$groupId."')";
				$conn->query($sqlx);
				$conn->close();
				$client->replyMessage($balas);
			}
		}
		elseif($keyword == 'report'){
			$randomizer = ((date('H') + 70)*45)-8;
$mess .= "Check it here, 
https://iot.slci.co.id/cbmsales_report/";
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
				$client->replyMessage($balas);
		}
	}
}