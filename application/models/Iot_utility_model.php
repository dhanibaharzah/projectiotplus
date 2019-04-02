<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_utility_model extends CI_Model{
	function lastpowermeter(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('pwmeter');
        $this->db2->order_by('timestamp', 'DESC');
        $this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function lastsepammeter(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('sepam');
        $this->db2->order_by('timestamp', 'DESC');
        $this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function iot_solar_main(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('solar1');
        $this->db2->order_by('timestamp', 'DESC');
        $this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function lastsolarmeter(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('solar1');
        $this->db2->order_by('timestamp', 'DESC');
        $this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function getsolarmeter($limit){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('solar1');
        $this->db2->where('timestamp > "'.$limit.'"');
        $this->db2->where('power_out != 0');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }
	function getPLNmeter($limit){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('pwmeter');
        $this->db2->where('timestamp > "'.$limit.'"');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }
	function getSEPAMmeter($limit){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('sepam');
        $this->db2->where('timestamp > "'.$limit.'"');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }
	function getparameter($tag){
		$this->db->select('*');
        $this->db->from('iot_setting');
		$this->db->where('tag = "'.$tag.'"');
		$this->db->limit(1);
		$query = $this->db->get();
        return $query->row();
	}
	function getsolarmeter_d($limit, $end){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('solar1');
        $this->db2->where('timestamp > "'.$limit.'" and timestamp < "'.$end.'"');
        $this->db2->where('power_out != 0');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        $getlist = $query->result();
		$kwh = 0;
		if(!empty($getlist)){
			$a = 1;
			$x = 0;
			$kwh = 0;
			foreach($getlist as $rec){
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					$power = ($unix2/3600) * $rec->power_out;
					$kwh = $kwh + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		return $kwh;
    }
	function getPLNmeter_d($limit, $end){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('pwmeter');
        $this->db2->where('timestamp > "'.$limit.'" and timestamp < "'.$end.'"');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        $getPLN = $query->result();
		$kwhPLN = 0;
		if(!empty($getPLN)){
			$a = 1;
			$x = 0;
			$kwhPLN = 0;
			foreach($getPLN as $rec){
				$unix_1 = strtotime($rec->timestamp);
				$unix_2 = $unix_1 - $x;
				if($x > 0){
					if($rec->actpwr >= 32768){$actpower = $rec->actpwr - 65536;}else{$actpower = $rec->actpwr;}
					$power = ($unix_2/3600) * $actpower * 1.035;
					$kwhPLN = $kwhPLN + $power;
				}
				$x = $unix_1;
				$a++;
			}
		}
		return $kwhPLN;
    }
	function getSEPAMmeter_d($limit, $end){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('sepam');
        $this->db2->where('timestamp > "'.$limit.'" and timestamp < "'.$end.'"');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        $getSEPAM = $query->result();
		$kwhSEPAM = 0;
		if(!empty($getSEPAM)){
			$a = 1;
			$x = 0;
			$kwhSEPAM = 0;
			foreach($getSEPAM as $rec){
				$ia = $rec->s1a + $rec->s2a + $rec->s3a;
				$ib = $rec->s1b + $rec->s2b + $rec->s3b;
				$ic = $rec->s1c + $rec->s2c + $rec->s3c;
				$unix1 = strtotime($rec->timestamp);
				$unix2 = $unix1 - $x;
				if($x > 0){
					$power = ($unix2/3600) * ((($ia + $ib + $ic)/3)*1.732*6*0.95*1.035);
					$kwhSEPAM = $kwhSEPAM + $power;
				}
				$x = $unix1;
				$a++;
			}
		}
		return $kwhSEPAM;
    }
	function update_conf($update_val, $id){
		$this->db->where('id', $id);
		$this->db->update('iot_setting', $update_val);
		return TRUE;
	}
	function getSEPAM_chart($no, $todate){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		if($no == 2){	
			$this->db2->select('timestamp, s2a as amp1, s2b as amp2, s2c as amp3');
		}elseif($no == 3){	
			$this->db2->select('timestamp, s3a as amp1, s3b as amp2, s3c as amp3');
		}
		$this->db2->from('sepam');
		$this->db2->where('timestamp < "'.$todate.'"');
		if($no == 2){	
			$this->db2->where('s2a > 0');
		}elseif($no == 3){	
			$this->db2->where('s3a > 0');
		}
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(300);
		$query = $this->db2->get();
		return $query->result();
	}
	function get_pwrmain_chart($todate){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pwmeter');
		$this->db2->where('timestamp < "'.$todate.'"');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(300);
		$query = $this->db2->get();
		return $query->result();
	}
	function get_pvmain_chart($todate){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('solar1');
		$this->db2->where('timestamp < "'.$todate.'"');
		$this->db2->where('power_out !=', 0);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(300);
		$query = $this->db2->get();
		return $query->result();
	}
}
