<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Iot_utility extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_utility_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	function iot_elec_ov(){
		$this->global['pageTitle'] = 'RAWR : Electricity Overview';
		$this->loadViews("iot_utility/elec_ov", $this->global, NULL, NULL);
	}
	function iot_js_solar_main(){
		$data['mc_name_1'] = 'In';
		$data['mc_name_2'] = 'Out';
		$data['mc_name_3'] = 'Eff';
		$data['unit_1'] = 'kWh';
		$data['unit_2'] = 'kWh';
		$data['unit_3'] = '%';
		$data['limit1_1'] = 168;
		$data['limit1_2'] = 270;
		$data['limit1_3'] = 350;
		$data['limit2_1'] = 168;
		$data['limit2_2'] = 270;
		$data['limit2_3'] = 350;
		$data['limit3_1'] = 80;
		$data['limit3_2'] = 90;
		$data['limit3_3'] = 100;
		$data['color_start1'] = "#ff6363";
		$data['color_end1'] = "rgb(86, 244, 65)";
		$data['color_start2'] = "#ff6363";
		$data['color_end2'] = "rgb(86, 244, 65)";
		$data['color_start3'] = "#ff6363";
		$data['color_end3'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["0", "50", "100", "150", "200", "250", "300", "350"]';
		$data['majortick2'] = '["0", "50", "100", "150", "200", "250", "300", "350"]';
		$data['majortick3'] = '["0", "20", "40", "60", "80", "100"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_solar_main';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_solar_main(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->iot_solar_main();
		$ret = array(
			'gauge1iot_ajax_solar_main'=>number_format($power->power_in, 1, '.', ''),
			'gauge2iot_ajax_solar_main'=>number_format($power->power_out, 1, '.', ''),
			'gauge3iot_ajax_solar_main'=>number_format($power->power_out*100/$power->power_in, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_pwr2_main(){
		$data['mc_name_1'] = 'P';
		$data['mc_name_2'] = 'Q';
		$data['mc_name_3'] = 'S';
		$data['unit_1'] = 'kWh';
		$data['unit_2'] = 'kVAR';
		$data['unit_3'] = 'kVA';
		$data['limit1_1'] = 500;
		$data['limit1_2'] = 1000;
		$data['limit1_3'] = 1500;
		$data['limit2_1'] = 500;
		$data['limit2_2'] = 1000;
		$data['limit2_3'] = 1500;
		$data['limit3_1'] = 500;
		$data['limit3_2'] = 1000;
		$data['limit3_3'] = 1500;
		$data['color_end1'] = "#ff6363";
		$data['color_start1'] = "rgb(86, 244, 65)";
		$data['color_end2'] = "#ff6363";
		$data['color_start2'] = "rgb(86, 244, 65)";
		$data['color_end3'] = "#ff6363";
		$data['color_start3'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["0", "250", "500", "750", "1000", "1250", "1500"]';
		$data['majortick2'] = '["0", "250", "500", "750", "1000", "1250", "1500"]';
		$data['majortick3'] = '["0", "250", "500", "750", "1000", "1250", "1500"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_pwr2_main';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_pwr2_main(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastpowermeter();
		$ret = array(
			'gauge1iot_ajax_pwr2_main'=>number_format($power->actpwr, 1, '.', ''),
			'gauge2iot_ajax_pwr2_main'=>number_format($power->recpwr, 1, '.', ''),
			'gauge3iot_ajax_pwr2_main'=>number_format($power->apppwr, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_400volt(){
		$data['mc_name_1'] = 'Phase-R';
		$data['mc_name_2'] = 'Phase-S';
		$data['mc_name_3'] = 'Phase-T';
		$data['unit_1'] = 'Volt';
		$data['unit_2'] = 'Volt';
		$data['unit_3'] = 'Volt';
		$data['limit1_1'] = 380;
		$data['limit1_2'] = 400;
		$data['limit1_3'] = 440;
		$data['limit2_1'] = 380;
		$data['limit2_2'] = 400;
		$data['limit2_3'] = 440;
		$data['limit3_1'] = 380;
		$data['limit3_2'] = 400;
		$data['limit3_3'] = 440;
		$data['color_end1'] = "#fff";
		$data['color_mid1'] = "rgb(86, 244, 65)";
		$data['color_start1'] = "#fff";
		$data['color_end2'] = "#fff";
		$data['color_mid2'] = "rgb(86, 244, 65)";
		$data['color_start2'] = "#fff";
		$data['color_end3'] = "#fff";
		$data['color_mid3'] = "rgb(86, 244, 65)";
		$data['color_start3'] = "#fff";
		$data['majortick1'] = '["0", "40", "80", "120", "160", "200", "240", "280", "320", "360", "400", "440"]';
		$data['majortick2'] = '["0", "40", "80", "120", "160", "200", "240", "280", "320", "360", "400", "440"]';
		$data['majortick3'] = '["0", "40", "80", "120", "160", "200", "240", "280", "320", "360", "400", "440"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_400volt';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_400volt(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastpowermeter();
		$ret = array(
			'gauge1iot_ajax_400volt'=>number_format($power->vab, 1, '.', ''),
			'gauge2iot_ajax_400volt'=>number_format($power->vbc, 1, '.', ''),
			'gauge3iot_ajax_400volt'=>number_format($power->vca, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_voltunbalance(){
		$data['mc_name_1'] = 'Unbalance-R-V';
		$data['mc_name_2'] = 'Unbalance-S-V';
		$data['mc_name_3'] = 'Unbalance-T-V';
		$data['unit_1'] = '%';
		$data['unit_2'] = '%';
		$data['unit_3'] = '%';
		$data['limit1_1'] = 2;
		$data['limit1_2'] = 5;
		$data['limit1_3'] = 10;
		$data['limit2_1'] = 2;
		$data['limit2_2'] = 5;
		$data['limit2_3'] = 10;
		$data['limit3_1'] = 2;
		$data['limit3_2'] = 5;
		$data['limit3_3'] = 10;
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_voltunbalance';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_voltunbalance(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastpowermeter();
		$vm = ($power->vab + $power->vbc + $power->vca)/3;
		$vab = number_format($power->vab, 0, '.', '');
		$vbc = number_format($power->vbc, 0, '.', '');
		$vca = number_format($power->vca, 0, '.', '');
		if($vm == 0){
			$vua = 0;
			$vua_p = 0;
			$vub = 0;
			$vub_p = 0;
			$vuc = 0;
			$vuc_p = 0;
		}else{
			$vua = (abs($vm - $vab))*100/$vm;
			$vub = (abs($vm - $vbc))*100/$vm;
			$vuc = (abs($vm - $vca))*100/$vm;
		}
		$ret = array(
			'bar1iot_ajax_voltunbalance'=>number_format($vua, 1, '.', ''),
			'bar2iot_ajax_voltunbalance'=>number_format($vub, 1, '.', ''),
			'bar3iot_ajax_voltunbalance'=>number_format($vuc, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_400amp(){
		$data['mc_name_1'] = 'Amp-R';
		$data['mc_name_2'] = 'Amp-S';
		$data['mc_name_3'] = 'Amp-T';
		$data['unit_1'] = 'A';
		$data['unit_2'] = 'A';
		$data['unit_3'] = 'A';
		$data['limit1_1'] = 500;
		$data['limit1_2'] = 1000;
		$data['limit1_3'] = 1500;
		$data['limit2_1'] = 500;
		$data['limit2_2'] = 1000;
		$data['limit2_3'] = 1500;
		$data['limit3_1'] = 500;
		$data['limit3_2'] = 1000;
		$data['limit3_3'] = 1500;
		$data['color_end1'] = "#ff6363";
		$data['color_start1'] = "rgb(86, 244, 65)";
		$data['color_end2'] = "#ff6363";
		$data['color_start2'] = "rgb(86, 244, 65)";
		$data['color_end3'] = "#ff6363";
		$data['color_start3'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["0", "250", "500", "750", "1000", "1250", "1500"]';
		$data['majortick2'] = '["0", "250", "500", "750", "1000", "1250", "1500"]';
		$data['majortick3'] = '["0", "250", "500", "750", "1000", "1250", "1500"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_400amp';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_400amp(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastpowermeter();
		$ret = array(
			'gauge1iot_ajax_400amp'=>number_format($power->ia, 0, '.', ''),
			'gauge2iot_ajax_400amp'=>number_format($power->ib, 0, '.', ''),
			'gauge3iot_ajax_400amp'=>number_format($power->ic, 0, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_ampunbalance(){
		$data['mc_name_1'] = 'Unbalance-R-A';
		$data['mc_name_2'] = 'Unbalance-S-A';
		$data['mc_name_3'] = 'Unbalance-T-A';
		$data['unit_1'] = '%';
		$data['unit_2'] = '%';
		$data['unit_3'] = '%';
		$data['limit1_1'] = 2;
		$data['limit1_2'] = 5;
		$data['limit1_3'] = 10;
		$data['limit2_1'] = 2;
		$data['limit2_2'] = 5;
		$data['limit2_3'] = 10;
		$data['limit3_1'] = 2;
		$data['limit3_2'] = 5;
		$data['limit3_3'] = 10;
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_ampunbalance';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_ampunbalance(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastpowermeter();
		$vm = ($power->ia + $power->ib + $power->ic)/3;
		$vab = number_format($power->ia, 0, '.', '');
		$vbc = number_format($power->ib, 0, '.', '');
		$vca = number_format($power->ic, 0, '.', '');
		if($vm == 0){
			$vua = 0;
			$vua_p = 0;
			$vub = 0;
			$vub_p = 0;
			$vuc = 0;
			$vuc_p = 0;
		}else{
			$vua = (abs($vm - $vab))*100/$vm;
			$vub = (abs($vm - $vbc))*100/$vm;
			$vuc = (abs($vm - $vca))*100/$vm;
		}
		$ret = array(
			'bar1iot_ajax_ampunbalance'=>number_format($vua, 1, '.', ''),
			'bar2iot_ajax_ampunbalance'=>number_format($vub, 1, '.', ''),
			'bar3iot_ajax_ampunbalance'=>number_format($vuc, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_qmc2(){
		$data['mc_name_1'] = 'QMC2-R';
		$data['mc_name_2'] = 'QMC2-S';
		$data['mc_name_3'] = 'QMC2-T';
		$qmc_1 = $this->iot_utility_model->getparameter('ballmillamp1');
		$qmc_2 = $this->iot_utility_model->getparameter('ballmillamp2');
		$qmc_3 = $this->iot_utility_model->getparameter('ballmillamp3');
		$data['unit_1'] = $qmc_1->unit;
		$data['unit_2'] = $qmc_2->unit;
		$data['unit_3'] = $qmc_3->unit;
		$data['limit1_1'] = $qmc_1->value;
		$data['limit1_2'] = $qmc_2->value;
		$data['limit1_3'] = $qmc_3->value;
		$data['limit2_1'] = $qmc_1->value;
		$data['limit2_2'] = $qmc_2->value;
		$data['limit2_3'] = $qmc_3->value;
		$data['limit3_1'] = $qmc_1->value;
		$data['limit3_2'] = $qmc_2->value;
		$data['limit3_3'] = $qmc_3->value;
		$data['color_end1'] = "#ff6363";
		$data['color_start1'] = "rgb(86, 244, 65)";
		$data['color_end2'] = "#ff6363";
		$data['color_start2'] = "rgb(86, 244, 65)";
		$data['color_end3'] = "#ff6363";
		$data['color_start3'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["0", "15", "30", "45", "60", "75", "90"]';
		$data['majortick2'] = '["0", "15", "30", "45", "60", "75", "90"]';
		$data['majortick3'] = '["0", "15", "30", "45", "60", "75", "90"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_qmc2';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_qmc2(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastsepammeter();
		$ret = array(
			'gauge1iot_ajax_qmc2'=>number_format($power->s2a, 1, '.', ''),
			'gauge2iot_ajax_qmc2'=>number_format($power->s2b, 1, '.', ''),
			'gauge3iot_ajax_qmc2'=>number_format($power->s2c, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_qmc2unbalance(){
		$data['mc_name_1'] = 'Unbalance-QMC2-R';
		$data['mc_name_2'] = 'Unbalance-QMC2-S';
		$data['mc_name_3'] = 'Unbalance-QMC2-T';
		$data['unit_1'] = '%';
		$data['unit_2'] = '%';
		$data['unit_3'] = '%';
		$data['limit1_1'] = 2;
		$data['limit1_2'] = 5;
		$data['limit1_3'] = 10;
		$data['limit2_1'] = 2;
		$data['limit2_2'] = 5;
		$data['limit2_3'] = 10;
		$data['limit3_1'] = 2;
		$data['limit3_2'] = 5;
		$data['limit3_3'] = 10;
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_qmc2unbalance';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_qmc2unbalance(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastsepammeter();
		$im = ($power->s2a + $power->s2b + $power->s2c)/3;
		if($im == 0){
			$iua = 0;
			$iub = 0;
			$iuc = 0;
		}else{
			$iua = (abs($im - $power->s2a))*100/$im;
			$iub = (abs($im - $power->s2b))*100/$im;
			$iuc = (abs($im - $power->s2c))*100/$im;
		}
		$ret = array(
			'bar1iot_ajax_qmc2unbalance'=>number_format($iua, 1, '.', ''),
			'bar2iot_ajax_qmc2unbalance'=>number_format($iub, 1, '.', ''),
			'bar3iot_ajax_qmc2unbalance'=>number_format($iuc, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_qmc3(){
		$data['mc_name_1'] = 'QMC3-R';
		$data['mc_name_2'] = 'QMC3-S';
		$data['mc_name_3'] = 'QMC3-T';
		$qmc_1 = $this->iot_utility_model->getparameter('ballmillamp1');
		$qmc_2 = $this->iot_utility_model->getparameter('ballmillamp2');
		$qmc_3 = $this->iot_utility_model->getparameter('ballmillamp3');
		$data['unit_1'] = $qmc_1->unit;
		$data['unit_2'] = $qmc_2->unit;
		$data['unit_3'] = $qmc_3->unit;
		$data['limit1_1'] = $qmc_1->value;
		$data['limit1_2'] = $qmc_2->value;
		$data['limit1_3'] = $qmc_3->value;
		$data['limit2_1'] = $qmc_1->value;
		$data['limit2_2'] = $qmc_2->value;
		$data['limit2_3'] = $qmc_3->value;
		$data['limit3_1'] = $qmc_1->value;
		$data['limit3_2'] = $qmc_2->value;
		$data['limit3_3'] = $qmc_3->value;
		$data['color_end1'] = "#ff6363";
		$data['color_start1'] = "rgb(86, 244, 65)";
		$data['color_end2'] = "#ff6363";
		$data['color_start2'] = "rgb(86, 244, 65)";
		$data['color_end3'] = "#ff6363";
		$data['color_start3'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["0", "15", "30", "45", "60", "75", "90"]';
		$data['majortick2'] = '["0", "15", "30", "45", "60", "75", "90"]';
		$data['majortick3'] = '["0", "15", "30", "45", "60", "75", "90"]';
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_qmc3';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_qmc3(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastsepammeter();
		$ret = array(
			'gauge1iot_ajax_qmc3'=>number_format($power->s3a, 1, '.', ''),
			'gauge2iot_ajax_qmc3'=>number_format($power->s3b, 1, '.', ''),
			'gauge3iot_ajax_qmc3'=>number_format($power->s3c, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_qmc3unbalance(){
		$data['mc_name_1'] = 'Unbalance-QMC3-R';
		$data['mc_name_2'] = 'Unbalance-QMC3-S';
		$data['mc_name_3'] = 'Unbalance-QMC3-T';
		$data['unit_1'] = '%';
		$data['unit_2'] = '%';
		$data['unit_3'] = '%';
		$data['limit1_1'] = 2;
		$data['limit1_2'] = 5;
		$data['limit1_3'] = 10;
		$data['limit2_1'] = 2;
		$data['limit2_2'] = 5;
		$data['limit2_3'] = 10;
		$data['limit3_1'] = 2;
		$data['limit3_2'] = 5;
		$data['limit3_3'] = 10;
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_qmc3unbalance';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_qmc3unbalance(){
		header("Content-type: text/json");
		$power = $this->iot_utility_model->lastsepammeter();
		$im = ($power->s3a + $power->s3b + $power->s3c)/3;
		if($im == 0){
			$iua = 0;
			$iub = 0;
			$iuc = 0;
		}else{
			$iua = (abs($im - $power->s3a))*100/$im;
			$iub = (abs($im - $power->s3b))*100/$im;
			$iuc = (abs($im - $power->s3c))*100/$im;
		}
		$ret = array(
			'bar1iot_ajax_qmc3unbalance'=>number_format($iua, 1, '.', ''),
			'bar2iot_ajax_qmc3unbalance'=>number_format($iub, 1, '.', ''),
			'bar3iot_ajax_qmc3unbalance'=>number_format($iuc, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_sepam_main(){
		$power = $this->iot_utility_model->lastsepammeter();
		if(!empty($power)){
			$i2m = ($power->s2a + $power->s2b + $power->s2c)/3;
			$i2a = number_format($power->s2a, 1, '.', '');
			$i2b = number_format($power->s2b, 1, '.', '');
			$i2c = number_format($power->s2c, 1, '.', '');
			if($i2m == 0){
				$i2ua = 0;
				$i2ua_p = 0;
				$i2ub = 0;
				$i2ub_p = 0;
				$i2uc = 0;
				$i2uc_p = 0;
			}else{
				$i2ua = (abs($i2m - $i2a))*100/$i2m;
				$i2ua_p = $i2ua*1.25;
				$i2ub = (abs($i2m - $i2b))*100/$i2m;
				$i2ub_p = $i2ub*1.25;
				$i2uc = (abs($i2m - $i2c))*100/$i2m;
				$i2uc_p = $i2uc*1.25;
			}
			$i3m = ($power->s3a + $power->s3b + $power->s3c)/3;
			$i3a = number_format($power->s3a, 1, '.', '');
			$i3b = number_format($power->s3b, 1, '.', '');
			$i3c = number_format($power->s3c, 1, '.', '');
			if($i3m == 0){
				$i3ua = 0;
				$i3ua_p = 0;
				$i3ub = 0;
				$i3ub_p = 0;
				$i3uc = 0;
				$i3uc_p = 0;
			}else{
				$i3ua = (abs($i3m - $i3a))*100/$i3m;
				$i3ua_p = $i3ua*1.25;
				$i3ub = (abs($i3m - $i3b))*100/$i3m;
				$i3ub_p = $i3ub*1.25;
				$i3uc = (abs($i3m - $i3c))*100/$i3m;
				$i3uc_p = $i3uc*1.25;
			}
			echo '
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12 text-center">
							<h4><i class="fa fa-bolt"></i> QMC-2</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="text-center">
								<input type="text" class="knob" value="'.$i2a.'" data-anglearc="250" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-angleoffset="235" data-fgcolor="#4286f4" data-readonly="true" readonly="readonly">
								<p><b>R: '.$i2a.' A</b></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="text-center">
								<input type="text" class="knob" value="'.$i2b.'" data-anglearc="250" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-angleoffset="235" data-fgcolor="#4286f4" data-readonly="true" readonly="readonly">
								<p><b>S: '.$i2b.' A</b></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="text-center">
								<input type="text" class="knob" value="'.$i2c.'" data-anglearc="250" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-angleoffset="235" data-fgcolor="#4286f4" data-readonly="true" readonly="readonly">
								<p><b>T: '.$i2c.' A</b></p>
							</div>
						</div>
						<div class="col-md-3">
							<h5><small>Unbalance-R</small><span class="label label-danger pull-right">'.number_format($i2ua, 1, '.', '').' %</span></h5>
							<div class="progress progress-xxs bg-gray">
								<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$i2ua.'" aria-valuemin="0" aria-valuemax="2" style="width: '.$i2ua_p.'%"></div>
							</div>
							<h5><small>Unbalance-S</small><span class="label label-danger pull-right">'.number_format($i2ub, 1, '.', '').' %</span></h5>
							<div class="progress progress-xxs bg-gray">
								<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$i2ub.'" aria-valuemin="0" aria-valuemax="2" style="width: '.$i2ub_p.'%"></div>
							</div>
							<h5><small>Unbalance-T</small><span class="label label-danger pull-right">'.number_format($i2uc, 1, '.', '').' %</span></h5>
							<div class="progress progress-xxs bg-gray">
								<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$i2uc.'" aria-valuemin="0" aria-valuemax="2" style="width: '.$i2uc_p.'%"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12 text-center">
							<h4><i class="fa fa-bolt"></i> QMC-3</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="text-center">
								<input type="text" class="knob" value="'.$i3a.'" data-anglearc="250" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-angleoffset="235" data-fgcolor="#4286f4" data-readonly="true" readonly="readonly">
								<p><b>R: '.$i3a.' A</b></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="text-center">
								<input type="text" class="knob" value="'.$i3b.'" data-anglearc="250" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-angleoffset="235" data-fgcolor="#4286f4" data-readonly="true" readonly="readonly">
								<p><b>S: '.$i3b.' A</b></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="text-center">
								<input type="text" class="knob" value="'.$i3c.'" data-anglearc="250" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-angleoffset="235" data-fgcolor="#4286f4" data-readonly="true" readonly="readonly">
								<p><b>T: '.$i3c.' A</b></p>
							</div>
						</div>
						<div class="col-md-3">
							<h5><small>Unbalance-R</small><span class="label label-danger pull-right">'.number_format($i3ua, 1, '.', '').' %</span></h5>
							<div class="progress progress-xxs bg-gray">
								<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$i3ua.'" aria-valuemin="0" aria-valuemax="2" style="width: '.$i3ua_p.'%"></div>
							</div>
							<h5><small>Unbalance-S</small><span class="label label-danger pull-right">'.number_format($i3ub, 1, '.', '').' %</span></h5>
							<div class="progress progress-xxs bg-gray">
								<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$i3ub.'" aria-valuemin="0" aria-valuemax="2" style="width: '.$i3ub_p.'%"></div>
							</div>
							<h5><small>Unbalance-T</small><span class="label label-danger pull-right">'.number_format($i3uc, 1, '.', '').' %</span></h5>
							<div class="progress progress-xxs bg-gray">
								<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="'.$i3uc.'" aria-valuemin="0" aria-valuemax="2" style="width: '.$i3uc_p.'%"></div>
							</div>
						</div>
					</div>
				</div>
				<script>
					$(function() {
						$(".knob").knob({
							max: 80
						});
					});
				</script>';
			
		}
	}
	function iot_solar_per(){
		$start_date = $this->input->post('start_date');
		if(!empty($start_date)){
			$str = explode('-', $start_date);
			$sel_date = $str[0].'-'.$str[1];
			$next_mon = $str[1]+1;
			if($next_mon == 13){
				$nextyear = $str[0] + 1;
				$end_month = $year.'-01-01';
			}else{
				$end_month = $str[0].'-'.$next_mon.'-01';
			}
			$end_month = date('U', strtotime($end_month));
			$end_month = $end_month - 86400;
			$end_month = date('d', $end_month);
			$day = $end_month;
			$ddt = $sel_date;
			$data['ddt'] = date('F Y', strtotime($ddt));
			$data['start_date'] = date('Y-m-d', strtotime($ddt));
		}else{
			$data['start_date'] = date('Y-m-d');
			$day = date('d');
			$ddt = date('Y-m');
			$data['ddt'] = date('F Y', strtotime($ddt));
		}
		$kwhPLNarr = '';
		$kwhSOLARarr = '';
		$totPLN = 0;
		$totPV = 0;
		for ($x = 1; $x <= $day; $x++) {
			$day_1 = $ddt.'-'.$x;
			$unix = date('U', strtotime($day_1));
			$day_a = date('Y-m-d H:i:s', $unix);
			$unix2 = $unix + 86400;
			$day_b = date('Y-m-d H:i:s', $unix2);
			$getPLN = $this->iot_utility_model->getPLNmeter_d($day_a, $day_b);
			$getSEPAM = $this->iot_utility_model->getSEPAMmeter_d($day_a, $day_b);
			$getSOLAR = $this->iot_utility_model->getsolarmeter_d($day_a, $day_b);
			$kwhPLNarr .= number_format(($getPLN + $getSEPAM)/1000, 3, '.', '');
			$kwhPLNarr .= ',';
			$kwhSOLARarr .= number_format($getSOLAR/1000, 3, '.', '');
			$kwhSOLARarr .= ',';
			$totPLN = $totPLN + $getPLN + $getSEPAM;
			$totPV = $totPV + $getSOLAR;
		}
		$price = $this->iot_utility_model->getparameter('electrical price');
		$totEne = $totPLN + $totPV;
		if($totEne != 0){
			$data['persenPV'] = number_format((($totPV*100)/($totPLN + $totPV)), 2, '.', '.');
			$data['persenPLN'] = number_format((($totPLN*100)/($totPLN + $totPV)), 2, '.', '.');
		}else{
			$data['persenPV'] = 0;
			$data['persenPLN'] = 0;
		}
		$data['idrTOT'] = number_format((($totPLN + $totPV)*$price->value), 0, '.', '.');
		$data['idrPLN'] = number_format((($totPLN)*$price->value), 0, '.', '.');
		$data['idrPV'] = number_format((($totPV)*$price->value), 0, '.', '.');
		$data['PLN'] = substr($kwhPLNarr, 0, -1);
		$data['PV'] = substr($kwhSOLARarr, 0, -1);
		$data['basic_val'] = $price->value;
		$data['basic_id'] = $price->id;
		$this->global['pageTitle'] = 'RAWR : Today`s Data';
		$this->loadViews("iot_utility/todayelec", $this->global, $data, NULL);
	}
	function update_iot_config(){
		$val = $this->input->post('val');
		$id = $this->input->post('id');
		$redir = $this->input->post('redir');
		$update_val = array('value'=>$val);
		$update_conf = $this->iot_utility_model->update_conf($update_val, $id);
		redirect($redir);
	}
	function iot_amp(){
		$getdata = $this->iot_utility_model->lastpowermeter();
		if(!empty($getdata)){
			$box = '
				<div class="callout callout-warning">
					<h4>0.4kV Current</h4>
					<p>R: <b>'.number_format($getdata->ia,'1', '.', '').' A</b><br>S: <b>'.number_format($getdata->ib,'1', '.', '').' A</b><br>T: <b>'.number_format($getdata->ic,'1', '.', '').' A</b></p>
				</div>';
		}else{
			$box = '
				<div class="callout callout-warning">
					<h4>0.4kV Current</h4>
					<p>Database<br>has been<br>Disconnected</p>
				</div>';
		}
		echo $box;
	}
	function iot_power(){
		$getdata = $this->iot_utility_model->lastpowermeter();
		if(!empty($getdata)){
			if($getdata->actpwr >= 32768){$actpower = $getdata->actpwr - 65536;}else{$actpower = $getdata->actpwr;}
			if($getdata->recpwr >= 32768){$recpower = $getdata->recpwr - 65536;}else{$recpower = $getdata->recpwr;}
			if($getdata->apppwr >= 32768){$apppower = $getdata->apppwr - 65536;}else{$apppower = $getdata->apppwr;}
			$box = '
				<div class="callout callout-info">
					<h4>0.4kV Power</h4>
					<p>P: <b>'.number_format($actpower,'0', '.', '').' kW</b><br>Q: <b>'.number_format($recpower,'0', '.', '').' kVAR</b><br>S: <b>'.number_format($apppower,'0', '.', '').' kVA</b></p>
				</div>';
		}else{
			$box = '
				<div class="callout callout-info">
					<h4>0.4kV Power</h4>
					<p>Database<br>has been<br>Disconnected</p>
				</div>';
		}
		echo $box;
	}
	function iot_sepam(){
		$getdata = $this->iot_utility_model->lastsepammeter();
		if(!empty($getdata)){
			$ia = $getdata->s1a + $getdata->s2a + $getdata->s3a;
			$ib = $getdata->s1b + $getdata->s2b + $getdata->s3b;
			$ic = $getdata->s1c + $getdata->s2c + $getdata->s3c;
			$box = '
				<div class="callout callout-warning">
					<h4>6kV Current</h4>
					<p>R: <b>'.number_format($ia,'0', '.', '').' A</b><br>S: <b>'.number_format($ib,'0', '.', '').' A</b><br>T: <b>'.number_format($ic,'0', '.', '').' A</b></p>
				</div>';
		}else{
			$box = '
				<div class="callout callout-warning">
					<h4>6kV Current</h4>
					<p>Database<br>has been<br>Disconnected</p>
				</div>';
		}
		echo $box;
	}
	function iot_solar(){
		$getdata = $this->iot_utility_model->lastsolarmeter();
		$limit = date('Y-m-d 00:00:00');
		$getlist = $this->iot_utility_model->getsolarmeter($limit);
		$kwh = 0;
		if(!empty($getlist)){
			$a = 1;
			$x = 0;
			$kwh = 0;
			foreach($getlist as $rec){
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					$power = ($unix2/3600) * $rec->power_out;
					$kwh = $kwh + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		if(!empty($getdata)){
			$box = '
				<div class="callout bg-primary">
					<h4>Solar</h4>
					<p>In: <b>'.number_format($getdata->power_in,'0', '.', '').' kW</b><br>Out: <b>'.number_format($getdata->power_out,'0', '.', '').' kW</b><br>Tot: <b>'.number_format($kwh,'0', '.', '').' kWh</b></p>
				</div>';
		}else{
			$box = '
				<div class="callout bg-primary">
					<h4>Solar</h4>
					<p>Database<br>has been<br>Disconnected</p>
				</div>';
		}
		echo $box;
	}
	function iot_electotal(){
		//================================================PLN
		$limit = date('Y-m-d 00:00:00');
		$getPLN = $this->iot_utility_model->getPLNmeter($limit);
		if(!empty($getPLN)){
			$a = 1;
			$x = 0;
			$kwhPLN = 0;
			foreach($getPLN as $rec){
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					if($rec->actpwr >= 32768){$actpower = $rec->actpwr - 65536;}else{$actpower = $rec->actpwr;}
					$power = ($unix2/3600) * $actpower;
					$kwhPLN = $kwhPLN + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		//==============================================SEPAM
		$limit = date('Y-m-d 00:00:00');
		$getSEPAM = $this->iot_utility_model->getSEPAMmeter($limit);
		if(!empty($getSEPAM)){
			$a = 1;
			$x = 0;
			$kwhSEPAM = 0;
			foreach($getSEPAM as $rec){
				$ia = $rec->s1a + $rec->s2a + $rec->s3a;
				$ib = $rec->s1b + $rec->s2b + $rec->s3b;
				$ic = $rec->s1c + $rec->s2c + $rec->s3c;
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					$power = ($unix2/3600) * ((($ia + $ib + $ic)/3)*1.73*6*0.85);
					$kwhSEPAM = $kwhSEPAM + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		//==============================================SOLAR
		$limit = date('Y-m-d 00:00:00');
		$getlist = $this->iot_utility_model->getsolarmeter($limit);
		$kwh = 0;
		if(!empty($getlist)){
			$a = 1;
			$x = 0;
			$kwh = 0;
			foreach($getlist as $rec){
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					$power = ($unix2/3600) * $rec->power_out;
					$kwh = $kwh + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		//====================================================
		$kwhPLNtot = $kwhSEPAM + $kwhPLN;
		$kwhusage = $kwhPLNtot + $kwh;
		$box = '
				<div class="callout callout-danger">
					<h4>Total Power</h4>
					<p>PLN: <b>'.number_format($kwhPLNtot,'0', '.', '').' kWh</b><br>Solar: <b>'.number_format($kwh,'0', '.', '').' kWh</b><br>Usage: <b>'.number_format($kwhusage,'0', '.', '').' kWh</b></p>
				</div>';
		echo $box;
	}
	function iot_elecprice(){
		//================================================PLN
		$limit = date('Y-m-d 00:00:00');
		$getPLN = $this->iot_utility_model->getPLNmeter($limit);
		if(!empty($getPLN)){
			$a = 1;
			$x = 0;
			$kwhPLN = 0;
			foreach($getPLN as $rec){
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					if($rec->actpwr >= 32768){$actpower = $rec->actpwr - 65536;}else{$actpower = $rec->actpwr;}
					$power = ($unix2/3600) * $actpower;
					$kwhPLN = $kwhPLN + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		//==============================================SEPAM
		$limit = date('Y-m-d 00:00:00');
		$getSEPAM = $this->iot_utility_model->getSEPAMmeter($limit);
		if(!empty($getSEPAM)){
			$a = 1;
			$x = 0;
			$kwhSEPAM = 0;
			foreach($getSEPAM as $rec){
				$ia = $rec->s1a + $rec->s2a + $rec->s3a;
				$ib = $rec->s1b + $rec->s2b + $rec->s3b;
				$ic = $rec->s1c + $rec->s2c + $rec->s3c;
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					$power = ($unix2/3600) * ((($ia + $ib + $ic)/3)*1.73*6*0.85);
					$kwhSEPAM = $kwhSEPAM + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		//==============================================SOLAR
		$limit = date('Y-m-d 00:00:00');
		$getlist = $this->iot_utility_model->getsolarmeter($limit);
		$kwh = 0;
		if(!empty($getlist)){
			$a = 1;
			$x = 0;
			$kwh = 0;
			foreach($getlist as $rec){
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					$power = ($unix2/3600) * $rec->power_out;
					$kwh = $kwh + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		//====================================================
		$kwhPLNtot = $kwhSEPAM + $kwhPLN;
		$kwhusage = $kwhPLNtot + $kwh;
		$price = $this->iot_utility_model->getparameter('electrical price');
		$totalPLN = $kwhPLNtot * $price->value;
		$totalSolar = $kwh * $price->value;
		$totalAll = $kwhusage * $price->value;
		$box = '
				<div class="callout callout-success">
					<h4>Estimation</h4>
					<p>All: <b>'.number_format($totalAll,'0', '.', ',').' IDR</b><br>Solar: <b>'.number_format($totalSolar,'0', '.', ',').' IDR</b><br>PLN: <b>'.number_format($totalPLN,'0', '.', ',').' IDR</b></p>
				</div>';
		echo $box;
	}
	function iot_electrical_daily(){
		$start_date = $this->input->post('start_date');
		if(!empty($start_date)){
			$data['start_date'] = $start_date;
			$start_unix = date('U', strtotime($start_date));
		}else{
			$data['start_date'] = date('Y-m-d');
			$start_unix = date('U');
			$start_unix = $start_unix - ($start_unix % 86400) - 25200;
		}
		$kwhPLNarr = '';
		$kwhSOLARarr = '';
		$totPLN = 0;
		$totPV = 0;
		for ($x = 0; $x <= 23; $x++){
			$limit_a = $start_unix + ($x*3600);
			$limit_b = $start_unix + ($x*3600) + 3600;
			$limit_a = date('Y-m-d H:i:s', $limit_a);
			$limit_b = date('Y-m-d H:i:s', $limit_b);
			$getPLN = $this->iot_utility_model->getPLNmeter_d($limit_a, $limit_b);
			$getSEPAM = $this->iot_utility_model->getSEPAMmeter_d($limit_a, $limit_b);
			$getSOLAR = $this->iot_utility_model->getsolarmeter_d($limit_a, $limit_b);
			$kwhPLNarr .= number_format(($getPLN + $getSEPAM), 1, '.', '');
			$kwhPLNarr .= ',';
			$kwhSOLARarr .= number_format($getSOLAR, 1, '.', '');
			$kwhSOLARarr .= ',';
			$totPLN = $totPLN + $getPLN + $getSEPAM;
			$totPV = $totPV + $getSOLAR;
		}
		$price = $this->iot_utility_model->getparameter('electrical price');
		$totEne = $totPLN + $totPV;
		if($totEne != 0){
			$data['persenPV'] = number_format((($totPV*100)/($totPLN + $totPV)), 2, '.', '.');
			$data['persenPLN'] = number_format((($totPLN*100)/($totPLN + $totPV)), 2, '.', '.');
		}else{
			$data['persenPV'] = 0;
			$data['persenPLN'] = 0;
		}
		$data['idrTOT'] = number_format((($totPLN + $totPV)*$price->value), 0, '.', '.');
		$data['idrPLN'] = number_format((($totPLN)*$price->value), 0, '.', '.');
		$data['idrPV'] = number_format((($totPV)*$price->value), 0, '.', '.');
		$data['PLN'] = substr($kwhPLNarr, 0, -1);
		$data['PV'] = substr($kwhSOLARarr, 0, -1);
		$data['basic_val'] = $price->value;
		$data['basic_id'] = $price->id;
		$this->global['pageTitle'] = 'RAWR : Daily Data';
		$this->loadViews("iot_utility/dailyelec", $this->global, $data, NULL);
	}
	function iot_sepam_record($no){
		$data['no'] = $no;
		$this->global['pageTitle'] = 'RAWR : SEPAM Data';
		$this->loadViews("iot_utility/sepam_record", $this->global, $data, NULL);
	}
	function iot_sepam_table($no, $unix){
		$todate = date('Y-m-d H:i:s', $unix);
		$chart = $this->iot_utility_model->getSEPAM_chart($no, $todate);
		$data['no'] = $no;
		$data['chart'] = $chart;
		$xamp1 = '';
		$xamp2 = '';
		$xamp3 = '';
		if(!empty($chart)){
			$eek1 = 0;
			foreach($chart as $result){
				$eek = date('U', strtotime($result->timestamp))*1000;
				if($eek1 > 0){
					$eekasli = $eek1 - $eek;
					if($eekasli > 180000){
						$eekax1 = $eek1 - 1000;
						$eekax2 = $eek + 1000;
						$xamp1 .= '{x:'.$eekax1.', y:0}, ';
						$xamp2 .= '{x:'.$eekax1.', y:0}, ';
						$xamp3 .= '{x:'.$eekax1.', y:0}, ';
						$xamp1 .= '{x:'.$eekax2.', y:0}, ';
						$xamp2 .= '{x:'.$eekax2.', y:0}, ';
						$xamp3 .= '{x:'.$eekax2.', y:0}, ';
					}
				}
				$xamp1 .= '{x:'.$eek.', y:'.number_format($result->amp1, 1, '.', '').'}, ';
				$xamp2 .= '{x:'.$eek.', y:'.number_format($result->amp2, 1, '.', '').'}, ';
				$xamp3 .= '{x:'.$eek.', y:'.number_format($result->amp3, 1, '.', '').'}, ';
				
				$eek1 = $eek;
			}
		}
		$data['seri1'] = 'R(A)';
		$data['seri2'] = 'S(A)';
		$data['seri3'] = 'T(A)';
		$data['amp1'] = substr($xamp1, 0, -2);
		$data['amp2'] = substr($xamp2, 0, -2);
		$data['amp3'] = substr($xamp3, 0, -2);
		$this->load->view('iot_utility/abc_chart', $data);
	}
	function iot_pwr_record(){
		$this->global['pageTitle'] = 'RAWR : 0.4kV Power Data';
		$this->loadViews("iot_utility/pwr_record", $this->global, NULL, NULL);
	}
	function iot_main_pwr_table($unix){
		$todate = date('Y-m-d H:i:s', $unix);
		$chart = $this->iot_utility_model->get_pwrmain_chart($todate);
		$xact = '';
		$xrec = '';
		$xapp = '';
		$xamp1 = '';
		$xamp2 = '';
		$xamp3 = '';
		$xvolt1 = '';
		$xvolt2 = '';
		$xvolt3 = '';
		if(!empty($chart)){
			foreach($chart as $result){
				$eek = date('U', strtotime($result->timestamp))*1000;
				$act = number_format($result->actpwr, 1, '.', '');
				$rec = number_format($result->recpwr, 1, '.', '');
				$app = number_format($result->apppwr, 1, '.', '');
				if($act > 32768){$act = $act - 65535;}
				if($rec > 32768){$rec = $rec - 65535;}
				if($app > 32768){$app = $app - 65535;}
				$xact .= '{x:'.$eek.', y:'.$act.'}, ';
				$xrec .= '{x:'.$eek.', y:'.$rec.'}, ';
				$xapp .= '{x:'.$eek.', y:'.$app.'}, ';
				$xamp1 .= '{x:'.$eek.', y:'.number_format($result->ia, 1, '.', '').'}, ';
				$xamp2 .= '{x:'.$eek.', y:'.number_format($result->ib, 1, '.', '').'}, ';
				$xamp3 .= '{x:'.$eek.', y:'.number_format($result->ic, 1, '.', '').'}, ';
				$xvolt1 .= '{x:'.$eek.', y:'.number_format($result->vab, 1, '.', '').'}, ';
				$xvolt2 .= '{x:'.$eek.', y:'.number_format($result->vbc, 1, '.', '').'}, ';
				$xvolt3 .= '{x:'.$eek.', y:'.number_format($result->vca, 1, '.', '').'}, ';
			}
		}
		$data['chart'] = $chart;
		$data['act'] = substr($xact, 0, -2);
		$data['rec'] = substr($xrec, 0, -2);
		$data['app'] = substr($xapp, 0, -2);
		$data['amp1'] = substr($xamp1, 0, -2);
		$data['amp2'] = substr($xamp2, 0, -2);
		$data['amp3'] = substr($xamp3, 0, -2);
		$data['volt1'] = substr($xvolt1, 0, -2);
		$data['volt2'] = substr($xvolt2, 0, -2);
		$data['volt3'] = substr($xvolt3, 0, -2);
		$this->load->view('iot_utility/pwr_chart', $data);
	}
	function iot_pv_record(){
		$this->global['pageTitle'] = 'RAWR : PV Data';
		$this->loadViews("iot_utility/pv_record", $this->global, NULL, NULL);
	}
	function iot_main_pv_table($unix){
		$todate = date('Y-m-d H:i:s', $unix);
		$chart = $this->iot_utility_model->get_pvmain_chart($todate);
		$xamp1 = '';
		$xamp2 = '';
		$xamp3 = '';
		if(!empty($chart)){
			$eek1 = 0;
			foreach($chart as $result){
				$eek = date('U', strtotime($result->timestamp))*1000;
				if($eek1 > 0){
					$eekasli = $eek1 - $eek;
					if($eekasli > 600000){
						$eekax1 = $eek1 - 1000;
						$eekax2 = $eek + 1000;
						$xamp1 .= '{x:'.$eekax1.', y:0}, ';
						$xamp2 .= '{x:'.$eekax1.', y:0}, ';
						$xamp3 .= '{x:'.$eekax1.', y:0}, ';
						$xamp1 .= '{x:'.$eekax2.', y:0}, ';
						$xamp2 .= '{x:'.$eekax2.', y:0}, ';
						$xamp3 .= '{x:'.$eekax2.', y:0}, ';
					}
				}
				$xamp1 .= '{x:'.$eek.', y:'.number_format($result->dc_amp, 1, '.', '').'}, ';
				$xamp2 .= '{x:'.$eek.', y:'.number_format($result->power_in, 1, '.', '').'}, ';
				$xamp3 .= '{x:'.$eek.', y:'.number_format($result->power_out, 1, '.', '').'}, ';
				
				$eek1 = $eek;
			}
		}
		$data['seri1'] = 'DC(A)';
		$data['seri2'] = 'P in(kW)';
		$data['seri3'] = 'P out(kW)';
		$data['amp1'] = substr($xamp1, 0, -2);
		$data['amp2'] = substr($xamp2, 0, -2);
		$data['amp3'] = substr($xamp3, 0, -2);
		$this->load->view('iot_utility/abc_chart', $data);
	}
}

?>
