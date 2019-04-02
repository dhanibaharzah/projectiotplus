<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_mailer extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('iot_mailer_model');
    }
	function logmem(){
		$free = shell_exec('free');
		$free = (string)trim($free);
		$free_arr = explode("\n", $free);
		$mem = explode(" ", $free_arr[1]);
		$mem = array_filter($mem);
		$mem = array_merge($mem);
		$memory_usage = $mem[2]/$mem[1]*100;
		
		$load = sys_getloadavg();
		$cpu = $load[0];
		$loginfo = array('mem'=>$memory_usage, 'cpu'=>$cpu);
		$logmem = $this->iot_mailer_model->logmem($loginfo);
		exit();
	}
	function ping()
	{
		$this->load->library('email');
			
		$receiver = $this->iot_mailer_model->getallreceiver();
		if(!empty($receiver)){
			$rec = '';
			foreach($receiver as $record){
				$rec .= $record->email.', ';
			}
		}else{
			exit;
		}
		$mailuser = substr($rec, 0, -2);
			
		$subject = 'Ping!';
		$message = '<br><p>Topic Follower Call</p><br>';
		$body = '
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
					<style type="text/css">
					table {
						border-collapse: collapse;
					}
					table, th, td {
						border: 1px solid black;
					}
					body {
						font-family: Arial, Verdana, Helvetica, sans-serif;
						font-size: 16px;
					}
					</style>
				</head>
				<body>
					' . $message . '<br>
					
				</body>
				
			</html>';
		$body = $this->email->full_html($subject, $message);
		
		$result = $this->email
			->from('AutomatedRAWR@IoTV0.3')
			->reply_to('no_idont_need@yourreply.com')    // Optional, an account where a human being reads.
			->to($mailuser)
			->subject($subject)
			->message($body)
			->send();

		var_dump($result);
		echo '<br />';
		echo $this->email->print_debugger();

		exit;
	}
	
	function slowspeed1()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$rectime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(1);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $rectime){
				exit;
			}
		}
		$ss = $nowdate - $rectime;
		if ($ss > 288){
			$this->load->library('email');
			
			$receiver = $this->iot_mailer_model->getreceiver(1);
			if(!empty($receiver)){
				$rec = '';
				foreach($receiver as $record){
					$rec .= $record->email.', ';
				}
			}else{
				exit;
			}
			$mailuser = substr($rec, 0, -2);
			
			$checker = ($rectime) % 86400;
			if($checker < 3600){
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600 - 86400;
				$end_data_unix = $sta_data_unix + 86400;
			}else{
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600;
				$end_data_unix = $sta_data_unix + 86400;
			}
			$sta = date('Y-m-d H:i:s', $sta_data_unix);
			$end = date('Y-m-d H:i:s', $end_data_unix);
			
			$totaldtime = $this->iot_mailer_model->slowspeedCount($sta, $end);
			$dtimemin = $this->iot_mailer_model->slowspeed($sta, $end);
			$dotime = ($dtimemin->sum - ($totaldtime*288) + 288)/60;
			
			$subject = 'Slowspeed!';
			$message = '<br><p>Last data:'.number_format($dotime, 2, '.', '').' mins</p><br>';
			$body = '
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
						<style type="text/css">
						table {
							border-collapse: collapse;
						}
						table, th, td {
							border: 1px solid black;
						}
						body {
							font-family: Arial, Verdana, Helvetica, sans-serif;
							font-size: 16px;
						}
						</style>
					</head>
					<body>
						' . $message . '<br>
						
					</body>
					
				</html>';
			$body = $this->email->full_html($subject, $message);
			
			$result = $this->email
				->from('AutomatedRAWR@IoTV0.3')
				->reply_to('no_idont_need@yourreply.com')    // Optional, an account where a human being reads.
				->to($mailuser)
				->subject($subject)
				->message($body)
				->send();
			$topic = array('topic'=>1);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();

			exit;
		}else{
			exit;
		}
	}
	
	function slowspeed2()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$rectime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(2);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $rectime){
				exit;
			}
		}
		
		$ss = $nowdate - $rectime;
		if ($ss > 342){
			$this->load->library('email');
			
			$receiver = $this->iot_mailer_model->getreceiver(2);
			if(!empty($receiver)){
				$rec = '';
				foreach($receiver as $record){
					$rec .= $record->email.', ';
				}
			}else{
				exit;
			}
			$mailuser = substr($rec, 0, -2);
			
			$checker = ($rectime) % 86400;
			if($checker < 3600){
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600 - 86400;
				$end_data_unix = $sta_data_unix + 86400;
			}else{
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600;
				$end_data_unix = $sta_data_unix + 86400;
			}
			$sta = date('Y-m-d H:i:s', $sta_data_unix);
			$end = date('Y-m-d H:i:s', $end_data_unix);
			
			$totaldtime = $this->iot_mailer_model->slowspeedCount($sta, $end);
			$dtimemin = $this->iot_mailer_model->slowspeed($sta, $end);
			$dotime = ($dtimemin->sum - ($totaldtime*288) + 288)/60;
			
			$subject = 'Slowspeed!';
			$message = '<br><p>Last Data:'.number_format($dotime, 2, '.', '').' mins</p><br>';
			$body = '
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
						<style type="text/css">
						table {
							border-collapse: collapse;
						}
						table, th, td {
							border: 1px solid black;
						}
						body {
							font-family: Arial, Verdana, Helvetica, sans-serif;
							font-size: 16px;
						}
						</style>
					</head>
					<body>
						' . $message . '<br>
						
					</body>
					
				</html>';
			$body = $this->email->full_html($subject, $message);
			
			$result = $this->email
				->from('AutomatedRAWR@IoTV0.3')
				->reply_to('no_idont_need@yourreply.com')    // Optional, an account where a human being reads.
				->to($mailuser)
				->subject($subject)
				->message($body)
				->send();

			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();
			$topic = array('topic'=>2);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function downtime()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(3);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $dtime){
				exit;
			}
		}
		
		$downtime = $nowdate - $dtime;
		if ($downtime > 576){
			$this->load->library('email');
			
			$receiver = $this->iot_mailer_model->getreceiver(3);
			if(!empty($receiver)){
				$rec = '';
				foreach($receiver as $record){
					$rec .= $record->email.', ';
				}
			}else{
				exit;
			}
			$mailuser = substr($rec, 0, -2);
			
			$checker = ($dtime) % 86400;
			if($checker < 3600){
				$sta_data_unix = $dtime - ($dtime % 86400) + 3600 - 86400;
				$end_data_unix = $sta_data_unix + 86400;
			}else{
				$sta_data_unix = $dtime - ($dtime % 86400) + 3600;
				$end_data_unix = $sta_data_unix + 86400;
			}
			$sta = date('Y-m-d H:i:s', $sta_data_unix);
			$end = date('Y-m-d H:i:s', $end_data_unix);
			
			$totaldtime = $this->iot_mailer_model->dtimeCount($sta, $end);
			$dtimemin = $this->iot_mailer_model->dtime($sta, $end);
			$dotime = ($dtimemin->sum - ($totaldtime*288) + 288)/60;
			
			$subject = 'Downtime!';
			$message = '<br><p>Last data:'.number_format($dotime, 2, '.', '').' mins</p><br>';
			$body = '
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
						<style type="text/css">
						table {
							border-collapse: collapse;
						}
						table, th, td {
							border: 1px solid black;
						}
						body {
							font-family: Arial, Verdana, Helvetica, sans-serif;
							font-size: 16px;
						}
						</style>
					</head>
					<body>
						' . $message . '<br>
						
					</body>
					
				</html>';
			$body = $this->email->full_html($subject, $message);
			
			$result = $this->email
				->from('AutomatedRAWR@IoTV0.3')
				->reply_to('no_idont_need@yourreply.com')    // Optional, an account where a human being reads.
				->to($mailuser)
				->subject($subject)
				->message($body)
				->send();
			$topic = array('topic'=>3);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();

			exit;
		}else{
			exit;
		}
	}
	
	function slowspeedline1()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$rectime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(1);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $rectime){
				exit;
			}
		}
		$ss = $nowdate - $rectime;
		if ($ss > 288){
			
			$receiver = $this->iot_mailer_model->getreceiver(1);
			
			$checker = ($rectime) % 86400;
			if($checker < 3600){
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600 - 86400;
				$end_data_unix = $sta_data_unix + 86400;
			}else{
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600;
				$end_data_unix = $sta_data_unix + 86400;
			}
			$sta = date('Y-m-d H:i:s', $sta_data_unix);
			$end = date('Y-m-d H:i:s', $end_data_unix);
			
			$totaldtime = $this->iot_mailer_model->slowspeedCount($sta, $end);
			$dtimemin = $this->iot_mailer_model->slowspeed($sta, $end);
			if($totaldtime == 0){
				$xxx = 0;
			}else{
				$xxx = 288;
			}
			$dotime = ($dtimemin->sum - ($totaldtime*288) + $xxx)/60;
			
			$message = 'Slowspeed! Last data:'.number_format($dotime, 2, '.', '').' mins';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>1);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
			
	}
	
	function slowspeedline2()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$rectime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(2);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $rectime){
				exit;
			}
		}
		
		$ss = $nowdate - $rectime;
		if ($ss > 342){
			$this->load->library('email');
			
			$receiver = $this->iot_mailer_model->getreceiver(2);
			
			$checker = ($rectime) % 86400;
			if($checker < 3600){
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600 - 86400;
				$end_data_unix = $sta_data_unix + 86400;
			}else{
				$sta_data_unix = $rectime - ($rectime % 86400) + 3600;
				$end_data_unix = $sta_data_unix + 86400;
			}
			$sta = date('Y-m-d H:i:s', $sta_data_unix);
			$end = date('Y-m-d H:i:s', $end_data_unix);
			
			$totaldtime = $this->iot_mailer_model->slowspeedCount($sta, $end);
			$dtimemin = $this->iot_mailer_model->slowspeed($sta, $end);
			if($totaldtime == 0){
				$xxx = 0;
			}else{
				$xxx = 288;
			}
			$dotime = ($dtimemin->sum - ($totaldtime*288) + $xxx)/60;
			
			$message = 'Slowspeed! Last Data:'.number_format($dotime, 2, '.', '').' mins';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>2);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	function downtimeline()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(3);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $dtime){
				exit;
			}
		}
		
		$downtime = $nowdate - $dtime;
		if ($downtime > 576){
			
			$receiver = $this->iot_mailer_model->getreceiver(3);
			
			$mailuser = substr($rec, 0, -2);
			
			$checker = ($dtime) % 86400;
			if($checker < 3600){
				$sta_data_unix = $dtime - ($dtime % 86400) + 3600 - 86400;
				$end_data_unix = $sta_data_unix + 86400;
			}else{
				$sta_data_unix = $dtime - ($dtime % 86400) + 3600;
				$end_data_unix = $sta_data_unix + 86400;
			}
			$sta = date('Y-m-d H:i:s', $sta_data_unix);
			$end = date('Y-m-d H:i:s', $end_data_unix);
			$endx = date('U', $end_data_unix);
			$end_unix = $end % 86400;
			
			$totaldtime = $this->iot_mailer_model->dtimeCount($sta, $end);
			$dtimemin = $this->iot_mailer_model->dtime($sta, $end);
			if($totaldtime == 0){
				$xxx = 0;
			}else{
				$xxx = 288;
			}
			$dotime = ($dtimemin->sum - ($totaldtime*288) + $xxx)/60;
			if($end_unix > 36000 and $endx < 43200 and $dotime > 120){
				$additional = 'may include plan stop';
			}else{
				$additional = '';
			}
			$message = 'Downtime! Total today:'.number_format($dotime, 2, '.', '').' mins, '.$additional;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>3);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	function downtimelinex2()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$dtime = $dtime + 900;
		$mailcek = $this->iot_mailer_model->mailcek(30001);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $dtime){
				exit;
			}
		}
		$downtime = $nowdate - $dtime;
		if ($downtime > 900){
			$receiver = $this->iot_mailer_model->getreceiver(3);
			$message = 'Well... i hv no feature to identify Downtime/Plan stop, just want to tell you that the current cyctletime already reach 15mins';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>30001);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	function downtimelinex3()
	{
		$checker = $this->iot_mailer_model->newcake();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$dtime = $dtime + 1800;
		$mailcek = $this->iot_mailer_model->mailcek(30002);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $dtime){
				exit;
			}
		}
		$downtime = $nowdate - $dtime;
		if ($downtime > 1800){
			$receiver = $this->iot_mailer_model->getreceiver(3);
			$message = 'Nah... just want to tell you again that the current cyctletime already reach 30mins';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>30002);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function bed650()
	{
		$checker = $this->iot_mailer_model->boiler_cek();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$cektime = $dtime + 600;
		$mailcek = $this->iot_mailer_model->mailcek(4);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $cektime){
				exit;
			}
		}
		
		if (($checker->bt2 < 650 AND $checker->bt2 > 600) OR ($checker->bt2 < 650 AND $checker->bt2 > 600)){
			
			$receiver = $this->iot_mailer_model->getreceiver(4);
			
			$message = 'Bed Temp Lower than 650 C! Bed 1 = '.number_format($checker->bt1, 1, '.', '').' °C and Bed 2 = '.number_format($checker->bt2, 1, '.', '').' °C';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>4);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function bed600()
	{
		$checker = $this->iot_mailer_model->boiler_cek();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$cektime = $dtime + 600;
		$mailcek = $this->iot_mailer_model->mailcek(5);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $cektime){
				exit;
			}
		}
		
		if (($checker->bt2 < 600 AND $checker->bt2 > 550) OR ($checker->bt2 < 600 AND $checker->bt2 > 550)){
			
			$receiver = $this->iot_mailer_model->getreceiver(5);
			
			$message = 'Bed Temp Lower than 600 C! Bed 1 = '.number_format($checker->bt1, 1, '.', '').' °C and Bed 2 = '.number_format($checker->bt2, 1, '.', '').' °C';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>5);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function bed550()
	{
		$checker = $this->iot_mailer_model->boiler_cek();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$cektime = $dtime + 600;
		$mailcek = $this->iot_mailer_model->mailcek(6);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $cektime){
				exit;
			}
		}
		
		if (($checker->bt2 < 550 AND $checker->bt2 > 500) OR ($checker->bt2 < 550 AND $checker->bt2 > 500)){
			
			$receiver = $this->iot_mailer_model->getreceiver(6);
			
			$message = 'Bed Temp Lower than 550 C! Bed 1 = '.number_format($checker->bt1, 1, '.', '').' °C and Bed 2 = '.number_format($checker->bt2, 1, '.', '').' °C';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>6);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function bed500()
	{
		$checker = $this->iot_mailer_model->boiler_cek();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$cektime = $dtime + 600;
		$mailcek = $this->iot_mailer_model->mailcek(7);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $cektime){
				exit;
			}
		}
		
		if ($checker->bt2 < 500 OR $checker->bt2 < 500){
			
			$receiver = $this->iot_mailer_model->getreceiver(7);
			
			$message = 'Bed Temp Lower than 500 C! Bed 1 = '.number_format($checker->bt1, 1, '.', '').' °C and Bed 2 = '.number_format($checker->bt2, 1, '.', '').' °C';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>7);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function drumlvl()
	{
		$checker = $this->iot_mailer_model->boiler_cek();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$cektime = $dtime + 600;
		$mailcek = $this->iot_mailer_model->mailcek(8);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $cektime){
				exit;
			}
		}
		
		if ($checker->bwl < 50){
			
			$receiver = $this->iot_mailer_model->getreceiver(8);
			
			$message = 'Boiler Drum Level < 50%! Level = '.number_format($checker->bwl, 1, '.', '').' % ';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>8);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function dealvl()
	{
		$checker = $this->iot_mailer_model->boiler_cek();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$cektime = $dtime + 600;
		$mailcek = $this->iot_mailer_model->mailcek(9);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $cektime){
				exit;
			}
		}
		
		if ($checker->fwt < 35){
			
			$receiver = $this->iot_mailer_model->getreceiver(9);
			
			$message = 'Deaerator Level < 35%! Level = '.number_format($checker->fwt, 1, '.', '').' % ';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>9);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	function log210()
	{
		$checker = $this->iot_mailer_model->cek210();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(10);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $dtime){
				exit;
			}
		}
		
		$downtime = $nowdate - $dtime;
		if ($downtime > 1200){
			
			$receiver = $this->iot_mailer_model->getreceiver(10);
			
			$message = 'Logger 192.168.100.210 Server Down! Last Data:'.$checker->timestamp;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>10);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	function log220()
	{
		$checker = $this->iot_mailer_model->cek220();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(11);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $dtime){
				exit;
			}
		}
		
		$downtime = $nowdate - $dtime;
		if ($downtime > 1200){
			
			$receiver = $this->iot_mailer_model->getreceiver(11);
			
			$message = 'Logger 192.168.100.220 Server Down! Last Data:'.$checker->timestamp;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>11);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	function log203()
	{
		$checker = $this->iot_mailer_model->cek203();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		
		$mailcek = $this->iot_mailer_model->mailcek(12);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $dtime){
				exit;
			}
		}
		
		$downtime = $nowdate - $dtime;
		if ($downtime > 1200){
			
			$receiver = $this->iot_mailer_model->getreceiver(12);
			
			$message = 'Logger 192.168.100.203 Server Down! Last Data:'.$checker->timestamp;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>12);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	function boilerp()
	{
		$checker = $this->iot_mailer_model->boiler_cek();
		$nowdate = date('U');
		$dtime = date('U', strtotime($checker->timestamp));
		$cektime = $dtime + 600;
		$mailcek = $this->iot_mailer_model->mailcek(14);
		if(!empty($mailcek)){
			$mailtime = date('U', strtotime($mailcek->timestamp));
			if($mailtime > $cektime){
				exit;
			}
		}
		
		if ($checker->bp < 11){
			
			$receiver = $this->iot_mailer_model->getreceiver(14);
			
			$message = 'Low Boiler Pressure! '.number_format($checker->bp, 2, '.', '').' barG ';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>14);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
	}
	
	public function cycletime()
    {
		$receiver = $this->iot_mailer_model->getreceiver(15);
		if(!empty($receiver)){
			$this->load->model('iot_user_model');
			$lastdata= $this->iot_user_model->newcake();
			$lastdatatime = date('U', strtotime($lastdata->timestamp)); 
			$checker = ($lastdatatime) % 86400;
			if($checker < 7200){
				$sta_data_unix = $lastdatatime - ($lastdatatime % 86400) + 7200 - 86400;
				$end_data_unix = $sta_data_unix + 86400;
			}else{
				$sta_data_unix = $lastdatatime - ($lastdatatime % 86400) + 7200;
				$end_data_unix = $sta_data_unix + 86400;
			}
			$sta = date('Y-m-d H:i:s', $sta_data_unix);
			$end = date('Y-m-d H:i:s', $end_data_unix);
			
			$moldtoday= $this->iot_user_model->moldtoday($sta, $end);
			$mixing= $this->iot_user_model->mixing($sta, $end);
			
			$planstop = $this->iot_user_model->totalstop($sta, $end);
			
			
			$totalslow = $this->iot_user_model->slowspeedCount($sta, $end);
			$slowmin = $this->iot_user_model->slowspeed($sta, $end);
			$slowspeed = ($slowmin->sum - ($totalslow*288))/60;
			
			$totaldtime = $this->iot_user_model->dtimeCount($sta, $end);
			$dtimemin = $this->iot_user_model->dtime($sta, $end);
			if($totaldtime == 0){
				$xxx = 0;
			}else{
				$xxx = 288;
			}
			$dtime = ($dtimemin->sum - ($totaldtime*288)+ $xxx)/60;
			
			$firstdata = $this->iot_user_model->firstmold($sta, $end);
			$unixx = ($firstdata->sumdata)/60;
			$unixxx = ($unixx - $dtime - ($planstop/60))/60;
			$rate = $moldtoday /$unixxx;
			$duran = $unixxx;
			
			
			$message = 'Production Report, '.$sta.' to '.$end.'
Rate: '.number_format($rate, 2, '.', '').' mold/hour
Duration: '.number_format($duran, 2, '.', '').' hours
Mixing: '.$mixing.' mold
Cutting: '.$moldtoday.' mold
Slowspeed: '.number_format($slowspeed, 2, '.', '').' mins
Downtime: '.number_format($dtime, 2, '.', '').' mins
Planed stop: '.number_format($planstop/60, 2, '.', '').' mins

Note: Downtime may mixed with planed stop since it submitted by human';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>15);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
			
		}else{
			exit;
		}
        
    }
	
	
	public function cekmem()
    {
		$cekmem = $this->iot_mailer_model->cekmem();
		if($cekmem->mem > 70){
			$receiver = $this->iot_mailer_model->getreceiver(19);
			if(!empty($receiver)){
				$message = 'Iot Server almost down!, RAM: '.$cekmem->mem.'% and CPU: '.$cekmem->cpu.'%';
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				if(!empty($receiver)){
					foreach($receiver as $record){
						$user_id    = $record->line;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}else{
					exit;
				}
				$topic = array('topic'=>19);
				$mailcount = $this->iot_mailer_model->addmailcount($topic);
				exit;
				
			}else{
				exit;
			}
        }else{
			exit;
		}
    }
	public function grate()
    {
		$c1 = $this->iot_mailer_model->pusher_in();
		$c2 = $this->iot_mailer_model->pusher_out();
		$c3 = $this->iot_mailer_model->loading();
		$c4 = $this->iot_mailer_model->unloading();
		$unloading_1 = 0;
		$loading_1 = 0;
		$pusher_in_1 = 0;
		$pusher_out_1 = 0;
		if(!empty($c1)){
			foreach($c1 as $result){
			//echo $result['payload'].'<br>';
			if($result['payload'] > 10){$pusher_in_1 = 1;}
			}
		}
		if(!empty($c2)){
			foreach($c2 as $result){
			//echo $result['payload'].'<br>';
			if($result['payload'] > 10){$pusher_out_1 = 1;}
			}
		}
		if(!empty($c3)){
			foreach($c3 as $result){
			//echo $result['payload'].'<br>';
			if($result['payload'] > 10){$loading_1 = 1;}
			}
		}
		if(!empty($c4)){
			foreach($c4 as $result){
			//echo $result['payload'].'<br>';
			if($result['payload'] > 10){$unloading_1 = 1;}
			}
		}
		if($pusher_in_1 != 1 or $pusher_out_1 != 1 or $loading_1 != 1  or $unloading_1 != 1){
			$receiver = $this->iot_mailer_model->getreceiver(20);
			if(!empty($receiver)){
				$message = '';
				if($pusher_in_1 == 1){
					$message .= 'Grate berat diposisi Pusher In';
				}
				if($pusher_out_1 == 1){
					$message .= 'Grate berat diposisi Pusher Out';
				}
				if($loading_1 == 1){
					$message .= 'Grate berat diposisi Unloading';
				}
				if($unloading_1 == 1){
					$message .= 'Grate berat diposisi Loading';
				}
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				if(!empty($receiver)){
					foreach($receiver as $record){
						$user_id    = $record->line;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}else{
					exit;
				}
				$topic = array('topic'=>20);
				$mailcount = $this->iot_mailer_model->addmailcount($topic);
				exit;
				
			}else{
				exit;
			}
        }else{
			exit;
		}
    }
	public function mtnjob()
    {
		$receiver = $this->iot_mailer_model->getreceiver(21);
		if(!empty($receiver)){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 25200;
			$message = "Maintenance job today's Link: http://codesys.slci.co.id/mechdata/schmonall/".$unix;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>21);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
    }
	public function mtnjob2fx()
    {
		$receiver = $this->iot_mailer_model->getcdprj();
		if(!empty($receiver)){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 111600;
			$message = "Maintenance job tomorrow's Link: http://codesys.slci.co.id/mechdata/schmonall/".$unix;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			exit;
		}else{
			exit;
		}
    }
	public function pmjob2fx()
    {
		$receiver = $this->iot_mailer_model->getcdprj();
		if(!empty($receiver)){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 111600;
			$message = "PM job today's Link: http://codesys.slci.co.id/mechdata/pmview/".$unix;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			exit;
		}else{
			exit;
		}
    }
	public function pmjob()
    {
		$receiver = $this->iot_mailer_model->getreceiver(22);
		if(!empty($receiver)){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 25200;
			$message = "PM job today's Link: http://codesys.slci.co.id/mechdata/pmview/".$unix;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>22);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
    }
	public function pmjob2()
    {
		$receiver = $this->iot_mailer_model->getreceiver(23);
		if(!empty($receiver)){
			$unix = date('d-m-Y');
			$unix = date('U', strtotime($unix));
			$unix = $unix + 25200 + 86400;
			$message = "PM job today's Link: http://codesys.slci.co.id/mechdata/pmview/".$unix;
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>23);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
			exit;
		}else{
			exit;
		}
    }
	
	function downtimelinex()
	{
			$receiver = $this->iot_mailer_model->getreceiver(3);
			$message = 'test!';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			
	}
	
	public function pingline()
    {
        $user_id    = $this->input->post('userid');
        $message    = 'PING!';
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
        $response           = $bot->pushMessage($user_id, $textMessageBuilder);
		redirect('loadChangePass');
    }
	
	public function hook()
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
		
    }
	
	
}

?>
