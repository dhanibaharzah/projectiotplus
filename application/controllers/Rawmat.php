<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Rawmat extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rawmat_model');
        $this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
    
	public function rawcement(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
//==		
//==
		$this->load->library('pagination'); //koding paginasi
		$count = $this->rawmat_model->rawcementCount($searchText); //tambahain , $toDate nanti setelah $no
		$returns = $this->paginationCompress ( "rawcement/", $count, 20);
		
		$data['rawmatcement']= $this->rawmat_model->rawcement($searchText, $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : Raw Material';
		$this->loadViews("rawmat/rawcement", $this->global, $data, NULL);
	}

	function rawcementchart(){
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');

		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;

		$result = $this->rawmat_model->cementchart($fromDate, $toDate);
		$hard = '';
		$time = '';
		if(!empty($result))
		{
			
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->date)));
				$hard .= '{x:'.$timeunix.',y:'.$record->hardness.'}, ';
				$time .= '{x:'.$timeunix.',y:'.$record->initial_set_time.'}, ';
			}
		}
		$data['hard'] = substr($hard, 0, -2);
		$data['time'] = substr($time, 0, -2);

		$this->global['pageTitle'] = 'RAWR : Raw Material';
		$this->loadViews("rawmat/rawcementchart", $this->global, $data, NULL);
	}

	function rawlime(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->rawmat_model->rawlimeCount($searchText); //tambahain , $toDate nanti setelah $no
		$returns = $this->paginationCompress ( "rawlime/", $count, 20);
		
		$data['rawmatlime']= $this->rawmat_model->rawlime($searchText, $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : Raw Material';
		$this->loadViews("rawmat/rawlime", $this->global, $data, NULL);
	}

	function rawlimechart(){
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');

		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;

		$result = $this->rawmat_model->limechart($fromDate, $toDate);
		$cao = '';
		$t60 = '';
		$tmaks = '';
		$sieve = '';
		if(!empty($result))
		{
			
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->date)));
				$cao .= '{x:'.$timeunix.',y:'.$record->cao.'}, ';
				$t60 .= '{x:'.$timeunix.',y:'.$record->t60.'}, ';
				$tmaks .= '{x:'.$timeunix.',y:'.$record->tmaks.'}, ';
				$sieve .= '{x:'.$timeunix.',y:'.$record->shieve.'}, ';
			}
		}
		$data['t60'] = substr($t60, 0, -2);
		$data['cao'] = substr($cao, 0, -2);
		$data['tmax'] = substr($tmaks, 0, -2);
		$data['sieve'] = substr($sieve, 0, -2);

		$this->global['pageTitle'] = 'RAWR : Raw Material';
		$this->loadViews("rawmat/rawlimechart", $this->global, $data, NULL);
	}

	function rawsand(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->rawmat_model->rawsandCount($searchText); //tambahain , $toDate nanti setelah $no
		$returns = $this->paginationCompress ( "rawsand/", $count, 20);
		
		$data['rawmatsand']= $this->rawmat_model->rawsand($searchText, $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : Raw Material';
		$this->loadViews("rawmat/rawsand", $this->global, $data, NULL);
	}
}
