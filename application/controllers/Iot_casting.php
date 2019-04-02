<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Iot_casting extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('iot_casting_model');
        $this->isLoggedIn();   
    }
    
    
    function casting()
    {
		
		$this->global['pageTitle'] = 'RAWR : Casting Room';
        
		$this->loadViews("iot_casting/casting", $this->global, NULL, NULL);
        
	}
}

?>
