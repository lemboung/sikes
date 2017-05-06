<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_penyakit extends CI_Controller {

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

	public function riwayat_sakit_keluarga($idkk){
		if ($this->session->userdata('logged_in')) {
			$data['family'] = $this->Model_data_keluarga->select_family_member($idkk)->result();
			$data['family_sick'] = $this->Model_riwayat_penyakit->select_riwayat_sakit_keluarga($idkk)->result();
			$data['status'] = 'baru';
			$this->load->view('Admin/hospital_sheet',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit($idkk, $id){
		if ($this->session->userdata('logged_in')) {
			$data['family'] = $this->Model_data_keluarga->select_family_member($idkk)->result();
			$data['family_sick'] = $this->Model_riwayat_penyakit->select_riwayat_sakit_keluarga($idkk)->result();
			$data['sick'] = $this->Model_riwayat_penyakit->select_riwayat_sakit($id)->result();
			$data['status'] = 'edit';
			$this->load->view('Admin/hospital_sheet',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function insert_data_penyakit(){
		$idkk = $this->input->post('idkk');
		$data['dk_nik'] = $this->input->post('dk_nik');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['jenis_sakit'] = $this->input->post('jenis_sakit');

		$error = $this->Model_riwayat_penyakit->insert('riwayat_penyakit', $data);
		if($error == null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Riwayat_penyakit/riwayat_sakit_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Riwayat_penyakit/riwayat_sakit_keluarga/'.$idkk);
		}
	}

	public function update_data_penyakit(){
		$where = "id_riwayat_penyakit";
		$id_rp = $this->input->post('id_rp');
		$idkk = $this->input->post('idkk');
		$data['dk_nik'] = $this->input->post('dk_nik');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['jenis_sakit'] = $this->input->post('jenis_sakit');

		$result = $this->Model_riwayat_penyakit->update('riwayat_penyakit', $data, $id_rp, $where);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Riwayat_penyakit/riwayat_sakit_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Riwayat_penyakit/riwayat_sakit_keluarga/'.$idkk);
		}
	}

	public function hapus($idkk, $id_rp){
		$where = "id_riwayat_penyakit";
		$result = $this->Model_riwayat_penyakit->delete('riwayat_penyakit', $where, $id_rp);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Riwayat_penyakit/riwayat_sakit_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Riwayat_penyakit/riwayat_sakit_keluarga/'.$idkk);
		}
	}
}
