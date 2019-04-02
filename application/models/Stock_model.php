<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Stock_model extends CI_Model
{

//====================================GET OPTION ON SUBMIT FORM=================================	
    function get_mortar()
	{
        $this->db->select('*');
        $this->db->from('stock_mortar_conf');
        $this->db->where('parent', 1);
        $this->db->order_by('id', 'DESC');
		
		$query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }	
    
    function get_brand()
	{
		
        $this->db->select('*');
        $this->db->from('stock_mortar_conf');
        $this->db->where('parent', 2);
        $this->db->order_by('id', 'DESC');
		
		$query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function get_weight()
	{
        $this->db->select('*');
        $this->db->from('stock_mortar_conf');
        $this->db->where('parent', 3);
        $this->db->order_by('id', 'DESC');
		
		$query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
//=================================================================================	



//====================================STOCK IN=====================================
   function getstockCount($fromDate, $toDate){
		$this->db->select('*');
		$this->db->from('stock_mortar');
		 $this->db->where('isvalid', 1);
		if(!empty($fromDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getstock($fromDate, $toDate){
        $this->db->select('*');
		$this->db->from('stock_mortar');
		 $this->db->where('isvalid', 1);
		if(!empty($fromDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
    
	function addstock($stockinfo){
		$this->db->trans_start();
		$this->db->insert('stock_mortar', $stockinfo);
		$insert_id = $this->db->insert_id();
		$this->db->order_by('timestamp', 'DESC');
		$this->db->trans_complete();
		return $insert_id;
	} 
	
	function updatestock($stockinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('stock_mortar', $stockinfo);
		return TRUE;
	}
	
	function getuserinfo($nik){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('NIK', $nik);
        $this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
	}
	
//=============================================================================	



//====================================STOCK OUT================================
	function getstockoutCount($fromDate, $toDate){
		$this->db->select('*');
		$this->db->from('stock_mortar_out');
		$this->db->where('isvalid', 1);
		if(!empty($fromDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getstockout($fromDate, $toDate){
        $this->db->select('*');
        $this->db->from('stock_mortar_out');
		$this->db->where('isvalid', 1);
		if(!empty($fromDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
  
	function addstockout($stockinfo){
		$this->db->trans_start();
		$this->db->insert('stock_mortar_out', $stockinfo);
		$insert_id = $this->db->insert_id();
		$this->db->order_by('timestamp', 'DESC');
		$this->db->trans_complete();
		return $insert_id;
	} 
	
	function updatestockout($stockinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('stock_mortar_out', $stockinfo);
		return TRUE;
	}
//=============================================================================	



//====================================SUM STOCK IN================================
	function sumbag(){
		$this->db->select('*');
		$this->db->select_sum('bag');
		$this->db->where('isvalid', 1);
		$this->db->limit(1);
		$result = $this->db->get('stock_mortar')->row();  
		return $result->bag;
	}
	
	function sumbagplas(){
		$this->db->select('*');
		$this->db->select_sum('bag');
		$this->db->where('isvalid', 1);
		$this->db->group_by('type_mortar');
		$this->db->limit(1);
		$result = $this->db->get('stock_mortar')->row();  
		return $result->bag;
	}
//=============================================================================
	
	
	
//====================================SUM STOCK OUT================================
	function sumbagout(){
		$this->db->select('*');
		$this->db->select_sum('bag');
		$this->db->where('isvalid', 1);
		$this->db->limit(1);
		$result = $this->db->get('stock_mortar_out')->row();  
		return $result->bag;
	}
	
	function sumbagthinout(){
		$this->db->select('*');
		$this->db->select_sum('bag');
		$this->db->where('isvalid', 1);
		$this->db->group_by('type_mortar');
		$this->db->limit(1);
		$result = $this->db->get('stock_mortar_out')->row();  
		return $result->bag;
	}
//=============================================================================	



//====================================VISCOSITY================================
	function getviscoCount($fromDate, $toDate){
		$this->db->select('*');
		$this->db->from('stock_visco');
		
		if(!empty($fromDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}

		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	
	}
	
	function getvisco($fromDate, $toDate, $page, $segment){
        $this->db->select('*');
		$this->db->from('stock_visco');
		if(!empty($fromDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
    
	function addvisco($viscoinfo){
		$this->db->trans_start();
		$this->db->insert('stock_visco', $viscoinfo);
		$insert_id = $this->db->insert_id();
		$this->db->order_by('timestamp', 'DESC');
		$this->db->trans_complete();
		return $insert_id;
	}
	
	function updatevisco($viscoinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('stock_visco', $viscoinfo);
		return TRUE;
	}
//=============================================================================	
	function get_mortar_group(){
		$this->db->select('*');
		$this->db->from('stock_mortar');
		$this->db->where('isvalid', 1);
		$this->db->group_by('type_mortar');
		$this->db->group_by('brand');
		$this->db->group_by('bag_weight');
		$query = $this->db->get();
		return $query;
	}
	function get_all_stock_in($type_mortar, $brand, $bag_weight){
		$this->db->select('sum(bag) as tot');
		$this->db->from('stock_mortar');
		$this->db->where('isvalid', 1);
		$this->db->where('status_app', 1);
		$this->db->where('type_mortar', $type_mortar);
		$this->db->where('brand', $brand);
		$this->db->where('bag_weight', $bag_weight);
		$query = $this->db->get();
		$res = $query->row();
		return $res->tot;
	}
	function get_all_stock_out($type_mortar, $brand, $bag_weight){
		$this->db->select('sum(bag) as tot');
		$this->db->from('stock_mortar_out');
		$this->db->where('isvalid', 1);
		$this->db->where('status_app', 1);
		$this->db->where('type_mortar', $type_mortar);
		$this->db->where('brand', $brand);
		$this->db->where('bag_weight', $bag_weight);
		$query = $this->db->get();
		$res = $query->row();
		return $res->tot;
	}
}

  
