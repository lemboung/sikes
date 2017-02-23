<?php

class Model_riwayat_penyakit extends CI_Model {

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

	 function select_riwayat_sakit_keluarga($id){
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->join('riwayat_penyakit', 'nik = dk_nik');
		$this->db->join('data_kepala_keluarga', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function select_riwayat_sakit($id){
		$this->db->select('*');
 		$this->db->from('riwayat_penyakit');
		$this->db->where('dk_nik', $id);
 		return $this->db->get();
	 }
}
?>
