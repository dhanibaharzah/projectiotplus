<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Hse_configurasi extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('hse_configurasi_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	//------------------------------------------------------------------------------------
	function APD(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_configurasi_model->APDCount($searchText);
		$returns = $this->paginationCompress ( "APD/", $count, 10);
		$data['APD'] = $this->hse_configurasi_model->APD($searchText,$returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : APD';
		$this->loadViews("hse_Configurasi/apd", $this->global, $data, NULL);
	}
	function addNew_APD(){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$this->load->model('hse_configurasi_model');
			$this->global['pageTitle'] = 'RAWR : Add Drop Down Item';
            $this->loadViews("hse_Configurasi/addNewAPD", $this->global, NULL);
        }
    }
	function addNewAPD(){
		$tool = $this->input->post('tool');
		$isvalid = $this->input->post('isvalid');
		$APD = array(
			'toolname'=>$tool,
			'isvalid'=>$isvalid
			);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->addNewAPD($APD);
		redirect('addNew_APD');
	}
	function editAPD($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['APD'] = $this->hse_configurasi_model->get_APD($id);
			$this->global['pageTitle'] = 'RAWR : Edit PM Frequency Data';
			$this->loadViews("hse_Configurasi/edit_APD", $this->global, $data, NULL);
		}
	}
	function edit_APD(){
		$toolname = $this->input->post('toolname');
		$isvalid = $this->input->post('isvalid');
		$id = $this->input->post('id');
		$APD = array(
			'toolname'=>$toolname, 
			'isvalid'=>$isvalid
			);
		$result = $this->hse_configurasi_model->edit_APD($APD, $id);
		redirect('APD');
	}
