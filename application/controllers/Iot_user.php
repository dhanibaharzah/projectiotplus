<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_user extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_user_model');
		$this->isLoggedIn();
	}
	public function downtimelog(){
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$data['problem'] = $this->iot_user_model->problemx($fromDate, $toDate);
		$this->global['pageTitle'] = 'RAWR : Downtime Log';
		$this->loadViews("downtimelog", $this->global, $data , NULL);
	}
	public function about(){
		$this->global['pageTitle'] = 'RAWR : About';
		$this->loadViews("about", $this->global, NULL , NULL);
	}
}

?>
