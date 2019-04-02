<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_mailer_model extends CI_Model
{
	function logmem($topic)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_mem', $topic);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	function cekmem()
    {
		$this->db->select('*');
		$this->db->from('tbl_mem');
		$this->db->limit(1);
		$this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
	function pusher_in(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(30)
               ->get('pusher_in');
	return $result;
	}
	function pusher_out(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(30)
               ->get('pusher_out');
	return $result;
	}
	function loading(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(30)
               ->get('loading');
	return $result;
	}
	function unloading(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(60)
               ->get('unloading');
	return $result;
	}
   function dtimeCount($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 576 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	function dtime($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('SUM(mixing_ct_tilting) as sum');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 576 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
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
	function getreceiver($topic)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('rawr_table');
		$this->db2->where('alarmid', $topic);
		$this->db2->where('isvalid', 1);
        $query = $this->db2->get();
        return $query->result();
    }
	function getallreceiver()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('rawr_table');
		$this->db2->where('isvalid', 1);
		$this->db2->group_by('email');
        $query = $this->db2->get();
        return $query->result();
    }
	function slowspeedCount($sta, $end)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND val > 288 AND val < 576';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	function slowspeed($sta, $end)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('SUM(val) as sum');
		$this->db2->from('cutting_per_hour');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND val > 288 AND val < 576';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function addmailcount($topic)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('mailcount', $topic);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function mailcek($topic)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('mailcount');
		$this->db2->where('topic', $topic);
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->row();
    }
	function boiler_cek()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('boiler');
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->row();
    }
	function cek210()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('bc_11');
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->row();
    }
	function cek220()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('your_table_name');
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->row();
    }
	function cek203()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('Level_Tanki');
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->row();
    }
   function getcdprj(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$this->db2->where('cdprj >', 0);
		$query = $this->db2->get();
		return $query->result();
	}
	function getgroupreceiver($appname){
		$this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('line_group');
		$this->db2->where('groupapp', $appname);
        $query = $this->db2->get();
        return $query->result();
	}
}
