<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Ss_main extends BaseController{
	private $filename = "import_data";
	public function __construct(){
		parent::__construct();
		$this->load->model('ss_main_model');
		$this->isLoggedIn();
	}
	function ss_upload_xlsx(){
		$data = array(); 
		if(isset($_POST['preview'])){ 
			$upload = $this->ss_main_model->upload_excel($this->filename);
			
			if($upload['result'] == "success"){ 
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				$data['sheet'] = $sheet; 
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		}
		$this->global['pageTitle'] = 'RAWR : Daily Report';
		$this->loadViews("ss_view/upload_xlsx", $this->global, $data, NULL);
	}
	function ss_import_attlog(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		$data = array();
		
		$numrow = 0;
		foreach($sheet as $row){
			if($numrow > 0){
				$att_data = array(
					'nik'=>$row['A'],
					'tgl'=>date('U', strtotime($row['C'])), 
					'tipe'=>$row['D'], 
					'inout'=>$row['E']
				);
				$up_or_edit = $this->ss_main_model->ss_cek_dulu($row['A'], date('U', strtotime($row['C'])));
				if(empty($up_or_edit)){
					$add_vol = $this->ss_main_model->add_ss_att($att_data);
				}
			}
			$numrow++; 
		}
		redirect("ss_upload_xlsx"); 
	}
	function ss_attendance(){
		$data['userlist'] = $this->ss_main_model->userlist();
		$nik = $this->security->xss_clean($this->input->post('nik'));
		if(empty($nik)){$nik = $this->vendorId;}
		$data['nik'] = $nik;
		$this->load->library('pagination');
		$count = $this->ss_main_model->attendanceCount($nik);
		$returns = $this->paginationCompress ( "ss_attendance/", $count, 25 );
		$data['attlist'] = $this->ss_main_model->attendance($nik, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Attendance';
		$this->loadViews("ss_view/attendance", $this->global, $data, NULL);
	}
	function ss_scheduler($nik){
		
	}
}