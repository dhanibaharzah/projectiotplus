<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_mortar_model extends CI_Model
{
	//==========================================================C E M E N T====================================================
	public function getcement($fromDate, $toDate){
			$this->db2 = $this->load->database('codesysdb', TRUE); //nama database
			$this->db2->select('*'); // * berarti semua kolom 
			$this->db2->from('mo_cem'); //nama tabel
			$this->db2->order_by('timestamp', 'desc');
            if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			$query = $this->db2->get();
			return $query->result();
		}
		
		function cementCount($fromDate, $toDate){ //tambahain , $toDate nanti
		
			$this->db2 = $this->load->database('codesysdb', TRUE);
			$this->db2->select('*');
			$this->db2->from('mo_cem');
				if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			$this->db2->order_by('timestamp', 'DESC');
			$query = $this->db2->get();
			return $query->num_rows();
			}
		
		function cement($fromDate, $toDate, $page, $segment){ //tambahain , $toDate nanti
			 $this->db2 = $this->load->database('codesysdb', TRUE);
			 $this->db2->select('*');
			 $this->db2->from('mo_cem');
			 $this->db2->order_by('timestamp', 'DESC'); 
			 if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			 $this->db2->limit($page, $segment);
			 $query = $this->db2->get();
			 $result = $query->result();        
			 return $result;
		}
	//==========================================================B A T C H======================================================
		public function getbatch($fromDate, $toDate){
			$this->db2 = $this->load->database('codesysdb', TRUE); //nama database
			$this->db2->select('*'); // * berarti semua kolom 
			$this->db2->from('mortar_batch'); //nama tabel
			$this->db2->order_by('timestamp', 'desc');
			if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			$query = $this->db2->get();
			return $query->result();
		}
		
		function batchCount($fromDate, $toDate){ //tambahain , $toDate nanti
			$this->db2 = $this->load->database('codesysdb', TRUE);
			$this->db2->select('*');
			$this->db2->from('mortar_batch');
			if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			$this->db2->order_by('timestamp', 'desc');
			$query = $this->db2->get();
			return $query->num_rows();
		}
		
		function batch($fromDate, $toDate, $page, $segment){ //tambahain , $toDate nanti
			 $this->db2 = $this->load->database('codesysdb', TRUE);
			 $this->db2->select('*');
			 $this->db2->from('mortar_batch');
			 $this->db2->order_by('timestamp', 'DESC');
			 if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			 $this->db2->limit($page, $segment);
			 $query = $this->db2->get();
			 $result = $query->result();        
			 return $result;
		}
	//==========================================================L I M E==========================================================	
		public function getlime($fromDate, $toDate){
			$this->db2 = $this->load->database('codesysdb', TRUE); //nama database
			$this->db2->select('*'); // * berarti semua kolom 
			$this->db2->from('mo_lime'); //nama tabel
			$this->db2->order_by('timestamp', 'desc');
			if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			$query = $this->db2->get();
			return $query->result();
		}
		
		function limeCount($fromDate, $toDate){ //tambahain , $toDate nanti
			$this->db2 = $this->load->database('codesysdb', TRUE);
			$this->db2->select('*');
			$this->db2->from('mo_lime');
			if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			$this->db2->order_by('timestamp', 'desc');
			$query = $this->db2->get();
			return $query->num_rows();
		}
		
		function lime($fromDate, $toDate, $page, $segment){ //tambahain , $toDate nanti
			 $this->db2 = $this->load->database('codesysdb', TRUE);
			 $this->db2->select('*');
			 $this->db2->from('mo_lime');
			 $this->db2->order_by('timestamp', 'DESC');
			  if(!empty($fromDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
					$this->db2->where($likeCriteria);
				}
				if(!empty($toDate)) {
					$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
					$this->db2->where($likeCriteria);
				}
			 $this->db2->limit($page, $segment);
			 $query = $this->db2->get();
			 $result = $query->result();        
			 return $result;
		}
}
