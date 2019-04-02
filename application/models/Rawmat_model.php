<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Rawmat_model extends CI_Model
{
	//==========================================================C E M E N T====================================================
		public function getrawcement(){
			$this->db2 = $this->load->database('slcidb', TRUE); //nama database
			$this->db2->select('*'); // * berarti semua kolom 
			$this->db2->from('qc_rawmat_hardness_cement'); //nama tabel
			$this->db2->order_by('id', 'desc');
			//if(!empty($start) and !empty($endd)){
			//	$whereclause = '( timestamp >= "'.$start.' 08:00:00" and timestamp <= "'.$endd.' 08:00:00:" )';
			//	$this->db2->where($whereclause);
			//}

			$query = $this->db2->get();
			return $query->result();
		}

		function cementchart($start, $endd){
			$this->db2 = $this->load->database('slcidb', TRUE); //nama database
			$this->db2->select('*'); // * berarti semua kolom 
			$this->db2->from('qc_rawmat_hardness_cement'); //nama tabel
			//$this->db2->where('initial_set_time != 0');
			$this->db2->group_by('date');
			//$this->db2->where('status', 2);
			$this->db2->order_by('id', 'desc');
		 
			if(empty($start) or empty($endd)){
				$this->db2->limit(30);
			}
			if(!empty($start) and !empty($endd)){
				$whereclause = '( date >= "'.$start.'" and date <= "'.$endd.'" )';
				$this->db2->where($whereclause);
			}

			$query = $this->db2->get();
			return $query->result();
		}
		
		function rawcementCount($searchText = ''){ //tambahain , $toDate nanti
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(no_truck LIKE '%$likes%' or supplier LIKE '%$likes%' or no_surat_jalan LIKE '%$likes%' ) AND";
			}
			$eee = substr($uuu, 0, -3);
			
			$this->db2 = $this->load->database('slcidb', TRUE);
			$this->db2->select('*');
			$this->db2->from('qc_rawmat_hardness_cement');
			if(!empty($searchText)) {
				$likeCriteria = "(
								no_truck LIKE '%".$searchText."%'
								OR supplier LIKE '%".$searchText."%'
								OR no_surat_jalan LIKE '%".$searchText."%'
								)";
				$this->db2->where($eee);
			
			}
			$this->db2->order_by('id', 'DESC');
			
			$query = $this->db2->get();
			return $query->num_rows();
		}
		
		function rawcement($searchText = '', $page, $segment){ //tambahain , $toDate nanti
			$explode_an = explode(" ", $searchText);
			$aa = 0;
			$uuu = " ";
			foreach($explode_an as $likes){
				$aa++;
				$uuu.= "(no_truck LIKE '%$likes%' or supplier LIKE '%$likes%' or no_surat_jalan LIKE '%$likes%' ) AND";
			}
			$eee = substr($uuu, 0, -3);
			
			 $this->db2 = $this->load->database('slcidb', TRUE);
			 $this->db2->select('*');
			 $this->db2->from('qc_rawmat_hardness_cement');
			 if(!empty($searchText)) {
				$likeCriteria = "(
								no_truck LIKE '%".$searchText."%'
								OR supplier LIKE '%".$searchText."%'
								OR no_surat_jalan LIKE '%".$searchText."%'
								)";
				$this->db2->where($eee);
			
			}
			 $this->db2->order_by('id', 'DESC');
			 $this->db2->limit($page, $segment);
			 
			 $query = $this->db2->get();
			 $result = $query->result();        
			 return $result;
		}

