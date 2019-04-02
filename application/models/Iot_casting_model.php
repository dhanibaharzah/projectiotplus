<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_casting_model extends CI_Model
{
    function moldnum_rb1(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_rb1');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	
	function moldnum_rb2(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_rb2');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_rb3(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_rb3');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r11(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r11');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r12(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r12');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r13(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r13');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r21(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r21');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r22(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r22');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r23(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r23');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r31(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r31');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r32(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r32');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r33(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r33');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r41(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r41');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r42(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r42');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r43(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r43');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r51(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r51');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r52(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r52');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r53(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r53');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r61(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r61');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r62(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r62');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r63(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r63');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r71(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r71');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r72(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r72');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r73(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r73');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r81(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r81');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r82(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r82');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r83(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r83');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r91(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r91');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r92(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r92');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r93(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r93');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r101(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r101');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r102(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r102');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r103(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r103');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r111(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r111');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r112(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r112');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r113(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r113');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r121(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r121');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r122(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r122');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r123(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r123');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r131(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r131');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r132(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r132');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r133(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r133');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r141(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r141');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r142(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r142');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_r143(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_r143');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_tc1(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_tc1');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function moldnum_tc2(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('moldnum_tc2');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_rb(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_rb');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r1(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r1');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r2(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r2');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r3(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r3');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r4(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r4');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r5(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r5');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r6(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r6');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r7(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r7');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r8(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r8');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r9(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r9');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r10(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r10');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r11(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r11');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r12(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r12');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r13(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r13');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function pos_r14(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('pos_r14');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_rb(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_rb');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r1(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r1');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r2(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r2');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r3(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r3');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r4(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r4');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r5(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r5');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r6(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r6');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r7(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r7');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r8(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r8');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r9(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r9');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r10(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r10');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r11(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r11');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r12(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r12');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r13(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r13');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function tfc_r14(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('tfc_r14');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function xxxxxxx(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('xxxxxxx');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_rb1(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_rb1');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_rb2(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_rb2');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_rb3(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_rb3');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r11(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r11');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r12(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r12');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r13(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r13');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r21(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r21');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r22(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r22');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r23(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r23');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r31(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r31');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r32(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r32');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r33(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r33');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r41(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r41');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r42(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r42');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r43(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r43');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r51(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r51');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r52(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r52');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r53(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r53');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r61(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r61');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r62(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r62');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r63(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r63');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r71(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r71');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r72(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r72');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r73(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r73');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r81(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r81');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r82(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r82');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r83(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r83');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r91(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r91');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r92(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r92');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r93(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r93');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r101(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r101');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r102(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r102');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r103(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r103');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r111(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r111');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r112(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r112');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r113(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r113');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r121(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r121');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r122(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r122');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r123(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r123');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r131(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r131');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r132(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r132');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r133(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r133');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r141(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r141');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r142(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r142');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function prodnum_r143(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('prodnum_r143');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_rb1(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_rb1');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_rb2(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_rb2');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_rb3(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_rb3');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r11(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r11');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r12(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r12');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r13(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r13');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r21(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r21');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r22(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r22');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r23(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r23');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r31(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r31');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r32(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r32');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r33(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r33');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r41(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r41');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r42(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r42');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r43(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r43');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r51(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r51');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r52(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r52');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r53(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r53');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r61(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r61');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r62(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r62');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r63(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r63');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r71(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r71');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r72(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r72');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r73(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r73');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r81(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r81');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r82(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r82');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r83(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r83');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r91(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r91');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r92(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r92');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r93(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r93');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r101(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r101');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r102(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r102');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r103(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r103');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r111(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r111');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r112(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r112');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r113(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r113');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r121(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r121');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r122(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r122');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r123(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r123');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r131(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r131');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r132(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r132');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r133(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r133');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r141(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r141');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r142(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r142');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function curtime_r143(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('curtime_r143');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	function CT_WKB(){
		$result = $this->mongo_db
               ->select(['payload'])
			   ->sort('timestamp',FALSE)
               ->getOne('CT_WKB');
		$query = $this->mongo_db->row_array($result);

	return $query['payload'];
	}
	
}

  
