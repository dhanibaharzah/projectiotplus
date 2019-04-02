<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Pmjob extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('pmjob_model');
		$this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
	}
	function pmjob($segment = '', $x1 = '', $x2 = '', $x3 = '', $keyword = ''){
		if($x1=='on'){$type1 = $x1;}else{$type1 = $this->input->post('type1');}
		if($x2=='on'){$type2 = $x2;}else{$type2 = $this->input->post('type2');}
		if($x3=='on'){$type3 = $x3;}else{$type3 = $this->input->post('type3');}
		
		if($type1 == '' and $type2 == '' and $type3 == '' ){
			$type1 = 'on';
		}
		if(!empty($keyword)){$searchText = str_replace('_', ' ', $keyword);}else{$searchText = $this->security->xss_clean($this->input->post('searchText'));}
		
		$data['searchText'] = $searchText;
		$data['keyword'] = str_replace(' ', '_', $searchText);
		$data['type1'] = $type1;
		$data['type2'] = $type2;
		$data['type3'] = $type3;
		$this->load->library('pagination');
		$count = $this->pmjob_model->getpmjobCount($type1, $type2, $type3, $searchText);
		$returns = $this->paginationCompress ( "pmjob/", $count, 10 );
		$data['pmjob'] = $this->pmjob_model->getpmjob($type1, $type2, $type3, $searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['area'] = $this->pmjob_model->getarea();
		$this->global['pageTitle'] = 'RAWR : PM Job';
		$this->loadViews("pmlist/pmjob", $this->global, $data, NULL);
    }
	function setpmjob($id){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$exe = $this->input->post('exe');
			$exe = date('U', strtotime($exe)) + 25200;
			$jobinfo = array('next'=>$exe);
			$upup = $this->pmjob_model->editprojectjob($jobinfo, $id);
			
			$type1 = $this->input->post('type1');if(empty($type1)){$type1 = 'off';}
			$type2 = $this->input->post('type2');if(empty($type2)){$type2 = 'off';}
			$type3 = $this->input->post('type3');if(empty($type3)){$type3 = 'off';}
			$page = $this->input->post('page');if(empty($page)){$page = 0;}
			$keyword = $this->input->post('keyword');
			
			redirect('pmjob/'.$page.'/'.$type1.'/'.$type2.'/'.$type3.'/'.$keyword);
		}
	}
	function editpmjob(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$title = $this->input->post('title');
			$desc = $this->input->post('desc');
			$id = $this->input->post('id');
			$tag = $this->input->post('tag');
			$area = $this->input->post('area');
			$type = $this->input->post('type');
			$jobInfo = array('job_title'=>$title, 
						'job_desc'=>$desc,
						'area'=>$area,
						'type'=>$type,
						'tag'=>$tag
						);
			$result = $this->joblist_model->editprojectjob($jobInfo, $id);
			
			$type1 = $this->input->post('type1');if(empty($type1)){$type1 = 'off';}
			$type2 = $this->input->post('type2');if(empty($type2)){$type2 = 'off';}
			$type3 = $this->input->post('type3');if(empty($type3)){$type3 = 'off';}
			$page = $this->input->post('page');if(empty($page)){$page = 0;}
			$keyword = $this->input->post('keyword');
			
			redirect('pmjob/'.$page.'/'.$type1.'/'.$type2.'/'.$type3.'/'.$keyword);
		}
	}
	function delpmjob(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$id = $this->input->post('id');
			$jobInfo = array('isvalid'=>0
						);
			$result = $this->joblist_model->editprojectjob($jobInfo, $id);
			
			$type1 = $this->input->post('type1');if(empty($type1)){$type1 = 'off';}
			$type2 = $this->input->post('type2');if(empty($type2)){$type2 = 'off';}
			$type3 = $this->input->post('type3');if(empty($type3)){$type3 = 'off';}
			$page = $this->input->post('page');if(empty($page)){$page = 0;}
			$keyword = $this->input->post('keyword');
			
			redirect('pmjob/'.$page.'/'.$type1.'/'.$type2.'/'.$type3.'/'.$keyword);
		}
	}
	function setpmdetjob($id){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$data['job'] = $this->joblist_model->getprojectjob($id);
			$data['tool'] = $this->joblist_model->gettool();
			$data['toollist'] = $this->joblist_model->gettoollist($id);
			$data['partlist'] = $this->joblist_model->getpartlist($id);
			$data['doclist'] = $this->joblist_model->getdoclisttagtype($data['job']->tag, $data['job']->type);
			$data['formlist'] = $this->joblist_model->getformlist($id);
			$data['allpiclist'] = $this->pmjob_model->getusers();
			$data['piclist'] = $this->pmjob_model->getpicpm($id);
			$this->global['pageTitle'] = 'RAWR : Setting PM Job';
			$this->loadViews("pmlist/setpmdetjob", $this->global, $data, NULL);
		}
	}
	function setrepeaterpm(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$repeater = $this->input->post('repeater');
			$id = $this->input->post('id');
			$jobInfo = array('repeater'=>$repeater);
			$result = $this->joblist_model->editprojectjob($jobInfo, $id);
			redirect('setpmdetjob/'.$id);
		}
	}
	function setdurpm(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$dur = $this->input->post('dur');
			$id = $this->input->post('id');
			$jobInfo = array('dur'=>$dur);
			$result = $this->joblist_model->editprojectjob($jobInfo, $id);
			redirect('setpmdetjob/'.$id);
		}
	}
	function settoolpm(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$quan = $this->input->post('quan');
			$id = $this->input->post('id');
			$tool = $this->input->post('tool');
			$tool = explode('xx0xx', $tool);
			$toolInfo = array(
				'project_id'=>$id,
				'tool'=>$tool[0],
				'size'=>$tool[1],
				'quan'=>$quan
				);
			$result = $this->joblist_model->addtoolprojectjob($toolInfo);
			redirect('setpmdetjob/'.$id);
		}
	}
	function deltoolpmjob($id, $jobid){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$jobInfo = array('isvalid'=>0);
			$result = $this->joblist_model->deltoolprojectjob($jobInfo, $id);
			redirect('setpmdetjob/'.$jobid);
		}
	}
	function setpicpm(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$pic = $this->input->post('pic');
			$picInfo = array(
				'pm_id'=>$id,
				'pic'=>$pic
				);
			$result = $this->pmjob_model->addpicpm($picInfo);
			redirect('setpmdetjob/'.$id);
		}
	}
	function delpicpm($id, $jobid){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$jobInfo = array('isvalid'=>0);
			$result = $this->pmjob_model->delpicpm($jobInfo, $id);
			redirect('setpmdetjob/'.$jobid);
		}
	}
	function setpartpm(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$quan = $this->input->post('quan');
			$id = $this->input->post('id');
			$part = $this->input->post('part');
			$toolInfo = array(
				'project_id'=>$id,
				'tool'=>$part,
				'quan'=>$quan
				);
			$result = $this->joblist_model->addpartprojectjob($toolInfo);
			redirect('setpmdetjob/'.$id);
		}
	}
	function delpartpmjob($id, $jobid){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$jobInfo = array('isvalid'=>0);
			$result = $this->joblist_model->delpartprojectjob($jobInfo, $id);
			redirect('setpmdetjob/'.$jobid);
		}
	}
	function setformpm(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$formpm = $this->input->post('formdoc');
			$form = explode('xeqnamex', $formpm);
			$id = $this->input->post('id');
			$tag = $this->input->post('tag');
			$type = $this->input->post('type');
			$formInfo = array(
				'project_id'=>$id,
				'code'=>$form[0],
				'eq_name'=>$form[1],
				'tag'=>$tag,
				'type'=>$type
				);
			$result = $this->joblist_model->addformprojectjob($formInfo);
			redirect('setpmdetjob/'.$id);
		}
	}
	function delformpmjob($id, $jobid){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$this->load->model('joblist_model');
			$jobInfo = array('isvalid'=>0);
			$result = $this->joblist_model->delformprojectjob($jobInfo, $id);
			redirect('setpmdetjob/'.$jobid);
		}
	}
	function pmcall(){
		$this->global['pageTitle'] = 'RAWR : All Calendar';
		$this->loadViews("pmlist/pmall", $this->global, NULL, NULL);
	}
	function getpmall(){
		$start = $this->input->get("start");
		$end = $this->input->get("end");
		$events = $this->pmjob_model->getpmall($start, $end);
		$data_events = array();
		foreach($events->result() as $r) {
			if($r->tag == 1 and $r->repeater < 10){$col = '#0e9300';};//ijo
			if($r->tag == 1 and $r->repeater >= 10){$col = '#f98100';};//oren
			if($r->tag == 2 and $r->repeater < 10){$col = '#4286f4';};//biru
			if($r->tag == 2 and $r->repeater >= 10){$col = '#d30e0e';};//merah
			$enddate = $r->next + (36000);
			$title = $r->job_title;
			$data_events[] = array(
				"id" => $r->id,
				"title" => $title,
				"description" => $r->job_desc,
				"end" => gmdate('Y-m-d H:i:s', $enddate),
				"start" => gmdate('Y-m-d H:i:s', $r->next),
				"color" => $col
			);
		}
		echo json_encode(array("events" => $data_events));
		exit();
	}
	function getpmtabelall($unix){
		$start = $unix;
		$end = $start + 86399;
		$events = $this->pmjob_model->getpmtic($start, $end);
		$result = $events->result();
		$tabel = '';
		if(!empty($result)){
			$a = 1;
			$tabel .= '<div class="pull-right"><a class="btn btn-info btn-sm" href="'.base_url().'pmview/'.$unix.'" target="_blank"><i class="fa fa-search"></i></a></div>';
			$tabel .= '<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center" width="50%">PM</th>
								<th class="text-center" width="50%">Document</th>
							</tr>';
			foreach($result as $record){
				$this->load->model('joblist_model');
				$form = $this->joblist_model->getformlist($record->id);
				$formlist = '';
				$x = 1;
				if(!empty($form)){
					foreach($form as $ff){
						$formlist .= $x.'. '.$ff->code.'['.$ff->eq_name.']'.'<br>';
						$x++;
					}
					$formlist = substr($formlist, 0,-2);
				}else{
					$formlist .= 'no data';
				}
				$tag = '<span class="label label-default">Undefined</span>';
				if($record->tag == 1){$tag = '<span class="label label-warning">Electrical</span>';}
				if($record->tag == 2){$tag = '<span class="label label-primary">Mechanical</span>';}
				$tip = '<span class="label label-default">Undefined</span>';
				if($record->repeater < 10){$tip = '<span class="label label-success">Weekly</span>';}
				if($record->repeater >= 10 and $record->repeater < 40){$tip = '<span class="label label-primary">Monthly</span>';}
				if($record->repeater >= 40){$tip = '<span class="label label-danger">Long Interval</span>';}
				$tabel .= '
							<tr>
								<td class="text-center">'.$a.'</td>
								<td>'.$tag.''.$tip.'<b>'.$record->job_title.'</b><br>'.nl2br($record->job_desc).'</td>
								<td class="text-center">'.$formlist.'</td>
							</tr>';
				$a++;
			}
			$tabel .= '</table>';
		}else{
			$tabel = '<div class="text-center"><br><br><i class="fa fa-refresh fa-spin fa-5x"></i><br><h3>No data found</h3></div>';
		}
		echo $tabel;
	}
	function checkdoc(){
		$code = $this->input->post('code');
		$frec = $this->input->post('frec');
		$tag = $this->input->post('tag');
		$data['code'] = $code;
		$data['frec'] = $frec;
		$data['tag'] = $tag;
		$data['doc'] = '';
		if(!empty($frec)){
			$data['doclist'] = $this->pmjob_model->getdoclist($frec, $tag);
		}
		if(!empty($code)){
			$data['doc'] = $this->pmjob_model->getdoc($code, $frec, $tag);
			$data['usedlogo'] = $this->pmjob_model->getusedlogo($code, $frec, $tag);
		}
		$this->global['pageTitle'] = 'RAWR : PM Documents'.$code;
		$this->loadViews("pmlist/checkdoc", $this->global, $data, NULL);
	}
	function pmdetailbox($id){
		$getdoc = $this->pmjob_model->getpmparam($id);
		if(!empty($getdoc)){
			$doc = $this->pmjob_model->getdoc($getdoc->code, $getdoc->frec, $getdoc->tag);
			$get3rdtag = $this->pmjob_model->getdoc($getdoc->code, $getdoc->frec, 3);
			$doc3rdtag = '';
			if(!empty($get3rdtag)){$doc3rdtag = 'disabled';}
			$usedlogo = $this->pmjob_model->getusedlogo($getdoc->code, $getdoc->frec, $getdoc->tag);
			echo '<div class="box-body table-responsive no-padding">';
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
				$datexx = 1;
				foreach($doc as $record){
					if($record->tag == 1){$tagging = 'Electrical';}
					if($record->tag == 2){$tagging = 'Mechanical';}
					if($record->tag == 3){$tagging = 'Production';}
					if($record->frec == 1){$exefrec = 'Weekly';}
					if($record->frec == 2){$exefrec = 'Monthly';}
					if($datexx == 1){$date = date('d-m-Y', strtotime($record->timestamp));$datexx++;}
					$kop = '<table class="table" style="border: 1px solid black;">
								<tr>
									<td class="text-center" style="border: 1px solid black;"><b>EQUIPMENT NAME</b></td>
									<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
									<td style="border: 1px solid black;"><b>TAG: </b>'.$tagging.'</td>
									<td class="text-center" style="border: 1px solid black;" rowspan="3"><img src="'.base_url().'qrcode/'.$record->code.'" style="height:90px"/></td>
								</tr>
								<tr>
									<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->eq_name.'</b></td>
									<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->code.'</b></td>
									<td style="border: 1px solid black;"><b>RELEASE DATE: </b>['.$date.']</td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"><b>FREQUENCY: </b>'.$exefrec.'</td>
								</tr>
								<tr>
									<td class="text-center" colspan="4" style="border: 1px solid black;">
										<b>Picture:</b>
										<br>
										<img src="'.base_url().'assets/picture/'.$record->code.'.jpg" style="vertical-align: bottom;width:800px;height:200px;"  align="center" width="100%"></img>';
					$kop .= '<table class="table table-hover table-striped table-bordered">
											<tr>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
											</tr>';
					if(!empty($usedlogo)){
						$noa=0;
						foreach($usedlogo as $rec){
							$nob = $noa %10;
							if($nob == 0){$kop .= '<tr>';}else{$kop .= '';}
							$kop .=	'<td class="text-center" style="padding: 5;">
									<img src="'.base_url().'assets/dtdoc/opr/'.$rec->logo_link.'" width="100%">
									</br>
									<font size="1"><b>'.$rec->logo_name.'</b></font>
								</td>';
							if($nob == 9){$kop .= '</tr>';}else{$kop .= '';}
							$noa++;
						}
					}
					$kop .= '</table>';
								$kop .= '</td>
									</tr>
									</table>';
									
					if($kop != $kop2){echo $kop;}
					$head = '<table class="table table-hover table-striped table-bordered" >
						<tr>
							<th class="text-center" style="border: 1px solid black;">No</th>
							<th class="text-center" style="border: 1px solid black;">Condition</th>
							<th class="text-center" style="border: 1px solid black;">Standard</th>
							<th class="text-center" style="border: 1px solid black;">Answer Type</th>
							<th class="text-center" style="border: 1px solid black;">Linked Dev</th>
						</tr>';
					if($head != $head2){echo $head;}
					$titlex = '<td colspan="5" style="border: 1px solid black;"><b>'.$xxx.'. '.$record->title.'</b></td>';
					$title = $record->title;
					if($title != $title2){echo $titlex; $a=1;$xxx++;}
					if($record->type == 1){$input = '<input type="number" step="0.01" class="form-control input-sm" name="inputan['.$x.']"/>';}
					if($record->type == 2){$input = '
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1">YES</label>
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2">NO</label>';}
					if($record->type != 2 and $record->type != 1){$input = $record->type;}
					echo '
							<tr>
								<td class="text-center" style="border: 1px solid black;">'.$a.'</td>
								<td style="border: 1px solid black;">'.$record->cond.'</td>
								<td style="border: 1px solid black;">'.$record->stand;
					if($record->type == 1){
					echo '
						<span class="pull-right">
							<b>Min:</b>'.$record->min_val.' 
							<b>Max:</b>'.$record->max_val.' 
							<b>Unit:</b>'.$record->unit_val.'
						</span>';
					}
					echo '
								</td>
								<td style="border: 1px solid black;">'.$input.'</td>
								<td style="border: 1px solid black;">'.$record->dcode.'/'.$record->penum.'</td>
							</tr>';
								$head2 = $head;
								$kop2 = $kop;
								$title2 = $title;
								$a++;$x++;
								}
					echo '
							<tr>
								<td colspan="5" class="text-center">
									<a class="btn btn-info" href="'.base_url().'editdoc/'.$getdoc->code.'/'.$getdoc->frec.'/'.$getdoc->tag.'"><i class="fa fa-pencil"></i> Edit</a> | 
									<a class="btn btn-warning" href="'.base_url().'linkdoc/'.$getdoc->code.'/'.$getdoc->frec.'/'.$getdoc->tag.'"><i class="fa fa-link"></i> Link</a> | 
									<a class="btn btn-success" href="'.base_url().'logodoc/'.$getdoc->code.'/'.$getdoc->frec.'/'.$getdoc->tag.'"><i class="fa fa-file-image-o"></i> Logo</a> | 
									<a class="btn btn-primary" href="'.base_url().'copydoc/'.$getdoc->code.'/'.$getdoc->frec.'/'.$getdoc->tag.'" '.$doc3rdtag.'><i class="fa fa-copy"></i> Generate Prod Tag</a> | 
									<a class="btn btn-danger" href="'.base_url().'deldoc/'.$getdoc->code.'/'.$getdoc->frec.'/'.$getdoc->tag.'"><i class="fa fa-trash"></i> Delete</a>
								</td>
							</tr>';
						
							}
						
					echo '		
						</table>
					</div>';
		}
	}
	function test_array(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$time = gmdate('U');
			$time = $time - ($time % 86400);
			$id = $this->input->post('id[]');
			$inputan = $this->input->post('inputan[]');
			$code = $this->input->post('code');
			$freq = $this->input->post('freq');
			$tag = $this->input->post('tag');
			$x = 0;
			foreach($id as $result){
				if(!empty($inputan[$x])){$val = $inputan[$x];}
				else{$val = 0;}
				$pminfo = array(
					'rec_unix'=>$time,
					'code'=>$code,
					'freq'=>$freq,
					'tag'=>$tag,
					'form_id'=>$result,
					'input'=>$val,
					'user'=>$this->name
					);
				$dev = $this->pmjob_model->getpmparam($result);
				if(!empty($dev->opt) and !empty($val)){
					$devparam = array(
						'code'=>$dev->dcode,
						'param_id'=>$dev->opt,
						'in_value'=>$val,
						'pic'=>$this->name
					);
					$this->pmjob_model->submit_devparam($devparam);
				}
				$cek = $this->pmjob_model->cekpmtoday($time, $code, $result, $freq, $tag);
				if(!empty($cek)){
					$update = $this->pmjob_model->editpmtoday($pminfo, $time, $code, $result, $freq, $tag);
				}else{
					$newdat = $this->pmjob_model->addpmtoday($pminfo);
				}
				$x++;
			}
			redirect('checkdoc');
		}
	}
	function qrcode($code){
		$this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = base_url().'pmcode/'.$code;
		$this->ciqrcode->generate($params);
	}
	function pmqr(){
		$this->load->model('pmjob_model');
		$codes = $this->pmjob_model->getallcode();
		$tabel = '<table class="table" style="border: 1px solid black;">';
		if(!empty($codes)){
			$a = 0;
			foreach($codes as $result){
				if($a % 5 == 0){$tabel .= '<tr>';}
					$tabel .= '<td class="text-center" style="border: 1px solid black;" width="20%"><b>'.$result->eq_name.'</b><br><img src="'.base_url().'qrcode/'.$result->code.'" style="height:90px"/><br>'.$result->code.'</td>';
				//if($a % 7 == 0){$tabel .= '</tr>';}
				$a++;
			}
		}
		$tabel .= '</table>';
		$data['tabel'] = $tabel;
		$this->global['pageTitle'] = 'RAWR : PM QR';
		$this->loadViews("pmlist/pmqr", $this->global, $data, NULL);
	}
	function pmresult(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->pmjob_model->pmresultCount($searchText);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "pmresult/", $count, 10 );
		$data['pmresult'] = $this->pmjob_model->pmresult($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : PM Result';
		$this->loadViews("pmlist/pmresult", $this->global, $data, NULL);
	}
	function pmsheet_app($page = NULL, $tag = NULL){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		if(!empty($tag)){
			$tagging = $tag;
		}else{
			$tagging = $this->input->post('tagging');
		}
		$data['searchText'] = $searchText;
		$data['tagging'] = $tagging;
		$this->load->library('pagination');
		$count = $this->pmjob_model->getapppmCount($searchText, $tagging);
		$returns = $this->paginationCompress ( "pmsheet_app/", $count, 10 );
		$data['pmsheet_app'] = $this->pmjob_model->getapppm($searchText, $tagging, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : PM Sheet Approval';
		$this->loadViews("pmlist/pmsheet_app", $this->global, $data, NULL);
	}
	function pmappbox($id){
		$getdoc = $this->pmjob_model->getapppmbyid($id);
		$doc = $this->pmjob_model->getpmappbox($getdoc->code, $getdoc->freq, $getdoc->tag, $getdoc->rec_unix);
		$usedlogo = $this->pmjob_model->getusedlogo($getdoc->code, $getdoc->freq, $getdoc->tag);
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
			$FA='';
			$FB='';
			foreach($doc as $record){
				if($record->app == 0){$app = '<b>Waiting Approval</b>';};
				if($record->app == 1){$app = '<b>Approved by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate); };
				if($record->app == 2){$app = '<b>Rejected by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate); };
				if($record->app == 3){$app = '<b></b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate); };
				$kop = '
			<div class="box-body no-padding">
				<table class="table" style="border: 1px solid black;">
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>EQUIPMENT NAME</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>Submitted by.</b>'.$record->user.'/'.date('D d-m-Y', $record->rec_unix).'</td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;">'.$record->eq_name.'</td>
						<td class="text-center" style="border: 1px solid black;">'.$record->code.'</td>
						<td class="text-center" style="border: 1px solid black;">'.$app.'</td>
					</tr>
					<tr>
						<td class="text-center" colspan="3" style="border: 1px solid black;">
							<img src="'.base_url().'assets/picture/'.$record->code.'.jpg" style="vertical-align: bottom;"  align="center" width="100%"></img>';
				$kop .= '
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
								</tr>';
					if(!empty($usedlogo)){
						$noa=0;
						foreach($usedlogo as $rec){
							$nob = $noa %10;
							if($nob == 0){$kop .= '<tr>';}else{$kop .= '';}
							$kop .=	'<td class="text-center" style="padding: 5;">
									<img src="'.base_url().'assets/dtdoc/opr/'.$rec->logo_link.'" width="100%">
									</br>
									<font size="1"><b>'.$rec->logo_name.'</b></font>
								</td>';
							if($nob == 9){$kop .= '</tr>';}else{$kop .= '';}
							$noa++;
						}
					}
				$kop .= '</table>';
				$kop .= '</td>
					</tr>
				</table>
			</div>';
				if($kop != $kop2){echo $kop;}
				$head = '<div class="box-body no-padding"><table class="table table-hover table-striped table-bordered" >
					<tr>
						<th class="text-center" style="border: 1px solid black;">No</th>
						<th class="text-center" style="border: 1px solid black;">Condition</th>
						<th class="text-center" style="border: 1px solid black;">Standard</th>
						<th class="text-center" style="border: 1px solid black;">Answer_Type</th>
						<th class="text-center" style="border: 1px solid black;">Observe</th>
					</tr>';
				if($head != $head2){echo $head;}
				$title = '<td colspan="5" style="border: 1px solid black;"><font size="2"><b>'.$record->title.'</b></font></td>';
				if($title != $title2){echo $title; $a=1;}
				if($record->type == 1){$input = '<input type="number" class="form-control input-sm" step="0.01" name="inputan['.$x.']" value="'.$record->input.'" disabled/>';}
				if($record->type == 2){
					$radio1 = ''; $radio2 = '';
					if($record->input == 1){$radio1 = 'checked';}
					if($record->input == 2){$radio2 = 'checked';}
					$input = '
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1" '.$radio1.' disabled>YES</label>
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2" '.$radio2.' disabled>NO</label>';}
				if($record->type != 2 and $record->type != 1){$input = $record->type;}
	$LA='';
	$LB='';
	if($app = 3 and $record->type == 2 and $record->input == 2){$LA = '<font style="color:red;"><b>';$LB='</b></font>';}
	if($app = 3 and $record->type == 1 and ($record->input < $record->min_val or $record->input > $record->max_val)){$LA = '<font style="color:red;"><b>';$LB='</b></font>';}
	echo '
		<tr>
			<td class="text-center" style="border: 1px solid black;">'.$LA.' '.$a.' '.$LB.'</td>
			<td style="border: 1px solid black;">'.$LA.' '.$record->cond.' '.$LB.'</td>
			<td style="border: 1px solid black;">'.$LA.' '.$record->stand.' '.$LB.'
			';
			if($record->type == 1){	
	echo '  <span class="pull-right">'.$LA.' 
				<b>Min:</b>'.$record->min_val.' 
				<b>Max:</b>'.$record->max_val.' 
				<b>Unit:</b>'.$record->unit_val.' '.$LB.'
				</span>';
			}
	echo '</td>
			<td style="border: 1px solid black;">'.$LA.' '.$input.' '.$LB.'</td>
			<td class="text-center" style="border: 1px solid black;"><a href="'.base_url().'showtren/'.$record->form_id.'" class="btn btn-sm btn-success" target="_blank">Observe</a></td>
		</tr>';
			$head2 = $head;
			$kop2 = $kop;
			$title2 = $title;
			$a++;$x++;
			}
		}
	echo '
			</table>
		</div>
		<div class="box-body">
			<form action="'.base_url().'pmappit" method="POST">
				<button class="btn btn-success pull-right"><i class="fa fa-check"></i> Solved</button>
				<input type="hidden" name="rec_unix" value="'.$getdoc->rec_unix.'">
				<input type="hidden" name="code" value="'.$getdoc->code.'">
				<input type="hidden" name="freq" value="'.$getdoc->freq.'">
				<input type="hidden" name="tag" value="'.$getdoc->tag.'">
				<input type="hidden" name="user" value="'.$getdoc->user.'">
				<input type="hidden" name="act" value="1">
			</form>
		</div>
	';
	}
	function pmappit(){
		$tag = $this->input->post('tag');
		if(($this->usertype == 11 and $tag == 1) or ($this->usertype == 12 and $tag == 2) or ($this->usertype != 0 and $tag == 3)){
			$code = $this->input->post('code');
			$freq = $this->input->post('freq');
			$tag = $this->input->post('tag');
			$rec_unix = $this->input->post('rec_unix');
			$act = $this->input->post('act');
			$unix = date('U');
			$resultdata = array('app'=> $act, 'appname'=>$this->name, 'appdate'=>$unix);
			$this->pmjob_model->approvepmdoc($resultdata, $code, $freq, $tag, $rec_unix);
			redirect('pmsheet_app/0/'.$tag);
		}else{
			$this->loadThis();
		}
	}
	function showresult($segment = '', $codex = NULL, $tagx = NULL, $frecx = NULL, $unixx = ''){
		if(empty($codex)){$code = $this->input->post('code');}else{$code = $codex;}
		if(empty($tagx)){$tag = $this->input->post('tag');}else{$tag = $tagx;}
		if(empty($frecx)){$frec = $this->input->post('frec');}else{$frec = $frecx;}
		$data['code'] = $code;
		$data['tag'] = $tag;
		$data['frec'] = $frec;
		$this->load->library('pagination');
		$count = $this->pmjob_model->getalltimeCount($code, $tag, $frec);
		$returns = $this->paginationCompress ( "showresult/", $count, 10 );
		$data['alltime'] = $this->pmjob_model->getalltime($code, $tag, $frec, $returns["page"], $returns["segment"]);
		$data['first'] = $this->pmjob_model->getlast_res($code, $tag, $frec);
		$this->global['pageTitle'] = 'RAWR :'.$code;
		$this->loadViews("pmlist/showresult", $this->global, $data, NULL);
	}
	function pmresultbox($id){
		$getdoc = $this->pmjob_model->getapppmbyid($id);
		$doc = $this->pmjob_model->getpmappbox($getdoc->code, $getdoc->freq, $getdoc->tag, $getdoc->rec_unix);
		$usedlogo = $this->pmjob_model->getusedlogo($getdoc->code, $getdoc->freq, $getdoc->tag);
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
			$FA='';
			$FB='';
			foreach($doc as $record){
				if($record->app == 0){$app = '<b>Waiting Approval</b>';};
				if($record->app == 1){$app = '<b>Approved by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate);};
				if($record->app == 2){$app = '<b>Rejected by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate);};
				if($record->app == 3){$app = '<b>Rejected by.</b>'.$record->appname.'/'.date('Y-m-d H:i:s', $record->appdate);};
				$kop = '
			<div class="box-body no-padding">
				<table class="table" style="border: 1px solid black;">
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>EQUIPMENT NAME</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
						<td class="text-center" style="border: 1px solid black;"><b>Submitted by.</b>'.$record->user.'/'.date('D d-m-Y', $record->rec_unix).'</td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;">'.$record->eq_name.'</td>
						<td class="text-center" style="border: 1px solid black;">'.$record->code.'</td>
						<td class="text-center" style="border: 1px solid black;">'.$app.'</td>
					</tr>
					<tr>
						<td class="text-center" colspan="3" style="border: 1px solid black;">
							<img src="'.base_url().'assets/picture/'.$record->code.'.jpg" style="vertical-align: bottom;"  align="center" width="100%"></img>';
				$kop .= '
							<table class="table table-hover table-striped table-bordered">
								<tr>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
									<td class="text-center" width="10%" style="padding: 0;"></td>
								</tr>';
					if(!empty($usedlogo)){
						$noa=0;
						foreach($usedlogo as $rec){
							$nob = $noa %10;
							if($nob == 0){$kop .= '<tr>';}else{$kop .= '';}
							$kop .=	'<td class="text-center" style="padding: 5;">
									<img src="'.base_url().'assets/dtdoc/opr/'.$rec->logo_link.'" width="100%">
									</br>
									<font size="1"><b>'.$rec->logo_name.'</b></font>
								</td>';
							if($nob == 9){$kop .= '</tr>';}else{$kop .= '';}
							$noa++;
						}
					}
				$kop .= '</table>';
				$kop .= '</td>
					</tr>
				</table>
			</div>';
				if($kop != $kop2){echo $kop;}
				$head = '<div class="box-body no-padding"><table class="table table-hover table-striped table-bordered" >
					<tr>
						<th class="text-center" style="border: 1px solid black;">No</th>
						<th class="text-center" style="border: 1px solid black;">Condition</th>
						<th class="text-center" style="border: 1px solid black;">Standard</th>
						<th class="text-center" style="border: 1px solid black;">Answer_Type</th>
						<th class="text-center" style="border: 1px solid black;">Observe</th>
					</tr>';
				if($head != $head2){echo $head;}
				$title = '<td colspan="5" style="border: 1px solid black;"><font size="2"><b>'.$record->title.'</b></font></td>';
				if($title != $title2){echo $title; $a=1;}
				if($record->type == 1){$input = '<input type="number" class="form-control input-sm" step="0.01" name="inputan['.$x.']" value="'.$record->input.'" disabled/>';}
				if($record->type == 2){
					$radio1 = ''; $radio2 = '';
					if($record->input == 1){$radio1 = 'checked';}
					if($record->input == 2){$radio2 = 'checked';}
					$input = '
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1" '.$radio1.' disabled>YES</label>
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2" '.$radio2.' disabled>NO</label>';}
				if($record->type != 2 and $record->type != 1){$input = $record->type;}
	$LA='';
	$LB='';
	if($app = 3 and $record->type == 2 and $record->input == 2){$LA = '<font style="color:red;"><b>';$LB='</b></font>';}
	if($app = 3 and $record->type == 1 and ($record->input < $record->min_val or $record->input > $record->max_val)){$LA = '<font style="color:red;"><b>';$LB='</b></font>';}
	echo '
		<tr>
			<td class="text-center" style="border: 1px solid black;">'.$LA.' '.$a.' '.$LB.'</td>
			<td style="border: 1px solid black;">'.$LA.' '.$record->cond.' '.$LB.'</td>
			<td style="border: 1px solid black;">'.$LA.' '.$record->stand.' '.$LB.'
			';
			if($record->type == 1){	
	echo '  <span class="pull-right">'.$LA.'
				<b>Min:</b>'.$record->min_val.' 
				<b>Max:</b>'.$record->max_val.' 
				<b>Unit:</b>'.$record->unit_val.' '.$LB.'
				</span>';
			}
	echo '</td>
			<td style="border: 1px solid black;">'.$LA.' '.$input.' '.$LB.'</td>
			<td class="text-center" style="border: 1px solid black;"><a href="'.base_url().'showtren/'.$record->form_id.'" class="btn btn-sm btn-success" target="_blank">Observe</a></td>
		</tr>';
			$head2 = $head;
			$kop2 = $kop;
			$title2 = $title;
			$a++;$x++;
			}
		}
	echo '
			</table>
		</div>
	';
	}
	function showtren($id){
		$data['title'] = $this->pmjob_model->getformrespmbyid($id);
		$data['titlex'] = $this->pmjob_model->getformnamebyid($id);
		$getdata = $this->pmjob_model->showtren($id);
		$value = '';
		if(!empty($getdata)){
			foreach($getdata as $record){
				$ox = date('U', strtotime($record->timestamp));
				$o_x = $ox*1000;
				$value .='{x:'.$o_x;
				$value .=',y:'.$record->input;
				$value .='}, ';
			}
		}
		$data['value'] = substr($value, 0, -2);
		$this->global['pageTitle'] = 'RAWR :'.$data['titlex']->eq_name.'/'.$data['titlex']->cond;
		$this->loadViews("pmlist/showtren", $this->global, $data, NULL);
	}
	function logodoc($code, $freq, $tag){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$data['doc'] = '';
			$data['doc'] = $this->pmjob_model->getdoc($code, $freq, $tag);
			$data['xcodex'] = $code;
			$data['xfreqx'] = $freq;
			$data['xtagx'] = $tag;
			$data['logolist'] = $this->pmjob_model->getlogolist();
			$data['usedlogo'] = $this->pmjob_model->getusedlogo($code, $freq, $tag);
			$this->global['pageTitle'] = 'RAWR :'.$code;
			$this->loadViews("pmlist/logodoc", $this->global, $data, NULL);
		}
	}
	function pmaddlogo(){
		$xcodex = $this->input->post('xcodex');
		$xfreqx = $this->input->post('xfreqx');
		$xtagx = $this->input->post('xtagx');
		$ppe_id = $this->input->post('ppe_id');
		$newlogo = array('code'=> $xcodex, 'freq'=>$xfreqx, 'tag'=>$xtagx, 'logo_id'=>$ppe_id);
		$this->pmjob_model->addnewlogo($newlogo);
		redirect('logodoc/'.$xcodex.'/'.$xfreqx.'/'.$xtagx);
	}
	function pmdellogo($id){
		$xcodex = $this->input->post('xcodex');
		$xfreqx = $this->input->post('xfreqx');
		$xtagx = $this->input->post('xtagx');
		$newlogo = array('isvalid'=> 0);
		$this->pmjob_model->editlogo($newlogo, $id);
		redirect('logodoc/'.$xcodex.'/'.$xfreqx.'/'.$xtagx);
	}
	function editdoc($code, $freq, $tag){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$data['unitlist'] = $this->pmjob_model->getunit($code, $freq, $tag);
			$data['doc'] = '';
			$data['doc'] = $this->pmjob_model->getdoc($code, $freq, $tag);
			$this->global['pageTitle'] = 'RAWR :'.$code;
			$this->loadViews("pmlist/editdoc", $this->global, $data, NULL);
		}
	}
	function editform1(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
			$frec = $this->input->post('frec');
			$tag = $this->input->post('tag');
			$cond = $this->input->post('cond');
			$stand = $this->input->post('stand');
			$type = $this->input->post('type');
			$min_val = $this->input->post('min_val');
			$max_val = $this->input->post('max_val');
			$unit_val = $this->input->post('unit_val');
			$id = $this->input->post('id');
			$forminfo = array(
					'cond'=>$cond,
					'stand'=>$stand,
					'type'=>$type,
					'min_val'=>$min_val,
					'max_val'=>$max_val,
					'unit_val'=>$unit_val
				);
			$result = $this->pmjob_model->editform1($forminfo, $id);
			redirect('editdoc/'.$code.'/'.$frec.'/'.$tag);
		}
	}
	function delform1(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
			$frec = $this->input->post('frec');
			$tag = $this->input->post('tag');
			$id = $this->input->post('id');
			$forminfo = array('isvalid'=>0);
			$result = $this->pmjob_model->editform1($forminfo, $id);
			redirect('editdoc/'.$code.'/'.$frec.'/'.$tag);
		}
	}
	function editform2(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
			$frec = $this->input->post('frec');
			$tag = $this->input->post('tag');
			$title = $this->input->post('title');
			$otitle = $this->input->post('otitle');
			$forminfo = array('title'=>$title);
			$result = $this->pmjob_model->editform2($forminfo, $code, $frec, $tag, $otitle);
			redirect('editdoc/'.$code.'/'.$frec.'/'.$tag);
		}
	}
	function addform1(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
			$frec = $this->input->post('frec');
			$tag = $this->input->post('tag');
			$cond = $this->input->post('cond');
			$stand = $this->input->post('stand');
			$type = $this->input->post('type');
			$eq_name = $this->input->post('eq_name');
			$title = $this->input->post('title');
			$pic = $this->input->post('pic');
			$forminfo = array(
					'code'=>$code,
					'frec'=>$frec,
					'tag'=>$tag,
					'cond'=>$cond,
					'stand'=>$stand,
					'type'=>$type,
					'eq_name'=>$eq_name,
					'title'=>$title,
					'pic'=>$pic
				);
			$result = $this->pmjob_model->addform1($forminfo);
			redirect('editdoc/'.$code.'/'.$frec.'/'.$tag);
		}
	}
	function addrow(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
			$frec = $this->input->post('frec');
			$tag = $this->input->post('tag');
			$cond = $this->input->post('cond');
			$stand = $this->input->post('stand');
			$type = $this->input->post('type');
			$eq_name = $this->input->post('eq_name');
			$title = $this->input->post('title');
			$pic = $this->input->post('pic');
			$forminfo = array(
					'code'=>$code,
					'frec'=>$frec,
					'tag'=>$tag,
					'cond'=>$cond,
					'stand'=>$stand,
					'type'=>$type,
					'eq_name'=>$eq_name,
					'title'=>$title,
					'pic'=>$pic
				);
			$result = $this->pmjob_model->addform1($forminfo);
			redirect('editdoc/'.$code.'/'.$frec.'/'.$tag);
		}
	}
	function newdoc(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$area = $this->input->post('area');
			$dev = $this->input->post('dev');
			$data['newcode'] = '';
			if(!empty($dev)){
				$count = $this->pmjob_model->getcodecount('-'.$dev.'-');
				if(empty($count)){
					$data['prefix'] = $this->pmjob_model->getcodecount('-'.$dev.'-01');
					$data['newcode'] = $area.'-'.$dev.'-01';
				}elseif($count < 9){
					$count = $count + 1;
					$data['prefix'] = $this->pmjob_model->getcodecount('-'.$dev.'-0'.$count);
					$data['newcode'] = $area.'-'.$dev.'-0'.$count;
				}elseif($count >= 9){
					$count = $count + 1;
					$data['prefix'] = $this->pmjob_model->getcodecount('-'.$dev.'-'.$count);
					$data['newcode'] = $area.'-'.$dev.'-'.$count;
				}
			}
			$data['codearea'] = $this->pmjob_model->getcodearea();
			$data['codedev'] = $this->pmjob_model->getcodedev();
			$this->global['pageTitle'] = 'RAWR : New PM Doc';
			$this->loadViews("pmlist/newdoc", $this->global, $data, NULL);
		}
	}
	function createdoc(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('newcode');
			$cond = 'Default';
			$stand = 'Default';
			$type = 1;
			$eq_name = $this->input->post('eq_name');
			$title = 'Default';
			$pic = '';
			$forminfo = array(
					'code'=>$code,
					'frec'=>1,
					'tag'=>1,
					'cond'=>$cond,
					'stand'=>$stand,
					'type'=>$type,
					'eq_name'=>$eq_name,
					'title'=>$title,
					'pic'=>$pic
				);
			$result = $this->pmjob_model->addform1($forminfo);
			$forminfo = array(
					'code'=>$code,
					'frec'=>1,
					'tag'=>2,
					'cond'=>$cond,
					'stand'=>$stand,
					'type'=>$type,
					'eq_name'=>$eq_name,
					'title'=>$title,
					'pic'=>$pic
				);
			$result = $this->pmjob_model->addform1($forminfo);
			$forminfo = array(
					'code'=>$code,
					'frec'=>2,
					'tag'=>1,
					'cond'=>$cond,
					'stand'=>$stand,
					'type'=>$type,
					'eq_name'=>$eq_name,
					'title'=>$title,
					'pic'=>$pic
				);
			$result = $this->pmjob_model->addform1($forminfo);
			$forminfo = array(
					'code'=>$code,
					'frec'=>2,
					'tag'=>2,
					'cond'=>$cond,
					'stand'=>$stand,
					'type'=>$type,
					'eq_name'=>$eq_name,
					'title'=>$title,
					'pic'=>$pic
				);
			$result = $this->pmjob_model->addform1($forminfo);
			redirect('editdoc/'.$code.'/1/1');
		}
	}
	function codedoc(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->pmjob_model->getpmcodeCount($searchText);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "codedoc/", $count, 10 );
		$data['codedoc'] = $this->pmjob_model->getpmcode($searchText, $returns["page"], $returns["segment"]);
		$data['codearea'] = $this->pmjob_model->getcodearea();
		$this->global['pageTitle'] = 'RAWR : Doc Coding';
		$this->loadViews("pmlist/codedoc", $this->global, $data, NULL);
	}
	function adddevcode(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$code = $this->input->post('code');
			$code = strtoupper($code);
			$note = $this->input->post('note');
			$cekcode = $this->pmjob_model->cekdevcode($code);
			if(!empty($cekcode)){
				redirect('codedocx');
			}else{
				$newcode = array(
						'code'=>$code,
						'note'=>$note,
						'type'=>2
					);
				$this->pmjob_model->adddevcode($newcode);
				redirect('codedoc');
			}
		}
	}
	function editdevcode(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$note = $this->input->post('note');
			$newcode = array(
					'note'=>$note
				);
			$this->pmjob_model->editdevcode($newcode, $id);
			redirect('codedoc');
		}
	}
	function codedocx(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$data['alarm'] = 'Code has been used, please choose different code';
		$this->load->library('pagination');
		$count = $this->pmjob_model->getpmcodeCount($searchText);
		$returns = $this->paginationCompress ( "codedoc/", $count, 10 );
		$data['codedoc'] = $this->pmjob_model->getpmcode($searchText, $returns["page"], $returns["segment"]);
		$data['codearea'] = $this->pmjob_model->getcodearea();
		$this->global['pageTitle'] = 'RAWR : Doc Coding';
		$this->loadViews("pmlist/codedoc", $this->global, $data, NULL);
	}
	function linkdoc($code, $freq, $tag){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$data['doc'] = '';
			$data['doc'] = $this->pmjob_model->getdoc($code, $freq, $tag);
			$this->global['pageTitle'] = 'RAWR :'.$code;
			$this->loadViews("pmlist/linkdoc", $this->global, $data, NULL);
		}
	}
	function getpmparam($id){
		$form = $this->pmjob_model->getpmparam($id);
		$devlist = $this->pmjob_model->alldevlist();
		$a = 'Link device from ';
		$a .= 'Device name(form): '.$form->title.' and ';
		$a .= 'Condition/Standard: '.$form->cond.'/'.$form->stand;
		$a .= ', Current Link: '.$form->dcode.'/'.$form->penum.' to ';
		$a .= '<b>New Device:</b>
					<form role="form" id="adddevice" action="'.base_url().'setnewdevice" method="post" role="form">
						<div class="form-group form-group-sm col-md-10">
							<select id="new_dev" name="new_dev" class="form-control" required>
								<option value=""></option>';
		if(!empty($devlist)){
			foreach($devlist as $record){
				$a .= '<option value="'.$record->code.'"';
				if($record->code == $form->dcode){$a .='selected';}
				$a .= '>['.$record->code.'] '.$record->pos.'/'.$record->usage.'/'.$record->param1.'</option>';
			}
		}
		$a .= '</select>
						</div>
						<div class="form-group form-group-sm col-md-2">
							<input type="hidden" name="id" value="'.$id.'">
							<input type="hidden" name="code" value="'.$form->code.'">
							<input type="hidden" name="freq" value="'.$form->frec.'">
							<input type="hidden" name="tag" value="'.$form->tag.'">
							<input type="submit" class="btn btn-success btn-sm btn-block" value="Set Device">
						</div>
					</form>';
		$a .= '<script>';
		$a .= '$("#new_dev").select2({
			placeholder: "Select Class"
		});';
		$a .= '</script>';
		
		echo $a;
	}
	function getpmparam2($id){
		$form = $this->pmjob_model->getpmparam($id);
		$dev = explode(' ', $form->dcode);
		$paramlist = $this->pmjob_model->paramlist($dev[0]);
		$a = 'Set parameter ';
		$a .= 'Device: '.$form->dcode;
		$a .= '<b>, New Parameter:</b>
					<form role="form" id="adddevice" action="'.base_url().'setnewparam" method="post" role="form">
						<div class="form-group form-group-sm col-md-10">
							<select id="new_param" name="new_param" class="form-control" required>
								<option value=""></option>';
		if(!empty($paramlist)){
			foreach($paramlist as $record){
				$a .= '<option value="'.$record->id.'yy00yy'.$record->param.'"';
				if($record->id == $form->opt){$a .='selected';}
				$a .= '>'.$record->param.'</option>';
			}
		}
		$a .= '</select>
						</div>
						<div class="form-group form-group-sm col-md-2">
							<input type="hidden" name="id" value="'.$id.'">
							<input type="hidden" name="code" value="'.$form->code.'">
							<input type="hidden" name="freq" value="'.$form->frec.'">
							<input type="hidden" name="tag" value="'.$form->tag.'">
							<input type="submit" class="btn btn-success btn-sm btn-block" value="Set Parameter">
						</div>
					</form>';
		$a .= '<script>';
		$a .= '$("#new_param").select2({
			placeholder: "Select Parameter"
		});';
		$a .= '</script>';
		echo $a;
	}
	function setnewdevice(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$new_dev = $this->input->post('new_dev');
			$code = $this->input->post('code');
			$freq = $this->input->post('freq');
			$tag = $this->input->post('tag');
			$forminfo = array(
					'dcode'=>$new_dev,
					'penum'=>'',
					'opt'=>''
				);
			$this->pmjob_model->editform1($forminfo, $id);
			redirect('linkdoc/'.$code.'/'.$freq.'/'.$tag);
		}
	}
	function setnewparam(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$new_param = $this->input->post('new_param');
			$param = explode('yy00yy', $new_param);
			$code = $this->input->post('code');
			$freq = $this->input->post('freq');
			$tag = $this->input->post('tag');
			$forminfo = array(
					'penum'=>$param[1],
					'opt'=>$param[0]
				);
			$this->pmjob_model->editform1($forminfo, $id);
			redirect('linkdoc/'.$code.'/'.$freq.'/'.$tag);
		}
	}
	function picsetting(){
		$data['users'] = $this->pmjob_model->getusers();
		$data['area'] = $this->pmjob_model->getarea();
		$data['piclist'] = $this->pmjob_model->getpiclist();
		$data['picmode'] = $this->pmjob_model->getpicmode();
		$this->global['pageTitle'] = 'RAWR : PIC Setting';
		$this->loadViews("pmlist/picsetting", $this->global, $data, NULL);
	}
	function changepicmode(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$area = $this->input->post('area');
			$modeinfo = array('area'=>$area);
			$this->pmjob_model->updatemode($modeinfo);
			redirect('picsetting');
		}
	}
	function addpicsetting(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$users = $this->input->post('users');
			$area = $this->input->post('area');
			$area_a = explode('bb00bb', $area);
			$tag = $this->input->post('tag');
			$picinfo = array(
					'uName'=>$users,
					'code'=>$area_a[0],
					'area'=>$area_a[1],
					'tag'=>$tag
				);
			$this->pmjob_model->addpicsetting($picinfo);
			redirect('picsetting');
		}
	}
	function delpicsetting(){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$id = $this->input->post('id');
			$picinfo = array('isvalid'=>0);
			$this->pmjob_model->delpicsetting($picinfo, $id);
			redirect('picsetting');
		}
	}
	function mypm(){
		$user = $this->name;
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$unix2 = $unix + 86400;
		$data['user'] = $this->name;
		$picmode = $this->pmjob_model->getpicmode();
		
		$count = $this->pmjob_model->mypmcount($user, $unix, $unix2);
		
		if($picmode->area == 1){
			$data['count'] = $this->pmjob_model->mypmcount($user, $unix, $unix2);
			$data['mypm'] = $this->pmjob_model->mypm($user, $unix, $unix2);
		}else{
			$data['count'] = $this->pmjob_model->mypmcount2($user, $unix, $unix2);
			$data['mypm'] = $this->pmjob_model->mypm2($user, $unix, $unix2);
		}
		
		$data['total'] = $count;
		
		$this->global['pageTitle'] = 'RAWR : My PM';
		$this->loadViews("pmlist/mypm", $this->global, $data, NULL);
	}
	function pmformlist($id){
		$form = $this->pmjob_model->getformlist($id);
		$formlist = '<b>Form(s): </b><br>';
		$a = 1;
		$rec_unix = date('U');
		$rec_unix = $rec_unix - ($rec_unix % 86400);
		if(!empty($form)){
			foreach($form as $record){
				$label = '<span class="label label-danger">[in progress]</span>';
				$status = $this->pmjob_model->getresultof($rec_unix, $record->code, $record->tag, $record->type);
				if(!empty($status)){
					if($status->app == 1){
						$label = '<span class="label label-success">[Approved]</span>';
					}elseif($status->app == 2){
						$label = '<span class="label label-warning">[Rejected]</span>';
					}elseif($status->app == 0){
						$label = '<span class="label label-primary">[Submitted]</span>';
					}
				}
				$formlist .= $a.'. '.$record->code.'['.$record->eq_name.']'.$label.'<br>';
				$a++;
			}
			$formlist = substr($formlist, 0,-2);
		}else{
			$formlist .= 'no data';
		}
		echo $formlist;
	}
	function pmsummary(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->pmjob_model->getpmsummaryCount($searchText);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "pmsummary/", $count, 10 );
		$data['pmsummary'] = $this->pmjob_model->getpmsummary($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : PM Summary';
		$this->loadViews("pmlist/pmsummary", $this->global, $data, NULL);
    }
	function chartlist($code,$tag, $frec){
		$num = $this->pmjob_model->getalltimeCount($code,$tag, $frec);
		if($num >= 10){$num = 10;}
		$chart = '
			<div class="progress">
				<div class="progress-bar" style="width: '.$num.'0%"></div><span> '.$num.' Records</span>
			</div>';
		echo $chart;
	}
	function pmtoday(){
		$fromDate = $this->input->post('fromDate');
		$data['fromDate'] = $fromDate;
		if(empty($fromDate)){
			$unix = date('U');
			$unix = $unix - ($unix % 86400) - 25200;
			$unix2 = $unix + 86400;
		}else{
			$unix = date('U', strtotime($fromDate));
			$unix2 = $unix + 86400;
		}
		$this->load->library('pagination');
		$count = $this->pmjob_model->pmtodayCount($unix, $unix2);
		$returns = $this->paginationCompress ( "pmtoday/", $count, 10 );
		$data['pmtoday'] = $this->pmjob_model->pmtoday($unix, $unix2, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : PM Today';
		$this->loadViews("pmlist/pmtoday", $this->global, $data, NULL);
	}
	function picarea($area, $tag, $id){
		$picmode = $this->pmjob_model->getpicmode();
		if($picmode->area == 1){
			$getpic = $this->pmjob_model->getpicarea($area, $tag);
		}else{
			$getpic = $this->pmjob_model->getpicpm($id);
		}
		$rr = '';
		if(!empty($getpic)){
			foreach($getpic as $pic){
				$rr .= $pic->uName.'<br>';
			}
		}else{
			$rr = 'Please set PIC first';
		}
		echo $rr;
	}
	function resultof($code, $tag, $frec){
		$unix = date('U');
		$unix = $unix - ($unix % 86400);
		$getresult = $this->pmjob_model->getresultof($unix, $code, $tag, $frec);
		if(!empty($getresult)){
			echo '<a href="'.base_url().'showresult/'.$code.'/'.$tag.'/'.$frec.'" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Check Result</a>';
		}else{
			echo '<span class="label label-danger">Maybe in progress?</span>';
		}
	}
	function pmprogcount(){
		$unix = date('U');
		$unix = $unix - ($unix % 86400);
		$unix1 = $unix - 25200;
		$unix2 = $unix1 + 86400;
		$getpm = $this->pmjob_model->pmprogtoday($unix1, $unix2);
		$a = 0;
		if(!empty($getpm)){
			foreach($getpm as $rec){
				$getresult = $this->pmjob_model->getresultof($unix, $rec->code, $rec->tag, $rec->type);
				if(!empty($getresult)){
					$a++;
				}
			}
		}else{
			$a = 0;
		}
		echo $a;
	}
	function pmprogcountx(){
		$unix = date('U');
		$unix = $unix - ($unix % 86400);
		$unix1 = $unix - 25200;
		$unix2 = $unix1 + 86400;
		$getpm1 = $this->pmjob_model->pmprogtodaytag(1, $unix1, $unix2);
		$getpm2 = $this->pmjob_model->pmprogtodaytag(2, $unix1, $unix2);
		$a = 0;
		$b = 0;
		$c = 0;
		$d = 0;
		if(!empty($getpm1)){
			foreach($getpm1 as $rec){
				$getresult = $this->pmjob_model->getresultof($unix, $rec->code, $rec->tag, $rec->type);
				$b++;
				if(!empty($getresult)){
					$a++;
				}
			}
		}else{
			$a = 0;
		}
		if(!empty($getpm2)){
			foreach($getpm2 as $rec2){
				$getresult = $this->pmjob_model->getresultof($unix, $rec2->code, $rec2->tag, $rec2->type);
				$d++;
				if(!empty($getresult)){
					$c++;
				}
			}
		}else{
			$c = 0;
		}
		if($b == 0){ $a=1;$b=1;}
		if($d == 0){ $c=1;$d=1;}
		echo '
			<div class="col-sm-2 col-xs-6">
				<div class="description-block border-right">
					<span class="description-percentage text-black"><i class="fa fa-bolt"></i> Electrical</span>
					<h5 class="description-header">'.$a.'/'.$b.'<br>'.number_format((($a/$b)*100), 2, ',', '.').' <small>%</small></h5>
				</div>
			</div>
			<div class="col-sm-2 col-xs-6">
				<div class="description-block border-right">
					<span class="description-percentage text-black"><i class="fa fa-wrench"></i> Mechanical</span>
					<h5 class="description-header">'.$c.'/'.$d.'<br>'.number_format((($c/$d)*100), 2, ',', '.').' <small>%</small></h5>
				</div>
			</div>';
	}
	function pmnowtable(){
		$unix = date('U');
		$unix = $unix - ($unix % 86400) - 25200;
		$unix2 = $unix + 86400;
		$pm = $this->pmjob_model->pmtoday($unix, $unix2, 0, 0);
		$table = '';
		if(!empty($pm)){
			$table = '
			<table class="table table-hover table-striped taable-bordered">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Code</th>
					<th class="text-center">Machine Name</th>
					<th class="text-center">PIC</th>
					<th class="text-center">Check</th>
				</tr>';
			$a = 1;
			foreach($pm as $record){
				$table .='
					<tr>
						<td class="text-center"  width="5%">'.$a.'</td>
						<td class="text-center"  width="15%">';
				if($record->tag == 1 and $record->type == 1){ $table .= '<span class="label label-success">Electrical(W)</span><br>';}
				if($record->tag == 1 and $record->type == 2){ $table .= '<span class="label label-warning">Electrical(M)</span><br>';}
				if($record->tag == 2 and $record->type == 1){ $table .= '<span class="label label-primary">Mechanical(W)</span><br>';}
				if($record->tag == 2 and $record->type == 2){ $table .= '<span class="label label-danger">Mechanical(M)</span><br>';}
				$table .= '['.$record->code.']';
				$table .= '
						</td>
						<td class="text-center" width="30%">'.$record->eq_name.'</td>
						<td class="text-center" width="40%">';
				
				$picmode = $this->pmjob_model->getpicmode();
				if($picmode->area == 1){
					$getpic = $this->pmjob_model->getpicarea($record->area, $record->tag);
				}else{
					$getpic = $this->pmjob_model->getpicpm($record->id);
				}
				if(!empty($getpic)){
					foreach($getpic as $pic){
						$table .= $pic->uName.'<br>';
					}
				}else{
					$table .= 'Please set PIC first';
				}
				$table .='
						</td>
							<td class="text-center" width="10%">';
				$time = $unix+25200;
				$getresult = $this->pmjob_model->getresultof($time, $record->code, $record->tag, $record->type);
				if(!empty($getresult)){
					$table .= '<a href="'.base_url().'showresult/0/'.$record->code.'/'.$record->tag.'/'.$record->type.'" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Check Result</a>';
				}else{
					$table .= '<span class="label label-danger">Maybe in progress?</span>';
				}
				$table .= '
						</td>
					</tr>';
				$a++;
			}
			$table .= '</table>';
		}
		echo $table;
	}
	function pmskipped(){
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		if(!empty($fromDate)){
			$fromDate = date('U', strtotime($fromDate));
			$fromDate = $fromDate + 25200;
		}
		if(!empty($toDate)){
			$toDate = date('U', strtotime($toDate));
			$toDate = $toDate + 25200;
		}
		$count = $this->pmjob_model->pmskippedCount($searchText, $fromDate, $toDate);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "pmskipped/", $count, 10 );
		$data['pmskipped'] = $this->pmjob_model->pmskipped($searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Skipped PM';
		$this->loadViews("pmlist/pmskipped", $this->global, $data, NULL);
	}
	function pmpiclist($id){
		$part = $this->pmjob_model->getpicpm($id);
		$partlist = '<b>PIC(s): </b>';
		if(!empty($part)){
			foreach($part as $record){
				$partlist .= $record->pic.', ';
			}
			$partlist = substr($partlist, 0,-2);
		}else{
			$partlist .= 'no data';
		}
		echo $partlist;
	}
	function notif3(){
		if($this->usertype == 11){$tagging = 1;}
		if($this->usertype == 12){$tagging = 2;}
		if($this->usertype != 11 and $this->usertype != 12){$tagging = 99;}
		$notif3 = $this->pmjob_model->getapppmCount('', $tagging);
		echo $notif3;
	}
	function notif7(){
		$user = $this->name;
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$unix2 = $unix + 86400;
		$data['user'] = $this->name;
		$picmode = $this->pmjob_model->getpicmode();
		if($picmode->area == 1){
			$notif7 = $this->pmjob_model->mypmcount($user, $unix, $unix2);
		}else{
			$notif7 = $this->pmjob_model->mypmcount2($user, $unix, $unix2);
		}
		echo $notif7;
	}
	function copydoc($code, $freq, $tag){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$doc = $this->pmjob_model->getdoc($code, $freq, $tag);
			if(!empty($doc)){
				foreach($doc as $rec){
					$newdoc = array(
							'code'=>$rec->code,
							'frec'=>$rec->frec,
							'tag'=>3,
							'eq_name'=>$rec->eq_name,
							'pic'=>$rec->pic,
							'title'=>$rec->title,
							'cond'=>$rec->cond,
							'stand'=>$rec->stand,
							'min_val'=>$rec->min_val,
							'max_val'=>$rec->max_val,
							'unit_val'=>$rec->unit_val,
							'type'=>$rec->type,
							'dcode'=>$rec->dcode,
							'penum'=>$rec->penum,
							'opt'=>$rec->opt
						);
					$this->pmjob_model->addform1($newdoc);
				}
			}
			redirect('editdoc/'.$code.'/'.$freq.'/'.$tag);
		}
	}
	function deldoc($code, $freq, $tag){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$data['code'] = $code;
			$data['freq'] = $freq;
			$data['tag'] = $tag;
			$this->load->view('pmlist/deletePM', $data);
		}
	}
	function deldoc_exe($code, $freq, $tag){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$doc = $this->pmjob_model->getdoc($code, $freq, $tag);
			if(!empty($doc)){
				foreach($doc as $rec){
					$forminfo = array( 'isvalid'=>$rec->code);
					$this->pmjob_model->editform1($forminfo, $rec->id);
				}
			}
			redirect('checkdoc');
		}
	}
	function importdoc($code, $freq, $tag){
		$data['code'] = $code;
		$data['frec'] = $freq;
		$data['tag'] = $tag;
		$data['allpm'] = $this->pmjob_model->getallpmcode();
		$data['import'] = '';
		$data['importcode'] = '';
		$importcode = $this->input->post('importcode');
		if(!empty($importcode)){
			$data['importcode'] = $importcode;
			$data['import'] = $this->pmjob_model->getsubchildcode($importcode);
		}
		$this->global['pageTitle'] = 'RAWR : Import PM Document';
		$this->loadViews("pmlist/importdoc", $this->global, $data, NULL);
	}
	function pmimport($id, $xxcode, $xxfrec, $xxtag){
		$getdoc = $this->pmjob_model->getpmparam($id);
		if(!empty($getdoc)){
			$doc = $this->pmjob_model->getdoc($getdoc->code, $getdoc->frec, $getdoc->tag);
			$get3rdtag = $this->pmjob_model->getdoc($getdoc->code, $getdoc->frec, 3);
			$doc3rdtag = '';
			if(!empty($get3rdtag)){$doc3rdtag = 'disabled';}
			$usedlogo = $this->pmjob_model->getusedlogo($getdoc->code, $getdoc->frec, $getdoc->tag);
			echo '<div class="box-body table-responsive no-padding">';
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
					if($record->tag == 1){$tagging = 'Electrical';}
					if($record->tag == 2){$tagging = 'Mechanical';}
					if($record->tag == 3){$tagging = 'Production';}
					if($record->frec == 1){$exefrec = 'Weekly';}
					if($record->frec == 2){$exefrec = 'Monthly';}
					$kop = '<table class="table" style="border: 1px solid black;">
								<tr>
									<td class="text-center" style="border: 1px solid black;"><b>EQUIPMENT NAME</b></td>
									<td class="text-center" style="border: 1px solid black;"><b>CODE</b></td>
									<td style="border: 1px solid black;"><b>TAG: </b>'.$tagging.'</td>
									<td class="text-center" style="border: 1px solid black;" rowspan="3"><img src="'.base_url().'qrcode/'.$record->code.'" style="height:90px"/></td>
								</tr>
								<tr>
									<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->eq_name.'</b></td>
									<td class="text-center" rowspan="2" style="border: 1px solid black;"><b>'.$record->code.'</b></td>
									<td style="border: 1px solid black;"><b>RELEASE DATE: </b>['.date('d-m-Y', strtotime($record->timestamp)).']</td>
								</tr>
								<tr>
									<td style="border: 1px solid black;"><b>FREQUENCY: </b>'.$exefrec.'</td>
								</tr>
								<tr>
									<td class="text-center" colspan="4" style="border: 1px solid black;">
										<b>Picture:</b>
										<br>
										<img src="'.base_url().'assets/picture/'.$record->code.'.jpg" style="vertical-align: bottom;width:800px;height:200px;"  align="center" width="100%"></img>';
					$kop .= '<table class="table table-hover table-striped table-bordered">
											<tr>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
												<td class="text-center" width="10%" style="padding: 0;"></td>
											</tr>';
					if(!empty($usedlogo)){
						$noa=0;
						foreach($usedlogo as $rec){
							$nob = $noa %10;
							if($nob == 0){$kop .= '<tr>';}else{$kop .= '';}
							$kop .=	'<td class="text-center" style="padding: 5;">
									<img src="'.base_url().'assets/dtdoc/opr/'.$rec->logo_link.'" width="100%">
									</br>
									<font size="1"><b>'.$rec->logo_name.'</b></font>
								</td>';
							if($nob == 9){$kop .= '</tr>';}else{$kop .= '';}
							$noa++;
						}
					}
					$kop .= '</table>';
								$kop .= '</td>
									</tr>
									</table>';
									
					if($kop != $kop2){echo $kop;}
					$head = '<table class="table table-hover table-striped table-bordered" >
						<tr>
							<th class="text-center" style="border: 1px solid black;">No</th>
							<th class="text-center" style="border: 1px solid black;">Condition</th>
							<th class="text-center" style="border: 1px solid black;">Standard</th>
							<th class="text-center" style="border: 1px solid black;">Answer Type</th>
							<th class="text-center" style="border: 1px solid black;">Linked Dev</th>
						</tr>';
					if($head != $head2){echo $head;}
					$titlex = '<td colspan="5" style="border: 1px solid black;"><b>'.$xxx.'. '.$record->title.'</b></td>';
					$title = $record->title;
					if($title != $title2){echo $titlex; $a=1;$xxx++;}
					if($record->type == 1){$input = '<input type="number" step="0.01" class="form-control input-sm" name="inputan['.$x.']"/>';}
					if($record->type == 2){$input = '
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="1">YES</label>
					<label class="radio-inline"><input type="radio" name="inputan['.$x.']" value="2">NO</label>';}
					if($record->type != 2 and $record->type != 1){$input = $record->type;}
					echo '
							<tr>
								<td class="text-center" style="border: 1px solid black;">'.$a.'</td>
								<td style="border: 1px solid black;">'.$record->cond.'</td>
								<td style="border: 1px solid black;">'.$record->stand;
					if($record->type == 1){
					echo '
						<span class="pull-right">
							<b>Min:</b>'.$record->min_val.' 
							<b>Max:</b>'.$record->max_val.' 
							<b>Unit:</b>'.$record->unit_val.'
						</span>';
					}
					echo '
								</td>
								<td style="border: 1px solid black;">'.$input.'</td>
								<td style="border: 1px solid black;">'.$record->dcode.'/'.$record->penum.'</td>
							</tr>';
								$head2 = $head;
								$kop2 = $kop;
								$title2 = $title;
								$a++;$x++;
								}
					echo '
							<tr>
								<td colspan="5" class="text-center">
									<a class="btn btn-primary" href="'.base_url().'importdoc_exe/'.$xxcode.'/'.$xxfrec.'/'.$xxtag.'/'.$getdoc->code.'/'.$getdoc->frec.'/'.$getdoc->tag.'"><i class="fa fa-copy"></i> Import This! </a>
								</td>
							</tr>';
						
							}
						
					echo '		
						</table>
					</div>';
		}
	}
	function importdoc_exe($code1, $frec1, $tag1, $code2, $frec2, $tag2){
		if($this->usertype < 10 or $this->usertype > 19){
			$this->loadThis();
		}else{
			$doc1 = $this->pmjob_model->getdoconly1row($code1, $frec1, $tag1);
			$doc = $this->pmjob_model->getdoc($code2, $frec2, $tag2);
			if(!empty($doc)){
				foreach($doc as $rec){
					$newdoc = array(
							'code'=>$code1,
							'frec'=>$frec1,
							'tag'=>$tag1,
							'eq_name'=>$doc1->eq_name,
							'pic'=>$doc1->pic,
							'title'=>$rec->title,
							'cond'=>$rec->cond,
							'stand'=>$rec->stand,
							'min_val'=>$rec->min_val,
							'max_val'=>$rec->max_val,
							'unit_val'=>$rec->unit_val,
							'type'=>$rec->type
						);
					$this->pmjob_model->addform1($newdoc);
				}
			}
			redirect('editdoc/'.$code1.'/'.$frec1.'/'.$tag1);
		}
	}
	function pmrevival(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->pmjob_model->pmrevivalCount($searchText);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "pmrevival/", $count, 10 );
		$data['pmrevival'] = $this->pmjob_model->pmrevival($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : PM Code Revival';
		$this->loadViews("pmlist/pmrevival", $this->global, $data, NULL);
	}
	function pm_js_revival($code){
		//get all (code, frec, tag)
		$check_1_1 = $this->pmjob_model->getdoconly1row($code, 1, 1);
		$check_1_2 = $this->pmjob_model->getdoconly1row($code, 1, 2);
		$check_1_3 = $this->pmjob_model->getdoconly1row($code, 1, 3);
		$check_2_1 = $this->pmjob_model->getdoconly1row($code, 2, 1);
		$check_2_2 = $this->pmjob_model->getdoconly1row($code, 2, 2);
		$check_2_3 = $this->pmjob_model->getdoconly1row($code, 2, 3);
		
		if(empty($check_1_1)){echo '<a href="'.base_url().'revive_it/'.$code.'/1/1" class="btn btn-sm btn-success">Electrical(W)</a>';}
		if(empty($check_1_2)){echo '<a href="'.base_url().'revive_it/'.$code.'/1/2" class="btn btn-sm btn-primary">Mechanical(W)</a>';}
		if(empty($check_1_3)){echo '<a href="'.base_url().'revive_it/'.$code.'/1/3" class="btn btn-sm btn-info">Production(W)</a>';}
		if(empty($check_2_1)){echo '<a href="'.base_url().'revive_it/'.$code.'/2/1" class="btn btn-sm btn-warning">Electrical(M)</a>';}
		if(empty($check_2_2)){echo '<a href="'.base_url().'revive_it/'.$code.'/2/2" class="btn btn-sm btn-danger">Mechanical(M)</a>';}
		if(empty($check_2_3)){echo '<a href="'.base_url().'revive_it/'.$code.'/2/3" class="btn btn-sm bg-purple">Production(M)</a>';}
	}
	function revive_it($code, $frec, $tag){
		$check = $this->pmjob_model->geteqname($code);
		$forminfo = array(
					'code'=>$code,
					'frec'=>$frec,
					'tag'=>$tag,
					'cond'=>'Revival',
					'stand'=>'Revival',
					'type'=>1,
					'eq_name'=>$check->eq_name,
					'title'=>'Revival',
					'pic'=>''
				);
		$result = $this->pmjob_model->addform1($forminfo);
		redirect('editdoc/'.$code.'/'.$frec.'/'.$tag);
	}
}

?>
