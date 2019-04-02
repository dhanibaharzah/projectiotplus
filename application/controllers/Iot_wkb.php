<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_wkb extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_wkb_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	function iot_curct(){
		$this->load->model('iot_cutting_model');
		$lastcake = $this->iot_cutting_model->newcake();
		$nowt = (date('U') - date('U', strtotime($lastcake->timestamp)));
		if($nowt < 0){
			echo '0 sec';
		}
		if($nowt >= 0 and $nowt < 60){
			echo number_format($nowt, 0, '.', '').' sec';
		}
		if($nowt >= 60 and $nowt < 3600){
			echo number_format($nowt/60, 2, '.', '').' mins';
		}
		if($nowt >= 3600 and $nowt < 86400){
			echo number_format($nowt/3600, 2, '.', '').' hours';
		}
		if($nowt >= 86400){
			echo number_format($nowt/86400, 2, '.', '').' days';
		}
	}
	function iot_cuttingwkb(){
		$this->global['pageTitle'] = 'RAWR : Cutting Machine Overview';
		$this->loadViews("iot_wkb/overview", $this->global, NULL, NULL);
	}
	function iot_refeeding(){
		$this->global['pageTitle'] = 'RAWR : Cutting Board Refeeder';
		$this->loadViews("iot_wkb/cuttingboard", $this->global, NULL, NULL);
	}
	function iot_js_refeeding_1(){
		$data['mc_name_1'] = 'Lifter_Hz';
		$data['mc_name_2'] = 'Lifter_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_lifting_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_lifting_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_refeeding_1';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_refeeding_1(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_lifting_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_lifting_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_lifting_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_lifting_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_refeeding_1'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_refeeding_1'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_refeeding_2(){
		$data['mc_name_1'] = 'Travel_Hz';
		$data['mc_name_2'] = 'Travel_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_travelling_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_travelling_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_refeeding_2';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_refeeding_2(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_travelling_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_travelling_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_travelling_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_travelling_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_refeeding_2'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_refeeding_2'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_tilting1(){
		$this->global['pageTitle'] = 'RAWR : Tilting 1';
		$this->loadViews("iot_wkb/tilting1", $this->global, NULL, NULL);
	}
	function iot_js_tilting1_1(){
		$data['mc_name_1'] = 'Hyd_Temp_1';
		$data['mc_name_2'] = 'TT1_Angle';
		$data['unit_1'] = '°C';
		$data['unit_2'] = '°';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting1_1';
		$this->load->view("iot_wkb/js_tilting", $data);
	}
	function iot_ajax_tilting1_1(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->hydraulic_tilting1_actualtemperature_temperature(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting1_tiltingdevice_angle(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches2);
			$persen2 = implode(' ', $matches2[0]);
			$persen2 = str_replace(' ', '.', $persen2);
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting1_1'=>number_format($persen1, 1, '.', ''),
			'gauge2iot_ajax_tilting1_1'=>number_format($persen2, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting1_2(){
		$data['mc_name_1'] = 'TT1_Speed';
		$data['mc_name_2'] = 'TT1_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting1_2';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting1_2(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting1_tiltingdevice_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting1_tiltingdevice_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting1_2'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting1_2'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting1_3(){
		$data['mc_name_1'] = 'TT1_Cross_Speed';
		$data['mc_name_2'] = 'TT1_Cross_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting1_3';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting1_3(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting1_crossmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting1_crossmovement_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting1_3'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting1_3'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting1_4(){
		$data['mc_name_1'] = 'TT1_CB_Speed';
		$data['mc_name_2'] = 'TT1_CB_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting1_4';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting1_4(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardmovement_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting1_4'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting1_4'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting1_5(){
		$data['mc_name_1'] = 'TT1_CB_Ar_Speed';
		$data['mc_name_2'] = 'TT1_CB_Ar_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting1_5';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting1_5(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardarrest_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardarrest_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting1_5'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting1_5'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting1_6(){
		$data['mc_name_1'] = 'TT1_FCW_Hz';
		$data['mc_name_2'] = 'TT1_FCW_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cl_t1_rw_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting1_rubbingwheel_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting1_6';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting1_6(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cl_t1_rw_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting1_rubbingwheel_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting1_rubbingwheel_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cl_t1_rw_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_tilting1_6'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_tilting1_6'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting1_7(){
		$data['mc_name_1'] = 'TT1_Car_Ar';
		$data['unit_1'] = 'barG';
		$data['limit1_1'] = 50;
		$data['limit1_2'] = 100;
		$data['limit1_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting1_7';
		$this->load->view("iot_wkb/js_1gauge", $data);
	}
	function iot_ajax_tilting1_7(){
		header("Content-type: text/json");
		$var1 = $this->iot_wkb_model->cuttingline_tilting1_castingcarearrest_pressure(); 
		if(!empty($var1)){
			preg_match_all('!\d+!', $var1->payload, $matches);
			$persen1 = implode(' ', $matches[0]);	
		}else{$persen1 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting1_7'=>number_format($persen1, 0, '.', ''),
		);
		echo json_encode($ret);
	}
	function iot_trolley(){
		$this->global['pageTitle'] = 'RAWR : Trolley';
		$this->loadViews("iot_wkb/trolley", $this->global, NULL, NULL);
	}
	function iot_js_trolley_1(){
		$data['mc_name_1'] = 'Trolley1_Hz';
		$data['mc_name_2'] = 'Trolley1_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_trolley_1';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_trolley_1(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_trolley_trolley1_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_trolley_trolley1_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_trolley_1'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_trolley_1'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_trolley_2(){
		$data['mc_name_1'] = 'Trolley2_Hz';
		$data['mc_name_2'] = 'Trolley2_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_trolley_2';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_trolley_2(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_trolley_trolley2_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_trolley_trolley2_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_trolley_2'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_trolley_2'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_crosscutter(){
		$this->global['pageTitle'] = 'RAWR : Cross Cutter';
		$this->loadViews("iot_wkb/crosscutter", $this->global, NULL, NULL);
	}
	function iot_js_crosscutter_1(){
		$data['mc_name_1'] = 'Drive_Hz';
		$data['mc_name_2'] = 'Drive_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_crosscutter_1';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_crosscutter_1(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_crosscutting_cutterdrive_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_crosscutting_cutterdrive_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_crosscutter_1'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_crosscutter_1'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_crosscutter_2(){
		$data['mc_name_1'] = 'Lifting_Hz';
		$data['mc_name_2'] = 'Lifting_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_crosscutter_2';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_crosscutter_2(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_crosscutter_2'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_crosscutter_2'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_crosscutter_3(){
		$data['mc_name_1'] = 'Vacuum_Hz';
		$data['mc_name_2'] = 'Vacuum_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_crosscutter_3';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_crosscutter_3(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_crosscutting_vacuum_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_crosscutting_vacuum_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_crosscutter_3'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_crosscutter_3'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_tilting2(){
		$this->global['pageTitle'] = 'RAWR : Tilting 2';
		$this->loadViews("iot_wkb/tilting2", $this->global, NULL, NULL);
	}
	function iot_js_tilting2_1(){
		$data['mc_name_1'] = 'Hyd_Temp_2';
		$data['mc_name_2'] = 'TT2_Angle';
		$data['unit_1'] = '°C';
		$data['unit_2'] = '°';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_1';
		$this->load->view("iot_wkb/js_tilting", $data);
	}
	function iot_ajax_tilting2_1(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->hydraulic_tilting2_actualtemperature_temperature(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting2_tiltingdevice_angle(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches2);
			$persen2 = implode(' ', $matches2[0]);
			$persen2 = str_replace(' ', '.', $persen2);
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting2_1'=>number_format($persen1, 1, '.', ''),
			'gauge2iot_ajax_tilting2_1'=>number_format($persen2, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting2_2(){
		$data['mc_name_1'] = 'TT2_Speed';
		$data['mc_name_2'] = 'TT2_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_2';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting2_2(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting2_tiltingdevice_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting2_tiltingdevice_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting2_2'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting2_2'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting2_3(){
		$data['mc_name_1'] = 'TT2_Cross_Speed';
		$data['mc_name_2'] = 'TT2_Cross_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_3';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting2_3(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting2_crossmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting2_crossmovement_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting2_3'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting2_3'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting2_4(){
		$data['mc_name_1'] = 'TT2_CB_Speed';
		$data['mc_name_2'] = 'TT2_CB_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_4';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting2_4(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardmovement_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting2_4'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting2_4'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting2_5(){
		$data['mc_name_1'] = 'TT2_CB_Ar_Speed';
		$data['mc_name_2'] = 'TT2_CB_Ar_Press';
		$data['unit_1'] = '';
		$data['unit_2'] = 'barG';
		$data['limit1_1'] = -50;
		$data['limit1_2'] = -25;
		$data['limit1_3'] = -15;
		$data['limit1_4'] = 15;
		$data['limit1_5'] = 25;
		$data['limit1_6'] = 50;
		$data['limit2_1'] = 50;
		$data['limit2_2'] = 100;
		$data['limit2_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_5';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting2_5(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardarrest_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardarrest_pressure(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting2_5'=>number_format($persen1, 0, '.', ''),
			'gauge2iot_ajax_tilting2_5'=>number_format($persen2, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting2_6(){
		$data['mc_name_1'] = 'TT2_FCW_Hz';
		$data['mc_name_2'] = 'TT2_FCW_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_6';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting2_6(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting2_rubbingwheel_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting2_rubbingwheel_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_tilting2_6'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_tilting2_6'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_tilting2_7(){
		$data['mc_name_1'] = 'TT2_Car_Ar';
		$data['unit_1'] = 'barG';
		$data['limit1_1'] = 50;
		$data['limit1_2'] = 100;
		$data['limit1_3'] = 150;
		$data['size'] = 120;
		$data['majortick1'] = '["0", "50", "100", "150"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_7';
		$this->load->view("iot_wkb/js_1gauge", $data);
	}
	function iot_ajax_tilting2_7(){
		header("Content-type: text/json");
		$var1 = $this->iot_wkb_model->cuttingline_tilting1_castingcarearrest_pressure(); 
		if(!empty($var1)){
			preg_match_all('!\d+!', $var1->payload, $matches);
			$persen1 = implode(' ', $matches[0]);	
		}else{$persen1 = 0;}
		$ret = array(
			'gauge1iot_ajax_tilting2_7'=>number_format($persen1, 0, '.', ''),
		);
		echo json_encode($ret);
	}
	function iot_js_tilting2_8(){
		$data['mc_name_1'] = 'TT2_Table_Hz';
		$data['mc_name_2'] = 'TT2_Table_A';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'A';
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_speed');
		$hz_on_100 = $hz_on_100->value;
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_current');
		$amp_on_100 = $amp_on_100->value;
		$data['limit1_1'] = -50*$hz_on_100/100;
		$data['limit1_2'] = -25*$hz_on_100/100;
		$data['limit1_3'] = -15*$hz_on_100/100;
		$data['limit1_4'] = 15*$hz_on_100/100;
		$data['limit1_5'] = 25*$hz_on_100/100;
		$data['limit1_6'] = 50*$hz_on_100/100;
		$data['limit2_1'] = 50*$amp_on_100/100;
		$data['limit2_2'] = 100*$amp_on_100/100;
		$data['limit2_3'] = 150*$amp_on_100/100;
		$data['size'] = 120;
		$data['majortick1'] = '["-50", "-25", "0", "25", "50"]';
		$data['majortick2'] = '["0", "'.number_format(0.5*$amp_on_100, 1, '.', '').'", "'.number_format(1*$amp_on_100, 1, '.', '').'", "'.number_format(1.5*$amp_on_100, 1, '.', '').'"]';
		$data['ajax_delay'] = 1000;
		$data['ajax_link'] = 'iot_ajax_tilting2_8';
		$this->load->view("iot_wkb/js_motor", $data);
	}
	function iot_ajax_tilting2_8(){
		header("Content-type: text/json");
		$var = $this->iot_wkb_model->cuttingline_tilting2_transportloader_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen1 = implode(' ', $matches[0]);
		}else{$persen1 = 0;}
		$var2 = $this->iot_wkb_model->cuttingline_tilting2_transportloader_current(); 
		if(!empty($var2)){
			preg_match_all('!\d+!', $var2->payload, $matches);
			$persen2 = implode(' ', $matches[0]);	
		}else{$persen2 = 0;}
		$amp_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_current');
		$amp_on_100 = $amp_on_100->value;
		$hz_on_100 = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_speed');
		$hz_on_100 = $hz_on_100->value;
		$ret = array(
			'gauge1iot_ajax_tilting2_8'=>number_format($persen1*$hz_on_100/100, 0, '.', ''),
			'gauge2iot_ajax_tilting2_8'=>number_format($persen2*$amp_on_100/100, 1, '.', '')
		);
		echo json_encode($ret);
	}
	
//=======================================OLD VER + CHART VIEW =========================================================

//===========================================================================CROSS CUTTING==========================================================================
	function iot_js_crosscutting_overview(){
		//iot_js_cuttingline_crosscutting_cutterdrive_current=======================================================================================================
		$var = $this->iot_wkb_model->cuttingline_crosscutting_cutterdrive_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_crosscutting_cutterdrive_current = '
				<h5><b>Cutter Drive (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_crosscutting_cutterdrive_current = '';}
		//iot_js_cuttingline_crosscutting_cutterdrive_speed==========================================================================================================
		$var = $this->iot_wkb_model->cuttingline_crosscutting_cutterdrive_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$value = ($persen/100)*$getscale->value;
			$iot_js_cuttingline_crosscutting_cutterdrive_speed = '
				<h5><b>Cutter Drive (Hz)</b><span class="label label-primary pull-right">'.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_crosscutting_cutterdrive_speed = '';}
		//iot_js_cuttingline_crosscutting_liftingunit_current========================================================================================================
		$var = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_crosscutting_liftingunit_current = '
				<h5><b>Lifting Unit (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_crosscutting_liftingunit_current = '';}
		//iot_js_cuttingline_crosscutting_liftingunit_position=======================================================================================================
		$var = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_position(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_crosscutting_liftingunit_position = $persen;
		}else{$iot_js_cuttingline_crosscutting_liftingunit_position = '';}
		//iot_js_cuttingline_crosscutting_liftingunit_speed==========================================================================================================
		$var = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$value = ($persen/100)*$getscale->value;
			$iot_js_cuttingline_crosscutting_liftingunit_speed = '
				<h5><b>Lifting Unit (Hz)</b><span class="label label-primary pull-right">'.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_crosscutting_liftingunit_speed = '';}
		//iot_js_cuttingline_crosscutting_vacuum_current============================================================================================================
		$var = $this->iot_wkb_model->cuttingline_crosscutting_vacuum_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_crosscutting_vacuum_current = '
				<h5><b>Vacuum (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_crosscutting_vacuum_current = '';}
		//iot_js_cuttingline_crosscutting_vacuum_speed==============================================================================================================
		$var = $this->iot_wkb_model->cuttingline_crosscutting_vacuum_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$value = ($persen/100)*$getscale->value;
			$iot_js_cuttingline_crosscutting_vacuum_speed = '
				<h5><b>Vacuum (Hz)</b><span class="label label-primary pull-right">'.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_crosscutting_vacuum_speed = '';}
		echo '<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Cross Cutting, Pos: '.$iot_js_cuttingline_crosscutting_liftingunit_position.'</h3>
					</div>
					<div class="box-body">
						<div class="col-md-4">
							'.$iot_js_cuttingline_crosscutting_cutterdrive_current.'
							'.$iot_js_cuttingline_crosscutting_cutterdrive_speed.'
						</div>
						<div class="col-md-4">
							'.$iot_js_cuttingline_crosscutting_liftingunit_current.'
							'.$iot_js_cuttingline_crosscutting_liftingunit_speed.'
						</div>
						<div class="col-md-4">
							'.$iot_js_cuttingline_crosscutting_vacuum_current.'
							'.$iot_js_cuttingline_crosscutting_vacuum_speed.'
						</div>
					</div>
				</div>';
	}
	function iot_crosscutter_t($unix){
		$cutterdriveA = $this->iot_wkb_model->cuttingline_crosscutting_cutterdrive_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_crosscutting_cutterdrive_speed');
		if(!empty($cutterdriveA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($cutterdriveA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$cutterdriveHz = $this->iot_wkb_model->cuttingline_crosscutting_cutterdrive_speed100($a, $b);
			$hz_axis = '';
			foreach($cutterdriveHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$cutterdrivePos = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_position100($a, $b);
			$pos_axis = '';
			foreach($cutterdrivePos as $datarec3){
				$ox = date('U', strtotime($datarec3->timestamp));
				$o_x = $ox*1000;
				$pos_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec3->payload, $matches);
				$pos_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$pos_axis .= $x;
				$pos_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$posaxis = substr($pos_axis, 0, -2);
			$data['ampaxis_t'] = 'Cutter Drive(A)';
			$data['hzaxis_t'] = 'Cutter Drive(Hz)';
			$data['posaxis_t'] = 'Position';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['posaxis'] = $posaxis;
			$data['divid'] = 'iot_crosscutter_t';
			$this->load->view('iot_wkb/chart', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_crosscutter_u($unix){
		$dataA = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_crosscutting_liftingunit_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$dataPos = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_position100($a, $b);
			$pos_axis = '';
			foreach($dataPos as $datarec3){
				$ox = date('U', strtotime($datarec3->timestamp));
				$o_x = $ox*1000;
				$pos_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec3->payload, $matches);
				$pos_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$pos_axis .= $x;
				$pos_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$posaxis = substr($pos_axis, 0, -2);
			$data['ampaxis_t'] = 'Lifting Unit(A)';
			$data['hzaxis_t'] = 'Lifting Unit(Hz)';
			$data['posaxis_t'] = 'Position';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['posaxis'] = $posaxis;
			$data['divid'] = 'iot_crosscutter_u';
			$this->load->view('iot_wkb/chart', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_crosscutter_v($unix){
		$dataA = $this->iot_wkb_model->cuttingline_crosscutting_vacuum_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_crosscutting_vacuum_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_crosscutting_vacuum_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$dataPos = $this->iot_wkb_model->cuttingline_crosscutting_liftingunit_position100($a, $b);
			$pos_axis = '';
			foreach($dataPos as $datarec3){
				$ox = date('U', strtotime($datarec3->timestamp));
				$o_x = $ox*1000;
				$pos_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec3->payload, $matches);
				$pos_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$pos_axis .= $x;
				$pos_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$posaxis = substr($pos_axis, 0, -2);
			$data['ampaxis_t'] = 'Vacuum(A)';
			$data['hzaxis_t'] = 'Vacuum(Hz)';
			$data['posaxis_t'] = 'Position';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['posaxis'] = $posaxis;
			$data['divid'] = 'iot_crosscutter_v';
			$this->load->view('iot_wkb/chart', $data);
		}else{
			echo 'no data';
		}
	}
//=======================================REFEEDING====================================================================================================
	function iot_js_cuttingboardrefeeding_overview(){
		//iot_js_cuttingline_cuttingboardrefeeding_lifting_current================================================================================
		$var = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_lifting_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_lifting_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_cuttingboardrefeeding_lifting_current = '
				<h5><b>Lifter (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_cuttingboardrefeeding_lifting_current = '';}
		//iot_js_cuttingline_cuttingboardrefeeding_lifting_speed==================================================================================
		$var = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_lifting_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_cuttingboardrefeeding_lifting_speed = '
				<h5><b>Lifter</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_cuttingboardrefeeding_lifting_speed = '';}
		//iot_js_cuttingline_cuttingboardrefeeding_travelling_current=============================================================================
		$var = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_travelling_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_travelling_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_cuttingboardrefeeding_travelling_current = '
				<h5><b>Travel (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_cuttingboardrefeeding_travelling_current = '';}
		//iot_js_cuttingline_cuttingboardrefeeding_travelling_speed===============================================================================
		$var = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_travelling_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_cuttingboardrefeeding_travelling_speed = '
				<h5><b>Travel</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{ $iot_js_cuttingline_cuttingboardrefeeding_travelling_speed = '';}
		echo '<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Cutting Board Refeeding</h3>
					</div>
					<div class="box-body">
						<div class="col-md-6">
							'.$iot_js_cuttingline_cuttingboardrefeeding_lifting_current.'
							'.$iot_js_cuttingline_cuttingboardrefeeding_lifting_speed.'
						</div>
						<div class="col-md-6">
							'.$iot_js_cuttingline_cuttingboardrefeeding_travelling_current.'
							'.$iot_js_cuttingline_cuttingboardrefeeding_travelling_speed.'
						</div>
					</div>
				</div>';
	}
	function iot_cbrefeeder_lift($unix){
		$dataA = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_lifting_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_lifting_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_lifting_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_lifting_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$getsign = explode($x, $datarec2->payload);
				if($getsign[0] == '-'){$hz_axis .= '-';}
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$data['ampaxis_t'] = 'Lifter(A)';
			$data['hzaxis_t'] = 'Lifter(Hz)';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['divid'] = 'iot_cbrefeeder_lift';
			$this->load->view('iot_wkb/chart_a_hz', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_cbrefeeder_travel($unix){
		$dataA = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_travelling_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_travelling_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_cuttingboardrefeeding_travelling_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_travelling_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$getsign = explode($x, $datarec2->payload);
				if($getsign[0] == '-'){$hz_axis .= '-';}
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$data['ampaxis_t'] = 'Travel(A)';
			$data['hzaxis_t'] = 'Travel(Hz)';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['divid'] = 'iot_cbrefeeder_travel';
			$this->load->view('iot_wkb/chart_a_hz', $data);
		}else{
			echo 'no data';
		}
	}
	//===================================================TILTING 1 ==================================================================================
	function iot_js_tilting1_overview(){
		//iot_js_hydraulic_tilting1_actualtemperature_temperature=========================================================================
		$var = $this->iot_wkb_model->hydraulic_tilting1_actualtemperature_temperature(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_hydraulic_tilting1_actualtemperature_temperature = $persen.' °C';
		}else{$iot_js_hydraulic_tilting1_actualtemperature_temperature = '';}
		//iot_js_cuttingline_tilting1_tiltingdevice_angle=================================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_tiltingdevice_angle(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$persenx = str_replace(' ', '.', $persen);
			$perseny = 180 - $persenx;
			$persen = abs(180 - $persenx);
			if($perseny < 0){ $color = '#ff0000';}else{$color = '#3c8dbc';}
			//
			$iot_js_cuttingline_tilting1_tiltingdevice_angle = '
				<div><input type="text" id="knobtilting1" value="'.number_format($persen, 1, '.', '').'" data-anglearc="90" data-skin="tron" data-thickness="0.1" data-width="100" data-height="90" data-angleoffset="270" data-fgcolor="'.$color.'" data-readonly="true" readonly="readonly"><div id="container-tt1" class="chart-container"></div>
					<p><b>Angle '.number_format($persenx, 1, '.', '').'°</b></p>
				</div>
				<script>
					$(function() {
						$("#knobtilting1").knob();
					});
				</script>';
		}else{$iot_js_cuttingline_tilting1_tiltingdevice_angle = '';}
		//iot_js_cuttingline_tilting1_tiltingdevice_speed=================================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_tiltingdevice_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting1_tiltingdevice_speed = '
				<h5><b>Tilting Speed</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_tiltingdevice_speed = '';}
		//iot_js_cuttingline_tilting1_tiltingdevice_pressure==============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_tiltingdevice_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting1_tiltingdevice_pressure = '
				<h5><b>Tilting Pressure</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_tiltingdevice_pressure = '';}
		//iot_js_cuttingline_tilting1_crossmovement_speed=================================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_crossmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting1_crossmovement_speed = '
				<h5><b>Cross Move</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_crossmovement_speed = '';}
		//iot_js_cuttingline_tilting1_crossmovement_pressure==============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_crossmovement_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting1_crossmovement_pressure = '
				<h5><b>Cross Move</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_crossmovement_pressure = '';}
		//iot_js_cuttingline_tilting1_cuttingboardmovement_speed==========================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting1_cuttingboardmovement_speed = '
				<h5><b>CB Move</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_cuttingboardmovement_speed = '';}
		//iot_js_cuttingline_tilting1_cuttingboardmovement_pressure=======================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardmovement_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting1_cuttingboardmovement_pressure = '
				<h5><b>CB Move</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_cuttingboardmovement_pressure = '';}
		//iot_js_cuttingline_tilting1_cuttingboardarrest_speed============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardarrest_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting1_cuttingboardarrest_speed = '
				<h5><b>CB Arrest</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_cuttingboardarrest_speed = '';}
		//iot_js_cuttingline_tilting1_cuttingboardarrest_pressure=========================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_cuttingboardarrest_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting1_cuttingboardarrest_pressure = '
				<h5><b>CB Arrest</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_cuttingboardarrest_pressure = '';}
		//iot_js_cuttingline_tilting1_rubbingwheel_current================================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_rubbingwheel_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_tilting1_rubbingwheel_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_tilting1_rubbingwheel_current = '
				<h5><b>FCW</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_rubbingwheel_current = '';}
		//iot_js_cl_t1_rw_speed===========================================================================================================
		$var = $this->iot_wkb_model->cl_t1_rw_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cl_t1_rw_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$value = ($persen/100)*$getscale->value;
			$iot_js_cl_t1_rw_speed = '
				<h5><b>FCW (Hz)</b><span class="label label-primary pull-right">'.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{ $iot_js_cl_t1_rw_speed = '';}
		//iot_js_cuttingline_tilting1_castingcarearrest_pressure==========================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting1_castingcarearrest_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting1_castingcarearrest_pressure = '
				<h5><b>Car Arrest</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting1_castingcarearrest_pressure = '';}
		echo '
				<script>
					$(function() {
						$(".knobtilting1").knob();
					});
				</script>
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Tilting 1, Hydraulic Temp. '.$iot_js_hydraulic_tilting1_actualtemperature_temperature.'</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 col-md-3 text-center">
							'.$iot_js_cuttingline_tilting1_tiltingdevice_angle.'
						</div>
						<div class="col-xs-12 col-md-3">
							'.$iot_js_cuttingline_tilting1_tiltingdevice_speed.'
							'.$iot_js_cuttingline_tilting1_tiltingdevice_pressure.'
							'.$iot_js_cuttingline_tilting1_crossmovement_speed.'
							'.$iot_js_cuttingline_tilting1_crossmovement_pressure.'
						</div>
						<div class="col-xs-12 col-md-3">
							'.$iot_js_cuttingline_tilting1_cuttingboardmovement_speed.'
							'.$iot_js_cuttingline_tilting1_cuttingboardmovement_pressure.'
							'.$iot_js_cuttingline_tilting1_cuttingboardarrest_speed.'
							'.$iot_js_cuttingline_tilting1_cuttingboardarrest_pressure.'
						</div>
						<div class="col-xs-12 col-md-3">
							'.$iot_js_cuttingline_tilting1_castingcarearrest_pressure.'
							'.$iot_js_cuttingline_tilting1_rubbingwheel_current.'
							'.$iot_js_cl_t1_rw_speed.'
						</div>
					</div>
				</div>
				';
	}
	function iot_tilting1_fcw($unix){
		$dataA = $this->iot_wkb_model->cuttingline_tilting1_rubbingwheel_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_tilting1_rubbingwheel_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cl_t1_rw_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_cuttingboardrefeeding_lifting_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$getsign = explode($x, $datarec2->payload);
				if($getsign[0] == '-'){$hz_axis .= '-';}
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$data['ampaxis_t'] = 'Lifter(A)';
			$data['hzaxis_t'] = 'Lifter(Hz)';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['divid'] = 'iot_tilting1_fcw';
			$this->load->view('iot_wkb/chart_a_hz', $data);
		}else{
			echo 'no data';
		}
	}
	//===================================================TILTING 2 ==================================================================================
	function iot_js_tilting2_overview(){
		//iot_js_hydraulic_tilting2_actualtemperature_temperature==========================================================================
		$var = $this->iot_wkb_model->hydraulic_tilting2_actualtemperature_temperature(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_hydraulic_tilting2_actualtemperature_temperature = $persen.' °C';
		}else{$iot_js_hydraulic_tilting2_actualtemperature_temperature = '';}
		//iot_js_cuttingline_tilting2_tiltingdevice_angle==================================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_tiltingdevice_angle(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$persenx = str_replace(' ', '.', $persen);
			$perseny = 180 - $persenx;
			$persen = abs(180 - $persenx);
			if($perseny < 0){ $color = '#ff0000';}else{$color = '#3c8dbc';}
			//<input type="text" class="knobtilting2" value="'.number_format($persen, 1, '.', '').'" data-anglearc="90" data-skin="tron" data-thickness="0.5" data-width="100" data-height="90" data-angleoffset="270" data-fgcolor="'.$color.'" data-readonly="true" readonly="readonly">
			$iot_js_cuttingline_tilting2_tiltingdevice_angle = '
				<div><input type="text" id="knobtilting2" value="'.number_format($persen, 1, '.', '').'" data-anglearc="90" data-skin="tron" data-thickness="0.1" data-width="100" data-height="90" data-angleoffset="270" data-fgcolor="'.$color.'" data-readonly="true" readonly="readonly"><div id="container-tt1" class="chart-container"></div>
					<p><b>Angle '.number_format($persenx, 1, '.', '').'°</b></p>
				</div>
				<script>
					$(function() {
						$("#knobtilting2").knob();
					});
				</script>';
		}else{$iot_js_cuttingline_tilting2_tiltingdevice_angle = '';}
		//iot_js_cuttingline_tilting2_tiltingdevice_speed=================================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_tiltingdevice_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting2_tiltingdevice_speed = '
				<h5><b>Tilting Speed</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_tiltingdevice_speed = '';}
		//iot_js_cuttingline_tilting2_tiltingdevice_pressure==============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_tiltingdevice_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting2_tiltingdevice_pressure = '
				<h5><b>Tilting Pressure</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_tiltingdevice_pressure = '';}
		//iot_js_cuttingline_tilting2_crossmovement_speed=================================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_crossmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting2_crossmovement_speed = '
				<h5><b>Cross Move</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_crossmovement_speed = '';}
		//iot_js_cuttingline_tilting2_crossmovement_pressure=============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_crossmovement_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting2_crossmovement_pressure = '
				<h5><b>Cross Move</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_crossmovement_pressure = '';}
		//iot_js_cuttingline_tilting2_cuttingboardmovement_speed=========================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardmovement_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting2_cuttingboardmovement_speed = '
				<h5><b>CB Move</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_cuttingboardmovement_speed = '';}
		//iot_js_cuttingline_tilting2_cuttingboardmovement_pressure======================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardmovement_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting2_cuttingboardmovement_pressure = '
				<h5><b>CB Move</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_cuttingboardmovement_pressure = '';}
		//iot_js_cuttingline_tilting2_cuttingboardarrest_speed==========================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardarrest_speed(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = $persen;
				$arah = '<i class="fa fa-arrow-up"></i>';
			}else{
				$value = -1*$persen;
				$arah = '<i class="fa fa-arrow-down"></i>';
			}
			$iot_js_cuttingline_tilting2_cuttingboardarrest_speed = '
				<h5><b>CB Arrest</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 0, '.', '').'</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_cuttingboardarrest_speed = '';}
		//iot_js_cuttingline_tilting2_cuttingboardarrest_pressure=======================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_cuttingboardarrest_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting2_cuttingboardarrest_pressure = '
				<h5><b>CB Arrest</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_cuttingboardarrest_pressure = '';}
		//iot_js_cuttingline_tilting2_castingcarearrest_pressure=======================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_castingcarearrest_pressure(); 
		if(!empty($var)){
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$iot_js_cuttingline_tilting2_castingcarearrest_pressure = '
				<h5><b>Car Arrest</b><span class="label label-primary pull-right">'.number_format($persen, 0, '.', '').' bar</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="150" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_castingcarearrest_pressure = '';}
		//iot_js_cuttingline_tilting2_rubbingwheel_current=============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_rubbingwheel_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_tilting2_rubbingwheel_current = '
				<h5><b>FCW (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_rubbingwheel_current = '';}
		//iot_js_cuttingline_tilting2_rubbingwheel_speed===============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_rubbingwheel_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = ($persen/100)*$getscale->value;
				$arah = 'FWD';
			}else{
				$value = -1*($persen/100)*$getscale->value;
				$arah = 'RVS';
			}
			$iot_js_cuttingline_tilting2_rubbingwheel_speed = '
				<h5><b>FCW (Hz)</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_rubbingwheel_speed = '';}
		//iot_js_cuttingline_tilting2_transportloader_current==========================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_transportloader_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_tilting2_transportloader_current = '
				<h5><b>Transport Table (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_transportloader_current = '';}
		//iot_js_cuttingline_tilting2_transportloader_speed============================================================================
		$var = $this->iot_wkb_model->cuttingline_tilting2_transportloader_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = ($persen/100)*$getscale->value;
				$arah = 'FWD';
			}else{
				$value = -1*($persen/100)*$getscale->value;
				$arah = 'RVS';
			}
			$iot_js_cuttingline_tilting2_transportloader_speed = '
				<h5><b>Transport Table (Hz)</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_tilting2_transportloader_speed = '';}
		
		echo '
				<script>
					$(function() {
						$(".knobtilting2").knob();
					});
				</script>
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Tilting 2, Hydraulic Temp. '.$iot_js_hydraulic_tilting2_actualtemperature_temperature.'</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 col-md-3 text-center">
							'.$iot_js_cuttingline_tilting2_tiltingdevice_angle.'
							'.$iot_js_cuttingline_tilting2_castingcarearrest_pressure.'
						</div>
						<div class="col-xs-12 col-md-3">
							'.$iot_js_cuttingline_tilting2_tiltingdevice_speed.'
							'.$iot_js_cuttingline_tilting2_tiltingdevice_pressure.'
							'.$iot_js_cuttingline_tilting2_crossmovement_speed.'
							'.$iot_js_cuttingline_tilting2_crossmovement_pressure.'
						</div>
						<div class="col-xs-12 col-md-3">
							'.$iot_js_cuttingline_tilting2_cuttingboardmovement_speed.'
							'.$iot_js_cuttingline_tilting2_cuttingboardmovement_pressure.'
							'.$iot_js_cuttingline_tilting2_cuttingboardarrest_speed.'
							'.$iot_js_cuttingline_tilting2_cuttingboardarrest_pressure.'
						</div>
						<div class="col-xs-12 col-md-3">
							'.$iot_js_cuttingline_tilting2_rubbingwheel_current.'
							'.$iot_js_cuttingline_tilting2_rubbingwheel_speed.'
							'.$iot_js_cuttingline_tilting2_transportloader_current.'
							'.$iot_js_cuttingline_tilting2_transportloader_speed.'
						</div>
					</div>
				</div>
				';
	}
	function iot_tilting2_fcw($unix){
		$dataA = $this->iot_wkb_model->cuttingline_tilting2_rubbingwheel_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_tilting2_rubbingwheel_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_tilting2_rubbingwheel_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$getsign = explode($x, $datarec2->payload);
				if($getsign[0] == '-'){$hz_axis .= '-';}
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$data['ampaxis_t'] = 'FCW(A)';
			$data['hzaxis_t'] = 'FCW(Hz)';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['divid'] = 'iot_tilting2_fcw';
			$this->load->view('iot_wkb/chart_a_hz', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_tilting2_tl($unix){
		$dataA = $this->iot_wkb_model->cuttingline_tilting2_transportloader_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_tilting2_transportloader_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_tilting2_transportloader_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$getsign = explode($x, $datarec2->payload);
				if($getsign[0] == '-'){$hz_axis .= '-';}
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$data['ampaxis_t'] = 'Transport loader(A)';
			$data['hzaxis_t'] = 'Transport loader(Hz)';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$data['divid'] = 'iot_tilting2_tl';
			$this->load->view('iot_wkb/chart_a_hz', $data);
		}else{
			echo 'no data';
		}
	}
	//======================================================TROLLEY===================================================================================
	function iot_js_trolley_overview(){
		//iot_js_cuttingline_trolley_trolley1_current=============================================================================
		$var = $this->iot_wkb_model->cuttingline_trolley_trolley1_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_trolley_trolley1_current = '
				<h5><b>Trolley 1 (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_trolley_trolley1_current = '';}
		//iot_js_cuttingline_trolley_trolley1_speed===============================================================================
		$var = $this->iot_wkb_model->cuttingline_trolley_trolley1_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = ($persen/100)*$getscale->value;
				$arah = 'FWD';
			}else{
				$value = -1*($persen/100)*$getscale->value;
				$arah = 'RVS';
			}
			$iot_js_cuttingline_trolley_trolley1_speed = '
				<h5><b>Trolley 1 (Hz)</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_trolley_trolley1_speed = '';}
		//iot_js_cuttingline_trolley_trolley2_current=============================================================================
		$var = $this->iot_wkb_model->cuttingline_trolley_trolley2_current(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_current');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			$lwlimit = $this->iot_wkb_model->getscale('lowlimit_ampere_wkb');
			$hilimit = $this->iot_wkb_model->getscale('highlimit_ampere_wkb');
			$value = ($persen/100)*$getscale->value;
			$label = 'green';
			$span = 'success';
			if($persen >= $lwlimit->value and $value <= $hilimit->value){
				$label = 'yellow';
				$span = 'warning';
			}
			if($persen >= $hilimit->value){
				$label = 'red';
				$span = 'danger';
			}
			$iot_js_cuttingline_trolley_trolley2_current = '
				<h5><b>Trolley 2 (A)</b><span class="label label-'.$span.' pull-right">'.number_format($value, 1, '.', '').' A</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_trolley_trolley2_current = '';}
		//iot_js_cuttingline_trolley_trolley2_speed===============================================================================
		$var = $this->iot_wkb_model->cuttingline_trolley_trolley2_speed(); 
		if(!empty($var)){
			$getscale = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_speed');
			preg_match_all('!\d+!', $var->payload, $matches);
			$persen = implode(' ', $matches[0]);
			if($persen >= 0){
				$value = ($persen/100)*$getscale->value;
				$arah = 'FWD';
			}else{
				$value = -1*($persen/100)*$getscale->value;
				$arah = 'RVS';
			}
			$iot_js_cuttingline_trolley_trolley2_speed = '
				<h5><b>Trolley 1 (Hz)</b><span class="label label-primary pull-right">'.$arah.' '.number_format($value, 1, '.', '').' Hz</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%"></div>
				</div>';
		}else{$iot_js_cuttingline_trolley_trolley2_speed = '';}
		echo '<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Trolley 1 & 2</h3>
					</div>
					<div class="box-body">
						<div class="col-md-6">
							'.$iot_js_cuttingline_trolley_trolley1_current.'
							'.$iot_js_cuttingline_trolley_trolley1_speed.'
						</div>
						<div class="col-md-6">
							'.$iot_js_cuttingline_trolley_trolley2_current.'
							'.$iot_js_cuttingline_trolley_trolley2_speed.'
						</div>
					</div>
				</div>';
	}
	function iot_trolley_1($unix){
		$dataA = $this->iot_wkb_model->cuttingline_trolley_trolley1_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley1_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_trolley_trolley1_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$getsign = explode($x, $datarec2->payload);
				if($getsign[0] == '-'){$hz_axis .= '-';}
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$data['ampaxis_t'] = 'Trolley 1(A)';
			$data['hzaxis_t'] = 'Trolley 1(Hz)';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$this->load->view('iot_wkb/chart_a_hz', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_trolley_2($unix){
		$dataA = $this->iot_wkb_model->cuttingline_trolley_trolley2_current100(date('Y-m-d H:i:s', $unix));
		$amp_axis = '';
		$getscaleA = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_current');
		$getscaleHz = $this->iot_wkb_model->getscale('cuttingline_trolley_trolley2_speed');
		if(!empty($dataA)){
			$a = 0;
			$b = '';
			$x = '';
			$amp_axis = '';
			foreach($dataA as $datarec){
				$ox = date('U', strtotime($datarec->timestamp));
				$o_x = $ox*1000;
				$amp_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec->payload, $matches);
				$amp_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$amp_axis .= ($x/100)*$getscaleA->value;
				$amp_axis .='}, ';
				if($a == 0){
					$b = $datarec->timestamp;
				}
				$a = $datarec->timestamp;
			}
			$dataHz = $this->iot_wkb_model->cuttingline_trolley_trolley2_speed100($a, $b);
			$hz_axis = '';
			foreach($dataHz as $datarec2){
				$ox = date('U', strtotime($datarec2->timestamp));
				$o_x = $ox*1000;
				$hz_axis .= '{x:'.$o_x;
				preg_match_all('!\d+!', $datarec2->payload, $matches);
				$hz_axis .= ',y:';
				$x = implode(' ', $matches[0]);
				$getsign = explode($x, $datarec2->payload);
				if($getsign[0] == '-'){$hz_axis .= '-';}
				$hz_axis .= ($x/100)*$getscaleHz->value;
				$hz_axis .='}, ';
			}
			$ampaxis = substr($amp_axis, 0, -2);
			$hzaxis = substr($hz_axis, 0, -2);
			$data['ampaxis_t'] = 'Trolley 2(A)';
			$data['hzaxis_t'] = 'Trolley 2(Hz)';
			$data['ampaxis'] = $ampaxis;
			$data['hzaxis'] = $hzaxis;
			$this->load->view('iot_wkb/chart_a_hz', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_js_hydraulic_tilting1_oilcoolingoff_temperature(){
		$var = $this->iot_wkb_model->hydraulic_tilting1_oilcoolingoff_temperature(); 
		if(!empty($var)){
			echo $var->payload;
		}else{
			echo 'NULL';
		}
	}
	function iot_js_hydraulic_tilting1_oilcoolingon_temperature(){
		$var = $this->iot_wkb_model->hydraulic_tilting1_oilcoolingon_temperature(); 
		if(!empty($var)){
			echo $var->payload;
		}else{
			echo 'NULL';
		}
	}
	function iot_js_hydraulic_tilting1_oiltemperaturetoohot_temperature(){
		$var = $this->iot_wkb_model->hydraulic_tilting1_oiltemperaturetoohot_temperature(); 
		if(!empty($var)){
			echo $var->payload;
		}else{
			echo 'NULL';
		}
	}
	function iot_js_hydraulic_tilting2_oilcoolingoff_temperature(){
		$var = $this->iot_wkb_model->hydraulic_tilting2_oilcoolingoff_temperature(); 
		if(!empty($var)){
			echo $var->payload;
		}else{
			echo 'NULL';
		}
	}
	function iot_js_hydraulic_tilting2_oilcoolingon_temperature(){
		$var = $this->iot_wkb_model->hydraulic_tilting2_oilcoolingon_temperature(); 
		if(!empty($var)){
			echo $var->payload;
		}else{
			echo 'NULL';
		}
	}
	function iot_js_hydraulic_tilting2_oiltemperaturetoohot_temperature(){
		$var = $this->iot_wkb_model->hydraulic_tilting2_oiltemperaturetoohot_temperature(); 
		if(!empty($var)){
			echo $var->payload;
		}else{
			echo 'NULL';
		}
	}
	
	
	
}

?>
