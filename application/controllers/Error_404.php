<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Error (ErrorController)
 * Error class to redirect on errors
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Error_404 extends CI_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('login_model');
    }
	function index(){
		$this->isLoggedIn();
    }
	function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('pageNotFound');
        }
    }
}

?>