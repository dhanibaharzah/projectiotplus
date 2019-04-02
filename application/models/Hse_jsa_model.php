<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Hse_jsa_model extends CI_Model
{
   
   function add_jsa($jsaInfo){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_jsa_main', $jsaInfo);
        $insert_id = $this->db2->insert_id();
        $this->db2->trans_complete();
        return $insert_id;
    }
	function add_worker($jsaInfo){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_jsa_worker', $jsaInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_worker($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_jsa_worker', $jsaInfo);
		
        return TRUE;
    }
	function update_jsa($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_jsa_main', $jsaInfo);
		
        return TRUE;
    }
	function add_act($jsaInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_jsa_iden', $jsaInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function add_actxxx($jsaInfo){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->insert('tbl_jsa_iden', $jsaInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_act($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_jsa_iden', $jsaInfo);
		
        return TRUE;
    }
	function get_area()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_area');
        $this->db2->where('isvalid', 1);
        $this->db2->order_by('group', 'ASC');
        $this->db2->order_by('num', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function get_dept()
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_dept');
        $this->db2->where('isvalid', 1);
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function get_dept_id($dept_id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_dept');
        $this->db2->order_by('id', 'ASC');
        $this->db2->where('isvalid', 1);
        //$this->db2->where('id_dept', $dept_id);
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
    
	function get_user_pic($uid)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('hse_picar', $uid);
        $this->db2->limit(1);
        
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_area_id($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_area');
        $this->db2->where('isvalid', 1);
        $this->db2->where('id', $id);
        $this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function get_apd()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_apd');
        $this->db2->where('isvalid', 1);
        $this->db2->order_by('toolname', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_checklist($permit_type)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_checklist');
        $this->db2->where('isvalid', 1);
		$whw = 'permit_type = "'.$permit_type.'"';
        $this->db2->where($whw);
        $this->db2->order_by('id', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_checklist2($permit_type)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_checklist');
        $this->db2->where('isvalid', 1);
		$whw = 'permit_type = "General" OR permit_type = "'.$permit_type.'"';
        $this->db2->where($whw);
        $this->db2->order_by('id', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_energy()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_energy');
        $this->db2->where('isvalid', 1);
        $this->db2->order_by('toolname', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_finishquest($permit_type)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_finishquest');
        $this->db2->where('isvalid', 1);
		$whw = 'permit_type = "General" OR permit_type = "'.$permit_type.'"';
        $this->db2->where($whw);
        $this->db2->order_by('id', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_function()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_function');
        $this->db2->where('isvalid', 1);
        $this->db2->order_by('func', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_loto()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_loto');
        $this->db2->where('isvalid', 1);
        $this->db2->order_by('toolname', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_override()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_override');
        $this->db2->where('isvalid', 1);
        $this->db2->order_by('toolname', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_tool()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_tool');
        $this->db2->where('isvalid', 1);
        $this->db2->order_by('toolname', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_jsa($user)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
        $this->db2->where('user', $user);
        $this->db2->order_by('job_name', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_jsabyrecreate($job_name, $user)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
        $this->db2->where('job_name', $job_name);
        $this->db2->where('user', $user);
        $this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_jsabyid($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
        $this->db2->where('id', $id);
        $this->db2->order_by('job_name', 'ASC');
        $this->db2->limit(1);
        
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
	}

	function get_rep($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permit');
		$this->db2->where('id', $id);
        $query = $this->db2->get();
		return $query->row();
    }
	
	function get_myjsaCount($user, $searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
        $this->db2->where('user', $user);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
        $this->db2->order_by('timestamp','ASC');
		$query = $this->db2->get();
        return $query->num_rows();
    }
	
    function get_myjsa($user, $searchText = '', $page, $segment)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
        $this->db2->where('user', $user);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
        $this->db2->limit($page, $segment);
        $this->db2->order_by('timestamp','DESC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
	}
	
	function get_myjsanotif($user){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('user', $user);
		$query = $this->db2->get();
        return $query->num_rows();
	}

	
	function get_closedjsaSLCICount($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='',$searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas != 2 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi != 2 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas != 2 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian != 2 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik != 2 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general != 2 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
        $this->db2->order_by('timestamp','ASC');
		$query = $this->db2->get();
        return $query->num_rows();
    }
	
    function get_closedjsaSLCI($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='', $searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas != 2 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi != 2 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas != 2 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian != 2 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik != 2 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general != 2 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
        $this->db2->limit($page, $segment);
        $this->db2->order_by('timestamp','DESC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function get_closedjsaCount($user, $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='',$searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('user', $user);
		
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas != 2 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi != 2 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas != 2 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian != 2 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik != 2 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general != 2 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
        $this->db2->order_by('timestamp','ASC');
		$query = $this->db2->get();
        return $query->num_rows();
    }
	
    function get_closedjsa($user, $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='', $searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('user', $user);
		
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas != 2 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi != 2 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas != 2 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian != 2 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik != 2 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general != 2 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
        $this->db2->limit($page, $segment);
        $this->db2->order_by('timestamp','DESC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function get_hot_work($searchText='', $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('saved', 1);
		if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas', 7);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_at_high($searchText='', $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('saved', 1);
		if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi', 7);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_confined($searchText='', $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('saved', 1);
		if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas', 7);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_digging($searchText='', $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('saved', 1);
		if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian', 7);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_listrik($searchText='', $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('saved', 1);
		if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik', 7);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_general($searchText='', $start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
		$this->db2->where('saved', 1);
		if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general', 7);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	
	
	function get_jsa_main($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
        $this->db2->where('id', $id);
        $this->db2->limit(1);
		
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_lastjsa($user)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
        $this->db2->where('user', $user);
        $this->db2->order_by('id', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function get_worker($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_worker');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_iden($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_iden');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		$this->db2->order_by('no', 'ASC');
		$this->db2->order_by('id', 'ASC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_iden_num($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_iden');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		$this->db2->order_by('activity', 'ASC');
		$this->db2->order_by('id', 'ASC');
		
		$query = $this->db2->get();
        
        $result = $query->num_rows();        
        return $result;
    }
	function get_iden_row($id, $no)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_iden');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
        $this->db2->where('no', $no);
		$this->db2->limit(1);
		
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_permit($jsa_id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permit');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $jsa_id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_permit_cek($jsa_id, $type)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permit');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $jsa_id);
        $this->db2->where('permit_type', $type);
        $this->db2->limit(1);
		
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function add_permit($permitInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_permit', $permitInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_permit($permitInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_permit', $permitInfo);
		
        return TRUE;
    }
	function edit_permit_byidandtype($permitInfo, $jsa_id, $permit_type){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('jsa_id', $jsa_id);
		$this->db2->where('permit_type', $permit_type);
		$this->db2->update('tbl_permit', $permitInfo);
        return TRUE;
    }
	function gen_permit($permitInfo, $jsa_id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('jsa_id', $jsa_id);
		$this->db2->update('tbl_permit', $permitInfo);
		
        return TRUE;
    }
	function get_overrideList($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permitoverride');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function add_permitoverride($permitInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_permitoverride', $permitInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_permitoverride($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_permitoverride', $jsaInfo);
		
        return TRUE;
    }
	
	function get_apdList($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permitapd');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function add_permitapd($permitInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_permitapd', $permitInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_permitapd($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_permitapd', $jsaInfo);
		
        return TRUE;
    }
	function get_lotoList($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permitloto');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function add_permitloto($permitInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_permitloto', $permitInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_permitloto($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_permitloto', $jsaInfo);
		
        return TRUE;
    }
	function get_toolList($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permittool');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function add_permittool($permitInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_permittool', $permitInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_permittool($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_permittool', $jsaInfo);
		
        return TRUE;
    }
	function get_energyList($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permitenergy');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function add_permitenergy($permitInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_permitenergy', $permitInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function edit_permitenergy($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_permitenergy', $jsaInfo);
		
        return TRUE;
    }
	
	function get_vendor()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('temp_user');
        $this->db2->where('uFlag', 1);
        $this->db2->order_by('uName', 'ASC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
	}
	
	function get_jobs()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('a.id as id, a.timestamp as timestamp, a.po_num as po_num, a.job_name as job_name, a.user as user, b.uName as pt_name');
        $this->db2->from('tbl_po as a');
		$this->db2->join('temp_user as b','b.NIK = a.pt_name');
        $this->db2->where('a.isvalid', 1);
        $this->db2->order_by('a.timestamp', 'DESC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_jobvendor($name)
	{
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_po');
        $this->db2->where('isvalid', 1);
        $this->db2->where('pt_name', $name);
        $this->db2->order_by('timestamp', 'DESC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
	}
	
	function get_listnamecon($vendor_id){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_vendor');
        $this->db2->where('isvalid', 1);
        $this->db2->where('vendor_id', $vendor_id);
        $this->db2->order_by('timestamp', 'DESC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
	}
    
	function get_vendorID()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('temp_user');
        $this->db2->limit(1);
        $this->db2->order_by('NIK', 'DESC');
		
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function get_vendorbyID($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('temp_user');
		$this->db2->where('id', $id);
        $this->db2->limit(1);
        $this->db2->order_by('NIK', 'DESC');
		
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function update_vendor($vendorInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('temp_user', $vendorInfo);
		
        return TRUE;
    }
	function get_jobid($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_po');
        $this->db2->limit(1);
		$this->db2->where('id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function update_job($jobInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_po', $jobInfo);
		
        return TRUE;
    }
	function get_user()
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('uFlag', 1);
        $this->db2->where('hse_role !=', 0);
        $this->db2->order_by('uName', 'ASC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
	}
	function get_phone()
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('uFlag', 1);
		$this->db2->where('hse_role !=', 0);
		$this->db2->where('phone !=', 0);
        $this->db2->order_by('uName', 'ASC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_userbyuname($uname)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('uFlag', 1);
        $this->db2->where('uName', $uname);
		$this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_userbyrole($role)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('uFlag', 1);
        $this->db2->where('uName', $role);
		$this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_userSD()
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('uFlag', 1);
        $this->db2->where('hse_role', 10);
        $this->db2->where('uName', $uname);
		$this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function add_job($jobInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_po', $jobInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function add_vendor($vendorInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('temp_user', $vendorInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function vendorlistCount($searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('temp_user');
        if(!empty($searchText)) {
            $likeCriteria = "(
							NIK LIKE '%".$searchText."%'
                            OR uName LIKE '%".$searchText."%'
                            OR email LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
        $this->db2->order_by('uName','ASC');
		$query = $this->db2->get();
        return $query->num_rows();
    }
	
    function vendorlist($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db2->from('temp_user');
        if(!empty($searchText)) {
            $likeCriteria = "(
							NIK LIKE '%".$searchText."%'
                            OR uName LIKE '%".$searchText."%'
                            OR email LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
        $this->db2->limit($page, $segment);
        $this->db2->order_by('uName','ASC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function get_vendorinduction()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('temp_user');
        $this->db2->where('uFlag', 1);
        $this->db2->order_by('id', 'DESC');
        $query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
    
    function get_penalty($id){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('t1.id as id, t1.regnum as regnum, t1.vendor_name as vendor_name, t2.uName as vendor_id');
        $this->db2->from('tbl_vendor as t1');
        $this->db2->join('temp_user as t2','t2.NIK = t1.vendor_id');
        $this->db2->where('t1.id', $id);
        $this->db2->order_by('t1.id', 'DESC');
        $this->db2->limit(1);
        
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
        
	}

	function penalty_list($regnums){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_vendor_penalty');
		$this->db2->where('isvalid', 1);
		$this->db2->where('regnums', $regnums);
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;

	}

	function penalty_name($regnums){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_vendor_penalty');
		$this->db2->where('isvalid', 1);
		$this->db2->where('regnums', $regnums);
        $this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;

	}



	
    function add_vendorinduction($vendorInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_vendor', $vendorInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
	}
	
	function edit_convendor($update, $id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('tbl_vendor', $update);
		return TRUE;
	}

	function get_convendor($id){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('t1.id as id, t1.regnum as regnum, t1.vendor_name as vendor_name, t2.uName as vendor_id, t1.no_ktp as no_ktp, t1.start_date as start_date, t1.end_date as end_date, t1.notes as notes, t1.img as img');
        $this->db2->from('tbl_vendor as t1');
        $this->db2->join('temp_user as t2','t2.NIK = t1.vendor_id');
        $this->db2->where('t1.id', $id);
        $this->db2->order_by('t1.id', 'DESC');
        $this->db2->limit(1);
        
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;        
	}
    
    function vendorinduction($searchText = '', $page, $segment){
		
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('t1.id as id, t1.regnum as regnum, t1.vendor_name as vendor_name, t2.uName as vendor_id, t1.no_ktp as no_ktp, t1.start_date as start_date, t1.end_date as end_date, t1.notes as notes, t1.img as img');
        $this->db2->from('tbl_vendor as t1');
        $this->db2->join('temp_user as t2','t2.NIK = t1.vendor_id');
        if(!empty($searchText)) {
            $likeCriteria = "(
							regnum LIKE '%".$searchText."%'
                            OR vendor_id LIKE '%".$searchText."%'
                            OR vendor_name LIKE '%".$searchText."%'
                            OR uName LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
        $this->db2->where('t1.isvalid', 1);
        $this->db2->limit($page, $segment);
        $this->db2->order_by('t1.regnum','ASC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
	}
	
	function vendorinductionCount(){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_vendor');
        if(!empty($searchText)) {
            $likeCriteria = "(
							regnum LIKE '%".$searchText."%'
                            OR vendor_id LIKE '%".$searchText."%'
                            OR vendor_name LIKE '%".$searchText."%'
                            OR uName LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
		}
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('timestamp','DESC');
		$query = $this->db2->get();
        return $query->num_rows();
	}
	
	function penaltyCount($manvendor){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_vendor_penalty');
        $this->db2->where('isvalid', 1);
        $this->db2->where('regnums', $manvendor);
		$query = $this->db2->get();
        return $query->num_rows();
	}
	
	
	function add_penalty($vendor, $id){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_vendor_penalty', $vendor);
        $this->db2->where('id', $id);
        $insert_id = $this->db2->insert_id();
        $this->db2->trans_complete();
        return $insert_id;
    }
    
    function get_regnum(){
        $this->db2 = $this->load->database('hsedb', TRUE);
        $q = $this->db2->query('SELECT MAX(RIGHT(regnum,3)) AS maxval FROM tbl_vendor WHERE YEAR(timestamp) = YEAR(CURDATE())');
	   //$q = $this->db2->query("SELECT MAX(RIGHT(regnum,3)) AS maxval FROM tbl_vendor WHERE DATE(timestamp)=CURDATE()");
	   $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->maxval)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('Y').$kd;
	}

	function get_appjsaCount($start='', $end='', $area='', $status='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='', $user, $role, $picar, $searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
		$additional = '';
		if($role == 3){
			$additional = 'OR sd_id = 10';
		}
		$where_clause = 'isvalid = 1 and closed = 0 AND (user = "'.$user.'" OR check = "'.$user.'" OR (check IS NULL AND check_id = '.$role.') OR pic_id = "'.$picar.'"  OR sd = "'.$user.'" OR (sd IS NULL AND (sd_id = '.$role.' '.$additional.')) OR manager = "'.$user.'" OR (manager IS NULL AND manager_id = '.$role.'))';
        $this->db2->where($where_clause);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas != 2 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi != 2 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas != 2 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian != 2 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik != 2 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general != 2 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		if(!empty($status)){
			if($status == 1){
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l = '(';
				}
				$all = 0;
				if(empty($type1) OR empty($type2) OR empty($type3) OR empty($type4) OR empty($type5) OR empty($type6)){
					$where_l = '(';
					$all = 1;
				}
				$where_clause = '';
				if(!empty($type1) OR $all == 1){
					$where_clause = '(panas != 2 AND panas != 1 AND panas != 7) OR ';
				}
				if(!empty($type2) OR $all == 1){
					$where_clause .= '(tinggi != 2 AND tinggi != 1 AND tinggi != 7) OR ';
				}
				if(!empty($type3) OR $all == 1){
					$where_clause .= '(terbatas != 2 AND terbatas != 1 AND terbatas != 7) OR ';
				}
				if(!empty($type4) OR $all == 1){
					$where_clause .= '(penggalian != 2 AND penggalian != 1 AND penggalian != 7) OR ';
				}
				if(!empty($type5) OR $all == 1){
					$where_clause .= '(listrik != 2 AND listrik != 1 AND listrik != 7) OR ';
				}
				if(!empty($type6) OR $all == 1){
					$where_clause .= '(general != 2 AND general != 1 AND general != 7) OR ';
				}
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l .= substr($where_clause,0,-3);
					$where_l .= ')';
					$this->db2->where($where_l);
				}
			}
			if($status == 2){
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l = '(';
				}
				$all = 0;
				if(empty($type1) OR empty($type2) OR empty($type3) OR empty($type4) OR empty($type5) OR empty($type6)){
					$where_l = '(';
					$all = 1;
				}
				$where_clause = '';
				if(!empty($type1) OR $all == 1){
					$where_clause = 'panas = 7 OR ';
				}
				if(!empty($type2) OR $all == 1){
					$where_clause .= 'tinggi = 7 OR ';
				}
				if(!empty($type3) OR $all == 1){
					$where_clause .= 'terbatas = 7 OR ';
				}
				if(!empty($type4) OR $all == 1){
					$where_clause .= 'penggalian = 7 OR ';
				}
				if(!empty($type5) OR $all == 1){
					$where_clause .= 'listrik = 7 OR ';
				}
				if(!empty($type6) OR $all == 1){
					$where_clause .= 'general = 7 OR ';
				}
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l .= substr($where_clause,0,-3);
					$where_l .= ')';
					$this->db2->where($where_l);
				}
			}
		}
        $this->db2->order_by('timestamp','ASC');
		$query = $this->db2->get();
        return $query->num_rows();
	}

	function get_appjsanotif($start='', $end='', $area='', $status='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='', $user, $role, $picar){
		//$time = date('Y-m-d');
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$additional = '';
		if($role == 3){
			$additional = 'OR sd_id = 10';
		}
		$where_clause = 'isvalid = 1 and closed = 0 AND (user = "'.$user.'" OR check = "'.$user.'" OR (check IS NULL AND check_id = '.$role.') OR pic_id = "'.$picar.'"  OR sd = "'.$user.'" OR (sd IS NULL AND (sd_id = '.$role.' '.$additional.')) OR manager = "'.$user.'" OR (manager IS NULL AND manager_id = '.$role.'))';
		$this->db2->where($where_clause);
		
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas != 2 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi != 2 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas != 2 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian != 2 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik != 2 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general != 2 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		if(!empty($status)){
			if($status == 1){
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l = '(';
				}
				$all = 0;
				if(empty($type1) OR empty($type2) OR empty($type3) OR empty($type4) OR empty($type5) OR empty($type6)){
					$where_l = '(';
					$all = 1;
				}
				$where_clause = '';
				if(!empty($type1) OR $all == 1){
					$where_clause = '(panas != 2 AND panas != 1 AND panas != 7) OR ';
				}
				if(!empty($type2) OR $all == 1){
					$where_clause .= '(tinggi != 2 AND tinggi != 1 AND tinggi != 7) OR ';
				}
				if(!empty($type3) OR $all == 1){
					$where_clause .= '(terbatas != 2 AND terbatas != 1 AND terbatas != 7) OR ';
				}
				if(!empty($type4) OR $all == 1){
					$where_clause .= '(penggalian != 2 AND penggalian != 1 AND penggalian != 7) OR ';
				}
				if(!empty($type5) OR $all == 1){
					$where_clause .= '(listrik != 2 AND listrik != 1 AND listrik != 7) OR ';
				}
				if(!empty($type6) OR $all == 1){
					$where_clause .= '(general != 2 AND general != 1 AND general != 7) OR ';
				}
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l .= substr($where_clause,0,-3);
					$where_l .= ')';
					$this->db2->where($where_l);
				}
			}
			if($status == 2){
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l = '(';
				}
				$all = 0;
				if(empty($type1) OR empty($type2) OR empty($type3) OR empty($type4) OR empty($type5) OR empty($type6)){
					$where_l = '(';
					$all = 1;
				}
				$where_clause = '';
				if(!empty($type1) OR $all == 1){
					$where_clause = 'panas = 7 OR ';
				}
				if(!empty($type2) OR $all == 1){
					$where_clause .= 'tinggi = 7 OR ';
				}
				if(!empty($type3) OR $all == 1){
					$where_clause .= 'terbatas = 7 OR ';
				}
				if(!empty($type4) OR $all == 1){
					$where_clause .= 'penggalian = 7 OR ';
				}
				if(!empty($type5) OR $all == 1){
					$where_clause .= 'listrik = 7 OR ';
				}
				if(!empty($type6) OR $all == 1){
					$where_clause .= 'general = 7 OR ';
				}
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l .= substr($where_clause,0,-3);
					$where_l .= ')';
					$this->db2->where($where_l);
				}
			}
		}

		$query = $this->db2->get();
        return $query->num_rows();
	}
		
    function get_appjsa($start='', $end='', $area='', $status='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='', $user, $role, $picar, $searchText = '', $page, $segment)
    {
		
        $this->db->select('*');
        $this->db2->from('tbl_jsa_main');
		$additional = '';
		if($role == 3){
			$additional = 'OR sd_id = 10';
		}
		$where_clause = 'isvalid = 1 and closed = 0 AND (user = "'.$user.'" OR check = "'.$user.'" OR (check IS NULL AND check_id = '.$role.') OR pic_id = "'.$picar.'" OR sd = "'.$user.'" OR (sd IS NULL AND (sd_id = '.$role.' '.$additional.')) OR manager = "'.$user.'" OR (manager IS NULL AND manager_id = '.$role.'))';
        $this->db2->where($where_clause);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas != 2 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi != 2 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas != 2 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian != 2 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik != 2 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general != 2 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		if(!empty($status)){
			if($status == 1){
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l = '(';
				}
				$all = 0;
				if(empty($type1) OR empty($type2) OR empty($type3) OR empty($type4) OR empty($type5) OR empty($type6)){
					$where_l = '(';
					$all = 1;
				}
				$where_clause = '';
				if(!empty($type1) OR $all == 1){
					$where_clause = '(panas != 2 AND panas != 1 AND panas != 7) OR ';
				}
				if(!empty($type2) OR $all == 1){
					$where_clause .= '(tinggi != 2 AND tinggi != 1 AND tinggi != 7) OR ';
				}
				if(!empty($type3) OR $all == 1){
					$where_clause .= '(terbatas != 2 AND terbatas != 1 AND terbatas != 7) OR ';
				}
				if(!empty($type4) OR $all == 1){
					$where_clause .= '(penggalian != 2 AND penggalian != 1 AND penggalian != 7) OR ';
				}
				if(!empty($type5) OR $all == 1){
					$where_clause .= '(listrik != 2 AND listrik != 1 AND listrik != 7) OR ';
				}
				if(!empty($type6) OR $all == 1){
					$where_clause .= '(general != 2 AND general != 1 AND general != 7) OR ';
				}
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l .= substr($where_clause,0,-3);
					$where_l .= ')';
					$this->db2->where($where_l);
				}
			}
			if($status == 2){
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l = '(';
				}
				$all = 0;
				if(empty($type1) OR empty($type2) OR empty($type3) OR empty($type4) OR empty($type5) OR empty($type6)){
					$where_l = '(';
					$all = 1;
				}
				$where_clause = '';
				if(!empty($type1) OR $all == 1){
					$where_clause = 'panas = 7 OR ';
				}
				if(!empty($type2) OR $all == 1){
					$where_clause .= 'tinggi = 7 OR ';
				}
				if(!empty($type3) OR $all == 1){
					$where_clause .= 'terbatas = 7 OR ';
				}
				if(!empty($type4) OR $all == 1){
					$where_clause .= 'penggalian = 7 OR ';
				}
				if(!empty($type5) OR $all == 1){
					$where_clause .= 'listrik = 7 OR ';
				}
				if(!empty($type6) OR $all == 1){
					$where_clause .= 'general = 7 OR ';
				}
				if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
					$where_l .= substr($where_clause,0,-3);
					$where_l .= ')';
					$this->db2->where($where_l);
				}
			}
		}
        $this->db2->limit($page, $segment);
        $this->db2->order_by('timestamp','DESC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function get_todayjsaCount($date, $searchText = '')
    {
		//$time = date('Y-m-d');
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		$where_clause = '(panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2) AND';
		$where_clause .= '(general = 7 OR general = 2)';
        $this->db2->where($where_clause);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
		//$this->db2->where('timestamp', $time);
        $this->db2->order_by('timestamp','ASC');
		$query = $this->db2->get();
        return $query->num_rows();
	}
	

	function get_todayjsanotif(){
		$time = date('Y-m-d');
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$this->db2->where('closed', 0);
		$where_clause = '(panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2) AND ';
		$where_clause .= '(general = 7 OR general = 2)';
		$this->db2->where($where_clause);
		$this->db2->where('start_date', $time);
		$query = $this->db2->get();
        return $query->num_rows();
	}
	
    function get_todayjsa($date, $searchText = '', $page, $segment)
    {	
		$time = date('Y-m-d');
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$this->db2->where('closed', 0);
		$where_clause = '(panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2) AND ';
		$where_clause .= '(general = 7 OR general = 2)';
		$this->db2->where($where_clause);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
		}
		$this->db2->where('start_date', $time);
        $this->db2->limit($page, $segment);
        $this->db2->order_by('timestamp','DESC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function get_workercount($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_worker');
        $this->db2->where('isvalid', 1);
		$this->db2->where('jsa_id', $id);
		$query = $this->db2->get();
        return $query->num_rows();
    }
	
	function get_notes($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permit');
        $this->db2->where('isvalid', 1);
		$this->db2->where('jsa_id', $id);
		$query = $this->db2->get();
        return $query->result();
    }
	
	function get_todayjsaxCount($date,$user, $searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('user', $user);
		$where_clause = '(panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2) AND';
		$where_clause .= '(general = 7 OR general = 2)';
        $this->db2->where($where_clause);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
        $this->db2->order_by('timestamp','ASC');
		$query = $this->db2->get();
        return $query->num_rows();
    }
	
    function get_todayjsax($date,$user, $searchText = '', $page, $segment)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('user', $user);
		$where_clause = '(panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2) AND ';
		$where_clause .= '(general = 7 OR general = 2)';
		$this->db2->where($where_clause);
        if(!empty($searchText)) {
            $likeCriteria = "(
							job_name LIKE '%".$searchText."%'
                            OR area LIKE '%".$searchText."%'
                            OR supervisor LIKE '%".$searchText."%'
							OR description LIKE '%".$searchText."%'
							)";
            $this->db2->where($likeCriteria);
        }
        $this->db2->limit($page, $segment);
        $this->db2->order_by('timestamp','DESC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function get_events($start, $end)
    {
		$end_unix = $end + 86399;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$where_clause = '((panas = 7 OR (panas = 2 AND general = 7)) OR ';
		$where_clause .= '(tinggi = 7 OR (tinggi = 2 AND general = 7)) OR ';
		$where_clause .= '(terbatas = 7 OR (terbatas = 2 AND general = 7)) OR ';
		$where_clause .= '(penggalian = 7 OR (penggalian = 2 AND general = 7)) OR ';
		$where_clause .= '(listrik = 7 OR (listrik = 2 AND general = 7))) AND ';
		$where_clause .= '(end_unix <= '.$end_unix.')';
		$this->db2->where($where_clause);
        
        $query = $this->db2->get();
          
        return $query;
    }
	function get_eventvendor($user, $start, $end){
		$end_unix = $end + 86399;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('user', $user);
		$where_clause = '((panas = 7 OR (panas = 2 AND general = 7)) OR ';
		$where_clause .= '(tinggi = 7 OR (tinggi = 2 AND general = 7)) OR ';
		$where_clause .= '(terbatas = 7 OR (terbatas = 2 AND general = 7)) OR ';
		$where_clause .= '(penggalian = 7 OR (penggalian = 2 AND general = 7)) OR ';
		$where_clause .= '(listrik = 7 OR (listrik = 2 AND general = 7))) AND ';
		$where_clause .= '(end_unix <= '.$end_unix.')';
		$this->db2->where($where_clause);
        $query = $this->db2->get();
        return $query;
    }
	function get_monitor($id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_monitor');
		$this->db2->where('isvalid', 1);
		$this->db2->where('jsa_id', $id);
		$query = $this->db2->get();
		return $query->result();
    }
    function get_daily_hot($start_date){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as hot');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$where_clause = '(panas = 7 AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2))';
		$this->db2->where($where_clause);
		$this->db2->where('start_date', $start_date);
		$query = $this->db2->get();
		return $query->row();
	}
    function get_daily_high($start_date){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as high');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$where_clause = '((panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2))';
		$this->db2->where($where_clause);
		$this->db2->where('start_date', $start_date);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_daily_conf($start_date){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as conf');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$where_clause = '((panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2))';
		$this->db2->where($where_clause);
		$this->db2->where('start_date', $start_date);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_daily_dig($start_date){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as dig');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$where_clause = '((panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7) AND ';
		$where_clause .= '(listrik = 7 OR listrik = 2))';
		$this->db2->where($where_clause);
		$this->db2->where('start_date', $start_date);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_daily_elec($start_date){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as elec');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$where_clause = '((panas = 7 OR panas = 2) AND ';
		$where_clause .= '(tinggi = 7 OR tinggi = 2) AND ';
		$where_clause .= '(terbatas = 7 OR terbatas = 2) AND ';
		$where_clause .= '(penggalian = 7 OR penggalian = 2) AND ';
		$where_clause .= '(listrik = 7))';
		$this->db2->where($where_clause);
		$this->db2->where('start_date', $start_date);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_daily_gen($start_date){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as gen');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$where_clause = '(panas = 2 AND tinggi = 2 AND terbatas = 2 AND penggalian = 2 AND listrik = 2 AND general = 7)';
		$this->db2->where($where_clause);
		$this->db2->where('start_date', $start_date);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_daily_index_count($start = '', $end = ''){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as tot, start_date');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		if(!empty($start)){
			$where_clause = 'start_date >= "'.$start.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'start_date <= "'.$end.'"';
			$this->db2->where($where_clause);
		}
		$this->db2->group_by('start_date');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function get_daily_index($start = '', $end = '', $page, $segment){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('COUNT(id) as tot, start_date');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		if(!empty($start)){
			$where_clause = 'start_date >= "'.$start.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'start_date <= "'.$end.'"';
			$this->db2->where($where_clause);
		}
		$this->db2->group_by('start_date');
		$this->db2->order_by('start_date', 'desc');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		return $query->result();
	}
}
