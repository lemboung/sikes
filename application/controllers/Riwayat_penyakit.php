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
			$id = $this->session->userdata('id_user');
			$data['family'] = $this->Model->select_family_member($idkk)->result();
			$data['family_sick'] = $this->Model->select_riwayat_sakit_keluarga($idkk)->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$data['status'] = 'baru';
			$this->load->view('Admin/hospital_sheet',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit($idkk, $id){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['family'] = $this->Model->select_family_member($idkk)->result();
			$data['family_sick'] = $this->Model->select_riwayat_sakit_keluarga($idkk)->result();
			$data['sick'] = $this->Model->select_riwayat_sakit($idkk)->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
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

		$result = $this->Model->insert('riwayat_penyakit', $data);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Admin/riwayat_sakit_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Admin/riwayat_sakit_keluarga/'.$idkk);
		}
	}
}
