<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_cutting_model extends CI_Model{
	function ajax_reload(){
		header("Content-type: text/json");
		$newdata = $this->iot_user_model->newcake();
		$x_axis = date('U', strtotime($newdata->timestamp));
		$x_a = $x_axis * 1000;
		$y_axis = $newdata->val/60;
		$x = $x_a;
		$y = $y_axis;
		$ret = array($x, $y);
		echo json_encode($ret);
	}
	function moldtoday($sta, $end){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function totalstop($sta, $end){
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
	function chartmold($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function firstmold($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('sum(mixing_ct_tilting) as sumdata');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" and timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function dailyratemin($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('sum(mixing_ct_tilting) as sumdata');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function slowspeedCount($sta, $end){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND val > 288 AND val < 576';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function slowspeed($sta, $end){
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
	function dtimeCount($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 576 AND plan_stop = 0';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function dtime($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('SUM(mixing_ct_tilting) as sum');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 576 AND plan_stop = 0';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	function newcake(){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->row();
	}
	function mixing($sta, $end){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('ctmixing');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function problemCount($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 288';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'ASC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function problem($sta, $end, $page, $segment){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 288 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->limit($page, $segment);
		$this->db2->order_by('timestamp', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function problemlimit($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 288 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->limit(10);
		$this->db2->order_by('mixing_ct_tilting', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function dailyproblem($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->order_by('mixing_ct_tilting', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function ratehour($start, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('count(mixing_ct_tilting) as num, HOUR(timestamp) as jam');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$start.'" AND timestamp <= "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->group_by('HOUR(timestamp)');
		$this->db2->order_by('timestamp');
		$query = $this->db2->get();
		return $query->result();
	}
	function mixhour($start, $end, $jam){
		$this->db2 = $this->load->database('codesysdb', TRUE);
		$this->db2->select('count(val) as num');
		$this->db2->from('ctmixing');
		$wherecase = 'timestamp >= "'.$start.'" AND timestamp <= "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->where('HOUR(timestamp)', $jam);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result->num;
	}
	function monthlyvol($sta, $end){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('COUNT(mixing_ct_tilting) as vol, SUM(mixing_ct_tilting) as sumdata, DAY(CONVERT_TZ(timestamp,"+00:00", "-08:00")) as xaxis');
		$this->db2->from('plc_downtime');
		$wherecase = 'CONVERT_TZ(timestamp,"+00:00", "-08:00") >= "'.$sta.'" AND CONVERT_TZ(timestamp,"+00:00", "-08:00") < "'.$end.'" AND plan_stop = 0';
		$this->db2->where($wherecase);
		$this->db2->group_by('DAY(CONVERT_TZ(timestamp,"+00:00", "-08:00"))');
		$query = $this->db2->get();
		return $query->result();
	}
	function dailycalc($unix1, $unix2){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$this->db2->where('timestamp >= "'.$unix1.'" and timestamp <= "'.$unix2.'"');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }
	function gettimebefore($unix1){
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$this->db2->where('timestamp < "'.$unix1.'"');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
	}
	function limitct1(){
		$this->db->select('*');
		$this->db->from('mtn_range');
		$this->db->where('id', 1);
		$this->db->limit(1);
        $query = $this->db->get();
        $return = $query->row();
		return $return->param;
	}
	function limitct2(){
		$this->db->select('*');
		$this->db->from('mtn_range');
		$this->db->where('id', 2);
		$this->db->limit(1);
        $query = $this->db->get();
        $return = $query->row();
		return $return->param;
	}
	function get_iot_setting($param){
		$this->db->select('*');
		$this->db->from('iot_setting');
		$this->db->where('tag', $param);
		$this->db->limit(1);
        $query = $this->db->get();
        $return = $query->row();
		return $return->value;
	}
	function cyc_prevdata($times){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp < "'.$times.'"';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cyc_nextdata($times){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp > "'.$times.'"';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'ASC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function check_ex_data($date){
		$this->db->select('*');
		$this->db->from('cycletime_summary');
		$this->db->where('prod_date', $date);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function insert_prod_summary($report){
		$this->db->trans_start();
		$this->db->insert('cycletime_summary', $report);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function update_prod_summary($report, $date){
        $this->db->where('prod_date', $date);
		$this->db->update('cycletime_summary', $report);
		return $this->db->affected_rows();
	}
	function oee_data($start, $end){
		$this->db->select('*');
		$this->db->from('cycletime_summary');
		$this->db->where('prod_date >= "'.$start.'" and prod_date < "'.$end.'"');
		$query = $this->db->get();
		return $query->result();
	}
	function get_last_summary(){
		$this->db->select('*');
		$this->db->from('cycletime_summary');
		$this->db->where('prod_ps != 1440');
		$this->db->limit(1);
		$this->db->order_by('prod_date', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	function load_iot_setting($var){
		$this->db->select('*');
		$this->db->from('iot_setting');
		$this->db->where('tag', $var);
		$this->db->limit(1);
		$query = $this->db->get();
		$res = $query->row();
		return $res->value;
	}
	function get_iot_set($var){
		$this->db->select('*');
		$this->db->from('iot_setting');
		$this->db->where('tag', $var);
		$this->db->limit(1);
		$query = $this->db->get();
		$res = $query->row();
		return $res;
	}
	function get_unix_summary($unix){
		$this->db->select('*');
		$this->db->from('cycletime_summary');
		$this->db->where('prod_date', $unix);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function iot_ask_planstop($param){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = '(timestamp > "2019-02-12 00:00:00")';
		$this->db2->where($wherecase);
		$this->db2->where('mixing_ct_tilting >', $param);
		$this->db2->where('keterangan is NULL');
		$this->db2->where('linenotif', 1);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->result();
	}
	function get_all_foreman(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('hse_role', 13);
		$this->db2->where('lineid is not null');
		$query = $this->db2->get();
		return $query->result();
	}
	function check_cutting_ct(){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$this->db2->order_by('timestamp', 'desc');
		$this->db2->limit(2);
		$query = $this->db2->get();
		return $query->result();
	}
	function record_error($error){
		$this->db->trans_start();
		$this->db->insert('plc_failure', $error);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function ct_cutting_error_log(){
		$this->db->select('*');
		$this->db->from('plc_failure');
		$this->db->order_by('timestamp', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	function ct_cutting_error_log_count(){
		$this->db->select('*');
		$this->db->from('plc_failure');
		$this->db->order_by('timestamp', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
}

  
