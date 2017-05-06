<?php

class Model_klasifikasi extends CI_Model {

	 function __construct(){
	 parent::__construct();
	 }
	function update_risiko($idkk, $status){
		 $this->db->where('id_kepala_keluarga', $idkk);
		 $this->db->set('status_kes_primer', $status);
		 $result = $this->db->update('data_kepala_keluarga', $data);
		 return $result;
	 }

	 function count_member($idkk){
		 $this->db->select('nik');
		 $this->db->from('data_kependudukan');
		 $this->db->where('dkk_id_kepala_keluarga', $idkk);
		 return $this->db->count_all_results();
	 }

	 function count_riwayat_sakit_keluarga($id){
		$ayear = strtotime('now -1 year');
		$ayear = date("Y-m-d", $ayear);
		$this->db->select('*');
 		$this->db->from('data_kependudukan');
		$this->db->join('riwayat_penyakit', 'nik = dk_nik');
		$this->db->join('data_kepala_keluarga', 'id_kepala_keluarga = dkk_id_kepala_keluarga');
		$this->db->where('dkk_id_kepala_keluarga', $id);
		$this->db->where('tanggal >', $ayear);
 		return $this->db->count_all_results();
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
