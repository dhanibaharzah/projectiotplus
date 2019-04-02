<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_packing extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('iot_packing_model');
        $this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
	
	public function index()
    {
		/*$unloading = $this->iot_packing_model->unloading();
		$loading = $this->iot_packing_model->loading();
		$pusher_in = $this->iot_packing_model->pusher_in();
		$pusher_out = $this->iot_packing_model->pusher_out();
		$unloading = array_reverse($unloading, true);
		$loading = array_reverse($loading, true);
		$pusher_in = array_reverse($pusher_in, true);
		$pusher_out = array_reverse($pusher_out, true);
		$dataunloading = '';
		if(!empty($unloading)){
			foreach($unloading as $result)
			$dataunloading .= '{x:'.$result['timestamp']['$date'].', y:'.$result['payload'].'}, ';
		}
		$dataloading = '';
		if(!empty($loading)){
			foreach($loading as $result)
			$dataloading .= '{x:'.$result['timestamp']['$date'].', y:'.$result['payload'].'}, ';
		}
		$datapusher_in = '';
		if(!empty($pusher_in)){
			foreach($pusher_in as $result)
			$datapusher_in .= '{x:'.$result['timestamp']['$date'].', y:'.$result['payload'].'}, ';
		}
		$datapusher_out = '';
		if(!empty($pusher_out)){
			foreach($pusher_out as $result)
			$datapusher_out .= '{x:'.$result['timestamp']['$date'].', y:'.$result['payload'].'}, ';
		}
		$data['unloading'] = substr($dataunloading, 0, -2);
		$data['loading'] = substr($dataloading, 0, -2);
		$data['pusher_in'] = substr($datapusher_in, 0, -2);
		$data['pusher_out'] = substr($datapusher_out, 0, -2);
		*/
		$this->global['pageTitle'] = 'RAWR : Unloading';
		
		$this->loadViews("iot_packing/unload", $this->global, /*$data,*/ NULL);
    }
	/*public function test_m()
    {
		$unloading = $this->iot_packing_model->unloadingx();
		echo var_dump($unloading);
	}*/
}

?>
