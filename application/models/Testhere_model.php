<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Testhere_model extends CI_Model
{
	function update_conf($update_val){
		$this->db->trans_start();
		$this->db->insert('param_gauge', $update_val);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	function disvalue(){
		$value = $this->db->query("SELECT * FROM param_gauge");
        return $value;
	}










	
	
	
	
//==========================================================================================================	
	function newcake()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->row();
    }
    
    function problemCount($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 288 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
    
    function problem($sta, $end, $page, $segment)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 288 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->limit($page, $segment);
		$this->db2->order_by('mixing_ct_tilting', 'DESC');
        $query = $this->db2->get();
        return $query->result();
    }
    
    function totalstop($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('SUM(mixing_ct_tilting) as sumdata');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND plan_stop = 1';
		$this->db2->where($wherecase);
		$this->db2->limit(1);
        $query = $this->db2->get();
		$result = $query->row();
		
		$this->dbx = $this->load->database('slcidb', TRUE);
		$this->dbx->select('*');
		$this->dbx->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND plan_stop = 1';
		$this->dbx->where($wherecase);
        $query1 = $this->dbx->get();
		$result1 = $query1->num_rows();
		
        $planstop = $result->sumdata - (288*$result1);
        return $planstop;
    }
    
    function chartmold($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }
}

?>
