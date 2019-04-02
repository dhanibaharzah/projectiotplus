<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Testhere extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hse_jsa_model');
        $this->isLoggedIn();   
    }
    function box($id){
		$record = $this->hse_jsa_model->get_jsa_main($id);
		if($this->vendorId > 90000){
			$hse_role = $this->hse_jsa_model->get_userbyuname($this->name);
			$hse_role1 = $hse_role->hse_role;
			$hse_role2 = $hse_role->hse_picar;
		}else{
			$hse_role1 = 0;
			$hse_role2 = 0;
		}
		$a1=0;$a2=0;$a3=0;$a4=0;
		if(!empty($record)){
			if($record->check == $this->name OR $record->check_id == $hse_role1){$a1 = 1;}
			if($record->pic == $this->name or $record->pic_id == $hse_role2){$a2 = 1;}
			if($record->sd == $this->name OR $record->sd_id == $hse_role1){$a3 = 1;}
			if($record->manager == $this->name OR $record->manager_id == $hse_role1){$a4 = 1;}
			
			$a = '<div class="row">';
			$a .='<div class="col-md-12 col-xs-12">';
			if($record->panas != 2 and (!empty($record->panas))){
				$pa1=0;$pa2=0;$pa3=0;$pa4=0;
				if($record->panas == 3 AND $a1 == 1){ $pa1 = 1;}
				if($record->panas == 4 AND $a2 == 1){ $pa2 = 1;}
				if($record->panas == 5 AND $a3 == 1){ $pa3 = 1;}
				if($record->panas == 6 AND $a4 == 1){ $pa4 = 1;}
				
				$a .=	'<a  href="'.base_url();
						if($pa1 == 1){ $a .= 'check_permit/1/';}
						if($pa2 == 1){ $a .= 'check_permit/1/';}
						if($pa3 == 1){ $a .= 'check_permit/1/';}
						if($pa4 == 1){ $a .= 'check_permit/1/';}
						if($pa1 == 0 AND $pa2 == 0 AND $pa3 == 0 AND $pa4 == 0){ $a .= 'just_permit/1/';}
				
				$a .=	$record->id.'"target="_blank" class="btn-sm btn btn-block btn-danger">';
						if($pa1 == 1){ $a .= '<span class="label label-primary label-lg pull-left">Check!</span>';}
						if($pa2 == 1){ $a .= '<span class="label label-warning label-lg pull-left">PIC Area!</span>';}
						if($pa3 == 1){ $a .= '<span class="label label-danger label-lg pull-left">SD!</span>';}
						if($pa4 == 1){ $a .= '<span class="label label-success label-lg pull-left">Manager!</span>';} 
				$a .=	'Hot Work <span class="label label-default">'; 
						if($record->panas == 1){ $a .= '(Editing)';}
						if($record->panas == 3){ $a .= '(Submited)';}
						if($record->panas == 4){ $a .= '(Checked)';}
						if($record->panas == 5){ $a .= '(Approved by PIC)';}
						if($record->panas == 6){ $a .= '(Approved by SD)';}
						if($record->panas == 7){ $a .= '(Approved!)';}
			}
			$a .='</span></a>';
			$a .='</div>';
			$a .='</div>';
			
			$a .='<div class="row">';
			$a .='<div class="col-md-12 col-xs-12">';
			if($record->tinggi != 2 and (!empty($record->tinggi))){
				$ta1=0;$ta2=0;$ta3=0;$ta4=0;
				if($record->tinggi == 3 AND $a1 == 1){ $ta1 = 1;}
				if($record->tinggi == 4 AND $a2 == 1){ $ta2 = 1;}
				if($record->tinggi == 5 AND $a3 == 1){ $ta3 = 1;}
				if($record->tinggi == 6 AND $a4 == 1){ $ta4 = 1;}
				
				$a .=	'<a href="'.base_url();
						if($ta1 == 1){ $a .= 'check_permit/2/';}
						if($ta2 == 1){ $a .= 'check_permit/2/';}
						if($ta3 == 1){ $a .= 'check_permit/2/';}
						if($ta4 == 1){ $a .= 'check_permit/2/';}
						if($ta1 == 0 AND $ta2 == 0 AND $ta3 == 0 AND $ta4 == 0){ $a .= 'just_permit/2/';}
					
				$a .=	$record->id.'"target="_blank" class="btn-sm btn btn-block btn-info">';
						if($ta1 == 1){ $a .= '<span class="label label-primary label-lg pull-left">Check!</span>';}
						if($ta2 == 1){ $a .= '<span class="label label-warning label-lg pull-left">PIC Area!</span>';}
						if($ta3 == 1){ $a .= '<span class="label label-danger label-lg pull-left">SD!</span>';}
						if($ta4 == 1){ $a .= '<span class="label label-success label-lg pull-left">Manager!</span>';}
				$a .=	'At High <span class="label label-default">'; 
						if($record->tinggi == 1){ $a .= '(Editing)';}
						if($record->tinggi == 3){ $a .= '(Submited)';}
						if($record->tinggi == 4){ $a .= '(Checked)';}
						if($record->tinggi == 5){ $a .= '(Approved by PIC)';}
						if($record->tinggi == 6){ $a .= '(Approved by SD)';}
						if($record->tinggi == 7){ $a .= '(Approved!)';}
			}
			$a .='</span></a>';
			$a .='</div>';
			$a .='</div>';
			
			$a .='<div class="row">';
			$a .='<div class="col-md-12 col-xs-12">';
			if($record->terbatas != 2 and (!empty($record->terbatas))){
				$ba1=0;$ba2=0;$ba3=0;$ba4=0;
				if($record->terbatas == 3 AND $a1 == 1){ $ba1 = 1;}
				if($record->terbatas == 4 AND $a2 == 1){ $ba2 = 1;}
				if($record->terbatas == 5 AND $a3 == 1){ $ba3 = 1;}
				if($record->terbatas == 6 AND $a4 == 1){ $ba4 = 1;}
				
				$a .=	'<a href="'.base_url();
						if($ba1 == 1){ $a .= 'check_permit/3/';}
						if($ba2 == 1){ $a .= 'check_permit/3/';}
						if($ba3 == 1){ $a .= 'check_permit/3/';}
						if($ba4 == 1){ $a .= 'check_permit/3/';}
						if($ba1 == 0 AND $ba2 == 0 AND $ba3 == 0 AND $ba4 == 0){ $a .= 'just_permit/3/';}
		
				$a .=	$record->id.'"target="_blank" class="btn-sm btn btn-block btn-success">';
						if($ba1 == 1){ $a .= '<span class="label label-primary label-lg pull-left">Check!</span>';} 
						if($ba2 == 1){ $a .= '<span class="label label-warning label-lg pull-left">PIC Area!</span>';} 
						if($ba3 == 1){ $a .= '<span class="label label-danger label-lg pull-left">SD!</span>';} 
						if($ba4 == 1){ $a .= '<span class="label label-success label-lg pull-left">Manager!</span>';} 
				$a .= 	'Confined Space <span class="label label-default">';
						if($record->terbatas == 1){ $a .= '(Editing)';}
						if($record->terbatas == 3){ $a .= '(Submited)';}
						if($record->terbatas == 4){ $a .= '(Checked)';}
						if($record->terbatas == 5){ $a .= '(Approved by PIC)';}
						if($record->terbatas == 6){ $a .= '(Approved by SD)';}
						if($record->terbatas == 7){ $a .= '(Approved!)';}
			}
			$a .='</span></a>';
			$a .='</div>';
			$a .='</div>';
			
			$a .='<div class="row">';
			$a .='<div class="col-md-12 col-xs-12">';
			if($record->penggalian != 2 and (!empty($record->penggalian))){
				$ga1=0;$ga2=0;$ga3=0;$ga4=0;
				if($record->penggalian == 3 AND $a1 == 1){ $ga1 = 1;}
				if($record->penggalian == 4 AND $a2 == 1){ $ga2 = 1;}
				if($record->penggalian == 5 AND $a3 == 1){ $ga3 = 1;}
				if($record->penggalian == 6 AND $a4 == 1){ $ga4 = 1;}

				$a .= 	'<a href="'.base_url();
						if($ga1 == 1){ $a .= 'check_permit/4/';}
						if($ga2 == 1){ $a .= 'check_permit/4/';}
						if($ga3 == 1){ $a .= 'check_permit/4/';}
						if($ga4 == 1){ $a .= 'check_permit/4/';}
						if($ga1 == 0 AND $ga2 == 0 AND $ga3 == 0 AND $ga4 == 0){ $a .= 'just_permit/4/';}
					
				$a .=	$record->id.'"target="_blank" class="btn-sm btn btn-block btn-primary">';
						if($ga1 == 1){ $a .= '<span class="label label-primary label-lg pull-left">Check!</span>';}
						if($ga2 == 1){ $a .= '<span class="label label-warning label-lg pull-left">PIC Area!</span>';}
						if($ga3 == 1){ $a .= '<span class="label label-danger label-lg pull-left">SD!</span>';}
						if($ga4 == 1){ $a .= '<span class="label label-success label-lg pull-left">Manager!</span>';}
				$a.=	'Digging <span class="label label-default">'; 
						if($record->penggalian == 1){ $a .= '(Editing)';}
						if($record->penggalian == 3){ $a .= '(Submited)';}
						if($record->penggalian == 4){ $a .= '(Checked)';}
						if($record->penggalian == 5){ $a .= '(Approved by PIC)';}
						if($record->penggalian == 6){ $a .= '(Approved by SD)';}
						if($record->penggalian == 7){ $a .= '(Approved!)';}
			}
			$a .='</span></a>';
			$a .='</div>';
			$a .='</div>';
			
			$a .='<div class="row">';
			$a .='<div class="col-md-12 col-xs-12">';
			if($record->listrik != 2 and (!empty($record->listrik))){
				$la1=0;$la2=0;$la3=0;$la4=0;
				if($record->listrik == 3 AND $a1 == 1){ $la1 = 1;}
				if($record->listrik == 4 AND $a2 == 1){ $la2 = 1;}
				if($record->listrik == 5 AND $a3 == 1){ $la3 = 1;}
				if($record->listrik == 6 AND $a4 == 1){ $la4 = 1;}
				
				$a .= 	'<a href="'.base_url();
						if($la1 == 1){ $a .= 'check_permit/5/';}
						if($la2 == 1){ $a .= 'check_permit/5/';}
						if($la3 == 1){ $a .= 'check_permit/5/';}
						if($la4 == 1){ $a .= 'check_permit/5/';}
						if($la1 == 0 AND $la2 == 0 AND $la3 == 0 AND $la4 == 0){ $a .= 'just_permit/5/';}
					
				$a .=	$record->id.'"target="_blank" class="btn-sm btn btn-block btn-warning">';
						if($la1 == 1){ $a .= '<span class="label label-primary label-lg pull-left">Check!</span>';}
						if($la2 == 1){ $a .= '<span class="label label-warning label-lg pull-left">PIC Area!</span>';}
						if($la3 == 1){ $a .= '<span class="label label-danger label-lg pull-left">SD!</span>';}
						if($la4 == 1){ $a .= '<span class="label label-success label-lg pull-left">Manager!</span>';}
				$a .=	'Electric <span class="label label-default">'; 
						if($record->listrik == 1){ $a .= '(Editing)';}
						if($record->listrik == 3){ $a .= '(Submited)';}
						if($record->listrik == 4){ $a .= '(Checked)';}
						if($record->listrik == 5){ $a .= '(Approved by PIC)';}
						if($record->listrik == 6){ $a .= '(Approved by SD)';}
						if($record->listrik == 7){ $a .= '(Approved!)';}
			}
			$a .='</span></a>';
			$a .='</div>';
			$a .='</div>';
			
			$a .='<div class="row">';
			$a .='<div class="col-md-12 col-xs-12">';
			if($record->general != 2 and (!empty($record->general))){
				$ua1=0;$ua2=0;$ua3=0;$ua4=0;
				if($record->general == 3 AND $a1 == 1){ $ua1 = 1;}
				if($record->general == 4 AND $a2 == 1){ $ua2 = 1;}
				if($record->general == 5 AND $a3 == 1){ $ua3 = 1;}
				if($record->general == 6 AND $a4 == 1){ $ua4 = 1;}
				
				$a .= 	'<a href="'.base_url();
						if($ua1 == 1){ $a .= 'check_permit/6/';}
						if($ua2 == 1){ $a .= 'check_permit/6/';}
						if($ua3 == 1){ $a .= 'check_permit/6/';}
						if($ua4 == 1){ $a .= 'check_permit/6/';}
						if($ua1 == 0 AND $ua2 == 0 AND $ua3 == 0 AND $ua4 == 0){ $a .= 'just_permit/6/';}
					
				$a .= 	$record->id.'" target="_blank" class="btn-sm btn btn-block btn-info">';
						if($ua1 == 1){ $a .= '<span class="label label-primary label-lg pull-left">Check!</span>';}
						if($ua2 == 1){ $a .= '<span class="label label-warning label-lg pull-left">PIC Area!</span>';}
						if($ua3 == 1){ $a .= '<span class="label label-danger label-lg pull-left">SD!</span>';}
						if($ua4 == 1){ $a .= '<span class="label label-success label-lg pull-left">Manager!</span>';}
				$a .=	'General <span class="label label-default">'; 
						if($record->general == 1){ $a .= '(Editing)';}
						if($record->general == 3){ $a .= '(Submited)';}
						if($record->general == 4){ $a .= '(Checked)';}
						if($record->general == 5){ $a .= '(Approved by PIC)';}
						if($record->general == 6){ $a .= '(Approved by SD)';}
						if($record->general == 7){ $a .= '(Approved!)';}
			}
			$a .='</span></a>';
			$a .='</div>';
			$a .='</div>';

			echo $a;
		}else{
			echo 'This JSA has been deleted';
		}
	}
	function workerbox($id){
		$a = $this->hse_jsa_model->get_workercount($id);
		echo $a;
	}
	function notebox($id){
		$note = $this->hse_jsa_model->get_notes($id);
		if(!empty($note)){
			$a = '<div class="text-center"><label class="text-center">Catatan Revisi</label></div>
				<table class="table">
					<tr>
						<th class="text-center" width="8%">Permit</th>
						<th class="text-center" width="23%">Checker</th>
						<th class="text-center" width="23%">PIC Area</th>
						<th class="text-center" width="23%">Safety</th>
						<th class="text-center" width="23%">Manager</th>
					</tr>';
			foreach($note as $result){
				if($result->permit_type == 1){ $label = '<span class="label label-danger">Hot Work</span>';}
				if($result->permit_type == 2){ $label = '<span class="label bg-purple">At High</span>';}
				if($result->permit_type == 3){ $label = '<span class="label label-success">Confined</span>';}
				if($result->permit_type == 4){ $label = '<span class="label label-info">Digging</span>';}
				if($result->permit_type == 5){ $label = '<span class="label label-warning">Electrical</span>';}
				if($result->permit_type == 6){ $label = '<span class="label label-primary">General</span>';}
					$a .= '
						<tr>
							<td>'.$label.'</td>
							<td>'.$result->note_app2.'</td>
							<td>'.$result->note_app3.'</td>
							<td>'.$result->note_app4.'</td>
							<td>'.$result->note_app5.'</td>
						</tr>
						';
			}
			$a .= '	</table>';
		}
		if(!empty($a)){
			echo $a;
		}else{
			echo '';
		}
	}
    /**
     * This function is used to load the user list
     */
	
    function create()
    {
		$data['area'] = $this->hse_jsa_model->get_area();
		$data['get_jsa'] = $this->hse_jsa_model->get_jsa($this->name);
		$data['dept'] = $this->hse_jsa_model->get_dept();
		
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$data['company_name'] = $this->name;
			$data['jobList'] = $this->hse_jsa_model->get_jobvendor($this->vendorId);
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$data['company_name'] = 'PT SLCI';
			$data['userList'] = $this->hse_jsa_model->get_user();
		}
		
		$this->global['pageTitle'] = 'RAWR : Create JSA';
		
		$this->loadViews("hse_jsa/new_jsa", $this->global, $data, NULL);
			
    }
	
	function edit_jsa()
    {
		$editjsa = $this->input->post('editjsa');
		redirect('edit/'.$editjsa);
    }
	
	function edit($id = NULL)
    {
		$data['area'] = $this->hse_jsa_model->get_area();
		$data['get_jsa'] = $this->hse_jsa_model->get_jsa($this->name);
		$data['jsa'] = $this->hse_jsa_model->get_jsa_main($id);
		$data['dept'] = $this->hse_jsa_model->get_dept();
		
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$data['company_name'] = $this->name;
			$data['jobList'] = $this->hse_jsa_model->get_jobvendor($this->vendorId);
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$data['company_name'] = 'PT SLCI';
			$data['userList'] = $this->hse_jsa_model->get_user();
		}
		
		$this->global['pageTitle'] = 'RAWR : Edit JSA';
		
		$this->loadViews("hse_jsa/edit_jsa", $this->global, $data, NULL);
			
    }
	
	function add_jsa()
    {
		$check ='';
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$jobid = $this->input->post('job_name');
			$jobdata = $this->hse_jsa_model->get_jobid($jobid);
			$job_name = $jobdata->job_name;
			$check = $jobdata->user;
			$user = $this->name;
			$userdata = $this->hse_jsa_model->get_userbyuname($check);
			if($userdata->hse_role == 10){
				$manager_id = 3;
			}
			if($userdata->hse_role == 11){
				$manager_id = 1;
			}
			if($userdata->hse_role == 12){
				$manager_id = 1;
			}
			if($userdata->hse_role == 13){
				$manager_id = 1;//sementara ganti 1 aslinya 2
			}
			if($userdata->hse_role == 14){
				$manager_id = 4;
			}
			if($userdata->hse_role == 15){
				$manager_id = 1;
			}
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$job_name = $this->input->post('job_name');
			$user = $this->name;
			$userdata = $this->hse_jsa_model->get_userbyuname($user);
			if($userdata->hse_role == 11){
				$check = $user;
				$check_id = 11;
				$manager_id = 1;
			}
			if($userdata->hse_role == 12){
				$check = $user;
				$check_id = 12;
				$manager_id = 1;
			}
			if($userdata->hse_role == 13){
				$check = $user;
				$check_id = 13;
				$manager_id = 1;//sementara ganti 1 aslinya 2
			}
			if($userdata->hse_role == 14){
				$check = $user;
				$check_id = 14;
				$manager_id = 4;
			}
			if($userdata->hse_role == 15){
				$check = $user;
				$check_id = 15;
				$manager_id = 1;
			}
			if($userdata->hse_role == 10){
				$check = $user;
				$check_id = 10;
				$manager_id = 3;
			}
			if($userdata->hse_role == 21){
				$check_id = 11;
				$manager_id = 1;
			}
			if($userdata->hse_role == 22){
				$check_id = 12;
				$manager_id = 1;
			}
			if($userdata->hse_role == 23){
				$check_id = 13;
				$manager_id = 1;//sementara ganti 1 aslinya 2
			}
			if($userdata->hse_role == 24){
				$check_id = 14;
				$manager_id = 4;
			}
		}
		
		$area_id = $this->input->post('area');
		$area = $this->hse_jsa_model->get_area_id($area_id);
		$dept_id = $this->input->post('dept');
		$pic = $this->hse_jsa_model->get_user_pic($area->picarea);
		$start_date = $this->input->post('start_date');
		$end_date = $start_date;
		$s_date = $start_date;
		$e_date = $end_date;
		if(!empty($s_date)){
				$s_date .= ' 00:00:00';
			}
		if(!empty($e_date)){
			$e_date .= ' 00:00:00';
		}
		$start_unix = date('U', strtotime($s_date));
		$end_unix = date('U', strtotime($e_date));
		$start_hour = $this->input->post('start_hour');
		$end_hour = $this->input->post('end_hour');
		$supervisor = $this->input->post('supervisor');
		$supervisor_hp = $this->input->post('supervisor_hp');
		$description = $this->input->post('description');
		$company_name = $this->input->post('company_name');
		$jsaInfo = array('job_name'=>$job_name,
					'area'=>$area->toolname,
					'pic_id'=>$area->picarea,
					'dept'=>$dept_id,
					'start_date'=>$start_date,
					'start_unix'=>$start_unix,
					'end_date'=>$end_date,
					'end_unix'=>$end_unix,
					'start_hour'=>$start_hour,
					'end_hour'=>$end_hour,
					'supervisor'=>$supervisor,
					'supervisor_hp'=>$supervisor_hp,
					'description'=>$description,
					'company_name'=>$company_name,
					'user'=>$user,
					'sd_id'=>10,
					'check'=>$check,
					'check_id'=>$check_id,
					'manager_id'=>$manager_id
					);
		$result = $this->hse_jsa_model->add_jsa($jsaInfo);
                
			if($result > 0)
			{
				$this->session->set_flashdata('success', 'New JSA created successfully');
			}
			else
			{
				$this->session->set_flashdata('error', 'JSA creation failed');
			}
			
			redirect('hazard/x');
    }
	function edited_jsa()
    {
		$check ='';
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$jobid = $this->input->post('job_name');
			$jobdata = $this->hse_jsa_model->get_jobid($jobid);
			$job_name = $jobdata->job_name;
			$check = $jobdata->user;
			$user = $this->name;
			$userdata = $this->hse_jsa_model->get_userbyuname($check);
			if($userdata->hse_role == 11){
				$manager_id = 1;
			}
			if($userdata->hse_role == 12){
				$manager_id = 1;
			}
			if($userdata->hse_role == 13){
				$manager_id = 2;
			}
			if($userdata->hse_role == 14){
				$manager_id = 4;
			}
			if($userdata->hse_role == 15){
				$manager_id = 1;
			}
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$job_name = $this->input->post('job_name');
			$user = $this->name;
			$userdata = $this->hse_jsa_model->get_userbyuname($user);
			if($userdata->hse_role == 15){
				$check = $user;
				$check_id = 15;
				$manager_id = 1;
			}
			if($userdata->hse_role == 10 or $userdata->hse_role == 3){
				$check = $user;
				$check_id = 10;
				$manager_id = 3;
			}
			if($userdata->hse_role == 21){
				$check_id = 11;
				$manager_id = 1;
			}
			if($userdata->hse_role == 22){
				$check_id = 12;
				$manager_id = 1;
			}
			if($userdata->hse_role == 23){
				$check_id = 13;
				$manager_id = 2;
			}
			if($userdata->hse_role == 24){
				$check_id = 14;
				$manager_id = 4;
			}
		}
		$area_id = $this->input->post('area');
		$area = $this->hse_jsa_model->get_area_id($area_id);
		$dept_id = $this->input->post('dept');
		$dept = $this->hse_jsa_model->get_dept_id($dept_id);
		$pic = $this->hse_jsa_model->get_user_pic($area->picarea);
		$start_date = $this->input->post('start_date');
		$end_date = $start_date;
		$s_date = $start_date;
		$e_date = $end_date;
		if(!empty($s_date)){
				$s_date .= ' 00:00:00';
			}
		if(!empty($e_date)){
			$e_date .= ' 00:00:00';
		}
		$start_unix = date('U', strtotime($s_date));
		$end_unix = date('U', strtotime($e_date));
		$start_hour = $this->input->post('start_hour');
		$end_hour = $this->input->post('end_hour');
		$supervisor = $this->input->post('supervisor');
		$supervisor_hp = $this->input->post('supervisor_hp');
		$description = $this->input->post('description');
		$company_name = $this->input->post('company_name');
		$id = $this->input->post('id');
		$jsaInfo = array('job_name'=>$job_name,
					'area'=>$area->toolname,
					'dept'=>$dept_id,
					'pic'=>'',
					'pic_id'=>$area->picarea,
					'start_date'=>$start_date,
					'start_unix'=>$start_unix,
					'end_date'=>$end_date,
					'end_unix'=>$end_unix,
					'start_hour'=>$start_hour,
					'end_hour'=>$end_hour,
					'supervisor'=>$supervisor,
					'supervisor_hp'=>$supervisor_hp,
					'description'=>$description,
					'company_name'=>$company_name,
					'user'=>$user,
					'sd_id'=>10,
					'check'=>$check,
					'check_id'=>$check_id,
					'manager_id'=>$manager_id
					);
		$result = $this->hse_jsa_model->update_jsa($jsaInfo,$id);
                
			if($result > 0)
			{
				$this->session->set_flashdata('success', 'New JSA created successfully');
			}
			else
			{
				$this->session->set_flashdata('error', 'JSA creation failed');
			}
			
			redirect('hazard/'.$id);
    }
	//========================================
	function hazard($id = NULL)
    {
		$data['activitylist'] = $this->hse_jsa_model->get_iden($id);
		$data['activitynum'] = $this->hse_jsa_model->get_iden_num($id);
		if($id == 'x'){
			$data['jsa'] = $this->hse_jsa_model->get_lastjsa($this->name);
		}
		if($id != 'x'){
			$data['jsa'] = $this->hse_jsa_model->get_jsa_main($id);
		}
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$data['company_name'] = $this->name;
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$data['company_name'] = 'PT SLCI';
		}
		
		$this->global['pageTitle'] = 'RAWR : JSA 2/4';
		
		$this->loadViews("hse_jsa/jsaiden", $this->global, $data, NULL);
    }
	function add_act_jsa(){
		$activity = $this->input->post('activity');
		$risk = $this->input->post('risk');
		$control = $this->input->post('control');
		$jsa_id = $this->input->post('jsa_id');
		$no = $this->input->post('no');
		$jsaInfo = array(
					'no'=>$no,
					'activity'=>$activity,
					'risk'=>$risk,
					'control'=>$control,
					'jsa_id'=>$jsa_id
					);
		$this->hse_jsa_model->add_actxxx($jsaInfo);
		echo var_dump($jsaInfo);
		redirect('hazard/'.$jsa_id);
	}
	function add_iden_jsa(){
		
		$risk = $this->input->post('risk');
		$control = $this->input->post('control');
		$jsa_id = $this->input->post('jsa_id');
		$no = $this->input->post('no');
		
		$activity_r = $this->hse_jsa_model->get_iden_row($jsa_id, $no);
		
		$jsaInfo = array(
					'no'=>$no,
					'activity'=>$activity_r->activity,
					'risk'=>$risk,
					'control'=>$control,
					'jsa_id'=>$jsa_id
					);
		$result = $this->hse_jsa_model->add_act($jsaInfo);
		redirect('hazard/'.$jsa_id);
	}
	function del_act($id=NULL, $jsa_id=NULL){
		$jsaInfo = array('isvalid'=>0);
		$result = $this->hse_jsa_model->edit_act($jsaInfo, $id);
		redirect('hazard/'.$jsa_id);
	}
	function edit_act()
    {
		$activity = $this->input->post('activity');
		$risk = $this->input->post('risk');
		$control = $this->input->post('control');
		$id = $this->input->post('id');
		$jsa_id = $this->input->post('jsa_id');
		$jsaInfo = array(
					'activity'=>$activity,
					'risk'=>$risk,
					'control'=>$control
					);
		$result = $this->hse_jsa_model->edit_act($jsaInfo, $id);
		redirect('hazard/'.$jsa_id);
    }
	//================================
	function worker($id = NULL)
    {
		$data['function'] = $this->hse_jsa_model->get_function();
		$data['memberlist'] = $this->hse_jsa_model->get_worker($id);
		if($id == 'x'){
			$data['jsa'] = $this->hse_jsa_model->get_lastjsa($this->name);
		}
		if($id != 'x'){
			$data['jsa'] = $this->hse_jsa_model->get_jsa_main($id);
		}
		
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$data['company_name'] = $this->name;
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$data['company_name'] = 'PT SLCI';
			$data['userList'] = $this->hse_jsa_model->get_user();
		}
		
		$this->global['pageTitle'] = 'RAWR : JSA 3/4';
		
		$this->loadViews("hse_jsa/jsaworker", $this->global, $data, NULL);
    }
	function add_worker(){
		$name = $this->input->post('name');
		if(empty($name)){
			$name = $this->input->post('name2');
		}
		$func = $this->input->post('func');
		$jsa_id = $this->input->post('jsa_id');
		$jsaInfo = array('name'=>$name,
					'func'=>$func,
					'jsa_id'=>$jsa_id
					);
		$result = $this->hse_jsa_model->add_worker($jsaInfo);
		redirect('worker/'.$jsa_id);
	}
	function del_worker($id=NULL, $jsa_id=NULL){
		$jsaInfo = array('isvalid'=>0);
		$result = $this->hse_jsa_model->edit_worker($jsaInfo, $id);
		redirect('worker/'.$jsa_id);
	}
	//===================================
	
	function tool($jsa_id=NULL){
		$data['jsa'] = $this->hse_jsa_model->get_jsa_main($jsa_id);
		
		$data['overrideList'] = $this->hse_jsa_model->get_overrideList($jsa_id);
		$data['apdList'] = $this->hse_jsa_model->get_apdList($jsa_id);
		$data['lotoList'] = $this->hse_jsa_model->get_lotoList($jsa_id);
		$data['toolList'] = $this->hse_jsa_model->get_toolList($jsa_id);
		$data['energyList'] = $this->hse_jsa_model->get_energyList($jsa_id);
		
		$data['apd'] = $this->hse_jsa_model->get_apd();
		$data['loto'] = $this->hse_jsa_model->get_loto();
		$data['energy'] = $this->hse_jsa_model->get_energy();
		$data['tool'] = $this->hse_jsa_model->get_tool();
		$data['override'] = $this->hse_jsa_model->get_override();
		
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$data['company_name'] = $this->name;
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$data['company_name'] = 'PT SLCI';
		}
		$this->global['pageTitle'] = 'RAWR : Peralatan Kerja';
		
		$this->loadViews("hse_jsa/jsatool", $this->global, $data, NULL);
	}
	function add_tool(){
		$jsa_id = $this->input->post('jsa_id');
		$override = $this->input->post('override');
		$apd = $this->input->post('apd');
		$loto = $this->input->post('loto');
		$tool = $this->input->post('tool');
		$energy = $this->input->post('energy');
		
		if(!empty($override)){
			$overrideInfo = array('toolname'=>$override, 'jsa_id'=>$jsa_id);
			$this->hse_jsa_model->add_permitoverride($overrideInfo);
		}
		if(!empty($apd)){
			$apdInfo = array('toolname'=>$apd, 'jsa_id'=>$jsa_id);
			$this->hse_jsa_model->add_permitapd($apdInfo);
		}
		if(!empty($loto)){
			$lotoInfo = array('toolname'=>$loto, 'jsa_id'=>$jsa_id);
			$this->hse_jsa_model->add_permitloto($lotoInfo);
		}
		if(!empty($tool)){
			$toolInfo = array('toolname'=>$tool, 'jsa_id'=>$jsa_id);
			$this->hse_jsa_model->add_permittool($toolInfo);
		}
		if(!empty($energy)){
			$energyInfo = array('toolname'=>$energy, 'jsa_id'=>$jsa_id);
			$this->hse_jsa_model->add_permitenergy($energyInfo);
		}
		
		redirect('tool_hse/'.$jsa_id);
	}
	function del_override($id=NULL,$jsa_id=NULL){
		$permitInfo = array('isvalid'=>0);
		$this->hse_jsa_model->edit_permitoverride($permitInfo, $id);
		redirect('tool_hse/'.$jsa_id);
	}
	function del_apd($id=NULL, $jsa_id=NULL){
		$permitInfo = array('isvalid'=>0);
		$this->hse_jsa_model->edit_permitapd($permitInfo, $id);
		redirect('tool_hse/'.$jsa_id);
	}
	function del_loto($id=NULL, $jsa_id=NULL){
		$permitInfo = array('isvalid'=>0);
		$this->hse_jsa_model->edit_permitloto($permitInfo, $id);
		redirect('tool_hse/'.$jsa_id);
	}
	function del_tool($id=NULL, $jsa_id=NULL){
		$permitInfo = array('isvalid'=>0);
		$this->hse_jsa_model->edit_permittool($permitInfo, $id);
		redirect('tool_hse/'.$jsa_id);
	}
	function del_energy($id=NULL, $jsa_id=NULL){
		$permitInfo = array('isvalid'=>0);
		$this->hse_jsa_model->edit_permitenergy($permitInfo, $id);
		redirect('tool_hse/'.$jsa_id);
	}
	//==========================================================================
	function permit_1($id=NULL){
		$data['general'] = $this->hse_jsa_model->get_checklist('JSA');
		$data['jsa'] = $this->hse_jsa_model->get_jsa_main($id);
		
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$data['company_name'] = $this->name;
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$data['company_name'] = 'PT SLCI';
		}
		
		$this->global['pageTitle'] = 'RAWR : JSA 3/4';
		
		$this->loadViews("hse_jsa/general", $this->global, $data, NULL);
	}
	function save_permit(){
		$panas = $this->input->post('panas');
		$tinggi = $this->input->post('tinggi');
		$terbatas = $this->input->post('terbatas');
		$penggalian = $this->input->post('penggalian');
		$listrik = $this->input->post('listrik');
		$id = $this->input->post('id');
		$general = 2;
		if($panas == 2 AND $tinggi == 2 AND $terbatas == 2 AND $penggalian == 2 AND $listrik == 2){
			$general = 1;
			$checking = $this->hse_jsa_model->get_permit_cek($id, 6);
			if(empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array(
					'jsa_id'=> $id,
					'permit_type'=>6
				);
				$add_permit = $this->hse_jsa_model->add_permit($permitInfo);
			}
		}
		if($panas != 2 or $tinggi != 2 or $terbatas != 2 or $penggalian != 2 or $listrik != 2){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 6);
			if(!empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array('isvalid'=> 0);
				$add_permit = $this->hse_jsa_model->edit_permit_byidandtype($permitInfo, $id, 6);
			}
		}
		
		$jsaInfo = array('panas'=>$panas,
					'tinggi'=>$tinggi,
					'terbatas'=>$terbatas,
					'penggalian'=>$penggalian,
					'listrik'=>$listrik,
					'general'=>$general
					
					);
		$result = $this->hse_jsa_model->update_jsa($jsaInfo,$id);
		
		if($panas == 1){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 1);
			if(empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array(
					'jsa_id'=> $id,
					'permit_type'=>1
				);
				$add_permit = $this->hse_jsa_model->add_permit($permitInfo);
			}
		}
		if($panas == 2){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 1);
			if(!empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array('isvalid'=> 0);
				$add_permit = $this->hse_jsa_model->edit_permit_byidandtype($permitInfo, $id, 1);
			}
		}
		if($tinggi == 1){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 2);
			if(empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array(
					'jsa_id'=> $id,
					'permit_type'=>2
				);
				$add_permit = $this->hse_jsa_model->add_permit($permitInfo);
			}
		}
		if($tinggi == 2){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 2);
			if(!empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array('isvalid'=> 0);
				$add_permit = $this->hse_jsa_model->edit_permit_byidandtype($permitInfo, $id, 2);
			}
		}
		if($terbatas == 1){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 3);
			if(empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array(
					'jsa_id'=> $id,
					'permit_type'=>3
				);
				$add_permit = $this->hse_jsa_model->add_permit($permitInfo);
			}
		}
		if($terbatas == 2){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 3);
			if(!empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array('isvalid'=> 0);
				$add_permit = $this->hse_jsa_model->edit_permit_byidandtype($permitInfo, $id, 3);
			}
		}
		if($penggalian == 1){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 4);
			if(empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array(
					'jsa_id'=> $id,
					'permit_type'=>4
				);
				$add_permit = $this->hse_jsa_model->add_permit($permitInfo);
			}
		}
		if($penggalian == 2){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 4);
			if(!empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array('isvalid'=> 0);
				$add_permit = $this->hse_jsa_model->edit_permit_byidandtype($permitInfo, $id, 4);
			}
		}
		if($listrik == 1){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 5);
			if(empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array(
					'jsa_id'=> $id,
					'permit_type'=>5
				);
				$add_permit = $this->hse_jsa_model->add_permit($permitInfo);
			}
		}
		if($listrik == 2){
			$checking = $this->hse_jsa_model->get_permit_cek($id, 5);
			if(!empty($checking)){
				$jsadata = $this->hse_jsa_model->get_jsa_main($id);
				$permitInfo = array('isvalid'=> 0);
				$add_permit = $this->hse_jsa_model->edit_permit_byidandtype($permitInfo, $id, 5);
			}
		}
		if($panas == 1){redirect('permit/1/'.$id);}
		if($tinggi == 1){redirect('permit/2/'.$id);}
		if($terbatas == 1){redirect('permit/3/'.$id);}
		if($penggalian == 1){redirect('permit/4/'.$id);}
		if($listrik == 1){redirect('permit/5/'.$id);}
		if($general == 1){redirect('permit/6/'.$id);}
	}
	//===================================================================================
	function myjsa(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_jsa_model->get_myjsaCount($this->name,$searchText);
		$returns = $this->paginationCompress ( "myjsa/", $count, 10 );
		$data['JSAlist'] = $this->hse_jsa_model->get_myjsa($this->name,$searchText, $returns["page"], $returns["segment"]);
		$data['user'] = $this->name;
		$this->global['pageTitle'] = 'RAWR : My JSA';
		$this->loadViews("hse_jsa/myjsa", $this->global, $data, NULL);
	}
	function closedjsa(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$type1 = $this->input->post('type1');
		$type2 = $this->input->post('type2');
		$type3 = $this->input->post('type3');
		$type4 = $this->input->post('type4');
		$type5 = $this->input->post('type5');
		$type6 = $this->input->post('type6');
		$lokasi = $this->input->post('lokasi');
		
		$data['lokasi'] = $lokasi;
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$data['type1'] = $type1;
		$data['type2'] = $type2;
		$data['type3'] = $type3;
		$data['type4'] = $type4;
		$data['type5'] = $type5;
		$data['type6'] = $type6;
		$data['searchText'] = $searchText;
		
		if(!empty($fromDate)){
				$fromDate .= ' 00:00:00';
			}
		if(!empty($toDate)){
			$toDate .= ' 00:00:00';
		}
		$start = date('U', strtotime($fromDate));
		$end = date('U', strtotime($toDate));
		$this->load->library('pagination');
		$data['area'] = $this->hse_jsa_model->get_area();
		
		$data['hot_work'] = $this->hse_jsa_model->get_hot_work($searchText, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
		$data['at_high'] = $this->hse_jsa_model->get_at_high($searchText, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
		$data['confined'] = $this->hse_jsa_model->get_confined($searchText, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
		$data['digging'] = $this->hse_jsa_model->get_digging($searchText, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
		$data['listrik'] = $this->hse_jsa_model->get_listrik($searchText, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
		$data['general'] = $this->hse_jsa_model->get_general($searchText, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6);
		
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$vendor = 1;
			$count = $this->hse_jsa_model->get_closedjsaCount($this->name, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6, $searchText);
			$returns = $this->paginationCompress ( "closedjsa/", $count, 10 );
			$data['JSAlist'] = $this->hse_jsa_model->get_closedjsa($this->name, $start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6, $searchText, $returns["page"], $returns["segment"]);
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$vendor = 2;
			$count = $this->hse_jsa_model->get_closedjsaSLCICount($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6, $searchText);
			$returns = $this->paginationCompress ( "closedjsa/", $count, 10 );
			$data['JSAlist'] = $this->hse_jsa_model->get_closedjsaSLCI($start, $end, $lokasi, $type1, $type2, $type3, $type4, $type5, $type6, $searchText, $returns["page"], $returns["segment"]);
		}
		
		$data['user'] = $this->name;
		$data['vendor'] = $vendor;
		
		$this->global['pageTitle'] = 'RAWR : Closed JSA';
		
		$this->loadViews("hse_jsa/closedjsa", $this->global, $data, NULL);
	}
	
	function permit($type=NULL, $jsa_id=NULL){
		$data['jsa'] = $this->hse_jsa_model->get_jsa_main($jsa_id);
		$data['user'] = $this->name;
		if($type == 1){$permit_type = 'HOT';}
		if($type == 2){$permit_type = 'WAH';}
		if($type == 3){$permit_type = 'Confined';}
		if($type == 4){$permit_type = 'Galian';}
		if($type == 5){$permit_type = 'Listrik';}
		if($type == 6){$permit_type = 'General';}
		$data['type'] = $type;
		$data['permit'] = $this->hse_jsa_model->get_permit_cek($jsa_id, $type);
		
		$permit_id = $data['permit']->id;
		$last_type = $data['permit']->permit_type;
		
		if($permit_type != 'General'){
			$data['checklist'] = $this->hse_jsa_model->get_checklist('General');
			$data['checklist2'] = $this->hse_jsa_model->get_checklist($permit_type);
		}
		if($permit_type == 'General'){
			$data['checklist'] = $this->hse_jsa_model->get_checklist('General');
			$data['checklist2'] = '';
		}
		
		if($this->vendorId >= 40000 AND $this->vendorId <= 49999){
			$data['company_name'] = $this->name;
		}
		if($this->vendorId >= 90000 AND $this->vendorId <= 99999){
			$data['company_name'] = 'PT SLCI';
		}
		$this->global['pageTitle'] = 'RAWR : Ijin Kerja';
		
		$this->loadViews("hse_jsa/new_permit", $this->global, $data, NULL);
	}
	
	function cek_permit(){
		$jsa_id = $this->input->post('jsa_id');
		$type = $this->input->post('type');
		
		$param1 = $this->input->post('param1');
		$param2 = $this->input->post('param2');
		$param3 = $this->input->post('param3');
		$param4 = $this->input->post('param4');
		$param5 = $this->input->post('param5');
		$param6 = $this->input->post('param6');
		$param7 = $this->input->post('param7');
		$param8 = $this->input->post('param8');
		$param9 = $this->input->post('param9');
		$param10 = $this->input->post('param10');
		$param11 = $this->input->post('param11');
		$param12 = $this->input->post('param12');
		$param13 = $this->input->post('param13');
		$param14 = $this->input->post('param14');
		$param15 = $this->input->post('param15');
		
		$cek1 = $this->input->post('cek1');
		$cek2 = $this->input->post('cek2');
		$cek3 = $this->input->post('cek3');
		$cek4 = $this->input->post('cek4');
		$cek5 = $this->input->post('cek5');
		$cek6 = $this->input->post('cek6');
		$cek7 = $this->input->post('cek7');
		$cek8 = $this->input->post('cek8');
		$cek9 = $this->input->post('cek9');
		$cek10 = $this->input->post('cek10');
		
		$permitInfo = array(
					'permit_type'=>$type,
					'jsa_id'=>$jsa_id,
					'cek1'=>$cek1,
					'cek2'=>$cek2,
					'cek3'=>$cek3,
					'cek4'=>$cek4,
					'cek5'=>$cek5,
					'cek6'=>$cek6,
					'cek7'=>$cek7,
					'cek8'=>$cek8,
					'cek9'=>$cek9,
					'cek10'=>$cek10
					);
	
		$get_permit = $this->hse_jsa_model->get_permit_cek($jsa_id, $type);
		$edit_permit = $this->hse_jsa_model->edit_permit($permitInfo, $get_permit->id);
		
		$generalInfo = array('param1'=>$param1,
					'param2'=>$param2,
					'param3'=>$param3,
					'param4'=>$param4,
					'param5'=>$param5,
					'param6'=>$param6,
					'param7'=>$param7,
					'param8'=>$param8,
					'param9'=>$param9,
					'param10'=>$param10,
					'param11'=>$param11,
					'param12'=>$param12,
					'param13'=>$param13,
					'param14'=>$param14,
					'param15'=>$param15
					);
		$edit_permit = $this->hse_jsa_model->gen_permit($generalInfo, $get_permit->jsa_id);
		$time = date('U');
		if($type == 1){
			$jsaInfo = array(
				'saved'=>1,
				'panas'=>3,
				'rejected'=>0,
				's1_unix'=>$time
			);
		}
		if($type == 2){
			$jsaInfo = array(
				'saved'=>1,
				'tinggi'=>3,
				'rejected'=>0,
				's2_unix'=>$time
			);
		}
		if($type == 3){
			$jsaInfo = array(
				'saved'=>1,
				'terbatas'=>3,
				'rejected'=>0,
				's3_unix'=>$time
			);
		}
		if($type == 4){
			$jsaInfo = array(
				'saved'=>1,
				'penggalian'=>3,
				'rejected'=>0,
				's4_unix'=>$time
			);
		}
		if($type == 5){
			$jsaInfo = array(
				'saved'=>1,
				'listrik'=>3,
				'rejected'=>0,
				's5_unix'=>$time
			);
		}
		if($type == 6){
			$jsaInfo = array(
				'saved'=>1,
				'general'=>3,
				'rejected'=>0,
				's6_unix'=>$time
			);
		}
		$update_jsa = $this->hse_jsa_model->update_jsa($jsaInfo,$jsa_id);
		$permitInfo = array(
			'app1'=>1
		);
		$edit_permit = $this->hse_jsa_model->edit_permit($permitInfo, $get_permit->id);
		redirect('submitlinechecker/'.$get_permit->id);
	}
	//====================================================================
	function view($id=NULL){
		$data['JSAmain'] = $this->hse_jsa_model->get_jsa_main($id);
		$data['JSAiden'] = $this->hse_jsa_model->get_iden($id);
		$data['JSAwork'] = $this->hse_jsa_model->get_worker($id);
		$data['JSAoverride'] = $this->hse_jsa_model->get_overrideList($id);
		$data['JSAapd'] = $this->hse_jsa_model->get_apdList($id);
		$data['JSAloto'] = $this->hse_jsa_model->get_lotoList($id);
		$data['JSAtool'] = $this->hse_jsa_model->get_toolList($id);
		$data['JSAenergy'] = $this->hse_jsa_model->get_energyList($id);
		
		$this->load->model('hse_login_model');
		$data['report'] = $this->hse_login_model->get_report($id);
		$this->global['pageTitle'] = 'RAWR : View JSA';
		$this->loadViews("hse_jsa/view_jsa", $this->global, $data, NULL);
	}
	
	function submit_job(){
		if($this->vendorId > 90000){
			$user_role = $this->hse_jsa_model->get_userbyuname($this->name);
			if($user_role->hse_role !=9){
				$data['add_job'] = 1;
			}
			else{
				$data['add_job'] = 2;
			}
			$job_name = $this->input->post('job_name');
			$po_num = $this->input->post('po_num');
			$user = $this->input->post('user');
			$vendor = $this->input->post('vendor');
			
			if(!empty($job_name)){
				$jobInfo = array(
					'po_num'=>$po_num,
					'job_name'=>$job_name,
					'pt_name'=>$vendor,
					'user'=>$user
				);
				$this->hse_jsa_model->add_job($jobInfo);
			}
			
			$data['vendorList'] = $this->hse_jsa_model->get_vendor();
			$data['userList'] = $this->hse_jsa_model->get_user();
			$data['joblist'] = $this->hse_jsa_model->get_jobs();
			$this->global['pageTitle'] = 'RAWR : Submit Job';
			$this->loadViews("hse_jsa/submit_job", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	
	function add_vendor(){
		
		$NIK = $this->hse_jsa_model->get_vendorID();
		$uName = $this->input->post('uName');
		$pass = $this->input->post('pass');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');
		$uPassword = $pass;
		if(!empty($uName)){
			$vendorInfo = array(
				'NIK'=>$NIK->NIK + 1,
				'uName'=>$uName,
				'uPassword'=>md5($uPassword),
				'pass_user'=>$uPassword,
				'email'=>$email,
				'telp'=>$telp
			);
			$this->hse_jsa_model->add_vendor($vendorInfo);
			redirect('submit_job');
		}
		$this->global['pageTitle'] = 'RAWR : Add Vendor';
		$this->loadViews("hse_jsa/add_vendor", $this->global, NULL, NULL);
	}
	
	
	function printx($id){
		$jsa = $this->hse_jsa_model->get_jsabyid($id);
		$data['jsa'] = $jsa;
		$data['workerlist'] = $this->hse_jsa_model->get_worker($id);
		$this->load->view('jsa/printx', $data);
	}
	
	function qrcode($id){
		$this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = base_url().'monitor/'.$id;
		$this->ciqrcode->generate($params);
	}
	
	function qrcodex($id){
		$this->load->library('ciqrcode');
		$params['data'] = 'This is a text to encode become QR Code';
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'qr.png';
		$this->ciqrcode->generate($params);

		echo '<img src="'.base_url().'tes.png" />';
	}
	
	function delete_job(){
		
		$id = $this->input->post('id');
		$jobInfo = array('isvalid'=>0);
		$this->hse_jsa_model->update_job($jobInfo, $id);
		redirect('submit_job');
	}
	function edit_job($id=NULL){
		if($this->vendorId > 90000){
			$user_role = $this->hse_jsa_model->get_userbyuname($this->name);
			if($user_role->hse_role !=9){
				$data['add_job'] = 1;
			}
			else{
				$data['add_job'] = 2;
			}
			$data['jobdata'] = $this->hse_jsa_model->get_jobid($id);
			$data['vendorList'] = $this->hse_jsa_model->get_vendor();
			$data['userList'] = $this->hse_jsa_model->get_user();
			$data['joblist'] = $this->hse_jsa_model->get_jobs();
			$this->global['pageTitle'] = 'RAWR : Submit Job';
			$this->loadViews("hse_jsa/edit_job", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	function editjob(){
		
		$job_name = $this->input->post('job_name');
		$po_num = $this->input->post('po_num');
		$user = $this->input->post('user');
		$vendor = $this->input->post('vendor');
		$id = $this->input->post('id');
		
		if(!empty($job_name)){
			$jobInfo = array(
				'po_num'=>$po_num,
				'job_name'=>$job_name,
				'pt_name'=>$vendor,
				'user'=>$user,
				'notif'=>1
			);
			$this->hse_jsa_model->update_job($jobInfo, $id);
		}
		redirect('submit_job');
	}
	function vendorlist($searchxx= NULL)
    {
		if($this->vendorId > 90000){
			$user_role = $this->hse_jsa_model->get_userbyuname($this->name);
			if($user_role->hse_role !=9){
				$data['add_job'] = 1;
			}
			else{
				$data['add_job'] = 2;
			}
		
			$searchText = $this->security->xss_clean($this->input->post('searchText'));
			$data['searchText'] = $searchText;
			$this->load->library('pagination');
			
			$count = $this->hse_jsa_model->vendorlistCount($searchText);
			
			$returns = $this->paginationCompress ( 'vendorlist/', $count, 10);
			
			$data['vendorlist'] = $this->hse_jsa_model->vendorlist($searchText, $returns["page"], $returns["segment"]);
			
			$this->global['pageTitle'] = 'RAWR : Rental Tool';
			$this->loadViews("hse_jsa/vendorlist", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	function edit_vendor($id){
		$user_role = $this->hse_jsa_model->get_userbyuname($this->name);
		if($user_role->hse_role ==9){
			$data['vendordata'] = $this->hse_jsa_model->get_vendorbyID($id);
			$this->global['pageTitle'] = 'RAWR : Edit Vendor';
			$this->loadViews("hse_jsa/edit_vendor", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	function editvendor(){
		
		$uName = $this->input->post('uName');
		$pass = $this->input->post('pass');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');
		$id = $this->input->post('id');
		
		$vendorInfo = array(
			'uName'=>$uName,
			'uPassword'=>$pass,
			'email'=>$email,
			'telp'=>$telp
		);
		$this->hse_jsa_model->update_vendor($vendorInfo, $id);
		redirect('vendorlist');
	}
	
	
	function upload_file(){
			$vendor_id = $this->input->post('vendor_id');
			$vendor_name = $this->input->post('vendor_name');
			$regnum = $this->input->post('regnum');
			$no_ktp = $this->input->post('no_ktp');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$notes = $this->input->post('notes');
			//$img = $this->input->post('img');
			$img = 'man'.date('U').'-'.$this->vendorId.$img;
			
			$config['upload_path']          = './assets/contractor';
			$config['allowed_types']        = '*';
			$config['max_size']             = 2048;
			$config['overwrite']            = TRUE;
			$config['file_name'] 			= $img;
			$this->load->library('upload', $config);
			$this->upload->do_upload('img');
			$img = $this->upload->data("file_name");
			
			if(!empty($vendor_id)){
				$vendorInfo = array(
					'vendor_id'=>$vendor_id,
					'vendor_name'=>$vendor_name,
					'regnum'=>$regnum,
					'no_ktp'=>$no_ktp,
					'start_date'=>$start_date,
					'end_date'=>$end_date,
					'notes'=>$notes,
					'img'=>$img
				);
				$this->hse_jsa_model->add_vendorinduction($vendorInfo);
				redirect('vendorinduction');
			}	
	}		
	
	function add_vendorinduction(){
		$data['regnum']=$this->hse_jsa_model->get_regnum();
		$data['vendor'] = $this->hse_jsa_model->get_vendorinduction();
		
		$this->load->helper(array('form', 'url'));
		$this->global['pageTitle'] = 'RAWR : Vendor Induction';
		$this->loadViews("hse_jsa/inductionadd", $this->global, $data, NULL);
	}
	
	function vendorinduction(){
		$data['role'] = $this->hse_jsa_model->get_userbyuname($this->name);
		
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		
		$count = $this->hse_jsa_model->vendorinductionCount($searchText);
		$data['total'] = $count;
		$data['vendor'] = $this->hse_jsa_model->get_vendor();
		$returns = $this->paginationCompress ( 'vendorinductionCount/', $count, 10);
		$data['list'] = $this->hse_jsa_model->vendorinduction($searchText, $returns["page"], $returns["segment"]);
		
		$this->global['pageTitle'] = 'RAWR : Vendor Induction';
		$this->loadViews("hse_jsa/induction", $this->global, $data, NULL);
		
	}
	
	function penaltycount($manvendor){
		
		$total = $this->hse_jsa_model->penaltyCount($manvendor);
		echo $total;
		
	}
	
	function penaltyvendor($id = NULL){
		
		$vendor_name = $this->input->post('man_vendor_id');
		$vendor_id = $this->input->post('vendor_id');
		$regnum = $this->input->post('regnums');
		$notes = $this->input->post('notes');
		
		$vendor = array(
			'man_vendor_id'=>$vendor_name,
			'vendor_id'=>$vendor_id,
			'regnums'=>$regnum,
			'notes'=>$notes
		);
		
		$this->hse_jsa_model->add_penalty($vendor, $id);
		redirect('vendorinduction');
	}
	
	function penalty_vendor($id){
		if($this->vendorId > 90000)
		{
			$role = $this->hse_jsa_model->get_userbyuname($this->name);
			if($role->hse_role == 9 or $role->hse_role == 10){
				$data['penalty_data'] = $this->hse_jsa_model->get_penalty($id);
				$this->global['pageTitle'] = 'RAWR : Vendor Penalty';
				$this->loadViews("hse_jsa/inductionpenalty", $this->global, $data, NULL);
			}
			else{
				$this->loadThis();
			}
		}else{
			$this->loadThis();
		}
	}

	
	function cancel_jsa(){
		$id = $this->input->post('id');
		
		$jsadata = $this->hse_jsa_model->get_jsa_main($id);
		if($jsadata->panas != 2){
			$jsaInfo = array('panas'=>1, 'saved'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->tinggi != 2){
			$jsaInfo = array('tinggi'=>1, 'saved'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->terbatas != 2){
			$jsaInfo = array('terbatas'=>1, 'saved'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->penggalian != 2){
			$jsaInfo = array('penggalian'=>1, 'saved'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->listrik != 2){
			$jsaInfo = array('listrik'=>1, 'saved'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->general != 2){
			$jsaInfo = array('general'=>1, 'saved'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		$jsaInfo = array('app1'=>0, 'app2'=>0, 'app3'=>0, 'app4'=>0, 'app5'=>0);
		$this->hse_jsa_model->gen_permit($jsaInfo, $id);
		redirect('myjsa');
	}
	
	function delete_jsa(){
		$id = $this->input->post('id');
		$acc = $this->input->post('acc');
		$jsadata = $this->hse_jsa_model->get_jsa_main($id);
		if($jsadata->panas != 2){
			$jsaInfo = array('panas'=>1, 'saved'=> 0, 'isvalid'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->tinggi != 2){
			$jsaInfo = array('tinggi'=>1, 'saved'=> 0, 'isvalid'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->terbatas != 2){
			$jsaInfo = array('terbatas'=>1, 'saved'=> 0, 'isvalid'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->penggalian != 2){
			$jsaInfo = array('penggalian'=>1, 'saved'=> 0, 'isvalid'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->listrik != 2){
			$jsaInfo = array('listrik'=>1, 'saved'=> 0, 'isvalid'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->general != 2){
			$jsaInfo = array('general'=>1, 'saved'=> 0, 'isvalid'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		if($jsadata->general = 2){
			$jsaInfo = array('general'=>1, 'saved'=> 0, 'isvalid'=> 0);
			$this->hse_jsa_model->update_jsa($jsaInfo, $id);
		}
		
		$jsaInfo = array('isvalid'=>0, 'app1'=>0, 'app2'=>0, 'app3'=>0, 'app4'=>0, 'app5'=>0);
		$this->hse_jsa_model->gen_permit($jsaInfo, $id);
		if(empty($acc)){redirect('myjsa');}else{redirect('appjsa');}
	}
	
	function test(){
		if($this->vendorId > 90000)
		{
			$hse_role = $this->hse_jsa_model->get_userbyuname($this->name);
			$searchText = $this->security->xss_clean($this->input->post('searchText'));
			$fromDate = $this->input->post('fromDate');
			$toDate = $this->input->post('toDate');
			$type1 = $this->input->post('type1');
			$type2 = $this->input->post('type2');
			$type3 = $this->input->post('type3');
			$type4 = $this->input->post('type4');
			$type5 = $this->input->post('type5');
			$type6 = $this->input->post('type6');
			$lokasi = $this->input->post('lokasi');
			$status = $this->input->post('status');
			
			$data['status'] = $status;
			$data['lokasi'] = $lokasi;
			$data['fromDate'] = $fromDate;
			$data['toDate'] = $toDate;
			$data['type1'] = $type1;
			$data['type2'] = $type2;
			$data['type3'] = $type3;
			$data['type4'] = $type4;
			$data['type5'] = $type5;
			$data['type6'] = $type6;
			$data['searchText'] = $searchText;
			if(!empty($fromDate)){
				$fromDate .= ' 00:00:00';
			}
			if(!empty($toDate)){
				$toDate .= ' 00:00:00';
			}
			$start = date('U', strtotime($fromDate));
			$end = date('U', strtotime($toDate));
			$this->load->library('pagination');
			$data['area'] = $this->hse_jsa_model->get_area();
			$data['user'] = $this->name;
			$data['role'] = $hse_role->hse_role;
			$data['picar'] = $hse_role->hse_picar;
			$count = $this->hse_jsa_model->get_appjsaCount($start, $end, $lokasi, $status, $type1, $type2, $type3, $type4, $type5, $type6, $this->name,$hse_role->hse_role, $hse_role->hse_picar, $searchText);
			$returns = $this->paginationCompress ( "test/", $count, 10 );
			$data['JSAlist'] = $this->hse_jsa_model->get_appjsa($start, $end, $lokasi, $status, $type1, $type2, $type3, $type4, $type5, $type6, $this->name,$hse_role->hse_role, $hse_role->hse_picar, $searchText, $returns["page"], $returns["segment"]);
			$this->global['pageTitle'] = 'RAWR : Requested';
			$this->loadViews("test", $this->global, $data, NULL);
		}else{
			$this->loadThis();
		}
	}
	
	function check_permit($permit_type = NULL, $jsa_id = NULL){
		$permit = $this->hse_jsa_model->get_permit_cek($jsa_id, $permit_type);
		redirect('linecheck/'.$jsa_id.'/'.$permit->id);
	}
	function just_permit($permit_type = NULL, $jsa_id = NULL){
		$permit = $this->hse_jsa_model->get_permit_cek($jsa_id, $permit_type);
		redirect('justcheck/'.$jsa_id.'/'.$permit->id);
	}
	
	function today_jsa(){
		$today_unix = date('U');
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['name'] = $this->name;
		$this->load->library('pagination');
		if($this->vendorId > 90000){
			$count = $this->hse_jsa_model->get_todayjsaCount($today_unix,$searchText);
			$returns = $this->paginationCompress ( "today_jsa/", $count, 10 );
			$data['today_jsa'] = $this->hse_jsa_model->get_todayjsa($today_unix, $searchText, $returns["page"], $returns["segment"]);
		}else{
			$count = $this->hse_jsa_model->get_todayjsaxCount($today_unix,$this->name,$searchText);
			$returns = $this->paginationCompress ( "today_jsa/", $count, 10 );
			$data['today_jsa'] = $this->hse_jsa_model->get_todayjsax($today_unix,$this->name, $searchText, $returns["page"], $returns["segment"]);
		}
		
		//echo $today_unix;
		$this->global['pageTitle'] = 'RAWR : Ongoing Permit';
		
		$this->loadViews("hse_jsa/todayjsa", $this->global, $data, NULL);
	}
	
	function get_events()
	{
		$start = $this->input->get("start");
		$end = $this->input->get("end");
		if($this->vendorId > 90000){
			$events = $this->hse_jsa_model->get_events($start, $end);
		}else{
			$events = $this->hse_jsa_model->get_eventvendor($this->name, $start, $end);
		}
		$data_events = array();
		$num = 1;
		foreach($events->result() as $r) {
			$title = $r->job_name;
			$a = '#ff5e5e';
			$b = '#2cabd6';
			$c = '#f17837';
			$d = '#f0a036';
			$e = '#efbb35';
			$f = '#34ef79';
			$g = '#33bdef';
			$h = '#ed5c5c';
			$i = '#2ef293';
			$j = '#f23737';
			$xx = $num % 10;
			if($xx == 1){$color = $a;}
			if($xx == 2){$color = $b;}
			if($xx == 3){$color = $c;}
			if($xx == 4){$color = $d;}
			if($xx == 5){$color = $e;}
			if($xx == 6){$color = $f;}
			if($xx == 7){$color = $g;}
			if($xx == 8){$color = $h;}
			if($xx == 9){$color = $i;}
			if($xx == 10){$color = $j;}
			$ee = $r->end_unix + 86399;
			$st = date('Y-m-d H:i:s', ($r->start_unix));
			$et = date('Y-m-d H:i:s', ($ee));
			$data_events[] = array(
				"id" => $r->id,
				"title" => $title,
				"description" => $r->area,
				"end" => $et,
				"start" => $st,
				"color" => $color
			);
			$num++;
		}
		
		echo json_encode(array("events" => $data_events));
		exit();
	}
	
	function re_create($id = NULL){
		$get_jsa = $this->hse_jsa_model->get_jsabyid($id);
		if($get_jsa->panas == 7){$panas = 1;}else{$panas = 2;}
		if($get_jsa->tinggi == 7){$tinggi = 1;}else{$tinggi = 2;}
		if($get_jsa->terbatas == 7){$terbatas = 1;}else{$terbatas = 2;}
		if($get_jsa->penggalian == 7){$penggalian = 1;}else{$penggalian = 2;}
		if($get_jsa->listrik == 7){$listrik = 1;}else{$listrik = 2;}
		if($get_jsa->general == 7){$general = 1;}else{$general = 2;}
		$get_iden = $this->hse_jsa_model->get_iden($id);
		$get_worker = $this->hse_jsa_model->get_worker($id);
		$get_permit = $this->hse_jsa_model->get_permit($id);
		$get_override = $this->hse_jsa_model->get_overrideList($id);
		$get_apd = $this->hse_jsa_model->get_apdList($id);
		$get_loto = $this->hse_jsa_model->get_lotoList($id);
		$get_tool = $this->hse_jsa_model->get_toolList($id);
		$get_energy = $this->hse_jsa_model->get_energyList($id);
		//$dept = $this->hse_jsa_model->get_dept_id($dept_id);
		
		$jsaInfo = array(
			'job_name'=>$get_jsa->job_name,
			'area'=>$get_jsa->area,
			'panas'=>$panas,
			'tinggi'=>$tinggi,
			'terbatas'=>$terbatas,
			'penggalian'=>$penggalian,
			'listrik'=>$listrik,
			'general'=>$general,
			'company_name'=>$get_jsa->company_name,
			'supervisor'=>$get_jsa->supervisor,
			'supervisor_hp'=>$get_jsa->supervisor_hp,
			'description'=>$get_jsa->description,
			'dept'=>$get_jsa->dept,
			'user'=>$this->name,
			'check'=>$get_jsa->check,
			'check_id'=>$get_jsa->check_id,
			'pic'=>$get_jsa->pic,
			'sd'=>$get_jsa->sd,
			'sd_id'=>$get_jsa->sd_id,
			'manager'=>$get_jsa->manager,
			'manager_id'=>$get_jsa->manager_id
			);
		$add_jsa = $this->hse_jsa_model->add_jsa($jsaInfo);
		
		//getting new id
		$new_jsa = $this->hse_jsa_model->get_jsabyrecreate($get_jsa->job_name, $this->name);
		$new_id = $new_jsa->id;
		
		//adding other data to new jsa
		if(!empty($get_iden)){
			foreach($get_iden as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'no'=>$record->no,
					'activity'=>$record->activity,
					'risk'=>$record->risk,
					'control'=>$record->control
					);
				$add_item = $this->hse_jsa_model->add_act($add);
			}
		}
		if(!empty($get_worker)){
			foreach($get_worker as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'name'=>$record->name,
					'func'=>$record->func
					);
				$add_item = $this->hse_jsa_model->add_worker($add);
			}
		}
		if(!empty($get_permit)){
			foreach($get_permit as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'permit_type'=>$record->permit_type,
					'param1'=>$record->param1,
					'param2'=>$record->param2,
					'param3'=>$record->param3,
					'param4'=>$record->param4,
					'param5'=>$record->param5,
					'param6'=>$record->param6,
					'param7'=>$record->param7,
					'param8'=>$record->param8,
					'param9'=>$record->param9,
					'param10'=>$record->param10,
					'param11'=>$record->param11,
					'param12'=>$record->param12,
					'param13'=>$record->param13,
					'param14'=>$record->param14,
					'param15'=>$record->param15,
					'cek1'=>$record->cek1,
					'cek2'=>$record->cek2,
					'cek3'=>$record->cek3,
					'cek4'=>$record->cek4,
					'cek5'=>$record->cek5,
					'cek6'=>$record->cek6,
					'cek7'=>$record->cek7,
					'cek8'=>$record->cek8,
					'cek9'=>$record->cek9,
					'cek10'=>$record->cek10
					);
				$add_item = $this->hse_jsa_model->add_permit($add);
			}
		}
		if(!empty($get_override)){
			foreach($get_override as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'toolname'=>$record->toolname
					);
				$add_item = $this->hse_jsa_model->add_permitoverride($add);
			}
		}
		if(!empty($get_apd)){
			foreach($get_apd as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'toolname'=>$record->toolname
					);
				$add_item = $this->hse_jsa_model->add_permitapd($add);
			}
		}
		if(!empty($get_loto)){
			foreach($get_loto as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'toolname'=>$record->toolname
					);
				$add_item = $this->hse_jsa_model->add_permitloto($add);
			}
		}
		if(!empty($get_tool)){
			foreach($get_tool as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'toolname'=>$record->toolname
					);
				$add_item = $this->hse_jsa_model->add_permittool($add);
			}
		}
		if(!empty($get_energy)){
			foreach($get_energy as $record){
				$add = array(
					'jsa_id'=>$new_id,
					'toolname'=>$record->toolname
					);
				$add_item = $this->hse_jsa_model->add_permitenergy($add);
			}
		}
		redirect('edit/'.$new_id);
	}
	
	function report_list($id = NULL)
	{
		$data['jsa'] = $this->hse_jsa_model->get_jsabyid($id);
		$data['report_list'] = $this->hse_jsa_model->get_monitor($id);
		
		$this->global['pageTitle'] = 'RAWR : Report List';
		
		$this->loadViews("hse_jsa/report_list", $this->global, $data, NULL);
	}
	
	function gas_s($id = NULL)
	{
		$permit = $this->hse_jsa_model->get_permit_cek($id, 3);
		redirect('gas/'.$permit->id);
	}
	
	function blood_p($id = NULL)
	{
		$permit = $this->hse_jsa_model->get_permit_cek($id, 3);
		redirect('blood/'.$permit->id);
	}
	
	function selected_date(){
		$today_uni = $this->input->post("start_date");
		$today_unix = $today_uni + 1;
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['name'] = $this->name;
		$this->load->library('pagination');
		if($this->vendorId > 90000){
			$count = $this->hse_jsa_model->get_todayjsaCount($today_unix,$searchText);
			$returns = $this->paginationCompress ( "today_jsa/", $count, 10 );
			$data['today_jsa'] = $this->hse_jsa_model->get_todayjsa($today_unix, $searchText, $returns["page"], $returns["segment"]);
		}else{
			$count = $this->hse_jsa_model->get_todayjsaxCount($today_unix,$this->name,$searchText);
			$returns = $this->paginationCompress ( "today_jsa/", $count, 10 );
			$data['today_jsa'] = $this->hse_jsa_model->get_todayjsax($today_unix,$this->name, $searchText, $returns["page"], $returns["segment"]);
		}
		$data['time'] = $today_uni;
		//echo $today_unix;
		$this->global['pageTitle'] = 'RAWR : Selected Date';
		
		$this->loadViews("hse_jsa/todayjsa", $this->global, $data, NULL);
	}
	function hse_daily_summary(){
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$data['start'] = $start;
		$data['end'] = $end;
		$this->load->library('pagination');
		$count = $this->hse_jsa_model->get_daily_index_count($start, $end);
		$returns = $this->paginationCompress ( "hse_daily_summary/", $count, 10 );
		$data['JSAlist'] = $this->hse_jsa_model->get_daily_index($start, $end, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Daily Summary';
		$this->loadViews("hse_jsa/daily_summary", $this->global, $data, NULL);
	}
	function hse_hot($start_date){
		$count = $this->hse_jsa_model->get_daily_hot($start_date);
		echo $count->hot;
	}
	function hse_high($start_date){
		$count = $this->hse_jsa_model->get_daily_high($start_date);
		echo $count->high;
	}
	function hse_conf($start_date){
		$count = $this->hse_jsa_model->get_daily_conf($start_date);
		echo $count->conf;
	}
	function hse_dig($start_date){
		$count = $this->hse_jsa_model->get_daily_dig($start_date);
		echo $count->dig;
	}
	function hse_elec($start_date){
		$count = $this->hse_jsa_model->get_daily_elec($start_date);
		echo $count->elec;
	}
	function hse_gen($start_date){
		$count = $this->hse_jsa_model->get_daily_gen($start_date);
		echo $count->gen;
	}
}
?>
