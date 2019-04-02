<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class CBM_line extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('iot_mailer_model');
    }
	public function cbmsalesvol(){
		$receiver = $this->iot_mailer_model->getreceiver(23);
		if(!empty($receiver)){
			$message = 'CBM Report';
			$message .= '
';
			$message .= base_url().'cbmsales_report';$message .= '
SRMI Report';$message .= '
';
			$message .= base_url().'line_srmi';
			//under
			//$message = 'Sorry, we have a maintenance today';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('u1WnDKzH1CFwyCkPtkZE/A4/TIAUGXHKQZwZiDIceJRNJ9g3e50V/nedKp2f5iYgMghnUgs96Rx8Vphv9/hVu4tRi52KwA2agG52nEmZgRFjP2AW6y0F+qR/R30QIrPh4bREAw/T0hSRcb8CWZp3XAdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '492c64fe3453a69d74bcb255dc3854bb']);
			if(!empty($receiver)){
				foreach($receiver as $record){
					$user_id    = $record->line;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>23);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
		}
		$groupreceiver = $this->iot_mailer_model->getgroupreceiver('CBM');
		if(!empty($groupreceiver)){
			$message = 'CBM Report';
			$message .= '
';
			$message .= base_url().'cbmsales_report';$message .= '
SRMI Report';$message .= '
';
			$message .= base_url().'line_srmi';
			//under
			//$message = 'Sorry, we have a maintenance today';
			$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('u1WnDKzH1CFwyCkPtkZE/A4/TIAUGXHKQZwZiDIceJRNJ9g3e50V/nedKp2f5iYgMghnUgs96Rx8Vphv9/hVu4tRi52KwA2agG52nEmZgRFjP2AW6y0F+qR/R30QIrPh4bREAw/T0hSRcb8CWZp3XAdB04t89/1O/w1cDnyilFU=');
			$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '492c64fe3453a69d74bcb255dc3854bb']);
			if(!empty($groupreceiver)){
				foreach($groupreceiver as $xxx){
					$user_id    = $xxx->groupId;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
				}
			}else{
				exit;
			}
			$topic = array('topic'=>1023);
			$mailcount = $this->iot_mailer_model->addmailcount($topic);
		}
		exit;
    }
	public function cbmsales_report(){
		$this->load->model('CBM_salesvol_model');
		$data['list'] = $this->CBM_salesvol_model->get_cbm_allchart();
		//echo var_dump($data['list']);
		$this->global['pageTitle'] = 'RAWR : All Chart';
		$this->load->view('CBM_salesvol/daily_chart', $data);
	}
	public function cbm_view_chart_line($unix, $cbm_id, $cbm_prodid){
		$this->load->model('CBM_salesvol_model');
		$data['boxid1'] = $cbm_id.'_'.$cbm_prodid.'1';
		$data['boxid2'] = $cbm_id.'_'.$cbm_prodid.'2';
		$data['CBM_name'] = $this->CBM_salesvol_model->getCBM_name($cbm_id);
		$prod_detail = $this->CBM_salesvol_model->getproduct_cbmbyid($cbm_prodid);
		$data['CBM_prod'] = $prod_detail->prod_name;
		$data['CBM_unit'] = $prod_detail->unit;
		$unix = $unix/1000;
		$unix = $unix - 86400;
		$sel_month = date('m', $unix);
		$sel_year = date('Y', $unix);
		if($sel_month == 12){
			$next_month = 1;
			$next_year = $sel_year + 1;
		}else{
			$next_month = $sel_month + 1;
			$next_year = $sel_year;
		}
		$next_date = $next_year.'-'.$next_month.'-01';
		$next_date = date('U', strtotime($next_date));
		$next_date = $next_date - 1;
		$base_date = date('Y-m', $next_date);
		$lastyear_date = date('Y', $next_date);
		$lastyear_date = $lastyear_date - 1;
		$LY_base_date = $lastyear_date.'-';
		$LY_base_date .= date('m', $next_date);
		$data['sesdate'] = date('F Y', $next_date);
		$form_day = date('d', $next_date);
		$fore_mode = 1;
		if($prod_detail->forecast_mode == 2){$fore_mode = 2;}
		//get prod id for stack and sum query
		$stacked = $this->CBM_salesvol_model->get_stacked_prodcount($cbm_id, $prod_detail->prod_id);
		$stacked_mode = 0;
		if($stacked > 0){
			$stacked_mode = 1;
		}
		$stacked = $this->CBM_salesvol_model->get_stacked_prod($cbm_id, $prod_detail->prod_id);
		//get the forecast and categories chart
		$cat = '';
		$fore = '';
		$fore1 = 0;
		$used_date = '';
		$fore_get = 0;
		for ($x = 1; $x <= $form_day; $x++){
			if($x < 10){
				$cat .= '0'.$x.', ';
				$used_date = $base_date.'-0'.$x;
				$LY_date = $LY_base_date.'-0'.$x;
			}else{
				$cat .= $x.', ';
				$used_date = $base_date.'-'.$x;
				$LY_date = $LY_base_date.'-'.$x;
			}
			if($prod_detail->isum == 0){
				$forex = $this->CBM_salesvol_model->get_tot_forecast($cbm_id, $stacked, $used_date, $fore_mode);
			}elseif($prod_detail->isum == 1){
				$get_each_member = $this->CBM_salesvol_model->get_each_member($prod_detail->prod_id);
				$cast_mem = $this->CBM_salesvol_model->check_prod_subclassing_sum($get_each_member);
				$forex = $this->CBM_salesvol_model->get_tot_sum_forecast($cast_mem, $used_date);
			}
			if(!empty($forex)){
				$fore .= $forex->set_num.', ';
				$fore_get = $forex->set_num;
			}else{
				$fore .= '0, ';
				$fore_get = 0;
			}
			$nowdate = date('d', $unix);
			if($x <= $nowdate){
				$fore1 = $fore1 + $fore_get;
			}
		}
		$forecast = substr($fore, 0, -2);
		$series = "
			series: [{
				name: 'Target',
				data: [".$forecast."]
				},{";
		$seriesLY = "
			series: [{
				name: 'Target',
				data: [".$fore1."]
				},{";
		$groupmember = $this->CBM_salesvol_model->check_prod_subclassing($cbm_id, $prod_detail->prod_id);
		$act1_tot = 0;
		$actLY_tot = 0;
		foreach($groupmember as $grouping){
			//echo var_dump($grouping);
			//echo '<br>';
			$act = '';
			$act1 = 0;
			$actLY = 0;
			$actual = '';
			$used_date = '';
			for ($x = 1; $x <= $form_day; $x++){
				if($x < 10){
					$used_date = $base_date.'-0'.$x;
					$LY_date = $LY_base_date.'-0'.$x;
				}else{
					$used_date = $base_date.'-'.$x;
					$LY_date = $LY_base_date.'-'.$x;
				}
				//check isum data
				if($grouping->isum == 0){
					$actx = $this->CBM_salesvol_model->cbm_get_vol_chart($cbm_id, $grouping->id, $used_date);
				}elseif($grouping->isum == 1){
					$get_vol_member = $this->CBM_salesvol_model->get_vol_member($grouping->id);
					$actx = $this->CBM_salesvol_model->cbm_get_tot_vol_chart($used_date, $get_vol_member);
					//echo var_dump($actx);
					//echo '<br>';
				}
				if(!empty($actx->vol)){
					$act .= $actx->vol.', ';
					$act_get = $actx->vol;
				}else{
					$act .= '0, ';
					$act_get = 0;
				}
				if($grouping->isum == 0){
					$LYactx = $this->CBM_salesvol_model->cbm_get_vol_chart($cbm_id, $grouping->id, $LY_date);
				}elseif($grouping->isum == 1){
					$get_vol_member = $this->CBM_salesvol_model->get_vol_member($grouping->id);
					$LYactx = $this->CBM_salesvol_model->cbm_get_tot_vol_chart($LY_date, $get_vol_member);
				}
				if(!empty($LYactx)){
					$LYact_get = $LYactx->vol;
				}else{
					$LYact_get = 0;
				}
				$nowdate = date('d', $unix);
				if($x <= $nowdate){
					$act1 = $act1 + $act_get;
					$actLY = $actLY + $LYact_get;
				}
			}
			$actual = substr($act, 0, -2);
			$axisname = $grouping->subclass;
			if($grouping->subclass == "Default"){
				$axisname = "Actual";
			}
			$series .= "
					name: '".$axisname."',
					data: [".$actual."],
					stack: 'Actual'
					},{";
			$act1_tot = $act1_tot + $act1;
			$actLY_tot = $actLY_tot + $actLY;
		}
		$seriesLY .= "
				name: 'Actual',
				data: [".$act1_tot."]
				},{
				name: 'Actual LY',
				data: [".$actLY_tot."]
				}]";
		$seriesok = substr($series, 0, -2);
		$seriesok .= "]";
		$category = substr($cat, 0, -2);
		$data['cat'] = $category;
		$data['seriesok'] = $seriesok;
		$data['seriesly'] = $seriesLY;
		//echo $seriesok;
		if($fore1 != 0){
			$data['Target'] = number_format((($act1_tot-$fore1)*100/$fore1), 1, '.', '');
		}else{
			$data['Target'] = 0;
		}
		if($actLY_tot != 0){
			$data['YoY'] = number_format((($act1_tot-$actLY_tot)*100/$actLY_tot), 1, '.', '');
		}else{
			$data['YoY'] = 0;
		}
		$this->load->view('CBM_salesvol/chart_stack', $data);
	}
	function renew_sum_forecast(){
		$this->set_sum_forecast('2019-02-01');
	}
	function set_sum_forecast($num = NULL){
		$this->load->model('CBM_salesvol_model');
		$get_sum_type = $this->CBM_salesvol_model->get_sum_type();
		if(!empty($get_sum_type)){
			foreach($get_sum_type as $main_id){
				$get_each_member = $this->CBM_salesvol_model->get_each_member($main_id->id);
				if(!empty($get_each_member)){
					echo 'sparator<br>';
					$fore = 0;
					$fore_each = 0;
					foreach($get_each_member as $sub_id){
						if($sub_id->forecast_mode == 1){
							$forex = $this->CBM_salesvol_model->getforecast($sub_id->cbm_id, $sub_id->prod_name, $num);
							if(!empty($forex)){
								$fore_each = $forex->set_num;
							}
						}elseif($sub_id->forecast_mode == 2){
							$getall_forecast = $this->CBM_salesvol_model->check_prod_subclassing_forecast($sub_id->cbm_id, $sub_id->prod_name);
							if(!empty($getall_forecast)){
								$forebuff = 0;
								foreach($getall_forecast as $foredata){
									$forex = $this->CBM_salesvol_model->getforecast($sub_id->cbm_id, $foredata->id, $num);
									if(!empty($forex)){
										$forebuff = $forebuff + $forex->set_num;
									}else{
										$forebuff = $forebuff + 0;
									}
								}
								$fore_each = $fore_each + $forebuff;
							}
						}
						echo '<br>'.$fore_each;
						$fore++;
						echo var_dump($sub_id).'<br>'.$fore.'<br>';
					}
				}
			}
		}
	}
	function undermtn(){
		$this->load->view("under", $data);
	}
	public function line_srmi_all_chartv2(){
		$this->load->model('CBM_salesvol_model');
		$get_srmi_group = $this->CBM_salesvol_model->get_srmi_group();
		$data['list'] = $get_srmi_group;
		$this->load->view("CBM_salesvol/line_srmi_allchartv2", $data);
	}
	public function line_srmi_view_chartv2($unix, $unix2, $group){
		$this->load->model('CBM_salesvol_model');
		$data['boxid1'] = $group.'1';
		$data['boxid2'] = $group.'2';
		$data['CBM_unit'] = 'M3';
		$form_day = $unix;
		$to_day = $unix2;
		$data['sesdate'] = $group.'/'.$form_day.' to '.$to_day;
		$cat_axis = '';
		$break_even_axis = '';
		$order_axis = '';
		$actual_axis = '';
		$get_all_srmi_groupmember = $this->CBM_salesvol_model->get_all_srmi_groupmember($group);
		if(!empty($get_all_srmi_groupmember)){
			foreach($get_all_srmi_groupmember as $record){
				$cat_axis .= '"'.$record->plant_srmi.'", ';
				$get_srmi_data = $this->CBM_salesvol_model->get_srmi_datav2($record->id, $form_day, $to_day);
				if($get_srmi_data->breakeven > 0 or $get_srmi_data->order_srmi > 0 or $get_srmi_data->actual > 0){
					if($get_srmi_data->breakeven > 0){
						$break_even_axis .= $get_srmi_data->breakeven.', ';
					}else{
						$break_even_axis .= '0, ';
					}
					if($get_srmi_data->order_srmi > 0){
						$order_axis .= $get_srmi_data->order_srmi.', ';
					}else{
						$order_axis .= '0, ';
					}
					if($get_srmi_data->actual > 0){
						$actual_axis .= $get_srmi_data->actual.', ';
					}else{
						$actual_axis .= '0, ';
					}
				}else{
					$break_even_axis .= '0, ';
					$order_axis .= '0, ';
					$actual_axis .= '0, ';
				}
			}
		}
		$sum_breakeven = 0;
		$sum_order = 0;
		$sum_actual = 0;
		$get_sum_srmi_bu_breakeven = $this->CBM_salesvol_model->get_sum_srmi_bu_breakevenv2($group, $form_day, $to_day);
		if(!empty($get_sum_srmi_bu_breakeven)){
			if($get_sum_srmi_bu_breakeven->sum_break_event > 0){
				$sum_breakeven = $get_sum_srmi_bu_breakeven->sum_break_event;
			}else{
				$sum_breakeven = 0;
			}
		}
		$get_sum_srmi_bu_order = $this->CBM_salesvol_model->get_sum_srmi_bu_orderv2($group, $form_day, $to_day);
		if(!empty($get_sum_srmi_bu_order)){
			if($get_sum_srmi_bu_order->sum_order > 0){
				$sum_order = $get_sum_srmi_bu_order->sum_order;
			}else{
				$sum_order = 0;
			}
		}
		$get_sum_srmi_bu_actual = $this->CBM_salesvol_model->get_sum_srmi_bu_actualv2($group, $form_day, $to_day);
		if(!empty($get_sum_srmi_bu_actual)){
			if($get_sum_srmi_bu_actual->sum_actual > 0){
				$sum_actual = $get_sum_srmi_bu_actual->sum_actual;
			}else{
				$sum_actual = 0;
			}
		}
		$data['cat'] = substr($cat_axis, 0, -2);
		$data['breakeven'] = substr($break_even_axis, 0, -2);
		$data['order'] = substr($order_axis, 0, -2);
		$data['actual'] = substr($actual_axis, 0, -2);
		$data['sum_breakeven'] = $sum_breakeven;
		$data['sum_order'] = $sum_order;
		$data['sum_actual'] = $sum_actual;
		$this->load->view('CBM_salesvol/srmi_chart_area', $data);
	}
	public function line_get_srmi_mtd($unix){
		$this->load->model('CBM_salesvol_model');
		$data['boxid1'] = 'SRMI_sum_1';
		$data['boxid2'] = 'SRMI_sum_2';
		$data['CBM_unit'] = 'M3';
		$unix = $unix/1000;
		$unix = $unix;
		$sel_month = date('m', $unix);
		$sel_year = date('Y', $unix);
		if($sel_month == 12){
			$next_month = 1;
			$next_year = $sel_year + 1;
		}else{
			$next_month = $sel_month + 1;
			$next_year = $sel_year;
		}
		$next_date = $next_year.'-'.$next_month.'-01';
		$next_date = date('U', strtotime($next_date));
		$next_date = $next_date - 1;
		$base_date = date('Y-m', $next_date);
		$data['sesdate'] = date('F Y', $next_date);
		$form_day = date('d', $next_date);
		//get the forecast and categories chart
		$cat = '';
		$breakeven = '';
		$order = '';
		$actual = '';
		$sum_breakeven = 0;
		$sum_order = 0;
		$sum_actual = 0;
		$sum_breakeven_buf = 0;
		$sum_order_buf = 0;
		$sum_actual_buf = 0;
		$used_date = '';
		for ($x = 1; $x <= $form_day; $x++){
			if($x < 10){
				$cat .= '0'.$x.', ';
				$used_date = $base_date.'-0'.$x;
			}else{
				$cat .= $x.', ';
				$used_date = $base_date.'-'.$x;
			}
			$get_chart = $this->CBM_salesvol_model->get_tot_sum_srmi($used_date);
			if($get_chart->sum_breakevent > 0 or $get_chart->sum_order > 0 or $get_chart->sum_actual > 0){
				if($get_chart->sum_breakevent > 0){
					$breakeven .= $get_chart->sum_breakevent.', ';
					$sum_breakeven_buf = $get_chart->sum_breakevent;
				}else{
					$breakeven .= '0, ';
					$sum_breakeven_buf = 0;
				}
				if($get_chart->sum_order > 0){
					$order .= $get_chart->sum_order.', ';
					$sum_order_buf = $get_chart->sum_order;
				}else{
					$order .= '0, ';
					$sum_order_buf = 0;
				}
				if($get_chart->sum_actual > 0){
					$actual .= $get_chart->sum_actual.', ';
					$sum_actual_buf = $get_chart->sum_actual;
				}else{
					$actual .= '0, ';
					$sum_actual_buf = 0;
				}
			}else{
				$breakeven .= '0, ';
				$order .= '0, ';
				$actual .= '0, ';
				$sum_breakeven_buf = 0;
				$sum_order_buf = 0;
				$sum_actual_buf = 0;
			}
			$nowdate = date('d', $unix);
			if($x <= $nowdate){
				$sum_breakeven = $sum_breakeven + $sum_breakeven_buf;
				$sum_order = $sum_order + $sum_order_buf;
				$sum_actual = $sum_actual + $sum_actual_buf;
			}
		}
		$data['cat'] = substr($cat, 0, -2);
		$data['breakeven'] = substr($breakeven, 0, -2);
		$data['order'] = substr($order, 0, -2);
		$data['actual'] = substr($actual, 0, -2);
		$data['sum_breakeven'] = $sum_breakeven;
		$data['sum_order'] = $sum_order;
		$data['sum_actual'] = $sum_actual;
		$this->load->view('CBM_salesvol/srmi_chart_area', $data);
	}
	public function line_get_srmi_mtdv2($unix){
		$this->load->model('CBM_salesvol_model');
		$data['boxid1'] = 'SRMI_sum_1';
		$data['boxid2'] = 'SRMI_sum_2';
		$data['CBM_unit'] = 'M3';
		$unix = date('U', strtotime($unix));
		$unix = $unix - 86400;
		$sel_month = date('m', $unix);
		$sel_year = date('Y', $unix);
		if($sel_month == 12){
			$next_month = 1;
			$next_year = $sel_year + 1;
		}else{
			$next_month = $sel_month + 1;
			$next_year = $sel_year;
		}
		$next_date = $next_year.'-'.$next_month.'-01';
		$next_date = date('U', strtotime($next_date));
		$next_date = $next_date - 1;
		$base_date = date('Y-m', $next_date);
		$data['sesdate'] = date('F Y', $next_date);
		$form_day = date('d', $next_date);
		//get the forecast and categories chart
		$cat = '';
		$breakeven = '';
		$order = '';
		$actual = '';
		$sum_breakeven = 0;
		$sum_order = 0;
		$sum_actual = 0;
		$sum_breakeven_buf = 0;
		$sum_order_buf = 0;
		$sum_actual_buf = 0;
		$used_date = '';
		for ($x = 1; $x <= $form_day; $x++){
			if($x < 10){
				$cat .= '0'.$x.', ';
				$used_date = $base_date.'-0'.$x;
			}else{
				$cat .= $x.', ';
				$used_date = $base_date.'-'.$x;
			}
			$get_chart = $this->CBM_salesvol_model->get_tot_sum_srmi($used_date);
			if($get_chart->sum_breakevent > 0 or $get_chart->sum_order > 0 or $get_chart->sum_actual > 0){
				if($get_chart->sum_breakevent > 0){
					$breakeven .= $get_chart->sum_breakevent.', ';
					$sum_breakeven_buf = $get_chart->sum_breakevent;
				}else{
					$breakeven .= '0, ';
					$sum_breakeven_buf = 0;
				}
				if($get_chart->sum_order > 0){
					$order .= $get_chart->sum_order.', ';
					$sum_order_buf = $get_chart->sum_order;
				}else{
					$order .= '0, ';
					$sum_order_buf = 0;
				}
				if($get_chart->sum_actual > 0){
					$actual .= $get_chart->sum_actual.', ';
					$sum_actual_buf = $get_chart->sum_actual;
				}else{
					$actual .= '0, ';
					$sum_actual_buf = 0;
				}
			}else{
				$breakeven .= '0, ';
				$order .= '0, ';
				$actual .= '0, ';
				$sum_breakeven_buf = 0;
				$sum_order_buf = 0;
				$sum_actual_buf = 0;
			}
			$nowdate = date('d', $unix);
			if($x <= $nowdate){
				$sum_breakeven = $sum_breakeven + $sum_breakeven_buf;
				$sum_order = $sum_order + $sum_order_buf;
				$sum_actual = $sum_actual + $sum_actual_buf;
			}
		}
		$data['cat'] = substr($cat, 0, -2);
		$data['breakeven'] = substr($breakeven, 0, -2);
		$data['order'] = substr($order, 0, -2);
		$data['actual'] = substr($actual, 0, -2);
		$data['sum_breakeven'] = $sum_breakeven;
		$data['sum_order'] = $sum_order;
		$data['sum_actual'] = $sum_actual;
		$this->load->view('CBM_salesvol/srmi_chart_area', $data);
	}
	function line_srmi_map($from_date, $to_date){
		$this->load->model('CBM_salesvol_model');
		$area_1 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(1, $from_date, $to_date);
		$area_2 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(2, $from_date, $to_date);
		$area_3 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(3, $from_date, $to_date);
		$area_4 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(4, $from_date, $to_date);
		$area_5 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(5, $from_date, $to_date);
		$area_6 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(6, $from_date, $to_date);
		$area_7 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(7, $from_date, $to_date);
		$area_8 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(8, $from_date, $to_date);
		$area_9 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(9, $from_date, $to_date);
		$area_10 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(10, $from_date, $to_date);
		$area_11 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(11, $from_date, $to_date);
		$area_12 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(12, $from_date, $to_date);
		$area_13 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(13, $from_date, $to_date);
		$area_14 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(14, $from_date, $to_date);
		$area_15 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(15, $from_date, $to_date);
		$area_16 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(16, $from_date, $to_date);
		$area_17 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(17, $from_date, $to_date);
		$area_18 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(18, $from_date, $to_date);
		$area_19 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(19, $from_date, $to_date);
		$area_20 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(20, $from_date, $to_date);
		$area_21 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(21, $from_date, $to_date);
		$area_22 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(22, $from_date, $to_date);
		$area_23 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(23, $from_date, $to_date);
		$area_24 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(24, $from_date, $to_date);
		$area_25 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(25, $from_date, $to_date);
		$area_26 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(26, $from_date, $to_date);
		$area_27 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(27, $from_date, $to_date);
		$area_28 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(28, $from_date, $to_date);
		$area_29 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(29, $from_date, $to_date);
		$area_30 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(30, $from_date, $to_date);
		$area_31 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(31, $from_date, $to_date);
		$area_32 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(32, $from_date, $to_date);
		$area_33 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(33, $from_date, $to_date);
		$area_34 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(34, $from_date, $to_date);
		$area_35 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(35, $from_date, $to_date);
		$area_36 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(36, $from_date, $to_date);
		$area_37 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(37, $from_date, $to_date);
		$area_38 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(38, $from_date, $to_date);
		$area_39 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(39, $from_date, $to_date);
		$area_40 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(40, $from_date, $to_date);
		$area_41 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(41, $from_date, $to_date);
		$area_42 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(42, $from_date, $to_date);
		$area_43 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(43, $from_date, $to_date);
		$area_44 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(44, $from_date, $to_date);
		$area_45 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(45, $from_date, $to_date);
		$area_46 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(46, $from_date, $to_date);
		$area_47 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(47, $from_date, $to_date);
		$area_48 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(48, $from_date, $to_date);
		$area_49 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(49, $from_date, $to_date);
		$area_50 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(50, $from_date, $to_date);
		$area_51 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(51, $from_date, $to_date);
		$area_52 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(52, $from_date, $to_date);
		$area_53 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(53, $from_date, $to_date);
		$area_54 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(54, $from_date, $to_date);
		$area_55 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(55, $from_date, $to_date);
		$area_56 = $this->CBM_salesvol_model->get_sum_srmi_eacharea(56, $from_date, $to_date);
		if($area_1->sum_actual > 0){$data['area_1'] = $area_1->sum_actual;}else{$data['area_1'] = 0;}
		if($area_2->sum_actual > 0){$data['area_2'] = $area_2->sum_actual;}else{$data['area_2'] = 0;}
		if($area_3->sum_actual > 0){$data['area_3'] = $area_3->sum_actual;}else{$data['area_3'] = 0;}
		if($area_4->sum_actual > 0){$data['area_4'] = $area_4->sum_actual;}else{$data['area_4'] = 0;}
		if($area_5->sum_actual > 0){$data['area_5'] = $area_5->sum_actual;}else{$data['area_5'] = 0;}
		if($area_6->sum_actual > 0){$data['area_6'] = $area_6->sum_actual;}else{$data['area_6'] = 0;}
		if($area_7->sum_actual > 0){$data['area_7'] = $area_7->sum_actual;}else{$data['area_7'] = 0;}
		if($area_8->sum_actual > 0){$data['area_8'] = $area_8->sum_actual;}else{$data['area_8'] = 0;}
		if($area_9->sum_actual > 0){$data['area_9'] = $area_9->sum_actual;}else{$data['area_9'] = 0;}
		if($area_10->sum_actual > 0){$data['area_10'] = $area_10->sum_actual;}else{$data['area_10'] = 0;}
		if($area_11->sum_actual > 0){$data['area_11'] = $area_11->sum_actual;}else{$data['area_11'] = 0;}
		if($area_12->sum_actual > 0){$data['area_12'] = $area_12->sum_actual;}else{$data['area_12'] = 0;}
		if($area_13->sum_actual > 0){$data['area_13'] = $area_13->sum_actual;}else{$data['area_13'] = 0;}
		if($area_14->sum_actual > 0){$data['area_14'] = $area_14->sum_actual;}else{$data['area_14'] = 0;}
		if($area_15->sum_actual > 0){$data['area_15'] = $area_15->sum_actual;}else{$data['area_15'] = 0;}
		if($area_16->sum_actual > 0){$data['area_16'] = $area_16->sum_actual;}else{$data['area_16'] = 0;}
		if($area_17->sum_actual > 0){$data['area_17'] = $area_17->sum_actual;}else{$data['area_17'] = 0;}
		if($area_18->sum_actual > 0){$data['area_18'] = $area_18->sum_actual;}else{$data['area_18'] = 0;}
		if($area_19->sum_actual > 0){$data['area_19'] = $area_19->sum_actual;}else{$data['area_19'] = 0;}
		if($area_20->sum_actual > 0){$data['area_20'] = $area_20->sum_actual;}else{$data['area_20'] = 0;}
		if($area_21->sum_actual > 0){$data['area_21'] = $area_21->sum_actual;}else{$data['area_21'] = 0;}
		if($area_22->sum_actual > 0){$data['area_22'] = $area_22->sum_actual;}else{$data['area_22'] = 0;}
		if($area_23->sum_actual > 0){$data['area_23'] = $area_23->sum_actual;}else{$data['area_23'] = 0;}
		if($area_24->sum_actual > 0){$data['area_24'] = $area_24->sum_actual;}else{$data['area_24'] = 0;}
		if($area_25->sum_actual > 0){$data['area_25'] = $area_25->sum_actual;}else{$data['area_25'] = 0;}
		if($area_26->sum_actual > 0){$data['area_26'] = $area_26->sum_actual;}else{$data['area_26'] = 0;}
		if($area_27->sum_actual > 0){$data['area_27'] = $area_27->sum_actual;}else{$data['area_27'] = 0;}
		if($area_28->sum_actual > 0){$data['area_28'] = $area_28->sum_actual;}else{$data['area_28'] = 0;}
		if($area_29->sum_actual > 0){$data['area_29'] = $area_29->sum_actual;}else{$data['area_29'] = 0;}
		if($area_30->sum_actual > 0){$data['area_30'] = $area_30->sum_actual;}else{$data['area_30'] = 0;}
		if($area_31->sum_actual > 0){$data['area_31'] = $area_31->sum_actual;}else{$data['area_31'] = 0;}
		if($area_32->sum_actual > 0){$data['area_32'] = $area_32->sum_actual;}else{$data['area_32'] = 0;}
		if($area_33->sum_actual > 0){$data['area_33'] = $area_33->sum_actual;}else{$data['area_33'] = 0;}
		if($area_34->sum_actual > 0){$data['area_34'] = $area_34->sum_actual;}else{$data['area_34'] = 0;}
		if($area_35->sum_actual > 0){$data['area_35'] = $area_35->sum_actual;}else{$data['area_35'] = 0;}
		if($area_36->sum_actual > 0){$data['area_36'] = $area_36->sum_actual;}else{$data['area_36'] = 0;}
		if($area_37->sum_actual > 0){$data['area_37'] = $area_37->sum_actual;}else{$data['area_37'] = 0;}
		if($area_38->sum_actual > 0){$data['area_38'] = $area_38->sum_actual;}else{$data['area_38'] = 0;}
		if($area_39->sum_actual > 0){$data['area_39'] = $area_39->sum_actual;}else{$data['area_39'] = 0;}
		if($area_40->sum_actual > 0){$data['area_40'] = $area_40->sum_actual;}else{$data['area_40'] = 0;}
		if($area_41->sum_actual > 0){$data['area_41'] = $area_41->sum_actual;}else{$data['area_41'] = 0;}
		if($area_42->sum_actual > 0){$data['area_42'] = $area_42->sum_actual;}else{$data['area_42'] = 0;}
		if($area_43->sum_actual > 0){$data['area_43'] = $area_43->sum_actual;}else{$data['area_43'] = 0;}
		if($area_44->sum_actual > 0){$data['area_44'] = $area_44->sum_actual;}else{$data['area_44'] = 0;}
		if($area_45->sum_actual > 0){$data['area_45'] = $area_45->sum_actual;}else{$data['area_45'] = 0;}
		if($area_46->sum_actual > 0){$data['area_46'] = $area_46->sum_actual;}else{$data['area_46'] = 0;}
		if($area_47->sum_actual > 0){$data['area_47'] = $area_47->sum_actual;}else{$data['area_47'] = 0;}
		if($area_48->sum_actual > 0){$data['area_48'] = $area_48->sum_actual;}else{$data['area_48'] = 0;}
		if($area_49->sum_actual > 0){$data['area_49'] = $area_49->sum_actual;}else{$data['area_49'] = 0;}
		if($area_50->sum_actual > 0){$data['area_50'] = $area_50->sum_actual;}else{$data['area_50'] = 0;}
		if($area_51->sum_actual > 0){$data['area_51'] = $area_51->sum_actual;}else{$data['area_51'] = 0;}
		if($area_52->sum_actual > 0){$data['area_52'] = $area_52->sum_actual;}else{$data['area_52'] = 0;}
		if($area_53->sum_actual > 0){$data['area_53'] = $area_53->sum_actual;}else{$data['area_53'] = 0;}
		if($area_54->sum_actual > 0){$data['area_54'] = $area_54->sum_actual;}else{$data['area_54'] = 0;}
		if($area_55->sum_actual > 0){$data['area_55'] = $area_55->sum_actual;}else{$data['area_55'] = 0;}
		if($area_56->sum_actual > 0){$data['area_56'] = $area_56->sum_actual;}else{$data['area_56'] = 0;}
		$this->load->view('CBM_salesvol/map', $data);
	}
}
?>