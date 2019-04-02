<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Iot_cutting extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_cutting_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
    public function last()
    {
		$lastdata= $this->iot_cutting_model->newcake();
		$lastdatatime = $lastdata->timestamp; 
		echo $lastdatatime;
    }
	function re_ajax_totalup(){
		header("Content-type: text/json");
		$newdata = $this->iot_cutting_model->get_last_summary();
		$ret = array(
			"mold"=>$newdata->prod_cut,
			"rate"=>$newdata->prod_rate,
			"durasi"=>$newdata->prod_durasi,
			"dt"=>$newdata->prod_dt,
			"ss"=>$newdata->prod_ss,
			"ps"=>$newdata->prod_ps
		);
		echo json_encode($ret);
	}
	public function iot_js_dash(){
		$data['downtime'] = ($this->iot_cutting_model->load_iot_setting('downtime'))/60;
		$data['slowspeed'] = ($this->iot_cutting_model->load_iot_setting('slowspeed'))/60;
		$newdata = $this->iot_cutting_model->get_last_summary();
		$ses = $this->iot_cutting_model->load_iot_setting('mtdcyc');
		$sta_unix = date('U', strtotime($newdata->prod_date));
		$end_unix = $sta_unix + 86400;
		$sta = date('Y-m-d', $sta_unix);
		$end = date('Y-m-d', $end_unix);
		if($ses < 10){
			$start_q = $sta.' 0'.$ses.':00:00';
			$end_q = $end.' 0'.$ses.':00:00';
		}else{
			$start_q = $sta.' '.$ses.':00:00';
			$end_q = $end.' '.$ses.':00:00';
		}
		$data['problem'] = $this->iot_cutting_model->problemlimit($start_q, $end_q);
		$chartdata = $this->iot_cutting_model->chartmold($start_q, $end_q);
		if(!empty($chartdata)){
			$dataaxis = '';
			foreach($chartdata as $record){
				$ox = date('U', strtotime($record->timestamp));
				$o_x = $ox*1000;
				$dataaxis .='{x:'.$o_x;
				if($record->plan_stop == 0){
					$dataaxis .=',y:'.number_format($record->mixing_ct_tilting/60, 2, '.', '');
				}else{
					$dataaxis .=',y:'.$data['slowspeed'];
				}
				$dataaxis .='}, ';
			}
		}
		$data['chartmold'] = substr($dataaxis, 0, -2);
		$this->load->view("iot_cutting/dash_chart", $data);
	}
	public function ajax_mixing(){
		header("Content-type: text/json");
		$newdata = $this->iot_cutting_model->get_last_summary();
		$ses = $this->iot_cutting_model->load_iot_setting('mtdcyc');
		$sta_unix = date('U', strtotime($newdata->prod_date));
		$end_unix = $sta_unix + 86400;
		$sta = date('Y-m-d', $sta_unix);
		$end = date('Y-m-d', $end_unix);
		if($ses < 10){
			$start_q = $sta.' 0'.$ses.':00:00';
			$end_q = $end.' 0'.$ses.':00:00';
		}else{
			$start_q = $sta.' '.$ses.':00:00';
			$end_q = $end.' '.$ses.':00:00';
		}
		$ret = $this->iot_cutting_model->mixing($start_q, $end_q);
		echo json_encode($ret);
	}
	public function iot_js_cycmtd( $unix = NULL ){
		header("Content-type: text/json");
		if(empty($unix)){
			$year = date('Y');
			$month = date('m');
			$data_date = date('F Y');
		}else{
			$year = date('Y', $unix);
			$month = date('m', $unix);
			$data_date = date('F Y', $unix);
		}
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
		$oee_data = $this->iot_cutting_model->oee_data($start, $end);
		if(!empty($oee_data)){
			$rate_buf = 0;
			$rate_mov_buf = 0;
			$durasi_tot = 0;
			$mold_tot = 0;
			$mold_buf = 0;
			$mold_mov_buf = 0;
			$downtime_buf = 0;
			$downtime_mov_buf = 0;
			$slowspeed_buf = 0;
			$slowspeed_mov_buf = 0;
			$plannedstop_tot1 = 0;
			$plannedstop_tot2 = 0;
			$pembagi = 1;
			$notes = '';
			$noteit = '';
			foreach($oee_data as $datarec){
				$times = date('Y-m-d', strtotime($datarec->prod_date));
				if($datarec->prod_ps != 1440){
					$rate_buf = $rate_buf + $datarec->prod_rate;
					$rate_mov_buf = number_format($rate_buf/$pembagi, 2, '.', '');
					$mold_buf = $mold_buf + $datarec->prod_cut;
					$mold_mov_buf = number_format($mold_buf/$pembagi, 2, '.', '');
					$downtime_buf = $downtime_buf + $datarec->prod_dt;
					$downtime_mov_buf = number_format($downtime_buf/$pembagi, 2, '.', '');
					$slowspeed_buf = $slowspeed_buf + $datarec->prod_ss;
					$slowspeed_mov_buf = number_format($slowspeed_buf/$pembagi, 2, '.', '');
					$plannedstop_tot1 = $plannedstop_tot1 + $datarec->prod_ps;
					$durasi_tot = $durasi_tot + $datarec->prod_durasi;
					$mold_tot = $mold_tot + $datarec->prod_cut;
					$pembagi++;
				}
				$plannedstop_tot2 = $plannedstop_tot2 + $datarec->prod_ps;
				if($notes != $datarec->notes){
					$notes = $datarec->notes;
					$noteit .= $datarec->prod_date.' '.$datarec->notes.'<br>';
				}
			}
			$ret = array(
				"rate_mov_buf"=>$rate_mov_buf,
				"mold_mov_buf"=>$mold_mov_buf,
				"downtime_mov_buf"=>$downtime_mov_buf,
				"slowspeed_mov_buf"=>$slowspeed_mov_buf,
				"plannedstop_tot1"=>$plannedstop_tot1,
				"plannedstop_tot2"=>$plannedstop_tot2,
				"durasi_tot"=>number_format($durasi_tot, 2, '.', ''),
				"mold_tot"=>$mold_tot,
				"data_date"=>$data_date,
				"notes"=>$noteit
			);
			echo json_encode($ret);
		}
	}
	public function cycmonthly(){
		$data['gauge_rate_1'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_1');
		$data['gauge_rate_2'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_2');
		$data['gauge_rate_3'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_3');
		$data['gauge_mix_1'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_1');
		$data['gauge_mix_2'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_2');
		$data['gauge_mix_3'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_3');
		$data['gauge_cut_1'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_1');
		$data['gauge_cut_2'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_2');
		$data['gauge_cut_3'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_3');
		$data['gauge_dt_1'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_1');
		$data['gauge_dt_2'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_2');
		$data['gauge_dt_3'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_3');
		$this->global['pageTitle'] = 'RAWR : Monthly Data';
		$this->loadViews("iot_cutting/cycmonthly", $this->global, $data , NULL);
	}
	public function iot_js_cyc_data($unix = ''){
		$data['gauge_rate_1'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_1');
		$data['gauge_rate_2'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_2');
		$data['gauge_rate_3'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_3');
		$data['gauge_mix_1'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_1');
		$data['gauge_mix_2'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_2');
		$data['gauge_mix_3'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_3');
		$data['gauge_cut_1'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_1');
		$data['gauge_cut_2'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_2');
		$data['gauge_cut_3'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_3');
		$data['gauge_dt_1'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_1');
		$data['gauge_dt_2'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_2');
		$data['gauge_dt_3'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_3');
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
		$oee_data = $this->iot_cutting_model->oee_data($start, $end);
		if(!empty($oee_data)){
			$category_axis = '';
			
			$rate_axis = '';
			$rate_buf = 0;
			$rate_mov_axis = '';
			$rate_mov_buf = 0;
			
			$durasi_axis = '';
			$durasi_tot = 0;
			
			$mold_axis = '';
			$mold_buf = 0;
			$mold_tot = 0;
			$mold_mov_axis = '';
			$mold_mov_buf = 0;
			
			$downtime_axis = '';
			$downtime_buf = 0;
			$downtime_mov_axis = '';
			$downtime_mov_buf = 0;
			
			$slowspeed_axis = '';
			$slowspeed_buf = 0;
			$slowspeed_mov_axis = '';
			$slowspeed_mov_buf = 0;
			
			$plannedstop_axis = '';
			$plannedstop_tot1 = 0;
			$plannedstop_tot2 = 0;
			
			$pembagi = 1;
			foreach($oee_data as $datarec){
				$times = date('d', strtotime($datarec->prod_date));
				$category_axis .= "'".$times."', ";
				$rate_axis .= $datarec->prod_rate.', ';
				$durasi_axis .= $datarec->prod_durasi.', ';
				$mold_axis .= $datarec->prod_cut.', ';
				$downtime_axis .= $datarec->prod_dt.', ';
				$slowspeed_axis .= $datarec->prod_ss.', ';
				$plannedstop_axis .= $datarec->prod_ps.', ';
				if($datarec->prod_ps != 1440){
					$rate_buf = $rate_buf + $datarec->prod_rate;
					$rate_mov_buf = number_format($rate_buf/$pembagi, 2, '.', '');
					$rate_mov_axis .= $rate_mov_buf.', ';
					$mold_buf = $mold_buf + $datarec->prod_cut;
					$mold_mov_buf = number_format($mold_buf/$pembagi, 2, '.', '');
					$mold_mov_axis .= $mold_mov_buf.', ';
					$downtime_buf = $downtime_buf + $datarec->prod_dt;
					$downtime_mov_buf = number_format($downtime_buf/$pembagi, 2, '.', '');
					$downtime_mov_axis .= $downtime_mov_buf.', ';
					$slowspeed_buf = $slowspeed_buf + $datarec->prod_ss;
					$slowspeed_mov_buf = number_format($slowspeed_buf/$pembagi, 2, '.', '');
					$slowspeed_mov_axis .= $slowspeed_mov_buf.', ';
					$plannedstop_tot1 = $plannedstop_tot1 + $datarec->prod_ps;
					$durasi_tot = $durasi_tot + $datarec->prod_durasi;
					$mold_tot = $mold_tot + $datarec->prod_cut;
					$pembagi++;
				}else{
					$rate_mov_axis .= $rate_mov_buf.', ';
					$mold_mov_axis .= $mold_mov_buf.', ';
					$downtime_mov_axis .= $downtime_mov_buf.', ';
					$slowspeed_mov_axis .= $slowspeed_mov_buf.', ';
				}
				$plannedstop_tot2 = $plannedstop_tot2 + $datarec->prod_ps;
			}
			$category = substr($category_axis, 0, -2);
			$rate = substr($rate_axis, 0, -2);
			$rate_mov = substr($rate_mov_axis, 0, -2);
			$durasi = substr($durasi_axis, 0, -2);
			$mold = substr($mold_axis, 0, -2);
			$mold_mov = substr($mold_mov_axis, 0, -2);
			$downtime = substr($downtime_axis, 0, -2);
			$downtime_mov = substr($downtime_mov_axis, 0, -2);
			$slowspeed = substr($slowspeed_axis, 0, -2);
			$slowspeed_mov = substr($slowspeed_mov_axis, 0, -2);
			$plannedstop = substr($plannedstop_axis, 0, -2);
			$data['category'] = $category;
			$data['rate'] = $rate;
			$data['rate_mov'] = $rate_mov;
			$data['rate_avg'] = $rate_mov_buf;
			$data['durasi'] = $durasi;
			$data['mold'] = $mold;
			$data['mold_tot'] = $mold_tot;
			$data['mold_avg'] = number_format($mold_buf/$pembagi, 2, '.', '');
			$data['mold_mov'] = $mold_mov;
			$data['downtime'] = $downtime;
			$data['downtime_avg'] = number_format($downtime_buf/$pembagi, 2, '.', '');
			$data['downtime_mov'] = $downtime_mov;
			$data['slowspeed'] = $slowspeed;
			$data['slowspeed_mov'] = $slowspeed_mov;
			$data['slowspeed_avg'] = number_format($slowspeed_buf/$pembagi, 2, '.', '');
			$data['plannedstop'] = $plannedstop;
			$data['plannedstop_tot1'] = $plannedstop_tot1;
			$data['plannedstop_tot2'] = $plannedstop_tot2;
			$data['oee_data'] = $oee_data;
			$this->load->view('iot_cutting/js_cycmonthly', $data);
		}else{
			echo 'no data';
		}
	}
	function iot_cycsetting(){
		$data['mtdcyc'] = $this->iot_cutting_model->get_iot_set('mtdcyc');
		$data['downtime'] = $this->iot_cutting_model->get_iot_set('downtime');
		$data['slowspeed'] = $this->iot_cutting_model->get_iot_set('slowspeed');
		$data['gauge_rate_1'] = $this->iot_cutting_model->get_iot_set('gauge_rate_1');
		$data['gauge_rate_2'] = $this->iot_cutting_model->get_iot_set('gauge_rate_2');
		$data['gauge_rate_3'] = $this->iot_cutting_model->get_iot_set('gauge_rate_3');
		$data['gauge_cut_1'] = $this->iot_cutting_model->get_iot_set('gauge_cut_1');
		$data['gauge_cut_2'] = $this->iot_cutting_model->get_iot_set('gauge_cut_2');
		$data['gauge_cut_3'] = $this->iot_cutting_model->get_iot_set('gauge_cut_3');
		$data['gauge_dt_1'] = $this->iot_cutting_model->get_iot_set('gauge_dt_1');
		$data['gauge_dt_2'] = $this->iot_cutting_model->get_iot_set('gauge_dt_2');
		$data['gauge_dt_3'] = $this->iot_cutting_model->get_iot_set('gauge_dt_3');
		$data['gauge_mix_1'] = $this->iot_cutting_model->get_iot_set('gauge_mix_1');
		$data['gauge_mix_2'] = $this->iot_cutting_model->get_iot_set('gauge_mix_2');
		$data['gauge_mix_3'] = $this->iot_cutting_model->get_iot_set('gauge_mix_3');
		$this->global['pageTitle'] = 'RAWR : Cycletime Setting';
		$this->loadViews("iot_cutting/cycsetting", $this->global, $data , NULL);
	}
	function iot_cycsetting_exe(){
		if($this->vendorId == 91000){
			$mtdcyc = $this->input->post('mtdcyc');
			if($mtdcyc > 0){$this->iot_cutting_model->update_iot_setting('mtdcyc', $mtdcyc);}
			$downtime = $this->input->post('downtime');
			if($downtime > 0){$this->iot_cutting_model->update_iot_setting('downtime', $downtime);}
			$slowspeed = $this->input->post('slowspeed');
			if($slowspeed > 0){$this->iot_cutting_model->update_iot_setting('slowspeed', $slowspeed);}
			$gauge_rate_1 = $this->input->post('gauge_rate_1');
			if($gauge_rate_1 > 0){$this->iot_cutting_model->update_iot_setting('gauge_rate_1', $gauge_rate_1);}
			$gauge_rate_2 = $this->input->post('gauge_rate_2');
			if($gauge_rate_2 > 0){$this->iot_cutting_model->update_iot_setting('gauge_rate_2', $gauge_rate_2);}
			$gauge_rate_3 = $this->input->post('gauge_rate_3');
			if($gauge_rate_3 > 0){$this->iot_cutting_model->update_iot_setting('gauge_rate_3', $gauge_rate_3);}
			$gauge_cut_1 = $this->input->post('gauge_cut_1');
			if($gauge_cut_1 > 0){$this->iot_cutting_model->update_iot_setting('gauge_cut_1', $gauge_cut_1);}
			$gauge_cut_2 = $this->input->post('gauge_cut_2');
			if($gauge_cut_2 > 0){$this->iot_cutting_model->update_iot_setting('gauge_cut_2', $gauge_cut_2);}
			$gauge_cut_3 = $this->input->post('gauge_cut_3');
			if($gauge_cut_3 > 0){$this->iot_cutting_model->update_iot_setting('gauge_cut_3', $gauge_cut_3);}
			$gauge_dt_1 = $this->input->post('gauge_dt_1');
			if($gauge_dt_1 > 0){$this->iot_cutting_model->update_iot_setting('gauge_dt_1', $gauge_dt_1);}
			$gauge_dt_2 = $this->input->post('gauge_dt_2');
			if($gauge_dt_2 > 0){$this->iot_cutting_model->update_iot_setting('gauge_dt_2', $gauge_dt_2);}
			$gauge_dt_3 = $this->input->post('gauge_dt_3');
			if($gauge_dt_3 > 0){$this->iot_cutting_model->update_iot_setting('gauge_dt_3', $gauge_dt_3);}
			$gauge_mix_1 = $this->input->post('gauge_mix_1');
			if($gauge_mix_1 > 0){$this->iot_cutting_model->update_iot_setting('gauge_mix_1', $gauge_mix_1);}
			$gauge_mix_2 = $this->input->post('gauge_mix_2');
			if($gauge_mix_2 > 0){$this->iot_cutting_model->update_iot_setting('gauge_mix_2', $gauge_mix_2);}
			$gauge_mix_3 = $this->input->post('gauge_mix_3');
			if($gauge_mix_3 > 0){$this->iot_cutting_model->update_iot_setting('gauge_mix_3', $gauge_mix_3);}
			redirect('iot_cycsetting');
		}else{
			$this->loadThis();
		}
	}
	public function cycdaily(){
		$data['gauge_rate_1'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_1');
		$data['gauge_rate_2'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_2');
		$data['gauge_rate_3'] = $this->iot_cutting_model->load_iot_setting('gauge_rate_3');
		$data['gauge_mix_1'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_1');
		$data['gauge_mix_2'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_2');
		$data['gauge_mix_3'] = $this->iot_cutting_model->load_iot_setting('gauge_mix_3');
		$data['gauge_cut_1'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_1');
		$data['gauge_cut_2'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_2');
		$data['gauge_cut_3'] = $this->iot_cutting_model->load_iot_setting('gauge_cut_3');
		$data['gauge_dt_1'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_1');
		$data['gauge_dt_2'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_2');
		$data['gauge_dt_3'] = $this->iot_cutting_model->load_iot_setting('gauge_dt_3');
		$this->global['pageTitle'] = 'RAWR : Daily Data';
		$this->loadViews("iot_cutting/cycdaily", $this->global, $data , NULL);
    }
	function re_ajax_totalup_daily($unix){
		header("Content-type: text/json");
		$newdata = $this->iot_cutting_model->get_unix_summary(date('Y-m-d', $unix));
		$ret = array(
			"mold"=>$newdata->prod_cut,
			"rate"=>$newdata->prod_rate,
			"durasi"=>$newdata->prod_durasi,
			"dt"=>$newdata->prod_dt,
			"ss"=>$newdata->prod_ss,
			"ps"=>$newdata->prod_ps
		);
		echo json_encode($ret);
	}
	public function ajax_mixing_daily($unix){
		header("Content-type: text/json");
		$ses = $this->iot_cutting_model->load_iot_setting('mtdcyc');
		$sta_unix = $unix;
		$end_unix = $sta_unix + 86400;
		$sta = date('Y-m-d', $sta_unix);
		$end = date('Y-m-d', $end_unix);
		if($ses < 10){
			$start_q = $sta.' 0'.$ses.':00:00';
			$end_q = $end.' 0'.$ses.':00:00';
		}else{
			$start_q = $sta.' '.$ses.':00:00';
			$end_q = $end.' '.$ses.':00:00';
		}
		$ret = $this->iot_cutting_model->mixing($start_q, $end_q);
		echo json_encode($ret);
	}
	public function iot_js_dash_daily($unix){
		$data['downtime'] = ($this->iot_cutting_model->load_iot_setting('downtime'))/60;
		$data['slowspeed'] = ($this->iot_cutting_model->load_iot_setting('slowspeed'))/60;
		$ses = $this->iot_cutting_model->load_iot_setting('mtdcyc');
		$sta_unix = $unix;
		$end_unix = $sta_unix + 86400;
		$sta = date('Y-m-d', $sta_unix);
		$end = date('Y-m-d', $end_unix);
		if($ses < 10){
			$start_q = $sta.' 0'.$ses.':00:00';
			$end_q = $end.' 0'.$ses.':00:00';
		}else{
			$start_q = $sta.' '.$ses.':00:00';
			$end_q = $end.' '.$ses.':00:00';
		}
		$data['problem'] = $this->iot_cutting_model->dailyproblem($start_q, $end_q);
		$chartdata = $this->iot_cutting_model->chartmold($start_q, $end_q);
		$dataaxis = '';
		if(!empty($chartdata)){
			$dataaxis = '';
			foreach($chartdata as $record){
				$ox = date('U', strtotime($record->timestamp));
				$o_x = $ox*1000;
				$dataaxis .='{x:'.$o_x;
				if($record->plan_stop == 0){
					$dataaxis .=',y:'.number_format($record->mixing_ct_tilting/60, 2, '.', '');
				}else{
					$dataaxis .=',y:'.$data['slowspeed'];
				}
				$dataaxis .='}, ';
			}
		}
		$data['chartmold'] = substr($dataaxis, 0, -2);
		$this->load->view("iot_cutting/dash_chart", $data);
	}
	function iot_cron_cyc_datadev($sel, $calc_date){
		$calc_date = date('Y-m-d', $calc_date);
		$limitation = $this->iot_cutting_model->get_iot_setting('mtdcyc');
		$downtime = $this->iot_cutting_model->get_iot_setting('downtime');
		$slowspeed = $this->iot_cutting_model->get_iot_setting('slowspeed');
		$limitation = $limitation * 3600;
		if(!empty($calc_date)){
			$cycdate = date('U', strtotime($calc_date));
			$cycdate = $cycdate + $limitation;
			echo $cycdate;
		}else{
			$hour = date('h');
			$nowtime = date('Y-m-d');
			if($sel == 1){
				$cycdate = date('U', strtotime($nowtime)) + $limitation - 86400;
			}else{
				$cycdate = date('U', strtotime($nowtime)) + $limitation;
			}
			if($hour < $limitation){
				$cycdate = $cycdate - 86400;
			}
		}
		$logged_date = date('Y-m-d', $cycdate);
		$notes = 'Downtime '.$downtime.', Slowspeed '.$slowspeed.', Calcuation time '.$limitation/3600;
		$start = date('Y-m-d H:i:s', $cycdate);
		$cycdate = $cycdate + 86400;
		$end = date('Y-m-d H:i:s', $cycdate);
		$get_alldata = $this->iot_cutting_model->chartmold($start, $end);
		$mold = 0;
		$timebuf = 0;
		$totaltime = 0;
		$plan_stop = 0;
		$dtime = 0;
		$stime = 0;
		$pstime = 0;
		$timeadd = 0;
		$timestamp_on_update = '';
		if(!empty($get_alldata)){
			foreach($get_alldata as $record){
				$mold++;
				if($mold == 1){
					$getlast = $this->iot_cutting_model->cyc_prevdata($record->timestamp);
					$timestamp_before = $getlast->timestamp;
					$timebuf = date('U', strtotime($timestamp_before));
				}
				$timer = date('U', strtotime($record->timestamp));
				$timeadd = $timer - $timebuf;
				if($record->plan_stop == 1){
					if($mold == 1){
						$pstime = $timer - ($cycdate - 86400);
						if($pstime > $slowspeed){
							$pstime = $pstime - $slowspeed;
						}
					}else{
						$pstime = $pstime + $timeadd - $slowspeed;
					}
					$timeadd = $slowspeed;
				}
				if($record->plan_stop == 0){
					if($timeadd >= $downtime){
						$dtime = $dtime + ($timeadd - $slowspeed);
						$timeadd = $slowspeed;
					}
					if($timeadd > $slowspeed and $timeadd < $downtime){
						$stime = $stime + ($timeadd - $slowspeed);
					}
				}
				$totaltime = $totaltime + $timeadd;
				$timebuf = $timer;
				$timestamp_on_update = $record->timestamp;
			}
			$getnext = $this->iot_cutting_model->cyc_nextdata($timestamp_on_update);
			if(!empty($getnext)){
				if($getnext->plan_stop == 1){
					$timer = date('U', strtotime($timestamp_on_update));
					$pstime = $pstime + ($cycdate - $timer);
				}
			}
		}else{
			$totaltime = 0;
			$mold = 0;
			$rate = 0;
			$dtime = 0;
			$stime = 0;
			$pstime = 86400;
		}
		$totaltime = $totaltime/3600;
		if($totaltime > 0){
			$rate = $mold/$totaltime;
		}else{
			$rate = 0;
		}
		$arr_date = $logged_date;
		$arr_rate = number_format($rate, 2, '.', '');
		$arr_durasi = number_format($totaltime, 2, '.', '');
		$arr_mold = $mold;
		$arr_downtime = number_format($dtime/60, 2, '.', '');
		$arr_slowspeed = number_format($stime/60, 2, '.', '');
		$arr_plannedstop = number_format($pstime/60, 2, '.', '');
		$arr_notes = $notes;
		$pref_info = array(
				'prod_date'=>$arr_date,
				'prod_rate'=>$arr_rate,
				'prod_durasi'=>$arr_durasi,
				'prod_cut'=>$arr_mold,
				'prod_dt'=>$arr_downtime,
				'prod_ss'=>$arr_slowspeed,
				'prod_ps'=>$arr_plannedstop,
				'notes'=>$arr_notes
			);
		$check_ex_data = $this->iot_cutting_model->check_ex_data($arr_date);
		if(!empty($check_ex_data)){
			$this->iot_cutting_model->update_prod_summary($pref_info, $arr_date);
		}else{
			$this->iot_cutting_model->insert_prod_summary($pref_info);
		}
	}
	function iot_ct_cutting_error_log(){
		$getdata = $this->iot_cutting_model->ct_cutting_error_log();
		$error_log = '';
		if(!empty($getdata)){
			$error_log .= '<table class="table">
								<tr>
									<th>No</th>
									<th>Time</th>
									<th>Server vs PLC</th>
								</tr>';
			$a = 0;
			foreach($getdata as $res){
				$a++;
				$error_log .= '<tr>
								<td>'.$a.'</td>
								<td>'.$res->timerec.'</td>
								<td>'.$res->real.' - '.$res->record.'</td>
							</tr>';
			}
			$error_log .= '</table>';
		}else{
			$error_log .= 'no error detected (for now)...';
		}
		echo $error_log;
	}
	function get_error_count(){
		$a = $this->iot_cutting_model->ct_cutting_error_log_count();
		echo $a;
	}
}

?>
