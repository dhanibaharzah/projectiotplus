<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Joblist extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('joblist_model');
        $this->isLoggedIn();
		if($this->vendorId < 90000 or $this->vendorId >= 100000){
			$this->loadThis();
		}
    }
	
	function projectjob(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		
		$count = $this->joblist_model->projectjobCount($this->name, $searchText);
		
		$returns = $this->paginationCompress ( "projectjob/", $count, 10 );
		$data['projectjob'] = $this->joblist_model->projectjob($this->name, $searchText, $returns["page"], $returns["segment"]);
		$userrole = $this->joblist_model->getuserinfo($this->vendorId);
		
		$data['total'] = $count;
		
		$data['userdata'] = $userrole;
		$this->global['pageTitle'] = 'RAWR : Project Job';
		$this->loadViews("joblist/projectjob", $this->global, $data, NULL);
    }
	function projectalljob(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$userrole = $this->joblist_model->getuserinfo($this->vendorId);
		$data['userdata'] = $userrole;
		$this->load->library('pagination');
		$count = $this->joblist_model->projectalljobCount($userrole->cdprj, $searchText);
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "projectalljob/", $count, 10 );
		$data['projectjob'] = $this->joblist_model->projectalljob($userrole->cdprj, $searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : All Project Job';
		$this->loadViews("joblist/projectalljob", $this->global, $data, NULL);
    }
	function partlist($id){
		$part = $this->joblist_model->getpartlist($id);
		$ready = $this->joblist_model->getreadlist($id);
		$partlist = '<b>Sparepart(s): </b>';
		if(!empty($part)){
			foreach($part as $record){
				$partlist .= $record->tool.', ';
			}
			$partlist = substr($partlist, 0,-2);
		}else{
			$partlist .= 'no data';
		}
		if(!empty($ready)){
			$partlist .= '<br><b>Device(s): </b>';
			foreach($ready as $rec){
				$partlist .= $rec->iden_name.', ';
			}
			$partlist = substr($partlist, 0,-2);
		}
		echo $partlist;
	}
	function toollist($id){
		$tool = $this->joblist_model->gettoollist($id);
		$toollist = '<b>Tool(s): </b>';
		if(!empty($tool)){
			foreach($tool as $record){
				$toollist .= $record->tool.'['.$record->size.']'.', ';
			}
			$toollist = substr($toollist, 0,-2);
		}else{
			$toollist .= 'no data';
		}
		echo $toollist;
	}
	function formlist($id){
		$form = $this->joblist_model->getformlist($id);
		$formlist = '<b>Form(s): </b><br>';
		$a = 1;
		if(!empty($form)){
			foreach($form as $record){
				$formlist .= $a.'. '.$record->code.'['.$record->eq_name.']'.'<br>';
				$a++;
			}
			$formlist = substr($formlist, 0,-2);
		}else{
			$formlist .= 'no data';
		}
		echo $formlist;
	}
	function projectresult(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->joblist_model->projectresultCount($searchText);
		$returns = $this->paginationCompress ( "projectresult/", $count, 10 );
		$data['projectresult'] = $this->joblist_model->projectresult($searchText, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$data['page'] =$returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Project Result';
		$this->loadViews("joblist/projectresult", $this->global, $data, NULL);
	}
	function prjresultbypic(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$user = $this->input->post('user');
		$data['searchText'] = $searchText;
		$data['user'] = $user;
		$data['userlist'] = $this->joblist_model->getusers();
		$this->load->library('pagination');
		$count = $this->joblist_model->prjresultbypicCount($searchText, $user);
		$returns = $this->paginationCompress ( "prjresultbypic/", $count, 10 );
		$data['prjresultbypic'] = $this->joblist_model->prjresultbypic($searchText, $user, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$data['page'] =$returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Result by PIC';
		$this->loadViews("joblist/prjresultbypic", $this->global, $data, NULL);
	}
	function replist($id){
		$totalrep = $this->joblist_model->totalrep($id);
		echo $totalrep;
	}
	function reportinfo($id){
		$data['reportdetail'] = $this->joblist_model->reportdetail($id);
		$this->global['pageTitle'] = 'RAWR : Project Report';
		$this->loadViews("joblist/reportdetail", $this->global, $data, NULL);
	}
	function addprojectjob(){
		$title = $this->input->post('title');
		$p1 = $this->input->post('p1');
		$p2 = $this->input->post('p2');
		$p3 = $this->input->post('p3');
		$p4 = $this->input->post('p4');
		$p5 = $this->input->post('p5');
		$desc = '';
		if($p1==1 or $p2==1 or $p3==1 or $p4==1 or $p5==1){
			$desc .= 'Membuat work permit, ';
		}
		if($p1==1){$desc .= 'hot work, ';}
		if($p2==1){$desc .= 'work at high, ';}
		if($p3==1){$desc .= 'confined space, ';}
		if($p4==1){$desc .= 'digging, ';}
		if($p5==1){$desc .= 'electrical';}
		if($p1==1 or $p2==1 or $p3==1 or $p4==1 or $p5==1){
			$desc .= '
';
		}
		$desc .= $this->input->post('desc');
		$type = $this->input->post('type');
		$tag = $this->input->post('tag');
		$area = $this->input->post('area');
		$next = $this->input->post('next');
		$prev = $this->input->post('prev');
		$repeater = 0;
		if($type == 1){
			$repeater = 7;
		}
		if($type == 2){
			$repeater = 28;
		}
		$jobInfo = array('job_title'=>$title, 
					'job_desc'=>$desc, 
					'type'=>$type,
					'tag'=>$tag,
					'repeater'=>$repeater,
					'area'=>$area,
					'next'=>$next,
					'addedby'=>$this->name
					);
		$result = $this->joblist_model->addprojectjob($jobInfo);
		if(!empty($prev)){
			redirect('pmjob');
		}else{
			redirect('projectjob');
		}
	}
	function askprojectapp($id, $tag){
		$tag = $tag + 10;
		$jobInfo = array('tag'=>$tag);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		$target = 0;
		$info = '';
		if($tag == 101){$target = 11;$info = 'Added Electrical job, <a class="btn btn-sm btn-success" href = "'.base_url().'projectalljob"><i class="fa fa-link"></i> Check</a>';}
		if($tag == 102){$target = 12;$info = 'Added Mechanical job, <a class="btn btn-sm btn-success" href = "'.base_url().'projectalljob"><i class="fa fa-link"></i> Check</a>';}
		$note = array(
			'code'=>101,
			'target'=>$target,
			'user'=>$this->name,
			'info'=>$info
		);
		$addnotif = $this->joblist_model->addcostumnotif($note);
		redirect('projectjob');
	}
	function appprojectjob(){
		$id = $this->input->post('id');
		$tag = $this->input->post('tag');
		$user = $this->input->post('user');
		$newtag = 0;
		$cektag = $tag % 10;
		if($cektag == 1){$newtag = 1;}
		if($cektag == 2){$newtag = 2;}
		$jobInfo = array('tag'=>$newtag);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		$target = $this->joblist_model->getuserinfobyuname($user);
		$info = '';
		if($tag == 101){$info = 'Approved, Electrical job by '.$user.', <a class="btn btn-sm btn-success" href = "'.base_url().'projectalljob"><i class="fa fa-link"></i> Check</a>';}
		if($tag == 102){$info = 'Approved, Mechanical job by '.$user.', <a class="btn btn-sm btn-success" href = "'.base_url().'projectalljob"><i class="fa fa-link"></i> Check</a>';}
		$note = array(
			'code'=>102,
			'target'=>$target->lineid,
			'user'=>$this->name,
			'info'=>$info
		);
		$addnotif = $this->joblist_model->addcostumnotif($note);
		redirect('projectalljob');
	}
	function rjtprojectjob(){
		$id = $this->input->post('id');
		$tag = $this->input->post('tag');
		$user = $this->input->post('user');
		$note1 = 'Reject note: ';
		$note1 .= $this->input->post('note1');
		$newtag = 0;
		$cektag = $tag % 10;
		if($cektag == 1){$newtag = 91;}
		if($cektag == 2){$newtag = 92;}
		$jobInfo = array('tag'=>$newtag, 'note1'=>$note1);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		$target = $this->joblist_model->getuserinfobyuname($user);
		$info = '';
		if($tag == 101){$info = 'Rejected, Electrical job by '.$user.', '.$note1.' <a class="btn btn-sm btn-success" href = "'.base_url().'projectalljob"><i class="fa fa-link"></i> Check</a>';}
		if($tag == 102){$info = 'Rejected, Mechanical job by '.$user.', '.$note1.' <a class="btn btn-sm btn-success" href = "'.base_url().'projectalljob"><i class="fa fa-link"></i> Check</a>';}
		$note = array(
			'code'=>103,
			'target'=>$target->lineid,
			'user'=>$this->name,
			'info'=>$info
		);
		$addnotif = $this->joblist_model->addcostumnotif($note);
		redirect('projectalljob');
	}
	function editprojectjob(){
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$id = $this->input->post('id');
		$tag = $this->input->post('tag');
		$newtag = 0;
		$cektag = $tag % 10;
		if($cektag == 1){$newtag = 91;}
		if($cektag == 2){$newtag = 92;}
		$jobInfo = array('job_title'=>$title, 
					'job_desc'=>$desc, 
					'tag'=>$newtag
					);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		redirect('projectjob');
	}
	function editappprojectjob(){
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$id = $this->input->post('id');
		$jobInfo = array('job_title'=>$title, 
					'job_desc'=>$desc
					);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		redirect('projectalljob');
	}
	function delprojectjob(){
		$id = $this->input->post('id');
		$jobInfo = array('isvalid'=>0
					);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		redirect('projectjob');
	}
	function setprojectjob($id){
		$data['job'] = $this->joblist_model->getprojectjob($id);
		$data['tool'] = $this->joblist_model->gettool();
		$data['toollist'] = $this->joblist_model->gettoollist($id);
		$data['partlist'] = $this->joblist_model->getpartlist($id);
		$data['ready'] = $this->joblist_model->getidenlist();
		$data['readlist'] = $this->joblist_model->getreadlist($id);
		$data['doclist'] = $this->joblist_model->getdoclisttagtype($data['job']->tag, $data['job']->type);
		$this->global['pageTitle'] = 'RAWR : Setting Project Job';
		$this->loadViews("joblist/setprojectjob", $this->global, $data, NULL);
	}
	function getpartdropdown(){
		if (isset($_GET['term'])) {
			$result = $this->joblist_model->searchpart($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = $row->tool;
				
				echo json_encode($arr_result);
			}
		}
	}
	function setrepeater(){
		$repeater = $this->input->post('repeater');
		$id = $this->input->post('id');
		$jobInfo = array('repeater'=>$repeater);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		redirect('setprojectjob/'.$id);
	}
	function setdate(){
		$exedate = $this->input->post('exedate');
		$exedate .= ' 07:00:00';
		$exedate = date('U', strtotime($exedate));
		$id = $this->input->post('id');
		$jobInfo = array('next'=>$exedate);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		redirect('setprojectjob/'.$id);
	}
	function setdur(){
		$dur = $this->input->post('dur');
		$id = $this->input->post('id');
		$jobInfo = array('dur'=>$dur);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		redirect('setprojectjob/'.$id);
	}
	function settool(){
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
		redirect('setprojectjob/'.$id);
	}
	function deltoolprojectjob($id, $jobid){
		$jobInfo = array('isvalid'=>0);
		$result = $this->joblist_model->deltoolprojectjob($jobInfo, $id);
		redirect('setprojectjob/'.$jobid);
	}
	function setpart(){
		$quan = $this->input->post('quan');
		$id = $this->input->post('id');
		$part = $this->input->post('part');
		$toolInfo = array(
			'project_id'=>$id,
			'tool'=>$part,
			'quan'=>$quan
			);
		$result = $this->joblist_model->addpartprojectjob($toolInfo);
		redirect('setprojectjob/'.$id);
	}
	function delpartprojectjob($id, $jobid){
		$jobInfo = array('isvalid'=>0);
		$result = $this->joblist_model->delpartprojectjob($jobInfo, $id);
		redirect('setprojectjob/'.$jobid);
	}
	function setform(){
		$formdoc = $this->input->post('formdoc');
		$id = $this->input->post('id');
		$jobInfo = array(
			'form'=>$formdoc
			);
		$result = $this->joblist_model->editprojectjob($jobInfo, $id);
		redirect('setprojectjob/'.$id);
	}
	function delformprojectjob($jobid){
		$jobInfo = array('form'=>'');
		$result = $this->joblist_model->editprojectjob($jobInfo, $jobid);
		redirect('setprojectjob/'.$jobid);
	}
	function setready(){
		$ready = $this->input->post('ready');
		$id = $this->input->post('id');
		$jobInfo = array(
			'project_id'=>$id,
			'iden_id'=>$ready
			);
		$result = $this->joblist_model->addidenprojectjob($jobInfo);
		redirect('setprojectjob/'.$id);
	}
	function delreadyprojectjob($id, $jobid){
		$jobInfo = array('isvalid'=>0);
		$result = $this->joblist_model->delreadyprojectjob($jobInfo, $id);
		redirect('setprojectjob/'.$jobid);
	}
	function projectplan(){
		$this->global['pageTitle'] = 'RAWR : Plan Calendar';
		$this->loadViews("joblist/projectplan", $this->global, NULL, NULL);
	}
	function apptable(){
		$apptable = $this->joblist_model->getapproval($this->name);
		$a = '';
		if(!empty($apptable)){
			//$re = array_reverse($re, true);
			foreach($apptable as $rec){
				if($rec->app1 == '' and $rec->app2 == '' and $rec->app3 == ''){
					$a .='<div class="direct-chat-msg">';
					$a .='<div class="direct-chat-info clearfix">';
					$a .='<span class="direct-chat-name pull-left">Submit Status</span>';
					$a .='<span class="direct-chat-timestamp pull-right">'.$rec->timestamp.'</span>';
					$a .='</div>';
					$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar5.png" alt="message user image">';
					$a .='<div class="direct-chat-text">';
					$a .= $rec->docno.' has been submited';
					$a .='</div>';
					$a .='</div>';
				}else{
					if($rec->app1 != ''){
						$app = 'Checked - I ['.$rec->docno.']<br>';
						$timer = date('H:i:s d M-Y', $rec->unix1);
					}
					if($rec->app2 != ''){
						$app = 'Checked - II ['.$rec->docno.']<br>';
						$timer = date('H:i:s d M-Y', $rec->unix2);
					}
					if($rec->app3 != ''){
						$app = 'Approved ['.$rec->docno.']<br>';
						$timer = date('H:i:s d M-Y', $rec->unix3);
					}
					$a .='<div class="direct-chat-msg right">';
					$a .='<div class="direct-chat-info clearfix">';
					$a .='<span class="direct-chat-name pull-left">Approval Status</span>';
					$a .='<span class="direct-chat-timestamp pull-right">'.$timer.'</span>';
					$a .='</div>';
					$a .='<img class="direct-chat-img" src="'.base_url().'assets/dist/img/avatar5.png" alt="message user image">';
					$a .='<div class="direct-chat-text">';
					$a .= $app;
					if($rec->app1 != ''){
						$a .= $rec->app1.', note:'.$rec->note1.'<br>';
					}
					if($rec->app2 != ''){
						$a .= $rec->app2.', note:'.$rec->note2.'<br>';
					}
					if($rec->app3 != ''){
						$a .= $rec->app3.', note:'.$rec->note3;
					}
					$a .='</div>';
					$a .='</div>';
				}
			}
		}
		//$a=var_dump($re);
		echo $a;
	}
	function getprojectplan(){
		$start = $this->input->get("start");
		$end = $this->input->get("end");
		$events = $this->joblist_model->getprojectplan($this->name, $start, $end);
		$data_events = array();
		foreach($events->result() as $r) {
			$title = $r->job_title;
			$data_events[] = array(
				"id" => $r->id,
				"title" => $title,
				"description" => $r->job_desc,
				"end" => gmdate('Y-m-d H:i:s', $r->end),
				"start" => gmdate('Y-m-d H:i:s', $r->start),
				"color" => '#3b83f7'
			);
		}
		echo json_encode(array("events" => $data_events));
		exit();
	}
	function getheader($unix){
		$date = gmdate('Y-m-d', $unix);
		$submit_check = $this->joblist_model->getprojectdoc($this->name, $date);
		$app = '';
		if(!empty($submit_check)){
			$app = '<span class="label label-default">Editing</label>';
			if($submit_check->unix0 != ''){ $app = '<span class="label label-info">Submitted</span>';}
			if($submit_check->unix1 != ''){ $app = '<span class="label label-warning">Checked - I</span>';}
			if($submit_check->unix2 != ''){ $app = '<span class="label label-warning">Checked - II</span>';}
			if($submit_check->unix3 != ''){ $app = '<span class="label label-success">Approved</span>';}
		}
		$header = '
					<form action="'.base_url().'gotodate" method="POST">
					<div class="col-lg-10 col-xs-8">
						<h4> '.$app.'Project List on <b>'.$date.'</b> <small>'.$this->name.'</small></h4>
					</div>
					<div class="col-lg-2 col-xs-4">
						<input type="hidden" name="start_date" id="start_date" value="'.$date.'">';
		if(empty($submit_check)){
			$header .= '<button class="btn btn-primary pull-right"><i class="fa fa-pencil"></i></button>';
		}else{
			$header .= '<a href="'.base_url().'schview/'.$submit_check->id.'" target="_blank" class="btn btn-info pull-right"><i class="fa fa-search"></i></button>';
			$header .= '<a href="#" class="btn btn-primary pull-right"><i class="fa fa-print"></i></button>';
			if($submit_check->app3 == ''){
				$header .= '<a href="'.base_url().'schcancel/'.$date.'" class="btn btn-warning pull-right"><i class="fa fa-ban"></i></button>';
			}
		}
		$header .= '</div></form>';
		echo $header;
	}
	function gettabel($unix){
		$start = $unix;
		$end = $start + 86399;
		$events = $this->joblist_model->getprojecttic($this->name, $start, $end);
		$result = $events->result();
		$tabel = '';
		if(!empty($result)){
			$a = 1;
			$tabel .= '<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Activity</th>
								<th class="text-center">Time</th>
								<th class="text-center">Document</th>
							</tr>';
			foreach($result as $record){
				$tabel .= '
							<tr>
								<td class="text-center">'.$a.'</td>
								<td><b>'.$record->job_title.'</b><br>'.nl2br($record->job_desc).'</td>
								<td class="text-center">'.gmdate('H:i',$record->start).' to '.gmdate('H:i',$record->end).'</td>
								<td class="text-center">Document</td>
							</tr>';
				$a++;
			}
			$tabel .= '</table>';
		}else{
			$tabel = 'No data found';
		}
		echo $tabel;
	}
	function gotodate(){
		$start_date = $this->input->post('start_date');
		redirect('setprojectsch/'.$start_date);
	}
	function setprojectsch($start_date){
		$data['start_date'] = $start_date;
		$userdata = $this->joblist_model->getuserinfobyuname($this->name);
		$data['job'] = $this->joblist_model->getprojectlist($userdata->cdprj);
		$data['user'] = $this->joblist_model->getusers();
		$start = date('U', strtotime($start_date)) + 25200;
		$end = $start + 86399;
		$events = $this->joblist_model->getprojecttic($this->name, $start, $end);
		$data['joblist'] = $events->result();
		
		$this->global['pageTitle'] = 'RAWR : Setting Project Schedule';
		$this->loadViews("joblist/setprojectsch", $this->global, $data, NULL);
	}
	function schjob(){
		$start_date = $this->input->post('start_date');
		$job = $this->input->post('job');
		$detail = $this->joblist_model->getprojectjob($job);
		$device_use = $this->joblist_model->getreadlist($job);
		if(!empty($device_use)){
			foreach($device_use as $rec){
				$cekready = $this->joblist_model->cekdeviceready($rec->iden_id);
				if(empty($cekready)){
					redirect('devicenotready/'.$start_date.'/'.$job);
				}
			}
			foreach($device_use as $rek){
				$bookit = $this->joblist_model->cekdeviceready($rek->iden_id);
				if(!empty($bookit)){
					$this->joblist_model->bookdevice($bookit->id, $job, $start_date);
				}
			}
		}
		$start = date('U', strtotime($start_date));
		$start = $start + 25200;
		$end = $start + ($detail->dur * 60);
		$ticket = array(
			'owner'=>$this->name,
			'addedby'=>$detail->addedby,
			'project_id'=>$job,
			'job_title'=>$detail->job_title,
			'job_desc'=>$detail->job_desc,
			'start'=>$start,
			'end'=>$end
			);
		$addticket = $this->joblist_model->addticket($ticket);
		redirect('setprojectsch/'.$start_date);
	}
	function devicenotready($start_date, $job){
		$data['job'] = $this->joblist_model->getprojectjob($job);
		$device_use = $this->joblist_model->getreadlist($job);
		$tabel = '
			<table class="table table-hover table-striped table-bordered ">
				<tr>
					<th class="text-center" style="border:1px solid black;">No</th>
					<th class="text-center" style="border:1px solid black;">Iden Name</th>
					<th class="text-center" style="border:1px solid black;">Status</th>
				</tr>';
		if(!empty($device_use)){ 
			$a = 1;
			foreach($device_use as $record){
				$cekready = $this->joblist_model->cekdeviceready($record->iden_id);
				if(!empty($cekready)){$reddev = '<span class="label label-success">['.$cekready->code.']</span>';}else{$reddev = '<span class="label label-danger">No Device</span>';}
				$tabel .= '<tr>
								<td width="5%" class="text-center" style="border:1px solid black;">'.$a.'</td>
								<td width="50%" class="text-center" style="border:1px solid black;">'.$record->iden_name.'</td>
								<td width="45%" class="text-center" style="border:1px solid black;">'.$reddev.'</td>
							</tr>';
				$a++;
			}
		}
		$tabel .= '</table>';
		$data['tabel'] = $tabel;
		$data['start_date'] = $start_date;
		$this->global['pageTitle'] = 'RAWR : Device Usage Check';
		$this->loadViews("joblist/devicecheck", $this->global, $data, NULL);
	}
	function schpart($id){
		$part = $this->joblist_model->getpartlist($id);
		$tabel = '';
		if(!empty($part)){
			$a = 1;
			$tabel .= '<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Spare Part</th>
								<th class="text-center">Q</th>
							</tr>';
			foreach($part as $record){
				$tabel .= '
							<tr>
								<td class="text-center">'.$a.'</td>
								<td>'.$record->tool.'</td>
								<td class="text-center">'.$record->quan.'</td>
							</tr>';
				$a++;
			}
			$tabel .= '</table>';
		}else{
			$tabel = 'No data found';
		}
		echo $tabel;
	}
	function schtool($id){
		$part = $this->joblist_model->gettoollist($id);
		$tabel = '';
		if(!empty($part)){
			$a = 1;
			$tabel .= '<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Tool Name</th>
								<th class="text-center">Size</th>
								<th class="text-center">Q</th>
							</tr>';
			foreach($part as $record){
				$tabel .= '
							<tr>
								<td class="text-center">'.$a.'</td>
								<td>'.$record->tool.'</td>
								<td>'.$record->size.'</td>
								<td class="text-center">'.$record->quan.'</td>
							</tr>';
				$a++;
			}
			$tabel .= '</table>';
		}else{
			$tabel = 'No data found';
		}
		echo $tabel;
	}
	function schuser($id){
		$part = $this->joblist_model->getuserlist($id);
		$project_date = $this->joblist_model->getticket($id);
		$start_date = gmdate('Y-m-d',$project_date->start);
		$tabel = '';
		if(!empty($part)){
			$a = 1;
			$tabel .= '<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">User/PIC</th>
								<th class="text-center">Del</th>
							</tr>';
			foreach($part as $record){
				$tabel .= '
							<tr>
								<td class="text-center">'.$a.'</td>
								<td>'.$record->user.'</td>
								<td class="text-center"><a href="'.base_url().'delschpic/'.$record->id.'/'.$start_date.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
							</tr>';
				$a++;
			}
			$tabel .= '</table>';
		}else{
			$tabel = 'No data found';
		}
		echo $tabel;
	}
	function schpic(){
		$start_date = $this->input->post('start_date2');
		$project_id = $this->input->post('project_id');
		$user = $this->input->post('user');
		$user2 = $this->input->post('user2');
		$pic = '';
		if(!empty($user)){
			$pic = $user;
		}else{
			$pic = $user2;
		}
		if(empty($user) and empty($user2)){
			redirect('setprojectsch/'.$start_date);
		}
		$jobInfo = array(
			'user'=>$pic,
			'ticket_id'=>$project_id
			);
		$result = $this->joblist_model->addprojectuser($jobInfo);
		redirect('setprojectsch/'.$start_date);
	}
	function delschpic($id, $start_date){
		$pic = array('isvalid'=>0);
		$result = $this->joblist_model->delschpic($pic, $id);
		redirect('setprojectsch/'.$start_date);
	}
	function delticket($id, $start_date){
		$ticket = array('isvalid'=>0);
		$result = $this->joblist_model->delticket($ticket, $id);
		$isready = array('isready'=>1);
		$projectid = $this->joblist_model->getticket($id);
		$device = $this->joblist_model->revertdevice($projectid->project_id, $start_date);
		redirect('setprojectsch/'.$start_date);
	}
	function schstart(){
		$start_date = $this->input->post('start_date3');
		$ticket_id = $this->input->post('ticket_id');
		$project_idx = $this->input->post('project_idx');
		$start_hour = $this->input->post('start_hour');
		$start = date('U', strtotime($start_date));
		$start = $start + ($start_hour * 3600) + 25200;
		$end = $this->joblist_model->getprojectjob($project_idx);
		$end = $start + ($end->dur * 60);
		
		$jobInfo = array(
			'start'=>$start,
			'end'=>$end
			);
		$result = $this->joblist_model->delticket($jobInfo, $ticket_id);
		redirect('setprojectsch/'.$start_date);
	}
	function schsubmit($start_date){
		$start = date('U', strtotime($start_date)) + 25200;
		$end = $start + 86399;
		$events = $this->joblist_model->getprojecttic($this->name, $start, $end);
		$joblist = $events->result();
		if(!empty($joblist)){
			foreach($joblist as $record){
				$ticket = array(
					'submit'=>1
				);
				$this->joblist_model->delticket($ticket, $record->id);
			}
			$doc = array(
					'docno'=>$start_date,
					'reject'=>0,
					'unix0'=>date('U'),
					'owner'=>$this->name
				);
			$adddata = $this->joblist_model->addprojectdoc($doc);
		}
		$newdoc = $this->joblist_model->schchecking($start_date, $this->name);
		$info = 'Project Schedule at '.$start_date.' has been submitted <a href="'.base_url().'schapp/'.$newdoc->id.'" class="btn btn-sm btn-primary" target="_blank">Checker-I</a>';
		$note = array(
			'code'=>104,
			'target'=>1,
			'user'=>$this->name,
			'info'=>$info
		);
		$addnotif = $this->joblist_model->addcostumnotif($note);
		redirect('projectplan');
	}
	function schcancel($start_date){
		$start = date('U', strtotime($start_date)) + 25200;
		$end = $start + 86399;
		$events = $this->joblist_model->getprojecttic($this->name, $start, $end);
		$joblist = $events->result();
		if(!empty($joblist)){
			foreach($joblist as $record){
				$ticket = array(
					'submit'=>0
				);
				$this->joblist_model->delticket($ticket, $record->id);
			}
			$doc = array(
					'isvalid'=>0
				);
			$adddata = $this->joblist_model->updateprojectdoc($this->name, $start_date, $doc);
		}
		redirect('projectplan');
	}
	function projectapp(){
		$this->global['pageTitle'] = 'RAWR : Approved Calendar';
		$this->loadViews("joblist/projectapp", $this->global, NULL, NULL);
	}
	function getprojectapp(){
		$start = $this->input->get("start");
		$end = $this->input->get("end");
		$events = $this->joblist_model->getprojectapp($this->name, $start, $end);
		$data_events = array();
		foreach($events->result() as $r) {
			$title = $r->job_title;
			$data_events[] = array(
				"id" => $r->id,
				"title" => $title,
				"description" => $r->job_desc,
				"end" => gmdate('Y-m-d H:i:s', $r->end),
				"start" => gmdate('Y-m-d H:i:s', $r->start),
				"color" => '#3b83f7'
			);
		}
		echo json_encode(array("events" => $data_events));
		exit();
	}
	function getheaderapp($unix){
		$date = gmdate('Y-m-d', $unix);
		$submit_check = $this->joblist_model->getprojectdoc($this->name, $date);
		$app = '';
		if(!empty($submit_check)){
			$app = '<span class="label label-default">Editing</label>';
			if($submit_check->unix0 != ''){ $app = '<span class="label label-info">Submitted</span>';}
			if($submit_check->unix1 != ''){ $app = '<span class="label label-warning">Checked - I</span>';}
			if($submit_check->unix2 != ''){ $app = '<span class="label label-warning">Checked - II</span>';}
			if($submit_check->unix3 != ''){ $app = '<span class="label label-success">Approved</span>';}
		}
		$header = '
					<form action="'.base_url().'gotodate" method="POST">
					<div class="col-lg-10 col-xs-8">
						<h4> '.$app.'Project List on <b>'.$date.'</b> <small>'.$this->name.'</small></h4>
					</div>
					<div class="col-lg-2 col-xs-4">
						<input type="hidden" name="start_date" id="start_date" value="'.$date.'">';
		if(empty($submit_check)){
			$header .= '';
		}else{
			$header .= '<a href="'.base_url().'schview/'.$submit_check->id.'" target="_blank" class="btn btn-info pull-right"><i class="fa fa-search"></i></button>';
			$header .= '<a href="#" class="btn btn-primary pull-right"><i class="fa fa-print"></i></button>';
		}
		$header .= '</div></form>';
		echo $header;
	}
	function gettabelapp($unix){
		$start = $unix;
		$end = $start + 86399;
		$events = $this->joblist_model->getprojectapp($this->name, $start, $end);
		$result = $events->result();
		$tabel = '';
		if(!empty($result)){
			$a = 1;
			$tabel .= '<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center" colspan="2">Activity</th>
								<th class="text-center">Time</th>
								<th class="text-center">PIC</th>
							</tr>';
			foreach($result as $record){
				$tool = $this->joblist_model->gettoollist($record->project_id);
				$toollist = '';
				if(!empty($tool)){
					$toollist = '<b>Tools:</b><br>';
					foreach($tool as $rec_tool){
						$toollist .= $rec_tool->tool.'-'.$rec_tool->size.' Q:'.$rec_tool->quan.'<br>';
					}
				}
				$part = $this->joblist_model->getpartlist($record->project_id);
				$partlist = '';
				if(!empty($part)){
					$partlist = '<b>Parts:</b><br>';
					foreach($part as $rec_part){
						$partlist .= $rec_part->tool.'- Q:'.$rec_part->quan.'<br>';
					}
				}
				$pic = $this->joblist_model->getuserlist($record->id);
				$piclist = '';
				if(!empty($pic)){
					foreach($pic as $rec_pic){
						$piclist .=$rec_pic->user.'<br>';
					}
				}
				$tabel .= '
							<tr>
								<td class="text-center" rowspan="2">'.$a.'</td>
								<td colspan="2"><b>'.$record->job_title.'</b><br>'.nl2br($record->job_desc).'</td>
								<td class="text-center" rowspan="2">'.gmdate('H:i',$record->start).'<br>-<br>'.gmdate('H:i',$record->end).'</td>
								<td class="text-center" rowspan="2">'.$piclist.'</td>
							</tr>
							<tr>
								<td>'.$toollist.'</td>
								<td>'.$partlist.'</td>
							</tr>
							';
				$a++;
			}
			$tabel .= '</table>';
		}else{
			$tabel = 'No data found';
		}
		echo $tabel;
	}
	function projectall(){
		$this->global['pageTitle'] = 'RAWR : All Calendar';
		$this->loadViews("joblist/projectall", $this->global, NULL, NULL);
	}
	function getprojectall(){
		$start = $this->input->get("start");
		$end = $this->input->get("end");
		$events = $this->joblist_model->getprojectall($start, $end);
		$data_events = array();
		foreach($events->result() as $r) {
			$title = $r->job_title;
			$data_events[] = array(
				"id" => $r->id,
				"title" => $title,
				"description" => $r->job_desc,
				"end" => gmdate('Y-m-d H:i:s', $r->end),
				"start" => gmdate('Y-m-d H:i:s', $r->start),
				"color" => '#3b83f7'
			);
		}
		echo json_encode(array("events" => $data_events));
		exit();
	}
	function getheaderall($unix){
		$date = gmdate('Y-m-d', $unix);
		$submit_check = $this->joblist_model->getprojectdocall($date);
		$header = '
					<form action="'.base_url().'gotodate" method="POST">
					<div class="col-lg-10 col-xs-8">
						<h4> Project List on <b>'.$date.'</b></h4>
					</div>
					<div class="col-lg-2 col-xs-4">
						<input type="hidden" name="start_date" id="start_date" value="'.$date.'">';
		if(empty($submit_check)){
			$header .= '';
		}else{
			$header .= '<a href="'.base_url().'schviewall/'.$unix.'" target="_blank" class="btn btn-info pull-right"><i class="fa fa-search"></i></button>';
			$header .= '<a href="'.base_url().'schmonall/'.$unix.'" target="_blank" class="btn btn-warning pull-right"><i class="fa fa-sign-in"></i></button>';
			$header .= '<a href="#" class="btn btn-primary pull-right"><i class="fa fa-print"></i></button>';
		}
		$header .= '</div></form>';
		echo $header;
	}
	function gettabelall($unix){
		$start = $unix;
		$end = $start + 86399;
		$events = $this->joblist_model->gettabelall($start, $end);
		$result = $events->result();
		$tabel = '';
		if(!empty($result)){
			$a = 1;
			$tabel .= '<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center" colspan="2">Activity</th>
								<th class="text-center">Time</th>
								<th class="text-center">PIC</th>
							</tr>';
			foreach($result as $record){
				$tool = $this->joblist_model->gettoollist($record->project_id);
				$toollist = '';
				if(!empty($tool)){
					$toollist = '<b>Tools:</b><br>';
					foreach($tool as $rec_tool){
						$toollist .= $rec_tool->tool.'-'.$rec_tool->size.' Q:'.$rec_tool->quan.'<br>';
					}
				}
				$part = $this->joblist_model->getpartlist($record->project_id);
				$partlist = '';
				if(!empty($part)){
					$partlist = '<b>Parts:</b><br>';
					foreach($part as $rec_part){
						$partlist .= $rec_part->tool.'- Q:'.$rec_part->quan.'<br>';
					}
				}
				$pic = $this->joblist_model->getuserlist($record->id);
				$piclist = '';
				if(!empty($pic)){
					foreach($pic as $rec_pic){
						$piclist .=$rec_pic->user.'<br>';
					}
				}
				$tabel .= '
							<tr>
								<td class="text-center" rowspan="2">'.$a.'</td>
								<td colspan="2"><b>Added by: </b>'.$record->addedby.', <b>Arranged by: </b>'.$record->owner.'<br><b>'.$record->job_title.'</b><br>'.nl2br($record->job_desc).'</td>
								<td class="text-center" rowspan="2">'.gmdate('H:i',$record->start).'<br>-<br>'.gmdate('H:i',$record->end).'</td>
								<td class="text-center" rowspan="2">'.$piclist.'</td>
							</tr>
							<tr>
								<td>'.$toollist.'</td>
								<td>'.$partlist.'</td>
							</tr>
							';
				$a++;
			}
			$tabel .= '</table>';
		}else{
			$tabel = 'No data found';
		}
		echo $tabel;
	}
	function projectapproval(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->joblist_model->projectapprovalC($searchText);
		$returns = $this->paginationCompress ( "projectapproval/", $count, 10 );
		$data['approval'] = $this->joblist_model->projectapproval($searchText, $returns["page"], $returns["segment"]);
		$userrole = $this->joblist_model->getuserinfo($this->vendorId);
		$data['userdata'] = $userrole;
		$this->global['pageTitle'] = 'RAWR : Approval Route';
		$this->loadViews("joblist/projectapproval", $this->global, $data, NULL);
	}
	function projectuserset(){
		$id = $this->input->post('id');
		$cdprj = $this->input->post('role');
		$cd_role1 = $this->input->post('cd_role1');
		$cd_role2 = $this->input->post('cd_role2');
		$cd_role3 = $this->input->post('cd_role3');
		$applog1 = $this->input->post('applog1');
		$applog2 = $this->input->post('applog2');
		$userInfo = array(
				'cdprj'=>$cdprj,
				'cd_role1'=>$cd_role1,
				'cd_role2'=>$cd_role2,
				'cd_role3'=>$cd_role3,
				'applog1'=>$applog1,
				'applog2'=>$applog2
			);
		$userrole = $this->joblist_model->userset($userInfo, $id);
		redirect('projectapproval');
	}
	function projectmanual(){
		$this->global['pageTitle'] = 'RAWR : Project Job Guide';
		$this->loadViews("joblist/projectmanual", $this->global, NULL, NULL);
	}
	function piclist($id){
		$pic = $this->joblist_model->getpiclist($id);
		$piclist = '';
		if(!empty($pic)){
			foreach($pic as $record){
				$piclist .= $record->user.', <br>';
			}
			$piclist = substr($piclist, 0,-6);
		}else{
			$piclist .= 'no data';
		}
		echo $piclist;
	}
	function myproject(){
		$user = $this->name;
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$data['user'] = $this->name;
		$data['count'] = $this->joblist_model->myprojectcount($user, $unix);
		$data['myproject'] = $this->joblist_model->myproject($user, $unix);
		$count = $this->joblist_model-> myprojectcount($user, $unix);
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : My Project';
		$this->loadViews("joblist/myproject", $this->global, $data, NULL);
	}
	//===========================================documents approval====================================
	public function docapproval(){
		$data['authuser']=($this->joblist_model->getuserinfobyuname($this->name)); //array authuser merupakan array tambahan agar bisa memanggil data nama
		$this->load->library('pagination'); //koding paginasi
		$count = $this->joblist_model-> docapprovalCount(); //tambahain , $toDate nanti setelah $no
		$data['total'] = $count;
		$returns = $this->paginationCompress ( "docapproval/", $count, 10);
		$data['docapproval']= $this->joblist_model-> docapproval($returns["page"], $returns["segment"]); //ini juga tambahin $toDate, 
		$this->global['pageTitle'] = 'RAWR : Approval Documents';
		$this->loadViews("joblist/docapproval", $this->global, $data, NULL);
	}
	
	public function process($id){
		$result = $this->joblist_model->getdocbyid($id);
		$a = '';
		$a .= '<div class="col-md-3">';
		$a .=	'<i><b>Issued by,</b></i><br>';
		$a .=	'<b>'.$result->owner.'<br></b>';
				if(empty($result->unix0) or $result->unix0 == 0){
					$a .= '';
				}else{
					$a .= date('d-m-Y H:i:s', $result->unix0); //ini konversi dari unix ke jam, tanggal bulan dan tahun
				}
		$a .= '</div>
		<div class="col-md-3">
			<i><b>PIC Area by,</b></i><br>';
		$a .= '<b>'.$result->app1.'<br></b>';
				if(empty($result->unix1) or $result->unix1 == 0){
					$a .= '';
				}else{
					$a .= date('d-m-Y H:i:s', $result->unix1);
				} 
		$a .= '</div>
		<div class="col-md-3">
			<i><b>Checked by,</b></i><br>';
			$a .= '<b>'.$result->app2.'<br></b>';
				if(empty($result->unix2) or $result->unix2 == 0){
					$a .= '';
				}else{
					$a .= date('d-m-Y H:i:s', $result->unix2);
				} 
		$a .= '</div>	
		<div class="col-md-3">
			<i><b>Acknowledgement by,</b></i><br>';
			$a .= '<b>'.$result->app3.'<br></b>';
				if(empty($result->unix3) or $result->unix3 == 0){
					$a .= '';
				}else{
					$a .= date('d-m-Y H:i:s', $result->unix3);
				}
		$a .= '</div>';
	$a .='';
	echo $a;
	}
	function closeproject(){
		$count = $this->joblist_model-> closeprojectCount($this->name); //tambahain , $toDate nanti setelah $no
		$data['total'] = $count;
		
		$data['closeproject'] = $this->joblist_model->closeproject($this->name);
		$this->global['pageTitle'] = 'RAWR : Closing Project';
		$this->loadViews("joblist/closeproject", $this->global, $data, NULL);
	}
	function notif1(){
		$notif1 = $this->joblist_model->closeprojectCount($this->name);
		echo $notif1;
	}
	function notif2(){
		$authuser = $this->joblist_model->getuserinfobyuname($this->name);
		$notif2 = $this->joblist_model->getprjappdocbyrole($authuser->cd_role1, $authuser->cd_role2, $authuser->cd_role3);
		echo $notif2;
	}
	function notif6(){
		$unix = gmdate('U');
		$unix = $unix - ($unix % 86400);
		$notif6 = $this->joblist_model->myprojectcount($this->name, $unix);
		echo $notif6;
	}
	function notif_h1(){
		$notif1 = $this->joblist_model->closeprojectCount($this->name);
		$authuser = $this->joblist_model->getuserinfobyuname($this->name);
		$notif2 = $this->joblist_model->getprjappdocbyrole($authuser->cd_role1, $authuser->cd_role2, $authuser->cd_role3);
		$notif_h1 = $notif1 + $notif2;
		echo $notif_h1;
	}
}
?>
