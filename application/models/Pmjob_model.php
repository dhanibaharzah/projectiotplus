<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pmjob_model extends CI_Model
{
	function getpmjobCount($type1 = '', $type2 = '', $type3 = '', $searchText = ''){
		$this->db->select('*');
		$this->db->from('project_job');
		if(!empty($searchText)) {
			$likeCriteria = "(
				job_title LIKE '%".$searchText."%'
				OR job_desc LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$whereclause = '';
		if(!empty($type1)){
			$whereclause = ' type = 1 OR';
		}
		if(!empty($type2)){
			$whereclause .= ' type = 2 OR';
		}
		if(!empty($type3)){
			$whereclause .= ' type = 3 OR';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3)){
			$whw = '(';
			$whw .= substr($whereclause,0, -3);
			$whw .= ')';
			$this->db->where($whw);
		}
		$this->db->where('isvalid', 1);
		$this->db->order_by('timestamp','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getpmjob($type1 = '', $type2 = '', $type3 = '', $searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('project_job');
		if(!empty($searchText)) {
			$likeCriteria = "(
				job_title LIKE '%".$searchText."%'
				OR job_desc LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$whereclause = '';
		if(!empty($type1)){
			$whereclause = ' type = 1 OR ';
		}
		if(!empty($type2)){
			$whereclause .= ' type = 2 OR ';
		}
		if(!empty($type3)){
			$whereclause .= ' type = 3 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3)){
			$whw = '(';
			$whw .= substr($whereclause,0, -3);
			$whw .= ')';
			$this->db->where($whw);
		}
		$this->db->where('isvalid', 1);
		$this->db->order_by('timestamp','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function editprojectjob($jobInfo, $id){
		$this->db->where('id', $id);
		$this->db->update('project_job', $jobInfo);
		return TRUE;
    }
	function getpmall($start, $end){
		$this->db->select('*');
		$this->db->from('project_job');
		$this->db->where('isvalid', 1);
		$this->db->where('(type = 1 or type = 2 or type = 3)');
		$whw = '(next >= '.$start.' and next <= '.$end.')';
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	function getpmtic($start, $end){
		$this->db->select('*');
		$this->db->from('project_job');
		$this->db->where('isvalid', 1);
		$whw = '(next >= '.$start.' and next <= '.$end.')';
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	
	
	function getdoclist($frec, $tag){ //checkdoc
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('frec', $frec);
		$this->db->where('tag', $tag);
		$this->db->group_by('code');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdoc($code, $frec, $tag){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('code', $code);
		$this->db->where('frec', $frec);
		$this->db->where('tag', $tag);
		$this->db->order_by('title', 'ASC');
		$this->db->order_by('cond', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdoconly1row($code, $frec, $tag){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('code', $code);
		$this->db->where('frec', $frec);
		$this->db->where('tag', $tag);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function cekpmtoday($time, $code, $result, $freq, $tag){
		$this->db->select('*');
		$this->db->from('form_result');
		$this->db->where('rec_unix', $time);
		$this->db->where('code', $code);
		$this->db->where('freq', $freq);
		$this->db->where('tag', $tag);
		$this->db->where('form_id', $result);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addpmtoday($pminfo){
		$this->db->trans_start();
		$this->db->insert('form_result', $pminfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editpmtoday($pminfo, $time, $code, $result, $freq, $tag){
		$this->db->where('rec_unix', $time);
		$this->db->where('code', $code);
		$this->db->where('freq', $freq);
		$this->db->where('tag', $tag);
		$this->db->where('form_id', $result);
		$this->db->update('form_result', $pminfo);
		return TRUE;
	}
	function ceksheettoday($time, $code, $freq, $tag){
		$this->db->select('*');
		$this->db->from('form_result');
		$this->db->where('rec_unix', $time);
		$this->db->where('code', $code);
		$this->db->where('freq', $freq);
		$this->db->where('tag', $tag);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getdoctoday($code, $frec, $tag){
		$this->db->select('tbl1.id as id, tbl1.code as code, tbl1.frec as frec, tbl1.tag as tag, tbl1.eq_name as eq_name, tbl1.pic as pic, tbl1.title as title, tbl1.cond as cond, tbl1.stand as stand, tbl1.type as type, tbl1.dcode as dcode, tbl1.penum as penum, tbl1.opt as opt, tbl2.input as input');
        $this->db->from('elec_form as tbl1');
        $this->db->join('form_result as tbl2','tbl2.form_id = tbl1.id');
        $this->db->where('tbl1.isvalid', 1);
        $this->db->where('tbl1.code', $code);
        $this->db->where('tbl1.frec', $frec);
        $this->db->where('tbl1.tag', $tag);
		$this->db->order_by('tbl1.title', 'ASC');
		$this->db->order_by('tbl1.cond', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getpmappbox($code, $frec, $tag, $unix){
		$this->db->select('tbl2.app as app, tbl2.form_id as form_id, tbl2.appname as appname, tbl2.appdate as appdate, tbl1.id as id, tbl1.code as code, tbl1.frec as frec, tbl1.tag as tag, tbl1.eq_name as eq_name, tbl1.pic as pic, tbl1.title as title, tbl1.cond as cond, tbl1.stand as stand, tbl1.type as type, tbl2.rec_unix as rec_unix, tbl2.user as user, tbl1.opt as opt, tbl2.input as input, tbl1.min_val as min_val, tbl1.max_val as max_val, tbl1.unit_val as unit_val');
        $this->db->from('elec_form as tbl1');
        $this->db->join('form_result as tbl2','tbl2.form_id = tbl1.id');
        $this->db->where('tbl1.isvalid', 1);
        $this->db->where('tbl1.code', $code);
        $this->db->where('tbl1.frec', $frec);
        $this->db->where('tbl1.tag', $tag);
        $this->db->where('tbl2.rec_unix', $unix);
		$this->db->order_by('tbl1.title', 'ASC');
		$this->db->order_by('tbl1.cond', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function approvepmdoc($resultdata, $code, $freq, $tag, $rec_unix){
		$this->db->where('code', $code);
		$this->db->where('freq', $freq);
		$this->db->where('tag', $tag);
		$this->db->where('rec_unix', $rec_unix);
		$this->db->update('form_result', $resultdata);
		return TRUE;
	}
	function gettagcode($code){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('code', $code);
		$this->db->group_by('tag');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getsubchildcode($code){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('code', $code);
		$this->db->group_by('tag');
		$this->db->group_by('frec');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getfreqcode($code, $tag){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('code', $code);
		$this->db->where('tag', $tag);
		$this->db->group_by('frec');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getallcode(){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->group_by('code');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function pmresultCount($searchText = ''){
		$this->db->select('tbl1.code as code, tbl1.freq as freq, tbl1.tag as tag, tbl1.user as user, tbl1.timestamp as timestamp, tbl2.eq_name as eq_name');
        $this->db->from('form_result as tbl1');
        $this->db->join('elec_form as tbl2','tbl1.form_id = tbl2.id');
		if(!empty($searchText)) {
			$likeCriteria = "(
				tbl1.code LIKE '%".$searchText."%'
				OR tbl2.eq_name LIKE '%".$searchText."%'
				OR tbl1.user LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
        $this->db->group_by('tbl1.code');
        $this->db->group_by('tbl1.freq');
        $this->db->group_by('tbl1.tag');
        $this->db->group_by('tbl1.rec_unix');
		$this->db->order_by('tbl1.timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function pmresult($searchText = '', $page, $segment){
		$this->db->select('tbl1.code as code, tbl1.freq as freq, tbl1.tag as tag, tbl1.user as user, tbl1.timestamp as timestamp, tbl2.eq_name as eq_name, tbl1.app as app');
        $this->db->from('form_result as tbl1');
        $this->db->join('elec_form as tbl2','tbl1.form_id = tbl2.id');
		if(!empty($searchText)) {
			$likeCriteria = "(
				tbl1.code LIKE '%".$searchText."%'
				OR tbl2.eq_name LIKE '%".$searchText."%'
				OR tbl1.user LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
        $this->db->group_by('tbl1.code');
        $this->db->group_by('tbl1.freq');
        $this->db->group_by('tbl1.tag');
        $this->db->group_by('tbl1.rec_unix');
		$this->db->order_by('tbl1.rec_unix', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function taglist($code){
		$this->db->select('*');
		$this->db->from('form_result');
		$this->db->where('code', $code);
		$this->db->group_by('tag');
		$this->db->order_by('tag', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function freclist($code, $tag){
		$this->db->select('*');
		$this->db->from('form_result');
		$this->db->where('code', $code);
		$this->db->where('tag', $tag);
		$this->db->group_by('freq');
		$this->db->order_by('freq', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getalltimeCount($code,$tag, $frec){
		$this->db->select('*');
        $this->db->from('form_result');
        $this->db->where('code', $code);
        $this->db->where('freq', $frec);
        $this->db->where('tag', $tag);
		$this->db->group_by('rec_unix');
		$this->db->order_by('rec_unix', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getalltime($code, $tag, $frec, $page='', $segment=''){
		$this->db->select('*');
        $this->db->from('form_result');
        $this->db->where('code', $code);
        $this->db->where('freq', $frec);
        $this->db->where('tag', $tag);
		$this->db->group_by('rec_unix');
		$this->db->order_by('rec_unix', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getlast_res($code, $tag, $frec){
		$this->db->select('*');
        $this->db->from('form_result');
        $this->db->where('code', $code);
        $this->db->where('freq', $frec);
        $this->db->where('tag', $tag);
		$this->db->group_by('rec_unix');
		$this->db->order_by('rec_unix', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->id;
	}
	function showresult($code, $tag, $frec, $unix_start, $unix_end){
		$this->db->select('tbl1.id as id, tbl1.code as code, tbl1.frec as frec, tbl1.tag as tag, tbl1.eq_name as eq_name, tbl1.pic as pic, tbl1.title as title, tbl1.cond as cond, tbl1.stand as stand, tbl1.type as type, tbl1.dcode as dcode, tbl1.penum as penum, tbl1.opt as opt, tbl2.input as input, tbl2.rec_unix as rec_unix');
        $this->db->from('elec_form as tbl1');
        $this->db->join('form_result as tbl2','tbl2.form_id = tbl1.id');
        $this->db->where('tbl1.isvalid', 1);
        $this->db->where('tbl1.code', $code);
        $this->db->where('tbl1.tag', $tag);
        $this->db->where('tbl1.frec', $frec);
        $this->db->where('tbl2.rec_unix >', $unix_start);
        $this->db->where('tbl2.rec_unix <', $unix_end);
		$this->db->order_by('tbl1.title', 'ASC');
		$this->db->order_by('tbl1.cond', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function showtren($tren){
		$this->db->select('*');
        $this->db->from('form_result');
        $this->db->where('form_id', $tren);
		$this->db->order_by('rec_unix', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function showupdate(){
		$this->db->select('*');
        $this->db->from('form_result');
		$this->db->group_by('rec_unix');
		$this->db->group_by('code');
		$this->db->group_by('tag');
		$this->db->group_by('freq');
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(50);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function editform1($forminfo, $id){
		$this->db->where('id', $id);
		$this->db->update('elec_form', $forminfo);
		return TRUE;
	}
	function editform2($forminfo, $code, $frec, $tag, $title){
		$this->db->where('code', $code);
		$this->db->where('frec', $frec);
		$this->db->where('tag', $tag);
		$this->db->where('title', $title);
		$this->db->update('elec_form', $forminfo);
		return TRUE;
	}
	function addform1($forminfo){
		$this->db->trans_start();
		$this->db->insert('elec_form', $forminfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getallpmcode(){
		$this->db->select('*');
        $this->db->from('elec_form');
		$this->db->group_by('code');
		$this->db->order_by('code', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getcodearea(){
		$this->db->select('*');
        $this->db->from('form_area');
		$this->db->where('type', 1);
		$this->db->order_by('code', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getcodedev(){
		$this->db->select('*');
        $this->db->from('form_area');
		$this->db->where('type', 2);
		$this->db->order_by('code', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getpmcodeCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('form_area');
		if(!empty($searchText)) {
			$likeCriteria = "(
				note LIKE '%".$searchText."%'
				OR code LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->where('type', 2);
		$this->db->order_by('timestamp','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getpmcode($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('form_area');
		if(!empty($searchText)) {
			$likeCriteria = "(
				note LIKE '%".$searchText."%'
				OR code LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->where('type', 2);
		$this->db->order_by('timestamp','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function cekdevcode($code){
		$this->db->select('*');
		$this->db->from('form_area');
		$this->db->where('code', $code);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function adddevcode($newcode){
		$this->db->trans_start();
		$this->db->insert('form_area', $newcode);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editdevcode($newcode, $id){
		$this->db->where('id', $id);
		$this->db->update('form_area', $newcode);
		return TRUE;
	}
	function getcodecount($code){
		$this->db->select('*');
		$this->db->from('elec_form');
		$likeCriteria = "(
			code LIKE '%".$code."%'
			)";
		$this->db->where($likeCriteria);
		$this->db->where('isvalid', 1);
		$this->db->group_by('code');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getpmparam($id){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function alldevlist(){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function paramlist($code){
		$this->db->select('*');
		$this->db->from('set_devparam');
		$this->db->where('isvalid', 1);
		$this->db->where('dev_code', $code);
		$query = $this->db->get();
		return $query->result();
	}
	function submit_devparam($newvalue){
		$this->db->trans_start();
		$this->db->insert('tbl_alldevparam', $newvalue);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
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
	function getarea(){
		$this->db->select('*');
		$this->db->from('form_area');
		$this->db->where('isvalid', 1);
		$this->db->where('type', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function getpiclist(){
		$this->db->select('*');
		$this->db->from('pm_piclist');
		$this->db->where('isvalid', 1);
		$this->db->order_by('code', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function addpicsetting($picinfo){
		$this->db->trans_start();
		$this->db->insert('pm_piclist', $picinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function delpicsetting($picinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('pm_piclist', $picinfo);
		return TRUE;
	}
	
	
	function mypm($user, $unix, $unix2){
		$this->db->select('t1.job_title as job_title, t1.job_desc as job_desc, t1.next as next, t1.id as id, t2.uName as uName, t1.tag as tag, t1.type as type');
		$this->db->from('project_job as t1');
		$this->db->join('pm_piclist as t2','t1.area = t2.code');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('(t1.tag = 1 OR t1.tag = 2) AND (t1.type = 1 OR t1.type = 2)');
		$this->db->where('(t1.tag = t2.tag)');
		$this->db->where('t2.isvalid', 1);
		$this->db->where('t2.uName', $user);
		$whw = '(t1.next >= '.$unix.' and t1.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$this->db->order_by('t1.next', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function mypmcount($user, $unix, $unix2){
		$this->db->select('t1.job_title as job_title, t1.job_desc as job_desc, t1.next as next, t1.id as id, t2.uName as uName');
		$this->db->from('project_job as t1');
		$this->db->join('pm_piclist as t2','t1.area = t2.code');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('(t1.tag = 1 OR t1.tag = 2) AND (t1.type = 1 OR t1.type = 2)');
		$this->db->where('(t1.tag = t2.tag)');
		$this->db->where('t2.isvalid', 1);
		$this->db->where('t2.uName', $user);
		$whw = '(t1.next >= '.$unix.' and t1.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function mypm2($user, $unix, $unix2){
		$this->db->select('t1.job_title as job_title, t1.job_desc as job_desc, t1.next as next, t1.id as id, t2.pic as uName, t1.tag as tag, t1.type as type');
		$this->db->from('project_job as t1');
		$this->db->join('pm_pic as t2','t2.pm_id = t1.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		$this->db->where('t2.pic', $user);
		$whw = '(t1.next >= '.$unix.' and t1.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$this->db->order_by('t1.next', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function mypmcount2($user, $unix, $unix2){
		$this->db->select('t1.job_title as job_title, t1.job_desc as job_desc, t1.next as next, t1.id as id, t2.pic as uName');
		$this->db->from('project_job as t1');
		$this->db->join('pm_pic as t2','t2.pm_id = t1.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		$this->db->where('t2.pic', $user);
		$whw = '(t1.next >= '.$unix.' and t1.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getformlist($id){
		$this->db->select('*');
		$this->db->from('project_form');
		$this->db->where('isvalid', 1);
		$this->db->where('project_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getpmsummaryCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('elec_form');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR eq_name LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->group_by('code');
		$this->db->group_by('frec');
		$this->db->group_by('tag');
		$this->db->order_by('code', 'ASC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getpmsummary($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('elec_form');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR eq_name LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->group_by('code');
		$this->db->group_by('frec');
		$this->db->group_by('tag');
		$this->db->order_by('code', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function pmtodayCount($unix, $unix2){
		$this->db->select('t1.code as code, t1.eq_name as eq_name, t2.next as next, t2.type as type, t2.tag as tag, t2.area as area');
		$this->db->from('project_form as t1');
		$this->db->join('project_job as t2','t1.project_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		$whw = '(t2.next >= '.$unix.' and t2.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function pmtoday($unix, $unix2, $page, $segment){
		$this->db->select('t1.code as code, t1.eq_name as eq_name, t2.next as next, t2.type as type, t2.tag as tag, t2.area as area, t2.id as id');
		$this->db->from('project_form as t1');
		$this->db->join('project_job as t2','t1.project_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		$whw = '(t2.next >= '.$unix.' and t2.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		return $query->result();
	}
	function getpicarea($code, $tag){
		$this->db->select('*');
		$this->db->from('pm_piclist');
		$this->db->where('code', $code);
		$this->db->where('tag', $tag);
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getresultof($unix, $code, $tag, $frec){
		$this->db->select('*');
		$this->db->from('form_result');
		$this->db->where('rec_unix', $unix);
		$this->db->where('code', $code);
		$this->db->where('freq', $frec);
		$this->db->where('tag', $tag);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function pmprogtoday($unix, $unix2){
		$this->db->select('t1.code as code, t1.eq_name as eq_name, t2.next as next, t2.type as type, t2.tag as tag, t2.area as area');
		$this->db->from('project_form as t1');
		$this->db->join('project_job as t2','t1.project_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		$whw = '(t2.next >= '.$unix.' and t2.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$this->db->order_by('t2.next', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function pmprogtodaytag($tag, $unix, $unix2){
		$this->db->select('t1.code as code, t1.eq_name as eq_name, t2.next as next, t2.type as type, t2.tag as tag, t2.area as area');
		$this->db->from('project_form as t1');
		$this->db->join('project_job as t2','t1.project_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t1.tag', $tag);
		$this->db->where('t2.isvalid', 1);
		$whw = '(t2.next >= '.$unix.' and t2.next <= '.$unix2.')' ;
		$this->db->where($whw);
		$this->db->order_by('t2.next', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function addskipped($skipinfo){
		$this->db->trans_start();
		$this->db->insert('skipped_pm', $skipinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function pmskippedCount($searchText = '', $fromDate, $toDate){
		$this->db->select('*');
		$this->db->from('skipped_pm');
		if(!empty($searchText)) {
			$likeCriteria = "(
				eq_name LIKE '%".$searchText."%'
				OR code LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$whereclause = '';
		if(!empty($fromDate)){
			$this->db->where('(unixtime >= '.$fromDate.')');
		}
		if(!empty($toDate)){
			$this->db->where('(unixtime <= '.$toDate.')');
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function pmskipped($searchText = '', $fromDate, $toDate, $page, $segment){
		$this->db->select('*');
		$this->db->from('skipped_pm');
		if(!empty($searchText)) {
			$likeCriteria = "(
				eq_name LIKE '%".$searchText."%'
				OR code LIKE '%".$searchText."%'
				OR pic LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$whereclause = '';
		if(!empty($fromDate)){
			$this->db->where('(unixtime >= '.$fromDate.')');
		}
		if(!empty($toDate)){
			$this->db->where('(unixtime <= '.$toDate.')');
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getpicmode(){
		$this->db->select('*');
		$this->db->from('pic_mode');
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function updatemode($info){
		$this->db->where('id', 1);
		$this->db->update('pic_mode', $info);
		return TRUE;
	}
	function addpicpm($picInfo){
		$this->db->trans_start();
		$this->db->insert('pm_pic', $picInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getpicpm($id){
		$this->db->select('*, pic as uName');
		$this->db->from('pm_pic');
		$this->db->where('pm_id', $id);
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function delpicpm($jobInfo, $id){
		$this->db->where('id', $id);
		$this->db->update('pm_pic', $jobInfo);
		return TRUE;
	}
	function getlogolist(){
		$this->db->select('*');
		$this->db->from('dt_logo');
		$this->db->where('isvalid', 1);
		$this->db->where('logo_type >', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function getusedlogo($code, $freq, $tag){
		$this->db->select('t1.id as id, t2.logo_name as logo_name, t2.logo_link as logo_link, t1.logo_id as logo_id');
		$this->db->from('elec_safelogo as t1');
		$this->db->join('dt_logo as t2', 't1.logo_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t1.code', $code);
		$this->db->where('t1.freq', $freq);
		$this->db->where('t1.tag', $tag);
		$query = $this->db->get();
		return $query->result();
	}
	function addnewlogo($newlogo){
		$this->db->trans_start();
		$this->db->insert('elec_safelogo', $newlogo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editlogo($newlogo, $id){
		$this->db->where('id', $id);
		$this->db->update('elec_safelogo', $newlogo);
		return TRUE;
	}
	function getapppmCount($searchText = '', $tagging = ''){
		$this->db->select('*');
		$this->db->from('form_result as t1');
		$this->db->join('elec_form as t2', 't1.form_id = t2.id');
		if(!empty($searchText)){
			$likeCriteria = "(
				t2.eq_name LIKE '%".$searchText."%'
				OR t2.code LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('t1.app', 3);
		if(!empty($tagging)){
			$this->db->where('t1.tag', $tagging);
		}
		$this->db->group_by('t1.rec_unix', 1);
		$this->db->group_by('t1.code', 1);
		$this->db->group_by('t1.tag', 1);
		$this->db->group_by('t1.freq', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getapppm($searchText = '', $tagging = '', $page, $segment){
		$this->db->select('t1.id as id, t1.code as code, t1.freq as freq, t1.tag as tag, t1.user as user, t1.form_id as form_id, t2.eq_name as eq_name, t1.timestamp as timestamp, t1.rec_unix as unix');
		$this->db->from('form_result as t1');
		$this->db->join('elec_form as t2', 't1.form_id = t2.id');
		if(!empty($searchText)){
			$likeCriteria = "(
				t2.eq_name LIKE '%".$searchText."%'
				OR t2.code LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('(t1.app = 3 or t1.app = 2)');
		if(!empty($tagging)){
			$this->db->where('t1.tag', $tagging);
		}
		$this->db->group_by('t1.rec_unix', 1);
		$this->db->group_by('t1.code', 1);
		$this->db->group_by('t1.tag', 1);
		$this->db->group_by('t1.freq', 1);
		$this->db->order_by('t1.rec_unix','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getapppmbyid($id){
		$this->db->select('*');
		$this->db->from('form_result');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getformrespmbyid($id){
		$this->db->select('*');
		$this->db->from('form_result');
		$this->db->where('form_id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getformnamebyid($id){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getunit($code, $freq, $tag){
		$this->db->select('*');
		$this->db->from('unit_data');
		$this->db->where('isvalid', 1);
		$this->db->order_by('unit_name','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function getpmresultauto($unix){
		$this->db->select('*');
        $this->db->from('form_result');
		$this->db->where('app', 0);
		$this->db->where('rec_unix <=', $unix);
		$this->db->group_by('rec_unix');
		$this->db->group_by('code');
		$this->db->group_by('tag');
		$this->db->group_by('freq');
		$this->db->order_by('rec_unix', 'ASC');
		$this->db->limit(10);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function pmrevivalCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('elec_form');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR eq_name LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->group_by('code');
		$this->db->order_by('code', 'ASC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function pmrevival($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('elec_form');
		if(!empty($searchText)) {
			$likeCriteria = "(
				code LIKE '%".$searchText."%'
				OR eq_name LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->group_by('code');
		$this->db->order_by('code', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function geteqname($code){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('code', $code);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
}
