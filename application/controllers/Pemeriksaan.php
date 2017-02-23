<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller {

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
		if ($this->session->userdata('logged_in')) {
			$data['pasien'] = $this->Model_pemeriksaan->select_all_patient()->result();
			$this->load->view('Admin/tabel_pasien',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function input_status($nik){
		if ($this->session->userdata('logged_in')) {
			$idkk = $this->Model_data_keluarga->getIdKK($nik);
			$data['family_data'] = $this->Model_data_keluarga->select_family_data($idkk)->result();
			$data['pasien_data'] = $this->Model_data_keluarga->select_person($nik)->result();
			$data['health_data'] = $this->Model_data_sosial->select_health_data($idkk)->result();
			$data['status_pasien'] = $this->Model_pemeriksaan->select_status_data($nik)->result();
			$data['namakk'] = $this->Model_data_keluarga->getNamaKK($idkk);
			$data['paraf'] = $this->session->userdata('username');
			$data['status'] = "baru";
			$this->load->view('Admin/status_pasien',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit_status($nik, $id){
		if ($this->session->userdata('logged_in')) {
			$idkk = $this->Model_data_keluarga->getIdKK($nik);
			$data['family_data'] = $this->Model_data_keluarga->select_family_data($idkk)->result();
			$data['pasien_data'] = $this->Model_data_keluarga->select_person($nik)->result();
			$data['health_data'] = $this->Model_data_keluarga->select_health_data($idkk)->result();
			$data['status_pasien'] = $this->Model_pemeriksaan->select_status_data($nik)->result();
			$data['edit_status'] = $this->Model_pemeriksaan->edit_status_data($id)->result();
			$data['namakk'] = $this->Model_data_keluarga->getNamaKK($idkk);
			$data['paraf'] = $this->session->userdata('username');
			$data['status'] = "baru";
			$this->load->view('Admin/status_pasien',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function insert_data_pemeriksaan(){
		$nik = $this->input->post('nik');
		$data['dk_nik'] = $nik;
		$data['tanggal'] = date("Y-m-d");
		$data['anamnesa'] = $this->input->post('anamnesa');
		$data['td'] = $this->input->post('td');
		$data['rr'] = $this->input->post('rr');
		$data['nadi'] = $this->input->post('nadi');
		$data['suhu'] = $this->input->post('suhu');
		$data['hasil_pemeriksaan_penunjang'] = $this->input->post('hasil_pemeriksaan_penunjang');
		$data['diagnosa'] = $this->input->post('diagnosa');
		$data['terapi'] = $this->input->post('terapi');
		$data['paraf'] = $this->input->post('paraf');
		$error = $this->Model_pemeriksaan->insert('status_pasien', $data);
		if($error == null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Pemeriksaan/input_status/'.$nik);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Pemeriksaan/input_status/'.$nik);
		}
	}

	public function update_data_pemeriksaan(){
		$nik = $this->input->post('nik');
		$id = $this->input->post('id_status_pasien');
		$data['dk_nik'] = $nik;
		$data['tanggal'] = date("Y-m-d");
		$data['anamnesa'] = $this->input->post('anamnesa');
		$data['td'] = $this->input->post('td');
		$data['rr'] = $this->input->post('rr');
		$data['nadi'] = $this->input->post('nadi');
		$data['suhu'] = $this->input->post('suhu');
		$data['hasil_pemeriksaan_penunjang'] = $this->input->post('hasil_pemeriksaan_penunjang');
		$data['diagnosa'] = $this->input->post('diagnosa');
		$data['terapi'] = $this->input->post('terapi');
		$data['paraf'] = $this->input->post('paraf');
		$result = $this->Model_pemeriksaan->update('status_pasien', $data, $id, "id_status_pasien");
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Pemeriksaan/input_status/'.$nik);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Pemeriksaan/input_status/'.$nik);
		}
	}

}
