<?php

class DB_Functions {

    private $db;
	
    function __construct() {
        require_once 'DB_Connect.php';
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }
	
	public function getAllData($table_name)
	{
		$sql 	= 'select * from '.$table_name.'  order by timestamp desc limit 1000';
		$query	= mysqli_query($sql) or die(mysqli_error());
		return $query;
	}
	
	public function getMaxSecondMixing($timestamp)
	{
		$sql 	= 'select * from mixing where timestamp = "'.$timestamp.'"';
		$query	= mysqli_query($sql) or die(mysqli_error());
		return $query;
	}
	
	public function getkilled($timestamp)
	{
		$sql 	= 'select * from gantcrot where timestamp = "'.$timestamp.'"';
		$query	= mysqli_query($sql) or die(mysqli_error());
		return $query;
	}
	
	public function getTotalColumn($table)
	{
		$sql	= 'select count(*) as total from INFORMATION_SCHEMA.COLUMNS where table_name = "'.$table.'"';
		$query	= mysqli_query($sql) or die(mysqli_error());
		$row	= mysqli_fetch_array($query);
		$val	= $row['total'];
		return $val;
	}
	public function getfaked($table)
	{
		
		$sql	= 'select *, count(*) as total_row  FROM '.$table.' GROUP BY date(timestamp), hour(timestamp) order by timestamp desc limit 200';
		$query	= mysqli_query($sql) or die(mysqli_error());
		return $query;
	}
}

?>
