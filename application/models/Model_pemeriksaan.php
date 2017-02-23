<?php

class Model_pemeriksaan extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }
	 // cek keberadaan user di sistem

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

	 function select_all_patient(){
		$fktp = $this->session->userdata('fktp');
	 	$this->db->select('*');
		$this->db->from('data_kependudukan');
		$this->db->join('data_kepala_keluarga', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('fktp_terdaftar', $fktp);
		return $this->db->get();
	 }

	 function select_status_data($id){
		$this->db->select('*');
 		$this->db->from('status_pasien');
		$this->db->where('dk_nik', $id);
 		return $this->db->get();
	 }

	 function edit_status_data($id){
		$this->db->select('*');
 		$this->db->from('status_pasien');
		$this->db->where('id_status_pasien', $id);
 		return $this->db->get();
	 }
}
?>
