<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_automated extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('iot_automated_model');
        $this->isLoggedIn();
    }
    
    function RAWRList(){
		if($this->vendorId >= 90000 and $this->vendorId < 100000){
			$cekmail = $this->iot_automated_model->getUserInfoxx($this->vendorId);
		}elseif($this->vendorId >= 30000 and $this->vendorId < 40000){
			$cekmail = $this->iot_automated_model->getUserInfocbm($this->vendorId);
		}
		if($this->vendorId >= 90000 and $this->vendorId < 100000 and $this->adminapp == 0){
			$data['alarm_table'] = $this->iot_automated_model->alarm_table(1);
		}elseif($this->vendorId >= 30000 and $this->vendorId < 40000){
			$data['alarm_table'] = $this->iot_automated_model->alarm_table(2);
		}elseif($this->adminapp == 1){
			$data['alarm_table'] = $this->iot_automated_model->alarm_table(NULL);
		}
		$data['useremail'] = $cekmail->gmail;
		$data['lineid'] = $cekmail->lineid;
		$data['followed'] = $this->iot_automated_model->followed($cekmail->gmail, $cekmail->lineid);
		$this->global['pageTitle'] = 'RAWR Listing';
	
		$this->loadViews("iot_RAWR/RAWRList", $this->global, $data, NULL);
    }

    function followtopic($alarmid = '')
    {
		if($this->vendorId >= 90000 and $this->vendorId < 100000){
			$cekmail = $this->iot_automated_model->getUserInfoxx($this->vendorId);
		}elseif($this->vendorId >= 30000 and $this->vendorId < 40000){
			$cekmail = $this->iot_automated_model->getUserInfocbm($this->vendorId);
		}
		$cek_list = $this->iot_automated_model->cektopic($cekmail->gmail, $alarmid);
		if(!empty($cek_list)){
			redirect('rawr');
		}else{
			$topic = array('email'=>$cekmail->gmail, 'alarmid'=>$alarmid);
			
			$result = $this->iot_automated_model->followtopic($topic);
			redirect('rawr');
		}	
		
    }
	
	function followtopicline($alarmid = '')
    {
		if($this->vendorId >= 90000 and $this->vendorId < 100000){
			$cekmail = $this->iot_automated_model->getUserInfoxx($this->vendorId);
		}elseif($this->vendorId >= 30000 and $this->vendorId < 40000){
			$cekmail = $this->iot_automated_model->getUserInfocbm($this->vendorId);
		}
		$cek_list = $this->iot_automated_model->cektopicline($cekmail->lineid, $alarmid);
		if(!empty($cek_list)){
			redirect('rawr');
		}else{
			$topic = array('line'=>$cekmail->lineid, 'alarmid'=>$alarmid);
			
			$result = $this->iot_automated_model->followtopic($topic);
			redirect('rawr');
		}	
		
    }
	
	function unfollowtopic($alarmid = '')
    {
		$topic = array('isvalid'=>0);
		
		$result = $this->iot_automated_model->updatetopic($alarmid, $topic);
		redirect('rawr');
    }
	
	function pingme()
	{
		$this->load->library('email');
			
		if($this->vendorId >= 90000 and $this->vendorId < 100000){
			$cekmail = $this->iot_automated_model->getUserInfoxx($this->vendorId);
		}elseif($this->vendorId >= 30000 and $this->vendorId < 40000){
			$cekmail = $this->iot_automated_model->getUserInfocbm($this->vendorId);
		}
		
		$subject = 'Ping!';
		$message = '<br><p>Ping!</p><br>';
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
			->to($cekmail->gmail)
			->subject($subject)
			->message($body)
			->send();

		var_dump($result);
		echo '<br />';
		echo $this->email->print_debugger();
		redirect('rawr');
	}
}

?>
