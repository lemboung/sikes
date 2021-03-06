<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_keluarga extends CI_Controller {

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
			redirect(site_url('Data_keluarga/daftar_keluarga'));
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function daftar_keluarga(){
		if ($this->session->userdata('logged_in')) {
			$data['pasien'] = $this->Model_data_keluarga->tabel_kepala_keluarga()->result();
			$this->load->view('admin/tabel_keluarga',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function daftar_pasien(){
		if ($this->session->userdata('logged_in')) {
			$data['pasien'] = $this->Model_data_keluarga->select_all_patient()->result();
			$this->load->view('admin/tabel_pasien',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function anggota_keluarga($idkk){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['family_data'] = $this->Model_data_keluarga->select_family_data($idkk)->result();
			$data['health_data'] = $this->Model_data_sosial->select_health_data($idkk)->result();
			$data['behav_data'] = $this->Model_data_sosial->select_behav_data($idkk)->result();
			$data['economic_data'] = $this->Model_data_sosial->select_economic_data($idkk)->result();
			$data['family'] = $this->Model_data_keluarga->select_family_member($idkk)->result();
			$data['status'] = 'baru';
			$this->load->view('admin/family_member',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function select_lokasi($modul, $id){
		$id = $this->input->post('id');
		$modul = $this->input->post('modul');
		if ($modul == "kota") {
			$listKota = $this->Model_data_keluarga->get_kota($id)->result();
			echo"<option selected value=''>Pilih Kota/Kab</option>";
			foreach ($listKota as $r) {
				echo "<option value='$r->id'>$r->name</option>";
			}
		}
		elseif ($modul == "kec") {
			$listKec = $this->Model_data_keluarga->get_kecamatan($id)->result();
			echo"<option selected value=''>Pilih Kecamatan</option>";
			foreach ($listKec as $d) {
				echo "<option value='$d->id'>$d->name</option>";
			}
		}
		elseif ($modul == "kelurahan") {
			$listKel = $this->Model_data_keluarga->get_kelurahan($id)->result();
			echo"<option selected value=''>Pilih Desa/Kelurahan</option>";
			foreach ($listKel as $v) {
				echo "<option value='$v->id'>$v->name</option>";
			}
		}
	}

	public function edit_anggota_keluarga($idkk, $nik){
		if ($this->session->userdata('logged_in')) {
			$data['family_data'] = $this->Model_data_keluarga->select_family_data($idkk)->result();
			$data['health_data'] = $this->Model_data_sosial->select_health_data($idkk)->result();
			$data['behav_data'] = $this->Model_data_sosial->select_behav_data($idkk)->result();
			$data['economic_data'] = $this->Model_data_sosial->select_economic_data($idkk)->result();
			$data['family'] = $this->Model_data_keluarga->select_family_member($idkk)->result();
			$data['person'] = $this->Model_data_keluarga->select_person($nik)->result();
			$data['status'] = 'edit';
			$this->load->view('admin/family_member',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_keluarga(){
		if ($this->session->userdata('logged_in')) {
			$data['status'] = 'baru';
			$data['prov'] = $this->Model_data_keluarga->get_provinsi()->result();
			$this->load->view('Admin/form_add_family', $data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_kepala_keluarga(){
		if ($this->session->userdata('logged_in')) {
			$data['status'] = 'baru';
			$this->load->view('Admin/form_add_headfamily', $data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit_data($idkk){
		if ($this->session->userdata('logged_in')) {
			$data['family_data'] = $this->Model_data_keluarga->select_family_data($idkk)->result();
			$data['status'] = 'edit';
			$data['prov'] = $this->Model_data_keluarga->get_provinsi()->result();
			$this->load->view('Admin/form_add_family',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function insert_keluarga(){
		$data['alamat'] = $this->input->post('alamat');
		$data['RT'] = $this->input->post('rt');
		$data['RW'] = $this->input->post('rw');
		$data['kelurahan'] = $this->input->post('kelurahan');
		$data['kecamatan'] = $this->input->post('kecamatan');
		$data['kota'] = $this->input->post('kota');
		$data['pembayaran'] = $this->input->post('pembayaran');
		$data['fktp_terdaftar'] = $this->session->userdata('fktp');
		$result = $this->Model_data_keluarga->insertkk('data_kepala_keluarga', $data);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/tambah_kepala_keluarga/'.$result);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/daftar_keluarga');
		}
	}

	public function update_keluarga(){
		$idkk = $this->input->post('idkk');
		$data['alamat'] = $this->input->post('alamat');
		$data['RT'] = $this->input->post('rt');
		$data['RW'] = $this->input->post('rw');
		$data['kelurahan'] = $this->input->post('kelurahan');
		$data['kecamatan'] = $this->input->post('kecamatan');
		$data['kota'] = $this->input->post('kota');
		$data['pembayaran'] = $this->input->post('pembayaran');
		$result = $this->Model_data_keluarga->update_kk('data_kepala_keluarga', $data, $idkk);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/daftar_keluarga');
		}
	}

	public function insert_anggota_keluarga(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['nik'] = $this->input->post('nik');
		$data['nama'] = $this->input->post('nama');
		$data['tanggal_lahir'] = $this->input->post('tgl');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['pekerjaan'] = $this->input->post('pekerjaan');
		$hub_kel = $this->input->post('hubungan_keluarga');
		$data['hubungan_keluarga'] = $hub_kel;
		$data['ket_domisili'] = $this->input->post('ket_domisili');
		$data['status_kawin'] = $this->input->post('status_kawin');
		$data['umur_kawin'] = $this->input->post('umur_kawin');
		if ($hub_kel == "Kepala keluarga") {
			$data['kepala_keluarga'] = 1;
		} else {
			$data['kepala_keluarga'] = 0;
		}
		$error = $this->Model_data_keluarga->insert('data_kependudukan', $data);
		if($error == null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}
	}

	public function update_anggota_keluarga($nik){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['nik'] = $this->input->post('nik');
		$data['nama'] = $this->input->post('nama');
		$data['tanggal_lahir'] = $this->input->post('tgl');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['pekerjaan'] = $this->input->post('pekerjaan');
		$hub_kel = $this->input->post('hubungan_keluarga');
		$data['hubungan_keluarga'] = $hub_kel;
		$data['ket_domisili'] = $this->input->post('ket_domisili');
		$data['status_kawin'] = $this->input->post('status_kawin');
		$data['umur_kawin'] = $this->input->post('umur_kawin');
		if ($hub_kel == "Kepala keluarga") {
			$data['kepala_keluarga'] = 1;
		} else {
			$data['kepala_keluarga'] = 0;
		}
		$result = $this->Model_data_keluarga->update_anggota('data_kependudukan', $data, $nik);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}
	}

	public function hapus_anggota_keluarga($idkk, $nik){
		$where = "nik";
		$result = $this->Model_data_keluarga->delete('data_kependudukan', $where, $nik);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}
	}
}
