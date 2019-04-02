<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_packing_model extends CI_Model
{
	function pusher_in(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(100)
               ->get('pusher_in');
	return $result;
	}
	function pusher_out(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(100)
               ->get('pusher_out');
	return $result;
	}
	function loading(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(100)
               ->get('loading');
	return $result;
	}
	function unloading(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
			   ->limit(200)
               ->get('unloading');
	return $result;
	}
	
	function unloadingx(){
		$result = $this->mongo_db
               ->select(['timestamp','payload'])
			   ->sort('timestamp',FALSE)
               ->getWhere('unloading', ['unloading.timestamp' >= 1540266850000]);
	return $result;
	
	}
}

  
