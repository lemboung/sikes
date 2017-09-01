<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index(){

	}

	public function tes($idkk){
		$kk_nik = $this->Model_data_keluarga->get_kk_nik($idkk);
		$E_sick = $this->Model_klasifikasi->count_riwayat_sakit_keluarga($idkk);
		$E_kel = $this->Model_klasifikasi->count_member($idkk);
		$proporsi_sakit = ($E_sick / ($E_kel * 3)) * 40;
		$pk = ($this->Model_klasifikasi->count_pk($idkk) * 6);
		$rk = ($this->Model_klasifikasi->count_rk($idkk, $kk_nik) * 6);
		$k = $proporsi_sakit + $pk + $rk;
		$status = "";
		if ($k>=0 && $k<=10) {
			$status = "Rendah";
		} elseif ($k>10 && $k<=50) {
			$status = "Sedang";
		} elseif ($k>50) {
			$status = "Tinggi";
		}
		echo $E_sick." | ".$E_kel." || ".$proporsi_sakit." + ".$pk." + ".$rk." = ".$k." | Status = ".$status. $k;
	}

	public function coba($id){
		$hasil = $this->Model_klasifikasi->count_riwayat_sakit_keluarga($id);
		echo $hasil;
	}

	public function pengukur_stress($idkk){

		$data['status'] = 'baru';
		$data['idkk'] = $idkk;
		$this->load->view('admin/stress_meter', $data);
	}

	public function hitung($idkk){
			// $idkk = $this->input->post('idkk');
			$kk_nik = $this->Model_data_keluarga->get_kk_nik($idkk);
			$E_sick = $this->Model_klasifikasi->count_riwayat_sakit_keluarga($idkk);
			$E_kel = $this->Model_klasifikasi->count_member($idkk);
			$proporsi_sakit = ($E_sick / ($E_kel * 3)) * 40;
			$pk = ($this->Model_klasifikasi->count_pk($idkk) * 6);
			$rk = ($this->Model_klasifikasi->count_rk($idkk, $kk_nik) * 6);
			$k = $proporsi_sakit + $pk + $rk;
			$status = "";
			if ($k>=0 && $k<=10) {
				$status = "Rendah";
			} elseif ($k>10 && $k<=50) {
				$status = "Sedang";
			} elseif ($k>50) {
				$status = "Tinggi";
			}
			echo $E_sick." ".$E_kel." ".$proporsi_sakit." ".$pk." ".$rk." ".$k." ".$status;

			$result = $this->Model_klasifikasi->update_risiko($idkk, $status);
			if($result != null){
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Perhitungan klasifikasi BERHASIL dilakukan</strong></div>");
				header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
			}else{
				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Perhitungan klasifikasi GAGAL di lakukan</strong></div>");
				header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
			}
	}
}
