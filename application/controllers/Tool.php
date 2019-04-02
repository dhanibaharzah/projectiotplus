<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Tool extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('tool_model');
		$this->isLoggedIn();
	}
	function rentaltool($segment ='', $searchxx= NULL){
		if ($searchxx == ''){
			$searchText = $this->security->xss_clean($this->input->post('searchText'));
		}else{
			$searchText = str_replace('_',' ',$searchxx);
		}
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->tool_model->rentaltoolCount($searchText);
		$searchlink = str_replace( ' ','_',$searchText);
		$returns = $this->paginationCompress ( 'rentaltool/', $count, 10);
		$data['toolList'] = $this->tool_model->rentaltool($searchText, $returns["page"], $returns["segment"]);
		$usersession = $this->session->userdata('name');
		$data['cartList'] = $this->tool_model->cartdetail($usersession);
		$last_order = $this->tool_model->getinvoiceID();
		$data['orderid'] = $last_order->id;
		$data['userlist'] = $this->tool_model->getalluser();
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Rental Tool';
		$this->loadViews("t_tool/toollist", $this->global, $data, NULL);
	}
	function tocart($id = '', $segment='', $searchxx= NULL){
		$this->load->model('tool_model');
		$toolInfo = array(
					'sts'=>'booked',
					'user'=>$this->session->userdata('name')
					);
		$result = $this->tool_model->updatecart($toolInfo, $id);
		if($segment == '' AND $searchxx==''){
			redirect('rentaltool');
		}
		if($segment == '' AND !($searchxx=='')){
			redirect('rentaltool/0/'.$searchxx);
		}
		if(!($segment == '') AND $searchxx==''){
			redirect('rentaltool/'.$segment);
		}
		if(!($segment == '') AND !($searchxx=='')){
			redirect('rentaltool/'.$segment.'/'.$searchxx);
		}
	}
	function delcart($id = '', $segment='', $searchxx= NULL){
		$this->load->model('tool_model');
		$toolInfo = array(
					'sts'=>'available',
					'user'=>$this->session->userdata('name')
					
					);
		$result = $this->tool_model->delcart($toolInfo, $id);
		if($segment == '' AND $searchxx==''){
			redirect('rentaltool');
		}
		if($segment == '' AND !($searchxx=='')){
			redirect('rentaltool/0/'.$searchxx);
		}
		if(!($segment == '') AND $searchxx==''){
			redirect('rentaltool/'.$segment);
		}
		if(!($segment == '') AND !($searchxx=='')){
			redirect('rentaltool/'.$segment.'/'.$searchxx);
		}
	}
	function checkout(){
		$asuser = $this->input->post('user');
		if($this->usertype == 20 AND $asuser == ''){
			$this->loadThis();
		}
		elseif($this->usertype == 20 AND $asuser != ''){
			$this->load->model('tool_model');
			$usersession = $asuser;
			$neworderInfo = array('name'=>'New Order', 
					'status'=>0, 
					'username'=>$usersession, 
					'not'=> 1
					);
			$add_order = $this->tool_model->addinvoiceID($neworderInfo);
			$last_order = $this->tool_model->getinvoiceID();
			$new_id = $last_order->id;
			$total_item = $this->tool_model->cartdetail('toolkeeper');
			if(!empty($total_item)){
				foreach($total_item as $writeinvoice){
					$orderInfo = array('pos'=>$writeinvoice->pos, 
						'ordersid'=>$new_id, 
						'id'=>$writeinvoice->id, 
						'sts'=>$writeinvoice->sts,
						'user'=>$usersession,
						'ordersts'=>0,
						'brand'=>$writeinvoice->brand,
						'name'=>$writeinvoice->name,
						'size'=>$writeinvoice->size
						);
					$toolInfo = array( 
						'user'=>$usersession,
						'invoice'=>$new_id 
						);
					$this->tool_model->writeinvoice($orderInfo);
					$this->tool_model->checktool($toolInfo, $writeinvoice->id);
				}
			}
			redirect('newinvoice');
		}else{
			$this->load->model('tool_model');
			$usersession = $this->session->userdata('name');
			$neworderInfo = array('name'=>'New Order', 
					'status'=>0, 
					'username'=>$usersession, 
					'not'=> 1
					);
			$add_order = $this->tool_model->addinvoiceID($neworderInfo);
			$last_order = $this->tool_model->getinvoiceID();
			$new_id = $last_order->id;
			$total_item = $this->tool_model->cartdetail($usersession);
			if(!empty($total_item)){
				foreach($total_item as $writeinvoice){
					$orderInfo = array('pos'=>$writeinvoice->pos, 
						'ordersid'=>$new_id, 
						'id'=>$writeinvoice->id, 
						'sts'=>$writeinvoice->sts,
						'user'=>$writeinvoice->user,
						'ordersts'=>0,
						'brand'=>$writeinvoice->brand,
						'name'=>$writeinvoice->name,
						'size'=>$writeinvoice->size
						);
					$toolInfo = array( 
						'invoice'=>$new_id 
						);
					$this->tool_model->writeinvoice($orderInfo);
					$this->tool_model->checktool($toolInfo, $writeinvoice->id);
				}
			}
			redirect('newinvoice');
		}
	}
	function newinvoice(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		
		$this->load->library('pagination');
		$count = $this->tool_model->newinvoiceCount($searchText);
		$returns = $this->paginationCompress ( "newinvoice/", $count, 10 );
		
		$data['newList'] = $this->tool_model->newinvoice($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		
		$this->global['pageTitle'] = 'RAWR : New Invoice';
		$this->loadViews("t_invoice/newinvoice", $this->global, $data, NULL);
	}
	function procesinvoice($id = ''){
		echo $this->usertype;
		$items = $this->tool_model->procesinvoiceCount($id);
		if($items == 0){
			$orderInfo = array( 
					'name'=>'Ongoing Invoice',
					'status'=>1
					);
			$this->tool_model->updateorder($orderInfo, $id);
			$orderdetailInfo = array( 
					'ordersts'=>1
					);
			$this->tool_model->updateorderdetail($orderdetailInfo, $id);
			redirect('newinvoice');
		}
		$data['id'] = $id;
		$data['procesinvoice'] = $this->tool_model->procesinvoice($id);
		$user_result = $this->tool_model->getinvoiceUser($id);
		$data['invoiceuser'] = $user_result->user;
		$this->global['pageTitle'] = 'RAWR : Process Invoice';
		$this->loadViews("t_invoice/procesinvoice", $this->global, $data, NULL);
	}
	function procesinvoice_exe(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$detail_order = $this->input->post('order_num');
			$orderid = $this->input->post('orderid');
			if(!empty($detail_order)){
				foreach($detail_order as $ordernumber){
					$toolid = $this->tool_model->gettoolIDbyNum($ordernumber);
					$tool_id = $toolid->id;
					$invoiceInfo = array( 
						'sts'=>'inorder' 
					);
					$this->tool_model->updateinvoice($invoiceInfo, $ordernumber);
					$this->tool_model->checktool($invoiceInfo, $tool_id);
				}
			}
			redirect('procesinvoice/'.$orderid);
		}
	}
	function canceltool($num = '', $id = '', $orderid = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$invoiceInfo = array('sts'=>'returned');
			$toolInfo = array( 
				'sts'=>'available', 
				'invoice'=> 0
				);
			$this->tool_model->updateinvoice($invoiceInfo, $num);
			$this->tool_model->checktool($toolInfo, $id);
			redirect('procesinvoice/'.$orderid);
		}
    }
	function misstool($num = '', $id = '', $orderid = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$invoiceInfo = array( 'sts'=>'returned'	);
			$toolInfo = array( 
				'sts'=>'data miss', 
				'invoice'=> 0
				);
			$this->tool_model->updateinvoice($invoiceInfo, $num);
			$this->tool_model->checktool($toolInfo, $id);
			redirect('procesinvoice/'.$orderid);
		}
	}
	function ongoinvoice(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->tool_model->ongoinvoiceCountv2($searchText);
		$returns = $this->paginationCompress ( "ongoinvoice/", $count, 10 );
		$data['ongoList'] = $this->tool_model->ongoinvoice($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Ongoing Invoice';
		$this->loadViews("t_invoice/ongoinvoice", $this->global, $data, NULL);		
    }
	function closeinvoice($username = ''){
		$useduser = urldecode($username);
		$count = $this->tool_model->closeinvoiceAll($useduser);
		if($count == 0){	
			redirect('ongoinvoice');
		}
		$data['username'] = $useduser;
		$data['closeinvoice'] = $this->tool_model->closeinvoice($useduser);
		$this->global['pageTitle'] = 'RAWR : Close Invoice';
		$this->loadViews("t_invoice/closeinvoice", $this->global, $data, NULL);
	}
	function closeinvoice_exe(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$detail_order = $this->input->post('order_num');
			$username = $this->input->post('username');
			if(!empty($detail_order)){
				foreach($detail_order as $ordernumber){
					$toolid = $this->tool_model->gettoolIDbyNum($ordernumber);
					$tool_id = $toolid->id;
					$order_id = $toolid->ordersid;
					$condition = 'inorder';
					$invoiceInfo = array( 
						'sts'=>'returned', 
						'ordersts'=>2
						);
					$toolInfo = array( 
						'sts'=>'available', 
						'invoice'=>0
						);
					$this->tool_model->updateinvoice($invoiceInfo, $ordernumber);
					$this->tool_model->checktool($toolInfo, $tool_id);
					$total_items = $this->tool_model->countitem($ordersid, $condition);
					if($total_items == 0){
						$orderInfo = array( 
						'name'=>'Closed Invoice',
						'status'=>2
						);
						$this->tool_model->updateorder($orderInfo, $order_id);
					}
				}
			}
			redirect('closeinvoice/'.$username);
		}
    }
	function losttool($num = '', $id = '', $username = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$invoiceInfo = array( 
				'sts'=>'lost',
				'ordersts'=>3
			);
			$toolInfo = array( 
				'sts'=>'lost'
			);
			$this->tool_model->updateinvoice($invoiceInfo, $num);
			$this->tool_model->checktool($toolInfo, $id);
			redirect('closeinvoice/'.$username);
		}
	}
	function brokentool($num = '', $id = '', $username = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$invoiceInfo = array( 
				'sts'=>'broken',
				'ordersts'=>3
			);
			$toolInfo = array( 
				'sts'=>'broken'
			);
			$this->tool_model->updateinvoice($invoiceInfo, $num);
			$this->tool_model->checktool($toolInfo, $id);
			redirect('closeinvoice/'.$username);
		}
    }
	function errortool(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->tool_model->errortoolCount($searchText);
		$returns = $this->paginationCompress ( "errortool/", $count, 10 );
		$data['errorList'] = $this->tool_model->errortool($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Error Invoice';
		$this->loadViews("t_toolmana/errortool", $this->global, $data, NULL);
	}
	function allinvoice(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$this->load->library('pagination');
		$count = $this->tool_model->allinvoiceCount($searchText, $fromDate, $toDate);
		$returns = $this->paginationCompress ( "allinvoice/", $count, 10 );
		$data['allList'] = $this->tool_model->allinvoice($searchText,$fromDate, $toDate, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : All Invoice';
		$this->loadViews("t_invoice/allinvoice", $this->global, $data, NULL);
	}
	function detailinvoice($id = ''){
		$items = $this->tool_model->countitems($id);
		$returned = $this->tool_model->countitem($id, 'returned');
		if($items == $returned){
			$orderInfo = array( 
				'name'=>'Closed Invoice',
				'status'=>2
				);
			$this->tool_model->updateorder($orderInfo, $id);
		}
		$data['id'] = $id;
		$data['detailinvoice'] = $this->tool_model->detailinvoice($id);
		$user_result = $this->tool_model->getinvoiceUser($id);
		$data['invoiceuser'] = $user_result->user;
		$this->global['pageTitle'] = 'RAWR : Detail Invoice';
		$this->loadViews("t_invoice/detailinvoice", $this->global, $data, NULL);
	}
	function alltool(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->tool_model->alltoolCount($searchText);
		$returns = $this->paginationCompress ( "alltool/", $count, 10 );
		$data['alltoolList'] = $this->tool_model->alltool($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : All Tool';
		$this->loadViews("t_toolmana/alltool", $this->global, $data, NULL);
	}
	function detailtool($id = NULL){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$data['id'] = $id;
			$data['detailtool'] = $this->tool_model->detailtool($id);
			$this->load->library('pagination');
			$count = $this->tool_model->toolhisCount($id);
			$returns = $this->paginationCompress ( 'detailtool/'.$id.'/', $count, 10,3 );
			$data['toolhisList'] = $this->tool_model->toolhis($id, $returns["page"], $returns["segment"]);
			$this->global['pageTitle'] = 'RAWR : Detail Tool';
			$this->loadViews("t_toolmana/detailtool", $this->global, $data, NULL);
		}
	}
	function setdatamiss($id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$toolInfo = array( 
				'sts'=>'data miss', 
				'invoice'=> 0
				);
			$this->tool_model->checktool($toolInfo, $id);
			redirect('detailtool/'.$id);
		}
	}
	function setavailable($id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$toolInfo = array(
				'sts'=>'available',
				'invoice'=> 0
			);
			$this->tool_model->checktool($toolInfo, $id);
			redirect('detailtool/'.$id);
		}
	}
	function setlate($id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$toolInfo = array( 
				'sts'=>'available', 
				'invoice'=> 0
				);
			$this->tool_model->checktool($toolInfo, $id);
			redirect('detailtool/'.$id);
		}
	}
	function addtool(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->model('tool_model');
			$this->global['pageTitle'] = 'RAWR : Add New Tool';
			$this->loadViews("t_toolmana/addtool", $this->global, NULL, NULL);
		}
	}
	function addtoolexe(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Name','required|max_length[255]');
			$this->form_validation->set_rules('brand','Brand','required|max_length[255]');
			$this->form_validation->set_rules('size','Size/Type','required|max_length[255]');
			$this->form_validation->set_rules('pos','Position','required|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->addtool();
			}else{
				$toolasset = $this->tool_model->get_asset_id();
				if(!empty($toolasset)){
					$yearcek = $toolasset->id4 / 100000000;
					$yearnow = date('y');
					if($yearcek == $yearnow){
						$toola = $toolasset->id4 % 1000000 + 1;
						$toola = $toola + (date('y') * 100000000);
					}else{
						$toola = 1 + (date('y') * 100000000);
					}
				}
				else{
					$toola = 1 + (date('y') * 100000000);
				}
				$name = $this->input->post('name');
				$brand = $this->input->post('brand');
				$size = $this->input->post('size');
				$pos = $this->input->post('pos');
				
				if($pos < 100000){
					$toola = $toola + 1000000;
				}elseif($pos >= 100000 and $pos < 500000){
					$toola = $toola + 2000000;
				}elseif($pos >= 500000 and $pos < 1000000){
					$toola = $toola + 3000000;
				}elseif($pos >= 1000000 and $pos < 2000000){
					$toola = $toola + 4000000;
				}elseif($pos >= 2000000 and $pos < 5000000){
					$toola = $toola + 5000000;
				}elseif($pos >= 5000000 and $pos < 10000000){
					$toola = $toola + 6000000;
				}elseif($pos >= 10000000){
					$toola = $toola + 7000000;
				}
				
				$toolInfo = array('name'=>$name, 
					'brand'=>$brand, 
					'size'=>$size, 
					'pos'=> $pos,
					'id4'=>$toola
					);
				$this->load->model('tool_model');
				$result = $this->tool_model->addtool($toolInfo);
				if($result > 0){
					$this->session->set_flashdata('success', 'New Tool created successfully');
				}else{
					$this->session->set_flashdata('error', 'Tool creation failed');
				}
				redirect('addtool');
			}
		}
	}
	function edittool($id = NULL){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			if($id == null){
				redirect('alltool');
			}
			$data['toolInfo'] = $this->tool_model->gettoolData($id);
			$this->global['pageTitle'] = 'RAWR : Edit Tool Data';
			$this->loadViews("t_toolmana/edittool", $this->global, $data, NULL);
		}
	}
	function edittoolexe(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->library('form_validation');
			$id = $this->input->post('id');
			$this->form_validation->set_rules('name','Name','required|max_length[255]');
			$this->form_validation->set_rules('brand','Brand','required|max_length[255]');
			$this->form_validation->set_rules('size','Size/Type','required|max_length[255]');
			$this->form_validation->set_rules('pos','Position','required|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->edittool($id);
			}else{
				$name = $this->input->post('name');
				$brand = $this->input->post('brand');
				$size = $this->input->post('size');
				$pos = $this->input->post('pos');
				$toolInfo = array('name'=>$name, 
					'brand'=>$brand, 
					'size'=>$size, 
					'pos'=> $pos
					);
				$this->load->model('tool_model');
				$result = $this->tool_model->edittool($toolInfo, $id);
				if($result > 0){
					$this->session->set_flashdata('success', 'New Tool created successfully');
				}else{
					$this->session->set_flashdata('error', 'Tool creation failed');
				}
				redirect('alltool');
			}
		}
	}
	function alltrouble(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->tool_model->alltroubleCount($searchText);
		$returns = $this->paginationCompress ( "alltrouble/", $count, 10 );
		$data['alltoolList'] = $this->tool_model->alltrouble($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : All Tool';
		$this->loadViews("t_toolmana/alltrouble", $this->global, $data, NULL);
	}
	function mainins(){
		$this->global['pageTitle'] = 'RAWR : Manual';
		$this->loadViews("mainins", $this->global, NULL, NULL);
	}
	function mytool(){
		$name = $this->global['name'];
		$this->load->library('pagination');
		$count = $this->tool_model->mytoolCount($name);
		$returns = $this->paginationCompress ( 'mytool/', $count, 10);
		$data['mytool'] = $this->tool_model->mytool($name, $returns["page"], $returns["segment"]);
		$data['myorder'] = $count;
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : My Tool';
		$this->loadViews("t_tool/mytool", $this->global, $data, NULL);
	}
	function report_2tool($id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$data['toolinfo'] = $this->tool_model->detailtool($id);
			if($data['toolinfo']->invoice == 0){
				$data['num'] = '0';
				$data['sts'] = 'broken';
			}
			if($data['toolinfo']->invoice != 0){
				$data['order'] = $this->tool_model->detailorder($id, $data['toolinfo']->invoice, $data['toolinfo']->user);
				$data['num'] = $data['order']->num;
				$data['sts'] = $data['order']->sts;
			}
			$this->global['pageTitle'] = 'RAWR : Report';
			$this->loadViews("t_tool/report", $this->global, $data, NULL);
		}
	}
	function submit_report(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->library('form_validation');
			$id = $this->input->post('id');
			$this->form_validation->set_rules('status','New Status','required|max_length[255]');
			$this->form_validation->set_rules('reason','Reason','required|max_length[255]');
			$this->form_validation->set_rules('id','ID','required|max_length[255]');
			$this->form_validation->set_rules('num','Number','required|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->report($id);
			}else{
				$status = $this->input->post('status');
				$reason = $this->input->post('reason');
				$id = $this->input->post('id');
				$num = $this->input->post('num');
				$reportInfo = array('status'=>$status, 
					'reason'=>$reason, 
					'id'=>$id, 
					'num'=> $num,
					'sts'=> 0
					);
				$toolInfo = array('rsts'=>1,
					'sts'=>$status
					);
				$this->load->model('tool_model');
				$result = $this->tool_model->reporttool($reportInfo);
				$result = $this->tool_model->checktool($toolInfo, $id);
				if($result > 0){
					$this->session->set_flashdata('success', 'New Report created successfully');
				}else{
					$this->session->set_flashdata('error', 'Report creation failed');
				}
				redirect('errortool');
			}
		}
	}
	function revreport($repid = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$data['report'] = $this->tool_model->detailreport($repid);
			$this->global['pageTitle'] = 'RAWR : Report';
			$this->loadViews("t_tool/revreport", $this->global, $data, NULL);
		}
	}
	function update_report(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$this->load->library('form_validation');
			$repoid = $this->input->post('repoid');
			$this->form_validation->set_rules('status','New Status','required|max_length[255]');
			$this->form_validation->set_rules('reason','Reason','required|max_length[255]');
			if($this->form_validation->run() == FALSE){
				$this->revreport($id);
			}else{
				$status = $this->input->post('status');
				$reason = $this->input->post('reason');
				$repoid = $this->input->post('repoid');
				$reportInfo = array('status'=>$status, 
					'reason'=>$reason, 
					'sts'=> 0
					);
				$this->load->model('tool_model');
				$result = $this->tool_model->updatereport($reportInfo, $repoid);
				if($result > 0){
					$this->session->set_flashdata('success', 'New Report created successfully');
				}else{
					$this->session->set_flashdata('error', 'Report creation failed');
				}
				redirect('reporttable');
			}
		}
	}
	function reporttable(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->tool_model->reporttableCount($searchText);
		$returns = $this->paginationCompress ( 'reporttable/', $count, 10 );
		$data['reporttable'] = $this->tool_model->reporttable($searchText,$returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : All Report';
		$this->loadViews("t_tool/reporttable", $this->global, $data, NULL);
	}
	function trashtable(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->tool_model->demoltoolCount($searchText);
		$returns = $this->paginationCompress ( "trashtable/", $count, 10 );
		$data['alltoolList'] = $this->tool_model->demoltool($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Demolished Tool';
		$this->loadViews("t_tool/trash", $this->global, $data, NULL);
	}
	function closereport($repoid = '',$id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$reportInfo = array(
					'sts'=> 12
					);
			$toolInfo = array(
				'sts'=>'available',
				'rsts'=>0,
				'invoice'=> 0
					);
			$this->tool_model->checktool($toolInfo, $id);
			$result = $this->tool_model->updatereport($reportInfo, $repoid);
			redirect('reporttable');
		}
	}
	function demolish($repoid = '',$id = ''){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$reportInfo = array(
					'sts'=> 12
					);
			$toolInfo = array( 
				'sts'=>'demolished',
				'rsts'=>0,			
				'invoice'=> 0,
				'isvalid'=>0
				);
			$this->tool_model->checktool($toolInfo, $id);
			$result = $this->tool_model->updatereport($reportInfo, $repoid);
			redirect('reporttable');
		}
	}
	function setting(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$data['userlist'] = $this->tool_model->getemaileduser();
			$data['pic'] = $this->tool_model->getpictool();
			$data['man'] = $this->tool_model->getmantool();
			$this->global['pageTitle'] = 'RAWR : Setting';
			$this->loadViews("t_users/setting", $this->global, $data, NULL);
		}
	}
	function applysetting(){
		if($this->usertype != 20){
			$this->loadThis();
		}else{
			$expic = $this->input->post('expic');
			$exman = $this->input->post('exman');
			$pic = $this->input->post('pic');
			$man = $this->input->post('man');
			if(!empty($pic)){
				$userInfo = array(
					'pictool'=> 0
					);
				$result1 = $this->tool_model->updatepic($userInfo, $expic);
				$picInfo = array(
					'pictool'=> 1
					);
				$result2 = $this->tool_model->updatepic($picInfo, $pic);
				redirect('setting');
			}
			if(!empty($pic)){
				$userInfo = array(
					'pictool'=> 0
					);
				$result1 = $this->tool_model->updatepic($userInfo, $exman);
				$picInfo = array(
					'pictool'=> 2
					);
				$result2 = $this->tool_model->updatepic($picInfo, $man);
				redirect('setting');
			}
			redirect('setting');
		}
	}
	function myorderedtool(){
		$a = $this->tool_model->mytoolCount($this->name);
		echo $a;
	}
	function jqnewinvoice(){
		$a = $this->tool_model->newinvoiceCount();
		echo $a;
	}
	function jqongoinvoice(){
		$a = $this->tool_model->ongoinvoiceCount();
		echo $a;
	}
	function jqbrokinvoice(){
		$a = $this->tool_model->errortoolCount();
		echo $a;
	}
	function toolproblematic(){
		$xx = $this->tool_model->getproblematic();
		$problematic = '
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-lg-8 col-xs-8">
								<img src="'.base_url().'/assets/pirateskull.jpg" alt="Smiley face" height="80" width="80"><font size="5"> Problematic Tools</font>
							</div>
							<div class="col-lg-4 col-xs-4">
								<a class="btn btn-primary pull-right" href="'.base_url().'reporttable">Report Table <i class="fa fa-bug"></i></a>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover table-striped table-bordered">
							<tr>
								<th>ID</th>
								<th>Last Update</th>
								<th>InvoiceID</th>
								<th>Name</th>
								<th>Brand/Type</th>
								<th>Status</th>
								<th>Pos</th>
								<th>User</th>
								<th class="text-center">Action</th>
							</tr>';
		if(!empty($xx)){
			$a=1;
			foreach($xx as $record){
				$problematic .= '
							<tr>
								<td>'.$record->id.'</td>
								<td>'.$record->timestamp.'</td>
								<td>'.$record->invoice.'</td>
								<td>'.$record->name.'</td>
								<td>'.$record->brand.'<br>'.$record->size.'</td>
								<td class="text-center">';
				if($record->sts == 'broken'){ $problematic .= '<span class="label label-default">'.$record->sts.'</span>';}
				if($record->sts == 'lost'){ $problematic .= '<span class="label label-danger">'.$record->sts.'</span>';}
				if($record->sts == 'late'){ $problematic .= '<span class="label label-primary">'.$record->sts.'</span>';}
				if($record->sts == 'data miss'){ $problematic .= '<span class="label label-warning">'.$record->sts.'</span>';}
				$problematic .= '
								</td>
								<td>'.$record->pos.'</td>
								<td>'.$record->user.'</td>
								<td class="text-center">';
				if($this->usertype == 20){
					if(($record->sts == 'broken' OR $record->sts == 'lost' OR $record->sts == 'data miss') AND $record->rsts == '0'){
						$problematic .= '<a class="btn btn-default btn-sm" href="'.base_url().'report_2tool/'.$record->id.'" title="Submit a Report">Submit Report <i class="fa fa-pencil"></i></a>';
					}
				}
				if($this->usertype == 20){
					if(($record->sts == 'broken' OR $record->sts == 'lost' OR $record->sts == 'data miss') AND $record->rsts == '1'){
						$problematic .= '<p><span class="label label-success">Report Submitted</span></p>';
					}
				}
				if($this->usertype == 20){
					if($record->sts == 'late'){
						$problematic .= '<a class="btn btn-primary btn-sm" href="'.base_url().'setlate/'.$record->id.'" title="Tool has been Returned">Returned but Late <i class="fa fa-check"></i></a>|
									<a class="btn btn-default btn-sm" href="'.base_url().'report_2tool/'.$record->id.'" title="Submit a Report">Submit Report <i class="fa fa-pencil"></i></a>';
					}
				}
				$problematic .= '
								</td>
							</tr>';
				$a++;
			}
			$problematic .= '
						</table>
					</div>
				</div>';
		}else{
			$problematic .= '<tr><td colspan="9"> No data</td></tr>';
		}
		echo $problematic;
	}
	function autoupdatetool(){
		$next = date("Y-m-d H:i:s");
		$next2 = strtotime($next) - 259200;
		$late = date("Y-m-d H:i:s", $next2);
		$this->load->model('tool_model');
		$lateInfo = array( 
				'sts'=>'late'
				);
		$invoiceInfo = array( 
				'sts'=>'late',
				'ordersts'=>3
				);
		
		$this->tool_model->markas($lateInfo, $late);
		$this->tool_model->markas2($invoiceInfo, $late);
		
		$next3 = strtotime($next) - 600;
		$clear = date("Y-m-d H:i:s", $next3);
		$clearInfo = array( 
				'sts'=>'available'
				);
		$this->tool_model->markas3($clearInfo, $clear);
		echo date("H:i:s");
	}
}

?>