//-------------------------------------------------------------------------
	function Energy(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_configurasi_model->EnergyCount($searchText);
		$returns = $this->paginationCompress ( "Energy/", $count, 10);
		$data['Energy'] = $this->hse_configurasi_model->Energy($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Energy';
		$this->loadViews("hse_Configurasi/energy", $this->global, $data, NULL);
	}
	function addNew_Energy(){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$this->load->model('hse_configurasi_model');
			$this->global['pageTitle'] = 'RAWR : Add Drop Down Item';
			$this->loadViews("hse_Configurasi/addNewEnergy", $this->global, NULL);
		}
	}
	function addNewEnergy(){
		$tool = $this->input->post('tool');
		$isvalid = $this->input->post('isvalid');
		$Energy = array(
			'toolname'=>$tool,
			'isvalid'=>$isvalid
			);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->addNewEnergy($Energy);
		redirect('addNew_Energy');
	}
	function editEnergy($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['Energy'] = $this->hse_configurasi_model->get_Energy($id);
			$this->global['pageTitle'] = 'RAWR : Edit PM Frequency Data';
			$this->loadViews("hse_Configurasi/edit_Energy", $this->global, $data, NULL);
		}
    }
	function edit_Energy(){
		$toolname = $this->input->post('toolname');
		$isvalid = $this->input->post('isvalid');
		$id = $this->input->post('id');
		$Energy = array(
			'toolname'=>$toolname, 
			'isvalid'=>$isvalid
			);
		$result = $this->hse_configurasi_model->edit_Energy($Energy, $id);
		redirect('Energy');
    }
	//----------------------------------------------------------------------------------
	function Funct(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_configurasi_model->FunctCount($searchText);
		$returns = $this->paginationCompress ( "Funct/", $count, 10);
		$data['Funct'] = $this->hse_configurasi_model->Funct($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Funct';
		$this->loadViews("hse_Configurasi/function", $this->global, $data, NULL);
	}
	function addNew_Funct(){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$this->load->model('hse_configurasi_model');
			$this->global['pageTitle'] = 'RAWR : Add Drop Down Item';
			$this->loadViews("hse_Configurasi/addNewFunct", $this->global, NULL);
		}
	}
	function addNewFunct(){
		$func = $this->input->post('func');
		$isvalid = $this->input->post('isvalid');
		$Funct = array(
			'func'=>$func,
			'isvalid'=>$isvalid
			);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->addNewFunct($Funct);
		redirect('addNew_Funct');
	}
	function editFunct($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['Funct'] = $this->hse_configurasi_model->get_Funct($id);
			$this->global['pageTitle'] = 'RAWR : Edit PM Frequency Data';
			$this->loadViews("hse_Configurasi/edit_Funct", $this->global, $data, NULL);
		}
    }
	function edit_Funct(){
		$func = $this->input->post('func');
		$isvalid = $this->input->post('isvalid');
		$id = $this->input->post('id');
		$Funct = array(
			'func'=>$func, 
			'isvalid'=>$isvalid
			);
		$result = $this->hse_configurasi_model->edit_Funct($Funct, $id);
		redirect('Funct');
	}
	//--------------------------------------------------------------------------------------
	function Loto(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_configurasi_model->LotoCount($searchText);
		$returns = $this->paginationCompress ( "Loto/", $count, 10);
		$data['Loto'] = $this->hse_configurasi_model->Loto($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Loto';
		$this->loadViews("hse_Configurasi/loto", $this->global, $data, NULL);
	}
	function addNew_Loto(){
        $role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
            $this->load->model('hse_configurasi_model');
            $this->global['pageTitle'] = 'RAWR : Add Drop Down Item';
            $this->loadViews("hse_Configurasi/addNewLoto", $this->global, NULL);
		}
	}
	function addNewLoto(){
		$tool = $this->input->post('tool');
		$isvalid = $this->input->post('isvalid');
		$Loto = array(
			'toolname'=>$tool,
			'isvalid'=>$isvalid
			);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->addNewLoto($Loto);
		redirect('addNew_Loto');
	}
	function editLoto($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['Loto'] = $this->hse_configurasi_model->get_Loto($id);
			$this->global['pageTitle'] = 'RAWR : Edit PM Frequency Data';
			$this->loadViews("hse_Configurasi/edit_Loto", $this->global, $data, NULL);
		}
	}
	function edit_Loto(){
		$toolname = $this->input->post('toolname');
		$isvalid = $this->input->post('isvalid');
		$id = $this->input->post('id');
		$Loto = array(
			'toolname'=>$toolname, 
			'isvalid'=>$isvalid
			);
		$result = $this->hse_configurasi_model->edit_Loto($Loto, $id);
		redirect('Loto');
	}
//-----------------------------------------------------------------------------------------------
	function Override(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_configurasi_model->OverrideCount($searchText);
		$returns = $this->paginationCompress ( "Override/", $count, 10);
		$data['Override'] = $this->hse_configurasi_model->Override($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Override';
		$this->loadViews("hse_Configurasi/override", $this->global, $data, NULL);
	}
	function addNew_Override(){
        $role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
            $this->load->model('hse_configurasi_model');
            $this->global['pageTitle'] = 'RAWR : Add Drop Down Item';
            $this->loadViews("hse_Configurasi/addNewOverride", $this->global, NULL);
		}
	}
	function addNewOverride(){
		$tool = $this->input->post('tool');
		$isvalid = $this->input->post('isvalid');
		$Funct = array(
			'toolname'=>$tool,
			'isvalid'=>$isvalid
			);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->addNewOverride($Funct);
		redirect('addNew_Override');
	}
	function editOverride($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['Override'] = $this->hse_configurasi_model->get_Override($id);
			$this->global['pageTitle'] = 'RAWR : Edit PM Frequency Data';
			$this->loadViews("hse_Configurasi/edit_Override", $this->global, $data, NULL);
		}
	}
	function edit_Override(){
		$toolname = $this->input->post('toolname');
		$isvalid = $this->input->post('isvalid');
		$id = $this->input->post('id');
		$Override = array(
			'toolname'=>$toolname, 
			'isvalid'=>$isvalid
			);
		$result = $this->hse_configurasi_model->edit_Override($Override, $id);
		redirect('Override');
	}	 
