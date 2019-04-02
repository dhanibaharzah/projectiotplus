<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Approval extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('joblist_model');
    }
	function schview($id){
		$data['project_doc'] = $this->joblist_model->getprojectdocbyid($id);
		$start = date('U', strtotime($data['project_doc']->docno)) + 25200;
		$end = $start + 86399;
		$events = $this->joblist_model->getprojecttic($data['project_doc']->owner, $start, $end);
		$data['joblist'] = $events->result();
		$this->load->view('joblist/schview', $data);
	}
	function schviewpart($id){
		$part = $this->joblist_model->getpartlist($id);
		$tabel = '';
		if(!empty($part)){
			foreach($part as $record){
				$tabel .= $record->tool.' / Q:'.$record->quan.'<br>';
			}
		}
		echo $tabel;
	}
	function schviewtool($id){
		$part = $this->joblist_model->gettoollist($id);
		$tabel = '';
		if(!empty($part)){
			foreach($part as $record){
				$tabel .= $record->tool.' / '.$record->size.' / Q:'.$record->quan.'<br>';
			}
		}
		echo $tabel;
	}
	function schviewform($id){
		$form = $this->joblist_model->getformlist($id);
		$tabel = '';
		if(!empty($form)){
			foreach($form as $record){
				$tabel .= $record->code.' - '.$record->eq_name.'<br>';
			}
		}
		echo $tabel;
	}
	function schviewuser($id){
		$part = $this->joblist_model->getuserlist($id);
		$tabel = '';
		if(!empty($part)){
			foreach($part as $record){
				$tabel .= $record->user.'<br>';
			}
		}
		echo $tabel;
	}
	function linechecker(){
		$checking1 = $this->joblist_model->schcheck();
		if(!empty($checking1)){
			foreach($checking1 as $record){
				$message =	'Project/Costum Job Approval';$message .=	'
';
				$message .=	'User: '.$record->owner;$message .=	'
';
				$message .=	'Doc no: '.$record->docno;$message .='
';
				$message .= 'Check link: '.base_url().'schapp/'.$record->id;
				if($record->app3 == ''){
					$receiver = $this->joblist_model->getchecker(3);
				}
				if($record->app2 == ''){
					$receiver = $this->joblist_model->getchecker(2);
				}
				if($record->app1 == ''){
					$receiver = $this->joblist_model->getchecker(1);
				}
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				if(!empty($receiver)){
					foreach($receiver as $rec){
						$user_id    = $rec->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
			}
		}
		//echo var_dump($checking1);
		exit;
	}
	function linechecker_notif(){
		$checking1 = $this->joblist_model->schcheck_notif();
		if(!empty($checking1)){
			foreach($checking1 as $record){
				$message =	'Project/Costum Job Approval';$message .=	'
';
				$message .=	'User: '.$record->owner;$message .=	'
';
				$message .=	'Doc no: '.$record->docno;$message .='
';
				$message .= 'Check link: '.base_url().'schapp/'.$record->id;
				if($record->app3 == ''){
					$receiver = $this->joblist_model->getchecker(3);
				}
				if($record->app2 == ''){
					$receiver = $this->joblist_model->getchecker(2);
				}
				if($record->app1 == ''){
					$receiver = $this->joblist_model->getchecker(1);
				}
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				if(!empty($receiver)){
					foreach($receiver as $r){
						$user_id    = $r->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				$this->joblist_model->projectdoc_notif0($record->id);
			}
		}
		exit;
	}
	function schapp($id){
		$job = $this->joblist_model->getprojectdocbyid($id);
		if(!empty($job)){
			$data['project_doc'] = $job;
			$start = date('U', strtotime($data['project_doc']->docno)) + 25200;
			$end = $start + 86399;
			$events = $this->joblist_model->getprojecttic($data['project_doc']->owner, $start, $end);
			$data['joblist'] = $events->result();
			$this->load->view('joblist/schapp', $data);
		}else{
			$data['note'] = 'Document has been "Canceled/Rejected"';
			$this->load->view('joblist/checked', $data);
		}
	}
	function schaction($id, $code){
		$data['id'] = $id;
		$data['code'] = $code;
		$this->load->view('joblist/schaction', $data);
	}
	function check_session(){
		$time = date('U');
		$note = $this->input->post('note');
		$code = $this->input->post('code');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		$a = 0;
		if(!empty($result)){
			$ticket = $this->joblist_model->getprojectdocbyid($id);
			$userinfo = $this->joblist_model->getuserinfo($username);
			$owner = $this->joblist_model->getuserinfo($ticket->owner);
			if($userinfo->cd_role1 == 0 and $userinfo->cd_role2 == 0 and $userinfo->cd_role3 == 0){
				$data['note'] = 'Your account has no right to process';
				$this->load->view('joblist/checked', $data);
			}
			if(empty($ticket)){
				$data['note'] = 'This document has been canceled';
				$this->load->view('joblist/checked', $data);
			}
			if(empty($ticket->app1) and empty($ticket->app2) and empty($ticket->app3)){
				if($userinfo->cd_role1 == 0){
					$data['note'] = 'You are not Checker I';
					$this->load->view('joblist/checked', $data);
				}
				if($userinfo->cd_role1 == 1 and $code == 1){
					$ddc = array(
						'notif'=>1,
						'app1'=>$userinfo->uName,
						'note1'=>$note,
						'unix1'=>$time
						);
					$update_ticket = $this->joblist_model->projectdoc_up($ddc, $id, 1);
					$data['note'] = 'Document has been marked as "Checked I"';
					$info = 'Project Schedule at '.$ticket->docno.' has been marked as "Checked I" <a href="'.base_url().'schapp/'.$id.'" class="btn btn-sm btn-info" target="_blank">Checker-II</a>';
					$note = array(
						'code'=>201,
						'target'=>1,
						'user'=>$ticket->owner,
						'info'=>$info
					);
					$addnotif = $this->joblist_model->addcostumnotif($note);
					$this->load->view('joblist/checked', $data);
					$a = 1;
				}
				if($userinfo->cd_role1 == 1 and $code == 2){
					$ddc = array(
						'reject'=>1,
						'isvalid'=>0,
						'app1'=>'',
						'note1'=>$note,
						'unix1'=>''
						);
					$update_ticket = $this->joblist_model->projectdoc_up($ddc, $id, 1);
					$notif = array(
						'title'=>'Project Rejected by Checker I',
						'ticket_id'=>$id,
						'lineid'=>$owner->lineid
						);
					$create_notif = $this->joblist_model->create_notif($notif);
					$data['note'] = 'Document has been rejected "Checked I"';
					$info = 'Project Schedule at '.$ticket->docno.' has been rejected by "Checked I"';
					$note = array(
						'code'=>202,
						'target'=>1,
						'user'=>$ticket->owner,
						'info'=>$info
					);
					$addnotif = $this->joblist_model->addcostumnotif($note);
					$this->load->view('joblist/checked', $data);
					$a = 1;
				}
			}
			elseif(!empty($ticket->app1) and empty($ticket->app2) and empty($ticket->app3)){
				if($userinfo->cd_role2 == 0){
					$data['note'] = 'You are not Checker II';
					$this->load->view('joblist/checked', $data);
				}
				if($userinfo->cd_role2 == 1 and $code == 1 and $a != 1){
					$ddc = array(
						'notif'=>1,
						'app2'=>$userinfo->uName,
						'note2'=>$note,
						'unix2'=>$time
						);
					$update_ticket = $this->joblist_model->projectdoc_up($ddc, $id, 2);
					$data['note'] = 'Document has been marked as "Checked II"';
					$info = 'Project Schedule at '.$ticket->docno.' has been marked as "Checked II" <a href="'.base_url().'schapp/'.$id.'" class="btn btn-sm btn-warning" target="_blank">Checker-III</a>';
					$note = array(
						'code'=>203,
						'target'=>1,
						'user'=>$ticket->owner,
						'info'=>$info
					);
					$addnotif = $this->joblist_model->addcostumnotif($note);
					$this->load->view('joblist/checked', $data);
					$a = 2;
				}
				if($userinfo->cd_role2 == 1 and $code == 2 and $a != 1){
					$ddc = array(
						'reject'=>1,
						'isvalid'=>0,
						'app1'=>'',
						'app2'=>'',
						'note2'=>$note,
						'unix1'=>'',
						'unix2'=>''
						);
					$update_ticket = $this->joblist_model->projectdoc_up($ddc, $id, 2);
					$notif = array(
						'title'=>'Project Rejected by Checker II',
						'ticket_id'=>$id,
						'lineid'=>$owner->lineid
						);
					$create_notif = $this->joblist_model->create_notif($notif);
					$data['note'] = 'Document has been rejected "Checked II"';
					$info = 'Project Schedule at '.$ticket->docno.' has been rejected by "Checked II"';
					$note = array(
						'code'=>204,
						'target'=>1,
						'user'=>$ticket->owner,
						'info'=>$info
					);
					$addnotif = $this->joblist_model->addcostumnotif($note);
					$this->load->view('joblist/checked', $data);
					$a = 2;
				}
			}
			elseif(!empty($ticket->app1) and !empty($ticket->app2) and empty($ticket->app3)){
				if($userinfo->cd_role3 == 0){
					$data['note'] = 'You are not Checker III';
					$this->load->view('joblist/checked', $data);
				}
				if($userinfo->cd_role3 == 1 and $code == 1 and $a != 2 and $a != 1){
					$ddc = array(
						'notif'=>1,
						'app3'=>$userinfo->uName,
						'note3'=>$note,
						'unix3'=>$time
						);
					$update_ticket = $this->joblist_model->projectdoc_up($ddc, $id, 3);
					$notif = array(
						'title'=>'Project Approved',
						'ticket_id'=>$id,
						'lineid'=>$owner->lineid
						);
					$create_notif = $this->joblist_model->create_notif($notif);
					$start = date('U', strtotime($ticket->docno)) + 25200;
					$end = $start + 86399;
					$events = $this->joblist_model->getprojecttic($ticket->owner, $start, $end);
					$joblist = $events->result();
					if(!empty($joblist)){
						foreach($joblist as $record){
							$doc = array(
								'app'=>1
							);
							$this->joblist_model->delticket($doc, $record->id);
						}
					}
					$data['note'] = 'Document has been marked as "Checked III"';
					$info = 'Project Schedule at '.$ticket->docno.' has been approved';
					$note = array(
						'code'=>203,
						'target'=>1,
						'user'=>$ticket->owner,
						'info'=>$info
					);
					$addnotif = $this->joblist_model->addcostumnotif($note);
					$this->load->view('joblist/checked', $data);
					$a = 3;
				}
				if($userinfo->cd_role3 == 1 and $code == 2 and $a != 2 and $a != 1){
					$ddc = array(
						'reject'=>1,
						'isvalid'=>0,
						'app1'=>'',
						'app2'=>'',
						'app3'=>'',
						'note3'=>$note,
						'unix1'=>'',
						'unix2'=>'',
						'unix3'=>''
						);
					$update_ticket = $this->joblist_model->projectdoc_up($ddc, $id, 3);
					$notif = array(
						'title'=>'Project Rejected by Checker III',
						'ticket_id'=>$id,
						'lineid'=>$owner->lineid
						);
					$create_notif = $this->joblist_model->create_notif($notif);
					$data['note'] = 'Document has been rejected "Checked III"';
					$info = 'Project Schedule at '.$ticket->docno.' has been rejected by "Checked III"';
					$note = array(
						'code'=>206,
						'target'=>1,
						'user'=>$ticket->owner,
						'info'=>$info
					);
					$addnotif = $this->joblist_model->addcostumnotif($note);
					$this->load->view('joblist/checked', $data);
					$a = 3;
				}
			}else{
				$data['note'] = 'This document has been Approved or there are something wrong, please contact database user for details.';
				$this->load->view('joblist/checked', $data);
			}
		}
	}
	function send_notif(){
		$checking1 = $this->joblist_model->getallnotif();
		if(!empty($checking1)){
			foreach($checking1 as $record){
				$message =	'Notification';$message .=	'
';
				$message .=	$record->title;$message .=	'
';
				$message .= base_url();
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						$user_id    = $record->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				
				$this->joblist_model->doc_notif0($record->id);
			}
		}
		exit;
	}
	function schmon($id){
		$job = $this->joblist_model->getprojectdocbyid($id);
		if(!empty($job)){
			$data['project_doc'] = $job;
			$start = date('U', strtotime($data['project_doc']->docno)) + 25200;
			$end = $start + 86399;
			$events = $this->joblist_model->getprojecttic($data['project_doc']->owner, $start, $end);
			$data['joblist'] = $events->result();
			$this->load->view('joblist/schmon', $data);
		}else{
			$data['note'] = 'Document has been "Canceled/Rejected"';
			$this->load->view('joblist/checked', $data);
		}
	}
	function report($id){
		$this->load->helper(array('form', 'url'));
		$data['id'] = $id;
		$data['error'] = '';
		$this->load->view('joblist/report', $data);
	}
	function report_session(){
		$report = $this->input->post('report');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		
		$config['upload_path']          = './assets/report';
		$config['allowed_types']        = 'jpg|JPG|png|PNG|jpeg|JPEG';
		$config['max_size']             = 4048;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
		$new_name = 'R_PRJ_'.$username.'_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 
		if(!empty($result)){
			if(!$this->upload->do_upload('berkas')){$new_name = ''; $note .= $this->upload->display_errors();};
			$checker = $this->joblist_model->getuserinfo($username);
			$new_name = $this->upload->data('file_name');
			$reportInfo = array(
				'report'=>$report,
				'user'=>$checker->uName,
				'ticket_id'=>$id,
				'img_url'=>$new_name
				);
			$add_report = $this->joblist_model->add_report($reportInfo);
			$data['note'] = $this->upload->display_errors();
			$data['note'] .= '<p>Your Report has been Submitted</a>';
			$this->load->view('joblist/checked', $data);
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function schviewall($unix){
		$start = $unix;
		$data['start'] = $start;
		$end = $start + 86399;
		$events = $this->joblist_model->gettabelall($start, $end);
		$data['joblist'] = $events->result();
		$this->load->view('joblist/schviewall', $data);
	}
	function maintenancejob_tom(){
		$unixdate = gmdate('U');
		$unixdate = $unixdate - ($unixdate % 86400) + 86400;
		$checking1 = $this->joblist_model->getusers();
		if(!empty($checking1)){
			foreach($checking1 as $record){
				if(!empty($record->lineid)){
					$message =	'Maintenance Job sesuk, ';$message .=	'
';
					$message .= 'Project: '.base_url().'schmonall/'.$unixdate;$message .=	'
';
					$message .= 'PM: '.base_url().'pmview/'.$unixdate;
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $record->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
		}
		//echo var_dump($checking1);
		exit;
	}
	function maintenancejob_tod(){
		$unixdate = gmdate('U');
		$unixdate = $unixdate - ($unixdate % 86400);
		$checking1 = $this->joblist_model->getusers();
		if(!empty($checking1)){
			foreach($checking1 as $record){
				if(!empty($record->lineid)){
					$message =	'Maintenance Job dino iki, ';$message .=	'
';
					$message .= 'Project: '.base_url().'schmonall/'.$unixdate;$message .=	'
';
					$message .= 'PM: '.base_url().'pmview/'.$unixdate;
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $record->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
		}
		//echo var_dump($checking1);
		exit;
	}
	function schmonall($unix){
		$start = $unix;
		$data['start'] = $start;
		$end = $start + 86399;
		$events = $this->joblist_model->gettabelall($start, $end);
		$data['joblist'] = $events->result();
		$this->load->view('joblist/schmonall', $data);
	}
	function close($id){
		$data['id'] = $id;
		$this->load->view('joblist/close', $data);
	}
	function closepic($id){
		$data['id'] = $id;
		$this->load->view('joblist/closepic', $data);
	}
	function close_session(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		if(!empty($result)){
			$checker = $this->joblist_model->getuserinfo($username);
			$ticket = $this->joblist_model->getticket($id);
			if($checker->uName == $ticket->owner){
				$jobinfo = array('closed'=>1);
				$this->joblist_model->delticket($jobinfo, $id);
				$data['note'] = 'Job has been Closed';
				$this->load->view('joblist/checked', $data);
			}else{
				$data['note'] = 'You are not Owner of this job';
				$this->load->view('joblist/checked', $data);
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function closepic_session(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		if(!empty($result)){
			$checker = $this->joblist_model->getuserinfo($username);
			$ticket = $this->joblist_model->getpicbyticket($checker->uName, $id);
			if(!empty($ticket)){
				$jobinfo = array('closed'=>2);
				$this->joblist_model->delticket($jobinfo, $id);
				$data['note'] = 'Job Closing has been sent to Owner';
				$this->load->view('joblist/checked', $data);
			}else{
				$data['note'] = 'You are not PIC of this job';
				$this->load->view('joblist/checked', $data);
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function resch(){
		$time = date('U');
		$time = $time;
		$sch = $this->joblist_model->resch($time);
		if(!empty($sch)){
			foreach($sch as $result){
				$adding = $result->repeater * 86400;
				$newtime = $result->next + $adding;
				$jobinfo = array(
					'next'=>$newtime
					);
				$update = $this->joblist_model->editprojectjob($jobinfo, $result->id);
			}
		}
		exit();
	}
	function pmview($unix){
		$start = $unix;
		$data['start'] = $start;
		$end = $start + 86399;
		$events = $this->joblist_model->getpmtabelall($start, $end);
		$data['joblist'] = $events->result();
		$this->load->view('pmlist/schviewall', $data);
	}
	function pmsheet($code, $freq, $tag){
		$this->load->model('pmjob_model');
		$time = gmdate('U');
		$time = $time - ($time % 86400);
		$cek = $this->pmjob_model->ceksheettoday($time, $code, $freq, $tag);
		if(empty($cek)){
			$data['doc'] = $this->pmjob_model->getdoc($code, $freq, $tag);
			$data['usedlogo'] = $this->pmjob_model->getusedlogo($code, $freq, $tag);
			$data['xcode'] = $code;
			$data['tag'] = $tag;
			$this->load->view('pmlist/pmsheet', $data);
		}else{
			$data['doc'] = $this->pmjob_model->getdoctoday($code, $freq, $tag);
			$data['usedlogo'] = $this->pmjob_model->getusedlogo($code, $freq, $tag);
			$data['xcode'] = $code;
			$data['tag'] = $tag;
			$this->load->view('pmlist/pmsheetedit', $data);
		}
	}
	function submit_pm(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		if(!empty($result)){
			$checker = $this->joblist_model->getuserinfo($username);
			$this->load->model('pmjob_model');
			$time = gmdate('U');
			$time = $time - ($time % 86400);
			$id = $this->input->post('id[]');
			$inputan = $this->input->post('inputan[]');
			$code = $this->input->post('code');
			$freq = $this->input->post('freq');
			$tag = $this->input->post('tag');
			$x = 0;
			foreach($id as $result){
				if(!empty($inputan[$x])){$val = $inputan[$x];}
				else{$val = 0;}
				$pminfo = array(
					'rec_unix'=>$time,
					'code'=>$code,
					'freq'=>$freq,
					'tag'=>$tag,
					'form_id'=>$result,
					'input'=>$val,
					'user'=>$checker->uName
					);
				$dev = $this->pmjob_model->getpmparam($result);
				if(!empty($dev->opt) and !empty($val)){
					$devparam = array(
						'code'=>$dev->dcode,
						'param_id'=>$dev->opt,
						'in_value'=>$val,
						'pic'=>$checker->uName
					);
					$this->pmjob_model->submit_devparam($devparam);
				}
				$cek = $this->pmjob_model->cekpmtoday($time, $code, $result, $freq, $tag);
				if(!empty($cek)){
					$update = $this->pmjob_model->editpmtoday($pminfo, $time, $code, $result, $freq, $tag);
				}else{
					$newdat = $this->pmjob_model->addpmtoday($pminfo);
				}
				$x++;
			}
			$data['note'] = 'Terimakasih';
			$this->load->view('joblist/checked', $data);
		}else{
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function pmcode($code){
		$this->load->model('pmjob_model');
		$check_tag = $this->pmjob_model->gettagcode($code);
		if(!empty($check_tag)){
			$elec = '';
			$mech = '';
			$prod = '';
			foreach($check_tag as $button){
				if($button->tag == 1){
					$elec = 1;
				}
				if($button->tag == 2){
					$mech = 1;
				}
				if($button->tag == 3){
					$prod = 1;
				}
			}
			$data['code'] = $code;
			$data['elec'] = $elec;
			$data['mech'] = $mech;
			$data['prod'] = $prod;
			$this->load->view('pmlist/tagselect', $data);
		}
	}
	function pmtag($code, $tag){
		$this->load->model('pmjob_model');
		$check_freq = $this->pmjob_model->getfreqcode($code, $tag);
		if(!empty($check_freq)){
			$week = '';
			$mont = '';
			foreach($check_freq as $button){
				if($button->frec == 1){
					$week = 1;
				}
				if($button->frec == 2){
					$mont = 1;
				}
			}
			$data['code'] = $code;
			$data['tag'] = $tag;
			$data['week'] = $week;
			$data['mont'] = $mont;
			$this->load->view('pmlist/freqselect', $data);
		}
	}
	function devcode($code){
		$this->load->model('device_model');
		$dev_code = explode('-', $code);
		$last_dig = $dev_code[2];
		if(strlen($last_dig) < 3){
			if($last_dig < 10){
				$last_dig = '00'.$last_dig;
			}elseif($last_dig >= 10 and $last_dig < 100){
				$last_dig = '0'.$last_dig;
			}else{
				$last_dig = $last_dig;
			}
		}
		$tbl_code = $dev_code[0].' '.$dev_code[1].' '.$last_dig;
		$data['lastmainten'] = $this->device_model->lastmainten($tbl_code);
		$data['lastinstall'] = $this->device_model->lastinstall($tbl_code);
		$data['lasttest'] = $this->device_model->lasttest($tbl_code);
		$test_code = $dev_code[0].' '.$dev_code[1];
		$data['test_code'] = $this->device_model->checktestsheet($test_code);
		$data['devicedetail'] = $this->device_model->devicedetail($tbl_code);
		
		$data['devdet'] = $this->device_model->subcodecheck($dev_code[0], $dev_code[1]);
		$data['code'] = $dev_code[0].'-'.$dev_code[1].'-'.$last_dig;
		$this->load->view('alldev/devcode', $data);
	}
	function devmainten($code){
		$this->load->model('device_model');
		$dev_code = explode('-', $code);
		$tbl_code = str_replace('-', ' ', $code);
		$data['parameter'] = $this->device_model->parameter($dev_code[0]);
		$data['p1'] = $this->device_model->lastmainp1($tbl_code);
		$data['p2'] = $this->device_model->lastmainp2($tbl_code);
		$data['p3'] = $this->device_model->lastmainp3($tbl_code);
		$data['p4'] = $this->device_model->lastmainp4($tbl_code);
		$data['p5'] = $this->device_model->lastmainp5($tbl_code);
		$data['devicedetail'] = $this->device_model->devicedetail($tbl_code);
		$data['code'] = $code;
		$this->load->view('alldev/devmainten', $data);
	}
	function fdevmainten(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('login_model');
		$user = $this->login_model->loginjoin($username, $password);
		if(!empty($user)){
			$checker = $this->joblist_model->getuserinfo($username);
			$this->load->model('device_model');
			$time = date('U');
			$activity = $this->input->post('activity');
			$part1 = $this->input->post('part1');
			$part2 = $this->input->post('part2');
			$part3 = $this->input->post('part3');
			$part4 = $this->input->post('part4');
			$part5 = $this->input->post('part5');
			$partname = '';
			if($activity == 1){ $partname = $part1; }
			if($activity == 2){ $partname = $part2; }
			if($activity == 3){ $partname = $part3; }
			if($activity == 4){ $partname = $part4; }
			if($activity == 5){ $partname = $part5; }
			$code = $this->input->post('code');
			$tbl_code = str_replace('-', ' ', $code);
			$note = $this->input->post('note');
			$devinfo = array(
				'unixtime'=>$time,
				'code'=>$tbl_code,
				'part'=>$activity,
				'partname'=>$partname,
				'note'=>$note,
				'pic'=>$checker->uName
				);
			$updateinfo = array(
				'pm'=>$partname,
				'activity'=>$note,
				'pic'=>$checker->uName
				);
			$this->load->model('device_model');
			$this->device_model->add_fdevmainten($devinfo);
			$this->device_model->editdevicein($updateinfo, $tbl_code);
			$data['note'] = 'Terimakasih, <br> <a href="'.base_url().'devcode/'.$code.'" class="btn btn-sm btn-success">Click here</a> to back to main menu';
			$this->load->view('joblist/checked', $data);
		}else{
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function devlockset($code){
		$this->load->model('device_model');
		$dev_code = explode('-', $code);
		$tbl_code = str_replace('-', ' ', $code);
		$data['posisi'] = $this->device_model->getposisilist();
		$data['device'] = $this->device_model->getdevicelist();
		$data['devicedetail'] = $this->device_model->lastinstall($tbl_code);
		$data['code'] = $code;
		$this->load->view('alldev/devlockset', $data);
	}
	function fdevlockset(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('login_model');
		$user = $this->login_model->loginjoin($username, $password);
		if(!empty($user)){
			$checker = $this->joblist_model->getuserinfo($username);
			$this->load->model('device_model');
			$time = date('U');
			$posisi = $this->input->post('posisi');
			$usage = $this->input->post('usage');
			$code = $this->input->post('code');
			$tbl_code = str_replace('-', ' ', $code);
			$note = $this->input->post('note');
			$devinfo = array(
				'unixtime'=>$time,
				'code'=>$tbl_code,
				'posisi'=>$posisi,
				'usage'=>$usage,
				'note'=>$note,
				'pic'=>$checker->uName
				);
			$updateinfo = array(
				'pos'=>$posisi,
				'usage'=>$usage,
				'isready'=>0
				);
			$this->load->model('device_model');
			$this->device_model->add_fdevlockset($devinfo);
			$this->device_model->editdevicein($updateinfo, $tbl_code);
			echo var_dump($devinfo);
			$data['note'] = 'Terimakasih, <br> <a href="'.base_url().'devcode/'.$code.'" class="btn btn-sm btn-success">Click here</a> to back to main menu';
			$this->load->view('joblist/checked', $data);
		}else{
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function devreplace($code){
		$this->load->model('device_model');
		$dev_code = explode('-', $code);
		$tbl_code = str_replace('-', ' ', $code);
		$likecode = $dev_code[0].' '.$dev_code[1];
		$data['newdev'] = $this->device_model->getsamelist($likecode);
		$data['devicedetail'] = $this->device_model->lastinstall($tbl_code);
		$data['code'] = $code;
		$this->load->view('alldev/devreplace', $data);
	}
	function fdevreplace(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('login_model');
		$user = $this->login_model->loginjoin($username, $password);
		if(!empty($user)){
			$checker = $this->joblist_model->getuserinfo($username);
			$this->load->model('device_model');
			$time = date('U');
			//old dev data:
			$posisi = $this->input->post('posisi');
			$usage = $this->input->post('usage');
			$code = $this->input->post('code');
			$tbl_code = str_replace('-', ' ', $code);
			//new dev data:
			$newdev = $this->input->post('newdev');
			$newpos = '';
			$newuse = '';
			$newdevdata = $this->device_model->lastinstall($newdev);
			if(!empty($newdevdata)){
				$newpos = $newdevdata->posisi;
				$newuse = $newdevdata->usage;
			}
			$note = 'Replacement ['.$tbl_code.'] to ['.$newdev.'], ';
			$note .= $this->input->post('note');
			
			$devinfo1 = array(
				'unixtime'=>$time,
				'code'=>$tbl_code,
				'posisi'=>$newpos,
				'usage'=>$newuse,
				'note'=>$note,
				'pic'=>$checker->uName
				);
			$devinfo2 = array(
				'unixtime'=>$time,
				'code'=>$newdev,
				'posisi'=>$posisi,
				'usage'=>$usage,
				'note'=>$note,
				'pic'=>$checker->uName
				);
			$updateinfo1 = array(
				'pos'=>$newpos,
				'usage'=>$newuse,
				'isready'=>0
				);
			$updateinfo2 = array(
				'pos'=>$posisi,
				'usage'=>$usage,
				'isready'=>0
				);
			$this->load->model('device_model');
			$this->device_model->add_fdevlockset($devinfo1);
			$this->device_model->add_fdevlockset($devinfo2);
			$this->device_model->editdevicein($updateinfo1, $tbl_code);
			$this->device_model->editdevicein($updateinfo2, $newdev);
			//update PM form
			$pminfo0 = array('dcode'=>'inchange');
			$pminfo1 = array('dcode'=>$tbl_code);
			$pminfo2 = array('dcode'=>$newdev);
			$this->device_model->updatepmform($pminfo0, $tbl_code);
			$this->device_model->updatepmform($pminfo1, $newdev);
			$this->device_model->updatepmform($pminfo2, 'inchange');
			$data['note'] = 'Terimakasih, <br> <a href="'.base_url().'devcode/'.$code.'" class="btn btn-sm btn-success">Click here</a> to back to main menu';
			$this->load->view('joblist/checked', $data);
		}else{
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function devpertest($code){
		$this->load->model('device_model');
		$dev_code = explode('-', $code);
		$tbl_code = str_replace('-', ' ', $code);
		$likecode = $dev_code[0].' '.$dev_code[1];
		$data['test_list'] = $this->device_model->getpertestlist($likecode);
		$data['code'] = $code;
		$this->load->view('alldev/devpertest', $data);
	}
	function devpertestin($id, $code){
		$this->load->model('device_model');
		$docdetail = $this->device_model->gettestformbyid($id);
		$data['doc'] = $this->device_model->gettestform($docdetail->dev_code, $docdetail->test_title);
		$data['img'] = $this->device_model->getimageadd($docdetail->dev_code, $docdetail->test_title);
		$data['xcode'] = $code;
		$this->load->view('alldev/testsheet', $data);
	}
	function submit_test(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		$unixtime = date('U');
		if(!empty($result)){
			$checker = $this->joblist_model->getuserinfo($username);
			$this->load->model('device_model');
			$id = $this->input->post('id[]');
			$inputan = $this->input->post('inputan[]');
			$code = $this->input->post('code');
			$tbl_code = str_replace('-', ' ', $code);
			$x = 0;
			foreach($id as $result){
				if(!empty($inputan[$x])){$val = $inputan[$x];}
				else{$val = 0;}
				$testinfo = array(
					'unixtime'=>$unixtime,
					'code'=>$tbl_code,
					'test_id'=>$result,
					'test_result'=>$val,
					'pic'=>$checker->uName
					);
				$newdat = $this->device_model->addtestresult($testinfo);
				$x++;
			}
			$data['note'] = 'Terimakasih, <br> <a href="'.base_url().'devcode/'.$code.'" class="btn btn-sm btn-success">Click here</a> to back to main menu';
			$this->load->view('joblist/checked', $data);
		}else{
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
	}
	function addabn($code, $type){
		$this->load->helper(array('form', 'url'));
		$data['code'] = $code;
		$data['type'] = $type;
		$data['error'] = '';
		$this->load->view('addabn', $data);
	}

	function reuploadabn($id){
		$this->load->helper(array('form', 'url'));
		$data['id'] = $id;
		$data['error'] = '';
		$this->load->view('abnormallity/reuploadabn', $data);
	}

	function reupload_session(){
		//$note = $this->input->post('note');
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//$code = $this->input->post('code');
		//$type = $this->input->post('type');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		
		$config['upload_path']          = './assets/report';
		$config['allowed_types']        = 'jpg|JPG|png|PNG|jpeg|JPEG';
		$config['max_size']             = 10000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
		$new_name = 'AB_'.$username.'_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 
		if(!empty($result)){
			if(!$this->upload->do_upload('berkas')){$new_name = ''; $note .= $this->upload->display_errors();};
			$checker = $this->joblist_model->getuserinfo($username);
			$new_name = $this->upload->data('file_name');
			$reportInfo = array(
				//'note'=>$note,
				'user'=>$checker->uName,
				//'acsource'=>$code,
				'imglink'=>$new_name
				);
			$this->load->model('user_model');
			$add_report = $this->user_model->reuploadabn($reportInfo, $id);
			$data['note'] = $this->upload->display_errors();
			$data['note'] .= '<br>Your Report has been Submitted';
			$this->load->view('joblist/checked', $data);
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
		
	}

	function addab_session(){
		$note = $this->input->post('note');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$code = $this->input->post('code');
		$type = $this->input->post('type');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		
		$config['upload_path']          = './assets/report';
		$config['allowed_types']        = 'jpg|JPG|png|PNG|jpeg|JPEG';
		$config['max_size']             = 10000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
		$new_name = 'AB_'.$username.'_'.time();
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
 
		if(!empty($result)){
			if(!$this->upload->do_upload('berkas')){$new_name = ''; $note .= $this->upload->display_errors();};
			$checker = $this->joblist_model->getuserinfo($username);
			$new_name = $this->upload->data('file_name');
			$reportInfo = array(
				'note'=>$note,
				'user'=>$checker->uName,
				'acsource'=>$code,
				'imglink'=>$new_name
				);
			$this->load->model('user_model');
			$add_report = $this->user_model->addab($reportInfo);
			$data['note'] = $this->upload->display_errors();
			$data['note'] .= '<br>Your Report has been Submitted';
			$this->load->view('joblist/checked', $data);
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('joblist/checked', $data);
		}
		
	}
	function testsheet_img($id){
		$this->load->helper(array('form', 'url'));
		$data['id'] = $id;
		$data['error'] = '';
		$this->load->view('alldev/img_upload', $data);
	}
	function testsheet_img_exe(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		
		$config['upload_path']          = './assets/report';
		$config['allowed_types']        = 'jpg';
		$config['max_size']             = 2048;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
		$new_name = time();
		$config['file_name'] = 'test'.$new_name;
		$this->load->library('upload', $config);
 
		if(!empty($result)){
			if(!$this->upload->do_upload('berkas')){
				$data['note'] = $this->upload->display_errors();
				$this->load->view('alldev/checked', $data);
			}else{
				$this->load->model('device_model');
				$info = $this->device_model->gettestformbyid($id);
				$imginfo = array(
					'title'=>$info->test_title,
					'code'=>$info->dev_code,
					'imglink'=>'test'.$new_name
					);
				$add_report = $this->device_model->addelectestpic($imginfo);
				$data['note'] = 'Image has been Submitted';
				$this->load->view('alldev/checked', $data);
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('alldev/checked', $data);
		}
	}
	function pmimg_upload($code){
		$this->load->helper(array('form', 'url'));
		$data['code'] = $code;
		$data['error'] = '';
		$this->load->view('pmlist/img_upload', $data);
	}
	function pmimg_upload_exe(){
		$code = $this->input->post('code');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('login_model');
		$result = $this->login_model->loginjoin($username, $password);
		
		$config['upload_path']          = './assets/picture';
		$config['allowed_types']        = 'jpg|JPG';
		$config['max_size']             = 2048;
		$config['overwrite']           = TRUE;
		$config['file_name'] = $code;
		$this->load->library('upload', $config);
 
		if(!empty($result)){
			if(!$this->upload->do_upload('berkas')){
				$data['note'] = $this->upload->display_errors();
				$this->load->view('pmlist/checked', $data);
			}else{
				$data['note'] = 'Image has been Submitted';
				$this->load->view('pmlist/checked', $data);
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('pmlist/checked', $data);
		}
	}
	function sendpmtod(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$unix2 = $unix + 86400;
		$this->load->model('user_model');
		$receiver = $this->user_model->sendmassline();
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('pmjob_model');
				$mypm = $this->pmjob_model->mypm($record->uName, $unix, $unix2);
				if(!empty($mypm)){
					$mess = 'Dear '.$record->uName.',
';
					$mess .= 'here is your PM for today, '.date('D d-m-Y', $unix).'
';
					$a = 1;
					foreach($mypm as $recpm){
						$this->load->model('joblist_model');
						$form = $this->joblist_model->getformlist($recpm->id);
						if(!empty($form)){
							foreach($form as $recform){
								$mess .= $a.'. ';
								$a++;
								if($recpm->tag == 1){ $mess .= '[EL]';}
								if($recpm->tag == 2){ $mess .= '[ME]';}
								if($recpm->type == 1){ $mess .= '[W]';}
								if($recpm->type == 2){ $mess .= '[M]';}
								$mess .= $recform->code.'['.$recform->eq_name.']'.'
';
							}
						}
					}
					$mess .= '
*EL:Electrical; ME:Mechanical; W:Weekly; M:Monthly';
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $record->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($mess);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
		}
	}
	function sendpmtom(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400) + 86400;
		$unix2 = $unix + 86400 + 86400;
		$this->load->model('user_model');
		$receiver = $this->user_model->sendmassline();
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('pmjob_model');
				$mypm = $this->pmjob_model->mypm($record->uName, $unix, $unix2);
				if(!empty($mypm)){
					$mess = 'Dear '.$record->uName.',
';
					$mess .= 'here is your PM for tomorrow, '.date('D d-m-Y', $unix).'
';
					$a = 1;
					foreach($mypm as $recpm){
						$this->load->model('joblist_model');
						$form = $this->joblist_model->getformlist($recpm->id);
						if(!empty($form)){
							foreach($form as $recform){
								$mess .= $a.'. ';
								$a++;
								if($recpm->tag == 1){ $mess .= '[EL]';}
								if($recpm->tag == 2){ $mess .= '[ME]';}
								if($recpm->type == 1){ $mess .= '[W]';}
								if($recpm->type == 2){ $mess .= '[M]';}
								$mess .= $recform->code.'['.$recform->eq_name.']'.'
';
							}
						}
					}
					$mess .= '
*EL:Electrical; ME:Mechanical; W:Weekly; M:Monthly';
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $record->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($mess);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
		}
	}
	function getpmtod($uid){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$unix2 = $unix + 86400;
		$this->load->model('user_model');
		$receiver = $this->user_model->getuseruid($uid);
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('pmjob_model');
				$picmode = $this->pmjob_model->getpicmode();
					if($picmode->area == 1){
						$mypm = $this->pmjob_model->mypm($record->uName, $unix, $unix2);
					}else{
						$mypm = $this->pmjob_model->mypm2($record->uName, $unix, $unix2);
					}
				$mess = 'Dear '.$record->uName.',<br>';
				if(!empty($mypm)){
					$mess .= 'here is your PM for today, '.date('D d-m-Y', $unix).'<br>';
					$a = 1;
					foreach($mypm as $recpm){
						$this->load->model('joblist_model');
						$form = $this->joblist_model->getformlist($recpm->id);
						if(!empty($form)){
							foreach($form as $recform){
								$mess .= $a.'. ';
								$a++;
								if($recpm->tag == 1){ $mess .= '[EL]';}
								if($recpm->tag == 2){ $mess .= '[ME]';}
								if($recpm->type == 1){ $mess .= '[W]';}
								if($recpm->type == 2){ $mess .= '[M]';}
								$mess .= $recform->code.'['.$recform->eq_name.']'.'<br>';
							}
						}
					}
					$mess .= '<br>*EL:Electrical; ME:Mechanical; W:Weekly; M:Monthly';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}else{
					$mess .= '<br>Looks like you have no PM job';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}
			}
		}
	}
	function maintenance_pm_tod(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$unix2 = $unix + 86400;
		$receiver = $this->joblist_model->getusers();
		if(!empty($receiver)){
			foreach($receiver as $record){
				if(!empty($record->lineid)){
					$this->load->model('pmjob_model');
					$picmode = $this->pmjob_model->getpicmode();
					if($picmode->area == 1){
						$mypm = $this->pmjob_model->mypm($record->uName, $unix, $unix2);
					}else{
						$mypm = $this->pmjob_model->mypm2($record->uName, $unix, $unix2);
					}
					if(!empty($mypm)){
						$mess = 'Your PM for today, '.date('D d-m-Y');$mess .= '
';
						$mess .= base_url().'getpmtod/'.$record->lineid;
						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						$user_id    = $record->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($mess);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
			}
		}
	}
	function getpmtom($uid){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400) + 86400;
		$unix2 = $unix + 86400 + 86400;
		$this->load->model('user_model');
		$receiver = $this->user_model->getuseruid($uid);
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('pmjob_model');
				$picmode = $this->pmjob_model->getpicmode();
					if($picmode->area == 1){
						$mypm = $this->pmjob_model->mypm($record->uName, $unix, $unix2);
					}else{
						$mypm = $this->pmjob_model->mypm2($record->uName, $unix, $unix2);
					}
				$mess = 'Dear '.$record->uName.',<br>';
				if(!empty($mypm)){
					$mess .= 'here is your PM for tomorrow, '.date('D d-m-Y', $unix).'<br>';
					$a = 1;
					foreach($mypm as $recpm){
						$this->load->model('joblist_model');
						$form = $this->joblist_model->getformlist($recpm->id);
						if(!empty($form)){
							foreach($form as $recform){
								$mess .= $a.'. ';
								$a++;
								if($recpm->tag == 1){ $mess .= '[EL]';}
								if($recpm->tag == 2){ $mess .= '[ME]';}
								if($recpm->type == 1){ $mess .= '[W]';}
								if($recpm->type == 2){ $mess .= '[M]';}
								$mess .= $recform->code.'['.$recform->eq_name.']'.'<br>';
							}
						}
					}
					$mess .= '<br>*EL:Electrical; ME:Mechanical; W:Weekly; M:Monthly';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}else{
					$mess .= '<br>Looks like you have no PM job';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}
			}
		}
	}
	function maintenance_pm_tom(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400) + 86400;
		$unix2 = $unix + 86400 + 86400;
		$receiver = $this->joblist_model->getusers();
		if(!empty($receiver)){
			foreach($receiver as $record){
				if(!empty($record->lineid)){
					$this->load->model('pmjob_model');
					$picmode = $this->pmjob_model->getpicmode();
					if($picmode->area == 1){
						$mypm = $this->pmjob_model->mypm($record->uName, $unix, $unix2);
					}else{
						$mypm = $this->pmjob_model->mypm2($record->uName, $unix, $unix2);
					}
					if(!empty($mypm)){
						$mess = 'Your PM for tomorrow, ';$mess .= '
';
						$mess .= base_url().'getpmtom/'.$record->lineid;
						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						$user_id    = $record->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($mess);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
			}
		}
	}
	function getprjtod($uid){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$this->load->model('user_model');
		$receiver = $this->user_model->getuseruid($uid);
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('joblist_model');
				$myproject = $this->joblist_model->myproject($record->uName, $unix);
				$mess = 'Dear <b>'.$record->uName.'</b>,<br>';
				if(!empty($myproject)){
					$mess .= 'here is your Project for today, '.date('D d-m-Y', $unix).'<br><ol>';
					foreach($myproject as $recprj){
						$mess .= '<li>'.date('H:i', ($recprj->start-25200)).' to '.date('H:i', ($recprj->end-25200)).', <b>'.$recprj->job_title.'</b></li>';
						$mess .= ''.nl2br($recprj->job_desc).'<br>';
						$mess .= 'PIC:<br>';
						$pic = $this->joblist_model->getuserlist($recprj->ticket_id);
						if(!empty($pic)){
							$mess .= '<ul>';
							foreach($pic as $rec_pic){
								$mess .= '<li>'.$rec_pic->user.'</li>';
							}
							$mess .= '</ul>';
						}
					}
					$mess .= '<a class="btn btn-sm btn-primary" href="'.base_url().'report/'.$recprj->ticket_id.'">Report</a> | ';
					if($recprj->closed == 0){
						$mess .= '<a class="btn btn-sm btn-success" href="'.base_url().'closepic/'.$recprj->ticket_id.'">Close</a>';
					}
					if($recprj->closed == 2){
						$mess .= '(Close Requested)';
					}
					if($recprj->closed == 1){
						$mess .= '(Closed)';
					}
					$mess .= '</ol>';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}else{
					$mess .= '<br>Looks like you have no Project job';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}
			}
		}
	}
	function maintenance_prj_tod(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$receiver = $this->joblist_model->getusers();
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('joblist_model');
				$myproject = $this->joblist_model->myproject($record->uName, $unix);
				if(!empty($myproject)){
					$mess = 'Your Project for today, '.date('D d-m-Y');$mess .= '
';
						$mess .= base_url().'getprjtod/'.$record->lineid;
						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						$user_id    = $record->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($mess);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
		}
	}
	function getprjtom($uid){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400) + 86400;
		$this->load->model('user_model');
		$receiver = $this->user_model->getuseruid($uid);
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('joblist_model');
				$myproject = $this->joblist_model->myproject($record->uName, $unix);
				$mess = 'Dear <b>'.$record->uName.'</b>,<br>';
				if(!empty($myproject)){
					$mess .= 'here is your Project for today, '.date('D d-m-Y', $unix).'<br><ol>';
					foreach($myproject as $recprj){
						$mess .= '<li>'.date('H:i', ($recprj->start-25200)).' to '.date('H:i', ($recprj->end-25200)).', <b>'.$recprj->job_title.'</b></li>';
						$mess .= ''.nl2br($recprj->job_desc).'<br>';
						$mess .= 'PIC:<br>';
						$pic = $this->joblist_model->getuserlist($recprj->ticket_id);
						if(!empty($pic)){
							$mess .= '<ul>';
							foreach($pic as $rec_pic){
								$mess .= '<li>'.$rec_pic->user.'</li>';
							}
							$mess .= '</ul>';
						}
					}
					$mess .= '</ol>';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}else{
					$mess .= '<br>Looks like you have no Project job';
					$data['note'] = $mess;
					$this->load->view('checked', $data);
				}
			}
		}
	}
	function maintenance_prj_tom(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400) + 86400;
		$receiver = $this->joblist_model->getusers();
		if(!empty($receiver)){
			foreach($receiver as $record){
				$this->load->model('joblist_model');
				$myproject = $this->joblist_model->myproject($record->uName, $unix);
				if(!empty($myproject)){
					$mess = 'Your Project for tomorrow, ';$mess .= '
';
						$mess .= base_url().'getprjtom/'.$record->lineid;
						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						$user_id    = $record->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($mess);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
		}
	}
	function skippedpm(){
		$unix = date('U');
		$unix = $unix - ($unix % 86400) - 25200;
		$unix2 = $unix + 86400;
		$this->load->model('pmjob_model');
		$pm = $this->pmjob_model->pmtoday($unix, $unix2, 0, 0);
		$userpic = '';
		if(!empty($pm)){
			foreach($pm as $record){
				$picmode = $this->pmjob_model->getpicmode();
				if($picmode->area == 1){
					$getpic = $this->pmjob_model->getpicarea($record->area, $record->tag);
				}else{
					$getpic = $this->pmjob_model->getpicpm($record->id);
				}
				if(!empty($getpic)){
					$userpic = '';
					$x = 1;
					foreach($getpic as $pic){
						if($x == 2){$userpic .= ' and ';}
						$userpic .= $pic->uName;
						$x++;
					}
				}
				$time = $unix+25200;
				$getresult = $this->pmjob_model->getresultof($time, $record->code, $record->tag, $record->type);
				if(empty($getresult)){
					$pmskip = array(
							'unixtime'=>$unix,
							'tag'=>$record->tag,
							'type'=>$record->type,
							'code'=>$record->code,
							'eq_name'=>$record->eq_name,
							'pic'=>$userpic
						);
					$this->pmjob_model->addskipped($pmskip);
				}
			}
		}
	}
	function getallabticket(){
		$this->load->model('user_model');
		$result = $this->user_model->getopenabticket();
		if(!empty($result)){
			foreach($result as $ticket){
				$lineid = $this->user_model->getuserlineid($ticket->pic);
				if(!empty($lineid)){
					$abreport = $this->user_model->getabdata($ticket->ab_id);
					$message = 'Abnormallity Job [Ticket.'.$ticket->id.']

Report: '.$abreport->note.'
Reported by: '.$abreport->user.'

Detail and update link:
'.base_url().'line_abticket/'.$ticket->id.'/'.$ticket->ab_id;
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $lineid->lineid;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}
		}
	}
	function line_abticket($tic_id, $ab_id){
		$this->load->model('user_model');
		$data['ticket'] = $this->user_model->getabticketID($ab_id);
		$data['abdata'] = $this->user_model->getabdata($ab_id);
		$data['tic_id'] = $ab_id;
		$this->load->view('abnormallity/line_abticket', $data);
	}
	function line_upabticket(){
		$this->load->model('user_model');
		$id = $this->input->post('id');
		$ticket = $this->user_model->getabticketID($id);
		$upd = $ticket->upd;
		$upd .= '
';
		$upd .= date('d-m-Y H:i:s');
		$upd .= ' ';
		$upd .= $this->input->post('upd');
		$abinfo = array('upd'=>$upd);
		$this->user_model->up_abticket($abinfo, $ticket->id);
		$mess = 'Thanks! You can close this tab now';
		$data['note'] = $mess;
		$this->load->view('abnormallity/checked', $data);
	}
	function lineabimage($id){
		$this->load->model('user_model');
		$getimage = $this->user_model->viewabimage($id);
		$a = '<img src="'.base_url().'assets/report/'.$getimage->imglink.'.jpg" style="width:100%"/>';
		echo $a;
	}
	
	function mechdata($type, $code){
		if ($type == 'devcode'){
			redirect('devcode/'.$code);
			
		}elseif($type == 'pmcode'){
			redirect('pmcode/'.$code);
		}
		
	}
}
?>