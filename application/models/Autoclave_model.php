<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Autoclave_model extends CI_Model
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
	function gethourlyusage($start, $endd)
	{
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('(t2.water_flow - t1.water_flow) AS water, 
			t2.timestamp AS timestamp, 
			t2.user as user, 
			t2.boiler_steam_press as boiler_steam_press, 
			t2.feed_water_pump as feed_water_pump,
			t2.steam_out as steam_out,
			t2.feed_tank_lvl as feed_tank_lvl,
			t2.id_fan as id_fan,
			t2.fd_fan as fd_fan,
			t2.spider_fan as spider_fan,
			t2.secondary_dumper as secondary_dumper,
			t2.flue_gas_temp as flue_gas_temp,
			t2.bed_temp1 as bed_temp1,
			t2.bed_temp2 as bed_temp2,
			t2.water_lvl_boiler as water_lvl_boiler,
			t2.screw_feed_1 as screw_feed_1,
			t2.screw_feed_2 as screw_feed_2,
			t2.deaerator as deaerator,
			t2.blowdown as blowdown,
			t2.recir_fan as recir_fan,
			t2.acs_out1b as acs_out1b,
			t2.acs_out2b as acs_out2b,
			t2.acs_out1 as acs_out1,
			t2.acs_out2 as acs_out2,
			t2.acs_out3 as acs_out3,
			t2.acs_out4 as acs_out4
			');
		$this->db2->from('boiler as t1');
        $this->db2->join('boiler as t2','t1.id = (t2.id -1)');
		if(empty($start) or empty($endd)){
			$nowdate = date('U');
			$limiter = $nowdate - 259200;
			$sta = date('Y-m-d H:i:s', $limiter);
			$end = date('Y-m-d H:i:s', $nowdate);
			$whereclause = 't2.timestamp >= "'.$sta.'" and t2.timestamp <= "'.$end.'" ';
		}
		if(!empty($start) and !empty($endd)){
			$whereclause = 't2.timestamp >= "'.$start.' 08:00:00" and t2.timestamp <= "'.$endd.' 08:00:00:"';
		}
		$this->db2->where($whereclause);
        $this->db2->order_by('t2.timestamp', 'desc');
		$query = $this->db2->get();
        return $query->result();
	}
}

  