//----------------------------------------------------------------------------------------------------	
	function Tool(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_configurasi_model->ToolCount($searchText);
		$returns = $this->paginationCompress ( "Tool/", $count, 10);
		$data['Tool'] = $this->hse_configurasi_model->Tool($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Tool';
		$this->loadViews("hse_Configurasi/tool", $this->global, $data, NULL);
	}
	function addNew_Tool(){
        $role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$this->load->model('hse_configurasi_model');
			$this->global['pageTitle'] = 'RAWR : Add Drop Down Item';
			$this->loadViews("hse_Configurasi/addNewTool", $this->global, NULL);
		}
	}
	function addNewTool(){
		$tool = $this->input->post('tool');
		$isvalid = $this->input->post('isvalid');
		$Funct = array(
			'toolname'=>$tool,
			'isvalid'=>$isvalid
			);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->addNewTool($Funct);
		redirect('addNew_Tool');
	}
	function editTool($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['Tool'] = $this->hse_configurasi_model->get_Tool($id);
			$this->global['pageTitle'] = 'RAWR : Edit PM Frequency Data';
			$this->loadViews("hse_Configurasi/edit_Tool", $this->global, $data, NULL);
		}
	}
	function edit_Tool(){
		$toolname = $this->input->post('toolname');
		$isvalid = $this->input->post('isvalid');
		$id = $this->input->post('id');
		$Tool = array(
			'toolname'=>$toolname, 
			'isvalid'=>$isvalid
			);
		$result = $this->hse_configurasi_model->edit_Tool($Tool, $id);
		redirect('Tool');
	}
//================================================================
	function addNew_Area($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['picar_list'] = $this->hse_configurasi_model->get_dd_hse_picar();
			$data['area_group'] = $this->hse_configurasi_model->get_dd_area_group();
			$this->global['pageTitle'] = 'RAWR : User';
			$this->loadViews("hse_Configurasi/addNewArea", $this->global, $data, NULL);
		}
	}
	function addNewArea(){
		$tool = $this->input->post('tool');
		$isvalid = $this->input->post('isvalid');
		$group = $this->input->post('group');
		$pic = $this->input->post('appcode');
		$num = $this->hse_configurasi_model->get_num($group);
		$Funct = array(
			'toolname'=>$tool,
			'isvalid'=>$isvalid,
			'num'=>$num->num +1,
			'group'=>$group,
			'picarea'=>$pic
		);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->addNewArea($Funct);
		redirect('addNew_Area');
	}
