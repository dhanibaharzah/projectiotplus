<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Boiler_model extends CI_Model
{
	function getboilerlast()
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('boiler');
        $this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function getboiler2last()
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('boiler2');
        $this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function addboilerinput1($boiler1Info)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('boiler', $boiler1Info);
        $insert_id = $this->db2->insert_id();
        $this->db2->trans_complete();
        return $insert_id;
    }
	function addboilerinput2($boiler2Info)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('boiler2', $boiler2Info);
        $insert_id = $this->db2->insert_id();
        $this->db2->trans_complete();
        return $insert_id;
    }
	function addboilerinput3($boiler3Info)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('water_q', $boiler3Info);
        $insert_id = $this->db2->insert_id();
        $this->db2->trans_complete();
        return $insert_id;
    }
	function getdailyusage($start, $endd)
	{
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('(t2.water_0 - t1.water_0) AS water, (t2.steam_0 - t1.steam_0) AS steam, (t2.kwh_0 - t1.kwh_0) AS kwh, t2.timestamp AS timestamp, t2.user as user');
		$this->db2->from('boiler2 as t1');
        $this->db2->join('boiler2 as t2','t1.id = (t2.id -1)');
		if(empty($start) or empty($endd)){
			$nowdate = date('U');
			$limiter = $nowdate - 2592000;
			$sta = date('Y-m-d H:i:s', $limiter);
			$end = date('Y-m-d H:i:s', $nowdate);
			$whereclause = 't2.timestamp >= "'.$sta.'" and t2.timestamp <= "'.$end.'" ';
		}
		if(!empty($start) and !empty($endd)){
			$whereclause = 't2.timestamp >= "'.$start.' 08:00:00" and t2.timestamp <= "'.$endd.' 08:00:00:"';
		}
		$this->db2->where($whereclause);
        $this->db2->order_by('t2.id', 'desc');
		$this->db2->limit(100);
		$query = $this->db2->get();
        return $query->result();
		
		}
	//water quality=================================================
		public function getwaterquality($start, $endd){
			$this->db2 = $this->load->database('otherdb', TRUE); //nama database
			$this->db2->select('*'); // * berarti semua kolom 
			$this->db2->from('water_q'); //nama tabel
			
			if(empty($start) or empty($endd)){
				$this->db2->limit(100);
			}
			if(!empty($start) and !empty($endd)){
				$whereclause = '( timestamp >= "'.$start.' 08:00:00" and timestamp <= "'.$endd.' 08:00:00:" )';
				$this->db2->where($whereclause);
			}
			$this->db2->order_by('timestamp', 'desc');
			$query = $this->db2->get();
			return $query->result();
		}
		
		function getwaterqualities(){
			$this->db2 = $this->load->database('otherdb', TRUE); //nama database
			$this->db2->select('*'); // * berarti semua kolom 
			$this->db2->from('water_q'); //nama tabel
			$this->db2->limit(1);
			$this->db2->order_by('timestamp', 'desc');
			$query = $this->db2->get();
			return $query->row();
		}
		
		function waterqualityCount($start, $endd){ 
		
			$this->db2 = $this->load->database('otherdb', TRUE);
			$this->db2->select('*');
			$this->db2->from('water_q');
			$this->db2->order_by('timestamp', 'DESC');
			
			if(empty($start) or empty($endd)){
				$this->db2->limit(100);
			}
			if(!empty($start) and !empty($endd)){
				$whereclause = '( timestamp >= "'.$start.' 08:00:00" and timestamp <= "'.$endd.' 08:00:00:" )';
				$this->db2->where($whereclause);
			}
			
			$query = $this->db2->get();
			return $query->num_rows();
		}
		
		function waterquality($start, $endd, $page, $segment){ //tambahain , $toDate nanti
			 $this->db2 = $this->load->database('otherdb', TRUE);
			 $this->db2->select('*');
			 $this->db2->from('water_q');
			 $this->db2->order_by('timestamp', 'DESC');
			
			if(empty($start) or empty($endd)){
				$this->db2->limit(100);
			}
			if(!empty($start) and !empty($endd)){
				$whereclause = '( timestamp >= "'.$start.' 08:00:00" and timestamp <= "'.$endd.' 08:00:00:" )';
				$this->db2->where($whereclause);
			}
			
			 $this->db2->limit($page, $segment);
			 
			 $query = $this->db2->get();
			 $result = $query->result();        
			 return $result;
		}
		
		function load_iot_setting($var){
			$this->db->select('*');
			$this->db->from('iot_setting');
			$this->db->where('tag', $var);
			$this->db->limit(1);
			$query = $this->db->get();
			$res = $query->row();
			return $res;
		}
		
		function fwval($id){
			$this->db2 = $this->load->database('otherdb', TRUE);
			$this->db2->select('*');
			$this->db2->from('boiler');
			$this->db2->where('id', $id);
			$this->db2->order_by('id', 'DESC');
			$query = $this->db2->get();
			return $query->result();
		}
	
}

  
