<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Xtrial_model extends CI_Model{
	function workplacelistCount($search){
		$this->db->select('*');
		$this->db->from('x_workplace');
		$this->db->where('isvalid', 1);
		if(!empty($search)){
			$explode_an = explode(" ", $search);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(wp_name LIKE '%$likes%' or wp_address LIKE '%$likes%' or wp_phone LIKE '%$likes%' ) AND";
			}
			$eee = substr($uuu, 0, -3);
			$this->db->where($eee);
		}
		$this->db->order_by('wp_name', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function workplacelist($search, $page, $segment){
		$this->db->select('*');
		$this->db->from('x_workplace');
		$this->db->where('isvalid', 1);
		if(!empty($search)){
			$explode_an = explode(" ", $search);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(wp_name LIKE '%$likes%' or wp_address LIKE '%$likes%' or wp_phone LIKE '%$likes%' ) AND";
			}
			$eee = substr($uuu, 0, -3);
			$this->db->where($eee);
		}
		$this->db->order_by('wp_name', 'desc');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}
	function addworkplace($update){
		$this->db->trans_start();
		$this->db->insert('x_workplace', $update);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editworkplace($update, $id){
		$this->db->where('id', $id);
		$this->db->update('x_workplace', $update);
		return TRUE;
	}
	
	function memberlistCount($search){
		$this->db->select('*');
		$this->db->from('x_member');
		$this->db->where('isvalid', 1);
		if(!empty($search)){
			$explode_an = explode(" ", $search);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(member_name LIKE '%$likes%' or member_address LIKE '%$likes%' or member_phone LIKE '%$likes%' ) AND";
			}
			$eee = substr($uuu, 0, -3);
			$this->db->where($eee);
		}
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function memberlist($search, $page, $segment){
		$this->db->select('t1.id as id, t1.member_name as member_name, t1.member_address as member_address, t1.member_phone as member_phone, t1.jabatan as jabatan, t2.wp_name as wp_name');
		$this->db->from('x_member as t1');
		$this->db->join('x_workplace as t2', 't1.wp_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		if(!empty($search)){
			$explode_an = explode(" ", $search);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(t1.member_name LIKE '%$likes%' or t1.member_address LIKE '%$likes%' or t1.member_phone LIKE '%$likes%' or t2.wp_name LIKE '%$likes%' ) AND";
			}
			$eee = substr($uuu, 0, -3);
			$this->db->where($eee);
		}
		$this->db->order_by('t1.id', 'desc');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}
	function addmember($update){
		$this->db->trans_start();
		$this->db->insert('x_member', $update);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editmember($update, $id){
		$this->db->where('id', $id);
		$this->db->update('x_member', $update);
		return TRUE;
	}
	function get_all_comp(){
		$this->db->select('*');
		$this->db->from('x_workplace');
		$this->db->where('isvalid', 1);
		$this->db->order_by('wp_name', 'asc');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}
	function get_all_func(){
		$this->db->select('*');
		$this->db->from('x_jabatan');
		$this->db->order_by('jabatan', 'asc');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}
	function get_last_member($mem_id){
		$this->db->select('*');
		$this->db->from('x_member');
		$this->db->where('id >', $mem_id);
		$this->db->limit(1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function get_member_by_id($id){
		$this->db->select('*');
		$this->db->from('x_member');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function get_all_member(){
		$this->db->select('*');
		$this->db->from('x_member');
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function get_x_setting($tag){
		$this->db->select('*');
		$this->db->from('x_setting');
		$this->db->where('x_tag', $tag);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function get_comp_by_id($id){
		$this->db->select('*');
		$this->db->from('x_workplace');
		$this->db->where('isvalid', 1);
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->row();        
		return $result;
	}
	function get_pinj_by_memid($id){
		$this->db->select('*');
		$this->db->from('x_pinj');
		$this->db->where('isvalid', 1);
		$this->db->where('mem_id', $id);
		$this->db->where('type_pinj', 'P');
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();        
		return $result;
	}
	function get_x_survey(){
		$this->db->select('*');
		$this->db->from('x_survey');
		$this->db->where('isvalid', 1);
		$this->db->order_by('nama_survey', 'asc');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}
	function add_pinj($pinj_info){
		$this->db->trans_start();
		$this->db->insert('x_pinj', $pinj_info);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function last_pinj_id($pinj_id){
		$this->db->select('*');
		$this->db->from('x_pinj');
		$this->db->where('id >', $pinj_id);
		$this->db->where('type_pinj', 'P');
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();        
		return $result;
	}
	function add_trans($trans_info){
		$this->db->trans_start();
		$this->db->insert('x_trans', $trans_info);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function get_user_trans($mem_id){
		$this->db->select('*');
		$this->db->from('x_trans');
		$this->db->where('member_id', $mem_id);
		$this->db->order_by('id', 'desc');
		$this->db->limit(50);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function load_loan_info($pinj_id){
		$this->db->select('*');
		$this->db->from('x_pinj');
		$this->db->where('id', $pinj_id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();        
		return $result;
	}
	function load_last_pokok($pinj_id){
		$this->db->select('*');
		$this->db->from('x_trans');
		$this->db->where('id_pinj', $pinj_id);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();        
		return $result;
	}
	function edit_pinj($pinj_info, $id){
		$this->db->where('id', $id);
		$this->db->update('x_pinj', $pinj_info);
		return TRUE;
	}
	function get_user_kasbon($mem_id){
		$this->db->select('*');
		$this->db->from('x_kasbon');
		$this->db->where('member_id', $mem_id);
		$this->db->order_by('id', 'desc');
		$this->db->limit(50);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function add_kasbon($info){
		$this->db->trans_start();
		$this->db->insert('x_kasbon', $info);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edit_kasbon($kasbon_info, $id_kasbon){
		$this->db->where('id', $id_kasbon);
		$this->db->update('x_kasbon', $kasbon_info);
		return TRUE;
	}
	function pinjaman_blm_lunas(){
		$this->db->select('*');
		$this->db->from('x_pinj');
		$this->db->where('status_pinj', 0);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function kasbon_blm_lunas(){
		$this->db->select('*');
		$this->db->from('x_kasbon');
		$this->db->where('status_kas', 0);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function rep_pinjamanCount($fromDate, $toDate){
		$this->db->select('*');
		$this->db->from('x_trans as t1');
		$this->db->join('x_member as t2', 't1.member_id = t2.id');
		if(!empty($fromDate)) {
            $likeCriteria = "t1.timestamp >= '".date('Y-m-d H:i:s', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "t1.timestamp <= '".date('Y-m-d H:i:s', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$query = $this->db->get();
        return $query->num_rows();
	}
	function rep_pinjaman($fromDate, $toDate, $page, $segment){
		$this->db->select('*');
		$this->db->from('x_trans as t1');
		$this->db->join('x_member as t2', 't1.member_id = t2.id');
		if(!empty($fromDate)) {
            $likeCriteria = "t1.timestamp >= '".date('Y-m-d H:i:s', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "t1.timestamp <= '".date('Y-m-d H:i:s', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('t1.timestamp', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	function get_sum_pinjaman($fromDate, $toDate){
		$this->db->select('SUM(tarikan) as cash_out');
		$this->db->from('x_trans');
		if(!empty($fromDate)) {
            $likeCriteria = "timestamp >= '".date('Y-m-d H:i:s', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "timestamp <= '".date('Y-m-d H:i:s', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$query = $this->db->get();
        $result = $query->row();
        return $result->cash_out;
	}
	function get_sum_pinjaman_in($fromDate, $toDate){
		$this->db->select('SUM(total) as cash_in');
		$this->db->from('x_trans');
		if(!empty($fromDate)) {
            $likeCriteria = "timestamp >= '".date('Y-m-d H:i:s', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "timestamp <= '".date('Y-m-d H:i:s', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$query = $this->db->get();
        $result = $query->row();
        return $result->cash_in;
	}
	function rep_kasbonCount($fromDate, $toDate){
		$this->db->select('*');
		$this->db->from('x_kasbon as t1');
		$this->db->join('x_member as t2', 't1.member_id = t2.id');
		if(!empty($fromDate)) {
            $likeCriteria = "t1.createdat >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "t1.createdat <= '".date('Y-m-d', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('t1.createdat', 'DESC');
		$query = $this->db->get();
        return $query->num_rows();
	}
	function rep_kasbon($fromDate, $toDate, $page, $segment){
		$this->db->select('*');
		$this->db->from('x_kasbon as t1');
		$this->db->join('x_member as t2', 't1.member_id = t2.id');
		if(!empty($fromDate)) {
            $likeCriteria = "t1.createdat >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "t1.createdat < '".date('Y-m-d', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('t1.createdat', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	function get_sum_kasbon($fromDate, $toDate){
		$this->db->select('SUM(kasbon) as cash_out');
		$this->db->from('x_kasbon');
		if(!empty($fromDate)) {
            $likeCriteria = "createdat >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "createdat < '".date('Y-m-d', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$query = $this->db->get();
        $result = $query->row();
        return $result->cash_out;
	}
	function get_sum_kasbon_in($fromDate, $toDate){
		$this->db->select('SUM(kasbon_bayar) as cash_in');
		$this->db->from('x_kasbon');
		if(!empty($fromDate)) {
            $likeCriteria = "createdat >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "createdat < '".date('Y-m-d', $toDate)."'";
            $this->db->where($likeCriteria);
        }
		$this->db->where('status_kas', 1);
		$query = $this->db->get();
        $result = $query->row();
        return $result->cash_in;
	}
	function get_sum_pinjaman_chart($fromDate, $toDate){
		$this->db->select('SUM(tarikan) as cash_out');
		$this->db->from('x_trans');
		if(!empty($fromDate)) {
            $likeCriteria = "timestamp >= '".$fromDate."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "timestamp < '".$toDate."'";
            $this->db->where($likeCriteria);
        }
		$query = $this->db->get();
        $result = $query->row();
         $get = $result->cash_out;
		if($get > 0){
			 return $result->cash_out/1000000;
		}else{
			 return 0;
		}
	}
	function get_sum_pinjaman_in_chart($fromDate, $toDate){
		$this->db->select('SUM(total) as cash_in');
		$this->db->from('x_trans');
		if(!empty($fromDate)) {
            $likeCriteria = "timestamp >= '".$fromDate."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "timestamp < '".$toDate."'";
            $this->db->where($likeCriteria);
        }
		$query = $this->db->get();
        $result = $query->row();
        $get = $result->cash_in;
		if($get > 0){
			 return $result->cash_in/1000000;
		}else{
			 return 0;
		}
	}
	function get_sum_kasbon_chart($fromDate, $toDate){
		$this->db->select('SUM(kasbon) as cash_out');
		$this->db->from('x_kasbon');
		if(!empty($fromDate)) {
            $likeCriteria = "createdat >= '".$fromDate."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "createdat < '".$toDate."'";
            $this->db->where($likeCriteria);
        }
		$query = $this->db->get();
        $result = $query->row();
        $get = $result->cash_out;
		if($get > 0){
			 return $result->cash_out/1000000;
		}else{
			 return 0;
		}
	}
	function get_sum_kasbon_in_chart($fromDate, $toDate){
		$this->db->select('SUM(kasbon_bayar) as cash_in');
		$this->db->from('x_kasbon');
		if(!empty($fromDate)) {
            $likeCriteria = "createdat >= '".$fromDate."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 86400;
            $likeCriteria = "createdat < '".$toDate."'";
            $this->db->where($likeCriteria);
        }
		$this->db->where('status_kas', 1);
		$query = $this->db->get();
        $result = $query->row();
        $get = $result->cash_in;
		if($get > 0){
			 return $result->cash_in/1000000;
		}else{
			 return 0;
		}
	}
}

?>
