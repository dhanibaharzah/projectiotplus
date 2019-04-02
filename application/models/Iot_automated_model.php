<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_automated_model extends CI_Model
{
	function getUserInfoxx($userId)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('NIK', $userId);
        $this->db2->limit(1);
        $query = $this->db2->get();
        
        return $query->row();
    }
	function getUserInfocbm($userId){
		$this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('NIK', $userId);
        $this->db2->limit(1);
        $query = $this->db2->get();
        
        return $query->row();
    }
	function alarm_table($iden = NULL)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('alarm_list');
		if(!empty($iden)){
			$this->db2->where('identifier', $iden);
		}
		$this->db2->order_by('id', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }
	
	function cektopic($gmail, $alarmid)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('rawr_table');
        $this->db2->where('email', $gmail);
		$this->db2->where('alarmid', $alarmid);
		$this->db2->where('isvalid', 1);
		$this->db2->limit(1);
		
        $query = $this->db2->get();
        
        return $query->row();
    }
	
	function cektopicline($gmail, $alarmid)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('rawr_table');
        $this->db2->where('line', $gmail);
		$this->db2->where('alarmid', $alarmid);
		$this->db2->where('isvalid', 1);
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        return $query->row();
    }
	
	function followtopic($topic)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('rawr_table', $topic);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function followtopicline($topic)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('rawr_table', $topic);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function followed($gmail, $line)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('tbl2.title as title, tbl1.id as id, tbl1.email as email, tbl1.line as line');
        $this->db2->from('rawr_table as tbl1');
        $this->db2->join('alarm_list as tbl2','tbl2.id = tbl1.alarmid');
        $whereclause = '(tbl1.email = "'.$gmail.'" or tbl1.line = "'.$line.'" )and tbl1.isvalid = 1 ';
		$this->db2->where($whereclause);
		$this->db2->order_by('tbl1.line', 'DESC');
        $query = $this->db2->get();
        
        return $query->result();
    }
	
	function updatetopic($id, $topic)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->where('id', $id);
        $this->db2->update('rawr_table', $topic);
		return TRUE;
    }
	
}

  
