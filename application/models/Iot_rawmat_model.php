<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_rawmat_model extends CI_Model{
	function sqlbc($no, $toDate){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('bc_12');
		$likeCriteria = "timestamp <= '".$toDate."'";
		$this->db2->where($likeCriteria);
		$this->db2->where('cflow', $no);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function amperebm(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('sepam');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function bm_flow(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('bc_12');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function material(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('Level_Tanki');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function iot_js_mat($toDate){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('Level_Tanki');
		$likeCriteria = "timestamp <= '".$toDate."'";
		$this->db2->where($likeCriteria);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function iot_js_seal_weight($unix){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('seal');
		$likeCriteria = "timestamp <= '".$unix."'";
		$this->db2->where($likeCriteria);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(50);
		$query = $this->db2->get();
		return $query->result();
	}
	function iot_js_seal_slush($unix){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('ws_sludge_slurry');
		$likeCriteria = "timestamp <= '".$unix."'";
		$this->db2->where($likeCriteria);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(50);
		$query = $this->db2->get();
		return $query->result();
	}
	function iot_js_seal_retslu($unix){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('ws_return_slurry');
		$likeCriteria = "timestamp <= '".$unix."'";
		$this->db2->where($likeCriteria);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(50);
		$query = $this->db2->get();
		return $query->result();
	}
	function load_iot_setting($var){
		$this->db->select('*');
		$this->db->from('iot_setting');
		$this->db->where('tag', $var);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function get_ballmill_daily_data($start, $endd){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('timestamp, s2a, s3a');
		$this->db2->from('sepam');
		$whereclause = 'timestamp >= "'.$start.'" and timestamp < "'.$endd.'"';
		$this->db2->where($whereclause);
		$this->db2->order_by('timestamp', 'asc');
		$query = $this->db2->get();
		return $query->result();
	}
	function check_run_hour_data($date){
		$this->db->select('*');
		$this->db->from('machine_duration');
		$this->db->where('rec_date', $date);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function update_run_hour($run_data, $recorded_date){
		$this->db->where('rec_date', $recorded_date);
		$this->db->update('machine_duration', $run_data);
		return TRUE;
	}
	function insert_run_hour($run_data){
		$this->db->trans_start();
		$this->db->insert('machine_duration', $run_data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function machine_run($start, $end){
		$this->db->select('*');
		$this->db->from('machine_duration');
		$this->db->where('(rec_date >= "'.$start.'" and rec_date < "'.$end.'" )');
		$this->db->order_by('rec_date', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	function get_ballmill_feeder_daily_data($start, $endd){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('timestamp, cuwd as water_flow, cflow as bm, totalflow as encoder, freq as sand_flow');
		$this->db2->from('bc_12');
		$whereclause = 'timestamp >= "'.$start.'" and timestamp < "'.$endd.'"';
		$this->db2->where($whereclause);
		$this->db2->order_by('timestamp', 'asc');
		$query = $this->db2->get();
		return $query->result();
	}
}

  
