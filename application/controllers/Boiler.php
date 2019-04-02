<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Boiler extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('boiler_model');
        $this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
    
    public function index()
    {
        $this->isLoggedIn();
    }
	function boilerinput()
    {
		$data['username'] = $this->global ['name'];
		$data['boiler'] = $this->boiler_model->getboilerlast();
		$data['boiler2'] = $this->boiler_model->getboiler2last();
		$this->global['pageTitle'] = 'RAWR : Boiler Input';
		
		$this->loadViews("boiler/boilerinput", $this->global, $data, NULL);
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
				
			$result = $this->boiler_model->addboilerinput1($boiler1Info);
			
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
				
			$result = $this->boiler_model->addboilerinput2($boiler2Info);
			
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
		$result = $this->boiler_model->addboilerinput3($boiler3Info);
		redirect('boilerinput');
    }
	
	function boilerday()
    {
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$result = $this->boiler_model->getdailyusage($fromDate, $toDate);
		
		$water = '';
		$steam = '';
		$kwh = '';
		if(!empty($result))
		{
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
		
		//$data['day'] = $result;
		$this->global['pageTitle'] = 'RAWR : Boiler Hourly';
		
		$this->loadViews("boiler/boilerday", $this->global, $data, NULL);
    }
	
	public function waterquality(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$result = $this->boiler_model->getwaterquality($fromDate, $toDate);
		$ph1 = '';
		$ph2 = '';
		$ph3 = '';
		$ec1 = '';
		$ec2 = '';
		$ec3 = '';
		$tb1 = '';
		$tb2 = '';
		$tb3 = '';
		if(!empty($result))
		{
			
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->timestamp)));
				$ph1 .= '{x:'.$timeunix.',y:'.$record->bd_2.'}, ';
				$ph2 .= '{x:'.$timeunix.',y:'.$record->bl_2.'}, ';
				$ph3 .= '{x:'.$timeunix.',y:'.$record->bf_2.'}, ';
				$ec1 .= '{x:'.$timeunix.',y:'.$record->bd_3.'}, ';
				$ec2 .= '{x:'.$timeunix.',y:'.$record->bl_3.'}, ';
				$ec3 .= '{x:'.$timeunix.',y:'.$record->bf_3.'}, ';
				$tb1 .= '{x:'.$timeunix.',y:'.$record->bd_4.'}, ';
				$tb2 .= '{x:'.$timeunix.',y:'.$record->bl_4.'}, ';
				$tb3 .= '{x:'.$timeunix.',y:'.$record->bf_4.'}, ';
			}
		}
		$data['ph1'] = substr($ph1, 0, -2);
		$data['ph2'] = substr($ph2, 0, -2);
		$data['ph3'] = substr($ph3, 0, -2);
		$data['ec1'] = substr($ec1, 0, -2);
		$data['ec2'] = substr($ec2, 0, -2);
		$data['ec3'] = substr($ec3, 0, -2);
		$data['tb1'] = substr($tb1, 0, -2);
		$data['tb2'] = substr($tb2, 0, -2);
		$data['tb3'] = substr($tb3, 0, -2);
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->boiler_model->waterqualityCount($fromDate, $toDate);
		$returns = $this->paginationCompress ( "waterquality/", $count, 10);
		
		$data['waterqty']= $this->boiler_model->waterquality($fromDate, $toDate,  $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : Water Quality';
		$this->loadViews("boiler/waterquality", $this->global, $data, NULL);
	}
	
	public function wqacidity(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$result = $this->boiler_model->getwaterquality($fromDate, $toDate);
		$ph1 = '';
		$ph2 = '';
		$ph3 = '';
		if(!empty($result))
		{
			
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->timestamp)));
				$ph1 .= '{x:'.$timeunix.',y:'.$record->bd_2.'}, ';
				$ph2 .= '{x:'.$timeunix.',y:'.$record->bl_2.'}, ';
				$ph3 .= '{x:'.$timeunix.',y:'.$record->bf_2.'}, ';
			}
		}
		$data['ph1'] = substr($ph1, 0, -2);
		$data['ph2'] = substr($ph2, 0, -2);
		$data['ph3'] = substr($ph3, 0, -2);
		
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->boiler_model->waterqualityCount($fromDate, $toDate);
		$returns = $this->paginationCompress ( "wqacidity/", $count, 10);
		
		$data['waterqty']= $this->boiler_model->waterquality($fromDate, $toDate,  $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : Water Quality';
		$this->loadViews("boiler/wqacidity", $this->global, $data, NULL);
	}
	
	public function wqconductivity(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$result = $this->boiler_model->getwaterquality($fromDate, $toDate);
		$ec1 = '';
		$ec2 = '';
		$ec3 = '';
		if(!empty($result))
		{
			
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->timestamp)));
				$ec1 .= '{x:'.$timeunix.',y:'.$record->bd_3.'}, ';
				$ec2 .= '{x:'.$timeunix.',y:'.$record->bl_3.'}, ';
				$ec3 .= '{x:'.$timeunix.',y:'.$record->bf_3.'}, ';
			}
		}
		$data['ec1'] = substr($ec1, 0, -2);
		$data['ec2'] = substr($ec2, 0, -2);
		$data['ec3'] = substr($ec3, 0, -2);
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->boiler_model->waterqualityCount($fromDate, $toDate);
		$returns = $this->paginationCompress ( "wqconductivity/", $count, 10);
		
		$data['waterqty']= $this->boiler_model->waterquality($fromDate, $toDate,  $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : Water Quality';
		$this->loadViews("boiler/wqconductivity", $this->global, $data, NULL);
	}
	
	public function wqturbidity(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$result = $this->boiler_model->getwaterquality($fromDate, $toDate);
		$tb1 = '';
		$tb2 = '';
		$tb3 = '';
		if(!empty($result))
		{
			
			foreach($result as $record)
			{
				$timeunix = 1000*(date('U', strtotime($record->timestamp)));
				$tb1 .= '{x:'.$timeunix.',y:'.$record->bd_4.'}, ';
				$tb2 .= '{x:'.$timeunix.',y:'.$record->bl_4.'}, ';
				$tb3 .= '{x:'.$timeunix.',y:'.$record->bf_4.'}, ';
			}
		}
		$data['tb1'] = substr($tb1, 0, -2);
		$data['tb2'] = substr($tb2, 0, -2);
		$data['tb3'] = substr($tb3, 0, -2);
		
		$this->load->library('pagination'); //koding paginasi
		$count = $this->boiler_model->waterqualityCount($fromDate, $toDate);
		$returns = $this->paginationCompress ( "wqturbidity/", $count, 10);
		
		$data['waterqty']= $this->boiler_model->waterquality($fromDate, $toDate,  $returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : Water Quality';
		$this->loadViews("boiler/wqturbidity", $this->global, $data, NULL);	
	}

	function prod_js_boilerph(){
		$data['mc_name_1'] = 'Feedwater';
		$data['mc_name_2'] = 'Boiler';
		$data['mc_name_3'] = 'Blowdown';
		$limiter1 = $this->boiler_model->load_iot_setting('phyellowgreen');
		$limiter2 = $this->boiler_model->load_iot_setting('phgreenred');
		$limiter3 = $this->boiler_model->load_iot_setting('phredmax');
		$data['unit_1'] = $limiter1->unit;
		$data['unit_2'] = $limiter1->unit;
		$data['unit_3'] = $limiter1->unit;
		$data['limit1_1'] = $limiter1->value;
		$data['limit1_2'] = $limiter2->value;
		$data['limit1_3'] = $limiter3->value;
		$data['limit2_1'] = $limiter1->value;
		$data['limit2_2'] = $limiter2->value;
		$data['limit2_3'] = $limiter3->value;
		$data['limit3_1'] = $limiter1->value;
		$data['limit3_2'] = $limiter2->value;
		$data['limit3_3'] = $limiter3->value;
		$data['limit4_1'] = $limiter1->value;
		$data['limit4_2'] = $limiter2->value;
		$data['limit4_3'] = $limiter3->value;
		$data['color_start1'] = "#ff0000";
		$data['color_end1'] = "rgb(0, 255,0)";
		$data['color_start2'] = "#ff0000";
		$data['color_end2'] = "rgb(0, 255,0)";
		$data['color_start3'] = "#ff0000";
		$data['color_end3'] = "rgb(0, 255,0)";
		$data['color_start4'] = "#ff0000";
		$data['color_end4'] = "rgb(0, 255,0)";
		$data['majortick1'] = '["0", "2", "4", "6", "8", "10", "12", "14"]';
		$data['majortick2'] = '["0", "2", "4", "6", "8", "10", "12", "14"]';
		$data['majortick3'] = '["0", "2", "4", "6", "8", "10", "12", "14"]';
		$data['majortick4'] = '["0", "20", "40", "60", "80", "100"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'prod_ajax_boilerph';
		$this->load->view("boiler/js_4gauge", $data);
	}

	function prod_ajax_boilerph(){
		header("Content-type: text/json");
		$ph = $this->boiler_model->getwaterqualities();
		$ret = array(
			'gauge1prod_ajax_boilerph'=>number_format($ph->bf_2, 1, '.', ''),
			'gauge2prod_ajax_boilerph'=>number_format($ph->bl_2, 1, '.', ''),
			'gauge3prod_ajax_boilerph'=>number_format($ph->bd_2, 1, '.', '')
		);
		echo json_encode($ret);
	}

	function prod_js_boilercd(){
		$data['mc_name_1'] = 'Feedwater-Conductivity';
		$data['mc_name_2'] = 'Boiler-Conductivity';
		$data['mc_name_3'] = 'Blowdown-Conductivity';
		$limiter1 = $this->boiler_model->load_iot_setting('cdyellowgreen');
		$limiter2 = $this->boiler_model->load_iot_setting('cdgreenred');
		$limiter3 = $this->boiler_model->load_iot_setting('cdredmax');
		$data['unit_1'] = $limiter1->unit;
		$data['unit_2'] = $limiter1->unit;
		$data['unit_3'] = $limiter1->unit;
		$data['limit1_1'] = $limiter1->value;
		$data['limit1_2'] = $limiter2->value;
		$data['limit1_3'] = $limiter3->value;
		$data['limit2_1'] = $limiter1->value;
		$data['limit2_2'] = $limiter2->value;
		$data['limit2_3'] = $limiter3->value;
		$data['limit3_1'] = $limiter1->value;
		$data['limit3_2'] = $limiter2->value;
		$data['limit3_3'] = $limiter3->value;
		$data['limit4_1'] = $limiter1->value;
		$data['limit4_2'] = $limiter2->value;
		$data['limit4_3'] = $limiter3->value;
		$data['color_start1'] = "#ff0000";
		$data['color_end1'] = "rgb(0, 255,0)";
		$data['color_start2'] = "#ff0000";
		$data['color_end2'] = "rgb(0, 255,0)";
		$data['color_start3'] = "#ff0000";
		$data['color_end3'] = "rgb(0, 255,0)";
		$data['color_start4'] = "#ff0000";
		$data['color_end4'] = "rgb(0, 255,0)";
		$data['majortick1'] = '["0", "200", "400", "600", "800"]';
		$data['majortick2'] = '["0", "2000", "4000", "6000", "8000"]';
		$data['majortick3'] = '["0", "200", "400", "600", "800"]';
		$data['majortick4'] = '["0", "20", "40", "60", "80", "100"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'prod_ajax_boilercd';
		$this->load->view("boiler/js_4gaugecd", $data);
	}

	function prod_ajax_boilercd(){
		header("Content-type: text/json");
		$cd = $this->boiler_model->getwaterqualities();
		$ret = array(
			'gauge1prod_ajax_boilercd'=>number_format($cd->bf_3, 1, '.', ''),
			'gauge2prod_ajax_boilercd'=>number_format($cd->bl_3, 1, '.', ''),
			'gauge3prod_ajax_boilercd'=>number_format($cd->bd_3, 1, '.', '')
		);
		echo json_encode($ret);
	}

	function prod_js_boilertb(){
		$data['mc_name_1'] = 'Feedwater-Turbidity';
		$data['mc_name_2'] = 'Boiler-Turbidity';
		$data['mc_name_3'] = 'Blowdown-Turbidity';
		$limiter1 = $this->boiler_model->load_iot_setting('tbyellowgreen');
		$limiter2 = $this->boiler_model->load_iot_setting('tbgreenred');
		$limiter3 = $this->boiler_model->load_iot_setting('tbredmax');
		$data['unit_1'] = $limiter1->unit;
		$data['unit_2'] = $limiter1->unit;
		$data['unit_3'] = $limiter1->unit;
		$data['limit1_1'] = $limiter1->value;
		$data['limit1_2'] = $limiter2->value;
		$data['limit1_3'] = $limiter3->value;
		$data['limit2_1'] = $limiter1->value;
		$data['limit2_2'] = $limiter2->value;
		$data['limit2_3'] = $limiter3->value;
		$data['limit3_1'] = $limiter1->value;
		$data['limit3_2'] = $limiter2->value;
		$data['limit3_3'] = $limiter3->value;
		$data['limit4_1'] = $limiter1->value;
		$data['limit4_2'] = $limiter2->value;
		$data['limit4_3'] = $limiter3->value;
		$data['color_start1'] = "#ff0000";
		$data['color_end1'] = "rgb(0, 255,0)";
		$data['color_start2'] = "#ff0000";
		$data['color_end2'] = "rgb(0, 255,0)";
		$data['color_start3'] = "#ff0000";
		$data['color_end3'] = "rgb(0, 255,0)";
		$data['color_start4'] = "#ff0000";
		$data['color_end4'] = "rgb(0, 255,0)";
		$data['majortick1'] = '["0", "40", "80", "120", "160", "200"]';
		$data['majortick2'] = '["0", "40", "80", "120", "160", "200"]';
		$data['majortick3'] = '["0", "40", "80", "120", "160", "200"]';
		$data['majortick4'] = '["0", "20", "40", "60", "80", "100"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'prod_ajax_boilertb';
		$this->load->view("boiler/js_4gaugetb", $data);
	}

	function prod_ajax_boilertb(){
		header("Content-type: text/json");
		$tb = $this->boiler_model->getwaterqualities();
		$ret = array(
			'gauge1prod_ajax_boilertb'=>number_format($tb->bf_4, 1, '.', ''),
			'gauge2prod_ajax_boilertb'=>number_format($tb->bl_4, 1, '.', ''),
			'gauge3prod_ajax_boilertb'=>number_format($tb->bd_4, 1, '.', '')
		);
		echo json_encode($ret);
	}
		
}

?>
