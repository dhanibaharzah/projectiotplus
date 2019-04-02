<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class User extends BaseController
{
    public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->isLoggedIn(); 
	}
	public function index(){
		if($this->appmode == 0){
			$user = $this->name;
			$unix = gmdate('U');
			$unix = $unix - ($unix % 86400);
			$unix2 = $unix + 86400;
			$data['ab'] = $count = $this->user_model->getabnormallityCount();
			$data['abc'] = $count = $this->user_model->getabnormallityClose();
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("dashboard/dashboard_mech", $this->global, $data , NULL);
		}elseif($this->appmode == 1){
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("dashboard/dashboard_qc", $this->global, NULL , NULL);
		}elseif($this->appmode == 2){
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("dashboard/dashboard_tool", $this->global, NULL , NULL);
		}elseif($this->appmode == 3){
			$fromDate = $this->input->post('fromDate');
			$toDate = $this->input->post('toDate');
			$type1 = $this->input->post('type1');
			$type2 = $this->input->post('type2');
			$type3 = $this->input->post('type3');
			$type4 = $this->input->post('type4');
			$type5 = $this->input->post('type5');
			$type6 = $this->input->post('type6');
			$lokasi = $this->input->post('lokasi');
			
			$data['lokasi'] = $lokasi;
			$data['fromDate'] = $fromDate;
			$data['toDate'] = $toDate;
			$data['type1'] = $type1;
			$data['type2'] = $type2;
			$data['type3'] = $type3;
			$data['type4'] = $type4;
			$data['type5'] = $type5;
			$data['type6'] = $type6;
			$data['vendorId'] = $this->vendorId;
			
			$this->load->model('hse_jsa_model');
			$data['area'] = $this->hse_jsa_model->get_area();
			if(!empty($fromDate)){
					$fromDate .= ' 00:00:00';
				}
			if(!empty($toDate)){
				$toDate .= ' 00:00:00';
			}
			$start = date('U', strtotime($fromDate));
			$end = date('U', strtotime($toDate));
			$this->load->model('hse_user_model');
			$data['job_result'] = $this->hse_user_model->get_job($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
			
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$data['hot_work'] = $this->hse_user_model->get_hot_work($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
			$data['at_high'] = $this->hse_user_model->get_at_high($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
			$data['confined'] = $this->hse_user_model->get_confined($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
			$data['digging'] = $this->hse_user_model->get_digging($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
			$data['listrik'] = $this->hse_user_model->get_listrik($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
			$data['general'] = $this->hse_user_model->get_general($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
			
			$this->loadViews("dashboard/dashboard_hse", $this->global, $data , NULL);
		}elseif($this->appmode == 4){
			$this->load->model('iot_cutting_model');
			$data['gauge_rate_1'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_1');
			$data['gauge_rate_2'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_2');
			$data['gauge_rate_3'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_3');
			$data['gauge_mix_1'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_1');
			$data['gauge_mix_2'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_2');
			$data['gauge_mix_3'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_3');
			$data['gauge_cut_1'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_1');
			$data['gauge_cut_2'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_2');
			$data['gauge_cut_3'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_3');
			$data['gauge_dt_1'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_1');
			$data['gauge_dt_2'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_2');
			$data['gauge_dt_3'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_3');
			$ses = $this->iot_cutting_model->load_iot_setting('mtdcyc');
			$last_data = $this->iot_cutting_model->get_last_summary();
			$data['ses'] = $last_data->prod_date.' 0'.number_format($ses, 0, '.', '').':00:00';
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("dashboard/dashboard_iot", $this->global, $data , NULL);
		}elseif($this->appmode == 5){
			$this->load->model('CBM_salesvol_model');
			$data['prodid'] = $this->CBM_salesvol_model->getproduct_cbm_1($this->vendorId);
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("dashboard/dashboard_cbm", $this->global, $data , NULL);
		}elseif($this->appmode == 6){
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("dashboard/dashboard_ss", $this->global, NULL , NULL);
		}elseif($this->appmode == 7){
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("dashboard/dashboard_sr", $this->global, NULL , NULL);
		}elseif($this->appmode == 9000){
			$this->global['pageTitle'] = 'RAWR : Dashboard';
			$this->loadViews("xx_trial/dashboard", $this->global, NULL , NULL);
		}
	}
	function apabae(){
		$this->global['pageTitle'] = '3rd party members';
		$this->loadViews("apabae", $this->global, NULL, NULL);
	}
	public function apaaja(){
		$this->load->model('user_model');
		$timestamp = $this->input->post('timestamp');
		$user = $this->input->post('user');
		$pesan = $this->input->post('message');
		$userInfo = array(
				'user'=>$this->name,
				'pesan'=>$pesan
			);
		$result = $this->user_model->dashboard1($userInfo);
		redirect('dashboard');
    }
	function chat_box(){
		$this->load->model('pmjob_model');
		$re = $this->pmjob_model->showupdate();
		if(!empty($re)){
			$a = '';
			foreach($re as $rec){
				if($this->name != $rec->user){
					$a .='<div class="direct-chat-msg">';
				}else{
					$a .='<div class="direct-chat-msg right">';
				}
				$a .='<div class="direct-chat-info clearfix">';
				$a .='<span class="direct-chat-name pull-left">'.$rec->user.'</span>';
				$a .='<span class="direct-chat-timestamp pull-right">'.$rec->timestamp.'</span>';
				$a .='</div>';
				$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar6.png" alt="message user image">';
				$a .='<div class="direct-chat-text">';
				$a .= 'PM Result ['.$rec->code.'] <a class="btn btn-sm btn-success" href="'.base_url().'showresult/0/'.$rec->code.'/'.$rec->tag.'/'.$rec->freq.'/'.$rec->rec_unix.'">Check Result</a>';
				$a .='</div>';
				$a .='</div>';
			}
		}
		echo $a;
	}
	function server_box(){
		$this->load->model('joblist_model');
		$re = $this->joblist_model->serverupdate();
		if(!empty($re)){
			$a = '';
			foreach($re as $rec){
				if($this->name != $rec->user){
					$a .='<div class="direct-chat-msg">';
				}else{
					$a .='<div class="direct-chat-msg right">';
				}
				$a .='<div class="direct-chat-info clearfix">';
				$a .='<span class="direct-chat-name pull-left">'.$rec->user.'</span>';
				$a .='<span class="direct-chat-timestamp pull-right">'.$rec->timestamp.'</span>';
				$a .='</div>';
				$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar6.png" alt="message user image">';
				$a .='<div class="direct-chat-text">';
				$a .= $rec->info;
				$a .='</div>';
				$a .='</div>';
			}
		}
		echo $a;
	}
	function project_box(){
		$this->load->model('joblist_model');
		$start = date('U');
		$start = $start - ($start % 86400);
		$end = $start + 86399;
		$events = $this->joblist_model->gettabelallnew($start, $end);
		$result = $events->result();
		$a = '<div class="callout callout-info"><p><i class="fa fa-info"></i> No Data Found</p></div>';
		if(!empty($result)){
			$a = '';
			foreach($result as $rec){
				if($rec->dur <= 60){$a .='<div class="callout callout-success">';}
				if($rec->dur > 60 and $rec->dur <= 120){$a .='<div class="callout callout-info">';}
				if($rec->dur > 120 and $rec->dur <= 180){$a .='<div class="callout callout-warning">';}
				if($rec->dur > 180){$a .='<div class="callout callout-danger">';}
				$a .='<p>';
				if($rec->tag == 1){$a .= '<i class="fa fa-bolt"></i> ';}
				if($rec->tag == 2){$a .= '<i class="fa fa-wrench"></i> ';}
				$a .=$rec->job_title;
				$a .='<br>';
				$a .='<small>'.date('H:i', ($rec->start-25200)).' to '.date('H:i', ($rec->end-25200)).', Requested By. '.substr(str_replace(')', '', $rec->addedby), 6).' - ';
				$a .='Arranged by. '.substr(str_replace(')', '', $rec->owner), 6).'</small>';
				$a .='<a class="btn btn-primary btn-sm pull-right" target="_blank" href="'.base_url().'report/'.$rec->id.'">Report/Monitor</a></p>';
				$a .='</div>';
			}
		}
		echo $a;
	}
    function loadChangePass(){
		$this->global['pageTitle'] = 'RAWR : Change Password';
		$this->loadViews("changePassword", $this->global, NULL, NULL);
	}
	function changePassword(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
		$this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
		$this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
		if($this->form_validation->run() == FALSE){
			$this->loadChangePass();
		}else{
			$oldPassword = $this->input->post('oldPassword');
			$newPassword = $this->input->post('newPassword');
			$this->load->model('login_model');
			if($this->vendorId >= 40000 and $this->vendorId < 50000){
				$resultPas = $this->login_model->loginexternal($this->vendorId, $oldPassword);
			}elseif($this->vendorId >= 30000 and $this->vendorId < 40000){
				$resultPas = $this->login_model->logincbm($this->vendorId, $oldPassword);
			}elseif($this->vendorId >= 100000 and $this->vendorId < 200000){
				$resultPas = $this->login_model->logintrial($this->vendorId, $oldPassword);
			}else{
				$resultPas = $this->login_model->loginjoin($this->vendorId, $oldPassword);
			}
			if(empty($resultPas)){
				$this->session->set_flashdata('nomatch', 'Your old password not correct');
				redirect('loadChangePass');
			}else{
				$usersData = array('uPassword'=>md5($newPassword));
				if($this->vendorId >= 40000 and $this->vendorId < 50000){
					$result = $this->user_model->changePasswordvendor($this->vendorId, $usersData);
				}elseif($this->vendorId >= 30000 and $this->vendorId < 40000){
					$result = $this->user_model->changePasswordcbm($this->vendorId, $usersData);
				}elseif($this->vendorId >= 100000 and $this->vendorId < 200000){
					$result = $this->user_model->changePasswordtrial($this->vendorId, $usersData);
				}else{
					$result = $this->user_model->changePassword($this->vendorId, $usersData);
				}
				if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
				else { $this->session->set_flashdata('error', 'Password updation failed'); }
				redirect('loadChangePass');
			}
		}
	}
	function bugreport(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->user_model->getbugCount($searchText);
		$returns = $this->paginationCompress ( "bugreport/", $count, 10 );
		$data['bugreport'] = $this->user_model->getbug($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Bug Report';
		$this->loadViews("bug_report", $this->global, $data, NULL);
	}
	function addbug(){
		$note = $this->input->post('note');
		$app = '';
		if($this->appmode == 0){ $app = 'Mechdata'; }
		if($this->appmode == 1){ $app = 'Production'; }
		if($this->appmode == 2){ $app = 'Rental Tool'; }
		if($this->appmode == 3){ $app = 'HSE'; }
		if($this->appmode == 4){ $app = 'IoT'; }
		if($this->appmode == 5){ $app = 'CBM'; }
		if($this->appmode == 6){ $app = 'Self Service'; }
		if($this->appmode == 7){ $app = 'Store'; }
		$buginfo = array(
			'note'=>$note,
			'app'=>$app,
			'user'=>$this->name
			);
		$this->user_model->addbug($buginfo);
		redirect('bugreport');
	}
	function abnormallity(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['user'] = $this->name;
		$this->load->library('pagination');
		$count = $this->user_model->getabnormallityCount($searchText);
		$returns = $this->paginationCompress ( "abnormallity/", $count, 10 );
		$data['abnormallity'] = $this->user_model->getabnormallity($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Abnormallity';
		$this->loadViews("abnormallity/abnormallity", $this->global, $data, NULL);
	}
	function myabnormallity(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['user'] = $this->name;
		$this->load->library('pagination');
		$count = $this->user_model->getmyabnormallityCount($searchText, $this->name);
		$returns = $this->paginationCompress ( "myabnormallity/", $count, 10 );
		$data['abnormallity'] = $this->user_model->getmyabnormallity($searchText, $this->name, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : My Abnormallity Report';
		$this->loadViews("abnormallity/myabnormallity", $this->global, $data, NULL);
	}
	function mytaskabnormallity(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['user'] = $this->name;
		$this->load->library('pagination');
		$count = $this->user_model->getmytaskabnormallityCount($searchText, $this->name);
		$returns = $this->paginationCompress ( "mytaskabnormallity/", $count, 10 );
		$data['abnormallity'] = $this->user_model->getmytaskabnormallity($searchText, $this->name, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : My Abnormallity Task';
		$this->loadViews("abnormallity/mytaskabnormallity", $this->global, $data, NULL);
	}
	function addab(){
		$note = $this->input->post('note');
		$buginfo = array(
			'note'=>$note,
			'acsource'=>'web input',
			'user'=>$this->name
			);
		$this->user_model->addab($buginfo);
		redirect('abnormallity');
	}
	function close_ab(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$buginfo = array(
				'isopen'=>0,
				'closeby'=>$this->name
				);
			$this->user_model->close_ab($buginfo, $id);
			$buginfo = array('isopen'=>0);
			$this->user_model->close_abticket($buginfo, $id);
			redirect('abnormallity');
		}
	}
	function viewabimage($id){
		$getimage = $this->user_model->viewabimage($id);
		$a = '<img src="'.base_url().'assets/report/'.$getimage->imglink.'" style="width:100%"/>';
		echo $a;
	}
	function userlog(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->user_model->geyuserlogsCount($searchText);
		$data['total'] = $this->user_model->geyuserlogtoday();
		$returns = $this->paginationCompress ( "userlog/", $count, 10 );
		$data['userlog'] = $this->user_model->geyuserlogs($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : User Logs';
		$this->loadViews("userlog", $this->global, $data, NULL);
	}
	function sendmasspage(){
		$data['user'] = $this->name;
		$this->global['pageTitle'] = 'RAWR : Send MASS LINE Message';
		$this->loadViews("sendmass", $this->global, $data, NULL);
	}
	function sendmass(){		
		$mess = $this->input->post('mess');
		$user = $this->input->post('user');
		$message = '[SERVER]:
'.$mess.'

*Received by all Registered LINE ID*';
		$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
		$receiver = $this->user_model->sendmassline();
		if(!empty($receiver)){
			foreach($receiver as $record){
				$user_id    = $record->lineid;
				$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
				$response           = $bot->pushMessage($user_id, $textMessageBuilder);
			}
		}
		redirect('sendmasspage');
	}
	function ab_ticket($id){
		$ticket = $this->user_model->getabticketID($id);
		if(empty($ticket)){
			echo '<div class="text-center"><a class="btn btn-sm btn-success" href="'.base_url().'create_abticket/'.$id.'">Create Job Ticket</a></div>';
		}else{
			$col = '';
			if($ticket->isopen == 1){$col = 'primary';}else{$col = 'green';}
			echo '<div class="callout bg-'.$col.'"><h4>Ticket ID:</b> '.$ticket->id.', <b>Last Update: </b>'.$ticket->timestamp.', <b>Created by.</b> '.$ticket->addby.'</h4>';
			//echo '<p><b>Suggestion:</b> '.nl2br($ticket->sug).'</p>';
			echo '<p><b>PIC.</b> '.$ticket->pic.'</p>';
			echo '<b>Update Info by PIC: </b> <p>'.nl2br($ticket->upd).'</p>';
			if($this->name == $ticket->pic){echo '<a class="btn btn-sm btn-success" href="'.base_url().'update_abticket/'.$ticket->id.'/'.$id.'"><i class="fa fa-upload"></i> Update<a>';}
			echo '</div>';
		}
	}
	function update_abticket($tic_id, $ab_id){
		$data['ticket'] = $this->user_model->getabticketID($ab_id);
		$data['abdata'] = $this->user_model->getabdata($ab_id);
		$data['tic_id'] = $ab_id;
		$this->global['pageTitle'] = 'RAWR: Update Job Ticket';
		$this->loadViews("abnormallity/update_abticket", $this->global, $data, NULL);
	}
	function up_abticket(){
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
		redirect('abnormallity');
	}
	function create_abticket($id){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$data['abdata'] = $this->user_model->getabdata($id);
			$data['username'] = $this->user_model->getalluser();
			$this->global['pageTitle'] = 'RAWR: Create Job Ticket';
			$this->loadViews("abnormallity/create_abticket", $this->global, $data, NULL);
		}
	}
	function add_abticket(){
		$sug = $this->input->post('sug');
		$id = $this->input->post('id');
		$pic = $this->input->post('pic');
		$pic1 = $this->input->post('pic1');
		$pic2 = $this->input->post('pic2');
		$abinfo = array(
				'ab_id'=>$id,
				'pic'=>$pic,
				'pic1'=>$pic1,
				'pic2'=>$pic2,
				'sug'=>$sug,
				'addby'=>$this->name
			);
		$this->user_model->add_abticket($abinfo);
		redirect('abnormallity');
	}
	function appmode($mode){
		$userInfo = array('appmode'=>$mode);
		$this->user_model->changePassword($this->vendorId, $userInfo);
		$app = '';
		if($mode == 0){ $app = 'Mechdata'; }
		if($mode == 1){ $app = 'QC System'; }
		if($mode == 2){ $app = 'Rental Tool'; }
		if($mode == 3){ $app = 'HSE'; }
		if($mode == 4){ $app = 'IoT'; }
		if($mode == 5){ $app = 'CBM'; }
		if($mode == 6){ $app = 'Self Service'; }
		if($mode == 7){ $app = 'Store'; }
		$this->load->model('login_model');
		$loginInfo = array("userId"=>$this->name, "appname"=>$app,"sessionData" => 'Selection Session, usertype:"'.$this->usertype.'", name:"'.$this->name.'"', "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());
		$this->login_model->lastLogin($loginInfo);
		redirect('dashboard');
	}
	function trial(){
		$this->global['pageTitle'] = 'coba database';
		$this->loadViews("coba", $this->global, NULL, NULL);
	}
	function notif9(){
		$notif9 = $this->user_model->getopenabbyuser($this->name);
		echo $notif9;
	}
	function notifa(){
		$this->load->model('joblist_model');
		$notif1 = $this->joblist_model->closeprojectCount($this->name);
		$authuser = $this->joblist_model->getuserinfobyuname($this->name);
		$notif2 = $this->joblist_model->getprjappdocbyrole($authuser->cd_role1, $authuser->cd_role2, $authuser->cd_role3);
		if($this->usertype == 11){$tagging = 1;}
		if($this->usertype == 12){$tagging = 2;}
		if($this->usertype != 11 and $this->usertype != 12){$tagging = 99;}
		$this->load->model('pmjob_model');
		$notif3 = $this->pmjob_model->getapppmCount('', $tagging);
		$this->load->model('device_model');
		$cekapp = $this->device_model->getmyappdevice($this->name);
		$showuser = '(';
		if(!empty($cekapp)){
			$str = '';
			foreach($cekapp as $record){
				$str .= '`t1`.`code` LIKE "'.$record->code.'%" OR';
			}
			$xx = substr($str,0, -3);
		}else{
			$xx = '`t1`.`code` LIKE 99999999'; 
		}
		$showuser .= $xx;
		$showuser .= ')';
		$notif4 = $this->device_model->getapptestCount('', $showuser);
		$this->load->model('mtnbook_model');
		$userdata = $this->mtnbook_model->getuserright($this->name);
		$prg = $this->mtnbook_model->getprg_appCount($userdata->applog1, $userdata->applog2);
		$dwg = $this->mtnbook_model->getdwg_appCount($userdata->applog1, $userdata->applog2);
		$opr = $this->mtnbook_model->getopr_appCount($userdata->applog1, $userdata->applog2);
		$seq = $this->mtnbook_model->getseq_appCount($userdata->applog1, $userdata->applog2);
		$notif5 = $prg+$dwg+$opr+$seq;
		$notifa = $notif1+$notif2+$notif3+$notif4+$notif5;
		echo $notifa;
	}
	function notifb(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$this->load->model('joblist_model');
		$notif6 = $this->joblist_model->myprojectcount($this->name, $unix);
		$user = $this->name;
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$unix2 = $unix + 86400;
		$this->load->model('pmjob_model');
		$picmode = $this->pmjob_model->getpicmode();
		if($picmode->area == 1){
			$notif7 = $this->pmjob_model->mypmcount($user, $unix, $unix2);
		}else{
			$notif7 = $this->pmjob_model->mypmcount2($user, $unix, $unix2);
		}
		$this->load->model('device_model');
		$notif8 = $this->device_model->getwdevCount();
		$notif9 = $this->user_model->getopenabbyuser($this->name);
		$notifb = $notif6 + $notif7 + $notif8 + $notif9;
		echo $notifb;
	}
	function notif11(){
		$notif11 = $this->user_model->getopenabonly();
		echo $notif11;
	}
	
	
	
	//=================================TOOL================================================
	function order_box(){
		$re = $this->user_model->get_order();
		if(!empty($re)){
			$a = '';
			//$re = array_reverse($re, true);
			foreach($re as $rec){
				$side = '';
				if($rec->name == 'New Order'){
					if($this->name != $rec->username){
						$a .='<div class="direct-chat-msg">';
					}else{
						$a .='<div class="direct-chat-msg right">';
					}
					$a .='<div class="direct-chat-info clearfix">';
					$a .='<span class="direct-chat-name pull-left">'.$rec->username.'</span>';
					$a .='<span class="direct-chat-timestamp pull-right">'.$rec->datecreation.'</span>';
					$a .='</div>';
					$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar6.png" alt="message user image">';
					$a .='<div class="direct-chat-text">';
					$a .= 'Please process '.$rec->name.' ['.$rec->id.'] at <a class="btn btn-success btn-sm" href="'.base_url().'procesinvoice/'.$rec->id.'">Process Order</a>';
					$a .='</div>';
					$a .='</div>';
				}
				if($rec->name == 'Ongoing Invoice'){
					if($this->name != 'toolkeeper'){
						$a .='<div class="direct-chat-msg">';
					}else{
						$a .='<div class="direct-chat-msg right">';
					}
					$a .='<div class="direct-chat-info clearfix">';
					$a .='<span class="direct-chat-name pull-left">Toolkeeper</span>';
					$a .='<span class="direct-chat-timestamp pull-right">'.$rec->datecreation.'</span>';
					$a .='</div>';
					$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar7.png" alt="message user image">';
					$a .='<div class="direct-chat-text">';
					$a .= $rec->name.' ['.$rec->id.'] has been processed! '.$rec->username.' receives requested tools.';
					$a .='</div>';
					$a .='</div>';
				}
				if($rec->name == 'Closed Invoice'){
					if($this->name != 'toolkeeper'){
						$a .='<div class="direct-chat-msg">';
					}else{
						$a .='<div class="direct-chat-msg right">';
					}
					$a .='<div class="direct-chat-info clearfix">';
					$a .='<span class="direct-chat-name pull-left">Toolkeeper</span>';
					$a .='<span class="direct-chat-timestamp pull-right">'.$rec->datecreation.'</span>';
					$a .='</div>';
					$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar7.png" alt="message user image">';
					$a .='<div class="direct-chat-text">';
					$a .= 'Invoice ['.$rec->id.'] by '.$rec->username.' has been updated to '.$rec->name;
					$a .='</div>';
					$a .='</div>';
				}
			}
		}
		//$a=var_dump($re);
		echo $a;
	}
	function tool_box(){
		$re = $this->user_model->get_tool();
		if(!empty($re)){
			$a = '';
			//$re = array_reverse($re, true);
			foreach($re as $rec){
				$side = '';
				if($this->name != $rec->user){
					$a .='<div class="direct-chat-msg">';
				}else{
					$a .='<div class="direct-chat-msg right">';
				}
				$a .='<div class="direct-chat-info clearfix">';
				$a .='<span class="direct-chat-name pull-left">'.$rec->user.'</span>';
				$a .='<span class="direct-chat-timestamp pull-right">'.$rec->timestamp.'</span>';
				$a .='</div>';
				$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar6.png" alt="message user image">';
				$a .='<div class="direct-chat-text">';
				$a .= '['.$rec->id.'] '.$rec->name.' ('.$rec->brand.'/'.$rec->size.') Status updated to ['.$rec->sts.']';
				$a .='</div>';
				$a .='</div>';
			}
		}
		//$a=var_dump($re);
		echo $a;
	}
	function userListing(){
        if($this->usertype != 20){
			$this->loadThis();
		}else{
			$searchText = $this->security->xss_clean($this->input->post('searchText'));
			$data['searchText'] = $searchText;
			$this->load->library('pagination');
			$count = $this->user_model->userListingCount($searchText);
			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
			$data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
			$this->global['pageTitle'] = 'RAWR : User Listing';
			$this->loadViews("t_users/users", $this->global, $data, NULL);
        }
    }
	function adduser(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->model('user_model');
			$this->global['pageTitle'] = 'RAWR : Add New User';
			$this->loadViews("t_users/adduser", $this->global, NULL, NULL);
		}
	}
	function adduserexe(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('uname','Full Name','trim|required|max_length[128]');
			$this->form_validation->set_rules('nik','NIK','trim|required|max_length[128]');
			$this->form_validation->set_rules('password','Password','required|max_length[20]');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            if($this->form_validation->run() == FALSE){
				$this->adduser();
			}else{
				$uname = $this->security->xss_clean($this->input->post('uname'));
				$nik = $this->security->xss_clean($this->input->post('nik'));
				$password = $this->input->post('password');
				$username = $nik.'('.$uname.')';
				$userInfo = array('uName'=>$username,
					'uPassword'=>md5($password), 
					'NIK'=>$nik,
					'uType'=>'clark'
					);
				$this->load->model('user_model');
				$result = $this->user_model->adduserexe($userInfo);
				if($result > 0){
					$this->session->set_flashdata('success', 'New User created successfully');
				}else{
					$this->session->set_flashdata('error', 'User creation failed');
				}
				redirect('adduser');
			}
		}
	}
	function edituser($id = NULL){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			if($id == null){
				redirect('userListing');
			}
			$data['userInfo'] = $this->user_model->getUserInfo($id);
			$this->global['pageTitle'] = 'RAWR : Edit User';
			$this->loadViews("t_users/edituser", $this->global, $data, NULL);
		}
	}
	function edituserexe(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->library('form_validation');
			$id = $this->input->post('id');
			$this->form_validation->set_rules('uname','Full Name','trim|required|max_length[128]');
			$this->form_validation->set_rules('nik','NIK','trim|required|max_length[128]');
			$this->form_validation->set_rules('slcimail','SLCI Email','trim|valid_email|max_length[128]');
			$this->form_validation->set_rules('gmail','Google Email','trim|valid_email|max_length[128]');
			if($this->form_validation->run() == FALSE){
				$this->edituser($id);
			}else{
				$uname = $this->security->xss_clean($this->input->post('uname'));
				$nik = $this->security->xss_clean($this->input->post('nik'));
				$slcimail = $this->security->xss_clean($this->input->post('slcimail'));
				$gmail = $this->security->xss_clean($this->input->post('gmail'));
				$userInfo = array('uName'=>$uname, 
					'NIK'=>$nik, 
					'slcimail'=> $slcimail,
					'gmail'=>$gmail
					);
				$result = $this->user_model->editUser($userInfo, $id);
				if($result == true){
					$this->session->set_flashdata('success', 'User updated successfully');
				}else{
					$this->session->set_flashdata('error', 'User updation failed');
				}
				redirect('userListing');
            }
        }
    }
	function deleteuser($id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$userInfo = array('uFlag'=>0);
			$result = $this->user_model->editUser($userInfo, $id);
			redirect('userListing');
		}
	}
	function reactive($id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$userInfo = array('uFlag'=>1);
			$result = $this->user_model->editUser($userInfo, $id);
			redirect('userListing');
		}
	}
	function pageNotFound(){
		$this->global['pageTitle'] = 'RAWR : 404 - Page Not Found';
		$this->loadViews("404", $this->global, NULL, NULL);
	}
	function undermaintenance(){
		$this->global['pageTitle'] = 'RAWR : 500 - Under Maintenance';
		$this->loadViews("under", $this->global, NULL, NULL);
	}
	function server_update(){
		$update = $this->user_model->getallupdate();
		$menu = '';
		if(!empty($update)){
			foreach($update as $record){
				$menu .= '
					<li>
						<a href="'.base_url().$record->linker.'">
							<h4 class="control-sidebar-subheading">'.$record->title_note.'<br>
								<small>'.$record->desc.'</small>
							</h4>
						</a>
					</li>';
			}
		}
		$menu .= '
					<li>
						<a href="'.base_url().'server_update_tbl">
							<i class="menu-icon fa fa-level-up bg-green"></i>
							<div class="menu-info">
								<h4 class="control-sidebar-subheading">More Details...</h4>
								<p>Server update Log</p>
							</div>
						</a>
					</li>';
		echo $menu;
	}
	function server_update_tbl(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->user_model->serverupCount($searchText);
		$returns = $this->paginationCompress ( "server_update_tbl/", $count, 50 );
		$data['server_update_tbl'] = $this->user_model->serverup($searchText, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Server Updates';
		$this->loadViews("t_users/server_update_tbl", $this->global, $data, NULL);
	}
	function server_update_exe(){
		if($this->vendorId != 91000){
			$this->loadThis();
		}else{
			$linker = $this->input->post('linker');
			$title_note = $this->input->post('title_note');
			$desc = $this->input->post('desc');
			$update_info = array(
					'linker'=>$linker,
					'title_note'=>$title_note,
					'desc'=>$desc,
					'addedby'=>$this->name
				);
			$this->user_model->addupdatelog($update_info);
			redirect('server_update_tbl');
		}
	}
	function getbugpersen(){
		$persen = $this->user_model->getbugpersen();
		$total = $this->user_model->getbugtotal();
		if(!empty($persen)){
			if($persen < 60){$color = 'danger';}
			if($persen >= 60){$color = 'warning';}
			if($persen >= 80){$color = 'success';}
			echo '
				<a href="'.base_url().'bugreport">
					<h4 class="control-sidebar-subheading">
						<i class="fa fa-bug text-red"></i> Bug Fix <small>('.$total.' left)</small>
						<span class="label label-'.$color.' pull-right">'.number_format($persen, 0, ',', '').'%</span>
					</h4>
					<div class="progress progress-xxs">
						<div class="progress-bar progress-bar-'.$color.'" style="width: '.number_format($persen, 0, ',', '').'%"></div>
					</div>
				</a>';
		}
	}
	function ilie(){
		$this->global['pageTitle'] = 'I LIED';
		$this->loadViews("404lie", $this->global, NULL, NULL);
	}
	function demo_ver(){
		$this->global['pageTitle'] = 'DEMO';
		$this->loadViews("demo", $this->global, NULL, NULL);
	}
}

?>
