<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_user_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('NIK', $userId);
        $this->db2->update('users', $userInfo);
        
        return $this->db2->affected_rows();
    }
	
	function updateuser($userId, $userInfo)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('NIK', $userId);
        $this->db2->update('users', $userInfo);
        
        return $this->db2->affected_rows();
    }


    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     */
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfoById($userId)
    {
		$this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $this->db->limit(1);
        $query = $this->db->get();
        
        return $query->row();
    }
	
	function getUserInfoxx($userId)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('NIK', $userId);
        $this->db2->limit(1);
        $query = $this->db2->get();
        
        return $query->row();
    }
	
	function moldtoday($sta, $end)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
	function totalstop($sta, $end)
    {
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
	
	function chartmold($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }
	
	function firstmold($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('sum(mixing_ct_tilting) as sumdata');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" and timestamp <= "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }
	
	function slowspeedCount($sta, $end)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND val > 288 AND val < 576';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	function slowspeed($sta, $end)
    {
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
	function dtimeCount($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 576 AND plan_stop = 0';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	function dtime($sta, $end)
    {
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
	function newcake()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('cutting_per_hour');
		$this->db2->limit(1);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->row();
    }
	function mixing($sta, $end)
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('*');
		$this->db2->from('ctmixing');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'"';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	function problemCount($sta, $end)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 288 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	function problem($sta, $end, $page, $segment)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('*');
		$this->db2->from('plc_downtime');
		$wherecase = 'timestamp >= "'.$sta.'" AND timestamp < "'.$end.'" AND mixing_ct_tilting > 288 AND plan_stop != 1';
		$this->db2->where($wherecase);
		$this->db2->limit($page, $segment);
		$this->db2->order_by('mixing_ct_tilting', 'DESC');
        $query = $this->db2->get();
        return $query->result();
    }
	function problemx($start, $endd)
    {
		$this->db2 = $this->load->database('slcidb', TRUE);
        $this->db2->select('t1.problems as keterangan, t2.name as mech, t1.date_problems as timestamp, t1.duration as duration');
		$this->db2->from('pm_downtime as t1');
		$this->db2->join('pm_machine_list as t2','t2.id = t1.machine_name');
		if(empty($start) or empty($endd)){
			$nowdate = date('U');
			$limiter = $nowdate - 259200;
			$sta = date('Y-m-d H:i:s', $limiter);
			$end = date('Y-m-d H:i:s', $nowdate);
			$whereclause = 't1.date_problems >= "'.$sta.'" and t1.date_problems <= "'.$end.'"';
		}
		if(!empty($start) and !empty($endd)){
			$whereclause = 't1.date_problems >= "'.$start.' 08:00:00" and t1.date_problems <= "'.$endd.' 08:00:00:"';
		}
		$this->db2->where($whereclause);
		$this->db2->order_by('t1.date_problems', 'DESC');
        $query = $this->db2->get();
        return $query->result();
    }
    
    function linrtutorial(){
		
		}

}

  
