<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Autoclave extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('autoclave_model');
        $this->isLoggedIn(); 
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
    
    public function index()
    {
        $this->isLoggedIn();
    }
    function autoclave()
    {
            $ac1_x = $this->autoclave_model->ac1_pres();
			$ac1_y = $this->autoclave_model->ac1_temp();
			$ac2_x = $this->autoclave_model->ac2_pres();
			$ac2_y = $this->autoclave_model->ac2_temp();
			$ac3_x = $this->autoclave_model->ac3_pres();
			$ac3_y = $this->autoclave_model->ac3_temp();
			$ac4_x = $this->autoclave_model->ac4_pres();
			$ac4_y = $this->autoclave_model->ac4_temp();
			$ac5_x = $this->autoclave_model->ac5_pres();
			$ac5_y = $this->autoclave_model->ac5_temp();
			$ac6_x = $this->autoclave_model->ac6_pres();
			$ac6_y = $this->autoclave_model->ac6_temp();
			$ac7_x = $this->autoclave_model->ac7_pres();
			$ac7_y = $this->autoclave_model->ac7_temp();
			$ac8_x = $this->autoclave_model->ac8_pres();
			$ac8_y = $this->autoclave_model->ac8_temp();
			$ac1x = array_reverse($ac1_x, true);
			$ac1y = array_reverse($ac1_y, true);
			$ac2x = array_reverse($ac2_x, true);
			$ac2y = array_reverse($ac2_y, true);
			$ac3x = array_reverse($ac3_x, true);
			$ac3y = array_reverse($ac3_y, true);
			$ac4x = array_reverse($ac4_x, true);
			$ac4y = array_reverse($ac4_y, true);
			$ac5x = array_reverse($ac5_x, true);
			$ac5y = array_reverse($ac5_y, true);
			$ac6x = array_reverse($ac6_x, true);
			$ac6y = array_reverse($ac6_y, true);
			$ac7x = array_reverse($ac7_x, true);
			$ac7y = array_reverse($ac7_y, true);
			$ac8x = array_reverse($ac8_x, true);
			$ac8y = array_reverse($ac8_y, true);
			$dataac1x = '';
			$dataac1y = '';
			$dataac2x = '';
			$dataac2y = '';
			$dataac3x = '';
			$dataac3y = '';
			$dataac4x = '';
			$dataac4y = '';
			$dataac5x = '';
			$dataac5y = '';
			$dataac6x = '';
			$dataac6y = '';
			$dataac7x = '';
			$dataac7y = '';
			$dataac8x = '';
			$dataac8y = '';
			if(!empty($ac1x)){
				foreach($ac1x as $resultt)
				$dataac1x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac1y)){
				foreach($ac1y as $resultp)
				$dataac1y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			if(!empty($ac2x)){
				foreach($ac2x as $resultt)
				$dataac2x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac2y)){
				foreach($ac2y as $resultp)
				$dataac2y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			if(!empty($ac3x)){
				foreach($ac3x as $resultt)
				$dataac3x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac3y)){
				foreach($ac3y as $resultp)
				$dataac3y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			if(!empty($ac4x)){
				foreach($ac4x as $resultt)
				$dataac4x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac4y)){
				foreach($ac4y as $resultp)
				$dataac4y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			if(!empty($ac5x)){
				foreach($ac5x as $resultt)
				$dataac5x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac5y)){
				foreach($ac5y as $resultp)
				$dataac5y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			if(!empty($ac6x)){
				foreach($ac6x as $resultt)
				$dataac6x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac6y)){
				foreach($ac6y as $resultp)
				$dataac6y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			if(!empty($ac7x)){
				foreach($ac7x as $resultt)
				$dataac7x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac7y)){
				foreach($ac7y as $resultp)
				$dataac7y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			if(!empty($ac8x)){
				foreach($ac8x as $resultt)
				$dataac8x .= '{x:'.$resultt['timestamp']['$date'].', y:'.$resultt['payload'].'}, ';
			}
			if(!empty($ac8y)){
				foreach($ac8y as $resultp)
				$dataac8y .= '{x:'.$resultp['timestamp']['$date'].', y:'.$resultp['payload'].'}, ';
			}
			$data['ac1x'] = substr($dataac1x, 0, -2);
			$data['ac1y'] = substr($dataac1y, 0, -2);
			$data['ac2x'] = substr($dataac2x, 0, -2);
			$data['ac2y'] = substr($dataac2y, 0, -2);
			$data['ac3x'] = substr($dataac3x, 0, -2);
			$data['ac3y'] = substr($dataac3y, 0, -2);
			$data['ac4x'] = substr($dataac4x, 0, -2);
			$data['ac4y'] = substr($dataac4y, 0, -2);
			$data['ac5x'] = substr($dataac5x, 0, -2);
			$data['ac5y'] = substr($dataac5y, 0, -2);
			$data['ac6x'] = substr($dataac6x, 0, -2);
			$data['ac6y'] = substr($dataac6y, 0, -2);
			$data['ac7x'] = substr($dataac7x, 0, -2);
			$data['ac7x'] = substr($dataac7y, 0, -2);
			$data['ac8x'] = substr($dataac8x, 0, -2);
			$data['ac8y'] = substr($dataac8y, 0, -2);
			$this->global['pageTitle'] = 'RAWR : Autoclave';
            
            $this->loadViews("autoclave/autoclave", $this->global, $data, NULL);
                
    }
	
	public function ac($no = '')
    {
		//$toDate = '';
		//$this->load->library('form_validation');
		$toDate = $this->security->xss_clean($this->input->post('toDate'));
		$data['toDate'] = $toDate;
		
		$ac_x = $this->autoclave_model->sqlac($no, $toDate);
		$acx = array_reverse($ac_x, true);
		
		$dataacx = '';
		$dataacy = '';
		if(!empty($acx)){
			foreach($acx as $result){
				$eek = date('U', strtotime($result->timestamp))*1000;
				$dataacx .= '{x:'.$eek.', y:'.$result->pressure.'}, ';
				$dataacy .= '{x:'.$eek.', y:'.$result->temperature.'}, ';
			}
		}
		$data['acx'] = substr($dataacx, 0, -2);
		$data['acy'] = substr($dataacy, 0, -2);
		$data['no'] = $no;
		
		$this->load->library('pagination');
		$count = $this->autoclave_model->sqlacCount($no, $toDate);
		
		$returns = $this->paginationCompress ( 'ac/'.$no.'/', $count, 60, 3);
		
		$data['actable'] = $this->autoclave_model->sqlact($no, $toDate, $returns["page"], $returns["segment"]);
		
		$this->global['pageTitle'] = 'RAWR : Autoclave '.$no;
		
		$this->loadViews("autoclave/ac", $this->global, $data, NULL);
    }
	
	function sautoclave()
    {
			$this->global['pageTitle'] = 'RAWR : Autoclave';
            
            $this->loadViews("autoclave/sautoclave", $this->global, NULL, NULL);
    }
	
	function boilerinput()
    {
		$data['username'] = $this->global ['name'];
		$data['boiler'] = $this->autoclave_model->getboilerlast();
		$data['boiler2'] = $this->autoclave_model->getboiler2last();
		$this->global['pageTitle'] = 'RAWR : Boiler Input';
		
		$this->loadViews("autoclave/boilerinput", $this->global, $data, NULL);
    }
	function addboilerinput1()
    {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('boiler_steam_press','boiler steam press','trim|required|max_length[10]');
		$this->form_validation->set_rules('feed_water_pump','feed water pump','required|max_length[255]');
		$this->form_validation->set_rules('water_flow','water flow','required|max_length[255]');
		$this->form_validation->set_rules('steam_out','steam out','required|max_length[255]');
		$this->form_validation->set_rules('feed_tank_lvl','feed tank lvl','required|max_length[255]');
		$this->form_validation->set_rules('id_fan','id fan','required|max_length[255]');
		$this->form_validation->set_rules('fd_fan','fd fan','required|max_length[255]');
		$this->form_validation->set_rules('spider_fan','spider fan','required|max_length[255]');
		$this->form_validation->set_rules('secondary_dumper','secondary dumper','required|max_length[255]');
		$this->form_validation->set_rules('flue_gas_temp','flue gas temp','required|max_length[255]');
		$this->form_validation->set_rules('bed_temp1','bed temp1','required|max_length[255]');
		$this->form_validation->set_rules('bed_temp2','bed temp2','required|max_length[255]');
		$this->form_validation->set_rules('water_lvl_boiler','water lvl boiler','required|max_length[255]');
		$this->form_validation->set_rules('screw_feed_1','screw feed 1','required|max_length[255]');
		$this->form_validation->set_rules('screw_feed_2','screw feed 2','required|max_length[255]');
		$this->form_validation->set_rules('deaerator','deaerator','required|max_length[255]');
		$this->form_validation->set_rules('blowdown','blowdown','required|max_length[255]');
		$this->form_validation->set_rules('recir_fan','recir_fan','required|max_length[255]');
		$this->form_validation->set_rules('acs_out1b','acs_out1b','required|max_length[255]');
		$this->form_validation->set_rules('acs_out2b','acs_out2b','required|max_length[255]');
		$this->form_validation->set_rules('acs_out1','acs_out1','required|max_length[255]');
		$this->form_validation->set_rules('acs_out2','acs_out2','required|max_length[255]');
		$this->form_validation->set_rules('acs_out3','acs_out3','required|max_length[255]');
		$this->form_validation->set_rules('acs_out4','acs_out4','required|max_length[255]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->boilerinput();
		}
		else
		{
			$boiler_steam_press = $this->input->post('boiler_steam_press');
			$feed_water_pump = $this->input->post('feed_water_pump');
			$water_flow = $this->input->post('water_flow');
			$steam_out = $this->input->post('steam_out');
			$feed_tank_lvl = $this->input->post('feed_tank_lvl');
			$id_fan = $this->input->post('id_fan');
			$fd_fan = $this->input->post('fd_fan');
			$spider_fan = $this->input->post('spider_fan');
			$secondary_dumper = $this->input->post('secondary_dumper');
			$flue_gas_temp = $this->input->post('flue_gas_temp');
			$bed_temp1 = $this->input->post('bed_temp1');
			$bed_temp2 = $this->input->post('bed_temp2');
			$water_lvl_boiler = $this->input->post('water_lvl_boiler');
			$screw_feed_1 = $this->input->post('screw_feed_1');
			$screw_feed_2 = $this->input->post('screw_feed_2');
			$deaerator = $this->input->post('deaerator');
			$blowdown = $this->input->post('blowdown');
			$recir_fan = $this->input->post('recir_fan');
			$acs_out1b = $this->input->post('acs_out1b');
			$acs_out2b = $this->input->post('acs_out2b');
			$acs_out1 = $this->input->post('acs_out1');
			$acs_out2 = $this->input->post('acs_out2');
			$acs_out3 = $this->input->post('acs_out3');
			$acs_out4 = $this->input->post('acs_out4');
			
			$boiler1Info = array(
				'user'=>$this->global ['name'],
				'boiler_steam_press'=>$boiler_steam_press, 
				'feed_water_pump'=>$feed_water_pump, 
				'water_flow'=>$water_flow, 
				'steam_out'=> $steam_out,
				'feed_tank_lvl'=>$feed_tank_lvl, 
				'id_fan'=>$id_fan, 
				'fd_fan'=>$fd_fan, 
				'spider_fan'=>$spider_fan, 
				'secondary_dumper'=>$secondary_dumper,
				'flue_gas_temp'=>$flue_gas_temp,
				'bed_temp1'=>$bed_temp1,
				'bed_temp2'=>$bed_temp2,
				'water_lvl_boiler'=>$water_lvl_boiler,
				'screw_feed_1'=>$screw_feed_1,
				'screw_feed_2'=>$screw_feed_2,
				'deaerator'=>$deaerator,
				'blowdown'=>$blowdown,
				'recir_fan'=>$recir_fan,
				'acs_out1b'=>$acs_out1b,
				'acs_out2b'=>$acs_out2b,
				'acs_out1'=>$acs_out1,
				'acs_out2'=>$acs_out2,
				'acs_out3'=>$acs_out3,
				'acs_out4'=>$acs_out4
				);
				
			$result = $this->autoclave_model->addboilerinput1($boiler1Info);
			
			if($result > 0)
			{
				$this->session->set_flashdata('success', 'New Boiler data recorded successfully');
			}
			else
			{
				$this->session->set_flashdata('error', 'Boiler data recorded failed');
			}
			
			redirect('boilerinput');
		}
        
    }
	function addboilerinput2()
    {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('water_0','water','trim|required|max_length[10]');
		$this->form_validation->set_rules('steam_0','steam','required|max_length[255]');
		$this->form_validation->set_rules('kwh_0','kwh','required|max_length[255]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->boilerinput();
		}
		else
		{
			$water_0 = $this->input->post('water_0');
			$steam_0 = $this->input->post('steam_0');
			$kwh_0 = $this->input->post('kwh_0');
			
			$boiler2Info = array(
				'user'=>$this->global ['name'],
				'water_0'=>$water_0, 
				'steam_0'=>$steam_0, 
				'kwh_0'=>$kwh_0
				);
				
			$result = $this->autoclave_model->addboilerinput2($boiler2Info);
			
			if($result > 0)
			{
				$this->session->set_flashdata('success', 'New Boiler data recorded successfully');
			}
			else
			{
				$this->session->set_flashdata('error', 'Boiler data recorded failed');
			}
			
			redirect('boilerinput');
		}
        
    }
	
	function addboilerinput3()
    {
		$line_run = $this->input->post('line_run');
		$flow_rate = $this->input->post('flow_rate');
		$sc_1 = $this->input->post('sc_1');
		$sc_2 = $this->input->post('sc_2');
		$sc_3 = $this->input->post('sc_3');
		$sc_4 = $this->input->post('sc_4');
		$sf_1 = $this->input->post('sf_1');
		$sf_2 = $this->input->post('sf_2');
		$sf_3 = $this->input->post('sf_3');
		$sf_4 = $this->input->post('sf_4');
		$ca_4 = $this->input->post('ca_4');
		$ce_1 = $this->input->post('ce_1');
		$ce_2 = $this->input->post('ce_2');
		$ce_3 = $this->input->post('ce_3');
		$ce_4 = $this->input->post('ce_4');
		$ae_1 = $this->input->post('ae_1');
		$ae_2 = $this->input->post('ae_2');
		$ae_3 = $this->input->post('ae_3');
		$ae_4 = $this->input->post('ae_4');
		$bt_1 = $this->input->post('bt_1');
		$bt_2 = $this->input->post('bt_2');
		$bt_3 = $this->input->post('bt_3');
		$bt_4 = $this->input->post('bt_4');
		$bf_1 = $this->input->post('bf_1');
		$bf_2 = $this->input->post('bf_2');
		$bf_3 = $this->input->post('bf_3');
		$bf_4 = $this->input->post('bf_4');
		$bl_1 = $this->input->post('bl_1');
		$bl_2 = $this->input->post('bl_2');
		$bl_3 = $this->input->post('bl_3');
		$bl_4 = $this->input->post('bl_4');
		$bd_1 = $this->input->post('bd_1');
		$bd_2 = $this->input->post('bd_2');
		$bd_3 = $this->input->post('bd_3');
		$bd_4 = $this->input->post('bd_4');
		
		$boiler3Info = array(
			'user'=>$this->global ['name'],
			'line_run'=>$line_run, 
			'flow_rate'=>$flow_rate, 
			'sc_1'=>$sc_1,
			'sc_2'=>$sc_2,
			'sc_3'=>$sc_3,
			'sc_4'=>$sc_4,
			'sf_1'=>$sf_1,
			'sf_2'=>$sf_2,
			'sf_3'=>$sf_3,
			'sf_4'=>$sf_4,
			'ca_4'=>$ca_4,
			'ce_1'=>$ce_1,
			'ce_2'=>$ce_2,
			'ce_3'=>$ce_3,
			'ce_4'=>$ce_4,
			'ae_1'=>$ae_1,
			'ae_2'=>$ae_2,
			'ae_3'=>$ae_3,
			'ae_4'=>$ae_4,
			'bt_1'=>$bt_1,
			'bt_2'=>$bt_2,
			'bt_3'=>$bt_3,
			'bt_4'=>$bt_4,
			'bf_1'=>$bf_1,
			'bf_2'=>$bf_2,
			'bf_3'=>$bf_3,
			'bf_4'=>$bf_4,
			'bl_1'=>$bl_1,
			'bl_2'=>$bl_2,
			'bl_3'=>$bl_3,
			'bl_4'=>$bl_4,
			'bd_1'=>$bd_1,
			'bd_2'=>$bd_2,
			'bd_3'=>$bd_3,
			'bd_4'=>$bd_4
			);
			
		$result = $this->autoclave_model->addboilerinput3($boiler3Info);
		
		redirect('boilerinput');
        
    }
	
	function boilerhour()
    {
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$result = $this->autoclave_model->gethourlyusage($fromDate, $toDate);
		if(!empty($result))
		{
			$steam = '';
			$water = '';
			$bed1 = '';
			$bed2 = '';
			$press = '';
			$palm1 = '';
			$palm2 = '';
			$idfan = '';
			$fdfan = '';
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->timestamp)));
				$steam .= '{x:'.$timeunix.',y:'.$record->steam_out.'}, ';
				$water .= '{x:'.$timeunix.',y:'.$record->water.'}, ';
				$bed1 .= '{x:'.$timeunix.',y:'.$record->bed_temp1.'}, ';
				$bed2 .= '{x:'.$timeunix.',y:'.$record->bed_temp2.'}, ';
				$press .= '{x:'.$timeunix.',y:'.$record->boiler_steam_press.'}, ';
				$palm1 .= '{x:'.$timeunix.',y:'.$record->screw_feed_1.'}, ';
				$palm2 .= '{x:'.$timeunix.',y:'.$record->screw_feed_2.'}, ';
				$idfan .= '{x:'.$timeunix.',y:'.$record->id_fan.'}, ';
				$fdfan .= '{x:'.$timeunix.',y:'.$record->fd_fan.'}, ';
			}
		}
		$data['steam'] = substr($steam, 0, -2);
		$data['water'] = substr($water, 0, -2);
		$data['bed1'] = substr($bed1, 0, -2);
		$data['bed2'] = substr($bed2, 0, -2);
		$data['press'] = substr($press, 0, -2);
		$data['palm1'] = substr($palm1, 0, -2);
		$data['palm2'] = substr($palm2, 0, -2);
		$data['idfan'] = substr($idfan, 0, -2);
		$data['fdfan'] = substr($fdfan, 0, -2);
		
		$data['hour'] = $result;
		
		$this->global['pageTitle'] = 'RAWR : Boiler Hourly';
		
		$this->loadViews("autoclave/boilerhour", $this->global, $data, NULL);
    }
	function boilerday()
    {
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$result = $this->autoclave_model->getdailyusage($fromDate, $toDate);
		if(!empty($result))
		{
			$water = '';
			$steam = '';
			$kwh = '';
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->timestamp)));
				$water .= '{x:'.$timeunix.',y:'.$record->water.'}, ';
				$steam .= '{x:'.$timeunix.',y:'.$record->steam.'}, ';
				$kwh .= '{x:'.$timeunix.',y:'.$record->kwh.'}, ';
			}
		}
		$data['water'] = substr($water, 0, -2);
		$data['steam'] = substr($steam, 0, -2);
		$data['kwh'] = substr($kwh, 0, -2);
		
		$data['day'] = $result;
		$this->global['pageTitle'] = 'RAWR : Boiler Hourly';
		
		$this->loadViews("autoclave/boilerday", $this->global, $data, NULL);
    }
}

?>