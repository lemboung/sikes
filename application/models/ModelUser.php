<?php

class ModelUser extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }
	 // cek keberadaan user di sistem
	 function check_user_account($username, $password){
		 $this->db->select('*');
		 $this->db->from('pengguna');
		 $this->db->where('username', $username);
		 $this->db->where('password', $password);

		 return $this->db->get();
	 }
	// mengambil data user tertentu
	 function get_user($id){
		 $this->db->select('*');
		 $this->db->from('pengguna');
		 $this->db->where('id_user', $id);

		 return $this->db->get();
	 }
}
?>
