<?php

class Model_data_sosial extends CI_Model {

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

	 function select_health_data($id){
		$this->db->select('*');
 		$this->db->from('data_sosial_kesehatan');
		$this->db->where('dkk_id', $id);
 		return $this->db->get();
	 }

	 function select_a_health_data($id){
		$this->db->select('*');
 		$this->db->from('data_sosial_kesehatan');
		$this->db->where('id_dsk', $id);
 		return $this->db->get();
	 }

	 function select_behav_data($id){
		$this->db->select('*');
 		$this->db->from('perilaku_kesehatan');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function select_economic_data($id){
		$this->db->select('*');
 		$this->db->from('data_ekonomi_keluarga');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->get();
	 }
}
?>
