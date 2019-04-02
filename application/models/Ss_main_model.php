<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ss_main_model extends CI_Model{
	function upload_excel($filename){
		$this->load->library('upload'); 
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size']	= '20000';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); 
		if($this->upload->do_upload('file')){ 
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	function ss_cek_dulu($nik, $unix){
		$this->db->select('*');
		$this->db->from('ss_attlog');
		$this->db->where('nik', $nik);
		$this->db->where('tgl', $unix);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function add_ss_att($att_data){
		$this->db->trans_start();
		$this->db->insert('ss_attlog', $att_data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function userlist(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->order_by('NIK', 'asc');
		$query = $this->db2->get();
		return $query->result();
	}
	function attendanceCount($nik){
		$this->db->select('*');
		$this->db->from('ss_attlog');
		$this->db->where('nik', $nik);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function attendance($nik, $page, $segment){
		$this->db->select('*');
		$this->db->from('ss_attlog');
		$this->db->where('nik', $nik);
		$this->db->order_by('tgl', 'desc');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		return $query->result();
	}
}
?>
