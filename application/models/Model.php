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

	 	function update_risiko($idkk, $status){
		 $this->db->where('id_kepala_keluarga', $idkk);
		 $this->db->set('status_kes_primer', $status);
		 $result = $this->db->update('data_kepala_keluarga', $data);
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

	 function count_member($idkk){
		 $this->db->select('nik');
		 $this->db->from('data_kependudukan');
		 $this->db->where('dkk_id_kepala_keluarga', $idkk);
		 return $this->db->count_all_results();
	 }

	 function select_all_patient(){
		$fktp = $this->session->userdata('fktp');
	 	$this->db->select('*');
		$this->db->from('data_kependudukan');
		$this->db->join('data_kepala_keluarga', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('fktp_terdaftar', $fktp);
		return $this->db->get();
	 }

	 function tabel_kepala_keluarga(){
		// 	$this->db->select('k.id_kepala_keluarga, p.nama, k.alamat, p.tanggal_lahir, p.pekerjaan, k.status_kes_primer');
		$fktp = $this->session->userdata('fktp');
		$this->db->select('*');
		$this->db->from('data_kepala_keluarga');
		$this->db->join('data_kependudukan', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('data_kependudukan.kepala_keluarga = 1');
		$this->db->where('fktp_terdaftar', $fktp);
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

	 function select_family_data($id){
		$this->db->select('*');
 		$this->db->from('data_kepala_keluarga');
		$this->db->where('id_kepala_keluarga', $id);
 		return $this->db->get();
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

	 function select_family_member($id){
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function select_riwayat_sakit_keluarga($id){
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->join('riwayat_penyakit', 'nik = dk_nik');
		$this->db->join('data_kepala_keluarga', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->get();
	 }

	 function count_riwayat_sakit_keluarga($id){
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->join('riwayat_penyakit', 'nik = dk_nik');
		$this->db->join('data_kepala_keluarga', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('dkk_id_kepala_keluarga', $id);
 		return $this->db->count_all_results();
	 }

	 function select_riwayat_sakit($id){
		$this->db->select('*');
 		$this->db->from('riwayat_penyakit');
		$this->db->where('dk_nik', $id);
 		return $this->db->get();
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

	 function count_pk($idkk){
		 $pk = 0;
		 $this->db->select('*');
		 $this->db->from('data_sosial_kesehatan');
		 $this->db->where('dkk_id', $idkk);
		 $this->db->like('penyakit_khusus', 'diabetes', 'both');
		 $pk += $this->db->count_all_results();

		 $this->db->select('*');
		 $this->db->from('data_sosial_kesehatan');
		 $this->db->where('dkk_id', $idkk);
		 $this->db->like('penyakit_khusus', 'stroke', 'both');
		 $pk += $this->db->count_all_results();

		 $this->db->select('*');
		 $this->db->from('data_sosial_kesehatan');
		 $this->db->where('dkk_id', $idkk);
		 $this->db->like('penyakit_khusus', 'jantung', 'both');
		 $pk += $this->db->count_all_results();

		 $this->db->select('*');
		 $this->db->from('data_sosial_kesehatan');
		 $this->db->where('dkk_id', $idkk);
		 $this->db->like('penyakit_khusus', 'hipertensi', 'both');
		 $pk += $this->db->count_all_results();

		 $this->db->select('*');
		 $this->db->from('data_sosial_kesehatan');
		 $this->db->where('dkk_id', $idkk);
		 $this->db->like('penyakit_khusus', 'rematik', 'both');
		 $pk += $this->db->count_all_results();

		 return $pk;
	 }

	 function count_rk($idkk, $nik){
	 	$rk = 0;
		$this->db->select('*');
		$this->db->from('data_sosial_kesehatan');
		$this->db->where('dkk_id', $idkk);
		$this->db->like('jenis_rokok', 'r', 'both');
		$rk += $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from('data_sosial_kesehatan');
		$this->db->where('dkk_id', $idkk);
		$this->db->where('jamu >', 0);
		$rk += $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from('data_sosial_kesehatan');
		$this->db->where('dkk_id', $idkk);
		$this->db->where('tidur_kasur_busa', 1);
		$rk += $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from('data_sosial_kesehatan');
		$this->db->where('dkk_id', $idkk);
		$this->db->where('sepeda_motor', 1);
		$rk += $this->db->count_all_results();

		$this->db->select('*');
		$this->db->from('riwayat_pekerjaan');
		$this->db->where('dk_nik', $nik);
		$this->db->like('bobot_aktivitas', 'berat', 'both');
		$kp = $this->db->count_all_results();
		if ($kp>0) {
			$rk += 1;
		}
		return $rk;
	 	}
}
?>
