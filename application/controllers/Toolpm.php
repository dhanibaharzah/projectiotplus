<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Toolpm extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('toolpm_model');
        $this->isLoggedIn();   
    }
   
    /**
     * This function is used to load the user list
     */
    
	function toolpmset($segment ='', $searchxx= NULL){
		if($searchxx == ''){
			$searchText = $this->security->xss_clean($this->input->post('searchText'));
		}else{
			$searchText = $searchxx;
		}
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->toolpm_model->toolpmsetCount($searchText);
		$returns = $this->paginationCompress ( "toolpmset/", $count, 10 );
		$data['toolpmset'] = $this->toolpm_model->toolpmset($searchText, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : PM Tool';
		$this->loadViews("t_toolpm/toolpmset", $this->global, $data, NULL);
	}
	function turn_on($id = '', $segment='', $searchxx= NULL){
		if($this->usertype < 10 and $this->usertype > 20){
			$this->loadThis();
		}else{
			$toolInfo = array(
					'pmsts'=>1
					);
			$result = $this->toolpm_model->updatepm($toolInfo, $id);
			if($segment == '' AND $searchxx==''){
				redirect('toolpmset');
			}
			if($segment == '' AND !($searchxx=='')){
				redirect('toolpmset/0/'.$searchxx.'');
			}
			if(!($segment == '') AND $searchxx==''){
				redirect('toolpmset/'.$segment);
			}
			if(!($segment == '') AND !($searchxx=='')){
				redirect('toolpmset/'.$segment.'/'.$searchxx);
			}
		}
    }
	function turn_off($id = '', $segment='', $searchxx= NULL){
		if($this->usertype < 10 and $this->usertype > 20){
			$this->loadThis();
		}else{
			$toolInfo = array(
					'pmsts'=>0,
					'pmstart'=>0,
					'pmfreqsts'=>0,
					'pmdow'=>$dow
					);
			$result1 = $this->toolpm_model->updatepm($toolInfo, $id);
			$plannerInfo = array(
					'isValid'=>0
					);
			$result2 = $this->toolpm_model->updateticket($plannerInfo, $id);
			if($segment == '' AND $searchxx==''){
				redirect('toolpmset');
			}
			if($segment == '' AND !($searchxx=='')){
				redirect('toolpmset/0/'.$searchxx.'');
			}
			if(!($segment == '') AND $searchxx==''){
				redirect('toolpmset/'.$segment);
			}
			if(!($segment == '') AND !($searchxx=='')){
				redirect('toolpmset/'.$segment.'/'.$searchxx);
			}
		}
    }
	function setpmfreq(){
		if($this->usertype < 10 and $this->usertype > 20){
			$this->loadThis();
		}else{
			$pmfreq = $this->input->post('pmfreq');
			$searchxx = $this->input->post('searchxx');
			$segment = $this->input->post('segment');
			$id = $this->input->post('id');
			$toolInfo = array(
					'pmfreq'=>$pmfreq,
					'pmstart'=>0,
					'pmfreqsts'=>1,
					'pmdow'=>$dow
					);
			$result1 = $this->toolpm_model->updatepm($toolInfo, $id);
			$plannerInfo = array(
					'isValid'=>0
					);
			$result2 = $this->toolpm_model->updateticket($plannerInfo, $id);
			if($segment == '' AND $searchxx==''){
				redirect('toolpmset');
			}
			if($segment == '' AND !($searchxx=='')){
				redirect('toolpmset/0/'.$searchxx.'');
			}
			if(!($segment == '') AND $searchxx==''){
				redirect('toolpmset/'.$segment);
			}
			if(!($segment == '') AND !($searchxx=='')){
				redirect('toolpmset/'.$segment.'/'.$searchxx);
			}
		}
    }
	function toolschedule(){	
		$searchText = $this->input->post('searchText');
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$data['searchText'] = $searchText;
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$this->load->library('pagination');
		$count = $this->toolpm_model->toolscheduleCount($searchText, $fromDate, $toDate);
		$returns = $this->paginationCompress ( "toolschedule/", $count, 10);
		$data['toolschedule'] = $this->toolpm_model->toolschedule($searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : PM Ticket';
		$this->loadViews("t_toolpm/toolschedule", $this->global, $data, NULL);
	}
	function toolresult(){	
		$searchText = $this->input->post('searchText');
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$data['searchText'] = $searchText;
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$this->load->library('pagination');
		$count = $this->toolpm_model->toolresultCount($searchText, $fromDate, $toDate);
		$returns = $this->paginationCompress ( "toolresult/", $count, 10);
		$data['toolresult'] = $this->toolpm_model->toolresult($searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Ticket Result';
		$this->loadViews("t_toolpm/toolresult", $this->global, $data, NULL);
	}
	function viewtestresult_2tool($id){
		$newid = $this->toolpm_model->gettestresultbyid($id);
		$docdetail = $this->toolpm_model->getpmticketbyid($newid->ticket_id);
		$doc = $this->toolpm_model->getpmform($docdetail->doctitle);
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
						<td class="text-center" style="border: 1px solid black;"><b>TOOL PM SHEET</b></td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->title.'</b></td>
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
				$titlex = '';
				$title = '';
				if($title != $title2){$formx .= $titlex; $a=1;$xxx++;}
				$isian = $this->toolpm_model->getanswer($newid->unixtime, $record->id);
				$val = $isian->pm_val;
				if($record->answer_type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm" value="'.$val.'" disabled/>';}
				if($record->answer_type == 2){
				$n1 = '';$n2 = '';
				if($val == 1){$n1 = 'checked';}
				if($val == 2){$n2 = 'checked';}
				$input = '
				<label class="radio-inline"><input type="radio" value="1" '.$val.' disabled>YES</label>
				<label class="radio-inline"><input type="radio" value="2" '.$val.' disabled>NO</label>';}
				if($record->answer_type != 2 and $record->answer_type != 1){$input = $record->answer_type;}
			$formx .= '<tr>';
			$formx .= '<td class="text-center" style="border: 1px solid black;">'.$a.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->cond.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->stan.'</td>';
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
	function detailtoolpm($id = NULL){
		$data['id'] = $id;
		$data['detailtool'] = $this->toolpm_model->detailtool($id);
		$this->load->library('pagination');
		$count = $this->toolpm_model->detailtoolpmCount($id);
		$returns = $this->paginationCompress ( 'detailtoolpm/'.$id.'/', $count, 10,3 );
		$data['detailtoolpm'] = $this->toolpm_model->detailtoolpm($id, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Detail Tool PM';
		$this->loadViews("t_toolpm/detailtoolpm", $this->global, $data, NULL);
    }
	function todayschedule(){
		$searchText = $this->input->post('searchText');
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->toolpm_model->todayscheduleCount($searchText);
		$returns = $this->paginationCompress("todayschedule/", $count, 10);
		$data['todayschedule'] = $this->toolpm_model->todayschedule($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : PM Today';
		$this->loadViews("t_toolpm/todayschedule", $this->global, $data, NULL);
    }
	
	function toolpmform($id = NULL)
    {
		if($this->usertype < 10 and $this->usertype > 20){
            $this->loadThis();
		}else{
			$data['id'] = $id;
			$data['detailform'] = $this->toolpm_model->detailform($id);
			$this->global['pageTitle'] = 'RAWR : Tool PM Form';
       
			$this->loadViews("t_toolpm/toolpmform", $this->global, $data, NULL);
		}
    }
	
	function toolpmformexe()
    {
        if($this->usertype < 10 and $this->usertype > 20){
			$this->loadThis();
		}else{
            $this->load->library('form_validation');
            $id = $this->input->post('id');
            $this->form_validation->set_rules('vis','Visual','required|max_length[255]');
            $this->form_validation->set_rules('func','Function','required|max_length[255]');
            $this->form_validation->set_rules('result','Others','required|max_length[255]');
            if($this->form_validation->run() == FALSE)
            {
                $this->toolpmform($id);
            }
            else
            {
				
                $vis = $this->input->post('vis');
				$func = $this->input->post('func');
				$result = $this->input->post('result');
				
                $formInfo = array(
					'vis'=>$vis, 
					'func'=>$func, 
					'result'=> $result
					);
                
                $this->load->model('toolpm_model');
                $result = $this->toolpm_model->editform($formInfo, $id);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Data created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Data creation failed');
                }
                
                redirect('todayschedule');
            }
        }
    }
	function pmform(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->toolpm_model->tooltestCount($searchText);
		$returns = $this->paginationCompress ( "tooltest/", $count, 10 );
		$data['testform'] = $this->toolpm_model->tooltest($searchText, $returns["page"], $returns["segment"]);
		$this->global['pageTitle'] = 'RAWR : Testsheet';
		$this->loadViews("t_toolpm/tooltest", $this->global, $data, NULL);
	}
	function addpmform(){
		$title = $this->input->post('title');
		$forminfo = array('title'=>$title, 'cond'=>'Default', 'stan'=>'Default', 'answer_type'=>1);
		$this->toolpm_model->addpmform($forminfo);
		redirect('pmform');
	}
	function viewpmform($id){
		$docdetail = $this->toolpm_model->getpmformbyid($id);
		$doc = $this->toolpm_model->getpmform($docdetail->title);
		$img = $this->toolpm_model->getimageadd($docdetail->title);
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
						<td class="text-center" style="border: 1px solid black;"><b>TOOL PM SHEET</b></td>
					</tr>
					<tr>
						<td class="text-center" style="border: 1px solid black;"><b>'.$record->title.'</b></td>
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
				$titlex = '';
				$title = '';
				if($title != $title2){$formx .= $titlex; $a=1;$xxx++;}
				if($record->answer_type == 1){$input = '<input type="number" step="0.1" class="form-control input-sm"/>';}
				if($record->answer_type == 2){$input = '
				<label class="radio-inline"><input type="radio" value="1">YES</label>
				<label class="radio-inline"><input type="radio" value="2">NO</label>';}
				if($record->answer_type != 2 and $record->answer_type != 1){$input = $record->answer_type;}
			$formx .= '<tr>';
			$formx .= '<td class="text-center" style="border: 1px solid black;">'.$a.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->cond.'</td>';
			$formx .= '<td style="border: 1px solid black;">'.$record->stan.'</td>';
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
	function editpmform($id){
		$docdetail = $this->toolpm_model->getpmformbyid($id);
		$data['doc'] = $this->toolpm_model->getpmform($docdetail->title);
		$this->global['pageTitle'] = 'RAWR : Edit Tool PM sheet';
		$this->loadViews("t_toolpm/editpmform", $this->global, $data, NULL);
	}
	function edittestparam_2tool(){
		$cond = $this->input->post('cond');
		$stan = $this->input->post('stan');
		$answer_type = $this->input->post('answer_type');
		$id = $this->input->post('id');
		$forminfo = array(
				'cond'=>$cond,
				'stan'=>$stan,
				'answer_type'=>$answer_type
			);
		$result = $this->toolpm_model->edittestparam($forminfo, $id);
		redirect('editpmform/'.$id);
	}
	function addtestpart_2tool(){
		$title = $this->input->post('title');
		$cond = $this->input->post('cond');
		$stan = $this->input->post('stan');
		$answer_type = $this->input->post('answer_type');
		$id = $this->input->post('id');
		$forminfo = array(
				'title'=>$title,
				'cond'=>$cond,
				'stan'=>$stan,
				'answer_type'=>$answer_type
			);
		$result = $this->toolpm_model->adddevtest($forminfo);
		redirect('editpmform/'.$id);
	}
	function deltestrow_2tool(){
		$id = $this->input->post('id');
		$forminfo = array('isvalid'=>0);
		$result = $this->toolpm_model->edittestparam($forminfo, $id);
		$docdetail = $this->toolpm_model->getpmformbyid($id);
		$id = $this->toolpm_model->gettestformID($docdetail->title);
		if(!empty($id)){
			redirect('editpmform/'.$id->id);
		}else{
			redirect('pmform');
		}
	}
	function linktopm($id = '', $segment='', $searchxx= NULL){
		if($segment == '' AND $searchxx==''){
			$data['redirect'] = 'toolpmset';
		}
		if($segment == '' AND !($searchxx=='')){
			$data['redirect'] = 'toolpmset/0/'.$searchxx;
		}
		if(!($segment == '') AND $searchxx==''){
			$data['redirect'] = 'toolpmset/'.$segment;
		}
		if(!($segment == '') AND !($searchxx=='')){
			$data['redirect'] = 'toolpmset/'.$segment.'/'.$searchxx;
		}
		$data['tool'] = $this->toolpm_model->gettooldetail($id);
		$data['pmform'] = $this->toolpm_model->getallpmform();
		$this->global['pageTitle'] = 'RAWR : Edit Tool PM sheet';
		$this->loadViews("t_toolpm/setpmdoc", $this->global, $data, NULL);
    }
	function edittooldoc(){
		$redirect = $this->input->post('redirect');
		$pmform = $this->input->post('pmform');
		$id = $this->input->post('id');
		$forminfo = array('doctitle'=>$pmform);
		$result = $this->toolpm_model->updatepm($forminfo, $id);
		redirect($redirect);
	}
	function setpmtool($id){
		$pmstart = $this->input->post('pmstart');
		$redirect = $this->input->post('redirect');
		$pmstart = date('U', strtotime($pmstart)) + 25200;
		$toolinfo = array('pmstart'=>$pmstart);
		$upup = $this->toolpm_model->updatepm($toolinfo, $id);
		$plannerInfo = array(
				'isValid'=>0
				);
		$result2 = $this->toolpm_model->updateticket($plannerInfo, $id);
		redirect($redirect);
	}
	function todaytoolpm(){
		$a = $this->toolpm_model->todayscheduleCount('');
		echo $a;
	}
}

?>