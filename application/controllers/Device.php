<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Device extends BaseController
{
	public function __construct(){
		parent::__construct();
		$this->load->model('device_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	function workshopdev(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['selclass'] = $this->input->post('selclass');
		$data['class'] = $this->device_model->devclass();
		$this->load->library('pagination');
		$count = $this->device_model->workshopdevCount($searchText, $data['selclass']);
		$returns = $this->paginationCompress ( "workshopdev/", $count, 5 );
		$data['deviceList'] = $this->device_model->workshopdev($searchText, $data['selclass'], $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Workshop Device';
		$this->loadViews("alldev/wlist", $this->global, $data, NULL);
	}
	function alldev(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['selclass'] = $this->input->post('selclass');
		$data['class'] = $this->device_model->devclass();
		$this->load->library('pagination');
		$count = $this->device_model->alldevCount($searchText, $data['selclass']);
		$returns = $this->paginationCompress ( "alldev/", $count, 5 );
		$data['deviceList'] = $this->device_model->alldev($searchText, $data['selclass'], $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Device Data';
		$this->loadViews("alldev/list", $this->global, $data, NULL);
	}
	function tagging($code){
		$tag= $this->device_model->tagging($code);
		echo '<span class="label label-primary">'.$tag->size.'</span>';
	}
	function devqr($code){
		$this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = 'http://codesys.slci.co.id/mechdata/devcode/'.$code;
		$this->ciqrcode->generate($params);
	}
	function parameter1($id){
		$param = '';
		$value = $this->device_model->paramval($id);
		$string = explode(" ",$value->code);
		$getparam = $this->device_model->parameter($string[0]);
		if(empty($value) or empty($getparam)){
			$param = '';
		}else{
			$param = '
					<b>'.$getparam->note1.' :</b> '.$value->param1.'<br>
					<b>'.$getparam->note2.' :</b> '.$value->param2.'<br>
					<b>'.$getparam->note3.' :</b> '.$value->param3.'<br>
					<b>'.$getparam->note4.' :</b> '.$value->param4.'<br>
					<b>'.$getparam->note5.' :</b> '.$value->param5.'<br>
					<b>'.$getparam->note6.' :</b> '.$value->param6.'<br>
					<b>'.$getparam->note7.' :</b> '.$value->param7.'<br>
					<b>'.$getparam->note8.' :</b> '.$value->param8.'
				';
		}
		echo $param;
	}
	function parameter2($id){
		$param = '';
		$value = $this->device_model->paramval($id);
		$string = explode(" ",$value->code);
		$getparam = $this->device_model->parameter($string[0]);
		if(empty($value) or empty($getparam)){
			$param = '';
		}else{
			$param = '
					<b>'.$getparam->note6.' :</b> '.$value->param6.'<br>
					<b>'.$getparam->note7.' :</b> '.$value->param7.'<br>
					<b>'.$getparam->note8.' :</b> '.$value->param8.'<br>
					<b>'.$getparam->note9.' :</b> '.$value->param9.'<br>
					<b>'.$getparam->note10.' :</b> '.$value->param10.'
				';
		}
		echo $param;
	}
	function parameter3($id){
		$param = '';
		$value = $this->device_model->paramval($id);
		$string = explode(" ",$value->code);
		$getparam = $this->device_model->parameter($string[0]);
		$getidenbyid = $this->device_model->getidenbyid($value->iden_id);
		if(empty($value) or empty($getparam)){
			$param = '';
		}else{
			$param = '
					<b>'.$getparam->note9.' :</b> '.$value->param9.'<br>
					<b>'.$getparam->note10.' :</b> '.$value->param10.'<br>
					<b>'.$getparam->note11.' :</b> '.$value->param11.'<br>
					<b>'.$getparam->note12.' :</b> '.$value->param12.'<br>
					<b>'.$getparam->note13.' :</b> '.$value->param13.'<br>
					<b>'.$getparam->note14.' :</b> '.$value->param14.'<br>
					<b>'.$getparam->note15.' :</b> '.$value->param15.'
				';
		}
		if(!empty($getidenbyid)){
			$param .= '<br><i class="fa fa-location-arrow"></i> <b>Identification :</b> '.$getidenbyid->iden_name;
		}else{
			$param .= '<br><i class="fa fa-location-arrow"></i> <b>Identification :</b> Please set first!';
		}
		echo $param;
	}
	function parameter4($id){
		$param = '';
		$value = $this->device_model->paramval($id);
		$string = explode(" ",$value->code);
		$getparam = $this->device_model->parameter($string[0]);
		if(empty($getparam)){
			$param = '';
		}else{
			$value1 = $this->device_model->getlastmainten($value->code, 1);
			$value2 = $this->device_model->getlastmainten($value->code, 2);
			$value3 = $this->device_model->getlastmainten($value->code, 3);
			$value4 = $this->device_model->getlastmainten($value->code, 4);
			$value5 = $this->device_model->getlastmainten($value->code, 5);
			if(!empty($value1)){ $val1 = date('d-m-Y', $value1->unixtime);}else{ $val1 = '';}
			if(!empty($value2)){ $val2 = date('d-m-Y', $value2->unixtime);}else{ $val2 = '';}
			if(!empty($value3)){ $val3 = date('d-m-Y', $value3->unixtime);}else{ $val3 = '';}
			if(!empty($value4)){ $val4 = date('d-m-Y', $value4->unixtime);}else{ $val4 = '';}
			if(!empty($value5)){ $val5 = date('d-m-Y', $value5->unixtime);}else{ $val5 = '';}
			if(!empty($getparam->note16)){ $p1 = '<b>'.$getparam->note16.': </b>'.$val1.'<br>';}else{ $p1 = '';}
			if(!empty($getparam->note17)){ $p2 = '<b>'.$getparam->note17.': </b>'.$val2.'<br>';}else{ $p2 = '';}
			if(!empty($getparam->note18)){ $p3 = '<b>'.$getparam->note18.': </b>'.$val3.'<br>';}else{ $p3 = '';}
			if(!empty($getparam->note19)){ $p4 = '<b>'.$getparam->note19.': </b>'.$val4.'<br>';}else{ $p4 = '';}
			if(!empty($getparam->note20)){ $p5 = '<b>'.$getparam->note20.': </b>'.$val5;}else{ $p5 = '';}
			$param = '-Parts-<br>'.$p1.$p2.$p3.$p4.$p5;
		}
		echo $param;
	}
	function adddevice(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$data['dev_class'] = $this->device_model->devclass();
			$class_code = $this->security->xss_clean($this->input->post('class_code'));
			$data['class_code'] = $this->device_model->devclassname($class_code);
			$data['dev_subclass'] = $this->device_model->devsubclass($class_code);
			$data['idenlist'] = $this->device_model->getidenlist();
			$subclass_code = $this->security->xss_clean($this->input->post('subclass_code'));
			$new_code = '';
			$data['form'] = '';
			if(!empty($subclass_code)){
				$new_code = $this->device_model->getnewcode($subclass_code);
				if(!empty($new_code)){
					$code = explode(" ",$new_code->code);
					$pre = $code[2] + 1;
					if($pre < 10){
						$pre = '00'.$pre;
					}elseif($pre >= 10 and $pre < 100){
						$pre = '0'.$pre;
					}else{
						$pre = $pre;
					}
				}else{
					$code = explode(" ",$subclass_code);
					$pre = '001';
				}
				$new_code = $code[0].' '.$code[1].' '.$pre;
				$getparam = $this->device_model->parameter($code[0]);
				$data['form'] = '
					<div class="box-body">';
				$data['form'] .= '<input type="hidden" name="code" value="'.$new_code.'">';
				if(!empty($getparam->note1)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note1.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param1" name="param1" maxlength="255" placeholder="'.$getparam->note1.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note2)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note2.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param2" name="param2" maxlength="255" placeholder="'.$getparam->note2.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note3)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note3.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param3" name="param3" maxlength="255" placeholder="'.$getparam->note3.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note4)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note4.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param4" name="param4" maxlength="255" placeholder="'.$getparam->note4.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note5)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note5.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param5" name="param5" maxlength="255" placeholder="'.$getparam->note5.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note6)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note6.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param6" name="param6" maxlength="255" placeholder="'.$getparam->note6.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note7)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note7.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param7" name="param7" maxlength="255" placeholder="'.$getparam->note7.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note8)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note8.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param8" name="param8" maxlength="255" placeholder="'.$getparam->note8 .'">
							</div>
						</div>';
				}
				if(!empty($getparam->note9)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note9.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param9" name="param9" maxlength="255" placeholder="'.$getparam->note9.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note10)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note10.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param10" name="param10" maxlength="255" placeholder="'.$getparam->note10.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note11)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note11.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param11" name="param11" maxlength="255" placeholder="'.$getparam->note11.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note12)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note12.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param12" name="param12" maxlength="255" placeholder="'.$getparam->note12.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note13)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note13.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param13" name="param13" maxlength="255" placeholder="'.$getparam->note13.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note14)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note14.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param14" name="param14" maxlength="255" placeholder="'.$getparam->note14.'">
							</div>
						</div>';
				}
				if(!empty($getparam->note15)){
					$data['form'] .='
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label>'.$getparam->note15.'</label>
								<input onkeyup="lettersOnly(this)" type="text" class="form-control" id="param15" name="param15" maxlength="255" placeholder="'.$getparam->note15.'">
							</div>
						</div>';
				}
				
				$data['form'] .= '	
					</div>
					';
			}
			$data['fix_code'] = $new_code;
			$this->global['pageTitle'] = 'RAWR : Add Device';
			$this->loadViews("alldev/add", $this->global, $data, NULL);
		}
	}
	function savedevice(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
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
			$iden_id = $this->input->post('iden_id');
			$dev_code = explode(" ",$code);
			$devinfo = array(
				'dev_code'=>$dev_code[0],
				'code'=>$code,
				'param1'=>$param1,
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
				'param15'=>$param15,
				'iden_id'=>$iden_id
				);
			$this->device_model->savedevice($devinfo);
			redirect('alldev');
		}
	}
	function editdevice($id){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$param = $this->device_model->paramval($id);
			$data['param'] = $param;
			$devcode = explode(' ', $param->code);
			$getparam = $this->device_model->parameter($devcode[0]);
			$data['idenlist'] = $this->device_model->getidenlist();
			$data['form'] = '
				<div class="box-body">';
			$data['form'] .= '<input type="hidden" name="code" value="'.$param->code.'">';
			if(!empty($getparam->note1)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note1.'</label>
							<input type="text" class="form-control" id="param1" name="param1" maxlength="255" value="'.$param->param1.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note2)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note2.'</label>
							<input type="text" class="form-control" id="param2" name="param2" maxlength="255" value="'.$param->param2.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note3)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note3.'</label>
							<input type="text" class="form-control" id="param3" name="param3" maxlength="255" value="'.$param->param3.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note4)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note4.'</label>
							<input type="text" class="form-control" id="param4" name="param4" maxlength="255" value="'.$param->param4.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note5)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note5.'</label>
							<input type="text" class="form-control" id="param5" name="param5" maxlength="255" value="'.$param->param5.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note6)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note6.'</label>
							<input type="text" class="form-control" id="param6" name="param6" maxlength="255" value="'.$param->param6.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note7)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note7.'</label>
							<input type="text" class="form-control" id="param7" name="param7" maxlength="255" value="'.$param->param7.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note8)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note8.'</label>
							<input type="text" class="form-control" id="param8" name="param8" maxlength="255" value="'.$param->param8.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note9)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note9.'</label>
							<input type="text" class="form-control" id="param9" name="param9" maxlength="255" value="'.$param->param9.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note10)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note10.'</label>
							<input type="text" class="form-control" id="param10" name="param10" maxlength="255" value="'.$param->param10.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note11)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note11.'</label>
							<input type="text" class="form-control" id="param11" name="param11" maxlength="255" value="'.$param->param11.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note12)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note12.'</label>
							<input type="text" class="form-control" id="param12" name="param12" maxlength="255" value="'.$param->param12.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note13)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note13.'</label>
							<input type="text" class="form-control" id="param13" name="param13" maxlength="255" value="'.$param->param13.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note14)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note14.'</label>
							<input type="text" class="form-control" id="param14" name="param14" maxlength="255" value="'.$param->param14.'">
						</div>
					</div>';
			}
			if(!empty($getparam->note15)){
				$data['form'] .='
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label>'.$getparam->note15.'</label>
							<input type="text" class="form-control" id="param15" name="param15" maxlength="255" value="'.$param->param15.'">
						</div>
					</div>';
			}
			
			$data['form'] .= '	
				</div>
				';
			$this->global['pageTitle'] = 'RAWR : Edit Device';
			$this->loadViews("alldev/edit", $this->global, $data, NULL);
		}
	}
	function editdevicein(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
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
			$iden_id = $this->input->post('iden_id');
			$dev_code = explode(" ",$code);
			$devinfo = array(
				'dev_code'=>$dev_code[0],
				'param1'=>$param1,
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
				'param15'=>$param15,
				'iden_id'=>$iden_id
				);
			$this->device_model->editdevicein($devinfo, $code);
			redirect('alldev');
		}
	}
	function hisdevice($id){
		$param = $this->device_model->paramval($id);
		$devcode = explode(' ', $param->code);
		$getparam = $this->device_model->parameter($devcode[0]);
		$data['form'] = '<div class="box-body">';
		$data['form'] .= '<div class="col-md-4">';
		if(!empty($getparam->note1)){$data['form'] .='<b>'.$getparam->note1.': </b>'.$param->param1.'<br>';}
		if(!empty($getparam->note2)){$data['form'] .='<b>'.$getparam->note2.': </b>'.$param->param2.'<br>';}
		if(!empty($getparam->note3)){$data['form'] .='<b>'.$getparam->note3.': </b>'.$param->param3.'<br>';}
		if(!empty($getparam->note4)){$data['form'] .='<b>'.$getparam->note4.': </b>'.$param->param4.'<br>';}
		if(!empty($getparam->note5)){$data['form'] .='<b>'.$getparam->note5.': </b>'.$param->param5.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note6)){$data['form'] .='<b>'.$getparam->note6.': </b>'.$param->param6.'<br>';}
		if(!empty($getparam->note7)){$data['form'] .='<b>'.$getparam->note7.': </b>'.$param->param7.'<br>';}
		if(!empty($getparam->note8)){$data['form'] .='<b>'.$getparam->note8.': </b>'.$param->param8.'<br>';}
		if(!empty($getparam->note9)){$data['form'] .='<b>'.$getparam->note9.': </b>'.$param->param9.'<br>';}
		if(!empty($getparam->note10)){$data['form'] .='<b>'.$getparam->note10.': </b>'.$param->param10.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note11)){$data['form'] .='<b>'.$getparam->note11.': </b>'.$param->param11.'<br>';}
		if(!empty($getparam->note12)){$data['form'] .='<b>'.$getparam->note12.': </b>'.$param->param12.'<br>';}
		if(!empty($getparam->note13)){$data['form'] .='<b>'.$getparam->note13.': </b>'.$param->param13.'<br>';}
		if(!empty($getparam->note14)){$data['form'] .='<b>'.$getparam->note14.': </b>'.$param->param14.'<br>';}
		if(!empty($getparam->note15)){$data['form'] .='<b>'.$getparam->note15.': </b>'.$param->param15.'<br>';}
		$data['form'] .= '</div></div>';
		$data['code'] = $param->code;
		$data['lastloc'] = $this->device_model->lastinstall10($param->code);
		$data['lastmainten'] = $this->device_model->lastmainten10($param->code);
		$data['lasttest'] = $this->device_model->lasttest10($param->code);
		$data['lastparam'] = $this->device_model->lastparam10($param->code);
		$this->global['pageTitle'] = 'RAWR : Device Logs';
		$this->loadViews("alldev/hisdevice", $this->global, $data, NULL);
	}
	function hispos($xcode){
		$data['xcode'] = $xcode;
		$code = str_replace('-',' ',$xcode);
		
		$param = $this->device_model->getparamcode($code);
		$data['id'] = $param->id;
		$devcode = explode(' ', $param->code);
		$getparam = $this->device_model->parameter($devcode[0]);
		$data['form'] = '<div class="box-body">';
		$data['form'] .= '<div class="col-md-4">';
		if(!empty($getparam->note1)){$data['form'] .='<b>'.$getparam->note1.': </b>'.$param->param1.'<br>';}
		if(!empty($getparam->note2)){$data['form'] .='<b>'.$getparam->note2.': </b>'.$param->param2.'<br>';}
		if(!empty($getparam->note3)){$data['form'] .='<b>'.$getparam->note3.': </b>'.$param->param3.'<br>';}
		if(!empty($getparam->note4)){$data['form'] .='<b>'.$getparam->note4.': </b>'.$param->param4.'<br>';}
		if(!empty($getparam->note5)){$data['form'] .='<b>'.$getparam->note5.': </b>'.$param->param5.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note6)){$data['form'] .='<b>'.$getparam->note6.': </b>'.$param->param6.'<br>';}
		if(!empty($getparam->note7)){$data['form'] .='<b>'.$getparam->note7.': </b>'.$param->param7.'<br>';}
		if(!empty($getparam->note8)){$data['form'] .='<b>'.$getparam->note8.': </b>'.$param->param8.'<br>';}
		if(!empty($getparam->note9)){$data['form'] .='<b>'.$getparam->note9.': </b>'.$param->param9.'<br>';}
		if(!empty($getparam->note10)){$data['form'] .='<b>'.$getparam->note10.': </b>'.$param->param10.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note11)){$data['form'] .='<b>'.$getparam->note11.': </b>'.$param->param11.'<br>';}
		if(!empty($getparam->note12)){$data['form'] .='<b>'.$getparam->note12.': </b>'.$param->param12.'<br>';}
		if(!empty($getparam->note13)){$data['form'] .='<b>'.$getparam->note13.': </b>'.$param->param13.'<br>';}
		if(!empty($getparam->note14)){$data['form'] .='<b>'.$getparam->note14.': </b>'.$param->param14.'<br>';}
		if(!empty($getparam->note15)){$data['form'] .='<b>'.$getparam->note15.': </b>'.$param->param15.'<br>';}
		$data['form'] .= '</div></div>';
		
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->getallposisiCount($code, $searchText);
		$usedcode = 'hispos/'.$xcode;
		$returns = $this->paginationCompress ( $usedcode, $count, 10, 3 );
		$data['lastloc'] = $this->device_model->getallposisi($code, $searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Position Logs';
		$this->loadViews("alldev/hispos", $this->global, $data, NULL);
	}
	function hispar($xcode){
		$data['xcode'] = $xcode;
		$code = str_replace('-',' ',$xcode);
		
		$param = $this->device_model->getparamcode($code);
		$data['id'] = $param->id;
		$devcode = explode(' ', $param->code);
		$getparam = $this->device_model->parameter($devcode[0]);
		$data['form'] = '<div class="box-body">';
		$data['form'] .= '<div class="col-md-4">';
		if(!empty($getparam->note1)){$data['form'] .='<b>'.$getparam->note1.': </b>'.$param->param1.'<br>';}
		if(!empty($getparam->note2)){$data['form'] .='<b>'.$getparam->note2.': </b>'.$param->param2.'<br>';}
		if(!empty($getparam->note3)){$data['form'] .='<b>'.$getparam->note3.': </b>'.$param->param3.'<br>';}
		if(!empty($getparam->note4)){$data['form'] .='<b>'.$getparam->note4.': </b>'.$param->param4.'<br>';}
		if(!empty($getparam->note5)){$data['form'] .='<b>'.$getparam->note5.': </b>'.$param->param5.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note6)){$data['form'] .='<b>'.$getparam->note6.': </b>'.$param->param6.'<br>';}
		if(!empty($getparam->note7)){$data['form'] .='<b>'.$getparam->note7.': </b>'.$param->param7.'<br>';}
		if(!empty($getparam->note8)){$data['form'] .='<b>'.$getparam->note8.': </b>'.$param->param8.'<br>';}
		if(!empty($getparam->note9)){$data['form'] .='<b>'.$getparam->note9.': </b>'.$param->param9.'<br>';}
		if(!empty($getparam->note10)){$data['form'] .='<b>'.$getparam->note10.': </b>'.$param->param10.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note11)){$data['form'] .='<b>'.$getparam->note11.': </b>'.$param->param11.'<br>';}
		if(!empty($getparam->note12)){$data['form'] .='<b>'.$getparam->note12.': </b>'.$param->param12.'<br>';}
		if(!empty($getparam->note13)){$data['form'] .='<b>'.$getparam->note13.': </b>'.$param->param13.'<br>';}
		if(!empty($getparam->note14)){$data['form'] .='<b>'.$getparam->note14.': </b>'.$param->param14.'<br>';}
		if(!empty($getparam->note15)){$data['form'] .='<b>'.$getparam->note15.': </b>'.$param->param15.'<br>';}
		$data['form'] .= '</div></div>';
		
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->getallparamCount($code, $searchText);
		$usedcode = 'hispar/'.$xcode;
		$returns = $this->paginationCompress ( $usedcode, $count, 10, 3 );
		$data['lastloc'] = $this->device_model->getallparam($code, $searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Parameter Logs';
		$this->loadViews("alldev/hispar", $this->global, $data, NULL);
	}
	function hisman($xcode){
		$data['xcode'] = $xcode;
		$code = str_replace('-',' ',$xcode);
		
		$param = $this->device_model->getparamcode($code);
		$data['id'] = $param->id;
		$devcode = explode(' ', $param->code);
		$getparam = $this->device_model->parameter($devcode[0]);
		$data['form'] = '<div class="box-body">';
		$data['form'] .= '<div class="col-md-4">';
		if(!empty($getparam->note1)){$data['form'] .='<b>'.$getparam->note1.': </b>'.$param->param1.'<br>';}
		if(!empty($getparam->note2)){$data['form'] .='<b>'.$getparam->note2.': </b>'.$param->param2.'<br>';}
		if(!empty($getparam->note3)){$data['form'] .='<b>'.$getparam->note3.': </b>'.$param->param3.'<br>';}
		if(!empty($getparam->note4)){$data['form'] .='<b>'.$getparam->note4.': </b>'.$param->param4.'<br>';}
		if(!empty($getparam->note5)){$data['form'] .='<b>'.$getparam->note5.': </b>'.$param->param5.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note6)){$data['form'] .='<b>'.$getparam->note6.': </b>'.$param->param6.'<br>';}
		if(!empty($getparam->note7)){$data['form'] .='<b>'.$getparam->note7.': </b>'.$param->param7.'<br>';}
		if(!empty($getparam->note8)){$data['form'] .='<b>'.$getparam->note8.': </b>'.$param->param8.'<br>';}
		if(!empty($getparam->note9)){$data['form'] .='<b>'.$getparam->note9.': </b>'.$param->param9.'<br>';}
		if(!empty($getparam->note10)){$data['form'] .='<b>'.$getparam->note10.': </b>'.$param->param10.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note11)){$data['form'] .='<b>'.$getparam->note11.': </b>'.$param->param11.'<br>';}
		if(!empty($getparam->note12)){$data['form'] .='<b>'.$getparam->note12.': </b>'.$param->param12.'<br>';}
		if(!empty($getparam->note13)){$data['form'] .='<b>'.$getparam->note13.': </b>'.$param->param13.'<br>';}
		if(!empty($getparam->note14)){$data['form'] .='<b>'.$getparam->note14.': </b>'.$param->param14.'<br>';}
		if(!empty($getparam->note15)){$data['form'] .='<b>'.$getparam->note15.': </b>'.$param->param15.'<br>';}
		$data['form'] .= '</div></div>';
		
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->getallmaintenCount($code, $searchText);
		$usedcode = 'hisman/'.$xcode;
		$returns = $this->paginationCompress ( $usedcode, $count, 10, 3 );
		$data['lastloc'] = $this->device_model->getallmainten($code, $searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Maintenance Logs';
		$this->loadViews("alldev/hisman", $this->global, $data, NULL);
	}
	function histes($xcode){
		$data['xcode'] = $xcode;
		$code = str_replace('-',' ',$xcode);
		
		$param = $this->device_model->getparamcode($code);
		$data['id'] = $param->id;
		$devcode = explode(' ', $param->code);
		$getparam = $this->device_model->parameter($devcode[0]);
		$data['form'] = '<div class="box-body">';
		$data['form'] .= '<div class="col-md-4">';
		if(!empty($getparam->note1)){$data['form'] .='<b>'.$getparam->note1.': </b>'.$param->param1.'<br>';}
		if(!empty($getparam->note2)){$data['form'] .='<b>'.$getparam->note2.': </b>'.$param->param2.'<br>';}
		if(!empty($getparam->note3)){$data['form'] .='<b>'.$getparam->note3.': </b>'.$param->param3.'<br>';}
		if(!empty($getparam->note4)){$data['form'] .='<b>'.$getparam->note4.': </b>'.$param->param4.'<br>';}
		if(!empty($getparam->note5)){$data['form'] .='<b>'.$getparam->note5.': </b>'.$param->param5.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note6)){$data['form'] .='<b>'.$getparam->note6.': </b>'.$param->param6.'<br>';}
		if(!empty($getparam->note7)){$data['form'] .='<b>'.$getparam->note7.': </b>'.$param->param7.'<br>';}
		if(!empty($getparam->note8)){$data['form'] .='<b>'.$getparam->note8.': </b>'.$param->param8.'<br>';}
		if(!empty($getparam->note9)){$data['form'] .='<b>'.$getparam->note9.': </b>'.$param->param9.'<br>';}
		if(!empty($getparam->note10)){$data['form'] .='<b>'.$getparam->note10.': </b>'.$param->param10.'<br>';}
		$data['form'] .= '</div><div class="col-md-4">';
		if(!empty($getparam->note11)){$data['form'] .='<b>'.$getparam->note11.': </b>'.$param->param11.'<br>';}
		if(!empty($getparam->note12)){$data['form'] .='<b>'.$getparam->note12.': </b>'.$param->param12.'<br>';}
		if(!empty($getparam->note13)){$data['form'] .='<b>'.$getparam->note13.': </b>'.$param->param13.'<br>';}
		if(!empty($getparam->note14)){$data['form'] .='<b>'.$getparam->note14.': </b>'.$param->param14.'<br>';}
		if(!empty($getparam->note15)){$data['form'] .='<b>'.$getparam->note15.': </b>'.$param->param15.'<br>';}
		$data['form'] .= '</div></div>';
		
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->getalltestCount($code, $searchText);
		$usedcode = 'histes/'.$xcode;
		$returns = $this->paginationCompress ( $usedcode, $count, 10, 3 );
		$data['lasttest'] = $this->device_model->getalltest($code, $searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Test Logs';
		$this->loadViews("alldev/histes", $this->global, $data, NULL);
	}
	function viewtestresultx($id){
		$newid = $this->device_model->gettestresultbyid($id);
		$docdetail = $this->device_model->gettestformbyid($newid->test_id);
		$doc = $this->device_model->gettestform($docdetail->dev_code, $docdetail->test_title);
		$formx = '<div class="box-body table-responsive no-padding">';
		if(!empty($doc)){
			$head = '';
			$head2 = '';
			$title = '';
			$title2 = '';
			$a=1;
			$input='';
			$kop = '';
			$kop2 = '';
			$x = 0;
			$xxx = 1;
			foreach($doc as $record){
				$kop = '<table class="table" style="border: 1px solid black;">
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>TEST TITLE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>Submitted by.</b></td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->test_title.'</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->dev_code.'</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>Submitted by.</b></td>
					</tr>
					</table>';
				if($kop != $kop2){$formx .= $kop;}
				$head = '<table class="table table-hover table-striped table-bordered" >
					<tr>
						<th class="text-center" style="border: 1px solid black;">No</th>
						<th class="text-center" style="border: 1px solid black;">Condition</th>
						<th class="text-center" style="border: 1px solid black;">Standard</th>
						<th class="text-center" style="border: 1px solid black;">Answer Type</th>
					</tr>';
				if($head != $head2){$formx .= $head;}
				$titlex = '<td colspan="4" style="border: 1px solid black;"><b>'.$xxx.'. '.$record->test_name.'</b></td>';
				$title = $record->test_name;
				if($title != $title2){$formx .= $titlex; $a=1;$xxx++;}
				$isian = $this->device_model->getanswer($newid->unixtime, $record->id);
				$val = $isian->test_result;
				if($record->test_type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm" value="'.$val.'" disabled/>';}
				if($record->test_type == 2){
				$n1 = '';$n2 = '';
				if($val == 1){$n1 = 'checked';}
				if($val == 2){$n2 = 'checked';}
				$input = '
				<label class="radio-inline"><input type="radio" value="1" '.$val.' disabled>YES</label>
				<label class="radio-inline"><input type="radio" value="2" '.$val.' disabled>NO</label>';}
				if($record->test_type != 2 and $record->test_type != 1){$input = $record->test_type;}
			$formx .= '<tr>';
			$formx .= '<td class="text-center" style="border: 1px solid black;">'.$a.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_cond.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_stand.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$input.'</td>';
			$formx .= '</tr>';
			$head2 = $head;
			$kop2 = $kop;
			$title2 = $title;
			$a++;$x++;
			}
		}
		$formx .= '</table>';
		$formx .= '</form>';
		$formx .= '</div>';
		echo $formx;
	}
	function viewtestresult($id){
		$newid = $this->device_model->gettestresultbyid($id);
		$doc = $this->device_model->gettestformcom($newid->unixtime, $newid->code, $newid->pic);
		$formx = '<div class="box-body table-responsive no-padding">';
		if(!empty($doc)){
			$head = '';
			$head2 = '';
			$title = '';
			$title2 = '';
			$a=1;
			$input='';
			$kop = '';
			$kop2 = '';
			$x = 0;
			$xxx = 1;
			foreach($doc as $record){
				if($record->app == 0){$label = '<b>Waiting Approval</b>';}
				if($record->app == 1){$label = '<b>Approved by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate);}
				if($record->app == 2){$label = '<b>Rejected by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate);}
				$kop = '<table class="table" style="border: 1px solid black;">
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>TEST TITLE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>Submitted by.</b>'.$record->pic.'/'.date('Y-m-d H:i:s', $record->unixtime).'</td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->test_title.'</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->dev_code.'</b></td>
						<td class="text-center" style="border: 1px solid black;">'.$label.'</td>
					</tr>
					</table>';
				if($kop != $kop2){$formx .= $kop;}
				$head = '<table class="table table-hover table-striped table-bordered" >
					<tr>
						<th class="text-center" style="border: 1px solid black;">No</th>
						<th class="text-center" style="border: 1px solid black;">Condition</th>
						<th class="text-center" style="border: 1px solid black;">Standard</th>
						<th class="text-center" style="border: 1px solid black;">Answer Type</th>
						<th class="text-center" style="border: 1px solid black;">Observe</th>
					</tr>';
				if($head != $head2){$formx .= $head;}
				$titlex = '<td colspan="5" style="border: 1px solid black;"><b>'.$xxx.'. '.$record->test_name.'</b></td>';
				$title = $record->test_name;
				if($title != $title2){$formx .= $titlex; $a=1;$xxx++;}
				if($record->test_type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm" value="'.$record->test_result.'" disabled/>';}
				if($record->test_type == 2){
				$n1 = '';$n2 = '';
				if($record->test_result == 1){$n1 = 'checked';}
				if($record->test_result == 2){$n2 = 'checked';}
				$input = '
				<label class="radio-inline"><input type="radio" value="1" '.$n1.' disabled>YES</label>
				<label class="radio-inline"><input type="radio" value="2" '.$n2.' disabled>NO</label>';}
				if($record->test_type != 2 and $record->test_type != 1){$input = $record->test_type;}
			$formx .= '<tr>';
			$formx .= '<td class="text-center" style="border: 1px solid black;">'.$a.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_cond.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_stand.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$input.'</td>';
			$formx .= '<td class="text-center" style="border: 1px solid black;"><a href="'.base_url().'devtren/'.$record->test_id.'" target="_blank" class="btn btn-success btn-sm">Observe</a></td>';
			$formx .= '</tr>';
			$head2 = $head;
			$kop2 = $kop;
			$title2 = $title;
			$a++;$x++;
			}
		}
		$formx .= '</table>';
		$formx .= '</form>';
		$formx .= '</div>';
		echo $formx;
	}
	function devtren($id){
		$data['title'] = $this->device_model->gettrentitlebyid($id);
		$getdata = $this->device_model->gettrendev($id, $data['title']->code);
		$value = '';
		if(!empty($getdata)){
			foreach($getdata as $record){
				$ox = date('U', strtotime($record->timestamp));
				$o_x = $ox*1000;
				$value .='{x:'.$o_x;
				$value .=',y:'.$record->test_result;
				$value .='}, ';
			}
		}
		$data['value'] = substr($value, 0, -2);
		$this->global['pageTitle'] = 'RAWR :'.$data['title']->code.'/'.$data['title']->test_name;
		$this->loadViews("alldev/showtren", $this->global, $data, NULL);
	}
	function devmainclass(){
		$data['mainclass'] =  $this->device_model->devmainclass();
		$this->global['pageTitle'] = 'RAWR : Main Class Setting';
		$this->loadViews("alldev/devmainclass", $this->global, $data, NULL);
	}
	function editdevmainclass(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$note1 = $this->input->post('note1');
			$note2 = $this->input->post('note2');
			$note3 = $this->input->post('note3');
			$note4 = $this->input->post('note4');
			$note5 = $this->input->post('note5');
			$note6 = $this->input->post('note6');
			$note7 = $this->input->post('note7');
			$note8 = $this->input->post('note8');
			$note9 = $this->input->post('note9');
			$note10 = $this->input->post('note10');
			$note11 = $this->input->post('note11');
			$note12 = $this->input->post('note12');
			$note13 = $this->input->post('note13');
			$note14 = $this->input->post('note14');
			$note15 = $this->input->post('note15');
			$note16 = $this->input->post('note16');
			$note17 = $this->input->post('note17');
			$note18 = $this->input->post('note18');
			$note19 = $this->input->post('note19');
			$note20 = $this->input->post('note20');
			$rep1 = $this->input->post('rep1');
			$rep2 = $this->input->post('rep2');
			$rep3 = $this->input->post('rep3');
			$rep4 = $this->input->post('rep4');
			$rep5 = $this->input->post('rep5');
			$id = $this->input->post('id');
			$dev_class = $this->input->post('dev_class');
			$devinfo = array(
				'dev_class'=>$dev_class,
				'note1'=>$note1,
				'note2'=>$note2,
				'note3'=>$note3,
				'note4'=>$note4,
				'note5'=>$note5,
				'note6'=>$note6,
				'note7'=>$note7,
				'note8'=>$note8,
				'note9'=>$note9,
				'note10'=>$note10,
				'note11'=>$note11,
				'note12'=>$note12,
				'note13'=>$note13,
				'note14'=>$note14,
				'note15'=>$note15,
				'note16'=>$note16,
				'note17'=>$note17,
				'note18'=>$note18,
				'note19'=>$note19,
				'note20'=>$note20,
				'rep1'=>$rep1,
				'rep2'=>$rep2,
				'rep3'=>$rep3,
				'rep4'=>$rep4,
				'rep5'=>$rep5
				);
			$this->device_model->editdevice($devinfo,$id);
			redirect('devmainclass');
		}
	}
	function adddevmainclass(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$dev_class = $this->input->post('dev_class');
			$newdevcode = $this->device_model->newdevcode();
			$code = $newdevcode->dev_code + 1;
			$devinfo = array(
				'dev_class'=>$dev_class,
				'dev_code'=>$code
				);
			$this->device_model->adddevmainclass($devinfo);
			redirect('devmainclass');
		}
	}
	function devsubclass(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$class_code = $this->input->post('class_code');
			if(empty($class_code)){$data['class_code'] = 10;}else{$data['class_code'] = $class_code;}
			
			$size = $this->input->post('size');
			$id = $this->input->post('id');
			$isvalid = $this->input->post('isvalid');
			$code = $this->input->post('code');
			if(!empty($size) and empty($code)){
				$devinfo = array(
					'size'=>$size,
					'isvalid'=>$isvalid
					);
				$this->device_model->editdevsubclass($devinfo, $id);
				redirect('devsubclassx/'.$data['class_code']);
			}
			if(!empty($code)){
				$data['cekcode'] = $this->device_model->subcodecheck($data['class_code'], $code);
				if(empty($data['cekcode'])){
					$devinfo = array(
						'dev_code'=>$data['class_code'],
						'size'=>$size,
						'code'=>strtoupper($code)
					);
				$this->device_model->adddevsubclass($devinfo);
				redirect('devsubclassx/'.$data['class_code']);
				}
			}
			$data['dev_class'] = $this->device_model->devclass();
			$data['mainclass'] = $this->device_model->devallsubclass($data['class_code']);
			
			$this->global['pageTitle'] = 'RAWR : Sub Class Setting';
			$this->loadViews("alldev/devsubclass", $this->global, $data, NULL);
		}
	}
	function devsubclassx($class_code){
		$data['class_code'] = $class_code;
		$data['dev_class'] = $this->device_model->devclass();
		$data['mainclass'] = $this->device_model->devallsubclass($data['class_code']);
		$this->global['pageTitle'] = 'RAWR : Sub Class Setting';
		$this->loadViews("alldev/devsubclass", $this->global, $data, NULL);
	}
	function editdevsubclass(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$size = $this->input->post('size');
			$id = $this->input->post('id');
			$isvalid = $this->input->post('isvalid');
			$devinfo = array(
				'size'=>$size,
				'isvalid'=>$isvalid
				);
			$this->device_model->editdevsubclass($devinfo, $id);
			redirect('devsubclass');
		}
	}
	function devparam(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$class_code = $this->input->post('class_code');
			if(empty($class_code)){
				$data['class_code'] = '';
			}else{
				$data['class_code'] = $class_code;
			}
			
			$param = $this->input->post('param');
			$isvalid = $this->input->post('isvalid');
			$id = $this->input->post('id');
			if(!empty($param) and !empty($id)){
				$devinfo = array(
					'dev_code'=>$data['class_code'],
					'param'=>$param
					);
				$this->device_model->editdevparam($devinfo, $id);
				redirect('devparamx/'.$data['class_code']);
			}
			if(!empty($param) and empty($id)){
				$devinfo = array(
					'dev_code'=>$data['class_code'],
					'param'=>$param
				);
				$this->device_model->adddevparam($devinfo);
				redirect('devparamx/'.$data['class_code']);
			}
			$data['dev_class'] = $this->device_model->devclass();
			$data['paramlist'] = $this->device_model->devparam($data['class_code']);
			
			$this->global['pageTitle'] = 'RAWR : Parameter Setting';
			$this->loadViews("alldev/devparam", $this->global, $data, NULL);
		}
	}
	function devparamx($class_code){
		$data['class_code'] = $class_code;
		$data['dev_class'] = $this->device_model->devclass();
		$data['paramlist'] = $this->device_model->devparam($data['class_code']);
		$this->global['pageTitle'] = 'RAWR : Parameter Setting';
		$this->loadViews("alldev/devparam", $this->global, $data, NULL);
	}
	function devposisi(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->devposisiCount($searchText);
		$returns = $this->paginationCompress ( "devposisi/", $count, 10 );
		$data['posisi'] = $this->device_model->devposisi($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Position Setting';
		$this->loadViews("alldev/devposisi", $this->global, $data, NULL);
	}
	function adddevposisi(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$posisi = $this->input->post('posisi');
			$devinfo = array('posisi'=>$posisi);
			$this->device_model->adddevposisi($devinfo);
			redirect('devposisi');
		}
	}
	function editposisi(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$posisi = $this->input->post('posisi');
			$isvalid = $this->input->post('isvalid');
			$id = $this->input->post('id');
			$devinfo = array('posisi'=>$posisi,'isvalid'=>$isvalid);
			$this->device_model->editposisi($devinfo, $id);
			redirect('devposisi');
		}
	}
	function devusage(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->devusageCount($searchText);
		$returns = $this->paginationCompress ( "devusage/", $count, 10 );
		$data['usage'] = $this->device_model->devusage($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Position Setting';
		$this->loadViews("alldev/devusage", $this->global, $data, NULL);
	}
	function adddevusage(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$usage = $this->input->post('usage');
			$devinfo = array('device'=>$usage);
			$this->device_model->adddevusage($devinfo);
			redirect('devusage');
		}
	}
	function editdevusage(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$usage = $this->input->post('usage');
			$isvalid = $this->input->post('isvalid');
			$id = $this->input->post('id');
			$devinfo = array('device'=>$usage,'isvalid'=>$isvalid);
			$this->device_model->editdevusage($devinfo, $id);
			redirect('devusage');
		}
	}
	function devtest(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->devtestCount($searchText);
		$returns = $this->paginationCompress ( "devtest/", $count, 10 );
		$data['testform'] = $this->device_model->devtest($searchText, $returns["page"], $returns["segment"]);
		$data['subclass'] = $this->device_model->getsubclass();
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Testsheet';
		$this->loadViews("alldev/devtest", $this->global, $data, NULL);
	}
	function adddevtest(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$dev_code = $this->input->post('dev_code');
			$test_title = $this->input->post('test_title');
			$forminfo = array('dev_code'=>$dev_code,'test_title'=>$test_title, 'test_name'=>'Default', 'test_cond'=>'Default', 'test_stand'=>'Default', 'test_type'=>1);
			$this->device_model->adddevtest($forminfo);
			redirect('devtest');
		}
	}
	function viewtestform($id){
		$docdetail = $this->device_model->gettestformbyid($id);
		$doc = $this->device_model->gettestform($docdetail->dev_code, $docdetail->test_title);
		$img = $this->device_model->getimageadd($docdetail->dev_code, $docdetail->test_title);
		if(!empty($img)){$image = '<td class="text-center" style="border: 1px solid black;" colspan="2"><img src="'.base_url().'assets/report/'.$img->imglink.'.jpg" align="center" width="100%"/></td>';}else{$image='';}
		$formx = '<div class="box-body table-responsive no-padding">';
		if(!empty($doc)){
			$head = '';
			$head2 = '';
			$title = '';
			$title2 = '';
			$a=1;
			$input='';
			$kop = '';
			$kop2 = '';
			$x = 0;
			$xxx = 1;
			foreach($doc as $record){
				$kop = '<table class="table" style="border: 1px solid black;">
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>TEST TITLE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->test_title.'</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->dev_code.'</b></td>
					</tr>
					<tr>
						'.$image.'
					</tr>
					</table>';
				if($kop != $kop2){$formx .= $kop;}
				$head = '<table class="table table-hover table-striped table-bordered" >
					<tr>
						<th class="text-center" style="border: 1px solid black;">No</th>
						<th class="text-center" style="border: 1px solid black;">Condition</th>
						<th class="text-center" style="border: 1px solid black;">Standard</th>
						<th class="text-center" style="border: 1px solid black;">Answer Type</th>
					</tr>';
				if($head != $head2){$formx .= $head;}
				$titlex = '<td colspan="4" style="border: 1px solid black;"><b>'.$xxx.'. '.$record->test_name.'</b></td>';
				$title = $record->test_name;
				if($title != $title2){$formx .= $titlex; $a=1;$xxx++;}
				if($record->test_type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm"/>';}
				if($record->test_type == 2){$input = '
				<label class="radio-inline"><input type="radio" value="1">YES</label>
				<label class="radio-inline"><input type="radio" value="2">NO</label>';}
				if($record->test_type != 2 and $record->test_type != 1){$input = $record->test_type;}
			$formx .= '<tr>';
			$formx .= '<td class="text-center" style="border: 1px solid black;">'.$a.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_cond.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_stand.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$input.'</td>';
			$formx .= '</tr>';
			$head2 = $head;
			$kop2 = $kop;
			$title2 = $title;
			$a++;$x++;
			}
		}
		
		$formx .= '</table>';
		$formx .= '</form>';
		$formx .= '</div>';
		echo $formx;
	}
	function editdevtest($id){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$docdetail = $this->device_model->gettestformbyid($id);
			$data['doc'] = $this->device_model->gettestform($docdetail->dev_code, $docdetail->test_title);
			$this->global['pageTitle'] = 'RAWR : Edit Testsheet';
			$this->loadViews("alldev/editdevtest", $this->global, $data, NULL);
		}
	}
	function edittestpart(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$test_name = $this->input->post('test_name');
			$otest_name = $this->input->post('otest_name');
			$dev_code = $this->input->post('dev_code');
			$id = $this->input->post('id');
			$forminfo = array('test_name'=>$test_name);
			$result = $this->device_model->edittestpart($forminfo, $dev_code, $otest_name);
			redirect('editdevtest/'.$id);
		}
	}
	function adddevtestparam(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$test_title = $this->input->post('test_title');
			$test_name = $this->input->post('test_name');
			$test_cond = $this->input->post('test_cond');
			$test_stand = $this->input->post('test_stand');
			$test_type = $this->input->post('test_type');
			$dev_code = $this->input->post('dev_code');
			$id = $this->input->post('id');
			$forminfo = array(
					'test_title'=>$test_title,
					'test_name'=>$test_name,
					'test_cond'=>$test_cond,
					'test_stand'=>$test_stand,
					'test_type'=>$test_type,
					'dev_code'=>$dev_code
				);
			$result = $this->device_model->adddevtestparam($forminfo);
			redirect('editdevtest/'.$id);
		}
	}
	function edittestparam(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$test_cond = $this->input->post('test_cond');
			$test_stand = $this->input->post('test_stand');
			$test_type = $this->input->post('test_type');
			$id = $this->input->post('id');
			$forminfo = array(
					'test_cond'=>$test_cond,
					'test_stand'=>$test_stand,
					'test_type'=>$test_type
				);
			$result = $this->device_model->edittestparam($forminfo, $id);
			redirect('editdevtest/'.$id);
		}
	}
	function deltestrow(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$forminfo = array('isvalid'=>0);
			$result = $this->device_model->edittestparam($forminfo, $id);
			$docdetail = $this->device_model->gettestformbyid($id);
			$id = $this->device_model->gettestformID($docdetail->dev_code, $docdetail->test_title);
			if(!empty($id)){
				redirect('editdevtest/'.$id->id);
			}else{
				redirect('devtest');
			}
		}
	}
	function addtestpart(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$test_title = $this->input->post('test_title');
			$dev_code = $this->input->post('dev_code');
			$test_name = $this->input->post('test_name');
			$test_cond = $this->input->post('test_cond');
			$test_stand = $this->input->post('test_stand');
			$test_type = $this->input->post('test_type');
			$id = $this->input->post('id');
			$forminfo = array(
					'test_title'=>$test_title,
					'dev_code'=>$dev_code,
					'test_name'=>$test_name,
					'test_cond'=>$test_cond,
					'test_stand'=>$test_stand,
					'test_type'=>$test_type
				);
			$result = $this->device_model->adddevtest($forminfo);
			redirect('editdevtest/'.$id);
		}
	}
	function devqr2(){
		$selClass =  $this->input->post('selclass');
		$data['selclass'] = $this->input->post('selclass');
		
		$codes = $this->device_model->getqr($selClass);
		$tabel = '<table class="table" style="border: 1px solid black;">';
		if(!empty($codes)){
			$a = 0;
			foreach($codes as $result){
				if($a % 5 == 0){$tabel .= '<tr>';}
					$tabel .= '<td class="text-center" style="border: 1px solid black;" width="20%"><img src="'.base_url().'devqr/'.str_replace(' ', '-', $result->code).'" style="height:90px"/><br> SLCI ['.$result->code.']</td>';
				//if($a % 7 == 0){$tabel .= '</tr>';}
				$a++;
			}
		}
		$tabel .= '</table>';
		$data['tabel'] = $tabel;
		$data['class'] = $this->device_model->devclass();
		
		$this->global['pageTitle'] = 'RAWR : Device QR';
		$this->loadViews("alldev/devqr", $this->global, $data, NULL);
	}
	function testsheet_app(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$show = $this->security->xss_clean($this->input->post('show'));
		$data['searchText'] = $searchText;
		$data['show'] = $show;
		$showuser = '';
		if($show == ''){
			$cekapp = $this->device_model->getmyappdevice($this->name);
			$showuser .= '(';
			if(!empty($cekapp)){
				$str = '';
				foreach($cekapp as $record){
					$str .= '`t1`.`code` LIKE "'.$record->code.'%" OR';
				}
				$xx = substr($str,0, -3);
			}else{
				$xx = '`t1`.`code` LIKE 99999999'; 
			}
			$showuser .= $xx;
			$showuser .= ')';
		}
		$this->load->library('pagination');
		$count = $this->device_model->getapptestCount($searchText, $showuser);
		$returns = $this->paginationCompress ( "testsheet_app/", $count, 10 );
		$data['testsheet_app'] = $this->device_model->getapptest($searchText, $showuser, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Testsheet Approval';
		$this->loadViews("alldev/testsheet_app", $this->global, $data, NULL);
	}
	function testappbox($id){
		$newid = $this->device_model->gettestresultbyid($id);
		$doc = $this->device_model->gettestformcom($newid->unixtime, $newid->code, $newid->pic);
		$formx = '<div class="box-body table-responsive no-padding">';
		if(!empty($doc)){
			$head = '';
			$head2 = '';
			$title = '';
			$title2 = '';
			$a=1;
			$input='';
			$kop = '';
			$kop2 = '';
			$x = 0;
			$xxx = 1;
			foreach($doc as $record){
				if($record->app == 0){$label = '<b>Waiting Approval</b>';}
				if($record->app == 1){$label = '<b>Approved by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate);}
				if($record->app == 2){$label = '<b>Rejected by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate);}
				$kop = '<table class="table" style="border: 1px solid black;">
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>TEST TITLE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>Submitted by.</b>'.$record->pic.'/'.date('Y-m-d H:i:s', $record->unixtime).'</td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->test_title.'</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->dev_code.'</b></td>
						<td class="text-center" style="border: 1px solid black;">'.$label.'</td>
					</tr>
					</table>';
				if($kop != $kop2){$formx .= $kop;}
				$head = '<table class="table table-hover table-striped table-bordered" >
					<tr>
						<th class="text-center" style="border: 1px solid black;">No</th>
						<th class="text-center" style="border: 1px solid black;">Condition</th>
						<th class="text-center" style="border: 1px solid black;">Standard</th>
						<th class="text-center" style="border: 1px solid black;">Answer Type</th>
						<th class="text-center" style="border: 1px solid black;">Observe</th>
					</tr>';
				if($head != $head2){$formx .= $head;}
				$titlex = '<td colspan="5" style="border: 1px solid black;"><b>'.$xxx.'. '.$record->test_name.'</b></td>';
				$title = $record->test_name;
				if($title != $title2){$formx .= $titlex; $a=1;$xxx++;}
				if($record->test_type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm" value="'.$record->test_result.'" disabled/>';}
				if($record->test_type == 2){
				$n1 = '';$n2 = '';
				if($record->test_result == 1){$n1 = 'checked';}
				if($record->test_result == 2){$n2 = 'checked';}
				$input = '
				<label class="radio-inline"><input type="radio" value="1" '.$n1.' disabled>YES</label>
				<label class="radio-inline"><input type="radio" value="2" '.$n2.' disabled>NO</label>';}
				if($record->test_type != 2 and $record->test_type != 1){$input = $record->test_type;}
			$formx .= '<tr>';
			$formx .= '<td class="text-center" style="border: 1px solid black;">'.$a.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_cond.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->test_stand.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$input.'</td>';
			$formx .= '<td class="text-center" style="border: 1px solid black;"><a href="'.base_url().'devtren/'.$record->test_id.'" target="_blank" class="btn btn-success btn-sm">Observe</a></td>';
			$formx .= '</tr>';
			$head2 = $head;
			$kop2 = $kop;
			$title2 = $title;
			$a++;$x++;
			}
		}
		$formx .= '</table>';
		$formx .= '</form>';
		$formx .= '</div>';
		$formx .= '
		<div class="box-body">
			<form action="'.base_url().'testappit" method="POST">
				<button class="btn btn-success pull-right"><i class="fa fa-check"></i> Mark as Ready</button>
				<input type="hidden" name="unixtime" value="'.$newid->unixtime.'">
				<input type="hidden" name="code" value="'.$newid->code.'">
				<input type="hidden" name="act" value="1">
			</form>
			<form action="'.base_url().'testappit" method="POST">
				<button class="btn btn-danger pull-right"><i class="fa fa-close"></i> Mark as NOT Ready yet</button>
				<input type="hidden" name="unixtime" value="'.$newid->unixtime.'">
				<input type="hidden" name="code" value="'.$newid->code.'">
				<input type="hidden" name="act" value="0">
			</form>
		</div>
		
			';
		echo $formx;
	}
	function testappit(){
		$code = $this->input->post('code');
		$dev_code = explode(' ',$code);
		$unix = date('U');
		$check_app = $this->device_model->cekdevice_app($this->name, $dev_code[0]);
		if(!empty($check_app)){
			$unixtime = $this->input->post('unixtime');
			$act = $this->input->post('act');
			if($act == 1){$resu = 1;}
			if($act == 0){$resu = 2;}
			$resultdata = array('app'=> $resu, 'appname'=>$this->name, 'appdate'=>$unix);
			$this->device_model->approvetestdoc($resultdata, $code, $unixtime);
			$getdevdet = $this->device_model->getparamcode($code);
			$getticket = $this->device_model->getdevticket($getdevdet->id, 0);
			if(!empty($getticket)){
				if($act == 1){
					$ticketact = array('ticket_id'=>$getticket->id, 'pic'=>$this->name, 'act'=>'Approval Testsheet', 'note'=>'Approved, device ready to use!');
					$ticket = array('isopen'=>0);
					$devinfo = array('isready'=>1);
				}else{
					$ticketact = array('ticket_id'=>$getticket->id, 'pic'=>$this->name, 'act'=>'Approval Testsheet', 'note'=>'Rejected');
					$ticket = array('isopen'=>1);
					$devinfo = array('isready'=>0);
				}
				$this->device_model->addactticket($ticketact);
				$this->device_model->editrepairticket($ticket, $getticket->id);
				$this->device_model->editdevicein($devinfo, $code);
			}
			redirect('testsheet_app');
		}else{
			$this->loadThis();
		}
	}
	function devpicsetting(){
		$data['users'] = $this->device_model->getusers();
		$data['devclass'] = $this->device_model->devclass();
		$data['device_app'] = $this->device_model->device_app();
		$this->global['pageTitle'] = 'RAWR : Device PIC';
		$this->loadViews("alldev/devpicsetting", $this->global, $data, NULL);
	}
	function adddevpicsetting(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$users = $this->input->post('users');
			$devclass = $this->input->post('devclass');
			$addedby = $this->name;
			$picinfo = array(
					'uName'=>$users,
					'code'=>$devclass,
					'addedby'=>$addedby
				);
			$this->device_model->adddevpicsetting($picinfo);
			redirect('devpicsetting');
		}
	}
	function deldevpicsetting(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$picinfo = array('isvalid'=>0);
			$this->device_model->deldevpicsetting($picinfo, $id);
			redirect('devpicsetting');
		}
	}
	function notif4(){
		$cekapp = $this->device_model->getmyappdevice($this->name);
		$showuser = '(';
		if(!empty($cekapp)){
			$str = '';
			foreach($cekapp as $record){
				$str .= '`t1`.`code` LIKE "'.$record->code.'%" OR';
			}
			$xx = substr($str,0, -3);
		}else{
			$xx = '`t1`.`code` LIKE 99999999'; 
		}
		$showuser .= $xx;
		$showuser .= ')';
		$notif4 = $this->device_model->getapptestCount('', $showuser);
		echo $notif4;
	}
	function notif8(){
		$notif8 = $this->device_model->getwdevCount();
		echo $notif8;
	}
	function notif10(){
		$notif8 = $this->device_model->getwdevreadyCount();
		echo $notif8;
	}
	function repairprog($id, $sts){
		$getdevticket = $this->device_model->getdevticket($id, $sts);
		$getdevdet = $this->device_model->paramval($id);
		$code = str_replace(' ', '-', $getdevdet->code);
		$call = '';
		if(!empty($getdevticket)){
			if($sts == 0){
				$call .= '<div class="callout bg-primary">';
				$call .= '<b>PIC: </b>'.$getdevticket->pic.' <b>Added by: </b>'.$getdevticket->addedby.'-'.$getdevticket->timestamp;
				$getticketact = $this->device_model->getticketact($getdevticket->id);
				if(!empty($getticketact)){
					$call .= '<p>';
					foreach($getticketact as $record){
						$call .= $record->timestamp.' '.$record->pic.', '.$record->act.', '.$record->note.'<br>';
					}
					$call .= '</p>';
				}else{
					$call .= '<p> No data... </p>';
				}
				$call .= '<a class="btn btn-sm btn-success" href="'.base_url().'updateticketact/'.$getdevticket->id.'"><i class="fa fa-upload"></i> Update<a>';
				$call .= '<a class="btn btn-sm btn-info" href="'.base_url().'devpertest/'.$code.'" target="_blank"><i class="fa fa-tasks"></i> Test Device<a>';
				$call .= '</div>';
			}else{
				$call .= '<div class="callout bg-green">';
				$call .= '<b>PIC: </b>'.$getdevticket->pic.' <b>Added by: </b>'.$getdevticket->addedby.'-'.$getdevticket->timestamp;
				$getticketact = $this->device_model->getticketact($getdevticket->id);
				if(!empty($getticketact)){
					$call .= '<p>';
					foreach($getticketact as $record){
						$call .= $record->timestamp.' '.$record->pic.', '.$record->act.', '.$record->note.'<br>';
					}
					$call .= '</p>';
				}else{
					$call .= '<p> No data... </p>';
				}
				$call .= '</div>';
			}
		}else{
			$getusers = $this->device_model->getusers();
			$call .= '
				<br>
				<div class="text-center">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_new'.$id.'"><i class="fa fa-plus"></i> Create Repair Ticket</button>
				</div>
				<div class="modal modal-default fade" id="add_new'.$id.'">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							</div>
							<form role="form" id="edit_act" action="'.base_url().'addrepairticket" method="post" role="form">
							<div class="modal-body">
								Adding new repair ticket, please confirm with Submit button below..<br>
								<select class="form-control selectuser" name="pic">
									<option value=""></option>
								';
			if(!empty($getusers)){
				foreach($getusers as $res){
					$call .= '<option value="'.$res->uName.'">'.$res->uName.'</option>';
				}
			}
			$call .= '
								</select>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="dev_id" value="'.$id.'">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" value="Submit">
							</div>
							</form>
						</div>
					</div>
				</div>';
			$call .= '
				<script type="text/javascript">
					$(document).ready(function () {
						$(".selectuser").select2({
							placeholder: "Select PIC"
						});
					});
				</script>
			';
		}
		echo $call;
	}
	function addrepairticket(){
		$pic = $this->input->post('pic');
		$dev_id = $this->input->post('dev_id');
		$ticket = array(
				'pic'=>$pic,
				'dev_id'=>$dev_id,
				'addedby'=>$this->name
			);
		$this->device_model->addrepairticket($ticket);
		redirect('workshopdev');
	}
	function updateticketact($id){
		$data['ticket'] = $this->device_model->getticketbyid($id);
		$data['actrepair'] = $this->device_model->getactrepair();
		$data['ticketact'] = $this->device_model->getticketact($id);
		$this->global['pageTitle'] = 'RAWR : Update Repair Ticket';
		$this->loadViews("alldev/addticket", $this->global, $data, NULL);
	}
	function addupdateticket(){
		$ticket_id = $this->input->post('ticket_id');
		$act = $this->input->post('act');
		$note = $this->input->post('note');
		$ticketact = array('ticket_id'=>$ticket_id, 'act'=>$act, 'note'=>$note, 'pic'=>$this->name);
		$this->device_model->addactticket($ticketact);
		redirect('updateticketact/'.$ticket_id);
	}
	function deviden(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->devidenCount($searchText);
		$returns = $this->paginationCompress ( "deviden/", $count, 20 );
		$data['idenlist'] = $this->device_model->deviden($searchText, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Device Identification';
		$this->loadViews("alldev/deviden", $this->global, $data, NULL);
	}
	function adddeviden(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$iden = $this->input->post('iden');
			$devinfo = array('iden_name'=>$iden, 'addedby'=>$this->name);
			$this->device_model->adddeviden($devinfo);
			redirect('deviden');
		}
	}
	function editdeviden(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$iden = $this->input->post('iden');
			$isvalid = $this->input->post('isvalid');
			$id = $this->input->post('id');
			$devinfo = array('iden_name'=>$iden,'isvalid'=>$isvalid);
			$this->device_model->editdeviden($devinfo, $id);
			redirect('deviden');
		}
	}
	function devrepair(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->device_model->devrepairCount($searchText);
		$returns = $this->paginationCompress ( "devrepair/", $count, 20 );
		$data['idenlist'] = $this->device_model->devrepair($searchText, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Repair Default Selection';
		$this->loadViews("alldev/devrepair", $this->global, $data, NULL);
	}
	function adddevrepair(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$act = $this->input->post('act');
			$devinfo = array('act'=>$act);
			$this->device_model->adddevrepair($devinfo);
			redirect('devrepair');
		}
	}
	function editdevrepair(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$act = $this->input->post('act');
			$isvalid = $this->input->post('isvalid');
			$id = $this->input->post('id');
			$devinfo = array('act'=>$act,'isvalid'=>$isvalid);
			$this->device_model->editdevrepair($devinfo, $id);
			redirect('devrepair');
		}
	}
	function alltestsheet_app(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$show = $this->security->xss_clean($this->input->post('show'));
		$data['searchText'] = $searchText;
		$data['show'] = $show;
		$showuser = '';
		if($show == ''){
			$cekapp = $this->device_model->getmyappdevice($this->name);
			$showuser .= '(';
			if(!empty($cekapp)){
				$str = '';
				foreach($cekapp as $record){
					$str .= '`t1`.`code` LIKE "'.$record->code.'%" OR';
				}
				$xx = substr($str,0, -3);
			}else{
				$xx = '`t1`.`code` LIKE 99999999'; 
			}
			$showuser .= $xx;
			$showuser .= ')';
		}
		$this->load->library('pagination');
		$count = $this->device_model->getallapptestCount($searchText, $showuser);
		$returns = $this->paginationCompress ( "alltestsheet_app/", $count, 10 );
		$data['testsheet_app'] = $this->device_model->getallapptest($searchText, $showuser, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Testsheet History';
		$this->loadViews("alldev/alltestsheet_app", $this->global, $data, NULL);
	}
}

?>
