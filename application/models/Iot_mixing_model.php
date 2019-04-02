<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_mixing_model extends CI_Model
{
	function matCount($toDate = '')
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('Level_Tanki');
        if(!empty($toDate)) {
            $likeCriteria = "timestamp <= '".$toDate."'";
            $this->db2->where($likeCriteria);
        }
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
        return $query->num_rows();
    }
	function tanklevel($toDate = '',$page, $segment)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('Level_Tanki');
        if(!empty($toDate)) {
            $likeCriteria = "timestamp <= '".$toDate."'";
            $this->db2->where($likeCriteria);
        }
		$this->db2->order_by('timestamp', 'DESC');
		
		$this->db2->limit($page, $segment);
        $query = $this->db2->get();
        return $query->result();
    }
}

  
