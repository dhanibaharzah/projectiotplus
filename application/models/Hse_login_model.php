<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Hse_login_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function loginMe($username, $password)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.password, BaseTbl.name, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.username', $username);
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->limit(1);
        $query = $this->db->get();
        
        $user = $query->row();
        
        if(!empty($user)){
            if(verifyHashedPassword($password, $user->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
	
	function loginjoin($username, $password)
    {
		$this->db2 = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('BaseTbl.NIK, BaseTbl.uPassword, BaseTbl.uName, BaseTbl.roleId, Roles.role');
        $this->db2->from('users as BaseTbl');
        $this->db2->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db2->where('BaseTbl.NIK', $username);
        $this->db2->where('BaseTbl.uFlag', 1);
        $this->db2->limit(1);
        $query = $this->db2->get();
        
        $user = $query->row();
        
        if(!empty($user)){
			$userpass = md5($password);
            if($userpass == $user->uPassword){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
	function loginexternal($username, $password)
    {
		$this->db2 = $this->load->database('hsedb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('BaseTbl.NIK, BaseTbl.uPassword, BaseTbl.uName, BaseTbl.roleId, Roles.role');
        $this->db2->from('temp_user as BaseTbl');
        $this->db2->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db2->where('BaseTbl.NIK', $username);
        $this->db2->where('BaseTbl.uFlag', 1);
        $this->db2->limit(1);
        $query = $this->db2->get();
        
        $user = $query->row();
        
        if(!empty($user)){
			$userpass = $password;
            if($userpass == $user->uPassword){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
	function check_permit($app1,$app2,$app3,$app4,$app5)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permit');
		$this->db2->where('isvalid', 1);
		$this->db2->where('notif', 1);
		$this->db2->where('app1', $app1);
		$this->db2->where('app2', $app2);
		$this->db2->where('app3', $app3);
		$this->db2->where('app4', $app4);
		$this->db2->where('app5', $app5);
        $query = $this->db2->get();
		return $query->result();
    }
	function check_permitsaved($app1,$app2,$app3,$app4,$app5)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permit');
		$this->db2->where('isvalid', 1);
		$this->db2->where('app1', $app1);
		$this->db2->where('app2', $app2);
		$this->db2->where('app3', $app3);
		$this->db2->where('app4', $app4);
		$this->db2->where('app5', $app5);
        $query = $this->db2->get();
		return $query->result();
    }
	function check_permit_id($app1,$app2,$app3,$app4,$app5, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permit');
		$this->db2->where('id', $id);
		$this->db2->where('isvalid', 1);
		$this->db2->where('app1', $app1);
		$this->db2->where('app2', $app2);
		$this->db2->where('app3', $app3);
		$this->db2->where('app4', $app4);
		$this->db2->where('app5', $app5);
		$this->db2->limit(1);
        $query = $this->db2->get();
		return $query->row();
    }
	function get_permit($ids)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permit');
		$this->db2->where('id', $ids);
		$this->db2->limit(1);
        $query = $this->db2->get();
		return $query->row();
    }
	function get_permit_cek($jsa_id, $type)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permit');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $jsa_id);
        $this->db2->where('permit_type', $type);
		$this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_jsa($ida)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('id', $ida);
		$this->db2->limit(1);
        $query = $this->db2->get();
		return $query->row();
    }

    function get_rep($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permit');
		$this->db2->where('id', $id);
        $query = $this->db2->get();
		return $query->row()->jsa_id;
    }

	function get_override($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permitoverride');
		$this->db2->where('jsa_id', $id);
        $query = $this->db2->get();
		return $query->result();
    }
	function get_apd($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permitapd');
		$this->db2->where('jsa_id', $id);
        $query = $this->db2->get();
		return $query->result();
    }
	function get_loto($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permitloto');
		$this->db2->where('jsa_id', $id);
        $query = $this->db2->get();
		return $query->result();
    }
	function get_tool($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permittool');
		$this->db2->where('jsa_id', $id);
        $query = $this->db2->get();
		return $query->result();
    }
	function get_energy($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permitenergy');
		$this->db2->where('jsa_id', $id);
        $query = $this->db2->get();
		return $query->result();
    }
	function get_checklist($permit_type)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_checklist');
        $this->db2->where('isvalid', 1);
		$whw = 'permit_type = "'.$permit_type.'"';
        $this->db2->where($whw);
        $this->db2->order_by('id', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_emailbyname($uname)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('uName', $uname);
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_emailbyvendor($uname)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('temp_user');
        $this->db2->where('uName', $uname);
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_emailbyNIK($nik)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('NIK', $nik);
        $this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_emailbyNAMA($nik)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('uName', $nik);
        $this->db2->limit(1);
        
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function get_emailbyrole($hse_role)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('hse_role', $hse_role);
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_emailbypicar($hse_picar)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('hse_picar', $hse_picar);
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_activity($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_iden');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		$this->db2->order_by('no', 'ASC');
		$this->db2->order_by('id', 'ASC');
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_worker($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_worker');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function edit_permit($permitInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_permit', $permitInfo);
		
        return TRUE;
    }
    
    function insert_gas($monitorInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        //$this->db2->where('jsa_id', $id)
        $this->db2->insert('tbl_monitor', $monitorInfo);
        $insert_id = $this->db2->insert_id();
        return $insert_id;
    }

    function edit_blood($bloodinfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('tbl_jsa_worker', $bloodinfo);
       
		return TRUE;
    }
	function update_jsa($jsaInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_jsa_main', $jsaInfo);
		
        return TRUE;
    }
	function get_report($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_monitor');
        $this->db2->where('isvalid', 1);
        $this->db2->where('jsa_id', $id);
		
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function add_report($reportInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_monitor', $reportInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function get_jsa_close()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed', 1);
        $query = $this->db2->get();
		return $query->result();
    }
	function get_jsa_close_notif()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('isvalid', 1);
		$this->db2->where('closed_notif', 1);
        $query = $this->db2->get();
		return $query->result();
    }
	function get_finishlist($permit_type)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_finishquest');
        $this->db2->where('isvalid', 1);
		$whw = 'permit_type = "'.$permit_type.'"';
        $this->db2->where($whw);
        $this->db2->order_by('id', 'ASC');
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function add_notif($notifInfo)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('notification', $notifInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function update_notif($id)
    {
		$Info = array('notif'=>0);
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('notification', $Info);
		
        return TRUE;
    }
	function get_notif()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('notification');
        $this->db2->where('notif', 1);
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_ponotif()
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_po');
        $this->db2->where('notif', 1);
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function update_ponotif($id)
    {
		$Info = array('notif'=>0);
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_po', $Info);
		
        return TRUE;
    }
	function get_pt($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('temp_user');
        $this->db2->where('NIK', $id);
        $this->db2->limit(1);
		$query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function add_inotif($iden)
    {
		$notifInfo = array('iden'=>$iden);
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_internal_notif', $notifInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function update_inotif($id)
    {
		$Info = array('notif'=>0);
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('iden', $id);
		$this->db2->update('tbl_internal_notif', $Info);
		
        return TRUE;
    }
	function get_inotif($iden)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_internal_notif');
        $this->db2->where('notif', 1);
        $this->db2->where('iden', $iden);
        
		$query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	

    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkEmailExist($email)
    {
        $this->db->select('userId');
        $this->db->where('email', $email);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

	function getpass()
    {
		$this->db2 = $this->load->database('codesysdb', TRUE);
        $this->db2->select('col1');
        $this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
        $query = $this->db2->get('your_table_name');
		return $query->row();
    }
    /**
     * This function used to insert reset password data
     * @param {array} $data : This is reset password data
     * @return {boolean} $result : TRUE/FALSE
     */
    function resetPasswordUser($data)
    {
        $result = $this->db->insert('tbl_reset_password', $data);

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * This function is used to get customer information by email-id for forget password email
     * @param string $email : Email id of customer
     * @return object $result : Information of customer
     */
    function getCustomerInfoByEmail($email)
    {
        $this->db->select('userId, email, name');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('email', $email);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function used to check correct activation deatails for forget password.
     * @param string $email : Email id of user
     * @param string $activation_id : This is activation string
     */
    function checkActivationDetails($email, $activation_id)
    {
        $this->db->select('id');
        $this->db->from('tbl_reset_password');
        $this->db->where('email', $email);
        $this->db->where('activation_id', $activation_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    // This function used to create new password by reset link
    function createPasswordUser($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', array('password'=>getHashedPassword($password)));
        $this->db->delete('tbl_reset_password', array('email'=>$email));
    }

    /**
     * This function used to save login information of user
     * @param array $loginInfo : This is users login information
     */
    function lastLogin($loginInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_last_login', $loginInfo);
        $this->db->trans_complete();
    }

    /**
     * This function is used to get last login info by user id
     * @param number $userId : This is user id
     * @return number $result : This is query result
     */
    function lastLoginInfo($userId)
    {
        $this->db->select('BaseTbl.createdDtm');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_last_login as BaseTbl');

        return $query->row();
    }
	
	
	function get_nowconfined()
    {
		$unix = date('U');
		$day = $unix % 86400;
		$day = $day + 7*(3600);
		$start = $unix - $day;
		$hour = (($day - ($day % 3600))/3600) + 1;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
		$where_clause = 'start_hour = '.$hour.' and gas_cek = 1 and isvalid = 1 and terbatas = 7 and ((start_unix = '.$start.') OR (end_unix = '.$start.') OR (start_unix <= '.$unix.' AND end_unix >= '.$unix.'))';
        $this->db2->where($where_clause);
        $query = $this->db2->get();
        
        $result = $query->result();
		return $result;
    }
//==
    function get_hourlygas($start_date)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
        $this->db2->where('start_date', $start_date);
        $this->db2->where('gas_cek', 0);
        $this->db2->where('closed', 0);
        $this->db2->where('terbatas', 7);
        $query = $this->db2->get();
        
        $result = $query->result();
		return $result;
    }
//==    
    function get_nowblood()
    {
		$unix = date('U');
		$day = $unix % 86400;
		$day = $day + 7*(3600);
		$start = $unix - $day;
		$hour = (($day - ($day % 3600))/3600) + 1;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
		$where_clause = 'start_hour = '.$hour.' and (blood_cek = 1) and isvalid = 1 and (terbatas = 7 or tinggi = 7) and ((start_unix = '.$start.') OR (end_unix = '.$start.') OR (start_unix <= '.$unix.' AND end_unix >= '.$unix.'))';
        $this->db2->where($where_clause);
        $query = $this->db2->get();
        
        $result = $query->result();
		return $result;
    }
	function get_permitconfined($jsa_main)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_permit');
        $this->db2->where('jsa_id', $jsa_main);
		$this->db2->where('isvalid', 1);
		$this->db2->where('(permit_type = 3 or permit_type = 2)');
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        $result = $query->row();
		return $result;
    }
	function get_almostclose()
    {
		$unix = date('U');
		$day = $unix % 86400;
		$day = $day + 7*(3600);
		$start = $unix - $day;
		$hour = (($day - ($day % 3600))/3600) + 1;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
		$where_clause = 'saved = 1 and ((panas = 7 or panas =2) and (tinggi = 7 or tinggi =2) and (terbatas = 7 or terbatas =2) and (penggalian = 7 or penggalian =2) and (listrik = 7 or listrik =2) and (general = 7 or general =2)) and end_hour = '.$hour.' and closed = 0 and isvalid = 1 and end_unix = '.$start;
        $this->db2->where($where_clause);
        $query = $this->db2->get();
        
        $result = $query->result();
		return $result;
    }
	function get_bubar()
    {
		$unix = date('U');
		$day = $unix % 86400;
		$day = $day + 7*(3600);
		$start = $unix - $day;
		$hour = (($day - ($day % 3600))/3600) + 1;
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
		$where_clause = 'saved = 1 and ((panas = 7 or panas =2) and (tinggi = 7 or tinggi =2) and (terbatas = 7 or terbatas =2) and (penggalian = 7 or penggalian =2) and (listrik = 7 or listrik =2) and (general = 7 or general =2)) and end_hour = '.$hour.' and closed = 0 and isvalid = 1 and start_unix <= '.$start.' and end_unix > '.$start;
        $this->db2->where($where_clause);
        $query = $this->db2->get();
        
        $result = $query->result();
		return $result;
    }
	function get_closespam()
    {
		$unix = date('U');
		$day = $unix % 86400;
		$day = $day + 7*(3600);
		$start = $unix - $day;
		$hour = (($day - ($day % 3600))/3600);
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_jsa_main');
		$where_clause = 'saved = 1 and ((panas = 7 or panas =2) and (tinggi = 7 or tinggi =2) and (terbatas = 7 or terbatas =2) and (penggalian = 7 or penggalian =2) and (listrik = 7 or listrik =2) and (general = 7 or general =2)) and closed = 0 and isvalid = 1 and ((end_hour >= '.$hour.' and end_unix = '.$start.') OR end_unix < '.$start.')';
        $this->db2->where($where_clause);
        $query = $this->db2->get();
        
        $result = $query->result();
		return $result;
    }
     function hse_notif($start_date, $start_hour){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
        $this->db2->where('isvalid', 1);
        $this->db2->where('start_date', $start_date);
        $this->db2->where('start_hour', $start_hour);
        $this->db2->where('(check is NOT NULL or check != "")');
        $this->db2->where('(panas != 2 or panas != 7)');
        $this->db2->where('(tinggi != 2 or tinggi != 7)');
        $this->db2->where('(terbatas != 2 or terbatas != 7)');
        $this->db2->where('(penggalian != 2 or penggalian != 7)');
        $this->db2->where('(listrik != 2 or listrik != 7)');
        $this->db2->where('(general != 2 or general != 7)');
        
        $this->db2->order_by('id', 'DESC');
        
        $query = $this->db2->get();
          
        return $query->result();
	}
	
	function get_notifmm($ids)
	//select * from db_safety.tbl_permit where jsa_id = "801"
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_permit');
		$this->db2->where('jsa_id', $ids);
        $query = $this->db2->get();
		return $query->result();
    }
    
    function autoclose($date, $hour){
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
		$this->db2->from('tbl_jsa_main');
		$this->db2->where('closed = "0" and (panas = "7" or panas = "2")and(tinggi = "7" or tinggi = "2" )and( terbatas = "7" or terbatas = "2" )and( penggalian = "7" or penggalian = "2" )and( listrik = "7" or listrik = "2")and(general = "7" or general = "2")');
		$this->db2->where('end_date <=', $date);
		$this->db2->where('end_hour <=', $hour);
		$this->db2->where('isvalid', 1);
		$this->db2->where('saved', 1);
		$query = $this->db2->get();
          
        return $query->result();
	}
}

?>















