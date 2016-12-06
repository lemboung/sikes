<?php

class ModelUser extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }
	 // cek keberadaan user di sistem
	 function check_user_account($username, $password){
		 $this->db->select('*');
		 $this->db->from('user');
		 $this->db->where('username', $username);
		 $this->db->where('password', $password);

		 return $this->db->get();
	 }
	// mengambil data user tertentu
	 function get_user($id){
		 $this->db->select('*');
		 $this->db->from('user');
		 $this->db->where('id_user', $id);

		 return $this->db->get();
	 }

	 function select_all(){
		 $this->db->select('*');
		 $this->db->from('member');

		 return $this->db->get();
	 }
	 //menambahkan data user ke table
	 function insert_user($data){
		 $this->db->insert('member', $data);

 	 }

	 function update_user($id, $data){
		$this->db->where('id_member', $id);
		$this->db->update('member', $data);
	}

	function delete_user($id){
		$this->db->where('id_member', $id);
		$this->db->delete('member');
	}
}
?>