//==========================================================LIME====================================================
	public function getrawlime(){
		$this->db2 = $this->load->database('slcidb', TRUE); //nama database
		$this->db2->select('*'); // * berarti semua kolom 
		$this->db2->from('qc_rawmat_slaking_quicklime'); //nama tabel
		$this->db2->order_by('id', 'desc');

		$query = $this->db2->get();
		return $query->result();
	}

	function limechart($start, $endd){
		$this->db2 = $this->load->database('slcidb', TRUE); //nama database
		$this->db2->select('*'); // * berarti semua kolom 
		$this->db2->from('qc_rawmat_slaking_quicklime'); //nama tabel
		//$this->db2->where('initial_set_time != 0');
		$this->db2->group_by('date');
		//$this->db2->where('status', 2);
		$this->db2->order_by('id', 'desc');
	 
		if(empty($start) or empty($endd)){
			$this->db2->limit(30);
		}
		if(!empty($start) and !empty($endd)){
			$whereclause = '( date >= "'.$start.'" and date <= "'.$endd.'" )';
			$this->db2->where($whereclause);
		}

		$query = $this->db2->get();
		return $query->result();
	}

	function rawlimeCount($searchText = ''){ //tambahain , $toDate nanti
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(no_truck LIKE '%$likes%' or supplier LIKE '%$likes%' or lokasi LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);

		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('qc_rawmat_slaking_quicklime');
		if(!empty($searchText)) {
			$likeCriteria = "(
							no_truck LIKE '%".$searchText."%'
							OR supplier LIKE '%".$searchText."%'
							OR lokasi LIKE '%".$searchText."%'
							)";
			$this->db2->where($eee);

		}
		$this->db2->order_by('id', 'DESC');

		$query = $this->db2->get();
		return $query->num_rows();
		}

	function rawlime($searchText = '', $page, $segment){
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(no_truck LIKE '%$likes%' or supplier LIKE '%$likes%' or lokasi LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);

			$this->db2 = $this->load->database('slcidb', TRUE);
			$this->db2->select('*');
			$this->db2->from('qc_rawmat_slaking_quicklime');
			if(!empty($searchText)) {
			$likeCriteria = "(
							no_truck LIKE '%".$searchText."%'
							OR supplier LIKE '%".$searchText."%'
							OR lokasi LIKE '%".$searchText."%'
							)";
			$this->db2->where($eee);

		}
			$this->db2->order_by('id', 'DESC');
			$this->db2->limit($page, $segment);
			
			$query = $this->db2->get();
			$result = $query->result();        
			return $result;
		}

//==========================================================SAND====================================================

	public function getrawsand(){
		$this->db2 = $this->load->database('slcidb', TRUE); //nama database
		$this->db2->select('*'); // * berarti semua kolom 
		$this->db2->from('qc_rawmat_sand'); //nama tabel
		$this->db2->order_by('id', 'desc');

		$query = $this->db2->get();
		return $query->result();
		}

	function rawsandCount($searchText = ''){ //tambahain , $toDate nanti
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(no_truck LIKE '%$likes%' or supplier_name LIKE '%$likes%') AND";
		}
		$eee = substr($uuu, 0, -3);

		$this->db2 = $this->load->database('slcidb', TRUE);
		$this->db2->select('*');
		$this->db2->from('qc_rawmat_sand');
		if(!empty($searchText)) {
			$likeCriteria = "(
							no_truck LIKE '%".$searchText."%'
							OR supplier_name LIKE '%".$searchText."%'
							)";
			$this->db2->where($eee);

		}
		$this->db2->order_by('id', 'DESC');

		$query = $this->db2->get();
		return $query->num_rows();
		}

	function rawsand($searchText = '', $page, $segment){
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(no_truck LIKE '%$likes%' or supplier_name LIKE '%$likes%') AND";
		}
		$eee = substr($uuu, 0, -3);

			$this->db2 = $this->load->database('slcidb', TRUE);
			$this->db2->select('*');
			$this->db2->from('qc_rawmat_sand');
			if(!empty($searchText)) {
			$likeCriteria = "(
							no_truck LIKE '%".$searchText."%'
							OR supplier_name LIKE '%".$searchText."%'
							)";
			$this->db2->where($eee);

		}
			$this->db2->order_by('id', 'DESC');
			$this->db2->limit($page, $segment);
			
			$query = $this->db2->get();
			$result = $query->result();        
			return $result;
		}	

}
