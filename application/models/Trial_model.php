<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Trial_model extends CI_Model{
	
		public function gettrial($fromDate, $toDate){
			$this->db->select('*'); 
			$this->db->from('trial'); 
			$this->db->order_by('timestamp', 'desc');
			if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db->where($likeCriteria);
				}
			$query = $this->db->get();
			return $query->result();
		}
		
		function trialCount($fromDate, $toDate){ 
			$this->db->select('*');
			$this->db->from('trial');
			$this->db->where('isvalid', 1);
			if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db->where($likeCriteria);
				}
			$this->db->order_by('timestamp', 'desc');
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function trial($fromDate, $toDate, $page, $segment){
			 $this->db->select('*');
			 $this->db->from('trial');
			 $this->db->where('isvalid', 1);
			 $this->db->order_by('timestamp', 'DESC');
			  if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db->where($likeCriteria);
				}
			 $this->db->limit($page, $segment);
			 $query = $this->db->get();
			 $result = $query->result();        
			 return $result;
		}
		
		function update_data($update){
			$this->db->trans_start();
			$this->db->insert('trial', $update);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			return $insert_id;
		}
		
		function edit_data($update, $id){
			$this->db->where('id', $id);
			$this->db->update('trial', $update);
			return TRUE;
		}
}

?>
