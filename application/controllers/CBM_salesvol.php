<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class CBM_salesvol extends BaseController{
	private $filename = "import_data";
	public function __construct(){
		parent::__construct();
		$this->load->model('CBM_salesvol_model');
		$this->isLoggedIn();
	}
	public function cbm_daily_rec($cbm_id=NULL, $cek_id=NULL, $rec_date=NULL, $stat=NULL){
		if(($this->vendorId > 30000 and $this->vendorId < 40000) or $this->adminapp == 1){
			$data['cbm_name'] = $this->name;
			$data['prod'] = $this->CBM_salesvol_model->getproduct_cbm($this->vendorId);
			$data['prod_1'] = $this->CBM_salesvol_model->getproduct_cbm_1($this->vendorId);
			$data['seldate'] = date('Y-m-d');
			$data['vol'] = 0;
			$data['cbm_id'] = $this->vendorId;
			if(!empty($cbm_id)){
				$data['callout'] = 1;
				$prod_name = $this->CBM_salesvol_model->getvolinfo_byid($cek_id);
				$prod_cbm = $this->CBM_salesvol_model->getproduct_cbmbyid($prod_name->cbm_prodid);
				$prod_group = $prod_name->group;
				$prod_subclass = $prod_name->subclass;
				$check = $this->CBM_salesvol_model->getvolinfo_byid($cek_id);
				if(!empty($stat)){
					$data['color'] = 'success';
					$data['icon'] = 'check';
					$data['title'] = 'Report ['.date('Y-m-d', $rec_date).'] has been submitted';
					$data['rep_vol'] = $prod_cbm->prod_name.': '.$check->vol.' ';
					if($prod_group != 'Default'){
						$data['rep_vol'] .= '<br>Added to same data group ('.$prod_group.')';
					}
					if($prod_subclass != 'Default'){
						$data['rep_vol'] .= '<br>Recorded as subclass('.$prod_subclass.')';
					}
					$data['text'] = '';
				}else{
					$check_new = $this->CBM_salesvol_model->cbm_check_dailyreport_update($cbm_id, $prod_name->cbm_prodid, date('Y-m-d', $rec_date), $prod_group, $prod_subclass);
					$data['color'] = 'danger';
					$data['icon'] = 'warning';
					$data['title'] = 'Report ['.date('Y-m-d', $rec_date).'] has been recorded on '.$check->timestamp;
					$data['rep_vol'] = 'Last data: <br>'.$prod_cbm->prod_name.': '.$check->vol.' '.$prod_cbm->unit;
					$data['rep_vol'] .= '<br>New data:';
					$data['rep_vol'] .= '<br>'.$prod_cbm->prod_name.': '.$check_new->vol.' ';
					if($prod_group != 'Default'){
						$data['rep_vol'] .= '<br>Will be added to same data group ('.$prod_group.')';
					}
					if($prod_subclass != 'Default'){
						$data['rep_vol'] .= '<br>Recorded as subclass('.$prod_subclass.')';
					}
					$data['text'] = 'Do you want to update it ? 
						<form action="'.base_url().'update_cbm_daily_report" method="POST">
						<input type="hidden" name="cbm_id" value="'.$check_new->cbm_id.'">
						<input type="hidden" name="prod_id" value="'.$check_new->cbm_prodid.'">
						<input type="hidden" name="rec_date" value="'.$check_new->rec_date.'">
						<input type="hidden" name="vol" value="'.$check_new->vol.'">
						<input type="hidden" name="group" value="'.$check_new->group.'">
						<input type="hidden" name="subclass" value="'.$check_new->subclass.'">
						<button class="btn btn-sm btn-primary pull-right">Update</button>
						</form>';
				}
			}
			$this->global['pageTitle'] = 'RAWR : Daily Report';
			$this->loadViews("CBM_salesvol/daily_rec", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	public function cbm_daily_record(){
		$cbm_id = $this->input->post('cbm_id');
		$cbm_prodid = $this->input->post('prod_id');
		$rec_date = $this->input->post('rec_date');
		$vol = $this->input->post('vol');
		$getproduct_detail = $this->CBM_salesvol_model->cbm_check_prodbyid($cbm_prodid);
		$cbm_prodid = $getproduct_detail->id;
		$cbm_prod_group = $getproduct_detail->group;
		$cbm_prod_subclass = $getproduct_detail->subclass;
		$check = $this->CBM_salesvol_model->cbm_check_dailyreport($cbm_id, $cbm_prodid, $rec_date, $cbm_prod_group, $cbm_prod_subclass);
		if(!empty($check)){
			$report = array(
				'cbm_id' => $cbm_id,
				'cbm_prodid' => $cbm_prodid,
				'rec_date' => $rec_date,
				'vol' => $vol,
				'group' => $cbm_prod_group,
				'subclass' => $cbm_prod_subclass,
				'isvalid' => 2
			);
			$this->CBM_salesvol_model->cbm_input_daily($report);
			$checkagain = $this->CBM_salesvol_model->cbm_check_dailyreport($cbm_id, $cbm_prodid, $rec_date, $cbm_prod_group, $cbm_prod_subclass);
			redirect('cbm_daily_rec/'.$cbm_id.'/'.$checkagain->id.'/'.date('U', strtotime($rec_date)));
		}else{
			$report = array(
				'cbm_id' => $cbm_id,
				'cbm_prodid' => $cbm_prodid,
				'rec_date' => $rec_date,
				'vol' => $vol,
				'group' => $cbm_prod_group,
				'subclass' => $cbm_prod_subclass
			);
			$this->CBM_salesvol_model->cbm_input_daily($report);
			$checkagain = $this->CBM_salesvol_model->cbm_check_dailyreport($cbm_id, $cbm_prodid, $rec_date, $cbm_prod_group, $cbm_prod_subclass);
			redirect('cbm_daily_rec/'.$cbm_id.'/'.$checkagain->id.'/'.date('U', strtotime($rec_date)).'/1');
		}
	}
	public function update_cbm_daily_report(){
		$cbm_id = $this->input->post('cbm_id');
		$cbm_prodid = $this->input->post('prod_id');
		$rec_date = $this->input->post('rec_date');
		$vol = $this->input->post('vol');
		$group = $this->input->post('group');
		$subclass = $this->input->post('subclass');
		$report = array(
			'cbm_id' => $cbm_id,
			'cbm_prodid' => $cbm_prodid,
			'rec_date' => $rec_date,
			'group' => $group,
			'subclass' => $subclass,
			'vol' => $vol
			);
		echo var_dump($report);
		$this->CBM_salesvol_model->update_cbm_input_daily($cbm_id, $cbm_prodid, $rec_date, $group, $subclass, $report);
		$checkagain = $this->CBM_salesvol_model->cbm_check_dailyreport($cbm_id, $cbm_prodid, $rec_date, $group, $subclass);
		redirect('cbm_daily_rec/'.$cbm_id.'/'.$checkagain->id.'/'.date('U', strtotime($rec_date)).'/1');
	}
	public function cbm_forecast(){
		if(($this->vendorId > 30000 and $this->vendorId < 40000) or $this->adminapp == 1){
			$data['cbm_name'] = $this->name;
			$data['seldate'] = date('Y-m-d');
			$data['prod'] = $this->CBM_salesvol_model->getproduct_cbmgrouped_nosum($this->vendorId);
			$this->global['pageTitle'] = 'RAWR : Forecast';
			$this->loadViews("CBM_salesvol/forecast", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	public function cbm_js_date_forecast($unix, $sel){
		$unix = $unix/1000;
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
		$form_day = date('d', $next_date);
		$check_forecast_mode = $this->CBM_salesvol_model->check_forecast_mode($this->vendorId, $sel);
		if($check_forecast_mode->forecast_mode == 1){
			$prod_name = $this->CBM_salesvol_model->getproduct_cbmbyid($sel);
			$a = '
					<div class="col-md-12">
						<div class="callout callout-success">
							<h4>Forecast of '.$prod_name->prod_name.'</h4>
							<p></p>
						</div>
					</div>
				';
			$a .= '<form action="'.base_url().'cbm_js_forecast_form" method="POST">';
			$a .= '<input name="base_date" type="hidden" value="'.$base_date.'">';
			$a .= '<input name="cbm_prodid" type="hidden" value="'.$sel.'">';
			for ($x = 1; $x <= $form_day; $x++){
				if($x < 10){
					$form_date = $base_date.'-0'.$x;
				}else{
					$form_date = $base_date.'-'.$x;
				}
				$getforecast = $this->CBM_salesvol_model->getforecast($this->vendorId, $sel, $form_date);
				if(!empty($getforecast)){
					$val = $getforecast->set_num;
				}else{
					$val = 0;
				}
				$a .= '
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="forecast['.$x.']">'.date('l d-m-Y', strtotime($form_date)).'</label>
						</div>
					</div>
					<div class="col-md-6 form-group">
						<input for="forecast['.$x.']" type="number" name="forecast['.$x.']" step="0.01" class="form-control" value="'.$val.'" required/>
					</div>';
			}
			$a .= '<div class="box-footer"><div class="col-md-12 text-center"><button class="btn btn-primary btn">Submit</button></div></div>
						</form>';
			echo $a;
		}elseif($check_forecast_mode->forecast_mode == 2){
			$prod_name = $this->CBM_salesvol_model->getproduct_cbmbyid($sel);
			$forecast_subclass = $this->CBM_salesvol_model->check_prod_subclassing_forecast($this->vendorId, $prod_name->prod_id);
			if(!empty($forecast_subclass)){
				foreach($forecast_subclass as $record){
					$a = '
							<div class="col-md-12">
								<div class="callout callout-success">
									<h4>Forecast of '.$prod_name->prod_name.'</h4>
									<p>Sub Class '.$record->subclass.'</p>
								</div>
							</div>
						';
					$a .= '<form action="'.base_url().'cbm_js_forecast_form" method="POST">';
					$a .= '<input name="base_date" type="hidden" value="'.$base_date.'">';
					$a .= '<input name="cbm_prodid" type="hidden" value="'.$record->id.'">';
					for ($x = 1; $x <= $form_day; $x++){
						if($x < 10){
							$form_date = $base_date.'-0'.$x;
						}else{
							$form_date = $base_date.'-'.$x;
						}
						$getforecast = $this->CBM_salesvol_model->getforecast($this->vendorId, $record->id, $form_date);
						if(!empty($getforecast)){
							$val = $getforecast->set_num;
						}else{
							$val = 0;
						}
						$a .= '
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label for="forecast['.$x.']">'.date('l d-m-Y', strtotime($form_date)).'</label>
								</div>
							</div>
							<div class="col-md-6 form-group">
								<input for="forecast['.$x.']" type="number" name="forecast['.$x.']" step="0.01" class="form-control" value="'.$val.'" required/>
							</div>';
					}
					$a .= '<div class="box-footer"><div class="col-md-12 text-center"><button class="btn btn-primary btn">Submit</button></div></div>
						</form>';
					echo $a;
				}
			}
		}
	}
	public function cbm_js_forecast_form(){
		$forecast = $this->input->post('forecast');
		$base_date = $this->input->post('base_date');
		$cbm_prodid = $this->input->post('cbm_prodid');
		if(!empty($forecast)){
			$a = 1;
			foreach($forecast as $rec){
				if($a < 10){
					$form_date = $base_date.'-0'.$a;
				}else{
					$form_date = $base_date.'-'.$a;
				}
				$forecastinfo = array(
						'cbm_id' => $this->vendorId,
						'cbm_prodid' => $cbm_prodid,
						'form_date' => $form_date,
						'set_num' => $rec
					);
				$check = $this->CBM_salesvol_model->getforecast($this->vendorId, $cbm_prodid, $form_date);
				if(!empty($check)){
					$this->CBM_salesvol_model->update_forecast($this->vendorId, $cbm_prodid, $form_date, $forecastinfo);
				}else{
					$this->CBM_salesvol_model->insert_forecast($forecastinfo);
				}
				$a++;
			}
		}
		redirect('cbm_forecast');
	}
	public function cbm_past_sales(){
		if(($this->vendorId > 30000 and $this->vendorId < 40000) or $this->adminapp == 1){
			$data['cbm_name'] = $this->name;
			$data['seldate'] = date('Y-m-d');
			$data['prod'] = $this->CBM_salesvol_model->getproduct_cbm($this->vendorId);
			$this->global['pageTitle'] = 'RAWR : Past Volume';
			$this->loadViews("CBM_salesvol/past_sales", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	public function cbm_js_date_pastvol($unix, $sel){
		$unix = $unix/1000;
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
		$show_date = date('F Y', $next_date);
		$form_day = date('d', $next_date);
		$prod_name = $this->CBM_salesvol_model->getproduct_cbmbyid($sel);
		$a = '
				<div class="col-md-12">
					<div class="callout callout-success">
						<h4>Actual Sales Volume of '.$prod_name->prod_name.' Subclass: '.$prod_name->subclass.' at '.$show_date.'</h4>
					</div>
				</div>
			';
		$a .= '<form action="'.base_url().'cbm_js_pastvol_form" method="POST">';
		$a .= '<input name="base_date" type="hidden" value="'.$base_date.'">';
		$a .= '<input name="cbm_prodid" type="hidden" value="'.$sel.'">';
		for ($x = 1; $x <= $form_day; $x++){
			if($x < 10){
				$form_date = $base_date.'-0'.$x;
			}else{
				$form_date = $base_date.'-'.$x;
			}
			$getpastvol = $this->CBM_salesvol_model->cbm_check_lastyearreport($this->vendorId, $sel, $form_date);
			if(!empty($getpastvol)){
				$val = $getpastvol->vol;
			}else{
				$val = 0;
			}
			$a .= '
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
						<label for="pastvol['.$x.']">'.date('l d-m-Y', strtotime($form_date)).'</label>
					</div>
				</div>
				<div class="col-md-6 form-group">
					<input for="pastvol['.$x.']" type="number" name="pastvol['.$x.']" step="0.01" class="form-control" value="'.$val.'" required/>
				</div>';
		}
		$a .= '<input type="hidden" name="group" value="'.$prod_name->group.'">';
		$a .= '<input type="hidden" name="subclass" value="'.$prod_name->subclass.'">';
		$a .= '<div class="box-footer"><div class="col-md-12 text-center"><button class="btn btn-primary btn">Submit</button></div></div>
						</form>';
		echo $a;
	}
	public function cbm_js_pastvol_form(){
		$pastvol = $this->input->post('pastvol');
		$base_date = $this->input->post('base_date');
		$cbm_prodid = $this->input->post('cbm_prodid');
		$group = $this->input->post('group');
		$subclass = $this->input->post('subclass');
		if(!empty($pastvol)){
			$a = 1;
			foreach($pastvol as $rec){
				if($a < 10){
					$form_date = $base_date.'-0'.$a;
				}else{
					$form_date = $base_date.'-'.$a;
				}
				$salesinfo = array(
						'cbm_id' => $this->vendorId,
						'cbm_prodid' => $cbm_prodid,
						'rec_date' => $form_date,
						'group'=>$group,
						'subclass'=>$subclass,
						'vol' => $rec
					);
				$check = $this->CBM_salesvol_model->cbm_check_dailyreport($this->vendorId, $cbm_prodid, $form_date, $group, $subclass);
				if(!empty($check)){
					$this->CBM_salesvol_model->update_cbm_input_past($this->vendorId, $cbm_prodid, $form_date, $salesinfo);
				}else{
					$this->CBM_salesvol_model->cbm_input_daily($salesinfo);
				}
				$a++;
			}
		}
		redirect('cbm_past_sales');
	}
	public function cbm_dashboard_chart(){
		$data['prod_name'] = '';
		$this->load->view('CBM_salesvol/chart_sales', $data);
	}
	public function cbm_factory_sel(){
		if(($this->vendorId > 30000 and $this->vendorId < 40000) or $this->adminapp == 1){
			$getallCBM = $this->CBM_salesvol_model->getallCBM();
			if(!empty($getallCBM)){
				echo '<option value=""></option>';
				foreach($getallCBM as $record){
					echo '<option value="'.$record->NIK.'">'.$record->uName.'</option>';
				}
			}
		}
	}
	public function cbm_prod_sel($cbm_id){
		$getprod = $this->CBM_salesvol_model->getproduct_cbmgrouped($cbm_id);
		if(!empty($getprod)){
			echo '<option value=""></option>';
			foreach($getprod as $record){
				echo '<option value="'.$record->id.'">'.$record->prod_name.'</option>';
			}
		}
	}
	public function cbm_view_chart($unix, $cbm_id, $cbm_prodid){
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
	public function cbm_user_data(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->CBM_salesvol_model->get_cbm_user_data_count($searchText);
		$returns = $this->paginationCompress ( "cbm_user_data/", $count, 10 );
		$data['user_data'] = $this->CBM_salesvol_model->get_cbm_user_data($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : CBM User';
		$this->loadViews("CBM_salesvol/user_data", $this->global, $data, NULL);
	}
	public function cbm_add_new_user(){
		if($this->vendorId == 30001 or $this->adminapp == 1){
			$getnew_NIK = $this->CBM_salesvol_model->cbm_get_new_user();
			$cbm_user = $this->input->post('cbm_user');
			$userinfo = array(
					'uName'=>$cbm_user,
					'uPassword'=>'e10adc3949ba59abbe56e057f20f883e',
					'NIK'=>$getnew_NIK
				);
			$this->CBM_salesvol_model->cbm_add_new_user($userinfo);
			redirect('cbm_user_data');
		}else{
			$this->loadThis();
		}
	}
	public function cbm_edit_user(){
		if($this->vendorId == 30001 or $this->adminapp == 1){
			$act = $this->input->post('act');
			$id = $this->input->post('id');
			$cbm_user = $this->input->post('cbm_user');
			if($act == 2){
				$prodinfo = array('uFlag'=>0);
			}elseif($act == 1){
				$prodinfo = array('uName'=>$cbm_user);
			}
			$this->CBM_salesvol_model->cbm_edit_user($prodinfo, $id);
			redirect('cbm_user_data');
		}else{
			$this->loadThis();
		}
	}
	public function cbm_product_setting(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->CBM_salesvol_model->cbm_product_setting_count($searchText);
		$returns = $this->paginationCompress ( "cbm_product_setting/", $count, 10 );
		$data['prod_data'] = $this->CBM_salesvol_model->cbm_product_setting($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : CBM Product';
		$this->loadViews("CBM_salesvol/prod_data", $this->global, $data, NULL);
	}
	public function cbm_add_new_prod(){
		$cbm_prod = $this->input->post('cbm_prod');
		$prodinfo = array(
				'prod_name'=>$cbm_prod
			);
		$this->CBM_salesvol_model->cbm_add_new_prod($prodinfo);
		redirect('cbm_product_setting');
	}
	public function cbm_edit_prod(){
		$act = $this->input->post('act');
		$id = $this->input->post('id');
		$prod_name = $this->input->post('cbm_prod');
		$unit = $this->input->post('cbm_unit');
		if($act == 2){
			$prodinfo = array('isvalid'=>0);
		}elseif($act == 1){
			$prodinfo = array('prod_name'=>$prod_name, 'unit'=>$unit);
		}
		$this->CBM_salesvol_model->cbm_edit_prod($prodinfo, $id);
		redirect('cbm_product_setting');
	}
	public function cbm_used_product(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->CBM_salesvol_model->cbm_used_product_count($this->vendorId, $searchText);
		$returns = $this->paginationCompress ( "cbm_used_product/", $count, 10 );
		$data['prod_data'] = $this->CBM_salesvol_model->cbm_used_product($this->vendorId, $searchText, $returns["page"], $returns["segment"]);
		$data['sum_data'] = $this->CBM_salesvol_model->cbm_select_sum_target();
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$data['prod'] = $this->CBM_salesvol_model->cbm_allproduct();
		$data['grup'] = $this->CBM_salesvol_model->getprodgroup();
		$data['clas'] = $this->CBM_salesvol_model->getprodsubclass();
		$this->global['pageTitle'] = 'RAWR : CBM Product';
		$this->loadViews("CBM_salesvol/used_data", $this->global, $data, NULL);
	}
	public function cbm_add_new_used(){
		$cbm_prod = $this->input->post('prod_id');
		$prodinfo = array(
				'prod_name'=>$cbm_prod,
				'cbm_id'=>$this->vendorId
			);
		$this->CBM_salesvol_model->cbm_add_new_used($prodinfo);
		redirect('cbm_used_product');
	}
	public function cbm_del_used_prod(){
		$main_id = $this->input->post('main_id');
		$isum = $this->input->post('isum');
		$sum_to = $this->input->post('sum_to');
		$act = $this->input->post('act');
		$group = $this->input->post('group');
		$subclass = $this->input->post('subclass');
		$forecast_mode = $this->input->post('forecast_mode');
		$prod_id = $this->input->post('prod_id');
		if($act == 1){
			$prodinfo = array(
				'isvalid'=>0
			);
		}
		if($act == 2){
			if($group != 'Default' and $subclass != 'Default'){
				$group = 'Default';
			}
			$prodinfo = array(
				'group'=>$group,
				'subclass'=>$subclass,
				'isum'=>$isum,
				'sum_to'=>$sum_to
			);
			$forecast = array('forecast_mode'=>$forecast_mode);
			$this->CBM_salesvol_model->cbm_forecast_used_prod($forecast, $prod_id, $this->vendorId);
		}
		$this->CBM_salesvol_model->cbm_edit_used_prod($prodinfo, $main_id);
		redirect('cbm_used_product');
	}
	function cbm_allchart(){
		$data['list'] = $this->CBM_salesvol_model->get_cbm_allchart();
		$this->global['pageTitle'] = 'RAWR : All Chart';
		$this->loadViews("CBM_salesvol/allchart", $this->global, $data, NULL);
	}
	function test1(){
		$list = $this->CBM_salesvol_model->get_cbm_allchart();
		foreach($list as $lll){
			echo var_dump($lll);
			echo '<br>';
		}
		echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>';
		$list = $this->CBM_salesvol_model->get_cbm_allchart2();
		foreach($list as $lll){
			echo var_dump($lll);
			echo '<br>';
		}
		
	}
	public function srmi_input_data(){
		$data['srmi_bu_member'] = $this->CBM_salesvol_model->get_srmi_groupmember();
		$data['seldate'] = date('Y-m-d');
		$this->global['pageTitle'] = 'RAWR : SRMI Daily Report';
		$this->loadViews("CBM_salesvol/srmi_daily", $this->global, $data, NULL);
	}
	public function cbm_ajax_srmi($linker, $rec_date){
		header("Content-type: text/json");
		$get_group_vol = $this->CBM_salesvol_model->get_group_vol($linker, $rec_date);
		$breakeven = 0;
		$order = 0;
		$actual = 0;
		$up_or_edit = 0;
		if(!empty($get_group_vol)){
			$breakeven = $get_group_vol->breakeven;
			$order = $get_group_vol->order_srmi;
			$actual = $get_group_vol->actual;
			$up_or_edit = 1;
		}
		$point = array(
				'breakeven'=>$breakeven,
				'order'=>$order,
				'actual'=>$actual,
				'up_or_edit'=>$up_or_edit
			);
		echo json_encode($point);
	}
	public function srmi_daily_record(){
		$id_area = $this->input->post('id_area');
		$get_bu_data = $this->CBM_salesvol_model->get_bu_data($id_area);
		$record_date = $this->input->post('record_date');
		$breakeven = $this->input->post('breakeven');
		$order = $this->input->post('order');
		$actual = $this->input->post('actual');
		$up_or_edit = $this->input->post('up_or_edit');
		$srmi_vol = array(
				'record_date'=>$record_date,
				'breakeven'=>$breakeven,
				'order_srmi'=>$order,
				'actual'=>$actual,
				'id_area'=>$id_area,
				'bu_srmi'=>$get_bu_data->bu_srmi
			);
		if($up_or_edit == 0){
			$add_vol = $this->CBM_salesvol_model->add_srmi_daily_vol($srmi_vol);
		}else{
			$edit_vol = $this->CBM_salesvol_model->edit_srmi_daily_vol($srmi_vol, $record_date, $id_area);
		}
		redirect('srmi_input_data');
	}
	public function srmi_all_chart(){
		$get_srmi_group = $this->CBM_salesvol_model->get_srmi_group();
		$data['list'] = $get_srmi_group;
		$this->global['pageTitle'] = 'RAWR : All SRMI Chart';
		$this->loadViews("CBM_salesvol/srmi_allchart", $this->global, $data, NULL);
	}
	public function srmi_view_chart($unix, $group){
		$this->load->model('CBM_salesvol_model');
		$data['boxid1'] = $group.'1';
		$data['boxid2'] = $group.'2';
		$data['CBM_unit'] = 'M3';
		$unix = $unix/1000;
		$form_day = date('Y-m-d', $unix);
		$data['sesdate'] = $group.'/'.$form_day;
		$cat_axis = '';
		$break_even_axis = '';
		$order_axis = '';
		$actual_axis = '';
		$get_all_srmi_groupmember = $this->CBM_salesvol_model->get_all_srmi_groupmember($group);
		if(!empty($get_all_srmi_groupmember)){
			foreach($get_all_srmi_groupmember as $record){
				$cat_axis .= '"'.$record->plant_srmi.'", ';
				$get_srmi_data = $this->CBM_salesvol_model->get_srmi_data($record->id, $form_day);
				if(!empty($get_srmi_data)){
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
		$get_sum_srmi_bu_breakeven = $this->CBM_salesvol_model->get_sum_srmi_bu_breakeven($group, $form_day);
		if(!empty($get_sum_srmi_bu_breakeven)){
			if($get_sum_srmi_bu_breakeven->sum_break_event > 0){
				$sum_breakeven = $get_sum_srmi_bu_breakeven->sum_break_event;
			}else{
				$sum_breakeven = 0;
			}
		}else{
			$sum_breakeven = 0;
		}
		$get_sum_srmi_bu_order = $this->CBM_salesvol_model->get_sum_srmi_bu_order($group, $form_day);
		if(!empty($get_sum_srmi_bu_order)){
			if($get_sum_srmi_bu_order->sum_order > 0){
				$sum_order = $get_sum_srmi_bu_order->sum_order;
			}else{
				$sum_order = 0;
			}
		}else{
			$sum_order = 0;
		}
		$get_sum_srmi_bu_actual = $this->CBM_salesvol_model->get_sum_srmi_bu_actual($group, $form_day);
		if(!empty($get_sum_srmi_bu_actual)){
			if($get_sum_srmi_bu_actual->sum_actual > 0){
				$sum_actual = $get_sum_srmi_bu_actual->sum_actual;
			}else{
				$sum_actual = 0;
			}
		}else{
			$sum_actual = 0;
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
	public function get_srmi_mtd($unix){
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
	public function srmi_all_chartv2(){
		$get_srmi_group = $this->CBM_salesvol_model->get_srmi_group();
		$data['list'] = $get_srmi_group;
		$this->global['pageTitle'] = 'RAWR : All SRMI Chart v2';
		$this->loadViews("CBM_salesvol/srmi_allchartv2", $this->global, $data, NULL);
	}
	public function srmi_view_chartv2($unix, $unix2, $group){
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
	public function get_srmi_mtdv2($unix){
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

	function excel_srmi(){
		$data['import'] = $this->CBM_salesvol_model->data_excel();
		
		$this->global['pageTitle'] = 'RAWR : Daily Report';
		$this->loadViews("view", $this->global, $data, NULL);
	}

	function form_srmi(){
		$data = array(); 
		if(isset($_POST['preview'])){ 
			$upload = $this->CBM_salesvol_model->upload_excel($this->filename);
			
			if($upload['result'] == "success"){ 
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				$data['sheet'] = $sheet; 
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		}
		$this->global['pageTitle'] = 'RAWR : Daily Report';
		$this->loadViews("form", $this->global, $data, NULL);
	}

	function import_srmi(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$datenow = $this->input->post('record_date');

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				$id_area = $row['B'];
				$srmi_vol = array(
					'record_date' => $datenow,
					'bu_srmi'=>$row['A'],
					'id_area'=>$row['B'], 
					'breakeven'=>$row['D'], 
					'order_srmi'=>$row['E'], 
					'actual'=>$row['F'], 
				);
				$up_or_edit = $this->CBM_salesvol_model->check_srmi_data($id_area, $datenow);
				if(empty($up_or_edit)){
					$add_vol = $this->CBM_salesvol_model->add_srmi_daily_vol($srmi_vol);
				}else{
					$edit_vol = $this->CBM_salesvol_model->edit_srmi_daily_vol($srmi_vol, $datenow, $id_area);
				}
			}
			
			$numrow++; 
		}
		redirect("excel_srmi"); 
	}

}