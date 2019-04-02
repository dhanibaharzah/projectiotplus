<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Hse_login extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hse_login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
	function tochecker($app1 = NULL, $app2 = NULL, $app3 = NULL, $app4 = NULL, $app5 = NULL)
	{
		$checking = $this->hse_login_model->check_permit($app1,$app2,$app3,$app4,$app5);
		if(!empty($checking)){
			foreach($checking as $record){
				$jsa_main = $this->hse_login_model->get_jsa($record->jsa_id);
				$activitylist = $this->hse_login_model->get_activity($record->jsa_id);
				$workerlist = $this->hse_login_model->get_worker($record->jsa_id);
				
				$override = $this->hse_login_model->get_override($record->jsa_id);
				$apd = $this->hse_login_model->get_apd($record->jsa_id);
				$loto = $this->hse_login_model->get_loto($record->jsa_id);
				$tool = $this->hse_login_model->get_tool($record->jsa_id);
				$energy = $this->hse_login_model->get_energy($record->jsa_id);
				
				$subject = 'Persetujuan Work Permit';
				if($record->permit_type == 1){
					$iki = 'IJIN PEKERJAAN PANAS';
					$cek1 = $this->hse_login_model->get_checklist('General');
					$cek2 = $this->hse_login_model->get_checklist('HOT');
				}
				if($record->permit_type == 2){
					$iki = 'IJIN BEKERJA DI KETINGGIAN';
					$cek1 = $this->hse_login_model->get_checklist('General');
					$cek2 = $this->hse_login_model->get_checklist('WAH');
				}
				if($record->permit_type == 3){
					$iki = 'IJIN PEKERJAAN RUANG TERBATAS';
					$cek1 = $this->hse_login_model->get_checklist('General');
					$cek2 = $this->hse_login_model->get_checklist('Confined');
				}
				if($record->permit_type == 4){
					$iki = 'IJIN PENGGALIAN';
					$cek1 = $this->hse_login_model->get_checklist('General');
					$cek2 = $this->hse_login_model->get_checklist('Galian');
				}
				if($record->permit_type == 5){
					$iki = 'IJIN PEKERJAAN LISTRIK';
					$cek1 = $this->hse_login_model->get_checklist('General');
					$cek2 = $this->hse_login_model->get_checklist('Listrik');
				}
				if($record->permit_type == 6){
					$iki = 'IJIN PEKERJAAN UMUM';
					$cek1 = $this->hse_login_model->get_checklist('General');
					$cek2 = '';
				}
				$message = '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
				$message .=	'<tr><td width="25%" align="center"><h3 style="color:red">PT SLCI</h3></td><td colspan="2" align="center"><h3><b>JOB SAFETY AND ENVIRONTMENT<br>ANALYSIS</b></h3></td><td width="25%"></td></tr>';
				$message .= '</table>';
				
				$message .= '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
				$message .=	'<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: '.$jsa_main->job_name.'</td></tr>';
				$message .=	'<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: '.$jsa_main->area.'</td></tr>';
				$message .=	'<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: '.$jsa_main->start_date.' , <b>Jam : </b>'.$jsa_main->start_hour.':00 - '.$jsa_main->end_hour.':00</td></tr>';
				$message .=	'<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: '.$jsa_main->supervisor.' <b>HP: </b>+62'.$jsa_main->supervisor_hp.'</td></tr>';
				$message .=	'<tr><td width="20%"><b>Description</b></td><td width="80%">: '.$jsa_main->description.'</td></tr>';
				$message .= '</table>';
				$message .= '<br>';
				$message .= '<table border="1" cellspacing="0" cellpadding="3" width="100%">
					<tr>
						<th align="center">No</th>
						<th align="center">Aktifitas/Langkah Kerja</th>
						<th align="center">Potensi Bahaya</th>
						<th align="center">Kontrol Bahaya</th>
					</tr>';
				
				$no =0;
				if(!empty($activitylist)){
					$a=1;
					$all=1;
					$act='';
					foreach($activitylist as $recordx){
						$message .='<tr><td width="5%" align="center">';
						if($act != $recordx->activity){$no++; $message .=  $no; }
						$message .= '</td>';
						$message .= '<td width="30%">';
						if($act != $recordx->activity){
							$a = 1;
							$message .= $recordx->activity;
						}
						$message .= '</td>';
						$message .= '<td width="30%">';
						$message .= '<table class="table table-hover">';
						$message .= '<tr>';
						$message .= '<td width="5%">'.$a.'</td>';
						$message .= '<td width="95%">'.$recordx->risk.'</td>';
						$message .= '</tr>
									</table>
								</td>
								<td width="30%">
									<table class="table table-hover">
										<tr>
											<td width="5%">'.$a.'</td>
											<td width="95%">'.$recordx->control.'</td>
										</tr>
									</table>
								</td>
							</tr>';
						$act = $recordx->activity;
						$a++;
						$all++;
					}
				}
				$message .= '</table><p></p>';
				$message .= '<table border="1" cellspacing="0" cellpadding="3" width="100%">
					<tr>
						<th align="center">No</th>
						<th align="center">Nama</th>
						<th align="center">Fungsi</th>
					</tr>';
				
				if(!empty($workerlist)){
					$a=1;
					foreach($workerlist as $recordx){
						$message .='<tr>';
						$message .= '<td width="5%" align="center">'.$a.'</td>';
						$message .= '<td width="45%">'.$recordx->name.'</td>';
						$message .= '<td width="50%">'.$recordx->func.'</td>';
						$message .= '<tr>';
						$a++;
					}
				}
				$message .= '</table><p></p>';
				$message .= '<table border="1" cellspacing="0" cellpadding="3" width="100%">';
				$message .=	'<tr><td width="25%" align="center"><h3 style="color:red">PT SLCI</h3></td><td colspan="2" align="center"><h3><b>'.$iki.'</b></h3></td><td width="25%"></td></tr>';
				$message .= '<tr><td colspan="2" width="50%"><b>Tanggal Permohonan: </b>'.$record->created_on.'</td><td colspan="2" width="50%"><b>Pelaksana: </b>'.$jsa_main->user.'</td></tr>';
				$message .= '<tr><td colspan="4"><b>A. PERMOHONAN</b><br>';
				$message .= 'Nama Pekerjaan: '.$jsa_main->job_name.'<br>';
				$message .= 'Lokasi: '.$jsa_main->area.'<br>';
				$message .= 'Tanggal: '.$jsa_main->start_date.', Jam: '.$jsa_main->start_hour.':00 - '.$jsa_main->end_hour.':00<br></td></tr>';
				$message .= '<tr><td colspan="4"><b>B. CHECKLIST '.$iki.' </b><br>';
				if(!empty($cek1)){
					$a=1;
					foreach($cek1 as $listdata){
						if($a == 1){$value = $record->param1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 2){$value = $record->param2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 3){$value = $record->param3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 4){$value = $record->param4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 5){$value = $record->param5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 6){$value = $record->param6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 7){$value = $record->param7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 8){$value = $record->param8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 9){$value = $record->param9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 10){$value = $record->param10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 11){$value = $record->param11;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 12){$value = $record->param12;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 13){$value = $record->param13;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 14){$value = $record->param14;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($a == 15){$value = $record->param15;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						$message .= '   '.$a.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
						$a++;
					}
				}
				if(!empty($cek2)){
					$b=$a;
					$x=1;
					foreach($cek2 as $listdata){
						if($x == 1){$value = $record->cek1;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 2){$value = $record->cek2;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 3){$value = $record->cek3;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 4){$value = $record->cek4;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 5){$value = $record->cek5;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 6){$value = $record->cek6;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 7){$value = $record->cek7;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 8){$value = $record->cek8;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 9){$value = $record->cek9;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						if($x == 10){$value = $record->cek10;if($listdata->answer_type == 1){if($value == 1){$ans = 'YA';}if($value == 2){$ans = 'TIDAK';}if($value == 3){$ans = 'TIDAK PERLU';}}if($listdata->answer_type == 2){$ans = $value;}}
						$message .= '   '.$b.'. '.$listdata->question.' <b>'.$ans.'</b><br>';
						$b++;
					}
				}
				$message .= '</td></tr>';
				$message .= '<tr><td colspan="4"><b>C. PELEPASAN PERANGKAT SAFETY</b><br>';
				if(!empty($override)){
					$n=1;
					foreach($override as $items){
						$message .= $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					$message .= 'Tidak terdapat pelepasan perangkat safety <br>';
				}
				$message .= '</td></tr>';
				$message .= '<tr><td colspan="2" width="50%"><b>D. ALAT PELINDUNG DIRI YANG DIGUNAKAN</b><br>';
				if(!empty($apd)){
					$n=1;
					foreach($apd as $items){
						$message .= $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					$message .= 'Tidak diperlukan APD <br>';
				}
				$message .= '</td>';
				$message .= '<td colspan="2" width="50%"><b>E. TITIK LOCKOUT TAGOUT (LOTO)</b><br>';
				if(!empty($loto)){
					$n=1;
					foreach($loto as $items){
						$message .= $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					$message .= 'Tidak diperlukan LOTO <br>';
				}
				$message .= '</td></tr>';
				$message .= '<tr><td colspan="2" width="50%"><b>F. PERALATAN YANG DIGUNAKAN</b><br>';
				if(!empty($tool)){
					$n=1;
					foreach($tool as $items){
						$message .= $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					$message .= 'Tidak diperlukan alat kerja <br>';
				}
				$message .= '</td>';
				$message .= '<td colspan="2" width="50%"><b>G. SUMBER ENERGY YANG DIGUNAKAN</b><br>';
				if(!empty($energy)){
					$n=1;
					foreach($energy as $items){
						$message .= $n.'. '.$items->toolname.'<br>';
						$n++;
					}
				}else{
					$message .= 'Tidak diperlukan energy <br>';
				}
				$message .= '</td></tr></table>';
				$message .= '<table border="1" cellspacing="0" cellpadding="3" width="100%"><tr>
					<td style="background-color: #3cea3c;border-color: #0f6d0f;border: 2px solid #45b7af;padding: 10px;text-align: center;" width="50%">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'checker/'.$jsa_main->id.'/'.$record->id.'/1">
									Approve
									</a>
								</td>
								<td style="background-color: #e51616;border-color: #ad0606;border: 2px solid #45b7af;padding: 3px;text-align: center;" width="50%">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'checker/'.$jsa_main->id.'/'.$record->id.'/2">
									Reject
									</a>
								</td>
					</tr>';
				$message .= '</table>';
				$check = '';
				$pic = '';
				$sd = '';
				$manager = '';
				if(!empty($jsa_main->check)){$check = $jsa_main->check;}
				if(!empty($jsa_main->pic)){$pic = $jsa_main->pic;}
				if(!empty($jsa_main->sd)){$sd = $jsa_main->sd;}
				if(!empty($jsa_main->manager)){$manager = $jsa_main->manager;}
				$message .= '<br><br><table border="1" cellspacing="0" cellpadding="3" width="100%">
					<tr>
						<td width="20%" align="center"><b>Dibuat Oleh:</b><br>'.$jsa_main->user.'</td>
						<td width="20%" align="center"';
				if($record->app2 == 1){$message .= 'style="background-color: #3cea3c;"';}
				$message .= '><b>Pemilik Pekerjaan:</b><br>'.$check.'</td>
						<td width="20%" align="center"';
				if($record->app3 == 1){$message .= 'style="background-color: #3cea3c;"';}		
				$message .= '><b>Pemilik Area Kerja:</b><br>'.$pic.'</td>
						<td width="20%" align="center"';
				if($record->app4 == 1){$message .= 'style="background-color: #3cea3c;"';}		
				$message .= '><b>Safety Officer:</b><br>'.$sd.'</td>
						<td width="20%" align="center"';
				if($record->app5 == 1){$message .= 'style="background-color: #3cea3c;"';}		
				$message .= '><b>Manager:</b><br>'.$manager.'</td>
					</tr></table>';
				$body = '
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
						
						<style type="text/css">
						table {
							border-collapse: collapse;
						}
						table, th, td {
							border: 1px solid black;
						}
						body {
							font-family: Arial, Verdana, Helvetica, sans-serif;
							font-size: 16px;
						}
						</style>
					</head>
					<body>
						' . $message . '<br>
						
					</body>
					
				</html>';
				if($app1 == 1 AND $app2 == 0 AND $app3 == 0 AND $app4 == 0 AND $app5 == 0){
					if(!empty($jsa_main->check)){
						$receiver = $this->hse_login_model->get_emailbyname($jsa_main->check);
						if(!empty($receiver)){
							$rec = '';
							foreach($receiver as $record){
								$rec .= $record->slcimail.', ';
							}
						}
						$mailuser = substr($rec, 0, -2);
					}else{
						$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->check_id);
						if(!empty($receiver)){
							$rec = '';
							foreach($receiver as $record){
								$rec .= $record->slcimail.', ';
							}
						}
						$mailuser = substr($rec, 0, -2);
					}
				}
				if($app1 == 1 AND $app2 == 1 AND $app3 == 0 AND $app4 == 0 AND $app5 == 0){
					$receiver = $this->hse_login_model->get_emailbyname($jsa_main->pic);
					if(!empty($receiver)){
						$rec = '';
						foreach($receiver as $record){
							$rec .= $record->slcimail.', ';
						}
					}
					$mailuser = substr($rec, 0, -2);
				}
				if($app1 == 1 AND $app2 == 1 AND $app3 == 1 AND $app4 == 0 AND $app5 == 0){
					$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->sd_id);
					if(!empty($receiver)){
						$rec = '';
						foreach($receiver as $record){
							$rec .= $record->slcimail.', ';
						}
					}
					$mailuser = substr($rec, 0, -2);
				}
				if($app1 == 1 AND $app2 == 1 AND $app3 == 1 AND $app4 == 1 AND $app5 == 0){
					$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->manager_id);
					if(!empty($receiver)){
						$rec = '';
						foreach($receiver as $record){
							$rec .= $record->slcimail.', ';
						}
					}
					$mailuser = substr($rec, 0, -2);
				}
				$this->load->library('email');

				$config['protocol'] = 'smtp';//
				$config['smtp_host'] = 'smtp.gmail.com';//'mail.slci.co.id';//
				$config['smtp_user'] = 'codesys.slci@gmail.com';//'no-replay@slci.co.id';//
				$config['smtp_pass'] = '0bullshit';//'1234qwer';//
				$config['smtp_port'] = '587';//25;//
				$config['mailtype'] = 'html';//
				
				
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$this->email->initialize($config);
				$this->email->from('no-replay@slci.co.id', 'HSE PT SLCI');
				$this->email->to($mailuser);
				
				//$this->email->bcc('akbar@slci.co.id');
				
				$this->email->subject($subject);
				$this->email->message($message);

				$this->email->send();
			
				echo $this->email->print_debugger(array('headers'));
			}
		}
	exit;
	}
	function linechecker($app1 = NULL, $app2 = NULL, $app3 = NULL, $app4 = NULL, $app5 = NULL)
	{ 
		$checking = $this->hse_login_model->check_permitsaved($app1,$app2,$app3,$app4,$app5);
		//echo var_dump($checking);
		if(!empty($checking)){
			foreach($checking as $record){
				$cekjsa = $this->hse_login_model->get_jsa($record->jsa_id);
				
				$unix = date('U');
				$unix = $unix + 3600;
				$start_date = date('Y-m-d'); 
				$start_hour = date('H');
				if($cekjsa->saved == 1 and (($cekjsa->start_date > $start_date) or ($cekjsa->start_date == $start_date and $cekjsa->start_hour >= $start_hour))){
					$jsa_main = $this->hse_login_model->get_jsa($record->jsa_id);
					
					$subject = 'Permintaan Pemeriksaan Work Permit';
					if($record->permit_type == 1){
						$iki = 'IJIN PEKERJAAN PANAS';
					}
					if($record->permit_type == 2){
						$iki = 'IJIN BEKERJA DI KETINGGIAN';
					}
					if($record->permit_type == 3){
						$iki = 'IJIN PEKERJAAN RUANG TERBATAS';
					}
					if($record->permit_type == 4){
						$iki = 'IJIN PENGGALIAN';
					}
					if($record->permit_type == 5){
						$iki = 'IJIN PEKERJAAN LISTRIK';
					}
					if($record->permit_type == 6){
						$iki = 'IJIN PEKERJAAN UMUM';
					}
					
					$message =	'Job Name:'.$jsa_main->job_name;$message .=	'
';
					$message .=	'Lokasi: '.$jsa_main->area;$message .=	'
';
					$message .=	'Tgl: '.$jsa_main->start_date;$message .='
';
					$message .= 'Jam: '.$jsa_main->start_hour.':00 - '.$jsa_main->end_hour.':00';$message .='
';
					$message .=	'Supervisor: '.$jsa_main->supervisor.' HP: +62'.$jsa_main->supervisor_hp;$message .='
';
					$message .=	'Deskripsi: '.$jsa_main->description;$message .='
';
					$message .=	'Permintaan: '.$iki;$message .='
';
					
					$message .='Check link: '.base_url().'linecheck/'.$jsa_main->id.'/'.$record->id;
					
					if($app1 == 1 AND $app2 == 0 AND $app3 == 0 AND $app4 == 0 AND $app5 == 0){
						if(!empty($jsa_main->check)){
							$receiver = $this->hse_login_model->get_emailbyname($jsa_main->check);
						}else{
							$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->check_id);
						}
					}
					if($app1 == 1 AND $app2 == 1 AND $app3 == 0 AND $app4 == 0 AND $app5 == 0){
						if(!empty($jsa_main->pic_id)){
							$receiver = $this->hse_login_model->get_emailbypicar($jsa_main->pic_id);
						}else{
							$receiver = $this->hse_login_model->get_emailbyname($jsa_main->pic);
						}
					}
					if($app1 == 1 AND $app2 == 1 AND $app3 == 1 AND $app4 == 0 AND $app5 == 0){
						if(!empty($jsa_main->sd_id)){
							$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->sd_id);
						}else{
							$receiver = $this->hse_login_model->get_emailbyname($jsa_main->sd);
						}
					}
					if($app1 == 1 AND $app2 == 1 AND $app3 == 1 AND $app4 == 1 AND $app5 == 0){
						if(!empty($jsa_main->sd_id)){
							$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->manager_id);
						}else{
							$receiver = $this->hse_login_model->get_emailbyname($jsa_main->manager);
						}
					}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					if(!empty($receiver)){
						//echo var_dump($receiver);
						foreach($receiver as $record){
							$user_id    = $record->lineid;
							$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
							$response           = $bot->pushMessage($user_id, $textMessageBuilder);
						}
					}
				}
			}
		}
		exit;
	}
	function submitlinechecker($id = NULL)
	{
		$permittipe = '';
		$checking = $this->hse_login_model->get_permit($id);
		if(!empty($checking)){
				$jsa_main = $this->hse_login_model->get_jsa($checking->jsa_id);
				
				$subject = 'Permintaan Pemeriksaan Work Permit';
				if($checking->permit_type == 1){
					$iki = 'IJIN PEKERJAAN PANAS';
					$permittipe = 1;
				}
				if($checking->permit_type == 2){
					$iki = 'IJIN BEKERJA DI KETINGGIAN';
					$permittipe = 2;
				}
				if($checking->permit_type == 3){
					$iki = 'IJIN PEKERJAAN RUANG TERBATAS';
					$permittipe = 3;
				}
				if($checking->permit_type == 4){
					$iki = 'IJIN PENGGALIAN';
					$permittipe = 4;
				}
				if($checking->permit_type == 5){
					$iki = 'IJIN PEKERJAAN LISTRIK';
					$permittipe = 5;
				}
				if($checking->permit_type == 6){
					$iki = 'IJIN PEKERJAAN UMUM';
					$permittipe = 6;
				}
				
				$message =	'Job Name:'.$jsa_main->job_name;$message .=	'
';
				$message .=	'Lokasi: '.$jsa_main->area;$message .=	'
';
				$message .=	'Tgl: '.$jsa_main->start_date;$message .='
';
				$message .= 'Jam: '.$jsa_main->start_hour.':00 - '.$jsa_main->end_hour.':00';$message .='
';
				$message .=	'Supervisor: '.$jsa_main->supervisor.' HP: +62'.$jsa_main->supervisor_hp;$message .='
';
				$message .=	'Deskripsi: '.$jsa_main->description;$message .='
';
				$message .=	'Permintaan: '.$iki;$message .='
';
				$message .='Check link: '.base_url().'linecheck/'.$jsa_main->id.'/'.$checking->id;
				if($checking->app1 == 1 AND $checking->app2 == 0 AND $checking->app3 == 0 AND $checking->app4 == 0 AND $checking->app5 == 0){
					if(!empty($jsa_main->check)){
						$receiver = $this->hse_login_model->get_emailbyname($jsa_main->check);
					}else{
						$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->check_id);
					}
				}
				if($checking->app1 == 1 AND $checking->app2 == 1 AND $checking->app3 == 0 AND $checking->app4 == 0 AND $checking->app5 == 0){
					$receiver = $this->hse_login_model->get_emailbypicar($jsa_main->pic_id);
				}
				if($checking->app1 == 1 AND $checking->app2 == 1 AND $checking->app3 == 1 AND $checking->app4 == 0 AND $checking->app5 == 0){
					$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->sd_id);
				}
				if($checking->app1 == 1 AND $checking->app2 == 1 AND $checking->app3 == 1 AND $checking->app4 == 1 AND $checking->app5 == 0){
					$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->manager_id);
				}
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				if(!empty($receiver)){
					foreach($receiver as $record){
						$user_id    = $record->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
		}
		$next_2 = $this->hse_login_model->get_permit_cek($checking->jsa_id, 2);
		$next_3 = $this->hse_login_model->get_permit_cek($checking->jsa_id, 3);
		$next_4 = $this->hse_login_model->get_permit_cek($checking->jsa_id, 4);
		$next_5 = $this->hse_login_model->get_permit_cek($checking->jsa_id, 5);
		if($permittipe == 5){redirect('myjsa');}
		elseif($permittipe == 6){redirect('myjsa');}
		elseif($permittipe == 1 and (!empty($next_2))){redirect('permit/2/'.$checking->jsa_id);}
		elseif($permittipe == 1 and (!empty($next_3))){redirect('permit/3/'.$checking->jsa_id);}
		elseif($permittipe == 1 and (!empty($next_4))){redirect('permit/4/'.$checking->jsa_id);}
		elseif($permittipe == 1 and (!empty($next_5))){redirect('permit/5/'.$checking->jsa_id);}
		elseif($permittipe == 2 and (!empty($next_3))){redirect('permit/3/'.$checking->jsa_id);}
		elseif($permittipe == 2 and (!empty($next_4))){redirect('permit/4/'.$checking->jsa_id);}
		elseif($permittipe == 2 and (!empty($next_5))){redirect('permit/5/'.$checking->jsa_id);}
		elseif($permittipe == 3 and (!empty($next_4))){redirect('permit/4/'.$checking->jsa_id);}
		elseif($permittipe == 3 and (!empty($next_5))){redirect('permit/5/'.$checking->jsa_id);}
		elseif($permittipe == 4 and (!empty($next_5))){redirect('permit/5/'.$checking->jsa_id);}
		else{redirect('myjsa');}
	}
	function checker($jsa_id = NULL, $permit_id = NULL, $code = NULL){
		$data['jsa_id'] = $jsa_id;
		$data['permit_id'] = $permit_id;
		$data['code'] = $code;
		$data['namejob'] = $this->hse_login_model->get_jsa($jsa_id);
		$this->load->view('hse_jsa/checker', $data);
	}
	function linecheck($jsa_id = NULL, $permit_id = NULL){
		$jsa = $this->hse_login_model->get_jsa($jsa_id);
		$permit = $this->hse_login_model->get_permit($permit_id);
		if($permit->isvalid == 0 or $jsa->isvalid == 0 or $jsa->saved == 0){
			$data['note'] = 'Permit ini dibatalkan oleh user';
			$this->load->view('hse_jsa/checked', $data);
		}else{
			$data['jsa'] = $jsa;
			$data['permit'] = $permit;
			$data['activitylist'] = $this->hse_login_model->get_activity($jsa_id);
			$data['workerlist'] = $this->hse_login_model->get_worker($jsa_id);
					
			$data['override'] = $this->hse_login_model->get_override($jsa_id);
			$data['apd'] = $this->hse_login_model->get_apd($jsa_id);
			$data['loto'] = $this->hse_login_model->get_loto($jsa_id);
			$data['tool'] = $this->hse_login_model->get_tool($jsa_id);
			$data['energy'] = $this->hse_login_model->get_energy($jsa_id);
			
			if($permit->permit_type == 1){
				$data['iki'] = 'IJIN PEKERJAAN PANAS';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('HOT');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s1_unix);
				if(!empty($jsa->acc_unix12)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix12);}
				if(!empty($jsa->acc_unix13)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix13);}
				if(!empty($jsa->acc_unix14)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix14);}
				if(!empty($jsa->a1_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a1_unix);}
			}
			if($permit->permit_type == 2){
				$data['iki'] = 'IJIN BEKERJA DI KETINGGIAN';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('WAH');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s2_unix);
				if(!empty($jsa->acc_unix22)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix22);}
				if(!empty($jsa->acc_unix23)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix23);}
				if(!empty($jsa->acc_unix24)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix24);}
				if(!empty($jsa->a2_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a2_unix);}
			}
			if($permit->permit_type == 3){
				$data['iki'] = 'IJIN PEKERJAAN RUANG TERBATAS';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('Confined');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s3_unix);
				if(!empty($jsa->acc_unix32)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix32);}
				if(!empty($jsa->acc_unix33)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix33);}
				if(!empty($jsa->acc_unix34)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix34);}
				if(!empty($jsa->a3_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a3_unix);}
			}
			if($permit->permit_type == 4){
				$data['iki'] = 'IJIN PENGGALIAN';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('Galian');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s4_unix);
				if(!empty($jsa->acc_unix42)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix42);}
				if(!empty($jsa->acc_unix43)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix43);}
				if(!empty($jsa->acc_unix44)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix44);}
				if(!empty($jsa->a4_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a4_unix);}
			}
			if($permit->permit_type == 5){
				$data['iki'] = 'IJIN PEKERJAAN LISTRIK';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('Listrik');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s5_unix);
				if(!empty($jsa->acc_unix52)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix52);}
				if(!empty($jsa->acc_unix53)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix53);}
				if(!empty($jsa->acc_unix54)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix54);}
				if(!empty($jsa->a5_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a5_unix);}
			}
			if($permit->permit_type == 6){
				$data['iki'] = 'IJIN PEKERJAAN UMUM';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = '';
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s6_unix);
				if(!empty($jsa->acc_unix62)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix62);}
				if(!empty($jsa->acc_unix63)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix63);}
				if(!empty($jsa->acc_unix64)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix64);}
				if(!empty($jsa->a6_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a6_unix);}
			}
			
			$data['check'] = $jsa->check;
			$data['pic'] = $jsa->pic;
			$data['sd'] = $jsa->sd;
			$data['manager'] = $jsa->manager;
			$data['user'] = $jsa->user;
			$data['app2'] = $permit->app2;
			$data['app3'] = $permit->app3;
			$data['app4'] = $permit->app4;
			$data['app5'] = $permit->app5;
			
			$this->load->view('hse_jsa/linecheck', $data);
		}
		
	}
	function justcheck($jsa_id = NULL, $permit_id = NULL){
		
		$jsa = $this->hse_login_model->get_jsa($jsa_id);
		$permit = $this->hse_login_model->get_permit($permit_id);
		$data['jsa'] = $jsa;
		$data['permit'] = $permit;
		$data['activitylist'] = $this->hse_login_model->get_activity($jsa_id);
		$data['workerlist'] = $this->hse_login_model->get_worker($jsa_id);
				
		$data['override'] = $this->hse_login_model->get_override($jsa_id);
		$data['apd'] = $this->hse_login_model->get_apd($jsa_id);
		$data['loto'] = $this->hse_login_model->get_loto($jsa_id);
		$data['tool'] = $this->hse_login_model->get_tool($jsa_id);
		$data['energy'] = $this->hse_login_model->get_energy($jsa_id);
		
		if($permit->permit_type == 1){
				$data['iki'] = 'IJIN PEKERJAAN PANAS';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('HOT');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s1_unix);
				if(!empty($jsa->acc_unix12)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix12);}
				if(!empty($jsa->acc_unix13)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix13);}
				if(!empty($jsa->acc_unix14)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix14);}
				if(!empty($jsa->a1_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a1_unix);}
			}
			if($permit->permit_type == 2){
				$data['iki'] = 'IJIN BEKERJA DI KETINGGIAN';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('WAH');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s2_unix);
				if(!empty($jsa->acc_unix22)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix22);}
				if(!empty($jsa->acc_unix23)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix23);}
				if(!empty($jsa->acc_unix24)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix24);}
				if(!empty($jsa->a2_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a2_unix);}
			}
			if($permit->permit_type == 3){
				$data['iki'] = 'IJIN PEKERJAAN RUANG TERBATAS';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('Confined');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s3_unix);
				if(!empty($jsa->acc_unix32)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix32);}
				if(!empty($jsa->acc_unix33)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix33);}
				if(!empty($jsa->acc_unix34)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix34);}
				if(!empty($jsa->a3_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a3_unix);}
			}
			if($permit->permit_type == 4){
				$data['iki'] = 'IJIN PENGGALIAN';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('Galian');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s4_unix);
				if(!empty($jsa->acc_unix42)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix42);}
				if(!empty($jsa->acc_unix43)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix43);}
				if(!empty($jsa->acc_unix44)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix44);}
				if(!empty($jsa->a4_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a4_unix);}
			}
			if($permit->permit_type == 5){
				$data['iki'] = 'IJIN PEKERJAAN LISTRIK';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = $this->hse_login_model->get_checklist('Listrik');
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s5_unix);
				if(!empty($jsa->acc_unix52)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix52);}
				if(!empty($jsa->acc_unix53)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix53);}
				if(!empty($jsa->acc_unix54)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix54);}
				if(!empty($jsa->a5_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a5_unix);}
			}
			if($permit->permit_type == 6){
				$data['iki'] = 'IJIN PEKERJAAN UMUM';
				$data['cek1'] = $this->hse_login_model->get_checklist('General');
				$data['cek2'] = '';
				$data['subdate'] = date('H:i:s d/m/Y', $jsa->s6_unix);
				if(!empty($jsa->acc_unix62)){$data['appdate1'] = date('H:i:s d/m/Y', $jsa->acc_unix62);}
				if(!empty($jsa->acc_unix63)){$data['appdate2'] = date('H:i:s d/m/Y', $jsa->acc_unix63);}
				if(!empty($jsa->acc_unix64)){$data['appdate3'] = date('H:i:s d/m/Y', $jsa->acc_unix64);}
				if(!empty($jsa->a6_unix)){$data['appdate4'] = date('H:i:s d/m/Y', $jsa->a6_unix);}
			}
		
		$data['check'] = $jsa->check;
		$data['pic'] = $jsa->pic;
		$data['sd'] = $jsa->sd;
		$data['manager'] = $jsa->manager;
		$data['user'] = $jsa->user;
		$data['app2'] = $permit->app2;
		$data['app3'] = $permit->app3;
		$data['app4'] = $permit->app4;
		$data['app5'] = $permit->app5;

		$this->load->model('hse_configurasi_model');
		$data['picar'] = $this->hse_configurasi_model->picar();
		
		$this->load->view('hse_jsa/justcheck', $data);
	}
	function monitor($jsa_id = NULL){
		$jsa = $this->hse_login_model->get_jsa($jsa_id);
		$data['jsa'] = $jsa;
		$data['activitylist'] = $this->hse_login_model->get_activity($jsa_id);
		$data['workerlist'] = $this->hse_login_model->get_worker($jsa_id);
		$data['override'] = $this->hse_login_model->get_override($jsa_id);
		$data['apd'] = $this->hse_login_model->get_apd($jsa_id);
		$data['loto'] = $this->hse_login_model->get_loto($jsa_id);
		$data['tool'] = $this->hse_login_model->get_tool($jsa_id);
		$data['energy'] = $this->hse_login_model->get_energy($jsa_id);
		$data['report'] = $this->hse_login_model->get_report($jsa_id);
		
		$permit_1 = $this->hse_login_model->get_permit_cek($jsa_id, 1);
		$permit_2 = $this->hse_login_model->get_permit_cek($jsa_id, 2);
		$permit_3 = $this->hse_login_model->get_permit_cek($jsa_id, 3);
		$permit_4 = $this->hse_login_model->get_permit_cek($jsa_id, 4);
		$permit_5 = $this->hse_login_model->get_permit_cek($jsa_id, 5);
		$permit_6 = $this->hse_login_model->get_permit_cek($jsa_id, 6);
		$data['permit_1'] = $permit_1;
		$data['permit_2'] = $permit_2;
		$data['permit_3'] = $permit_3;
		$data['permit_4'] = $permit_4;
		$data['permit_5'] = $permit_5;
		$data['permit_6'] = $permit_6;
		
		$data['cek0'] = $this->hse_login_model->get_checklist('General');
		$data['cek1'] = $this->hse_login_model->get_checklist('HOT');
		$data['cek2'] = $this->hse_login_model->get_checklist('WAH');
		$data['cek3'] = $this->hse_login_model->get_checklist('Confined');
		$data['cek4'] = $this->hse_login_model->get_checklist('Galian');
		$data['cek5'] = $this->hse_login_model->get_checklist('Listrik');
		
		$this->load->view('hse_jsa/monitor', $data);
	}
	function check_session(){
		$time = date('U');
		$note = $this->input->post('note');
		$code = $this->input->post('code');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jsa_id = $this->input->post('jsa_id');
		$permit_id = $this->input->post('permit_id');
		$result = $this->hse_login_model->loginjoin($username, $password);
		if(!empty($result)){
			$permit_data = $this->hse_login_model->get_permit($permit_id);
			$jsa_data = $this->hse_login_model->get_jsa($jsa_id);
			$ee = date('U');
			$start_date = date('Y-m-d', $ee);
			$start_hour = date('H', $ee);
			if(($jsa_data->start_date < $start_date) or ($jsa_data->start_date == $start_date and $jsa_data->start_hour < $start_hour)){
				$data['note'] = 'Sudah Kadaluarsa';
				$this->load->view('hse_jsa/checked', $data);
			}else{
				if($permit_data->app1 == 1 AND $permit_data->app2 == 0 AND $permit_data->app3 == 0 AND $permit_data->app4 == 0 AND $permit_data->app5 == 0){
					$checker = $this->hse_login_model->get_emailbyNIK($username);
					if($checker->hse_role == 10 OR $checker->hse_role == 11 OR $checker->hse_role == 12 OR $checker->hse_role == 13 OR $checker->hse_role == 14 OR $checker->hse_role == 15){
						if($code == 1){
							$permitInfo = array('notif'=>1,'app2'=>1, 'note_app2'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>4, 'check'=>$checker->uName, 'acc_unix12'=>$time);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>4, 'check'=>$checker->uName, 'acc_unix22'=>$time);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>4, 'check'=>$checker->uName, 'acc_unix32'=>$time);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>4, 'check'=>$checker->uName, 'acc_unix42'=>$time);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>4, 'check'=>$checker->uName, 'acc_unix52'=>$time);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>4, 'check'=>$checker->uName, 'acc_unix62'=>$time);}
							$add_inotif = $this->hse_login_model->add_inotif(1);
						}
						if($code == 2){
							$permitInfo = array('notif'=>1,'app1'=>0, 'app2'=>0, 'note_app2'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>1, 'check'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>1, 'check'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>1, 'check'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>1, 'check'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>1, 'check'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>1, 'check'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							$notifInfo = array('title'=>'Checker Reject', 'iden'=>$permit_data->id, 'user'=>$jsa_data->user);
							$add_notif = $this->hse_login_model->add_notif($notifInfo);
						}
						$update_permit = $this->hse_login_model->edit_permit($permitInfo, $permit_id);
						$update_jsa = $this->hse_login_model->update_jsa($jsaInfo, $jsa_id);
						
						$data['note'] = 'Terimakasih';
						$this->load->view('hse_jsa/checked', $data);
					}
					if($checker->hse_role == 10 AND $checker->hse_role != 11 AND $checker->hse_role != 12 AND $checker->hse_role != 13 AND $checker->hse_role != 14 AND $checker->hse_role != 15){
						$data['note'] = 'Invalid Role!';
						$this->load->view('hse_jsa/checked', $data);
					}
				}
				if($permit_data->app1 == 1 AND $permit_data->app2 == 1 AND $permit_data->app3 == 0 AND $permit_data->app4 == 0 AND $permit_data->app5 == 0){
					$checker = $this->hse_login_model->get_emailbyNIK($username);
					if($checker->hse_picar == $jsa_data->pic_id){
						if($code == 1){
							$permitInfo = array('notif'=>1,'app3'=>1, 'note_app3'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>5, 'pic'=>$checker->uName, 'acc_unix13'=>$time);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>5, 'pic'=>$checker->uName, 'acc_unix23'=>$time);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>5, 'pic'=>$checker->uName, 'acc_unix33'=>$time);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>5, 'pic'=>$checker->uName, 'acc_unix43'=>$time);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>5, 'pic'=>$checker->uName, 'acc_unix53'=>$time);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>5, 'pic'=>$checker->uName, 'acc_unix63'=>$time);}
							$add_inotif = $this->hse_login_model->add_inotif(2);
						}
						if($code == 2){
							$permitInfo = array('notif'=>1,'app1'=>0, 'app2'=>0, 'app3'=>0, 'note_app3'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>1, 'pic'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>1, 'pic'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>1, 'pic'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>1, 'pic'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>1, 'pic'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>1, 'pic'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							$notifInfo = array('title'=>'PIC Area Reject', 'iden'=>$permit_data->id, 'user'=>$jsa_data->user);
							$add_notif = $this->hse_login_model->add_notif($notifInfo);
						}
						$update_permit = $this->hse_login_model->edit_permit($permitInfo, $permit_id);
						$update_jsa = $this->hse_login_model->update_jsa($jsaInfo, $jsa_id);
						
						$data['note'] = 'Terimakasih';
						$this->load->view('hse_jsa/checked', $data);
					}
					if($checker->hse_picar != $jsa_data->pic_id){
						$data['note'] = 'Invalid PIC Area!';
						$this->load->view('hse_jsa/checked', $data);
					}
				}
				if($permit_data->app1 == 1 AND $permit_data->app2 == 1 AND $permit_data->app3 == 1 AND $permit_data->app4 == 0 AND $permit_data->app5 == 0){
					$checker = $this->hse_login_model->get_emailbyNIK($username);
					if($checker->hse_role == 10){
						if($code == 1){
							$permitInfo = array('notif'=>1,'app4'=>1, 'note_app4'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>6, 'sd'=>$checker->uName, 'acc_unix14'=>$time);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>6, 'sd'=>$checker->uName, 'acc_unix24'=>$time);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>6, 'sd'=>$checker->uName, 'acc_unix34'=>$time);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>6, 'sd'=>$checker->uName, 'acc_unix44'=>$time);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>6, 'sd'=>$checker->uName, 'acc_unix54'=>$time);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>6, 'sd'=>$checker->uName, 'acc_unix64'=>$time);}
							$add_inotif = $this->hse_login_model->add_inotif(3);
						}
						if($code == 2){
							$permitInfo = array('notif'=>1,'app1'=>0, 'app2'=>0, 'app3'=>0, 'app4'=>0, 'note_app4'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>1, 'sd'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>1, 'sd'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>1, 'sd'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>1, 'sd'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>1, 'sd'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>1, 'sd'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							$notifInfo = array('title'=>'Safety Officer Reject', 'iden'=>$permit_data->id, 'user'=>$jsa_data->user);
							$add_notif = $this->hse_login_model->add_notif($notifInfo);
						}
						$update_permit = $this->hse_login_model->edit_permit($permitInfo, $permit_id);
						$update_jsa = $this->hse_login_model->update_jsa($jsaInfo, $jsa_id);
						
						$data['note'] = 'Terimakasih';
						$this->load->view('hse_jsa/checked', $data);
					}
					if($checker->hse_role != 10){
						$data['note'] = 'Invalid! Your user setting is not safety officer';
						$this->load->view('hse_jsa/checked', $data);
					}
				}
				if($permit_data->app1 == 1 AND $permit_data->app2 == 1 AND $permit_data->app3 == 1 AND $permit_data->app4 == 1 AND $permit_data->app5 == 0){
					$checker = $this->hse_login_model->get_emailbyNIK($username);
					if($checker->hse_role == 1 OR $checker->hse_role == 2 OR $checker->hse_role == 3 OR $checker->hse_role == 4){
						if($code == 1){
							$permitInfo = array('notif'=>1,'app5'=>1, 'note_app5'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>7, 'manager'=>$checker->uName, 'a1_unix'=>$time);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>7, 'manager'=>$checker->uName, 'a2_unix'=>$time);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>7, 'manager'=>$checker->uName, 'a3_unix'=>$time);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>7, 'manager'=>$checker->uName, 'a4_unix'=>$time);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>7, 'manager'=>$checker->uName, 'a5_unix'=>$time);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>7, 'manager'=>$checker->uName, 'a6_unix'=>$time);}
							$notifInfo = array('title'=>'Manager OK', 'iden'=>$permit_data->id, 'user'=>$jsa_data->user);
						}
						if($code == 2){
							$permitInfo = array('notif'=>1,'app1'=>0, 'app2'=>0, 'app3'=>0, 'app4'=>0, 'app5'=>0, 'note_app4'=>$note);
							if($permit_data->permit_type == 1){$jsaInfo = array('panas'=>1, 'manager'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 2){$jsaInfo = array('tinggi'=>1, 'manager'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 3){$jsaInfo = array('terbatas'=>1, 'manager'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 4){$jsaInfo = array('penggalian'=>1, 'manager'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 5){$jsaInfo = array('listrik'=>1, 'manager'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							if($permit_data->permit_type == 6){$jsaInfo = array('general'=>1, 'manager'=>$checker->uName, 'rejected'=>1, 'saved'=>0);}
							$notifInfo = array('title'=>'Manager Reject', 'iden'=>$permit_data->id, 'user'=>$jsa_data->user);
						}
						$update_permit = $this->hse_login_model->edit_permit($permitInfo, $permit_id);
						$update_jsa = $this->hse_login_model->update_jsa($jsaInfo, $jsa_id);
						
						$add_notif = $this->hse_login_model->add_notif($notifInfo);
						
						$data['note'] = 'Terimakasih';
						$this->load->view('hse_jsa/checked', $data);
					}
					if($checker->hse_role != 1 AND $checker->hse_role != 2 AND $checker->hse_role != 3 AND $checker->hse_role == 4){
						$data['note'] = 'Invalid! Your user setting is not manager';
						$this->load->view('hse_jsa/checked', $data);
					}
				}
				if($permit_data->app1 == 1 AND $permit_data->app2 == 1 AND $permit_data->app3 == 1 AND $permit_data->app4 == 1 AND $permit_data->app5 == 1){
					$data['note'] = 'Maaf, Permit ini telah selesai diproses';
					$this->load->view('hse_jsa/checked', $data);
				}
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('hse_jsa/checked', $data);
		}
	}
	function report($id = NULL){
		$data['id'] = $id;
		$data['report'] = $this->hse_login_model->get_report($id);
		$this->load->view('hse_jsa/report', $data);
	}
	function report_session(){
		$report = $this->input->post('report');
		$correction = $this->input->post('correction');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jsa_id = $this->input->post('id');
		$result = $this->hse_login_model->loginjoin($username, $password);
		if(!empty($result)){
			$checker = $this->hse_login_model->get_emailbyNIK($username);
			$reportInfo = array(
				'report'=>$report,
				'correction'=>$correction,
				'user'=>$checker->uName,
				'jsa_id'=>$jsa_id
				);
			$add_report = $this->hse_login_model->add_report($reportInfo);
			$data['note'] = 'Your Report has been Submitted';
			$this->load->view('hse_jsa/checked', $data);
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('hse_jsa/checked', $data);
		}
	}
	
	function reportx($id = NULL){
		$this->load->helper(array('form', 'url'));
		$data['jsa'] = $this->hse_login_model->get_jsa($id);
		$data['id'] = $id;
		$data['report'] = $this->hse_login_model->get_report($id);
		$data['error'] = '';
		$this->load->view('hse_jsa/reportx', $data);
	}
	function report_sessionx(){
		$report = $this->input->post('report');
		$correction = $this->input->post('correction');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jsa_id = $this->input->post('id');
		$result = $this->hse_login_model->loginjoin($username, $password);

		
		$config['upload_path']          = './assets/permit';
		$config['allowed_types']        = '*';
		$config['max_size']             = 7048;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
		$new_name = $username.time();
		$config['file_name'] 			= $new_name;
		$this->load->library('upload', $config);
 
		if(! $this->upload->do_upload('berkas')){
			$new_name = '';
		}
		
		if(!empty($result)){
			$checker = $this->hse_login_model->get_emailbyNIK($username);
			$new_name = $this->upload->data('file_name');
			$reportInfo = array(
				'report'=>$report,
				'correction'=>$correction,
				'user'=>$checker->uName,
				'jsa_id'=>$jsa_id,
				'img_url'=>$new_name
				);
			$add_report = $this->hse_login_model->add_report($reportInfo);
			$data['note'] = 'Your Report has been Submitted';
			$this->load->view('hse_jsa/checked', $data);
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('hse_jsa/checked', $data);
		}
		
	}
	
	
	function gas($id = NULL)
	{
		$data['id'] = $id;
		$data['jsa_id'] = $this->hse_login_model->get_rep($id);
		
		$this->load->view('hse_jsa/gas', $data);
	}
	
	function gas_session(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$permit_id = $this->input->post('id');
		$cek1 = $this->input->post('o2');
		$cek2 = $this->input->post('h2s');
		$cek3 = $this->input->post('lel');
		$cek4 = $this->input->post('co');
		$jsa_id = $this->input->post('jsa_id');

		$result = $this->hse_login_model->loginjoin($username, $password);
		if(!empty($result)){
			$gasInfo = array(
				'cek1'=>$cek1,
				'cek2'=>$cek2,
				'cek3'=>$cek3,
				'cek4'=>$cek4
				);
			$add_report = $this->hse_login_model->edit_permit($gasInfo, $permit_id);
		
		if(!empty($result)){
			$user = $this->hse_login_model->get_emailbyNIK($username);
			$gasesInfo = array(
				'gas1'=>$cek1,
				'gas2'=>$cek2,
				'gas3'=>$cek3,
				'gas4'=>$cek4,
				'jsa_id'=>$jsa_id,
				'user'=>$user->uName
				);
			$report = $this->hse_login_model->insert_gas($gasesInfo, $jsa_id);

			$data['note'] = 'Your Gas Report has been Submitted';
			$this->load->view('hse_jsa/checked', $data);
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('hse_jsa/checked', $data);
	}
}
	


	
	function blood($id = NULL)
	{
		$data['workerlist'] = $this->hse_login_model->get_worker($id);
		$data['id'] = $id;
		$this->load->view('hse_jsa/blood', $data);
	}
	
	function blood_pressure(){
		$blood1 = $this->input->post('sistol[]');
		$blood2 = $this->input->post('diastol[]');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id = $this->input->post('id[]');
		$result = $this->hse_login_model->loginjoin($username, $password);
		$x = 0;
		if(!empty($result)){
			foreach($id as $record){
				$bloodinfo = array(
					'sistol'=>$blood1[$x],
					'diastol'=>$blood2[$x]
				);
				
				$add_report = $this->hse_login_model->edit_blood($bloodinfo, $record);

			$x++;
			}
			$data['note'] = 'Your Blood Pressure has been Submitted';
			$this->load->view('hse_jsa/checked', $data);
		}else{
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('hse_jsa/checked', $data);
		}
	}	
	//function close($id = NULL){
	function closex($id = NULL){
		$data['id'] = $id;
		$this->load->view('hse_jsa/close', $data);
	}
	function close_session(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jsa_id = $this->input->post('id');
		$result = $this->hse_login_model->loginjoin($username, $password);
		if(!empty($result)){
			$checker = $this->hse_login_model->get_emailbyNIK($username);
			$jsa_data = $this->hse_login_model->get_jsa($jsa_id);
			if($jsa_data->check == $checker->uName){
				$data['note'] = 'Request Close telah terkirim';
				$this->load->view('hse_jsa/checked', $data);
			}
			if($jsa_data->pic != $checker->uName){
				$data['note'] = 'Anda bukan Pengawas Pekerjaan ini';
				$this->load->view('hse_jsa/checked', $data);
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('hse_jsa/checked', $data);
		}
	}
	
	function scan_close(){
		$jsa_close = $this->hse_login_model->get_jsa_close();
		if(!empty($jsa_close)){
			foreach($jsa_close as $record){
				$message = 'Perminataan Close Pekerjaan';$message .='
';
				$message .= 'Link:';$message .='
';
				$message .= base_url().'pic_close/'.$record->id;$message .='
';
				$receiver = $this->hse_login_model->get_emailbyNAMA($record->pic);
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				$user_id    = $receiver->lineid;
				$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
				$response           = $bot->pushMessage($user_id, $textMessageBuilder);
			}
		}
	}
	function pic_close($jsa_id = NULL){
		$jsa = $this->hse_login_model->get_jsa($jsa_id);
		$data['jsa'] = $jsa;
		$data['activitylist'] = $this->hse_login_model->get_activity($jsa_id);
		$data['workerlist'] = $this->hse_login_model->get_worker($jsa_id);
		$data['override'] = $this->hse_login_model->get_override($jsa_id);
		$data['apd'] = $this->hse_login_model->get_apd($jsa_id);
		$data['loto'] = $this->hse_login_model->get_loto($jsa_id);
		$data['tool'] = $this->hse_login_model->get_tool($jsa_id);
		$data['energy'] = $this->hse_login_model->get_energy($jsa_id);
		$data['report'] = $this->hse_login_model->get_report($jsa_id);
		
		$permit_1 = $this->hse_login_model->get_permit_cek($jsa_id, 1);
		$permit_2 = $this->hse_login_model->get_permit_cek($jsa_id, 2);
		$permit_3 = $this->hse_login_model->get_permit_cek($jsa_id, 3);
		$permit_4 = $this->hse_login_model->get_permit_cek($jsa_id, 4);
		$permit_5 = $this->hse_login_model->get_permit_cek($jsa_id, 5);
		$permit_6 = $this->hse_login_model->get_permit_cek($jsa_id, 6);
		$data['permit_1'] = $permit_1;
		$data['permit_2'] = $permit_2;
		$data['permit_3'] = $permit_3;
		$data['permit_4'] = $permit_4;
		$data['permit_5'] = $permit_5;
		$data['permit_6'] = $permit_6;
		
		$data['cek0'] = $this->hse_login_model->get_checklist('General');
		$data['cek1'] = $this->hse_login_model->get_checklist('HOT');
		$data['cek2'] = $this->hse_login_model->get_checklist('WAH');
		$data['cek3'] = $this->hse_login_model->get_checklist('Confined');
		$data['cek4'] = $this->hse_login_model->get_checklist('Galian');
		$data['cek5'] = $this->hse_login_model->get_checklist('Listrik');
		
		$this->load->view('hse_jsa/pic_close', $data);
	}
	//function closepic($id = NULL){
	function close($id = NULL){
		$jsa = $this->hse_login_model->get_jsa($id);
		$data['jsa'] = $jsa;
		$permit_1 = $this->hse_login_model->get_permit_cek($id, 1);
		$permit_2 = $this->hse_login_model->get_permit_cek($id, 2);
		$permit_3 = $this->hse_login_model->get_permit_cek($id, 3);
		$permit_4 = $this->hse_login_model->get_permit_cek($id, 4);
		$permit_5 = $this->hse_login_model->get_permit_cek($id, 5);
		$data['cek0'] = $this->hse_login_model->get_finishlist('General');
		if(!empty($permit_1)){$data['cek1'] = $this->hse_login_model->get_finishlist('HOT');}
		if(!empty($permit_2)){$data['cek2'] = $this->hse_login_model->get_finishlist('WAH');}
		if(!empty($permit_3)){$data['cek3'] = $this->hse_login_model->get_finishlist('Confined');}
		if(!empty($permit_4)){$data['cek4'] = $this->hse_login_model->get_finishlist('Galian');}
		if(!empty($permit_5)){$data['cek5'] = $this->hse_login_model->get_finishlist('Listrik');}
		$this->load->view('hse_jsa/closepic', $data);
	}
	function closepic_session(){
		$id = $this->input->post('id');
		$param1 = $this->input->post('param1');
		$param2 = $this->input->post('param2');
		$param3 = $this->input->post('param3');
		$param4 = $this->input->post('param4');
		$param5 = $this->input->post('param5');
		$panas1 = $this->input->post('panas1');
		$panas2 = $this->input->post('panas2');
		$panas3 = $this->input->post('panas3');
		$tinggi1 = $this->input->post('tinggi1');
		$tinggi2 = $this->input->post('tinggi2');
		$tinggi3 = $this->input->post('tinggi3');
		$terbatas1 = $this->input->post('terbatas1');
		$terbatas2 = $this->input->post('terbatas2');
		$terbatas3 = $this->input->post('terbatas3');
		$penggalian1 = $this->input->post('penggalian1');
		$penggalian2 = $this->input->post('penggalian2');
		$penggalian3 = $this->input->post('penggalian3');
		$listrik1 = $this->input->post('listrik1');
		$listrik2 = $this->input->post('listrik2');
		$listrik3 = $this->input->post('listrik3');
		$jsaInfo = array(
			'param1'=>$param1,
			'param2'=>$param2,
			'param3'=>$param3,
			'param4'=>$param4,
			'param5'=>$param5,
			'panas1'=>$panas1,
			'panas2'=>$panas2,
			'panas3'=>$panas3,
			'tinggi1'=>$tinggi1,
			'tinggi2'=>$tinggi2,
			'tinggi3'=>$tinggi3,
			'terbatas1'=>$terbatas1,
			'terbatas2'=>$terbatas2,
			'terbatas3'=>$terbatas3,
			'penggalian1'=>$penggalian1,
			'penggalian2'=>$penggalian2,
			'penggalian3'=>$penggalian3,
			'listrik1'=>$listrik1,
			'listrik2'=>$listrik2,
			'listrik3'=>$listrik3,
			'closed'=>1,
			'closed_notif'=>1
			);
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->hse_login_model->loginjoin($username, $password);
		if(!empty($result)){
			$checker = $this->hse_login_model->get_emailbyNIK($username);
			$jsa_data = $this->hse_login_model->get_jsa($id);
			if($jsa_data->pic == $checker->uName){
				$update_jsa = $this->hse_login_model->update_jsa($jsaInfo, $id);
				$data['note'] = 'Request Close telah terverivikasi';
				$this->load->view('hse_jsa/checked', $data);
			}
			if($jsa_data->pic != $checker->uName){
				$data['note'] = 'Anda bukan Pemilik Area Pekerjaan ini';
				$this->load->view('hse_jsa/checked', $data);
			}
		}
		if(empty($result)){
			$data['note'] = 'Invalid user/pass please re-check your data';
			$this->load->view('hse_jsa/checked', $data);
		}
	}
	function sendnotif(){
		$notif=$this->hse_login_model->get_notif();
		if(!empty($notif)){
			foreach($notif as $record){
				$permit = $this->hse_login_model->get_permit($record->iden);
				$jsa = $this->hse_login_model->get_jsa($permit->jsa_id);
				$receiver = $this->hse_login_model->get_emailbyname($jsa->user);
				$reccheck = $this->hse_login_model->get_emailbyname($jsa->check);
				if(!empty($reccheck)){
					$message = '['.$record->title.']';$message .='
';
					$message .= 'Pekerjaan: '.$jsa->job_name;$message .='
';
					$message .=	'Area: '.$jsa->area;$message .='
';
					$message .=	'Checker: '.$permit->note_app2;$message .='
';
					$message .= 'PIC Area: '.$permit->note_app3;$message .='
';
					$message .= 'Safety Officer: '.$permit->note_app4;$message .='
';
					$message .= 'Manager: '.$permit->note_app5;$message .='
';				
					$message .= base_url();
					foreach($reccheck as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
					$this->hse_login_model->update_notif($record->id);
				}if(!empty($receiver)){
					$message = '['.$record->title.']';$message .='
';
					$message .= 'Pekerjaan: '.$jsa->job_name;$message .='
';
					$message .=	'Area: '.$jsa->area;$message .='
';
					$message .=	'Checker: '.$permit->note_app2;$message .='
';
					$message .= 'PIC Area: '.$permit->note_app3;$message .='
';
					$message .= 'Safety Officer: '.$permit->note_app4;$message .='
';
					$message .= 'Manager: '.$permit->note_app5;$message .='
';				
					$message .= base_url();
					foreach($receiver as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
					$this->hse_login_model->update_notif($record->id);
				}if(empty($receiver)){
					$subject = $record->title;
					if($permit->permit_type == 1){
						$iki = 'IJIN PEKERJAAN PANAS';
					}
					if($permit->permit_type == 2){
						$iki = 'IJIN BEKERJA DI KETINGGIAN';
					}
					if($permit->permit_type == 3){
						$iki = 'IJIN PEKERJAAN RUANG TERBATAS';
					}
					if($permit->permit_type == 4){
						$iki = 'IJIN PENGGALIAN';
					}
					if($permit->permit_type == 5){
						$iki = 'IJIN PEKERJAAN LISTRIK';
					}
					if($permit->permit_type == 6){
						$iki = 'IJIN PEKERJAAN UMUM';
					}
					$message = '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="25%" align="center"><h3 style="color:red">PT SLCI</h3></td><td colspan="2" align="center"><h3><b>'.$iki.', Update Detail: </b></h3></td><td width="25%"></td></tr>';
					$message .= '</table>';
					
					$message .= '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: '.$jsa->job_name.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: '.$jsa->area.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: '.$jsa->start_date.' , <b>Jam : </b>'.$jsa->start_hour.':00 - '.$jsa->end_hour.':00</td></tr>';
					$message .=	'<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: '.$jsa->supervisor.' <b>HP: </b>+62'.$jsa->supervisor_hp.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Description</b></td><td width="80%">: '.$jsa->description.'</td></tr>';
					$message .= '</table>';
					$message .= '<br>';
					
					$message .= '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td colspan="4" align="center"><h3><b>'.$record->title.', Detail: </b></h3></tr>';
					$message .=	'<tr><td colspan="4"><b>Checker: </b>'.$permit->note_app2.'<br><b>PIC Area: </b>'.$permit->note_app3.'<br><b>Safety Officer: </b>'.$permit->note_app4.'<br><b>Manager: </b>'.$permit->note_app5.'</td></tr>';
					$message .= '</table>';
					
					$check = '';
					$pic = '';
					$sd = '';
					$manager = '';
					if(!empty($jsa->check)){$check = $jsa->check;}
					if(!empty($jsa->pic)){$pic = $jsa->pic;}
					if(!empty($jsa->sd)){$sd = $jsa->sd;}
					if(!empty($jsa->manager)){$manager = $jsa->manager;}
					$message .= '<br><br><table border="1" cellspacing="0" cellpadding="3" width="100%">
						<tr>
							<td width="20%" align="center"><b>Dibuat Oleh:</b><br>'.$jsa->user.'</td>
							<td width="20%" align="center"';
					if($permit->app2 == 1){$message .= 'style="background-color: #3cea3c;"';}
					$message .= '><b>Pemilik Pekerjaan:</b><br>'.$check.'</td>
							<td width="20%" align="center"';
					if($permit->app3 == 1){$message .= 'style="background-color: #3cea3c;"';}		
					$message .= '><b>Pemilik Area Kerja:</b><br>'.$pic.'</td>
							<td width="20%" align="center"';
					if($permit->app4 == 1){$message .= 'style="background-color: #3cea3c;"';}		
					$message .= '><b>Safety Officer:</b><br>'.$sd.'</td>
							<td width="20%" align="center"';
					if($permit->app5 == 1){$message .= 'style="background-color: #3cea3c;"';}		
					$message .= '><b>Manager:</b><br>'.$manager.'</td>
						</tr></table>';
					$body = '
					<html>
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
							
							<style type="text/css">
							table {
								border-collapse: collapse;
							}
							table, th, td {
								border: 1px solid black;
							}
							body {
								font-family: Arial, Verdana, Helvetica, sans-serif;
								font-size: 16px;
							}
							</style>
						</head>
						<body>
							' . $message . '<br>
							
						</body>
						
					</html>';
					$receiver2 = $this->hse_login_model->get_emailbyvendor($jsa->user);
					$rec = '';
					if(!empty($receiver2)){
						foreach($receiver2 as $ee){
							$rec .= $ee->email.', ';
						}
					}
					$mailuser = substr($rec, 0, -2);
					
					$this->load->library('email');
					$config['protocol'] = 'smtp';//
					$config['smtp_host'] = 'smtp.gmail.com';//'mail.slci.co.id';//
					$config['smtp_user'] = 'codesys.slci@gmail.com';//'no-replay@slci.co.id';//
					$config['smtp_pass'] = 'nobullshit';//'1234qwer';//
					$config['smtp_port'] = 587;//25;//
					$config['mailtype'] = 'html';//
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['smtp_crypto'] = 'tls'; 
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from('no-replay@slci.co.id', 'HSE PT SLCI');
					//$this->email->to('akbar.kurnia.p@gmail.com');
					
					$this->email->to($mailuser);

					$this->email->subject($subject);
					$this->email->message($message);
					
					$this->load->library('encrypt');
					$this->email->send();
				
					$this->hse_login_model->update_notif($record->id);
					
					echo $this->email->print_debugger(array('headers'));
				}
			}
		}
		exit;
	}
	function sendclosenotif(){
		$jsa=$this->hse_login_model->get_jsa_close_notif();
		if(!empty($jsa)){
			foreach($jsa as $record){
				$receiverA = $this->hse_login_model->get_emailbyname($record->user);
				if(!empty($receiverA)){
					$message = 'Pekerjaan: '.$record->job_name;$message .='
';
					$message .=	'telah dinyatakan selesai oleh PIC Area, '.$record->pic;$message .='
';
					foreach($receiverA as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
				}
				$receiverB = $this->hse_login_model->get_emailbyvendor($record->user);
				if(!empty($receiverB)){
					$subject = $record->job_name.' telah dinyatakan selesai';
					
					$message = '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="25%" align="center"><h3 style="color:red">PT SLCI</h3></td><td colspan="2" align="center"><h3><b>Pekerjaan telah dinyatakan selesai, detail: </b></h3></td><td width="25%"></td></tr>';
					$message .= '</table>';
					
					$message .= '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: '.$record->job_name.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: '.$record->area.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: '.$record->start_date.' , <b>Jam : </b>'.$record->start_hour.':00 - '.$record->end_hour.':00</td></tr>';
					$message .=	'<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: '.$record->supervisor.' <b>HP: </b>+62'.$record->supervisor_hp.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Description</b></td><td width="80%">: '.$record->description.'</td></tr>';
					$message .= '</table>';
					$message .= '<br>';
					
					$body = '
					<html>
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
							
							<style type="text/css">
							table {
								border-collapse: collapse;
							}
							table, th, td {
								border: 1px solid black;
							}
							body {
								font-family: Arial, Verdana, Helvetica, sans-serif;
								font-size: 16px;
							}
							</style>
						</head>
						<body>
							' . $message . '<br>
							
						</body>
						
					</html>';
					
					$rec = '';
					
					foreach($receiverB as $ee){
						$rec .= $ee->email.', ';
					}
					
					$mailuser = substr($rec, 0, -2);
					
					$this->load->library('email');
					$config['protocol'] = 'smtp';//
					$config['smtp_host'] = 'smtp.gmail.com';//'mail.slci.co.id';//
					$config['smtp_user'] = 'codesys.slci@gmail.com';//'no-replay@slci.co.id';//
					$config['smtp_pass'] = 'nobullshit';//'1234qwer';//
					$config['smtp_port'] = 587;//25;//
					$config['mailtype'] = 'html';//
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['smtp_crypto'] = 'tls'; 
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from('no-replay@slci.co.id', 'HSE PT SLCI');
					//$this->email->to('akbar.kurnia.p@gmail.com');
					
					$this->email->to($mailuser);

					$this->email->subject($subject);
					$this->email->message($message);
					
					$this->load->library('encrypt');
					$this->email->send();
					
					echo $this->email->print_debugger(array('headers'));
				}
				$jsaInfo = array('closed_notif'=>0);
				$this->hse_login_model->update_jsa($jsaInfo, $record->id);
			}
		}
		exit;
	}
	
	function closenotif(){
		$jsa=$this->hse_login_model->get_almostclose();
		if(!empty($jsa)){
			foreach($jsa as $record){
				$receiverA = $this->hse_login_model->get_emailbyname($record->user);
				$receiverP = $this->hse_login_model->get_emailbyname($record->pic);
				if(!empty($receiverA)){
					$message = 'Notifikasi pekerjaan: '.$record->job_name;$message .='
';
					$message .=	'Notifikasi ini dikirim karena sisa waktu pekerjaan kurang dari 1 jam dari batas waktu tertera pada ijin kerja.';$message .='
';
					foreach($receiverA as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
				}
				if(!empty($receiverP)){
					$message = 'Notifikasi pekerjaan: '.$record->job_name;$message .='
';
					$message .=	'Notifikasi ini dikirim karena sisa waktu pekerjaan kurang dari 1 jam dari batas waktu tertera pada ijin kerja.';$message .='
';
					$message .=	'PIC Area: '.base_url().'monitor/'.$record->id;$message .='
';
					foreach($receiverP as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
				}
				$receiverB = $this->hse_login_model->get_emailbyvendor($record->user);
				if(!empty($receiverB)){
					$subject = 'Notifikasi pekerjaan: '.$record->job_name;
					
					$message = '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="25%" align="center"><h3 style="color:red">PT SLCI</h3></td><td colspan="2" align="center"><h3><b>Notifikasi ini dikirim karena sisa waktu pekerjaan kurang dari 1 jam dari batas waktu tertera pada ijin kerja.</b></h3></td><td width="25%"></td></tr>';
					$message .= '</table>';
					
					$message .= '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: '.$record->job_name.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: '.$record->area.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: '.$record->start_date.' , <b>Jam : </b>'.$record->start_hour.':00 - '.$record->end_hour.':00</td></tr>';
					$message .=	'<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: '.$record->supervisor.' <b>HP: </b>+62'.$record->supervisor_hp.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Description</b></td><td width="80%">: '.$record->description.'</td></tr>';
					$message .= '</table>';
					$message .= '<br>';
					
					$body = '
					<html>
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
							
							<style type="text/css">
							table {
								border-collapse: collapse;
							}
							table, th, td {
								border: 1px solid black;
							}
							body {
								font-family: Arial, Verdana, Helvetica, sans-serif;
								font-size: 16px;
							}
							</style>
						</head>
						<body>
							' . $message . '<br>
							
						</body>
						
					</html>';
					
					$rec = '';
					
					foreach($receiverB as $ee){
						$rec .= $ee->email.', ';
					}
					
					$mailuser = substr($rec, 0, -2);
					
					$this->load->library('email');
					$config['protocol'] = 'smtp';//
					$config['smtp_host'] = 'smtp.gmail.com';//'mail.slci.co.id';//
					$config['smtp_user'] = 'codesys.slci@gmail.com';//'no-replay@slci.co.id';//
					$config['smtp_pass'] = 'nobullshit';//'1234qwer';//
					$config['smtp_port'] = 587;//25;//
					$config['mailtype'] = 'html';//
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['smtp_crypto'] = 'tls'; 
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from('no-replay@slci.co.id', 'HSE PT SLCI');
					//$this->email->to('akbar.kurnia.p@gmail.com');
					
					$this->email->to($mailuser);

					$this->email->subject($subject);
					$this->email->message($message);
					
					$this->load->library('encrypt');
					$this->email->send();
					
					echo $this->email->print_debugger(array('headers'));
				}
			}
		}
		exit;
	}
	
	function bubarnotif(){
		$jsa=$this->hse_login_model->get_bubar();
		if(!empty($jsa)){
			foreach($jsa as $record){
				$receiverA = $this->hse_login_model->get_emailbyname($record->user);
				$receiverP = $this->hse_login_model->get_emailbyname($record->pic);
				if(!empty($receiverA)){
					$message = 'Notifikasi pekerjaan: '.$record->job_name;$message .='
';
					$message .=	'Waktu pelaksanaan mendekati waktu tertera pada ijin kerja (kurang dari 20 menit) segera bersihkan tempat kerja';$message .='
';
					foreach($receiverA as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
				}
				if(!empty($receiverP)){
					$message = 'Notifikasi pekerjaan: '.$record->job_name;$message .='
';
					$message .=	'Waktu pelaksanaan mendekati waktu tertera pada ijin kerja (kurang dari 20 menit) segera periksa tempat kerja';$message .='
';
					foreach($receiverP as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
				}
				$receiverB = $this->hse_login_model->get_emailbyvendor($record->user);
				if(!empty($receiverB)){
					$subject = 'Notifikasi pekerjaan: '.$record->job_name;
					
					$message = '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="25%" align="center"><h3 style="color:red">PT SLCI</h3></td><td colspan="2" align="center"><h3><b>Notifikasi ini dikirim karena sisa waktu pelaksanaan hari ini kurang dari 1 jam dari batas waktu tertera pada ijin kerja.</b></h3></td><td width="25%"></td></tr>';
					$message .= '</table>';
					
					$message .= '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: '.$record->job_name.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: '.$record->area.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: '.$record->start_date.' , <b>Jam : </b>'.$record->start_hour.':00 - '.$record->end_hour.':00</td></tr>';
					$message .=	'<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: '.$record->supervisor.' <b>HP: </b>+62'.$record->supervisor_hp.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Description</b></td><td width="80%">: '.$record->description.'</td></tr>';
					$message .= '</table>';
					$message .= '<br>';
					
					$body = '
					<html>
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
							
							<style type="text/css">
							table {
								border-collapse: collapse;
							}
							table, th, td {
								border: 1px solid black;
							}
							body {
								font-family: Arial, Verdana, Helvetica, sans-serif;
								font-size: 16px;
							}
							</style>
						</head>
						<body>
							' . $message . '<br>
							
						</body>
						
					</html>';
					
					$rec = '';
					
					foreach($receiverB as $ee){
						$rec .= $ee->email.', ';
					}
					
					$mailuser = substr($rec, 0, -2);
					
					$this->load->library('email');
					$config['protocol'] = 'smtp';//
					$config['smtp_host'] = 'smtp.gmail.com';//'mail.slci.co.id';//
					$config['smtp_user'] = 'codesys.slci@gmail.com';//'no-replay@slci.co.id';//
					$config['smtp_pass'] = 'nobullshit';//'1234qwer';//
					$config['smtp_port'] = 587;//25;//
					$config['mailtype'] = 'html';//
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['smtp_crypto'] = 'tls'; 
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from('no-replay@slci.co.id', 'HSE PT SLCI');
					//$this->email->to('akbar.kurnia.p@gmail.com');
					
					$this->email->to($mailuser);

					$this->email->subject($subject);
					$this->email->message($message);
					
					$this->load->library('encrypt');
					$this->email->send();
					
					echo $this->email->print_debugger(array('headers'));
				}
			}
		}
		exit;
	}
	
	function closespam(){
		$jsa=$this->hse_login_model->get_closespam();
		if(!empty($jsa)){
			foreach($jsa as $record){
				$receiverA = $this->hse_login_model->get_emailbyname($record->user);
				$receiverP = $this->hse_login_model->get_emailbyname($record->pic);
				if(!empty($receiverA)){
					$message = 'Notifikasi pekerjaan: '.$record->job_name;$message .='
';
					$message .=	'Segera hubungi '.$record->pic.' untuk menutup pekerjaan ini.';$message .='
';
					foreach($receiverA as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
				}
				if(!empty($receiverP)){
					$message = 'Notifikasi pekerjaan: '.$record->job_name;$message .='
';
					$message .=	'Ijin Kerja telah berakhir, segera tutup pekerjaan ini melalui:';$message .='
';
					$message .=	base_url().'monitor/'.$record->id;$message .='
';
					foreach($receiverP as $rec){ $u_rec = $rec->lineid;}
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					$user_id    = $u_rec;
					$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
					$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					
				}
				$receiverB = $this->hse_login_model->get_emailbyvendor($record->user);
				if(!empty($receiverB)){
					$subject = 'Notifikasi pekerjaan: '.$record->job_name;
					
					$message = '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="25%" align="center"><h3 style="color:red">PT SLCI</h3></td><td colspan="2" align="center"><h3><b>Segera hubungi '.$record->pic.' untuk menutup pekerjaan ini.</b></h3></td><td width="25%"></td></tr>';
					$message .= '</table>';
					
					$message .= '<table border="0" cellspacing="0" cellpadding="3" width="100%">';
					$message .=	'<tr><td width="20%"><b>Nama Pekerjaan</b></td><td width="80%">: '.$record->job_name.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Lokasi</b></td><td width="80%">: '.$record->area.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Tanggal</b></td><td width="80%">: '.$record->start_date.' , <b>Jam : </b>'.$record->start_hour.':00 - '.$record->end_hour.':00</td></tr>';
					$message .=	'<tr><td width="20%"><b>Supervisor</b></td><td width="80%">: '.$record->supervisor.' <b>HP: </b>+62'.$record->supervisor_hp.'</td></tr>';
					$message .=	'<tr><td width="20%"><b>Description</b></td><td width="80%">: '.$record->description.'</td></tr>';
					$message .= '</table>';
					$message .= '<br>';
					
					$body = '
					<html>
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
							
							<style type="text/css">
							table {
								border-collapse: collapse;
							}
							table, th, td {
								border: 1px solid black;
							}
							body {
								font-family: Arial, Verdana, Helvetica, sans-serif;
								font-size: 16px;
							}
							</style>
						</head>
						<body>
							' . $message . '<br>
							
						</body>
						
					</html>';
					
					$rec = '';
					
					foreach($receiverB as $ee){
						$rec .= $ee->email.', ';
					}
					
					$mailuser = substr($rec, 0, -2);
					
					$this->load->library('email');
					$config['protocol'] = 'smtp';//
					$config['smtp_host'] = 'smtp.gmail.com';//'mail.slci.co.id';//
					$config['smtp_user'] = 'codesys.slci@gmail.com';//'no-replay@slci.co.id';//
					$config['smtp_pass'] = 'nobullshit';//'1234qwer';//
					$config['smtp_port'] = 587;//25;//
					$config['mailtype'] = 'html';//
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['smtp_crypto'] = 'tls'; 
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from('no-replay@slci.co.id', 'HSE PT SLCI');
					//$this->email->to('akbar.kurnia.p@gmail.com');
					
					$this->email->to($mailuser);

					$this->email->subject($subject);
					$this->email->message($message);
					
					$this->load->library('encrypt');
					$this->email->send();
					
					echo $this->email->print_debugger(array('headers'));
				}
			}
		}
		exit;
	}
	
	function po_notif(){
		$loadnotif = $this->hse_login_model->get_ponotif();
		if(!empty($loadnotif)){
			foreach($loadnotif as $record){
				$pt = $this->hse_login_model->get_pt($record->pt_name);
				$subject = 'HSE PT SLCI';
				$message = 'Kepada,<b> '.$pt->uName.'</b><br><br>';
				$message .= 'Mohon isi form <b>Ijin Kerja</b> sesuai dengan pekerjaan yang akan dilakukan. Form wajib diisi dalam kurun waktu <b>Seminggu</b> sebelum pekerjaan dimulai. <br>';
				$message .= '<table border="0" cellspacing="1" cellpadding="3" width="100%">';
				$message .=	'<tr><td colspan="4" align="center"><h3><b> No PO: </b>'.$record->po_num.'</h3></td></tr>';
				$message .=	'<tr><td colspan="4" align="center"><h3><b> Pekerjaan: </b>'.$record->job_name.'</h3></td></tr>';
				$message .=	'<tr><td colspan="4" align="center"><b> Username: '.$pt->NIK.'</b></td></tr>';
				$message .=	'<tr><td colspan="4" align="center"><b> Password: '.$pt->pass_user.'</b></td></tr>';
				
				$message .=	'<tr>
								<td colspan="2" style="background-color: #3cea3c;border-color: #0f6d0f;border: 2px solid #45b7af;padding: 10px;text-align: center;" width="50%">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'">
									HSE-PT.SLCI
									</a>
								</td>
								<td colspan="2" style="background-color: #3a84fc;border-color: #0f6d0f;border: 2px solid #3a84fc;padding: 10px;text-align: center;" width="50%">
									<a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.base_url().'assets/dist/img/manual.pdf">
									PANDUAN
									</a>
								</td></tr>';
				$message .= '</table>';
				$body = '
				<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
						
						<style type="text/css">
						table {
							border-collapse: collapse;
						}
						table, th, td {
							border: 1px solid black;
						}
						body {
							font-family: Arial, Verdana, Helvetica, sans-serif;
							font-size: 16px;
						}
						</style>
					</head>
					<body>
						' . $message . '<br>
						
					</body>
					
				</html>';
				$this->load->library('email');
				$config['protocol'] = 'smtp';//
				$config['smtp_host'] = 'smtp.gmail.com';//'mail.slci.co.id';//
				$config['smtp_user'] = 'hse.slci@gmail.com';//'no-replay@slci.co.id';//
				$config['smtp_pass'] = 'slci2018';//'1234qwer';//
				$config['smtp_port'] = 587;//25;//
				$config['mailtype'] = 'html';//
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['smtp_crypto'] = 'tls'; 
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from('no-replay@slci.co.id', 'HSE PT SLCI');
				//$this->email->to('akbarkur@scg.com');
				
				$this->email->to($pt->email);

				$this->email->subject($subject);
				$this->email->message($message);
				
				$this->load->library('encryption');
				$this->email->send();
			
				echo $this->email->print_debugger(array('headers'));
				$this->hse_login_model->update_ponotif($record->id);
			}
		}else{
			exit;
		}
	}
	
	function c_notif(){
		$notif = $this->hse_login_model->get_inotif(1);
		if(!empty($notif)){
			$checking = $this->hse_login_model->check_permit(1,1,0,0,0);
			if(!empty($checking)){
				foreach($checking as $record){
					$jsa_main = $this->hse_login_model->get_jsa($record->jsa_id);
					$unix = date('U');
					$unix = $unix + 3600;
					$start_date = date('Y-m-d'); 
					$start_hour = date('H');
					if($jsa_main->saved == 1 and (($jsa_main->start_date > $start_date) or ($jsa_main->start_date == $start_date and $jsa_main->start_hour >= $start_hour))){
						$message = 'Pemeriksaan Work Permit (PIC)';
						if($record->permit_type == 1){
							$iki = 'IJIN PEKERJAAN PANAS';
						}
						if($record->permit_type == 2){
							$iki = 'IJIN BEKERJA DI KETINGGIAN';
						}
						if($record->permit_type == 3){
							$iki = 'IJIN PEKERJAAN RUANG TERBATAS';
						}
						if($record->permit_type == 4){
							$iki = 'IJIN PENGGALIAN';
						}
						if($record->permit_type == 5){
							$iki = 'IJIN PEKERJAAN LISTRIK';
						}
						if($record->permit_type == 6){
							$iki = 'IJIN PEKERJAAN UMUM';
						}
					
						$message .=	'Job Name:'.$jsa_main->job_name;$message .=	'
';
						$message .=	'Lokasi: '.$jsa_main->area;$message .=	'
';
						$message .=	'Tgl: '.$jsa_main->start_date;$message .='
';
						$message .= 'Jam: '.$jsa_main->start_hour.':00 - '.$jsa_main->end_hour.':00';$message .='
';
						$message .=	'Supervisor: '.$jsa_main->supervisor.' HP: +62'.$jsa_main->supervisor_hp;$message .='
';
						$message .=	'Deskripsi: '.$jsa_main->description;$message .='
';
						$message .=	'Permintaan: '.$iki;$message .='
';
						$message .='Check link: '.base_url().'linecheck/'.$jsa_main->id.'/'.$record->id;
					
						if(!empty($jsa_main->pic_id)){
							$receiver = $this->hse_login_model->get_emailbypicar($jsa_main->pic_id);
						}else{
							$receiver = $this->hse_login_model->get_emailbyname($jsa_main->pic);
						}
						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						if(!empty($receiver)){
							foreach($receiver as $record){
								$user_id    = $record->lineid;
								$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
								$response           = $bot->pushMessage($user_id, $textMessageBuilder);
							}
						}
						$permitInfo = array('notif'=>0);
						$update_permit = $this->hse_login_model->edit_permit($permitInfo, $record->id);
					}
				}
			}
			$this->hse_login_model->update_inotif(1);
			exit;
		}
	}
	function p_notif(){
		$notif = $this->hse_login_model->get_inotif(2);
		if(!empty($notif)){
			$checking = $this->hse_login_model->check_permit(1,1,1,0,0);
			if(!empty($checking)){
				foreach($checking as $record){
					$jsa_main = $this->hse_login_model->get_jsa($record->jsa_id);
					$unix = date('U');
					$unix = $unix + 3600;
					$start_date = date('Y-m-d'); 
					$start_hour = date('H');
					if($jsa_main->saved == 1 and (($jsa_main->start_date > $start_date) or ($jsa_main->start_date == $start_date and $jsa_main->start_hour >= $start_hour))){
						$message = 'Pemeriksaan Work Permit (Safety Officer)';
						if($record->permit_type == 1){
							$iki = 'IJIN PEKERJAAN PANAS';
						}
						if($record->permit_type == 2){
							$iki = 'IJIN BEKERJA DI KETINGGIAN';
						}
						if($record->permit_type == 3){
							$iki = 'IJIN PEKERJAAN RUANG TERBATAS';
						}
						if($record->permit_type == 4){
							$iki = 'IJIN PENGGALIAN';
						}
						if($record->permit_type == 5){
							$iki = 'IJIN PEKERJAAN LISTRIK';
						}
						if($record->permit_type == 6){
							$iki = 'IJIN PEKERJAAN UMUM';
						}
					
						$message .=	'Job Name:'.$jsa_main->job_name;$message .=	'
';
						$message .=	'Lokasi: '.$jsa_main->area;$message .=	'
';
						$message .=	'Tgl: '.$jsa_main->start_date;$message .='
';
						$message .= 'Jam: '.$jsa_main->start_hour.':00 - '.$jsa_main->end_hour.':00';$message .='
';
						$message .=	'Supervisor: '.$jsa_main->supervisor.' HP: +62'.$jsa_main->supervisor_hp;$message .='
';
						$message .=	'Deskripsi: '.$jsa_main->description;$message .='
';
						$message .=	'Permintaan: '.$iki;$message .='
';
						$message .='Check link: '.base_url().'linecheck/'.$jsa_main->id.'/'.$record->id;
					
						if(!empty($jsa_main->sd_id)){
							$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->sd_id);
						}else{
							$receiver = $this->hse_login_model->get_emailbyname($jsa_main->sd);
						}
						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						if(!empty($receiver)){
							foreach($receiver as $record){
								$user_id    = $record->lineid;
								$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
								$response           = $bot->pushMessage($user_id, $textMessageBuilder);
							}
						}
						$permitInfo = array('notif'=>0);
						$update_permit = $this->hse_login_model->edit_permit($permitInfo, $record->id);
					}
				}
			}
			$this->hse_login_model->update_inotif(2);
			exit;
		}
	}
	function s_notif(){
		$notif = $this->hse_login_model->get_inotif(3);
		if(!empty($notif)){
			$checking = $this->hse_login_model->check_permit(1,1,1,1,0);
			if(!empty($checking)){
				foreach($checking as $record){
					$jsa_main = $this->hse_login_model->get_jsa($record->jsa_id);
					$unix = date('U');
					$unix = $unix + 3600;
					$start_date = date('Y-m-d'); 
					$start_hour = date('H');
					if($jsa_main->saved == 1 and (($jsa_main->start_date > $start_date) or ($jsa_main->start_date == $start_date and $jsa_main->start_hour >= $start_hour))){
						$message = 'Pemeriksaan Work Permit (Manager)';
						if($record->permit_type == 1){
							$iki = 'IJIN PEKERJAAN PANAS';
						}
						if($record->permit_type == 2){
							$iki = 'IJIN BEKERJA DI KETINGGIAN';
						}
						if($record->permit_type == 3){
							$iki = 'IJIN PEKERJAAN RUANG TERBATAS';
						}
						if($record->permit_type == 4){
							$iki = 'IJIN PENGGALIAN';
						}
						if($record->permit_type == 5){
							$iki = 'IJIN PEKERJAAN LISTRIK';
						}
						if($record->permit_type == 6){
							$iki = 'IJIN PEKERJAAN UMUM';
						}
					
						$message .=	'Job Name:'.$jsa_main->job_name;$message .=	'
	';
						$message .=	'Lokasi: '.$jsa_main->area;$message .=	'
	';
						$message .=	'Tgl: '.$jsa_main->start_date;$message .='
	';
						$message .= 'Jam: '.$jsa_main->start_hour.':00 - '.$jsa_main->end_hour.':00';$message .='
	';
						$message .=	'Supervisor: '.$jsa_main->supervisor.' HP: +62'.$jsa_main->supervisor_hp;$message .='
	';
						$message .=	'Deskripsi: '.$jsa_main->description;$message .='
	';
						$message .=	'Permintaan: '.$iki;$message .='
	';
						$message .='Check link: '.base_url().'linecheck/'.$jsa_main->id.'/'.$record->id;
					
						if(!empty($jsa_main->manager_id)){
							$receiver = $this->hse_login_model->get_emailbyrole($jsa_main->manager_id);
						}else{
							$receiver = $this->hse_login_model->get_emailbyname($jsa_main->manager);
						}
						$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
						$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
						if(!empty($receiver)){
							foreach($receiver as $record){
								$user_id    = $record->lineid;
								$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
								$response           = $bot->pushMessage($user_id, $textMessageBuilder);
							}
						}
						$permitInfo = array('notif'=>0);
						$update_permit = $this->hse_login_model->edit_permit($permitInfo, $record->id);
					}
				}
			}
			$this->hse_login_model->update_inotif(3);
			exit;
		}
	}
	
	function gas_cek(){
		$gas_cek = $this->hse_login_model->get_nowconfined();
		if(!empty($gas_cek)){
			
			foreach($gas_cek as $record){
				$permit = $this->hse_login_model->get_permitconfined($record->id);
				$message =	'PERMINTAAN PENGUKURAN GAS';$message .=	'
';	
				$message .=	'Job Name:'.$record->job_name;$message .=	'
';
				$message .=	'Lokasi: '.$record->area;$message .=	'
';
				$message .=	'Tgl: '.$record->start_date;$message .='
';
				$message .= 'Jam: '.$record->start_hour.':00 - '.$record->end_hour.':00';$message .='
';
				$message .=	'Supervisor: '.$record->supervisor.' HP: +62'.$record->supervisor_hp;$message .='
';
				$message .=	'Deskripsi: '.$record->description;$message .='
';
				$message .= 'Link: '.base_url().'gas/'.$permit->id;$message .='
';				
				if(!empty($record->sd)){
					$receiver = $this->hse_login_model->get_emailbyname($record->sd);
				}else{
					$receiver = $this->hse_login_model->get_emailbyrole($record->sd_id);
					//$a = 'U214dc04ea58ffae7e08e008df747ba36';
				}
				$receiver2 = $this->hse_login_model->get_emailbyname($record->pic);
				$receiver3 = $this->hse_login_model->get_emailbyname($record->check);
				$receiver4 = $this->hse_login_model->get_emailbyname($record->user);
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				if(!empty($receiver)){
					foreach($receiver as $ss){
						$user_id    = $ss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				if(!empty($receiver2)){
					foreach($receiver2 as $sss){
						$user_id    = $sss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				if(!empty($receiver3)){
					foreach($receiver3 as $ssss){
						$user_id    = $ssss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				if(!empty($receiver4)){
					foreach($receiver4 as $sssss){
						$user_id    = $sssss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				$permitInfo = array('gas_cek'=> 0);
				$this->hse_login_model->update_jsa($permitInfo, $record->id);
			}
		}
		exit();
	}
	
	function blood_cek(){
		$blood_cek = $this->hse_login_model->get_nowblood();
		if(!empty($blood_cek)){
			
			foreach($blood_cek as $record){
				$permit = $this->hse_login_model->get_permitconfined($record->id);
				$message =	'PERMINTAAN CEK TENSI';$message .=	'
';	
				$message .=	'Job Name:'.$record->job_name;$message .=	'
';
				$message .=	'Lokasi: '.$record->area;$message .=	'
';
				$message .=	'Tgl: '.$record->start_date;$message .='
';
				$message .= 'Jam: '.$record->start_hour.':00 - '.$record->end_hour.':00';$message .='
';
				$message .=	'Supervisor: '.$record->supervisor.' HP: +62'.$record->supervisor_hp;$message .='
';
				$message .=	'Deskripsi: '.$record->description;$message .='
';
				$message .= 'Link: '.base_url().'blood/'.$permit->jsa_id;$message .='
';				

				
				if(!empty($record->sd)){
					$receiver = $this->hse_login_model->get_emailbyname($record->sd);
				}else{
					$receiver = $this->hse_login_model->get_emailbyrole($record->sd_id);
					//$a = 'U214dc04ea58ffae7e08e008df747ba36';
				}
				$receiver2 = $this->hse_login_model->get_emailbyname($record->pic);
				$receiver3 = $this->hse_login_model->get_emailbyname($record->check);
				$receiver4 = $this->hse_login_model->get_emailbyname($record->user);
				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
				
				
				if(!empty($receiver)){
					foreach($receiver as $ss){
						$user_id    = $ss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				if(!empty($receiver2)){
					foreach($receiver2 as $sss){
						$user_id    = $sss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				if(!empty($receiver3)){
					foreach($receiver3 as $ssss){
						$user_id    = $ssss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				if(!empty($receiver4)){
					foreach($receiver4 as $sssss){
						$user_id    = $sssss->lineid;
						$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
						$response           = $bot->pushMessage($user_id, $textMessageBuilder);
					}
				}
				$permitInfo = array('blood_cek'=> 0);
				$blood = $this->hse_login_model->update_jsa($permitInfo, $record->id);
			}
		}
		exit();
	}
	
	
	//===============================================================================================================================================
	
	
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
	//===============================================================================================================================================
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[128]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->input->post('password');
            
            $result = $this->hse_login_model->loginMe($username, $password);
            
            if(!empty($result))
            {
                $lastLogin = $this->hse_login_model->lastLoginInfo($result->userId);

                $sessionArray = array('userId'=>$result->userId,                    
                                        'role'=>$result->roleId,
                                        'roleText'=>$result->role,
                                        'name'=>$result->name,
                                        'lastLogin'=> $lastLogin->createdDtm,
                                        'isLoggedIn' => TRUE
                                );

                $this->session->set_userdata($sessionArray);

                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                $loginInfo = array("userId"=>$result->userId, "sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());

                $this->hse_login_model->lastLogin($loginInfo);
                
                redirect('/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Username or password mismatch');
                
                redirect('/login');
            }
        }
    }
	
	public function loginjoin()
    {
		
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[128]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->input->post('password');
            if($username >= 90000 AND $username <= 99999){
				$result = $this->hse_login_model->loginjoin($username, $password);
            }
			if($username >= 40000 AND $username <= 49999){
				$result = $this->hse_login_model->loginexternal($username, $password);
            }
            if(!empty($result))
            {
                $lastLogin = $this->hse_login_model->lastLoginInfo($result->uName);
				$sessionArray = array('userId'=>$result->NIK,                    
                                        'role'=>$result->roleId,
                                        'roleText'=>$result->role,
                                        'name'=>$result->uName,
										'lastLogin'=> $lastLogin->createdDtm,
                                        'isLoggedIn' => TRUE
                                );

                $this->session->set_userdata($sessionArray);

                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                $loginInfo = array("userId"=>$result->uName, "appname"=>'HSE',"sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());

                $this->hse_login_model->lastLogin($loginInfo);

                redirect('/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Username or password mismatch');
                
                redirect('/login');
            }
        }
    }
    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('forgotPassword');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = $this->security->xss_clean($this->input->post('login_email'));
            
            if($this->hse_login_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->hse_login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->hse_login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo[0]->name;
                        $data1["email"] = $userInfo[0]->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->hse_login_model->checkActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    /**
     * This function used to create new password for user
     */
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->hse_login_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->hse_login_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password changed successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password changed failed';
            }
            
            setFlashData($status, $message);

            redirect("/login");
        }
    }
	function phpinicek(){
		echo phpInfo();
	}
	function notifhse(){
		$unix = date('U');
		$unix = $unix + 3600;
		$start_date = date('Y-m-d', $unix);
		$start_hour = date('H', $unix);
		$hsenotif = $this->hse_login_model->hse_notif($start_date, $start_hour);
		if(!empty($hsenotif)){
			foreach($hsenotif as $record){
				$get_notif = $this->hse_login_model->get_notifmm($record->id);
				$checking1 = $this->hse_login_model->get_emailbyname($record->check);
				if(!empty($checking1)){
					foreach($checking1 as $rec){
						if(!empty($rec->lineid)){
							$message =	'Status work permit anda:';$message .='
';
							$message .= $record->job_name;$message .='
';
							$message .= 'Area: '.$record->area;$message .='
';
							$message .= 'Tgl: '.$record->start_date;$message .='
';
							$message .= 'Sudah disetujui oleh: '.$record->check.' ,'.$record->pic.' ,'.$record->sd.'';$message .='
';
							$message .= 'Jam: '.$record->start_hour.':00 - '.$record->end_hour.':00';$message .='
';
						if(!empty($get_notif)){
							foreach($get_notif as $get){
							$message .= 'Check link: '.base_url().'linecheck/'.$get->jsa_id.'/'.$get->id;$message .='
';
							}
						}
							$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
							$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
							$user_id    = $rec->lineid;
							$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
							$response           = $bot->pushMessage($user_id, $textMessageBuilder);
						}
					}
				}
			}
		}
	}
	
	function autoclose_session(){
		$date = date('Y-m-d');
		$hour = date('H');
		$datajsa = $this->hse_login_model->autoclose($date, $hour);
		if(!empty($datajsa)){
			foreach($datajsa as $record){
				$jsa = array('closed'=>1);
				$this->hse_login_model->update_jsa($jsa, $record->id);
			}
		}
	}

	function gas_hourly(){
		$start_date = date('Y-m-d');
		$start = date('H');
		if($start > 8){
			$gas_cek = $this->hse_login_model->get_hourlygas($start_date);
			if(!empty($gas_cek)){
				
				foreach($gas_cek as $record){
					$permit = $this->hse_login_model->get_permitconfined($record->id);
					$message =	'SEGERA UPDATE LAPORAN PENGUKURAN GAS DI AREA KERJA ANDA';$message .=	'
	';	
					$message .=	'Job Name:'.$record->job_name;$message .=	'
	';
					$message .=	'Lokasi: '.$record->area;$message .=	'
	';
					$message .=	'Supervisor: '.$record->supervisor.' HP: +62'.$record->supervisor_hp;$message .='
	';
					$message .=	'Deskripsi: '.$record->description;$message .='
	';
					$message .= 'Link: '.base_url().'gas/'.$permit->id;$message .='
	';				
					if(!empty($record->sd)){
						$receiver = $this->hse_login_model->get_emailbyname($record->sd);
					}else{
						$receiver = $this->hse_login_model->get_emailbyrole($record->sd_id);
						//$a = 'Uc20a9aeb28ff9d87f892492817b61098';
					}
					$receiver2 = $this->hse_login_model->get_emailbyname($record->pic);
					$receiver3 = $this->hse_login_model->get_emailbyname($record->check);
					$receiver4 = $this->hse_login_model->get_emailbyname($record->user);
					$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N6UVK464rAn0GECjM0Zb17jx6ycivMGJGbtdWPX/zFfEwy2YUQFgQxSqJlDTRUcBynToAqVi8C2+E+zNjm3aArgq/PRxUv4afWgCuBMwezbBxoF5QCA/Xpsq0U7AvYr/hZT9xE1TlbfA4NTAgS4lswdB04t89/1O/w1cDnyilFU=');
					$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '367695effa1e7a561efa1f4e0dc0b60c']);
					if(!empty($receiver)){
						foreach($receiver as $ss){
							$user_id    = $ss->lineid;
							$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
							$response           = $bot->pushMessage($user_id, $textMessageBuilder);
						}
					}
					if(!empty($receiver2)){
						foreach($receiver2 as $sss){
							$user_id    = $sss->lineid;
							$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
							$response           = $bot->pushMessage($user_id, $textMessageBuilder);
						}
					}
					if(!empty($receiver3)){
						foreach($receiver3 as $ssss){
							$user_id    = $ssss->lineid;
							$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
							$response           = $bot->pushMessage($user_id, $textMessageBuilder);
						}
					}
					if(!empty($receiver4)){
						foreach($receiver4 as $sssss){
							$user_id    = $sssss->lineid;
							$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
							$response           = $bot->pushMessage($user_id, $textMessageBuilder);
						}
					}
					$permitInfo = array('gas_cek'=> 0);
					$this->hse_login_model->update_jsa($permitInfo, $record->id);
				}
			}
		//echo var_dump($start);
		exit();
		}
	}
}

?>
