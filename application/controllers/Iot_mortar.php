<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_mortar extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('iot_mortar_model');
        $this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
    
	public function cement(){
        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->iot_mortar_model-> cementCount($fromDate, $toDate); //tambahain , $toDate nanti setelah $no
		$returns = $this->paginationCompress ( "cement/", $count, 25);
		$data['mortarcement']= $this->iot_mortar_model-> cement($fromDate, $toDate, $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$this->global['pageTitle'] = 'RAWR : Mortar';
		$this->loadViews("iot_mortar/cement", $this->global, $data, NULL);
	}
	
	public function lime(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->iot_mortar_model-> limeCount($fromDate, $toDate); //tambahain , $toDate nanti setelah $no
		$returns = $this->paginationCompress ( "lime/", $count, 25);
		$data['mortarlime']= $this->iot_mortar_model-> lime($fromDate, $toDate, $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$this->global['pageTitle'] = 'RAWR : Mortar';
		$this->loadViews("iot_mortar/lime", $this->global, $data, NULL);
	}
	
	public function batch(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
			
		$this->load->library('pagination'); //koding paginasi
		$count = $this->iot_mortar_model-> batchCount($fromDate, $toDate); //tambahain , $toDate nanti setelah $no
		$returns = $this->paginationCompress ( "batch/", $count, 25);
		$data['mortarbatch'] = $this->iot_mortar_model-> batch($fromDate, $toDate, $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$this->global['pageTitle'] = 'RAWR : Mortar';
		$this->loadViews("iot_mortar/batch", $this->global, $data, NULL);
	}	
}
