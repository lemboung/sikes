<?php

class Model_data_keluarga extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }
	 function insertkk($table, $data){
		 $this->db->insert($table, $data);
		 return $this->db->insert_id();
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

	 function update_anggota($table, $data, $nik){
		 $this->db->set($data);
		 $this->db->where('nik', $nik);
		 $result = $this->db->update($table);
		 return $result;
	 }

	 function update_kk($table, $data, $idkk){
		 $this->db->set($data);
		 $this->db->where('id_kepala_keluarga', $idkk);
		 $result = $this->db->update($table);
		 return $result;
	 }

	 function get_kk_nik($idkk){
		 $this->db->select('nik');
		 $this->db->from('data_kependudukan');
		 $this->db->where('dkk_id_kepala_keluarga', $idkk);
		 $this->db->where('kepala_keluarga', 1);
		 $q = $this->db->get();
		 $data = $q->result_array();
		 return $data[0]['nik'];
	 }

	 function get_provinsi(){
		$this->db->select('*');
		$this->db->from('provinces');
		$this->db->order_by('name', 'ASC');
	   return $this->db->get();
	}

	 function get_kota($id){
		 $this->db->select('*');
		 $this->db->from('regencies');
		 $this->db->where('province_id', $id);
		 $this->db->order_by('name', 'ASC');
		return $this->db->get();
	 }

	 function get_kecamatan($id){
		$this->db->select('*');
		$this->db->from('districts');
		$this->db->where('regency_id', $id);
		$this->db->order_by('name', 'ASC');
	   return $this->db->get();
	}

	function get_kelurahan($id){
		$this->db->select('*');
		$this->db->from('villages');
		$this->db->where('district_id', $id);
		$this->db->order_by('name', 'ASC');
	   return $this->db->get();
	}

	 function count_member($idkk){
		 $this->db->select('nik');
		 $this->db->from('data_kependudukan');
		 $this->db->where('dkk_id_kepala_keluarga', $idkk);
		 return $this->db->count_all_results();
	 }

	 function tabel_kepala_keluarga(){
		$fktp = $this->session->userdata('fktp');
		$this->db->select('*');
		$this->db->from('data_kependudukan');
		$this->db->join('data_kepala_keluarga', 'dkk_id_kepala_keluarga = id_kepala_keluarga', 'left');
		$this->db->where('fktp_terdaftar', $fktp);
		$this->db->where('hubungan_keluarga', 'Kepala keluarga');
		return $this->db->get();
	 }

	 function kepala_keluarga($idkk){
		$this->db->select('*');
		$this->db->from('data_kependudukan');
		$this->db->where('dkk_id_kepala_keluarga', $idkk);
		$this->db->where('data_kependudukan.kepala_keluarga = 1');
		return $this->db->get();
	 }

	 function select_family_member($id){
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function select_family_data($id){
		$this->db->select('*');
 		$this->db->from('data_kepala_keluarga');
		$this->db->where('id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function select_person($nik){
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->where('nik', $nik);
 		return $this->db->get();
	 }

	 function getIdKK($nik){
		$this->db->select('dkk_id_kepala_keluarga');
 		$this->db->from('data_kependudukan');
		$this->db->where('nik', $nik);
		$q = $this->db->get();
		$data = $q->result_array();
		return $data[0]['dkk_id_kepala_keluarga'];
	 }

	 function getNamaKK($idkk){
		$this->db->select('nama');
 		$this->db->from('data_kependudukan');
		$this->db->where('dkk_id_kepala_keluarga', $idkk);
		$this->db->where('kepala_keluarga', 1);
		$q = $this->db->get();
		$data = $q->result_array();
		return $data[0]['nama'];
	 }
}
?>
