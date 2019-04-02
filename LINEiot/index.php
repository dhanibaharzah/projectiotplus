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
$cek = "SELECT * FROM db_codesys.line_session WHERE lineid = '".$userId."' ORDER BY id DESC LIMIT 1";
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
			$sqlx = "SELECT * FROM db_tool.users where NIK = '".$msg_receive."'";
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
			$sqlx = "SELECT * FROM db_tool.users where NIK = '".$data_buffer."' AND uPassword = '".$pass."'";
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
				$sqlx = "UPDATE db_tool.users SET lineid= '".$userId."' WHERE NIK ='".$data_buffer."' AND uPassword = '".$pass."'";
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
}
else{
	if($message['type']=='text'){

		$msg_xpl = explode(" ", $msg_receive);
		$keyword = strtolower($msg_xpl[0]);
		
		if($keyword == 'join'){
			
			$balas = array(
				'replyToken' => $replyToken,                                                        
				'messages' => array(
					array(
						'type' => 'text',                   
						'text' => 'Your ID: '.$userId
					),
					array(
						'type' => 'text',                   
						'text' => 'Go to "Account Setting" then submit that code, "ping" to check it!'
					)
					
				)
			);

			$client->replyMessage($balas);

		}
		elseif($keyword == 'ok'){
			$sql = "UPDATE cias.area_".strtolower($msg_xpl[1])." SET app=1, bos='".$userId."' WHERE id ='".$msg_xpl[2]."' ";
			if ($conn->query($sql) === TRUE) {
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => 'Approved! Thanks'
						)
					)
				);
			} else {
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => 'Error updating record: '. $conn->error
						)
					)
				);
			}
			$conn->close();

			$client->replyMessage($balas);
			
		}
		elseif($keyword == 'cih'){
			$sql = "UPDATE cias.area_".strtolower($msg_xpl[1])." SET app=2, bos='".$userId."' WHERE id ='".$msg_xpl[2]."' ";
			if ($conn->query($sql) === TRUE) {
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => 'Rejected....'
						)
					)
				);
			} else {
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => 'Error updating record: '. $conn->error
						)
					)
				);
			}
			$conn->close();

			$client->replyMessage($balas);
		}
		elseif($keyword == 'get'){
			if($msg_xpl[1] == 'mat'){
				
				$sql = "SELECT * FROM db_codesys.Level_Tanki ORDER BY timestamp DESC LIMIT 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$mess = '';
					while($row = $result->fetch_assoc()) {
$mess .= "".$row["timestamp"].",
RS1: ".$row["RS_1"]."%, 
RS2: ".$row["RS_2"]."%, 
SS1: ".$row["SS_1"]."%, 
SS2: ".$row["SS_2"]."%, 
CEM: ".$row["CEM"]."cm, 
LIME: ".$row["LIME"]."cm";
					}
				} else {
					$mess = "0 results";
				}
				$conn->close();
				
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
				
				$conn->close();

				$client->replyMessage($balas);

			}
			elseif($msg_xpl[1] == 'pks'){
				
				$sql = "SELECT * FROM db_codesys.bc_11 ORDER BY timestamp DESC LIMIT 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$mess = '';
					while($row = $result->fetch_assoc()) {
$xx = ((5480 - $row["totalflow"])/1000) * 6.5675*2.78;
$mess .= $row["timestamp"].',
Distance: '.$row["totalflow"].'mm, 
'.$xx.'%';
					}
				} else {
					$mess = "0 results";
				}
				$conn->close();
				
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
				
				$conn->close();

				$client->replyMessage($balas);

			}
		}
		elseif($keyword == 'permit'){
				
				$sql = "SELECT * FROM db_tool.users WHERE lineid = '".$userId."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$mess = '';
					while($row = $result->fetch_assoc()) {
$mess .= "Hi, ".$row["uName"].", need a work permit? which area? please choose from list below:
'1' for rawmat
'2' for cutting";
					}
				} else {
					$mess = "sorry no results";
				}
				
				
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
				$sqlx = "INSERT INTO db_codesys.line_session (main, sub, lineid) VALUES (1, 1, '".$userId."')";
				$conn->query($sqlx);
				$conn->close();

				$client->replyMessage($balas);

			
		}
		elseif($keyword == 'reg'){
$mess .= "Balas dengan Username anda pada server toolkeeper atau server iot, contoh: '99000'
Reply with your Username on toolkeeper server or iot server, exp: '99000'";
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
		elseif($keyword == 'mtnjob'){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 25200;
$mess .= "Maintenance job today's Link: http://codesys.slci.co.id/mechdata/schmonall/".$unix;
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
		elseif($keyword == 'mtnjob2'){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 25200 + 86400;
$mess .= "Maintenance job tomorrow's Link: http://codesys.slci.co.id/mechdata/schmonall/".$unix;
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
		elseif($keyword == 'pmjob'){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 25200;
$mess .= "PM job today's Link: http://codesys.slci.co.id/mechdata/pmview/".$unix;
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
		elseif($keyword == 'pmjob2'){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 25200 + 86400;
$mess .= "PM job tomorrow's Link: http://codesys.slci.co.id/mechdata/pmview/".$unix;
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
		elseif($keyword == 'mypm'){
$mess .= "Your PM job today's Link: http://codesys.slci.co.id/mechdata/getpmtod/".$userId;
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
		elseif($keyword == 'mypm2'){
$mess .= "Your PM job tomorrow's Link: http://codesys.slci.co.id/mechdata/getpmtom/".$userId;
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
		elseif($keyword == 'myprj'){
$mess .= "Your PM job today's Link: http://codesys.slci.co.id/mechdata/getprjtod/".$userId;
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
		elseif($keyword == 'myprj2'){
$mess .= "Your PM job tomorrow's Link: http://codesys.slci.co.id/mechdata/getprjtom/".$userId;
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
		elseif($keyword == 'ps' or $keyword == 'dt'){
			if($keyword == 'ps'){
				$sql = "UPDATE db_slci.plc_downtime SET plan_stop = 1, linenotif = 0, keterangan = 'LINE-Planned Stop' WHERE id ='".$msg_xpl[1]."' and linenotif = 1 and mixing_ct_tilting > 500";
				$mess = 'Data ID '.$msg_xpl[1].' telah ditandai menjadi Planned Stop';
			}
			$msgnote = substr($msg_receive, 10);
			if($keyword == 'dt'){
				$sql = "UPDATE db_slci.plc_downtime SET plan_stop = 0, linenotif = 0, keterangan = 'LINE-".$msgnote."' WHERE id ='".$msg_xpl[1]."'  and linenotif = 1 and mixing_ct_tilting > 500";
				$mess = 'Data ID '.$msg_xpl[1].' telah ditandai menjadi Downtime';
			}
			if ($conn->query($sql) === TRUE) {
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => $mess
						)
					)
				);
			} else {
				$balas = array(
					'replyToken' => $replyToken,                                                        
					'messages' => array(
						array(
							'type' => 'text',                   
							'text' => 'Error updating record: '. $conn->error
						)
					)
				);
			}
			$conn->close();
			$client->replyMessage($balas);
		}
		else{
			$balas = array(
				'replyToken' => $replyToken,                                                        
				'messages' => array(
					array(
						'type' => 'sticker',                   
						'packageId' => '1',
						'stickerId' => '113'
					),
					array(
						'type' => 'text',                   
						'text' => '"reg" to start registration, or visit iot.slci.co.id for details'
					)
					
				)
			);

			$client->replyMessage($balas);
		}
		
	}
}