//================================================================
	function editArea($id = NULL){
		$role_cek = $this->hse_configurasi_model->user_role_byNIK($this->vendorId);
		if($role_cek != 10){
			$this->loadThis();
		}else{
			$data['picar_list'] = $this->hse_configurasi_model->get_dd_hse_picar();
			$data['area_group'] = $this->hse_configurasi_model->get_dd_area_group();
			$data['Area'] = $this->hse_configurasi_model->get_Area($id);
			$this->global['pageTitle'] = 'RAWR : Edit Area';
			$this->loadViews("hse_Configurasi/edit_Area", $this->global, $data, NULL);
		}
	}
	function edit_Area(){
		$toolname = $this->input->post('toolname');
		$isvalid = $this->input->post('isvalid');
		$group = $this->input->post('group');
		$appcode = $this->input->post('appcode');
		$id = $this->input->post('id');
		$Funct = array(
			'toolname'=>$toolname,
			'isvalid'=>$isvalid,
			'group'=>$group,
			'picarea'=>$appcode
			);
		$this->load->model('hse_configurasi_model');
		$result = $this->hse_configurasi_model->edit_Area($Funct, $id);
		redirect('Area');
	}
	function Area(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$data['picar_list'] = $this->hse_configurasi_model->get_dd_hse_picar();
		$data['area_group'] = $this->hse_configurasi_model->get_dd_area_group();
		$data['picar'] = $this->hse_configurasi_model->picar();
		$count = $this->hse_configurasi_model->AreaCount($searchText);
		$returns = $this->paginationCompress ( "Area/", $count, 10);
		$data['Area'] = $this->hse_configurasi_model->Area($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Area';
		$this->loadViews("hse_Configurasi/area", $this->global, $data, NULL);
	}
	function hse_addcode_area(){
		$notes = $this->input->post('notes');
		$get_last_code = $this->hse_configurasi_model->last_code();
		$code = $get_last_code + 1;
		$codeinfo = array(
				'code'=>$code,
				'notes'=>$notes
			);
		$this->hse_configurasi_model->addcode_area($codeinfo);
		redirect('Area');
	}
	function hse_editcode_area(){
		$id = $this->input->post('id');
		$notes = $this->input->post('notes');
		$codeinfo = array('notes'=>$notes);
		$this->hse_configurasi_model->editcode_area($codeinfo, $id);
		redirect('Area');
	}
	function hse_addgroup_area(){
		$notes = $this->input->post('notes');
		$get_last_code = $this->hse_configurasi_model->last_group();
		$code = $get_last_code + 1;
		$codeinfo = array(
				'code'=>$code,
				'notes'=>$notes
			);
		$this->hse_configurasi_model->addgroup_area($codeinfo);
		redirect('Area');
	}
	function hse_editgroup_area(){
		$id = $this->input->post('id');
		$notes = $this->input->post('notes');
		$codeinfo = array('notes'=>$notes);
		$this->hse_configurasi_model->editgroup_area($codeinfo, $id);
		redirect('Area');
	}
//------------------------------------------------------------------------------------------------------------	
	public function laporan_pdf($id){
		$this->load->model('hse_jsa_model');
		$jsa = $this->hse_jsa_model->get_jsabyid($id);
		$data['jsa'] = $jsa;
		$data['workerlist'] = $this->hse_jsa_model->get_worker($id);
		$this->load->library('ciqrcode');
		$params['data'] = base_url().'monitor/'.$id;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'uploads/qr'.$id.'.png';
		$this->ciqrcode->generate($params);
		$this->load->library('pdf');
		$data['aa']=11111;
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "SLCI_HSE.pdf";
		$this->pdf->load_view('laporan_pdf', $data, true);
	}

//============================================================================================================
	function user_set($searchText = ''){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->hse_configurasi_model->user_setcount($searchText);
		$returns = $this->paginationCompress ( "user_set/", $count, 10);
		$data['user_set'] = $this->hse_configurasi_model->user_set($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : User Setting';
		$this->loadViews("hse_Configurasi/user_set", $this->global, $data, NULL);
	}
	function edituser_set($id = NULL){
		$data['user_set'] = $this->hse_configurasi_model->user_setID($id);
		$data['dd_hse_roles'] = $this->hse_configurasi_model->get_dd_hse_roles();
		$data['dd_hse_picar'] = $this->hse_configurasi_model->get_dd_hse_picar();
		$this->global['pageTitle'] = 'RAWR : Edit User Setting';
		$this->loadViews("hse_Configurasi/edit_user_set", $this->global, $data, NULL);
	}
	function edit_user_set(){
		$id = $this->input->post('id');
		$uFlag = $this->input->post('uFlag');
		$hse_role = $this->input->post('hse_role');
		$hse_picar = $this->input->post('hse_picar');
		$Funct = array(
			'uFlag'=>$uFlag,
			'hse_role'=>$hse_role,
			'hse_picar'=>$hse_picar
			);
		$result = $this->hse_configurasi_model->edit_user_set($Funct, $id);
		redirect('user_set');
	}

}

?>