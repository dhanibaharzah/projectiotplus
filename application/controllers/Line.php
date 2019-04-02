<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Line extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_cutting_model');
	}
	function send_planstop(){
		$param = $this->iot_cutting_model->load_iot_setting('downtime');
		$check = $this->iot_cutting_model->iot_ask_planstop($param);
		$message = '';
		if(!empty($check)){
			foreach($check as $rec){
				$message .=	'Cycletime > '.number_format($param/60, 1, '.', '').' mins';$message .=	'
';				$message .=	'Jam: '.$rec->timestamp; $message .= '
';				$message .= 'CT: ';
				if($rec->mixing_ct_tilting < 3600){
					$message .= number_format($rec->mixing_ct_tilting/60, 1, '.', '').' mins';
				}
				if($rec->mixing_ct_tilting >= 3600 and $rec->mixing_ct_tilting < 86400){
					$message .= number_format($rec->mixing_ct_tilting/3600, 1, '.', '').' hours';
				}
				if($rec->mixing_ct_tilting > 86400){
					$message .= number_format($rec->mixing_ct_tilting/86400, 1, '.', '').' days';
				}
				$message .=	'
';				$message .= 'Planstop: ps '.$rec->id;$message .= '
';				$message .= 'Downtime: dt '.$rec->id.' Downtime Desc';$message .= '
';
			}
			$foreman = $this->iot_cutting_model->get_all_foreman();
			if(!empty($foreman)){
				foreach($foreman as $record){
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $record->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
			//tambahan NAIM
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
			$user_id    = 'U2a4978a576923daa09cd63c256d0179e';
			$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$response           = $bot->pushMessage($user_id, $textMessageBuilder);
		}
	}
}
?>