<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Device_model extends CI_Model
{
	function alldevCount($searchText = '', $selclass = ''){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR param1 LIKE '%".$searchText."%'
				OR param2 LIKE '%".$searchText."%'
				OR param3 LIKE '%".$searchText."%'
				OR param4 LIKE '%".$searchText."%'
				OR param5 LIKE '%".$searchText."%'
				OR param6 LIKE '%".$searchText."%'
				OR param7 LIKE '%".$searchText."%'
				OR param8 LIKE '%".$searchText."%'
				OR param9 LIKE '%".$searchText."%'
				OR param10 LIKE '%".$searchText."%'
				OR param11 LIKE '%".$searchText."%'
				OR param12 LIKE '%".$searchText."%'
				OR param13 LIKE '%".$searchText."%'
				OR param14 LIKE '%".$searchText."%'
				OR param15 LIKE '%".$searchText."%'
				OR pm LIKE '%".$searchText."%'
				OR activity LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
				OR pos LIKE '%".$searchText."%'
				OR usage LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($selclass)){$this->db->where('(code LIKE "'.$selclass.'%")');}
		$this->db->where('isvalid', 1);
		$this->db->order_by('updateon','ASC');
		$query = $this->db->get();
		return $query->num_rows();
    }
	function alldev($searchText = '', $selclass = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR param1 LIKE '%".$searchText."%'
				OR param2 LIKE '%".$searchText."%'
				OR param3 LIKE '%".$searchText."%'
				OR param4 LIKE '%".$searchText."%'
				OR param5 LIKE '%".$searchText."%'
				OR param6 LIKE '%".$searchText."%'
				OR param7 LIKE '%".$searchText."%'
				OR param8 LIKE '%".$searchText."%'
				OR param9 LIKE '%".$searchText."%'
				OR param10 LIKE '%".$searchText."%'
				OR param11 LIKE '%".$searchText."%'
				OR param12 LIKE '%".$searchText."%'
				OR param13 LIKE '%".$searchText."%'
				OR param14 LIKE '%".$searchText."%'
				OR param15 LIKE '%".$searchText."%'
				OR pm LIKE '%".$searchText."%'
				OR activity LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
				OR pos LIKE '%".$searchText."%'
				OR usage LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($selclass)){$this->db->where('(code LIKE "'.$selclass.'%")');}
		$this->db->where('isvalid', 1);
		$this->db->order_by('updateon','ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getallcode(){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->order_by('code','ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function getqr($selClass){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('dev_code', $selClass);
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function tagging($code){
		$string = explode("-",$code);
		$this->db->select('*');
		$this->db->from('tbl_alltype');
		$this->db->where('dev_code', $string[0]);
		$this->db->where('code', $string[1]);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function parameter($dev_code){
		$this->db->select('*');
		$this->db->from('set_dev');
		$this->db->where('isvalid', 1);
		$this->db->where('dev_code',$dev_code);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function paramval($id){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getparamcode($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->where('code',$code);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function devclass(){
		$this->db->select('*');
		$this->db->from('set_dev');
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function editdevicein($devinfo, $code){
		$this->db->where('code', $code);
		$this->db->update('tbl_alldevice', $devinfo);
		return TRUE;
	}
	function editdevice($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('set_dev', $devinfo);
		return TRUE;
    }
	function newdevcode(){
		$this->db->select('*');
		$this->db->from('set_dev');
		$this->db->where('isvalid', 1);
		$this->db->order_by('dev_code', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
    }
	function adddevmainclass($devinfo){
		$this->db->trans_start();
		$this->db->insert('set_dev', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function devclassname($class){
		$this->db->select('*');
		$this->db->from('set_dev');
		$this->db->where('isvalid', 1);
		$this->db->where('dev_code', $class);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function devsubclass($class){
		$this->db->select('*');
		$this->db->from('tbl_alltype');
		$this->db->where('isvalid', 1);
		$this->db->where('dev_code', $class);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function devallsubclass($class){
		$this->db->select('*');
		$this->db->from('tbl_alltype');
		$this->db->where('dev_code', $class);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function editdevsubclass($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('tbl_alltype', $devinfo);
		return TRUE;
    }
	function subcodecheck($class_code, $code){
		$this->db->select('*');
		$this->db->from('tbl_alltype');
		$this->db->where('dev_code', $class_code);
		$this->db->where('code', $code);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function adddevsubclass($devinfo){
		$this->db->trans_start();
		$this->db->insert('tbl_alltype', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getnewcode($subclass_code){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->where('code LIKE "'.$subclass_code.'%"');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function savedevice($devinfo){
		$this->db->trans_start();
		$this->db->insert('tbl_alldevice', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function devmainclass(){
		$this->db->select('*');
		$this->db->from('set_dev');
		$this->db->order_by('dev_code', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function devsubtype(){
		$this->db->select('*');
		$this->db->from('tbl_alltype');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function devparam($class_code){
		$this->db->select('*');
		$this->db->from('set_devparam');
		$this->db->where('dev_code', $class_code);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function adddevparam($devinfo){
		$this->db->trans_start();
		$this->db->insert('set_devparam', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editdevparam($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('set_devparam', $devinfo);
		return TRUE;
    }
	function lastmainten($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getlastmainten($code, $part_id){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->where('part', $part_id);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function add_fdevmainten($devinfo){
		$this->db->trans_start();
		$this->db->insert('tbl_alldevmainten', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getallposisiCount($code, $searchText = ''){
		$this->db->select('*');
		$this->db->from('tbl_alldevloc');
		$this->db->where('code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				posisi LIKE '%".$searchText."%'
				OR usage LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getallposisi($code, $searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('tbl_alldevloc');
		$this->db->where('code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				posisi LIKE '%".$searchText."%'
				OR usage LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->limit($page, $segment);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getallparamCount($code, $searchText = ''){
		$this->db->select('t1.timestamp as timestamp, t2.param as param, t1.in_value as in_value, t1.pic as pic');
		$this->db->from('tbl_alldevparam as t1');
		$this->db->join('set_devparam as t2','t2.id = t1.param_id');
		$this->db->where('t1.code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.param LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getallparam($code, $searchText = '', $page, $segment){
		$this->db->select('t1.timestamp as timestamp, t2.param as param, t1.in_value as in_value, t1.pic as pic');
		$this->db->from('tbl_alldevparam as t1');
		$this->db->join('set_devparam as t2','t2.id = t1.param_id');
		$this->db->where('t1.code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.param LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->limit($page, $segment);
		$this->db->order_by('t1.timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getallmaintenCount($code, $searchText = ''){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				partname LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getallmainten($code, $searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				partname LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->limit($page, $segment);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getalltestCount($code, $searchText = ''){
		$this->db->select('t1.timestamp as timestamp, t2.test_title as test_title, t1.pic as pic, t1.id as id');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		$this->db->where('t1.code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.test_title LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('t1.unixtime');
		$this->db->order_by('t1.timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getalltest($code, $searchText = '', $page, $segment){
		$this->db->select('t1.timestamp as timestamp, t2.test_title as test_title, t1.pic as pic, t1.id as id');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		$this->db->where('t1.code', $code);
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.test_title LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('t1.unixtime');
		$this->db->order_by('t1.timestamp', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function lastinstall10($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevloc');
		$this->db->where('code', $code);
		$this->db->limit(10);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function lastinstall($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevloc');
		$this->db->where('code', $code);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function add_fdevlockset($devinfo){
		$this->db->trans_start();
		$this->db->insert('tbl_alldevloc', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function lastparam10($code){
		$this->db->select('t1.timestamp as timestamp, t2.param as param, t1.in_value as in_value, t1.pic as pic');
		$this->db->from('tbl_alldevparam as t1');
		$this->db->join('set_devparam as t2','t2.id = t1.param_id');
		$this->db->where('t1.code', $code);
		$this->db->limit(10);
		$this->db->order_by('t1.timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function lasttest10($code){
		$this->db->select('t1.timestamp as timestamp, t2.test_title as test_title, t1.pic as pic, t1.id as id');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		$this->db->where('t1.code', $code);
		$this->db->group_by('t1.unixtime');
		$this->db->limit(10);
		$this->db->order_by('t1.timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function gettestformcom($unixtime, $code, $pic){
		$this->db->select('t2.dev_code as dev_code, t2.test_name as test_name, t2.test_cond as test_cond, t2.test_stand as test_stand, t2.test_type as test_type, t1.unixtime as unixtime, t2.test_title as test_title, t1.pic as pic, t1.id as id, t1.test_id as test_id, t1.test_result as test_result, t1.appname as appname, t1.appdate as appdate, t1.app as app');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		$this->db->where('t1.unixtime', $unixtime);
		$this->db->where('t1.code', $code);
		$this->db->where('t1.pic', $pic);
		$this->db->order_by('t2.test_name', 'ASC');
		$this->db->order_by('t2.test_cond', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function gettrentitlebyid($id){
		$this->db->select('t1.code as code, t2.test_name as test_name, t2.test_cond as test_cond, t2.test_stand as test_stand, t2.test_title as test_title');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		$this->db->where('t1.test_id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function gettrendev($id, $code){
		$this->db->select('*');
		$this->db->from('form_testresult');
		$this->db->where('test_id', $id);
		$this->db->where('code', $code);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function gettestresultbyid($id){
		$this->db->select('*');
		$this->db->from('form_testresult');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getanswer($unix, $test_id){
		$this->db->select('*');
		$this->db->from('form_testresult');
		$this->db->where('unixtime', $unix);
		$this->db->where('test_id', $test_id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function lasttest($code){
		$this->db->select('*');
		$this->db->from('form_testresult');
		$this->db->where('code', $code);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function devicedetail($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->where('code',$code);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function lastmainten10($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->limit(10);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function lastmainp1($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->where('part', 1);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function lastmainp2($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->where('part', 2);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function lastmainp3($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->where('part', 3);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function lastmainp4($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->where('part', 4);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function lastmainp5($code){
		$this->db->select('*');
		$this->db->from('tbl_alldevmainten');
		$this->db->where('code', $code);
		$this->db->where('part', 5);
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getposisilist(){
		$this->db->select('*');
		$this->db->from('posisi');
		$this->db->where('isvalid', 1);
		$this->db->order_by('posisi', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdevicelist(){
		$this->db->select('*');
		$this->db->from('device_list');
		$this->db->where('isvalid', 1);
		$this->db->order_by('device', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getsamelist($likecode){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->where('code LIKE "'.$likecode.'%"');
		$this->db->order_by('code', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function updatepmform($pminfo, $dcode){
		$this->db->where('dcode', $dcode);
		$this->db->update('elec_form', $pminfo);
		return TRUE;
	}
	function devposisiCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('posisi');
		if(!empty($searchText)) {
			$likeCriteria = "(
				posisi LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function devposisi($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('posisi');
		if(!empty($searchText)) {
			$likeCriteria = "(
				posisi LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('posisi', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function adddevposisi($devinfo){
		$this->db->trans_start();
		$this->db->insert('posisi', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editposisi($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('posisi', $devinfo);
		return TRUE;
	}
	function devusageCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('device_list');
		if(!empty($searchText)) {
			$likeCriteria = "(
				device LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function devusage($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('device_list');
		if(!empty($searchText)) {
			$likeCriteria = "(
				device LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('device', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function adddevusage($devinfo){
		$this->db->trans_start();
		$this->db->insert('device_list', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editdevusage($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('device_list', $devinfo);
		return TRUE;
	}
	function devtestCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('elec_testform');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)) {
			$likeCriteria = "(
				test_title LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('test_title');
		$this->db->group_by('dev_code');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function devtest($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('elec_testform');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)) {
			$likeCriteria = "(
				test_title LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('test_title');
		$this->db->group_by('dev_code');
		$this->db->order_by('test_title', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function gettestformbyid($id){
		$this->db->select('*');
		$this->db->from('elec_testform');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function gettestform($dev_code, $test_title){
		$this->db->select('*');
		$this->db->from('elec_testform');
		$this->db->where('dev_code', $dev_code);
		$this->db->where('test_title', $test_title);
		$this->db->where('isvalid', 1);
		$this->db->order_by('test_name', 'ASC');
		$this->db->order_by('test_cond', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function gettestformID($dev_code, $test_title){
		$this->db->select('*');
		$this->db->from('elec_testform');
		$this->db->where('dev_code', $dev_code);
		$this->db->where('test_title', $test_title);
		$this->db->where('isvalid', 1);
		$this->db->order_by('test_name', 'ASC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function adddevtest($forminfo){
		$this->db->trans_start();
		$this->db->insert('elec_testform', $forminfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editdevtest($forminfo, $dev_code, $title){
		$this->db->where('dev_code', $dev_code);
		$this->db->where('test_title', $title);
		$this->db->update('elec_testform', $forminfo);
		return TRUE;
	}
	function edittestpart($forminfo, $dev_code, $otest_name){
		$this->db->where('dev_code', $dev_code);
		$this->db->where('test_name', $otest_name);
		$this->db->update('elec_testform', $forminfo);
		return TRUE;
	}
	function adddevtestparam($forminfo){
		$this->db->trans_start();
		$this->db->insert('elec_testform', $forminfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edittestparam($forminfo, $id){
		$this->db->where('id', $id);
		$this->db->update('elec_testform', $forminfo);
		return TRUE;
	}
	function checktestsheet($code){
		$this->db->select('*');
		$this->db->from('elec_testform');
		$this->db->where('dev_code', $code);
		$this->db->where('isvalid', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getpertestlist($likecode){
		$this->db->select('*');
		$this->db->from('elec_testform');
		$this->db->where('dev_code', $likecode);
		$this->db->where('isvalid', 1);
		$this->db->group_by('test_title');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getsubclass(){
		$this->db->select('*');
		$this->db->from('tbl_alltype');
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addtestresult($testinfo){
		$this->db->trans_start();
		$this->db->insert('form_testresult', $testinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function addelectestpic($testinfo){
		$this->db->trans_start();
		$this->db->insert('elec_testpic', $testinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getimageadd($dev_code, $title){
		$this->db->select('*');
		$this->db->from('elec_testpic');
		$this->db->where('code', $dev_code);
		$this->db->where('title', $title);
		$this->db->where('isvalid', 1);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getapptestCount($searchText = '', $show = ''){
		$this->db->select('t1.timestamp as timestamp, t2.test_title as test_title, t1.pic as pic, t1.id as id');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.test_title LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
				OR t1.code LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($show)) {
			$this->db->where($show);
		}
		$this->db->where('t1.app', 0);
		$this->db->group_by('t1.unixtime');
		$this->db->group_by('t1.code');
		$this->db->order_by('t1.timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getapptest($searchText = '', $show = '', $page, $segment){
		$this->db->select('t1.timestamp as timestamp, t2.test_title as test_title, t1.pic as pic, t1.id as id, t1.code as code');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.test_title LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
				OR t1.code LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($show)) {
			$this->db->where($show);
		}
		$this->db->where('t1.app', 0);
		$this->db->group_by('t1.unixtime');
		$this->db->group_by('t1.code');
		$this->db->order_by('t1.timestamp', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function device_app(){
		$this->db->select('*');
		$this->db->from('tbl_alldev_app');
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function cekdevice_app($name, $dev_code){
		$this->db->select('*');
		$this->db->from('tbl_alldev_app');
		$this->db->where('code', $dev_code);
		$this->db->where('uName', $name);
		$this->db->where('isvalid', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function approvetestdoc($resultdata, $code, $unixtime){
		$this->db->where('code', $code);
		$this->db->where('unixtime', $unixtime);
		$this->db->update('form_testresult', $resultdata);
		return TRUE;
	}
	function getmyappdevice($name){
		$this->db->select('*');
		$this->db->from('tbl_alldev_app');
		$this->db->where('uName', $name);
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getusers(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$this->db2->order_by('NIK', 'ASC');
		$query = $this->db2->get();
		return $query->result();
	}
	function adddevpicsetting($picinfo){
		$this->db->trans_start();
		$this->db->insert('tbl_alldev_app', $picinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function deldevpicsetting($picinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('tbl_alldev_app', $picinfo);
		return TRUE;
	}
	function workshopdevCount($searchText = '', $selclass = ''){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR param1 LIKE '%".$searchText."%'
				OR param2 LIKE '%".$searchText."%'
				OR param3 LIKE '%".$searchText."%'
				OR param4 LIKE '%".$searchText."%'
				OR param5 LIKE '%".$searchText."%'
				OR param6 LIKE '%".$searchText."%'
				OR param7 LIKE '%".$searchText."%'
				OR param8 LIKE '%".$searchText."%'
				OR param9 LIKE '%".$searchText."%'
				OR param10 LIKE '%".$searchText."%'
				OR param11 LIKE '%".$searchText."%'
				OR param12 LIKE '%".$searchText."%'
				OR param13 LIKE '%".$searchText."%'
				OR param14 LIKE '%".$searchText."%'
				OR param15 LIKE '%".$searchText."%'
				OR pm LIKE '%".$searchText."%'
				OR activity LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
				OR pos LIKE '%".$searchText."%'
				OR usage LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($selclass)){$this->db->where('(code LIKE "'.$selclass.'%")');}
		$this->db->where('isvalid', 1);
		$this->db->where('pos', 'Workshop (repair)');
		$this->db->order_by('updateon','ASC');
		$query = $this->db->get();
		return $query->num_rows();
    }
	function workshopdev($searchText = '', $selclass = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR param1 LIKE '%".$searchText."%'
				OR param2 LIKE '%".$searchText."%'
				OR param3 LIKE '%".$searchText."%'
				OR param4 LIKE '%".$searchText."%'
				OR param5 LIKE '%".$searchText."%'
				OR param6 LIKE '%".$searchText."%'
				OR param7 LIKE '%".$searchText."%'
				OR param8 LIKE '%".$searchText."%'
				OR param9 LIKE '%".$searchText."%'
				OR param10 LIKE '%".$searchText."%'
				OR param11 LIKE '%".$searchText."%'
				OR param12 LIKE '%".$searchText."%'
				OR param13 LIKE '%".$searchText."%'
				OR param14 LIKE '%".$searchText."%'
				OR param15 LIKE '%".$searchText."%'
				OR pm LIKE '%".$searchText."%'
				OR activity LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
				OR pos LIKE '%".$searchText."%'
				OR usage LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($selclass)){$this->db->where('(code LIKE "'.$selclass.'%")');}
		$this->db->where('isvalid', 1);
		$this->db->where('pos', 'Workshop (repair)');
		$this->db->order_by('isready','ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getwdevCount(){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->where('(isready = 0 OR isready = 2)');
		$this->db->where('pos', 'Workshop (repair)');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getwdevreadyCount(){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$this->db->where('isready = 1');
		$this->db->where('pos', 'Workshop (repair)');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function devidenCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('tbl_alldev_iden');
		if(!empty($searchText)) {
			$likeCriteria = "(
				iden_name LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function deviden($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('tbl_alldev_iden');
		if(!empty($searchText)) {
			$likeCriteria = "(
				iden_name LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('iden_name', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function adddeviden($devinfo){
		$this->db->trans_start();
		$this->db->insert('tbl_alldev_iden', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editdeviden($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('tbl_alldev_iden', $devinfo);
		return TRUE;
	}
	function getidenbyid($iden_id){
		$this->db->select('*');
		$this->db->from('tbl_alldev_iden');
		$this->db->where('id', $iden_id);
		$query = $this->db->get();
		$this->db->limit(1);
		$result = $query->row();
		return $result;
	}
	function getidenlist(){
		$this->db->select('*');
		$this->db->from('tbl_alldev_iden');
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdevticket($id, $sts){
		$this->db->select('*');
		$this->db->from('repair_ticket');
		$this->db->where('dev_id', $id);
		if($sts == 0){
			$this->db->where('isopen', 1);
		}else{
			$this->db->where('isopen', 0);
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getticketact($id){
		$this->db->select('*');
		$this->db->from('repair_act');
		$this->db->where('ticket_id', $id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addrepairticket($ticket){
		$this->db->trans_start();
		$this->db->insert('repair_ticket', $ticket);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function devrepairCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('repair_defaultact');
		if(!empty($searchText)) {
			$likeCriteria = "(
				act LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function devrepair($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('repair_defaultact');
		if(!empty($searchText)) {
			$likeCriteria = "(
				act LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('act', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function adddevrepair($devinfo){
		$this->db->trans_start();
		$this->db->insert('repair_defaultact', $devinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editdevrepair($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('repair_defaultact', $devinfo);
		return TRUE;
	}
	function getticketbyid($id){
		$this->db->select('t2.code as code, t1.pic as pic, t1.id as id');
		$this->db->from('repair_ticket as t1');
		$this->db->join('tbl_alldevice as t2', 't1.dev_id = t2.id');
		$this->db->where('t1.id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getactrepair(){
		$this->db->select('*');
		$this->db->from('repair_defaultact');
		$this->db->where('isvalid', 1);
		$this->db->order_by('act', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addactticket($ticketact){
		$this->db->trans_start();
		$this->db->insert('repair_act', $ticketact);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editrepairticket($devinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('repair_ticket', $devinfo);
		return TRUE;
	}
	function getallapptestCount($searchText = '', $show = ''){
		$this->db->select('t1.timestamp as timestamp, t2.test_title as test_title, t1.pic as pic, t1.id as id');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.test_title LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
				OR t1.code LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($show)) {
			$this->db->where($show);
		}
		$this->db->group_by('t1.unixtime');
		$this->db->group_by('t1.code');
		$this->db->order_by('t1.timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getallapptest($searchText = '', $show = '', $page, $segment){
		$this->db->select('t1.timestamp as timestamp, t2.test_title as test_title, t1.pic as pic, t1.id as id, t1.code as code');
		$this->db->from('form_testresult as t1');
		$this->db->join('elec_testform as t2','t2.id = t1.test_id');
		if(!empty($searchText)) {
			$likeCriteria = "(
				t2.test_title LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
				OR t1.code LIKE '%".$searchText."%'
			)";
			$this->db->where($likeCriteria);
		}
		if(!empty($show)) {
			$this->db->where($show);
		}
		$this->db->group_by('t1.unixtime');
		$this->db->group_by('t1.code');
		$this->db->order_by('t1.timestamp', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
