<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
	function dashboard1($userInfo){
		$this->db->trans_start();
		$this->db->insert('ci_chat', $userInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getbugpersen(){
		$this->db->select('*');
		$this->db->from('bug_report');
		$this->db->where('isdone', 1);
		$query = $this->db->get();
		$fin = $query->num_rows();
		
		$this->db->select('*');
		$this->db->from('bug_report');
		$query = $this->db->get();
		$tot = $query->num_rows();
		$persen = ($fin/$tot)*100;
		return $persen;
	}
	function getbugtotal(){
		$this->db->select('*');
		$this->db->from('bug_report');
		$this->db->where('isdone', 0);
		$query = $this->db->get();
		$fin = $query->num_rows();
		return $fin;
	}
	function getbugCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('bug_report');
		if(!empty($searchText)){
			$likeCriteria = "
				(user LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('timestamp', 'ASC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getbug($searchText = '', $page, $segment){
        $this->db->select('*');
		$this->db->from('bug_report');
		if(!empty($searchText)){
			$likeCriteria = "
				(user LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('isdone', 'ASC');
		$this->db->order_by('id', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
    function changePassword($userId, $userInfo){
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('NIK', $userId);
		$this->db2->update('users', $userInfo);
		return $this->db2->affected_rows();
	}
	function changePasswordvendor($userId, $userInfo){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('NIK', $userId);
		$this->db2->update('temp_user', $userInfo);
		return $this->db2->affected_rows();
	}
	function changePasswordcbm($userId, $userInfo){
		$this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->where('NIK', $userId);
		$this->db2->update('users', $userInfo);
		return $this->db2->affected_rows();
	}
	function changePasswordtrial($userId, $userInfo){
		$this->db->where('NIK', $userId);
		$this->db->update('x_user', $userInfo);
		return $this->db->affected_rows();
	}
	function addbug($buginfo){
		$this->db->trans_start();
		$this->db->insert('bug_report', $buginfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function getabnormallityClose(){
		$this->db->select('*');
		$this->db->from('ab_report');
		$this->db->where('isopen', 0);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getabnormallityCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('ab_report');
		if(!empty($searchText)){
			$likeCriteria = "
				(user LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('timestamp', 'ASC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getabnormallity($searchText = '', $page, $segment){
        $this->db->select('*');
		$this->db->from('ab_report');
		if(!empty($searchText)){
			$likeCriteria = "
				(user LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('isopen', 'DESC');
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
	function addab($buginfo){
		$this->db->trans_start();
		$this->db->insert('ab_report', $buginfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function reuploadabn($abinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('ab_report', $abinfo);
		return $this->db->affected_rows();
	}
	function add_abticket($abinfo){
		$this->db->trans_start();
		$this->db->insert('ab_ticket', $abinfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function up_abticket($abinfo, $id){
		$this->db->where('id', $id);
		$this->db->update('ab_ticket', $abinfo);
		return $this->db->affected_rows();
	}
	function close_abticket($abinfo, $id){
		$this->db->where('ab_id', $id);
		$this->db->update('ab_ticket', $abinfo);
		return $this->db->affected_rows();
	}
	function close_ab($buginfo, $id){
		$this->db->where('id', $id);
		$this->db->update('ab_report', $buginfo);
		return $this->db->affected_rows();
	}
	function viewabimage($id){
        $this->db->select('*');
		$this->db->from('ab_report');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
    }
	function getabticketID($ab_id){
		$this->db->select('*');
		$this->db->from('ab_ticket');
		$this->db->where('ab_id', $ab_id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
    }
	function geyuserlogsCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('tbl_last_login');
		if(!empty($searchText)){
			$likeCriteria = "
				(sessionData LIKE '%".$searchText."%'
				OR appname LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}
	function geyuserlogs($searchText = '', $page, $segment){
        $this->db->select('*');
		$this->db->from('tbl_last_login');
		if(!empty($searchText)){
			$likeCriteria = "
				(sessionData LIKE '%".$searchText."%'
				OR appname LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
	function getabdata($id){
        $this->db->select('*');
		$this->db->from('ab_report');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
    }
	function getalluser(){
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >', 90000);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function sendmassline(){
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('lineid IS NOT NULL');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function getuseruid($lineid){
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('lineid', $lineid);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
    }
	function getuserlineid($uName){
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('uName', $uName);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
    }
	function getopenabticket(){
		$this->db->select('*');
		$this->db->from('ab_ticket');
		$this->db->where('isopen', 1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function getopenabbyuser($username){
		$this->db->select('*');
		$this->db->from('ab_ticket');
		$this->db->where('isopen', 1);
		$this->db->where('pic', $username);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
    }
	function getopenabonly(){
		$this->db->select('*');
		$this->db->from('ab_ticket');
		$this->db->where('isopen', 1);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
    }
	function getmyabnormallityCount($searchText = '', $username){
		$this->db->select('*');
		$this->db->from('ab_report');
		if(!empty($searchText)){
			$likeCriteria = "
				(user LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->where('user', $username);
		$this->db->order_by('timestamp', 'ASC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getmyabnormallity($searchText = '', $username, $page, $segment){
        $this->db->select('*');
		$this->db->from('ab_report');
		if(!empty($searchText)){
			$likeCriteria = "
				(user LIKE '%".$searchText."%'
				OR note LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->where('user', $username);
		$this->db->order_by('isopen', 'DESC');
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
	function getmytaskabnormallityCount($searchText = '', $username){
		$this->db->select('t2.id as id, t2.timestamp as timestamp, t2.acsource as acsource, t2.user as user, t2.isopen as isopen');
		$this->db->from('ab_ticket as t1');
		$this->db->join('ab_report as t2', 't1.ab_id = t2.id');
		if(!empty($searchText)){
			$likeCriteria = "
				(t2.user LIKE '%".$searchText."%'
				OR t2.note LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
				OR t1.sug LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->where('t1.pic', $username);
		$this->db->order_by('t2.isopen', 'DESC');
		$this->db->order_by('t1.timestamp', 'ASC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getmytaskabnormallity($searchText = '', $username, $page, $segment){
       $this->db->select('t2.id as id, t2.timestamp as timestamp, t2.acsource as acsource, t2.user as user, t2.isopen as isopen, t2.closeby as closeby, t2.note as note, t2.imglink as imglink');
		$this->db->from('ab_ticket as t1');
		$this->db->join('ab_report as t2', 't1.ab_id = t2.id');
		if(!empty($searchText)){
			$likeCriteria = "
				(t2.user LIKE '%".$searchText."%'
				OR t2.note LIKE '%".$searchText."%'
				OR t1.pic LIKE '%".$searchText."%'
				OR t1.sug LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->where('t1.pic', $username);
		$this->db->order_by('t2.isopen', 'DESC');
		$this->db->order_by('t1.timestamp', 'ASC');
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function userListingCount($searchText = ''){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)){
			$likeCriteria = "(uName  LIKE '%".$searchText."%' OR
							 slcimail  LIKE '%".$searchText."%' OR
							 gmail  LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('NIK >=', 90000);
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function userListing($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)) {
			$likeCriteria = "(uName  LIKE '%".$searchText."%' OR
							 slcimail  LIKE '%".$searchText."%' OR
							 gmail  LIKE '%".$searchText."%')";
			$this->db2->where($likeCriteria);
		}
		$this->db2->where('NIK >=', 90000);
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function adduserexe($userInfo){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('users', $userInfo);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function getUserInfo($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('id', $id);
		$query = $this->db2->get();
		return $query->result();
	}
	function editUser($userInfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('users', $userInfo);
		return TRUE;
	}
	function get_order(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('orders');
		$this->db2->order_by('datecreation', 'DESC');
		$this->db2->limit(20);
		$query = $this->db2->get();
		return $query->result();
	}
	function get_tool(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(20);
		$query = $this->db2->get();
		return $query->result();
	}
	function geyuserlogtoday(){
		$mindata = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('tbl_last_login');
		$this->db->where('createdDtm > "'.$mindata.' 00:00:00"');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function getallupdate(){
		$this->db->select('*');
		$this->db->from('server_update');
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}
	function serverupCount($searchText = ''){
		$this->db->select('*');
		$this->db->from('server_update');
		if(!empty($searchText)){
			$likeCriteria = "(title_note  LIKE '%".$searchText."%' OR
							 linker  LIKE '%".$searchText."%' OR
							 desc  LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}
	function serverup($searchText = '', $page, $segment){
		$this->db->select('*');
		$this->db->from('server_update');
		if(!empty($searchText)) {
			$likeCriteria = "(title_note  LIKE '%".$searchText."%' OR
							 linker  LIKE '%".$searchText."%' OR
							 desc  LIKE '%".$searchText."%')";
			$this->db->where($likeCriteria);
		}
		$this->db->limit($page, $segment);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function addupdatelog($update_log){
		$this->db->trans_start();
		$this->db->insert('server_update', $update_log);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
}

  
