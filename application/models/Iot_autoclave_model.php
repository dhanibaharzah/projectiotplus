<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_autoclave_model extends CI_Model{
	function sqlac($no, $toDate = ''){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		if($no == 1){$this->db2->from('ac_1');}
		if($no == 2){$this->db2->from('ac_2');}
		if($no == 3){$this->db2->from('ac_3');}
		if($no == 4){$this->db2->from('ac_4');}
		if($no == 5){$this->db2->from('ac_5');}
		if($no == 6){$this->db2->from('ac_6');}
		if($no == 7){$this->db2->from('ac_7');}
		if($no == 8){$this->db2->from('ac_8');}
		$this->db2->order_by('timestamp', 'DESC');
		if(!empty($toDate)){
			$likeCriteria = "timestamp <= '".$toDate."'";
			$this->db2->where($likeCriteria);
		}
		$this->db2->limit(600);
        $query = $this->db2->get();
		return $query->result();
	}
	function sqlact($no){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		if($no == 1){$this->db2->from('ac_1');}
		if($no == 2){$this->db2->from('ac_2');}
		if($no == 3){$this->db2->from('ac_3');}
		if($no == 4){$this->db2->from('ac_4');}
		if($no == 5){$this->db2->from('ac_5');}
		if($no == 6){$this->db2->from('ac_6');}
		if($no == 7){$this->db2->from('ac_7');}
		if($no == 8){$this->db2->from('ac_8');}
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getboilerdata(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('boiler');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getboilerlast(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('boiler');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getboiler2last(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('boiler2');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function addboilerinput1($boiler1Info){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('boiler', $boiler1Info);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function addboilerinput2($boiler2Info){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('boiler2', $boiler2Info);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function addboilerinput3($boiler3Info){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('water_q', $boiler3Info);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function getdailyusage($start, $endd){
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
			$whereclause = 't2.timestamp >= "'.$start.' 08:00:00" and t2.timestamp <= "'.$endd.' 08:00:00"';
		}
		$this->db2->where($whereclause);
		$this->db2->order_by('t2.id', 'desc');
		$this->db2->limit(100);
		$query = $this->db2->get();
		return $query->result();
	}
	function gethourlyusage($start, $endd){
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
			$whereclause = 't2.timestamp >= "'.$start.' 08:00:00" and t2.timestamp <= "'.$endd.' 08:00:00"';
		}
		$this->db2->where($whereclause);
		$this->db2->order_by('t2.timestamp', 'desc');
		$query = $this->db2->get();
		return $query->result();
	}
	function getboilerplc($start, $endd){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('boiler');
		if(empty($start) or empty($endd)){
			$nowdate = date('U');
			$limiter = $nowdate - 86400;
			$sta = date('Y-m-d H:i:s', $limiter);
			$end = date('Y-m-d H:i:s', $nowdate);
			$whereclause = 'timestamp >= "'.$sta.'" and timestamp <= "'.$end.'" ';
		}
		if(!empty($start) and !empty($endd)){
			$whereclause = 'timestamp >= "'.$start.' 08:00:00" and timestamp <= "'.$endd.' 08:00:00"';
		}
		$this->db2->where($whereclause);
		$this->db2->order_by('timestamp', 'desc');
		$this->db2->limit(300);
		$query = $this->db2->get();
		return $query->result();
	}
	function get_eco(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('deaerated_water');
		$this->db2->order_by('timestamp', 'desc');
		$this->db2->limit(100);
		$query = $this->db2->get();
		return $query->result();
	}
	function get_palmkernel(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('bc_11');
		$this->db2->order_by('timestamp', 'desc');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_boiler_daily_data($start, $endd){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('timestamp, sf1, sf2, id, fd, rs, bt2');
		$this->db2->from('boiler');
		$whereclause = 'timestamp >= "'.$start.'" and timestamp < "'.$endd.'"';
		$this->db2->where($whereclause);
		$this->db2->order_by('timestamp', 'asc');
		$query = $this->db2->get();
		return $query->result();
	}
	function check_run_hour_data($date){
		$this->db->select('*');
		$this->db->from('machine_duration');
		$this->db->where('rec_date', $date);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function update_run_hour($run_data, $recorded_date){
		$this->db->where('rec_date', $recorded_date);
		$this->db->update('machine_duration', $run_data);
		return TRUE;
	}
	function insert_run_hour($run_data){
		$this->db->trans_start();
		$this->db->insert('machine_duration', $run_data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function machine_run($start, $end){
		$this->db->select('*');
		$this->db->from('machine_duration');
		$this->db->where('(rec_date >= "'.$start.'" and rec_date < "'.$end.'" )');
		$this->db->order_by('rec_date', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
}

  
