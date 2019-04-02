<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Iot_cron extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_cutting_model');
	}
	function iot_daily_calculator($cekdate = NULL){
		if(empty($cekdate)){
			$unix = date('U');
		}else{
			$unix = $cekdate;
		}
		$unix1 = $unix - ($unix % 86400) + 2*3600;
		$unix2 = $unix1 + 86400;
		$time1 = date('Y-m-d H:i:s', $unix1);
		$time2 = date('Y-m-d H:i:s', $unix2);
		$dailyvol = $this->iot_cutting_model->chartmold($time1, $time2);
		echo $time1;
		echo '<br>';
		if(!empty($dailyvol)){
			$limit1 = $this->iot_cutting_model->limitct1();
			$limit2 = $this->iot_cutting_model->limitct2();
			$mold = 0;
			$ratetime = 0;
			$slowspeed = 0;
			$downtime = 0;
			$planned = 0;
			foreach($dailyvol as $rec){
				$vol = date('U', strtotime($rec->timestamp));
				if($mold == 0){
					$mold++;
					$gettimebefore = $this->iot_cutting_model->gettimebefore($time1);
					$last_time = date('U', strtotime($gettimebefore->timestamp));
					$first_cake = $vol - $last_time;
					echo $rec->timestamp;
					echo '<br>';
					echo $last_time;
					echo '<br>';
					echo $first_cake;
					echo '<br>';
				}
			}
		}
	}
}