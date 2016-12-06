<?php

class ModelPosting extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }
	 // cek keberadaan user di sistem
	 function insert_posting($data){
	 	$ins = $this->db->insert('posting', $data);
	 	return $ins;
	 }

	 function select_all(){
	 	$this->db->select('*');
		$this->db->from('posting');
		$this->db->join('member', 'id_member = member_id');
		return $this->db->get();
	 }

	 function select_8_post(){
	 	$this->db->select('*');
		$this->db->from('posting');
		$this->db->limit(8);
		return $this->db->get();
	 }

	 function select_member_mobil($id_member){
	 	$this->db->select('*');
		$this->db->from('posting');
		$this->db->where('member_id', $id_member);
		$this->db->where('jenis', "mobil");
		return $this->db->get();
	 }

	 function select_member_motor($id_member){
	 	$this->db->select('*');
		$this->db->from('posting');
		$this->db->where('member_id', $id_member);
		$this->db->where('jenis', "motor");
		return $this->db->get();
	 }

	 function select_member_kb($id_member){
	 	$this->db->select('*');
		$this->db->from('posting');
		$this->db->where('member_id', $id_member);
		$this->db->where('jenis', "kendaraanbesar");
		return $this->db->get();
	 }

	 function select_by_id($id_post){
	 	$this->db->select('*');
		$this->db->from('posting');
		$this->db->join('member', 'id_member = member_id');
		$this->db->where('id_posting', $id_post);
		return $this->db->get();
	 }

	 function update_posting($id_post, $data){
		$this->db->where('id_posting', $id_post);
		$this->db->update('posting', $data);
	}

	 function delete_posting($id_post){
	 	$this->db->where('id_posting', $id_post);
		$this->db->delete('posting');
	 }
}
?>
