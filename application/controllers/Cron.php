<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Cron extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('toolpm_model');
	}
	function updateticket(){
		$plan = $this->toolpm_model->getplanner();
		if(!empty($plan)){
			foreach($plan as $tool){
				$newdate = $tool->pmstart + ($tool->pmfreq * 86400);
				$ticket = array(
						'exedate'=>$newdate,
						'toolid'=>$tool->id,
						'name'=>$tool->name,
						'brand'=>$tool->brand,
						'size'=>$tool->size,
						'doctitle'=>$tool->doctitle
					);
				$this->toolpm_model->addpmplan($ticket);
				$jobinfo = array('pmstart'=>$newdate);
				$this->toolpm_model->updatepm($jobinfo, $tool->id);
			}
		}
	}
	function toolinputform($id){
		$ticket = $this->toolpm_model->detailform($id);
		$data['ticket'] = $ticket;
		//echo var_dump($data['ticket']);
		$data['doc'] = $this->toolpm_model->getpmform($ticket->doctitle);
		$this->load->view('t_toolpm/toolinputform', $data);
	}
	function submit_toolpm(){
		$id = $this->input->post('id[]');
		$inputan = $this->input->post('inputan[]');
		$ticket_id = $this->input->post('ticket_id');
		$toolid = $this->input->post('toolid');
		$unixtime = date('U');
		$x = 0;
		foreach($id as $result){
			if(!empty($inputan[$x])){$val = $inputan[$x];}
			else{$val = 0;}
			$testinfo = array(
				'unixtime'=>$unixtime,
				'toolid'=>$toolid,
				'ticket_id'=>$ticket_id,
				'pm_id'=>$result,
				'pm_val'=>$val
				);
			$newdat = $this->toolpm_model->addpmresult($testinfo);
			$x++;
		}
		$info = array('isvalid'=>0);
		$this->toolpm_model->editform($info, $ticket_id);
		$data['note'] = 'Terimakasih, <br> You can close this tab now';
		$this->load->view('t_toolpm/checked', $data);
	}
	function iot_cron_cyc_data($sel, $calc_date = ''){
		$this->load->model('iot_cutting_model');
		$limitation = $this->iot_cutting_model->get_iot_setting('mtdcyc');
		$downtime = $this->iot_cutting_model->get_iot_setting('downtime');
		$slowspeed = $this->iot_cutting_model->get_iot_setting('slowspeed');
		$limitation = $limitation * 3600;
		if(!empty($calc_date)){
			$cycdate = date('U', strtotime($calc_date));
			$cycdate = $cycdate + $limitation;
		}else{
			$hour = date('H') * 3600;
			$nowtime = date('Y-m-d');
			if($sel == 1){
				$cycdate = date('U', strtotime($nowtime)) + $limitation - 86400;
				echo 'aa';
			}else{
				$cycdate = date('U', strtotime($nowtime)) + $limitation;
				echo 'xx';
			}
			if($hour < $limitation){
				$cycdate = $cycdate - 86400;
				echo 'cc';
			}
		}
		$log_data = $cycdate;
		$logged_date = date('Y-m-d', $log_data);
		echo $logged_date.'<br>';
		$notes = 'Downtime '.$downtime.', Slowspeed '.$slowspeed.', Calcuation time '.$limitation/3600;
		$start = date('Y-m-d H:i:s', $cycdate);
		$cycdate = $cycdate + 86400;
		$end = date('Y-m-d H:i:s', $cycdate);
		$get_alldata = $this->iot_cutting_model->chartmold($start, $end);
		//echo $start;
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
					//echo var_dump($getlast);
				}
				echo $record->timestamp.'<br>';
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
						//echo $dtime.'<br>';
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
	function iot_boiler_hour_meter($date = NULL){
		if(!empty($date)){
			$start = date('U', strtotime($date)); //return date with 00:00:00
		}else{
			$nowtime = date('Y-m-d');
			$start = date('U', strtotime($nowtime)); //return date with 00:00:00
			$start = $start - 86400; //get ytd date in unix
		}
		$end = $start + 86400;
		$this->load->model('iot_autoclave_model');
		$boiler = $this->iot_autoclave_model->get_boiler_daily_data(date('Y-m-d H:i:s', $start), date('Y-m-d H:i:s', $end));
		$sf1 = 0;
		$sf2 = 0;
		$id = 0;
		$fd = 0;
		$rs = 0;
		$bt = 0;
		$time_buff = 0;
		$time_add = 0;
		if(!empty($boiler)){
			foreach($boiler as $rec){
				$time_add = date('U', strtotime($rec->timestamp)) - $time_buff;
				if($time_buff > 0){
					if($time_add < 180){
						if($rec->sf1 > 0){
							$sf1 = $sf1 + $time_add;
						}
						if($rec->sf2 > 0){
							$sf2 = $sf2 + $time_add;
						}
						if($rec->id > 0){
							$id = $id + $time_add;
						}
						if($rec->fd > 0){
							$fd = $fd + $time_add;
						}
						if($rec->rs > 0){
							$rs = $rs + $time_add;
						}
						if($rec->bt2 > 300){
							$bt = $bt + $time_add;
						}
					}
				}
				$time_buff = date('U', strtotime($rec->timestamp));
			}
		}
		$recorded_date = date('Y-m-d', $start);
		$check_log_date = $this->iot_autoclave_model->check_run_hour_data($recorded_date);
		if(!empty($check_log_date)){
			$run_data = array(
				'boiler_feed1'=>number_format($sf1/3600, 2, '.', ''),
				'boiler_feed2'=>number_format($sf2/3600, 2, '.', ''),
				'boiler_fd'=>number_format($fd/3600, 2, '.', ''),
				'boiler_id'=>number_format($id/3600, 2, '.', ''),
				'boiler_recir'=>number_format($rs/3600, 2, '.', ''),
				'boiler_300'=>number_format($bt/3600, 2, '.', '')
			);
			$update = $this->iot_autoclave_model->update_run_hour($run_data, $recorded_date);
		}else{
			$run_data = array(
				'rec_date'=>$recorded_date,
				'boiler_feed1'=>number_format($sf1/3600, 2, '.', ''),
				'boiler_feed2'=>number_format($sf2/3600, 2, '.', ''),
				'boiler_fd'=>number_format($fd/3600, 2, '.', ''),
				'boiler_id'=>number_format($id/3600, 2, '.', ''),
				'boiler_recir'=>number_format($rs/3600, 2, '.', ''),
				'boiler_300'=>number_format($bt/3600, 2, '.', '')
			);
			$insert = $this->iot_autoclave_model->insert_run_hour($run_data);
		}
	}
	function iot_ballmill_hour_meter($date = NULL){
		if(!empty($date)){
			$start = date('U', strtotime($date)); //return date with 00:00:00
		}else{
			$nowtime = date('Y-m-d');
			$start = date('U', strtotime($nowtime)); //return date with 00:00:00
			$start = $start - 86400; //get ytd date in unix
		}
		$end = $start + 86400;
		$this->load->model('iot_rawmat_model');
		$ballmill = $this->iot_rawmat_model->get_ballmill_daily_data(date('Y-m-d H:i:s', $start), date('Y-m-d H:i:s', $end));
		$bm2 = 0;
		$bm3 = 0;
		$time_buff = 0;
		$time_add = 0;
		if(!empty($ballmill)){
			foreach($ballmill as $rec){
				$time_add = date('U', strtotime($rec->timestamp)) - $time_buff;
				if($time_buff > 0){
					if($time_add < 600){
						if($rec->s2a > 0){
							$bm2 = $bm2 + $time_add;
						}
						if($rec->s3a > 0){
							$bm3 = $bm3 + $time_add;
						}
					}
				}
				$time_buff = date('U', strtotime($rec->timestamp));
			}
		}
		$recorded_date = date('Y-m-d', $start);
		$check_log_date = $this->iot_rawmat_model->check_run_hour_data($recorded_date);
		if(!empty($check_log_date)){
			$run_data = array(
				'bm2'=>number_format($bm2/3600, 2, '.', ''),
				'bm3'=>number_format($bm3/3600, 2, '.', '')
			);
			$update = $this->iot_rawmat_model->update_run_hour($run_data, $recorded_date);
		}else{
			$run_data = array(
				'rec_date'=>$recorded_date,
				'bm2'=>number_format($bm2/3600, 2, '.', ''),
				'bm3'=>number_format($bm3/3600, 2, '.', '')
			);
			$insert = $this->iot_rawmat_model->insert_run_hour($run_data);
		}
	}
	function check_cutting_ct(){
		$this->load->model('iot_cutting_model');
		$res = $this->iot_cutting_model->check_cutting_ct();
		$a1 = 0;
		$a2 = 0;
		$b1 = 0;
		$b2 = 0;
		$x = '';
		if(!empty($res)){
			foreach($res as $record){
				if($a1 == 0){
					$a1 = date('U', strtotime($record->timestamp));
					$a2 = $record->mixing_ct_tilting;
					$x = $record->timestamp;
				}else{
					$b1 = date('U', strtotime($record->timestamp));
					$b2 = $record->mixing_ct_tilting;
				}
			}
		}
		$cek = $a1 - $b1;
		$ct_cek = $cek - $a2;
		if($ct_cek > 60){
			$error = array(
					'real'=>$cek,
					'record'=>$a2,
					'rec_time'=>$x
				);
			$recoo = $this->iot_cutting_model->record_error($error);
		}
	}
	function iot_ballmill_feeder_hour_meter($date = NULL){
		if(!empty($date)){
			$start = date('U', strtotime($date)); //return date with 00:00:00
		}else{
			$nowtime = date('Y-m-d');
			$start = date('U', strtotime($nowtime)); //return date with 00:00:00
			$start = $start - 86400; //get ytd date in unix
		}
		$end = $start + 86400;
		$this->load->model('iot_rawmat_model');
		$ballmill = $this->iot_rawmat_model->get_ballmill_feeder_daily_data(date('Y-m-d H:i:s', $start), date('Y-m-d H:i:s', $end));
		$bc11 = 0;
		$bc12 = 0;
		$water_pump = 0;
		$water_use = 0;
		$sand_use = 0;
		$time_buff = 0;
		$time_add = 0;
		if(!empty($ballmill)){
			foreach($ballmill as $rec){
				$time_add = date('U', strtotime($rec->timestamp)) - $time_buff;
				if($time_buff > 0){
					if($time_add < 600){
						if($rec->bm == 2 and $rec->encoder > 0){
							$bc12 = $bc12 + $time_add;
						}
						if($rec->bm == 3 and $rec->encoder > 0){
							$bc11 = $bc11 + $time_add;
						}
						if($rec->water_flow > 100){
							$water_pump = $water_pump + $time_add;
							$water_use = $water_use + ($rec->water_flow * ($time_add/60));
						}
						if($rec->sand_flow > 0){
							$sand_use = $sand_use + ($rec->sand_flow * $time_add/36000);
						}
					}
				}
				$time_buff = date('U', strtotime($rec->timestamp));
			}
		}
		$recorded_date = date('Y-m-d', $start);
		$check_log_date = $this->iot_rawmat_model->check_run_hour_data($recorded_date);
		if(!empty($check_log_date)){
			$run_data = array(
				'bc11'=>number_format($bc11/3600, 2, '.', ''),
				'bc12'=>number_format($bc12/3600, 2, '.', ''),
				'waterpump'=>number_format($water_pump/3600, 2, '.', ''),
				'water_bm'=>number_format($water_use/1000, 2, '.', ''),
				'sand_bm'=>number_format($sand_use, 2, '.', '')
			);
			$update = $this->iot_rawmat_model->update_run_hour($run_data, $recorded_date);
		}else{
			$run_data = array(
				'rec_date'=>$recorded_date,
				'bc11'=>number_format($bc11/3600, 2, '.', ''),
				'bc12'=>number_format($bc12/3600, 2, '.', ''),
				'waterpump'=>number_format($water_pump/3600, 2, '.', ''),
				'water_bm'=>number_format($water_use/1000, 2, '.', ''),
				'sand_bm'=>number_format($sand_use, 2, '.', '')
			);
			$insert = $this->iot_rawmat_model->insert_run_hour($run_data);
		}
	}
}

?>