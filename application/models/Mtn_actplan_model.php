<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mtn_actplan_model extends CI_Model{
	public function mtn_actplanCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('action_plan');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (ac_title LIKE '%$likes%' or ac_obj LIKE '%$likes%' or pic LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function mtn_actplan($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('action_plan');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (ac_title LIKE '%$likes%' or ac_obj LIKE '%$likes%' or pic LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		return $query->result();
	}
	public function add_actplan($acinfo){
		$this->db->trans_start();
		$this->db->insert('action_plan', $acinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	public function edit_actplan($id, $acinfo){
		$this->db->where('id', $id);
		$this->db->update('action_plan', $acinfo);
		return TRUE;
	}
	public function get_actplan_main($id){
		$this->db->select('*');
		$this->db->from('action_plan');
		$this->db->where('id',$id);
		$this->db->where('isvalid',1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	public function get_actplan_step($id){
		$this->db->select('*');
		$this->db->from('action_plan_step');
		$this->db->where('ac_id',$id);
		$this->db->where('isvalid',1);
		$this->db->order_by('phase', 'ASC');
		$this->db->order_by('start_date', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function get_actplan_last_phase($id){
		$this->db->select('*');
		$this->db->from('action_plan_step');
		$this->db->where('ac_id',$id);
		$this->db->where('isvalid',1);
		$this->db->order_by('phase','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		if(empty($result)){
			return 0;
		}else{
			return $result->phase;
		}
	}
	public function add_actplan_step($actaskinfo){
		$this->db->trans_start();
		$this->db->insert('action_plan_step', $actaskinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	public function edit_actplan_step($id, $actaskinfo){
		$this->db->where('id', $id);
		$this->db->update('action_plan_step', $actaskinfo);
		return TRUE;
	}
	public function edit_actplan_allstep($phase, $actaskinfo){
		$this->db->where('phase', $phase);
		$this->db->update('action_plan_step', $actaskinfo);
		return TRUE;
	}
	public function mtn_actplan_getstart($ac_id, $phase){
		$this->db->select('MIN(start_date) as start_d');
		$this->db->from('action_plan_step');
		$this->db->where('ac_id',$ac_id);
		$this->db->where('phase_id',1);
		$this->db->where('phase',$phase);
		$this->db->where('isvalid',1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->start_d;
	}
	public function mtn_actplan_getend($ac_id, $phase){
		$this->db->select('MAX(end_date) as end_d');
		$this->db->from('action_plan_step');
		$this->db->where('ac_id',$ac_id);
		$this->db->where('phase_id',1);
		$this->db->where('phase',$phase);
		$this->db->where('isvalid',1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->end_d;
	}
	public function mtn_actplan_getprog($ac_id, $phase){
		$this->db->select('*');
		$this->db->from('action_plan_step');
		$this->db->where('ac_id',$ac_id);
		$this->db->where('phase_id',1);
		$this->db->where('phase',$phase);
		$this->db->where('isvalid',1);
		$query = $this->db->get();
		$result = $query->result();
		$total = $query->num_rows();
		$prog = 0;
		if(!empty($result)){
			foreach($result as $rec){
				$prog = $prog + $rec->ac_progress;
			}
		}
		if($total > 0){
			return $prog/$total;
		}else{
			return 0;
		}
	}
	public function mtn_actplan_getallprog($ac_id){
		$this->db->select('*');
		$this->db->from('action_plan_step');
		$this->db->where('ac_id',$ac_id);
		$this->db->where('phase_id',1);
		$this->db->where('isvalid',1);
		$query = $this->db->get();
		$result = $query->result();
		$total = $query->num_rows();
		$prog = 0;
		if(!empty($result)){
			foreach($result as $rec){
				$prog = $prog + $rec->ac_progress;
			}
		}
		if($total > 0){
			return $prog/$total;
		}else{
			return 0;
		}
	}
	public function mtn_actplan_getalldate($ac_id){
		$this->db->select('MIN(start_date) as start_d, MAX(end_date) as end_d ');
		$this->db->from('action_plan_step');
		$this->db->where('ac_id',$ac_id);
		$this->db->where('phase_id',1);
		$this->db->where('isvalid',1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
}