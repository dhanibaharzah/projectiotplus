<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_mixing extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('iot_mixing_model');
        $this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
	
	public function material()
    {
		$toDate = $this->security->xss_clean($this->input->post('toDate'));
		$data['toDate'] = $toDate;
		$this->load->library('pagination');
		$count = $this->iot_mixing_model->matCount($toDate);
		
		$returns = $this->paginationCompress ( 'material/', $count, 10);
		
		$data['tanktable'] = $this->iot_mixing_model->tanklevel($toDate, $returns["page"], $returns["segment"]);
		
		$this->global['pageTitle'] = 'RAWR : Materials';
		
		$this->loadViews("iot_mixing/material", $this->global, $data, NULL);
    }
	
}

?>
