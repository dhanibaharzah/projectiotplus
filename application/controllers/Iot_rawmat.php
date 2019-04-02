<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Iot_rawmat extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_rawmat_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	public function ballrec($no){
		$data['no'] = $no;
		$this->global['pageTitle'] = 'RAWR : Ballmill '.$no.' Record';
		$this->loadViews("iot_rawmat/ballrec", $this->global, $data, NULL);
	}
	public function iot_mat_table(){
		$this->global['pageTitle'] = 'RAWR : Material Table Record';
		$this->loadViews("iot_rawmat/material", $this->global, NULL, NULL);
	}
	public function iot_js_mat($unix){
		$toDate = date('Y-m-d H:i:s', $unix);
		$table = $this->iot_rawmat_model->iot_js_mat($toDate);
		if(!empty($table)){
			echo '
				<div class="col-lg-12 col-xs-12">
					<table class="table table-hover table-striped taable-bordered ">
						<tr>
							<th>Timestamp</th>
							<th>SS1(%)</th>
							<th>SS2(%)</th>
							<th>RS1(%)</th>
							<th>RS2(%)</th>
							<th>Lime Dis(m)</th>
							<th>Cement Dis (m)</th>
						</tr>';
			foreach($table as $record){
				echo '
						<tr>
							<td>'.$record->timestamp.'</td>
							<td>'.number_format($record->SS_1, 1, '.', '').'</td>
							<td>'.number_format($record->SS_2, 1, '.', '').'</td>
							<td>'.number_format($record->RS_1,1, '.', '').'</td>
							<td>'.number_format($record->RS_2, 1, '.', '').'</td>
							<td>'.number_format($record->LIME, 2, '.', '').'</td>
							<td>'.number_format($record->CEM, 2, '.', '').'</td>
						</tr>';
			}
		}
		echo '
					</table>
				</div>';
	}
	public function iot_ballrec_chart($no, $unix){
		$toDate = date('Y-m-d H:i:s', $unix);
		$bc_x = $this->iot_rawmat_model->sqlbc($no, $toDate);
		$x1 = '';
		$x2 = '';
		$x3 = '';
		$x4 = '';
		if(!empty($bc_x)){
			foreach($bc_x as $result){
				$eek = date('U', strtotime($result->timestamp))*1000;
				$water = $result->cuwd;
				$sand = $result->totalflow/10;
				$speed = $result->avgflow;
				if($speed > 500){$speed = 500; }
				$flow = $result->freq/10;
				if($flow > 30){$flow = 30; }
				$x1 .= '{x:'.$eek.', y:'.$flow.'}, ';
				$x2 .= '{x:'.$eek.', y:'.$water.'}, ';
				$x3 .= '{x:'.$eek.', y:'.$sand.'}, ';
				$x4 .= '{x:'.$eek.', y:'.$speed.'}, ';
			}
		}
		$data['wateraxis'] = substr($x2, 0, -2);
		$data['sandaxis'] = substr($x3, 0, -2);
		$data['speedaxis'] = substr($x4, 0, -2);
		$data['bmaxis'] = substr($x1, 0, -2);
		$data['bctable'] = $bc_x;
		$this->load->view('iot_rawmat/bc_chart', $data);
	}
	public function iot_ballmillov(){
		$this->global['pageTitle'] = 'RAWR : Ballmill Overview';
		$this->loadViews("iot_rawmat/ballmillov", $this->global, NULL, NULL);
	}
	function iot_bm_flow(){
		$bm_flow = $this->iot_rawmat_model->bm_flow();
		if(!empty($bm_flow)){
			$nowunix = date('U');
			$lastdata = date('U', strtotime($bm_flow->timestamp));
			$gapunix = $nowunix - $lastdata;
			$get0 = 0;
			if($gapunix > 600){$get0 = 1;}
			$actbm = $bm_flow->cflow;
			if($get0 == 0){
				echo '
					<div class="col-md-12">
						Last Active Ballmill: <b>'.$actbm.'</b>, on '.$bm_flow->timestamp.'
					';
				$tot = number_format($bm_flow->cspeed, 1, '.', '');
				$totx = $tot/10;
				echo '
						<h5><b>Total Feed</b><span class="label label-danger pull-right">'.$tot.' ton</span></h5>
						<div class="progress progress-xxs bg-gray">
							<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$tot.'" aria-valuemin="0" aria-valuemax="1000" style="width: '.$totx.'%"></div>
						</div>
					</div>
					';
			}else{
				echo '
					<div class="col-md-12">
						<b>Looks like there are no active Ballmill</b>
					';
			}
		}
	}
	function iot_seal(){
		$this->global['pageTitle'] = 'RAWR : Water Sealing';
		$this->loadViews("iot_rawmat/seal", $this->global, NULL, NULL);
	}
	function iot_js_seal_weight($unix){
		$iot_js_seal_weight = $this->iot_rawmat_model->iot_js_seal_weight(date('Y-m-d H:i:s',$unix));
		if(!empty($iot_js_seal_weight)){
			echo '
				<div class="col-lg-12 col-xs-12">
					<table class="table table-hover table-striped taable-bordered ">
						<tr>
							<th>Timestamp</th>
							<th>POS</th>
							<th>Note</th>
						</tr>';
			foreach($iot_js_seal_weight as $record){
				$stat = number_format($record->w1, 1, '.', '');
				if($stat == 0.0){$notes = '<span class="label label-default">OFF</span>';}
				if($stat == 0.1){$notes = '<span class="label label-success">OK</span>';}
				if($stat == 1.0){$notes = '<span class="label label-warning">ERROR</span>';}
				if($stat == 1.1){$notes = '<span class="label label-danger">Mampet</span>';}
				echo '
						<tr>
							<td>'.$record->timestamp.'</td>
							<td>'.$stat.'</td>
							<td>'.$notes.'</td>
						</tr>';
			}
		}else{
			echo 'Opss... No Data';
		}
	}
	function iot_js_seal_slush($unix){
		$iot_js_seal_slush = $this->iot_rawmat_model->iot_js_seal_slush(date('Y-m-d H:i:s',$unix));
		if(!empty($iot_js_seal_slush)){
			echo '
				<div class="col-lg-12 col-xs-12">
					<table class="table table-hover table-striped taable-bordered ">
						<tr>
							<th>Timestamp</th>
							<th>POS</th>
							<th>Note</th>
						</tr>';
			foreach($iot_js_seal_slush as $record){
				if($record->sludge == '0.0'){$notes = '<span class="label label-default">OFF</span>';$stat = '0.0';}
				if($record->sludge == '1.0'){$notes = '<span class="label label-success">OK</span>';$stat = '0.1';}
				if($record->sludge == '0.1'){$notes = '<span class="label label-warning">ERROR</span>';$stat = '1.0';}
				if($record->sludge == '1.1'){$notes = '<span class="label label-danger">Mampet</span>';$stat = '1.1';}
				echo '
						<tr>
							<td>'.$record->timestamp.'</td>
							<td>'.$stat.'</td>
							<td>'.$notes.'</td>
						</tr>';
			}
		}else{
			echo 'Opss... No Data';
		}
	}
	function iot_js_seal_retslu($unix){
		$iot_js_seal_retslu = $this->iot_rawmat_model->iot_js_seal_retslu(date('Y-m-d H:i:s',$unix));
		if(!empty($iot_js_seal_retslu)){
			echo '
				<div class="col-lg-12 col-xs-12">
					<table class="table table-hover table-striped taable-bordered ">
						<tr>
							<th>Timestamp</th>
							<th>POS</th>
							<th>Note</th>
						</tr>';
			foreach($iot_js_seal_retslu as $record){
				if($record->returnx == '0.0'){$notes = '<span class="label label-default">OFF</span>';$stat = '0.0';}
				if($record->returnx == '1.0'){$notes = '<span class="label label-success">OK</span>';$stat = '0.1';}
				if($record->returnx == '0.1'){$notes = '<span class="label label-warning">ERROR</span>';$stat = '1.0';}
				if($record->returnx == '1.1'){$notes = '<span class="label label-danger">Mampet</span>';$stat = '1.1';}
				echo '
						<tr>
							<td>'.$record->timestamp.'</td>
							<td>'.$stat.'</td>
							<td>'.$notes.'</td>
						</tr>';
			}
		}else{
			echo 'Opss... No Data';
		}
	}
	function iot_js_material(){
		$data['mc_name_1'] = 'RS-1';
		$data['mc_name_2'] = 'RS-2';
		$data['mc_name_3'] = 'SS-1';
		$data['mc_name_4'] = 'SS-2';
		$limiter1 = $this->iot_rawmat_model->load_iot_setting('tanklevel_1');
		$limiter2 = $this->iot_rawmat_model->load_iot_setting('tanklevel_2');
		$limiter3 = $this->iot_rawmat_model->load_iot_setting('tanklevel_3');
		$data['unit_1'] = $limiter1->unit;
		$data['unit_2'] = $limiter1->unit;
		$data['unit_3'] = $limiter1->unit;
		$data['unit_4'] = $limiter1->unit;
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
		$data['color_start1'] = "#ff6363";
		$data['color_end1'] = "rgb(86, 244, 65)";
		$data['color_start2'] = "#ff6363";
		$data['color_end2'] = "rgb(86, 244, 65)";
		$data['color_start3'] = "#ff6363";
		$data['color_end3'] = "rgb(86, 244, 65)";
		$data['color_start4'] = "#ff6363";
		$data['color_end4'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["0", "20", "40", "60", "80", "100"]';
		$data['majortick2'] = '["0", "20", "40", "60", "80", "100"]';
		$data['majortick3'] = '["0", "20", "40", "60", "80", "100"]';
		$data['majortick4'] = '["0", "20", "40", "60", "80", "100"]';
		$data['ena'] = 4;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_material';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_material(){
		header("Content-type: text/json");
		$mat = $this->iot_rawmat_model->material();
		$ret = array(
			'gauge1iot_ajax_material'=>number_format($mat->RS_1, 1, '.', ''),
			'gauge2iot_ajax_material'=>number_format($mat->RS_2, 1, '.', ''),
			'gauge3iot_ajax_material'=>number_format($mat->SS_1, 1, '.', ''),
			'gauge4iot_ajax_material'=>number_format($mat->SS_2, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_silo(){
		$data['mc_name_1'] = 'LIME';
		$data['mc_name_2'] = 'CEMENT';
		$data['unit_1'] = 'm';
		$data['unit_2'] = 'm';
		$data['limit1_1'] = 15;
		$data['limit1_2'] = 15;
		$data['limit1_3'] = 15;
		$data['limit2_1'] = 15;
		$data['limit2_2'] = 15;
		$data['limit2_3'] = 15;
		$data['ena'] = 2;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_silo';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_silo(){
		header("Content-type: text/json");
		$mat = $this->iot_rawmat_model->material();
		$ret = array(
			'bar1iot_ajax_silo'=>number_format($mat->LIME, 3, '.', ''),
			'bar2iot_ajax_silo'=>number_format($mat->CEM, 3, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_ampbm2(){
		$data['mc_name_1'] = 'BM2-R';
		$data['mc_name_2'] = 'BM2-S';
		$data['mc_name_3'] = 'BM2-T';
		$limiter1 = $this->iot_rawmat_model->load_iot_setting('ballmillamp1');
		$limiter2 = $this->iot_rawmat_model->load_iot_setting('ballmillamp2');
		$limiter3 = $this->iot_rawmat_model->load_iot_setting('ballmillamp3');
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
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_ampbm2';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_ampbm2(){
		header("Content-type: text/json");
		$amp = $this->iot_rawmat_model->amperebm();
		$ret = array(
			'bar1iot_ajax_ampbm2'=>number_format($amp->s2a, 1, '.', ''),
			'bar2iot_ajax_ampbm2'=>number_format($amp->s2b, 1, '.', ''),
			'bar3iot_ajax_ampbm2'=>number_format($amp->s2c, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_js_ampbm3(){
		$data['mc_name_1'] = 'BM3-R';
		$data['mc_name_2'] = 'BM3-S';
		$data['mc_name_3'] = 'BM3-T';
		$limiter1 = $this->iot_rawmat_model->load_iot_setting('ballmillamp1');
		$limiter2 = $this->iot_rawmat_model->load_iot_setting('ballmillamp2');
		$limiter3 = $this->iot_rawmat_model->load_iot_setting('ballmillamp3');
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
		$data['ena'] = 3;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_ampbm3';
		$this->load->view("iot_rawmat/js_3bar", $data);
	}
	function iot_ajax_ampbm3(){
		header("Content-type: text/json");
		$amp = $this->iot_rawmat_model->amperebm();
		$ret = array(
			'bar1iot_ajax_ampbm3'=>number_format($amp->s3a, 1, '.', ''),
			'bar2iot_ajax_ampbm3'=>number_format($amp->s3b, 1, '.', ''),
			'bar3iot_ajax_ampbm3'=>number_format($amp->s3c, 1, '.', '')
		);
		echo json_encode($ret);
	}
	function iot_ajax_rawmat(){
		header("Content-type: text/json");
		$ret = array('bar1'=>90, 'bar2'=>50, 'bar3'=>80);
		echo json_encode($ret);
	}
	function iot_js_bm_flow(){
		$data['mc_name_1'] = 'Water';
		$data['mc_name_2'] = 'Sand';
		$data['mc_name_3'] = 'Belt_Speed';
		$data['mc_name_4'] = 'Flow';
		$data['unit_1'] = 'l/min';
		$data['unit_2'] = 'kg/m';
		$data['unit_3'] = 'mm/s';
		$data['unit_4'] = 'ton/h';
		$data['limit1_1'] = 140;
		$data['limit1_2'] = 180;
		$data['limit1_3'] = 220;
		$data['limit2_1'] = 20;
		$data['limit2_2'] = 35;
		$data['limit2_3'] = 50;
		$data['limit3_1'] = 200;
		$data['limit3_2'] = 400;
		$data['limit3_3'] = 500;
		$data['limit4_1'] = 20;
		$data['limit4_2'] = 25;
		$data['limit4_3'] = 30;
		$data['color_start1'] = "#ffffff";
		$data['color_mid1'] = "rgb(86, 244, 65)";
		$data['color_end1'] = "#ffffff";
		$data['color_start2'] = "#ffffff";
		$data['color_mid2'] = "rgb(86, 244, 65)";
		$data['color_end2'] = "#ffffff";
		$data['color_start3'] = "#ffffff";
		$data['color_mid3'] = "rgb(86, 244, 65)";
		$data['color_end3'] = "#ffffff";
		$data['color_start4'] = "#ff6363";
		$data['color_end4'] = "rgb(86, 244, 65)";
		$data['majortick1'] = '["20", "60", "100", "140", "180", "220"]';
		$data['majortick2'] = '["0", "10", "20", "30", "40", "50"]';
		$data['majortick3'] = '["0", "100", "200", "300", "400", "500"]';
		$data['majortick4'] = '["0", "5", "10", "15", "20", "20", "25", "30"]';
		$data['ena'] = 4;
		$data['ajax_delay'] = 30000;
		$data['ajax_link'] = 'iot_ajax_bm_flow';
		$this->load->view("iot_rawmat/js_4gauge", $data);
	}
	function iot_ajax_bm_flow(){
		header("Content-type: text/json");
		$bm_flow = $this->iot_rawmat_model->bm_flow();
		if(!empty($bm_flow)){
			$nowunix = date('U');
			$lastdata = date('U', strtotime($bm_flow->timestamp));
			$gapunix = $nowunix - $lastdata;
			$get0 = 0;
			if($gapunix > 600){$get0 = 1;}
			$water = number_format($bm_flow->cuwd, 1, '.', '');
			if($get0 == 1){$water = 0;}
			$cuwd = number_format($bm_flow->totalflow/10, 1, '.', '');
			if($get0 == 1){$cuwd = 0;}
			$speed = number_format($bm_flow->avgflow, 0, '.', '');
			if($get0 == 1){$speed = 0;}
			$flow = number_format($bm_flow->freq/10, 1, '.', '');
			if($get0 == 1){$flow = 0;}
		}
		$ret = array(
			'gauge1iot_ajax_bm_flow'=>$water,
			'gauge2iot_ajax_bm_flow'=>$cuwd,
			'gauge3iot_ajax_bm_flow'=>$speed,
			'gauge4iot_ajax_bm_flow'=>$flow
		);
		echo json_encode($ret);
	}
	function iot_hour_ballmill(){
		$this->global['pageTitle'] = 'RAWR : Ballmill Running Hour';
		$this->loadViews("iot_rawmat/ballmill_run_hour", $this->global, NULL, NULL);
	}
	function iot_js_hour_balmill($unix){
		$data['use'] = 5;
		$data['mc_name1'] = 'Ballmill 2';
		$data['mc_name2'] = 'Ballmill 3';
		$data['mc_name3'] = 'BC 12';
		$data['mc_name4'] = 'BC 11';
		$data['mc_name5'] = 'Water Pump';
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
		$run_data = $this->iot_rawmat_model->machine_run($start, $end);
		if(!empty($run_data)){
			$category_axis = '';
			
			$mc1_axis = '';
			$mc2_axis = '';
			$mc3_axis = '';
			$mc4_axis = '';
			$mc5_axis = '';
			
			$mc1_buf = 0;
			$mc2_buf = 0;
			$mc3_buf = 0;
			$mc4_buf = 0;
			$mc5_buf = 0;
			
			$mc1_axis_avg = '';
			$mc2_axis_avg = '';
			$mc3_axis_avg = '';
			$mc4_axis_avg = '';
			$mc5_axis_avg = '';
			
			$pembagi = 1;
			foreach($run_data as $datarec){
				$times = date('d', strtotime($datarec->rec_date));
				$category_axis .= "'".$times."', ";
				$mc1_axis .= $datarec->bm2.', ';
				$mc2_axis .= $datarec->bm3.', ';
				$mc3_axis .= $datarec->bc12.', ';
				$mc4_axis .= $datarec->bc11.', ';
				$mc5_axis .= $datarec->waterpump.', ';
				
				$mc1_buf = $mc1_buf + $datarec->bm2;
				$mc2_buf = $mc2_buf + $datarec->bm3;
				$mc3_buf = $mc3_buf + $datarec->bc12;
				$mc4_buf = $mc4_buf + $datarec->bc11;
				$mc5_buf = $mc5_buf + $datarec->waterpump;
				
				$mc1_axis_avg .= number_format($mc1_buf/$pembagi, 2, '.', '').', ';
				$mc2_axis_avg .= number_format($mc2_buf/$pembagi, 2, '.', '').', ';
				$mc3_axis_avg .= number_format($mc3_buf/$pembagi, 2, '.', '').', ';
				$mc4_axis_avg .= number_format($mc4_buf/$pembagi, 2, '.', '').', ';
				$mc5_axis_avg .= number_format($mc5_buf/$pembagi, 2, '.', '').', ';
				
				$pembagi++;
			}
			$category = substr($category_axis, 0, -2);
			$mc1 = substr($mc1_axis, 0, -2);
			$mc2 = substr($mc2_axis, 0, -2);
			$mc3 = substr($mc3_axis, 0, -2);
			$mc4 = substr($mc4_axis, 0, -2);
			$mc5 = substr($mc5_axis, 0, -2);
			$mc1_avg = substr($mc1_axis_avg, 0, -2);
			$mc2_avg = substr($mc2_axis_avg, 0, -2);
			$mc3_avg = substr($mc3_axis_avg, 0, -2);
			$mc4_avg = substr($mc4_axis_avg, 0, -2);
			$mc5_avg = substr($mc5_axis_avg, 0, -2);
			
			$data['category'] = $category;
			$data['data1'] = $mc1;
			$data['data2'] = $mc2;
			$data['data3'] = $mc3;
			$data['data4'] = $mc4;
			$data['data5'] = $mc5;
			$data['data1_avg'] = $mc1_avg;
			$data['data2_avg'] = $mc2_avg;
			$data['data3_avg'] = $mc3_avg;
			$data['data4_avg'] = $mc4_avg;
			$data['data5_avg'] = $mc5_avg;
			$data['tot1'] = number_format($mc1_buf, 2, '.', '');
			$data['tot2'] = number_format($mc2_buf, 2, '.', '');
			$data['tot3'] = number_format($mc3_buf, 2, '.', '');
			$data['tot4'] = number_format($mc4_buf, 2, '.', '');
			$data['tot5'] = number_format($mc5_buf, 2, '.', '');
			$data['avg1'] = number_format($mc1_buf/$pembagi, 2, '.', '');
			$data['avg2'] = number_format($mc2_buf/$pembagi, 2, '.', '');
			$data['avg3'] = number_format($mc3_buf/$pembagi, 2, '.', '');
			$data['avg4'] = number_format($mc4_buf/$pembagi, 2, '.', '');
			$data['avg5'] = number_format($mc5_buf/$pembagi, 2, '.', '');
			$this->load->view('iot_autoclave/js_run_hour', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_hour_balmill_mat(){
		$this->global['pageTitle'] = 'RAWR : Ballmill Running Hour';
		$this->loadViews("iot_rawmat/ballmill_mat", $this->global, NULL, NULL);
	}
	function iot_js_hour_balmill_mat($unix){
		$data['use'] = 2;
		$data['mc_name1'] = 'Ballmill Water Cons';
		$data['mc_name2'] = 'Ballmill Sand Cons';
		$data['unit1'] = 'kliter';
		$data['unit2'] = 'ton';
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
		$run_data = $this->iot_rawmat_model->machine_run($start, $end);
		if(!empty($run_data)){
			$category_axis = '';
			
			$mc1_axis = '';
			$mc2_axis = '';
			
			$mc1_buf = 0;
			$mc2_buf = 0;
			
			$mc1_axis_avg = '';
			$mc2_axis_avg = '';
			
			$pembagi = 1;
			foreach($run_data as $datarec){
				$times = date('d', strtotime($datarec->rec_date));
				$category_axis .= "'".$times."', ";
				$mc1_axis .= $datarec->water_bm.', ';
				$mc2_axis .= $datarec->sand_bm.', ';
				
				$mc1_buf = $mc1_buf + $datarec->water_bm;
				$mc2_buf = $mc2_buf + $datarec->sand_bm;
				
				$mc1_axis_avg .= number_format($mc1_buf/$pembagi, 2, '.', '').', ';
				$mc2_axis_avg .= number_format($mc2_buf/$pembagi, 2, '.', '').', ';
				
				$pembagi++;
			}
			$category = substr($category_axis, 0, -2);
			$mc1 = substr($mc1_axis, 0, -2);
			$mc2 = substr($mc2_axis, 0, -2);
			$mc1_avg = substr($mc1_axis_avg, 0, -2);
			$mc2_avg = substr($mc2_axis_avg, 0, -2);
			
			$data['category'] = $category;
			$data['data1'] = $mc1;
			$data['data2'] = $mc2;
			$data['data1_avg'] = $mc1_avg;
			$data['data2_avg'] = $mc2_avg;
			$data['tot1'] = number_format($mc1_buf, 2, '.', '');
			$data['tot2'] = number_format($mc2_buf, 2, '.', '');
			$data['avg1'] = number_format($mc1_buf/$pembagi, 2, '.', '');
			$data['avg2'] = number_format($mc2_buf/$pembagi, 2, '.', '');
			$this->load->view('iot_autoclave/js_run_hour', $data);
		}else{
			echo 'no data';
		}
	}
	function top_nav(){
		$this->global['pageTitle'] = 'RAWR : Top Nav';
		$this->loadViewstop("top_nav/home", $this->global, NULL, NULL);
	}
}

?>
