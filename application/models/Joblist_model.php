<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Joblist_model extends CI_Model
{
	function projectjobCount($name, $searchText = ''){
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
		$this->db->where('isvalid', 1);
		$this->db->where('type', 4);
		$this->db->where('addedby', $name);
		$this->db->order_by('timestamp','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function projectjob($name, $searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('project_job');
		if(!empty($searchText)) {
			$likeCriteria = "(
				job_title LIKE '%".$searchText."%'
				OR job_desc LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->where('type', 4);
		$this->db->where('addedby', $name);
		$this->db->order_by('timestamp','DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function projectalljobCount($role, $searchText = ''){
		$this->db->select('*');
		$this->db->from('project_job');
		if(!empty($searchText)) {
			$likeCriteria = "(
				job_title LIKE '%".$searchText."%'
				OR job_desc LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		if($role == 11){
			$this->db->order_by('tag','DESC');
			$this->db->where('((tag = 1 or tag = 101) and isvalid = 1 and type = 4)');
			$this->db->order_by('id','DESC');
		}
		if($role == 12){
			$this->db->order_by('tag','DESC');
			$this->db->where('((tag = 2 or tag = 102) and isvalid = 1 and type = 4)');
			$this->db->order_by('id','DESC');
		}else{
			$this->db->order_by('id','DESC');
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function projectalljob($role, $searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('project_job');
		if(!empty($searchText)) {
			$likeCriteria = "(
				job_title LIKE '%".$searchText."%'
				OR job_desc LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		if($role == 11){
			$this->db->order_by('tag','DESC');
			$this->db->where('((tag = 1 or tag = 101) and isvalid = 1 and type = 4)');
			$this->db->order_by('id','DESC');
		}
		if($role == 12){
			$this->db->order_by('tag','DESC');
			$this->db->where('((tag = 2 or tag = 102) and isvalid = 1 and type = 4)');
			$this->db->order_by('id','DESC');
		}else{
			$this->db->order_by('id','DESC');
		}
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addprojectjob($jobInfo){
		$this->db->trans_start();
		$this->db->insert('project_job', $jobInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function addcostumnotif($note){
		$this->db->trans_start();
		$this->db->insert('project_added', $note);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function editprojectjob($jobInfo, $id){
		$this->db->where('id', $id);
		$this->db->update('project_job', $jobInfo);
		return TRUE;
    }
	function getprojectjob($id){
		$this->db->select('*');
		$this->db->from('project_job');
		$this->db->where('isvalid', 1);
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	//=========================================================document approval====================================================
	function getdocapproval(){
		$this->db->select('*');
        $this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
		
	function docapprovalCount(){ //tambahain , $toDate nanti
			$this->db->select('*');
			$this->db->from('project_doc');
			$query = $this->db->get();
			return $query->num_rows();
	}
		
	function docapproval($page, $segment){ //tambahain , $toDate nanti
		 $this->db->select('*');
		 $this->db->from('project_doc');
		 $this->db->where('isvalid', 1);
		 $this->db->order_by('id', 'DESC');
		 $this->db->limit($page, $segment);
		 $query = $this->db->get();
		 $result = $query->result();        
		 return $result;
	}
	
	function getdocbyid($id){ //tambahain , $toDate nanti
		 $this->db->select('*');
		 $this->db->from('project_doc');
		 $this->db->where('id', $id);
		 $this->db->limit(1);
		 $query = $this->db->get();
		 $result = $query->row();        
		 return $result;
	}
	//=========================================================document approval====================================================	
	
	function gettool(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		$this->db2->group_by('size');
		$this->db2->group_by('name');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function gettoollist($id){
		$this->db->select('*');
		$this->db->from('project_tool');
		$this->db->where('isvalid', 1);
		$this->db->where('project_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addtoolprojectjob($toolInfo){
		$this->db->trans_start();
		$this->db->insert('project_tool', $toolInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function deltoolprojectjob($jobInfo, $id){
		$this->db->where('id', $id);
		$this->db->update('project_tool', $jobInfo);
		return TRUE;
    }
	function searchpart($title){
		$this->db->like('tool', $title , 'both');
		$this->db->order_by('tool', 'ASC');
		$this->db->group_by('tool');
		$this->db->limit(10);
		return $this->db->get('project_part')->result();
    }
	function getpartlist($id){
		$this->db->select('*');
		$this->db->from('project_part');
		$this->db->where('isvalid', 1);
		$this->db->where('project_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addpartprojectjob($partInfo){
		$this->db->trans_start();
		$this->db->insert('project_part', $partInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function delpartprojectjob($jobInfo, $id){
		$this->db->where('id', $id);
		$this->db->update('project_part', $jobInfo);
		return TRUE;
    }
	function getdoclisttype($type){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('frec', $type);
		$this->db->group_by('code');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getdoclisttagtype($tag, $type){
		$this->db->select('*');
		$this->db->from('elec_form');
		$this->db->where('isvalid', 1);
		$this->db->where('frec', $type);
		$this->db->where('tag', $tag);
		$this->db->group_by('code');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
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
	function addformprojectjob($formInfo){
		$this->db->trans_start();
		$this->db->insert('project_form', $formInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function delformprojectjob($jobInfo, $id){
		$this->db->where('id', $id);
		$this->db->update('project_form', $jobInfo);
		return TRUE;
    }
	function getprojectlist($cdprj){
		$cdprj = $cdprj - 10;
		$this->db->select('*');
		$this->db->from('project_job');
		$this->db->where('isvalid', 1);
		$this->db->where('tag', $cdprj);
		$this->db->where('type', 4);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	function getprojectplan($owner, $start, $end){
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('isvalid', 1);
		$this->db->where('app', 0);
		$this->db->where('owner', $owner);
		$whw = 'start >= '.$start.' and end <= '.$end;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	function getprojecttic($owner, $start, $end){
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('isvalid', 1);
		$this->db->where('owner', $owner);
		$whw = 'start >= '.$start.' and start <= '.$end;
		$this->db->where($whw);
		$this->db->order_by('start', 'asc');
		$query = $this->db->get();
		return $query;
	}
	function addticket($ticket){
		$this->db->trans_start();
		$this->db->insert('project_ticket', $ticket);
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
	function userset($userInfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('users', $userInfo);
	}
	function getuserlist($id){
		$this->db->select('*');
		$this->db->from('project_pic');
		$this->db->where('isvalid', 1);
		$this->db->where('ticket_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addprojectuser($pic){
		$this->db->trans_start();
		$this->db->insert('project_pic', $pic);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getticket($id){
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function delschpic($pic, $id){
		$this->db->where('id', $id);
		$this->db->update('project_pic', $pic);
		return TRUE;
    }
	function delticket($pic, $id){
		$this->db->where('id', $id);
		$this->db->update('project_ticket', $pic);
		return TRUE;
    }
	function addprojectdoc($doc){
		$this->db->trans_start();
		$this->db->insert('project_doc', $doc);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getprojectdoc($owner, $docno){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->where('owner', $owner);
		$this->db->where('docno', $docno);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function getprojectdocbyid($id){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->where('reject', 0);
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function updateprojectdoc($owner, $docno, $doc){
		$this->db->where('owner', $owner);
		$this->db->where('docno', $docno);
		$this->db->update('project_doc', $doc);
		return TRUE;
    }
	function getapproval($owner){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->where('owner', $owner);
		$this->db->order_by('timestamp','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function schcheck(){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$idi = "(app1 IS NULL or app2 IS NULL or app3 is NULL)";
		$this->db->where($idi);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function schchecking($start_date, $name){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->where('docno', $start_date);
		$this->db->where('owner', $name);
		$this->db->limit(1);
		$idi = "(app1 IS NULL or app2 IS NULL or app3 is NULL)";
		$this->db->where($idi);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function schcheck_notif(){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->where('notif', 1);
		$idi = "(app1 IS NULL or app2 IS NULL or app3 is NULL)";
		$this->db->where($idi);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function projectdoc_notif0($id){
		$doc = array('notif'=>0);
		$this->db->where('id', $id);
		$this->db->update('project_doc', $doc);
		return TRUE;
    }
	function projectdoc_notif1($id){
		$doc = array('notif'=>1);
		$this->db->where('id', $id);
		$this->db->update('project_doc', $doc);
		return TRUE;
    }
	function getchecker($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		if($id == 1){
			$this->db2->where('cd_role1', 1);
		}
		if($id == 2){
			$this->db2->where('cd_role2', 1);
		}
		if($id == 3){
			$this->db2->where('cd_role3', 1);
		}
		$query = $this->db2->get();
		return $query->result();
	}
	function getuserinfobyuname($uName){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$this->db2->where('uName', $uName);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getuserinfo($NIK){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$this->db2->where('NIK', $NIK);
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function projectdoc_up($doc, $id, $cond){
		if($cond == 1){
			$this->db->where('(app1 IS NULL and app2 IS NULL and app3 IS NULL)');
		}
		if($cond == 2){
			$this->db->where('(app1 IS NOT NULL and app2 IS NULL and app3 IS NULL)');
		}
		if($cond == 3){
			$this->db->where('(app1 IS NOT NULL and app2 IS NOT NULL and app3 IS NULL)');
		}
		$this->db->where('id', $id);
		$this->db->update('project_doc', $doc);
		return TRUE;
    }
	function checkdocapp($id, $cond){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('id', $id);
		$this->db->limit(1);
		if($cond == 2){
			$this->db->where('(app1 IS NOT NULL and app2 IS NULL and app3 IS NULL)');
		}
		if($cond == 3){
			$this->db->where('(app1 IS NOT NULL and app2 IS NOT NULL and app3 IS NULL)');
		}
		$query = $this->db->get();
		return $query->row();
	}
	function create_notif($doc){
		$this->db->trans_start();
		$this->db->insert('project_notif', $doc);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getallnotif(){
		$this->db->select('*');
		$this->db->from('project_notif');
		$this->db->where('notif', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function doc_notif0($id){
		$doc = array('notif'=>0);
		$this->db->where('id', $id);
		$this->db->update('project_notif', $doc);
		return TRUE;
    }
	function getprojectapp($owner, $start, $end){
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('isvalid', 1);
		$this->db->where('app', 1);
		$this->db->where('owner', $owner);
		$whw = 'start >= '.$start.' and end <= '.$end;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	function getprojectall($start, $end){
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('isvalid', 1);
		$this->db->where('app', 1);
		$whw = 'start >= '.$start.' and end <= '.$end;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	function getprojectdocall($docno){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->where('docno', $docno);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function gettabelall($start, $end){
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('isvalid', 1);
		$this->db->where('app', 1);
		$this->db->order_by('owner', 'ASC');
		$this->db->order_by('start', 'ASC');
		$whw = 'start >= '.$start.' and end <= '.$end;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	function getprojectappdocbyid($id){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$this->db->where('reject', 0);
		$this->db->where('unix0 >', 10);
		$this->db->where('unix1 >', 10);
		$this->db->where('unix2 >', 10);
		$this->db->where('unix3 >', 10);
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function add_report($report){
		$this->db->trans_start();
		$this->db->insert('project_result', $report);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function resch($time){
		$this->db->select('*');
		$this->db->from('project_job');
		$this->db->where('(type = 1 and next < '.$time.') or (type = 2 and next < '.$time.') or (type = 3 and next < '.$time.')');
		$query = $this->db->get();
		return $query->result();
	}
	function getpmtabelall($start, $end){
		$this->db->select('*');
		$this->db->from('project_job');
		$this->db->where('isvalid', 1);
		$this->db->order_by('tag', 'ASC');
		$this->db->order_by('repeater', 'ASC');
		$whw = 'next >= '.$start.' and next <= '.$end;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	function serverupdate(){
		$this->db->select('*');
		$this->db->from('project_added');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(50);
		$query = $this->db->get();
		return $query->result();
	}
	function projectapprovalC($searchText = ''){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)) {
			$likeCriteria = "(
				uName LIKE '%".$searchText."%'
				OR NIK LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$query = $this->db2->get();
		return $query->num_rows();
	}
	
	function projectapproval($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)) {
			$likeCriteria = "(
				uName LIKE '%".$searchText."%'
				OR NIK LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$this->db2->order_by('cdprj', 'DESC');
		$this->db2->order_by('cd_role1', 'DESC');
		$this->db2->order_by('cd_role2', 'DESC');
		$this->db2->order_by('cd_role3', 'DESC');
		$this->db2->order_by('applog1', 'DESC');
		$this->db2->order_by('applog2', 'DESC');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		return $query->result();
	}
	function gettabelallnew($start, $end){
		$this->db->select('tbl1.job_title as job_title, tbl1.owner as owner, tbl1.addedby as addedby, tbl2.tag as tag, tbl2.dur as dur, tbl1.id as id, tbl1.start as start, tbl1.end as end');
		$this->db->from('project_ticket as tbl1');
		$this->db->join('project_job as tbl2','tbl1.project_id = tbl2.id');
		$this->db->where('tbl1.isvalid', 1);
		$this->db->where('tbl1.app', 1);
		$this->db->order_by('tbl1.start', 'ASC');
		$whw = 'tbl1.start >= '.$start.' and tbl1.end <= '.$end;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query;
	}
	function myproject($user, $unix){
		$this->db->select('t2.job_title as job_title, t2.owner as owner, t2.addedby as addedby, t2.job_desc as job_desc, t2.start as start, t2.end as end, t2.project_id as project_id, t1.ticket_id as ticket_id, t2.closed as closed');
		$this->db->from('project_pic as t1');
		$this->db->join('project_ticket as t2','t1.ticket_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		$this->db->where('t1.user', $user);
		$this->db->where('t2.app', 1);
		$this->db->order_by('t2.start', 'ASC');
		$whw = 't2.start >= '.$unix;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query->result();
	}
	function myprojectcount($user, $unix){
		$this->db->select('t2.job_title as job_title, t2.owner as owner, t2.addedby as addedby, t2.job_desc as job_desc, t2.start as start, t2.end as end, t2.project_id as project_id, t1.ticket_id as ticket_id');
		$this->db->from('project_pic as t1');
		$this->db->join('project_ticket as t2','t1.ticket_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		$this->db->where('t1.user', $user);
		$this->db->where('t2.app', 1);
		$this->db->order_by('t2.start', 'ASC');
		$whw = 't2.start >= '.$unix;
		$this->db->where($whw);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getpiclist($ticket_id){
		$this->db->select('*');
		$this->db->from('project_pic');
		$this->db->where('ticket_id', $ticket_id);
		$this->db->where('isvalid', 1);
		$this->db->order_by('user', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function getpicbyticket($uname, $ticket_id){
		$this->db->select('*');
		$this->db->from('project_pic');
		$this->db->where('ticket_id', $ticket_id);
		$this->db->where('user', $uname);
		$this->db->where('isvalid', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	function projectresultCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('project_ticket');
		if(!empty($searchText)) {
			$likeCriteria = "(
				job_title LIKE '%".$searchText."%'
				OR addedby LIKE '%".$searchText."%'
				OR owner LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->where('app', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function projectresult($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('project_ticket');
		if(!empty($searchText)) {
			$likeCriteria = "(
				job_title LIKE '%".$searchText."%'
				OR addedby LIKE '%".$searchText."%'
				OR owner LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('isvalid', 1);
		$this->db->where('app', 1);
		$this->db->order_by('start', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		return $query->result();
	}
	function prjresultbypicCount($searchText = '', $user = ''){
		$this->db->select('*');
		$this->db->from('project_ticket as t1');
		$this->db->join('project_pic as t2', 't2.ticket_id = t1.id');
		if(!empty($searchText)) {
			$likeCriteria = "(
				t1.job_title LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		if(!empty($user)){
			$this->db->where('t2.user', $user);
		}
		$this->db->where('t1.app', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function prjresultbypic($searchText = '', $user = '', $page, $segment){
		$this->db->select('t1.project_id as project_id, t1.start as start, t1.end as end, t1.job_title as job_title, t1.job_desc as job_desc, t2.user as user, t1.closed as closed, t1.id as id');
		$this->db->from('project_ticket as t1');
		$this->db->join('project_pic as t2', 't2.ticket_id = t1.id');
		if(!empty($searchText)){
			$likeCriteria = "(
				t1.job_title LIKE '%".$searchText."%'
				)";
			$this->db->where($likeCriteria);
		}
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t2.isvalid', 1);
		if(!empty($user)){
			$this->db->where('t2.user', $user);
		}$this->db->order_by('t1.start', 'DESC');
		$this->db->limit($page, $segment);
		$this->db->where('t1.app', 1);
		$query = $this->db->get();
		return $query->result();
	}
	function totalrep($id){
		$this->db->select('*');
		$this->db->from('project_result');
		$this->db->where('isvalid', 1);
		$this->db->where('ticket_id', $id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function reportdetail($id){
		$this->db->select('*');
		$this->db->from('project_result');
		$this->db->where('isvalid', 1);
		$this->db->where('ticket_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function closeproject($user){
		$start = gmdate('U');
		$start = $start - ($start % 86400);
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('isvalid', 1);
		$this->db->where('owner', $user);
		$this->db->where('app', 1);
		$this->db->where('start >=', $start);
		$this->db->order_by('start', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function closeprojectCount($user){
		$start = gmdate('U');
		$start = $start - ($start % 86400);
		$this->db->select('*');
		$this->db->from('project_ticket');
		$this->db->where('isvalid', 1);
		$this->db->where('owner', $user);
		$this->db->where('app', 1);
		$this->db->where('start >=', $start);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getprjappdocbyrole($cd_role1, $cd_role2, $cd_role3){
		$this->db->select('*');
		$this->db->from('project_doc');
		$this->db->where('isvalid', 1);
		$cond = '(';
		if($cd_role1 == 1){ $cond .= ' app1 is null or';}
		if($cd_role2 == 1){ $cond .= ' app2 is null or';}
		if($cd_role3 == 1){ $cond .= ' app3 is null or';}
		$condition = substr($cond, 0, -3);
		$wh = $condition.')';
		if($cd_role1 == 0 and $cd_role2 == 0 and $cd_role3 == 0){ $wh = '(app3 = "nouser")';}
		$this->db->where($wh);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getreadlist($id){
		$this->db->select('t2.id as iden_id, t2.iden_name as iden_name, t1.id as id, t1.project_id as project_id, t1.iden_id as id_id');
		$this->db->from('project_dev as t1');
		$this->db->join('tbl_alldev_iden as t2', 't1.iden_id = t2.id');
		$this->db->where('t1.isvalid', 1);
		$this->db->where('t1.project_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function getidenlist(){
		$this->db->select('*');
		$this->db->from('tbl_alldev_iden');
		$this->db->where('isvalid', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addidenprojectjob($jobInfo){
		$this->db->trans_start();
		$this->db->insert('project_dev', $jobInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function delreadyprojectjob($jobInfo, $id){
		$this->db->where('id', $id);
		$this->db->update('project_dev', $jobInfo);
		return TRUE;
	}
	function cekdeviceready($iden_id){
		$this->db->select('*');
		$this->db->from('tbl_alldevice');
		$this->db->where('iden_id', $iden_id);
		$this->db->where('isready', 1);
		$this->db->order_by('updateon', 'ASC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function bookdevice($id, $job, $start_date){
		$jobInfo = array('isready'=>2, 'project_id'=>$job, 'start_date'=>$start_date);
		$this->db->where('id', $id);
		$this->db->update('tbl_alldevice', $jobInfo);
		return TRUE;
	}
	function revertdevice($id, $start_date){
		$jobInfo = array('isready'=>1);
		$this->db->where('project_id', $id);
		$this->db->where('start_date', $start_date);
		$this->db->update('tbl_alldevice', $jobInfo);
		return TRUE;
	}
}
