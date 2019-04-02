<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Iot_wkb_model extends CI_Model{
	function cuttingline_crosscutting_cutterdrive_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_cutterdrive_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_crosscutting_cutterdrive_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_cutterdrive_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_crosscutting_cutterdrive_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_cutterdrive_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_crosscutting_cutterdrive_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_cutterdrive_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_crosscutting_liftingunit_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_liftingunit_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_crosscutting_liftingunit_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_liftingunit_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_crosscutting_liftingunit_position(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_liftingunit_position');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_crosscutting_liftingunit_position100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_liftingunit_position');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_crosscutting_liftingunit_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_liftingunit_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_crosscutting_liftingunit_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_liftingunit_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_crosscutting_vacuum_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_vacuum_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}function cuttingline_crosscutting_vacuum_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_vacuum_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_crosscutting_vacuum_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_vacuum_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_crosscutting_vacuum_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_crosscutting_vacuum_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_cuttingboardrefeeding_lifting_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_lifting_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_cuttingboardrefeeding_lifting_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_lifting_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_cuttingboardrefeeding_lifting_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_lifting_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_cuttingboardrefeeding_lifting_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_lifting_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_cuttingboardrefeeding_travelling_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_travelling_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_cuttingboardrefeeding_travelling_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_travelling_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_cuttingboardrefeeding_travelling_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_travelling_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_cuttingboardrefeeding_travelling_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_cuttingboardrefeeding_travelling_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_tilting1_castingcarearrest_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_castingcarearrest_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_crossmovement_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_crossmovement_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_crossmovement_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_crossmovement_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_cuttingboardarrest_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_cuttingboardarrest_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_cuttingboardarrest_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_cuttingboardarrest_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_cuttingboardmovement_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_cuttingboardmovement_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_cuttingboardmovement_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_cuttingboardmovement_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_rubbingwheel_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_rubbingwheel_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_rubbingwheel_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_rubbingwheel_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cl_t1_rw_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cl_t1_rw_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cl_t1_rw_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cl_t1_rw_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_tilting1_tiltingdevice_angle(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_tiltingdevice_angle');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_tiltingdevice_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_tiltingdevice_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting1_tiltingdevice_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting1_tiltingdevice_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_castingcarearrest_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_castingcarearrest_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_crossmovement_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_crossmovement_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_crossmovement_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_crossmovement_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_cuttingboardarrest_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_cuttingboardarrest_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_cuttingboardarrest_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_cuttingboardarrest_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_cuttingboardmovement_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_cuttingboardmovement_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_cuttingboardmovement_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_cuttingboardmovement_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_rubbingwheel_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_rubbingwheel_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_rubbingwheel_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_rubbingwheel_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_tilting2_rubbingwheel_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_rubbingwheel_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_rubbingwheel_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_rubbingwheel_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_tilting2_tiltingdevice_angle(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_tiltingdevice_angle');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_tiltingdevice_pressure(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_tiltingdevice_pressure');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_tiltingdevice_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_tiltingdevice_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_transportloader_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_transportloader_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_transportloader_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_transportloader_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_tilting2_transportloader_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_transportloader_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_tilting2_transportloader_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_tilting2_transportloader_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_trolley_trolley1_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley1_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_trolley_trolley1_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley1_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_trolley_trolley1_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley1_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_trolley_trolley1_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley1_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_trolley_trolley2_current(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley2_current');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_trolley_trolley2_current100($timestamp){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley2_current');
		$this->db2->where('timestamp <=', $timestamp);
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(150);
		$query = $this->db2->get();
		return $query->result();
	}
	function cuttingline_trolley_trolley2_speed(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley2_speed');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function cuttingline_trolley_trolley2_speed100($timestamp, $timestamp2){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('cuttingline_trolley_trolley2_speed');
		$this->db2->where('(timestamp >= "'.$timestamp.'" and timestamp <= "'.$timestamp2.'")');
		$this->db2->order_by('timestamp', 'DESC');
		$query = $this->db2->get();
		return $query->result();
	}
	function hydraulic_tilting1_actualtemperature_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting1_actualtemperature_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function hydraulic_tilting1_oilcoolingoff_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting1_oilcoolingoff_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function hydraulic_tilting1_oilcoolingon_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting1_oilcoolingon_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function hydraulic_tilting1_oiltemperaturetoohot_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting1_oiltemperaturetoohot_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function hydraulic_tilting2_actualtemperature_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting2_actualtemperature_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function hydraulic_tilting2_oilcoolingoff_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting2_oilcoolingoff_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function hydraulic_tilting2_oilcoolingon_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting2_oilcoolingon_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function hydraulic_tilting2_oiltemperaturetoohot_temperature(){
		$this->db2 = $this->load->database('wkbdb', TRUE);
		$this->db2->select('*');
		$this->db2->from('hydraulic_tilting2_oiltemperaturetoohot_temperature');
		$this->db2->order_by('timestamp', 'DESC');
		$this->db2->limit(1);
		$query = $this->db2->get();
		return $query->row();
	}
	function getscale($title){
		$this->db->select('*');
		$this->db->from('iot_setting');
		$this->db->where('tag', $title);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
}

  
