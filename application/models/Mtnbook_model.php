<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mtnbook_model extends CI_Model{
	function ctlogCount($searchText = '', $fromDate, $toDate, $mindata, $maxdata){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(keterangan LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db2->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db2->where($likeCriteria);
        }
		if(!empty($toDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db2->where($likeCriteria);
		}
		if(!empty($mindata)){
			$val = $mindata * 60;
			$this->db2->where('mixing_ct_tilting >=', $val);
        }
		if(!empty($maxdata)){
			$val = $maxdata * 60;
			$this->db2->where('mixing_ct_tilting <=', $val);
        }
		$this->db2->order_by('id','DESC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function ctlog($searchText = '', $fromDate, $toDate, $mindata, $maxdata, $page, $segment){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(keterangan LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db2->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db2->where($likeCriteria);
        }
		if(!empty($toDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db2->where($likeCriteria);
		}
		if(!empty($mindata)){
			$val = $mindata * 60;
			$this->db2->where('mixing_ct_tilting >=', $val);
        }
		if(!empty($maxdata)){
			$val = $maxdata * 60;
			$this->db2->where('mixing_ct_tilting <=', $val);
        }
		$this->db2->order_by('id','DESC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function notesetting($id){
		$this->db->select('*');
		$this->db->from('mtn_range');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->setval;
	}
	function setctnote($info, $id){
		$this->db->where('id', $id);
		$this->db->update('mtn_range', $info);
		return TRUE;
	}
	function getdata_dt_in(){
		$this->db->select('*');
		$this->db->from('plc_downtime');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->id;
	}
	function getdata_dt($id){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$this->db2->where('id >', $id);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function getdetailed($timestamp){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pm_downtime');
		$this->db2->where('date_problems', $timestamp);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function getareabyid($id){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pm_machine_list');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result->name;
	}
	function getmachinebyid($id){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pm_machine_list');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result->name;
	}
	function geteqnamebyid($id){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pm_device');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result->name;
	}
	function getusername($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('NIK', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function getdatabytime($time){
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('plc_downtime');
		$this->db2->where('timestamp', $time);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
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
	function getposisilist(){
		$this->db->select('*');
		$this->db->from('posisi');
		$this->db->where('isvalid', 1);
		$this->db->order_by('posisi', 'ASC');
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
	function add_dt_log($dtinfo){
		$this->db->trans_start();
		$this->db->insert('dt_log', $dtinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function update_ctstatus($timestamp){
		$info = array('interrupt'=>1);
		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->where('timestamp', $timestamp);
		$this->db2->update('plc_downtime', $info);
		return TRUE;
	}
	function dtlogCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('dt_log');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (area LIKE '%$likes%' OR ";
				$uuu.= "eq_name LIKE '%$likes%' OR ";
				$uuu.= "posisi LIKE '%$likes%' OR ";
				$uuu.= "device LIKE '%$likes%' OR ";
				$uuu.= "forereport LIKE '%$likes%' OR ";
				$uuu.= "sym LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function dtlog($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('dt_log');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (area LIKE '%$likes%' OR ";
				$uuu.= "eq_name LIKE '%$likes%' OR ";
				$uuu.= "posisi LIKE '%$likes%' OR ";
				$uuu.= "device LIKE '%$likes%' OR ";
				$uuu.= "forereport LIKE '%$likes%' OR ";
				$uuu.= "sym LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function detaildt($id){
		$this->db->select('*');
		$this->db->from('dt_log');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getdt_csbyid($id){
		$this->db->select('*');
		$this->db->from('dt_cs');
		$this->db->where('parent',$id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdt_docbyid($id){
		$this->db->select('*');
		$this->db->from('dt_doc');
		$this->db->where('parent',$id);
		$this->db->where('isvalid',1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function add_dt_doc($dtinfo){
		$this->db->trans_start();
		$this->db->insert('dt_doc', $dtinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edit_dt_doc($docinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_doc', $docinfo);
		return TRUE;
	}
	function add_dt_cs($dtinfo){
		$this->db->trans_start();
		$this->db->insert('dt_cs', $dtinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edit_dt_cs($dtinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_cs', $dtinfo);
		return TRUE;
	}
	function edit_dt_log($dtinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_log', $dtinfo);
		return TRUE;
	}
	function prg_dtCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('dt_prg');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (prg_name LIKE '%$likes%' OR ";
				$uuu.= "prg_type LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function prg_dt($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('dt_prg');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (prg_name LIKE '%$likes%' OR ";
				$uuu.= "prg_type LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->order_by('id','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getprg_appCount($app1, $app2){
		$this->db->select('*');
		$this->db->from('dt_prg');
		$this->db->where('isvalid', 1);
		$this->db->where('saved', 1);
		$show = '(';
		if($app1 == 1){$show .= ' app1 = 0 OR';}
		if($app1 == 1){$show .= ' app2 = 0 OR';}
		$xx = substr($show, 0, -3);
		$wh = $xx.')';
		if($app1 == 0 and $app2 == 0){$wh = '(app1 = 999)';}
		$this->db->where($wh);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getprg_app(){
		$this->db->select('*');
		$this->db->from('dt_prg');
		$this->db->where('isvalid', 1);
		$this->db->where('saved = 1 and (app1 = 0 or app2 = 0)');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function add_dtprg($prginfo){
		$this->db->trans_start();
		$this->db->insert('dt_prg', $prginfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edit_dtprg($prginfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_prg', $prginfo);
		return TRUE;
	}
	function getprgfile($id){
		$this->db->select('*');
		$this->db->from('dt_prg');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getprgrev($name, $type){
		$this->db->select('*');
		$this->db->from('dt_prg');
		$this->db->where('prg_name',$name);
		$this->db->where('prg_type',$type);
		$this->db->where('isvalid', 1);
		$this->db->order_by('rev', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->rev;
	}
	function dwg_dtCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('dt_dwg');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (dwg_name LIKE '%$likes%' OR ";
				$uuu.= "dwg_type LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function dwg_dt($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('dt_dwg');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (dwg_name LIKE '%$likes%' OR ";
				$uuu.= "dwg_type LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->order_by('id','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdwg_appCount($app1, $app2){
		$this->db->select('*');
		$this->db->from('dt_dwg');
		$this->db->where('isvalid', 1);
		$this->db->where('saved', 1);
		$show = '(';
		if($app1 == 1){$show .= ' app1 = 0 OR';}
		if($app1 == 1){$show .= ' app2 = 0 OR';}
		$xx = substr($show, 0, -3);
		$wh = $xx.')';
		if($app1 == 0 and $app2 == 0){$wh = '(app1 = 999)';}
		$this->db->where($wh);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getdwg_app(){
		$this->db->select('*');
		$this->db->from('dt_dwg');
		$this->db->where('isvalid', 1);
		$this->db->where('saved = 1 and (app1 = 0 or app2 = 0)');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function add_dtdwg($dwginfo){
		$this->db->trans_start();
		$this->db->insert('dt_dwg', $dwginfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edit_dtdwg($dwginfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_dwg', $dwginfo);
		return TRUE;
	}
	function getdwgfile($id){
		$this->db->select('*');
		$this->db->from('dt_dwg');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getdwgrev($name, $type){
		$this->db->select('*');
		$this->db->from('dt_dwg');
		$this->db->where('dwg_name',$name);
		$this->db->where('dwg_type',$type);
		$this->db->where('isvalid', 1);
		$this->db->order_by('rev', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->rev;
	}
	function opr_dtCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (opr_title LIKE '%$likes%' OR ";
				$uuu.= "opr_con LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('opr_title');
		$this->db->group_by('rev');
		$this->db->order_by('opr_title','DESC');
		$this->db->order_by('rev','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function opr_dt($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (opr_title LIKE '%$likes%' OR ";
				$uuu.= "opr_con LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('opr_title');
		$this->db->group_by('rev');
		$this->db->order_by('opr_title','DESC');
		$this->db->order_by('rev','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getopr_appCount($app1, $app2){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('isvalid', 1);
		$this->db->where('saved', 1);
		$show = '(';
		if($app1 == 1){$show .= ' app1 = 0 OR';}
		if($app1 == 1){$show .= ' app2 = 0 OR';}
		$xx = substr($show, 0, -3);
		$wh = $xx.')';
		if($app1 == 0 and $app2 == 0){$wh = '(app1 = 999)';}
		$this->db->where($wh);
		$this->db->group_by('opr_title');
		$this->db->group_by('rev');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getopr_app(){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('isvalid', 1);
		$this->db->where('saved = 1 and (app1 = 0 or app2 = 0)');
		$this->db->group_by('opr_title');
		$this->db->group_by('rev');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function add_dtopr($oprinfo){
		$this->db->trans_start();
		$this->db->insert('dt_opr', $oprinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function check_title($opr_title, $rev=''){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('opr_title',$opr_title);
		if(!empty($rev) or $rev == 0){
			$this->db->where('rev',$rev);
		}
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getotherid($opr_title){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('opr_title',$opr_title);
		$this->db->where('isvalid', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getopr($id){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function edit_opr($oprinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_opr', $oprinfo);
		return TRUE;
	}
	function getoprrev($opr_title, $rev){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('opr_title',$opr_title);
		$this->db->where('rev',$rev);
		$this->db->where('isvalid', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function seq_dtCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)){
			$likeCriteria = " (seq_title LIKE '%$searchText%')";
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('seq_title');
		$this->db->group_by('rev');
		$this->db->order_by('seq_title','DESC');
		$this->db->order_by('rev','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function seq_dt($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)){
			$likeCriteria = " (seq_title LIKE '%$searchText%')";
			$this->db->where($likeCriteria);
		}
		$this->db->group_by('seq_title');
		$this->db->group_by('rev');
		$this->db->order_by('seq_title','DESC');
		$this->db->order_by('rev','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getseq_appCount($app1, $app2){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('isvalid', 1);
		$this->db->where('saved', 1);
		$show = '(';
		if($app1 == 1){$show .= ' app1 = 0 OR';}
		if($app1 == 1){$show .= ' app2 = 0 OR';}
		$xx = substr($show, 0, -3);
		$wh = $xx.')';
		if($app1 == 0 and $app2 == 0){$wh = '(app1 = 999)';}
		$this->db->where($wh);
		$this->db->group_by('seq_title');
		$this->db->group_by('rev');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	function getseq_app(){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('isvalid', 1);
		$this->db->where('saved = 1 and (app1 = 0 or app2 = 0)');
		$this->db->group_by('seq_title');
		$this->db->group_by('rev');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function check_titleseq($seq_title){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('seq_title',$seq_title);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function add_dtseq($seqinfo){
		$this->db->trans_start();
		$this->db->insert('dt_seq', $seqinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getseq($id){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getseqA($seq_title, $rev){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('seq_title',$seq_title);
		$this->db->where('rev',$rev);
		$this->db->where('seq_type',1);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getseqB($seq_title, $rev){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('seq_title',$seq_title);
		$this->db->where('rev',$rev);
		$this->db->where('seq_type',2);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function check_seq($id){
		$this->db->select('*');
		$this->db->from('dt_seqdex');
		$this->db->where('seq_id',$id);
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function seqedittitle($seqinfo, $seq_titlex, $rev){
		$this->db->where('rev', $rev);
		$this->db->where('seq_title', $seq_title);
		$this->db->update('dt_seqdex', $seqinfo);
		return TRUE;
	}
	function add_dtseqdex($seqinfo){
		$this->db->trans_start();
		$this->db->insert('dt_seqdex', $seqinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edit_seqdex($seqinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_seqdex', $seqinfo);
		return TRUE;
	}
	function edit_seq($seqinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_seq', $seqinfo);
		return TRUE;
	}
	function add_download_log($downloadinfo){
		$this->db->trans_start();
		$this->db->insert('download_log', $downloadinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function downloadlogCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('download_log');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (uName LIKE '%$likes%' OR ";
				$uuu.= "file_type LIKE '%$likes%' OR ";
				$uuu.= "file_name LIKE '%$likes%' OR ";
				$uuu.= "file_title LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function downloadlog($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('download_log');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= " (uName LIKE '%$likes%' OR ";
				$uuu.= "file_type LIKE '%$likes%' OR ";
				$uuu.= "file_name LIKE '%$likes%' OR ";
				$uuu.= "file_title LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function logosettingCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('dt_logo');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)){
			$likeCriteria = " (logo_name LIKE '%$searchText%' )";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('logo_type','DESC');
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function logosetting($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('dt_logo');
		$this->db->where('isvalid', 1);
		if(!empty($searchText)){
			$likeCriteria = " (logo_name LIKE '%$searchText%' )";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('logo_type','DESC');
		$this->db->order_by('id','ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function add_logo($logoinfo){
		$this->db->trans_start();
		$this->db->insert('dt_logo', $logoinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function edit_logo($logoinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_logo', $logoinfo);
		return TRUE;
	}
	function getmainlogo(){
		$this->db->select('*');
		$this->db->from('dt_logo');
		$this->db->where('logo_type',1);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result->logo_link;
	}
	function getppelogolist(){
		$this->db->select('*');
		$this->db->from('dt_logo');
		$this->db->where('logo_type >',1);
		$this->db->where('isvalid',1);
		$this->db->where('logo_link IS NOT NULL');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getppelogoused($opr_title, $rev){
		$this->db->select('t1.id as id, t2.logo_name as logo_name, t2.logo_link as logo_link, t1.opr_title as opr_title, t1.ppe_id as ppe_id');
		$this->db->from('dt_oprppe as t1');
		$this->db->join('dt_logo as t2', 't1.ppe_id = t2.id');
		$this->db->where('t1.opr_title',$opr_title);
		$this->db->where('t1.rev',$rev);
		$this->db->where('t1.isvalid',1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function opraddlogo($logoinfo){
		$this->db->trans_start();
		$this->db->insert('dt_oprppe', $logoinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function opreditlogo($logoinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('dt_oprppe', $logoinfo);
		return TRUE;
	}
	function opredittitle1($oprinfo, $opr_title, $rev){
		$this->db->where('rev', $rev);
		$this->db->where('opr_title', $opr_title);
		$this->db->update('dt_oprppe', $oprinfo);
		return TRUE;
	}
	function opredittitle2($oprinfo, $opr_title, $rev){
		$this->db->where('rev', $rev);
		$this->db->where('opr_title', $opr_title);
		$this->db->update('dt_opr', $oprinfo);
		return TRUE;
	}
	function getuserright($uName){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uName', $uName);
		$this->db->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function add_mtnnotif($notif){
		$this->db->trans_start();
		$this->db->insert('dt_appnote', $notif);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getprglist(){
		$this->db->select('*');
		$this->db->from('dt_prg');
		$this->db->where('app2',1);
		$this->db->where('isvalid',1);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdwglist(){
		$this->db->select('*');
		$this->db->from('dt_dwg');
		$this->db->where('app2',1);
		$this->db->where('isvalid',1);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getoprlist(){
		$this->db->select('*');
		$this->db->from('dt_opr');
		$this->db->where('app2',1);
		$this->db->where('isvalid',1);
		$this->db->group_by('opr_title');
		$this->db->group_by('rev');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getseqlist(){
		$this->db->select('*');
		$this->db->from('dt_seq');
		$this->db->where('app2',1);
		$this->db->where('isvalid',1);
		$this->db->group_by('seq_title');
		$this->db->group_by('rev');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function mymtnnotifCount($user, $searchText = '', $fromDate, $toDate){
		$this->db->select('*');
		$this->db->from('dt_appnote');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(note LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
        }
		if(!empty($toDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}
		$this->db->where('uName', $user);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function mymtnnotif($user, $searchText = '', $fromDate, $toDate, $page, $segment){
		$this->db->select('*');
		$this->db->from('dt_appnote');
		if(!empty($searchText)){
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(note LIKE '%$likes%') AND";
			}
			$likeCriteria = '(';
			$likeCriteria .= substr($uuu, 0, -3);
			$likeCriteria .= ')';
			$this->db->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
			$this->db->where($likeCriteria);
        }
		if(!empty($toDate)){
			$likeCriteria = "DATE_FORMAT(timestamp, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
			$this->db->where($likeCriteria);
		}
		$this->db->where('uName', $user);
		$this->db->order_by('id','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
