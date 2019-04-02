<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Sr_main extends BaseController
{
    public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->isLoggedIn(); 
	}
	function sr_view(){
		$this->global['pageTitle'] = 'RAWR: Store';
		$this->loadViews("sr_view/sr_view", $this->global, NULL, NULL);
	}
}

?>
