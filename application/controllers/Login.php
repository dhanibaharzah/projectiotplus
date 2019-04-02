<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Login extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
       
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }
//-------------------------------------------------------------------------	
    
//-------------------------------------------------------------------------	
	function isok($okcode = '')
    {
        $checker = $this->login_model->getjobbyticketOK($okcode);
		if($checker->okcode == $okcode){
			$datejob = date('l, j F Y',($checker->exedate));
			$app = 'wis app lanjut';
			$app .= $okcode;
			$appcode = md5($app);
			$plannerInfo = array(
						'isOK'=>1,
						'appcode'=>$appcode
					);
			$this->login_model->okticket($plannerInfo, $okcode);
		
			$this->load->library('email');

			$subject = 'Maintenance Job';
			$message = '<h3>Greeting,</h3> <br><p>This job plan (by'.$checker->owner.') already checked and need your approval, execution date: <h4>'.$datejob.'</h4></p>';
			$message .= '<table border="1" cellspacing="0" cellpadding="5" width="100%">
                    <tr>
                      <th>Ticketid</th>
                      <th>Job Area</th>
                      <th>Job Type</th>
                      <th>Job Name</th>
                      <th>Duration</th>
                      <th>Time</th>
                      <th>Executor</th>
                    </tr>';
		$planlist = $this->login_model->planlist($okcode);
		
		if(!empty($planlist))
		{
			foreach($planlist as $record)
			{
				$jobdura = $record->job_dura*30;
				$jobstart = date("H:i", $record->exedate);
				$jobe = $jobdura*60 + $record->exedate;
				$jobend = date("H:i", $jobe);
				$message .= '
					<tr>
						<td>'.$record->ticketid.'</td>
						<td>'.$record->job_area.'</td>
						<td>'.$record->job_type.'</td>
						<td>'.$record->job_name.'</td>
						<td>'.$jobdura.' mins</td>
						<td>'.$jobstart.' - '.$jobend.'</td>
						<td>Executor:<br>';
						
				if(!empty($record->exe0)){ $message .= '1. '.$record->exe0; }
				if(!empty($record->exe1)){ $message .= '<br>2. '.$record->exe1; }
				if(!empty($record->exe2)){ $message .= '<br>3. '.$record->exe2; }
				if(!empty($record->exe3)){ $message .= '<br>4. '.$record->exe3; }
				if(!empty($record->exe4)){ $message .= '<br>5. '.$record->exe4; }
				if(!empty($record->exe5)){ $message .= '<br>6. '.$record->exe5; }
				if(!empty($record->exe6)){ $message .= '<br>7. '.$record->exe6; }
				if(!empty($record->exe7)){ $message .= '<br>8. '.$record->exe7; }
				if(!empty($record->exe8)){ $message .= '<br>9. '.$record->exe8; }
				if(!empty($record->exe9)){ $message .= '<br>10. '.$record->exe9; }
				
				$message .= '</td></tr>';
			}
		}
		$message .= '</table>';
		
		$message .= '
			<table>
				<tr>
					<td style="background-color: #3cea3c;border-color: #0f6d0f;border: 2px solid #45b7af;padding: 10px;text-align: center;">
						<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'isapp/'.$appcode.'">
							Approve!
						</a>
					</td>
					<td style="background-color: #e51616;border-color: #ad0606;border: 2px solid #45b7af;padding: 10px;text-align: center;">
						<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'isnotok/'.$okcode.'">
							Reject?
						</a>
					</td>
					
				</tr>
			</table>';
		
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<title>' . html_escape($subject) . '</title>
							<style type="text/css">
								body {
									font-family: Arial, Verdana, Helvetica, sans-serif;
									font-size: 16px;
									}
								table {
									border-collapse: collapse;
								}
								table, th, td {
									border: 1px solid black;
								}
							</style>
						</head>
						<body style="margin:0; padding:0; background-color:#F2F2F2;">
						' . $message . '
						</body>
					</html>';
					// Also, for getting full html you may use the following internal method:
		$body = $this->email->full_html($subject, $message);
		$receiver = $this->login_model->getmainapp();
		$result = $this->email
					->from('AutomatedRAWR@MechdataV1.0')
					->reply_to('no_idont_need@yourreply.com')    // Optional, an account where a human being reads.
					->to($receiver->slcimail)
					->subject($subject)
					->message($body)
					->send();
		var_dump($result);
		echo'thanks! you can close this tab now, auto close tab cannt active because of browser security issue ';
		}
		else{
			echo'opss, something wrong ';
		}
    }
	
	function isnotok($okcode = '')
    {
        $checker = $this->login_model->getjobbyticketOK($okcode);
		if($checker->isOK == 1){
			$note = 'has been checked but then rejected by approval progress';
		}
		elseif($checker->isOK == 0){
			$note = 'has been rejected by check progress';
		}
		
		if($checker->okcode == $okcode){
			$datejob = date('l, j F Y',($checker->exedate));
			$plannerInfo = array(
						'isSubmit'=>0,
						'isOK'=>0,
						'isApp'=>0,
					);
			$this->login_model->okticket($plannerInfo, $okcode);
		
			$this->load->library('email');

			$subject = 'Maintenance Job';
			$message = '<h3>Greeting,</h3> <br><p>Hi '.$checker->owner.', so sad, request '.$note.', execution date: <h4>'.$datejob.'</h4></p>';
			$message .= '<table border="1" cellspacing="0" cellpadding="5" width="100%">
                    <tr>
                      <th>Ticketid</th>
                      <th>Job Area</th>
                      <th>Job Type</th>
                      <th>Job Name</th>
                      <th>Duration</th>
                      <th>Time</th>
                      <th>Executor</th>
                    </tr>';
		$planlist = $this->login_model->planlistnotok($okcode);
		
		if(!empty($planlist))
		{
			foreach($planlist as $record)
			{
				$jobdura = $record->job_dura*30;
				$jobstart = date("H:i", $record->exedate);
				$jobe = $jobdura*60 + $record->exedate;
				$jobend = date("H:i", $jobe);
				$message .= '
					<tr>
						<td>'.$record->ticketid.'</td>
						<td>'.$record->job_area.'</td>
						<td>'.$record->job_type.'</td>
						<td>'.$record->job_name.'</td>
						<td>'.$jobdura.' mins</td>
						<td>'.$jobstart.' - '.$jobend.'</td>
						<td>Executor:<br>';
						
				if(!empty($record->exe0)){ $message .= '1. '.$record->exe0; }
				if(!empty($record->exe1)){ $message .= '<br>2. '.$record->exe1; }
				if(!empty($record->exe2)){ $message .= '<br>3. '.$record->exe2; }
				if(!empty($record->exe3)){ $message .= '<br>4. '.$record->exe3; }
				if(!empty($record->exe4)){ $message .= '<br>5. '.$record->exe4; }
				if(!empty($record->exe5)){ $message .= '<br>6. '.$record->exe5; }
				if(!empty($record->exe6)){ $message .= '<br>7. '.$record->exe6; }
				if(!empty($record->exe7)){ $message .= '<br>8. '.$record->exe7; }
				if(!empty($record->exe8)){ $message .= '<br>9. '.$record->exe8; }
				if(!empty($record->exe9)){ $message .= '<br>10. '.$record->exe9; }
				
				$message .= '</td></tr>';
			}
		}
		$message .= '</table>';
		
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<title>' . html_escape($subject) . '</title>
							<style type="text/css">
								body {
									font-family: Arial, Verdana, Helvetica, sans-serif;
									font-size: 16px;
									}
								table {
									border-collapse: collapse;
								}
								table, th, td {
									border: 1px solid black;
								}
							</style>
						</head>
						<body style="margin:0; padding:0; background-color:#F2F2F2;">
						' . $message . '
						</body>
					</html>';
					// Also, for getting full html you may use the following internal method:
		$body = $this->email->full_html($subject, $message);
		$receiver = $this->login_model->getemail($checker->owner);
		$result = $this->email
					->from('AutomatedRAWR@MechdataV1.0')
					->reply_to('no_idont_need@yourreply.com')    // Optional, an account where a human being reads.
					->to($receiver->slcimail)
					->subject($subject)
					->message($body)
					->send();
		var_dump($result);
		echo'thanks! you can close this tab now, auto close tab cannt active because of browser security issue ';
		}
		else{
			echo'opss, something wrong ';
		}
    }
    
	function isapp($appcode = '')
    {
        $checker = $this->login_model->getjobbyticketAPP($appcode);
		if($checker->appcode == $appcode){
			$datejob = date('l, j F Y',($checker->exedate));
			$plannerInfo = array(
						'isApp'=>1
					);
			$this->login_model->appticket($plannerInfo, $appcode);
		
			$this->load->library('email');

			$subject = 'Maintenance Job';
			$message = '<h3>Greeting,</h3> <br><p>Hi '.$checker->owner.' your request already checked and approved!, execution date: <h4>'.$datejob.'</h4></p>';
			$message .= '<table border="1" cellspacing="0" cellpadding="5" width="100%">
                    <tr>
                      <th>Ticketid</th>
                      <th>Job Area</th>
                      <th>Job Type</th>
                      <th>Job Name</th>
                      <th>Duration</th>
                      <th>Time</th>
                      <th>Executor</th>
                    </tr>';
		$planlist = $this->login_model->planlistapp($appcode);
		
		if(!empty($planlist))
		{
			foreach($planlist as $record)
			{
				$jobdura = $record->job_dura*30;
				$jobstart = date("H:i", $record->exedate);
				$jobe = $jobdura*60 + $record->exedate;
				$jobend = date("H:i", $jobe);
				$message .= '
					<tr>
						<td>'.$record->ticketid.'</td>
						<td>'.$record->job_area.'</td>
						<td>'.$record->job_type.'</td>
						<td>'.$record->job_name.'</td>
						<td>'.$jobdura.' mins</td>
						<td>'.$jobstart.' - '.$jobend.'</td>
						<td>Executor:<br>';
						
				if(!empty($record->exe0)){ $message .= '1. '.$record->exe0; }
				if(!empty($record->exe1)){ $message .= '<br>2. '.$record->exe1; }
				if(!empty($record->exe2)){ $message .= '<br>3. '.$record->exe2; }
				if(!empty($record->exe3)){ $message .= '<br>4. '.$record->exe3; }
				if(!empty($record->exe4)){ $message .= '<br>5. '.$record->exe4; }
				if(!empty($record->exe5)){ $message .= '<br>6. '.$record->exe5; }
				if(!empty($record->exe6)){ $message .= '<br>7. '.$record->exe6; }
				if(!empty($record->exe7)){ $message .= '<br>8. '.$record->exe7; }
				if(!empty($record->exe8)){ $message .= '<br>9. '.$record->exe8; }
				if(!empty($record->exe9)){ $message .= '<br>10. '.$record->exe9; }
				
				$message .= '</td></tr>';
			}
		}
		$message .= '</table>';
		
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<title>' . html_escape($subject) . '</title>
							<style type="text/css">
								body {
									font-family: Arial, Verdana, Helvetica, sans-serif;
									font-size: 16px;
									}
								table {
									border-collapse: collapse;
								}
								table, th, td {
									border: 1px solid black;
								}
							</style>
						</head>
						<body style="margin:0; padding:0; background-color:#F2F2F2;">
						' . $message . '
						</body>
					</html>';
					// Also, for getting full html you may use the following internal method:
		$body = $this->email->full_html($subject, $message);
		$receiver = $this->login_model->getemail($checker->owner);
		$result = $this->email
					->from('AutomatedRAWR@MechdataV1.0')
					->reply_to('no_idont_need@yourreply.com')    // Optional, an account where a human being reads.
					->to($receiver->slcimail)
					->subject($subject)
					->message($body)
					->send();
		var_dump($result);
		echo'thanks! you can close this tab now, auto close tab cannt active because of browser security issue ';
		}
		else{
			echo'opss, something wrong ';
		}
    }
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[128]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->input->post('password');
            
            $result = $this->login_model->loginMe($username, $password);
            
            if(!empty($result))
            {
                $lastLogin = $this->login_model->lastLoginInfo($result->userId);

                $sessionArray = array('userId'=>$result->userId,                    
                                        'role'=>$result->roleId,
										'usertype'=>$result->usertype,
                                        'roleText'=>$result->role,
                                        'name'=>$result->name,
                                        'lastLogin'=> $lastLogin->createdDtm,
                                        'isLoggedIn' => TRUE
                                );

                $this->session->set_userdata($sessionArray);

                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                $loginInfo = array("userId"=>$result->userId, "sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());

                $this->login_model->lastLogin($loginInfo);
                
                redirect('/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Username or password mismatch');
                
                redirect('/login');
            }
        }
    }
	
	public function loginjoin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[128]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->input->post('password');
			if($username >= 40000 AND $username <= 49999){
				$result = $this->login_model->loginexternal($username, $password);
			}elseif($username >= 30000 AND $username <= 39999){
				$result = $this->login_model->logincbm($username, $password);
			}elseif($username >= 100000 AND $username <= 199999){
				$result = $this->login_model->logintrial($username, $password);
			}else{
				$result = $this->login_model->loginjoin($username, $password);
			}
            if(!empty($result))
            {
                $lastLogin = $this->login_model->lastLoginInfo($result->uName);
				$sessionArray = array('userId'=>$result->NIK,                    
                                        'role'=>$result->roleId,
										'usertype'=>$result->cdprj,
										'adminapp'=>$result->adminapp,
                                        'roleText'=>$result->role,
                                        'name'=>$result->uName,
										'lastLogin'=> $lastLogin->createdDtm,
                                        'isLoggedIn' => TRUE
                                );
				
                $this->session->set_userdata($sessionArray);

                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                $loginInfo = array("userId"=>$result->uName, "appname"=>'Startup',"sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());

                $this->login_model->lastLogin($loginInfo);
				if($username < 10000){
					redirect('appmode/2');
				}
				if($username >= 40000 and $username < 50000){
					redirect('appmode/3');
				}
				if($username >= 30000 and $username < 40000){
					echo 'a';
					//redirect('appmode/5');
				}
                redirect('/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Username or password mismatch');
                
                redirect('/login');
            }
        }
    }
	public function loginexternal($id){
		$result = $this->login_model->getuname($id);
		
		if(!empty($result))
		{
			$lastLogin = $this->login_model->lastLoginInfo($result->uName);
			$sessionArray = array('userId'=>$result->NIK,                    
									'role'=>$result->roleId,
									'usertype'=>$result->cdprj,
									'roleText'=>$result->role,
									'name'=>$result->uName,
									'lastLogin'=> $lastLogin->createdDtm,
									'isLoggedIn' => TRUE
							);

			$this->session->set_userdata($sessionArray);

			unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

			$loginInfo = array("userId"=>$result->uName, "appname"=>'Direct Mechdata',"sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());

			$this->login_model->lastLogin($loginInfo);

			redirect('/dashboard');
		}
		else
		{
			$this->session->set_flashdata('error', 'Username or password mismatch');
			
			redirect('/login');
		}
    }
    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('forgotPassword');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = $this->security->xss_clean($this->input->post('login_email'));
            
            if($this->login_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo[0]->name;
                        $data1["email"] = $userInfo[0]->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    /**
     * This function used to create new password for user
     */
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->login_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password changed successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password changed failed';
            }
            
            setFlashData($status, $message);

            redirect("/login");
        }
    }
	
	//============================================TOOL====================================
	function mailery(){

		$this->load->library('email');

		$config['protocol'] = 'SMTP';
		$config['smtp_host'] = 'mail.slci.co.id';
		$config['smtp_user'] = 'no-replay@slci.co.id';
		$config['smtp_pass'] = '1234qwer';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';
		
		
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		$this->email->from('no-replay@slci.co.id', 'Your Name');
		$this->email->to('akbar@slci.co.id');
		#$this->email->cc('another@another-example.com');
		#$this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();
		#echo $this->email->print_debugger(array('headers'));
	}
	function mailer2()
	{
		$this->load->library("PhpMailerLib");
        $mail = $this->phpmailerlib->load();
	try {
		    //Server settings
		    $mail->SMTPDebug = 4;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'mail.slci.co.id';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = false;                               // Enable SMTP authentication
		    $mail->Username = 'no-replay@slci.co.id';                 // SMTP username
		    $mail->Password = '1234qwer';                           // SMTP password
		    #$mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 25;                                    // TCP port to connect to
		    //Recipients
		    $mail->setFrom('no-replay@slci.co.id');
		    $mail->addAddress('akbar@slci.co.id');     // Add a recipient
		    //$mail->addAddress('RECEIPIENTEMAIL02');               // Name is optional
		    $mail->addReplyTo('noidontneed@slci.co.id', 'Ganesha');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Here is the subject';
		    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	}
	function mailer()
	{
		
		$subject = 'Trouble Report';
		$result = $this->login_model->getproblematic();
		$resultx = $this->login_model->getproblematicCount();
		$pic = $this->login_model->getpictool();
		$man = $this->login_model->getmantool();
		
		$message = '<p>Greeting,</p><br>
			<p>Table below show all error data on tool database. Tag [lost] indicate lost tool, user at same row is the one that need to replace it. Tag [broken] indicate broken tool, when it has no user at same line, it broken since beginning and need a replacement.</p>
			';
		$message .= '<table border="1" cellspacing="0" cellpadding="5" width="100%">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Brand</th>
				<th>Size/Type</th>
				<th>Status</th>
				<th>Last User</th>
				<th>Invoice</th>
			</tr>';
		if(!empty($result)){
			$no = 1;
			foreach($result as $tool){
				$message .= 
				'<tr>
					<td>'.$no.'</td>
					<td>'.$tool->name.'</td>
					<td>'.$tool->brand.'</td>
					<td>'.$tool->size.'</td>
					<td>'.$tool->sts.'</td>
					<td>'.$tool->user.'</td>
					<td>'.$tool->invoice.'</td>
				<tr>';
				$no++;
			}
		}
		else{
			exit;
		}
		$message .= '</table><br>There are '.$resultx.' in progress reports submited by toolkeeper. Report mail will only run one time per day. PIC receives every 7:40 GMT+7 and Manager receives every 13:00 GMT+7.<br>';
		$message .= '<br><p>Thanks,</p><br><p>AutomatedRAWR</p>';
		$body = '
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
				<h3>TROUBLE REPORT</h3>
				<style type="text/css">
				table {
					border-collapse: collapse;
				}
				table, th, td {
					border: 1px solid black;
				}
				body {
					font-family: Arial, Verdana, Helvetica, sans-serif;
					font-size: 16px;
				}
				</style>
			</head>
			<body>
				' . $message . '<br>
				
			</body>
			
		</html>';
		$this->load->library('email');

		$config['protocol'] = 'SMTP';
		$config['smtp_host'] = 'mail.slci.co.id';
		$config['smtp_user'] = 'no-replay@slci.co.id';
		$config['smtp_pass'] = '1234qwer';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';
		
		
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);

		$this->email->from('no-replay@slci.co.id', 'Toolkeeping');
		$this->email->to($man->slcimail);
		$this->email->cc($pic->slcimail);
		$this->email->bcc('akbar@slci.co.id');

		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
	
		echo $this->email->print_debugger(array('headers'));
	exit;
	}
	
	function report1()
	{
		$subject = 'Tool Report';
		$result = $this->login_model->report1();
		$pic = $this->login_model->getpictool();
		$message = '<p>Greeting,</p><br>
			<p>Table below show all submitted report on tool database..</p>
			';
		$message .= '<table border="1" cellspacing="0" cellpadding="5" width="100%">
			<tr>
				<th>No</th>
				<th>Update</th>
				<th>Tool</th>
				<th>Invoice</th>
				<th>Status</th>
				<th>Action</th>
			</tr>';
		if(!empty($result)){
			$no = 1;
			foreach($result as $tool){
				$message .= 
				'<tr>
					<td>'.$no.'</td>
					<td>'.$tool->timestamp.'</td>
					<td>
						ID:'.$tool->id.'<br>
						'.$tool->name.'<br>
						'.$tool->brand.' - '.$tool->size.'
					</td>
					<td>
						Invoice: '.$tool->invoice.'<br>
						Running Order: '.$tool->num.'<br>
						User: '.$tool->user.'<br>
					</td>
					<td>
						Status: '.$tool->sts.'<br>
						Reason: '.$tool->reason.'
					</td>
					<td>
						<table>
							<tr>
								<td style="background-color: #3cea3c;border-color: #0f6d0f;border: 2px solid #45b7af;padding: 10px;text-align: center;">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'picok/'.$tool->repoid.'">
									Approve
									</a>
								</td>
								<td style="background-color: #e51616;border-color: #ad0606;border: 2px solid #45b7af;padding: 10px;text-align: center;">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'picnotok/'.$tool->repoid.'">
									Reject
									</a>
								</td>
					
							</tr>
						</table>
					</td>
				<tr>';
				$no++;
			}
		}
		else{
			exit;
		}
		$message .= '</table><br>After approve, Report will be send to Manager at 13:00 GMT+7, please submit before.<br><br><p>Thanks,</p><br><p>AutomatedRAWR</p>';
		$body = '
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
				<h3>TROUBLE REPORT</h3>
				<style type="text/css">
				table {
					border-collapse: collapse;
				}
				table, th, td {
					border: 1px solid black;
				}
				body {
					font-family: Arial, Verdana, Helvetica, sans-serif;
					font-size: 16px;
				}
				</style>
			</head>
			<body>
				' . $message . '<br>
				
			</body>
			
		</html>';
	$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.slci.co.id';
		$config['smtp_user'] = 'no-replay@slci.co.id';
		$config['smtp_pass'] = '1234qwer';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';
		
		
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		
		$this->email->set_newline("\r\n");
		$this->email->from('no-replay@slci.co.id', 'Toolkeeping');
		$this->email->to($pic->slcimail);
		
		//$this->email->to('akbar@slci.co.id');
		//$this->email->bcc('akbar@slci.co.id');

		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
	
		echo $this->email->print_debugger(array('headers'));
	exit;
	}
    
    function report2()
	{
		
		$subject = 'Tool Report';
		$result = $this->login_model->report2();
		$man = $this->login_model->getmantool();
		$message = '<p>Greeting,</p><br>
			<p>Table below show all submitted report on tool database. Checked already by PIC</p>
			';
		$message .= '<table border="1" cellspacing="0" cellpadding="5" width="100%">
			<tr>
				<th>No</th>
				<th>Update</th>
				<th>Tool</th>
				<th>Invoice</th>
				<th>Status</th>
				<th>Action</th>
			</tr>';
		if(!empty($result)){
			$no = 1;
			foreach($result as $tool){
				$message .= 
				'<tr>
					<td>'.$no.'</td>
					<td>'.$tool->timestamp.'</td>
					<td>
						ID:'.$tool->id.'<br>
						'.$tool->name.'<br>
						'.$tool->brand.' - '.$tool->size.'
					</td>
					<td>
						Invoice: '.$tool->invoice.'<br>
						Running Order: '.$tool->num.'<br>
						User: '.$tool->user.'<br>
					</td>
					<td>
						Status: '.$tool->sts.'<br>
						Reason: '.$tool->reason.'
					</td>
					<td>
						<table>
							<tr>
								<td style="background-color: #3cea3c;border-color: #0f6d0f;border: 2px solid #45b7af;padding: 10px;text-align: center;">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'manok/'.$tool->repoid.'">
									Approve
									</a>
								</td>
								<td style="background-color: #e51616;border-color: #ad0606;border: 2px solid #45b7af;padding: 10px;text-align: center;">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'mannotok/'.$tool->repoid.'">
									Reject
									</a>
								</td>
					
							</tr>
						</table>
					</td>
				<tr>';
				$no++;
			}
		}
		else{
			exit;
		}
		$message .= '</table><br><br><p>Thanks,</p><br><p>AutomatedRAWR</p>';
		$body = '
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
				<h3>TROUBLE REPORT</h3>
				<style type="text/css">
				table {
					border-collapse: collapse;
				}
				table, th, td {
					border: 1px solid black;
				}
				body {
					font-family: Arial, Verdana, Helvetica, sans-serif;
					font-size: 16px;
				}
				</style>
			</head>
			<body>
				' . $message . '<br>
				
			</body>
			
		</html>';
	$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.slci.co.id';
		$config['smtp_user'] = 'no-replay@slci.co.id';
		$config['smtp_pass'] = '1234qwer';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';
		
		
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);

		$this->email->from('no-replay@slci.co.id', 'Toolkeeping');
		$this->email->to($man->slcimail);
		
		$this->email->bcc('akbar@slci.co.id');

		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
	
		echo $this->email->print_debugger(array('headers'));
	exit;
	}
	
	function picok($repoid = '')
	{
		$reportInfo = array(
			'sts'=> 1
			);
		$result = $this->login_model->updatereport($reportInfo, $repoid);
		echo'thanks! you can close this tab now, auto close tab cannt active because of browser security issue ';
		exit;
	}
	
	function picnotok($repoid = '')
	{
		$reportInfo = array(
			'sts'=> 2
			);
		$result = $this->login_model->updatereport($reportInfo, $repoid);
		echo'thanks! you can close this tab now, auto close tab cannt active because of browser security issue ';
		exit;
	}
	
	function manok($repoid = '')
	{
		$reportInfo = array(
			'sts'=> 11
			);
		$result = $this->login_model->updatereport($reportInfo, $repoid);
		echo'thanks! you can close this tab now, auto close tab cannt active because of browser security issue ';
		exit;
	}
	
	function mannotok($repoid = '')
	{
		$reportInfo = array(
			'sts'=> 3
			);
		$result = $this->login_model->updatereport($reportInfo, $repoid);
		echo'thanks! you can close this tab now, auto close tab cannt active because of browser security issue ';
		exit;
	}
}

?>