<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Iot_autoclave extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_autoclave_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	public function index(){
		$this->isLoggedIn();
	}
	public function ac($no = ''){
		$data['no'] = $no;
		$this->global['pageTitle'] = 'RAWR : Autoclave '.$no;
		$this->loadViews("iot_autoclave/ac", $this->global, $data, NULL);
    }
	function iot_chart_ac($no, $tgl){
		$toDate = date('Y-m-d H:i:s',$tgl);
		$ac_x = $this->iot_autoclave_model->sqlac($no, $toDate);
		$data['actable'] = $ac_x;
		$dataacx = '';
		$dataacy = '';
		if(!empty($ac_x)){
			foreach($ac_x as $result){
				$eek = date('U', strtotime($result->timestamp))*1000;
				$dataacx .= '{x:'.$eek.', y:'.$result->pressure.'}, ';
				$dataacy .= '{x:'.$eek.', y:'.$result->temperature.'}, ';
			}
		}
		$data['pressaxis'] = substr($dataacx, 0, -2);
		$data['tempaxis'] = substr($dataacy, 0, -2);
		$this->load->view('autoclave/ac_chart', $data);
	}
	function boilerinput(){
		$data['username'] = $this->global ['name'];
		$data['boiler'] = $this->iot_autoclave_model->getboilerlast();
		$data['boiler2'] = $this->iot_autoclave_model->getboiler2last();
		$this->global['pageTitle'] = 'RAWR : Boiler Input';	
		$this->loadViews("iot_autoclave/boilerinput", $this->global, $data, NULL);
	}
	function addboilerinput1(){
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
		if($this->form_validation->run() == FALSE){
			$this->boilerinput();
		}
		else{
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
			$result = $this->iot_autoclave_model->addboilerinput1($boiler1Info);
			if($result > 0){
				$this->session->set_flashdata('success', 'New Boiler data recorded successfully');
			}
			else{
				$this->session->set_flashdata('error', 'Boiler data recorded failed');
			}
			redirect('boilerinput');
		}
	}
	function addboilerinput2(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('water_0','water','trim|required|max_length[10]');
		$this->form_validation->set_rules('steam_0','steam','required|max_length[255]');
		$this->form_validation->set_rules('kwh_0','kwh','required|max_length[255]');
		if($this->form_validation->run() == FALSE){
			$this->boilerinput();
		}
		else{
			$water_0 = $this->input->post('water_0');
			$steam_0 = $this->input->post('steam_0');
			$kwh_0 = $this->input->post('kwh_0');
			$boiler2Info = array(
				'user'=>$this->global ['name'],
				'water_0'=>$water_0, 
				'steam_0'=>$steam_0, 
				'kwh_0'=>$kwh_0
				);
			$result = $this->iot_autoclave_model->addboilerinput2($boiler2Info);
			if($result > 0){
				$this->session->set_flashdata('success', 'New Boiler data recorded successfully');
			}
			else{
				$this->session->set_flashdata('error', 'Boiler data recorded failed');
			}
			redirect('boilerinput');
		}
	}
	function addboilerinput3(){
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
		$result = $this->iot_autoclave_model->addboilerinput3($boiler3Info);
		redirect('boilerinput');
	}
	function boilerhour(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$result = $this->iot_autoclave_model->gethourlyusage($fromDate, $toDate);
		if(!empty($result)){
			$steam = '';
			$water = '';
			$bed1 = '';
			$bed2 = '';
			$press = '';
			$palm1 = '';
			$palm2 = '';
			$idfan = '';
			$fdfan = '';
			foreach($result as $record){
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
		$this->loadViews("iot_autoclave/boilerhour", $this->global, $data, NULL);
	}
	function boilerplc(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$result = $this->iot_autoclave_model->getboilerplc($fromDate, $toDate);
		if(!empty($result)){
			$bp = '';
			$bwl = '';
			$bt1 = '';
			$bt2 = '';
			$fgt = '';
			$sfm = '';
			$dp = '';
			$fwt = '';
			$id = '';
			$fd = '';
			$rs = '';
			$sf1 = '';
			$sf2 = '';
			$din = '';
			$dout = '';
			foreach($result as $record){
				$timeunix = 1000*(date('U', strtotime($record->timestamp)));
				$bp .= '{x:'.$timeunix.',y:'.$record->bp.'}, ';
				$bwl .= '{x:'.$timeunix.',y:'.$record->bwl.'}, ';
				$bt1 .= '{x:'.$timeunix.',y:'.$record->bt1.'}, ';
				$bt2 .= '{x:'.$timeunix.',y:'.$record->bt2.'}, ';
				$fgt .= '{x:'.$timeunix.',y:'.$record->fgt.'}, ';
				$sfm .= '{x:'.$timeunix.',y:'.$record->sfm.'}, ';
				$dp .= '{x:'.$timeunix.',y:'.$record->dp.'}, ';
				$fwt .= '{x:'.$timeunix.',y:'.$record->fwt.'}, ';
				$id .= '{x:'.$timeunix.',y:'.$record->id.'}, ';
				$fd .= '{x:'.$timeunix.',y:'.$record->fd.'}, ';
				$rs .= '{x:'.$timeunix.',y:'.$record->rs.'}, ';
				$sf1 .= '{x:'.$timeunix.',y:'.$record->sf1.'}, ';
				$sf2 .= '{x:'.$timeunix.',y:'.$record->sf2.'}, ';
				$din .= '{x:'.$timeunix.',y:'.$record->din.'}, ';
				$dout .= '{x:'.$timeunix.',y:'.$record->dout.'}, ';
			}
		}
		$data['bp'] = substr($bp, 0, -2);
		$data['bwl'] = substr($bwl, 0, -2);
		$data['bt1'] = substr($bt1, 0, -2);
		$data['bt2'] = substr($bt2, 0, -2);
		$data['fgt'] = substr($fgt, 0, -2);
		$data['sfm'] = substr($sfm, 0, -2);
		$data['dp'] = substr($dp, 0, -2);
		$data['fwt'] = substr($fwt, 0, -2);
		$data['id'] = substr($id, 0, -2);
		$data['fd'] = substr($fd, 0, -2);
		$data['rs'] = substr($rs, 0, -2);
		$data['sf1'] = substr($sf1, 0, -2);
		$data['sf2'] = substr($sf2, 0, -2);
		$data['din'] = substr($din, 0, -2);
		$data['dout'] = substr($dout, 0, -2);
		$data['hour'] = $result;
		$this->global['pageTitle'] = 'RAWR : Boiler PLC';
		$this->loadViews("iot_autoclave/boilerplc", $this->global, $data, NULL);
	}
	function boilerday(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$result = $this->iot_autoclave_model->getdailyusage($fromDate, $toDate);
		if(!empty($result)){
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
		$this->loadViews("iot_autoclave/boilerday", $this->global, $data, NULL);
	}
	function boiler_rt(){
		$this->global['pageTitle'] = 'RAWR : Boiler Overview';
		$this->loadViews("iot_autoclave/boiler_rt", $this->global, NULL, NULL);
    }
	function iot_js_boiler_gauge(){
		$data['mc_name_1'] = 'Pressure';
		$data['mc_name_2'] = 'Steam-Flow';
		$data['mc_name_3'] = 'Oxygen';
		$data['mc_name_4'] = 'Flue-Gas';
		$data['unit_1'] = 'barG';
		$data['unit_2'] = 'ton/h';
		$data['unit_3'] = '%';
		$data['unit_4'] = '°C';
		$data['limit1_1'] = 10;
		$data['limit1_2'] = 11;
		$data['limit1_3'] = 15;
		$data['limit2_1'] = 5;
		$data['limit2_2'] = 10;
		$data['limit2_3'] = 15;
		$data['limit3_1'] = 7;
		$data['limit3_2'] = 10;
		$data['limit3_3'] = 21;
		$data['limit4_1'] = 175;
		$data['limit4_2'] = 200;
		$data['limit4_3'] = 250;
		$data['color_start1'] = "#ff6363";
		$data['color_end1'] = "rgb(86, 244, 65)";
		$data['color_start2'] = "#ff6363";
		$data['color_end2'] = "rgb(86, 244, 65)";
		$data['color_end3'] = "#ff6363";
		$data['color_start3'] = "rgb(86, 244, 65)";
		$data['color_start4'] = "#ff6363";
		$data['color_end4'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["0", "3", "6", "9", "12", "15"]';
		$data['majortick2'] = '["0", "3", "6", "9", "12", "15"]';
		$data['majortick3'] = '["0", "3", "6", "9", "12", "15", "18", "21"]';
		$data['majortick4'] = '["0", "50", "100", "150", "200", "250"]';
		$data['ena'] = 4;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_boiler_gauge';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_boiler_gauge(){
		header("Content-type: text/json");
		$boiler = $this->iot_autoclave_model->getboilerdata();
		$ret = array(
			'gauge1iot_ajax_boiler_gauge'=>number_format($boiler->bp, 1, '.', ''),
			'gauge2iot_ajax_boiler_gauge'=>number_format($boiler->sfm, 1, '.', ''),
			'gauge3iot_ajax_boiler_gauge'=>number_format($boiler->st/40, 1, '.', ''),
			'gauge4iot_ajax_boiler_gauge'=>number_format($boiler->fgt, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_bed(){
		$data['mc_name_1'] = 'Bed-1';
		$data['mc_name_2'] = 'Bed_2';
		$data['unit_1'] = '°C';
		$data['unit_2'] = '°C';
		$data['limit1_1'] = 700;
		$data['limit1_2'] = 800;
		$data['limit1_3'] = 900;
		$data['limit2_1'] = 700;
		$data['limit2_2'] = 800;
		$data['limit2_3'] = 900;
		$data['revert1'] = 1;
		$data['revert2'] = 1;
		$data['ena'] = 2;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_bed';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_bed(){
		header("Content-type: text/json");
		$boiler = $this->iot_autoclave_model->getboilerdata();
		$ret = array(
			'bar1iot_ajax_bed'=>number_format($boiler->bt1, 1, '.', ''),
			'bar2iot_ajax_bed'=>850 //number_format($boiler->bt2, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_feed(){
		$data['mc_name_1'] = 'Feed-1';
		$data['mc_name_2'] = 'Feed-2';
		$data['mc_name_3'] = 'Palm-Level';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'Hz';
		$data['unit_3'] = '%';
		$data['limit1_1'] = 5;
		$data['limit1_2'] = 10;
		$data['limit1_3'] = 30;
		$data['limit2_1'] = 5;
		$data['limit2_2'] = 10;
		$data['limit2_3'] = 30;
		$data['limit3_1'] = 50;
		$data['limit3_2'] = 70;
		$data['limit3_3'] = 100;
		$data['revert3'] = 1;	
		$data['ena'] = 3;
		$data['revert3'] = 1;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_feed';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_feed(){
		header("Content-type: text/json");
		$boiler = $this->iot_autoclave_model->getboilerdata();
		$palmlevel = $this->iot_autoclave_model->get_palmkernel();
		$levelcangkang = (5.48 - ($palmlevel->totalflow/1000))*6.5675*2.78;
		$ret = array(
			'bar1iot_ajax_feed'=>number_format($boiler->sf1, 1, '.', ''),
			'bar2iot_ajax_feed'=>number_format($boiler->sf2, 1, '.', ''),
			'bar3iot_ajax_feed'=>number_format($levelcangkang, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_fan(){
		$data['mc_name_1'] = 'FD-Fan';
		$data['mc_name_2'] = 'ID-Fan';
		$data['mc_name_3'] = 'Recir-Fan';
		$data['unit_1'] = 'Hz';
		$data['unit_2'] = 'Hz';
		$data['unit_3'] = 'Hz';
		$data['limit1_1'] = 35;
		$data['limit1_2'] = 40;
		$data['limit1_3'] = 50;
		$data['limit2_1'] = 35;
		$data['limit2_2'] = 40;
		$data['limit2_3'] = 50;
		$data['limit3_1'] = 35;
		$data['limit3_2'] = 40;
		$data['limit3_3'] = 50;
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_fan';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_fan(){
		header("Content-type: text/json");
		$boiler = $this->iot_autoclave_model->getboilerdata();
		$ret = array(
			'bar1iot_ajax_fan'=>number_format($boiler->fd, 1, '.', ''),
			'bar2iot_ajax_fan'=>number_format($boiler->id, 1, '.', ''),
			'bar3iot_ajax_fan'=>number_format($boiler->rs, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_dea(){
		$data['mc_name_1'] = 'Eco-In';
		$data['mc_name_2'] = 'Eco-Out';
		$data['unit_1'] = '°C';
		$data['unit_2'] = '°C';
		$data['limit1_1'] = 70;
		$data['limit1_2'] = 90;
		$data['limit1_3'] = 100;
		$data['limit2_1'] = 70;
		$data['limit2_2'] = 90;
		$data['limit2_3'] = 120;
		$data['revert1'] = 1;
		$data['revert2'] = 1;
		$data['ena'] = 2;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_dea';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_dea(){
		header("Content-type: text/json");
		$boiler = $this->iot_autoclave_model->getboilerdata();
		$ret = array(
			'bar1iot_ajax_dea'=>number_format($boiler->din, 1, '.', ''),
			'bar2iot_ajax_dea'=>number_format($boiler->dout, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_ajax_bolier_rt(){
		header("Content-type: text/json");
		$boiler = $this->iot_autoclave_model->getboilerdata();
		$ret = array(
			'lvl1'=>number_format($boiler->bwl, 1, '.', ''),
			'lvl2'=>number_format($boiler->fwt, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_ac($no){
		$get_ac_data = $this->iot_autoclave_model->sqlact($no);
		if(!empty($get_ac_data)){
			if($get_ac_data->proces == 0){$stat = '<span class="label label-default pull-right">IDLE</span>'; $stats = 'IDLE';}
			if($get_ac_data->proces == 1){$stat = '<span class="label label-success pull-right">Vacuum</span>'; $stats = 'Vacuum';}
			if($get_ac_data->proces == 2){$stat = '<span class="label label-success pull-right">Finish Vacuum</span>'; $stats = 'Vacuum';}
			if($get_ac_data->proces == 3){$stat = '<span class="label label-primary pull-right">Transfer In</span>'; $stats = 'Transfer';}
			if($get_ac_data->proces == 4){$stat = '<span class="label label-primary pull-right">Finish Transfer In</span>'; $stats = 'Transfer';}
			if($get_ac_data->proces == 5){$stat = '<span class="label label-danger pull-right">Rising</span>'; $stats = 'Rising';}
			if($get_ac_data->proces == 6){$stat = '<span class="label label-danger pull-right">Finish Rising</span>'; $stats = 'Rising';}
			if($get_ac_data->proces == 7){$stat = '<span class="label label-warning pull-right">Keeping</span>'; $stats = 'Keeping';}
			if($get_ac_data->proces == 8){$stat = '<span class="label label-warning pull-right">Finish Keeping</span>'; $stats = 'Keeping';}
			if($get_ac_data->proces == 9){$stat = '<span class="label label-info pull-right">Transfer Out</span>'; $stats = 'Transfer';}
			if($get_ac_data->proces == 10){$stat = '<span class="label label-info pull-right">Finish Transfer Out</span>'; $stats = 'Transfer';}
			if($get_ac_data->proces == 11){$stat = '<span class="label label-default pull-right">Blow Off</span>'; $stats = 'Blow Off';}
			$press = number_format($get_ac_data->pressure, 1, '.', '');
			$press_p = ($press/15)*100;
			$temp = number_format($get_ac_data->temperature, 1, '.', '');
			$temp_p = ($temp/250)*100;
			$valv = number_format($get_ac_data->valve, 1, '.', '');
			echo '
				<h5><b>Autoclave '.$no.'</b>'.$stat.'</h5>
				<h5><b>Pressure</b><span class="label label-primary pull-right">'.number_format($press, 1, '.', '').' barG</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="'.$press.'" aria-valuemin="0" aria-valuemax="15" style="width: '.$press_p.'%"></div>
				</div>
				<h5><b>Temperature</b><span class="label label-danger pull-right">'.number_format($temp, 1, '.', '').' °C</span></h5>
				<div class="progress progress-xxs bg-gray">
					<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$temp.'" aria-valuemin="0" aria-valuemax="250" style="width: '.$temp_p.'%"></div>
				</div>';
			if($stats != 'IDLE'){
				echo '
					<h5><b>'.$stats.' Valve</b><span class="label label-success pull-right">'.$valv.' %</span></h5>
					<div class="progress progress-xxs bg-gray">
						<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$valv.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$valv.'%"></div>
					</div>';
			}
			echo '<small><b>Note: </b>'.$get_ac_data->info.'</small>';
		}
	}
	function iot_hour_boiler(){
		$this->global['pageTitle'] = 'RAWR : Boiler Running Hour';
		$this->loadViews("iot_autoclave/boiler_run_hour", $this->global, NULL, NULL);
	}
	function iot_js_hour_boiler($unix){
		$data['use'] = 6;
		$data['mc_name1'] = 'Screw Feed 1';
		$data['mc_name2'] = 'Screw Feed 2';
		$data['mc_name3'] = 'FD Fan';
		$data['mc_name4'] = 'ID Fan';
		$data['mc_name5'] = 'Recirculation Fan';
		$data['mc_name6'] = 'Bed > 300';
		$year = date('Y', $unix);
		$month = date('m', $unix);
		$start = $year.'-'.$month.'-01';
		$end = $month + 1;
		if($end < 10){
			$end = '0'.$end;
		}
		if($end == 13){
			$year = $year + 1;
			$end = '01';
		}
		$end = $year.'-'.$end.'-01';
		$run_data = $this->iot_autoclave_model->machine_run($start, $end);
		if(!empty($run_data)){
			$category_axis = '';
			
			$mc1_axis = '';
			$mc2_axis = '';
			$mc3_axis = '';
			$mc4_axis = '';
			$mc5_axis = '';
			$mc6_axis = '';
			
			$mc1_buf = 0;
			$mc2_buf = 0;
			$mc3_buf = 0;
			$mc4_buf = 0;
			$mc5_buf = 0;
			$mc6_buf = 0;
			
			$mc1_axis_avg = '';
			$mc2_axis_avg = '';
			$mc3_axis_avg = '';
			$mc4_axis_avg = '';
			$mc5_axis_avg = '';
			$mc6_axis_avg = '';
			
			$pembagi = 1;
			foreach($run_data as $datarec){
				$times = date('d', strtotime($datarec->rec_date));
				$category_axis .= "'".$times."', ";
				$mc1_axis .= $datarec->boiler_feed1.', ';
				$mc2_axis .= $datarec->boiler_feed2.', ';
				$mc3_axis .= $datarec->boiler_fd.', ';
				$mc4_axis .= $datarec->boiler_id.', ';
				$mc5_axis .= $datarec->boiler_recir.', ';
				$mc6_axis .= $datarec->boiler_300.', ';
				
				$mc1_buf = $mc1_buf + $datarec->boiler_feed1;
				$mc2_buf = $mc2_buf + $datarec->boiler_feed2;
				$mc3_buf = $mc3_buf + $datarec->boiler_fd;
				$mc4_buf = $mc4_buf + $datarec->boiler_id;
				$mc5_buf = $mc5_buf + $datarec->boiler_recir;
				$mc6_buf = $mc6_buf + $datarec->boiler_300;
				
				$mc1_axis_avg .= number_format($mc1_buf/$pembagi, 2, '.', '').', ';
				$mc2_axis_avg .= number_format($mc2_buf/$pembagi, 2, '.', '').', ';
				$mc3_axis_avg .= number_format($mc3_buf/$pembagi, 2, '.', '').', ';
				$mc4_axis_avg .= number_format($mc4_buf/$pembagi, 2, '.', '').', ';
				$mc5_axis_avg .= number_format($mc5_buf/$pembagi, 2, '.', '').', ';
				$mc6_axis_avg .= number_format($mc6_buf/$pembagi, 2, '.', '').', ';
				
				$pembagi++;
			}
			$category = substr($category_axis, 0, -2);
			$mc1 = substr($mc1_axis, 0, -2);
			$mc2 = substr($mc2_axis, 0, -2);
			$mc3 = substr($mc3_axis, 0, -2);
			$mc4 = substr($mc4_axis, 0, -2);
			$mc5 = substr($mc5_axis, 0, -2);
			$mc6 = substr($mc6_axis, 0, -2);
			$mc1_avg = substr($mc1_axis_avg, 0, -2);
			$mc2_avg = substr($mc2_axis_avg, 0, -2);
			$mc3_avg = substr($mc3_axis_avg, 0, -2);
			$mc4_avg = substr($mc4_axis_avg, 0, -2);
			$mc5_avg = substr($mc5_axis_avg, 0, -2);
			$mc6_avg = substr($mc6_axis_avg, 0, -2);
			
			$data['category'] = $category;
			$data['data1'] = $mc1;
			$data['data2'] = $mc2;
			$data['data3'] = $mc3;
			$data['data4'] = $mc4;
			$data['data5'] = $mc5;
			$data['data6'] = $mc6;
			$data['data1_avg'] = $mc1_avg;
			$data['data2_avg'] = $mc2_avg;
			$data['data3_avg'] = $mc3_avg;
			$data['data4_avg'] = $mc4_avg;
			$data['data5_avg'] = $mc5_avg;
			$data['data6_avg'] = $mc6_avg;
			$data['tot1'] = number_format($mc1_buf, 2, '.', '');
			$data['tot2'] = number_format($mc2_buf, 2, '.', '');
			$data['tot3'] = number_format($mc3_buf, 2, '.', '');
			$data['tot4'] = number_format($mc4_buf, 2, '.', '');
			$data['tot5'] = number_format($mc5_buf, 2, '.', '');
			$data['tot6'] = number_format($mc6_buf, 2, '.', '');
			$data['avg1'] = number_format($mc1_buf/$pembagi, 2, '.', '');
			$data['avg2'] = number_format($mc2_buf/$pembagi, 2, '.', '');
			$data['avg3'] = number_format($mc3_buf/$pembagi, 2, '.', '');
			$data['avg4'] = number_format($mc4_buf/$pembagi, 2, '.', '');
			$data['avg5'] = number_format($mc5_buf/$pembagi, 2, '.', '');
			$data['avg6'] = number_format($mc6_buf/$pembagi, 2, '.', '');
			$this->load->view('iot_autoclave/js_run_hour', $data);
		}else{
			echo 'no data';
		}
	}
}

?>
