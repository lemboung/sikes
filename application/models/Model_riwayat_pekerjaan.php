<?php

class Model_riwayat_pekerjaan extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }

	 function insert($table, $data){
		 if (!$this->db->insert($table, $data)) {
		 	$error = $this->db->error();
		 }
		 return $error;
	 }

	 function delete($table, $where, $data){
		 $this->db->where($where, $data);
		 $result = $this->db->delete($table);
		 return $result;
	 }

	 function update($table, $data, $value, $where){
		 $this->db->set($data);
		 $this->db->where($where, $value);
		 $result = $this->db->update($table);
		 return $result;
	 }

	 function select_riwayat_pekerjaan($id){
		$this->db->select('*');
 		$this->db->from('riwayat_pekerjaan');
		$this->db->where('dk_nik', $id);
 		return $this->db->get();
	 }

	 function edit_riwayat_pekerjaan($id){
		$this->db->select('*');
 		$this->db->from('riwayat_pekerjaan');
		$this->db->where('id_riwayat_pekerjaan', $id);
 		return $this->db->get();
	 }
}
?>
