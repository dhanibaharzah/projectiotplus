<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Hse_configurasi_model extends CI_Model{
	function user_role_byNIK($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('NIK', $id);
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result->hse_role;
	}
	function APDCount($searchText = ''){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_apd');
		if(!empty($searchText)){
			$likeCriteria = "(
					toolname LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function APD($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_apd');
		if(!empty($searchText)){
			$likeCriteria = "(
					toolname LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function addNewAPD($APD){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('tbl_apd', $APD);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function get_APD($id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_apd');
		$this->db2->where('id', $id);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function edit_APD($APDInfo, $id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('tbl_apd', $APDInfo);
		return TRUE;
	}
	function get_edit(){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_apd');
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('group', 'ASC');
		$this->db2->order_by('num', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	//end function APD
	//function Energy
	function EnergyCount($searchText = ''){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_energy');
		if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
        $query = $this->db2->get();
        
        return $query->num_rows();
    }
	
	function Energy($searchText = '', $page, $segment)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_energy');
        if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
		$this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function addNewEnergy($Energy)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_energy', $Energy);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function get_Energy($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_energy');
        
		$this->db2->where('id', $id);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	function edit_Energy($EnergyInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_energy', $EnergyInfo);
		
        return TRUE;
    }
	
	
	
	//end function Energy
	
	//function Function
     function FunctCount($searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_function');
		if(!empty($searchText)) {
            $likeCriteria = "(
							func LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
        $query = $this->db2->get();
        
        return $query->num_rows();
    }
	
	function Funct($searchText = '', $page, $segment)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_function');
        if(!empty($searchText)) {
            $likeCriteria = "(
							func LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
		$this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function addNewFunct($Funct)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_function', $Funct);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function get_Funct($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_function');
        
		$this->db2->where('id', $id);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	function edit_Funct($FunctInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_function', $FunctInfo);
		
        return TRUE;
    }
	//end function Function
	
	//function Loto
     function LotoCount($searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_loto');
		if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
        $query = $this->db2->get();
        
        return $query->num_rows();
    }
	
	function Loto($searchText = '', $page, $segment)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_loto');
        if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
		$this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function addNewLoto($Funct)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_loto', $Funct);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function get_Loto($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_loto');
        
		$this->db2->where('id', $id);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	function edit_Loto($LotoInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_loto', $LotoInfo);
		
        return TRUE;
    }
	//end function Function
	
	//function Override
     function OverrideCount($searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_override');
		if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
        $query = $this->db2->get();
        
        return $query->num_rows();
    }
	
	function Override($searchText = '', $page, $segment)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_override');
        if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
		$this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function addNewOverride($Override)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_override', $Override);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function get_Override($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_override');
        
		$this->db2->where('id', $id);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	function edit_Override($OverrideInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_override', $OverrideInfo);
		
        return TRUE;
    }
	//end function Function
	
	//function Tool
     function ToolCount($searchText = '')
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_tool');
		if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
        $query = $this->db2->get();
        
        return $query->num_rows();
    }
	
	function Tool($searchText = '', $page, $segment)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_tool');
        if(!empty($searchText)) {
            $likeCriteria = "(
							toolname LIKE '%".$searchText."%'
                            
							)";
            $this->db2->where($likeCriteria);
			
        }
		$this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function addNewTool($Tool)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tbl_tool', $Tool);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function get_Tool($id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tbl_tool');
        
		$this->db2->where('id', $id);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	function edit_Tool($ToolInfo, $id)
    {
		$this->db2 = $this->load->database('hsedb', TRUE);
        $this->db2->where('id', $id);
		$this->db2->update('tbl_tool', $ToolInfo);
		
        return TRUE;
    }
	//end function Function
	
   //	area
   function AreaCount($searchText = ''){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_area');
		if(!empty($searchText)){
			$likeCriteria = "(
					toolname LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$query = $this->db2->get();
		return $query->num_rows();
	}
	function Area($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_area');
		if(!empty($searchText)){
			$likeCriteria = "(
					toolname LIKE '%".$searchText."%'
				)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('group');
		$this->db2->order_by('num');
		$this->db2->limit($page, $segment);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
//======================================================	
	function get_user(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->order_by('hse_picar');
		$this->db2->where('hse_picar !=', 0);
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_num($grup){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_area');
		$this->db2->where('group', $grup);
		$this->db2->order_by('num', 'desc');
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function addNewArea($Area){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('tbl_area', $Area);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
//---------------------------------------------------------	
	function get_Area($id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tbl_area');
		$this->db2->where('id', $id);
		$query = $this->db2->get();
		$result = $query->row();
		return $result;
	}
	function edit_Area($Area, $id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('tbl_area', $Area);
	}
//=======================================
	function user_setcount($searchText=''){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)){
			$likeCriteria = "(
							uName LIKE '%".$searchText."%' OR 
                            hse_role LIKE '%".$searchText."%' OR 
							hse_picar LIKE '%".$searchText."%'
							)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->order_by('uName', 'ASC');
		$query = $this->db2->get();
		$result = $query->num_rows();
		return $result;
	}
	function user_set($searchText = '', $page, $segment){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		if(!empty($searchText)){
			$likeCriteria = "(
							uName LIKE '%".$searchText."%' OR 
							hse_role LIKE '%".$searchText."%' OR 
							hse_picar LIKE '%".$searchText."%'
							)";
			$this->db2->where($likeCriteria);
		}
		$this->db2->limit($page, $segment);
		$this->db2->order_by('uName', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function user_setID($id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('id', $id);
		$this->db2->order_by('uName', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function edit_user_set($ToolInfo, $id){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('users', $ToolInfo);
		return TRUE;
	}
	function picar(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('users');
		$this->db2->where('hse_picar !=', 0);
		$this->db2->order_by('hse_picar', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_dd_hse_roles(){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hse_role');
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('code', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_dd_hse_picar(){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hse_picar');
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('code', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function get_dd_area_group(){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('area_group');
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('code', 'ASC');
		$query = $this->db2->get();
		$result = $query->result();
		return $result;
	}
	function last_code(){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hse_picar');
		$this->db2->where('code <', 99);
		$this->db2->order_by('code', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result->code;
	}
	function addcode_area($area){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('hse_picar', $area);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function editcode_area($ToolInfo, $id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('hse_picar', $ToolInfo);
		return TRUE;
	}
	function last_group(){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->select('*');
		$this->db2->from('area_group');
		$this->db2->where('code <', 100000);
		$this->db2->order_by('code', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		$result = $query->row();
		return $result->code;
	}
	function addgroup_area($area){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->trans_start();
		$this->db2->insert('area_group', $area);
		$insert_id = $this->db2->insert_id();
		$this->db2->trans_complete();
		return $insert_id;
	}
	function editgroup_area($ToolInfo, $id){
		$this->db2 = $this->load->database('hsedb', TRUE);
		$this->db2->where('id', $id);
		$this->db2->update('area_group', $ToolInfo);
		return TRUE;
	}
}