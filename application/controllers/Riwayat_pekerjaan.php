<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_pekerjaan extends CI_Controller {

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

	public function tabel($idkk, $nik){
		if ($this->session->userdata('logged_in')) {
			$data['work_history'] = $this->Model->select_riwayat_pekerjaan($nik)->result();
			$data['status'] = 'baru';
			$this->load->view('Admin/work_history',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit($idkk, $nik, $id){
		if ($this->session->userdata('logged_in')) {
			$data['work_history'] = $this->Model->select_riwayat_pekerjaan($nik)->result();
			$data['edit_history'] = $this->Model->edit_riwayat_pekerjaan($id)->result();
			$data['status'] = 'edit';
			$this->load->view('Admin/work_history',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function insert(){
		$nik = $this->input->post('dk_nik');
		$data['dk_nik'] = $nik;
		$data['divisi'] = $this->input->post('divisi');
		$data['sub_divisi'] = $this->input->post('sub_divisi');
		$data['lama_kerja'] = $this->input->post('lama_kerja');
		$data['jenis_aktivitas'] = $this->input->post('jenis_aktivitas');
		$data['bobot_aktivitas'] = $this->input->post('bobot_aktivitas');
		$idkk = $this->input->post('idkk');

		$error = $this->Model->insert('riwayat_pekerjaan', $data);
		if($error == null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Riwayat_pekerjaan/tabel/'.$idkk.'/'.$nik);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Riwayat_pekerjaan/tabel/'.$idkk.'/'.$nik);
		}
	}

	public function update(){
		$id = $this->input->post('id_riwayat_pekerjaan');
		$nik = $this->input->post('dk_nik');
		$data['id_riwayat_pekerjaan'] = $id;
		$data['dk_nik'] = $nik;
		$data['divisi'] = $this->input->post('divisi');
		$data['sub_divisi'] = $this->input->post('sub_divisi');
		$data['lama_kerja'] = $this->input->post('lama_kerja');
		$data['jenis_aktivitas'] = $this->input->post('jenis_aktivitas');
		$data['bobot_aktivitas'] = $this->input->post('bobot_aktivitas');
		$idkk = $this->input->post('idkk');

		$result = $this->Model->update('riwayat_pekerjaan', $data, $id, 'id_riwayat_pekerjaan');
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Riwayat_pekerjaan/tabel/'.$idkk.'/'.$nik);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Riwayat_pekerjaan/tabel/'.$idkk.'/'.$nik);
		}
	}

	public function hapus($idkk, $nik, $id_rp){
		$where = "id_riwayat_pekerjaan";
		$result = $this->Model->delete('riwayat_pekerjaan', $where, $id_rp);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Riwayat_pekerjaan/tabel/'.$idkk."/".$nik);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Riwayat_pekerjaan/tabel/'.$idkk."/".$nik);
		}
	}
}
