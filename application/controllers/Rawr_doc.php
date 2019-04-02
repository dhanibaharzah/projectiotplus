<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class rawr_doc extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->isLoggedIn();
	}
	public function index(){
		$this->isLoggedIn();
	}
	function rawr_guide_book(){
		$this->global['pageTitle'] = 'RAWR : Guide';
		$this->loadViews("rawr_doc/documentation", $this->global, NULL, NULL);
	}
	
	
	
	function doc_js_intro(){
		$this->load->view("rawr_doc/intro", NULL);
	}
	
	function doc_js_applist(){
		$this->load->view("rawr_doc/applist", NULL);
	}
	function doc_js_resources(){
		$this->load->view("rawr_doc/resources", NULL);
	}
	function doc_js_others(){
		$this->load->view("rawr_doc/others", NULL);
	}
	function linetutorial(){
		$this->load->view("rawr_doc/linetutorial", NULL);
	}
	function linetopic(){
		$this->load->view("rawr_doc/linetopic", NULL);
	}
	function jsatopz(){
		$this->load->view("rawr_doc/jsatopic", NULL);
	}
}
