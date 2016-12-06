<?php

class Model extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }
	 // cek keberadaan user di sistem
	 function insertkk($table, $data){
		 $this->db->insert($table, $data);
		 return $this->db->insert_id();
	 }
	 function insert($table, $data){
		 $result = $this->db->insert($table, $data);
		 return $result;
	 }

	 function select_all_patient(){
	 	$this->db->select('*');
		$this->db->from('pasien');
		return $this->db->get();
	 }

	 function tabel_kepala_keluarga(){
		// 	$this->db->select('k.id_kepala_keluarga, p.nama, k.alamat, p.tanggal_lahir, p.pekerjaan, k.status_kes_primer');
		$this->db->select('*');
		$this->db->from('data_kepala_keluarga');
		$this->db->join('data_kependudukan', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('data_kependudukan.kepala_keluarga = 1');
		return $this->db->get();
	 }
	 function kepala_keluarga($idkk){
		// 	$this->db->select('k.id_kepala_keluarga, p.nama, k.alamat, p.tanggal_lahir, p.pekerjaan, k.status_kes_primer');
		$this->db->select('*');
		$this->db->from('data_kependudukan');
		$this->db->where('dkk_id_kepala_keluarga', $idkk);
		$this->db->where('data_kependudukan.kepala_keluarga = 1');
		return $this->db->get();
	 }

	 function select_family_data($id)
	 {
		$this->db->select('*');
 		$this->db->from('data_kepala_keluarga');
		$this->db->where('id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function select_family_member($id)
	 {
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function select_person($nik)
	 {
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->where('nik', $nik);
 		return $this->db->get();
	 }

	 function select_all_risk(){
	 	$this->db->select('*');
		$this->db->from('daftar_risiko');
		return $this->db->get();
	 }

	 function select_all_rm_patient($id){
	 	$this->db->select('*');
		$this->db->from('rekam_medis');
		$this->db->where('pasien_nik', $id);
		return $this->db->get();
	 }

	 function select_patient_by_id($id){
	 	$this->db->select('*');
		$this->db->from('pasien');
		$this->db->where('nik', $id);
		return $this->db->get();
	 }

	 function update_blog($id_blog, $data){
		$this->db->where('id_blog', $id_blog);
		$this->db->update('blog', $data);
	}

	 function delete_blog($id_blog){
	 	$this->db->where('id_blog', $id_blog);
		$this->db->delete('blog');
	 }
}
?>
