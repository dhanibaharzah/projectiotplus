<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Srmi_vol extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('srmivol_model');
		$this->isLoggedIn();
    }

    function srmivol(){
        $arealist = $this->input->post('area');
        $area = $this->srmivol_model->get_arealist($arealist);
        $breakeven = $this->input->post('breakeven');
        $order = $this->input->post('order');
        $actual = $this->input->post('actual');
        $record_date = $this->input->post('record_date');

        $daily = array(
                'id_area'=>$area,
                'breakeven'=>$breakeven,
                'order_srmi'=>$order,
                'actual'=>$actual,
                'record_date'=>$record_date
        );

        $recordaily = $this->srmivol_model->dailyrec($daily);
        redirect('srmivolrec');
    }

    function srmivolrec(){
        $data['dailyrec'] = $this->srmivol_model->get_area();
        $data['id'] = $this->name;

        $seldate = $this->input->post('record_date');
        $data['seldate'] = $seldate;

        $this->global['pageTitle'] = 'RAWR : Daily Report';
		$this->loadViews("CBM_salesvol/dailyrep_srmi", $this->global, $data, NULL);
    }
    
}