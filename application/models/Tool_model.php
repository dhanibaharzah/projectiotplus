<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tool_model extends CI_Model
{
   
   //gearboxxxxxxxx
    function rentaltoolCount($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR user LIKE '%".$searchText."%'
							OR defitem LIKE '%".$searchText."%'
							
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('isvalid', 1);
		$this->db2->order_by('id', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function rentaltool($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR user LIKE '%".$searchText."%'
							OR defitem LIKE '%".$searchText."%'
							
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->order_by('id', 'ASC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }

	function updatecart($toolInfo, $id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('id', $id);
        $this->db2->update('tools', $toolInfo);
        
        return TRUE;
    }
	
	function delcart($toolInfo, $id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('id', $id);
        $this->db2->update('tools', $toolInfo);
        
        return TRUE;
    }
	
	function cartdetail($user)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
        $this->db2->where('sts', 'booked');
		$this->db2->where('invoice', 0);
        $this->db2->where('user', $user);
		$this->db2->order_by('id', 'ASC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	//part of check out/
	function getinvoiceID()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orders');
		$this->db2->order_by('id', 'DESC');
		
        $query = $this->db2->get();
        $this->db2->limit(1);
        $result = $query->row();        
        return $result;
    }
	function addinvoiceID($neworderInfo)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('orders', $neworderInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function writeinvoice($orderInfo)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('orderdetail', $orderInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function checktool($toolInfo, $id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('id', $id);
        $this->db2->update('tools', $toolInfo);
        
        return TRUE;
    }
	//end of checkout
	
	function newinvoiceCount($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(username LIKE '%$likes%' or id LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orders');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR username LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('name','New Order');
		$this->db2->order_by('datecreation', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function newinvoice($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(username LIKE '%$likes%' or id LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orders');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR username LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('name','New Order');
		$this->db2->order_by('datecreation', 'ASC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	//booked to inorder
	function procesinvoiceCount($id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('ordersid',$id);
		$this->db2->where('ordersts',0);
		$this->db2->where('sts','booked');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
	function procesinvoice($id)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('ordersid',$id);
		$this->db2->where('ordersts',0);
		$this->db2->where('sts','booked');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function getinvoiceUser($id)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('ordersid',$id);
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function gettoolIDbyNum($num)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('num',$num);
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function countitem($ordersid, $cond)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('ordersid',$ordersid);
		$this->db2->where('sts',$cond);
        $query = $this->db2->get();
        
        $result = $query->num_rows();        
        return $result;
    }
	
	function countitems($ordersid)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('ordersid',$ordersid);
        $query = $this->db2->get();
        
        $result = $query->num_rows();        
        return $result;
    }
	
	function updateinvoice($invoiceInfo, $num)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('num', $num);
        $this->db2->update('orderdetail', $invoiceInfo);
        
        return TRUE;
    }
	
	function updateorder($orderInfo, $id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('id', $id);
        $this->db2->update('orders', $orderInfo);
        
        return TRUE;
    }
	function updateorderdetail($orderdetailInfo, $id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('ordersid', $id);
        $this->db2->update('orderdetail', $orderdetailInfo);
        
        return TRUE;
    }
	//end of booked to inorder
	
	function ongoinvoiceCount()
    {
		//$explode_an = explode(" ", $searchText);
		//$aa = 0;
		//$uuu = " ";
		//foreach($explode_an as $likes){
		//	$aa++;
		//	$uuu.= "(username LIKE '%$likes%' or id LIKE '%$likes%' ) AND";
		//}
		//$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
        //if(!empty($searchText)) {
        //    $likeCriteria = "(
		//					id LIKE '%".$searchText."%'
        //                    OR username LIKE '%".$searchText."%'
		//					)";
        //    $this->db2->where($eee);
			
        //}
		$this->db2->where('sts','inorder');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
	function ongoinvoiceCountv2($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(user LIKE '%$likes%' or id LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*,COUNT(num) as total');
        $this->db2->from('orderdetail');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('sts','inorder');
		$this->db2->group_by('user');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function ongoinvoice($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(user LIKE '%$likes%' or id LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*,COUNT(num) as total');
        $this->db2->from('orderdetail');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('sts','inorder');
		$this->db2->group_by('user');
		$this->db2->order_by('timestamp', 'ASC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	//inorder to returned
	function closeinvoiceCount($user)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*,COUNT(num) as total');
        $this->db2->from('orderdetail');
		$this->db2->where('user',$user);
		$this->db2->where('sts !=','inorder');
		$this->db2->group_by('ordersid');
        $query = $this->db2->get();
        return $query->result();
    }
	
	function closeinvoiceAll($user)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('user',$user);
		$this->db2->where('sts','inorder');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
	function closeinvoice($user)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('user',$user);
		$this->db2->where('ordersts',1);
		$this->db2->where('sts','inorder');
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	
	//end of inoeder to returned
	
	function errortoolCount($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('sts !=','available');
		$this->db2->where('sts !=','booked');
		$this->db2->where('sts !=','inorder');
		$this->db2->where('invoice',0);
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function errortool($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('sts !=','available');
		$this->db2->where('sts !=','booked');
		$this->db2->where('sts !=','inorder');
		$this->db2->where('invoice',0);
		$this->db2->order_by('timestamp', 'ASC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function allinvoiceCount($searchText = '', $fromDate, $toDate)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(username LIKE '%$likes%' or id LIKE '%$likes%' or name LIKE '%$likes%') AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orders');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR username LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(datecreation, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db2->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(datecreation, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db2->where($likeCriteria);
        }
		$this->db2->order_by('datecreation', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function allinvoice($searchText = '', $fromDate, $toDate, $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(username LIKE '%$likes%' or id LIKE '%$likes%' or name LIKE '%$likes%') AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orders');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR username LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(datecreation, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db2->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(datecreation, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db2->where($likeCriteria);
        }
		$this->db2->order_by('datecreation', 'DESC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function detailinvoice($id)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('ordersid',$id);
		$this->db2->order_by('timestamp', 'ASC');
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function alltoolCount($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->order_by('id', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function alltool($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->order_by('id', 'ASC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        $result = $query->result();        
        return $result;
    }
	
	function detailtool($id)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
		$this->db2->where('id',$id);
        $query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function toolhisCount($id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('id',$id);
		$this->db2->order_by('num', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function toolhis($id, $page, $segment )
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('id',$id);
		$this->db2->order_by('num', 'DESC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function addtool($toolInfo)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('tools', $toolInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	
	function gettoolData($id)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
		$this->db2->where('id',$id);
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function edittool($toolInfo, $id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('id', $id);
        $this->db2->update('tools', $toolInfo);
        
        return TRUE;
    }
	function markas($toolInfo, $time)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('timestamp <=', $time);
		$this->db2->where('sts', 'inorder');
        $this->db2->update('tools', $toolInfo);
        
        return TRUE;
    }
	function markas2($invoiceInfo, $time)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('timestamp <=', $time);
		$this->db2->where('sts', 'inorder');
        $this->db2->update('orderdetail', $invoiceInfo);
        
        return TRUE;
    }
	function markas3($clearInfo, $time)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('timestamp <=', $time);
		$this->db2->where('sts', 'booked');
		$this->db2->where('invoice', 0);
        $this->db2->update('tools', $clearInfo);
        
        return TRUE;
    }
	function getproblematic()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 1);
		$this->db2->where('sts !=', 'available');
		$this->db2->where('sts !=', 'booked');
		$this->db2->where('sts !=', 'inorder');
		$this->db2->where('invoice !=', 0);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function getalluser()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >=', 90000);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	
	function alltroubleCount($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' or user LIKE '%$likes%' or sts LIKE '%$likes%') AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR pos LIKE '%".$searchText."%'
                            OR ordersid LIKE '%".$searchText."%'
                            OR user LIKE '%".$searchText."%'
                            OR sts LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR size LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('sts !=','booked');
		$this->db2->where('sts !=','inorder');
		$this->db2->where('sts !=','returned');
		$this->db2->order_by('timestamp', 'DESC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function alltrouble($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' or user LIKE '%$likes%' or sts LIKE '%$likes%') AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR pos LIKE '%".$searchText."%'
                            OR ordersid LIKE '%".$searchText."%'
                            OR user LIKE '%".$searchText."%'
                            OR sts LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR size LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->where('sts !=','booked');
		$this->db2->where('sts !=','inorder');
		$this->db2->where('sts !=','returned');
		$this->db2->order_by('timestamp', 'DESC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }

	function mytoolCount($user)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('user',$user);
		$this->db2->where('sts !=','returned');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
	function mytool($user, $page, $segment)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('user',$user);
		$this->db2->where('sts !=','returned');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        return $query->result();
    }
	
	function detailorder($id, $invoice, $user)
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('orderdetail');
		$this->db2->where('id', $id);
		$this->db2->where('ordersid', $invoice);
		$this->db2->where('user', $user);
		$this->db2->order_by('timestamp','DESC');
		$this->db2->limit(1);
        $query = $this->db2->get();
        
        $result = $query->row();        
        return $result;
    }
	
	function reporttool($reportInfo)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->trans_start();
        $this->db2->insert('report', $reportInfo);
        
        $insert_id = $this->db2->insert_id();
        
        $this->db2->trans_complete();
        
        return $insert_id;
    }
	function reporttableCount($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(Roles.name LIKE '%$likes%' or Roles.brand LIKE '%$likes%' or Roles.size LIKE '%$likes%' ) AND";
		}
		$this->db2 = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('Repo.repid as repoid, Repo.id as id, Repo.num as num, Repo.status as sts, Repo.sts as rsts, Roles.name as name, Roles.brand as brand, Roles.size as size, Roles.user as user');
        $this->db2->from('report as Repo');
        $this->db2->join('tools as Roles','Roles.id = Repo.id');
        $this->db2->order_by('Repo.sts', 'ASC');
		$this->db2->where('Roles.isvalid', 1);
		$this->db2->where('Repo.isvalid', 1);
        $query = $this->db2->get();
        
        $result = $query->num_rows();
		
        return $result;
    }
	function reporttable($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(Roles.name LIKE '%$likes%' or Roles.brand LIKE '%$likes%' or Roles.size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		$this->db2 = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('Repo.repid as repoid,Repo.timestamp as timestamp, Repo.id as id, Repo.num as num, Repo.status as sts,Repo.reason as reason, Repo.sts as rsts, Roles.name as name, Roles.brand as brand, Roles.size as size, Roles.user as user, Roles.invoice as invoice, Roles.sts as toolsts');
        $this->db2->from('report as Repo');
        $this->db2->join('tools as Roles','Roles.id = Repo.id');
        $this->db2->order_by('Repo.sts', 'ASC');
		if(!empty($searchText)) {
            $this->db2->where($eee);
			
        }
		$this->db2->where('Roles.isvalid', 1);
		$this->db2->where('Repo.isvalid', 1);
		$this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();
		
        return $result;
    }
	function detailreport($id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

        $this->db2->select('Repo.repid as repoid, Repo.id as id, Repo.num as num, Repo.status as sts,Repo.reason as reason, Roles.name as name, Roles.brand as brand, Roles.size as size, Roles.user as user, Roles.invoice as invoice');
        $this->db2->from('report as Repo');
        $this->db2->join('tools as Roles','Roles.id = Repo.id');
        $this->db2->order_by('Repo.sts', 'ASC');
		if(!empty($searchText)) {
            $this->db2->where($eee);
			
        }
		$this->db2->where('Roles.isvalid', 1);
		$this->db2->where('Repo.repid', $id);
        $query = $this->db2->get();
        
        $result = $query->row();
		
        return $result;
    }
	function updatereport($reportInfo, $repid)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('repid', $repid);
        $this->db2->update('report', $reportInfo);
        
        return TRUE;
    }
	function getemaileduser()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
		$charleng = 'CHAR_LENGTH(slcimail) > 17';
		$this->db2->where($charleng);
		$this->db2->where('uFlag', 1);
		$this->db2->where('NIK >=', 90000);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function getpictool()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('pictool', 1);
		
        $query = $this->db2->get();
        $this->db2->limit(1);
        $result = $query->row();        
        return $result;
    }
	function getmantool()
    {
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('users');
        $this->db2->where('pictool', 2);
		
        $query = $this->db2->get();
        $this->db2->limit(1);
        $result = $query->row();        
        return $result;
    }
	function updatepic($userInfo, $id)
    {
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->where('id', $id);
        $this->db2->update('users', $userInfo);
        
        return TRUE;
    }
	
	function demoltoolCount($searchText = '')
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
		$this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 0);
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->order_by('id', 'ASC');
        $query = $this->db2->get();
        return $query->num_rows();
    }
	
    function demoltool($searchText = '', $page, $segment)
    {
		$explode_an = explode(" ", $searchText);
		$aa = 0;
		$uuu = " ";
		foreach($explode_an as $likes){
			$aa++;
			$uuu.= "(name LIKE '%$likes%' or brand LIKE '%$likes%' or size LIKE '%$likes%' ) AND";
		}
		$eee = substr($uuu, 0, -3);
		
        $this->db2 = $this->load->database('otherdb', TRUE);
        $this->db2->select('*');
        $this->db2->from('tools');
		$this->db2->where('isvalid', 0);
        if(!empty($searchText)) {
            $likeCriteria = "(
							id LIKE '%".$searchText."%'
                            OR name LIKE '%".$searchText."%'
                            OR brand LIKE '%".$searchText."%'
							OR size LIKE '%".$searchText."%'
							OR user LIKE '%".$searchText."%'
							)";
            $this->db2->where($eee);
			
        }
		$this->db2->order_by('id', 'ASC');
        $this->db2->limit($page, $segment);
        $query = $this->db2->get();
        
        $result = $query->result();        
        return $result;
    }
	function get_asset_id(){
		$this->db2 = $this->load->database('otherdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('tools');
		$this->db2->where('id4 >', 1900000000);
		$this->db2->order_by('id4', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
}