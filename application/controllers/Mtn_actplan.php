<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Mtn_actplan extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('mtn_actplan_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	public function mtn_actplan(){
		$this->load->library('pagination');
		$pic = $this->input->post('uName');
		$searchtext = $this->input->post('searchtext');
		$data['searchtext'] = $searchtext;
		$count = $this->mtn_actplan_model->mtn_actplanCount($searchtext);
		$returns = $this->paginationCompress ( "mtn_actplan/", $count, 10);
		$data['actplan']= $this->mtn_actplan_model->mtn_actplan($searchtext, $returns["page"], $returns["segment"]); 
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Action Plan';
		$this->loadViews("mtn_act_plan/actplan", $this->global, $data, NULL);
	}
	public function mtn_add_actplan(){
		$pic = $this->name;
		$ac_title = $this->input->post('ac_title');
		$ac_obj = $this->input->post('ac_obj');
		$acinfo = array(
				'ac_title'=>$ac_title,
				'ac_obj'=>$ac_obj,
				'pic'=>$pic
			);
		$this->mtn_actplan_model->add_actplan($acinfo);
		redirect('mtn_actplan');
	}
	public function mtn_edit_actplan(){
		$pic = $this->input->post('pic');
		if($pic == $this->name){
			$id = $this->input->post('id');
			$ac_title = $this->input->post('ac_title');
			$ac_obj = $this->input->post('ac_obj');
			$acinfo = array(
					'ac_title'=>$ac_title,
					'ac_obj'=>$ac_obj,
					'pic'=>$pic
				);
			$this->mtn_actplan_model->edit_actplan($id, $acinfo);
			redirect('mtn_actplan');
		}else{
			$this->loadThis();
		}
	}
	public function mtn_actplan_detail($id){
		$data['actplan_main'] = $this->mtn_actplan_model->get_actplan_main($id);
		$data['actplan_step'] = $this->mtn_actplan_model->get_actplan_step($id);
		$data['last_phase'] = $this->mtn_actplan_model->get_actplan_last_phase($id);
		$this->global['pageTitle'] = 'RAWR : Action Plan Detail';
		$this->loadViews("mtn_act_plan/actplan_detail", $this->global, $data, NULL);
	}
	public function mtn_add_actplan_phase(){
		$last_phase = $this->input->post('last_phase');
		$ac_task = $this->input->post('ac_task');
		$ac_id = $this->input->post('ac_id');
		$phase = $last_phase + 1;
		$actaskinfo = array(
				'phase'=>$phase,
				'ac_task'=>$ac_task,
				'ac_id'=>$ac_id,
				'phase_id'=>2
			);
		$this->mtn_actplan_model->add_actplan_step($actaskinfo);
		redirect('mtn_actplan_detail/'.$ac_id);
	}
	public function mtn_add_actplan_task(){
		$ac_task = $this->input->post('ac_task');
		$ac_id = $this->input->post('ac_id');
		$phase = $this->input->post('phase');
		$phase_id = $this->input->post('phase_id');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$actaskinfo = array(
				'phase'=>$phase,
				'ac_task'=>$ac_task,
				'ac_id'=>$ac_id,
				'phase_id'=>$phase_id,
				'start_date'=>date('U', strtotime($start_date)),
				'end_date'=>date('U', strtotime($end_date))
			);
		$this->mtn_actplan_model->add_actplan_step($actaskinfo);
		redirect('mtn_actplan_detail/'.$ac_id);
	}
	public function mtn_edit_actplan_phase(){
		$ac_task = $this->input->post('ac_task');
		$id = $this->input->post('id');
		$ac_id = $this->input->post('ac_id');
		$actaskinfo = array(
				'ac_task'=>$ac_task
			);
		$this->mtn_actplan_model->edit_actplan_step($id, $actaskinfo);
		redirect('mtn_actplan_detail/'.$ac_id);
	}
	public function mtn_del_actplan_phase(){
		$phase = $this->input->post('phase');
		$ac_id = $this->input->post('ac_id');
		$actaskinfo = array(
				'isvalid'=>0
			);
		$this->mtn_actplan_model->edit_actplan_allstep($phase, $actaskinfo);
		redirect('mtn_actplan_detail/'.$ac_id);
	}
	public function mtn_del_actplan_task(){
		$id = $this->input->post('id');
		$ac_id = $this->input->post('ac_id');
		$actaskinfo = array(
				'isvalid'=>0
			);
		$this->mtn_actplan_model->edit_actplan_step($id, $actaskinfo);
		redirect('mtn_actplan_detail/'.$ac_id);
	}
	public function mtn_edit_actplan_task(){
		$ac_task = $this->input->post('ac_task');
		$ac_id = $this->input->post('ac_id');
		$id = $this->input->post('id');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$ac_progress = $this->input->post('ac_progress');
		$actaskinfo = array(
				'ac_task'=>$ac_task,
				'ac_progress'=>$ac_progress,
				'start_date'=>date('U', strtotime($start_date)),
				'end_date'=>date('U', strtotime($end_date))
			);
		$this->mtn_actplan_model->edit_actplan_step($id, $actaskinfo);
		redirect('mtn_actplan_detail/'.$ac_id);
	}
	public function mtn_actplan_getstart($ac_id, $phase){
		$start_date = $this->mtn_actplan_model->mtn_actplan_getstart($ac_id, $phase);
		echo '<b>'.date('d-m-Y', $start_date).'</b>';
	}
	public function mtn_actplan_getend($ac_id, $phase){
		$end_date = $this->mtn_actplan_model->mtn_actplan_getend($ac_id, $phase);
		echo '<b>'.date('d-m-Y', $end_date).'</b>';
	}
	public function mtn_actplan_getprog($ac_id, $phase){
		$prog = $this->mtn_actplan_model->mtn_actplan_getprog($ac_id, $phase);
		$a = '
			<span class="pull-right label label-primary">'.number_format($prog, 0, '.', '').'%</span><br>
			<div class="progress progress bg-gray">
				<div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="'.number_format($prog, 0, '.', '').'" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($prog, 0, '.', '').'%"></div>
			</div>';
		echo $a;	
	}
	public function mtn_actplan_getallprog($ac_id){
		$prog = $this->mtn_actplan_model->mtn_actplan_getallprog($ac_id);
		$date = $this->mtn_actplan_model->mtn_actplan_getalldate($ac_id);
		$a = '
			<h5>'.date('d-m-Y', $date->start_d).' to '.date('d-m-Y', $date->end_d).' <span class="pull-right label label-primary">'.number_format($prog, 0, '.', '').'%</span></h5>
			<div class="progress progress-xs bg-gray">
				<div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="'.number_format($prog, 0, '.', '').'" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($prog, 0, '.', '').'%"></div>
			</div>';
		echo $a;	
	}
	public function mtn_gantt(){
		$this->load->view('mtn_act_plan/gantt', NULL);
	}
}