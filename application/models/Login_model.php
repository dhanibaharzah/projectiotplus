<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
	function loginjoin($username, $password){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('BaseTbl.NIK, BaseTbl.uPassword, BaseTbl.uName, BaseTbl.roleId, Roles.role, BaseTbl.cdprj, BaseTbl.adminapp');
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
			}else{
				return array();
			}
		}else{
			return array();
		}
	}
	function loginexternal($username, $password){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('BaseTbl.NIK, BaseTbl.uPassword, BaseTbl.uName, BaseTbl.roleId, Roles.role');
		$this->db2->from('temp_user as BaseTbl');
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
			}else{
				return array();
			}
		}else{
			return array();
		}
	}
	function logincbm($username, $password){
		$this->db2 = $this->load->database('cbmdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('NIK', $username);
		$this->db2->where('uFlag', 1);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$user = $query->row();
		if(!empty($user)){
			$userpass = md5($password);
			if($userpass == $user->uPassword){
				return $user;
			}else{
				return array();
			}
		}else{
			return array();
		}
	}
	function logintrial($username, $password){
		$this->db->select('*');
        $this->db->from('x_user');
        $this->db->where('NIK', $username);
        $this->db->where('isvalid', 1);
        $this->db->limit(1);
        $query = $this->db->get();
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
//-----------------------------------------------------
	function get_chat()
    {
        $this->db->select('timestamp, user, pesan');
        $this->db->from('ci_chat');
		//$returns = $this->paginationCompress( "get_chat/", $count, 10 );
	    $this->db->order_by('timestamp', 'DESC');
		$this->db->limit(10);
        $query = $this->db->get();
		
		return $query->result();
    }
//-----------------------------------------------------	
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
	
	function getjobbyticketOK($okcode)
    {
        $this->db->select('*');
        $this->db->from('job_ticket');
        $this->db->where('okcode', $okcode);
		$this->db->where('isValid', 1);
		$this->db->where('isSubmit', 1);
		$this->db->limit(1);
        $query = $this->db->get();
        
        return $query->row();
    }
	
	function okticket($plannerInfo, $okcode)
    {
		$this->db->where('okcode', $okcode);
		$this->db->where('isValid', 1);
		$this->db->where('isSubmit', 1);
        $this->db->update('job_ticket', $plannerInfo);
        
        return TRUE;
    }
	
	
	function planlist($okcode)
    {
		$this->db->select('BaseTbl.job_area as job_area, 
			BaseTbl.id as job_id, 
			BaseTbl.job_name as job_name, 
			BaseTbl.job_type as job_type, 
			BaseTbl.job_dura as job_dura, 
			BaseTbl.job_man_0 as man0,  
			BaseTbl.job_man_1 as man1,  
			BaseTbl.job_man_2 as man2,  
			BaseTbl.job_man_3 as man3,  
			BaseTbl.job_man_4 as man4,  
			BaseTbl.job_man_5 as man5,  
			BaseTbl.job_man_6 as man6,  
			BaseTbl.job_man_7 as man7,  
			BaseTbl.job_man_8 as man8,  
			BaseTbl.job_man_9 as man9, 
			ticket.exedate as exedate, 
			ticket.exe0 as exe0, 
			ticket.exe1 as exe1, 
			ticket.exe2 as exe2, 
			ticket.exe3 as exe3, 
			ticket.exe4 as exe4, 
			ticket.exe5 as exe5, 
			ticket.exe6 as exe6, 
			ticket.exe7 as exe7, 
			ticket.exe8 as exe8, 
			ticket.exe9 as exe9, 
			ticket.qua0 as qua0, 
			ticket.qua1 as qua1, 
			ticket.qua2 as qua2, 
			ticket.qua3 as qua3, 
			ticket.qua4 as qua4, 
			ticket.qua5 as qua5, 
			ticket.qua6 as qua6, 
			ticket.qua7 as qua7, 
			ticket.qua8 as qua8, 
			ticket.qua9 as qua9, 
			ticket.id as ticketid
			');
        $this->db->from('job_list as BaseTbl');
        $this->db->join('job_ticket as ticket','ticket.jobid = BaseTbl.id');
		
		$this->db->where('ticket.okcode', $okcode);
		$this->db->where('ticket.isValid', 1);
		$this->db->where('ticket.isSubmit', 1);
		$this->db->where('ticket.isOK', 1);
		$this->db->order_by('ticket.exedate', 'asc');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function planlistnotok($okcode)
    {
		$this->db->select('BaseTbl.job_area as job_area, 
			BaseTbl.id as job_id, 
			BaseTbl.job_name as job_name, 
			BaseTbl.job_type as job_type, 
			BaseTbl.job_dura as job_dura, 
			BaseTbl.job_man_0 as man0,  
			BaseTbl.job_man_1 as man1,  
			BaseTbl.job_man_2 as man2,  
			BaseTbl.job_man_3 as man3,  
			BaseTbl.job_man_4 as man4,  
			BaseTbl.job_man_5 as man5,  
			BaseTbl.job_man_6 as man6,  
			BaseTbl.job_man_7 as man7,  
			BaseTbl.job_man_8 as man8,  
			BaseTbl.job_man_9 as man9, 
			ticket.exedate as exedate, 
			ticket.exe0 as exe0, 
			ticket.exe1 as exe1, 
			ticket.exe2 as exe2, 
			ticket.exe3 as exe3, 
			ticket.exe4 as exe4, 
			ticket.exe5 as exe5, 
			ticket.exe6 as exe6, 
			ticket.exe7 as exe7, 
			ticket.exe8 as exe8, 
			ticket.exe9 as exe9, 
			ticket.qua0 as qua0, 
			ticket.qua1 as qua1, 
			ticket.qua2 as qua2, 
			ticket.qua3 as qua3, 
			ticket.qua4 as qua4, 
			ticket.qua5 as qua5, 
			ticket.qua6 as qua6, 
			ticket.qua7 as qua7, 
			ticket.qua8 as qua8, 
			ticket.qua9 as qua9, 
			ticket.id as ticketid
			');
        $this->db->from('job_list as BaseTbl');
        $this->db->join('job_ticket as ticket','ticket.jobid = BaseTbl.id');
		
		$this->db->where('ticket.okcode', $okcode);
		$this->db->where('ticket.isValid', 1);
		$this->db->order_by('ticket.exedate', 'asc');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function getmainapp()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >=', 90000);
		$this->db2->where('main_app', 2);
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function getemail($name)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >=', 90000);
		$this->db2->where('uName', $name);
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	function getuname($nik){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('NIK', $nik);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function getjobbyticketAPP($appcode)
    {
        $this->db->select('*');
        $this->db->from('job_ticket');
        $this->db->where('appcode', $appcode);
		$this->db->where('isValid', 1);
		$this->db->where('isSubmit', 1);
		$this->db->limit(1);
        $query = $this->db->get();
        
        return $query->row();
    }
	
	function appticket($plannerInfo, $appcode)
    {
		$this->db->where('appcode', $appcode);
		$this->db->where('isValid', 1);
		$this->db->where('isSubmit', 1);
		$this->db->where('isOK', 1);
        $this->db->update('job_ticket', $plannerInfo);
        
        return TRUE;
    }
	
	function planlistapp($appcode)
    {
		$this->db->select('BaseTbl.job_area as job_area, 
			BaseTbl.id as job_id, 
			BaseTbl.job_name as job_name, 
			BaseTbl.job_type as job_type, 
			BaseTbl.job_dura as job_dura, 
			BaseTbl.job_man_0 as man0,  
			BaseTbl.job_man_1 as man1,  
			BaseTbl.job_man_2 as man2,  
			BaseTbl.job_man_3 as man3,  
			BaseTbl.job_man_4 as man4,  
			BaseTbl.job_man_5 as man5,  
			BaseTbl.job_man_6 as man6,  
			BaseTbl.job_man_7 as man7,  
			BaseTbl.job_man_8 as man8,  
			BaseTbl.job_man_9 as man9, 
			ticket.exedate as exedate, 
			ticket.exe0 as exe0, 
			ticket.exe1 as exe1, 
			ticket.exe2 as exe2, 
			ticket.exe3 as exe3, 
			ticket.exe4 as exe4, 
			ticket.exe5 as exe5, 
			ticket.exe6 as exe6, 
			ticket.exe7 as exe7, 
			ticket.exe8 as exe8, 
			ticket.exe9 as exe9, 
			ticket.qua0 as qua0, 
			ticket.qua1 as qua1, 
			ticket.qua2 as qua2, 
			ticket.qua3 as qua3, 
			ticket.qua4 as qua4, 
			ticket.qua5 as qua5, 
			ticket.qua6 as qua6, 
			ticket.qua7 as qua7, 
			ticket.qua8 as qua8, 
			ticket.qua9 as qua9, 
			ticket.id as ticketid
			');
        $this->db->from('job_list as BaseTbl');
        $this->db->join('job_ticket as ticket','ticket.jobid = BaseTbl.id');
		
		$this->db->where('ticket.appcode', $appcode);
		$this->db->where('ticket.isValid', 1);
		$this->db->where('ticket.isSubmit', 1);
		$this->db->where('ticket.isOK', 1);
		$this->db->where('ticket.isApp', 1);
		$this->db->order_by('ticket.exedate', 'asc');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
	function tooltrouble()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('sts !=','booked');
		$this->db2->where('sts !=','inorder');
		$this->db2->where('sts !=','available');
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function lastmail()
    {
		$nowtime = date('U');
		$validtime = $nowtime - 86400;
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('mailer');
		$this->db2->where('unixmail >=',$validtime);
        $query = $this->db2->get();
        
        $result = $query->num_rows();        
        return $result;
    }
	
	function addmail($mailInfo)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('mailer', $mailInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function getproblematic()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('sts !=', 'available');
		$this->db2->where('sts !=', 'booked');
		$this->db2->where('sts !=', 'inorder');
		$this->db2->where('rsts', 0);
		$this->db2->order_by('sts', 'desc');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function getproblematicCount()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('sts !=', 'available');
		$this->db2->where('sts !=', 'booked');
		$this->db2->where('sts !=', 'inorder');
		$this->db2->where('rsts', 1);
		$this->db2->order_by('sts', 'desc');
        $query = $this->db2->get();
        
        $result = $query->num_rows();        
        return $result;
    }
	
	function report1()
    {
		$this->db2 = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('Repo.repid as repoid,Repo.timestamp as timestamp, Repo.id as id, Repo.num as num, Repo.status as sts,Repo.reason as reason, Repo.sts as rsts, Roles.name as name, Roles.brand as brand, Roles.size as size, Roles.user as user, Roles.invoice as invoice');
        $this->db2->from('report as Repo');
        $this->db2->join('tools as Roles','Roles.id = Repo.id');
        $this->db2->order_by('Repo.sts', 'ASC');
		$this->db2->where('Repo.isvalid', 1);
		$this->db2->where('Repo.sts', 0);
		$this->db2->where('Repo.sts !=', 12);
        $query = $this->db2->get();
        
        $result = $query->result();
		
        return $result;
    }
	function report2()
    {
		$this->db2 = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('Repo.repid as repoid,Repo.timestamp as timestamp, Repo.id as id, Repo.num as num, Repo.status as sts,Repo.reason as reason, Repo.sts as rsts, Roles.name as name, Roles.brand as brand, Roles.size as size, Roles.user as user, Roles.invoice as invoice');
        $this->db2->from('report as Repo');
        $this->db2->join('tools as Roles','Roles.id = Repo.id');
        $this->db2->order_by('Repo.sts', 'ASC');
		$this->db2->where('Repo.isvalid', 1);
		$this->db2->where('Repo.sts', 1);
		$this->db2->where('Repo.sts !=', 12);
        $query = $this->db2->get();
        
        $result = $query->result();
		
        return $result;
    }
	function updatereport($reportInfo, $repid)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('repid', $repid);
		$this->db2->where('sts !=', 12);
        $this->db2->update('report', $reportInfo);
        
        return TRUE;
    }
	function getpictool()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('pictool', 1);
		
        $query = $this->db2->get();
        $this->db2->limit(1);
        $result = $query->row();        
        return $result;
    }
	function getmantool()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('pictool', 2);
		
        $query = $this->db2->get();
        $this->db2->limit(1);
        $result = $query->row();        
        return $result;
    }
}

?>
