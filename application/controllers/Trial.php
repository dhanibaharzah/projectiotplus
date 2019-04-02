<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Trial extends BaseController


{
/**
 * This is default constructor of the class
 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('trial_model');
		$this->isLoggedIn();   
	}
	
	public function trial(){
		
		$this->global['pageTitle'] = 'RAWR : Mortar';
		$this->loadViews("trial", $this->global, NULL, NULL);

	}
	
	function update(){
		$nama = $this->input->post('name');
		$alamat = $this->input->post('address');
		$pekerjaan = $this->input->post('job');
		
		$redir = $this->input->post('redir');
		$update = array(
					  'nama'=>$nama,
					  'alamat'=>$alamat,
					  'pekerjaan'=>$pekerjaan
					  
					  );
		
		$updates = $this->trial_model->update_data($update);
		redirect($redir);
	
	}
	
	function edit(){
		$nama = $this->input->post('name');
		$alamat = $this->input->post('address');
		$pekerjaan = $this->input->post('job');
		$id = $this->input->post('id');
		
		$redir = $this->input->post('redir');
		$update = array(
					  'nama'=>$nama,
					  'alamat'=>$alamat,
					  'pekerjaan'=>$pekerjaan
					  
					  );
		
		$updates = $this->trial_model->edit_data($update, $id);
		redirect($redir);
	
	}
	
	function delete(){
		$id = $this->input->post('id');
		
		$update  = array(
					'isvalid'=>0
					);
		
		
		$updates = $this->trial_model->edit_data($update, $id);
		
		$redir = $this->input->post('redir');
		redirect($redir);
	
	}

	
}	
?>
