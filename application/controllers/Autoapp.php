<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Autoapp extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('pmjob_model');
	}
	function autoapprove_pm(){
		$unix = date('U');
		$unix = $unix - 86400;
		$getupapp = $this->pmjob_model->getpmresultauto($unix);
		if(!empty($getupapp)){
			$getunix = date('U');
			foreach($getupapp as $res){
				$cek_data = $this->pmjob_model->getpmappbox($res->code, $res->freq, $res->tag, $res->rec_unix);
				if(!empty($cek_data)){
					$answercheck = 0;
					foreach($cek_data as $red){
						if($red->type == 2 and $red->input == 2){
							$answercheck++;
						}
						if($red->type == 1 and ($red->input < $red->min_val or $red->input > $red->max_val)){
							$answercheck++;
						}
						//echo var_dump($red);
						//echo '<br>==============<br>';
					}
					if($answercheck == 0){
						$appinfo = array(
								'appname'=> 'Auto Approve',
								'app' => 1,
								'appdate' => $getunix
							);
						$this->pmjob_model->approvepmdoc($appinfo, $res->code, $res->freq, $res->tag, $res->rec_unix);
					}else{
						$appinfo = array(
								'appname'=> 'Auto Reject',
								'app' => 3,
								'appdate' => $getunix
							);
						$this->pmjob_model->approvepmdoc($appinfo, $res->code, $res->freq, $res->tag, $res->rec_unix);
					}
				}
				else{
					$appinfo = array(
							'appname'=> 'Invalid Form',
							'app' => 3,
							'appdate' => $getunix
						);
					$this->pmjob_model->approvepmdoc($appinfo, $res->code, $res->freq, $res->tag, $res->rec_unix);
				}
			}
		}
	}
	
}