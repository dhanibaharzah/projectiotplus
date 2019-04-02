<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Mtnbook extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mtnbook_model');
        $this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
	function ctlog(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$mindata = $this->input->post('mindata');
        $maxdata = $this->input->post('maxdata');
		$data['mindata'] = $mindata;
		$data['maxdata'] = $maxdata;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->ctlogCount($searchText, $fromDate, $toDate, $mindata, $maxdata);
		$returns = $this->paginationCompress ( "ctlog/", $count, 10 );
		$data['ctlog'] = $this->mtnbook_model->ctlog($searchText, $fromDate, $toDate, $mindata, $maxdata, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$data['sl'] = $this->mtnbook_model->notesetting(1);
		$data['dt'] = $this->mtnbook_model->notesetting(2);
		$this->global['pageTitle'] = 'RAWR : Cycletime Log';
		$this->loadViews("mtnbook/ctlog", $this->global, $data, NULL);
    }
	function setctnote(){
		$sl = $this->input->post('slowspeed');
        $dt = $this->input->post('downtime');
		$sl = array('setval'=>$sl);
		$dt = array('setval'=>$dt);
		$this->mtnbook_model->setctnote($sl, 1);
		$this->mtnbook_model->setctnote($dt, 2);
		redirect('ctlog');
	}
	function getdetailed($timestamp, $int){
		$xunix = $timestamp;
		$timestamp = date('Y-m-d H:i:s', $timestamp);
		$detail = $this->mtnbook_model->getdetailed($timestamp);
		if(!empty($detail)){
			$area = $this->mtnbook_model->getareabyid($detail->area);
			$mcname = $this->mtnbook_model->getmachinebyid($detail->machine_name);
			$eqname = $this->mtnbook_model->geteqnamebyid($detail->equipment);
			$uname = $this->mtnbook_model->getusername($detail->user);
			if(!empty($uname)){ $username = $uname->uName; }else{$username = '';}
			echo '<div class="col-md-5">';
			echo '<b>Area: </b>'.$area.'<br>';
			echo '<b>Machine Name: </b>'.$mcname.'<br>';
			echo '<b>Equipment: </b>'.$eqname.'<br>';
			echo '</div>';
			echo '<div class="col-md-5">';
			echo '<b>Submit on: </b>'.$detail->date.'<br>';
			echo '<b>By: </b>'.$username.'<br>';
			echo '</div>';
			echo '<div class="col-md-2">';
			if($int == 0){
				echo '<a class="btn btn-primary btn-sm" href="'.base_url().'procesdt/'.$xunix.'">Process</a>';
			}else{
				echo '<button class="btn btn-primary btn-sm" disabled>Moved</button>';
			}
			echo '';
			echo '</div>';
		}else{
			echo '';
		}
	}
	function procesdt($timestamp){
		$timestamp = date('Y-m-d H:i:s', $timestamp);
		$data['dtinfo'] = $this->mtnbook_model->getdatabytime($timestamp);
		$detail = $this->mtnbook_model->getdetailed($timestamp);
		$data['area'] = $this->mtnbook_model->getareabyid($detail->area);
		$data['mcname'] = $this->mtnbook_model->getmachinebyid($detail->machine_name);
		$data['eqname'] = $this->mtnbook_model->geteqnamebyid($detail->equipment);
		$data['uname'] = $this->mtnbook_model->getusername($detail->user);
		
		$data['arealist'] = $this->mtnbook_model->getcodearea();
		$data['mechlist'] = $this->mtnbook_model->getcodedev();
		$data['posilist'] = $this->mtnbook_model->getposisilist();
		$data['devilist'] = $this->mtnbook_model->getdevicelist();
		$data['userlist'] = $this->mtnbook_model->getusers();
		
		$this->global['pageTitle'] = 'RAWR : Process Report';
		$this->loadViews("mtnbook/procesdt", $this->global, $data, NULL);
	}
	function createdt(){
		$data['arealist'] = $this->mtnbook_model->getcodearea();
		$data['mechlist'] = $this->mtnbook_model->getcodedev();
		$data['posilist'] = $this->mtnbook_model->getposisilist();
		$data['devilist'] = $this->mtnbook_model->getdevicelist();
		$data['userlist'] = $this->mtnbook_model->getusers();
		
		$this->global['pageTitle'] = 'RAWR : Create Troubleshooting';
		$this->loadViews("mtnbook/createdt", $this->global, $data, NULL);
	}
	function generatedt(){
		$area = $this->input->post('arealist');
		$eq_name = $this->input->post('mechlist');
		$posisi = $this->input->post('posilist');
		$device = $this->input->post('devilist');
		$picuser = $this->input->post('userlist');
		$timestamp = $this->input->post('timestamp');
		$foreman = $this->input->post('foreman');
		$forereport = $this->input->post('forereport');
		$dur = $this->input->post('dur');
		$dtinfo = array(
				'area'=>$area,
				'eq_name'=>$eq_name,
				'posisi'=>$posisi,
				'device'=>$device,
				'timestamp'=>$timestamp,
				'foreman'=>$foreman,
				'forereport'=>$forereport,
				'dur'=>$dur,
				'addedby'=>$this->name,
				'picuser'=>$picuser
			);
		$this->mtnbook_model->add_dt_log($dtinfo);
		$this->mtnbook_model->update_ctstatus($timestamp);
		redirect('dtlog');
	}
	function dtlog(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->dtlogCount($searchText);
		$returns = $this->paginationCompress ( "dtlog/", $count, 10 );
		$data['dtlog'] = $this->mtnbook_model->dtlog($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Downtime Log';
		$this->loadViews("mtnbook/dtlog", $this->global, $data, NULL);
    }
	function detaildt($id){
		$data['detail'] = $this->mtnbook_model->detaildt($id);
		$data['prglist'] = $this->mtnbook_model->getprglist();
		$data['dwglist'] = $this->mtnbook_model->getdwglist();
		$data['oprlist'] = $this->mtnbook_model->getoprlist();
		$data['seqlist'] = $this->mtnbook_model->getseqlist();
		$data['dt_cs'] = $this->mtnbook_model->getdt_csbyid($id);
		$data['dt_doc'] = $this->mtnbook_model->getdt_docbyid($id);
		
		$this->global['pageTitle'] = 'RAWR : Downtime Log Detail';
		$this->loadViews("mtnbook/detaildt", $this->global, $data, NULL);
	}
	function editdetaildt($id){
		$data['detail'] = $this->mtnbook_model->detaildt($id);
		$data['arealist'] = $this->mtnbook_model->getcodearea();
		$data['mechlist'] = $this->mtnbook_model->getcodedev();
		$data['posilist'] = $this->mtnbook_model->getposisilist();
		$data['devilist'] = $this->mtnbook_model->getdevicelist();
		$data['userlist'] = $this->mtnbook_model->getusers();
		
		$this->global['pageTitle'] = 'RAWR : Edit Log Detail';
		$this->loadViews("mtnbook/editdetaildt", $this->global, $data, NULL);
	}
	function editdt(){
		$area = $this->input->post('arealist');
		$eq_name = $this->input->post('mechlist');
		$posisi = $this->input->post('posilist');
		$device = $this->input->post('devilist');
		$picuser = $this->input->post('userlist');
		$id = $this->input->post('id');
		$dtinfo = array(
				'area'=>$area,
				'eq_name'=>$eq_name,
				'posisi'=>$posisi,
				'device'=>$device,
				'picuser'=>$picuser
			);
		$this->mtnbook_model->edit_dt_log($dtinfo, $id);
		redirect('detaildt/'.$id);
	}
	function newcause(){
		$cause = $this->input->post('cause');
		$solution = $this->input->post('solution');
		$parent = $this->input->post('parent');
		$dtinfo = array(
				'cause'=>$cause,
				'solution'=>$solution,
				'parent'=>$parent
			);
		$this->mtnbook_model->add_dt_cs($dtinfo);
		redirect('detaildt/'.$parent);
	}
	function editcause(){
		$cause = $this->input->post('cause');
		$solution = $this->input->post('solution');
		$parent = $this->input->post('parent');
		$id = $this->input->post('id');
		$dtinfo = array(
				'cause'=>$cause,
				'solution'=>$solution,
				'parent'=>$parent
			);
		$this->mtnbook_model->edit_dt_cs($dtinfo, $id);
		redirect('detaildt/'.$parent);
	}
	function delcause(){
		$parent = $this->input->post('parent');
		$id = $this->input->post('id');
		$dtinfo = array('isvalid'=>0);
		$this->mtnbook_model->edit_dt_cs($dtinfo, $id);
		redirect('detaildt/'.$parent);
	}
	function prg_dt(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->prg_dtCount($searchText);
		$returns = $this->paginationCompress ( "prg_dt/", $count, 10 );
		$data['prg_dt'] = $this->mtnbook_model->prg_dt($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Uploaded Program';
		$this->loadViews("mtnbook/prg_dt", $this->global, $data, NULL);
    }
	function delprg(){
		$id = $this->input->post('id');
		$prginfo = array('isvalid'=>0);
		$this->mtnbook_model->edit_dtprg($prginfo, $id);
		redirect('prg_dt');
	}
	function askappprg(){
		$id = $this->input->post('id');
		$prginfo = array('saved'=>1, 'savedate'=>date('U'));
		$this->mtnbook_model->edit_dtprg($prginfo, $id);
		redirect('prg_dt');
	}
	function upload_prg(){
		$this->load->helper(array('form', 'url'));
		$this->global['pageTitle'] = 'RAWR : Upload Program';
		$this->loadViews("mtnbook/upload_prg", $this->global, NULL, NULL);
	}
	function upload_prg2(){
		$prg_name = $this->input->post('prg_name');
		$prg_type = $this->input->post('prg_type');
		$new_name = time().$_FILES['file']['name'];
		$config['upload_path']          = './assets/dtdoc/prg';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
		$config['overwrite']           = TRUE;
		$config['file_name'] = 'PRG'.$new_name;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('berkas')){
			$data['note'] = $this->upload->display_errors();
			$this->load->view('mtnbook/checked', $data);
		}else{
			$saved_file_name = $this->upload->data('file_name');
			$prginfo = array(
				'prg_name'=>$prg_name,
				'prg_type'=>$prg_type,
				'prg_link'=>$saved_file_name,
				'addedby'=>$this->name
			);
			$this->mtnbook_model->add_dtprg($prginfo);
			redirect('prg_dt');
		}
	}
	function filedownload($tipe, $id){
		$this->load->helper('download');
		if($tipe == 'prg'){
			$name = $this->mtnbook_model->getprgfile($id);
			$place = './assets/dtdoc/prg/';
			$place .= $name->prg_link;
			$downloadinfo = array(
					'uName'=>$this->name,
					'file_type'=>'PRG',
					'file_name'=>$place,
					'file_title'=>$name->prg_name,
					'access_point'=>$_SERVER['REMOTE_ADDR']
				);
			$this->mtnbook_model->add_download_log($downloadinfo);
			force_download($place, NULL);
		}
		if($tipe == 'dwg'){
			$name = $this->mtnbook_model->getdwgfile($id);
			$place = './assets/dtdoc/dwg/';
			$place .= $name->dwg_link;
			$downloadinfo = array(
					'uName'=>$this->name,
					'file_type'=>'DWG',
					'file_name'=>$place,
					'file_title'=>$name->dwg_name,
					'access_point'=>$_SERVER['REMOTE_ADDR']
				);
			$this->mtnbook_model->add_download_log($downloadinfo);
			force_download($place, NULL);
		}
	}
	function prgrev($id){
		$this->load->helper(array('form', 'url'));
		$data['prg'] = $this->mtnbook_model->getprgfile($id);
		$data['rev'] = $this->mtnbook_model->getprgrev($data['prg']->prg_name, $data['prg']->prg_type);
		$data['oldid'] = $id;
		$this->global['pageTitle'] = 'RAWR : Upload Rev Program';
		$this->loadViews("mtnbook/upload_prgrev", $this->global, $data, NULL);
	}
	function upload_prgrev2(){
		$prg_name = $this->input->post('prg_name');
		$prg_type = $this->input->post('prg_type');
		$rev = $this->input->post('rev');
		$oldid = $this->input->post('oldid');
		$new_name = time().$_FILES['file']['name'];
		$config['upload_path']          = './assets/dtdoc/prg';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
		$config['overwrite']           = TRUE;
		$config['file_name'] = 'PRG'.$new_name;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('berkas')){
			$data['note'] = $this->upload->display_errors();
			$this->load->view('mtnbook/checked', $data);
		}else{
			$saved_file_name = $this->upload->data('file_name');
			$prginfo = array(
				'prg_name'=>$prg_name,
				'prg_type'=>$prg_type,
				'prg_link'=>$saved_file_name,
				'rev'=>$rev,
				'addedby'=>$this->name
			);
			$this->mtnbook_model->add_dtprg($prginfo);
			$prginfo = array('ena_rev'=>0);
			$this->mtnbook_model->edit_dtprg($prginfo, $oldid);
			redirect('prg_dt');
		}
	}
	function dwg_dt(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->dwg_dtCount($searchText);
		$returns = $this->paginationCompress ( "dwg_dt/", $count, 10 );
		$data['dwg_dt'] = $this->mtnbook_model->dwg_dt($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Uploaded Design Drawing';
		$this->loadViews("mtnbook/dwg_dt", $this->global, $data, NULL);
    }
	function deldwg(){
		$id = $this->input->post('id');
		$dwginfo = array('isvalid'=>0);
		$this->mtnbook_model->edit_dtdwg($dwginfo, $id);
		redirect('dwg_dt');
	}
	function upload_dwg(){
		$this->load->helper(array('form', 'url'));
		$this->global['pageTitle'] = 'RAWR : Upload Design';
		$this->loadViews("mtnbook/upload_dwg", $this->global, NULL, NULL);
	}
	function upload_dwg2(){
		$dwg_name = $this->input->post('dwg_name');
		$dwg_type = $this->input->post('dwg_type');
		$new_name = time().$_FILES['file']['name'];
		$config['upload_path']          = './assets/dtdoc/dwg';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
		$config['overwrite']           = TRUE;
		$config['file_name'] = 'DWG'.$new_name;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('berkas')){
			$data['note'] = $this->upload->display_errors();
			$this->load->view('mtnbook/checked', $data);
		}else{
			$saved_file_name = $this->upload->data('file_name');
			$dwginfo = array(
				'dwg_name'=>$dwg_name,
				'dwg_type'=>$dwg_type,
				'dwg_link'=>$saved_file_name,
				'addedby'=>$this->name
			);
			$this->mtnbook_model->add_dtdwg($dwginfo);
			redirect('dwg_dt');
		}
	}
	function dwgrev($id){
		$this->load->helper(array('form', 'url'));
		$data['dwg'] = $this->mtnbook_model->getdwgfile($id);
		$data['rev'] = $this->mtnbook_model->getdwgrev($data['dwg']->dwg_name, $data['dwg']->dwg_type);
		$data['oldid'] = $id;
		$this->global['pageTitle'] = 'RAWR : Upload Rev Design';
		$this->loadViews("mtnbook/upload_dwgrev", $this->global, $data, NULL);
	}
	function upload_dwgrev2(){
		$dwg_name = $this->input->post('dwg_name');
		$dwg_type = $this->input->post('dwg_type');
		$rev = $this->input->post('rev');
		$oldid = $this->input->post('oldid');
		$new_name = time().$_FILES['file']['name'];
		$config['upload_path']          = './assets/dtdoc/dwg';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
		$config['overwrite']           = TRUE;
		$config['file_name'] = 'DWG'.$new_name;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('berkas')){
			$data['note'] = $this->upload->display_errors();
			$this->load->view('mtnbook/checked', $data);
		}else{
			$saved_file_name = $this->upload->data('file_name');
			$dwginfo = array(
				'dwg_name'=>$dwg_name,
				'dwg_type'=>$dwg_type,
				'dwg_link'=>$saved_file_name,
				'rev'=>$rev,
				'addedby'=>$this->name
			);
			$this->mtnbook_model->add_dtdwg($dwginfo);
			$dwginfo = array('ena_rev'=>0);
			$this->mtnbook_model->edit_dtdwg($dwginfo, $oldid);
			redirect('dwg_dt');
		}
	}
	function askappdwg(){
		$id = $this->input->post('id');
		$dwginfo = array('saved'=>1, 'savedate'=>date('U'));
		$this->mtnbook_model->edit_dtdwg($dwginfo, $id);
		redirect('dwg_dt');
	}
	function opr_dt(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->opr_dtCount($searchText);
		$returns = $this->paginationCompress ( "opr_dt/", $count, 10 );
		$data['opr_dt'] = $this->mtnbook_model->opr_dt($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Operation Guide';
		$this->loadViews("mtnbook/opr_dt", $this->global, $data, NULL);
    }
	function createopr(){
		$opr_title = $this->input->post('opr_title');
		$check_title = $this->mtnbook_model->check_title($opr_title, '');
		if(empty($check_title)){
			$oprinfo = array(
					'opr_title'=>$opr_title,
					'addedby'=>$this->name
				);
			$this->mtnbook_model->add_dtopr($oprinfo);
			redirect('opr_dt');
		}else{
			redirect('opr_dtx');
		}
	}
	function opr_dtx(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->opr_dtCount($searchText);
		$returns = $this->paginationCompress ( "opr_dt/", $count, 10 );
		$data['opr_dt'] = $this->mtnbook_model->opr_dt($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Operation Guide';
		$this->loadViews("mtnbook/opr_dtx", $this->global, $data, NULL);
    }
	function opredit($id){
		$this->load->helper(array('form', 'url'));
		$getopr = $this->mtnbook_model->getopr($id);
		$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['logolist'] = $this->mtnbook_model->getppelogolist();
		$data['usedlogo'] = $this->mtnbook_model->getppelogoused($getopr->opr_title, $getopr->rev);
		$data['opr'] = $getopr;
		$data['doc'] = $check_title;
		$this->global['pageTitle'] = 'RAWR : Edit Guidance Document';
		$this->loadViews("mtnbook/opredit", $this->global, $data, NULL);
	}
	function addoprrow(){
		$opr_con = $this->input->post('opr_con');
		$opr_sta = $this->input->post('opr_sta');
		$id = $this->input->post('id');
		$getopr = $this->mtnbook_model->getopr($id);
		
		$oprinfo = array(
				'rev'=>$getopr->rev,
				'opr_title'=>$getopr->opr_title,
				'opr_con'=>$opr_con,
				'opr_sta'=>$opr_sta,
				'addedby'=>$this->name
			);
		$this->mtnbook_model->add_dtopr($oprinfo);
		redirect('opredit/'.$id);
	}
	function opraddlink($id){
		$rev = $this->input->post('rev');
		$config['upload_path']          = './assets/dtdoc/opr';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2000;
		$config['overwrite']           = TRUE;
		$config['file_name'] = 'OPR_R'.$rev.'_ID'.$id;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('opr_link')){
			$data['note'] = $this->upload->display_errors();
			$this->load->view('mtnbook/checked', $data);
		}else{
			$saved_file_name = $this->upload->data('file_name');
			$oprinfo = array('opr_link'=>$saved_file_name);
			$this->mtnbook_model->edit_opr($oprinfo, $id);
			redirect('opredit/'.$id);
		}
	}
	function editoprrow(){
		$opr_con = $this->input->post('opr_con');
		$opr_sta = $this->input->post('opr_sta');
		$id = $this->input->post('id');
		$oprinfo = array('opr_con'=>$opr_con, 'opr_sta'=>$opr_sta);
		$this->mtnbook_model->edit_opr($oprinfo, $id);
		redirect('opredit/'.$id);
	}
	function deloprrow(){
		$id = $this->input->post('id');
		$oprinfo = array('isvalid'=>0);
		$this->mtnbook_model->edit_opr($oprinfo, $id);
		$getopr = $this->mtnbook_model->getopr($id);
		$getotherid = $this->mtnbook_model->getotherid($getopr->opr_title);
		if(!empty($getotherid)){
			redirect('opredit/'.$getotherid->id);
		}else{
			redirect('opr_dt');
		}
	}
	function opraskapp(){
		$id = $this->input->post('id');
		$rev = $this->input->post('rev');
		$oprinfo = array('saved'=>1, 'savedate'=>date('U'));
		$getopr = $this->mtnbook_model->getopr($id);
		$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $rev);
		if(!empty($check_title)){
			foreach($check_title as $record){
				$this->mtnbook_model->edit_opr($oprinfo, $record->id);
			}
			redirect('opr_dt');
		}
	}
	function opraddlogo(){
		$id = $this->input->post('id');
		$rev = $this->input->post('rev');
		$ppe_id = $this->input->post('ppe_id');
		$opr_title = $this->input->post('opr_title');
		$logoinfo = array('opr_title'=>$opr_title, 'ppe_id'=>$ppe_id, 'rev'=>$rev);
		$opraddlogo = $this->mtnbook_model->opraddlogo($logoinfo);
		redirect('opredit/'.$id);
	}
	function oprdellogo($id){
		$ppe_id = $this->input->post('ppe_id');
		$logoinfo = array('isvalid'=>0);
		$opreditlogo = $this->mtnbook_model->opreditlogo($logoinfo, $id);
		redirect('opredit/'.$ppe_id);
	}
	function editoprtitle(){
		$id = $this->input->post('id');
		$rev = $this->input->post('rev');
		$opr_title = $this->input->post('opr_title');
		$opr_titlex = $this->input->post('opr_titlex');
		$oprinfo = array('opr_title'=>$opr_title);
		$opr1 = $this->mtnbook_model->opredittitle1($oprinfo, $opr_titlex, $rev);
		$opr2 = $this->mtnbook_model->opredittitle2($oprinfo, $opr_titlex, $rev);
		redirect('opredit/'.$id);
	}
	function oprview($id){
		$getopr = $this->mtnbook_model->getopr($id);
		$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['usedlogo'] = $this->mtnbook_model->getppelogoused($getopr->opr_title, $getopr->rev);
		$data['opr'] = $getopr;
		$data['doc'] = $check_title;
		$this->global['pageTitle'] = 'RAWR : View Guidance Document';
		$this->loadViews("mtnbook/oprview", $this->global, $data, NULL);
	}
	function oprprint($id){
		$getopr = $this->mtnbook_model->getopr($id);
		$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['usedlogo'] = $this->mtnbook_model->getppelogoused($getopr->opr_title, $getopr->rev);
		$data['opr'] = $getopr;
		$data['doc'] = $check_title;
		$downloadinfo = array(
				'uName'=>$this->name,
				'file_type'=>'OPR',
				'file_name'=>'html print',
				'file_title'=>$getopr->opr_title.' REV'.$getopr->rev,
				'access_point'=>$_SERVER['REMOTE_ADDR']
			);
		$this->mtnbook_model->add_download_log($downloadinfo);
		$this->load->view("mtnbook/oprprint", $data);
	}
	function oprpdf($id){
		$getopr = $this->mtnbook_model->getopr($id);
		$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['usedlogo'] = $this->mtnbook_model->getppelogoused($getopr->opr_title, $getopr->rev);
		$data['opr'] = $getopr;
		$data['doc'] = $check_title;
		$downloadinfo = array(
				'uName'=>$this->name,
				'file_type'=>'OPR',
				'file_name'=>'pdf file',
				'file_title'=>$getopr->opr_title.' REV'.$getopr->rev,
				'access_point'=>$_SERVER['REMOTE_ADDR']
			);
		$this->mtnbook_model->add_download_log($downloadinfo);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $getopr->opr_title.".pdf";
		$this->pdf->load_view('mtnbook/oprpdf', $data, true);
	}
	function oprrev($id){
		$getopr = $this->mtnbook_model->getopr($id);
		$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
		$check_logo = $this->mtnbook_model->getppelogoused($getopr->opr_title, $getopr->rev);
		$rev = $getopr->rev + 1;
		if(!empty($check_title)){
			foreach($check_title as $newrev){
				$aoprinfo = array(
						'rev'=>$rev,
						'opr_title'=>$newrev->opr_title,
						'opr_con'=>$newrev->opr_con,
						'opr_sta'=>$newrev->opr_sta,
						'opr_link'=>$newrev->opr_link,
						'addedby'=>$this->name
					);
				$this->mtnbook_model->add_dtopr($aoprinfo);
			}
		}
		if(!empty($check_title)){
			foreach($check_title as $newrev){
				$boprinfo = array('ena_rev'=>0);
				$this->mtnbook_model->edit_opr($boprinfo, $newrev->id);
			}
		}
		if(!empty($check_logo)){
			foreach($check_logo as $newlogo){
				$coprinfo = array(
						'rev'=>$rev,
						'opr_title'=>$newlogo->opr_title,
						'ppe_id'=>$newlogo->ppe_id
					);
				$this->mtnbook_model->opraddlogo($coprinfo);
			}
		}
		$newid = $this->mtnbook_model->getoprrev($getopr->opr_title, $rev);
		redirect('opredit/'.$newid->id);
	}
	function seq_dt(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->seq_dtCount($searchText);
		$returns = $this->paginationCompress ( "seq_dt/", $count, 10 );
		$data['seq_dt'] = $this->mtnbook_model->seq_dt($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Machine Sequence';
		$this->loadViews("mtnbook/seq_dt", $this->global, $data, NULL);
    }
	function createseq(){
		$seq_title = $this->input->post('seq_title');
		$check_titleseq = $this->mtnbook_model->check_titleseq($seq_title);
		if(empty($check_title)){
			$seqinfo = array(
					'seq_title'=>$seq_title,
					'seq_type'=>1,
					'addedby'=>$this->name
				);
			$this->mtnbook_model->add_dtseq($seqinfo);
			$seqinfo = array(
					'seq_title'=>$seq_title,
					'seq_type'=>2,
					'addedby'=>$this->name
				);
			$this->mtnbook_model->add_dtseq($seqinfo);
			redirect('seq_dt');
		}else{
			redirect('seq_dtx');
		}
	}
	function seq_dtx(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->seq_dtCount($searchText);
		$returns = $this->paginationCompress ( "seq_dt/", $count, 10 );
		$data['seq_dt'] = $this->mtnbook_model->seq_dt($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Machine Sequence';
		$this->loadViews("mtnbook/seq_dtx", $this->global, $data, NULL);
    }
	function seqedit($id){
		$this->load->helper(array('form', 'url'));
		$getseq = $this->mtnbook_model->getseq($id);
		$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
		$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
		$check_seqA = $this->mtnbook_model->check_seq($getseqA->id);
		$check_seqB = $this->mtnbook_model->check_seq($getseqB->id);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['seq1'] = $getseqA;
		$data['seq2'] = $getseqB;
		$data['seqA'] = $check_seqA;
		$data['seqB'] = $check_seqB;
		$this->global['pageTitle'] = 'RAWR : Edit Sequence Document';
		$this->loadViews("mtnbook/seqedit", $this->global, $data, NULL);
	}
	function editseqtitle(){
		$id = $this->input->post('id');
		$rev = $this->input->post('rev');
		$seq_title = $this->input->post('seq_title');
		$seq_titlex = $this->input->post('seq_titlex');
		$seqinfo = array('seq_title'=>$seq_title);
		$seq = $this->mtnbook_model->seqedittitle($seqinfo, $seq_titlex, $rev);
		redirect('seqedit/'.$id);
	}
	function addseqrow(){
		$dex_name = $this->input->post('dex_name');
		$dex_note = $this->input->post('dex_note');
		$id = $this->input->post('id');
		$seqinfo = array(
				'dex_name'=>$dex_name,
				'dex_note'=>$dex_note,
				'seq_id'=>$id
			);
		$this->mtnbook_model->add_dtseqdex($seqinfo);
		redirect('seqedit/'.$id);
	}
	function editseqrow(){
		$dex_name = $this->input->post('dex_name');
		$dex_note = $this->input->post('dex_note');
		$id = $this->input->post('id');
		$backid = $this->input->post('backid');
		$seqinfo = array('dex_name'=>$dex_name, 'dex_note'=>$dex_note);
		$this->mtnbook_model->edit_seqdex($seqinfo, $id);
		redirect('seqedit/'.$backid);
	}
	function seqaddlink($id){
		$config['upload_path']          = './assets/dtdoc/seq';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2000;
		$config['overwrite']           = TRUE;
		$config['file_name'] = 'SEQ_ID'.$id;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('seq_link')){
			$data['note'] = $this->upload->display_errors();
			$this->load->view('mtnbook/checked', $data);
		}else{
			$saved_file_name = $this->upload->data('file_name');
			$seqinfo = array('seq_link'=>$saved_file_name);
			$this->mtnbook_model->edit_seq($seqinfo, $id);
			redirect('seqedit/'.$id);
		}
	}
	function delseqrow(){
		$id = $this->input->post('id');
		$backid = $this->input->post('backid');
		$seqinfo = array('isvalid'=>0);
		$this->mtnbook_model->edit_seqdex($seqinfo, $id);
		redirect('seqedit/'.$backid);
	}
	function seqaskapp(){
		$id = $this->input->post('id');
		$id2 = $this->input->post('id2');
		$seqinfo = array('saved'=>1, 'savedate'=>date('U'));
		$this->mtnbook_model->edit_seq($seqinfo, $id);
		$this->mtnbook_model->edit_seq($seqinfo, $id2);
		redirect('seq_dt');
	}
	function seqview($id){
		$getseq = $this->mtnbook_model->getseq($id);
		$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
		$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
		$check_seqA = $this->mtnbook_model->check_seq($getseqA->id);
		$check_seqB = $this->mtnbook_model->check_seq($getseqB->id);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['seq1'] = $getseqA;
		$data['seq2'] = $getseqB;
		$data['seqA'] = $check_seqA;
		$data['seqB'] = $check_seqB;
		$this->global['pageTitle'] = 'RAWR : View Sequence Document';
		$this->loadViews("mtnbook/seqview", $this->global, $data, NULL);
	}
	function seqprint($id){
		$getseq = $this->mtnbook_model->getseq($id);
		$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
		$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
		$check_seqA = $this->mtnbook_model->check_seq($getseqA->id);
		$check_seqB = $this->mtnbook_model->check_seq($getseqB->id);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['seq1'] = $getseqA;
		$data['seq2'] = $getseqB;
		$data['seqA'] = $check_seqA;
		$data['seqB'] = $check_seqB;
		$downloadinfo = array(
				'uName'=>$this->name,
				'file_type'=>'SEQ',
				'file_name'=>'html print',
				'file_title'=>$getseq->seq_title.' REV'.$getseq->rev,
				'access_point'=>$_SERVER['REMOTE_ADDR']
			);
		$this->mtnbook_model->add_download_log($downloadinfo);
		$this->load->view("mtnbook/seqprint", $data);
	}
	function seqpdf($id){
		$getseq = $this->mtnbook_model->getseq($id);
		$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
		$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
		$check_seqA = $this->mtnbook_model->check_seq($getseqA->id);
		$check_seqB = $this->mtnbook_model->check_seq($getseqB->id);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['seq1'] = $getseqA;
		$data['seq2'] = $getseqB;
		$data['seqA'] = $check_seqA;
		$data['seqB'] = $check_seqB;
		$downloadinfo = array(
				'uName'=>$this->name,
				'file_type'=>'SEQ',
				'file_name'=>'pdf file',
				'file_title'=>$getseq->seq_title.' REV'.$getseq->rev,
				'access_point'=>$_SERVER['REMOTE_ADDR']
			);
		$this->mtnbook_model->add_download_log($downloadinfo);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $getseq->seq_title.".pdf";
		$this->pdf->load_view('mtnbook/seqpdf', $data, true);
	}
	function seqrev($id){
		$getseq = $this->mtnbook_model->getseq($id);
		$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
		$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
		$check_seqA = $this->mtnbook_model->check_seq($getseqA->id);
		$check_seqB = $this->mtnbook_model->check_seq($getseqB->id);
		$rev = $getseq->rev + 1;
		$seqinfo = array(
				'seq_title'=>$getseq->seq_title,
				'seq_link'=>$getseqA->seq_link,
				'seq_type'=>1,
				'rev'=>$rev,
				'addedby'=>$this->name
			);
		$this->mtnbook_model->add_dtseq($seqinfo);
		$seqinfo = array(
				'seq_title'=>$getseq->seq_title,
				'seq_link'=>$getseqA->seq_link,
				'seq_type'=>2,
				'rev'=>$rev,
				'addedby'=>$this->name
			);
		$this->mtnbook_model->add_dtseq($seqinfo);
		$revinfo = array('ena_rev'=>0);
		$this->mtnbook_model->edit_seq($revinfo, $getseqA->id);
		$this->mtnbook_model->edit_seq($revinfo, $getseqA->id);
		$getseqA2 = $this->mtnbook_model->getseqA($getseq->seq_title, $rev);
		$getseqB2 = $this->mtnbook_model->getseqB($getseq->seq_title, $rev);
		if(!empty($check_seqA)){
			foreach($check_seqA as $newrev){
				$aseqinfo = array(
						'seq_id'=>$getseqA2->id,
						'dex_name'=>$newrev->dex_name,
						'dex_note'=>$newrev->dex_note
					);
				$this->mtnbook_model->add_dtseqdex($aseqinfo);
			}
		}
		if(!empty($check_seqB)){
			foreach($check_seqB as $newrev){
				$aseqinfo = array(
						'seq_id'=>$getseqB2->id,
						'dex_name'=>$newrev->dex_name,
						'dex_note'=>$newrev->dex_note
					);
				$this->mtnbook_model->add_dtseqdex($aseqinfo);
			}
		}
		redirect('seqedit/'.$getseqA2->id);
	}
	function download_log(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->downloadlogCount($searchText);
		$returns = $this->paginationCompress ( "download_log/", $count, 25 );
		$data['download_log'] = $this->mtnbook_model->downloadlog($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Downtime Log';
		$this->loadViews("mtnbook/download_log", $this->global, $data, NULL);
	}
	function logosetting(){
		$this->load->helper(array('form', 'url'));
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->logosettingCount($searchText);
		$returns = $this->paginationCompress ( "logosetting/", $count, 10 );
		$data['logosetting'] = $this->mtnbook_model->logosetting($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Logo Setting';
		$this->loadViews("mtnbook/logosetting", $this->global, $data, NULL);
    }
	function logoadd(){
		$logo_name = $this->input->post('logo_name');
		$logo_type = $this->input->post('logo_type');
		echo $logo_name.'/'.$logo_type;
		$logoinfo = array(
				'logo_name'=>$logo_name,
				'logo_type'=>$logo_type,
				'addedby'=>$this->name
			);
		$this->mtnbook_model->add_logo($logoinfo);
		redirect('logosetting');
	}
	function logoaddlink($id){
		$config['upload_path']          = './assets/dtdoc/opr';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 512;
		$config['overwrite']           = TRUE;
		$config['file_name'] = 'LOGO_ID'.$id;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('logo_link')){
			$data['note'] = $this->upload->display_errors();
			$this->load->view('mtnbook/checked', $data);
		}else{
			$saved_file_name = $this->upload->data('file_name');
			$logoinfo = array('logo_link'=>$saved_file_name);
			$this->mtnbook_model->edit_logo($logoinfo, $id);
			redirect('logosetting');
		}
	}
	function editlogorow(){
		$logo_name = $this->input->post('logo_name');
		$id = $this->input->post('id');
		$logoinfo = array('logo_name'=>$logo_name);
		$this->mtnbook_model->edit_logo($logoinfo, $id);
		redirect('logosetting');
	}
	function dellogorow(){
		$id = $this->input->post('id');
		$logoinfo = array('isvalid'=>0);
		$this->mtnbook_model->edit_logo($logoinfo, $id);
		redirect('logosetting');
	}
	function mtnappreq(){
		$data['userdata'] = $this->mtnbook_model->getuserright($this->name);
		$data['prg'] = $this->mtnbook_model->getprg_app();
		$data['dwg'] = $this->mtnbook_model->getdwg_app();
		$data['opr'] = $this->mtnbook_model->getopr_app();
		$data['seq'] = $this->mtnbook_model->getseq_app();
		$this->global['pageTitle'] = 'RAWR : Approval Request';
		$this->loadViews("mtnbook/appreq", $this->global, $data, NULL);
	}
	function app_mtnlog(){
		$id = $this->input->post('id');
		$act = $this->input->post('act');
		$appnum = $this->input->post('appnum');
		$tipe = $this->input->post('tipe');
		$addedby = $this->input->post('addedby');
		$note = $this->input->post('note');
		$unix = date('U');
		if($tipe == 1){
			if($act == 1){
				$notif = array(
						'uName'=>$addedby,
						'act'=>'Approved by Checker'.$appnum,
						'note'=>$note,
						'doc_type'=>'PRG',
						'doc_id'=>$id
					);
				$this->mtnbook_model->add_mtnnotif($notif);
				if($appnum == 1){
					$upinfo = array(
							'app1'=>1,
							'appdate1'=>$unix,
							'appuser1'=>$this->name
						);
					$this->mtnbook_model->edit_dtprg($upinfo, $id);
					redirect('mtnappreq');
				}
				elseif($appnum == 2){
					$upinfo = array(
							'app2'=>1,
							'appdate2'=>$unix,
							'appuser2'=>$this->name
						);
					$this->mtnbook_model->edit_dtprg($upinfo, $id);
					redirect('mtnappreq');
				}
			}
			elseif($act == 2){
				$notif = array(
						'uName'=>$addedby,
						'act'=>'Rejected by Checker'.$appnum,
						'note'=>$note,
						'doc_type'=>'PRG',
						'doc_id'=>$id
					);
				$this->mtnbook_model->add_mtnnotif($notif);
				$upinfo = array(
						'saved'=>0,
						'savedate'=>'',
						'app1'=>0,
						'appdate1'=>'',
						'appuser1'=>'',
						'app2'=>0,
						'appdate2'=>'',
						'appuser2'=>''
					);
				$this->mtnbook_model->edit_dtprg($upinfo, $id);
				redirect('mtnappreq');
			}
		}
		elseif($tipe == 2){
			if($act == 1){
				$notif = array(
						'uName'=>$addedby,
						'act'=>'Approved by Checker'.$appnum,
						'note'=>$note,
						'doc_type'=>'DWG',
						'doc_id'=>$id
					);
				$this->mtnbook_model->add_mtnnotif($notif);
				if($appnum == 1){
					$upinfo = array(
							'app1'=>1,
							'appdate1'=>$unix,
							'appuser1'=>$this->name
						);
					$this->mtnbook_model->edit_dtdwg($upinfo, $id);
					redirect('mtnappreq');
				}
				elseif($appnum == 2){
					$upinfo = array(
							'app2'=>1,
							'appdate2'=>$unix,
							'appuser2'=>$this->name
						);
					$this->mtnbook_model->edit_dtdwg($upinfo, $id);
					redirect('mtnappreq');
				}
			}
			elseif($act == 2){
				$notif = array(
						'uName'=>$addedby,
						'act'=>'Rejected by Checker'.$appnum,
						'note'=>$note,
						'doc_type'=>'DWG',
						'doc_id'=>$id
					);
				$this->mtnbook_model->add_mtnnotif($notif);
				$upinfo = array(
						'saved'=>0,
						'savedate'=>'',
						'app1'=>0,
						'appdate1'=>'',
						'appuser1'=>'',
						'app2'=>0,
						'appdate2'=>'',
						'appuser2'=>''
					);
				$this->mtnbook_model->edit_dtdwg($upinfo, $id);
				redirect('mtnappreq');
			}
		}
	}
	function oprviewapp($id){
		$getopr = $this->mtnbook_model->getopr($id);
		$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
		$data['userdata'] = $this->mtnbook_model->getuserright($this->name);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['usedlogo'] = $this->mtnbook_model->getppelogoused($getopr->opr_title, $getopr->rev);
		$data['opr'] = $getopr;
		$data['doc'] = $check_title;
		$this->global['pageTitle'] = 'RAWR : Approval Guidance Document';
		$this->loadViews("mtnbook/oprviewapp", $this->global, $data, NULL);
	}
	function app_opr(){
		$unix = date('U');
		$id = $this->input->post('id');
		$act = $this->input->post('act');
		$rev = $this->input->post('rev');
		$appnum = $this->input->post('appnum');
		$addedby = $this->input->post('addedby');
		$note = $this->input->post('note');
		if($act == 1){
			$notif = array(
					'uName'=>$addedby,
					'act'=>'Approved by Checker'.$appnum,
					'note'=>$note,
					'doc_type'=>'OPR',
					'doc_id'=>$id
				);
			$this->mtnbook_model->add_mtnnotif($notif);
			if($appnum == 1){
				$upinfo = array(
						'app1'=>1,
						'appdate1'=>$unix,
						'appuser1'=>$this->name
					);
				$getopr = $this->mtnbook_model->getopr($id);
				$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
				if(!empty($check_title)){
					foreach($check_title as $newrev){
						$opr1 = $this->mtnbook_model->opredittitle2($upinfo, $newrev->opr_title, $newrev->rev);
					}
				}
				redirect('mtnappreq');
			}
			elseif($appnum == 2){
				$upinfo = array(
						'app2'=>1,
						'appdate2'=>$unix,
						'appuser2'=>$this->name
					);
				$getopr = $this->mtnbook_model->getopr($id);
				$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
				if(!empty($check_title)){
					foreach($check_title as $newrev){
						$opr1 = $this->mtnbook_model->opredittitle2($upinfo, $newrev->opr_title, $newrev->rev);
					}
				}
				redirect('mtnappreq');
			}
		}
		elseif($act == 2){
			$notif = array(
					'uName'=>$addedby,
					'act'=>'Rejected by Checker'.$appnum,
					'note'=>$note,
					'doc_type'=>'OPR',
					'doc_id'=>$id
				);
			$this->mtnbook_model->add_mtnnotif($notif);
			$upinfo = array(
					'saved'=>0,
					'savedate'=>'',
					'app1'=>0,
					'appdate1'=>'',
					'appuser1'=>'',
					'app2'=>0,
					'appdate2'=>'',
					'appuser2'=>''
				);
			$getopr = $this->mtnbook_model->getopr($id);
			$check_title = $this->mtnbook_model->check_title($getopr->opr_title, $getopr->rev);
			if(!empty($check_title)){
				foreach($check_title as $newrev){
					$opr1 = $this->mtnbook_model->opredittitle2($upinfo, $newrev->opr_title, $newrev->rev);
				}
			}
			redirect('mtnappreq');
		}
	}
	function seqviewapp($id){
		$getseq = $this->mtnbook_model->getseq($id);
		$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
		$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
		$check_seqA = $this->mtnbook_model->check_seq($getseqA->id);
		$check_seqB = $this->mtnbook_model->check_seq($getseqB->id);
		$data['userdata'] = $this->mtnbook_model->getuserright($this->name);
		$data['mainlogo'] = $this->mtnbook_model->getmainlogo();
		$data['seq1'] = $getseqA;
		$data['seq2'] = $getseqB;
		$data['seqA'] = $check_seqA;
		$data['seqB'] = $check_seqB;
		$this->global['pageTitle'] = 'RAWR : Approval Sequence Document';
		$this->loadViews("mtnbook/seqviewapp", $this->global, $data, NULL);
	}
	function app_seq(){
		$unix = date('U');
		$id = $this->input->post('id');
		$act = $this->input->post('act');
		$appnum = $this->input->post('appnum');
		$addedby = $this->input->post('addedby');
		$note = $this->input->post('note');
		if($act == 1){
			$notif = array(
					'uName'=>$addedby,
					'act'=>'Approved by Checker'.$appnum,
					'note'=>$note,
					'doc_type'=>'SEQ',
					'doc_id'=>$id
				);
			$this->mtnbook_model->add_mtnnotif($notif);
			if($appnum == 1){
				$upinfo = array(
						'app1'=>1,
						'appdate1'=>$unix,
						'appuser1'=>$this->name
					);
				$getseq = $this->mtnbook_model->getseq($id);
				$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
				$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
				$this->mtnbook_model->edit_seq($upinfo, $getseqA->id);
				$this->mtnbook_model->edit_seq($upinfo, $getseqB->id);
				redirect('mtnappreq');
			}
			elseif($appnum == 2){
				$upinfo = array(
						'app2'=>1,
						'appdate2'=>$unix,
						'appuser2'=>$this->name
					);
				$getseq = $this->mtnbook_model->getseq($id);
				$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
				$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
				$this->mtnbook_model->edit_seq($upinfo, $getseqA->id);
				$this->mtnbook_model->edit_seq($upinfo, $getseqB->id);
				redirect('mtnappreq');
			}
		}
		elseif($act == 2){
			$notif = array(
					'uName'=>$addedby,
					'act'=>'Rejected by Checker'.$appnum,
					'note'=>$note,
					'doc_type'=>'SEQ',
					'doc_id'=>$id
				);
			$this->mtnbook_model->add_mtnnotif($notif);
			$upinfo = array(
					'saved'=>0,
					'savedate'=>'',
					'app1'=>0,
					'appdate1'=>'',
					'appuser1'=>'',
					'app2'=>0,
					'appdate2'=>'',
					'appuser2'=>''
				);
			$getseq = $this->mtnbook_model->getseq($id);
			$getseqA = $this->mtnbook_model->getseqA($getseq->seq_title, $getseq->rev);
			$getseqB = $this->mtnbook_model->getseqB($getseq->seq_title, $getseq->rev);
			$this->mtnbook_model->edit_seq($upinfo, $getseqA->id);
			$this->mtnbook_model->edit_seq($upinfo, $getseqB->id);
			redirect('mtnappreq');
		}
	}
	function addrefprg(){
		$id = $this->input->post('id');
		$prglist = $this->input->post('prglist');
		$getprgfile = $this->mtnbook_model->getprgfile($prglist);
		$docinfo = array(
				'parent'=>$id,
				'doctype'=>'PRG',
				'doctitle'=>$getprgfile->prg_name,
				'docrev'=>$getprgfile->rev,
				'docid'=>$prglist
			);
		$this->mtnbook_model->add_dt_doc($docinfo);
		redirect('detaildt/'.$id);
	}
	function addrefdwg(){
		$id = $this->input->post('id');
		$dwglist = $this->input->post('dwglist');
		$getdwgfile = $this->mtnbook_model->getdwgfile($dwglist);
		$docinfo = array(
				'parent'=>$id,
				'doctype'=>'DWG',
				'doctitle'=>$getdwgfile->dwg_name,
				'docrev'=>$getdwgfile->rev,
				'docid'=>$dwglist
			);
		$this->mtnbook_model->add_dt_doc($docinfo);
		redirect('detaildt/'.$id);
	}
	function addrefopr(){
		$id = $this->input->post('id');
		$oprlist = $this->input->post('oprlist');
		$getopr = $this->mtnbook_model->getopr($oprlist);
		$docinfo = array(
				'parent'=>$id,
				'doctype'=>'OPR',
				'doctitle'=>$getopr->opr_title,
				'docrev'=>$getopr->rev,
				'docid'=>$oprlist
			);
		$this->mtnbook_model->add_dt_doc($docinfo);
		redirect('detaildt/'.$id);
	}
	function addrefseq(){
		$id = $this->input->post('id');
		$seqlist = $this->input->post('seqlist');
		$getseq = $this->mtnbook_model->getseq($seqlist);
		$docinfo = array(
				'parent'=>$id,
				'doctype'=>'SEQ',
				'doctitle'=>$getseq->seq_title,
				'docrev'=>$getseq->rev,
				'docid'=>$seqlist
			);
		$this->mtnbook_model->add_dt_doc($docinfo);
		redirect('detaildt/'.$id);
	}
	function unlinkrefdoc(){
		$id = $this->input->post('id');
		$backid = $this->input->post('backid');
		$docinfo = array('isvalid'=>$id);
		$this->mtnbook_model->edit_dt_doc($docinfo, $id);
		redirect('detaildt/'.$backid);
	}
	function mymtnnotif(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$this->load->library('pagination');
		$count = $this->mtnbook_model->mymtnnotifCount($this->name, $searchText, $fromDate, $toDate);
		$returns = $this->paginationCompress ( "mymtnnotif/", $count, 20 );
		$data['mymtnnotif'] = $this->mtnbook_model->mymtnnotif($this->name, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : My notif Log';
		$this->loadViews("mtnbook/mymtnnotif", $this->global, $data, NULL);
	}
	function notif5(){
		$userdata = $this->mtnbook_model->getuserright($this->name);
		$prg = $this->mtnbook_model->getprg_appCount($userdata->applog1, $userdata->applog2);
		$dwg = $this->mtnbook_model->getdwg_appCount($userdata->applog1, $userdata->applog2);
		$opr = $this->mtnbook_model->getopr_appCount($userdata->applog1, $userdata->applog2);
		$seq = $this->mtnbook_model->getseq_appCount($userdata->applog1, $userdata->applog2);
		$notif5 = $prg+$dwg+$opr+$seq;
		echo $notif5;
	}
}
?>