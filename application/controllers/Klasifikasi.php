<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/

	function __construct(){
		parent::__construct();
	}

	public function index(){

	}

	public function tes($idkk, $nik){
		$rk = $this->Model_klasifikasi->count_rk($idkk, $nik);
		echo $rk;
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
				$status = "Ringan";
			} elseif ($k>10 && $k<=50) {
				$status = "Sedang";
			} elseif ($k>50) {
				$status = "berat";
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
