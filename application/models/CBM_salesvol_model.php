<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class CBM_salesvol_model extends CI_Model{
	function cbm_input_daily($report){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('cbm_sales_vol', $report);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
    function update_cbm_input_daily($cbm_id, $cbm_prodid, $rec_date, $group, $subclass, $report){
		$this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('rec_date', $rec_date);
		$this->db2->where('group', $group);
		$this->db2->where('subclass', $subclass);
		$this->db2->update('cbm_sales_vol', $report);
		return $this->db2->affected_rows();
	}
	function update_cbm_input_past($cbm_id, $cbm_prodid, $rec_date, $report){
		$this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('rec_date', $rec_date);
		$this->db2->update('cbm_sales_vol', $report);
		return $this->db2->affected_rows();
	}
	function getproduct_cbm($cbm_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t1.id as id, t2.prod_name as prod_name, t1.group as group, t1.subclass as subclass, t2.unit as unit');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t1.isum', 0);
		$this->db2->where('t2.isvalid', 1);
		$this->db2->where('t1.cbm_id', $cbm_id);
		$this->db2->order_by('t2.id', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function getproduct_cbm_num($cbm_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t1.id as id, t2.prod_name as prod_name, t1.group as group, t1.subclass as subclass, t2.unit as unit');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t2.isvalid', 1);
		$this->db2->where('t1.cbm_id', $cbm_id);
		$this->db2->order_by('t2.id', 'ASC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function getproduct_cbm_1($cbm_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t1.id as id, t2.prod_name as prod_name, t1.prod_name as prod_id, t1.cbm_id as cbm_id');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t2.isvalid', 1);
		$this->db2->where('t1.cbm_id', $cbm_id);
		$this->db2->order_by('t1.id', 'ASC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cbm_check_dailyreport($cbm_id, $cbm_prodid, $rec_date, $cbm_prod_group, $cbm_prod_subclass){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_sales_vol');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('rec_date', $rec_date);
		$this->db2->where('group', $cbm_prod_group);
		$this->db2->where('subclass', $cbm_prod_subclass);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cbm_check_dailyreportx($cbm_id, $cbm_prodid, $rec_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_sales_vol');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('rec_date', $rec_date);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getproduct_cbmbyid($cbm_prodid){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t2.prod_name as prod_name, t2.unit as unit, t2.id as prod_id, t1.group as group, t1.subclass as subclass, t1.forecast_mode as forecast_mode, t1.isum as isum, t1.id as id');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't2.id = t1.prod_name');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t1.id', $cbm_prodid);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cbm_check_dailyreport_update($cbm_id, $cbm_prodid, $rec_date, $cbm_prod_group, $cbm_prod_subclass){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_sales_vol');
		$this->db2->where('isvalid', 2);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('rec_date', $rec_date);
		$this->db2->where('group', $cbm_prod_group);
		$this->db2->where('subclass', $cbm_prod_subclass);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function check_forecast_mode($cbm_id, $sel){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('id', $sel);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getforecast($cbm_id, $cbm_prodid, $form_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_forecast');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('form_date', $form_date);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_tot_forecast($cbm_id, $stacked, $used_date, $fore_mode){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		if($fore_mode == 1){
			$this->db2->select('*');
		}elseif($fore_mode == 2){
			$this->db2->select('SUM(set_num) as set_num');
		}
		$this->db2->from('cbm_forecast');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$orquery = '('.$stacked.')';
		$this->db2->where($orquery);
		$this->db2->where('form_date', $used_date);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function update_forecast($cbm_id, $cbm_prodid, $form_date, $forecastinfo){
		$this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('form_date', $form_date);
		$this->db2->update('cbm_forecast', $forecastinfo);
		return $this->db2->affected_rows();
	}
	function insert_forecast($forecastinfo){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('cbm_forecast', $forecastinfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function getallCBM(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 30001);
		$query = $this->db2->get();
		return $query->result();
	}
	function getCBM_name($id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('NIK', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$getdata = $query->row();
		return $getdata->uName;
	}
	function getCBM_prod($id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod_byid');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_cbm_user_data_count($searchText = ''){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)){
			$likeCriteria = "
				(uName LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('NIK', 'ASC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function get_cbm_user_data($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)){
			$likeCriteria = "
				(uName LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('NIK', 'ASC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function cbm_get_new_user(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->order_by('NIK', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		$newest = $result->NIK;
		$new_nik = $newest + 1;
		return $new_nik;
	}
	function cbm_add_new_user($userinfo){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('users', $userinfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function cbm_edit_user($prodinfo, $id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('users', $prodinfo);
		return $this->db2->affected_rows();
	}
	function cbm_product_setting_count($searchText = ''){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod_byid');
		if(!empty($searchText)){
			$likeCriteria = "
				(prod_name LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('id', 'ASC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function cbm_product_setting($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod_byid');
		if(!empty($searchText)){
			$likeCriteria = "
				(prod_name LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('id', 'ASC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function cbm_add_new_prod($prodinfo){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('cbm_prod_byid', $prodinfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function cbm_edit_prod($prodinfo, $id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('cbm_prod_byid', $prodinfo);
		return $this->db2->affected_rows();
	}
	function cbm_used_product_count($cbm_id, $searchText = ''){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t2.id as prod_id, t2.prod_name as prod_name');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t2.isvalid', 1);
		$this->db2->where('t1.cbm_id', $cbm_id);
		if(!empty($searchText)){
			$likeCriteria = "
				(t2.prod_name LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('t1.id', 'ASC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function cbm_used_product($cbm_id, $searchText = '', $page, $segment){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t2.id as prod_id, t2.prod_name as prod_name, t1.isvalid as isvalid, t1.id as main_id, t1.group as group, t1.subclass as subclass, t1.forecast_mode as forecast_mode, t1.isum as isum, t1.sum_to as sum_to');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t1.cbm_id', $cbm_id);
		if(!empty($searchText)){
			$likeCriteria = "
				(t2.prod_name LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('t2.id', 'ASC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function cbm_select_sum_target(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t2.prod_name as prod_name, t1.cbm_id as cbm_id, t1.id as main_id, t1.group as group, t1.subclass as subclass');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t1.isum', 1);
		$this->db2->order_by('t2.id', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function cbm_allproduct(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod_byid');
		$this->db2->order_by('id', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function cbm_add_new_used($prodinfo){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('cbm_prod', $prodinfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function cbm_edit_used_prod($prodinfo, $main_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->where('id', $main_id);
		$this->db2->update('cbm_prod', $prodinfo);
		return $this->db2->affected_rows();
	}
	function cbm_forecast_used_prod($forecast, $prod_id, $cbm_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->where('prod_name', $prod_id);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->update('cbm_prod', $forecast);
		return $this->db2->affected_rows();
	}
	function cbm_check_prodbyid($id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	//data class to enable sum up from different user and prod
	function getprodgroup(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('data_group');
		$this->db2->where('isvalid', 1);
		$this->db2->where('data_class', 1);
		$this->db2->order_by('id', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function getprodsubclass(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('data_group');
		$this->db2->where('isvalid', 1);
		$this->db2->where('data_class', 2);
		$this->db2->order_by('id', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function getvolinfo_byid($id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_sales_vol');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getproduct_cbmgrouped($cbm_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t1.id as id, t2.prod_name as prod_name, t1.group as group, t1.subclass as subclass, t2.unit as unit, t2.id as pid');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t2.isvalid', 1);
		$this->db2->where('t1.cbm_id', $cbm_id);
		$this->db2->group_by('t2.prod_name');
		$this->db2->order_by('t2.id', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function getproduct_cbmgrouped_nosum($cbm_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t1.id as id, t2.prod_name as prod_name, t1.group as group, t1.subclass as subclass, t2.unit as unit, t2.id as pid');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('cbm_prod_byid as t2', 't1.prod_name = t2.id');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->where('t1.isum', 0);
		$this->db2->where('t1.cbm_id', $cbm_id);
		$this->db2->group_by('t2.prod_name');
		$this->db2->order_by('t2.id', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function check_stacking_chart($cbm_id, $prod_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('prod_name', $prod_id);
		$this->db2->where('(group != "Default" or subclass != "Default")');
		$this->db2->where('isvalid', 1);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function check_sum_chart($cbm_id, $prod_id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('prod_name', $prod_id);
		$this->db2->where('isum', 1);
		$this->db2->where('isvalid', 1);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function check_prod_grouping($prod_id, $group){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t2.uName as group_name, t2.NIK as cbm_id');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('users as t2', 't1.cbm_id = t2.NIK');
		$this->db2->where('t1.prod_name', $prod_id);
		$this->db2->where('t1.group', $group);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function getcbm_prod_by_id($id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function check_prod_subclassing($cbm_id, $prod_name){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('prod_name', $prod_name);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_cbm_allchart2(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('isvalid', 1);
		$this->db2->group_by('cbm_id');
		$this->db2->group_by('prod_name');
		$this->db2->order_by('cbm_id');
		$query = $this->db2->get();
		return $query->result();
	}
	function get_cbm_allchart(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('t1.id as id, t1.cbm_id as cbm_id, t1.prod_name as prod_name');
		$this->db2->from('cbm_prod as t1');
		$this->db2->join('users as t2', 't1.cbm_id = t2.NIK');
		$this->db2->where('t1.isvalid', 1);
		$this->db2->group_by('t1.prod_name');
		$this->db2->group_by('t1.cbm_id');
		$this->db2->order_by('t1.show_order');
		$query = $this->db2->get();
		return $query->result();
	}
	function check_prod_subclassing_forecast($cbm_id, $prod_name){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('prod_name', $prod_name);
		$this->db2->where('forecast_mode', 2);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function cbm_check_lastyearreport($cbm_id, $cbm_prodid, $rec_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_sales_vol');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('rec_date', $rec_date);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_sum_type(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('isum', 1);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_each_member($id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('prod_name', $id);
		$this->db2->where('isvalid', 1);
		$query = $this->db2->get();
		$result = $query->result();
		$stack = '';
		if(!empty($result)){
			foreach($result as $rec){
				$stack .= 'sum_to = '.$rec->id.' OR ';
			}
		}
		$stacking = substr($stack, 0, -3);
		return $stacking;
	}
	function check_prod_subclassing_sum($prod_q){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$orquery = '('.$prod_q.')';
		$this->db2->where($orquery);
		$this->db2->where('isvalid', 1);
		$query = $this->db2->get();
		$result = $query->result();
		$stack = '';
		if(!empty($result)){
			foreach($result as $rec){
				$stack .= 'cbm_prodid = '.$rec->id.' OR ';
			}
		}
		$stacking = substr($stack, 0, -3);
		return $stacking;
	}
	function get_stacked_prodcount($cbm_id, $cbm_prodid){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('isvalid', 1);
		$this->db2->where('prod_name', $cbm_prodid);
		$query = $this->db2->get();
		$result = $query->num_rows();
		return $result;
	}
	function get_stacked_prod($cbm_id, $cbm_prodid){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('isvalid', 1);
		$this->db2->where('prod_name', $cbm_prodid);
		$query = $this->db2->get();
		$result = $query->result();
		$stack = '';
		if(!empty($result)){
			foreach($result as $rec){
				$stack .= 'cbm_prodid = '.$rec->id.' OR ';
			}
		}
		$stacking = substr($stack, 0, -3);
		return $stacking;
	}
	function cbm_get_vol_chart($cbm_id, $cbm_prodid, $used_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_sales_vol');
		$this->db2->where('isvalid', 1);
		$this->db2->where('cbm_id', $cbm_id);
		$this->db2->where('cbm_prodid', $cbm_prodid);
		$this->db2->where('rec_date', $used_date);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cbm_get_tot_vol_chart($used_date, $cbm_query){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(vol) as vol');
		$this->db2->from('cbm_sales_vol');
		$this->db2->where('isvalid', 1);
		$this->db2->where('rec_date', $used_date);
		$orquery = '('.$cbm_query.')';
		$this->db2->where($orquery);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_tot_sum_forecast($stacked, $used_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(set_num) as set_num');
		$this->db2->from('cbm_forecast');
		$this->db2->where('isvalid', 1);
		$orquery = '('.$stacked.')';
		$this->db2->where($orquery);
		$this->db2->where('form_date', $used_date);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function get_vol_member($id){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cbm_prod');
		$this->db2->where('isvalid', 1);
		$this->db2->where('sum_to', $id);
		$query = $this->db2->get();
		$result = $query->result();
		$stack = '';
		if(!empty($result)){
			foreach($result as $rec){
				$stack .= 'cbm_prodid = '.$rec->id.' OR ';
			}
		}
		$stacking = substr($stack, 0, -3);
		return $stacking;
	}
	function get_all_srmi_groupmember($group){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('srmi_cbm_area');
		$this->db2->where('isvalid', 1);
		$this->db2->where('bu_srmi', $group);
		$this->db2->order_by('id', 'asc');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_srmi_data($id, $form_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('id_area', $id);
		$this->db2->where('record_date', $form_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_srmi_datav2($id, $form_day, $to_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(breakeven) as breakeven, SUM(order_srmi) as order_srmi, SUM(actual) as actual');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('id_area', $id);
		$this->db2->where('record_date >=', $form_day);
		$this->db2->where('record_date <=', $to_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_srmi_group(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('srmi_cbm_area');
		$this->db2->where('isvalid', 1);
		$this->db2->group_by('bu_srmi');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_srmi_groupmember(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('srmi_cbm_area');
		$this->db2->where('isvalid', 1);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_sum_srmi_bu_breakeven($group, $form_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(breakeven) as sum_break_event');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('bu_srmi', $group);
		$this->db2->where('record_date', $form_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_sum_srmi_bu_order($group, $form_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(order_srmi) as sum_order');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('bu_srmi', $group);
		$this->db2->where('record_date', $form_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_sum_srmi_bu_actual($group, $form_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(actual) as sum_actual');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('bu_srmi', $group);
		$this->db2->where('record_date', $form_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_sum_srmi_bu_breakevenv2($group, $form_day, $to_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(breakeven) as sum_break_event');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('bu_srmi', $group);
		$this->db2->where('record_date >=', $form_day);
		$this->db2->where('record_date <=', $to_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_sum_srmi_bu_orderv2($group, $form_day, $to_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(order_srmi) as sum_order');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('bu_srmi', $group);
		$this->db2->where('record_date >=', $form_day);
		$this->db2->where('record_date <=', $to_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_sum_srmi_bu_actualv2($group, $form_day, $to_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(actual) as sum_actual');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('bu_srmi', $group);
		$this->db2->where('record_date >=', $form_day);
		$this->db2->where('record_date <=', $to_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_tot_sum_srmi($used_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(breakeven) as sum_breakevent, SUM(order_srmi) as sum_order, SUM(actual) as sum_actual');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('record_date', $used_date);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function get_group_vol($linker, $rec_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('record_date', $rec_date);
		$this->db2->where('id_area', $linker);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function add_srmi_daily_vol($srmi_vol){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('srmi_cbm_vol', $srmi_vol);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function edit_srmi_daily_vol($srmi_vol, $rec_date, $id_area){
		$this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->where('id_area', $id_area);
		$this->db2->where('record_date', $rec_date);
		$this->db2->update('srmi_cbm_vol', $srmi_vol);
		return $this->db2->affected_rows();
	}
	function get_bu_data($id_area){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('srmi_cbm_area');
		$this->db2->where('id', $id_area);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function check_srmi_data($id_area, $record_date){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('id_area', $id_area);
		$this->db2->where('record_date', $record_date);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}

	function data_excel(){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		return $this->db2->get('srmi_cbm_vol')->result(); 
	}

	function upload_excel($filename){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->load->library('upload'); 
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
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

	function insert_multiple($data){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->insert_batch('srmi_cbm_vol', $data);
	}
	function get_sum_srmi_eacharea($area, $form_day, $to_day){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('SUM(actual) as sum_actual');
		$this->db2->from('srmi_cbm_vol');
		$this->db2->where('id_area', $area);
		$this->db2->where('record_date >=', $form_day);
		$this->db2->where('record_date <=', $to_day);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
}

  
