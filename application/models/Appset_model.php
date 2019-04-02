<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Appset_model extends CI_Model
{

function appsetC($searchText = ''){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)) {
			$likeCriteria = "(
				uName LIKE '%".$searchText."%'
				OR NIK LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$query = $this->db2->get();
		return $query->num_rows();
	}
	
	function appset($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)) {
			$likeCriteria = "(
				uName LIKE '%".$searchText."%'
				OR NIK LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$this->db2->order_by('cdprj', 'DESC');
		$this->db2->order_by('cd_role1', 'DESC');
		$this->db2->order_by('cd_role2', 'DESC');
		$this->db2->order_by('cd_role3', 'DESC');
		$this->db2->order_by('applog1', 'DESC');
		$this->db2->order_by('applog2', 'DESC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		return $query->result();
	}
	
	function getuserinfo($NIK){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$this->db2->where('NIK', $NIK);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	
	function userset($userInfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('users', $userInfo);
	}
}
?>
