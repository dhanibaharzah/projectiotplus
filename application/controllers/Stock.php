<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Stock extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('stock_model');
		$this->isLoggedIn();
	}
	public function index(){
		$this->isLoggedIn();
	}
//=====================================Stock In=================================	
	function addstock(){
		$type_mortar = $this->input->post('type_mortar');
		$bag = $this->input->post('bag');
		$brand = $this->input->post('brand');
		$bag_weight = $this->input->post('bag_weight');
		$stockinfo = array(
			'type_mortar'=>$type_mortar,
			'bag'=>$bag,
			'brand'=>$brand,
			'bag_weight'=>$bag_weight,
			'addedby'=>$this->name
			);
		$this->stock_model->addstock($stockinfo);
		redirect('stockmortar');
	}
	
	function stockmortar(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		$result = $this->stock_model->getstock($fromDate, $toDate);
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$data['mortar'] = $this->stock_model->get_mortar();
		$data['brand'] = $this->stock_model->get_brand();
		$data['bag'] = $this->stock_model->get_weight();
		$data['sumbag'] = $this->stock_model->sumbag();
		$data['sumbagplas'] = $this->stock_model->sumbagplas();
		$this->load->library('pagination');
		$count = $this->stock_model->getstockCount($fromDate, $toDate);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "stockmortar/", $count, 10 );
		$data['stockmortar'] = $this->stock_model->getstock($fromDate, $toDate, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Mortar Stock In';
		$this->loadViews("stock/stockmortar", $this->global, $data, NULL);
	}
	function mortar_app($id, $action){
		$getinfouser = $this->stock_model->getuserinfo($this->vendorId);
		if($getinfouser->appstock != 1){
			$this->loadThis();
		}
		else{
			$stockinfo = array(
				'approvedby'=>$this->name,
				'status_app'=>$action
			);
			$this->stock_model->updatestock($stockinfo, $id);
			redirect('stockmortar');
		}
	}	
	function deletestock(){
		$id = $this->input->post('id');
		$stockinfo  = array(
					'isvalid'=>0
					);
		$updates = $this->stock_model->updatestock($stockinfo, $id);
		$redir = $this->input->post('redir');
		redirect($redir);	
	}
	
	
//==============================================================================

//=====================================Stock Out=================================	
	function addstockout(){
		$type_mortar = $this->input->post('type_mortar');
		$bag = $this->input->post('bag');
		$brand = $this->input->post('brand');
		$bag_weight = $this->input->post('bag_weight');
	
		
		$stockinfo = array(
			'type_mortar'=>$type_mortar,
			'bag'=>$bag,
			'brand'=>$brand,
			'bag_weight'=>$bag_weight,
			'addedby'=>$this->name
			);
		$this->stock_model->addstockout($stockinfo);
		redirect('stockout');
	}
	
	
	function stockout(){
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$result = $this->stock_model->getstockout($fromDate, $toDate);
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$data['mortar'] = $this->stock_model->get_mortar();
		$data['brand'] = $this->stock_model->get_brand();
		$data['bag'] = $this->stock_model->get_weight();
		$data['sumbagout'] = $this->stock_model->sumbagout();
		$data['sumbagthinout'] = $this->stock_model->sumbagthinout();
		
		$this->load->library('pagination');
		$count = $this->stock_model->getstockoutCount($fromDate, $toDate);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "stockout/", $count, 10 );
		$data['stockout'] = $this->stock_model->getstockout($fromDate, $toDate, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Mortar Stock Out';
		$this->loadViews("stock/stockout", $this->global, $data, NULL);
	}
	
	function mortarout_app($id, $action){
		$getinfouser = $this->stock_model->getuserinfo($this->vendorId);
        if($getinfouser->appstock != 1){
            $this->loadThis();
        }
        else
        {
			$stockinfo = array( 
				'approvedby'=>$this->name,
				'status_app'=>$action
				);
			$this->stock_model->updatestockout($stockinfo, $id);
			redirect('stockout');
		}
	}
	
	function deletestockout(){
		$id = $this->input->post('id');
		
		$stockinfo  = array(
					'isvalid'=>0
					);
		
		
		$updates = $this->stock_model->updatestockout($stockinfo, $id);
		
		$redir = $this->input->post('redir');
		redirect($redir);
	
	}
	function get_mortar_group(){
		$query = $this->stock_model->get_mortar_group();
		$dis = '';
		$group = $query->result();
		$number = $query->num_rows();
		if(!empty($group)){
			foreach($group as $result){
				$getall_stock_in = $this->stock_model->get_all_stock_in($result->type_mortar, $result->brand, $result->bag_weight);
				$getall_stock_out = $this->stock_model->get_all_stock_out($result->type_mortar, $result->brand, $result->bag_weight);
				$stock = $getall_stock_in - $getall_stock_out;
				$dis .= '
				<div class="col-md-3 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-red">'.$result->brand.'</span>
						<div class="info-box-content">
							<span class="info-box-text">'.$result->type_mortar.' / '.$result->bag_weight.'</span>
							<span class="info-box-number">'.$stock.' bag(s)</span>
						</div>
					</div>
				</div>
				';
			}
		}
		echo $dis;
	}
//===============================================================================

//=====================================Viscosity=================================	
	function addvisco(){
		$viscosity = $this->input->post('viscosity');
	
		$viscoinfo = array(
			'viscosity'=>$viscosity,
			);
		$this->stock_model->addvisco($viscoinfo);
		redirect('viscosity');
	}
	
	function viscosity(){
		
		$fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
		
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		
		$this->load->library('pagination');
		$count = $this->stock_model->getviscoCount($fromDate, $toDate);
		$returns = $this->paginationCompress("viscosity/", $count, 20);
		$data['total'] = $count;
		$data['viscosity'] = $this->stock_model->getvisco( $fromDate, $toDate, $returns["page"], $returns["segment"]);
		
		$this->global['pageTitle'] = 'RAWR : Viscosity';
		$this->loadViews("stock/viscosity", $this->global, $data, NULL);
	}
	
}
