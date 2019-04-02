<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Xtrial extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->load->model('xtrial_model');
		$this->isLoggedIn();   
	}
	public function workplacelist(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->xtrial_model->workplacelistCount($this->name, $searchText);
		$returns = $this->paginationCompress ( "workplacelist/", $count, 10 );
		$data['workplacelist'] = $this->xtrial_model->workplacelist($searchText, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Work Place';
		$this->loadViews("xx_trial/workplace", $this->global, $data, NULL);
	}
	function addworkplace(){
		$wp_name = $this->input->post('wp_name');
		$wp_address = $this->input->post('wp_address');
		$wp_phone = $this->input->post('wp_phone');
		$wp_array = array(
				'wp_name'=>$wp_name,
				'wp_address'=>$wp_address,
				'wp_phone'=>$wp_phone
			);
		$add = $this->xtrial_model->addworkplace($wp_array);
		redirect('x_workplacelist');
	}
	function editworkplace(){
		$wp_name = $this->input->post('wp_name');
		$wp_address = $this->input->post('wp_address');
		$wp_phone = $this->input->post('wp_phone');
		$id = $this->input->post('id');
		$wp_array = array(
				'wp_name'=>$wp_name,
				'wp_address'=>$wp_address,
				'wp_phone'=>$wp_phone
			);
		$add = $this->xtrial_model->editworkplace($wp_array, $id);
		redirect('x_workplacelist');
	}
	function delworkplace(){
		$id = $this->input->post('id');
		$wp_array = array(
				'isvalid'=>0
			);
		$add = $this->xtrial_model->editworkplace($wp_array, $id);
		redirect('x_workplacelist');
	}
	
	public function memberlist(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->xtrial_model->memberlistCount($this->name, $searchText);
		$returns = $this->paginationCompress ( "memberlist/", $count, 10 );
		$data['memberlist'] = $this->xtrial_model->memberlist($searchText, $returns["page"], $returns["segment"]);
		$data['total'] = $count;
		$data['page'] = $returns["segment"];
		$this->global['pageTitle'] = 'RAWR : Member';
		$this->loadViews("xx_trial/memberlist", $this->global, $data, NULL);
	}
	function addmember_page(){
		$data['comp'] = $this->xtrial_model->get_all_comp();
		$data['func'] = $this->xtrial_model->get_all_func();
		$this->global['pageTitle'] = 'RAWR : Add Member';
		$this->loadViews("xx_trial/addmember", $this->global, $data, NULL);
	}
	function addmember(){
		$mem_id = date('Y');
		$mem_id .= date('m');
		$mem_id .= '00000';
		$getlast_mem_id = $this->xtrial_model->get_last_member($mem_id);
		if(!empty($getlast_mem_id)){
			$new_id = $getlast_mem_id->id + 1;
		}else{
			$new_id = $mem_id + 1;
		}
		$member_name = $this->input->post('member_name');
		$member_address = $this->input->post('member_address');
		$member_phone = $this->input->post('member_phone');
		$comp = $this->input->post('comp');
		$func = $this->input->post('func');
		$wp_array = array(
				'member_name'=>$member_name,
				'member_address'=>$member_address,
				'member_phone'=>$member_phone,
				'wp_id'=>$comp,
				'jabatan'=>$func,
				'id'=>$new_id,
				'addedby'=>$this->name
			);
		$add = $this->xtrial_model->addmember($wp_array);
		redirect('memberlist');
	}
	function editmember_page($id){
		$this->load->helper(array('form', 'url'));
		$data['comp'] = $this->xtrial_model->get_all_comp();
		$data['func'] = $this->xtrial_model->get_all_func();
		$data['asli'] = $this->xtrial_model->get_member_by_id($id);
		$this->global['pageTitle'] = 'RAWR : Edit Member';
		$this->loadViews("xx_trial/editmember", $this->global, $data, NULL);
	}
	function editmember(){
		$member_name = $this->input->post('member_name');
		$member_address = $this->input->post('member_address');
		$member_phone = $this->input->post('member_phone');
		$comp = $this->input->post('comp');
		$func = $this->input->post('func');
		$id = $this->input->post('id');
		$wp_array = array(
				'member_name'=>$member_name,
				'member_address'=>$member_address,
				'member_phone'=>$member_phone,
				'wp_id'=>$comp,
				'jabatan'=>$func
			);
		$add = $this->xtrial_model->editmember($wp_array, $id);
		redirect('memberlist');
	}
	function delmember(){
		$id = $this->input->post('id');
		$wp_array = array(
				'isvalid'=>0
			);
		$add = $this->xtrial_model->editmember($wp_array, $id);
		redirect('memberlist');
	}
	function transaksi_rcm($mem_id = NULL){
		$data['user'] = $this->xtrial_model->get_all_member();
		$data['adm'] = $this->xtrial_model->get_x_setting('persen_adm');
		$data['ang'] = $this->xtrial_model->get_x_setting('persen_ang');
		$data['mem_id'] = $mem_id;
		$this->global['pageTitle'] = 'RAWR : Transaksi';
		$this->loadViews("xx_trial/translist", $this->global, $data, NULL);
	}
	function x_ajax_user($id){
		header("Content-type: text/json");
		$get_member_data = $this->xtrial_model->get_member_by_id($id);
		$get_comp = $this->xtrial_model->get_comp_by_id($get_member_data->wp_id);
		$get_last_pinj = $this->xtrial_model->get_pinj_by_memid($id);
		$status = 'Belum ada Transaksi';
		$tot_val = '-';
		$jangka = '-';
		$ang = '-';
		$pokok = '-';
		$bunga_per = '-';
		$bunga = '-';
		$adm_fee = '-';
		$adm_per = '-';
		$createdat = '-';
		$survey = '-';
		$jaminan = '-';
		$status_pinj = 2;
		$id_pinj = 0;
		if(!empty($get_last_pinj)){
			if($get_last_pinj->status_pinj == 0){
				$status = '<span class="label label-danger">BELUM LUNAS</span>P'.$get_last_pinj->id.' Tgl.'.$get_last_pinj->createdat;
			}else{
				$status = '<span class="label label-success">LUNAS</span>P'.$get_last_pinj->id.' Tgl.'.$get_last_pinj->createdat;
			}
			$tot_val = number_format($get_last_pinj->tot_val, 0, ',', '.');
			$jangka = $get_last_pinj->jangka;
			$ang = number_format($get_last_pinj->ang, 0, ',', '.');
			$pokok = number_format($get_last_pinj->pokok, 0, ',', '.');
			$bunga_per = $get_last_pinj->bunga_per;
			$bunga = number_format($get_last_pinj->bunga, 0, ',', '.');
			$adm_fee = number_format($get_last_pinj->adm_fee, 0, ',', '.');
			$adm_per = $get_last_pinj->adm_per;
			$createdat = $get_last_pinj->createdat;
			$survey = $get_last_pinj->survey;
			$jaminan = $get_last_pinj->jaminan;
			$status_pinj = $get_last_pinj->status_pinj;
			$id_pinj = $get_last_pinj->id;
		}
		$point = array(
			'mem_id'=>$id,
			'mem_address'=>$get_member_data->member_address,
			'mem_job'=>$get_comp->wp_name,
			'jabatan'=>$get_member_data->jabatan,
			'mem_phone'=>$get_member_data->member_phone,
			'tot_val'=>$tot_val,
			'jangka'=>$jangka,
			'ang'=>$ang,
			'pokok'=>$pokok,
			'bunga_per'=>$bunga_per,
			'bunga'=>$bunga,
			'adm_fee'=>$adm_fee,
			'adm_per'=>$adm_per,
			'createdat'=>$createdat,
			'status'=>$status,
			'survey'=>$survey,
			'jaminan'=>$jaminan,
			'status_pinj'=>$status_pinj,
			'id_pinj'=>$id_pinj
		);
		echo json_encode($point);
	}
	function open_new_x_issue($mem_id){
		$data['asli'] = $this->xtrial_model->get_member_by_id($mem_id);
		$data['adm'] = $this->xtrial_model->get_x_setting('persen_adm');
		$data['ang'] = $this->xtrial_model->get_x_setting('persen_ang');
		$data['survey'] = $this->xtrial_model->get_x_survey();
		$get_comp = $this->xtrial_model->get_comp_by_id($data['asli']->wp_id);
		$data['comp'] = $get_comp->wp_name;
		$this->global['pageTitle'] = 'RAWR : Buka Pinjaman';
		$this->loadViews("xx_trial/buka_pinjaman", $this->global, $data, NULL);
	}
	function add_new_x_issue(){
		$pinj_id = date('Ym');
		$pinj_id = $pinj_id * 100000;
		$last_pinj_id = $this->xtrial_model->last_pinj_id($pinj_id);
		if(!empty($last_pinj_id)){
			$new_id = $last_pinj_id->id + 1;
		}else{
			$new_id = $pinj_id + 1;
		}
		$mem_id = $this->input->post('member_id');
		$pinj = $this->input->post('pinj');
		$jangka = $this->input->post('jangka');
		$x_ang = $this->input->post('x_ang');
		$x_pokok = $this->input->post('x_pokok');
		$x_flower = $this->input->post('x_flower');
		$nama_survey = $this->input->post('nama_survey');
		$adm_fee = $this->input->post('adm_fee');
		$jaminan = $this->input->post('jaminan');
		$bunga_per = $this->input->post('bunga_per');
		$adm_per = $this->input->post('adm_per');
		$type_pinj = 'P';
		$pinj_info = array(
				'id'=>$new_id,
				'type_pinj'=>$type_pinj,
				'mem_id'=>$mem_id,
				'tot_val'=>$pinj,
				'jangka'=>$jangka,
				'ang'=>$x_ang,
				'pokok'=>$x_pokok,
				'bunga_per'=>$bunga_per,
				'bunga'=>$x_flower,
				'adm_fee'=>$adm_fee,
				'adm_per'=>$adm_per,
				'survey'=>$nama_survey,
				'jaminan'=>$jaminan,
				'createdat'=>date('Y-m-d H:i:s'),
				'open_by'=>$this->name
			);
		$add_pinj = $this->xtrial_model->add_pinj($pinj_info);
		$trans_info = array(
				'id_pinj'=>'P'.$new_id,
				'member_id'=>$mem_id,
				'keterangan'=>'Tarikan Pinjaman Baru',
				'tarikan'=>$pinj,
				'jasa'=>$adm_fee,
				'pokok'=>0,
				'angsuran'=>$adm_fee,
				'denda'=>0,
				'total'=>$adm_fee,
				'sisa_pokok'=>$pinj,
				'receivedby'=>$this->name
			);
		$add_trans = $this->xtrial_model->add_trans($trans_info);
		redirect('transaksi_rcm/'.$mem_id);
	}
	function x_histrans($mem_id){
		$get_user_trans = $this->xtrial_model->get_user_trans($mem_id);
		if(!empty($get_user_trans)){
			echo '
			<table class="table">
				<tr>
					<th>Tanggal</th>
					<th>ID Pinjaman</th>
					<th>Keterangan</th>
					<th>Tarikan</th>
					<th>Jasa</th>
					<th>Pokok</th>
					<th>Angsuran</th>
					<th>Denda</th>
					<th>Total</th>
					<th>Sisa Pokok</th>
				</tr>';
			foreach($get_user_trans as $record){
				echo '
				<tr>
					<td>'.$record->timestamp.'</td>
					<td>'.$record->id_pinj.'</td>
					<td>'.$record->keterangan.'</td>
					<td>Rp '.number_format($record->tarikan, 0, ',', '.').',-</td>
					<td>Rp '.number_format($record->jasa, 0, ',', '.').',-</td>
					<td>Rp '.number_format($record->pokok, 0, ',', '.').',-</td>
					<td>Rp '.number_format($record->angsuran, 0, ',', '.').',-</td>
					<td>Rp '.number_format($record->denda, 0, ',', '.').',-</td>
					<td>Rp '.number_format($record->total, 0, ',', '.').',-</td>
					<td>Rp '.number_format($record->sisa_pokok, 0, ',', '.').',-</td>
				</tr>
				';
			}
			echo '</table>';
		}
	}
	function boxbayar($pinj_id){
		header("Content-type: text/json");
		$load_loan_info = $this->xtrial_model->load_loan_info($pinj_id);
		$sisa_pokok = $this->xtrial_model->load_last_pokok('P'.$pinj_id);
		$last_transaksi_m = date('m', strtotime($sisa_pokok->timestamp));
		$last_transaksi_y = date('Y', strtotime($sisa_pokok->timestamp));
		$cek_jarak = (date('Y')*12 + date('m')) - ($last_transaksi_y*12 + $last_transaksi_m);
		$denda = 0;
		$keterangan = 'Angsuran P'.$load_loan_info->id;
		if($cek_jarak > 1){
			$denda = $cek_jarak*$load_loan_info->bunga;
			$keterangan .= ' dan '.$cek_jarak.' bulan denda';
		}
		$min_ang = $load_loan_info->bunga + $load_loan_info->pokok + $denda;
		$total_ang = $min_ang + $denda;
		$point = array(
				'keterangan'=>$keterangan,
				'jasa'=>$load_loan_info->bunga,
				'pokok'=>$load_loan_info->pokok,
				'denda'=>$denda,
				'denda_dis'=> 'Rp '.number_format($denda, 0, ',', '.').',-',
				'jasa_dis'=> 'Rp '.number_format($load_loan_info->bunga, 0, ',', '.').',-',
				'pokok_dis'=> 'Rp '.number_format($load_loan_info->pokok, 0, ',', '.').',-',
				'sisa_pokok'=>$sisa_pokok->sisa_pokok - $load_loan_info->pokok,
				'sisa_pokok_dis'=>'Rp '.number_format($sisa_pokok->sisa_pokok - $load_loan_info->pokok, 0, ',', '.').',-',
				'min_ang'=>$min_ang,
				'min_ang_dis'=>'IDR '.number_format($min_ang, 2, '.', ','),
				'total_ang'=>$total_ang,
				'total_ang_dis'=> 'Rp '.number_format($total_ang, 0, ',', '.').',-'
			);
		echo json_encode($point);
	}
	function convertidr($besaran){
		header("Content-type: text/json");
		$point = array(
			'besaran'=>'Rp '.number_format($besaran, 0, ',', '.')
			);
		echo json_encode($point);
	}
	function bayar_x_issue(){
		$keterangan = $this->input->post('keterangan');
		$jasa = $this->input->post('jasa');
		$bayar_pokok = $this->input->post('bayar_pokok');
		$angsuran = $this->input->post('angsuran');
		$denda = $this->input->post('denda');
		$total_ang = $this->input->post('total_ang');
		$sisa_pokok = $this->input->post('sisa_pokok');
		$mem_id = $this->input->post('mem_id');
		$pinj_id = $this->input->post('pinj_id');
		$bayarinfo = array(
				'id_pinj'=>'P'.$pinj_id,
				'member_id'=>$mem_id,
				'sisa_pokok'=>$sisa_pokok,
				'total'=>$total_ang,
				'denda'=>$denda,
				'angsuran'=>$angsuran,
				'pokok'=>$bayar_pokok,
				'jasa'=>$jasa,
				'keterangan'=>$keterangan,
				'tarikan'=>0,
				'receivedby'=>$this->name
			);
		$add_trans = $this->xtrial_model->add_trans($bayarinfo);
		if($sisa_pokok == 0){
			$pinjam_info = array('status_pinj'=>1);
			$edit_pinj = $this->xtrial_model->edit_pinj($pinjam_info, $pinj_id);
		}
		redirect('transaksi_rcm/'.$mem_id);
	}
	function kasbon($mem_id = NULL){
		$data['user'] = $this->xtrial_model->get_all_member();
		$data['kas'] = $this->xtrial_model->get_x_setting('persen_kas');
		$data['mem_id'] = $mem_id;
		$this->global['pageTitle'] = 'RAWR : Kasbon';
		$this->loadViews("xx_trial/kasbon", $this->global, $data, NULL);
	}
	function x_hiskasbon($mem_id){
		$get_user_trans = $this->xtrial_model->get_user_kasbon($mem_id);
		$data['listkasbon'] = $get_user_trans;
		$this->load->view('xx_trial/listkasbon',$data);
	}
	function buat_kasbon(){
		$kasbon = $this->input->post('kasbon');
		$jasa = $this->input->post('jasa');
		$mem_id = $this->input->post('mem_id');
		$total_bayar = $this->input->post('total_bayar');
		$bayarinfo = array(
				'createdat'=>date('Y-m-d'),
				'member_id'=>$mem_id,
				'kasbon'=>$kasbon,
				'kasbon_bayar'=>$total_bayar,
				'addedby'=>$this->name
			);
		$add_kasbon = $this->xtrial_model->add_kasbon($bayarinfo);
		redirect('kasbon/'.$mem_id);
	}
	function bayar_kasbon_id(){
		$id_kasbon = $this->input->post('id_kasbon');
		$mem_id = $this->input->post('mem_id');
		$kasbon_info = array(
				'closedat'=>date('Y-m-d'),
				'status_kas'=>1
			);
		$update = $this->xtrial_model->edit_kasbon($kasbon_info, $id_kasbon);
		redirect('kasbon/'.$mem_id);
	}
	function x_ajax_dash(){
		header("Content-type: text/json");
		$pinjaman_blm_lunas = $this->xtrial_model->pinjaman_blm_lunas();
		$kasbon_blm_lunas = $this->xtrial_model->kasbon_blm_lunas();
		
		$point = array(
			'pinjaman_blm_lunas'=>$pinjaman_blm_lunas,
			'kasbon_blm_lunas'=>$kasbon_blm_lunas,
			
			);
		echo json_encode($point);
	}
	function rep_pinjaman(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$this->load->library('pagination');
		$count = $this->xtrial_model->rep_pinjamanCount($fromDate, $toDate);
		$data['cash_out'] = $this->xtrial_model->get_sum_pinjaman($fromDate, $toDate);
		$data['cash_in'] = $this->xtrial_model->get_sum_pinjaman_in($fromDate, $toDate);
		$data['profit'] = $data['cash_in'] - $data['cash_out'];
		if($data['cash_out'] > 0){
			$data['profit_persen'] = ($data['profit'] / $data['cash_out'])*100;
		}else{
			$data['profit_persen'] = 0;
		}
		$returns = $this->paginationCompress ( "rep_pinjaman/", $count, 25 );
		$data['rep_pinjaman'] = $this->xtrial_model->rep_pinjaman($fromDate, $toDate, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Laporan Pinjaman';
		$this->loadViews("xx_trial/rep_pinjaman", $this->global, $data, NULL);
	}
	function rep_kasbon(){
		$searchText = $this->security->xss_clean($this->input->post('searchText'));
		$data['searchText'] = $searchText;
		$fromDate = $this->input->post('fromDate');
		$toDate = $this->input->post('toDate');
		$data['fromDate'] = $fromDate;
		$data['toDate'] = $toDate;
		$this->load->library('pagination');
		$count = $this->xtrial_model->rep_kasbonCount($fromDate, $toDate);
		$data['cash_out'] = $this->xtrial_model->get_sum_kasbon($fromDate, $toDate);
		$data['cash_in'] = $this->xtrial_model->get_sum_kasbon_in($fromDate, $toDate);
		$data['profit'] = $data['cash_in'] - $data['cash_out'];
		if($data['cash_out'] > 0){
			$data['profit_persen'] = ($data['profit'] / $data['cash_out'])*100;
		}else{
			$data['profit_persen'] = 0;
		}
		$returns = $this->paginationCompress ( "rep_kasbon/", $count, 25 );
		$data['rep_kasbon'] = $this->xtrial_model->rep_kasbon($fromDate, $toDate, $returns["page"], $returns["segment"]);
		$data['page'] = $returns["segment"];
		$data['total'] = $count;
		$this->global['pageTitle'] = 'RAWR : Laporan Kasbon';
		$this->loadViews("xx_trial/rep_kasbon", $this->global, $data, NULL);
	}
	function cash_flow($date){
		$year = date('Y', strtotime($date));
		$jan_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-01-01 00:00:00', $year.'-02-01 00:00:00');
		$jan_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-01-01 00:00:00', $year.'-02-01 00:00:00');
		$jan_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-01-01', $year.'-02-01');
		$jan_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-01-01', $year.'-02-01');
		
		$feb_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-02-01 00:00:00', $year.'-03-01 00:00:00');
		$feb_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-02-01 00:00:00', $year.'-03-01 00:00:00');
		$feb_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-02-01', $year.'-03-01');
		$feb_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-02-01', $year.'-03-01');
		
		$mar_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-03-01 00:00:00', $year.'-04-01 00:00:00');
		$mar_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-03-01 00:00:00', $year.'-04-01 00:00:00');
		$mar_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-03-01', $year.'-04-01');
		$mar_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-03-01', $year.'-04-01');
		
		$apr_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-04-01 00:00:00', $year.'-05-01 00:00:00');
		$apr_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-04-01 00:00:00', $year.'-05-01 00:00:00');
		$apr_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-04-01', $year.'-05-01');
		$apr_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-04-01', $year.'-05-01');
		
		$mei_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-05-01 00:00:00', $year.'-06-01 00:00:00');
		$mei_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-05-01 00:00:00', $year.'-06-01 00:00:00');
		$mei_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-05-01', $year.'-06-01');
		$mei_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-05-01', $year.'-06-01');
		
		$jun_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-06-01 00:00:00', $year.'-07-01 00:00:00');
		$jun_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-06-01 00:00:00', $year.'-07-01 00:00:00');
		$jun_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-06-01', $year.'-07-01');
		$jun_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-06-01', $year.'-07-01');
		
		$jul_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-07-01 00:00:00', $year.'-08-01 00:00:00');
		$jul_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-07-01 00:00:00', $year.'-08-01 00:00:00');
		$jul_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-07-01', $year.'-08-01');
		$jul_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-07-01', $year.'-08-01');
		
		$aug_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-08-01 00:00:00', $year.'-09-01 00:00:00');
		$aug_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-08-01 00:00:00', $year.'-09-01 00:00:00');
		$aug_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-08-01', $year.'-09-01');
		$aug_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-08-01', $year.'-09-01');
		
		$sep_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-09-01 00:00:00', $year.'-10-01 00:00:00');
		$sep_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-09-01 00:00:00', $year.'-10-01 00:00:00');
		$sep_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-09-01', $year.'-10-01');
		$sep_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-09-01', $year.'-10-01');
		
		$oct_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-10-01 00:00:00', $year.'-11-01 00:00:00');
		$oct_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-10-01 00:00:00', $year.'-11-01 00:00:00');
		$oct_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-10-01', $year.'-11-01');
		$oct_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-10-01', $year.'-11-01');
		
		$nov_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-11-01 00:00:00', $year.'-12-01 00:00:00');
		$nov_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-11-01 00:00:00', $year.'-12-01 00:00:00');
		$nov_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-11-01', $year.'-12-01');
		$nov_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-11-01', $year.'-12-01');
		$year_n = $year + 1;
		$des_pin_out = $this->xtrial_model->get_sum_pinjaman_chart($year.'-12-01 00:00:00', $year_n.'-01-01 00:00:00');
		$des_pin_in = $this->xtrial_model->get_sum_pinjaman_in_chart($year.'-12-01 00:00:00', $year_n.'-01-01 00:00:00');
		$des_kas_out = $this->xtrial_model->get_sum_kasbon_chart($year.'-12-01', $year_n.'-01-01');
		$des_kas_in = $this->xtrial_model->get_sum_kasbon_in_chart($year.'-12-01', $year_n.'-01-01');
		$data['year'] = $year;
		$data['cash_in_pinj'] = $jan_pin_in.', '.$feb_pin_in.', '.$mar_pin_in.', '.$apr_pin_in.', '.$mei_pin_in.', '.$jun_pin_in.', '.$jul_pin_in.', '.$aug_pin_in.', '.$sep_pin_in.', '.$oct_pin_in.', '.$nov_pin_in.', '.$des_pin_in;
		$data['cash_out_pinj'] = $jan_pin_out.', '.$feb_pin_out.', '.$mar_pin_out.', '.$apr_pin_out.', '.$mei_pin_out.', '.$jun_pin_out.', '.$jul_pin_out.', '.$aug_pin_out.', '.$sep_pin_out.', '.$oct_pin_out.', '.$nov_pin_out.', '.$des_pin_out;
		$data['cash_in_kas'] = $jan_kas_in.', '.$feb_kas_in.', '.$mar_kas_in.', '.$apr_kas_in.', '.$mei_kas_in.', '.$jun_kas_in.', '.$jul_kas_in.', '.$aug_kas_in.', '.$sep_kas_in.', '.$oct_kas_in.', '.$nov_kas_in.', '.$des_kas_in;
		$data['cash_out_kas'] = $jan_kas_out.', '.$feb_kas_out.', '.$mar_kas_out.', '.$apr_kas_out.', '.$mei_kas_out.', '.$jun_kas_out.', '.$jul_kas_out.', '.$aug_kas_out.', '.$sep_kas_out.', '.$oct_kas_out.', '.$nov_kas_out.', '.$des_kas_out;
		$this->load->view('xx_trial/chart_stack', $data);
	}
	function x_image_session(){
		$img_type = $this->input->post('img_type');
		$id = $this->input->post('id');
		
		$config['upload_path']          = './assets/report';
		$config['allowed_types']        = 'jpg|JPG|png|PNG|jpeg|JPEG';
		$config['max_size']             = 10000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
		$new_name = 'USER_'.$id;
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
		$this->upload->do_upload('berkas');
		$xx = $this->upload->data('file_name');
		$reportInfo = array(
			'img_url'=>$xx
			);
		if($img_type == 'member_img'){
			$add = $this->xtrial_model->editmember($reportInfo, $id);
			redirect('editmember_page/'.$id);
		}
		
	}
	function user_img($id){
		$asli = $this->xtrial_model->get_member_by_id($id);
		if($asli->img_url != ''){
			echo '<img class="img-circle img-bordered-sm" src="'.base_url().'assets/report/'.$asli->img_url.'" height="200px" alt="user image">';
		}else{
			echo '<h5 class="text-center">No Image</h5>';
		}
	}
	function x_ajax_pinj($value){
		$value = $value + 1;
		echo $value;
	}
}	
?>
