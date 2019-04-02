<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Srmivol_model extends CI_Model{

    function get_area(){
        $this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('srmi_cbm_area');
        $this->db2->where('isvalid', 1);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }

    function get_arealist(){
        $this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('srmi_cbm_area');
        $this->db2->where('isvalid', 1);
        $query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }

    function dailyrec($daily){
        $this->db2 = $this->load->database('cbmdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('srmi_cbm_vol', $daily);
        $insert_id = $this->db2->insert_id();
        $this->db2->trans_complete();
        return $insert_id;
    }

}