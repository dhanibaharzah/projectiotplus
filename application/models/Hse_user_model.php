<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Hse_user_model extends CI_Model
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
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
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
	
	//function get_hot_work()
    //{
		//$today_unix = date('U');
		//$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >= '.$today_unix.') OR (start_unix = '.$today_unix.' OR end_unix = '.$today_unix.')';
		//$this->db2 = $this->load->database('hsedb', TRUE);
        //$this->db2->select('*');
		//$this->db2->from('tbl_jsa_main');
		//$this->db2->where('isvalid', 1);
		//$this->db2->where('closed', 0);
		//$this->db2->where('panas', 7);
		//$this->db2->where($where_clause);
        //$query = $this->db2->get();
		//return $query->num_rows();
	function get_hot_work($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$today_unix = date('U');
		$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		if((empty($start)) AND (empty($end))){
			$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >='.$today_unix.') ';
			$this->db2->where($where_clause);
		}
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas', 7);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_at_high($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$today_unix = date('U');
		$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		if((empty($start)) AND (empty($end))){
			$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >='.$today_unix.') ';
			$this->db2->where($where_clause);
		}
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi', 7);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_confined($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$today_unix = date('U');
		$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		if((empty($start)) AND (empty($end))){
			$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >='.$today_unix.') ';
			$this->db2->where($where_clause);
		}
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas', 7);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_digging($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$today_unix = date('U');
		$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		if((empty($start)) AND (empty($end))){
			$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >='.$today_unix.') ';
			$this->db2->where($where_clause);
		}
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian', 7);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_listrik($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$today_unix = date('U');
		$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		if((empty($start)) AND (empty($end))){
			$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >='.$today_unix.') ';
			$this->db2->where($where_clause);
		}
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik', 7);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	function get_general($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$today_unix = date('U');
		$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		if((empty($start)) AND (empty($end))){
			$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >='.$today_unix.') ';
			$this->db2->where($where_clause);
		}
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general', 7);
		
        $query = $this->db2->get();
		return $query->num_rows();
    }
	
	function get_job($start='', $end='', $area='', $type1='', $type2='', $type3='', $type4='', $type5='', $type6='')
    {
		$today_unix = date('U');
		$today_unix = $today_unix - ($today_unix%86400) - 25200;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 0);
		$this->db2->where('saved', 1);
		if((empty($start)) AND (empty($end))){
			$where_clause = '(start_unix <= '.$today_unix.' AND end_unix >='.$today_unix.') ';
			$this->db2->where($where_clause);
		}
		if(!empty($start)){
			$where_clause = 'start_unix >= '.$start;
			$this->db2->where($where_clause);
		}
		if(!empty($end)){
			$where_clause = 'end_unix <= '.$end;
			$this->db2->where($where_clause);
		}
		if(!empty($area)){
			$where_clause = 'area = "'.$area.'"';
			$this->db2->where($where_clause);
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c = '(';
		}
		$where_clause = '';
		if(!empty($type1)){
			$where_clause = 'panas = 7 OR ';
		}
		if(!empty($type2)){
			$where_clause .= 'tinggi = 7 OR ';
		}
		if(!empty($type3)){
			$where_clause .= 'terbatas = 7 OR ';
		}
		if(!empty($type4)){
			$where_clause .= 'penggalian = 7 OR ';
		}
		if(!empty($type5)){
			$where_clause .= 'listrik = 7 OR ';
		}
		if(!empty($type6)){
			$where_clause .= 'general = 7 OR ';
		}
		if(!empty($type1) OR !empty($type2) OR !empty($type3) OR !empty($type4) OR !empty($type5) OR !empty($type6)){
			$where_c .= substr($where_clause,0,-3);
			$where_c .= ')';
			$this->db2->where($where_c);
		}
		$this->db2->where('panas !=', 1);
		$this->db2->where('panas !=', 3);
		$this->db2->where('panas !=', 4);
		$this->db2->where('panas !=', 5);
		$this->db2->where('panas !=', 6);
		
		$this->db2->where('tinggi !=', 1);
		$this->db2->where('tinggi !=', 3);
		$this->db2->where('tinggi !=', 4);
		$this->db2->where('tinggi !=', 5);
		$this->db2->where('tinggi !=', 6);
		
		$this->db2->where('terbatas !=', 1);
		$this->db2->where('terbatas !=', 3);
		$this->db2->where('terbatas !=', 4);
		$this->db2->where('terbatas !=', 5);
		$this->db2->where('terbatas !=', 6);
		
		$this->db2->where('penggalian !=', 1);
		$this->db2->where('penggalian !=', 3);
		$this->db2->where('penggalian !=', 4);
		$this->db2->where('penggalian !=', 5);
		$this->db2->where('penggalian !=', 6);
		
		$this->db2->where('listrik !=', 1);
		$this->db2->where('listrik !=', 3);
		$this->db2->where('listrik !=', 4);
		$this->db2->where('listrik !=', 5);
		$this->db2->where('listrik !=', 6);
		
		$this->db2->where('general !=', 1);
		$this->db2->where('general !=', 3);
		$this->db2->where('general !=', 4);
		$this->db2->where('general !=', 5);
		$this->db2->where('general !=', 6);
		
        $query = $this->db2->get();
		return $query->result();
    }
}

  
