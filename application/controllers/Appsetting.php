<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Appsetting extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('appset_model');
        $this->isLoggedIn();   
    }


	function appset(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->appset_model->appsetC($searchText);
		$returns = $this->paginationCompress ( "appset/", $count, 10 );
		$data['approval'] = $this->appset_model->appset($searchText, $returns["page"], $returns["segment"]);
		$userrole = $this->appset_model->getuserinfo($this->vendorId);
		$data['userdata'] = $userrole;
		$this->global['pageTitle'] = 'RAWR : Approval Route';
		$this->loadViews("appset", $this->global, $data, NULL);
	}
	
	function userset(){
		$id = $this->input->post('id');
		$cdprj = $this->input->post('role');
		$appsub = $this->input->post('appsub');
		$appstock = $this->input->post('appstock');
		
		$userInfo = array(
				'appsub'=>$appsub,
				'appstock'=>$appstock
			);
		$userrole = $this->appset_model->userset($userInfo, $id);
		redirect('appset');
	}
}
?>
