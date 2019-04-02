<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Toolpm_model extends CI_Model{
	function toolpmsetCount($searchText = ''){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		if(!empty($searchText)){
			$likeCriteria = "(
							id LIKE '%".$searchText."%'
							OR name LIKE '%".$searchText."%'
							OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR pmfreq LIKE '%".$searchText."%'
							OR pmstart LIKE '%".$searchText."%'
							)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('id', 'ASC');
		$query = $this->db2->get();
		return $query->num_rows();
    }
	function toolpmset($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		if(!empty($searchText)){
			$likeCriteria = "(
							id LIKE '%".$searchText."%'
							OR name LIKE '%".$searchText."%'
							OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR pmfreq LIKE '%".$searchText."%'
							OR pmstart LIKE '%".$searchText."%'
							)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('id', 'ASC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result(); 
		return $result;
    }
	function updatepm($toolInfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('tools', $toolInfo);
		return TRUE;
	}
	function getplanner(){
		$nowdate = date("U");
		$next30 = $nowdate + 2592000;
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		$this->db2->where('isvalid', 1);
		$this->db2->where('pmsts', 1);
		$this->db2->where('pmstart <=', $next30);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function addpmplan($plannerInfo){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('pmticket', $plannerInfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function updateticket($plannerInfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('toolid', $id);
		$this->db2->update('pmticket', $plannerInfo);
		return TRUE;
	}
	function toolscheduleCount($searchText, $fromDate, $toDate){
		$nowdate = date("U");
		$nowdate = $nowdate - ($nowdate % 86400) - 7*86400;
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		if(!empty($searchText)){
			$likeCriteria = "(
							id LIKE '%".$searchText."%'
							OR toolid LIKE '%".$searchText."%'
							OR name LIKE '%".$searchText."%'
							OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR vis LIKE '%".$searchText."%'
							OR func LIKE '%".$searchText."%'
							OR result LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "exedate >= '".date('U',strtotime($fromDate))."'";
			$this->db2->where($likeCriteria);
		}
		if(!empty($toDate)){
			$likeCriteria = "exedate <= '".date('U',strtotime($toDate))."'";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('exedate >=', $nowdate);
		$this->db2->where('isValid', 1);
		$this->db2->from('pmticket');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function toolschedule($searchText, $fromDate, $toDate, $page, $segment){
		$nowdate = date("U");
		$nowdate = $nowdate - ($nowdate % 86400) - 7*86400;
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		if(!empty($searchText)){
			$likeCriteria = "(
							id LIKE '%".$searchText."%'
							OR toolid LIKE '%".$searchText."%'
							OR name LIKE '%".$searchText."%'
							OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR vis LIKE '%".$searchText."%'
							OR func LIKE '%".$searchText."%'
							OR result LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "exedate >= '".date('U',strtotime($fromDate))."'";
			$this->db2->where($likeCriteria);
		}
		if(!empty($toDate)){
			$likeCriteria = "exedate <= '".date('U',strtotime($toDate))."'";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('exedate >=', $nowdate);
		$this->db2->where('isValid', 1);
		$this->db2->from('pmticket');
		$this->db2->limit($page, $segment);
		$this->db2->order_by('exedate', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function toolresultCount($searchText, $fromDate, $toDate){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('t1.ticket_id as ticket_id, t2.exedate as exedate, t1.unixtime as unixtime, t2.doctitle as doctitle, t2.toolid as toolid, t2.name as name, t2.brand as brand, t2.size as size, t1.id as id');
		$this->db2->from('pmformresult as t1');
		$this->db2->join('pmticket as t2','t2.id = t1.ticket_id');
		if(!empty($searchText)) {
			$likeCriteria = "(
							OR t2.name LIKE '%".$searchText."%'
							OR t2.brand LIKE '%".$searchText."%'
							OR t2.size LIKE '%".$searchText."%'
							OR t2.doctitle LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "t2.exedate >= '".date('U',strtotime($fromDate))."'";
			$this->db2->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "t2.exedate <= '".date('U',strtotime($toDate))."'";
			$this->db2->where($likeCriteria);
		}
		$this->db2->group_by('t1.ticket_id');
		$this->db2->order_by('t1.unixtime', 'DESC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function toolresult($searchText, $fromDate, $toDate, $page, $segment){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('t1.ticket_id as ticket_id, t2.exedate as exedate, t1.unixtime as unixtime, t2.doctitle as doctitle, t2.toolid as toolid, t2.name as name, t2.brand as brand, t2.size as size, t1.id as id');
		$this->db2->from('pmformresult as t1');
		$this->db2->join('pmticket as t2','t2.id = t1.ticket_id');
		if(!empty($searchText)) {
			$likeCriteria = "(
							OR t2.name LIKE '%".$searchText."%'
							OR t2.brand LIKE '%".$searchText."%'
							OR t2.size LIKE '%".$searchText."%'
							OR t2.doctitle LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		if(!empty($fromDate)){
			$likeCriteria = "t2.exedate >= '".date('U',strtotime($fromDate))."'";
			$this->db2->where($likeCriteria);
		}
		if(!empty($toDate)) {
			$likeCriteria = "t2.exedate <= '".date('U',strtotime($toDate))."'";
			$this->db2->where($likeCriteria);
		}
		$this->db2->group_by('t1.ticket_id');
		$this->db2->order_by('t1.unixtime', 'DESC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function detailtool($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		$this->db2->where('isvalid', 1);
		$this->db2->where('id',$id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function detailtoolpmCount($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmformresult');
		$this->db2->where('toolid',$id);
		$this->db2->group_by('ticket_id');
		$this->db2->order_by('unixtime', 'DESC');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function detailtoolpm($id, $page, $segment ){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmformresult');
		$this->db2->where('toolid',$id);
		$this->db2->group_by('ticket_id');
		$this->db2->order_by('unixtime', 'DESC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function todayscheduleCount($searchText=NULL){
		$nowdate = date("U");
		$using = $nowdate - ($nowdate % 86400);
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		if(!empty($searchText)){
			$likeCriteria = "(
							id LIKE '%".$searchText."%'
							OR toolid LIKE '%".$searchText."%'
							OR name LIKE '%".$searchText."%'
							OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR vis LIKE '%".$searchText."%'
							OR func LIKE '%".$searchText."%'
							OR result LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('exedate', $using);
		$this->db2->where('isValid', 1);
		$this->db2->from('pmticket');
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function todayschedule($searchText,$page, $segment){
		$nowdate = date("U");
		$using = $nowdate - ($nowdate % 86400);
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		if(!empty($searchText)){
			$likeCriteria = "(
							id LIKE '%".$searchText."%'
							OR toolid LIKE '%".$searchText."%'
							OR name LIKE '%".$searchText."%'
							OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR vis LIKE '%".$searchText."%'
							OR func LIKE '%".$searchText."%'
							OR result LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('exedate =', $using);
		$this->db2->from('pmticket');
		$this->db2->where('isValid', 1);
		$this->db2->order_by('exedate', 'ASC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function getpmticketbyid($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmticket');
		$this->db2->where('id',$id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function detailform($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmticket');
		$this->db2->where('id',$id);
		$this->db2->where('isValid',1);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function editform($formInfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('pmticket', $formInfo);
		return TRUE;
	}
	function tooltestCount($searchText = ''){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmform');
		$this->db2->where('isvalid', 1);
		if(!empty($searchText)) {
			$likeCriteria = "(
				title LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->group_by('title');
		$query = $this->db2->get();
		$result = $query->num_rows();
		return $result;
	}
	function tooltest($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmform');
		$this->db2->where('isvalid', 1);
		if(!empty($searchText)) {
			$likeCriteria = "(
				title LIKE '%".$searchText."%'
			)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->group_by('title');
		$this->db2->order_by('title', 'ASC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function addpmform($forminfo){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('pmform', $forminfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function getpmformbyid($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmform');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function getpmform($title){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmform');
		$this->db2->where('title', $title);
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('cond', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function getimageadd($title){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmformpic');
		$this->db2->where('title', $title);
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('id', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function edittestparam($forminfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('pmform', $forminfo);
		return TRUE;
	}
	function adddevtest($forminfo){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('pmform', $forminfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function gettestformID($title){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmform');
		$this->db2->where('title', $title);
		$this->db2->where('isvalid', 1);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function gettooldetail($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row(); 
		return $result;
    }
	function getallpmform(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmform');
		$this->db2->where('isvalid', 1);
		$this->db2->group_by('title');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function addpmresult($forminfo){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('pmformresult', $forminfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function gettestresultbyid($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmformresult');
		$this->db2->where('id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function getanswer($unix, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('pmformresult');
		$this->db2->where('unixtime', $unix);
		$this->db2->where('pm_id', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	
	
	//======================================================= views/pmtool ===============================================================================
	function getpmtoollist($idgroup, $page, $segment){ 
		$this->db2->select('*');
		$this->db2->from('tools');
		
		$this->db2->where('idgroup', $idgroup);
		$this->db2->group_by('id');
		
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	
	function getpmtool($size, $idgroup, $page, $segment){
		$this->db2->select('*');
		$this->db2->from('tools');

		$this->db2->where('idgroup', $idgroup);
		$this->db2->order_by('name', 'ASC');
	
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	
	function pmtoolCount($idgroup){ //tambahain , $toDate nanti
		$this->db2->select('*');
		$this->db2->from('tools');
	
		//$this->db2->where('idgroup', $idgroup);
		$this->db2->order_by('name', 'ASC');
		
		$query = $this->db2->get();
		return $query->num_rows();
	}
	//==================================================================================================================================================
}
